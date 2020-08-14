<?php

use App\App;
use Symfony\Component\HttpFoundation\Request;

require __DIR__ . '/vendor/autoload.php';

$request = Request::createFromGlobals();

$app = new App();

$response = $app->handleRequest($request);
$response->send();