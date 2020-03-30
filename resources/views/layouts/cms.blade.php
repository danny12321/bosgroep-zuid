<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('inc.head')
</head>
<body>
    <div class="m-cms">
        <div class="m-cms__navbar">
            <img src="/assets/img/logo-bosgroep.png" alt="logo" class="m-cms__navbar__logo">

            <div class="m-cms__navbar__right">
                <div class="m-cms__navbar__right__user">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="m-cms__sidebar">
            <a href="#" class="m-cms__sidebar__item"><i class="fas fa-chart-line"></i> <span>Dashboard</span></a>
            <a href="{{ route('cms_layers_index') }}" class="m-cms__sidebar__item"><i class="fas fa-city"></i> <span>Lagen</span></a>
            <a href="#" class="m-cms__sidebar__item"><i class="fas fa-pencil-alt"></i> <span>Selectie</span></a>

        </div>

        <div class="m-cms__content">
            @yield('content')
        </div>
    </div>
</body>
</html>
