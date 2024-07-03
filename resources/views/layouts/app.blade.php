<!DOCTYPE html>
<html lang="es" >
@include('web.partials.head')

<body class="d-flex flex-column min-vh-100 bg-light">
    @include('web.partials.nav')
    <main class="container --bs-primary-bg-subtle mt-5 mb-5">
       
        @yield('content')
    </main>
    @include('web.partials.footer')
</body>

</html>