<?php
declare(strict_types=1);

namespace Controllers;

use Models\{
	Entities\Student,
	Helpers\Response,
	Helpers\InputReader,
	Tables\StudentTable
};
use Views\{ JSONDocument, Renderer };

/**
 *
 */
final class StudentsController
{

	private function getAll(): void
	{
		$result = (new StudentTable())->getAll();

		if ( ! empty($result) )
			$json = (new Response(200, $result))->toJSON();
		else
			$json = (new Response(200, "No registers."))->toJSON();

		(new Renderer())->render(new JSONDocument($json));
	}

	private function getByID(array $data): void
	{
		$id     = intval($data[1]);
		$result = (new StudentTable())->findByID($id);

		if ( ! empty($result) )
			$json = (new Response(200, $result))->toJSON();
		else
			$json = (new Response(200, "Student not found."))->toJSON();

		(new Renderer())->render(new JSONDocument($json));
	}

    public function get(?array $data = null): void
    {
		if ( is_null($data) or empty($data) )
			$this->getAll();
		else
			$this->getByID($data);
    }

    public function post(): void
    {
		$data        = (new InputReader())->getData();
        $wasInserted = (new StudentTable())->insert(new Student(...$data));

        if ( $wasInserted )
			$json = (new Response(201, "Register inserted."))->toJSON();
        else
			$json = (new Response(400, "Couldn't insert the register."))->toJSON();

        (new Renderer())->render(new JSONDocument($json));
    }

    public function put(): void
    {
		$data       = (new InputReader())->getData();
        $wasUpdated = (new StudentTable())->update(new Student(...$data));

        if ( $wasUpdated )
			$json = (new Response(200, "Register updated."))->toJSON();
        else
			$json = (new Response(400, "Inexistent ID/Incorrect URL."))->toJSON();

		(new Renderer())->render(new JSONDocument($json));
    }

    public function delete(): void
    {
        $wasRemoved = ((new StudentTable())->delete(new Student("Victor", 16, $id)));

        if ( $wasRemoved )
			$json = (new Response(200, "Register removed."))->toJSON();
        else
			$json = (new Response(400, "Inexistent ID/Incorrect URL."))->toJSON();

		(new Renderer())->render(new JSONDocument($json));
    }
}