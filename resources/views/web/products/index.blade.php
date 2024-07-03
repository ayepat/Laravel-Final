<!DOCTYPE html>
<html lang="es">

@include('web.partials.head')

<body class="d-flex flex-column min-vh-100 bg-light">
@include('web.partials.nav' , ['categories' => $categories])

<main class="container --bs-primary-bg-subtle mt-5 mb-5">
    <h1>Products</h1>
    @if($products->isEmpty())
        <p>No hay productos disponibles.</p>
    @else
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                    <img src="{{ asset('storage/' . $product->image_url) }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text">Precio: ${{ $product->price }}</p>
                            <p class="card-text">Categoría: {{ $product->category->value }}</p>
                            <a href="{{ route('web.products.show', $product->id) }}" class="btn btn-primary">Ver más</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    @include('web.partials.pagination')
</main>

@include('web.partials.footer')

</body>
</html>
