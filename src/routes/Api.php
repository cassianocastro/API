<?php
declare(strict_types=1);

namespace Routes;

/**
 *
 */
final class Api
{

    private RoutesMap $map;
    private Router $router;

    public function __construct()
    {
        $this->map    = new RoutesMap();
        $this->router = new Router($this->map);
    }

    public function loadMap(): void
    {
        (new MapLoader($this->map))->load();
    }

    public function setRequestAndDispatch(/*Request $request*/): void
    {
        $this->router->dispatch();
    }
}