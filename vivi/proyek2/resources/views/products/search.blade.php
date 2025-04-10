<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARIF MOTOR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container">
            <a class="navbar-brand" href="#">ARIF MOTOR</a>
            <form action="{{ route('products.search') }}" method="GET" class="d-flex w-50">
                <input type="text" name="q" class="form-control me-2" placeholder="Cari SparePart Motor" required>
                <button type="submit" class="btn btn-light">
                    <i class="fa fa-search"></i>
                </button>
            </form>

<script>
    document.getElementById("searchInput").addEventListener("input", function() {
        let query = this.value;
        document.getElementById("searchResults").innerHTML = "Kamu mencari: " + query;
    });
</script>
            <div>
                <button class="btn btn-light" onclick="window.location.href='{{ route('cart.index') }}'">
                    <i class="fa fa-shopping-cart"></i>
                </button>
                <button class="btn btn-light" onclick="window.location.href='{{ route('profile.show') }}'">
                    <i class="fa fa-user"></i>
                </button>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <img src="{{ $product['image'] }}" class="card-img-top" alt="{{ $product['name'] }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product['name'] }}</h5>
                            <p class="card-text">Rp.{{ number_format($product['price'], 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</body>
</html>
