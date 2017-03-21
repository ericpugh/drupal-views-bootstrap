<?php

/**
 * @file
 * Preprocessors and helper functions to make theming easier.
 */

use Drupal\views_bootstrap\ViewsBootstrapStyleHelper;

/**
 * Prepares variables for views accordion templates.
 *
 * Default template: views-bootstrap-accordion.html.twig.
 *
 * @param array $vars
 *   An associative array containing:
 *   - view: A ViewExecutable object.
 *   - rows: The raw row data.
 */
function template_preprocess_views_bootstrap_accordion(array &$vars) {
  $view = $vars['view'];
  $vars['id'] = ViewsBootstrapStyleHelper::getUniqueId($view);
  $title_field = $view->style_plugin->options['title_field'];
  $vars['attributes']['class'][] = 'panel-group';
  foreach ($vars['rows'] as $id => $row) {
    $vars['rows'][$id] = [];
    $vars['rows'][$id]['content'] = $row;
    $vars['rows'][$id]['title'] = $vars['view']->style_plugin->getField($id, $title_field);
  }
  // @TODO: Make sure that $vars['rows'] is rendered array.
  // @SEE: Have a look template_preprocess_views_view_unformatted()
  // and views-view-unformatted.html.twig
}
