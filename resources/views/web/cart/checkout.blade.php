<!DOCTYPE html>
<html lang="es">

@include('web.partials.head')

<body class="d-flex flex-column min-vh-100 bg-light">
@include('web.partials.nav' , ['categories' => $categories])

<main class="container --bs-primary-bg-subtle mt-5 mb-5">
    <h1>Checkout</h1>
    @if($products->isEmpty())
        <p>Aún no tenés productos en tu changuito.</p>
    @else
        <table class="table">
            <thead class="table-success">
                <tr class="bg-success">
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Categoria</th>
                    <th>Imagen</th>
                </tr>
            </thead>
            <tbody class="table-success table-striped">
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->category->value }}</td>
                        <td><img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}" width="50"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <form action="{{ route('web.cart.buy') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Comprar</button>
        </form>
    @endif
</main>

@include('web.partials.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
