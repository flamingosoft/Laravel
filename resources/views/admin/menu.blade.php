
<a class="p-2  {{ request()->routeIs('home')?'active':'' }}" href="{{ route('home') }}">{{ __('Главная') }}</a>
<a class="p-2  {{ request()->routeIs('news')?'active':'' }}" href="{{ route('news.home') }}">{{ __('Новости') }}</a>
<a class="p-2  {{ request()->routeIs('news.category.home')?'active':'' }}" href="{{ route('news.category.home') }}">{{ __('Категории') }}</a>

<a class="p-2  {{ request()->routeIs('news.category.create')?'active':'' }}" href="{{ route('news.category.create') }}">{{ __('Добавить Категорию') }}</a>
<a class="p-2  {{ request()->routeIs('news.create')?'active':'' }}" href="{{ route('news.create') }}">{{ __('Добавить новость') }}</a>
<a class="p-2  {{ request()->routeIs('admin.home')?'active':'' }}" href="{{ route('admin.home') }}">{{ __('Админка') }}</a>
<a class="p-2  {{ request()->routeIs('admin.getNews')?'active':'' }}" href="{{ route('admin.getNews') }}">{{ __('Скачать новости') }}</a>

