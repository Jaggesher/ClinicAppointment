<nav class="navbar navbar-default navbar-static-top">
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
            <a class="navbar-brand" href="{{ url('/') }}">DocAppointment</a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href="#">Doctors</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> Sign Up
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{Route('PatientAdd')}}">Patient Register</a></li>
                        <li><a href="{{Route('DocAdd')}}">Doctor Register</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-log-in"></span> Login
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('PatientLogin')}}">PatientLogin</a></li>
                        <li><a href="{{route('DocLogin')}}">DoctorLogin</a></li>
                        <li><a href="{{route('login')}}">Admin</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>