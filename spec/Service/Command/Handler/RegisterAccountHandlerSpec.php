<?php

namespace spec\Slick\People\Service\Command\Handler;

use Slick\People\Service\Command\Handler\RegisterAccountHandler;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RegisterAccountHandlerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(RegisterAccountHandler::class);
    }
}
