<?php
declare(strict_types=1);

namespace Api\Routes;

use Closure;
use Api\Http\Method;

/**
 *
 */
final class RoutesMap
{

    private array $routes;

    public function __construct()
    {
        $this->routes = [];
    }

    public function addRoute(string $expression, Method $method, Closure $callback): void
    {
        $this->routes[$method->value][$expression] = $callback;
    }

    public function contains(string $path): Closure
    {
        function getPattern(string $expression): string
        {
            $pattern = str_replace(
                [":i", ":s", "/", "."],
                ["([0-9]*)", "([A-Za-z]*)", "\/", "\."],
                $expression
            );

            return "/^$pattern$/i";
        }

        foreach ( $this->routes as $method => $routes )
        {
            foreach ( $routes as $expression => $callback )
            {
                $pattern = getPattern($expression);

                if ( preg_match($pattern, $path) ) return $callback;
            }
        }

        throw new RouteNotFoundException();
    }
}