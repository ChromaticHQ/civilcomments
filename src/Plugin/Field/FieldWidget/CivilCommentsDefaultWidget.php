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
 *
 * @todo
 *   - Implement validation.
 *   - Consider implementing an interface as e.g. Comments does with the options
 *     array.
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
        '0' => $this->t('Disabled'),
        '1' => $this->t('Closed'),
        '2' => $this->t('Open'),
      ],
      '#default_value' => isset($items[$delta]->status) ? $items[$delta]->status : NULL,
    ];

    return $element;
  }

}
