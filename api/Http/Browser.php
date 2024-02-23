<?php
declare(strict_types=1);

namespace Api\Http;

/**
 *
 */
final class Browser
{

    static public function render(Response $response): void
    {
        print $response->__toString();
    }
}