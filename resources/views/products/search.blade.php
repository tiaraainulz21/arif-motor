@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <p id="searchResults"></p>
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4">
                    <a href="{{ route('product.showByName', $product->id) }}">
                        <div class="card shadow-sm">
                            <img src="{{ $product['image'] }}" class="card-img-top" alt="{{ $product['name'] }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product['name'] }}</h5>
                                <p class="card-text">Rp.{{ number_format($product['price'], 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        document.getElementById("searchInput").addEventListener("input", function() {
            let query = this.value;
            document.getElementById("searchResults").innerHTML = "Kamu mencari: " + query;
        });
    </script>
@endsection