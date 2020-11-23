@extends('layout.layout')

@section('title', 'All news')

@section('menu')
    @include('news.menu')
@endsection

@section('content')
    <div class="col-sm-{{ isset($categories) ? 8: 12 }} col-md-{{ isset($categories) ? 9: 12 }} blog-main">
        <div class="blog-post">
            @if(isset($news))
                <h2 class="blog-post-title">{{ isset($search) ?  __('Поиск в новостях по "' . $search .'"'): __('Все новости') }}</h2>

                @forelse ($news as $newsItem)
                    @if ($newsItem->image)
                        <p><img class="newsImage" src="{{ asset($newsItem->image) }}" alt="{{ $newsItem->title }}"/></p>
                    @endif
                    {{--                    <h2><a href="{{ route('news.byId', $newsItem->id) }}">{{ $newsItem->title }}</a></h2>--}}
                    <h2>{{ $newsItem->title }}</h2>
                    <p>{{ mb_substr($newsItem->message, 0, 300) }}...</p>
                    @if (isset($search) && !empty($search))
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
                    <small>
                        <data value="{{ $newsItem->updated_at }}">{{ $newsItem->updated_at }}</data>
                    </small>
                    <p><a href="{{ route('news.byId', $newsItem->id) }}">Прочитать полностью...</a></p>
                @empty
                    @if (isset($search))
                        <p>Ничего не найдено</p>
                    @else
                        <p>Нет новостей</p>
                    @endif
                @endforelse
                @if (isset($search) && !empty($search))
                    {{ $news->appends(['q' => $search])->links() }}
                @else
                    {{ $news->links() }}
                @endif
            @else
                <h2 class="blog-post-title">{{ __('Пока нет новостей') }}</h2>
            @endif
        </div>
    </div>

    @if(isset($categories))
        <div class="col-sm-4 col-md-3 blog-main">
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

@endsection
