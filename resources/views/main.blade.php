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
    </style>
  </head>

  <body>
     @include('partials.MainPartials._navigation')
      <hr>
    
      <div id="ContentOfBody" class="container-fluid">
         @yield('ContentOfBody')
      </div>
     <footer class="page-footer font-small blue pt-4 mt-4">
         <div class="footer-copyright py-3 text-center">
             © 2018 Copyright:
             <a href="#"> Saddam Hossain, </a>
         </div>
     </footer>
  </body>
 
</html>
