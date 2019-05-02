<?php

namespace Bulldog\Facebook;

use Facebook\Facebook as FB;
use Facebook\Exceptions\FacebookThrottleException;

class Api
{
    protected $fb;
    protected $token;
    protected $response;

    public function __construct($appid, $secret)
    {
        $this->fb = new FB([
            'app_id' => $appid,
            'app_secret' => $secret,
        ]);

        $this->token = $this->fb->getApp()->getAccessToken();
    }

    public function feed($pageid)
    {
        try {
            $this->response = $this->fb->get('/'.$pageid.'/feed', $this->token);
        } catch(\Exception $e) {
            var_dump($e->getMessage());
            exit;
        }

        return $this->response;
    }

    public function get()
    {
        return json_decode($this->response->getBody())->data;
    }

    public static function build($appid, $secret)
    {
        return new Api($appid, $secret);
    }
}
