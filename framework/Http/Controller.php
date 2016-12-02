<?php

/*
 * This file is part of the Valkyrja framework.
 *
 * (c) Melech Mizrachi
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Valkyrja\Http;

use Valkyrja\Contracts\Http\Controller as ControllerContract;

/**
 * Class Controller
 *
 * @package Valkyrja\Http
 *
 * @author  Melech Mizrachi
 */
abstract class Controller implements ControllerContract
{
    /**
     * Before any action is called.
     */
    public function before()
    {
    }

    /**
     * After any action is called.
     */
    public function after()
    {
    }
}
