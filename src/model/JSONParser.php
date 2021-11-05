<?php 
declare(strict_types = 1);

namespace Models;

/**
 * 
 */
final class JSONParser
{
    
    public function encodeToJSON(array $array): string
    {
        return json_encode($array, JSON_PRETTY_PRINT);
    }

    public function decode(string $json, bool $toArray = true): object | array | null
    {
        return json_decode($json, $toArray);
    }
}

?>