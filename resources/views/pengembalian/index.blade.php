@extends('layout.app')

@section('content')

<style>

/* =========================================
   GOOGLE FONT
========================================= */

@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');


/* =========================================
   GLOBAL
========================================= */

body{
    background:#F4F8FF;
    font-family:'Inter',sans-serif;
}

.return-page{
    animation:fade .3s ease;
}

@keyframes fade{
    from{
        opacity:0;
        transform:translateY(10px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}


/* =========================================
   PAGE HEADER
========================================= */

.page-header{
    margin-bottom:26px;
}

.page-title h2{
    font-size:34px;
    font-weight:800;
    color:#1E293B;
    margin:0 0 6px;
}

.page-title p{
    margin:0;
    font-size:14px;
    color:#64748B;
}


/* =========================================
   PAGE TITLE ICON
========================================= */

.page-title-icon{
    width:48px;
    height:48px;
    border-radius:14px;
    background:#DBEAFE;
    color:#2563EB;
    display:flex;
    align-items:center;
    justify-content:center;
    flex-shrink:0;
    font-size:22px;
    box-shadow:0 6px 16px rgba(37,99,235,.10);
}

.page-title-icon i{
    line-height:1;
}


/* =========================================
   CARD
========================================= */

.card-custom{
    background:#FFFFFF;
    border:none;
    border-radius:22px;
    box-shadow:0 10px 30px rgba(15,23,42,.06);
    margin-bottom:24px;
    overflow:hidden;
}

.card-body-custom{
    padding:24px;
}


/* =========================================
   SECTION TITLE
========================================= */

.section-title{
    display:flex;
    align-items:center;
    gap:12px;
    margin-bottom:20px;
}

.section-title .icon{
    width:42px;
    height:42px;
    border-radius:12px;
    background:#DBEAFE;
    color:#2563EB;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:20px;
    flex-shrink:0;
}

.section-title h4,
.section-title h5{
    margin:0;
    font-size:22px;
    font-weight:800;
    color:#1E293B;
}

.section-title > div:last-child{
    flex:1;
}

.section-subtitle{
    margin:4px 0 0;
    font-size:13px;
    font-weight:400;
    color:#64748B;
}


/* =========================================
   TABLE
========================================= */

.table{
    margin:0;
    width:100%;
}

.table thead th{
    background:#F8FAFC;
    border:none;
    padding:13px 14px;
    font-size:11px;
    font-weight:700;
    color:#64748B;
    text-transform:uppercase;
    white-space:nowrap;
}

.table tbody td{
    padding:14px;
    font-size:13px;
    color:#334155;
    vertical-align:middle;
    border-top:1px solid #EEF2F7;
}

.table tbody tr{
    transition:.25s;
}

.table tbody tr:hover{
    background:#F8FBFF;
}

.table td:first-child{
    min-width:170px;
}

.table td:nth-child(2){
    min-width:140px;
}

.table td:nth-child(3){
    min-width:220px;
}

.table-responsive{
    overflow-x:auto;
}


/* =========================================
   BADGE
========================================= */

.badge-success,
.badge-warning,
.badge-danger,
.badge-status{
    padding:6px 12px;
    border-radius:30px;
    font-size:11px;
    font-weight:700;
    white-space:nowrap;
    display:inline-flex;
    align-items:center;
    gap:5px;
}

.badge-success{
    background:#DCFCE7;
    color:#16A34A;
}

.badge-warning{
    background:#FEF3C7;
    color:#D97706;
}

.badge-danger{
    background:#FEE2E2;
    color:#DC2626;
}

.badge-status{
    background:#DBEAFE;
    color:#2563EB;
}


/* =========================================
   MONEY
========================================= */

.money{
    font-size:13px;
    font-weight:700;
}

.money.active{
    color:#EF4444;
}


/* =========================================
   DELETE BUTTON
========================================= */

.btn-delete{
    width:36px;
    height:36px;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:10px;
    padding:0;
    border:none;
    background:#EF4444;
    color:#FFFFFF;
    transition:.2s;
}

.btn-delete:hover{
    background:#DC2626;
    color:#FFFFFF;
    transform:translateY(-1px);
}


/* =========================================
   HISTORY BUTTON
========================================= */

.history-wrapper{
    text-align:center;
    margin-top:22px;
}

.history-btn{
    display:inline-flex;
    align-items:center;
    gap:10px;
    padding:12px 24px;
    background:#FFFFFF;
    color:#2563EB;
    border:1px solid #DBEAFE;
    border-radius:50px;
    font-size:14px;
    font-weight:700;
    text-decoration:none;
    box-shadow:0 6px 18px rgba(37,99,235,.12);
    transition:.3s;
}

.history-btn span{
    width:34px;
    height:34px;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:50%;
    background:#DBEAFE;
    color:#2563EB;
}

.history-btn:hover{
    background:#2563EB;
    color:#FFFFFF;
    transform:translateY(-2px);
}

.history-btn:hover span{
    background:#FFFFFF;
    color:#2563EB;
}


/* =========================================
   REQUEST RETURN
========================================= */

.return-request{
    border:1px solid #E2E8F0;
    border-radius:18px;
    padding:20px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:30px;
    margin-bottom:16px;
    background:#FFFFFF;
    transition:.25s;
}

.return-request:last-child{
    margin-bottom:0;
}

.return-request:hover{
    border-color:#BFDBFE;
    background:#FAFCFF;
    box-shadow:0 6px 20px rgba(37,99,235,.06);
}


/* =========================================
   REQUEST INFO
========================================= */

.request-info{
    flex:1;
    min-width:0;
}

.request-code{
    font-size:20px;
    font-weight:800;
    color:#2563EB;
    margin-bottom:10px;
}

.request-detail{
    display:grid;
    grid-template-columns:max-content max-content 1fr;
    column-gap:6px;
    row-gap:5px;
    font-size:14px;
    color:#334155;
}

.request-detail strong{
    font-weight:600;
    color:#1E293B;
}

.request-detail span{
    color:#64748B;
}


/* =========================================
   REQUEST PRODUCTS
========================================= */

.request-products{
    margin-top:12px;
    padding-top:12px;
    border-top:1px solid #F1F5F9;
}

.product-item{
    display:flex;
    align-items:center;
    gap:3px;
    font-size:13px;
    color:#334155;
    margin-bottom:3px;
}

.product-item:last-child{
    margin-bottom:0;
}

.product-item i{
    color:#2563EB;
    font-size:18px;
}

.product-item small{
    color:#64748B;
}


/* =========================================
   REQUEST ACTION
========================================= */

.request-action{
    min-width:230px;
    display:flex;
    flex-direction:column;
    align-items:flex-end;
    gap:12px;
}


/* =========================================
   WAITING BADGE
========================================= */

.waiting-badge{
    display:inline-flex;
    align-items:center;
    gap:7px;
    padding:8px 14px;
    border-radius:30px;
    background:#FEF3C7;
    color:#D97706;
    font-size:12px;
    font-weight:700;
    white-space:nowrap;
}

.waiting-badge i{
    font-size:9px;
}


/* =========================================
   PROCESS BUTTON
========================================= */

.process-btn{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:8px;
    padding:10px 16px;
    border-radius:10px;
    background:#2563EB;
    color:#FFFFFF;
    text-decoration:none;
    font-size:13px;
    font-weight:600;
    white-space:nowrap;
    transition:.2s;
}

.process-btn:hover{
    background:#1D4ED8;
    color:#FFFFFF;
    transform:translateY(-1px);
}


/* =========================================
   EMPTY REQUEST
========================================= */

.empty-request{
    text-align:center;
    padding:45px 20px;
    color:#64748B;
}

.empty-request i{
    display:block;
    font-size:48px;
    color:#22C55E;
    margin-bottom:12px;
}

.empty-request h5{
    margin-bottom:5px;
    font-size:17px;
    font-weight:700;
    color:#334155;
}

.empty-request p{
    margin:0;
    font-size:13px;
}


/* =========================================
   FORM
========================================= */

.form-label{
    font-weight:600;
    color:#334155;
    margin-bottom:8px;
    font-size:14px;
}

.form-control,
.form-select{
    border-radius:10px;
    border:1px solid #D9E2EC;
    min-height:42px;
    font-size:14px;
    color:#334155;
    box-shadow:none;
}

.form-control:focus,
.form-select:focus{
    border-color:#2563EB;
    box-shadow:0 0 0 .2rem rgba(37,99,235,.12);
}

.input-group-text{
    background:#F8FAFC;
    border:1px solid #D9E2EC;
    color:#64748B;
    font-weight:600;
}


/* =========================================
   DENDA INPUT
========================================= */

.denda-input{
    font-weight:600;
    color:#334155;
    background:#F8FAFC !important;
}

.total-denda-box{
    background:#F8FAFC !important;
    font-size:18px;
    font-weight:800;
    color:#DC2626;
}


/* =========================================
   PRIMARY BUTTON
========================================= */

.btn-primary-custom{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    background:#2563EB;
    color:#FFFFFF;
    border:none;
    border-radius:12px;
    padding:12px 24px;
    font-weight:600;
    font-size:14px;
    transition:.2s;
}

.btn-primary-custom:hover{
    background:#1D4ED8;
    color:#FFFFFF;
    transform:translateY(-1px);
}


/* =========================================
   FORM SPACING
========================================= */

.return-form-grid{
    row-gap:20px !important;
}


/* =========================================
   ALERT
========================================= */

.alert{
    font-size:14px;
}

.alert ul{
    padding-left:20px;
}


/* =========================================
   RESPONSIVE
========================================= */

@media(max-width:1000px){

    .return-request{
        flex-direction:column;
        align-items:stretch;
    }

    .request-action{
        min-width:0;
        align-items:flex-start;
        width:100%;
    }
}

@media(max-width:768px){

    .page-title h2{
        font-size:28px;
    }

    .page-title-icon{
        width:44px;
        height:44px;
        font-size:20px;
    }

    .card-body-custom{
        padding:18px;
    }

    .history-btn{
        width:100%;
        justify-content:center;
    }

    .request-detail{
        display:block;
    }

    .request-detail div{
        margin-bottom:5px;
    }

    .process-btn{
        width:100%;
    }

    .request-action{
        align-items:stretch;
    }

    .btn-primary-custom{
        width:100%;
    }
}

</style>


<div class="container-fluid return-page">

    {{-- =========================================
         HEADER
    ========================================== --}}

    <div class="page-header">

        <div class="page-title">

            <div class="d-flex align-items-center gap-3">

                <div class="page-title-icon">
                    <i class="bi bi-arrow-counterclockwise"></i>
                </div>

                <div>

                    <h2>
                        Pengembalian Barang
                    </h2>

                    <p>
                        Kelola proses pengembalian barang beserta denda dan kondisi barang.
                    </p>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================================
         RIWAYAT PENGEMBALIAN
    ========================================== --}}

    <div class="card card-custom">

        <div class="card-body-custom">

            <div class="section-title">

                <div class="icon">
                    <i class="bi bi-clock-history"></i>
                </div>

                <div>

                    <h5>
                        Riwayat Pengembalian
                    </h5>

                    <p class="section-subtitle">
                        Data pengembalian barang yang sudah diproses.
                    </p>

                </div>

            </div>


            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>

                        <tr>

                            <th>No Transaksi</th>
                            <th>Pelanggan</th>
                            <th>Barang</th>
                            <th>Tanggal</th>
                            <th>Kondisi</th>
                            <th>Denda Telat</th>
                            <th>Denda Rusak</th>
                            <th>Status</th>
                            <th>Aksi</th>

                        </tr>

                    </thead>


                    <tbody>

                    @forelse($riwayatTerbaru ?? [] as $item)

                        <tr>

                            {{-- NO TRANSAKSI --}}

                            <td>

                                <span class="fw-bold text-primary">

                                    {{ optional($item->rental)->rental_code ?? '-' }}

                                </span>

                            </td>


                            {{-- PELANGGAN --}}

                            <td>

                                <div class="fw-semibold">

                                    {{ optional(optional($item->rental)->customer)->name ?? '-' }}

                                </div>

                                <small class="text-muted">

                                    {{ optional(optional($item->rental)->customer)->phone ?? '-' }}

                                </small>

                            </td>


                            {{-- BARANG --}}

                            <td>

                                @forelse(optional($item->rental)->details ?? [] as $detail)

                                    <div class="mb-1">

                                        <span class="fw-semibold">

                                            {{ optional($detail->product)->name ?? '-' }}

                                        </span>

                                        <small class="text-muted">

                                            ({{ $detail->quantity ?? 0 }}x)

                                        </small>

                                    </div>

                                @empty

                                    <span class="text-muted">
                                        -
                                    </span>

                                @endforelse

                            </td>


                            {{-- TANGGAL --}}

                            <td>

                                @if($item->tanggal_kembali)

                                    {{ \Carbon\Carbon::parse($item->tanggal_kembali)->format('d M Y') }}

                                @else

                                    -

                                @endif

                            </td>


                            {{-- KONDISI --}}

                            <td>

                                @if($item->kondisi == 'Baik')

                                    <span class="badge-success">

                                        <i class="bi bi-check-circle-fill"></i>

                                        Baik

                                    </span>

                                @elseif($item->kondisi == 'Rusak Ringan')

                                    <span class="badge-warning">

                                        <i class="bi bi-exclamation-circle-fill"></i>

                                        Rusak Ringan

                                    </span>

                                @elseif($item->kondisi == 'Rusak Berat')

                                    <span class="badge-danger">

                                        <i class="bi bi-x-circle-fill"></i>

                                        Rusak Berat

                                    </span>

                                @else

                                    <span class="badge-status">

                                        {{ $item->kondisi ?? '-' }}

                                    </span>

                                @endif

                            </td>


                            {{-- DENDA TELAT --}}

                            <td>

                                @if(($item->denda_telat ?? 0) > 0)

                                    <span class="money active">

                                        Rp {{ number_format($item->denda_telat, 0, ',', '.') }}

                                    </span>

                                @else

                                    <span class="money text-muted">

                                        Rp -

                                    </span>

                                @endif

                            </td>


                            {{-- DENDA RUSAK --}}

                            <td>

                                @if(($item->denda_rusak ?? 0) > 0)

                                    <span class="money active">

                                        Rp {{ number_format($item->denda_rusak, 0, ',', '.') }}

                                    </span>

                                @else

                                    <span class="money text-muted">

                                        Rp -

                                    </span>

                                @endif

                            </td>


                            {{-- STATUS --}}

                            <td>

                                @php

                                    $status = $item->status ?? 'Menunggu';

                                @endphp

                                <span class="badge-status">

                                    {{ $status }}

                                </span>

                            </td>


                            {{-- AKSI --}}

                            <td>

                                <form
                                    action="{{ route('pengembalian.destroy', $item->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus data pengembalian ini?')"
                                >

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn-delete"
                                        title="Hapus"
                                    >

                                        <i class="bi bi-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="9">

                                <div class="text-center py-5">

                                    <i class="bi bi-inbox display-5 text-secondary"></i>

                                    <h5 class="mt-3 fw-bold">

                                        Belum Ada Riwayat Pengembalian

                                    </h5>

                                    <p class="text-muted mb-0">

                                        Data pengembalian akan tampil setelah transaksi selesai.

                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>


            {{-- HISTORY BUTTON --}}

            <div class="history-wrapper">

                <a
                    href="{{ route('pengembalian.riwayat') }}"
                    class="history-btn"
                >

                    <span>
                        <i class="bi bi-clock-history"></i>
                    </span>

                    Lihat Semua Riwayat

                    <i class="bi bi-arrow-right ms-2"></i>

                </a>

            </div>

        </div>

    </div>


    {{-- =========================================
         PERMINTAAN PENGEMBALIAN
    ========================================== --}}

    <div class="card card-custom">

        <div class="card-body-custom">

            {{-- TITLE --}}

            <div class="section-title">

                <div class="icon">
                    <i class="bi bi-arrow-return-left"></i>
                </div>

                <div>

                    <h5>
                        Permintaan Pengembalian
                    </h5>

                    <p class="section-subtitle">
                        Daftar transaksi yang menunggu proses pengembalian
                    </p>

                </div>

            </div>


            {{-- REQUEST LIST --}}

            @forelse($rentals ?? [] as $rental)

                <div class="return-request">

                    {{-- LEFT --}}

                    <div class="request-info">

                        {{-- CODE --}}

                        <div class="request-code">

                            {{ $rental->rental_code }}

                        </div>


                        {{-- DETAIL --}}

                        <div class="request-detail">

                            <div>

                                <strong>
                                    Pelanggan
                                </strong>

                                <span>:</span>

                                {{ optional($rental->customer)->name ?? '-' }}

                            </div>


                            <div>

                                <strong>
                                    Tanggal Sewa
                                </strong>

                                <span>:</span>

                                {{ $rental->rental_date
                                    ? \Carbon\Carbon::parse($rental->rental_date)->format('d M Y')
                                    : '-'
                                }}

                            </div>


                            <div>

                                <strong>
                                    Tanggal Kembali
                                </strong>

                                <span>:</span>

                                {{ $rental->return_date
                                    ? \Carbon\Carbon::parse($rental->return_date)->format('d M Y')
                                    : '-'
                                }}

                            </div>

                        </div>


                        {{-- PRODUCTS --}}

                        <div class="request-products">

                            @forelse($rental->details ?? [] as $detail)

                                <div class="product-item">

                                    <i class="bi bi-dot"></i>

                                    <span>

                                        {{ optional($detail->product)->name ?? '-' }}

                                    </span>

                                    <small>

                                        ({{ $detail->quantity ?? 0 }}x)

                                    </small>

                                </div>

                            @empty

                                <div class="product-item">

                                    <span class="text-muted">

                                        Tidak ada detail barang.

                                    </span>

                                </div>

                            @endforelse

                        </div>

                    </div>


                    {{-- RIGHT --}}

                    <div class="request-action">

                        {{-- STATUS --}}

                        <span class="waiting-badge">

                            <i class="bi bi-clock-fill"></i>

                            Menunggu Diproses

                        </span>


                        {{-- BUTTON --}}

                        <a
                            href="{{ request()->fullUrlWithQuery(['rental_id' => $rental->id]) }}"
                            class="process-btn"
                        >

                            <i class="bi bi-arrow-right-circle"></i>

                            Proses Pengembalian

                        </a>

                    </div>

                </div>

            @empty

                <div class="empty-request">

                    <i class="bi bi-check-circle"></i>

                    <h5>
                        Tidak ada permintaan pengembalian
                    </h5>

                    <p>
                        Semua transaksi sudah diproses.
                    </p>

                </div>

            @endforelse

        </div>

    </div>


    {{-- =========================================
         PROSES PENGEMBALIAN BARU
    ========================================== --}}

    <div class="card card-custom">

        <div class="card-body-custom">

            {{-- TITLE --}}

            <div class="section-title">

                <div class="icon">
                    <i class="bi bi-arrow-counterclockwise"></i>
                </div>

                <div>

                    <h5>
                        Proses Pengembalian Baru
                    </h5>

                    <p class="section-subtitle">
                        Periksa kondisi barang dan hitung denda pengembalian.
                    </p>

                </div>

            </div>


            {{-- FORM --}}

            <form
                action="{{ route('pengembalian.store') }}"
                method="POST"
                id="returnForm"
            >

                @csrf

                <div class="row return-form-grid">


                    {{-- =================================
                         NOMOR TRANSAKSI
                    ================================== --}}

                    <div class="col-lg-4">

                        <label class="form-label">

                            Nomor Transaksi

                        </label>


                        <select
                            name="rental_id"
                            id="rental_id"
                            class="form-select"
                            required
                        >

                            <option value="">

                                Pilih Permintaan Pengembalian

                            </option>


                            @foreach($rentals ?? [] as $rental)

                                <option
                                    value="{{ $rental->id }}"
                                    data-return-date="{{ $rental->return_date }}"
                                    {{ isset($selectedRental) && $selectedRental == $rental->id ? 'selected' : '' }}
                                >

                                    {{ $rental->rental_code }}

                                    -

                                    {{ optional($rental->customer)->name ?? '-' }}

                                </option>

                            @endforeach

                        </select>

                    </div>


                    {{-- =================================
                         TANGGAL PENGEMBALIAN
                    ================================== --}}

                    <div class="col-lg-4">

                        <label class="form-label">

                            Tanggal Pengembalian

                        </label>


                        <input
                            type="date"
                            name="tanggal_kembali"
                            id="tanggal_kembali"
                            class="form-control"
                            value="{{ old('tanggal_kembali', date('Y-m-d')) }}"
                            required
                        >

                    </div>


                    {{-- =================================
                         KONDISI
                    ================================== --}}

                    <div class="col-lg-4">

                        <label class="form-label">

                            Kondisi Barang

                        </label>


                        <select
                            name="kondisi"
                            id="kondisi"
                            class="form-select"
                            required
                        >

                            <option
                                value="Baik"
                                {{ old('kondisi', 'Baik') == 'Baik' ? 'selected' : '' }}
                            >

                                Baik

                            </option>


                            <option
                                value="Rusak Ringan"
                                {{ old('kondisi') == 'Rusak Ringan' ? 'selected' : '' }}
                            >

                                Rusak Ringan

                            </option>


                            <option
                                value="Rusak Berat"
                                {{ old('kondisi') == 'Rusak Berat' ? 'selected' : '' }}
                            >

                                Rusak Berat

                            </option>

                        </select>

                    </div>


                    {{-- =================================
                         DENDA TERLAMBAT
                    ================================== --}}

                    <div class="col-lg-6">

                        <label class="form-label">

                            Denda Terlambat

                            <small class="text-muted">
                                (Rp10.000 / hari)
                            </small>

                        </label>


                        <div class="input-group">

                            <span class="input-group-text">
                                Rp
                            </span>


                            {{-- DISPLAY --}}

                            <input
                                type="text"
                                id="denda_telat_display"
                                class="form-control denda-input"
                                value="0"
                                readonly
                            >


                            {{-- DATABASE VALUE --}}

                            <input
                                type="hidden"
                                name="denda_telat"
                                id="denda_telat"
                                value="0"
                            >

                        </div>

                    </div>


                    {{-- =================================
                         DENDA KERUSAKAN
                    ================================== --}}

                    <div class="col-lg-6">

                        <label class="form-label">

                            Denda Kerusakan

                        </label>


                        <div class="input-group">

                            <span class="input-group-text">
                                Rp
                            </span>


                            {{-- DISPLAY --}}

                            <input
                                type="text"
                                id="denda_rusak_display"
                                class="form-control denda-input"
                                value="0"
                                readonly
                            >


                            {{-- DATABASE VALUE --}}

                            <input
                                type="hidden"
                                name="denda_rusak"
                                id="denda_rusak"
                                value="0"
                            >

                        </div>

                    </div>


                    {{-- =================================
                         TOTAL DENDA
                    ================================== --}}

                    <div class="col-lg-6">

                        <label class="form-label">

                            Total Denda

                        </label>


                        <input
                            type="text"
                            id="total_denda"
                            class="form-control total-denda-box"
                            value="Rp 0"
                            readonly
                        >

                    </div>

                </div>


                {{-- =================================
                     BUTTON
                ================================== --}}

                <div class="mt-4">

                    <button
                        type="submit"
                        class="btn-primary-custom"
                    >

                        <i class="bi bi-check-circle me-2"></i>

                        Proses Pengembalian

                    </button>

                </div>

            </form>

        </div>

    </div>


    {{-- =========================================
         SUCCESS
    ========================================== --}}

    @if(session('success'))

        <div
            class="alert alert-success alert-dismissible fade show mt-4 shadow-sm border-0 rounded-4"
            role="alert"
        >

            <i class="bi bi-check-circle-fill me-2"></i>

            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
            ></button>

        </div>

    @endif


    {{-- =========================================
         ERROR
    ========================================== --}}

    @if(session('error'))

        <div
            class="alert alert-danger alert-dismissible fade show mt-4 shadow-sm border-0 rounded-4"
            role="alert"
        >

            <i class="bi bi-exclamation-triangle-fill me-2"></i>

            {{ session('error') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
            ></button>

        </div>

    @endif


    {{-- =========================================
         VALIDATION ERROR
    ========================================== --}}

    @if($errors->any())

        <div class="alert alert-danger rounded-4 mt-4">

            <strong>
                Terjadi Kesalahan
            </strong>


            <ul class="mt-2 mb-0">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif

</div>


{{-- =========================================
     JAVASCRIPT
========================================= --}}

<script>

document.addEventListener("DOMContentLoaded", function () {

    /* =====================================
       ELEMENT
    ===================================== */

    const rentalSelect =
        document.getElementById("rental_id");

    const tanggalKembali =
        document.getElementById("tanggal_kembali");

    const kondisi =
        document.getElementById("kondisi");

    const dendaTelat =
        document.getElementById("denda_telat");

    const dendaTelatDisplay =
        document.getElementById("denda_telat_display");

    const dendaRusak =
        document.getElementById("denda_rusak");

    const dendaRusakDisplay =
        document.getElementById("denda_rusak_display");

    const totalDenda =
        document.getElementById("total_denda");

    const returnForm =
        document.getElementById("returnForm");


    /* =====================================
       TARIF DENDA
    ===================================== */

    const tarifTelatPerHari = 10000;

    const tarifKerusakan = {
        "Baik": 0,
        "Rusak Ringan": 50000,
        "Rusak Berat": 100000
    };


    /* =====================================
       FORMAT RUPIAH
    ===================================== */

    function formatRupiah(angka){

        return Number(angka).toLocaleString("id-ID");

    }


    /* =====================================
       HITUNG DENDA
    ===================================== */

    function hitungDenda(){

        let dendaTelatValue = 0;

        let dendaRusakValue = 0;


        /* =================================
           TRANSAKSI TERPILIH
        ================================= */

        const selectedOption =
            rentalSelect &&
            rentalSelect.selectedIndex >= 0
                ? rentalSelect.options[rentalSelect.selectedIndex]
                : null;


        const tanggalSeharusnya =
            selectedOption &&
            selectedOption.value
                ? selectedOption.dataset.returnDate
                : null;


        /* =================================
           DENDA TERLAMBAT
        ================================= */

        if(
            tanggalSeharusnya &&
            tanggalKembali &&
            tanggalKembali.value
        ){

            const tanggalJatuhTempo =
                new Date(
                    tanggalSeharusnya + "T00:00:00"
                );


            const tanggalAktual =
                new Date(
                    tanggalKembali.value + "T00:00:00"
                );


            const selisihWaktu =
                tanggalAktual -
                tanggalJatuhTempo;


            const jumlahHariTerlambat =
                Math.max(
                    0,
                    Math.floor(
                        selisihWaktu /
                        (1000 * 60 * 60 * 24)
                    )
                );


            dendaTelatValue =
                jumlahHariTerlambat *
                tarifTelatPerHari;

        }


        /* =================================
           DENDA KERUSAKAN
        ================================= */

        if(kondisi){

            dendaRusakValue =
                tarifKerusakan[kondisi.value] ?? 0;

        }


        /* =================================
           SIMPAN NILAI DATABASE
        ================================= */

        if(dendaTelat){

            dendaTelat.value =
                dendaTelatValue;

        }


        if(dendaRusak){

            dendaRusak.value =
                dendaRusakValue;

        }


        /* =================================
           TAMPILKAN RUPIAH
        ================================= */

        if(dendaTelatDisplay){

            dendaTelatDisplay.value =
                formatRupiah(dendaTelatValue);

        }


        if(dendaRusakDisplay){

            dendaRusakDisplay.value =
                formatRupiah(dendaRusakValue);

        }


        /* =================================
           TOTAL DENDA
        ================================= */

        const total =
            dendaTelatValue +
            dendaRusakValue;


        if(totalDenda){

            totalDenda.value =
                "Rp " +
                formatRupiah(total);

        }

    }


    /* =====================================
       EVENT
    ===================================== */

    if(rentalSelect){

        rentalSelect.addEventListener(
            "change",
            hitungDenda
        );

    }


    if(tanggalKembali){

        tanggalKembali.addEventListener(
            "change",
            hitungDenda
        );

    }


    if(kondisi){

        kondisi.addEventListener(
            "change",
            hitungDenda
        );

    }


    /* =====================================
       INITIAL
    ===================================== */

    hitungDenda();


    /* =====================================
       AUTO SCROLL
    ===================================== */

    const params =
        new URLSearchParams(
            window.location.search
        );


    if(params.has("rental_id")){

        setTimeout(function(){

            if(returnForm){

                returnForm.scrollIntoView({
                    behavior:"smooth",
                    block:"start"
                });

            }

        },300);

    }


    /* =====================================
       AUTO HIDE ALERT
    ===================================== */

    const alertBoxes =
        document.querySelectorAll(".alert");


    if(alertBoxes.length){

        setTimeout(function(){

            alertBoxes.forEach(function(alertBox){

                if(
                    typeof bootstrap !==
                    "undefined"
                ){

                    const bsAlert =
                        bootstrap.Alert
                        .getOrCreateInstance(
                            alertBox
                        );

                    bsAlert.close();

                }

            });

        },4000);

    }


    /* =====================================
       KONFIRMASI
    ===================================== */

    if(returnForm){

        returnForm.addEventListener(
            "submit",
            function(e){

                const konfirmasi =
                    confirm(
                        "Yakin ingin memproses pengembalian barang ini?"
                    );


                if(!konfirmasi){

                    e.preventDefault();

                }

            }
        );

    }

});

</script>

@endsection