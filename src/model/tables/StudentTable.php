<?php
declare(strict_types=1);

namespace Models\Tables;

use PDO, Exception;
use Models\{
	Creational\PDOSingleton,
	Entities\Student
};

/**
 *
 */
final class StudentTable
{

	private PDO $pdo;

    public function __construct()
    {
        $this->pdo = PDOSingleton::getInstance();
    }

    public function insert(Student $student): bool
    {
        try {
            $statement = $this->pdo->prepare(
                "INSERT INTO alunos (nome, idade) VALUES (?, ?)"
            );
            $statement->bindValue(1, $student->getName());
            $statement->bindValue(2, $student->getAge());
            return $statement->execute();
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function update(Student $student): bool
    {
        try {
            $statement = $this->pdo->prepare(
                "UPDATE alunos SET nome = ?, idade = ? WHERE id = ?"
            );
            $statement->bindValue(1, $student->getName());
            $statement->bindValue(2, $student->getAge());
            $statement->bindValue(3, $student->getID());
            return $statement->execute();
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function delete(Student $student): bool
    {
        try {
            $statement = $this->pdo->prepare(
                "DELETE FROM alunos WHERE id = ?"
            );
            $statement->bindValue(1, $student->getID());
            return $statement->execute();
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getAll(): array
    {
        try {
            $statement = $this->pdo->prepare("SELECT * FROM alunos");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function findByID(int $id): array | false
    {
        try {
            $statement = $this->pdo->prepare(
                "SELECT * FROM alunos WHERE id = ?"
            );
            $statement->bindParam(1, $id);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            throw $e;
        }
    }
}