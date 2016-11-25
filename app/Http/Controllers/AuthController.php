<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $r) {
        $auth = [
            'username' => $r->input('username'),
            'password' => $r->input('password')
        ];

        if(!auth()->attempt($auth)) {
            return redirect()->route('login')
                ->with([
                    'status' => 'danger',
                    'title' => 'Error Login !!',
                    'message' => 'Username or Password invalid'
                ]);
        }

        return redirect('/');
    }

    public function register(Request $r) {
        $this->validate($r, [
            'username' => 'required',
            'password' => 'required',
            'email' => 'required|email',
            'name' => 'required',
            'type_id' => 'required'
        ]);

        $cek = User::where('username', $r->input('username'))->count();
        if ($cek >= 1) return redirect()->route('register')->with(['status' => 'danger','title'=>'Error!!!', 'message' => 'Username has been registered']);

        if ($r->input('type') == -1)
            return redirect()->route('register')->with(['status' => 'danger','title'=>'Error!!!', 'message' => 'Error!!']);

        $new_user = User::create([
            'username' => $r->input('username'),
            'password' => bcrypt($r->input('password')),
            'email' => $r->input('email'),
            'name' => $r->input('name'),
            'dob' => date('Y-m-d'),
            'type_id' => $r->input('type')
        ]);

        return redirect()->route('register')
            ->with([
                'status'=>'success',
                'title'=> 'Success!!!',
                'message'=>'Registration Success, <a href="login" class="btn btn-link">Click here</a> to login'
            ]);
    }

    public function logout() {
        auth()->logout();
        return redirect()->route('login');
    }

    public function changePassword(Request $r) {
        $old = $r->input('old_password');
        $p1 = $r->input('password');
        $p2 = $r->input('repeat_password');

        if(!Hash::check($old, auth()->user()->password)){
            return redirect()->route('user_change_password')
                ->with(['status' => 'danger', 'title'=>'Whoops!!', 'message' => 'Failed to change profile. Old password not same!!!']);
        }

        if($p2 !== $p1){
            return redirect()->route('user_change_password')
                ->with(['status' => 'danger', 'title'=>'Whoops!!', 'message' => 'New password not same!!!']);
        }

        auth()->user()->password = bcrypt($p1);
        auth()->user()->save();

        return redirect()->route('user_change_password')
            ->with(['status' => 'success', 'title'=>'Success!!', 'message' => 'Success to change password!!!']);
    }
}
