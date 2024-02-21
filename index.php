<?php
require_once __DIR__ . '/vendor/autoload.php';

(new Api\Api())->receive(new Api\Http\Request());