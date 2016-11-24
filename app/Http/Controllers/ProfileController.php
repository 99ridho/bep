<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class ProfileController extends Controller
{
    public function index(Request $r, $username) {
        $user = User::where('username', $username)->first();

        if ($user == null) {
            return view('profile/athlete', ['data' => $user, 'status' => 'not_found']);
        } else {
            if ($user->type->id == 3) {
                return view('profile/athlete', ['data' => $user, 'status' => 'found']);
            } else if ($user->type->id == 2) {
                return view('profile/team', ['data' => $user, 'status' => 'found']);
            }
        }
    }
}
