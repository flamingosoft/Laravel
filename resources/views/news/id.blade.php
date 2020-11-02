@extends('layout.layout')

@section('title', 'By ')

@section('menu')
    @include('news.menu')
@endsection

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Новость
        </h3>
        <div class="blog-post">
            @if ($new)
                    <p><img alt="А тут изображение к новости" src="{{ $new->image }}"></p>
                <h2 class="blog-post-title">{{ $new->title }}</h2>
                <p class="blog-post-meta">January 1, 2014 by <a href="#">Mark</a></p>
                <p>{{ $new->message }}</p>
            @else
                <h2 class="blog-post-title">Такой новости не существует</h2>
{{--                 TO DO: сделать 404-й ответ сервера--}}
            @endif
        </div>
    </div>
@endsection
