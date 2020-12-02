
<a class="p-2 {{ request()->routeIs("news.home")? "active": "" }}" href="{{ route('news.home') }}">{{ __('Все новости') }} </a>
<a class="p-2 {{ request()->routeIs("admin,home")? "active": "" }}" href="{{ route('admin.home') }}">{{ __('Админка') }}</a>
<a class="p-2 {{ request()->routeIs("about")? "active": "" }}" href="{{ route('about') }}">{{ __('О нас') }}</a>
<a class="p-2 {{ request()->routeIs("contacts")? "active": "" }}" href="{{ route('contacts') }}">{{ __('Контакты') }}</a>
<a class="p-2 {{ request()->routeIs("vue")? "active": "" }}" href="{{ route('vue') }}">{{ __('Вьюха') }}</a>
