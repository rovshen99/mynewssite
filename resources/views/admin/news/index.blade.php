@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Новости</h1>
        <a href="{{ route('admin.news.create') }}" class="btn btn-primary mb-3">Добавить новость</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Автор</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($news as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->author }}</td>
                        <td>
                            <a href="{{ route('admin.news.edit', $item->id) }}" class="btn btn-warning">Редактировать</a>
                            <a href="{{ route('admin.news.show', $item->id) }}" class="btn btn-info">Просмотр</a>
                            <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection