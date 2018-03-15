<!DOCTYPE html>
<html>
  <head>
    {{--Every child page should inject page title through section name title--}}
    @include('partials.MainPartials._head')
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
      footer{
          text-align: center;
          background-color: #2f2f2f;
          color: white;
          font-size: 15px;
          height: 45px;
          padding-top: 15px;
      }
    </style>
  </head>

  <body>
     @include('partials.MainPartials._navigation')
      <hr>
    
      <div id="ContentOfBody" class="container-fluid">
         @yield('ContentOfBody')
      </div>

     <footer>
         <p>© 2018 Copyright:<a href="https://github.com/LazySaddam"> Saddam Hossain, </a></p>
     </footer>
  </body>
 
</html>
