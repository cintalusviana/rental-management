<!DOCTYPE html>
<html>
<head>
    <title>Edit Kategori</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Edit Kategori</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.update', $category->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Kategori</label>
            <input type="text"
                   name="name"
                   class="form-control"
                   value="{{ $category->name }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea
                name="description"
                class="form-control"
                rows="4">{{ $category->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">
            Update
        </button>

        <a href="{{ route('categories.index') }}" class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

</body>
</html>