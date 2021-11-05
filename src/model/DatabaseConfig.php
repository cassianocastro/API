<?php
declare(strict_types = 1);

namespace Models;

/**
 * 
 */
final class DatabaseConfig
{
   
    private const DRIVER   = "mysql";
    private const HOST     = "localhost";
    private const DBNAME   = "t308";
    private const USER     = "root";
    private const PASSWORD = "";

    public function getUser(): string
    {
        return self::USER;
    }

    public function getPassword(): string
    {
        return self::PASSWORD;
    }

    public function getDSN(): string
    {
        return self::DRIVER . ":host=" . self::HOST . ";dbname=" . self::DBNAME;
    }

}

?>