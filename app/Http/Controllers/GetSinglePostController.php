<?php

namespace App\Http\Controllers;
use App\Repositories\RepositoryPosts;

class GetSinglePostController extends Controller
{

    protected $repositoryPosts;

    public function __construct(RepositoryPosts $repositoryPosts)
    {
        $this->repositoryPosts = $repositoryPosts;
    }

    public function getSinglePost($postId)
    {
        $result = $this->repositoryPosts->getSinglePost($postId);

        if (isset($result['error'])) {
            return response()->json(['error' => $result['error']], 404);
        }

        return response()->json(['post' => $result['post']]);
    }

}
