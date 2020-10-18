
<a class="p-2 text-muted {{ request()->routeIs('home')?'active':'' }}" href="{{ route('home') }}">{{ __('Главная') }}</a>
<a class="p-2 text-muted {{ request()->routeIs('news')?'active':'' }}" href="{{ route('news.home') }}">{{ __('Новости') }}</a>

<a class="p-2 text-muted {{ request()->routeIs('admin.home')?'active':'' }}" href="{{ route('admin.home') }}">{{ __('Админка') }}</a>
<a class="p-2 text-muted {{ request()->routeIs('admin.addNews')?'active':'' }}" href="{{ route('admin.addNews') }}">{{ __('Добавить новость') }}</a>
<a class="p-2 text-muted {{ request()->routeIs('admin.getNews')?'active':'' }}" href="{{ route('admin.getNews') }}">{{ __('Скачать новости') }}</a>

<a class="p-2 text-muted" href="{{ route('login') }}">{{ __('Залогиниться') }}</a>
<a class="p-2 text-muted" href="{{ route('register') }}">{{ __('Зарегаться') }}</a>
