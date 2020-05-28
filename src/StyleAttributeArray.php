<?php

namespace Drupal\avb_twig;

use Drupal\Core\Template\AttributeArray;
use Drupal\Component\Utility\Html;

/**
 *
 */
class StyleAttributeArray extends AttributeArray {

  /**
   * Implements the magic __toString() method.
   */
  public function __toString() {
    // Filter out any empty values before printing.
    $this->value = array_unique(array_filter($this->value));
    return Html::escape(implode('; ', $this->value) . ';');
  }

}
