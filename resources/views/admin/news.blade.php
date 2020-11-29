@extends('layout.layout')

@section('menu')
    @include("admin.menu")
@endsection

@section('content')

    <div class="col-md-6 blog-main offset-3">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            @if ($mode == "edit")
                {{ __('Админка: Редактирование новости') }}
            @else
                {{ __('Админка: добавление новости') }}
            @endif
            @if (Cookie::has('DUSK'))
                DUSK!!!
            @endif
        </h3>

        <div class="blog-post">
            @if (!isset($categories) || $categories->count() == 0)
                <div class="alert alert-primary" role="alert">
                    Отсутствуют категории, необходимые для создания новости. Сначала создайте категории, перейдя по
                    ссылке:
                    <a href="{{ route('news.category.create') }}" title="Создать новую категорию">создать категорию</a>
                </div>
            @endif
            <form name="addNews" method="POST"
                  action="{{ $mode == "edit"? route("news.update", $news): route("news.store") }}"
                  enctype="multipart/form-data">
                @if ($mode == "edit")
                    @method("PUT")
                @endif
                @csrf
                <div class="form-group">
                    <label for="title">Заголовок новости</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Заголовок новости"
                           value="{{ old('title') ?? $news->title ?? "" }}">
                    @error("title")
                    <div class="alert alert-warning" role="alert">
                        @foreach($errors->get("title") as $message)
                            <p>{{ $message }}</p>
                        @endforeach
                    </div>
                    @enderror
                </div>
                @if($categories)
                    <div class="form-group">
                        <label for="category">Категория</label>
                        <select class="form-control" id="category" name="category">
                            @foreach($categories as $category)
                                <option
                                    value="{{ $category->slug }}"
                                    {{ (old('category') ?? $news->$category ?? "") == $category->slug ? 'selected':'' }}>
                                    {{ $category->title }}</option>
                            @endforeach
                        </select>
                        @error("category")
                        <div class="alert alert-warning" role="alert">
                            @foreach($errors->get("category") as $message)
                                <p>{{ $message }}</p>
                            @endforeach
                        </div>
                        @enderror
                    </div>
                @endif
                <div class="form-group">
                    <label for="message">Описание новости</label>
                    <textarea class="form-control" id="message" rows="3"
                              name="message">{{ old('message') ?? $news->message ?? "" }}</textarea>
                    @error("message")
                    <div class="alert alert-warning" role="alert">
                        @foreach($errors->get("message") as $message)
                            <p>{{ $message }}</p>
                        @endforeach
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="checkbox" value="private" id="private"
                           name="private" {{ (old('private') ?? $news->private ?? false) ? 'checked':''}}>
                    <label for="private">Для зарегистрированных</label>
                </div>
                <div class="form-group">
                    @if ($mode == "edit" && !is_null($news->image))
                        <div><img class="newsImage" src="{{ asset($news->image) }}"
                                  alt="Тут должно быть изображение к новости"></div>
                    @endif

                    {{--                    @dump(\Illuminate\Support\Facades\Session::get('existingFile'))--}}
                    <input type="file" name="image" value="{{ old('image') }}">
                    @error("image")
                    <div class="alert alert-warning" role="alert">
                        @foreach($errors->get("image") as $message)
                            <p>{{ $message }}</p>
                        @endforeach
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="submit"
                           value="{{ $mode == "create" ? __('Создать новость'): __('Сохранить изменения') }}"
{{--                    @if (!Cookie::has('DUSK'))--}}
                        {{ (!isset($categories) || $categories->count() == 0) ? "disabled":""}}
{{--                    @endif--}}
                    >
                </div>
            </form>
        </div>
@endsection
