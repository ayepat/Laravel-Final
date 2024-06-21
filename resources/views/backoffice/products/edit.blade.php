<!DOCTYPE html>
<html lang="es">

<head>
    @include('backoffice.partials.head')
</head>

<body class="d-flex flex-column min-vh-100 bg-light">
    @include('backoffice.partials.nav')

    <main class="container --bs-primary-bg-subtle mt-5 mb-5">
        <h1>Editar Producto</h1>
        <form method="POST" action="/backoffice/products/{{ $product->id }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <textarea class="form-control" id="description" name="description" required>{{ $product->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Precio</label>
                <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Categoría ID</label>
                <input type="text" class="form-control" id="category_id" name="category_id" value="{{ $product->category_id }}" required>
            </div>
            <div class="mb-3">
                <label for="image_url" class="form-label">URL de Imagen</label>
                <input type="text" class="form-control" id="image_url" name="image_url" value="{{ $product->image_url }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </main>

    @include('backoffice.partials.footer')
</body>

</html>