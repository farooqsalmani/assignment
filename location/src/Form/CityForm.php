<?php
/**
 * @file
 * Contains \Drupal\location\Form\CityForm.
 */

namespace Drupal\location\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for the city entity edit forms.
 *
 * @ingroup location
 */
class CityForm extends ContentEntityForm {

  /**
   * Build form for adding City.
   * 
   * @param array $form
   *   Render array of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   Form state object.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    /* @var $entity \Drupal\location\Entity\CIty */
    $form = parent::buildForm($form, $form_state);
    return $form;
  }

  /**
   * Save the entity informtion submitted.
   * 
   * @param array $form
   *   Render array of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   Form state object.
   */
  public function save(array $form, FormStateInterface $form_state) {
    // Redirect to city list after save.
    $form_state->setRedirect('entity.city.collection');
    $entity = $this->getEntity();
    $entity->save();
  }

}
