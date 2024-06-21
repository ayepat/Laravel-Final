<!DOCTYPE html>
<html lang="es">
@include('backoffice.partials.head')

<body class="d-flex flex-column min-vh-100 bg-light">
    @include('backoffice.partials.nav')

    <main class="container --bs-primary-bg-subtle mt-5 mb-5">
        <h1>Crear Producto</h1>
        <form action="/backoffice/products" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Categoría ID</label>
                <input type="text" class="form-control" id="category_id" name="category_id" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Precio</label>
                <input type="text" class="form-control" id="price" name="price" required>
            </div>
            <div class="mb-3">
                <label for="image_url" class="form-label">URL de Imagen</label>
                <input type="text" class="form-control" id="image_url" name="image_url" required>
            </div>
            <button type="submit" class="btn btn-warning">Crear</button>
        </form>
    </main>

    @include('backoffice.partials.footer')
</body>

</html>