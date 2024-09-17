<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\News;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profile()
    {
        return view('profile');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:6',
        ]);

        $user = session('user');
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success', 'Пароль изменен');
    }

    public function addNews(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image',
        ]);

        $news = new News();
        $news->name = $request->title;
        $news->description = $request->description;
        $news->author = session('user')->login;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images/news', 'public');
            $news->image = $path;
        }

        $news->save();

        return back()->with('success', 'Новость добавлена');
    }
    
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'login' => 'required|unique:users',
            'password' => 'required|confirmed|min:6',
            'role' => 'required'
        ]);

        $user = new User();
        $user->login = $request->login;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Пользователь создан');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'login' => 'required|unique:users,login,' . $id,
            'role' => 'required',
        ]);

        $user = User::findOrFail($id);
        $user->login = $request->login;
        $user->role = $request->role;

        if ($request->filled('password')) {
            $request->validate(['password' => 'confirmed|min:6']);
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Пользователь обновлен');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Пользователь удален');
    }
}