@extends('layouts.app')

@section('content')
<main class="container mt-4">
    <h1>Личный кабинет</h1>
    <p>Имя пользователя: {{ session('user')->login }}</p>

    <h3>Изменить пароль</h3>
    <form method="POST" action="{{ route('changePassword') }}">
        @csrf
        <div class="form-group">
            <label for="password">Новый пароль</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Подтвердите пароль</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Изменить пароль</button>
    </form>

    <h3>Добавить новость</h3>
    <form method="POST" action="{{ route('addNews') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="image">Фото (опционально)</label>
            <input type="file" name="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Добавить новость</button>
    </form>
</main>
@endsection