<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;


class LoginController extends Controller
{
    public function index()
    {
        return view('/login');
    }

    public function login(Request $request)
    {
        $email=$request->email;
        $password=$request->password;
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
        $date = date('Y-m-d');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = User::where('email', $email)->where(function ($q) use ($date) {
                $q->where('resign_date', '>', $date)->orWhereNull('resign_date');
            })->first();
            if ($user) {
                if (Hash::check($password, $user->password)) {
                    session(['user_id' => $user->id]);
                    session(['name' => $user->name]);
                    session(['company_id' => $user->company_id]);
                    session(['profile_pic' => $user->profile_pic]);
                    return redirect('dashboard')->with('status', 'success');
                }
            }
        }
        return redirect('/')->with('status', 'failed');
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/login')->with('status', 'success');
    }
}
