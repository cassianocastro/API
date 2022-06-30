<?php
declare(strict_types=1);

namespace Api\Models\Entities;

/**
 *
 */
final class Student extends Entity
{

    private string $name;
    private int $age;

    public function __construct(string $name, int $age, int $id = 0)
    {
        parent::__construct($id);
        $this->name = $name;
        $this->age  = $age;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAge(): int
    {
        return $this->age;
    }
}