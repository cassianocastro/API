<?php
declare(strict_types=1);

namespace Api\Controllers;

use Api\Http\{ Request, Response, Status, Server };
use Api\Views\HTMLDocument;

/**
 *
 */
final class InfoController implements Controller
{

    public function index(Request $request): Response
    {
        $info = (new Server())->getAll();

        return new Response(
            new Status(200),
            new HTMLDocument("info.php", $info)
        );
    }
}