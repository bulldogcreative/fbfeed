<?php

require '../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Bulldog\Facebook\Controllers\FeedController;

$controller = new FeedController;
$response = $controller->index(Request::createFromGlobals());
$response->send();
