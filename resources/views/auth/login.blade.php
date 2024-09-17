@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: calc(100vh - 150px);">
    <div class="card p-4" style="max-width: 400px; width: 100%;">
        <h3 class="text-center mb-4">Вход в аккаунт</h3>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="login">Логин</label>
                <input type="text" name="login" class="form-control" placeholder="Введите логин" value="{{ old('login') }}" required>
                @error('login')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" name="password" class="form-control" placeholder="Введите пароль" required>
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-block">Войти</button>
            </div>
            <div class="text-center mt-3">
                <a href="{{ route('registerForm') }}">Регистрация</a>
            </div>
        </form>
    </div>
</div>
@endsection