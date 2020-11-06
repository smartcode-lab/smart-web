<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.web.component.head')
</head>
<body class="sb-nav-fixed">
    @include('admin.web.component.header')
<div id="layoutSidenav">
    @include('admin.web.component.left')
    <div id="layoutSidenav_content">
        @yield('section')
        <footer class="py-4 bg-light mt-auto">
            @include('admin.web.component.footer')
        </footer>
    </div>
</div>
    @include('admin.web.component.script')
</body>
</html>
