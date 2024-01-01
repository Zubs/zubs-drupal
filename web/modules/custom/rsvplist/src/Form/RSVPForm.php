<?php

/**
 * @file
 * A form to collect an address for RSVP details.
 */

namespace Drupal\rsvplist\Form;

use Drupal;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class RSVPForm extends FormBase {
    /**
     * {@inheritdoc}
     */
    public function getFormId() {
        return 'rsvplist_email_form';
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state) {
        $node = Drupal::routeMatch()->getParameter('node');
        if (!is_null($node)) {
            $nid = $node->id();
        } else {
            $nid = 0;
        }

        $form['email'] = [
            '#type' => 'email',
            '#title' => $this->t('Email Address'),
            '#size' => 25,
            '#description' => t("We will send updates to the email address you provide"),
            '#required' => TRUE,
        ];
        // $form['actions']['#type'] = 'actions';
        $form['actions']['submit'] = [
            '#type' => 'submit',
            '#value' => $this->t('RSVP'),
            '#button_type' => 'primary',
        ];
        $form['nid'] = [
            '#type' => 'hidden',
            '#value' => $nid,
        ];

        return $form;
    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state) {
        $email = $form_state->getValue('email');
        $this->messenger()->addMessage(t('The form is working. You entered @entry', ['@entry' => $email]));
    }

    /**
     * {@inheritdoc}
     */
    public function validateForm(array &$form, FormStateInterface $form_state) {
        $email = $form_state->getValue('email');
        if (strpos($email, 'example.com') !== FALSE) {
            $form_state->setErrorByName('email', t('We are not accepting example.com email addresses'));
        }
    }
}

