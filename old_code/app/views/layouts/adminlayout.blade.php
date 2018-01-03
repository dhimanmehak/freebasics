<!DOCTYPE HTML>
<html>
    <!-- head  -->
    @include('includes.admin.head')  
    <body id="theme-default" class="full_block">
        <!-- sidebar  -->
        @include('includes.admin.sidebar') 
        <div id="container">
            <!-- header -->
            @include('includes.admin.header')    
            <!--content -->
            @yield('content')
        </div>
    </body>
</html>