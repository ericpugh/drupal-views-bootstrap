<?php
/**
 * @file
 * Preprocessors and helper functions to make theming easier.
 */

use Drupal\views_bootstrap\ViewsBootstrapStyleHelper;

/**
 * Prepares variables for views list group templates.
 *
 * Default template: views-bootstrap-list-group.html.twig.
 *
 * @param array $vars
 *   An associative array containing:
 *   - view: A ViewExecutable object.
 *   - rows: The raw row data.
 */
function template_preprocess_views_bootstrap_list_group(&$vars) {
  $view = $vars['view'];
  $options = $view->style_plugin->options;
  $vars['id'] = ViewsBootstrapStyleHelper::getUniqueId($view);
  $vars['attributes']['class'][] = 'views-bootstrap-list-group';
  foreach ($vars['rows'] as $id => $row) {
    $vars['rows'][$id] = [];
    $vars['rows'][$id]['content'] = $row;
    $vars['rows'][$id]['title'] = $vars['view']->style_plugin->getField($id, $options['title_field']);
  }

}