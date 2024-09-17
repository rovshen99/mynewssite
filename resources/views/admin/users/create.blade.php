@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Добавить пользователя</h1>
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="login">Логин</label>
                <input type="text" name="login" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="role">Роль</label>
                <select name="role" class="form-control">
                    <option value="admin">Админ</option>
                    <option value="content_manager">Контент-менеджер</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection