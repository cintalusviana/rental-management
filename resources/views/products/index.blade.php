@extends('layout.app')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>

/* =========================================================
   ROOT
========================================================= */

:root{
    --primary:#2563EB;
    --primary-dark:#1D4ED8;
    --primary-soft:#EFF6FF;
    --primary-icon:#DBEAFE;

    --bg:#F8FAFC;
    --card:#FFFFFF;

    --text:#0F172A;
    --text-soft:#334155;
    --muted:#64748B;

    --border:#E2E8F0;
    --border-soft:#F1F5F9;
}


/* =========================================================
   GLOBAL
========================================================= */

*{
    box-sizing:border-box;
}

body{
    background:var(--bg)!important;
    font-family:'Inter',sans-serif;
    color:var(--text);
}


/* =========================================================
   PRODUCT PAGE
========================================================= */

.product-page{
    width:100%;
    padding-bottom:25px;
}


/* =========================================================
   PAGE HEADER
========================================================= */

.page-header{
    width:100%;
    margin-bottom:17px;
}

.page-title{
    width:100%;
}


/* =========================================================
   JUDUL DATA BARANG
========================================================= */

.page-title h2{
    display:flex;
    align-items:center;

    gap:12px;

    margin:0;

    color:var(--text);

    font-size:28px;
    line-height:1.2;
    font-weight:800;

    letter-spacing:-.5px;
}

.page-title h2 i{
    width:44px;
    height:44px;

    display:flex;
    align-items:center;
    justify-content:center;

    flex:0 0 44px;

    border-radius:12px;

    background:#DBEAFE;
    color:#1D4ED8;

    border:1px solid #BFDBFE;

    font-size:21px;

    box-shadow:
        0 4px 10px rgba(37,99,235,.12);
}


/* =========================================================
   DESKRIPSI HEADER
========================================================= */

.page-title p{
    margin:7px 0 0 56px;

    color:#475569;

    font-size:13px;
    line-height:1.55;
    font-weight:500;
}


/* =========================================================
   TOMBOL TAMBAH BARANG
========================================================= */

.header-action{
    width:100%;
    margin:11px 0 0 0;
    padding:0;
}

.btn-add{
    width:100%;
    height:42px;

    display:flex;
    align-items:center;
    justify-content:center;

    gap:8px;

    padding:0 15px;

    border:0;
    border-radius:9px;

    background:var(--primary);
    color:#fff;

    font-size:12.5px;
    font-weight:700;

    white-space:nowrap;

    box-shadow:
        0 5px 14px rgba(37,99,235,.18);

    transition:
        background .2s ease,
        transform .2s ease,
        box-shadow .2s ease;
}

.btn-add:hover{
    background:var(--primary-dark);
    color:#fff;

    transform:translateY(-1px);

    box-shadow:
        0 7px 18px rgba(37,99,235,.22);
}

.btn-add i{
    font-size:14px;
}


/* =========================================================
   ALERT
========================================================= */

.product-alert{
    border:0;
    border-radius:10px;

    padding:10px 13px;

    margin-bottom:13px;

    font-size:12px;
}


/* =========================================================
   PRODUCT CARD
========================================================= */

.product-card{
    width:100%;

    background:var(--card);

    border:1px solid rgba(226,232,240,.85);

    border-radius:16px;

    overflow:hidden;

    box-shadow:
        0 4px 16px rgba(15,23,42,.035);
}


/* =========================================================
   TOP BAR
========================================================= */

.top-bar{
    width:100%;

    display:flex;
    align-items:center;

    gap:10px;

    padding:12px 16px;

    background:#fff;

    border-bottom:1px solid var(--border-soft);
}


/* =========================================================
   SEARCH
========================================================= */

.search-box{
    position:relative;

    flex:1;
    min-width:0;
}

.search-box i{
    position:absolute;

    left:13px;
    top:50%;

    transform:translateY(-50%);

    color:#94A3B8;

    font-size:14px;

    pointer-events:none;
}

.search-box input{
    width:100%;
    height:38px;

    padding:0 12px 0 38px;

    border:1px solid var(--border);

    border-radius:9px;

    background:#fff;

    color:var(--text);

    font-size:12px;

    outline:none;
    box-shadow:none;

    transition:.2s;
}

.search-box input::placeholder{
    color:#94A3B8;
}

.search-box input:focus{
    border-color:var(--primary);

    box-shadow:
        0 0 0 3px rgba(37,99,235,.08);
}


/* =========================================================
   FILTER AREA
========================================================= */

.filter-area{
    display:flex;
    align-items:center;

    gap:7px;

    flex:0 0 auto;
}

.filter{
    width:175px;
    flex:0 0 175px;
}

.filter select{
    width:100%;
    height:38px;

    padding:0 30px 0 12px;

    border:1px solid var(--border);

    border-radius:9px;

    background-color:#fff;

    color:var(--text-soft);

    font-size:12px;

    outline:none;
    box-shadow:none;

    cursor:pointer;
}

.filter select:focus{
    border-color:var(--primary);

    box-shadow:
        0 0 0 3px rgba(37,99,235,.08);
}


/* =========================================================
   BUTTON LIHAT SEMUA
========================================================= */

.btn-see-all{
    height:38px;
    min-width:108px;

    display:none;
    align-items:center;
    justify-content:center;

    gap:5px;

    padding:0 13px;

    border:1px solid #BFDBFE;

    border-radius:9px;

    background:var(--primary-soft);
    color:var(--primary);

    font-size:11px;
    font-weight:700;

    white-space:nowrap;

    cursor:pointer;

    transition:.2s ease;
}

.btn-see-all.show{
    display:inline-flex;
}

.btn-see-all:hover{
    background:#DBEAFE;

    border-color:#93C5FD;

    color:var(--primary-dark);
}

.btn-see-all i{
    font-size:11px;
}


/* =========================================================
   TABLE WRAPPER
========================================================= */

.product-table-wrapper{
    width:100%;

    overflow-x:auto;
    overflow-y:hidden;

    -webkit-overflow-scrolling:touch;

    scrollbar-width:thin;
}

.product-table-wrapper::-webkit-scrollbar{
    height:6px;
}

.product-table-wrapper::-webkit-scrollbar-track{
    background:#F8FAFC;
}

.product-table-wrapper::-webkit-scrollbar-thumb{
    background:#CBD5E1;
    border-radius:20px;
}


/* =========================================================
   TABLE
========================================================= */

.product-table{
    width:100%;
    min-width:760px;

    margin:0;

    border-collapse:separate;
    border-spacing:0;
}


/* =========================================================
   TABLE HEADER
========================================================= */

.product-table thead th{
    height:38px;

    padding:9px 16px;

    background:#F8FAFC;

    border:0;

    color:#64748B;

    font-size:10px;
    font-weight:700;

    line-height:1.2;

    white-space:nowrap;

    vertical-align:middle;
}


/* =========================================================
   TABLE BODY
========================================================= */

.product-table tbody td{
    height:64px;

    padding:8px 16px;

    background:#fff;

    border-top:1px solid var(--border-soft);

    color:var(--text-soft);

    font-size:11.5px;

    vertical-align:middle;

    white-space:nowrap;
}

.product-table tbody tr{
    transition:background .15s ease;
}

.product-table tbody tr:hover td{
    background:#FBFDFF;
}


/* =========================================================
   COLUMN WIDTH
========================================================= */

.product-table th:nth-child(1),
.product-table td:nth-child(1){
    width:31%;
}

.product-table th:nth-child(2),
.product-table td:nth-child(2){
    width:17%;
}

.product-table th:nth-child(3),
.product-table td:nth-child(3){
    width:17%;
}

.product-table th:nth-child(4),
.product-table td:nth-child(4){
    width:10%;
}

.product-table th:nth-child(5),
.product-table td:nth-child(5){
    width:16%;
}

.product-table th:nth-child(6),
.product-table td:nth-child(6){
    width:9%;
}


/* =========================================================
   PRODUCT
========================================================= */

.product{
    display:flex;
    align-items:center;

    gap:9px;

    min-width:185px;
}

.product img{
    width:42px;
    height:42px;

    flex:0 0 42px;

    object-fit:cover;

    border-radius:10px;

    border:1px solid #EEF2F7;

    background:#F8FAFC;
}

.product-info{
    min-width:0;
}

.product-name{
    max-width:190px;

    overflow:hidden;
    text-overflow:ellipsis;

    color:var(--text);

    font-size:12px;
    font-weight:700;

    line-height:1.35;
}

.product-code{
    margin-top:2px;

    color:#94A3B8;

    font-size:9px;

    line-height:1.3;
}


/* =========================================================
   CATEGORY
========================================================= */

.category-text{
    color:#475569;

    font-size:11px;
    font-weight:500;
}


/* =========================================================
   PRICE
========================================================= */

.price-main{
    color:var(--text);

    font-size:11px;
    font-weight:700;

    line-height:1.3;
}

.price-sub{
    display:block;

    margin-top:1px;

    color:#94A3B8;

    font-size:8.5px;
    font-weight:500;
}


/* =========================================================
   STOCK
========================================================= */

.stock-badge{
    min-width:27px;
    height:24px;

    display:inline-flex;
    align-items:center;
    justify-content:center;

    padding:0 7px;

    border-radius:7px;

    font-size:9.5px;
    font-weight:700;
}

.stock-danger{
    background:#FEE2E2;
    color:#DC2626;
}

.stock-warning{
    background:#FEF3C7;
    color:#D97706;
}

.stock-success{
    background:#DCFCE7;
    color:#16A34A;
}


/* =========================================================
   STATUS
========================================================= */

.status-badge{
    display:inline-flex;
    align-items:center;

    gap:5px;

    padding:5px 9px;

    border-radius:16px;

    font-size:9.5px;
    font-weight:700;

    white-space:nowrap;
}

.status-dot{
    width:5px;
    height:5px;

    flex:0 0 5px;

    border-radius:50%;
}

.status-available{
    background:#ECFDF5;
    color:#059669;

    border:1px solid #A7F3D0;
}

.status-available .status-dot{
    background:#10B981;
}

.status-rented{
    background:#EFF6FF;
    color:#2563EB;

    border:1px solid #BFDBFE;
}

.status-rented .status-dot{
    background:#2563EB;
}

.status-maintenance{
    background:#FFF7ED;
    color:#D97706;

    border:1px solid #FED7AA;
}

.status-maintenance .status-dot{
    background:#F59E0B;
}


/* =========================================================
   ACTION
========================================================= */

.action-wrapper{
    display:flex;
    align-items:center;
    justify-content:center;

    gap:5px;
}

.action-btn{
    width:30px;
    height:30px;

    display:inline-flex;
    align-items:center;
    justify-content:center;

    padding:0;

    border:1px solid var(--border);

    border-radius:8px;

    background:#fff;

    font-size:11px;

    transition:
        background .2s ease,
        border-color .2s ease,
        transform .2s ease;
}

.action-btn:hover{
    background:#F8FAFC;

    transform:translateY(-1px);
}

.action-edit{
    color:#2563EB;
}

.action-edit:hover{
    border-color:#BFDBFE;
    background:#EFF6FF;
}

.action-delete{
    color:#EF4444;
}

.action-delete:hover{
    border-color:#FECACA;
    background:#FEF2F2;
}


/* =========================================================
   EMPTY
========================================================= */

.empty-box{
    padding:45px 20px !important;

    text-align:center;
}

.empty-box i{
    font-size:38px;

    color:#CBD5E1;
}

.empty-box h5{
    margin:11px 0 4px;

    color:#334155;

    font-size:13px;
    font-weight:700;
}

.empty-box p{
    margin:0;

    color:#94A3B8;

    font-size:10.5px;
}


/* =========================================================
   MODAL
========================================================= */

.modal-dialog{
    width:calc(100% - 30px);

    max-width:700px;

    margin:1rem auto;
}

.modal-content{
    border:0;

    border-radius:16px;

    overflow:hidden;

    box-shadow:
        0 20px 50px rgba(15,23,42,.15);
}

.modal-header{
    min-height:65px;

    padding:16px 20px;

    border-bottom:1px solid var(--border-soft);

    background:#fff;
}

.modal-header h4,
.modal-header h5{
    color:var(--text);

    font-size:16px;
    font-weight:800;
}

.modal-header small{
    font-size:10.5px;
}

.modal-body{
    padding:18px 20px;

    max-height:70vh;

    overflow-y:auto;
}

.modal-footer{
    padding:13px 20px;

    border-top:1px solid var(--border-soft);

    background:#fff;
}


/* =========================================================
   FORM
========================================================= */

.form-label{
    display:block;

    margin-bottom:6px;

    color:#334155;

    font-size:11.5px;
    font-weight:700;
}

.form-control,
.form-select{
    width:100%;

    min-height:40px;

    border:1px solid var(--border);

    border-radius:9px;

    color:var(--text);

    background:#fff;

    font-size:11.5px;

    box-shadow:none;

    transition:.2s;
}

.form-control{
    padding:8px 11px;
}

.form-select{
    padding:8px 32px 8px 11px;
}

.form-control::placeholder{
    color:#94A3B8;
}

.form-control:focus,
.form-select:focus{
    border-color:var(--primary);

    box-shadow:
        0 0 0 3px rgba(37,99,235,.1);
}

textarea.form-control{
    min-height:80px;

    resize:vertical;
}


/* =========================================================
   INPUT GROUP
========================================================= */

.input-group-text{
    min-height:40px;

    padding:0 11px;

    background:#F8FAFC;

    border:1px solid var(--border);

    border-right:0;

    border-radius:9px 0 0 9px;

    color:#64748B;

    font-size:11.5px;
    font-weight:700;
}

.input-group .form-control{
    border-radius:0 9px 9px 0;
}


/* =========================================================
   IMAGE PREVIEW
========================================================= */

.preview-image{
    width:105px;
    height:105px;

    object-fit:cover;

    border:1px solid var(--border);

    border-radius:12px;

    background:#F8FAFC;
}


/* =========================================================
   MODAL BUTTON
========================================================= */

.modal .btn{
    min-height:36px;

    padding:7px 13px;

    border-radius:9px;

    font-size:11.5px;
    font-weight:700;
}

.modal .btn i{
    font-size:11px;
}


/* =========================================================
   TABLET / MOBILE
========================================================= */

@media(max-width:768px){

    .product-page{
        padding-left:0;
        padding-right:0;
    }

    .page-header{
        margin-bottom:13px;
    }

    .page-title h2{
        font-size:23px;
        gap:10px;
    }

    .page-title h2 i{
        width:39px;
        height:39px;

        flex-basis:39px;

        border-radius:11px;

        font-size:18px;
    }

    .page-title p{
        margin-left:49px;

        font-size:11.5px;
        line-height:1.5;
    }


    /* TOMBOL */

    .header-action{
        width:100%;
        margin-left:0;
        margin-top:9px;
    }

    .btn-add{
        width:100%;
        height:40px;

        padding:0 12px;

        font-size:11.5px;

        border-radius:8px;
    }

    .btn-add i{
        font-size:13px;
    }


    /* CARD */

    .product-card{
        border-radius:13px;
    }

    .top-bar{
        padding:10px;

        gap:8px;
    }

    .filter-area{
        gap:6px;
    }

    .filter{
        width:150px;
        flex-basis:150px;
    }

    .search-box input,
    .filter select,
    .btn-see-all{
        height:37px;

        font-size:11px;
    }

    .btn-see-all{
        min-width:105px;

        padding:0 10px;
    }

    .btn-see-all span{
        display:inline;
    }


    /* TABLE */

    .product-table{
        min-width:760px;
    }

    .product-table thead th{
        height:36px;

        padding:8px 12px;

        font-size:9px;
    }

    .product-table tbody td{
        height:60px;

        padding:7px 12px;

        font-size:11px;
    }

    .product img{
        width:39px;
        height:39px;

        flex-basis:39px;

        border-radius:9px;
    }

    .product-name{
        max-width:155px;

        font-size:11px;
    }

    .product-code{
        font-size:8.5px;
    }

    .category-text{
        font-size:10.5px;
    }

    .price-main{
        font-size:10.5px;
    }

    .price-sub{
        font-size:8px;
    }

    .stock-badge{
        height:22px;

        min-width:25px;

        font-size:9px;
    }

    .status-badge{
        padding:4px 8px;

        font-size:8.8px;
    }

    .action-btn{
        width:28px;
        height:28px;

        font-size:10px;
    }


    /* MODAL */

    .modal-dialog{
        width:calc(100% - 20px);

        margin:.6rem auto;
    }

    .modal-header{
        padding:14px 16px;
    }

    .modal-body{
        padding:15px 16px;

        max-height:72vh;
    }

    .modal-footer{
        padding:11px 16px;
    }

    .modal-header h4,
    .modal-header h5{
        font-size:14px;
    }

    .modal-header small{
        font-size:9.5px;
    }

    .form-label{
        font-size:10.5px;
    }

    .form-control,
    .form-select{
        min-height:38px;

        font-size:10.5px;
    }

    .preview-image{
        width:90px;
        height:90px;
    }
}


/* =========================================================
   HP
========================================================= */

@media(max-width:480px){

    .page-title h2{
        font-size:20px;
        gap:8px;
    }

    .page-title h2 i{
        width:35px;
        height:35px;

        flex-basis:35px;

        border-radius:10px;

        font-size:16px;
    }

    .page-title p{
        margin-left:43px;

        font-size:10.5px;

        line-height:1.5;

        max-width:280px;
    }


    /* TOMBOL */

    .header-action{
        width:100%;
        margin-left:0;
        margin-top:8px;
    }

    .btn-add{
        width:100%;
        height:38px;

        padding:0 10px;

        font-size:10.5px;

        gap:6px;
    }

    .btn-add i{
        font-size:12px;
    }


    /* CARD */

    .product-card{
        border-radius:12px;
    }

    .top-bar{
        padding:9px;

        gap:7px;
    }

    .filter-area{
        gap:5px;
    }

    .filter{
        width:125px;
        flex-basis:125px;
    }

    .search-box input,
    .filter select,
    .btn-see-all{
        height:35px;

        font-size:10px;
    }

    .filter select{
        padding-left:9px;
        padding-right:24px;
    }

    .btn-see-all{
        min-width:100px;
        width:auto;

        padding:0 11px;

        font-size:10px;

        gap:5px;
    }

    .btn-see-all span{
        display:inline;
    }

    .btn-see-all i{
        font-size:10px;

        margin:0!important;
    }


    /* TABLE */

    .product-table{
        min-width:720px;
    }

    .product-table thead th{
        padding:7px 10px;

        font-size:8.5px;
    }

    .product-table tbody td{
        padding:6px 10px;

        font-size:10.5px;
    }

    .product img{
        width:37px;
        height:37px;

        flex-basis:37px;
    }

    .product{
        gap:8px;
    }

    .product-name{
        max-width:140px;

        font-size:10.5px;
    }

    .product-code{
        font-size:8px;
    }

    .category-text{
        font-size:10px;
    }

    .price-main{
        font-size:10px;
    }

    .price-sub{
        font-size:7.5px;
    }

    .stock-badge{
        height:21px;

        min-width:24px;

        font-size:8.5px;
    }

    .status-badge{
        padding:4px 7px;

        font-size:8.3px;
    }

    .status-dot{
        width:4px;
        height:4px;

        flex-basis:4px;
    }

    .action-wrapper{
        gap:4px;
    }

    .action-btn{
        width:27px;
        height:27px;

        border-radius:7px;

        font-size:9px;
    }
}


/* =========================================================
   HP SANGAT KECIL
========================================================= */

@media(max-width:360px){

    .page-title h2{
        font-size:18px;
    }

    .page-title h2 i{
        width:32px;
        height:32px;

        flex-basis:32px;

        font-size:14px;
    }

    .page-title p{
        margin-left:40px;

        font-size:9.5px;
    }

    .header-action{
        width:100%;
        margin-left:0;
    }

    .btn-add{
        width:100%;
        height:35px;

        padding:0 8px;

        font-size:9.5px;
    }

    .btn-add i{
        font-size:10px;
    }

    .filter{
        width:115px;
        flex-basis:115px;
    }

    .btn-see-all{
        width:100px;
        min-width:100px;

        padding:0 8px;

        font-size:9px;
    }

    .btn-see-all span{
        display:inline;
    }

    .btn-see-all i{
        font-size:9px;
    }
}

</style>


<div class="container-fluid product-page">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="page-header">

        <div class="page-title">

            <h2>

                <i class="bi bi-box-seam-fill"></i>

                <span>
                    Data Barang
                </span>

            </h2>


            <p>
                Kelola inventaris barang rental dengan mudah.
            </p>


            {{-- =================================================
                 TOMBOL TAMBAH
            ================================================== --}}

            <div class="header-action">

                <button
                    type="button"
                    class="btn-add"
                    data-bs-toggle="modal"
                    data-bs-target="#modalTambah">

                    <i class="bi bi-plus-lg"></i>

                    <span>
                        Tambah Barang
                    </span>

                </button>

            </div>

        </div>

    </div>


    {{-- =====================================================
         SUCCESS ALERT
    ====================================================== --}}

    @if(session('success'))

        <div class="alert alert-success product-alert">

            <i class="bi bi-check-circle me-1"></i>

            {{ session('success') }}

        </div>

    @endif


    {{-- =====================================================
         PRODUCT CARD
    ====================================================== --}}

    <div class="product-card">


        {{-- =================================================
             SEARCH + FILTER
        ================================================== --}}

        <div class="top-bar">


            {{-- SEARCH --}}

            <div class="search-box">

                <i class="bi bi-search"></i>

                <input
                    type="text"
                    id="searchProduct"
                    class="form-control"
                    placeholder="Cari nama barang...">

            </div>


            {{-- FILTER --}}

            <div class="filter-area">


                <div class="filter">

                    <select
                        id="categoryFilter"
                        class="form-select">

                        <option value="">
                            Semua Kategori
                        </option>

                        @foreach($categories as $category)

                            <option
                                value="{{ strtolower($category->name) }}">

                                {{ $category->name }}

                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- LIHAT SEMUA --}}

                <button
                    type="button"
                    id="seeAllBtn"
                    class="btn-see-all">

                    <i class="bi bi-grid-3x3-gap-fill"></i>

                    <span>
                        Lihat Semua
                    </span>

                </button>

            </div>

        </div>


        {{-- =================================================
             TABLE
        ================================================== --}}

        <div class="product-table-wrapper">

            <table class="table product-table align-middle">


                <thead>

                    <tr>

                        <th>
                            BARANG
                        </th>

                        <th>
                            KATEGORI
                        </th>

                        <th>
                            HARGA / HARI
                        </th>

                        <th>
                            STOK
                        </th>

                        <th>
                            STATUS
                        </th>

                        <th class="text-center">
                            AKSI
                        </th>

                    </tr>

                </thead>


                <tbody id="productTable">


                    @forelse($products as $index => $product)


                        <tr
                            class="product-row"
                            data-index="{{ $index }}">


                            {{-- =================================================
                                 BARANG
                            ================================================== --}}

                            <td>

                                <div class="product">


                                    @if($product->image)

                                        <img
                                            src="{{ asset('uploads/products/'.$product->image) }}"
                                            alt="{{ $product->name }}">

                                    @else

                                        <img
                                            src="{{ asset('images/no-image.png') }}"
                                            alt="No Image">

                                    @endif


                                    <div class="product-info">

                                        <div class="product-name">

                                            {{ $product->name }}

                                        </div>

                                        <div class="product-code">

                                            BRG-{{
                                                str_pad(
                                                    $product->id,
                                                    4,
                                                    '0',
                                                    STR_PAD_LEFT
                                                )
                                            }}

                                        </div>

                                    </div>

                                </div>

                            </td>


                            {{-- =================================================
                                 KATEGORI
                            ================================================== --}}

                            <td>

                                <span class="category-text">

                                    {{ $product->category->name ?? '-' }}

                                </span>

                            </td>


                            {{-- =================================================
                                 HARGA
                            ================================================== --}}

                            <td>

                                <div class="price-main">

                                    Rp
                                    {{
                                        number_format(
                                            $product->price_per_day,
                                            0,
                                            ',',
                                            '.'
                                        )
                                    }}

                                </div>

                                <span class="price-sub">
                                    per hari
                                </span>

                            </td>


                            {{-- =================================================
                                 STOK
                            ================================================== --}}

                            <td>

                                @if($product->stock <= 2)

                                    <span class="stock-badge stock-danger">

                                        {{ $product->stock }}

                                    </span>

                                @elseif($product->stock <= 5)

                                    <span class="stock-badge stock-warning">

                                        {{ $product->stock }}

                                    </span>

                                @else

                                    <span class="stock-badge stock-success">

                                        {{ $product->stock }}

                                    </span>

                                @endif

                            </td>


                            {{-- =================================================
                                 STATUS
                            ================================================== --}}

                            <td>


                                @if($product->status == 'available')

                                    <span class="status-badge status-available">

                                        <span class="status-dot"></span>

                                        Tersedia

                                    </span>


                                @elseif($product->status == 'rented')

                                    <span class="status-badge status-rented">

                                        <span class="status-dot"></span>

                                        Disewa

                                    </span>


                                @else

                                    <span class="status-badge status-maintenance">

                                        <span class="status-dot"></span>

                                        Perawatan

                                    </span>

                                @endif


                            </td>


                            {{-- =================================================
                                 AKSI
                            ================================================== --}}

                            <td>

                                <div class="action-wrapper">


                                    {{-- EDIT --}}

                                    <button
                                        type="button"
                                        class="action-btn action-edit"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEdit{{ $product->id }}"
                                        title="Edit Barang">

                                        <i class="bi bi-pencil"></i>

                                    </button>


                                    {{-- DELETE --}}

                                    <form
                                        action="{{ route('products.destroy',$product->id) }}"
                                        method="POST"
                                        class="m-0">

                                        @csrf

                                        @method('DELETE')


                                        <button
                                            type="submit"
                                            class="action-btn action-delete"
                                            title="Hapus Barang"
                                            onclick="return confirm('Yakin ingin menghapus barang ini?')">

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </form>


                                </div>

                            </td>


                        </tr>


                    @empty


                        <tr>

                            <td colspan="6">

                                <div class="empty-box">

                                    <i class="bi bi-box-seam"></i>

                                    <h5>
                                        Belum Ada Barang
                                    </h5>

                                    <p>
                                        Silakan tambahkan barang pertama
                                        untuk mulai mengelola inventaris.
                                    </p>

                                </div>

                            </td>

                        </tr>


                    @endforelse


                </tbody>

            </table>

        </div>

    </div>

</div>



{{-- =========================================================
     MODAL TAMBAH BARANG
========================================================= --}}

<div
    class="modal fade"
    id="modalTambah"
    tabindex="-1"
    aria-hidden="true">


    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content">


            <form
                action="{{ route('products.store') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf


                {{-- HEADER MODAL --}}

                <div class="modal-header">

                    <div>

                        <h4 class="mb-1">

                            <i class="bi bi-box-seam text-primary me-2"></i>

                            Tambah Barang

                        </h4>

                        <small class="text-muted">

                            Lengkapi data barang yang akan disewakan.

                        </small>

                    </div>


                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">

                    </button>

                </div>


                {{-- BODY --}}

                <div class="modal-body">

                    <div class="row g-3">


                        {{-- NAMA --}}

                        <div class="col-md-6">

                            <label class="form-label">
                                Nama Barang
                            </label>

                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                placeholder="Masukkan nama barang"
                                required>

                        </div>


                        {{-- KATEGORI --}}

                        <div class="col-md-6">

                            <label class="form-label">
                                Kategori
                            </label>

                            <select
                                name="category_id"
                                class="form-select"
                                required>

                                <option value="">
                                    Pilih Kategori
                                </option>

                                @foreach($categories as $category)

                                    <option value="{{ $category->id }}">

                                        {{ $category->name }}

                                    </option>

                                @endforeach

                            </select>

                        </div>


                        {{-- HARGA --}}

                        <div class="col-md-6">

                            <label class="form-label">
                                Harga / Hari
                            </label>

                            <div class="input-group">

                                <span class="input-group-text">
                                    Rp
                                </span>

                                <input
                                    type="text"
                                    id="price_display"
                                    class="form-control"
                                    placeholder="0"
                                    autocomplete="off">

                                <input
                                    type="hidden"
                                    id="price_per_day"
                                    name="price_per_day">

                            </div>

                        </div>


                        {{-- STOK --}}

                        <div class="col-md-6">

                            <label class="form-label">
                                Stok
                            </label>

                            <input
                                type="number"
                                name="stock"
                                value="1"
                                min="1"
                                class="form-control"
                                required>

                        </div>


                        {{-- STATUS --}}

                        <div class="col-md-6">

                            <label class="form-label">
                                Status
                            </label>

                            <select
                                name="status"
                                class="form-select">

                                <option value="available">
                                    Tersedia
                                </option>

                                <option value="rented">
                                    Disewa
                                </option>

                                <option value="maintenance">
                                    Perawatan
                                </option>

                            </select>

                        </div>


                        {{-- FOTO --}}

                        <div class="col-md-6">

                            <label class="form-label">
                                Foto Barang
                            </label>

                            <input
                                type="file"
                                name="image"
                                id="imageInput"
                                class="form-control"
                                accept="image/*">

                        </div>


                        {{-- PREVIEW --}}

                        <div class="col-12 text-center">

                            <img
                                id="previewImage"
                                src="{{ asset('images/no-image.png') }}"
                                class="preview-image"
                                alt="Preview">

                        </div>


                        {{-- DESKRIPSI --}}

                        <div class="col-12">

                            <label class="form-label">
                                Deskripsi
                            </label>

                            <textarea
                                name="description"
                                rows="3"
                                class="form-control"
                                placeholder="Masukkan deskripsi barang..."></textarea>

                        </div>


                    </div>

                </div>


                {{-- FOOTER --}}

                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-light"
                        data-bs-dismiss="modal">

                        Batal

                    </button>


                    <button
                        type="submit"
                        class="btn btn-primary">

                        <i class="bi bi-check-circle me-2"></i>

                        Simpan Barang

                    </button>

                </div>


            </form>

        </div>

    </div>

</div>



{{-- =========================================================
     MODAL EDIT BARANG
========================================================= --}}

@foreach($products as $product)


<div
    class="modal fade"
    id="modalEdit{{ $product->id }}"
    tabindex="-1"
    aria-hidden="true">


    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">


            <form
                action="{{ route('products.update',$product->id) }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                @method('PUT')


                {{-- HEADER --}}

                <div class="modal-header">

                    <div>

                        <h5 class="mb-0">

                            <i class="bi bi-pencil-square text-primary me-2"></i>

                            Edit Barang

                        </h5>

                    </div>


                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">

                    </button>

                </div>


                {{-- BODY --}}

                <div class="modal-body">

                    <div class="row g-3">


                        {{-- NAMA --}}

                        <div class="col-md-6">

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


                        {{-- KATEGORI --}}

                        <div class="col-md-6">

                            <label class="form-label">
                                Kategori
                            </label>

                            <select
                                name="category_id"
                                class="form-select"
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


                        {{-- HARGA --}}

                        <div class="col-md-6">

                            <label class="form-label">
                                Harga / Hari
                            </label>

                            <div class="input-group">

                                <span class="input-group-text">
                                    Rp
                                </span>

                                <input
                                    type="number"
                                    name="price_per_day"
                                    class="form-control"
                                    value="{{ $product->price_per_day }}"
                                    required>

                            </div>

                        </div>


                        {{-- STOK --}}

                        <div class="col-md-6">

                            <label class="form-label">
                                Stok
                            </label>

                            <input
                                type="number"
                                name="stock"
                                class="form-control"
                                value="{{ $product->stock }}"
                                min="1"
                                required>

                        </div>


                        {{-- STATUS --}}

                        <div class="col-md-6">

                            <label class="form-label">
                                Status
                            </label>

                            <select
                                name="status"
                                class="form-select">

                                <option
                                    value="available"
                                    {{ $product->status == 'available' ? 'selected' : '' }}>

                                    Tersedia

                                </option>


                                <option
                                    value="rented"
                                    {{ $product->status == 'rented' ? 'selected' : '' }}>

                                    Disewa

                                </option>


                                <option
                                    value="maintenance"
                                    {{ $product->status == 'maintenance' ? 'selected' : '' }}>

                                    Perawatan

                                </option>

                            </select>

                        </div>


                        {{-- FOTO --}}

                        <div class="col-md-6">

                            <label class="form-label">
                                Ganti Foto
                            </label>

                            <input
                                type="file"
                                name="image"
                                class="form-control"
                                accept="image/*">

                        </div>


                        {{-- PREVIEW FOTO --}}

                        <div class="col-12 text-center">


                            @if($product->image)

                                <img
                                    src="{{ asset('uploads/products/'.$product->image) }}"
                                    class="preview-image"
                                    alt="{{ $product->name }}">

                            @else

                                <img
                                    src="{{ asset('images/no-image.png') }}"
                                    class="preview-image"
                                    alt="No Image">

                            @endif


                        </div>


                        {{-- DESKRIPSI --}}

                        <div class="col-12">

                            <label class="form-label">
                                Deskripsi
                            </label>

                            <textarea
                                name="description"
                                rows="3"
                                class="form-control"
                                placeholder="Masukkan deskripsi barang...">{{ $product->description }}</textarea>

                        </div>


                    </div>

                </div>


                {{-- FOOTER --}}

                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-light"
                        data-bs-dismiss="modal">

                        Batal

                    </button>


                    <button
                        type="submit"
                        class="btn btn-primary">

                        <i class="bi bi-check-circle me-2"></i>

                        Update Barang

                    </button>

                </div>


            </form>

        </div>

    </div>

</div>


@endforeach



<script>

document.addEventListener('DOMContentLoaded', function(){


    /* =====================================================
       FORMAT HARGA
    ===================================================== */

    const priceDisplay =
        document.getElementById('price_display');

    const priceHidden =
        document.getElementById('price_per_day');


    if(priceDisplay && priceHidden){

        priceDisplay.addEventListener('input', function(){

            let value =
                this.value.replace(/\D/g,'');

            priceHidden.value = value;

            this.value = value
                ? new Intl.NumberFormat('id-ID').format(value)
                : '';

        });

    }



    /* =====================================================
       PREVIEW FOTO
    ===================================================== */

    const imageInput =
        document.getElementById('imageInput');

    const previewImage =
        document.getElementById('previewImage');


    if(imageInput && previewImage){

        imageInput.addEventListener('change', function(){

            const file =
                this.files[0];

            if(file){

                previewImage.src =
                    URL.createObjectURL(file);

            }

        });

    }



    /* =====================================================
       SEARCH + FILTER + 8 BARANG
    ===================================================== */

    const search =
        document.getElementById('searchProduct');

    const categoryFilter =
        document.getElementById('categoryFilter');

    const productTable =
        document.getElementById('productTable');

    const seeAllBtn =
        document.getElementById('seeAllBtn');


    let showAll = false;



    function filterProducts(){


        if(!productTable){
            return;
        }


        const keyword =
            search
                ? search.value.trim().toLowerCase()
                : '';


        const category =
            categoryFilter
                ? categoryFilter.value.trim().toLowerCase()
                : '';


        const rows =
            productTable.querySelectorAll('.product-row');


        rows.forEach(function(row,index){


            const cells =
                row.querySelectorAll('td');


            if(cells.length < 6){
                return;
            }


            const rowText =
                row.innerText.toLowerCase();


            const categoryText =
                cells[1]
                    ? cells[1].innerText.toLowerCase()
                    : '';


            const matchSearch =
                rowText.includes(keyword);


            const matchCategory =
                category === '' ||
                categoryText.includes(category);


            const match =
                matchSearch &&
                matchCategory;


            const hasFilter =
                keyword !== '' ||
                category !== '';



            if(hasFilter){

                row.style.display =
                    match ? '' : 'none';

            }
            else{

                if(showAll){

                    row.style.display = '';

                }
                else{

                    row.style.display =
                        index < 8
                            ? ''
                            : 'none';

                }

            }

        });



        /* =================================================
           BUTTON LIHAT SEMUA
        ================================================== */

        if(rows.length > 8){

            seeAllBtn.classList.add('show');


            const hasFilter =
                keyword !== '' ||
                category !== '';


            if(hasFilter){

                seeAllBtn.style.display =
                    'none';

            }
            else{

                seeAllBtn.style.display =
                    'inline-flex';

            }

        }
        else{

            seeAllBtn.classList.remove('show');

            seeAllBtn.style.display =
                'none';

        }

    }



    /* =====================================================
       BUTTON LIHAT SEMUA
    ===================================================== */

    if(seeAllBtn){

        seeAllBtn.addEventListener(
            'click',
            function(){

                showAll =
                    !showAll;


                const rows =
                    productTable.querySelectorAll(
                        '.product-row'
                    );


                rows.forEach(
                    function(row,index){

                        if(showAll){

                            row.style.display = '';

                        }
                        else{

                            row.style.display =
                                index < 8
                                    ? ''
                                    : 'none';

                        }

                    }
                );


                if(showAll){

                    this.innerHTML =
                        '<i class="bi bi-chevron-up"></i>' +
                        '<span>Sembunyikan</span>';

                }
                else{

                    this.innerHTML =
                        '<i class="bi bi-grid-3x3-gap-fill"></i>' +
                        '<span>Lihat Semua</span>';

                }

            }
        );

    }



    /* =====================================================
       SEARCH EVENT
    ===================================================== */

    if(search){

        search.addEventListener(
            'input',
            filterProducts
        );

    }



    /* =====================================================
       FILTER EVENT
    ===================================================== */

    if(categoryFilter){

        categoryFilter.addEventListener(
            'change',
            filterProducts
        );

    }



    /* =====================================================
       INITIAL LOAD
    ===================================================== */

    filterProducts();


});

</script>


@endsection
