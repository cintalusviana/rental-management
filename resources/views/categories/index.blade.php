@extends('layout.app')

@section('content')

<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

/* =========================================================
   ROOT
========================================================= */

:root{
    --primary:#2563eb;
    --primary-dark:#1d4ed8;
    --primary-soft:#e8f1ff;

    --text:#0f172a;
    --muted:#64748b;

    --border:#dbe3f2;
    --soft:#f4f7ff;

    --white:#ffffff;
}

/* =========================================================
   GLOBAL
========================================================= */

html,
body{
    width:100%;
    max-width:100%;
    overflow-x:hidden;
}

body{
    background:var(--soft);
    font-family:'Inter',sans-serif;
    color:var(--text);
}

.category-page{
    width:100%;
    max-width:100%;
    animation:fade .3s ease;
}

@keyframes fade{
    from{
        opacity:0;
        transform:translateY(8px);
    }

    to{
        opacity:1;
        transform:translateY(0);
    }
}

/* =========================================================
   HEADER
========================================================= */

.page-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:20px;
    margin-bottom:24px;
    flex-wrap:wrap;
}

.page-title{
    min-width:0;
}

.page-title h2{
    margin:0;

    display:flex;
    align-items:center;
    gap:10px;

    font-size:30px;
    line-height:1.2;
    font-weight:800;

    color:var(--text);
}

/* ICON JUDUL */

.title-icon{
    width:42px;
    height:42px;

    display:inline-flex;
    align-items:center;
    justify-content:center;

    flex-shrink:0;

    border-radius:12px;

    background:var(--primary-soft);
    color:var(--primary);

    font-size:20px;
}

.page-title p{
    color:var(--muted);

    margin:7px 0 0;

    font-size:14px;
    line-height:1.5;
}

/* =========================================================
   HEADER ACTION
========================================================= */

.header-action{
    display:flex;
    align-items:center;
    gap:10px;

    flex-wrap:nowrap;
}

/* =========================================================
   SEARCH
========================================================= */

.search-box{
    position:relative;

    width:260px;
    flex:0 1 260px;
}

.search-box i{
    position:absolute;

    left:14px;
    top:50%;

    transform:translateY(-50%);

    color:#94a3b8;

    z-index:2;
}

.search-box input{
    width:100%;
    height:44px;

    padding:0 14px 0 40px;

    border-radius:12px;

    border:1px solid var(--border);

    background:#fff;

    color:var(--text);

    font-size:13px;

    box-shadow:0 4px 12px rgba(15,23,42,.03);

    outline:none;

    transition:.2s;
}

.search-box input::placeholder{
    color:#94a3b8;
}

.search-box input:focus{
    border-color:var(--primary);

    box-shadow:
        0 0 0 .2rem rgba(37,99,235,.10);
}

/* =========================================================
   BUTTON TAMBAH
========================================================= */

.btn-add{
    height:44px;

    display:flex;
    align-items:center;
    justify-content:center;

    gap:7px;

    padding:0 17px;

    border:none;
    border-radius:12px;

    background:var(--primary);
    color:#fff;

    font-size:13px;
    font-weight:600;

    white-space:nowrap;

    box-shadow:
        0 5px 14px rgba(37,99,235,.16);

    transition:.2s ease;
}

.btn-add:hover{
    background:var(--primary-dark);
    color:#fff;

    transform:translateY(-1px);

    box-shadow:
        0 8px 18px rgba(37,99,235,.22);
}

.btn-add i{
    font-size:14px;
}

/* =========================================================
   ALERT
========================================================= */

.alert{
    border:none;
    border-radius:12px;

    font-size:13px;
}

/* =========================================================
   CATEGORY GRID
========================================================= */

.category-grid{
    display:grid;

    grid-template-columns:
        repeat(auto-fit,minmax(245px,1fr));

    gap:18px;

    width:100%;
}

/* =========================================================
   CATEGORY CARD
========================================================= */

.category-card{
    background:#fff;

    border:1px solid rgba(219,227,242,.65);

    border-radius:18px;

    padding:19px;

    min-height:205px;

    display:flex;
    flex-direction:column;
    justify-content:space-between;

    box-shadow:
        0 8px 22px rgba(15,23,42,.055);

    transition:.22s ease;

    min-width:0;
}

.category-card:hover{
    transform:translateY(-3px);

    box-shadow:
        0 12px 28px rgba(15,23,42,.09);
}

/* =========================================================
   CATEGORY ICON
========================================================= */

.icon-box{
    width:52px;
    height:52px;

    display:flex;
    align-items:center;
    justify-content:center;

    border-radius:15px;

    font-size:23px;

    margin-bottom:14px;
}

.icon-blue{
    background:#e8f1ff;
    color:#2563eb;
}

.icon-orange{
    background:#fff3e8;
    color:#f97316;
}

.icon-green{
    background:#eafbf3;
    color:#16a34a;
}

.icon-purple{
    background:#f3e8ff;
    color:#9333ea;
}

/* =========================================================
   CATEGORY NAME
========================================================= */

.category-name{
    font-size:18px;

    line-height:1.3;

    font-weight:700;

    color:var(--text);

    overflow-wrap:anywhere;
}

/* =========================================================
   CATEGORY DESCRIPTION
========================================================= */

.category-desc{
    color:var(--muted);

    font-size:12px;

    line-height:1.45;

    margin-top:6px;

    display:-webkit-box;

    -webkit-line-clamp:2;

    /* PROPERTY STANDARD */
    line-clamp:2;

    -webkit-box-orient:vertical;

    overflow:hidden;
}

/* =========================================================
   CATEGORY COUNT
========================================================= */

.category-count{
    margin-top:10px;

    color:var(--primary);

    font-size:12px;

    font-weight:600;
}

.category-count i{
    margin-right:3px;
}

/* =========================================================
   CATEGORY ACTION
========================================================= */

.category-action{
    display:flex;

    align-items:center;

    gap:8px;

    margin-top:14px;
}

.category-action form{
    margin:0;
    padding:0;
}

/* =========================================================
   ACTION BUTTON
========================================================= */

.btn-action{
    width:36px;
    height:36px;

    display:flex;
    align-items:center;
    justify-content:center;

    border:none;
    border-radius:10px;

    font-size:14px;

    transition:.18s ease;
}

.btn-action:hover{
    transform:translateY(-1px);
}

/* EDIT */

.btn-edit{
    background:#eff6ff;
    color:#2563eb;
}

.btn-edit:hover{
    background:#dbeafe;
    color:#1d4ed8;
}

/* DELETE */

.btn-delete{
    background:#fef2f2;
    color:#dc2626;
}

.btn-delete:hover{
    background:#fee2e2;
    color:#b91c1c;
}

/* =========================================================
   EMPTY CATEGORY
========================================================= */

.empty-category{
    grid-column:1 / -1;

    background:#fff;

    border:1px dashed var(--border);

    border-radius:18px;

    padding:45px 20px;

    text-align:center;

    color:var(--muted);

    font-size:14px;
}

.empty-category i{
    display:block;

    font-size:40px;

    color:#94a3b8;

    margin-bottom:10px;
}

/* =========================================================
   MODAL
========================================================= */

.modal-dialog{
    width:calc(100% - 30px);

    max-width:520px;

    margin:1.75rem auto;
}

.modal-custom{
    width:100%;

    border:none;

    border-radius:20px;

    overflow:hidden;

    box-shadow:
        0 20px 50px rgba(0,0,0,.15);
}

.modal-header{
    border:none;

    padding:22px 24px 9px;
}

.modal-title{
    margin:0;

    font-size:20px;

    font-weight:700;

    color:var(--text);
}

.modal-title i{
    color:var(--primary) !important;
}

.modal-subtitle{
    color:var(--muted);

    font-size:13px;

    line-height:1.45;

    margin:4px 0 0;
}

.modal-body{
    padding:14px 24px;
}

/* =========================================================
   FORM
========================================================= */

.form-label{
    font-weight:600;

    color:#334155;

    font-size:13px;

    margin-bottom:7px;
}

.form-control{
    height:46px;

    border-radius:12px;

    border:1px solid var(--border);

    font-size:13px;

    color:var(--text);

    box-shadow:none;
}

textarea.form-control{
    height:auto;

    min-height:105px;

    resize:vertical;
}

.form-control:focus{
    border-color:var(--primary);

    box-shadow:
        0 0 0 .2rem rgba(37,99,235,.12);
}

/* =========================================================
   MODAL FOOTER
========================================================= */

.modal-footer{
    border:none;

    padding:8px 24px 22px;

    gap:8px;
}

.modal-footer .btn{
    min-height:42px;

    padding:0 19px;

    border-radius:11px;

    font-size:13px;

    font-weight:600;
}

.modal-footer .btn-primary{
    background:var(--primary);

    border-color:var(--primary);
}

.modal-footer .btn-primary:hover{
    background:var(--primary-dark);

    border-color:var(--primary-dark);
}

/* =========================================================
   LARGE TABLET
========================================================= */

@media (max-width:1100px){

    .page-header{
        align-items:flex-start;
    }

    .header-action{
        width:100%;
    }

    .search-box{
        flex:1 1 auto;

        width:auto;
    }

    .btn-add{
        flex:0 0 auto;
    }

    .category-grid{
        grid-template-columns:
            repeat(3,minmax(0,1fr));

        gap:15px;
    }
}

/* =========================================================
   TABLET
========================================================= */

@media (max-width:800px){

    .page-header{
        gap:14px;

        margin-bottom:18px;
    }

    .page-title h2{
        font-size:25px;
    }

    .title-icon{
        width:38px;
        height:38px;

        border-radius:11px;

        font-size:18px;
    }

    .page-title p{
        font-size:13px;
    }

    .header-action{
        gap:8px;
    }

    .search-box{
        flex:1 1 0;

        min-width:0;
    }

    .btn-add{
        padding:0 14px;
    }

    .category-grid{
        grid-template-columns:
            repeat(2,minmax(0,1fr));

        gap:14px;
    }

    .category-card{
        padding:16px;

        min-height:190px;
    }

    .category-name{
        font-size:16px;
    }
}

/* =========================================================
   MOBILE
========================================================= */

@media (max-width:575px){

    .category-page{
        padding-bottom:15px;
    }

    .page-header{
        display:block;

        margin-bottom:16px;
    }

    .page-title h2{
        font-size:22px;

        gap:7px;
    }

    .title-icon{
        width:34px;
        height:34px;

        border-radius:10px;

        font-size:16px;
    }

    .page-title p{
        font-size:12px;

        margin-top:5px;
    }

    /* SEARCH + TAMBAH */

    .header-action{
        display:grid;

        grid-template-columns:
            minmax(0,1fr) auto;

        width:100%;

        margin-top:13px;

        gap:8px;
    }

    .search-box{
        width:100%;

        flex:none;
    }

    .search-box input{
        height:40px;

        font-size:12px;

        border-radius:10px;

        padding-left:37px;
    }

    .search-box i{
        left:12px;

        font-size:14px;
    }

    .btn-add{
        height:40px;

        padding:0 12px;

        border-radius:10px;

        font-size:11px;

        gap:5px;
    }

    .btn-add i{
        font-size:12px;
    }

    /* GRID */

    .category-grid{
        grid-template-columns:
            repeat(2,minmax(0,1fr));

        gap:10px;
    }

    /* CARD */

    .category-card{
        padding:13px;

        min-height:178px;

        border-radius:15px;

        box-shadow:
            0 6px 17px rgba(15,23,42,.05);
    }

    /* ICON */

    .icon-box{
        width:42px;
        height:42px;

        border-radius:12px;

        font-size:19px;

        margin-bottom:10px;
    }

    /* NAME */

    .category-name{
        font-size:14px;

        line-height:1.3;
    }

    /* DESCRIPTION */

    .category-desc{
        font-size:10px;

        line-height:1.4;

        margin-top:5px;
    }

    /* COUNT */

    .category-count{
        margin-top:8px;

        font-size:10px;
    }

    /* ACTION */

    .category-action{
        gap:6px;

        margin-top:10px;
    }

    .btn-action{
        width:31px;
        height:31px;

        border-radius:8px;

        font-size:12px;
    }

    /* EMPTY */

    .empty-category{
        padding:35px 15px;

        font-size:12px;
    }

    .empty-category i{
        font-size:32px;
    }

    /* ALERT */

    .alert{
        font-size:11px;

        padding:10px 12px;
    }

    /* MODAL */

    .modal-dialog{
        width:calc(100% - 20px);

        max-width:none;

        margin:10px auto;
    }

    .modal-custom{
        border-radius:17px;
    }

    .modal-header{
        padding:18px 17px 7px;
    }

    .modal-title{
        font-size:17px;
    }

    .modal-subtitle{
        font-size:11px;
    }

    .modal-body{
        padding:10px 17px;
    }

    .form-label{
        font-size:11px;
    }

    .form-control{
        height:42px;

        font-size:12px;

        border-radius:10px;
    }

    textarea.form-control{
        min-height:85px;
    }

    .modal-footer{
        padding:6px 17px 17px;
    }

    .modal-footer .btn{
        min-height:38px;

        padding:0 14px;

        font-size:11px;
    }
}

/* =========================================================
   SMALL MOBILE
========================================================= */

@media (max-width:380px){

    .page-title h2{
        font-size:20px;

        gap:6px;
    }

    .title-icon{
        width:31px;
        height:31px;

        border-radius:9px;

        font-size:14px;
    }

    .page-title p{
        font-size:11px;
    }

    .header-action{
        grid-template-columns:
            minmax(0,1fr) 112px;
    }

    .btn-add{
        font-size:10px;

        padding:0 8px;
    }

    .category-grid{
        gap:8px;
    }

    .category-card{
        padding:11px;

        min-height:165px;

        border-radius:13px;
    }

    .icon-box{
        width:38px;
        height:38px;

        border-radius:10px;

        font-size:17px;

        margin-bottom:8px;
    }

    .category-name{
        font-size:13px;
    }

    .category-desc{
        font-size:9px;
    }

    .category-count{
        font-size:9px;

        margin-top:6px;
    }

    .category-action{
        margin-top:8px;
    }

    .btn-action{
        width:29px;
        height:29px;

        font-size:11px;
    }
}

/* =========================================================
   VERY SMALL PHONE
========================================================= */

@media (max-width:330px){

    .header-action{
        grid-template-columns:
            1fr 105px;
    }

    .btn-add{
        font-size:9px;
    }

    .search-box input{
        font-size:11px;
    }

    .category-card{
        padding:10px;

        min-height:155px;
    }

    .category-name{
        font-size:12px;
    }

    .category-desc{
        font-size:8px;
    }

    .category-count{
        font-size:8px;
    }

    .icon-box{
        width:35px;
        height:35px;

        font-size:15px;
    }

    .btn-action{
        width:27px;
        height:27px;

        font-size:10px;
    }
}

/* =========================================================
   EXTRA SMALL
========================================================= */

@media (max-width:280px){

    .header-action{
        grid-template-columns:1fr;
    }

    .btn-add{
        width:100%;
    }

    .category-grid{
        grid-template-columns:1fr;
    }
}
</style>


<div class="category-page">

    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="page-header">

        <div class="page-title">

            <h2>

                <i class="bi bi-tags-fill title-icon"></i>

                Kategori

            </h2>

            <p>
                Kelola kategori barang rental dengan mudah.
            </p>

        </div>


        <div class="header-action">

            {{-- SEARCH --}}

            <div class="search-box">

                <i class="bi bi-search"></i>

                <input
                    type="text"
                    id="searchCategory"
                    placeholder="Cari kategori..."
                    autocomplete="off"
                >

            </div>


            {{-- TAMBAH KATEGORI --}}

            <button
                type="button"
                class="btn-add"
                data-bs-toggle="modal"
                data-bs-target="#modalTambah"
            >

                <i class="bi bi-plus-lg"></i>

                <span>
                    Tambah Kategori
                </span>

            </button>

        </div>

    </div>


    {{-- =====================================================
         SUCCESS ALERT
    ====================================================== --}}

    @if(session('success'))

        <div
            class="alert alert-success alert-dismissible fade show mb-4"
            role="alert"
        >

            <i class="bi bi-check-circle-fill me-2"></i>

            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"
            ></button>

        </div>

    @endif


    {{-- =====================================================
         ERROR ALERT
    ====================================================== --}}

    @if(session('error'))

        <div
            class="alert alert-danger alert-dismissible fade show mb-4"
            role="alert"
        >

            <i class="bi bi-exclamation-circle-fill me-2"></i>

            {{ session('error') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"
            ></button>

        </div>

    @endif


    {{-- =====================================================
         VALIDATION ERROR
    ====================================================== --}}

    @if($errors->any())

        <div
            class="alert alert-danger alert-dismissible fade show mb-4"
            role="alert"
        >

            <i class="bi bi-exclamation-triangle-fill me-2"></i>

            <strong>Periksa kembali data:</strong>

            <ul class="mb-0 mt-2">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"
            ></button>

        </div>

    @endif


    {{-- =====================================================
         CATEGORY GRID
    ====================================================== --}}

    <div class="category-grid">

        @forelse($categories as $category)

            @php

                /*
                ================================================
                ICON SESUAI NAMA KATEGORI
                ================================================
                */

                $icons = [

                    // Outdoor
                    'outdoor'    => 'bi-tree',
                    'tenda'      => 'bi-house-door',
                    'terop'      => 'bi-house-door',

                    // Kamera
                    'camera'     => 'bi-camera',
                    'kamera'     => 'bi-camera',

                    // Furniture
                    'furniture'  => 'bi-table',
                    'kursi'      => 'bi-person-workspace',
                    'meja'       => 'bi-table',

                    // Elektronik
                    'elektronik' => 'bi-tv',
                    'speaker'    => 'bi-speaker',
                    'sound'      => 'bi-speaker',
                    'audio'      => 'bi-volume-up',
                    'proyektor'  => 'bi-projector',

                    // Lighting
                    'lampu'      => 'bi-lightbulb',
                    'lighting'   => 'bi-lightbulb',

                    // Event
                    'event'      => 'bi-calendar-event',

                    // Default
                    'alat'       => 'bi-tools'

                ];


                $icon = 'bi-box-seam';


                /*
                ================================================
                CARI ICON
                ================================================
                */

                foreach($icons as $key => $value){

                    if(
                        str_contains(
                            strtolower($category->name),
                            $key
                        )
                    ){

                        $icon = $value;

                        break;

                    }

                }


                /*
                ================================================
                WARNA OTOMATIS
                ================================================
                */

                $colors = [

                    'icon-blue',
                    'icon-orange',
                    'icon-green',
                    'icon-purple'

                ];


                $color = $colors[$loop->index % count($colors)];


                /*
                ================================================
                JUMLAH BARANG
                ================================================
                */

                $productCount = $category->products
                    ? $category->products->count()
                    : 0;

            @endphp


            {{-- =================================================
                 CATEGORY CARD
            ================================================== --}}

            <div
                class="category-card"
                data-name="{{ strtolower($category->name) }}"
            >

                <div>

                    {{-- ICON --}}

                    <div class="icon-box {{ $color }}">

                        <i class="bi {{ $icon }}"></i>

                    </div>


                    {{-- NAME --}}

                    <div class="category-name">

                        {{ $category->name }}

                    </div>


                    {{-- DESCRIPTION --}}

                    <div class="category-desc">

                        {{ $category->description ?? 'Tidak ada deskripsi kategori.' }}

                    </div>


                    {{-- PRODUCT COUNT --}}

                    <div class="category-count">

                        <i class="bi bi-box-seam"></i>

                        {{ $productCount }}

                        Barang

                    </div>

                </div>


                {{-- ACTION --}}

                <div class="category-action">

                    {{-- EDIT --}}

                    <button
                        type="button"
                        class="btn-action btn-edit"
                        data-bs-toggle="modal"
                        data-bs-target="#modalEdit{{ $category->id }}"
                        title="Edit kategori"
                    >

                        <i class="bi bi-pencil-square"></i>

                    </button>


                    {{-- DELETE --}}

                    <form
                        action="{{ route('categories.destroy', $category->id) }}"
                        method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus kategori ini?')"
                    >

                        @csrf

                        @method('DELETE')


                        <button
                            type="submit"
                            class="btn-action btn-delete"
                            title="Hapus kategori"
                        >

                            <i class="bi bi-trash"></i>

                        </button>

                    </form>

                </div>

            </div>

        @empty

            {{-- =================================================
                 EMPTY STATE
            ================================================== --}}

            <div class="empty-category">

                <i class="bi bi-tags"></i>

                <div>
                    Belum ada kategori.
                </div>

                <div class="mt-1">
                    Silakan tambahkan kategori baru.
                </div>

            </div>

        @endforelse

    </div>


    {{-- =====================================================
         MODAL TAMBAH KATEGORI
    ====================================================== --}}

    <div
        class="modal fade"
        id="modalTambah"
        tabindex="-1"
        aria-labelledby="modalTambahLabel"
        aria-hidden="true"
    >

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content modal-custom">

                {{-- HEADER MODAL --}}

                <div class="modal-header">

                    <div>

                        <h4
                            class="modal-title"
                            id="modalTambahLabel"
                        >

                            <i class="bi bi-tags-fill me-2"></i>

                            Tambah Kategori

                        </h4>


                        <p class="modal-subtitle">

                            Tambahkan kategori baru untuk barang rental.

                        </p>

                    </div>


                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>

                </div>


                {{-- FORM TAMBAH --}}

                <form
                    action="{{ route('categories.store') }}"
                    method="POST"
                >

                    @csrf


                    <div class="modal-body">

                        {{-- NAMA KATEGORI --}}

                        <div class="mb-3">

                            <label class="form-label">

                                Nama Kategori

                            </label>


                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                placeholder="Contoh: Kamera"
                                value="{{ old('name') }}"
                                required
                            >

                        </div>


                        {{-- DESKRIPSI --}}

                        <div class="mb-3">

                            <label class="form-label">

                                Deskripsi

                            </label>


                            <textarea
                                name="description"
                                class="form-control"
                                rows="4"
                                placeholder="Masukkan deskripsi kategori"
                            >{{ old('description') }}</textarea>

                        </div>

                    </div>


                    {{-- FOOTER --}}

                    <div class="modal-footer">

                        <button
                            type="button"
                            class="btn btn-light"
                            data-bs-dismiss="modal"
                        >

                            Batal

                        </button>


                        <button
                            type="submit"
                            class="btn btn-primary"
                        >

                            <i class="bi bi-save me-1"></i>

                            Simpan

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>


    {{-- =====================================================
         MODAL EDIT KATEGORI
    ====================================================== --}}

    @foreach($categories as $category)

        <div
            class="modal fade"
            id="modalEdit{{ $category->id }}"
            tabindex="-1"
            aria-labelledby="modalEditLabel{{ $category->id }}"
            aria-hidden="true"
        >

            <div class="modal-dialog modal-dialog-centered">

                <div class="modal-content modal-custom">

                    {{-- HEADER --}}

                    <div class="modal-header">

                        <div>

                            <h4
                                class="modal-title"
                                id="modalEditLabel{{ $category->id }}"
                            >

                                <i class="bi bi-pencil-square me-2"></i>

                                Edit Kategori

                            </h4>


                            <p class="modal-subtitle">

                                Perbarui informasi kategori.

                            </p>

                        </div>


                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>

                    </div>


                    {{-- FORM EDIT --}}

                    <form
                        action="{{ route('categories.update', $category->id) }}"
                        method="POST"
                    >

                        @csrf

                        @method('PUT')


                        <div class="modal-body">

                            {{-- NAMA --}}

                            <div class="mb-3">

                                <label class="form-label">

                                    Nama Kategori

                                </label>


                                <input
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    value="{{ $category->name }}"
                                    required
                                >

                            </div>


                            {{-- DESKRIPSI --}}

                            <div class="mb-3">

                                <label class="form-label">

                                    Deskripsi

                                </label>


                                <textarea
                                    name="description"
                                    class="form-control"
                                    rows="4"
                                >{{ $category->description }}</textarea>

                            </div>

                        </div>


                        {{-- FOOTER --}}

                        <div class="modal-footer">

                            <button
                                type="button"
                                class="btn btn-light"
                                data-bs-dismiss="modal"
                            >

                                Batal

                            </button>


                            <button
                                type="submit"
                                class="btn btn-primary"
                            >

                                <i class="bi bi-arrow-repeat me-1"></i>

                                Update

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    @endforeach

</div>


{{-- =========================================================
     SEARCH CATEGORY
========================================================= --}}

<script>

document.addEventListener('DOMContentLoaded', function(){

    const searchInput =
        document.getElementById('searchCategory');

    if(!searchInput){
        return;
    }


    searchInput.addEventListener('keyup', function(){

        const keyword =
            this.value.toLowerCase().trim();


        const cards =
            document.querySelectorAll('.category-card');


        cards.forEach(function(card){

            const name =
                card.dataset.name || '';


            if(name.includes(keyword)){

                card.style.display = 'flex';

            }else{

                card.style.display = 'none';

            }

        });

    });

});

</script>

@endsection