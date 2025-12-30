<?php

declare(strict_types=1);

namespace App\Orm\Entity;

use Valkyrja\Auth\Entity\Contract\User as Contract;
use Valkyrja\Auth\Entity\Contract\VerifiableUser;
use Valkyrja\Auth\Entity\Trait\MailableUserTrait;
use Valkyrja\Auth\Entity\Trait\UserTrait;
use Valkyrja\Auth\Entity\Trait\VerifiableUserTrait;
use Valkyrja\Notification\Entity\Contract\NotifiableUser;
use Valkyrja\Notification\Entity\Trait\NotifiableUserTrait;
use Valkyrja\Orm\Entity\Contract\DatedEntity;
use Valkyrja\Orm\Entity\Contract\SoftDeleteEntity;
use Valkyrja\Orm\Entity\Trait\Dateable;
use Valkyrja\Orm\Entity\Abstract\Entity;
use Valkyrja\Orm\Entity\Trait\SoftDeletable;

/**
 * Entity User.
 */
class User extends Entity implements Contract, DatedEntity, NotifiableUser, SoftDeleteEntity, VerifiableUser
{
    use UserTrait;
    use Dateable;
    use MailableUserTrait;
    use NotifiableUserTrait;
    use SoftDeletable;
    use VerifiableUserTrait;

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
