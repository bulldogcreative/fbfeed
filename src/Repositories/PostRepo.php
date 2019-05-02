<?php

namespace Bulldog\Facebook\Repositories;

use Bulldog\Facebook\Models\Post;

class PostRepo
{
    public function save($pageid, $postdata)
    {
        if(isset($postdata->story)) {
            return false;
        }

        // First check if the post already exists
        if(Post::where('post_id', $postdata->id)->exists()) {
            return false;
        }

        $post = new Post;
        $post->page_id = $pageid;
        $post->post_id = $postdata->id;

        // Check if message is set
        if(isset($postdata->message)) {
            $post->message = $postdata->message;
        }

        // Check if link is set
        if(isset($postdata->link)) {
            $post->link = $postdata->link;
        }

        $post->posted_at = $postdata->created_time;

        // Save!
        return $post->save();
    }

    public function get($pageid)
    {
        return Post::where('page_id', str_replace("/", "", $pageid))->get();
    }
}
