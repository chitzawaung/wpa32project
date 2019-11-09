<?php

use App\Author;
use App\Tag;
use App\Blog;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("blog_query", function() {
    $blog = Blog::find(3);
    var_dump($blog->author->name);
    $tags = $blog->tags;
    foreach($tags as $tag) {
        var_dump($tag->name);
    }
    return "Yay!";
});

Route::get("blog_entry" , function() {
    $faker = Faker\Factory::create();
    $author = Author::find(2);
    $tags = Tag::where("id",'<', 4)->get();
    $blog = Blog::create([
        'blog_title' => $faker->sentence,
        'blog_body' => $faker->paragraph,
        'author_id' => $author->id
    ]);
    $blog->tags()->attach($tags);
    $blog->save();

});
