<?php
/**
 * @file
 * Contains \Drupal\location\Form\CitySettingsForm.
 */

namespace Drupal\location\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class CitySettingsForm.
 *
 * @package Drupal\location\Form
 *
 * @ingroup location
 */
class CitySettingsForm extends FormBase {
  /**
   * Unique id identifying the form.
   *
   * @return string
   *   The unique id identifying the form.
   */
  public function getFormId() {
    return 'city_settings';
  }

  /**
   * Submit handler of the form.
   * 
   * @param array $form
   *   Render array of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   Form state object.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Empty implementation of the abstract submit class.
  }

  /**
   * Settings form for the city entity.
   * 
   * @param array $form
   *   Render array of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   Form state object.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['city_settings']['#markup'] = 'Settings form for City entity. Manage field settings here that needs to be developed later.';
    return $form;
  }

}
