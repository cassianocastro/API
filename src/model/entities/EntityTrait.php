<?php
declare(strict_types=1);

namespace Models\Entities;

/**
 *
 */
trait EntityTrait
{

    private int $id;

    public function getID(): int
    {
        return $this->id;
    }
}