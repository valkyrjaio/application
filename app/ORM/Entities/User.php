<?php

declare(strict_types=1);

namespace App\ORM\Entities;

use Valkyrja\Auth\Entity\Contract\User as Contract;
use Valkyrja\Auth\Entity\Contract\VerifiableUser;
use Valkyrja\Auth\Entity\MailableUserTrait;
use Valkyrja\Auth\Entity\UserTrait;
use Valkyrja\Auth\Entity\VerifiableUserTrait;
use Valkyrja\Notification\Entity\Contract\NotifiableUser;
use Valkyrja\Notification\Entity\NotifiableUserTrait;
use Valkyrja\Orm\DatedEntity;
use Valkyrja\Orm\Entities\Dateable;
use Valkyrja\Orm\Entities\Entity;
use Valkyrja\Orm\Entities\SoftDeletable;
use Valkyrja\Orm\SoftDeleteEntity;

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
