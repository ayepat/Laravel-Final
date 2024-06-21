<!DOCTYPE html>
<html lang="es">

    @include('backoffice.partials.head')

<body class="d-flex flex-column min-vh-100 bg-light">

    @include('backoffice.partials.nav')

    <main class="container --bs-primary-bg-subtle mt-5 mb-5">
        <h1>Productos</h1>

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
                    <td>{{ $product->category_id }}</td>
                    <td><img src="{{ $product->image_url }}" alt="{{ $product->name }}" width="100"></td>
                    <td>
                        <button class="btn btn-warning">
                            <a href="/backoffice/products/{{$product->id}}/edit" style="text-decoration: none; color: inherit;">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </button>
                        <button class="btn btn-danger">
                            <a href="#" style="text-decoration: none; color: inherit;">
                                <i class="fa-solid fa-trash-can"></i>
                            </a>
                        </button>
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
    </main>

    @include('backoffice.partials.footer')

</body>

</html>