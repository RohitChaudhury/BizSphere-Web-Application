<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class login_controller extends Controller
{
    public function index(Request $request)
    {
        return view('login_template');
    }
    public function submit(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:6'
        ]);

        $user_info = User::where('email', $request->email)->first();

        if ($user_info) {
            if (Hash::check($request->password, $user_info->password)) {
                if ($user_info->role_id == 1) {
                    $request->session()->put('Logged_user', $user_info);
                    return redirect('/dashboard/project_manager/');
                } else if ($user_info->role_id == 2) {
                    $request->session()->put('Logged_user', $user_info);
                    return redirect('/dashboard/team_lead');
                } else {
                    $request->session()->put('Logged_user', $user_info);
                    return redirect('/dashboard/team_member');
                }
            } else {
                return redirect()->back()->with('error', 'Invalid credentials, Invalid email or password!');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid credentials, Invalid email or password!');
        }
    }


    //Forget password controllers:
    public function forget_password_view()
    {
        return view('login_forget_password');
    }

    public function logout()
    {
        if (session()->has('Logged_user')) {
            session()->forget('Logged_user');
            request()->session()->flush();
            return redirect('/crm_systems');
        }
        header("Location: /crm_systems");
        exit;
    }

    public function forbidden()
    {
        return view('forbidden');
    }
}