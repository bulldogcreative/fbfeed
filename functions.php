<?php

function fbApi($appid, $secret)
{
    return new Bulldog\Facebook\Api($appid, $secret);
}
