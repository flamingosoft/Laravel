@extends('layout.layout')

@section('title', 'All news')

@section('menu')
    @include('news.menu')
@endsection

@section('content')
    <div class="col-md-6 blog-main">
        <div class="blog-post">
            @if($categories)
                <h2 class="blog-post-title">{{ __('Новости по категориям') }} </h2>
                <ul>
                    @foreach ($categories as $key => $category)
                        <li>
                            <a href=" {{ route('news.category.bySlug', $category['slug'] ) }} ">{{ $category['title'] }}</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
    <div class="col-md-6 blog-main">
        <div class="blog-post">
            @if($news)
                <h2 class="blog-post-title">{{ __('Все новости') }}</h2>

                @foreach ($news as $newsItem)
                    <p><a href="{{ route('news.byId', $newsItem->id) }}">{{ $newsItem->title }}</a></p>
                @endforeach
            @else
                <h2 class="blog-post-title">{{ __('Пока нет новостей') }}</h2>
            @endif
        </div>
    </div>

@endsection
