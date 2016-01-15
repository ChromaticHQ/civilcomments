<?php

/**
 * @file
 * Contains \Drupal\civilcomments\Plugin\Field\FieldWidget\CivilCommentsDefaultWidget.
 */

namespace Drupal\civilcomments\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'civilcomments_default' widget.
 *
 * @FieldWidget(
 *   id = "civilcomments_default",
 *   label = @Translation("Civil Comments default"),
 *   field_types = {
 *     "civil_comments"
 *   }
 * )
 */
class CivilCommentsDefaultWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $element['status'] = [
      '#title' => $this->t('Comment status'),
      '#type' => 'select',
      '#options' => [
        '0' => t('Disabled'),
        '1' => t('Closed'),
        '2' => t('Open'),
      ],
      '#default_value' => isset($items[$delta]->status) ? $items[$delta]->status : NULL,
    ];

    return $element;
  }

}