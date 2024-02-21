<?php
declare(strict_types=1);

namespace Api\Models\Factories;

use Api\Models\Helpers\{ Connection, DBConfig, InputReader };

/**
 *
 */
final class ConnectionFactory
{

    public function create(): Connection
    {
        $config = self::getConfig();

        return new Connection($config);
    }

    private function getConfig(): DBConfig
    {
        $content = (new InputReader())->readYAML("./.config.yml");

        $dsn  = $content["dbconfig"]["dsn"];
        $user = $content["dbconfig"]["user"];
        $pass = $content["dbconfig"]["password"];

        return new DBConfig($dsn, $user, $pass);
    }
}