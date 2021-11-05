<?php
declare(strict_types = 1);

namespace Creational;

use PDO, Exception, Models\DatabaseConfig;

/**
 * 
 */
final class PDOSingleton
{
    
    private static ?PDO $pdo = null;

    private function __construct() {}

    public static function getInstance(): PDO
    {
        if ( is_null(static::$pdo) ) {
            $config = new DatabaseConfig();
            try {
                static::$pdo = new PDO(
                    $config->getDSN(),
                    $config->getUser(), 
                    $config->getPassword(), 
                    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")
                );
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        return static::$pdo;
    }
}

?>
