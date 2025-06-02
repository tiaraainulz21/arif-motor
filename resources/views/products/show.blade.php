@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="text-center my-4">PRODUK</h3>
    
    <div class="card shadow p-4">
        <div class="row align-items-center">
            <div class="col-md-4 text-center">
                <img src="{{ asset ('storage/' . $product->image) }}" alt="{{ $product->name }}">
            </div>

            <div class="col-md-8">
                <h5 class="fw-bold">{{ $product['name'] }}</h5>
                <p><strong>Merk:</strong> {{ $product['brand'] }}</p>
                <p><strong>Jenis:</strong> {{ $product['type'] }}</p>
                <p><strong>Kondisi:</strong> {{ $product['condition'] }}</p>
                <p><strong>Stok:</strong> {{ $product['stock'] }}</p>
                <p><strong>Harga:</strong> Rp.{{ number_format($product['price'], 0, ',', '.') }}</p>

                <div class="d-flex align-items-center">
                    <button class="btn btn-outline-secondary" onclick="decreaseQuantity()">-</button>
                    <input type="text" id="quantity" value="1" class="form-control text-center mx-2" style="width: 50px;" readonly>
                    <button class="btn btn-outline-secondary" onclick="increaseQuantity()">+</button>
                </div>

                <script>
    // ambil stok produk dari blade
    const maxStock = {{ $product['stock'] }};

    function increaseQuantity() {
        let input = document.getElementById('quantity');
        let currentValue = parseInt(input.value);
        if (currentValue < maxStock) {
            input.value = currentValue + 1;
        }
    }

    function decreaseQuantity() {
        let input = document.getElementById('quantity');
        let value = parseInt(input.value);
        if (value > 1) {
            input.value = value - 1;
        }
    }

    // fungsi redirectToSummary dan addToCart tetap sama
    function redirectToSummary() {
        const quantity = document.getElementById('quantity').value;
        const productId = "{{ $product['id'] }}";
        fetch(`/produk/${productId}/set-quantity`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ quantity })
        })
        .then(() => {
            window.location.href = `/produk/${productId}/ringkasan`;
        });
    }

    function addToCart() {
        const qty = document.getElementById('quantity').value;
        document.getElementById('hidden-qty').value = qty;
        document.getElementById('add-to-cart-form').submit();
    }
</script>


                <div class="mt-3">
                    <button class="btn btn-success" onclick="addToCart()">
                        <i class="fas fa-cart-plus"></i> Masukan Keranjang
                    </button>

                    <button class="btn btn-dark" onclick="redirectToSummary()">
                        <i class="fas fa-shopping-bag"></i> Beli Sekarang
                    </button>
                </div>

                {{-- Form tersembunyi untuk POST ke CartController --}}
                <form id="add-to-cart-form" action="{{ route('cart.add', $product->id) }}" method="POST" style="display:none;">
                    @csrf
                    <input type="hidden" name="qty" id="hidden-qty" value="1">
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
