<?php

/**
 * @file
 * Contains \Drupal\civilcomments\Form\CivilCommentsSettingsForm.
 */

namespace Drupal\civilcomments\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

/**
 * Civil Comments configuration settings form.
 */
class CivilCommentsSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'civilcomments_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['civilcomments.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, \Drupal\Core\Form\FormStateInterface $form_state) {

    // Add form elements to collect site account information.
    $form['account'] = [
      '#type' => 'details',
      '#title' => $this->t('Default account settings'),
      '#description' => $this->t('You will need an active subscription to Civil Comments, and the Site ID associated with your subscription.'),
      '#open' => TRUE,
    ];

    $form['account']['site_id'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Site ID'),
      '#default_value' => \Drupal::config('civilcomments.settings')->get('civilcomments_site_id'),
    ];

    $form['account']['content_id'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Content ID'),
      '#default_value' => \Drupal::config('civilcomments.settings')->get('civilcomments_content_id'),
    ];

    $form['account']['lang'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Site Language'),
      '#default_value' => \Drupal::config('civilcomments.settings')->get('civilcomments_lang'),
    ];

    $form = parent::buildForm($form, $form_state);
    return $form;
}

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('civilcomments.settings')
      ->set('civilcomments_site_id', $form_state->getValue('civilcomments_site_id'))
      ->set('civilcomments_content_id', $form_state->getValue('civilcomments_content_id'))
      ->set('civilcomments_lang', $form_state->getValue('civilcomments_lang'))
      ->save();

    parent::submitForm($form, $form_state);
  }
}
