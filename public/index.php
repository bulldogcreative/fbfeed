<?php

require '../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Bulldog\Facebook\Controllers\FeedController;

(new FeedController)->index(Request::createFromGlobals())->send();
