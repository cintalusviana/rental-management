```blade
@extends('layout.app')

@section('content')

<div class="container-fluid dashboard-container">

    {{-- =====================================================
         HEADER
    ====================================================== --}}
    <div class="dashboard-header">

        <div class="dashboard-left">


            <h1>
                <i class="bi bi-grid-1x2-fill"></i>
                <span>Dashboard Rental Management</span>
            </h1>

            <p>
                Selamat datang kembali, Administrator 👋
            </p>

        </div>


        <div class="dashboard-right">

            {{-- =================================================
                 PILIH BULAN
            ================================================== --}}
            <div class="month-picker-wrapper">

                <button
                    type="button"
                    class="btn-month"
                    id="monthPickerBtn">

                    <i class="bi bi-calendar3"></i>

                    <span id="monthPickerText">
                        Bulan Ini
                    </span>

                    <i class="bi bi-chevron-down month-chevron"></i>

                </button>


                <div
                    class="month-picker-menu"
                    id="monthPickerMenu">

                    <div class="month-picker-title">
                        <i class="bi bi-calendar3"></i>
                        Pilih Bulan
                    </div>

                    <input
                        type="month"
                        id="monthPickerInput"
                        class="month-input"
                        value="{{ request('month', now()->format('Y-m')) }}">

                    <button
                        type="button"
                        class="btn-month-apply"
                        id="applyMonthBtn">

                        <i class="bi bi-check-lg"></i>
                        Gunakan Bulan Ini

                    </button>

                </div>

            </div>


            {{-- =================================================
                 EXPORT
            ================================================== --}}
            <div class="export-dropdown">

                <button
                    type="button"
                    class="btn-download"
                    id="exportDropdownBtn">

                    <i class="bi bi-download"></i>

                    <span>
                        Export
                    </span>

                    <i class="bi bi-chevron-down export-chevron"></i>

                </button>


                <div
                    class="export-menu"
                    id="exportMenu">

                    {{-- EXPORT EXCEL --}}
                    <a
                        href="{{ route('dashboard.exportExcel', ['month' => request('month', now()->format('Y-m'))]) }}"
                        class="export-item"
                        id="exportExcelLink">

                        <div class="export-item-icon excel-icon">
                            <i class="bi bi-file-earmark-excel-fill"></i>
                        </div>

                        <div class="export-item-content">

                            <strong>
                                Export Excel
                            </strong>

                            <span id="excelExportText">
                                Download data dashboard
                            </span>

                        </div>

                    </a>


                    {{-- EXPORT PDF --}}
                    <a
                        href="{{ route('dashboard.exportPdf', ['month' => request('month', now()->format('Y-m'))]) }}"
                        class="export-item"
                        id="exportPdfLink"
                        target="_blank">

                        <div class="export-item-icon pdf-icon">
                            <i class="bi bi-file-earmark-pdf-fill"></i>
                        </div>

                        <div class="export-item-content">

                            <strong>
                                Export PDF
                            </strong>

                            <span id="pdfExportText">
                                Cetak laporan dashboard
                            </span>

                        </div>

                    </a>

                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
         SUMMARY CARD
    ====================================================== --}}
    <div class="row summary-row">

        {{-- TOTAL BARANG --}}
        <div class="col-xl-4 col-md-6">

            <div class="summary-card">

                <div class="summary-top">

                    <div class="summary-content">

                        <div class="summary-title">
                            TOTAL BARANG
                        </div>

                        <h2>
                            {{ $totalProducts }}
                        </h2>

                        <p>
                            Semua alat rental
                        </p>

                    </div>

                    <div class="summary-icon blue">
                        <i class="bi bi-box-seam-fill"></i>
                    </div>

                </div>

                <div class="summary-footer success">
                    <i class="bi bi-arrow-up"></i>
                    Data tersedia
                </div>

            </div>

        </div>


        {{-- CUSTOMER --}}
        <div class="col-xl-4 col-md-6">

            <div class="summary-card">

                <div class="summary-top">

                    <div class="summary-content">

                        <div class="summary-title">
                            CUSTOMER
                        </div>

                        <h2>
                            {{ $totalCustomers }}
                        </h2>

                        <p>
                            Pelanggan terdaftar
                        </p>

                    </div>

                    <div class="summary-icon green">
                        <i class="bi bi-people-fill"></i>
                    </div>

                </div>

                <div class="summary-footer success">
                    <i class="bi bi-person-check"></i>
                    Customer aktif
                </div>

            </div>

        </div>


        {{-- TOTAL RENTAL --}}
        <div class="col-xl-4 col-md-6">

            <div class="summary-card">

                <div class="summary-top">

                    <div class="summary-content">

                        <div class="summary-title">
                            TOTAL RENTAL
                        </div>

                        <h2>
                            {{ $totalRentals }}
                        </h2>

                        <p>
                            Transaksi penyewaan
                        </p>

                    </div>

                    <div class="summary-icon orange">
                        <i class="bi bi-calendar-check-fill"></i>
                    </div>

                </div>

                <div class="summary-footer">
                    <i class="bi bi-clock-history"></i>
                    Semua transaksi
                </div>

            </div>

        </div>


        {{-- KATEGORI --}}
        <div class="col-xl-4 col-md-6">

            <div class="summary-card">

                <div class="summary-top">

                    <div class="summary-content">

                        <div class="summary-title">
                            KATEGORI
                        </div>

                        <h2>
                            {{ $totalCategories ?? 0 }}
                        </h2>

                        <p>
                            Jenis barang
                        </p>

                    </div>

                    <div class="summary-icon purple">
                        <i class="bi bi-tags-fill"></i>
                    </div>

                </div>

                <div class="summary-footer">
                    <i class="bi bi-grid"></i>
                    Kategori tersedia
                </div>

            </div>

        </div>


        {{-- BARANG TERSEDIA --}}
        <div class="col-xl-4 col-md-6">

            <div class="summary-card">

                <div class="summary-top">

                    <div class="summary-content">

                        <div class="summary-title">
                            BARANG TERSEDIA
                        </div>

                        <h2>
                            {{ $availableProducts ?? 0 }}
                        </h2>

                        <p>
                            Siap disewa
                        </p>

                    </div>

                    <div class="summary-icon cyan">
                        <i class="bi bi-check-circle-fill"></i>
                    </div>

                </div>

                <div class="summary-footer success">
                    <i class="bi bi-box"></i>
                    Stock tersedia
                </div>

            </div>

        </div>


        {{-- PENDAPATAN --}}
        <div class="col-xl-4 col-md-6">

            <div class="summary-card">

                <div class="summary-top">

                    <div class="summary-content">

                        <div class="summary-title">
                            PENDAPATAN
                        </div>

                        <h2>
                            Rp {{ number_format($totalIncome ?? 0, 0, ',', '.') }}
                        </h2>

                        <p>
                            Total pembayaran
                        </p>

                    </div>

                    <div class="summary-icon pink">
                        <i class="bi bi-wallet-fill"></i>
                    </div>

                </div>

                <div class="summary-footer success">
                    <i class="bi bi-graph-up"></i>
                    Pendapatan
                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
         RENTAL + LOW STOCK
    ====================================================== --}}
    <div class="row dashboard-bottom-row">

        {{-- RENTAL TERBARU --}}
        <div class="col-xl-8">

            <div class="dashboard-card rental-card">

                <div class="rental-header">

                    <div class="dashboard-card-title">
                        Rental Terbaru
                    </div>

                    <a
                        href="{{ route('rentals.index') }}"
                        class="view-all-link">

                        Lihat Semua
                        <i class="bi bi-arrow-right"></i>

                    </a>

                </div>


                <div class="table-responsive rental-table-wrapper">

                    <table class="table rental-table">

                        <thead>

                            <tr>
                                <th>Kode</th>
                                <th>Customer</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                            </tr>

                        </thead>


                        <tbody>

                        @forelse($recentRentals as $rental)

                            <tr>

                                <td>
                                    <span class="rental-code">
                                        {{ $rental->rental_code }}
                                    </span>
                                </td>


                                <td>

                                    <div class="customer-name">

                                        <div class="customer-mini-icon">
                                            <i class="bi bi-person-fill"></i>
                                        </div>

                                        <span>
                                            {{ $rental->customer->name ?? '-' }}
                                        </span>

                                    </div>

                                </td>


                                <td>

                                    <span class="rental-date">
                                        {{ \Carbon\Carbon::parse($rental->rental_date)->format('Y-m-d') }}
                                    </span>

                                </td>


                                <td>

                                    @if($rental->status === 'pending')

                                        <span class="status-badge waiting">
                                            Menunggu
                                        </span>

                                    @elseif($rental->status === 'approved')

                                        <span class="status-badge approved">
                                            Disetujui
                                        </span>

                                    @elseif($rental->status === 'completed')

                                        <span class="status-badge completed">
                                            Selesai
                                        </span>

                                    @elseif($rental->status === 'cancelled')

                                        <span class="status-badge cancelled">
                                            Dibatalkan
                                        </span>

                                    @else

                                        <span class="status-badge">
                                            {{ $rental->status }}
                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="4"
                                    class="empty-rental">

                                    <i class="bi bi-inbox"></i>

                                    <span>
                                        Belum ada rental
                                    </span>

                                </td>

                            </tr>

                        @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>


        {{-- STOK HAMPIR HABIS --}}
        <div class="col-xl-4">

            <div class="dashboard-card low-stock-card">

                <div class="low-stock-header">

                    <div>

                        <div class="dashboard-card-title">
                            Stok Hampir Habis
                        </div>

                        <p>
                            Perlu segera diperhatikan
                        </p>

                    </div>


                    <div class="stock-header-icon">
                        <i class="bi bi-box-seam"></i>
                    </div>

                </div>


                <div class="low-stock-list">

                @forelse(collect($lowStock ?? [])->take(4) as $item)

                    <div class="low-stock-item">

                        <div class="stock-product-icon">
                            <i class="bi bi-box-seam"></i>
                        </div>


                        <div class="stock-product-info">

                            <div class="stock-product-top">

                                <strong>
                                    {{ $item->name }}
                                </strong>

                                <span class="stock-number">
                                    {{ $item->stock }}
                                </span>

                            </div>


                            <div class="stock-product-bottom">

                                <span>
                                    Stok tersedia
                                </span>


                                @if($item->stock <= 0)

                                    <span class="stock-status empty">
                                        Habis
                                    </span>

                                @elseif($item->stock == 1)

                                    <span class="stock-status critical">
                                        Sangat sedikit
                                    </span>

                                @else

                                    <span class="stock-status warning">
                                        Terbatas
                                    </span>

                                @endif

                            </div>


                            <div class="stock-progress">

                                @php

                                    $stock = $item->stock ?? 0;

                                    if($stock <= 0) {

                                        $percentage = 5;

                                    } elseif($stock == 1) {

                                        $percentage = 20;

                                    } elseif($stock == 2) {

                                        $percentage = 40;

                                    } elseif($stock == 3) {

                                        $percentage = 60;

                                    } else {

                                        $percentage = 75;

                                    }

                                @endphp


                                <div
                                    class="stock-progress-bar"
                                    style="width: {{ $percentage }}%;">
                                </div>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="stock-empty">

                        <div class="stock-empty-icon">
                            <i class="bi bi-check-lg"></i>
                        </div>

                        <strong>
                            Semua stok aman
                        </strong>

                        <span>
                            Tidak ada barang yang hampir habis.
                        </span>

                    </div>

                @endforelse

                </div>


                @if(count($lowStock ?? []) > 0)

                    <a
                        href="{{ route('products.index') }}"
                        class="stock-footer-link">

                        Kelola stok barang

                        <i class="bi bi-arrow-right"></i>

                    </a>

                @endif

            </div>

        </div>

    </div>

</div>


{{-- =========================================================
     STYLE DASHBOARD
========================================================= --}}
<style>

@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');


/* =========================================================
   GLOBAL
========================================================= */

html,
body {
    width: 100%;
    max-width: 100%;
    overflow-x: hidden;
}

*,
*::before,
*::after {
    box-sizing: border-box;
}

.dashboard-container {
    width: 100%;
    max-width: 100%;
    overflow-x: hidden;
    font-family: 'Inter', sans-serif;
}

.dashboard-container *,
.dashboard-container *::before,
.dashboard-container *::after {
    font-family: 'Inter', sans-serif;
}


/* =========================================================
   HEADER
========================================================= */

.dashboard-header {
    width: 100%;

    display: flex;
    align-items: flex-start;
    justify-content: space-between;

    gap: 25px;

    margin-bottom: 20px;
}

.dashboard-left {
    min-width: 0;
}

.breadcrumb-dashboard {
    display: flex;
    align-items: center;

    color: #64748b;

    font-size: 12px;
    font-weight: 500;

    margin-bottom: 7px;
}

.dashboard-left h1 {
    margin: 0 0 5px;

    color: #172033;

    font-size: 27px;
    line-height: 1.3;

    font-weight: 800;

    letter-spacing: -.5px;

    display: flex;
    align-items: center;

    gap: 9px;
}

.dashboard-left h1 i {
    color: #2563eb;

    font-size: 25px;

    line-height: 1;

    flex-shrink: 0;
}

.dashboard-left p {
    margin: 0;

    color: #64748b;

    font-size: 13px;
}


/* =========================================================
   HEADER RIGHT
========================================================= */

.dashboard-right {
    display: flex;
    align-items: center;
    justify-content: flex-end;

    gap: 9px;

    flex-shrink: 0;
}

.month-picker-wrapper,
.export-dropdown {
    position: relative;
    display: inline-block;
}


/* =========================================================
   MONTH BUTTON
========================================================= */

.btn-month {
    display: inline-flex;
    align-items: center;
    justify-content: center;

    gap: 7px;

    height: 40px;

    padding: 0 14px;

    background: #ffffff;
    color: #475569;

    border: 1px solid #e2e8f0;

    border-radius: 10px;

    font-size: 12px;
    font-weight: 600;

    cursor: pointer;

    transition: all .2s ease;
}

.btn-month:hover {
    border-color: #cbd5e1;
    background: #f8fafc;
}

.btn-month i:first-child {
    color: #2563eb;
    font-size: 15px;
}

.month-chevron {
    font-size: 9px !important;

    margin-left: 2px;

    transition: transform .2s ease;
}

.month-picker-wrapper.active .month-chevron {
    transform: rotate(180deg);
}


/* =========================================================
   MONTH MENU
========================================================= */

.month-picker-menu {
    position: absolute;

    top: calc(100% + 8px);
    left: 0;

    width: 235px;

    padding: 12px;

    background: #ffffff;

    border: 1px solid #e2e8f0;
    border-radius: 12px;

    box-shadow:
        0 15px 35px rgba(15,23,42,.12),
        0 3px 8px rgba(15,23,42,.05);

    opacity: 0;
    visibility: hidden;

    transform: translateY(-6px);

    transition:
        opacity .18s ease,
        transform .18s ease,
        visibility .18s ease;

    z-index: 1100;
}

.month-picker-wrapper.active .month-picker-menu {
    opacity: 1;
    visibility: visible;

    transform: translateY(0);
}

.month-picker-title {
    display: flex;
    align-items: center;

    gap: 7px;

    margin-bottom: 9px;

    color: #172033;

    font-size: 12px;
    font-weight: 700;
}

.month-picker-title i {
    color: #2563eb;
}

.month-input {
    width: 100%;

    height: 38px;

    padding: 0 10px;

    border: 1px solid #e2e8f0;
    border-radius: 9px;

    background: #f8fafc;

    color: #172033;

    font-size: 12px;
    font-weight: 500;

    outline: none;
}

.month-input:focus {
    border-color: #2563eb;

    background: #ffffff;

    box-shadow:
        0 0 0 3px rgba(37,99,235,.08);
}

.btn-month-apply {
    width: 100%;

    height: 36px;

    margin-top: 8px;

    border: none;
    border-radius: 9px;

    background: #2563eb;
    color: #ffffff;

    font-size: 11px;
    font-weight: 600;

    cursor: pointer;

    display: flex;
    align-items: center;
    justify-content: center;

    gap: 6px;
}


/* =========================================================
   EXPORT BUTTON
========================================================= */

.btn-download {
    display: inline-flex;
    align-items: center;
    justify-content: center;

    gap: 7px;

    height: 40px;

    padding: 0 15px;

    background: #2563eb;
    color: #ffffff !important;

    border: none;

    border-radius: 10px;

    font-size: 12px;
    font-weight: 600;

    cursor: pointer;

    transition: all .2s ease;

    box-shadow:
        0 4px 10px rgba(37,99,235,.12);
}

.btn-download:hover {
    background: #1d4ed8;

    transform: translateY(-1px);
}

.btn-download > i:first-child {
    font-size: 15px;
}

.export-chevron {
    font-size: 9px !important;

    margin-left: 2px;

    transition: transform .2s ease;
}

.export-dropdown.active .export-chevron {
    transform: rotate(180deg);
}


/* =========================================================
   EXPORT MENU
========================================================= */

.export-menu {
    position: absolute;

    top: calc(100% + 8px);
    right: 0;

    width: 235px;

    background: #ffffff;

    border: 1px solid #e2e8f0;
    border-radius: 12px;

    padding: 6px;

    box-shadow:
        0 15px 35px rgba(15,23,42,.12),
        0 3px 8px rgba(15,23,42,.05);

    opacity: 0;
    visibility: hidden;

    transform: translateY(-6px);

    transition:
        opacity .18s ease,
        transform .18s ease,
        visibility .18s ease;

    z-index: 1000;
}

.export-dropdown.active .export-menu {
    opacity: 1;
    visibility: visible;

    transform: translateY(0);
}

.export-item {
    display: flex;
    align-items: center;

    gap: 10px;

    width: 100%;

    padding: 9px;

    border-radius: 9px;

    text-decoration: none !important;
}

.export-item:hover {
    background: #f8fafc;
}

.export-item-icon {
    width: 35px;
    height: 35px;

    min-width: 35px;

    border-radius: 9px;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 15px;
}

.excel-icon {
    background: #dcfce7;
    color: #16a34a;
}

.pdf-icon {
    background: #fee2e2;
    color: #dc2626;
}

.export-item-content {
    display: flex;
    flex-direction: column;

    gap: 2px;

    min-width: 0;
}

.export-item-content strong {
    color: #172033;

    font-size: 11px;
    font-weight: 700;
}

.export-item-content span {
    color: #94a3b8;

    font-size: 9px;
}


/* =========================================================
   SUMMARY ROW
========================================================= */

.summary-row {
    width: 100%;

    --bs-gutter-x: 16px;
    --bs-gutter-y: 16px;

    margin-bottom: 18px;
}


/* =========================================================
   SUMMARY CARD
========================================================= */

.summary-card {
    width: 100%;

    min-height: 140px;

    height: 100%;

    padding: 16px 17px;

    background: #ffffff;

    border: 1px solid #eef2f7;

    border-radius: 14px;

    box-shadow:
        0 5px 16px rgba(15,23,42,.045);

    display: flex;
    flex-direction: column;
    justify-content: space-between;

    overflow: hidden;

    transition:
        transform .2s ease,
        box-shadow .2s ease;
}

.summary-card:hover {
    transform: translateY(-2px);

    box-shadow:
        0 8px 22px rgba(15,23,42,.07);
}


/* =========================================================
   SUMMARY TOP
========================================================= */

.summary-top {
    width: 100%;

    display: flex;
    align-items: flex-start;
    justify-content: space-between;

    gap: 10px;
}

.summary-content {
    min-width: 0;

    flex: 1;
}


/* =========================================================
   SUMMARY TITLE
========================================================= */

.summary-title {
    color: #64748b;

    font-size: 11px;
    font-weight: 700;

    letter-spacing: .3px;

    line-height: 1.3;
}


/* =========================================================
   SUMMARY NUMBER
========================================================= */

.summary-card h2 {
    margin: 6px 0 2px;

    color: #172033;

    font-size: 25px;

    line-height: 1.15;

    font-weight: 700;

    letter-spacing: -.4px;

    word-break: break-word;
}


/* =========================================================
   SUMMARY DESCRIPTION
========================================================= */

.summary-card p {
    margin: 0;

    color: #94a3b8;

    font-size: 10px;

    line-height: 1.4;
}


/* =========================================================
   SUMMARY ICON
========================================================= */

.summary-icon {
    width: 42px;
    height: 42px;

    min-width: 42px;

    border-radius: 11px;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 17px;
}

.summary-icon.blue {
    background: #dbeafe;
    color: #2563eb;
}

.summary-icon.green {
    background: #dcfce7;
    color: #16a34a;
}

.summary-icon.orange {
    background: #ffedd5;
    color: #ea580c;
}

.summary-icon.purple {
    background: #ede9fe;
    color: #7c3aed;
}

.summary-icon.cyan {
    background: #cffafe;
    color: #0891b2;
}

.summary-icon.pink {
    background: #fce7f3;
    color: #db2777;
}


/* =========================================================
   SUMMARY FOOTER
========================================================= */

.summary-footer {
    display: flex;
    align-items: center;

    gap: 5px;

    color: #64748b;

    font-size: 10px;
    font-weight: 500;

    line-height: 1.3;
}

.summary-footer i {
    font-size: 10px;
}

.summary-footer.success {
    color: #16a34a;
}


/* =========================================================
   BOTTOM ROW
========================================================= */

.dashboard-bottom-row {
    width: 100%;

    --bs-gutter-x: 16px;
    --bs-gutter-y: 16px;
}


/* =========================================================
   DASHBOARD CARD
========================================================= */

.dashboard-card {
    width: 100%;

    background: #ffffff;

    border: 1px solid #eef2f7;

    border-radius: 14px;

    padding: 18px;

    box-shadow:
        0 5px 16px rgba(15,23,42,.045);
}


/* =========================================================
   RENTAL HEADER
========================================================= */

.rental-header {
    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 15px;

    margin-bottom: 14px;
}

.dashboard-card-title {
    color: #172033;

    font-size: 15px;
    font-weight: 700;
}

.view-all-link {
    color: #2563eb;

    font-size: 11px;
    font-weight: 600;

    text-decoration: none !important;

    display: inline-flex;
    align-items: center;

    gap: 5px;

    white-space: nowrap;
}

.view-all-link:hover {
    color: #1d4ed8;
}


/* =========================================================
   RENTAL TABLE
========================================================= */

.rental-table-wrapper {
    width: 100%;
    max-width: 100%;

    overflow-x: auto;
    overflow-y: hidden;

    -webkit-overflow-scrolling: touch;
}

.rental-table {
    width: 100%;

    min-width: 560px;

    margin-bottom: 0;
}

.rental-table thead th {
    background: #f8fafc;

    color: #64748b;

    font-size: 10px;

    font-weight: 700;

    text-transform: uppercase;

    letter-spacing: .3px;

    padding: 11px 12px;

    border: none;

    white-space: nowrap;
}

.rental-table tbody td {
    padding: 12px;

    vertical-align: middle;

    border-bottom: 1px solid #edf0f5;

    color: #172033;

    font-size: 12px;

    white-space: nowrap;
}

.rental-table tbody tr:last-child td {
    border-bottom: none;
}

.rental-code {
    font-weight: 700;
    color: #172033;
}

.customer-name {
    display: flex;
    align-items: center;

    gap: 8px;

    font-weight: 500;
}

.customer-mini-icon {
    width: 28px;
    height: 28px;

    min-width: 28px;

    border-radius: 7px;

    background: #eef4ff;

    color: #2563eb;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 12px;
}

.rental-date {
    color: #475569;
}


/* =========================================================
   STATUS
========================================================= */

.status-badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;

    min-width: 65px;

    padding: 5px 10px;

    border-radius: 20px;

    font-size: 10px;

    font-weight: 600;

    white-space: nowrap;
}

.status-badge.waiting {
    background: #fff4c7;
    color: #a16207;
}

.status-badge.approved {
    background: #e0edff;
    color: #2563eb;
}

.status-badge.completed {
    background: #dcfce7;
    color: #15803d;
}

.status-badge.cancelled {
    background: #fee2e2;
    color: #dc2626;
}

.empty-rental {
    height: 130px;

    text-align: center;

    color: #94a3b8 !important;
}

.empty-rental i {
    display: block;

    font-size: 24px;

    margin-bottom: 6px;
}


/* =========================================================
   LOW STOCK
========================================================= */

.low-stock-card {
    height: 100%;

    display: flex;
    flex-direction: column;

    overflow: hidden;
}

.low-stock-header {
    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 12px;

    margin-bottom: 14px;
}

.low-stock-header p {
    margin: 4px 0 0;

    color: #94a3b8;

    font-size: 10px;
}

.stock-header-icon {
    width: 40px;
    height: 40px;

    min-width: 40px;

    border-radius: 10px;

    background: #fff7ed;

    color: #f97316;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 17px;
}


/* =========================================================
   LOW STOCK LIST
========================================================= */

.low-stock-list {
    display: flex;
    flex-direction: column;

    gap: 1px;

    flex: 1;
}

.low-stock-item {
    display: flex;
    align-items: flex-start;

    gap: 9px;

    padding: 10px 0;

    border-bottom: 1px solid #f1f5f9;
}

.low-stock-item:last-child {
    border-bottom: none;
}

.stock-product-icon {
    width: 35px;
    height: 35px;

    min-width: 35px;

    border-radius: 8px;

    background: #f8fafc;

    border: 1px solid #e2e8f0;

    color: #64748b;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 14px;
}

.stock-product-info {
    flex: 1;

    min-width: 0;
}

.stock-product-top {
    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 7px;
}

.stock-product-top strong {
    color: #172033;

    font-size: 11px;

    font-weight: 700;

    white-space: nowrap;

    overflow: hidden;

    text-overflow: ellipsis;
}

.stock-number {
    color: #172033;

    font-size: 11px;

    font-weight: 700;

    white-space: nowrap;
}

.stock-product-bottom {
    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 7px;

    margin-top: 3px;
}

.stock-product-bottom > span:first-child {
    color: #94a3b8;

    font-size: 9px;
}

.stock-status {
    font-size: 8px;

    font-weight: 600;

    white-space: nowrap;
}

.stock-status.empty {
    color: #dc2626;
}

.stock-status.critical {
    color: #ea580c;
}

.stock-status.warning {
    color: #ca8a04;
}


/* =========================================================
   STOCK PROGRESS
========================================================= */

.stock-progress {
    width: 100%;

    height: 4px;

    margin-top: 6px;

    background: #f1f5f9;

    border-radius: 10px;

    overflow: hidden;
}

.stock-progress-bar {
    height: 100%;

    border-radius: 10px;

    background: #f97316;
}


/* =========================================================
   STOCK EMPTY
========================================================= */

.stock-empty {
    padding: 25px 10px;

    text-align: center;

    display: flex;
    flex-direction: column;
    align-items: center;
}

.stock-empty-icon {
    width: 42px;
    height: 42px;

    border-radius: 50%;

    background: #dcfce7;

    color: #16a34a;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 18px;

    margin-bottom: 8px;
}

.stock-empty strong {
    color: #172033;

    font-size: 11px;

    margin-bottom: 3px;
}

.stock-empty span {
    color: #94a3b8;

    font-size: 9px;
}


/* =========================================================
   STOCK FOOTER
========================================================= */

.stock-footer-link {
    margin-top: 10px;

    padding-top: 10px;

    border-top: 1px solid #edf0f5;

    display: flex;
    align-items: center;
    justify-content: space-between;

    color: #2563eb;

    font-size: 10px;

    font-weight: 600;

    text-decoration: none !important;
}

.stock-footer-link:hover {
    color: #1d4ed8;
}


/* =========================================================
   LAPTOP
========================================================= */

@media (max-width: 1199px) {

    .dashboard-header {
        gap: 18px;
    }

    .dashboard-left h1 {
        font-size: 25px;
    }

    .dashboard-left h1 i {
        font-size: 23px;
    }

    .summary-card {
        min-height: 138px;
    }

}


/* =========================================================
   TABLET
========================================================= */

@media (max-width: 991px) {

    .dashboard-header {
        flex-direction: column;

        align-items: stretch;

        gap: 14px;
    }

    .dashboard-left {
        width: 100%;
    }

    .dashboard-right {
        width: 100%;

        justify-content: flex-start;
    }

    .summary-card {
        min-height: 136px;
    }

}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 767px) {

    .dashboard-container {
        width: 100% !important;

        max-width: 100% !important;

        padding-left: 10px !important;

        padding-right: 10px !important;

        margin: 0 !important;

        overflow-x: hidden !important;
    }


    /* HEADER */

    .dashboard-header {
        width: 100%;

        margin-bottom: 14px;

        gap: 11px;
    }

    .breadcrumb-dashboard {
        font-size: 10px;

        gap: 5px;

        margin-bottom: 5px;
    }

    .dashboard-left h1 {
        font-size: 19px;

        line-height: 1.25;

        margin-bottom: 4px;

        gap: 6px;
    }

    .dashboard-left h1 i {
        font-size: 17px;

        line-height: 1;
    }

    .dashboard-left p {
        font-size: 11px;

        line-height: 1.4;
    }


    /* BUTTON HEADER */

    .dashboard-right {
        width: 100%;

        display: grid;

        grid-template-columns: 1fr 1fr;

        gap: 8px;
    }

    .month-picker-wrapper,
    .export-dropdown {
        width: 100%;

        min-width: 0;
    }

    .btn-month,
    .btn-download {
        width: 100% !important;

        height: 37px !important;

        min-height: 37px !important;

        padding: 0 8px !important;

        border-radius: 9px !important;

        gap: 5px !important;

        font-size: 10px !important;

        white-space: nowrap;
    }

    .btn-month i:first-child,
    .btn-download > i:first-child {
        font-size: 13px !important;
    }


    /* DROPDOWN */

    .month-picker-menu {
        width: 220px;

        max-width: calc(100vw - 20px);

        padding: 10px;
    }

    .export-menu {
        width: 220px;

        max-width: calc(100vw - 20px);
    }


    /* SUMMARY */

    .summary-row {
        --bs-gutter-x: 8px !important;

        --bs-gutter-y: 8px !important;

        margin-bottom: 12px !important;
    }

    .summary-row > .col-xl-4.col-md-6 {
        width: 50% !important;

        flex: 0 0 50% !important;

        max-width: 50% !important;
    }

    .summary-card {
        min-height: 128px !important;

        padding: 12px !important;

        border-radius: 11px;
    }

    .summary-top {
        gap: 6px;
    }

    .summary-title {
        font-size: 8.5px !important;
    }

    .summary-card h2 {
        font-size: 20px !important;

        margin: 5px 0 2px;
    }

    .summary-card p {
        font-size: 8px !important;
    }

    .summary-icon {
        width: 32px !important;

        height: 32px !important;

        min-width: 32px !important;

        border-radius: 8px;

        font-size: 13px !important;
    }

    .summary-footer {
        font-size: 7.5px !important;

        gap: 4px;

        white-space: nowrap;

        overflow: hidden;

        text-overflow: ellipsis;
    }

    .summary-footer i {
        font-size: 8px !important;
    }


    /* BOTTOM */

    .dashboard-bottom-row {
        --bs-gutter-x: 0 !important;

        --bs-gutter-y: 10px !important;
    }

    .dashboard-bottom-row > div {
        width: 100% !important;

        max-width: 100% !important;

        flex: 0 0 100% !important;
    }

    .dashboard-card {
        width: 100% !important;

        max-width: 100% !important;

        padding: 13px !important;

        border-radius: 11px;
    }

    .dashboard-card-title {
        font-size: 13px !important;
    }


    /* TABLE */

    .rental-table-wrapper {
        width: 100%;

        overflow-x: auto;
    }

    .rental-table {
        width: 500px !important;

        min-width: 500px !important;
    }

    .rental-table thead th {
        padding: 9px !important;

        font-size: 8px !important;
    }

    .rental-table tbody td {
        padding: 10px 9px !important;

        font-size: 9px !important;
    }

    .customer-mini-icon {
        width: 25px;

        height: 25px;

        min-width: 25px;

        font-size: 10px;
    }

    .status-badge {
        min-width: 58px;

        padding: 5px 7px;

        font-size: 8px;
    }


    /* LOW STOCK */

    .low-stock-card {
        height: auto;
    }

    .low-stock-header {
        margin-bottom: 8px;
    }

    .low-stock-header p {
        font-size: 8px;
    }

    .stock-header-icon {
        width: 33px;

        height: 33px;

        min-width: 33px;

        font-size: 14px;
    }

    .low-stock-item {
        gap: 8px;

        padding: 8px 0;
    }

    .stock-product-icon {
        width: 32px;

        height: 32px;

        min-width: 32px;

        font-size: 13px;
    }

    .stock-product-top strong {
        font-size: 9px;
    }

    .stock-number {
        font-size: 9px;
    }

    .stock-product-bottom > span:first-child {
        font-size: 8px;
    }

    .stock-status {
        font-size: 7px;
    }

    .stock-progress {
        height: 4px;

        margin-top: 5px;
    }

}


/* =========================================================
   MOBILE KECIL
========================================================= */

@media (max-width: 380px) {

    .dashboard-container {
        padding-left: 8px !important;

        padding-right: 8px !important;
    }

    .dashboard-left h1 {
        font-size: 17px;

        gap: 5px;
    }

    .dashboard-left h1 i {
        font-size: 15px;
    }

    .dashboard-right {
        gap: 6px;
    }

    .summary-row {
        --bs-gutter-x: 6px !important;

        --bs-gutter-y: 6px !important;
    }

    .summary-card {
        min-height: 123px !important;

        padding: 10px !important;
    }

    .summary-title {
        font-size: 7.5px !important;
    }

    .summary-card h2 {
        font-size: 18px !important;
    }

    .summary-card p {
        font-size: 7.5px !important;
    }

    .summary-icon {
        width: 29px !important;

        height: 29px !important;

        min-width: 29px !important;

        font-size: 11px !important;
    }

    .summary-footer {
        font-size: 7px !important;
    }

}


/* =========================================================
   DESKTOP BESAR
========================================================= */

@media (min-width: 1400px) {

    .dashboard-container {
        padding-left: 20px;
        padding-right: 20px;
    }

    .summary-card {
        min-height: 140px;
    }

}

</style>


{{-- =========================================================
     JAVASCRIPT
========================================================= --}}
<script>

document.addEventListener('DOMContentLoaded', function () {

    /* =====================================================
       ELEMENT
    ====================================================== */

    const monthWrapper =
        document.querySelector('.month-picker-wrapper');

    const monthButton =
        document.getElementById('monthPickerBtn');

    const monthMenu =
        document.getElementById('monthPickerMenu');

    const monthInput =
        document.getElementById('monthPickerInput');

    const applyMonthBtn =
        document.getElementById('applyMonthBtn');

    const monthText =
        document.getElementById('monthPickerText');


    const exportDropdown =
        document.querySelector('.export-dropdown');

    const exportButton =
        document.getElementById('exportDropdownBtn');

    const exportMenu =
        document.getElementById('exportMenu');

    const exportExcelLink =
        document.getElementById('exportExcelLink');

    const exportPdfLink =
        document.getElementById('exportPdfLink');

    const excelExportText =
        document.getElementById('excelExportText');

    const pdfExportText =
        document.getElementById('pdfExportText');


    /* =====================================================
       FORMAT BULAN
    ====================================================== */

    function formatMonth(monthValue) {

        if (!monthValue) {
            return 'Bulan Ini';
        }

        const parts =
            monthValue.split('-');

        if (parts.length !== 2) {
            return 'Bulan Ini';
        }

        const year =
            parseInt(parts[0]);

        const month =
            parseInt(parts[1]);

        const monthNames = [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];

        if (
            month < 1 ||
            month > 12
        ) {
            return 'Bulan Ini';
        }

        return monthNames[month - 1] + ' ' + year;
    }


    /* =====================================================
       UPDATE TEXT BULAN
    ====================================================== */

    function updateMonthText() {

        if (!monthInput) {
            return;
        }

        const selectedMonth =
            monthInput.value;

        if (!selectedMonth) {

            monthText.textContent =
                'Bulan Ini';

            return;
        }

        monthText.textContent =
            formatMonth(selectedMonth);
    }


    /* =====================================================
       UPDATE LINK EXPORT
    ====================================================== */

    function updateExportLinks() {

        if (!monthInput) {
            return;
        }

        const selectedMonth =
            monthInput.value;

        if (!selectedMonth) {
            return;
        }


        /* EXCEL */

        if (exportExcelLink) {

            const excelUrl =
                new URL(
                    "{{ route('dashboard.exportExcel') }}",
                    window.location.origin
                );

            excelUrl.searchParams.set(
                'month',
                selectedMonth
            );

            exportExcelLink.href =
                excelUrl.toString();
        }


        /* PDF */

        if (exportPdfLink) {

            const pdfUrl =
                new URL(
                    "{{ route('dashboard.exportPdf') }}",
                    window.location.origin
                );

            pdfUrl.searchParams.set(
                'month',
                selectedMonth
            );

            exportPdfLink.href =
                pdfUrl.toString();
        }


        /* TEXT */

        const readableMonth =
            formatMonth(selectedMonth);

        if (excelExportText) {

            excelExportText.textContent =
                'Export data ' + readableMonth;
        }

        if (pdfExportText) {

            pdfExportText.textContent =
                'Cetak laporan ' + readableMonth;
        }
    }


    /* =====================================================
       DEFAULT MONTH
    ====================================================== */

    updateMonthText();

    updateExportLinks();


    /* =====================================================
       MONTH PICKER
    ====================================================== */

    if (
        monthButton &&
        monthMenu &&
        monthWrapper
    ) {

        monthButton.addEventListener(
            'click',
            function (event) {

                event.stopPropagation();

                if (exportDropdown) {

                    exportDropdown.classList.remove(
                        'active'
                    );
                }

                monthWrapper.classList.toggle(
                    'active'
                );

            }
        );

    }


    /* =====================================================
       APPLY MONTH
    ====================================================== */

    if (applyMonthBtn) {

        applyMonthBtn.addEventListener(
            'click',
            function (event) {

                event.stopPropagation();

                if (!monthInput) {
                    return;
                }

                const selectedMonth =
                    monthInput.value;

                if (!selectedMonth) {
                    return;
                }

                updateMonthText();

                updateExportLinks();

                monthWrapper.classList.remove(
                    'active'
                );

            }
        );

    }


    /* =====================================================
       EXPORT DROPDOWN
    ====================================================== */

    if (
        exportDropdown &&
        exportButton &&
        exportMenu
    ) {

        exportButton.addEventListener(
            'click',
            function (event) {

                event.stopPropagation();

                if (monthWrapper) {

                    monthWrapper.classList.remove(
                        'active'
                    );
                }

                exportDropdown.classList.toggle(
                    'active'
                );

            }
        );


        exportMenu.addEventListener(
            'click',
            function (event) {

                event.stopPropagation();

            }
        );

    }


    /* =====================================================
       CLICK LUAR
    ====================================================== */

    document.addEventListener(
        'click',
        function (event) {

            if (
                monthWrapper &&
                !monthWrapper.contains(event.target)
            ) {

                monthWrapper.classList.remove(
                    'active'
                );
            }


            if (
                exportDropdown &&
                !exportDropdown.contains(event.target)
            ) {

                exportDropdown.classList.remove(
                    'active'
                );
            }

        }
    );


    /* =====================================================
       SAAT BULAN DIUBAH
    ====================================================== */

    if (monthInput) {

        monthInput.addEventListener(
            'change',
            function () {

                updateMonthText();

                updateExportLinks();

            }
        );

    }


    /* =====================================================
       EXPORT EXCEL
    ====================================================== */

    if (exportExcelLink) {

        exportExcelLink.addEventListener(
            'click',
            function () {

                if (exportDropdown) {

                    exportDropdown.classList.remove(
                        'active'
                    );
                }

            }
        );

    }


    /* =====================================================
       EXPORT PDF
    ====================================================== */

    if (exportPdfLink) {

        exportPdfLink.addEventListener(
            'click',
            function () {

                if (exportDropdown) {

                    exportDropdown.classList.remove(
                        'active'
                    );
                }

            }
        );

    }

});

</script>

@endsection
```
