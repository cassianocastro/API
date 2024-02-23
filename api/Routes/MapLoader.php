<?php
declare(strict_types=1);

namespace Api\Routes;

use Api\Controllers\{ StudentsController, DisciplinesController };
use Api\Http\{ Request, Method };

/**
 *
 */
final class MapLoader
{

    private RoutesMap $map;

    public function __construct(RoutesMap $map)
    {
        $this->map = $map;
    }

    public function load(): void
    {
        $this->map->addRoute('/disciplines', Method::GET, function(Request $request) {
            (new DisciplinesController())->get($request);
        });

        $this->map->addRoute('/disciplines/:i', Method::GET, function(Request $request) {
            (new DisciplinesController())->get($request);
        });

        $this->map->addRoute('/students', Method::GET, function(Request $request) {
            return (new StudentsController())->getStudents($request);
        });

		$this->map->addRoute('/students', Method::POST, function(Request $request) {
            return (new StudentsController())->post($request);
        });

        $this->map->addRoute('/students/:i', Method::GET, function(Request $request) {
            return (new StudentsController())->getStudentByID($request);
        });

        $this->map->addRoute('/students/:i', Method::PUT, function(Request $request) {
            return (new StudentsController())->put($request);
        });

        $this->map->addRoute('/students/:i', Method::DELETE, function(Request $request) {
            return (new StudentsController())->delete($request);
        });
    }
}