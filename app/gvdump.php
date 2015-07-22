<?php
/**
 * @file
 *   gvdump.php
 *
 * @author: FrÃ©dÃ©ric G. MARAND <fgm@osinet.fr>
 *
 * @copyright (c) 2014 Ouest SystÃ¨mes Informatiques (OSInet).
 *
 * @license MIT
 */

$loader = require_once __DIR__ . '/bootstrap.php.cache';
require_once __DIR__ . '/AppKernel.php';

use Symfony\Component\Config\ConfigCache;
use Symfony\Component\DependencyInjection\Dumper\GraphvizDumper;

class DumperKernel extends \AppKernel {
  /**
   * Initializes the service container.
   */
  protected function initializeContainer() {
    $container = $this->buildContainer();
    $container->compile();
    return $container;
  }

  public function dump() {
    $this->initializeBundles();
    $container = $this->initializeContainer();
    $dumper = new GraphvizDumper($container);
    $content = $dumper->dump(array(
      'graph' => array(
        'rankdir' => 'RL',
      ),
    ));
    if (!$this->debug) {
      $content = static::stripComments($content);
    }
    echo $content;
  }
}

$kernel = new DumperKernel('dev', true);
$kernel->dump();