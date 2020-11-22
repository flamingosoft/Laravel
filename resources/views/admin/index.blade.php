@extends('layout.layout')

@section('menu')
    @include("admin.menu")
@endsection

@section('content')
    <div class="container blog-main">
        <div class="blog-post">
            <h2 class="blog-post-title">{{ __('Админка') }} </h2>
            <br/>

            <div class="row">
                <div class="col-sm-6 ">
                    <h3>Список категорий</h3>
                    <table class="container col-xs-12">
                        @forelse($categories as $category)
                            <tr>
                                <td class="col-xs-6"><a href="{{ route("news.category.show", $category) }}">{{ $category->title }}</a></td>
                                <td class="col-xs-3"><a href="{{ route("news.category.edit", $category) }}">Edit</a></td>
                                <td class="col-xs-3"><a href="{{ \route("news.category.destroy", $category) }}">Delete</a></td>
                            </tr>
                        @empty
                            <p>Нет категорий</p>
                        @endforelse
                    </table>
                </div>

                <div class="col-sm-6 ">
                    <h3>Список новостей</h3>
                    <ol>
                        @forelse($news as $new)
                            <li>{{ $new->title }}</li>
                        @empty
                            <p>Нет новостей</p>
                        @endforelse
                    </ol>
                </div>

            </div>
        </div>
    </div>

@endsection
