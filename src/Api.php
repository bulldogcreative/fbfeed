<?php

namespace Bulldog\Facebook;

use Facebook\Facebook as FB;
use Facebook\Exceptions\FacebookThrottleException;

class Api
{
    /**
     * Facebook.
     * 
     * @var Facebook\Facebook
     */
    protected $fb;

    /**
     * Facebook API Token.
     * 
     * @var string
     */
    protected $token;

    /**
     * Facebook API Response.
     * 
     * @var Facebook\FacebookResponse
     */
    protected $response;

    /**
     * Api construct.
     * 
     * @var string $appid
     * @var string $secret
     * 
     * @return Bulldog\Facebook\Api
     */
    public function __construct($appid, $secret)
    {
        $this->fb = new FB([
            'app_id' => $appid,
            'app_secret' => $secret,
        ]);

        $this->token = $this->fb->getApp()->getAccessToken();
    }

    /**
     * Retrieve a Facebook page feed using the page ID.
     * 
     * @var string|integer $pageid
     * 
     * @return Facebook\FacebookResponse
     */
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

    /**
     * Decode the Facebook JSON response.
     * 
     * @return iterable
     */
    public function get()
    {
        return json_decode($this->response->getBody())->data;
    }
}
