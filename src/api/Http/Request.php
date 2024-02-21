<?php
declare(strict_types=1);

namespace Api\Http;

/**
 *
 */
final class Request
{

    public function __construct()
    {
        #$this->var = $var;
    }

    // $path   = $this->getPath();
    // $method = $_SERVER["REQUEST_METHOD"];

    public function getPath(): string
    {
        $path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

        if ( $path != "/" )
        {
            $path = rtrim($path, "/");
        }

        return $path;
    }
}