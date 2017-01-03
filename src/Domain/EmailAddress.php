<?php

/**
 * This file is part of slick/people package
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Slick\People\Domain;

use Slick\People\Exception\InvalidEmailAddressException;
use Slick\Validator\StaticValidator;

/**
 * E-mail Address
 *
 * @package Slick\People\Domain
 * @author  Filipe Silva <silvam.filipe@gmail.com>
*/
class EmailAddress
{
    /**
     * @var string
     */
    private $address;

    /**
     * Creates an E-mail Address
     *
     * @param string $emailAddress
     *
     * @throws InvalidEmailAddressException if the provided e-mail address is
     *                                      not a valid address.
     */
    public function __construct($emailAddress)
    {
        if (! StaticValidator::validates('email', $emailAddress)) {
            throw new InvalidEmailAddressException(
                "The email address '{$emailAddress}' is not valid."
            );
        }
        $this->address = $emailAddress;
    }

    /**
     * Returns the e-mail address as a string
     *
     * @return string
     */
    public function __toString()
    {
        return $this->address;
    }
}
