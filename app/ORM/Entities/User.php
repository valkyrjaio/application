<?php

namespace App\ORM\Entities;

use App\ORM\Repositories\UserRepository;
use Valkyrja\Auth\Entities\User as ValkyrjaUser;
use Valkyrja\ORM\DatedEntity;
use Valkyrja\ORM\Entities\DatedEntityFields;
use Valkyrja\ORM\Entities\SoftDeleteEntityFields;
use Valkyrja\ORM\SoftDeleteEntity;

/**
 * Entity User.
 */
class User extends ValkyrjaUser implements DatedEntity, SoftDeleteEntity
{
    use DatedEntityFields;
    use SoftDeleteEntityFields;

    /**
     * The ORM repository to use.
     *
     * @var string|null
     */
    protected static ?string $repository = UserRepository::class;

    /**
     * @var string
     */
    public string $name;

    /**
     * @var string
     */
    public string $email;

    /**
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
