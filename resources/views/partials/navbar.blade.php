<nav class="navbar navbar-default navbar-static-top navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href="#">О бренде</a></li>
                <li><a href="#">О дизайнере</a></li>
                <li><a href="#">Новости</a></li>
                @if ($collections->count())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Коллекции <span class="caret"></span></a>
                        <ul class="dropdown-menu">

                            @if (Auth::check())
                                <li>
                                    <a href="{{ route('collection.create') }}">
                                        Добавить коллекцию
                                    </a>
                                </li>
                                <li role="separator" class="divider"></li>
                            @endif

                            @foreach($collections as $collection)
                                <li>
                                    <a href="{{ route('collection.show', $collection->id) }}">
                                        {{ $collection->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endif
                <li><a href="#">Наши контакты</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Вход</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="#">
                                    <i class="fa fa-file-video-o"></i> Изменить видео
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <i class="fa fa-cog"></i> Настроить сайт
                                </a>
                            </li>

                            <li class="divider" role="separator"></li>
                            <li>
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i> Выход
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>