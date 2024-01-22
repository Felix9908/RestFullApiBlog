<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Users;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only(['name', 'password']);

        $user = Users::where('name', $credentials['name'])
            ->where('password', $credentials['password'])
            ->first();

        if ($user == false) {
            return response()->json(['authenticated' => false]);
        }

        $user->token = Str::random(150);
        $user->save();

        return response()->json(['authenticated' => true, 'id' => $user->id, 'token' => $user->token]);
    }
}
