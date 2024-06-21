<!DOCTYPE html>
<html lang="es">
@include('web.partials.head')

<body class="d-flex flex-column min-vh-100 bg-light">
    @include('web.partials.nav')

    <main class="container --bs-primary-bg-subtle mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="card">
                    <img src="{{ $product->image_url }}" class="card-img-top mt-10" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text">{{ $product->category_id }}</p>

                        <p class="card-text">Precio: ${{ $product->price }}</p>
                        <button class="btn btn-success">Agregar al Carrito</button>
                    </div>
                </div>
                <a href="{{ route('web.products.index') }}" class="btn btn-primary" style="margin-top: 10px;">Atrás</a>

            </div>

        </div>
    </main>

    @include('web.partials.footer')
</body>

</html>