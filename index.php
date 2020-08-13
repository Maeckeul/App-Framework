<?php

use App\App;

require __DIR__ . '/vendor/autoload.php';

$app = new App();
$response = $app->handleRequest($request);

echo $response;