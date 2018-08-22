<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="{{ url('/') }}">LMS</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#toggle-navbar"
            aria-controls="toggle-navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="toggle-navbar">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                </li>
                @if(auth()->user()->type == 'lecturer')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('lecturer-courses') }}">My Courses</a>
                    </li>
                    @elseif(auth()->user()->type == 'student')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('student-courses') }}">My Courses</a>
                    </li>
                @endif
            @endauth
        </ul>

        <div class="my-2 my-lg-0">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                @guest
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
@auth
    <div class="">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">{{ (auth()->user()->type) }}</a></li>
            <li class="breadcrumb-item active"><a href="#">@yield('title')</a></li>
        </ol>
    </div>
    @endauth

