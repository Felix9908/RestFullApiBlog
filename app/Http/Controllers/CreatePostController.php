<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repositories\RepositoryPosts;
use Illuminate\Support\Facades\Validator;

class CreatePostController extends Controller
{

    protected $repositoryPosts;

    public function __construct(RepositoryPosts $repositoryPosts)
    {
        $this->repositoryPosts = $repositoryPosts;
    }

    public function createPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'post' => 'required|string',
            'user_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 400);
        }

        try {
            $postData = $request->all();
            $post = $this->repositoryPosts->createPost($postData);

            return response()->json(['success' => true, 'message' => 'Post created successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }   
}
