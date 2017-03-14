<?php
/**
 * @file
 * Preprocessors and helper functions to make theming easier.
 */

use Drupal\views_bootstrap\ViewsBootstrapStyleHelper;

/**
 * Prepares variables for views media object templates.
 *
 * Default template: views-bootstrap-media-object.html.twig.
 *
 * @param array $vars
 *   An associative array containing:
 *   - view: A ViewExecutable object.
 *   - rows: The raw row data.
 */
function template_preprocess_views_bootstrap_media_object(&$vars) {
  $vars['id'] = ViewsBootstrapStyleHelper::getUniqueId($vars['view']);
  $image_class = $vars['view']->style_plugin->options['image_class'];
  $image_field = $vars['view']->style_plugin->options['image_field'];
  $heading_field = $vars['view']->style_plugin->options['heading_field'];
  $body_field = $vars['view']->style_plugin->options['body_field'];

  foreach ($vars['rows'] as $id => $row) {
    $vars['rows'][$id] = [];
    $vars['classes'][$id] .= ' media-object';
    $vars['rows'][$id]['image_class'] = $image_class;
    $vars['rows'][$id]['image'] = $vars['view']->style_plugin->getField($id, $image_field);
    $vars['rows'][$id]['heading'] = $vars['view']->style_plugin->getField($id, $heading_field);
    $vars['rows'][$id]['body'] = $vars['view']->style_plugin->getField($id, $body_field);
  }
}
