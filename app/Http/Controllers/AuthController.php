<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
    $credentials = $request->only('login', 'password');

    if (auth()->attempt($credentials)) {
        session(['user' => auth()->user()]);
        return redirect()->intended('news')->with('success', 'Вы успешно вошли');
    }
    return back()->withErrors(['login' => 'Неправильный логин или пароль']);
}

    public function logout()
    {
        session()->forget('user');
        return redirect('/news');
    }

    public function registerForm()
    {
    return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'login' => 'required|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = new User();
        $user->login = $request->login;
        $user->password = Hash::make($request->password);
        $user->save();
        
        session(['user' => $user]);
        return redirect('/news')->with('success', 'Регистрация успешна');
    }
}

