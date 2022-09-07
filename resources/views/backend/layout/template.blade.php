<!DOCTYPE html>
<html lang="en">
<head> 
@include('backend.includes.header')
@include('backend.includes.css')

</head>
    
  <body>
    <!-- ########## START: LEFT PANEL ########## -->
    @include('backend.includes.leftpanel')

    <!-- ########## START: HEAD PANEL ########## -->
    @include('backend.includes.topber')
    <!-- ########## START: RIGHT PANEL ########## -->
    @include('backend.includes.rightpanel')  
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
    @yield('body-content')
    @include('backend.includes.footer')
    </div><!-- br-mainpanel -->
    @include('backend.includes.js')
    
  </body>
</html>