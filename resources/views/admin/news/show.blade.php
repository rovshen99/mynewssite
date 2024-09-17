@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $news->title }}</h1>
        <p><strong>Автор:</strong> {{ $news->author }}</p>
        <p>{{ $news->description }}</p>
        @if ($news->image)
            <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="img-fluid">
        @endif
    </div>
@endsection