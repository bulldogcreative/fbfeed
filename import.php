<?php

require 'vendor/autoload.php';

use Bulldog\Facebook\Api;
use Bulldog\Facebook\Models\Page;
use Bulldog\Facebook\Models\Post;
use Bulldog\Facebook\Repositories\PostRepo;

$pages = Page::all();
$client = fbApi(getenv('FB_APP_ID'), getenv('FB_SECRET'));
$postrepo = new PostRepo;

foreach($pages as $page) {
    $client->feed($page->page_id);

    $posts = $client->get();
    foreach($posts as $post) {
        if($postrepo->save($page->page_id, $post)) {
            echo '.';
        } else {
            echo 'x';
        }
    }
    echo "\n";
}
