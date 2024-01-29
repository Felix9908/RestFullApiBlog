<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\PostModel;
// use App\Models\User;
// use App\Repositories\RepositoryPosts;
// use Illuminate\Support\Facades\Validator;

// class PostController extends Controller
// {

//     protected $repositoryPosts;

//     public function __construct(RepositoryPosts $repositoryPosts)
//     {
//         $this->repositoryPosts = $repositoryPosts;
//     }

//     public function createPost(Request $request)
//     {
//         $validator = Validator::make($request->all(), [
//             'title' => 'required|string',
//             'post' => 'required|string',
//             'user_id' => 'required|integer',
//         ]);

//         if ($validator->fails()) {
//             return response()->json(['success' => false, 'errors' => $validator->errors()], 400);
//         }

//         try {
//             $postData = $request->all();
//             $post = $this->repositoryPosts->createPost($postData);

//             return response()->json(['success' => true, 'message' => 'Post created successfully']);
//         } catch (\Exception $e) {
//             return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
//         }
//     }

//     public function getUsersWithPosts()
//     {
//         $usersWithPosts = User::join('post', 'users.id', '=', 'post.user_id')
//             ->select('users.*', 'post.*')
//             ->get();

//         return response()->json($usersWithPosts);
//     }

//     public function getUserPosts($userId)
//     {
//         $userData = User::select('name')->where('id', $userId)->first();
//         $postData = PostModel::where('user_id', $userId)->get();

//         return response()->json(['user' => $userData, 'posts' => $postData]);
//     }

//     public function deletePost(Request $request, $postId)
//     {
//         try {
//             PostModel::destroy($postId);

//             return response()->json(['success' => true, 'message' => 'Post deleted successfully']);
//         } catch (\Exception $e) {
//             return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
//         }
//     }

//     public function editPost(Request $request, $postId)
//     {
//         $post = PostModel::find($postId);

//         if (!$post) {
//             return response()->json(['error' => 'Post not found'], 404);
//         }

//         $validator = Validator::make($request->all(), [
//             'title' => 'required|string',
//             'post' => 'required|string',
//         ]);

//         if ($validator->fails()) {
//             return response()->json(['success' => false, 'errors' => $validator->errors()], 400);
//         }

//         try {
//             $post->update([
//                 'title' => $request->input('title'),
//                 'post' => $request->input('post'),
//             ]);

//             return response()->json(['success' => true, 'message' => 'Post updated successfully']);
//         } catch (\Exception $e) {
//             return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
//         }
//     }

//     public function getSinglePost($postId)
//     {
//         try {
//             $post = PostModel::select('title', 'post')->find($postId);
//             if (!$post) {
//                 return response()->json(['error' => 'Publicación no encontrada'], 404);
//             }
//             return response()->json(['post' => $post]);
//         } catch (\Exception $e) {
//             return response()->json(['error' => $e->getMessage()], 500);
//         }
//     }
// }
