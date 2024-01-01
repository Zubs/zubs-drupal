<?php

/**
 * @file
 * Contains the RSVP Enabler Service
 */

namespace Drupal\rsvplist;

use Drupal\Core\Database\Connection;
use Drupal\node\Entity\Node;

class EnablerService {
  protected $database_connection;

  public function __construct(Connection $connection) {
    $this->database_connection = $connection;
  }

  /**
   * Checks if an individual node is RSVP enabled
   *
   * @param Node $node
   * @return bool
   */
  public function isEnabled(Node $node) {
    if ($node->isNew()) {
      return FALSE;
    }

    try {
        $select = $this->database_connection->select('rsvplist_enabled', 're');
        $select->fields('re', ['nid']);
        $select->condition('nid', $node->id());
        $results = $select->execute();
        
        return !empty($results->fetchCol());
    } catch (\Exception $e) {
        \Drupal::messenger()->addError(t('Unable to determine RSVP settings at this time. Please try again.'));
        
        return null;
    }
  }

  /**
   * Sets an individual node as RSVP enabled or disabled
   *
   * @param Node $node
   * @throws Exception
   */
  public function setEnabled(Node $node) {
    try {
        if (!$this->isEnabled($node)) {
          $this->database_connection->insert('rsvplist_enabled')
            ->fields(['nid' => $node->id()])
            ->execute();
        }
    } catch (\Exception $e) {
        \Drupal::messenger()->addError(t('Unable to save RSVP settings at this time. Please try again.'));
    }
  }

  /**
   * Deletes RSVP enabled setting for an individual node
   *
   * @param Node $node
   */
  public function delEnabled(Node $node) {
    try {
      if ($this->isEnabled($node)) {
        $this->database_connection->delete('rsvplist_enabled')
          ->condition('nid', $node->id())
          ->execute();
      }
    } catch (\Exception $e) {
      \Drupal::messenger()->addError(t('Unable to save RSVP settings at this time. Please try again.'));
    }
  }
}
