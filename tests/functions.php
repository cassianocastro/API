<?php

/**
 *
 */
function trace(string $txt): void
{
    if ( defined("APP_DEBUG") & APP_DEBUG )
    {
        print $txt;
    }
}

/**
 * Get all HTTP header key/values as an associative array for the current request.
 * @return string[string] The HTTP header key/value pairs.
 */
function getallheaders(): array
{
    $headers     = [];

    $copy_server = [
        'CONTENT_TYPE'   => 'Content-Type',
        'CONTENT_LENGTH' => 'Content-Length',
        'CONTENT_MD5'    => 'Content-Md5',
    ];

    foreach ($_SERVER as $key => $value)
    {
        if ( substr($key, 0, 5) === 'HTTP_' )
        {
            $key = substr($key, 5);

            if ( ! isset($copy_server[$key]) or ! isset($_SERVER[$key]) )
            {
                $key = str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', $key))));
                $headers[$key] = $value;
            }
        }
        elseif ( isset($copy_server[$key]) )
        {
            $headers[$copy_server[$key]] = $value;
        }
    }

    if ( ! isset($headers['Authorization']) )
    {
        if ( isset($_SERVER['REDIRECT_HTTP_AUTHORIZATION']) )
            $headers['Authorization'] = $_SERVER['REDIRECT_HTTP_AUTHORIZATION'];
        elseif ( isset($_SERVER['PHP_AUTH_USER']) )
        {
            $basic_pass = $_SERVER['PHP_AUTH_PW'] ?? '';
            $headers['Authorization'] = 'Basic ' . base64_encode("{$_SERVER['PHP_AUTH_USER']}:$basic_pass");
        }
        elseif (isset($_SERVER['PHP_AUTH_DIGEST']))
            $headers['Authorization'] = $_SERVER['PHP_AUTH_DIGEST'];
    }

    return $headers;
}

/**
 * @test
 */
function canSendCsvFileToClient(): void
{
    $dataSet = [
        [
            "name" => "Test",
            "age"  => 32
        ],
        [
            "name" => "Test2",
            "age"  => 40
        ]
    ];

    header("Content-Type: text/csv; charset=UTF-8", false);
    header("Content-Disposition: attachment; filename=test.csv", false);

    $pointer = fopen("php://output", "w");

    foreach ( $dataSet as $data )
    {
        fputcsv($pointer, $data);
    }

    fclose($pointer);
}

/**
 * @test
 */
function canDoRequestWithContextOptions(): string
{
    $options = [
        "http" => [
            "method" => "GET",
            "max_redirects" => "0",
        ]
    ];

    $context = stream_context_create($options);
    $result  = file_get_contents("http://www.api.students.com/students/2", false, $context);

    return $result;
}

/**
 * @test
 */
function canDoRequestWithCURL(): string
{
    $uri  = "http://www.api.students.com/students/1";
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $uri);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $output = curl_exec($curl);

    curl_close($curl);

    return $output;
}