<?php

namespace Drupal\views_bootstrap\Plugin\views\style;

use Drupal\Core\Form\FormStateInterface;
use Drupal\views\Plugin\views\style\StylePluginBase;
use Drupal\Core\Render\Element;

/**
 * Style plugin to render each item in an ordered or unordered list.
 *
 * @ingroup views_style_plugins
 *
 * @ViewsStyle(
 *   id = "views_bootstrap_tab",
 *   title = @Translation("Bootstrap Tab"),
 *   help = @Translation("Displays rows in Bootstrap Tabs."),
 *   theme = "views_bootstrap_tab",
 *   theme_file = "bootstrap_views.theme.inc",
 *   display_types = {"normal"}
 * )
 */
class ViewsBootstrapTab extends StylePluginBase {

  /**
   * Does the style plugin for itself support to add fields to it's output.
   *
   * @var bool
   */
  protected $usesFields = TRUE;

  /**
   * {@inheritdoc}
   */
  protected $usesOptions = TRUE;

  /**
   * Definition.
   */
  protected function defineOptions() {
    $options = parent::defineOptions();
    $options['tab_field'] = ['default' => NULL];
    $options['tab_type'] = ['default' => 'tabs'];
    $options['justified'] = ['default' => FALSE];
    return $options;
  }

  /**
   * {@inheritdoc}
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);
    if (isset($form['grouping'])) {
      // Get field names from grouping form field as tab_field options.
      $options = [];
      foreach (Element::children($form['grouping']) as $key => $value) {
        if (!empty($form['grouping'][$key]['field']['#options']) && is_array($form['grouping'][$key]['field']['#options'])) {
          $options = array_merge($options, $form['grouping'][$key]['field']['#options']);
        }
      }
      unset($form['grouping']);

      $form['tab_field'] = [
        '#type' => 'select',
        '#title' => $this->t('Tab field'),
        '#options' => $options,
        '#required' => TRUE,
        '#default_value' => $this->options['tab_field'],
        '#description' => t('Select the field that will be used as the tab.'),
      ];

      $form['tab_type'] = [
        '#type' => 'select',
        '#title' => $this->t('Tab Type'),
        '#options' => [
          'tabs' => $this->t('Tabs'),
          'pills' => $this->t('Pills'),
          'list' => $this->t('List'),
        ],
        '#required' => TRUE,
        '#default_value' => $this->options['tab_type'],
      ];

      $form['justified'] = [
        '#type' => 'checkbox',
        '#title' => $this->t('Justified'),
        '#default_value' => $this->options['justified'],
        '#description' => $this->t('Make tabs equal widths of their parent'),
      ];
    }

  }

}