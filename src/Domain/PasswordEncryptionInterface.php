<?php

/**
 * This file is part of Slick/People package
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Slick\People\Domain;

/**
 * Password Encryption Interface
 *
 * @package Slick\People\Domain
 * @author  Filipe Silva <silvam.filipe@gmail.com>
 */
interface PasswordEncryptionInterface
{

    /**
     * Set plain password to be hashed
     *
     * @param string $plainPassword
     *
     * @return self|$this|PasswordEncryptionInterface
     */
    public function setPassword($plainPassword);

    /**
     * Computes the password hash and returns it
     *
     * @return string
     */
    public function hash();

    /**
     * Check if hash matches provided password
     *
     * @param string $hash
     *
     * @return bool
     */
    public function match($hash);

    /**
     * Returns the hashed version of provided password
     *
     * @return string
     */
    public function __toString();
}
