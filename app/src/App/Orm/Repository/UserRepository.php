<?php

declare(strict_types=1);

/*
 * This file is part of the Valkyrja Framework package.
 *
 * (c) Melech Mizrachi <melechmizrachi@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Orm\Repository;

use Valkyrja\Orm\Repository\Repository;

class UserRepository extends Repository
{
    // We can do custom stuff for all User entities.
    //  Examples:
    //      $entityManager->getRepository(User::class)->create(new User());
}
