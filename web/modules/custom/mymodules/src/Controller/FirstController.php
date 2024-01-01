<?php

/**
 * @file
 * Generates markup to be displayed. Functionality in this controller
 * is wired to Drupal in mymodule.routing.yml.
 */

namespace Drupal\mymodule\Controller;

use Drupal\Core\Controller\ControllerBase;

class FirstController extends ControllerBase {
    public function simpleContent() {
        return [
            '#type' => 'markup',
            '#markup' => t('Hello Drupal World. Time flies like an arrow, fruit flies like a banana'),
        ];
    }

    public function variableContent($name, $job) {
        return [
            '#type' => 'markup',
            '#markup' => t('@name is a @job', ['@name' => $name, '@job' => $job]),
        ];
    }
}

