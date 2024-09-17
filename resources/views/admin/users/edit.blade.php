@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Редактировать пользователя</h1>
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="login">Логин</label>
                <input type="text" name="login" class="form-control" value="{{ $user->login }}" required>
            </div>
            <div class="form-group">
                <label for="role">Роль</label>
                <select name="role" class="form-control">
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Админ</option>
                    <option value="content_manager" {{ $user->role == 'content_manager' ? 'selected' : '' }}>Контент-менеджер</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection