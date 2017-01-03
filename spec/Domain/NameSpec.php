<?php

namespace spec\Slick\People\Domain;

use Slick\People\Domain\Name;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NameSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith("John Middle Name Doe");
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Name::class);
    }

    function it_knows_what_first_name_is()
    {
        $this->firstName()->shouldBe('John');
    }

    function it_knows_what_last_name_is()
    {
        $this->lastName()->shouldBe('Doe');
    }

    function it_knows_what_middle_names_are()
    {
        $this->middleNames()->shouldBe('Middle Name');
    }

    function it_can_be_formatted()
    {
        $this->format('%l, %f %m')->shouldBe('Doe, John Middle Name');
    }

    function it_can_be_used_as_a_string()
    {
        $this->__toString()->shouldBe('John Middle Name Doe');
    }

}
