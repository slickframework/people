<?php

namespace spec\Slick\People\Domain;

use PhpSpec\Exception\Example\FailureException;
use Slick\People\Domain\Account;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Slick\People\Domain\EmailAddress;
use Slick\People\Domain\Name;

class AccountSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(
            [
                'name' => new Name('Jane Starking Doe'),
                'email' => new EmailAddress('jane.doe@example.com')
            ]
        );
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Account::class);
    }

    function it_can_be_deactivated()
    {
        $this->active(false)->shouldBeACloneWith('active', false);
    }

    public function getMatchers()
    {
        return [
            'beACloneWith' => function ($subject, $property, $expectedState) {
                if (! $subject instanceof Account) {
                    throw new FailureException(
                        "The active() method should return an account."
                    );
                }

                try {
                    \PHPUnit_Framework_Assert::assertNotSame($subject, $this->getWrappedObject());
                    \PHPUnit_Framework_Assert::assertNotSame($subject->email, $this->getWrappedObject()->email);
                    \PHPUnit_Framework_Assert::assertNotSame($subject->name, $this->getWrappedObject()->name);
                } catch (\PHPUnit_Framework_AssertionFailedError $caught) {
                    throw new FailureException(
                        "Active should create another object (clone) to maintain state. All properties should be cloned to."
                    );
                }

                $method = "is" . ucfirst($property);

                if ($subject->{$method}() !== $expectedState) {
                    throw new FailureException(
                        "The state is not the expected one."
                    );
                }
                return true;
            }
        ];
    }

    function it_has_a_state()
    {
        $this->isActive()->shouldBe(true);
    }

    function it_has_a_confirmation_status()
    {
        $this->isConfirmed()->shouldBe(false);
    }

    function it_can_be_confirmed()
    {
        $this->confirm(true)->shouldBeACloneWith('confirmed', true);
    }
}
