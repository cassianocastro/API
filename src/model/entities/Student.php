<?php
declare(strict_types = 1);

namespace Entities;

/**
 * 
 */
final class Student
{
    
    use EntityTrait;
    private string $name;
    private int $age;

    public function __construct(string $name, int $age, int $id = 0)
    {
        $this->id   = $id;
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

?>