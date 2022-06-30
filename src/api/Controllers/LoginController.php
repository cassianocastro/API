<?php
declare(strict_types=1);

namespace Api\Controllers;

use Api\Http\{ Request, Response, Status };
use Api\Views\HTMLDocument;

/**
 *
 */
final class LoginController implements Controller
{

    public function index(Request $request): Response
    {
        return new Response(new Status(200), new HTMLDocument("login.php"));
    }
}