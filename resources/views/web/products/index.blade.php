<!DOCTYPE html>
<html lang="es">

@include('web.partials.head')


<body class="d-flex flex-column min-vh-100 bg-light">
@include('web.partials.nav')

    <main class="container --bs-primary-bg-subtle mt-5 mb-5">

        <h1>Products</h1>
        @if($products->isEmpty())
        <p>No hay productos disponibles.</p>
        @else
        <table class="table table-success table-striped">
            <thead class="table-bordered border-success">
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Categoria</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="table-bordered border-success">
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->category_id }}</td>
                    <td><img src="{{ $product->image_url }}" alt="{{ $product->name }}" width="120"></td>
                    <td>
                        <button class="btn btn-primary">
                            <a href="{{ route('web.products.show', $product->id) }}" style="text-decoration: none; color: inherit;">
                                <span class="visually-hidden">Ver más</span>
                                <i class="fa-solid fa-up-right-from-square"></i>
                            </a>
                        </button>

                        </a>
                        </button>


                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </main>
    @include('web.partials.footer')


</body>

</html>