<?php

namespace App\Models;

use App\Repositories\UserRepository;
use Valkyrja\ORM\NativeEntity;

/**
 * Entity User.
 */
class User extends NativeEntity
{
    /**
     * The table name.
     *
     * @var string
     */
    protected static string $table = 'user';

    /**
     * The ORM repository to use.
     *
     * @var string|null
     */
    protected static ?string $repository = UserRepository::class;

    /**
     * @var int
     */
    public int $id;

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
     * Getter for a property with extra logic.
     *
     * @return string
     */
    public function getNeedsExtraLogic(): string
    {
        // Do extra logic before getting

        return $this->needsExtraLogic;
    }

    /**
     * Setter for a property with extra logic.
     *
     * @param string $needsExtraLogic
     *
     * @return void
     */
    public function setNeedsExtraLogic(string $needsExtraLogic): void
    {
        // Do extra checks before setting

        $this->needsExtraLogic = $needsExtraLogic;
    }
}
