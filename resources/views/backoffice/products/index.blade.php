<!DOCTYPE html>
<html lang="es">

@include('backoffice.partials.head')

<body class="d-flex flex-column min-vh-100 bg-light">

    @include('backoffice.partials.nav' , ['categories' => $categories])

    <main class="container --bs-primary-bg-subtle mt-5 mb-5">
        <h1>Products</h1>

        <table class="table table-success table-striped">
            <thead class="table-success">
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Categoria</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->category ? $product->category->value : 'Sin categoría' }}</td>
                    <td>
                        @if ($product->image_path)
                        <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" style="width: 200px; height: auto;">
                        @endif
                    </td>
                    <td>
                        <button class="btn btn-warning">
                            <a href="/backoffice/products/{{$product->id}}/edit" style="text-decoration: none; color: inherit;">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </button>
                        <form action="{{ route('backoffice.products.destroy', $product->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este producto?');">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">No hay ningún producto para mostrar</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <a href="{{ route('backoffice.products.create') }}" class="btn btn-success">
            <i class="fa-solid fa-square-plus" style="margin-right: 5px;"></i>Nuevo producto
        </a>
        @include('backoffice.partials.pagination', ['products' => $products])
    </main>

    @include('backoffice.partials.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>