{{--<nav class="navbar navbar-expand-lg navbar-light bg-info">--}}
    {{--<a class="navbar-brand" href="/posts">Navbar</a>--}}
    {{--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">--}}
        {{--<span class="navbar-toggler-icon"></span>--}}
    {{--</button>--}}

    {{--<div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
        {{--<ul class="navbar-nav mr-auto">--}}
            {{--<li class="nav-item active">--}}
                {{--<a class="nav-link" href="/posts">Home <span class="sr-only">(current)</span></a>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
                {{--<a class="nav-link" href="/about">About <span class="sr-only">(current)</span></a>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
                {{--<a class="nav-link" href="/muscle-chart">Muscle chart <span class="sr-only">(current)</span></a>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
                {{--<a class="nav-link" href="#">Link</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item dropdown">--}}
                {{--<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">--}}
                    {{--Dropdown--}}
                {{--</a>--}}
                {{--<div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
                    {{--<a class="dropdown-item" href="">Action</a>--}}
                    {{--<a class="dropdown-item" href="">Another action</a>--}}
                    {{--<div class="dropdown-divider"></div>--}}
                    {{--<a class="dropdown-item" href="">Something else here</a>--}}
                {{--</div>--}}
            {{--</li>--}}
        {{--</ul>--}}
        {{--<ul class="nav navbar-nav navbar-right">--}}
            {{--<li><a href="/posts/create">Create Post</a></li>--}}
        {{--</ul>--}}
    {{--</div>--}}
{{--</nav>--}}

{{--<li><a href="/posts" class="nav-link">Home</a></li>--}}
{{--<li><a href="/about" class="nav-link">About</a></li>--}}
{{--<li><a href="/muscle-chart" class="nav-link">Muscle Chart</a></li>--}}
{{--<li><a href="/posts/create" class="nav-link">Create Post</a></li>--}}
{{--<li><a href="/exercises/create" class="nav-link">Create Exercise</a></li>--}}

{{--<li><a href="/exercises" class="nav-link">Exercises</a></li>--}}
{{--<li><a href="/routines/create" class="nav-link">Create Workout</a></li>--}}
{{--<li><a href="/routines" class="nav-link">Workouts</a></li>--}}

<nav class="navbar navbar-expand-md navbar-light navbar-laravel sticky" style="z-index:1;padding:5px;">
    <div class="container">
        <i class="fas fa-dumbbell" style="color:#3fb9b4;"></i>
        <a class="navbar-brand titleh" href="/posts" style="color:#3fb9b4;">
            {{--{{ config('app.name', 'Fitness app') }}--}}GymRat
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li><a href="/muscle-chart" class="nav-link redh">Muscle Chart</a></li>
                <li><a href="/posts/create" class="nav-link redh">Create Post</a></li>
                <li>
                    <div class="dropdown">
                        <a href="/routines" class="nav-link dropbtn">Workouts</a>
                        @auth
                            <div class="dropdown-content">
                                <a href="/routines/create">Create Workout</a>
                            </div>
                        @endauth
                    </div>
                </li>
                <li>
                    <div class="dropdown">
                        <a href="/exercises" class="nav-link dropbtn">Exercises</a>
                        @auth
                            <div class="dropdown-content">
                                <a href="/exercises/create">Create Exercise</a>
                            </div>
                        @endauth
                    </div>
                </li>
                <li>
                    <div class="dropdown">
                        <a href="/achievements/showsub" class="nav-link dropbtn">Road to glory</a>
                        @auth
                            <div class="dropdown-content">
                                <a href="/achievements/submission">Add submission</a>
                                <a href="/achievements/create">Create Achievement</a>
                            </div>
                        @endauth
                    </div>
                </li>
                <li><a href="/about" class="nav-link redh">About</a></li>

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav">
                <!-- Authentication Links -->
                @guest
                    <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="padding:0px;">
                                <img src="/storage/cover_images/{{Auth::user()->profile_pic}}" alt="Avatar" class="media-object photo-profile" style="border-radius: 50%;width:50px;height:50px;object-fit:cover;">
                                <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/user/{{Auth::user()->id}}">
                                    Profile
                                </a>
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
                        @endguest
            </ul>
        </div>
    </div>
</nav>