<?php
declare(strict_types=1);

namespace Api\Controllers;

use Api\Http\{ Request, Response, Status };
use Api\Models\Entities\Student;
use Api\Models\Helpers\{ JSONParser, Connection };
use Api\Models\Tables\StudentDAO;
use Api\Views\JSONDocument;

/**
 *
 */
final class StudentsController
{

	public function getStudents(Request $request): Response
	{
        $connection = (new Connection());
		$result     = (new StudentDAO($connection))->getAll();
        $connection->__destruct();

        if ( empty($result) )
        {
            $result = "No registers found.";
        }
        $json = (new JSONParser())->encodeToJSON($result);

        return new Response(new Status(200), new JSONDocument($json));
	}

	public function getStudentByID(Request $request): Response
	{
		$id = 0; // intval($data[1]);
        $connection = (new Connection());
		$result     = (new StudentDAO($connection))->findByID($id);
        $connection->__destruct();

        if ( empty($result) )
        {
            $result = "Student not found.";
        }
        $json = (new JSONParser())->encodeToJSON($result);

        return new Response(new Status(200), new JSONDocument($json));
	}

    public function post(Request $request): Response
    {
        //(new StudentDAO())->insert(new Student());

        $json = (new JSONParser())->encodeToJSON("Register inserted.");

        return new Response(new Status(201), new JSONDocument($json));
    }

    public function put(Request $request): Response
    {
        //(new StudentDAO())->update(new Student());

        $json = (new JSONParser())->encodeToJSON("Register updated.");

        return new Response(new Status(200), new JSONDocument($json));
    }

    public function delete(Request $request): Response
    {
        //((new StudentDAO())->delete(new Student("Victor", 16, $id)));

        $json = (new JSONParser())->encodeToJSON("Register removed.");

        return new Response(new Status(200), new JSONDocument($json));
    }
}