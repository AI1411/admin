<!DOCTYPE html>
<html>
@include('layouts.head')
@yield('css')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    @include('layouts.navbar')
    @include('layouts.sidebar')
    @yield('content')
    @include('layouts.footer')
</div>
@include('layouts.script')
@yield('js')
</body>
</html>
