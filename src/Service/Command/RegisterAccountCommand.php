<?php

/**
 * This file is part of Slick\People package
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Slick\People\Service\Command;

use League\Tactician\Plugins\NamedCommand\NamedCommand;
use Slick\People\Domain\EmailAddress;
use Slick\People\Domain\Name;
use Slick\People\Domain\Password;

/**
 * Register Account Command
 *
 * @package Slick\People\Service\Command
 * @author  Filipe Silva <silvam.filipe@gmail.com>
 */
class RegisterAccountCommand
{

    /**
     * @var Name
     */
    private $name;

    /**
     * @var EmailAddress
     */
    private $email;

    /**
     * @var Password
     */
    private $password;

    /**
     * Creates a Register Account Command
     *
     * @param string $name
     * @param string $email
     * @param string $password
     */
    public function __construct($name, $email, $password)
    {
        $this->name = new Name($name);
        $this->email = new EmailAddress($email);
        $this->password = new Password($password);
    }

    /**
     * @return Name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return EmailAddress
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return Password
     */
    public function getPassword()
    {
        return $this->password;
    }

}
