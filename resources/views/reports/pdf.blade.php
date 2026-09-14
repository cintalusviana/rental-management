<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">

    <title>Laporan Rental Management</title>

    <style>

        /* =====================================================
           RESET
        ===================================================== */

        *{
            box-sizing:border-box;
        }

        @page{
            margin:30px 35px;
        }

        body{
            font-family:DejaVu Sans, sans-serif;
            font-size:10px;
            color:#1E293B;
            margin:0;
            background:#FFFFFF;
        }


        /* =====================================================
           HEADER
        ===================================================== */

        .header{
            width:100%;
            border-bottom:3px solid #2563EB;
            padding-bottom:16px;
            margin-bottom:20px;
        }

        .header-table{
            width:100%;
            border-collapse:collapse;
        }

        .header-left{
            width:65%;
            vertical-align:top;
        }

        .header-right{
            width:35%;
            text-align:right;
            vertical-align:top;
        }

        .brand{
            font-size:23px;
            font-weight:bold;
            color:#2563EB;
            letter-spacing:.5px;
            margin-bottom:5px;
        }

        .subtitle{
            font-size:10px;
            color:#64748B;
            margin-bottom:9px;
        }

        .company-info{
            font-size:9px;
            color:#64748B;
            line-height:1.6;
        }

        .report-label{
            font-size:9px;
            color:#64748B;
            text-transform:uppercase;
            letter-spacing:.5px;
            margin-bottom:5px;
        }

        .report-title{
            font-size:17px;
            font-weight:bold;
            color:#0F172A;
            margin-bottom:7px;
        }

        .report-number{
            font-size:9px;
            color:#64748B;
        }


        /* =====================================================
           PERIODE
        ===================================================== */

        .period-box{
            background:#EFF6FF;
            border:1px solid #BFDBFE;
            border-radius:7px;
            padding:9px 12px;
            margin-bottom:20px;
        }

        .period-label{
            font-size:8px;
            color:#64748B;
            text-transform:uppercase;
            letter-spacing:.5px;
            margin-bottom:3px;
        }

        .period-value{
            font-size:11px;
            font-weight:bold;
            color:#1D4ED8;
        }


        /* =====================================================
           RINGKASAN
        ===================================================== */

        .summary-title{
            font-size:13px;
            font-weight:bold;
            color:#0F172A;
            margin-bottom:10px;
        }

        .summary-table{
            width:100%;
            border-collapse:separate;
            border-spacing:7px 0;
            margin-left:-7px;
            margin-bottom:23px;
        }

        .summary-card{
            width:25%;
            border:1px solid #E2E8F0;
            border-radius:8px;
            padding:12px;
            vertical-align:top;
            background:#FFFFFF;
        }

        .summary-card-blue{
            border-top:3px solid #2563EB;
        }

        .summary-card-green{
            border-top:3px solid #16A34A;
        }

        .summary-card-purple{
            border-top:3px solid #7C3AED;
        }

        .summary-card-yellow{
            border-top:3px solid #D97706;
        }

        .summary-label{
            font-size:8px;
            color:#64748B;
            text-transform:uppercase;
            margin-bottom:7px;
        }

        .summary-value{
            font-size:16px;
            font-weight:bold;
            color:#0F172A;
        }

        .summary-note{
            font-size:8px;
            color:#94A3B8;
            margin-top:4px;
        }


        /* =====================================================
           SECTION
        ===================================================== */

        .section{
            margin-top:18px;
            margin-bottom:10px;
        }

        .section-table{
            width:100%;
            border-collapse:collapse;
        }

        .section-icon{
            width:30px;
            height:30px;
            background:#DBEAFE;
            color:#2563EB;
            text-align:center;
            vertical-align:middle;
            font-size:14px;
            font-weight:bold;
            border-radius:6px;
        }

        .section-content{
            padding-left:9px;
            vertical-align:middle;
        }

        .section-title{
            font-size:13px;
            font-weight:bold;
            color:#0F172A;
        }

        .section-subtitle{
            font-size:8px;
            color:#64748B;
            margin-top:3px;
        }


        /* =====================================================
           TABLE
        ===================================================== */

        .data-table{
            width:100%;
            border-collapse:collapse;
            margin-bottom:22px;
        }

        .data-table thead{
            display:table-header-group;
        }

        .data-table th{
            background:#1E40AF;
            color:#FFFFFF;
            padding:8px 7px;
            font-size:8.5px;
            font-weight:bold;
            text-align:left;
            border:1px solid #1E40AF;
        }

        .data-table td{
            padding:7px;
            font-size:8.5px;
            color:#334155;
            border-bottom:1px solid #E2E8F0;
            vertical-align:middle;
        }

        .data-table tr:nth-child(even) td{
            background:#F8FAFC;
        }

        .data-table tr{
            page-break-inside:avoid;
        }

        .text-center{
            text-align:center !important;
        }

        .text-right{
            text-align:right !important;
        }


        /* =====================================================
           KODE
        ===================================================== */

        .code{
            font-weight:bold;
            color:#1D4ED8;
        }


        /* =====================================================
           STATUS
        ===================================================== */

        .status{
            display:inline-block;
            padding:4px 7px;
            border-radius:10px;
            font-size:7.5px;
            font-weight:bold;
            text-align:center;
        }

        .status-success{
            background:#DCFCE7;
            color:#166534;
        }

        .status-warning{
            background:#FEF3C7;
            color:#92400E;
        }

        .status-info{
            background:#DBEAFE;
            color:#1D4ED8;
        }

        .status-danger{
            background:#FEE2E2;
            color:#991B1B;
        }

        .status-default{
            background:#F1F5F9;
            color:#475569;
        }


        /* =====================================================
           TOTAL PEMBAYARAN
        ===================================================== */

        .payment-total{
            width:100%;
            border-collapse:collapse;
            margin-top:-8px;
            margin-bottom:20px;
        }

        .payment-total td{
            padding:9px 10px;
            background:#F8FAFC;
            border-top:1px solid #E2E8F0;
            border-bottom:1px solid #E2E8F0;
        }

        .payment-total-label{
            text-align:right;
            color:#64748B;
            font-size:9px;
            font-weight:bold;
        }

        .payment-total-value{
            text-align:right;
            color:#2563EB;
            font-size:12px;
            font-weight:bold;
        }


        /* =====================================================
           EMPTY
        ===================================================== */

        .empty{
            text-align:center;
            padding:18px;
            color:#94A3B8;
            background:#F8FAFC;
            border:1px solid #E2E8F0;
        }


        /* =====================================================
           FOOTER
        ===================================================== */

        .footer{
            margin-top:25px;
            padding-top:12px;
            border-top:1px solid #CBD5E1;
        }

        .footer-table{
            width:100%;
            border-collapse:collapse;
        }

        .footer-left{
            text-align:left;
            color:#94A3B8;
            font-size:8px;
            line-height:1.6;
        }

        .footer-right{
            text-align:right;
            color:#64748B;
            font-size:8px;
            line-height:1.6;
        }

        .footer-brand{
            color:#2563EB;
            font-weight:bold;
        }


        /* =====================================================
           PAGE BREAK
        ===================================================== */

        .page-break{
            page-break-before:always;
        }

    </style>

</head>


<body>


{{-- =========================================================
     HEADER
========================================================= --}}

<div class="header">

    <table class="header-table">

        <tr>

            <td class="header-left">

                <div class="brand">
                    RENTAL MANAGEMENT
                </div>

                <div class="subtitle">
                    Sistem Manajemen Penyewaan Barang
                </div>

                <div class="company-info">
                    Laporan transaksi, pembayaran, dan aktivitas rental
                </div>

            </td>


            <td class="header-right">

                <div class="report-label">
                    LAPORAN SISTEM
                </div>

                <div class="report-title">
                    Laporan Rental
                </div>

                <div class="report-number">

                    No. Laporan:
                    RM-{{ date('YmdHis') }}

                </div>

            </td>

        </tr>

    </table>

</div>



{{-- =========================================================
     PERIODE
========================================================= --}}

<div class="period-box">

    <div class="period-label">
        Periode Laporan
    </div>

    <div class="period-value">

        @if($startDate && $endDate)

            {{ date('d F Y', strtotime($startDate)) }}

            &nbsp;&nbsp; s/d &nbsp;&nbsp;

            {{ date('d F Y', strtotime($endDate)) }}

        @elseif($startDate)

            Mulai
            {{ date('d F Y', strtotime($startDate)) }}

        @elseif($endDate)

            Sampai
            {{ date('d F Y', strtotime($endDate)) }}

        @else

            Semua Periode

        @endif

    </div>

</div>



{{-- =========================================================
     RINGKASAN
========================================================= --}}

<div class="summary-title">
    Ringkasan Laporan
</div>


<table class="summary-table">

    <tr>


        {{-- PENYEWAAN --}}

        <td class="summary-card summary-card-blue">

            <div class="summary-label">
                Total Penyewaan
            </div>

            <div class="summary-value">
                {{ $totalRental }}
            </div>

            <div class="summary-note">
                Transaksi rental
            </div>

        </td>


        {{-- PENDAPATAN --}}

        <td class="summary-card summary-card-green">

            <div class="summary-label">
                Total Pendapatan
            </div>

            <div class="summary-value">

                Rp {{ number_format($totalIncome,0,',','.') }}

            </div>

            <div class="summary-note">
                Pendapatan rental
            </div>

        </td>


        {{-- BARANG --}}

        <td class="summary-card summary-card-purple">

            <div class="summary-label">
                Total Barang
            </div>

            <div class="summary-value">
                {{ $totalProduct }}
            </div>

            <div class="summary-note">
                Barang terdaftar
            </div>

        </td>


        {{-- PELANGGAN --}}

        <td class="summary-card summary-card-yellow">

            <div class="summary-label">
                Total Pelanggan
            </div>

            <div class="summary-value">
                {{ $totalCustomer }}
            </div>

            <div class="summary-note">
                Pelanggan terdaftar
            </div>

        </td>


    </tr>

</table>



{{-- =========================================================
     DATA PENYEWAAN
========================================================= --}}

<div class="section">

    <table class="section-table">

        <tr>

            <td class="section-icon">
                R
            </td>

            <td class="section-content">

                <div class="section-title">
                    Data Penyewaan
                </div>

                <div class="section-subtitle">
                    Daftar transaksi penyewaan berdasarkan periode laporan
                </div>

            </td>

        </tr>

    </table>

</div>



<table class="data-table">

    <thead>

        <tr>

            <th width="5%" class="text-center">
                No
            </th>

            <th width="18%">
                Kode Rental
            </th>

            <th width="20%">
                Pelanggan
            </th>

            <th width="14%">
                Tanggal Sewa
            </th>

            <th width="14%">
                Tanggal Kembali
            </th>

            <th width="17%">
                Total
            </th>

            <th width="12%">
                Status
            </th>

        </tr>

    </thead>


    <tbody>

        @forelse($rentals as $rental)


            @php

                $statusRaw =
                    strtolower($rental->status ?? '');


                $statusRental =
                    match($statusRaw){

                        'pending'
                            => 'Menunggu',

                        'confirmed'
                            => 'Dikonfirmasi',

                        'approved'
                            => 'Disetujui',

                        'active'
                            => 'Sedang Disewa',

                        'ongoing'
                            => 'Sedang Disewa',

                        'completed'
                            => 'Selesai',

                        'cancelled'
                            => 'Dibatalkan',

                        'canceled'
                            => 'Dibatalkan',

                        'rejected'
                            => 'Ditolak',

                        default =>
                            $rental->status
                                ? ucfirst(
                                    str_replace(
                                        '_',
                                        ' ',
                                        $rental->status
                                    )
                                )
                                : 'Tidak Ada Status'

                    };


                $statusClass =
                    match($statusRaw){

                        'completed'
                            => 'status-success',

                        'approved',
                        'confirmed',
                        'active',
                        'ongoing'
                            => 'status-info',

                        'pending'
                            => 'status-warning',

                        'cancelled',
                        'canceled',
                        'rejected'
                            => 'status-danger',

                        default
                            => 'status-default'

                    };

            @endphp


            <tr>


                <td class="text-center">
                    {{ $loop->iteration }}
                </td>


                <td>

                    <span class="code">

                        {{ $rental->rental_code }}

                    </span>

                </td>


                <td>

                    {{ $rental->customer->name ?? '-' }}

                </td>


                <td>

                    {{ $rental->rental_date
                        ? date(
                            'd/m/Y',
                            strtotime(
                                $rental->rental_date
                            )
                        )
                        : '-'
                    }}

                </td>


                <td>

                    {{ $rental->return_date
                        ? date(
                            'd/m/Y',
                            strtotime(
                                $rental->return_date
                            )
                        )
                        : '-'
                    }}

                </td>


                <td class="text-right">

                    Rp
                    {{ number_format(
                        $rental->total_price ?? 0,
                        0,
                        ',',
                        '.'
                    ) }}

                </td>


                <td>

                    <span class="status {{ $statusClass }}">

                        {{ $statusRental }}

                    </span>

                </td>


            </tr>


        @empty


            <tr>

                <td
                    colspan="7"
                    class="empty"
                >

                    Tidak ada data penyewaan
                    pada periode yang dipilih.

                </td>

            </tr>


        @endforelse

    </tbody>

</table>



{{-- =========================================================
     DATA PEMBAYARAN
========================================================= --}}

<div class="section">

    <table class="section-table">

        <tr>

            <td class="section-icon">
                P
            </td>

            <td class="section-content">

                <div class="section-title">
                    Data Pembayaran
                </div>

                <div class="section-subtitle">
                    Daftar pembayaran pelanggan yang tercatat dalam sistem
                </div>

            </td>

        </tr>

    </table>

</div>



<table class="data-table">

    <thead>

        <tr>

            <th width="5%" class="text-center">
                No
            </th>

            <th width="20%">
                Kode Pembayaran
            </th>

            <th width="25%">
                Pelanggan
            </th>

            <th width="15%">
                Tanggal
            </th>

            <th width="18%">
                Metode
            </th>

            <th width="17%">
                Jumlah
            </th>

        </tr>

    </thead>


    <tbody>


        @forelse($payments as $payment)


            <tr>


                <td class="text-center">

                    {{ $loop->iteration }}

                </td>


                <td>

                    <span class="code">

                        {{ $payment->payment_code }}

                    </span>

                </td>


                <td>

                    {{ $payment->rental->customer->name ?? '-' }}

                </td>


                <td>

                    {{ $payment->payment_date
                        ? date(
                            'd/m/Y',
                            strtotime(
                                $payment->payment_date
                            )
                        )
                        : '-'
                    }}

                </td>


                <td>

                    {{ $payment->payment_method ?? '-' }}

                </td>


                <td class="text-right">

                    Rp
                    {{ number_format(
                        $payment->amount ?? 0,
                        0,
                        ',',
                        '.'
                    ) }}

                </td>


            </tr>


        @empty


            <tr>

                <td
                    colspan="6"
                    class="empty"
                >

                    Tidak ada data pembayaran
                    pada periode yang dipilih.

                </td>

            </tr>


        @endforelse


    </tbody>

</table>



{{-- =========================================================
     TOTAL PEMBAYARAN
========================================================= --}}

@php

    $totalPayment =
        $payments->sum('amount');

@endphp


<table class="payment-total">

    <tr>

        <td class="payment-total-label">

            Total Pembayaran

        </td>

        <td class="payment-total-value">

            Rp
            {{ number_format(
                $totalPayment,
                0,
                ',',
                '.'
            ) }}

        </td>

    </tr>

</table>



{{-- =========================================================
     FOOTER
========================================================= --}}

<div class="footer">

    <table class="footer-table">

        <tr>

            <td class="footer-left">

                <span class="footer-brand">
                    RENTAL MANAGEMENT
                </span>

                <br>

                Laporan ini dibuat secara otomatis
                melalui sistem manajemen rental.

            </td>


            <td class="footer-right">

                Dicetak pada

                <br>

                <strong>
                    {{ date('d/m/Y H:i') }}
                </strong>

            </td>

        </tr>

    </table>

</div>


</body>
</html>