@extends('layout.layout')

@section('menu')
    @include("admin.menu")
@endsection

@section('content')

    <div class="col-md-6 blog-main offset-3">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            {{ __('Админка: добавление новости') }}
        </h3>

        <div class="blog-post">
            @if (isset($success))
            <div class="alert alert-primary" role="alert">
                A simple primary alert—check it out!
            </div>
            @endif
            <form name="addNews" method="POST" action="{{ url()->current() }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Заголовок новости</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Заголовок новости"
                           value="{{ old('title') }}">
                    @if (isset($wrongTitle))
                        <div class="error">{{ $wrongTitle }}</div>
                    @endif
                </div>
                @if($categories)
                    <div class="form-group">
                        <label for="category">Категория</label>
                        <select class="form-control" id="category" name="category">
                            @foreach($categories as $category)
                                <option
                                    value="{{ $category->slug }}"
                                    {{ old('category') == $category->slug ? 'selected':'' }}>
                                    {{ $category->title }}</option>
                            @endforeach
                            <option value="[new]" {{ old('category') == '[new]' ? 'selected':'' }}>--Новая категория--
                            </option>
                        </select>
                    </div>
                @endif
                <div class="form-group">
                    <label for="message">Описание новости</label>
                    <textarea class="form-control" id="message" rows="3" name="message">{{ old('message') }}</textarea>
                </div>
                <div class="form-group">
                    <input type="checkbox" value="private" id="private"
                           name="private" {{ old('private') === 'private' ? 'checked':''}}>
                    <label for="private">Для зарегистрированных</label>
                </div>
                <div class="form-group">
                    <input type="file" name="image" >
                </div>
                <div class="form-group">
                    <input type="submit" value="{{ __('Создать новость') }}">
                </div>
            </form>
        </div>
@endsection
