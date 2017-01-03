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
 * Account
 *
 * @package Slick\People\Domain
 * @author  Filipe Silva <silvam.filipe@gmail.com>
 *
 * @property-read mixed        $id
 * @property-read Name         $name
 * @property-read EmailAddress $email
 */
class Account
{

    /**
     * @read
     * @var mixed
     */
    protected $id;

    /**
     * @read
     * @var Name
     */
    protected $name;

    /**
     * @read
     * @var EmailAddress
     */
    protected $email;

    /**
     * @read
     * @var bool
     */
    protected $active = true;

    /**
     * @read
     * @var bool
     */
    protected $confirmed = false;

    /**
     * Used to manage getters and setters
     */
    use BaseMethodsTrait;

    /**
     * Creates an Account
     *
     * @param array $options
     */
    public function __construct($options = [])
    {
        $this->hydrate($options);
    }

    /**
     * Return an instance with the provided state
     *
     * @param boolean $state
     *
     * @return Account
     */
    public function active($state)
    {
        $account = clone $this;
        $account->active = $state;
        return $account;
    }

    /**
     * Get the account state
     *
     * @return bool
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * Return an instance with the provided confirmation status
     *
     * @param boolean $status
     *
     * @return Account
     */
    public function confirm($status)
    {
        $account = clone $this;
        $account->confirmed = $status;
        return $account;
    }

    /**
     * Get the account confirmation status
     *
     * @return bool
     */
    public function isConfirmed()
    {
        return $this->confirmed;
    }

    /**
     * Ensure deep cloning
     */
    public function __clone()
    {
        $this->email = clone $this->email;
        $this->name = clone $this->name;
    }

    /**
     * Set the name
     *
     * @param Name $name
     *
     * @return Account
     */
    protected function setName(Name $name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Set e-mail address
     *
     * @param EmailAddress $email
     *
     * @return Account
     */
    protected function setEmail(EmailAddress $email)
    {
        $this->email = $email;
        return $this;
    }
}
