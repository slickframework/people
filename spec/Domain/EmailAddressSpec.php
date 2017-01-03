<?php

namespace spec\Slick\People\Domain;

use Slick\People\Domain\EmailAddress;
use PhpSpec\ObjectBehavior;
use Slick\People\Exception\InvalidEmailAddressException;

class EmailAddressSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('john.doe@example.com');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(EmailAddress::class);
    }

    function it_can_validate_email()
    {
        $this->beConstructedWith('some.bac-email');
        $this->shouldThrow(InvalidEmailAddressException::class)->duringInstantiation();
    }

    function it_can_be_used_as_a_string()
    {
        $this->__toString()->shouldBe('john.doe@example.com');
    }
}
