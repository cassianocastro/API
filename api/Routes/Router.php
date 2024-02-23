<?php
declare(strict_types=1);

namespace Api\Routes;

use Api\Http\{ Request, Browser };

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

    public function dispatch(Request $request): void
    {
        $path = $request->getPath();

        try
        {
            if ( $callback = $this->map->contains($path) )
            {
                $response = call_user_func($callback, $request);

                Browser::render($response);
            }
        }
        catch ( RouteNotFoundException $e )
        {
            throw $e;
        }
    }
}