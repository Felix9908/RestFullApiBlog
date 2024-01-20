<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only(['name', 'password']);

        $user = Users::where('name', $credentials['name'])
            ->where('password', $credentials['password'])
            ->first();

        if ($user) {
            return response()->json(['authenticated' => true, 'id' => $user->id]);
        } else {
            return response()->json(['authenticated' => false]);
        }
    }
}