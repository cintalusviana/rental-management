@extends('layout.app')

@section('content')

<div class="container">

    <h2 class="mb-4">
        Edit Barang
    </h2>

    <div class="card p-4 shadow">

        <form
            action="{{ route('products.update',$product->id) }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf
            @method('PUT')

            {{-- Kategori --}}
            <div class="mb-3">

                <label class="form-label">
                    Kategori
                </label>

                <select
                    name="category_id"
                    class="form-control"
                    required>

                    @foreach($categories as $category)

                        <option
                            value="{{ $category->id }}"
                            {{ $product->category_id == $category->id ? 'selected' : '' }}>

                            {{ $category->name }}

                        </option>

                    @endforeach

                </select>

            </div>

            {{-- Nama Barang --}}
            <div class="mb-3">

                <label class="form-label">
                    Nama Barang
                </label>

                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="{{ $product->name }}"
                    required>

            </div>

            {{-- Deskripsi --}}
            <div class="mb-3">

                <label class="form-label">
                    Deskripsi
                </label>

                <textarea
                    name="description"
                    class="form-control"
                    rows="4">{{ $product->description }}</textarea>

            </div>

            <div class="row">

                {{-- Harga --}}
               <div class="col-md-6 mb-3">

                <label>Harga / Hari</label>

                <div class="input-group">

                    <span class="input-group-text">
                        Rp
                    </span>

                    <input
                        type="text"
                        id="price_display"
                        class="form-control"
                        value="{{ number_format($product->price_per_day,0,',','.') }}"
                        placeholder="120.000">

                    <input
                        type="hidden"
                        name="price_per_day"
                        id="price_per_day"
                        value="{{ $product->price_per_day }}">

                </div>

            </div>

            
                {{-- Stok --}}
                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Stok
                    </label>

                    <input
                        type="number"
                        name="stock"
                        class="form-control"
                        value="{{ $product->stock }}"
                        required>

                </div>

            </div>

            {{-- Status --}}
            <div class="mb-3">

                <label class="form-label">
                    Status
                </label>

                <select
                    name="status"
                    class="form-control">

                    <option value="available"
                        {{ $product->status=='available' ? 'selected' : '' }}>
                        Tersedia
                    </option>

                    <option value="rented"
                        {{ $product->status=='rented' ? 'selected' : '' }}>
                        Sedang Disewa
                    </option>

                    <option value="maintenance"
                        {{ $product->status=='maintenance' ? 'selected' : '' }}>
                        Perawatan
                    </option>

                </select>

            </div>

            {{-- Gambar --}}
            <div class="mb-4">

                <label class="form-label">
                    Gambar
                </label>

                <input
                    type="file"
                    name="image"
                    class="form-control">

                @if($product->image)

                    <div class="mt-3">

                        <img
                            src="{{ asset('uploads/products/'.$product->image) }}"
                            width="100"
                            class="rounded border">

                    </div>

                @endif

            </div>

            <button class="btn btn-primary">
                Update
            </button>

            <a
                href="{{ route('products.index') }}"
                class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>

</div>

<script>

const display = document.getElementById('price_display');
const hidden = document.getElementById('price_per_day');

display.addEventListener('input', function () {

    let angka = this.value.replace(/\D/g,'');

    hidden.value = angka;

    this.value = new Intl.NumberFormat('id-ID').format(angka);

});

document.querySelector('form').addEventListener('submit', function(){

    hidden.value = display.value.replace(/\./g,'');

});

</script>

@endsection