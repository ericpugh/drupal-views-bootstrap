<?php
/**
 * @file
 * Preprocessors and helper functions to make theming easier.
 */

use Drupal\views_bootstrap\ViewsBootstrapStyleHelper;

/**
 * Prepares variables for views carousel template.
 *
 * Default template: views-bootstrap-carousel.html.twig.
 *
 * @param array $vars
 *   An associative array containing:
 *   - view: A ViewExecutable object.
 *   - rows: The raw row data.
 */
function template_preprocess_views_bootstrap_carousel(&$vars) {
  $view = $vars['view'];
  $vars['id'] = ViewsBootstrapStyleHelper::getUniqueId($view);
  $vars['attributes']['class'][] = 'views-bootstrap-media-object';
  $vars['attributes']['class'][] = 'media-list';

  // Carousel options.
  $vars['interval'] = $view->style_plugin->options['interval'];
  $vars['navigation'] = $view->style_plugin->options['navigation'];
  $vars['indicators'] = $view->style_plugin->options['indicators'];
  $vars['pause'] = $view->style_plugin->options['pause'] ? 'hover' : FALSE;
  $vars['wrap'] = $view->style_plugin->options['wrap'];

  // Carousel rows.
  $image = $view->style_plugin->options['image'];
  $title = $view->style_plugin->options['title'];
  $description = $view->style_plugin->options['description'];

  foreach ($vars['rows'] as $id => $row) {
    $vars['rows'][$id] = array();
    $vars['rows'][$id]['image'] = $view->style_plugin->getField($id, $image);
    $vars['rows'][$id]['title'] = $view->style_plugin->getField($id, $title);
    $vars['rows'][$id]['description'] = $view->style_plugin->getField($id, $description);
  }
}
