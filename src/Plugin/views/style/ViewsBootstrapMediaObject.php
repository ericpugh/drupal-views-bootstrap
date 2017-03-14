<?php

/**
 * @file
 * Definition of Drupal\views_bootstrap\Plugin\views\style\ViewsBootstrapMediaObject.
 */

namespace Drupal\views_bootstrap\Plugin\views\style;

use Drupal\Core\Form\FormStateInterface;
use Drupal\views\Plugin\views\style\StylePluginBase;

/**
 * Style plugin to render each item as a row in a Bootstrap Media Object.
 *
 * @ingroup views_style_plugins
 *
 * @ViewsStyle(
 *   id = "views_bootstrap_media_object",
 *   title = @Translation("Bootstrap Media Object"),
 *   help = @Translation("Displays rows in a Bootstrap Media Object."),
 *   theme = "views_bootstrap_media_object",
 *   display_types = {"normal"}
 * )
 */
class ViewsBootstrapMediaObject extends StylePluginBase {

/**
   * Does the style plugin for itself support to add fields to it's output.
   *
   * @var bool
   */
  protected $usesFields = TRUE;

  /**
   * Definition.
   */
  protected function defineOptions() {
    $options = parent::defineOptions();
    
    
    $options['image_field'] = ['default' => NULL];
    $options['heading_field'] = ['default' => NULL];
    $options['body_field'] = ['default' => NULL];
    
    // Optional Fields
    $options['comment_count_field'] = ['default' => NULL];
    $options['add_comment_link_field'] = ['default' => NULL];
    $options['created_by_field'] = ['default' => NULL];
    $options['created_ts_field'] = ['default' => NULL];
    $options['edit_ts_field'] = ['default' => NULL];
    $options['new_content_field'] = ['default' => NULL];
    $options['tag_field'] = ['default' => NULL];

    return $options;
  }

  /**
   * Render the given style.
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);

      $form['heading_field'] = [
        '#type' => 'select',
        '#title' => $this->t('Heading field'),
        '#options' => $this->displayHandler->getFieldLabels(TRUE),
        '#required' => TRUE,
        '#default_value' => $this->options['heading_field'],
        '#description' => $this->t('Select the field that will be used as the heading.'),
      ];

      $form['body_field'] = [
        '#type' => 'select',
        '#title' => $this->t('Body field'),
        '#options' => $this->displayHandler->getFieldLabels(TRUE),
        '#required' => TRUE,
        '#default_value' => $this->options['body_field'],
        '#description' => $this->t('Select the field that will be used as the body.'),
      ];
      
      $form['image_field'] = [
        '#type' => 'select',
        '#title' => $this->t('Image field'),
        '#options' => $this->displayHandler->getFieldLabels(TRUE),
        '#required' => TRUE,
        '#default_value' => $this->options['image_field'],
        '#description' => $this->t('Select the field that will be used as the image.'),
      ];
      
      
      // Optional Items
      $form['comment_count_field'] = [
        '#type' => 'select',
        '#title' => $this->t('Comment count field'),
        '#options' => $this->displayHandler->getFieldLabels(TRUE),
        '#required' => FALSE,
        '#default_value' => $this->options['comment_count_field'],
        '#description' => $this->t('Select the field that will be used to show comment count.'),
      ];
      
      $form['add_comment_link_field'] = [
        '#type' => 'select',
        '#title' => $this->t('Add comment link field'),
        '#options' => $this->displayHandler->getFieldLabels(TRUE),
        '#required' => FALSE,
        '#default_value' => $this->options['add_comment_link_field'],
        '#description' => $this->t('Select the field that will link to a comment form'),
      ];
      
      $form['created_by_field'] = [
        '#type' => 'select',
        '#title' => $this->t('Created by field'),
        '#options' => $this->displayHandler->getFieldLabels(TRUE),
        '#required' => FALSE,
        '#default_value' => $this->options['created_by_field'],
        '#description' => $this->t('Select the field that will show the author.'),
      ];
      
      $form['created_ts_field'] = [
        '#type' => 'select',
        '#title' => $this->t('Created timestamp field'),
        '#options' => $this->displayHandler->getFieldLabels(TRUE),
        '#required' => FALSE,
        '#default_value' => $this->options['created_ts_field'],
        '#description' => $this->t('Select the field that will show the authored date.'),
      ];
      
      $form['edit_ts_field'] = [
        '#type' => 'select',
        '#title' => $this->t('Edit timestamp field'),
        '#options' => $this->displayHandler->getFieldLabels(TRUE),
        '#required' => FALSE,
        '#default_value' => $this->options['edit_ts_field'],
        '#description' => $this->t('Select the field that will show the last edited date.'),
      ];
      
      $form['new_content_field'] = [
        '#type' => 'select',
        '#title' => $this->t('New content flag field'),
        '#options' => $this->displayHandler->getFieldLabels(TRUE),
        '#required' => FALSE,
        '#default_value' => $this->options['new_content_field'],
        '#description' => $this->t('Select the field that flag new/edited content.'),
      ];
      
      $form['tag_field'] = [
        '#type' => 'select',
        '#title' => $this->t('Image field'),
        '#options' => $this->displayHandler->getFieldLabels(TRUE),
        '#required' => FALSE,
        '#default_value' => $this->options['tag_field'],
        '#description' => $this->t('Select the field that will be used to display tags.'),
      ];
    }
}
