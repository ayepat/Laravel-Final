<!DOCTYPE html>
<html lang="es">

<head>
    @include('backoffice.partials.head')
</head>

<body class="d-flex flex-column min-vh-100 bg-light">
    @include('backoffice.partials.nav' , ['categories' => $categories])

    <main class="container --bs-primary-bg-subtle mt-5 mb-5">
        <h1>Editar Producto</h1>
        <form action="{{ route('backoffice.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
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
                <label for="category_id" class="form-label">Categoría </label>
                <select class="form-select" name="category_id" aria-label="Category">
                    <option disabled>Selecciona una categoría</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->value }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Imagen del producto</label>
                <input class="form-control" type="file" id="image" name="image">
            </div>

            <div class="mb-3">
                <div class="row">
                    <label for="tags" class="form-label">Tags</label>
                    <div class="col-md-12">

                        @foreach ($tags as $tag)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox{{ $tag->id }}" value="{{ $tag->id }}" name="tags[]" @if ($product->tags->contains($tag->id)) checked @endif>
                            <label class="form-check-label" for="inlineCheckbox{{ $tag->id }}">{{ $tag->value }}</label>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
        </form>
    </main>

    @include('backoffice.partials.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>