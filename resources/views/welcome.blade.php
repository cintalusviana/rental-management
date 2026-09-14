<!DOCTYPE html>
<html>
<head>
    <title>Data Kategori</title>
</head>
<body>

<h1>Data Kategori</h1>

@if($categories->count())
    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Deskripsi</th>
        </tr>

        @foreach($categories as $category)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
        </tr>
        @endforeach

    </table>
@else
    <p>Belum ada data kategori.</p>
@endif

</body>
</html>