<?php

/**
 * @file
 * Contains \Drupal\location\CityAccessControlHandler.
 */

namespace Drupal\location;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Access controller for the city entity.
 *
 * @see \Drupal\location\Entity\City.
 */
class CityAccessControlHandler extends EntityAccessControlHandler {

  /**
   * Check access right of the user.
   * 
   * @param \Drupal\Core\Entity\EntityInterface $entity
   *   Entity service.
   * @param string $operation
   *   Type of operation to be performed.
   * @param \Drupal\Core\Session\AccountInterface $account
   *   Account service.
   * 
   * @return \Drupal\Core\Access\AccessResult
   *   Access result object.
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    switch ($operation) {
      case 'view':
        return AccessResult::allowedIfHasPermission($account, 'view city entity');

      case 'edit':
        return AccessResult::allowedIfHasPermission($account, 'edit city entity');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete city entity');
    }
    return AccessResult::allowed();
  }

  /**
   * Check create access right of the user.
   * 
   * @param \Drupal\Core\Session\AccountInterface $account
   *   Account service.
   * @param array $context
   *   Context.
   * @param string $entity_bundle
   *   Bundle name of the entity.
   * 
   * 
   * @return \Drupal\Core\Access\AccessResult
   *   Access result object.
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add city entity');
  }

}
