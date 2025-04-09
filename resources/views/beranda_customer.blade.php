@extends('layouts.nav')

@section('content')
<style>
    .container {
    width: 90%;
    margin: 20px auto;
    text-align: center;
}

.content h2 {
    color: darkgreen;
}

.product-list {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-top: 20px;
}

.product {
    background: white;
    padding: 15px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: left;
    width: 200px;
}

.product img {
    width: 100%;
    height: auto;
}

.product p {
    margin: 5px 0;
}
</style>

<div class="content">
    <h2>ARIF MOTOR</h2>
    <p>Selamat datang di platform belanja sparepart dan layanan service online</p>

    <div class="product-list">
        <div class="product">
            <img src="{{ asset('images/busi.jpg') }}" alt="Denso Busi Motor">
            <p>Denso Busi Motor</p>
            <p>Rp.50.000</p>
        </div>
        <div class="product">
            <img src="{{ asset('images/Radiator.jpg') }}" alt="Radiator Assy Honda Vario 160">
            <p>Radiator Assy Honda Vario 160</p>
            <p>Rp.300.000</p>
        </div>
        <div class="product">
            <img src="{{ asset('images/pompa oli.jpg') }}" alt="Pompa Oli Honda CB150">
            <p>Pompa Oli Honda CB150</p>
            <p>Rp.200.000</p>
        </div>
        <div class="product">
            <img src="{{ asset('images/busi.jpg') }}" alt="Denso Busi Motor">
            <p>Denso Busi Motor</p>
            <p>Rp.50.000</p>
        </div>
        <div class="product">
            <img src="{{ asset('images/Radiator.jpg') }}" alt="Radiator Assy Honda Vario 160">
            <p>Radiator Assy Honda Vario 160</p>
            <p>Rp.300.000</p>
        </div>
        <div class="product">
            <img src="{{ asset('images/pompa oli.jpg') }}" alt="Pompa Oli Honda CB150">
            <p>Pompa Oli Honda CB150</p>
            <p>Rp.200.000</p>
        </div>
    </div>
</div>
@endsection
