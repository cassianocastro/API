<?php
declare(strict_types=1);

namespace Controllers;

use Models\Helpers\Response;
use Views\{ JSONDocument, Renderer };

/**
 *
 */
final class ErrorController implements namespace\InterfacePageController
{

    public function showPageAction(): void
    {
        #http_response_code(404);
        $json = (new Response(404, "Verify the typed URL."))->toJSON();
        (new Renderer())->render(new JSONDocument($json));
    }

}