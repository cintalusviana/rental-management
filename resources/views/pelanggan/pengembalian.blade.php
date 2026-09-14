@extends('pelanggan.layout')

@section('title', 'Pengembalian Saya')

@section('page-title', 'Pengembalian Saya')

@section('content')

<style>

/* =========================================================
   GOOGLE FONT
========================================================= */

@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');


/* =========================================================
   GLOBAL
========================================================= */

body {
    background: #F4F8FF;
    font-family: 'Inter', sans-serif;
}

.return-page {
    animation: fade .3s ease;
}

@keyframes fade {
    from {
        opacity: 0;
        transform: translateY(10px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}


/* =========================================================
   HEADER
========================================================= */

.page-header {
    margin-bottom: 26px;
}

.page-title h2 {
    font-size: 34px;
    font-weight: 800;
    color: #1E293B;
    margin: 0 0 6px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.page-title h2 i {
    width: 42px;
    height: 42px;
    border-radius: 12px;
    background: #DBEAFE;
    color: #2563EB;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 21px;
}

.page-title p {
    margin: 0;
    font-size: 14px;
    color: #64748B;
}


/* =========================================================
   SUMMARY
========================================================= */

.summary-wrapper {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 18px;
    margin-bottom: 24px;
}

.summary-card {
    background: #FFFFFF;
    border-radius: 18px;
    padding: 20px;
    display: flex;
    align-items: center;
    gap: 15px;
    box-shadow: 0 10px 30px rgba(15, 23, 42, .06);
    transition: .25s ease;
    border: 1px solid #F1F5F9;
}

.summary-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 14px 35px rgba(15, 23, 42, .09);
}


/* =========================================================
   SUMMARY ICON
========================================================= */

.summary-icon {
    width: 50px;
    height: 50px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 21px;
    flex-shrink: 0;
}


/* TOTAL */

.summary-icon.blue {
    background: #DBEAFE;
    color: #2563EB;
}


/* MENUNGGU */

.summary-icon.yellow {
    background: #FEF3C7;
    color: #D97706;
}


/* SELESAI */

.summary-icon.green {
    background: #DCFCE7;
    color: #16A34A;
}


.summary-content span {
    display: block;
    font-size: 12px;
    color: #64748B;
    margin-bottom: 4px;
}

.summary-content strong {
    display: block;
    font-size: 24px;
    font-weight: 800;
    color: #1E293B;
}


/* =========================================================
   MAIN CARD
========================================================= */

.card-custom {
    background: #FFFFFF;
    border: none;
    border-radius: 22px;
    box-shadow: 0 10px 30px rgba(15, 23, 42, .06);
    margin-bottom: 24px;
    overflow: hidden;
}

.card-body-custom {
    padding: 24px;
}


/* =========================================================
   SECTION TITLE
========================================================= */

.section-title {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 20px;
}


/* CARD KECIL ICON */

.section-title .icon {
    width: 44px;
    height: 44px;
    min-width: 44px;
    border-radius: 13px;
    background: #DBEAFE;
    color: #2563EB;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    box-shadow: 0 5px 14px rgba(37, 99, 235, .10);
}


/* ICON RIWAYAT */

.section-title.history .icon {
    background: #DBEAFE;
    color: #2563EB;
}


/* ICON PERMINTAAN */

.section-title.request .icon {
    background: #E0E7FF;
    color: #4F46E5;
}


/* ICON MENUNGGU */

.section-title.waiting .icon {
    background: #FEF3C7;
    color: #D97706;
}


.section-title h5 {
    margin: 0;
    font-size: 21px;
    font-weight: 800;
    color: #1E293B;
}

.section-subtitle {
    margin: 4px 0 0;
    font-size: 13px;
    color: #64748B;
}


/* =========================================================
   TABLE
========================================================= */

.table {
    margin: 0;
    width: 100%;
}

.table thead th {
    background: #F8FAFC;
    border: none;
    padding: 13px 14px;
    font-size: 11px;
    font-weight: 700;
    color: #64748B;
    text-transform: uppercase;
    white-space: nowrap;
}

.table tbody td {
    padding: 14px;
    font-size: 13px;
    color: #334155;
    vertical-align: middle;
    border-top: 1px solid #EEF2F7;
}

.table tbody tr {
    transition: .25s;
}

.table tbody tr:hover {
    background: #F8FBFF;
}

.table-responsive {
    overflow-x: auto;
}


/* =========================================================
   BADGE
========================================================= */

.badge-status {
    padding: 7px 13px;
    border-radius: 30px;
    font-size: 11px;
    font-weight: 700;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    white-space: nowrap;
}


/* SEDANG DISEWA */

.status-approved {
    background: #DCFCE7;
    color: #15803D;
}


/* MENUNGGU */

.status-request {
    background: #FEF3C7;
    color: #B45309;
}


/* SELESAI */

.status-completed {
    background: #DBEAFE;
    color: #1D4ED8;
}


/* DIBATALKAN */

.status-cancelled {
    background: #FEE2E2;
    color: #DC2626;
}


/* PENDING */

.status-pending {
    background: #E2E8F0;
    color: #475569;
}


/* =========================================================
   CONDITION
========================================================= */

.condition-good {
    background: #DCFCE7;
    color: #16A34A;
}

.condition-light {
    background: #FEF3C7;
    color: #D97706;
}

.condition-heavy {
    background: #FEE2E2;
    color: #DC2626;
}


/* =========================================================
   MONEY
========================================================= */

.money {
    font-weight: 700;
}

.money.active {
    color: #EF4444;
}


/* =========================================================
   REQUEST CARD
========================================================= */

.return-request {
    border: 1px solid #E2E8F0;
    border-radius: 18px;
    padding: 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 30px;
    margin-bottom: 16px;
    background: #FFFFFF;
    transition: .25s ease;
}

.return-request:last-child {
    margin-bottom: 0;
}

.return-request:hover {
    border-color: #BFDBFE;
    background: #FAFCFF;
    box-shadow: 0 6px 20px rgba(37, 99, 235, .06);
}

.request-info {
    flex: 1;
    min-width: 0;
}

.request-code {
    font-size: 20px;
    font-weight: 800;
    color: #2563EB;
    margin-bottom: 10px;
}

.request-detail {
    display: grid;
    grid-template-columns: max-content max-content;
    column-gap: 30px;
    row-gap: 7px;
    font-size: 13px;
    color: #334155;
}

.request-detail strong {
    font-weight: 600;
    color: #1E293B;
}

.request-products {
    margin-top: 13px;
    padding-top: 12px;
    border-top: 1px solid #F1F5F9;
}

.product-item {
    display: flex;
    align-items: center;
    gap: 7px;
    font-size: 13px;
    color: #334155;
    margin-bottom: 4px;
}

.product-item:last-child {
    margin-bottom: 0;
}

.product-item i {
    color: #2563EB;
    font-size: 17px;
}

.product-item small {
    color: #64748B;
}


/* =========================================================
   REQUEST ACTION
========================================================= */

.request-action {
    min-width: 230px;
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: 12px;
}

.waiting-badge {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 8px 14px;
    border-radius: 30px;
    background: #FEF3C7;
    color: #D97706;
    font-size: 12px;
    font-weight: 700;
    white-space: nowrap;
}

.process-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 10px 16px;
    border-radius: 10px;
    background: #2563EB;
    color: #FFFFFF;
    border: none;
    font-size: 13px;
    font-weight: 600;
    white-space: nowrap;
    transition: .2s;
}

.process-btn:hover {
    background: #1D4ED8;
    color: #FFFFFF;
    transform: translateY(-1px);
}


/* =========================================================
   BUTTON DETAIL
========================================================= */

.btn-detail {
    border-radius: 10px;
    font-size: 12px;
    font-weight: 600;
    padding: 8px 14px;
}


/* =========================================================
   EMPTY STATE
========================================================= */

.empty-state {
    text-align: center;
    padding: 50px 20px;
    color: #64748B;
}

.empty-state i {
    width: 58px;
    height: 58px;
    border-radius: 16px;
    background: #F1F5F9;
    color: #94A3B8;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
    margin-bottom: 14px;
}

.empty-state h5 {
    color: #334155;
    font-weight: 700;
    margin-bottom: 5px;
}

.empty-state p {
    margin: 0;
    font-size: 13px;
}


/* =========================================================
   MODAL
========================================================= */

.modal-content {
    overflow: hidden;
}

.modal-header {
    padding: 18px 22px;
}

.modal-title {
    font-weight: 700;
}

.modal-body {
    padding: 24px;
}

.modal-footer {
    padding: 16px 22px;
    background: #F8FAFC;
}


/* =========================================================
   DETAIL CARD MODAL
========================================================= */

.modal .card {
    border-radius: 16px !important;
}

.modal .card-body {
    padding: 20px;
}

.modal .card-header {
    padding: 14px 18px;
    border-bottom: 1px solid #E2E8F0;
}

.modal .table td {
    border: none;
    padding: 8px 6px;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 1000px) {

    .summary-wrapper {
        grid-template-columns: 1fr;
    }

    .return-request {
        flex-direction: column;
        align-items: stretch;
    }

    .request-action {
        min-width: 0;
        align-items: flex-start;
        width: 100%;
    }
}


@media (max-width: 768px) {

    .page-title h2 {
        font-size: 28px;
    }

    .page-title h2 i {
        width: 38px;
        height: 38px;
        font-size: 19px;
    }

    .card-body-custom {
        padding: 18px;
    }

    .request-detail {
        display: block;
    }

    .request-detail div {
        margin-bottom: 6px;
    }

    .process-btn {
        width: 100%;
    }

    .request-action {
        align-items: stretch;
    }

    .waiting-badge {
        justify-content: center;
    }

    .section-title h5 {
        font-size: 18px;
    }

    .section-title .icon {
        width: 40px;
        height: 40px;
        min-width: 40px;
        font-size: 18px;
    }
}

</style>


<div class="container-fluid return-page">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="page-header">

        <div class="page-title">

            <h2>
                <i class="bi bi-arrow-counterclockwise"></i>
                Pengembalian Saya
            </h2>

            <p>
                Lihat dan kelola proses pengembalian barang yang Anda sewa.
            </p>

        </div>

    </div>


    {{-- =====================================================
         HITUNG SUMMARY
    ====================================================== --}}

    @php

        /*
        |--------------------------------------------------------------------------
        | TOTAL PENGEMBALIAN
        |--------------------------------------------------------------------------
        | Hanya rental yang sudah memiliki data pengembalian.
        */

        $totalPengembalian = $rentals
            ->filter(function ($rental) {
                return $rental->pengembalian;
            })
            ->count();


        /*
        |--------------------------------------------------------------------------
        | MENUNGGU KONFIRMASI
        |--------------------------------------------------------------------------
        */

        $menungguKonfirmasi = $rentals
            ->where('status', 'return_request')
            ->count();


        /*
        |--------------------------------------------------------------------------
        | PENGEMBALIAN SELESAI
        |--------------------------------------------------------------------------
        */

        $pengembalianSelesai = $rentals
            ->where('status', 'completed')
            ->count();

    @endphp


    {{-- =====================================================
         SUMMARY CARDS
    ====================================================== --}}

    <div class="summary-wrapper">


        {{-- TOTAL PENGEMBALIAN --}}

        <div class="summary-card">

            <div class="summary-icon blue">

                {{-- ICON TOTAL PENGEMBALIAN DIUBAH --}}

                <i class="bi bi-box-arrow-in-down"></i>

            </div>

            <div class="summary-content">

                <span>
                    Total Pengembalian
                </span>

                <strong>
                    {{ $totalPengembalian }}
                </strong>

            </div>

        </div>


        {{-- MENUNGGU KONFIRMASI --}}

        <div class="summary-card">

            <div class="summary-icon yellow">

                <i class="bi bi-clock-history"></i>

            </div>

            <div class="summary-content">

                <span>
                    Menunggu Konfirmasi
                </span>

                <strong>
                    {{ $menungguKonfirmasi }}
                </strong>

            </div>

        </div>


        {{-- PENGEMBALIAN SELESAI --}}

        <div class="summary-card">

            <div class="summary-icon green">

                <i class="bi bi-check-circle"></i>

            </div>

            <div class="summary-content">

                <span>
                    Pengembalian Selesai
                </span>

                <strong>
                    {{ $pengembalianSelesai }}
                </strong>

            </div>

        </div>

    </div>


    {{-- =====================================================
         RIWAYAT PENGEMBALIAN
    ====================================================== --}}

    <div class="card card-custom">

        <div class="card-body-custom">

            <div class="section-title history">

                {{-- CARD KECIL RIWAYAT --}}

                <div class="icon">

                    <i class="bi bi-clock-history"></i>

                </div>

                <div>

                    <h5>
                        Riwayat Pengembalian
                    </h5>

                    <p class="section-subtitle">
                        Riwayat pengembalian barang dari transaksi Anda.
                    </p>

                </div>

            </div>


            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>

                        <tr>

                            <th>No Transaksi</th>
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

                    @php
                        $riwayatAda = false;
                    @endphp


                    @foreach($rentals as $rental)

                        @if($rental->pengembalian)

                            @php

                                $riwayatAda = true;

                                $item = $rental->pengembalian;

                            @endphp


                            <tr>


                                {{-- KODE RENTAL --}}

                                <td>

                                    <span class="fw-bold text-primary">

                                        {{ $rental->rental_code }}

                                    </span>

                                </td>


                                {{-- BARANG --}}

                                <td>

                                    @foreach($rental->details as $detail)

                                        <div class="mb-1">

                                            <span class="fw-semibold">

                                                {{ $detail->product->name ?? '-' }}

                                            </span>

                                            <small class="text-muted">

                                                ({{ $detail->quantity }}x)

                                            </small>

                                        </div>

                                    @endforeach

                                </td>


                                {{-- TANGGAL --}}

                                <td>

                                    {{ \Carbon\Carbon::parse($item->tanggal_kembali)->format('d M Y') }}

                                </td>


                                {{-- KONDISI --}}

                                <td>

                                    @if($item->kondisi == 'Baik')

                                        <span class="badge-status condition-good">

                                            <i class="bi bi-check-circle-fill"></i>

                                            Baik

                                        </span>

                                    @elseif($item->kondisi == 'Rusak Ringan')

                                        <span class="badge-status condition-light">

                                            <i class="bi bi-exclamation-circle-fill"></i>

                                            Rusak Ringan

                                        </span>

                                    @else

                                        <span class="badge-status condition-heavy">

                                            <i class="bi bi-x-circle-fill"></i>

                                            Rusak Berat

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

                                        <span class="text-muted">
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

                                        <span class="text-muted">
                                            Rp -
                                        </span>

                                    @endif

                                </td>


                                {{-- STATUS --}}

                                <td>

                                    @if($rental->status == 'completed')

                                        <span class="badge-status status-completed">

                                            <i class="bi bi-check-circle-fill"></i>

                                            Selesai

                                        </span>

                                    @elseif($rental->status == 'return_request')

                                        <span class="badge-status status-request">

                                            <i class="bi bi-clock-fill"></i>

                                            Menunggu

                                        </span>

                                    @else

                                        <span class="badge-status status-approved">

                                            <i class="bi bi-info-circle-fill"></i>

                                            {{ ucfirst($item->status ?? 'Diproses') }}

                                        </span>

                                    @endif

                                </td>


                                {{-- AKSI --}}

                                <td>

                                    <button
                                        type="button"
                                        class="btn btn-outline-primary btn-detail"
                                        data-bs-toggle="modal"
                                        data-bs-target="#detailReturn{{ $rental->id }}"
                                    >

                                        <i class="bi bi-eye me-1"></i>

                                        Detail

                                    </button>

                                </td>

                            </tr>

                        @endif

                    @endforeach


                    {{-- EMPTY STATE --}}

                    @if(!$riwayatAda)

                        <tr>

                            <td colspan="8">

                                <div class="empty-state">

                                    <i class="bi bi-inbox"></i>

                                    <h5>
                                        Belum Ada Riwayat Pengembalian
                                    </h5>

                                    <p>
                                        Riwayat pengembalian akan muncul setelah barang selesai diproses.
                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endif

                    </tbody>

                </table>

            </div>

        </div>

    </div>


    {{-- =====================================================
         PERMINTAAN PENGEMBALIAN
    ====================================================== --}}

    <div class="card card-custom">

        <div class="card-body-custom">


            <div class="section-title request">

                {{-- CARD KECIL PERMINTAAN --}}

                <div class="icon">

                    <i class="bi bi-arrow-return-left"></i>

                </div>

                <div>

                    <h5>
                        Permintaan Pengembalian
                    </h5>

                    <p class="section-subtitle">
                        Penyewaan yang masih dapat diajukan untuk pengembalian.
                    </p>

                </div>

            </div>


            @php
                $adaPermintaan = false;
            @endphp


            @foreach($rentals as $rental)

                @if($rental->status == 'approved')

                    @php
                        $adaPermintaan = true;
                    @endphp


                    <div class="return-request">


                        <div class="request-info">


                            <div class="request-code">

                                {{ $rental->rental_code }}

                            </div>


                            <div class="request-detail">

                                <div>

                                    <strong>
                                        Tanggal Sewa
                                    </strong>

                                    <span>:</span>

                                    {{ \Carbon\Carbon::parse($rental->rental_date)->format('d M Y') }}

                                </div>


                                <div>

                                    <strong>
                                        Tanggal Kembali
                                    </strong>

                                    <span>:</span>

                                    {{ \Carbon\Carbon::parse($rental->return_date)->format('d M Y') }}

                                </div>

                            </div>


                            <div class="request-products">

                                @foreach($rental->details as $detail)

                                    <div class="product-item">

                                        <i class="bi bi-box-seam"></i>

                                        <span>
                                            {{ $detail->product->name ?? '-' }}
                                        </span>

                                        <small>
                                            ({{ $detail->quantity }}x)
                                        </small>

                                    </div>

                                @endforeach

                            </div>

                        </div>


                        <div class="request-action">


                            <span class="badge-status status-approved">

                                <i class="bi bi-play-circle-fill"></i>

                                Sedang Disewa

                            </span>


                            <form
                                action="{{ route('pelanggan.return', $rental->id) }}"
                                method="POST"
                                class="return-request-form"
                            >

                                @csrf

                                <button
                                    type="submit"
                                    class="process-btn"
                                >

                                    <i class="bi bi-arrow-return-left"></i>

                                    Ajukan Pengembalian

                                </button>

                            </form>

                        </div>

                    </div>

                @endif

            @endforeach


            @if(!$adaPermintaan)

                <div class="empty-state">

                    <i class="bi bi-check-circle"></i>

                    <h5>
                        Tidak Ada Permintaan Pengembalian
                    </h5>

                    <p>
                        Saat ini tidak ada barang yang dapat diajukan untuk pengembalian.
                    </p>

                </div>

            @endif

        </div>

    </div>


    {{-- =====================================================
         MENUNGGU KONFIRMASI ADMIN
    ====================================================== --}}

    @php

        $adaMenunggu = $rentals
            ->where('status', 'return_request')
            ->count() > 0;

    @endphp


    @if($adaMenunggu)

        <div class="card card-custom">

            <div class="card-body-custom">


                <div class="section-title waiting">

                    {{-- CARD KECIL MENUNGGU --}}

                    <div class="icon">

                        <i class="bi bi-hourglass-split"></i>

                    </div>

                    <div>

                        <h5>
                            Menunggu Konfirmasi Admin
                        </h5>

                        <p class="section-subtitle">
                            Permintaan pengembalian Anda sedang diperiksa oleh admin.
                        </p>

                    </div>

                </div>


                @foreach($rentals as $rental)

                    @if($rental->status == 'return_request')


                        <div class="return-request">


                            <div class="request-info">


                                <div class="request-code">

                                    {{ $rental->rental_code }}

                                </div>


                                <div class="request-detail">

                                    <div>

                                        <strong>
                                            Tanggal Sewa
                                        </strong>

                                        <span>:</span>

                                        {{ \Carbon\Carbon::parse($rental->rental_date)->format('d M Y') }}

                                    </div>


                                    <div>

                                        <strong>
                                            Tanggal Kembali
                                        </strong>

                                        <span>:</span>

                                        {{ \Carbon\Carbon::parse($rental->return_date)->format('d M Y') }}

                                    </div>

                                </div>


                                <div class="request-products">

                                    @foreach($rental->details as $detail)

                                        <div class="product-item">

                                            <i class="bi bi-box-seam"></i>

                                            <span>
                                                {{ $detail->product->name ?? '-' }}
                                            </span>

                                            <small>
                                                ({{ $detail->quantity }}x)
                                            </small>

                                        </div>

                                    @endforeach

                                </div>

                            </div>


                            <div class="request-action">


                                <span class="waiting-badge">

                                    <i class="bi bi-clock-fill"></i>

                                    Menunggu Konfirmasi Admin

                                </span>


                                <button
                                    type="button"
                                    class="btn btn-secondary btn-detail"
                                    disabled
                                >

                                    <i class="bi bi-hourglass-split me-1"></i>

                                    Sedang Diproses

                                </button>

                            </div>


                        </div>

                    @endif

                @endforeach

            </div>

        </div>

    @endif


    {{-- =====================================================
         MODAL DETAIL PENGEMBALIAN
    ====================================================== --}}

    @foreach($rentals as $rental)

        @if($rental->pengembalian)

            @php

                $item = $rental->pengembalian;

                $totalDenda =
                    ($item->denda_telat ?? 0) +
                    ($item->denda_rusak ?? 0);

            @endphp


            <div
                class="modal fade"
                id="detailReturn{{ $rental->id }}"
                tabindex="-1"
                aria-hidden="true"
            >

                <div class="modal-dialog modal-xl modal-dialog-scrollable">

                    <div class="modal-content border-0 shadow-lg rounded-4">


                        {{-- HEADER MODAL --}}

                        <div class="modal-header bg-primary text-white">

                            <h5 class="modal-title">

                                <i class="bi bi-receipt-cutoff me-2"></i>

                                Detail Pengembalian

                            </h5>

                            <button
                                type="button"
                                class="btn-close btn-close-white"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                            ></button>

                        </div>


                        {{-- BODY MODAL --}}

                        <div class="modal-body">


                            {{-- INFORMASI RENTAL + PENGEMBALIAN --}}

                            <div class="row g-4 mb-4">


                                {{-- INFORMASI RENTAL --}}

                                <div class="col-md-6">

                                    <div class="card border-0 shadow-sm h-100">

                                        <div class="card-body">

                                            <h6 class="fw-bold mb-3">

                                                <i class="bi bi-receipt me-2 text-primary"></i>

                                                Informasi Rental

                                            </h6>


                                            <table class="table table-borderless mb-0">

                                                <tr>

                                                    <td width="40%">
                                                        Kode Rental
                                                    </td>

                                                    <td>

                                                        <strong>
                                                            {{ $rental->rental_code }}
                                                        </strong>

                                                    </td>

                                                </tr>


                                                <tr>

                                                    <td>
                                                        Tanggal Sewa
                                                    </td>

                                                    <td>

                                                        {{ \Carbon\Carbon::parse($rental->rental_date)->format('d F Y') }}

                                                    </td>

                                                </tr>


                                                <tr>

                                                    <td>
                                                        Tanggal Kembali
                                                    </td>

                                                    <td>

                                                        {{ \Carbon\Carbon::parse($rental->return_date)->format('d F Y') }}

                                                    </td>

                                                </tr>


                                                <tr>

                                                    <td>
                                                        Total Sewa
                                                    </td>

                                                    <td class="fw-bold text-primary">

                                                        Rp {{ number_format($rental->total_price, 0, ',', '.') }}

                                                    </td>

                                                </tr>

                                            </table>

                                        </div>

                                    </div>

                                </div>


                                {{-- INFORMASI PENGEMBALIAN --}}

                                <div class="col-md-6">

                                    <div class="card border-0 shadow-sm h-100">

                                        <div class="card-body">

                                            <h6 class="fw-bold mb-3">

                                                <i class="bi bi-arrow-counterclockwise me-2 text-primary"></i>

                                                Informasi Pengembalian

                                            </h6>


                                            <table class="table table-borderless mb-0">

                                                <tr>

                                                    <td width="40%">
                                                        Tanggal
                                                    </td>

                                                    <td>

                                                        {{ \Carbon\Carbon::parse($item->tanggal_kembali)->format('d F Y') }}

                                                    </td>

                                                </tr>


                                                <tr>

                                                    <td>
                                                        Kondisi
                                                    </td>

                                                    <td>

                                                        @if($item->kondisi == 'Baik')

                                                            <span class="badge-status condition-good">

                                                                <i class="bi bi-check-circle-fill"></i>

                                                                Baik

                                                            </span>

                                                        @elseif($item->kondisi == 'Rusak Ringan')

                                                            <span class="badge-status condition-light">

                                                                <i class="bi bi-exclamation-circle-fill"></i>

                                                                Rusak Ringan

                                                            </span>

                                                        @else

                                                            <span class="badge-status condition-heavy">

                                                                <i class="bi bi-x-circle-fill"></i>

                                                                Rusak Berat

                                                            </span>

                                                        @endif

                                                    </td>

                                                </tr>


                                                <tr>

                                                    <td>
                                                        Denda Telat
                                                    </td>

                                                    <td class="fw-bold text-danger">

                                                        Rp {{ number_format($item->denda_telat ?? 0, 0, ',', '.') }}

                                                    </td>

                                                </tr>


                                                <tr>

                                                    <td>
                                                        Denda Rusak
                                                    </td>

                                                    <td class="fw-bold text-danger">

                                                        Rp {{ number_format($item->denda_rusak ?? 0, 0, ',', '.') }}

                                                    </td>

                                                </tr>

                                            </table>

                                        </div>

                                    </div>

                                </div>

                            </div>


                            {{-- DAFTAR BARANG --}}

                            <div class="card border-0 shadow-sm mb-4">

                                <div class="card-header bg-light">

                                    <strong>

                                        <i class="bi bi-box-seam me-2"></i>

                                        Daftar Barang

                                    </strong>

                                </div>


                                <div class="table-responsive">

                                    <table class="table align-middle mb-0">

                                        <thead class="table-light">

                                            <tr>

                                                <th>Foto</th>
                                                <th>Nama Barang</th>
                                                <th>Harga/Hari</th>
                                                <th>Jumlah</th>
                                                <th>Subtotal</th>

                                            </tr>

                                        </thead>


                                        <tbody>

                                        @foreach($rental->details as $detail)

                                            <tr>


                                                {{-- FOTO --}}

                                                <td width="90">

                                                    @if($detail->product && $detail->product->image)

                                                        <img
                                                            src="{{ asset('uploads/products/' . $detail->product->image) }}"
                                                            style="width:65px;height:65px;object-fit:cover;"
                                                            class="rounded-3"
                                                            alt="{{ $detail->product->name ?? 'Produk' }}"
                                                        >

                                                    @else

                                                        <div
                                                            style="width:65px;height:65px;"
                                                            class="bg-light rounded-3 d-flex align-items-center justify-content-center"
                                                        >

                                                            <i class="bi bi-image text-secondary"></i>

                                                        </div>

                                                    @endif

                                                </td>


                                                {{-- NAMA --}}

                                                <td>

                                                    <strong>

                                                        {{ $detail->product->name ?? '-' }}

                                                    </strong>

                                                </td>


                                                {{-- HARGA --}}

                                                <td>

                                                    Rp {{ number_format($detail->price, 0, ',', '.') }}

                                                </td>


                                                {{-- JUMLAH --}}

                                                <td>

                                                    {{ $detail->quantity }}

                                                </td>


                                                {{-- SUBTOTAL --}}

                                                <td>

                                                    <strong>

                                                        Rp {{ number_format($detail->subtotal, 0, ',', '.') }}

                                                    </strong>

                                                </td>


                                            </tr>

                                        @endforeach

                                        </tbody>

                                    </table>

                                </div>

                            </div>


                            {{-- DENDA --}}

                            @if($totalDenda > 0)

                                <div class="alert alert-danger border-0 rounded-4">

                                    <div class="d-flex align-items-start gap-3">

                                        <i class="bi bi-exclamation-triangle-fill fs-4"></i>

                                        <div>

                                            <h6 class="fw-bold mb-1">
                                                Denda Pengembalian
                                            </h6>


                                            <p class="mb-1">

                                                Denda keterlambatan :

                                                <strong>

                                                    Rp {{ number_format($item->denda_telat ?? 0, 0, ',', '.') }}

                                                </strong>

                                            </p>


                                            <p class="mb-1">

                                                Denda kerusakan :

                                                <strong>

                                                    Rp {{ number_format($item->denda_rusak ?? 0, 0, ',', '.') }}

                                                </strong>

                                            </p>


                                            <hr>


                                            <p class="mb-0">

                                                Total denda :

                                                <strong>

                                                    Rp {{ number_format($totalDenda, 0, ',', '.') }}

                                                </strong>

                                            </p>

                                        </div>

                                    </div>

                                </div>

                            @else

                                <div class="alert alert-success border-0 rounded-4">

                                    <i class="bi bi-check-circle-fill me-2"></i>

                                    Tidak ada denda pada pengembalian ini.

                                </div>

                            @endif


                        </div>


                        {{-- FOOTER MODAL --}}

                        <div class="modal-footer">

                            <button
                                type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal"
                            >

                                <i class="bi bi-x-lg me-1"></i>

                                Tutup

                            </button>

                        </div>


                    </div>

                </div>

            </div>

        @endif

    @endforeach


    {{-- =====================================================
         FLASH MESSAGE DATA
         Dibuat di HTML supaya JavaScript tidak membaca
         @if Blade sebagai syntax JavaScript.
    ====================================================== --}}

    <div
        id="returnFlashData"
        data-success="{{ session('success') }}"
        data-error="{{ session('error') }}"
        style="display:none;"
    ></div>


</div>


{{-- =========================================================
     JAVASCRIPT
========================================================= --}}

<script>

document.addEventListener('DOMContentLoaded', function () {


    /* =====================================================
       KONFIRMASI PENGAJUAN PENGEMBALIAN
    ===================================================== */

    const forms = document.querySelectorAll('.return-request-form');


    forms.forEach(function (form) {

        form.addEventListener('submit', function (e) {

            e.preventDefault();


            Swal.fire({

                title: 'Ajukan Pengembalian?',

                text: 'Permintaan pengembalian akan dikirim kepada admin untuk diproses.',

                icon: 'question',

                showCancelButton: true,

                confirmButtonColor: '#2563EB',

                cancelButtonColor: '#64748B',

                confirmButtonText: 'Ya, Ajukan',

                cancelButtonText: 'Batal'

            }).then(function (result) {

                if (result.isConfirmed) {

                    form.submit();

                }

            });

        });

    });


    /* =====================================================
       FLASH MESSAGE
    ===================================================== */

    const flashData = document.getElementById('returnFlashData');


    if (flashData) {

        const successMessage =
            flashData.getAttribute('data-success');


        const errorMessage =
            flashData.getAttribute('data-error');


        /* =================================================
           SUCCESS
        ================================================= */

        if (successMessage) {

            Swal.fire({

                icon: 'success',

                title: 'Berhasil',

                text: successMessage,

                timer: 2500,

                showConfirmButton: false

            });

        }


        /* =================================================
           ERROR
        ================================================= */

        if (errorMessage) {

            Swal.fire({

                icon: 'error',

                title: 'Gagal',

                text: errorMessage

            });

        }

    }

});

</script>

@endsection