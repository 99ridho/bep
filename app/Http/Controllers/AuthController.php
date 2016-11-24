<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

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
        $cek = User::where('username', $r->input('username'))->count();
        if ($cek >= 1) return redirect()->route('register')->with(['status' => 'danger','title'=>'Error!!!', 'message' => 'Username has been registered']);

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
}
