<div class="row">
    @foreach($news as $item)
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->title }}</h5>
                    <p class="card-text">{{ $item->description }}</p>
                    <p class="card-text"><small class="text-muted">{{ $item->created_at }}</small></p>
                    <a href="{{ route('news.show', $item->id) }}" class="btn btn-primary">Подробнее</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="d-flex justify-content-center mt-4">
    {{ $news->links('pagination::bootstrap-4') }}
</div>