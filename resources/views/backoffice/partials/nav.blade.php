<nav class="navbar navbar-expand-lg bg-success">

  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('backoffice.landingpage') }}">Bazar Kala</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/products/">Ver como USUARIO</a>
        </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categorías
        </a>
        <ul class="dropdown-menu">
            @foreach($categories as $category)
            <li>
                <a class="dropdown-item" href="{{ route('backoffice.products.category', ['category_id' => $category->id]) }}">
                    {{ $category->value }}
                </a>
            </li>
            @endforeach
        </ul>
    </li>

      </ul>
      <form class="d-flex" role="search" action="{{ route('backoffice.products.index') }}" method="GET">
        <input class="form-control me-2" type="search" placeholder="Search" name="search" aria-label="Search">
        <button class="btn btn-outline-warning" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>