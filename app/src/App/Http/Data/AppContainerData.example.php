<?php

// phpcs:ignoreFile

declare(strict_types=1);

/*
 * This file is part of the Valkyrja Application package.
 *
 * (c) Melech Mizrachi <melechmizrachi@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Http\Data;

use Valkyrja\Container\Data\ContainerData;

final readonly class AppContainerData extends ContainerData
{
    public function __construct()
    {
        parent::__construct(
            aliases: [],
        );
    }
}
