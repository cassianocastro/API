<?php
declare(strict_types=1);

namespace Api\Views;

/**
 *
 */
final class JSONDocument implements Document
{

    private string $content;

    public function __construct(string $content)
    {
        $this->content = $content;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}