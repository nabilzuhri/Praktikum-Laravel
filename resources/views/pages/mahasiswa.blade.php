<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
</head>
<body>

    <h1>Daftar Mahasiswa</h1>

    <ul>
        @foreach ($mahasiswa as $nama)
            <li>{{ $nama }}</li>
        @endforeach
    </ul>

</body>
</html>