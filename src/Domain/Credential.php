<?php

/**
 * This file is part of slick/people package
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Slick\People\Domain;

use Slick\People\Shared\Common\BaseMethodsTrait;

/**
 * Credential
 *
 * @package Slick\People\Domain
 * @author  Filipe Silva <silvam.filipe@gmail.com>
 *
 * @property-read mixed                       $id
 * @property-read string                      $username
 * @property-read EmailAddress                $email
 * @property-read PasswordEncryptionInterface $password
 * @property-read Account                     $account
 *
 * @method string getUsername()
 */
class Credential
{
    /**
     * @read
     * @var mixed
     */
    protected $id;

    /**
     * @read
     * @var string
     */
    protected $username;

    /**
     * @read
     * @var EmailAddress
     */
    protected $email;

    /**
     * @read
     * @var Password
     */
    protected $password;

    /**
     * @read
     * @var Account
     */
    protected $account;

    /**
     * Used to manage getters and setters
     */
    use BaseMethodsTrait;

    /**
     * Creates a credential
     *
     * @param array|object $options
     */
    public function __construct($options)
    {
        $this->hydrate($options);
    }

    /**
     * Set account
     *
     * @param Account $account
     *
     * @return Credential
     */
    protected function setAccount(Account $account)
    {
        $this->account = $account;
        return $this;
    }

    /**
     * Set e-mail address
     *
     * @param EmailAddress $emailAddress
     *
     * @return Credential
     */
    protected function setEmail(EmailAddress $emailAddress)
    {
        $this->email = $emailAddress;
        $parts = explode('@', (string) $emailAddress);
        $this->username = array_shift($parts);
        return $this;
    }

    /**
     * Set password
     *
     * @param PasswordEncryptionInterface $password
     *
     * @return Credential
     */
    protected function setPassword(PasswordEncryptionInterface $password)
    {
        $this->password = $password;
        return $this;
    }
}
