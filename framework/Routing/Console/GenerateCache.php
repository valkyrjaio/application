<?php

/*
 * This file is part of the Valkyrja framework.
 *
 * (c) Melech Mizrachi
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Valkyrja\Routing\Console;

use Valkyrja\Console\CommandHandler;

/**
 * Class GenerateCache
 *
 * @package Valkyrja\Routing\Console
 *
 * @author  Melech Mizrachi
 */
class GenerateCache extends CommandHandler
{
    /**
     * Run the command.
     *
     * @return mixed
     */
    public function run()
    {
        return file_put_contents(
            config()->routing->routesCacheFile,
            '<?php return ' . var_export(router()->getRoutes(), true) . ';'
        );
    }
}
