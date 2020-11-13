@extends('layout.layout')

@section('menu')
    @include('news.menu')
@endsection

@section('content')

    <div class=" offset-md-2 col-md-8 blog-main">
        <div class="blog-post">
            <h4 class="pb-3 mb-4 font-italic border-bottom">
                {{ $title }}
            </h4>
            <div class="blog-post">
                @switch($mode)

                    @case('all')
                    @if (\Illuminate\Support\Facades\Session::has('deleteMsg'))
                        <div class="alert alert-warning" role="alert">
                            {{ \Illuminate\Support\Facades\Session::get('deleteMsg') }}
                        </div>
                    @endif
                    >> <a href="{{ route('news.category.create') }}">Create new category</a>
                    <ol>
                        @forelse($categories as $category)
                            <li>
                                <a href="{{ route('news.category.bySlug', $category->slug) }}">{{ $category->title }}</a>
                                : <a href="{{ route('news.category.edit', $category) }}">Edit</a>
                                : <a href="{{ route('news.category.destroy', $category) }}">Delete</a>
                                : <a href="{{ route('news.category.show', $category) }}">Show</a>
                            </li>
                        @empty
                            <h2 class="blog-post-title">А что-то нет категорий то совсем</h2>
                        @endforelse
                    </ol>
                    @break


                    @case('edit')
                    @case('create')
                    @dump('news.category.' . ($mode == 'edit' ? 'update': 'store'))
                    <form action="{{ route('news.category.' . ($mode == 'edit' ? 'update': 'store'), $category) }}"
                          enctype="multipart/form-data"
                          method="POST" class="form-group">
                        @csrf
                        @if ($mode == 'edit')
                            @method('PUT')
                        @endif

                        <label for="title" class="input-group">Название категории</label>
                        {{--                            @if (isset($wrong) && array_key_exists('title', $wrong))--}}
                        {{--                                <span class="invalid-feedback" role="alert">--}}
                        {{--                                Неверное значение Title--}}
                        {{--                                </span>--}}
                        {{--                            @endif--}}
                        <input class="input-group" autofocus type="text" name="title"
                               value="{{ $category->title ?? old("title") ?? "" }}"
                               placeholder="title...">
                        @error("title")
                        <div class="alert alert-warning" role="alert">
                            @foreach($errors->get("title") as $message)
                                <p>{{ $message }}</p>
                            @endforeach
                        </div>
                        @enderror

                        <label for="slug" class="input-group">Slug категории</label>
                            <input class="input-group" type="text" name="slug"
                                   value="{{ $category->slug ?? old("slug") ?? "" }}"
                                   placeholder="slug...">
                        @error("slug")
                        <div class="alert alert-warning" role="alert">
                            @foreach($errors->get("slug") as $message)
                                <p>{{ $message }}</p>
                            @endforeach
                        </div>
                        @enderror

                        <hr>

                        <input class="input-group" type="submit" value="save"/>
                    </form>
                    @break

                    @case('show')
                    <h3>id: {{ $category->id }}</h3>
                    <a href="{{ route('news.category.home') }}">Все категории</a>
                    <h2 class="blog-post-title">Название: {{ $category->title }}</h2>
                    <p><strong>SLUG: </strong>{{ $category->slug }}</p>
                    @break

                @endswitch
            </div>
        </div>
    </div>
@endsection
