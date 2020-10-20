@extends('layout.layout')

@section('menu')
    @include('news.menu')
@endsection

@section('content')
    <div class="col-md-8 blog-main">
        <div class="blog-post">
        <h4 class="pb-3 mb-4 font-italic border-bottom">
            Новости по категориям
        </h4>
        <div class="blog-post">
            @forelse($categories as $category)
                <p><a href="{{ route('news.category.bySlug', $category->slug) }}">{{ $category->title }}</a></p>
            @empty
                <h2 class="blog-post-title">А что-то нет категорий то совсем</h2>
            @endforelse
        </div>
        </div>
    </div>
@endsection
