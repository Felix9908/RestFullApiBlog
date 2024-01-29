<?php

namespace App\Http\Controllers;
use App\Repositories\RepositoryPosts;

class GetAllPostController extends Controller
{
    protected $repositoryPosts;

    public function __construct(RepositoryPosts $repositoryPosts)
    {
        $this->repositoryPosts = $repositoryPosts;
    }

    public function getUsersWithPosts()
    {
        $usersWithPosts = $this->repositoryPosts->getUsersWithPosts();

        return response()->json($usersWithPosts);
    }
}

