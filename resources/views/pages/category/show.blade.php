
@extends('layouts.master')

@section('content')

<h1 class="mb-4">Daftar Kategori</h1>

<div class="card">
    <div class="card-header">
        Produk Kami
    </div>

    <div class="card-body">

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Kategori</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($kategori as $item)
                <tr>
                    <th scope="row">
                        {{ ($kategori->perPage() * ($kategori->currentPage() - 1)) + $loop->iteration }}
                    </th>

                    <td>{{ $item->category_name }}</td>
                    <td>{{ $item->description }}</td>

                    <td>
                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                        <button type="button" class="btn btn-danger btn-sm">Hapus</button>
                    </td>
                </tr>

                @empty
                <tr>
                    <td colspan="4" class="text-center">
                        Belum ada data kategori.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-3">
            {{ $kategori->links('pagination::bootstrap-5') }}

            <p class="mb-0">
                Halaman : {{ $kategori->currentPage() }}<br>
                Jumlah Data : {{ $kategori->total() }}<br>
                Data Per Halaman : {{ $kategori->perPage() }}
            </p>
        </div>

    </div>
</div>

@endsection
