<?php
declare(strict_types=1);

namespace Api\Models\Helpers;

/**
 *
 */
final class JSONParser
{

    public function encodeToJSON(mixed $value, bool $formatted = false): string
    {
        if ( $formatted )
        {
            return json_encode($value, JSON_PRETTY_PRINT);
        }
        return json_encode($value);
    }

    public function decode(string $json): array
    {
        return json_decode($json, true);
    }
}