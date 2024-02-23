<?php
declare(strict_types=1);

namespace Api\Services;

use Api\Http\{ Request, Response };
use Api\Models\Entities\Student;
use Api\Models\Factories\ConnectionFactory;
use Api\Models\Helpers\JSONParser;
use Api\Models\Repository\StudentDAO;

/**
 *
 */
final class StudentsService
{

	public function getStudents(Request $request): Response
	{
        $connection = (new ConnectionFactory())->create();
		$result     = (new StudentDAO($connection))->getAll();
        $connection->__destruct();

        if ( empty($result) )
        {
            $result = "No registers found.";
        }

        $json = (new JSONParser())->encodeToJSON($result);

        return new Response(200, $json);
	}

	public function getStudentByID(Request $request): Response
	{
        $connection = (new ConnectionFactory())->create();
		$result     = (new StudentDAO($connection))->findByID(0);
        $connection->__destruct();

        if ( empty($result) )
        {
            $result = "Student not found.";
        }

        $json = (new JSONParser())->encodeToJSON($result);

        return new Response(200, $json);
	}

    public function post(Request $request): Response
    {
        //(new StudentDAO())->insert(new Student());

        $json = (new JSONParser())->encodeToJSON("Register inserted.");

        return new Response(201, $json);
    }

    public function put(Request $request): Response
    {
        //(new StudentDAO())->update(new Student());

        $json = (new JSONParser())->encodeToJSON("Register updated.");

        return new Response(200, $json);
    }

    public function delete(Request $request): Response
    {
        //((new StudentDAO())->delete(new Student("Victor", 16, $id)));

        $json = (new JSONParser())->encodeToJSON("Register removed.");

        return new Response(200, $json);
    }
}