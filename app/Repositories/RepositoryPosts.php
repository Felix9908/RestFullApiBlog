<?php

namespace App\Repositories;

use App\Models\PostModel;
use App\Models\Users;

class RepositoryPosts
{
    //create post
    public function createPost(array $postData)
    {
        return PostModel::create($postData);
    }
    //Get all post and username, id 
    public function getUsersWithPosts()
    {
        $usersWithPosts = PostModel::join('users', 'post.user_id', '=', 'users.id')
            ->select('post.*', 'users.id as user_id', 'users.name')
            ->get();

        return $usersWithPosts;
    }
    //get all post from a specific user
    public function getUserAndPostData($userId)
    {
        $userData = Users::select('name')->where('id', $userId)->first();
        $postData = PostModel::where('user_id', $userId)->get();

        return ['user' => $userData, 'posts' => $postData];
    }
    //delete post
    public function deletePost($postId)
    {
        return PostModel::destroy($postId);
    }
    // update post
    public function updatePost($postId, array $postData)
    {
        $post = PostModel::find($postId);

        if (!$post) {
            return null;
        }

        $post->fill($postData);
        $post->save();

        return $post;
    }

    public function getSinglePost($postId)
    {
        try {
            $post = PostModel::select('title', 'post')->find($postId);

            if (!$post) {
                return ['error' => 'Publicación no encontrada'];
            }

            return ['post' => $post];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
