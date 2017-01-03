<?php

/**
 * This file is part of slick/people package
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Slick\People\Domain;

/**
 * Password
 *
 * @package Slick\People\Domain
 * @author  Filipe Silva <silvam.filipe@gmail.com>
*/
class Password implements PasswordEncryptionInterface
{
    /**
     * Password entropy cost
     */
    const COST = 13;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $hash;

    /**
     * Creates a password
     *
     * @param string $plainPassword
     */
    public function __construct($plainPassword)
    {
        $this->setPassword($plainPassword);
    }

    /**
     * Set plain password to be hashed
     *
     * @param string $plainPassword
     *
     * @return Password|PasswordEncryptionInterface
     */
    public function setPassword($plainPassword)
    {
        $this->password = $plainPassword;
        return $this->hashPassword();
    }

    /**
     * Computes the password hash and returns it
     *
     * @return string
     */
    public function hash()
    {
        return $this->hash;
    }

    /**
     * Check if hash matches provided password
     *
     * @param string $hash
     *
     * @return bool
     */
    public function match($hash)
    {
        return (boolean) password_verify($this->password, $hash);
    }

    /**
     * Returns the hashed version of provided password
     *
     * @return string
     */
    public function __toString()
    {
        return $this->hash();
    }

    /**
     * Generate the hash for current password
     *
     * @return Password
     */
    private function hashPassword()
    {
        $this->hash = password_hash(
            $this->password,
            PASSWORD_BCRYPT,
            ['cost' => self::COST]
        );
        return $this;
    }
}