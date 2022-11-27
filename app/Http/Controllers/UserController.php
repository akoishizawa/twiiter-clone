<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Tweet;
use App\User;

class UserController extends Controller
{
    public function showUserPage(Request $request)
    {
        $user_id = $request->session()->get('user_id');
        $tweets = User::find($user_id)->tweets->sortByDesc('created_at');
        $user = User::where('id', $user_id)->first();

        return view('user', [
            'user' => $user,
            'tweets' => $tweets,
        ]);
    }

}
