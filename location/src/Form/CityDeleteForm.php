<?php

/**
 * @file
 * Contains \Drupal\location\Form\CityDeleteForm.
 */

namespace Drupal\location\Form;

use Drupal\Core\Entity\ContentEntityConfirmFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

/**
 * Provides a form for deleting a city entity.
 *
 * @ingroup location
 */
class CityDeleteForm extends ContentEntityConfirmFormBase {

  /**
   * Get the confirmation question.
   */
  public function getQuestion() {
    return $this->t('Are you sure you want to delete entity %name?', array('%name' => $this->entity->label()));
  }

  /**
   * If the delete command is canceled, return to the city list.
   */
  public function getCancelUrl() {
    return new Url('entity.city.collection');
  }

  /**
   * Get confirmation text.
   */
  public function getConfirmText() {
    return $this->t('Delete');
  }

  /**
   * Delete the entity and log the event.
   * 
   * @param array $form
   *   Render array of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   Form state object.
   * 
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $entity = $this->getEntity();
    $entity->delete();

    $this->logger('location')->notice('deleted %title.',
      [
        '%title' => $this->entity->label(),
      ]);
    // Redirect to city list after delete.
    $form_state->setRedirect('entity.city.collection');
  }

}
