
@extends('layouts.master')

@section('content')

<h1>Edit Produk</h1>
<hr>

<div class="card">
    <div class="card-header">
        Form Edit Produk
    </div>

    <div class="card-body">
        <form action="{{ route('product.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama Produk</label>
                <input type="text" name="name_product" class="form-control"
                    value="{{ old('name_product', $product->name_product) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Stok Produk</label>
                <input type="number" name="stock_product" class="form-control"
                    value="{{ old('stock_product', $product->stock_product) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Harga Produk</label>
                <input type="number" name="price_product" class="form-control"
                    value="{{ old('price_product', $product->price_product) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi Produk</label>
                <textarea name="desc_product" class="form-control">{{ old('desc_product', $product->desc_product) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Kategori Produk</label>
                <input type="number" name="id_category" class="form-control"
                    value="{{ old('id_category', $product->id_category) }}">
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="/product" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

@endsection
