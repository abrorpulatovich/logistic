<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function change_pwd()
    {
        return view('admin.user.change_pwd');
    }

    public function change_pass(Request $request)
    {
        $data = request()->validate([
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        ]);
        
        $user = Auth::user();
        $user->password = bcrypt($data['password']);
        $user->save();
        Auth::logout();
        return redirect('/login');
    }
}
