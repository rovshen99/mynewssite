@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Редактировать новость</h1>
        <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Название</label>
                <input type="text" name="title" class="form-control" value="{{ $news->title }}" required>
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea name="description" class="form-control" required>{{ $news->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Изображение</label>
                <input type="file" name="image" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection