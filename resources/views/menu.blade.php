{{--@if (!request()->routeIs('home'))--}}
{{--    <li class="nav-item">--}}
{{--        <a class="nav-link" href="{{ route('home') }}">{{ __('Home') }}</a>--}}
{{--    </li>--}}
{{--@endif--}}
{{--<li class="nav-item">--}}
{{--    <a class="nav-link {{ request()->routeIs('about')?"active":"" }}" href="{{ route('about') }}">{{ __('About') }}</a>--}}
{{--</li>--}}
{{--<li class="nav-item">--}}
{{--    <a class="nav-link {{ request()->routeIs('admin.home')?"active":"" }}" href="{{ route('admin.home') }}">{{ __('Admin lk') }}</a>--}}
{{--</li>--}}
{{--<li class="nav-item">--}}
{{--    <a class="nav-link {{ request()->routeIs('news.one')?"active":"" }}" href="{{ route('news.home') }}">{{ __('All news') }}</a>--}}
{{--</li>--}}
{{--<li class="nav-item">--}}
{{--    <a class="nav-link {{ request()->routeIs('vue')?"active":"" }}" href="{{ route('vue') }}">{{ __('Vue') }}</a>--}}
{{--</li>--}}

<!--
// TODO: сделать админское меню выпадающим списком
-->

<a class="p-2 text-muted" href="{{ route('news.home') }}">{{ __('Все новости') }} </a>
<a class="p-2 text-muted" href="{{ route('admin.home') }}">{{ __('Админка') }}</a>
<a class="p-2 text-muted" href="{{ route('about') }}">{{ __('О нас') }}</a>
<a class="p-2 text-muted" href="{{ route('contacts') }}">{{ __('Контакты') }}</a>
<a class="p-2 text-muted" href="{{ route('vue') }}">{{ __('Вьюха') }}</a>
{{--<a class="p-2 text-muted" href="#">Business</a>--}}
{{--<a class="p-2 text-muted" href="#">Politics</a>--}}
{{--<a class="p-2 text-muted" href="#">Opinion</a>--}}
{{--<a class="p-2 text-muted" href="#">Science</a>--}}
{{--<a class="p-2 text-muted" href="#">Health</a>--}}
{{--<a class="p-2 text-muted" href="#">Style</a>--}}
{{--<a class="p-2 text-muted" href="#">Travel</a>--}}
