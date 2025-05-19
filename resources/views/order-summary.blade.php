@extends('layouts.app')

@section('content')
<style>
    .content h2 {
        color: darkgreen;
    }

    .card {
        margin-top: 30px;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        background-color: white;
    }

    img.product-img {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 8px;
    }


    .card h4 {
        margin-bottom: 20px;
    }

    img.product-img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 8px;
    }

    .quantity-control {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .quantity-control input {
        width: 50px;
        text-align: center;
    }

    .btn-outline-secondary {
        border-radius: 5px;
    }
</style>

<div class="container mt-4 content">
    <h4 class="text-success">RINGKASAN PESANAN</h4>

    <div class="card p-3 mb-3">
        <h4>{{ $order['customer']['name'] }}</h4>
        <p>{{ $order['customer']['phone'] }}</p>
        <p>{{ $order['customer']['address'] }}</p>          
    </div>    

    <div class="card p-3 mb-3">
        <div class="d-flex align-items-center gap-3">
            <img src="{{ asset('storage/' . $order['product']['image']) }}" alt="{{ $order['product']['name'] }}" class="product-img">
            <div>
                <strong>{{ $order['product']['name'] }}</strong>
                <p>Rp.<span id="price">{{ number_format($order['product']['price'], 0, ',', '.') }}</span></p>
            </div>
        </div>

        <div class="quantity-control mt-3">
            <button class="btn btn-outline-secondary" onclick="decreaseQuantity()">-</button>
            <input type="text" id="quantity" value="{{ $order['product']['qty'] }}" readonly>
            <button class="btn btn-outline-secondary" onclick="increaseQuantity()">+</button>
        </div>
    </div>

    <h5>Metode Pembayaran</h5>
    <div class="btn-group mb-3" role="group" id="paymentMethods">
        <button type="button" class="btn btn-success payment-method" data-method="COD">COD</button>
        <button type="button" class="btn btn-outline-success payment-method" data-method="Transfer Bank">Transfer Bank</button>
        <button type="button" class="btn btn-outline-success payment-method" data-method="Dana">Dana</button>
    </div>

    <div class="card p-3">
        <p>Subtotal untuk Produk: <strong>Rp.<span id="subtotal">{{ number_format($order['subtotal'], 0, ',', '.') }}</span></strong></p>
        <p>Subtotal Pengiriman: Rp.{{ number_format($order['shipping'], 0, ',', '.') }}</p>
        <p>Biaya Layanan: Rp.{{ number_format($order['service_fee'], 0, ',', '.') }}</p>
        <h4>Total Pembayaran: <strong>Rp.<span id="total">{{ number_format($order['total'], 0, ',', '.') }}</span></strong></h4>
    </div>

    <form id="orderForm" action="{{ route('order.store') }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $order['product']['id'] }}">
        <input type="hidden" name="price" value="{{ $order['product']['price'] }}">
        <input type="hidden" id="form_quantity" name="qty" value="{{ $order['product']['qty'] }}">
        <input type="hidden" id="payment_method_input" name="payment_method" value="COD">
        <input type="hidden" name="shipping" value="{{ $order['shipping'] }}">
        <input type="hidden" name="service_fee" value="{{ $order['service_fee'] }}">
        <input type="hidden" id="form_total" name="total" value="{{ $order['total'] }}">

        <div class="text-center mt-3 mb-5">
            <button type="submit" class="btn btn-success w-100">Buat Pesanan</button>
        </div>
    </form>
</div>

<!-- Midtrans Snap.js -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>

<script>
    const unitPrice = {{ $order['product']['price'] }};
    const shipping = {{ $order['shipping'] }};
    const serviceFee = {{ $order['service_fee'] }};

    function formatRupiah(number) {
        return number.toLocaleString('id-ID');
    }

    function updateTotals() {
        const quantity = parseInt(document.getElementById('quantity').value);
        const subtotal = quantity * unitPrice;
        const total = subtotal + shipping + serviceFee;

        document.getElementById('subtotal').innerText = formatRupiah(subtotal);
        document.getElementById('total').innerText = formatRupiah(total);

        document.getElementById('form_quantity').value = quantity;
        document.getElementById('form_total').value = total;
    }

    function increaseQuantity() {
        let input = document.getElementById('quantity');
        let value = parseInt(input.value);
        input.value = value + 1;
        updateTotals();
    }

    function decreaseQuantity() {
        let input = document.getElementById('quantity');
        let value = parseInt(input.value);
        if (value > 1) {
            input.value = value - 1;
            updateTotals();
        }
    }

    const paymentButtons = document.querySelectorAll('.payment-method');
    const paymentMethodInput = document.getElementById('payment_method_input');

    paymentButtons.forEach(button => {
        button.addEventListener('click', function () {
            paymentButtons.forEach(btn => {
                btn.classList.remove('btn-success');
                btn.classList.add('btn-outline-success');
            });

            this.classList.remove('btn-outline-success');
            this.classList.add('btn-success');

            paymentMethodInput.value = this.getAttribute('data-method');
        });
    });

    document.getElementById('orderForm').addEventListener('submit', function (e) {
        e.preventDefault();

        const method = paymentMethodInput.value;

        if (method === 'COD') {
            if (confirm("Apakah Anda yakin ingin membuat pesanan ini dengan COD?")) {
                this.submit();
            }
        } else {
            fetch("{{ route('payment.token') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    total: document.getElementById('form_total').value,
                    name: "{{ $order['customer']['name'] }}",
                    email: "{{ Auth::user()->email }}"
                })
            }).then(res => res.json())
            .then(data => {
                snap.pay(data.token, {
                    onSuccess: function(result) {
                        document.getElementById('orderForm').submit();
                    },
                    onPending: function(result) {
                        alert("Transaksi menunggu pembayaran.");
                    },
                    onError: function(result) {
                        alert("Terjadi kesalahan.");
                    }
                });
            });
        }
    });
</script>
@endsection
