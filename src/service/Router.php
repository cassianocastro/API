<?php
declare(strict_types = 1);

namespace Service;

use Controllers\ErrorController;
use Models\Input;

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
        $path = str_replace("/myProjects/API/API", "", $path);

        if ( $path != "/" ) {
            $path = rtrim($path, "/");
        }
        return $path;
    }

    public function dispatch(): void
    {
        $path   = $this->getPath();
        $method = (new Server())->getRequestMethod();
        $routes = $this->map->getRoutes();

        foreach ($routes as $route) {
            $pattern    = $this->getPattern($route["expression"]);
            $matchFound = preg_match($pattern, $path, $matches);
            
            if ( $matchFound and $method == $route["method"]) {
                #printf("%sPattern: %s\nPath: %s\n%s\n%s", "<pre>", $pattern, $path, print_r($matches, true), "</pre>");
                call_user_func_array($route["callback"], [$matches, (new Input())->getData()]);
                break;
            }
        }

        if ( ! $matchFound ) {
            (new ErrorController())->showPageAction();
        }
    }
}

?>