<?php

namespace Bulldog\Facebook\Controllers;

use Symfony\Component\HttpFoundation\Response;

class Controller
{
    public function json($data)
    {
        return $response = new Response(
            json_encode($data),
            Response::HTTP_OK,
            ['content-type' => 'application/json']
        );
    }
}
