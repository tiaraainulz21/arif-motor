<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container">
            <a class="navbar-brand" href="#">ARIF MOTOR</a>
            <form action="{{ route('products.search') }}" method="GET" class="d-flex">
                <input class="form-control me-2" type="search" name="query" placeholder="Cari SparePart Motor..." aria-label="Search">
                <button class="btn btn-outline-light" type="submit">Cari</button>
            </form>
        </div>
    </nav>

    <div class="container mt-3">
        @yield('content')
    </div>
</body>
</html>
