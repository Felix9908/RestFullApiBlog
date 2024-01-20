<?php

namespace App\Http\Controllers;
use App\Models\User; 
use App\Models\PostModel;

class PostUserAllController extends Controller
{
   public function getUserAndPostData($userId) {
      $userData = User::select('name')->where('id', $userId)->first();
      $postData = PostModel::where('user_id', $userId)->get();

      return response()->json(['user' => $userData, 'posts' => $postData]);
  }
}

