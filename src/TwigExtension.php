<?php

namespace Drupal\avb_twig;

use Drupal\Core\Routing\RouteMatchInterface;

/**
 * Twig extension with some useful functions and filters.
 */
class TwigExtension extends \Twig_Extension {

    /**
     * The route match.
     *
     * @var \Drupal\Core\Routing\RouteMatchInterface
     */
    protected $routeMatch;

    /**
     * TwigExtension constructor.
     *
     * @param \Drupal\Core\Routing\RouteMatchInterface $route_match
     *   The route match.
     */
    public function __construct(RouteMatchInterface $route_match) {
        $this->routeMatch = $route_match;
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions() {
        return [
          new \Twig_SimpleFunction('avb_twig_current_entity', [$this, 'currentEntity']),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getName() {
        return 'avb_twig_extension';
    }

    /**
     * Returns row entity.
     *
     * @param string $entity_type
     *   The entity type.
     * @return null|entity
     *   A row entity or NULL if the entity does not exist.
     */
    public function currentEntity($entity_type) {
        $entity = $this->routeMatch->getParameter($entity_type);
        
        if ($entity) {
            return $entity;
        }
        return NULL;
    }

}
