<?php

/**
 * This file is part of slick/people package
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Slick\People\Domain;

/**
 * Name
 *
 * @package Slick\People\Domain
 * @author  Filipe Silva <silvam.filipe@gmail.com>
*/
class Name
{

    /**
     * Default name format, used in the __toString() method
     */
    const DEFAULT_FORMAT = '%f %m %l';

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $middleNames;

    /**
     * Create a Name object for provided full name
     *
     * @param string $fullName
     */
    public function __construct($fullName)
    {
        $this->splitNames($fullName);
    }

    /**
     * Get first name
     *
     * @return string
     */
    public function firstName()
    {
        return $this->firstName;
    }

    /**
     * Get last name
     *
     * @return string
     */
    public function lastName()
    {
        return $this->lastName;
    }

    /**
     * Get middle name(s)
     *
     * @return string
     */
    public function middleNames()
    {
        return $this->middleNames;
    }

    /**
     * Get the name formatted by provided format
     *
     * The format ca use the following placeholders:
     *  - %f: for the first name;
     *  - %m: for middle names;
     *  - %l: fot the last name.
     *
     * @param string $format
     *
     * @return string
     */
    public function format($format)
    {
        list($placeholders, $values) = $this->replacements();
        return str_replace($placeholders, $values, $format);
    }

    /**
     * Returns the string representation of a name
     *
     * @return string
     */
    public function __toString()
    {
        return $this->format(self::DEFAULT_FORMAT);
    }

    /**
     * Split names into first, middle and last names
     *
     * @param string $fullName
     *
     * @return Name
     */
    private function splitNames($fullName)
    {
        $names = explode(' ', $fullName);
        $this->firstName = array_shift($names);
        $this->lastName = array_pop($names);
        $this->middleNames = implode(' ', $names);

        return $this;
    }

    /**
     * Get the placeholders and the correspondent values
     *
     * @return array
     */
    private function replacements()
    {
        $placeholders = ['%f', '%m', '%l'];
        $values = [
            $this->firstName(),
            $this->middleNames(),
            $this->lastName()
        ];
        return [$placeholders, $values];
    }
}
