<?php
declare(strict_types=1);

namespace Api\Models\Repository;

use PDO;
use Api\Models\Entities\Discipline;

/**
 *
 */
final class DisciplineDAO
{

    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function insert(Discipline $discipline): void
    {

    }

    public function update(Discipline $discipline): void
    {

    }

    public function delete(Discipline $discipline): void
    {

    }

    public function getAll(): iterable
    {
        return [];
    }

    public function findByID(int $id): Discipline
    {
        return new Discipline(0);
    }
}