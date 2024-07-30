<!DOCTYPE html>
<html lang="es">
@include('web.partials.head')

<body class="d-flex flex-column min-vh-100 bg-light">
    @include('web.partials.nav', ['categories' => $categories])

    <main class="container --bs-primary-bg-subtle mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="card">
                    @if ($product)
                    <img src="{{ asset('storage/' . $product->image_path) }}" class="card-img-top mt-10" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text">{{ $product->category_id }}</p>
                        <p class="card-text">Precio: ${{ $product->price }}</p>

                        <form action="{{ route('web.cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <button class="btn btn-success">Agregar al Carrito</button>
                        </form>

                    </div>
                    @else
                    <p>El producto no se encontró o no está disponible.</p>
                    @endif

                    <a href="{{ route('web.products.index') }}" class="btn btn-primary" style="margin-top: 10px;">Atrás</a>

                </div>

            </div>
    </main>

    @include('web.partials.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>