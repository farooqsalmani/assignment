<?php
/**
 * @file
 * Contains \Drupal\location\Entity\City.
 */

namespace Drupal\location\Entity;

use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\user\UserInterface;
use Drupal\Core\Entity\EntityChangedTrait;

/**
 * Defines the City entity.
 *
 * @ingroup location
 *
 *
 * @ContentEntityType(
 *   id = "city",
 *   label = @Translation("City entity"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\location\Entity\Controller\CityListBuilder",
 *     "form" = {
 *       "add" = "Drupal\location\Form\CityForm",
 *       "edit" = "Drupal\location\Form\CityForm",
 *       "delete" = "Drupal\location\Form\CityDeleteForm",
 *     },
 *     "access" = "Drupal\location\CityAccessControlHandler",
 *   },
 *   list_cache_contexts = { "user" },
 *   base_table = "city",
 *   admin_permission = "administer city entity",
 *   entity_keys = {
 *     "id" = "id",
 *     "uuid" = "uuid",
 *     "title" = "title",
 *     "city" = "city",
 *     "lat" = "lat",
 *     "long" = "long",
 *     "pop" = "pop",
 *     "state" = "state",
 *     "user_id" = "user_id",
 *     "created" = "created",
 *     "changed" = "changed",
 *   },
 *   links = {
 *     "canonical" = "/admin/location/city/{city}",
 *     "edit-form" = "/admin/location/city/{city}/edit",
 *     "delete-form" = "/admin/location/city/{city}/delete",
 *     "collection" = "/admin/location/city/list"
 *   },
 *   field_ui_base_route = "entity.location.city_settings",
 * )
 */
class City extends ContentEntityBase {

  use EntityChangedTrait;

  /**
   * When a new entity instance is added, set the user_id entity reference to
   * the current user as the creator of the instance.
   * 
   * @param EntityStorageInterface storage_controller
   *   Entity storage interface.
   * @param array $values
   *   Array of values of the entity.
   */
  public static function preCreate(EntityStorageInterface $storage_controller, array &$values) {
    parent::preCreate($storage_controller, $values);
    // Default author to current user.
    $values += [
      'user_id' => \Drupal::currentUser()->id(),
    ];
  }

  /**
   * Defines the field properties.
   *
   * Field name, type and size determine the table structure.
   * 
   * @param EntityTypeInterface $entity_type
   *   Entity type interface.
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {

    $fields = parent::baseFieldDefinitions($entity_type);

    $fields['title'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Title'))
      ->setDescription(t('Title of the location'))
      ->setSettings([
        'default_value' => '--',
        'max_length' => 255,
        'text_processing' => 0,
      ])
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string',
        'weight' => -6,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -6,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

      $fields['city'] = BaseFieldDefinition::create('string')
      ->setLabel(t('City'))
      ->setDescription(t('Name of the city'))
      ->setSettings([
        'default_value' => '--',
        'max_length' => 100,
        'text_processing' => 0,
      ])
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string',
        'weight' => -6,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -6,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['lat'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Latitude'))
      ->setDescription(t('Latitude of the city'))
      ->setSettings([
        'default_value' => '',
        'max_length' => 100,
        'text_processing' => 0,
      ])
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string',
        'weight' => -6,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -6,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['long'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Longitude'))
      ->setDescription(t('Longitude of the city'))
      ->setSettings([
        'default_value' => '',
        'max_length' => 100,
        'text_processing' => 0,
      ])
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string',
        'weight' => -6,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -6,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['pop'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('Population'))
      ->setDescription(t('Population of the city'))
      ->setSettings([
        'default_value' => '',
        'max_length' => 20,
        'text_processing' => 0,
      ])
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -4,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['state'] = BaseFieldDefinition::create('string')
      ->setLabel(t('State'))
      ->setDescription(t('Name of the state'))
      ->setSettings([
        'default_value' => '',
        'max_length' => 100,
        'text_processing' => 0,
      ])
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string',
        'weight' => -6,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -6,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['user_id'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('User Name'))
      ->setDescription(t('The Name of the associated user.'))
      ->setSetting('target_type', 'user')
      ->setSetting('handler', 'default')
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'author',
        'weight' => -3,
      ])
      ->setDisplayOptions('form', [
        'type' => 'entity_reference_autocomplete',
        'settings' => [
          'match_operator' => 'CONTAINS',
          'size' => 60,
          'placeholder' => '',
        ],
        'weight' => -3,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['created'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Created'))
      ->setDescription(t('Creation time of the entity.'));

    $fields['changed'] = BaseFieldDefinition::create('changed')
      ->setLabel(t('Changed'))
      ->setDescription(t('Last change time of the entity.'));

    return $fields;
  }

}
