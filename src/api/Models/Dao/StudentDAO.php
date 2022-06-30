<?php
declare(strict_types=1);

namespace Api\Models\Tables;

use PDO;
use Api\Models\Entities\Student;
use Api\Models\Helpers\Connection;

/**
 *
 */
final class StudentDAO
{

	private PDO $pdo;

    public function __construct(Connection $connection)
    {
        $this->pdo = $connection->getPDO();
    }

    public function insert(Student $student): void
    {
		$statement = $this->pdo->prepare(
			"INSERT INTO students(name, age) VALUES (?, ?)"
		);
		$statement->bindValue(1, $student->getName(), PDO::PARAM_STR);
		$statement->bindValue(2, $student->getAge(), PDO::PARAM_INT);

		$statement->execute();
    }

    public function update(Student $student): void
    {
		$statement = $this->pdo->prepare(
			"UPDATE students SET name = ?, age = ? WHERE ID = ?"
		);
		$statement->bindValue(1, $student->getName(), PDO::PARAM_STR);
		$statement->bindValue(2, $student->getAge(), PDO::PARAM_INT);
		$statement->bindValue(3, $student->getID(), PDO::PARAM_INT);

		$statement->execute();
    }

    public function delete(Student $student): void
    {
		$statement = $this->pdo->prepare(
			"DELETE FROM students WHERE ID = ?"
		);
		$statement->bindValue(1, $student->getID(), PDO::PARAM_INT);

		$statement->execute();
    }

    public function getAll(): iterable
    {
		$statement = $this->pdo->query(
			"SELECT ID, name, age FROM students"
		);

		return $statement->fetchAll();
    }

    public function findByID(int $id): iterable
    {
		$statement = $this->pdo->prepare(
			"SELECT name, age FROM students WHERE ID = ?"
		);
		$statement->bindValue(1, $id, PDO::PARAM_INT);
		$statement->execute();

		return $statement->fetch();
    }
}