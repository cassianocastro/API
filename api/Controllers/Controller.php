<?php
declare(strict_types=1);

namespace Api\Controllers;

use Api\Http\{ Request, Response };

/**
 *
 */
interface Controller
{

    public function index(Request $request): Response;
}