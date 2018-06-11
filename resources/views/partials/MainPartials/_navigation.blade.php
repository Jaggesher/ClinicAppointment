<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
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
            <a style="color:white" class="navbar-brand" href="{{ url('/') }}">DocAppointment</a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a style="color:white" style="hover:color:red" href="{{route('Doctors')}}">Doctors</a></li>
                @if(Auth::guard('web')->check())
                    <li class="dropdown">
                        <a style="color:white" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Admin<span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{route('AdminAdd')}}">Add</a></li>
                        </ul>
                    </li>
                @endif
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if(Auth::guard('doctor')->check())
                    <li class="dropdown">
                        <a style="color:white" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::guard('doctor')->user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{route('ViewDoc', ['id' => Auth::guard('doctor')->user()->id])}}">Profile</a></li>
                            <li>
                                <a href="{{route('DocLogout')}}"
                                   onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('DocLogout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @elseif(Auth::guard('patient')->check())
                    <li class="dropdown">
                        <a style="color:white" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::guard('patient')->user()->fname }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{route('ViewPatient', ['id' => Auth::guard('patient')->user()->id])}}">Profile</a></li>
                            <li>
                                <a href="{{route('PatientLogout')}}"
                                   onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('PatientLogout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @elseif(Auth::guard('web')->check())
                    <li class="dropdown">
                        <a style="color:white" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::guard()->user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{route('logout')}}"
                                   onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @elseif (Auth::guest())
                    <li class="dropdown">
                        <a style="color:white" class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> Sign Up
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{Route('PatientAdd')}}">Patient Register</a></li>
                            <li><a href="{{Route('DocAdd')}}">Doctor Register</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a style="color:white" class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-log-in"></span> Login
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('PatientLogin')}}">PatientLogin</a></li>
                            <li><a href="{{route('DocLogin')}}">DoctorLogin</a></li>
                            <li><a href="{{route('login')}}">Admin</a></li>
                        </ul>
                    </li>
                @endif

            </ul>
        </div>
    </div>
</nav>