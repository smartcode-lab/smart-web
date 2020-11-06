<!DOCTYPE html>
<html lang="en">

<head>
    @include('web.component.head')
</head>

<body>

<!-- Top menu -->
<nav class="navbar" role="navigation">
    @include('web.component.header')
</nav>

@yield('section')

<!-- Footer -->
<footer>
    @include('web.component.footer')
</footer>

<!-- Javascript -->
@include('web.component.script')

</body>

</html>
