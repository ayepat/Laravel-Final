<!DOCTYPE html>
<html lang="es">

@include('backoffice.partials.head')

<body class="d-flex flex-column min-vh-100 bg-light">

    @include('backoffice.partials.nav' , ['categories' => $categories])

    <main class="container --bs-primary-bg-subtle mt-5 mb-5">
        <h1>Bienvenido - Admin</h1>
        <div class="row">
  <div class="col-sm-6 mb-3 mb-sm-0">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Crear nuevo Producto</h5>
        <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tenetur corrupti sunt animi nihil incidunt rerum, iure debitis facilis optio omnis repellat obcaecati ex alias doloremque quas fuga, quae mollitia dignissimos.</p>
        <a href="{{ route('backoffice.products.create') }}" class="btn btn-success">
            <i class="fa-solid fa-square-plus" style="margin-right: 5px;"></i>Nuevo producto
        </a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Ver Todos los productos</h5>
        <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae consequuntur nihil aspernatur iusto placeat, ipsam quisquam sunt doloribus voluptatem veritatis.</p>
        <a href="{{ route('backoffice.products.index') }}" class="btn btn-success">
            <i class="fa-solid fa-square-plus" style="margin-right: 5px;"></i>Ver Productos
        </a>
      </div>
    </div>
  </div>
</div>

    

    </main>

    @include('backoffice.partials.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>