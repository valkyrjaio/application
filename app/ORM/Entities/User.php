<?php

declare(strict_types=1);

namespace App\ORM\Entities;

use Valkyrja\Auth\Entities\MailableUserTrait;
use Valkyrja\Auth\Entities\UserTrait;
use Valkyrja\Auth\Entities\VerifiableUserTrait;
use Valkyrja\Auth\User as Contract;
use Valkyrja\Auth\VerifiableUser;
use Valkyrja\Notification\Entities\NotifiableUserTrait;
use Valkyrja\Notification\NotifiableUser;
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
