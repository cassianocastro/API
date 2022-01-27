<?php
declare(strict_types=1);

namespace Models\Entities;

/**
 *
 */
final class Discipline
{

    use EntityTrait;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

}