<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('inc.head')
</head>
<body>
    <div class="m-cms">
        <div class="m-cms__navbar">
            <h4 class="m-cms__navbar__logo">Biodiversiteit Stress Test CMS</h4>

            <div class="m-cms__navbar__right">
                <div class="m-cms__navbar__right__user">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('home') }}">Homepagina</a>
                                
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
            <a href="{{ route('cms_municipality_index') }}" class="m-cms__sidebar__item"><i class="fas fa-city"></i> <span>Gemeentes</span></a>
            <a href="{{ route('cms_homepage_show') }}" class="m-cms__sidebar__item"><i class="fas fa-city"></i> <span>Homepagina</span></a>
            <a href="{{ route('cms_municipality_index') }}" class="m-cms__sidebar__item"><i class="fas fa-city"></i> <span>Contactpagina</span></a>
        </div>

        <div class="m-cms__content">
            @yield('content')
        </div>
    </div>
</body>
</html>
