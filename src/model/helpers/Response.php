<?php
declare(strict_types=1);

namespace Models\Helpers;

/**
 *
 */
final class Response
{

    private int $code;
    private string | array $result;

    public function __construct(int $code, string | array $result)
    {
        $this->code   = $code;
        $this->result = $result;
    }

    public function toJSON(): string
    {
        return (new JSONParser())->encodeToJSON(
            [
                "status"  => (new Status())->getMessageFromCode($this->code),
                "result"  => $this->result
			]
        );
    }

}