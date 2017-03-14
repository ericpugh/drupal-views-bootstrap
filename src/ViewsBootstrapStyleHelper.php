<?php

namespace Drupal\views_bootstrap;

use Drupal\Component\Utility\Html;

/**
 * Defines a helper class for stuff related to bootstrap views style plugins.
 */
class ViewsBootstrapStyleHelper {

  /**
   * Get unique element id.
   *
   * @param \Drupal\views\ViewExecutable $view
   *   A ViewExecutable object.
   *
   * @return string
   *   A unique id for an HTML element.
   */
  public static function getUniqueId($view) {
    $id = $view->storage->id() . '-' . $view->current_display;
    return Html::getUniqueId('views-bootstrap-' . $id);
  }

}