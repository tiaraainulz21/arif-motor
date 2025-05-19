@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2><i class="fas fa-shopping-cart"></i> KERANJANG</h2>

    <!-- Form Checkout -->
    <form action="{{ route('cart.checkout') }}" method="POST">
        @csrf

        <table class="table align-middle">
            <thead>
                <tr>
                    <th><input type="checkbox" id="checkAll"></th>
                    <th>Produk</th>
                    <th>Harga Satuan</th>
                    <th>Kuantitas</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @forelse($cart as $item)
                    @php
                        $itemTotal = $item->product->price * $item->qty;
                        $total += $itemTotal;
                    @endphp
                    <tr>
                        <td>
                            <input type="checkbox" name="checkout_items[]" value="{{ $item->id }}" class="item-checkbox">
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                @if($item->product && $item->product->image)
                                    <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" width="70" class="rounded me-2">
                                @endif
                                <div>
                                    <strong>{{ $item->product->name }}</strong><br>
                                    <small class="text-muted">{{ $item->product->brand }} - {{ $item->product->type }}</small>
                                </div>
                            </div>
                        </td>
                        <td class="unit-price" data-price="{{ $item->product->price }}">
                            Rp.{{ number_format($item->product->price, 0, ',', '.') }}
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <button type="button" class="btn btn-outline-secondary" onclick="changeQuantity({{ $item->id }}, -1)">-</button>
                                <input type="text" name="qty[{{ $item->id }}]" id="quantity-{{ $item->id }}" value="{{ $item->qty }}" class="form-control text-center mx-2" style="width: 50px;" readonly>
                                <input type="hidden" name="qty_hidden[{{ $item->id }}]" id="quantity-hidden-{{ $item->id }}" value="{{ $item->qty }}">
                                <button type="button" class="btn btn-outline-secondary" onclick="changeQuantity({{ $item->id }}, 1)">+</button>
                            </div>
                        </td>
                        <td class="item-total" id="item-total-{{ $item->id }}">
                            Rp.{{ number_format($itemTotal, 0, ',', '.') }}
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm" onclick="removeItem({{ $item->id }}, this)">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Keranjang Kosong</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        @if($cart->count())
        <div class="d-flex justify-content-between align-items-center">
            <h4>Total: <strong id="total-all">Rp.{{ number_format($total, 0, ',', '.') }}</strong></h4>
            <button type="submit" class="btn btn-success">
                <i class="fas fa-check"></i> Checkout
            </button>
        </div>
        @endif
    </form>
</div>

{{-- Script JS --}}
<script>
    function changeQuantity(id, delta) {
        const input = document.getElementById('quantity-' + id);
        const hiddenInput = document.getElementById('quantity-hidden-' + id);
        let qty = parseInt(input.value);

        if (qty + delta < 1) return;

        qty += delta;
        input.value = qty;
        hiddenInput.value = qty;

        // Ambil harga satuan
        const row = input.closest('tr');
        const unitPrice = parseInt(row.querySelector('.unit-price').dataset.price);

        // Hitung ulang total per item
        const itemTotal = unitPrice * qty;
        row.querySelector('.item-total').innerText = 'Rp.' + itemTotal.toLocaleString('id-ID');

        // Hitung ulang total semua item
        updateTotalAll();
    }

    function updateTotalAll() {
        let total = 0;

        document.querySelectorAll('.item-total').forEach(item => {
            const angka = item.innerText.replace(/[^\d]/g, '');
            if (angka) {
                total += parseInt(angka);
            }
        });

        document.getElementById('total-all').innerText = 'Rp.' + total.toLocaleString('id-ID');
    }

    document.getElementById('checkAll')?.addEventListener('change', function () {
        document.querySelectorAll('.item-checkbox').forEach(cb => cb.checked = this.checked);
    });

    function removeItem(itemId, button) {
        if (!confirm('Hapus produk ini dari keranjang?')) return;

        fetch(`/cart/${itemId}/remove`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            if (response.ok) {
                const row = button.closest('tr');
                row.remove();
                updateTotalAll();
            } else {
                return response.json().then(data => {
                    alert(data.message || 'Gagal menghapus item');
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat menghapus item.');
        });
    }
</script>
@endsection
