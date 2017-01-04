<?php

/**
 * This file is part of slick/people package
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Slick\People\Service\Command\Handler;

use Slick\People\Service\Command\RegisterAccountCommand;

/**
 * Register Account Handler Interface
 *
 * @package Slick\People\Service\Command\Handler
 * @author  Filipe Silva <silvam.filipe@gmail.com>
 */
interface RegisterAccountHandlerInterface
{

    /**
     * @param RegisterAccountCommand $command
     *
     * @return mixed
     */
    public function handle(RegisterAccountCommand $command);
}