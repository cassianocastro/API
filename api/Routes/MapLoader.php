<?php
declare(strict_types=1);

namespace Api\Routes;

use Api\Services\{ StudentsService, DisciplinesService };
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
            (new DisciplinesService())->get($request);
        });

        $this->map->addRoute('/disciplines/:i', Method::GET, function(Request $request) {
            (new DisciplinesService())->get($request);
        });

        $this->map->addRoute('/students', Method::GET, function(Request $request) {
            return (new StudentsService())->getStudents($request);
        });

		$this->map->addRoute('/students', Method::POST, function(Request $request) {
            return (new StudentsService())->post($request);
        });

        $this->map->addRoute('/students/:i', Method::GET, function(Request $request) {
            return (new StudentsService())->getStudentByID($request);
        });

        $this->map->addRoute('/students/:i', Method::PUT, function(Request $request) {
            return (new StudentsService())->put($request);
        });

        $this->map->addRoute('/students/:i', Method::DELETE, function(Request $request) {
            return (new StudentsService())->delete($request);
        });
    }
}