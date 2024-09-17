@extends('layouts.app')

@section('content')
<main class="container">
    <div class="text-center mb-4">
        <h1>Новости</h1>
    </div>
    <div id="news-container">
        @include('news.partials.news-list', ['news' => $news])
    </div>
</main>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).on('click', '.pagination a', function(event) {
        event.preventDefault();
        let page = $(this).attr('href').split('page=')[1];
        fetchNews(page);
    });

    function fetchNews(page) {
        $.ajax({
            url: "/news?page=" + page,
            success: function(data) {
                $('#news-container').html(data);
            }
        });
    }
</script>
@endsection