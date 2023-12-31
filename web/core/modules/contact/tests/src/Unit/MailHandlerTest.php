<?php

namespace Drupal\Tests\contact\Unit;

use Drupal\contact\MailHandler;
use Drupal\contact\MailHandlerException;
use Drupal\contact\MessageInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Language\Language;
use Drupal\Core\Session\AccountInterface;
use Drupal\Tests\UnitTestCase;
use Drupal\user\Entity\User;

/**
 * @coversDefaultClass \Drupal\contact\MailHandler
 * @group contact
 */
class MailHandlerTest extends UnitTestCase {

  /**
   * Language manager service.
   *
   * @var \Drupal\Core\Language\LanguageManagerInterface|\PHPUnit\Framework\MockObject\MockObject
   */
  protected $languageManager;

  /**
   * Logger service.
   *
   * @var \Psr\Log\LoggerInterface|\PHPUnit\Framework\MockObject\MockObject
   */
  protected $logger;

  /**
   * Mail manager service.
   *
   * @var \Drupal\Core\Mail\MailManagerInterface|\PHPUnit\Framework\MockObject\MockObject
   */
  protected $mailManager;

  /**
   * Contact mail messages service.
   *
   * @var \Drupal\contact\MailHandlerInterface|\PHPUnit\Framework\MockObject\MockObject
   */
  protected $contactMailHandler;

  /**
   * The contact form entity.
   *
   * @var \Drupal\contact\ContactFormInterface|\PHPUnit\Framework\MockObject\MockObject
   */
  protected $contactForm;

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface|\PHPUnit\Framework\MockObject\MockObject
   */
  protected $entityTypeManager;

  /**
   * The user storage handler.
   *
   * @var \Drupal\Core\Entity\EntityStorageInterface|\PHPUnit\Framework\MockObject\MockObject
   */
  protected $userStorage;

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    parent::setUp();
    $this->mailManager = $this->createMock('\Drupal\Core\Mail\MailManagerInterface');
    $this->languageManager = $this->createMock('\Drupal\Core\Language\LanguageManagerInterface');
    $this->logger = $this->createMock('\Psr\Log\LoggerInterface');
    $this->entityTypeManager = $this->createMock(EntityTypeManagerInterface::class);
    $this->userStorage = $this->createMock('\Drupal\Core\Entity\EntityStorageInterface');
    $this->entityTypeManager->expects($this->any())
      ->method('getStorage')
      ->with('user')
      ->willReturn($this->userStorage);

    $string_translation = $this->getStringTranslationStub();
    $this->contactMailHandler = new MailHandler($this->mailManager, $this->languageManager, $this->logger, $string_translation, $this->entityTypeManager);
    $language = new Language(['id' => 'en']);

    $this->languageManager->expects($this->any())
      ->method('getDefaultLanguage')
      ->willReturn($language);

    $this->languageManager->expects($this->any())
      ->method('getCurrentLanguage')
      ->willReturn($language);
  }

  /**
   * Tests the children() method with an invalid key.
   *
   * @covers ::sendMailMessages
   */
  public function testInvalidRecipient() {
    $message = $this->createMock('\Drupal\contact\MessageInterface');
    $message->expects($this->once())
      ->method('isPersonal')
      ->willReturn(TRUE);
    $message->expects($this->once())
      ->method('getPersonalRecipient')
      ->willReturn(NULL);
    $message->expects($this->once())
      ->method('getContactForm')
      ->willReturn($this->createMock('\Drupal\contact\ContactFormInterface'));
    $sender = $this->createMock('\Drupal\Core\Session\AccountInterface');
    $this->userStorage->expects($this->any())
      ->method('load')
      ->willReturn($sender);
    // User IDs 1 and 0 have special implications, use 3 instead.
    $sender->expects($this->any())
      ->method('id')
      ->willReturn(3);
    $sender->expects($this->once())
      ->method('isAnonymous')
      ->willReturn(FALSE);
    $this->expectException(MailHandlerException::class);
    $this->expectExceptionMessage('Unable to determine message recipient');
    $this->contactMailHandler->sendMailMessages($message, $sender);
  }

  /**
   * Tests the sendMailMessages method.
   *
   * @dataProvider getSendMailMessages
   *
   * @covers ::sendMailMessages
   */
  public function testSendMailMessages(MessageInterface $message, AccountInterface $sender, $results) {
    $this->logger->expects($this->once())
      ->method('info');
    $this->mailManager->expects($this->any())
      ->method('mail')
      ->willReturnCallback(
        function ($module, $key, $to, $langcode, $params, $from) use (&$results) {
          $result = array_shift($results);
          $this->assertEquals($module, $result['module']);
          $this->assertEquals($key, $result['key']);
          $this->assertEquals($to, $result['to']);
          $this->assertEquals($langcode, $result['langcode']);
          $this->assertEquals($params, $result['params']);
          $this->assertEquals($from, $result['from']);
        });
    $this->userStorage->expects($this->any())
      ->method('load')
      ->willReturn(clone $sender);
    $this->contactMailHandler->sendMailMessages($message, $sender);
  }

  /**
   * Data provider for ::testSendMailMessages.
   */
  public function getSendMailMessages() {
    $data = [];
    $recipients = ['admin@drupal.org', 'user@drupal.org'];
    $default_result = [
      'module' => 'contact',
      'key' => '',
      'to' => implode(', ', $recipients),
      'langcode' => 'en',
      'params' => [],
      'from' => 'anonymous@drupal.org',
    ];
    $results = [];
    $message = $this->getAnonymousMockMessage($recipients, '');
    $sender = $this->getMockSender();
    $result = [
      'key' => 'page_mail',
      'params' => [
        'contact_message' => $message,
        'sender' => $sender,
        'contact_form' => $message->getContactForm(),
      ],
    ];
    $results[] = $result + $default_result;
    $data[] = [$message, $sender, $results];

    $results = [];
    $message = $this->getAnonymousMockMessage($recipients, 'reply');
    $sender = $this->getMockSender();
    $result = [
      'key' => 'page_mail',
      'params' => [
        'contact_message' => $message,
        'sender' => $sender,
        'contact_form' => $message->getContactForm(),
      ],
    ];
    $results[] = $result + $default_result;
    $result['key'] = 'page_autoreply';
    $result['to'] = 'anonymous@drupal.org';
    $result['from'] = NULL;
    $results[] = $result + $default_result;
    $data[] = [$message, $sender, $results];

    $results = [];
    $message = $this->getAnonymousMockMessage($recipients, '', TRUE);
    $sender = $this->getMockSender();
    $result = [
      'key' => 'page_mail',
      'params' => [
        'contact_message' => $message,
        'sender' => $sender,
        'contact_form' => $message->getContactForm(),
      ],
    ];
    $results[] = $result + $default_result;
    $result['key'] = 'page_copy';
    $result['to'] = 'anonymous@drupal.org';
    $results[] = $result + $default_result;
    $data[] = [$message, $sender, $results];

    $results = [];
    $message = $this->getAnonymousMockMessage($recipients, 'reply', TRUE);
    $sender = $this->getMockSender();
    $result = [
      'key' => 'page_mail',
      'params' => [
        'contact_message' => $message,
        'sender' => $sender,
        'contact_form' => $message->getContactForm(),
      ],
    ];
    $results[] = $result + $default_result;
    $result['key'] = 'page_copy';
    $result['to'] = 'anonymous@drupal.org';
    $results[] = $result + $default_result;
    $result['key'] = 'page_autoreply';
    $result['from'] = NULL;
    $results[] = $result + $default_result;
    $data[] = [$message, $sender, $results];

    // For authenticated user.
    $results = [];
    $message = $this->getAuthenticatedMockMessage();
    $sender = $this->getMockSender(FALSE, 'user@drupal.org');
    $result = [
      'module' => 'contact',
      'key' => 'user_mail',
      'to' => 'user2@drupal.org',
      'langcode' => 'en',
      'params' => [
        'contact_message' => $message,
        'sender' => $sender,
        'recipient' => $message->getPersonalRecipient(),
      ],
      'from' => 'user@drupal.org',
    ];
    $results[] = $result;
    $data[] = [$message, $sender, $results];

    $results = [];
    $message = $this->getAuthenticatedMockMessage(TRUE);
    $sender = $this->getMockSender(FALSE, 'user@drupal.org');
    $result = [
      'module' => 'contact',
      'key' => 'user_mail',
      'to' => 'user2@drupal.org',
      'langcode' => 'en',
      'params' => [
        'contact_message' => $message,
        'sender' => $sender,
        'recipient' => $message->getPersonalRecipient(),
      ],
      'from' => 'user@drupal.org',
    ];
    $results[] = $result;

    $result['key'] = 'user_copy';
    $result['to'] = $result['from'];
    $results[] = $result;
    $data[] = [$message, $sender, $results];

    return $data;
  }

  /**
   * Builds a mock sender on given scenario.
   *
   * @param bool $anonymous
   *   TRUE if the sender is anonymous.
   * @param string $mail_address
   *   The mail address of the user.
   *
   * @return \Drupal\Core\Session\AccountInterface|\PHPUnit\Framework\MockObject\MockObject
   *   Mock sender for testing.
   */
  protected function getMockSender($anonymous = TRUE, $mail_address = 'anonymous@drupal.org') {
    $sender = $this->createMock(User::class);
    $sender->expects($this->once())
      ->method('isAnonymous')
      ->willReturn($anonymous);
    $sender->expects($this->any())
      ->method('getEmail')
      ->willReturn($mail_address);
    $sender->expects($this->any())
      ->method('getDisplayName')
      ->willReturn('user');
    // User ID 1 has special implications, use 3 instead.
    $sender->expects($this->any())
      ->method('id')
      ->willReturn($anonymous ? 0 : 3);
    if ($anonymous) {
      // Anonymous user values set in params include updated values for name and
      // mail.
      $sender->name = 'Anonymous (not verified)';
      $sender->mail = 'anonymous@drupal.org';
    }
    return $sender;
  }

  /**
   * Builds a mock message from anonymous user.
   *
   * @param array $recipients
   *   An array of recipient email addresses.
   * @param bool $auto_reply
   *   TRUE if auto reply is enable.
   * @param bool $copy_sender
   *   TRUE if a copy should be sent, FALSE if not.
   *
   * @return \Drupal\contact\MessageInterface|\PHPUnit\Framework\MockObject\MockObject
   *   Mock message for testing.
   */
  protected function getAnonymousMockMessage($recipients, $auto_reply, $copy_sender = FALSE) {
    $message = $this->createMock('\Drupal\contact\MessageInterface');
    $message->expects($this->any())
      ->method('getSenderName')
      ->willReturn('Anonymous');
    $message->expects($this->once())
      ->method('getSenderMail')
      ->willReturn('anonymous@drupal.org');
    $message->expects($this->any())
      ->method('isPersonal')
      ->willReturn(FALSE);
    $message->expects($this->once())
      ->method('copySender')
      ->willReturn($copy_sender);
    $message->expects($this->any())
      ->method('getContactForm')
      ->willReturn($this->getMockContactForm($recipients, $auto_reply));
    return $message;
  }

  /**
   * Builds a mock message from authenticated user.
   *
   * @param bool $copy_sender
   *   TRUE if a copy should be sent, FALSE if not.
   *
   * @return \Drupal\contact\MessageInterface|\PHPUnit\Framework\MockObject\MockObject
   *   Mock message for testing.
   */
  protected function getAuthenticatedMockMessage($copy_sender = FALSE) {
    $message = $this->createMock('\Drupal\contact\MessageInterface');
    $message->expects($this->any())
      ->method('isPersonal')
      ->willReturn(TRUE);
    $message->expects($this->once())
      ->method('copySender')
      ->willReturn($copy_sender);
    $recipient = $this->createMock('\Drupal\user\UserInterface');
    $recipient->expects($this->once())
      ->method('getEmail')
      ->willReturn('user2@drupal.org');
    $recipient->expects($this->any())
      ->method('getDisplayName')
      ->willReturn('user2');
    $recipient->expects($this->once())
      ->method('getPreferredLangcode')
      ->willReturn('en');
    $message->expects($this->any())
      ->method('getPersonalRecipient')
      ->willReturn($recipient);
    $message->expects($this->any())
      ->method('getContactForm')
      ->willReturn($this->getMockContactForm('user2@drupal.org', FALSE));
    return $message;
  }

  /**
   * Builds a mock message on given scenario.
   *
   * @param array $recipients
   *   An array of recipient email addresses.
   * @param string $auto_reply
   *   An auto-reply message to send to the message author.
   *
   * @return \Drupal\contact\ContactFormInterface|\PHPUnit\Framework\MockObject\MockObject
   *   Mock message for testing.
   */
  protected function getMockContactForm($recipients, $auto_reply) {
    $contact_form = $this->createMock('\Drupal\contact\ContactFormInterface');
    $contact_form->expects($this->once())
      ->method('getRecipients')
      ->willReturn($recipients);
    $contact_form->expects($this->once())
      ->method('getReply')
      ->willReturn($auto_reply);

    return $contact_form;
  }

}
