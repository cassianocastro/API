<?php
declare(strict_types=1);

namespace Api\Models\Entities;

/**
 *
 */
abstract class Entity
{

    private int $id;

	public function __construct(int $id)
	{
		$this->id = $id;
	}

    public function getID(): int
    {
        return $this->id;
    }
}