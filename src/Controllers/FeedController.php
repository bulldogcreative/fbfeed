<?php

namespace Bulldog\Facebook\Controllers;

use Bulldog\Facebook\Repositories\PostRepo;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FeedController extends Controller
{
    public function index(Request $request)
    {
        return $this->json((new PostRepo)->get($request->getPathInfo()));
    }
}
