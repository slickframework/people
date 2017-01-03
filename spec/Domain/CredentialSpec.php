<?php

namespace spec\Slick\People\Domain;

use Ramsey\Uuid\Uuid;
use Slick\People\Domain\Account;
use Slick\People\Domain\Credential;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Slick\People\Domain\EmailAddress;
use Slick\People\Domain\Name;
use Slick\People\Domain\Password;

class CredentialSpec extends ObjectBehavior
{
    function let()
    {
        $account = new Account(
            [
                'id' => Uuid::uuid4(),
                'email' => new EmailAddress('jane.doe@example.com'),
                'name' => new Name('Jane Starking Doe')
            ]
        );
        $this->beConstructedWith(
            [
                'id' => Uuid::uuid4(),
                'email' => new EmailAddress('jane.doe@example.com'),
                'password' => new Password('123456'),
                'account' => $account
            ]
        );
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Credential::class);
    }

    function it_uses_the_email_address_to_retrieve_the_username()
    {
        $this->getUsername()->shouldBe('jane.doe');
    }

}
