<?php

/**
 * This file is part of People
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Slick\People\Service\Command;

use Interop\Container\ContainerInterface as InteropContainer;
use League\Tactician\CommandBus;
use League\Tactician\Middleware;
use Slick\Di\ContainerInjectionInterface;

/**
 * Command Bus Factory
 *
 * @package Slick\People\Service\Command
 * @author  Filipe Silva <silvam.filipe@gmail.com>
 */
final class CommandBusFactory implements ContainerInjectionInterface
{
    /**
     * @var Middleware
     */
    private $middleware;

    /**
     * @var CommandBus
     */
    private $commandBus;

    /**
     * creates a command bus factory
     *
     * @param Middleware $middleware
     */
    public function __construct(Middleware $middleware)
    {
        $this->middleware = $middleware;
    }

    /**
     * Instantiates a new instance of this class.
     *
     * This is a factory method that returns a new instance of this class. The
     * factory should pass any needed dependencies into the constructor of this
     * class, but not the container itself. Every call to this method must return
     * a new instance of this class; that is, it may not implement a singleton.
     *
     * @param InteropContainer $container
     *   The service container this instance should use.
     *
     * @return CommandBusFactory
     */
    public static function create(InteropContainer $container)
    {
        $middleware = $container->get('cmd.middleware');
        return new CommandBusFactory($middleware);
    }

    /**
     * Gets the command bus
     *
     * @return CommandBus
     */
    public function getCommandBus()
    {
        if (!$this->commandBus) {
            $this->commandBus = new CommandBus([$this->middleware]);
        }
        return $this->commandBus;
    }
}
