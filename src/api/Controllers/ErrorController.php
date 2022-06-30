<?php
declare(strict_types=1);

namespace Api\Controllers;

use Api\Http\{ Request, Response, Status };
use Api\Models\Helpers\JSONParser;
use Api\Views\JSONDocument;

/**
 *
 */
final class ErrorController implements Controller
{

    public function index(Request $request): Response
    {
        $json = (new JSONParser())->encodeToJSON("Verify the typed URL.");

        return new Response(new Status(404), new JSONDocument($json));
    }
}