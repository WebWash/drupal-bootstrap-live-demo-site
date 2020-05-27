<?php

namespace Drupal\ww_bootstrap4_layouts\Plugin\Layout;

use Drupal\layout_builder\Plugin\Layout\MultiWidthLayoutBase;

/**
 * Configurable Bootstrap4 row layout plugin class.
 *
 * @internal
 *   Plugin classes are internal.
 */
class BsRowLayout extends MultiWidthLayoutBase {

  /**
   * {@inheritdoc}
   */
  protected function getWidthOptions() {
    return [
      '1-col' => '1 column',
      '2-col' => '2 column',
      '3-col' => '3 column',
      '4-col' => '4 column',
    ];
  }

  public function build(array $regions) {
    foreach ($this->getPluginDefinition()->getRegionNames() as $region_name) {
      if (array_key_exists($region_name, $regions)) {
        foreach ($regions[$region_name] as $uuid => $block) {
          $regions[$region_name][$uuid]['#attributes']['class'][] = $this->getColumnWidth();
        }
      }
    }

    return parent::build($regions);
  }

  protected function getColumnWidth() {
    $col = [
      '1-col' => 'col-lg-12 mb-4',
      '2-col' => 'col-lg-6 mb-4',
      '3-col' => 'col-lg-4 mb-4',
      '4-col' => 'col-lg-3 mb-4',
    ];

    return $col[$this->configuration['column_widths']];
  }

}
