<?php 
declare(strict_types = 1);

namespace Models;

use Models\JSONParser, Exception;

/**
 * 
 */
final class Input
{
    
    public function getData(bool $optional = true): ?array
    {
        $data  = file_get_contents("php://input");
        $array = (new JSONParser())->decode(json: $data, toArray: true);

        if ( ! $optional and (json_last_error() !== JSON_ERROR_NONE)) {
            throw new Exception("Bad Request - payload not in json format", 400);
        }

        return $array;
    }
}

?>