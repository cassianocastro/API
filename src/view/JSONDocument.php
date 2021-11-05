<?php 
declare(strict_types = 1);

namespace Views;

/**
 * 
 */
final class JSONDocument implements namespace\IDocument
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

?>