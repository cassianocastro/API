<?php
declare(strict_types=1);

namespace Api\Models\Helpers;

/**
 *
 */
final class InputReader
{

    public function getData(string $path = "php://input"): array
    {
        $content = file_get_contents($path);
        $array   = (new JSONParser())->decode($content);

        return $array;
    }
}