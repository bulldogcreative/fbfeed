<?php

require '../vendor/autoload.php';

$post = new Bulldog\Facebook\Repositories\PostRepo;
dd($post->get($_SERVER['REQUEST_URI']));
