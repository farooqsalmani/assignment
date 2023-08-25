<?php

/**
 * @file
 * Contains \Drupal\location\Entity\Controller\CityListBuilder.
 */

namespace Drupal\location\Entity\Controller;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Routing\UrlGeneratorInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a list controller for city entity.
 *
 * @ingroup location
 */
class CityListBuilder extends EntityListBuilder {

  /**
   * The url generator.
   *
   * @var \Drupal\Core\Routing\UrlGeneratorInterface
   */
  protected $urlGenerator;


  /**
   * Container service implementation.
   * 
   * @param \Symfony\Component\DependencyInjection\ContainerInterface container
   *   Container service.
   * @param \Drupal\Core\Entity\EntityTypeInterface $entity_type
   *   Entity Type service.
   * 
   */
  public static function createInstance(ContainerInterface $container, EntityTypeInterface $entity_type) {
    return new static(
      $entity_type,
      $container->get('entity_type.manager')->getStorage($entity_type->id()),
      $container->get('url_generator')
    );
  }

  /**
   * Constructs a new CityListBuilder object.
   *
   * @param \Drupal\Core\Entity\EntityTypeInterface $entity_type
   *   The entity type city.
   * @param \Drupal\Core\Entity\EntityStorageInterface $storage
   *   The entity storage class.
   * @param \Drupal\Core\Routing\UrlGeneratorInterface $url_generator
   *   The url generator.
   */
  public function __construct(EntityTypeInterface $entity_type, EntityStorageInterface $storage, UrlGeneratorInterface $url_generator) {
    parent::__construct($entity_type, $storage);
    $this->urlGenerator = $url_generator;
  }


  /**
   * Override ::render() to add our own content above the table.
   */
  public function render() {
    $build['description'] = [
      '#markup' => $this->t('These are fieldable entities. You can manage the fields on the <a href="@adminlink">City admin page</a>.', [
        '@adminlink' => $this->urlGenerator->generateFromRoute('entity.location.city_settings'),
    ]),
    ];
    $build['table'] = parent::render();
    return $build;
  }

  /**
   * Building the header row for the city list.
   */
  public function buildHeader() {
    $header['id'] = $this->t('City Id');
    $header['title'] = $this->t('Title');
    $header['city'] = $this->t('City');
    $header['lat'] = $this->t('Latitude');
    $header['long'] = $this->t('Longitude');
    $header['pop'] = $this->t('Population');
    $header['state'] = $this->t('State');
    return $header + parent::buildHeader();
  }

  /**
   * Building the content rows for the city list.
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\location\Entity\City */
    $row['id'] = $entity->id();
    $row['title'] = $entity->title->value;
    $row['city'] = $entity->city->value;
    $row['lat'] = $entity->lat->value;
    $row['long'] = $entity->long->value;
    $row['pop'] = $entity->pop->value;
    $row['state'] = $entity->state->value;
    return $row + parent::buildRow($entity);
  }

}
