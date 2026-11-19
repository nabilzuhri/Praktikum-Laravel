
@extends('layouts.master')

@section('content')

<h1>Daftar Produk</h1>
<hr>

<a href="/product/addProduct" class="btn btn-primary mb-3">
    + Tambah Produk
</a>

{{-- Pesan sukses --}}
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card mb-4">
    <div class="card-header">
        <b>Informasi Toko</b>
    </div>

    <div class="card-body">
        <p><b>Nama Toko:</b> {{ $data_toko['nama_toko'] }}</p>
        <p><b>Alamat Toko:</b> {{ $data_toko['alamat_toko'] }}</p>
        <p class="mb-0"><b>Status Toko:</b> {{ $data_toko['status_toko'] }}</p>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <b>Data Produk</b>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th width="230">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($data_produk as $item)
                    <tr>
                        <td>
                            {{ ($data_produk->perPage() * ($data_produk->currentPage() - 1)) + $loop->iteration }}
                        </td>

                        <td>{{ $item->name_product }}</td>
                        <td>{{ $item->stock_product }}</td>

                        <td>
                            Rp {{ number_format($item->price_product, 0, ',', '.') }}
                        </td>

                        <td>{{ $item->desc_product }}</td>

                        <td>
                            <a href="{{ route('product.show', $item->id) }}"
                               class="btn btn-info btn-sm">
                                Detail
                            </a>

                            <a href="{{ route('product.edit', $item->id) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('product.destroy', $item->id) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="6" class="text-center">
                            Belum ada data produk.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-3">
            {{ $data_produk->links('pagination::bootstrap-5') }}

            <p>
                Halaman: {{ $data_produk->currentPage() }}<br>
                Jumlah Data: {{ $data_produk->total() }}<br>
                Data Per Halaman: {{ $data_produk->perPage() }}
            </p>
        </div>
    </div>
</div>

@endsection
