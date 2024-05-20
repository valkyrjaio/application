<?php

declare(strict_types=1);

namespace App\Models;

use Valkyrja\Type\Model\Model;

/**
 * Model Data.
 */
class Data extends Model
{
    /**
     * @var int
     */
    public int $id;

    /**
     * @var string
     */
    protected string $needsExtraLogic;

    /**
     * Getter for a property with extra logic.
     *
     * @return string
     */
    protected function getNeedsExtraLogic(): string
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
    protected function setNeedsExtraLogic(string $needsExtraLogic): void
    {
        // Do extra checks before setting

        $this->needsExtraLogic = $needsExtraLogic;
    }
}
