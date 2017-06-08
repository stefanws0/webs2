
<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse mb-4">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="/">RetroChic</a>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/products">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
            </li>
        </ul>
        <form class="form-inline mt-2 mt-md-0">
            @if (Auth::guest())
                <li>
                    <a class="btn btn-default my-2 my-sm-0" href="{{ url('/login') }}">Login <span
                                class="sr-only">(current)</span></a>
                </li>
                <li>
                    <a class="btn btn-primary my-2 my-sm-0" href="{{ url('/register') }}">Register <span
                                class="sr-only">(current)</span></a>
                </li>
            @endif
                @if(Auth::user())

                    <li>
                        <div class="dropdown">
                            <a class="nav-item white sliding-middle-out" style="color: white" data-toggle="dropdown">{{Auth::user()->name}}<span
                                        class="caret"></span></a>
                            <ul class="dropdown-menu">

                                <li><a class="sliding-middle-out" href="{{ route('products.index') }}"> Mijn Blog Posts</a>
                                </li>
                                <li><a class="sliding-middle-out" href="{{ route('products.index') }}"> Mijn Account</a>
                                </li>

                                @if (Auth::user()->isAdmin())
                                    <li><a class="sliding-middle-out">
                                            Dashboard</a></li>

                                @endif
                                <li>
                                    <a class="sliding-middle-out" href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Uitloggen
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </li>

                @endif
        </form>
    </div>
</nav>