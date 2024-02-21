<?php
declare(strict_types=1);

namespace Api\Http;

use Api\Views\{ Document, JSONDocument };

/**
 *
 */
final class Response
{

    private Status $status;
    private Document $document;

    public function __construct(int $code, Document $document)
    {
        $this->status   = new Status($code);
        $this->document = $document;
    }

    public function __toString(): string
    {
        if ( $this->document instanceof JSONDocument )
        {
            header(
                "Content-Type: application/json; charset=UTF-8",
                false,
                $this->status->getCode()
            );
        }
        return $this->document->getContent();
    }
}