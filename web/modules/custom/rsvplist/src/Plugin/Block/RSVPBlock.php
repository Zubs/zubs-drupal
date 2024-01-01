<?php

/**
 * @file
 * Creates a block which displays the RSVPForm contained in RSVPForm.php
 */

namespace Drupal\rsvplist\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Session\AccountInterface;

/**
 * Provides the RSVP main block.
 * 
 * @Block(
 *  id = "rsvp_block",
 *  admin_label = @Translation("The RSVP Block")
 * )
 */
class RSVPBlock extends BlockBase {
    /**
     * {@inheritdoc}
     */
    public function build() {
        return \Drupal::formBuilder()->getForm('Drupal\rsvplist\Form\RSVPForm');
    }
}
