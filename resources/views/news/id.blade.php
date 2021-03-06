@extends('layout.layout')

@section('title', 'By ')

@section('menu')
    @include('news.menu')
@endsection

@section('content')
    <div class="container">
        <div class="col-xs-12 blog-main">
            <h3 class="pb-3 mb-4 font-italic border-bottom">
                Новость
            </h3>
            <div class="blog-post">
                @if ($new)
                    @if (!is_null($new->image))
                        <p><img class="newsImage" alt="А тут изображение к новости" src="{{ asset($new->image) }}"></p>
                    @endif
                    <h2 class="blog-post-title">{{ $new->title }} : {{ $new->id }}</h2>
                    <p class="blog-post-meta">{{ $new->updated_at }} в категории <a href="{{ route('news.category.bySlug', $new->Category()->slug) }}">{{ $new->Category()->title }}</a></p>
                    <p>{{ $new->message }}</p>
                @else
                    <h2 class="blog-post-title">Такой новости не существует</h2>
                    {{--                 TO DO: сделать 404-й ответ сервера--}}
                @endif
            </div>
        </div>
    </div>
@endsection
