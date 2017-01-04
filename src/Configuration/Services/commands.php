<?php

/**
 * This file is part of Slick/People package
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Slick\People\Configuration\Services;

use League\Tactician\Container\ContainerLocator;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;
use League\Tactician\Handler\MethodNameInflector\HandleInflector;
use Slick\Di\Definition\ObjectDefinition;
use Slick\People\Service\Command\Handler\RegisterAccountHandler;
use Slick\People\Service\Command\RegisterAccountCommand;

$services = [];

// HANDLERS
$services['register.account.handler'] = ObjectDefinition::create(
    RegisterAccountHandler::class
);

// COMMAND MAP
$commandToHandlerMap = [
    RegisterAccountCommand::class => 'register.account.handler'
];

// COMMAND BUS
$services['cmd.inflector'] = ObjectDefinition::create(HandleInflector::class);
$services['cmd.extractor'] = ObjectDefinition::create(ClassNameExtractor::class);
$services['cmd.locator']   = ObjectDefinition::create(ContainerLocator::class)
    ->with('@container', $commandToHandlerMap)
;
$services['cmd.middleware'] = ObjectDefinition::create(
    CommandHandlerMiddleware::class
)
    ->with('@cmd.extractor', '@cmd.locator', '@cmd.inflector');

return $services;