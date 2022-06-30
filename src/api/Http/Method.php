<?php
declare(strict_types=1);

namespace Api\Http;

/**
 *
 */
enum Method: string
{

    case GET     = "GET";
    case HEAD    = "HEAD";
    case POST    = "POST";
    case PATCH   = "PATCH";
    case PUT     = "PUT";
    case DELETE  = "DELETE";
    case OPTIONS = "OPTIONS";

}