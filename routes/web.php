<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/getPost', 'GetAllPostController@getUsersWithPosts');
$router->get('/getUserPostAll/{userId}', 'getUserPosts@getUserPosts');
$router->post('/login', 'AuthController@login');
$router->post('/CreatePost', 'CreatePostController@createPost');
$router->delete('/deletePosts/{postId}', 'DeletePostController@deletePost');
$router->put('/editPosts/{postId}', 'EditPostController@editPost');
$router->get('/getSinglePost/{postId}', 'GetSinglePostController@getSinglePost');