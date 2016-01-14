<?php

/**
 * @file
 * Contains \Drupal\civilcomments\Plugin\Field\FieldType\CivilComments.
 */

namespace Drupal\civilcomments\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Render\Element;
use Drupal\Core\Routing\UrlGeneratorTrait;
use Drupal\Core\Session\AnonymousUserSession;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Plugin implementation of the 'Civil Comments' field type.
 *
 * @FieldType(
 *   id = "civil_comments",
 *   label = @Translation("Civil Comments field"),
 *   description = @Translation("This field attaches comments to entities."),
 *   default_widget = "civilcomments_default",
 *   default_formatter = "civilcomments_default"
 * )
 */
class CivilComments extends FieldItemBase {

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties['status'] = DataDefinition::create('integer')
      ->setLabel(t('Civil Comment status'))
      ->setRequired(TRUE)
      ->setDescription(t('The status of comments for the parent entity.'));

    return $properties;
  }

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    return [
      'columns' => [
        'status' => [
          'description' => 'Whether comments are allowed on this entity: 0 = no, 1 = closed (read only), 2 = open (read/write).',
          'type' => 'int',
          'default' => 0,
        ],
      ],
      'indexes' => [],
      'foreign keys' => [],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function fieldSettingsForm(array $form, FormStateInterface $form_state) {
    $element = [];

    $element['placeholder'] = [
      '#type' => 'markup',
      '#markup' => '<p><strong>' . t('This space reserved for some actual settings.') . '</strong></p>',
    ];

    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public static function mainPropertyName() {
    return 'status';
  }

  /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    // The field is never empty since a) it's required, and b) there will be one
    // of three possible values at all time: 0, 1, or 2.
    return FALSE;
  }

}
