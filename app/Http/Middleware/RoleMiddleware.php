<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!auth()->check()) {
            Log::info('Пользователь не авторизован, перенаправляем на страницу логина.');
            return redirect('/login')->with('error', 'Пожалуйста, авторизуйтесь.');
        }

        $user = auth()->user();
        Log::info('Авторизован: ' . $user->login . ' с ролью: ' . $user->role);

        if ($user->role !== $role) {
            Log::info('У пользователя нет доступа, так как его роль не ' . $role);
            return redirect('/')->with('error', 'У вас нет доступа к этой странице.');
        }
        return $next($request);
    }
}