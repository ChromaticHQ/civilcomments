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
   *
   * Currently returning #status, but not actually using it. Reserved for use
   * in closing comments to new submissions, while still displaying them on the
   * entity.
   *
   * @todo
   *   - Return other items defined required for civilcomments script:
   *     - content_id
   *     - lang
   *     - site_id
   *   - Find out how civilcomments expects to do this, and use #status to do
   *     it.
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];

    foreach ($items as $delta => $item) {
      $elements[$delta] = [
        '#theme' => 'civilcomments_formatter',
        '#status' => $item->status,
      ];
    }

    return $elements;
  }

}
