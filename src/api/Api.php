<?php
declare(strict_types=1);

namespace Api;

use Api\Controllers\ErrorController;
use Api\Http\Request;
use Api\Routes\{ Router, RoutesMap, MapLoader, RouteNotFoundException };

/**
 *
 */
final class Api
{

    private Router $router;

    public function __construct()
    {
        self::setDirectives();
        self::createRouter();
    }

    private function createRouter(): void
    {
        $map = new RoutesMap();
        (new MapLoader($map))->load();

        $this->router = new Router($map);
    }

    private function setDirectives(): void
    {
        ini_set("display_errors", true);
        error_reporting(E_ALL);
        setlocale(LC_ALL, "");
    }

    public function receive(Request $request): void
    {
        try
        {
            $this->router->dispatch($request);
        }
        catch ( RouteNotFoundException $e )
        {
            (new ErrorController())->index($request);
        }
    }
}