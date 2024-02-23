<?php
declare(strict_types=1);

namespace Api\Models\Helpers;

use PDO, PDOException;

/**
 *
 */
final class Connection
{

    private ?PDO $pdo;

    public function __construct(DBConfig $config)
    {
        self::init($config);
    }

    public function __destruct()
    {
        $this->pdo = NULL;
    }

    public function getPDO(): PDO
    {
        return $this->pdo;
    }

	private function init(DBConfig $config): void
	{
        try
        {
            $this->pdo = new PDO(
                $config->getDSN(),
                $config->getUser(),
                $config->getPassword(),
                [
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
        }
        catch ( PDOException $e )
        {
            die($e->getMessage());
        }
	}
}