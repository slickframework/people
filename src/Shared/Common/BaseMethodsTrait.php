<?php

/**
 * This file is part of People
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Slick\People\Shared\Common;

use Slick\Common\BaseMethods;

/**
 * Base Methods Trait
 *
 * Changed the hydrate method to write the ®read only properties to be written
 * without verifying the annotation.
 *
 * @package Slick\People\Shared\Common
 * @author  Filipe Silva <silvam.filipe@gmail.com>
 */
trait BaseMethodsTrait
{
    /**
     * Use all magic methods from Slick\Common\BaseMethods
     */
    use BaseMethods;

    /**
     * Sets current object with data from provided array or object
     *
     * @param array|object $data An associative array or object where to
     *                           extract the property values from.
     *
     * @return self The object instance it self for method call chaining.
     */
    public function hydrate($data)
    {
        if (! is_array($data) && ! is_object($data)) {
            return $this;
        }

        foreach ($data as $key => $value) {
            if (property_exists(__CLASS__, $key)) {
                $this->hydrateProperty($key, $value);
            }
        }

        return $this;
    }

    private function hydrateProperty($property, $value)
    {
        $method = "set" . ucfirst($property);
        if (method_exists($this, $method)) {
            return call_user_func_array([$this, $method], [$value]);
        }

        $this->{$property} = $value;
        return $this;
    }
}
