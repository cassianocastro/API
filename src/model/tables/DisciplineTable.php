<?php
declare(strict_types=1);

namespace Models\Tables;

use PDO;
use Models\{
	Creational\PDOSingleton,
	Entities\Discipline
};

/**
 *
 */
final class DisciplineTable
{

    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = PDOSingleton::getInstance();
    }

    public function insert(Discipline $discipline): bool
    {
        return false;
    }

    public function update(Discipline $discipline): bool
    {
        return false;
    }

    public function delete(Discipline $discipline): bool
    {
        return false;
    }

    public function getAll(): array
    {
        return [];
    }

    public function findByID(int $id): array
    {
        return [];
    }
}