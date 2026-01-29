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

namespace App\Orm\Entity;

use Valkyrja\Auth\Entity\Contract\UserContract;
use Valkyrja\Auth\Entity\Contract\VerifiableUserContract;
use Valkyrja\Auth\Entity\Trait\MailableUserMethods;
use Valkyrja\Auth\Entity\Trait\UserMethods;
use Valkyrja\Auth\Entity\Trait\VerifiableUserMethods;
use Valkyrja\Notification\Entity\Contract\NotifiableUserContract;
use Valkyrja\Notification\Entity\Trait\NotifiableUserTrait;
use Valkyrja\Orm\Entity\Abstract\Entity;
use Valkyrja\Orm\Entity\Contract\DatedEntityContract;
use Valkyrja\Orm\Entity\Contract\SoftDeleteEntityContract;
use Valkyrja\Orm\Entity\Trait\Dateable;
use Valkyrja\Orm\Entity\Trait\SoftDeletable;

/**
 * Entity User.
 */
class User extends Entity implements UserContract, DatedEntityContract, NotifiableUserContract, SoftDeleteEntityContract, VerifiableUserContract
{
    use Dateable;
    use MailableUserMethods;
    use NotifiableUserTrait;
    use SoftDeletable;
    use UserMethods;
    use VerifiableUserMethods;

    /**
     * A field that requires extra logic.
     *
     * @var string
     */
    protected string $needsExtraLogic;

    /**
     * Getter for a property that needs extra logic before getting.
     *
     * @return string
     */
    protected function getNeedsExtraLogic(): string
    {
        // Do extra logic before getting

        return $this->needsExtraLogic;
    }

    /**
     * Setter for a property that needs extra logic before setting.
     *
     * @param string $needsExtraLogic
     *
     * @return void
     */
    protected function setNeedsExtraLogic(string $needsExtraLogic): void
    {
        // Do extra checks before setting

        $this->needsExtraLogic = $needsExtraLogic;
    }
}
