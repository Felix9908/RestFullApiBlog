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

$router->get('/getPost', 'PostController@getUsersWithPosts');
$router->get('/getUserPostAll/{userId}', 'PostController@getUserAndPostData');
$router->post('/login', 'AuthController@login');
$router->post('/CreatePost', 'PostController@createPost');
$router->delete('/deletePosts/{postId}', 'PostController@deletePost');
$router->put('/editPosts/{postId}', 'PostController@editPost');
$router->get('/getSinglePost/{postId}', 'PostController@getSinglePost');


