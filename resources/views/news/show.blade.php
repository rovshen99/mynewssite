@extends('layouts.app')

@section('content')
<main class="container mt-4">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="card">
                <img src="{{ asset('storage/' . $news->image) }}" alt="Фото новости">
                <div class="card-body">
                    <h1 class="card-title">{{ $news->title }}</h1>
                    <h4 class="card-subtitle mb-2 text-muted">Автор: {{ $news->author }}</h4>
                    <p class="card-text">{{ $news->description }}</p>
                    <p class="card-text date"><small class="text-muted">Дата создания: {{ $news->created_at }}</small></p>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection