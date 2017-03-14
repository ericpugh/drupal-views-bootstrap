<?php
/**
 * @file
 * Preprocessors and helper functions to make theming easier.
 */

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

  $image_field = $vars['view']->style_plugin->options['image_field'];
  $heading_field = $vars['view']->style_plugin->options['heading_field'];
  $body_field = $vars['view']->style_plugin->options['body_field'];
  
  $comment_count_field = $vars['view']->style_plugin->options['comment_count_field'];
  $add_comment_link_field = $vars['view']->style_plugin->options['add_comment_link_field'];
  $created_by_field = $vars['view']->style_plugin->options['created_by_field'];
  $created_ts_field = $vars['view']->style_plugin->options['created_ts_field'];
  $edit_ts_field = $vars['view']->style_plugin->options['edit_ts_field'];
  $new_content_field = $vars['view']->style_plugin->options['new_content_field'];
  $tag_field = $vars['view']->style_plugin->options['tag_field'];

  foreach ($vars['rows'] as $id => $row) {
    $vars['rows'][$id] = array();
    $vars['rows'][$id]['image'] = $vars['view']->style_plugin->getField($id, $image_field);
    $vars['rows'][$id]['heading'] = $vars['view']->style_plugin->getField($id, $heading_field);
    $vars['rows'][$id]['body'] = $vars['view']->style_plugin->getField($id, $body_field);
    
    $vars['rows'][$id]['comment_count'] = $vars['view']->style_plugin->getField($id, $comment_count_field);
    $vars['rows'][$id]['add_comment'] = $vars['view']->style_plugin->getField($id, $add_comment_link_field);
    $vars['rows'][$id]['created_by'] = $vars['view']->style_plugin->getField($id, $created_by_field);
    $vars['rows'][$id]['created_ts'] = $vars['view']->style_plugin->getField($id, $created_ts_field);
    $vars['rows'][$id]['edit_ts'] = $vars['view']->style_plugin->getField($id, $edit_ts_field);
    $vars['rows'][$id]['new_content_flag'] = $vars['view']->style_plugin->getField($id, $new_content_field);
    $vars['rows'][$id]['tags'] = $vars['view']->style_plugin->getField($id, $tag_field);
  }
}
