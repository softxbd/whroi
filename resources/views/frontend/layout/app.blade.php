<!DOCTYPE html>
<html>
@include('frontend.layout.head')
<body>

<!-- navbar section  -->
@include('frontend.layout.desktop-menu')

<!-- responsive modal  -->
@include('frontend.layout.mobile-menu')

@yield('content')

<!-- footer  -->
@include('frontend.layout.footer')
@include('frontend.layout.javascript')

</body>
</html>
