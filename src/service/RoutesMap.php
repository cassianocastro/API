<?php 
declare(strict_types = 1);

namespace Service;

/**
 * 
 */
final class RoutesMap
{
    
    private array $array;

    public function __construct()
    {
        $this->array = array();
    }

    /**
    * Function used to add a new route
    * @param string $expression    Route string or expression
    * @param callable $callback    Function to call if route with allowed method is found
    * @param string|array $method  Either a string of allowed method or an array with string values
    */
    public function addRoute(string $expression, string $method, callable $callback): void
    {
        $this->array[] = array(
            "expression" => $expression,
            "method"     => $method,
            "callback"   => $callback 
        );
    }

    public function getRoutes(): array
    {
        return $this->array;
    }
}

?>