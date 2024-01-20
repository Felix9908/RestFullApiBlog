<?php

namespace App\Http\Controllers;
use App\Models\PostModel;
use App\Models\User;

class UserWithPostController extends Controller
{
   public function getUsersWithPosts()
    {
        $usersWithPosts = User::join('post', 'users.id', '=', 'post.user_id')
            ->select('users.*', 'post.*')
            ->get();

        return response()->json($usersWithPosts);
    }
}
