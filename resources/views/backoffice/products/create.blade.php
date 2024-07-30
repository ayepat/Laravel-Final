<!DOCTYPE html>
<html lang="es">
@include('backoffice.partials.head')

<body class="d-flex flex-column min-vh-100 bg-light">
    @include('backoffice.partials.nav' , ['categories' => $categories])

    <main class="container --bs-primary-bg-subtle mt-5 mb-5">
        <h1>Crear Producto</h1>
        <form action="/backoffice/products" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Otros campos del formulario -->
            <div class="mb-3">
                <label for="name" class="form-label">Nombre del producto</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Precio</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Categoría</label>
                <select class="form-select" id="category_id" name="category_id" required>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->value }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Tags</label><br>
                @foreach ($tags as $tag)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox{{ $tag->id }}" value="{{ $tag->id }}" name="tags[]">
                    <label class="form-check-label" for="inlineCheckbox{{ $tag->id }}">{{ $tag->value }}</label>
                </div>
                @endforeach
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Imagen del producto</label>
                <input class="form-control" type="file" id="image" name="image" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

    </main>

    @include('backoffice.partials.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>