@extends('layout.layout')

@section('title', 'All news')

@section('menu')
    @include('news.menu')
@endsection

@section('content')
    @if(isset($categories))
        <div class="col-md-6 blog-main">
            <div class="blog-post">
                <h2 class="blog-post-title">{{ __('Новости по категориям') }} </h2>
                <ul>
                    @foreach ($categories as $category)
                        <li>
                            <a href=" {{ route('news.category.bySlug', $category->slug ) }} ">{{ $category->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    <div class="col-md-{{ isset($categories) ? 6: 12 }} blog-main">
        <div class="blog-post">
            @if(isset($news))
                <h2 class="blog-post-title">{{ isset($search) ?  __('Поиск в новостях по "' . $search .'"'): __('Все новости') }}</h2>

                @forelse ($news as $newsItem)
                    <p><a href="{{ route('news.byId', $newsItem->id) }}">{{ $newsItem->title }}</a></p>
                    @if (isset($search))
                        <p>{{ $newsItem->message }}</p>
                        <p>
                            @php
                                $msg = mb_strtolower($newsItem->message);
                                $pos = mb_strpos($msg, $search);
                                $len = mb_strlen($search);
                                 echo '...' . mb_substr($newsItem->message, max(1, $pos-10), min($pos, 10))
                                    . '<b><em>' . mb_substr($newsItem->message, $pos, $len) . '</em></b>'
                                    . mb_substr($newsItem->message, $pos + $len, 10) . '...'
                            @endphp
                        </p>
                    @endif
                @empty
                    @if (isset($search))
                        <p>Ничего не найдено</p>
                    @else
                        <p>Нет новостей</p>
                    @endif
        </div>
        @endforelse
        @else
            <h2 class="blog-post-title">{{ __('Пока нет новостей') }}</h2>
        @endif
    </div>
    </div>

@endsection
