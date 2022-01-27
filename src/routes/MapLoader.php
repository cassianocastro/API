<?php
declare(strict_types=1);

namespace Routes;

use Controllers\{
    StudentsController,
    DisciplinesController,
    HomeController,
    InfoController,
    LoginController
};

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
        $this->map->addRoute('/', "GET", function() {
            (new HomeController())->showPageAction();
        });

        $this->map->addRoute('/info', "GET", function() {
            (new InfoController())->showPageAction();
        });

        $this->map->addRoute('/login', "GET", function() {
            (new LoginController())->showPageAction();
        });

        $this->map->addRoute('/disciplines', "GET", function() {
            (new DisciplinesController())->get();
        });

        $this->map->addRoute('/disciplines/:i', "GET", function() {
            (new DisciplinesController())->get();
        });

        $this->map->addRoute('/students', "GET", function() {
            (new StudentsController())->get();
        });

		$this->map->addRoute('/students', "POST", function() {
            (new StudentsController())->post();
        });

        $this->map->addRoute('/students/:i', "GET", function(array $data) {
            (new StudentsController())->get($data);
        });

        $this->map->addRoute('/students/:i', "PUT", function() {
            (new StudentsController())->put();
        });

        $this->map->addRoute('/students/:i', "DELETE", function() {
            (new StudentsController())->delete();
        });
    }
}