<?php

declare(strict_types=1);

/*
 * This file is part of the Valkyrja Application package.
 *
 * (c) Melech Mizrachi <melechmizrachi@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Orm\Repository;

use App\Orm\Entity\User;
use Valkyrja\Orm\Repository\Repository;

/**
 * @extends Repository<User>
 */
class UserRepository extends Repository
{
    // We can do custom stuff for all User entities.
    //  Examples:
    //      $entityManager->getRepository(User::class)->create(new User());
}
