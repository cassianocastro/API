<?php
declare(strict_types = 1);

namespace Service;

use Service\RoutesMap;
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

        $this->map->addRoute('/disciplinas', "GET", function() {
            (new DisciplinesController())->showDisciplinesAction();
        });

        $this->map->addRoute('/disciplinas/:i', "GET", function($id) {
            (new DisciplinesController())->showDisciplinesAction(intval($id[0]));
        });

        $this->map->addRoute('/alunos', "GET", function() {
            (new StudentsController())->showStudentsAction();
        });

        $this->map->addRoute('/alunos/:i', "GET", function($id) {
            (new StudentsController())->showStudentsAction(intval($id[1]));
        });

        $this->map->addRoute('/alunos', "POST", function($data) {
            (new StudentsController())->insertStudentAction();
        });

        $this->map->addRoute('/alunos/:i', "PUT", function($id, $data) {
            (new StudentsController())->updateStudentAction(intval($id[0]));
        });

        $this->map->addRoute('/alunos/:i', "DELETE", function($id) {
            (new StudentsController())->deleteStudentAction(intval($id[0]));
        });
    }
}

?>