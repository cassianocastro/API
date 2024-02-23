<?php
declare(strict_types=1);

namespace Api\Models\Helpers;

/**
 *
 */
final class InputReader
{

    public function readPhpInput(): array
    {
        $content = file_get_contents("php://input");
        $array   = (new JSONParser())->decode($content);

        return $array;
    }

    public function readYAML(string $filePath): array
    {
        $content = yaml_parse_file($filePath);

        return $content;
    }
}