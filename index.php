<?php
ini_set("display_errors", true);
ini_set("display_startup_errors", true);
error_reporting(E_ALL);

setlocale(LC_ALL, "", "pt_BR.utf8");
define("APP_DEBUG", true);

require_once __DIR__ . '/vendor/autoload.php';

use Service\Api;

if ( ! isset($api) ) {
    $api = new Api();
    $api->loadMap();
}
$api->setRequestAndDispatch();

?>
