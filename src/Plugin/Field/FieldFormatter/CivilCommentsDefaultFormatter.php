<?php

/**
 * @file
 * Contains \Drupal\civilcomments\Plugin\field\formatter\CivilCommentsDefaultFormatter.
 */

namespace Drupal\civilcomments\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;

/**
 * Plugin implementation of the 'civilcomments_default' formatter.
 *
 * @FieldFormatter(
 *   id = "civilcomments_default",
 *   label = @Translation("Civil Comments default"),
 *   field_types = {
 *     "civil_comments"
 *   }
 * )
 */
class CivilCommentsDefaultFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];

    foreach ($items as $delta => $item) {
      $comments = [
        '#theme' => 'civilcomments_default',
        '#status' => (bool) $item->status,
      ];
    }

    return $elements;
  }

}
