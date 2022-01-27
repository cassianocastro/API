<?php
declare(strict_types=1);

namespace Controllers;

use Routes\Server;
use Views\{ HTMLDocument, Renderer };

/**
 *
 */
final class InfoController implements namespace\InterfacePageController
{

    public function showPageAction(): void
    {
        $info = (new Server())->getAll();
        (new Renderer())->render(new HTMLDocument("/html/info.php", $info));
    }

}