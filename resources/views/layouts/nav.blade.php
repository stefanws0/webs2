<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse  ">
    <a class="navbar-brand" href="/">RetroChic</a>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">

        <ul class="navbar-nav" >
            @foreach($items as $item)
                @if ($item->haschild)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ $item->title }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @foreach($item->categories as $child)
                                <a class="dropdown-item" href=/products/?category={{$child->id}}>{{ $child->name }}</a>
                            @endforeach
                        </div>
                    </li>
                @else
                    @if($item->parent_id == null)
                        <li class="nav-item" >
                            <a class="nav-link" href={{$item->link}}>{{ $item->title }} <span class="sr-only">(current)</span></a>
                        </li>
                    @endif
                @endif
            @endforeach
        </ul>
    </div>

    <ul class="navbar-nav  col-md-2">
        <!-- Authentication Links -->
        @if (Auth::guest())
            <li class="nav-item">
                <a class="nav-link" href="/login">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/register">Register</a>
            </li>
        @else
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" id="profileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="profileDropdown">
                    {{-- <ul class="dropdown-menu" role="menu"> --}}
                    @if(Auth::user()->isAdmin)
                        <a class="dropdown-item" href="/dashboard"> Dashboard</a>
                    @else
                        <a class="dropdown-item" href="{{route('products.shoppingCart')}}"> Winkelwagen {{Session::has('cart') ? Session::get('cart')->totalQty : ''}}</a>
                    @endif
                    <a class="dropdown-item" href="{{ url('/logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        Uitloggen
                    </a>

                    <form id="logout-form" action="/logout" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </li>
        @endif
    </ul>
</nav>
