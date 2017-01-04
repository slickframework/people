<?php

namespace spec\Slick\People\Service\Command;

use League\Tactician\CommandBus;
use PhpSpec\ObjectBehavior;
use Slick\People\Service\Command\CommandBusFactory;
use Slick\People\Service\ContainerFactory;

class CommandBusFactorySpec extends ObjectBehavior
{
    function let()
    {
        $container = ContainerFactory::getContainer();
        $this->beConstructedWith($container->get('cmd.middleware'));
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(CommandBusFactory::class);
    }

    function it_can_create_a_command_bus()
    {
        $this->getCommandBus()->shouldBeAnInstanceOf(CommandBus::class);
    }
}
