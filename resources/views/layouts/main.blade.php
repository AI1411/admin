<!DOCTYPE html>
<html>
@include('layouts.head')
@yield('css')
<body class="hold-transition sidebar-mini layout-fixed">
<div id="#app">
    <div class="wrapper">
        @include('layouts.navbar')
        @include('layouts.sidebar')
        @yield('content')
        @include('layouts.footer')
    </div>
</div>
@include('layouts.script')
@yield('js')
</body>
</html>
