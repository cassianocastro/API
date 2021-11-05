<?php 
declare(strict_types = 1);

namespace Controllers;

use Exception;
use Entities\Student, Tables\StudentTable;
use Models\{
    JSONParser, Response, Status
};
use Views\JSONDocument;
use Views\Renderer;

/**
 * 
 */
final class StudentsController
{

    public function showStudentsAction(?int $id = null): void
    {
        try {
            if ( is_null($id) ) {
                $result = (new StudentTable())->getAll();
                if ( ! empty($result) )
                    $json = (new Response(200, $result))->toJSON();    
                else
                    $json = (new Response(200, "Sem registros."))->toJSON();
                
            } else {
                $result = (new StudentTable())->findByID($id);
                if ( ! empty($result) )
                    $json = (new Response(200, $result))->toJSON();    
                else
                    $json = (new Response(200, "Student not found."))->toJSON();
            }
            (new Renderer())->render(new JSONDocument($json));
        } catch(Exception $e) {
            print $e->getMessage();
        }
    }

    public function insertStudentAction(): void
    {
        $student     = new Student("Daniela", 43);
        $wasInserted = (new StudentTable())->insert($student);

        if ( $wasInserted ) {
            $array = array(
                "status"  => (new Status())->getMessageFromCode(201),
                "message" => "Registro inserido."
            );
        } else {
            $array = array(
                "status"  => (new Status())->getMessageFromCode(400),
                "message" => "Não foi possível inserir o registro."
            );
        }
        print (new JSONParser())->encodeToJSON($array);
    }

    public function updateStudentAction(?int $id = null): void
    {
        $student    = new Student("Ariobaldo", 21, 23);
        $wasUpdated = (new StudentTable())->update($student);

        if ( $wasUpdated )
            $array = array(
                "status"  => (new Status())->getMessageFromCode(200),
                "message" => "Aluno atualizado."
            );
        else
            $array = array(
                "status"  => (new Status())->getMessageFromCode(400),
                "message" => "ID inexistente/URL incorreta."
            );
        print (new JSONParser())->encodeToJSON($array);
    }

    public function deleteStudentAction(?int $id = null): void
    {
        $student    = new Student("Victor", 16, $id);
        $wasRemoved = ((new StudentTable())->delete($student));

        if ( $wasRemoved )
            $array = array(
                "status"  => (new Status())->getMessageFromCode(200),
                "message" => "Registro removido!"
            );
        else
            $array = array(
                "status"  => (new Status())->getMessageFromCode(400),
                "message" => "ID inexistente/URL incorreta.",
            );
        print (new JSONParser())->encodeToJSON($array);
    }
}

?>