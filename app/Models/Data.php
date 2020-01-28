<?php

namespace App\Models;

use Valkyrja\Model\Model;

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
