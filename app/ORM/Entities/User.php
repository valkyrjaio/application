<?php

namespace App\ORM\Entities;

use App\ORM\Repositories\UserRepository;
use Valkyrja\Auth\Entities\MailableUserFields;
use Valkyrja\Auth\Entities\UserFields;
use Valkyrja\Auth\Entities\VerifiableUserFields;
use Valkyrja\Auth\User as Contract;
use Valkyrja\Auth\VerifiableUser;
use Valkyrja\Notification\Entities\NotifiableUserFields;
use Valkyrja\Notification\NotifiableUser;
use Valkyrja\ORM\DatedEntity;
use Valkyrja\ORM\Entities\DatedEntityFields;
use Valkyrja\ORM\Entities\Entity;
use Valkyrja\ORM\Entities\SoftDeleteEntityFields;
use Valkyrja\ORM\SoftDeleteEntity;

/**
 * Entity User.
 */
class User extends Entity implements Contract, DatedEntity, NotifiableUser, SoftDeleteEntity, VerifiableUser
{
    use UserFields;
    use DatedEntityFields;
    use MailableUserFields;
    use NotifiableUserFields;
    use SoftDeleteEntityFields;
    use VerifiableUserFields;

    /**
     * The ORM repository to use.
     *
     * @var string|null
     */
    protected static ?string $repository = UserRepository::class;

    /**
     * The table name.
     *
     * @var string
     */
    protected static string $table = 'user';

    /**
     * The username field.
     *
     * @var string
     */
    protected static string $usernameField = 'email';

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
