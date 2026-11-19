
@extends('layouts.master')

@section('content')
    <h4><b>Selamat datang!!</b></h4>

    <h4>
        <b>
            Perkenalkan saya {{ $nama }}, dari kelas
            {{ $kelas }} dengan nim {{ $nim }}
        </b>
    </h4>
@endsection
