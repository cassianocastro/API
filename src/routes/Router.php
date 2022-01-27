<?php
declare(strict_types=1);

namespace Routes;

use Controllers\ErrorController;

/**
 *
 */
final class Router
{

    private RoutesMap $map;

    public function __construct(RoutesMap $map)
    {
        $this->map = $map;
    }

    private function getPattern(string $expression): string
    {
        $pattern = str_replace(
            [":i", ":s", "/", "."],
            ["([0-9]*)", "([A-Za-z]*)", "\/", "\."],
            $expression
        );
        return "/^$pattern$/i";
    }

    private function getPath(): string
    {
        $path = parse_url((new Server())->getURI(), PHP_URL_PATH);

        if ( $path != "/" ) {
            $path = rtrim($path, "/");
        }
        return $path;
    }

    public function dispatch(): void
    {
		$match  = false;
		$routes = $this->map->getRoutes();
		$path   = $this->getPath();
        $method = (new Server())->getRequestMethod();

        foreach ($routes as $route) {
            if ( $method == $route["method"] ) {
				$pattern = $this->getPattern($route["expression"]);

				if ( preg_match($pattern, $path, $matches) ) {
					call_user_func($route["callback"], $matches);
					$match = true;
					break;
				}
            }
        }

        if ( ! $match ) {
            (new ErrorController())->showPageAction();
        }
    }
}