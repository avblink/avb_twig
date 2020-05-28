<?php

namespace Drupal\avb_twig;

use Drupal\Core\Template\Attribute as DrupalAttribute;

/**
 *
 */
class Attribute extends DrupalAttribute {

  /**
   *
   */
  public function addStyle() {
    $args = func_get_args();
    if ($args) {
      $styles = [];
      foreach ($args as $arg) {
        foreach ($arg as $key => $val) {
          $values[] = "$key: $val";
        }

        $values = implode(';', $values);

        // Merge the values passed in from the styles array.
        $styles = array_merge($styles, (array) $values);
      }

      // Merge if there are values, just add them otherwise.
      if (isset($this->storage['style']) && $this->storage['style'] instanceof StyleAttributeArray) {
        // Merge the values passed in from the style value array.
        $styles = array_merge($this->storage['style']->value(), $styles);
        $this->storage['style']->exchangeArray($styles);
      }
      else {
        $this->offsetSet('style', $styles);
      }
    }

    return $this;
  }

  /**
   *
   */
  protected function createAttributeValue($name, $value) {
    if ($name == 'style') {
      $value = new StyleAttributeArray($name, $value);
    }
    else {
      $value = parent::createAttributeValue($name, $value);
    }

    return $value;
  }

}
