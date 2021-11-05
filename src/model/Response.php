<?php 
declare(strict_types = 1);

namespace Models;

use Models\{
    JSONParser, Status
};

/**
 * 
 */
final class Response
{
    
    private int $status;
    private string | array $result;

    public function __construct(int $status, string | array $result)
    {
        $this->status = $status;
        $this->result = $result;
    }

    public function toJSON(): string
    {
        return (new JSONParser())->encodeToJSON(
            array(
                "status"  => (new Status())->getMessageFromCode($this->status),
                "result"  => $this->result
            )
        );
    }
    
}

?>