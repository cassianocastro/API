<?php
declare(strict_types=1);

namespace Api\Http;

/**
 *
 */
final class Server
{

    public function getAll(): array
    {
        return $_SERVER;
    }

    public function getURI(): string
    {
        return $_SERVER["REQUEST_URI"];
    }

    public function getRequestMethod(): string
    {
        return $_SERVER["REQUEST_METHOD"];
    }

    public function getAuthorization(): string
    {
        return $_SERVER["REDIRECT_HTTP_AUTHORIZATION"];
    }

    public function getAuthUser(): string
    {
        return $_SERVER["PHP_AUTH_USER"];
    }

    public function getAuthPw(): string
    {
        return $_SERVER["PHP_AUTH_PW"];
    }

    public function getAuthDigest(): string
    {
        return $_SERVER["PHP_AUTH_DIGEST"];
    }
}