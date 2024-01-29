<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repositories\RepositoryPosts;

class DeletePostController extends Controller
{
    protected $repositoryPosts;

    public function __construct(RepositoryPosts $repositoryPosts)
    {
        $this->repositoryPosts = $repositoryPosts;
    }

    public function deletePost(Request $request, $postId)
    {
        try {
            $this->repositoryPosts->deletePost($postId);

            return response()->json(['success' => true, 'message' => 'Post deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }
}
