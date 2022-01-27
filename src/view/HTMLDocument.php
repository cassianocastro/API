<?php
declare(strict_types=1);

namespace Views;

/**
 *
 */
final class HTMLDocument implements namespace\IDocument
{

    private string $path;
    private mixed $params;

    public function __construct(string $path, mixed $params = null)
    {
        $this->path   = __DIR__ . "/../public/$path";
        $this->params = $params;
    }

    public function getContent(): string
    {
        ob_start();
        if ( file_exists($this->path) ) {
            require_once $this->path;
        }
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }
}