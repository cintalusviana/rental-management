<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">

    <title>Laporan Dashboard Rental Management</title>

    <style>

        @page {
            margin: 25px 30px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
            color: #1e293b;
            margin: 0;
            padding: 0;
        }


        /* =====================================================
           HEADER
        ===================================================== */

        .header {
            width: 100%;
            padding-bottom: 16px;
            border-bottom: 2px solid #2563eb;
            margin-bottom: 20px;
        }

        .header-table {
            width: 100%;
            border-collapse: collapse;
        }

        .header-left {
            width: 65%;
            vertical-align: middle;
        }

        .header-right {
            width: 35%;
            text-align: right;
            vertical-align: middle;
        }

        .brand {
            font-size: 20px;
            font-weight: bold;
            color: #1e3a8a;
            margin-bottom: 4px;
        }

        .subtitle {
            font-size: 11px;
            color: #64748b;
        }

        .report-title {
            font-size: 15px;
            font-weight: bold;
            color: #0f172a;
            margin-top: 14px;
        }

        .print-date {
            font-size: 10px;
            color: #64748b;
            line-height: 1.7;
        }


        /* =====================================================
           FILTER PERIODE
        ===================================================== */

        .period-box {
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            padding: 9px 12px;
            border-radius: 6px;
            margin-bottom: 18px;
        }

        .period-label {
            font-size: 9px;
            color: #64748b;
            text-transform: uppercase;
            font-weight: bold;
        }

        .period-value {
            margin-top: 3px;
            font-size: 11px;
            color: #1d4ed8;
            font-weight: bold;
        }


        /* =====================================================
           SUMMARY
        ===================================================== */

        .summary-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 7px;
            margin: -7px;
            margin-bottom: 18px;
        }

        .summary-cell {
            width: 33.33%;
            vertical-align: top;
        }

        .summary-card {
            border: 1px solid #e2e8f0;
            border-radius: 7px;
            padding: 12px;
            background: #ffffff;
            min-height: 75px;
        }

        .summary-title {
            font-size: 9px;
            color: #64748b;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: .3px;
        }

        .summary-value {
            margin-top: 7px;
            font-size: 18px;
            color: #0f172a;
            font-weight: bold;
        }

        .summary-info {
            margin-top: 4px;
            font-size: 9px;
            color: #94a3b8;
        }


        /* =====================================================
           SECTION
        ===================================================== */

        .section {
            margin-top: 20px;
            margin-bottom: 8px;
        }

        .section-title {
            font-size: 14px;
            font-weight: bold;
            color: #0f172a;
            margin: 0;
        }

        .section-subtitle {
            font-size: 9px;
            color: #94a3b8;
            margin-top: 3px;
        }


        /* =====================================================
           TABLE
        ===================================================== */

        table.data {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table.data thead th {
            background: #2563eb;
            color: #ffffff;
            font-size: 9px;
            font-weight: bold;
            padding: 9px 7px;
            border: 1px solid #2563eb;
            text-align: left;
        }

        table.data tbody td {
            padding: 8px 7px;
            border-bottom: 1px solid #e2e8f0;
            color: #334155;
            font-size: 10px;
        }

        table.data tbody tr:nth-child(even) td {
            background: #f8fafc;
        }


        /* =====================================================
           CENTER
        ===================================================== */

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }


        /* =====================================================
           RENTAL CODE
        ===================================================== */

        .rental-code {
            font-weight: bold;
            color: #1e293b;
        }


        /* =====================================================
           STATUS
        ===================================================== */

        .status {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 10px;
            font-size: 8px;
            font-weight: bold;
        }

        .status-menunggu {
            background: #dbeafe;
            color: #2563eb;
        }

        .status-disetujui {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .status-selesai {
            background: #dcfce7;
            color: #15803d;
        }

        .status-dibatalkan {
            background: #fee2e2;
            color: #dc2626;
        }

        .status-aktif {
            background: #ede9fe;
            color: #7c3aed;
        }

        .status-default {
            background: #f1f5f9;
            color: #475569;
        }


        /* =====================================================
           LOW STOCK
        ===================================================== */

        .stock-name {
            font-weight: bold;
            color: #1e293b;
        }

        .stock-number {
            font-weight: bold;
            font-size: 11px;
        }

        .stock-danger {
            color: #dc2626;
        }

        .stock-warning {
            color: #ea580c;
        }

        .stock-limited {
            color: #ca8a04;
        }

        .stock-safe {
            color: #15803d;
        }


        /* =====================================================
           FOOTER
        ===================================================== */

        .footer {
            margin-top: 25px;
            padding-top: 10px;
            border-top: 1px solid #e2e8f0;
            font-size: 8px;
            color: #94a3b8;
        }

        .footer-table {
            width: 100%;
            border-collapse: collapse;
        }

        .footer-left {
            text-align: left;
        }

        .footer-right {
            text-align: right;
        }


    </style>

</head>


<body>


<!-- =========================================================
     HEADER
========================================================= -->

<div class="header">

    <table class="header-table">

        <tr>

            <td class="header-left">

                <div class="brand">
                    Rental Management System
                </div>

                <div class="subtitle">
                    Sistem Manajemen Penyewaan
                </div>

                <div class="report-title">
                    Laporan Dashboard
                </div>

            </td>


            <td class="header-right">

                <div class="print-date">
                    <strong>ADMINISTRATOR</strong>
                    <br>

                    Dicetak pada:
                    {{ now()->format('d-m-Y H:i') }}

                </div>

            </td>

        </tr>

    </table>

</div>



<!-- =========================================================
     PERIODE
========================================================= -->

<div class="period-box">

    <div class="period-label">
        Periode Laporan
    </div>

    <div class="period-value">

        @if($startDate && $endDate)

            {{ \Carbon\Carbon::parse($startDate)->format('d-m-Y') }}
            -
            {{ \Carbon\Carbon::parse($endDate)->format('d-m-Y') }}

        @else

            Semua Periode

        @endif

    </div>

</div>



<!-- =========================================================
     SUMMARY
========================================================= -->

<table class="summary-table">

    <tr>

        <!-- TOTAL BARANG -->
        <td class="summary-cell">

            <div class="summary-card">

                <div class="summary-title">
                    Total Barang
                </div>

                <div class="summary-value">
                    {{ $totalProducts }}
                </div>

                <div class="summary-info">
                    Semua alat rental
                </div>

            </div>

        </td>


        <!-- CUSTOMER -->
        <td class="summary-cell">

            <div class="summary-card">

                <div class="summary-title">
                    Customer
                </div>

                <div class="summary-value">
                    {{ $totalCustomers }}
                </div>

                <div class="summary-info">
                    Pelanggan terdaftar
                </div>

            </div>

        </td>


        <!-- RENTAL -->
        <td class="summary-cell">

            <div class="summary-card">

                <div class="summary-title">
                    Total Rental
                </div>

                <div class="summary-value">
                    {{ $totalRentals }}
                </div>

                <div class="summary-info">
                    Transaksi penyewaan
                </div>

            </div>

        </td>

    </tr>


    <tr>

        <!-- KATEGORI -->
        <td class="summary-cell">

            <div class="summary-card">

                <div class="summary-title">
                    Kategori
                </div>

                <div class="summary-value">
                    {{ $totalCategories }}
                </div>

                <div class="summary-info">
                    Jenis barang
                </div>

            </div>

        </td>


        <!-- BARANG TERSEDIA -->
        <td class="summary-cell">

            <div class="summary-card">

                <div class="summary-title">
                    Barang Tersedia
                </div>

                <div class="summary-value">
                    {{ $availableProducts }}
                </div>

                <div class="summary-info">
                    Siap disewa
                </div>

            </div>

        </td>


        <!-- PENDAPATAN -->
        <td class="summary-cell">

            <div class="summary-card">

                <div class="summary-title">
                    Pendapatan
                </div>

                <div class="summary-value">
                    Rp {{ number_format($totalIncome ?? 0, 0, ',', '.') }}
                </div>

                <div class="summary-info">
                    Pembayaran lunas
                </div>

            </div>

        </td>

    </tr>

</table>



<!-- =========================================================
     RENTAL TERBARU
========================================================= -->

<div class="section">

    <div class="section-title">
        Rental Terbaru
    </div>

    <div class="section-subtitle">
        Daftar transaksi penyewaan terbaru
    </div>

</div>


<table class="data">

    <thead>

        <tr>

            <th width="7%" class="text-center">
                No
            </th>

            <th width="25%">
                Kode Rental
            </th>

            <th width="30%">
                Customer
            </th>

            <th width="18%" class="text-center">
                Tanggal
            </th>

            <th width="20%" class="text-center">
                Status
            </th>

        </tr>

    </thead>


    <tbody>

    @forelse($recentRentals as $index => $rental)

        <tr>

            <td class="text-center">
                {{ $index + 1 }}
            </td>


            <td>

                <span class="rental-code">
                    {{ $rental->rental_code }}
                </span>

            </td>


            <td>
                {{ $rental->customer->name ?? '-' }}
            </td>


            <td class="text-center">

                @if($rental->rental_date)

                    {{ \Carbon\Carbon::parse(
                        $rental->rental_date
                    )->format('d-m-Y') }}

                @else

                    -

                @endif

            </td>


            <td class="text-center">

                @php

                    $status = strtolower(
                        trim(
                            $rental->status ?? ''
                        )
                    );

                @endphp


                @if($status === 'pending')

                    <span class="status status-menunggu">
                        Menunggu
                    </span>

                @elseif($status === 'approved')

                    <span class="status status-disetujui">
                        Disetujui
                    </span>

                @elseif(
                    $status === 'active' ||
                    $status === 'ongoing'
                )

                    <span class="status status-aktif">
                        Sedang Disewa
                    </span>

                @elseif(
                    $status === 'completed' ||
                    $status === 'complete'
                )

                    <span class="status status-selesai">
                        Selesai
                    </span>

                @elseif(
                    $status === 'cancelled' ||
                    $status === 'canceled'
                )

                    <span class="status status-dibatalkan">
                        Dibatalkan
                    </span>

                @else

                    <span class="status status-default">
                        {{ ucfirst(
                            str_replace(
                                '_',
                                ' ',
                                $status
                            )
                        ) }}
                    </span>

                @endif

            </td>

        </tr>

    @empty

        <tr>

            <td colspan="5" class="text-center">
                Belum ada data rental.
            </td>

        </tr>

    @endforelse

    </tbody>

</table>



<!-- =========================================================
     STOK HAMPIR HABIS
========================================================= -->

<div class="section">

    <div class="section-title">
        Stok Hampir Habis
    </div>

    <div class="section-subtitle">
        Barang yang membutuhkan perhatian
    </div>

</div>


<table class="data">

    <thead>

        <tr>

            <th width="8%" class="text-center">
                No
            </th>

            <th width="52%">
                Nama Barang
            </th>

            <th width="15%" class="text-center">
                Stok
            </th>

            <th width="25%">
                Keterangan
            </th>

        </tr>

    </thead>


    <tbody>

    @forelse($lowStock as $index => $item)

        <tr>

            <td class="text-center">
                {{ $index + 1 }}
            </td>


            <td>

                <span class="stock-name">
                    {{ $item->name }}
                </span>

            </td>


            <td class="text-center">

                @if($item->stock <= 0)

                    <span class="stock-number stock-danger">
                        {{ $item->stock }}
                    </span>

                @elseif($item->stock == 1)

                    <span class="stock-number stock-warning">
                        {{ $item->stock }}
                    </span>

                @else

                    <span class="stock-number stock-limited">
                        {{ $item->stock }}
                    </span>

                @endif

            </td>


            <td>

                @if($item->stock <= 0)

                    <span class="stock-danger">
                        Habis
                    </span>

                @elseif($item->stock == 1)

                    <span class="stock-warning">
                        Sangat sedikit
                    </span>

                @elseif($item->stock <= 3)

                    <span class="stock-limited">
                        Terbatas
                    </span>

                @else

                    <span class="stock-safe">
                        Masih tersedia
                    </span>

                @endif

            </td>

        </tr>

    @empty

        <tr>

            <td colspan="4" class="text-center">
                Semua stok barang aman.
            </td>

        </tr>

    @endforelse

    </tbody>

</table>



<!-- =========================================================
     FOOTER
========================================================= -->

<div class="footer">

    <table class="footer-table">

        <tr>

            <td class="footer-left">

                Rental Management System
                &nbsp;•&nbsp;
                Laporan Dashboard

            </td>


            <td class="footer-right">

                Dokumen resmi sistem

            </td>

        </tr>

    </table>

</div>


</body>
</html>