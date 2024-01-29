<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostModel;
use App\Repositories\RepositoryPosts;
use Illuminate\Support\Facades\Validator;

class EditPostController extends Controller
{

    protected $repositoryPosts;

    public function __construct(RepositoryPosts $repositoryPosts)
    {
        $this->repositoryPosts = $repositoryPosts;
    }

    public function editPost(Request $request, $postId)
    {
        $post = PostModel::find($postId);

        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'post' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 400);
        }

        try {
            $this->repositoryPosts->updatePost($post, $request->all());

            return response()->json(['success' => true, 'message' => 'Post updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    } 
}
