<?php
declare(strict_types=1);

namespace Api\Models\Helpers;

/**
 *
 */
final class DBConfig
{

    private const DRIVER   = "mysql";
    private const HOST     = "localhost";
    private const DBNAME   = "t308";
    private const USER     = "modifier";
    private const PASSWORD = "modifier";

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
        return sprintf(
            "%s:host=%s;dbname=%s;port=%d;charset=%s",
            self::DRIVER,
            self::HOST,
            self::DBNAME,
            3306,
            "utf8"
        );
    }
}