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
            } else if ($user->type->id == 4) {
                return view('profile/organizer', ['data' => $user, 'status' => 'found']);
            }
        }
    }

    public function changePassword() {
        return view('change-password');
    }

    public function changeProfile() {
        return view('change-profile');
    }

    public function saveProfile(Request $r) {
        auth()->user()->update([
            'username' => $r->input('username'),
            'email' => $r->input('email'),
            'name' => $r->input('name')
        ]);

        return redirect()->route('user_change_profile')
            ->with(['status' => 'success', 'title' => 'Success!!', 'message' => 'Your Profile Updated!!']);
    }
}
