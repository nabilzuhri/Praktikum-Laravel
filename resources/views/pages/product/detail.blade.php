
@extends('layouts.master')

@section('content')

<h1>Detail Produk</h1>
<hr>

<div class="card">
    <div class="card-header">
        Detail Produk
    </div>

    <div class="card-body">
        <h4>{{ $product->name_product }}</h4>

        <p><b>Nama Produk:</b> {{ $product->name_product }}</p>
        <p><b>Stok:</b> {{ $product->stock_product }}</p>
        <p><b>Harga:</b> Rp {{ number_format($product->price_product, 0, ',', '.') }}</p>
        <p><b>Deskripsi:</b> {{ $product->desc_product }}</p>

        <a href="{{ url('/product') }}" class="btn btn-primary">
            Kembali ke Produk
        </a>
    </div>
</div>

@endsection
