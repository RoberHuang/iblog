<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Http\Model\Admin\Article::class, function (Faker $faker) {
    return [
        'article_title' => $faker->title,
        'cate_id' => 18,
        'article_keywords' => $faker->word,
        'article_description' => $faker->word,
        'article_content' => $faker->realText,
        'article_author' => $faker->name,
        'published_at' => date('Y-m-d'),
    ];
});
