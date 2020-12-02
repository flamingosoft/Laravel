<a class="p-2  {{ (request()->routeIs('home'))?'active':'' }}" href='{{ route('home') }}'>{{ __('Главная') }} </a>
<a class="p-2  {{ (request()->routeIs('news.home'))?'active':'' }}" href="{{ route('news.home') }}">{{ __('Новости') }}</a>
<a class="p-2  {{ (request()->routeIs('news.category.home'))?'active':'' }}" href="{{ route('news.category.home') }}">{{ __('Все категории') }}</a>
<a class="p-2  {{ request()->routeIs('admin.home')?'active':'' }}" href="{{ route('admin.home') }}">{{ __('Админка') }}</a>
<a class="p-2 {{ (request()->routeIs('about'))?'active':'' }}" href="{{ route('about') }}">{{ __('О нас') }}</a>
<a class="p-2 {{ (request()->routeIs('contacts'))?'active':'' }}" href="{{ route('contacts') }}">{{ __('Контакты') }}</a>
<a class="p-2 {{ (request()->routeIs('vue'))?'active':'' }}" href="{{ route('vue') }}">{{ __('Вьюха') }}</a>
