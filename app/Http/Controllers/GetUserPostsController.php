<?php

namespace App\Http\Controllers;
use App\Repositories\RepositoryPosts;

class GetUserPostsController extends Controller
{

    protected $repositoryPosts;

    public function __construct(RepositoryPosts $repositoryPosts)
    {
        $this->repositoryPosts = $repositoryPosts;
    }

    public function getUserPosts($userId)
    {
        $result = $this->repositoryPosts->getUserAndPostData($userId);

        return response()->json(['user' => $result['user'], 'posts' => $result['posts']]);
    }
}
