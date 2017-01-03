<?php

namespace spec\Slick\People\Domain;

use Slick\People\Domain\Password;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Slick\People\Domain\PasswordEncryptionInterface;

class PasswordSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('123456');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Password::class);
    }

    function it_implements_password_encryption_interface()
    {
        $this->shouldBeAnInstanceOf(PasswordEncryptionInterface::class);
    }

    function it_can_hash_the_password()
    {
        $this->hash()->shouldStartWith("$2y$13$");
    }

    function it_can_match_password_with_its_hash()
    {
        $hash = password_hash('123456', PASSWORD_BCRYPT, ['cost' => 13]);
        $this->match($hash)->shouldBe(true);
    }

    function it_can_be_converted_to_string_returning_the_hash()
    {
        $this->__toString()->shouldStartWith("$2y$13$");
    }
}
