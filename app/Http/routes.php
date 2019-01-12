<?php

use App\Post;
use App\Tag;
use App\Video;
use App\Taggable;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('create', function(){
 
   $post = Post::create(['name'=>'my firist post']);
   
   $tag1 = Tag::find(1);

   $post->tags()->save($tag1);

// 

   $video = Video::create(['name'=>'video.mov']);

   $tag2  = Tag::find(2);

   $video->tags()->save($tag2);

});


Route::get('update', function(){
   
   $post = Post::findOrFail(1);

   foreach ($post->tags as $tag) {
   	
   	$tag->where('id','=',1)->update(['name'=>'update php']);

   }

});



Route::get('delete', function(){

  $post = Post::find(1);

  foreach ($post->tags as $tag) {
  	 
  	 $tag->whereId(1)->delete();

  }

});












