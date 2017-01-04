<?php

/**
 * This file is part of slick/people package
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Slick\People\Service;

use Slick\Di\ContainerBuilder;
use Slick\Di\ContainerInterface;

/**
 * Container Factory
 *
 * @package Slick\People\Service
 * @author  Filipe Silva <silvam.filipe@gmail.com>
 */
final class ContainerFactory
{

    /**
     * @var \Slick\Di\Container|ContainerInterface
     */
    private static $container;

    /**
     * Returns the dependency container for this package
     *
     * @return \Slick\Di\Container|ContainerInterface
     */
    public static function getContainer()
    {
        if (!self::$container) {
            $path = dirname(__DIR__).'/Configuration/Services';
            $container = new ContainerBuilder($path);
            self::$container = $container->getContainer();
        }
        return self::$container;
    }
}
