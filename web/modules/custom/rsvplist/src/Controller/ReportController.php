<?php

/**
 * @file
 * Provide site administrators with a list of all the RSVP List signups
 * so they know who is attending their events.
 */

namespace Drupal\rsvplist\Controller;

use Drupal\Core\Controller\ControllerBase;

class ReportController extends ControllerBase {
    /**
     * Gets and return all RSVPs for all nodes.
     * These are returned as associative array, with each row
     * containing the username, the node title, and email of RSVP.
     * 
     * @return array|null
     */
    protected function load() {
        try {
            $database = \Drupal::database();
            $select_query = $database->select('rsvplist', 'r');
            $select_query->join('users_field_data', 'u', 'r.uid = u.uid');
            $select_query->join('node_field_data', 'n', 'r.nid = n.nid');

            $select_query->addField('u', 'name', 'username');
            $select_query->addField('n', 'title');
            $select_query->addField('r', 'mail');

            return $select_query->execute()->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            \Drupal::messenger()->addStatus(t('Unable to access the database at this time. Please try again later.'));
            
            return null;
        }
    }

    /**
     * Creates the RSVP list report page.
     * 
     * @return array
     */
    public function report() {
        $content = [];

        $content['message'] = [
            '#markup' => t('Below is a list of all Event RSVPs including username, email address and the name of the event they will be attending.'),
        ];

        $headers = [
            t('Username'),
            t('Event'),
            t('Email'),
        ];

        $rows = $this->load();

        $content['table'] = [
            '#type' => 'table',
            '#header' => $headers,
            '#rows' => $rows,
            '#empty' => t('No entries available'),
        ];

        $content['#cache']['max-age'] = 0;

        return $content;
    }
}
