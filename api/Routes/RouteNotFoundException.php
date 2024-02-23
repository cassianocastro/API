<?php
declare(strict_types=1);

namespace Api\Routes;

use Exception, Throwable, Stringable;

/**
 *
 */
final class RouteNotFoundException extends Exception implements Stringable
{

    public function __construct(string $msg = "", int $code = 0, Throwable $th = NULL)
    {
        parent::__construct($msg, $code, $th);
    }

    public function __toString(): string
    {
        return "Route Not Found!";
    }
}