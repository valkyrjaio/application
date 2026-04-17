<?php

// phpcs:ignoreFile

declare(strict_types=1);

/*
 * This file is part of the Valkyrja Framework package.
 *
 * (c) Melech Mizrachi <melechmizrachi@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Cli\Provider\Data;

use Valkyrja\Event\Data\EventData;

final readonly class AppEventData extends EventData
{
    public function __construct()
    {
        parent::__construct(
            events: [],
            listeners: [],
        );
    }
}
