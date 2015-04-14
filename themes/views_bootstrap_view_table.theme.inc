<?php
/**
 * @file
 * Preprocessors and helper functions to make theming easier.
 */

/**
 * Prepares variables for views table templates.
 *
 * Default template: views-bootstrap-view-table.html.twig.
 *
 * @param array $vars
 *   An associative array containing:
 *   - view: A ViewExecutable object.
 *   - rows: The raw row data.
 */
function template_preprocess_views_bootstrap_view_table(&$vars) {
  template_preprocess_views_view_table($vars);

  $vars['attributes']['class'][] = 'table';

  $bootstrap_styles = isset($vars['view']->style_plugin->options['bootstrap_styles'])
    ? array_filter($vars['view']->style_plugin->options['bootstrap_styles'])
    : array();

  foreach ($bootstrap_styles as $style) {
    $vars['attributes']['class'][] = 'table-' . $style;
  }
}
