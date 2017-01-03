<?php

/**
 * This file is part of Slick/People package
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Slick\People\Exception;

use InvalidArgumentException;
use Slick\People\Exception;

/**
 * Invalid Email Address Exception
 *
 * @package Slick\People\Exception
 * @author  Filipe Silva <silvam.filipe@gmail.com>
 */
class InvalidEmailAddressException extends InvalidArgumentException implements
    Exception
{

}
