<?php

require 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('posts', function ($table) {
    $table->increments('id');
    $table->string('page_id');
    $table->string('post_id');
    $table->text('message')->nullable();
    $table->text('link')->nullable();
    $table->string('posted_at');
    $table->timestamps();
});

Capsule::schema()->create('pages', function ($table) {
    $table->increments('id');
    $table->string('name');
    $table->string('page_id');
    $table->timestamps();
});
