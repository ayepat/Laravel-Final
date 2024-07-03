<!DOCTYPE html>
<html lang="es">

@include('web.partials.head')

<body class="d-flex flex-column min-vh-100 bg-light">
@include('web.partials.nav' , ['categories' => $categories])

<main class="container --bs-primary-bg-subtle mt-5 mb-5">
    <h1>Gracias por tu compra</h1>
    <p>Tu compra ha sido realizada con éxito.</p>
</main>

@include('web.partials.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
