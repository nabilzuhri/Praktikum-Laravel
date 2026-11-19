
@extends('layouts.master')

@section('content')

<h1>Tambah Produk</h1>
<hr>

<div class="card">
    <div class="card-header">
        Form Tambah Produk
    </div>

    <div class="card-body">

        <form action="{{ url('/storeProduct') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Produk</label>
                <input type="text" name="name_product"
                    class="form-control"
                    value="{{ old('name_product') }}">
                @error('name_product')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Stok Produk</label>
                <input type="number" name="stock_product"
                    class="form-control"
                    value="{{ old('stock_product') }}">
                @error('stock_product')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Harga Produk</label>
                <input type="number" name="price_product"
                    class="form-control"
                    value="{{ old('price_product') }}">
                @error('price_product')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi Produk</label>
                <textarea name="desc_product"
                    class="form-control">{{ old('desc_product') }}</textarea>
                @error('desc_product')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Kategori Produk</label>

                <select name="id_category" class="form-control">
                    <option value="">Pilih Kategori</option>

                    @foreach ($data_category as $category)
                        <option value="{{ $category->id_category }}"
                            {{ old('id_category') == $category->id_category ? 'selected' : '' }}>
                            {{ $category->category_name }}
                        </option>
                    @endforeach

                </select>

                @error('id_category')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                Simpan Produk
            </button>

        </form>

    </div>
</div>

@endsection
