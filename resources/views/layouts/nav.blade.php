<nav class="navbar nav-tabs navbar-inverse bg-inverse  inline-block ">
    <a class="navbar-brand" href="/">RetroChic</a>
    <ul>
        @foreach($items as $item)
            @if ($item->haschild)

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ $item->title }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        @foreach($item->categories as $child)
                            <li class="nav-item">
                                <a class="nav-link" href=/products/?category={{$child->id}}>{{ $child->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @else
                @if($item->parent_id == null)
                    <li class="nav-item active">
                        <a class="nav-link" href={{$item->link}}>{{ $item->title }} <span class="sr-only">(current)</span></a>
                    </li>
                @endif
            @endif
        @endforeach
    </ul>
    <ul class="nav navbar-nav navbar-right col-md-1">
        <!-- Authentication Links -->
        @if (Auth::guest())
            <li class="nav-item">
                <a class="nav-link" href="/login">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/register">Register</a>
            </li>
        @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    @if(Auth::user()->isAdmin)
                        <li class="nav-item">
                            <a href="/dashboard"> Dashboard</a>
                        </li>
                    @else
                    <li class="nav-item">
                        <a href="/"> Winkelwagen</a>
                    </li>
                    @endif
                    <li>
                        <a href="{{ url('/logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Uitloggen
                        </a>

                        <form id="logout-form" action="/logout" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        @endif
    </ul>
</nav>