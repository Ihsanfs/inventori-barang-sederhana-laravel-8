<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('cek_login');
    // }
    public function index(Request $request)
    {

        if ($user = Auth::user()) {
            if ($user->level == 'admin') {
                return redirect()->intended('admin');
            } elseif ($user->level == 'gudang') {
                return redirect()->intended('gudang');
            }
        }
        return view('index');
    }


    public function proses_login(Request $request)
    {
        request()->validate(
            [
                'email' => 'required',
                'password' => 'required',

            ]
        );

        $kredensil = $request->only('email', 'password');
        $kredensil['status'] = 1;

        if (Auth::attempt($kredensil)) {
            $user = Auth::user();
            if ($user->level == 'admin') {
                return redirect()->intended('/user');
            } elseif ($user->level == 'gudang') {
                return redirect()->intended('gudang');
            }
            return redirect()->intended('/user');
        }

        return redirect('login')
            ->withInput()
            ->withErrors(['login_gagal' => 'These credentials do not match our records.']);
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('login');
    }



}
