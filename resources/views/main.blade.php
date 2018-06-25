<!DOCTYPE html>
<html>
  <head>
    {{--Every child page should inject page title through section name title--}}
    @include('partials.MainPartials._head')
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    @yield('OuterInclude')
    <style type="text/css">
      #ContentOfBody{
        bottom: 0;
        left: 0;
        position: relative;
        right: 0;
        top: 0;
        min-height: 100vh;
      }
      #ContentOfooter{
        bottom: 0;
        left: 0;
        position: relative;
        right: 0;
        top: 5em;
        /* min-height: 100vh; */

        
    }

    .navbar-nav li a:hover {
          color: #1abc9c !important;
          background: transparent !important;
      }

    body{
      background: url("picture/111.jpg") fixed center;
    }
    </style>
  </head>

  <body>
     @include('partials.MainPartials._navigation')
      <div id="ContentOfBody" class="container-fluid">
         @yield('ContentOfBody')
      </div>

     <div id="ContentOfooter">
     <footer class="footer">
      <div class="container">
          <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
              <h4 style="text-align: center">Saddam Hossen</h4>
              <h4 style="text-align: center">University of Rajshahi</h4>
              <h5 style="text-align: center">Dept. of CSE</h5>
              <h5 style="text-align: center">Session 2013-14</h5>
            </div>
            <div class="col-sm-3"></div>
          </div>
          <hr>
          
          <div class="row text-center"> © 2018. Developed by <a style="text-decoration: none" href="#">Saddam Hossen</a></div>
      </div>
    </footer>
     </div>
  </body>
 
</html>
