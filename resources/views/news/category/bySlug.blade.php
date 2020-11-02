@extends('layout.layout')

@section('menu')
    @include('news.menu')
@endsection

@section('content')
    <div class="col-md-8 blog-main">
        <div class="blog-post">
{{--            @dd($category);--}}
            <h4 class="pb-3 mb-4 font-italic border-bottom">Новости по категории '{{ $category->title }}'</h4>

            <ul>
                @forelse ($news as $new)
                    <li><a href="{{ route("news.byId", $new->id) }}">{{ $new->title }}</a></li>
                @empty
                    <li>Нет новостей в данной рубрике</li>
                @endforelse
            </ul>
        </div>
    </div>
@endsection
