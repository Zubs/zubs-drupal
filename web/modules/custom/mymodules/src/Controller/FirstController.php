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
            '#markup' => t('Hello Drupal World. Time flies like an