```blade
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <title>Struk Rental {{ $payment->payment_code ?? '-' }}</title>

    <style>
        @page {
            size: 58mm auto;
            margin: 0;
        }

        * {
            box-sizing: border-box;
        }

        body {
            width: 58mm;
            margin: 0;
            padding: 7px;
            font-family: DejaVu Sans, sans-serif;
            font-size: 8px;
            line-height: 1.4;
            color: #111827;
            background: #fff;
        }

        .receipt {
            width: 100%;
        }

        /* =========================
           HEADER
        ========================= */

        .header {
            text-align: center;
            padding-bottom: 8px;
            border-bottom: 1px dashed #6b7280;
        }

        .brand {
            font-size: 16px;
            font-weight: bold;
            letter-spacing: 1.5px;
            color: #2563eb;
        }

        .subtitle {
            margin-top: 2px;
            font-size: 7px;
            color: #6b7280;
        }

        .receipt-title {
            margin-top: 7px;
            font-size: 10px;
            font-weight: bold;
            letter-spacing: .7px;
        }

        /* =========================
           GENERAL
        ========================= */

        .section {
            padding: 7px 0;
            border-bottom: 1px dashed #9ca3af;
        }

        .section-title {
            margin-bottom: 5px;
            font-size: 8px;
            font-weight: bold;
            text-transform: uppercase;
            color: #374151;
        }

        .row {
            display: table;
            width: 100%;
            margin-bottom: 3px;
        }

        .label {
            display: table-cell;
            width: 43%;
            color: #6b7280;
            vertical-align: top;
        }

        .value {
            display: table-cell;
            width: 57%;
            text-align: right;
            font-weight: bold;
            vertical-align: top;
        }

        /* =========================
           CUSTOMER
        ========================= */

        .customer-name {
            font-size: 9px;
            font-weight: bold;
        }

        .customer-detail {
            margin-top: 2px;
            color: #6b7280;
            font-size: 7px;
        }

        /* =========================
           ITEMS
        ========================= */

        .item {
            padding: 5px 0;
            border-bottom: 1px dotted #d1d5db;
        }

        .item:last-child {
            border-bottom: none;
        }

        .item-name {
            font-size: 8px;
            font-weight: bold;
            margin-bottom: 2px;
        }

        .item-price {
            display: table;
            width: 100%;
            font-size: 7px;
            color: #6b7280;
        }

        .item-left {
            display: table-cell;
            width: 55%;
        }

        .item-right {
            display: table-cell;
            width: 45%;
            text-align: right;
            font-weight: bold;
            color: #111827;
        }

        /* =========================
           TOTAL
        ========================= */

        .totals {
            padding: 7px 0;
            border-bottom: 1px dashed #9ca3af;
        }

        .total-row {
            display: table;
            width: 100%;
            margin-bottom: 3px;
        }

        .total-label {
            display: table-cell;
            width: 55%;
            color: #6b7280;
        }

        .total-value {
            display: table-cell;
            width: 45%;
            text-align: right;
            font-weight: bold;
        }

        .grand-total {
            display: table;
            width: 100%;
            margin-top: 6px;
            padding-top: 6px;
            border-top: 1px solid #111827;
        }

        .grand-label {
            display: table-cell;
            width: 50%;
            font-size: 10px;
            font-weight: bold;
        }

        .grand-value {
            display: table-cell;
            width: 50%;
            text-align: right;
            font-size: 11px;
            font-weight: bold;
            color: #2563eb;
        }

        /* =========================
           PAYMENT
        ========================= */

        .payment {
            padding: 7px 0;
            border-bottom: 1px dashed #9ca3af;
        }

        .status {
            text-align: center;
            margin-bottom: 6px;
            padding: 4px 0;
            border: 1px solid #16a34a;
            font-size: 8px;
            font-weight: bold;
            color: #15803d;
        }

        .payment-row {
            display: table;
            width: 100%;
            margin-bottom: 3px;
        }

        .payment-label {
            display: table-cell;
            width: 50%;
            color: #6b7280;
        }

        .payment-value {
            display: table-cell;
            width: 50%;
            text-align: right;
            font-weight: bold;
        }

        /* =========================
           RETURN
        ========================= */

        .return-info {
            padding: 7px 0;
            border-bottom: 1px dashed #9ca3af;
        }

        /* =========================
           FOOTER
        ========================= */

        .footer {
            text-align: center;
            padding-top: 9px;
        }

        .thanks {
            font-size: 9px;
            font-weight: bold;
            letter-spacing: .5px;
        }

        .footer-text {
            margin-top: 3px;
            font-size: 7px;
            line-height: 1.5;
            color: #6b7280;
        }

        .print-date {
            margin-top: 6px;
            font-size: 6.5px;
            color: #9ca3af;
        }

        .small {
            font-size: 7px;
            color: #6b7280;
        }
    </style>
</head>

<body>

@php
    $customer = $rental->customer ?? null;

    $details = $rental->details
        ?? $rental->rentalDetails
        ?? collect();

    $pengembalian = $rental->pengembalian
        ?? ($rental->pengembalians->first() ?? null);

    $totalRental = (float) ($rental->total_price ?? 0);

    $totalBayar = (float) ($payment->amount ?? 0);

    $denda = (float) ($dendaTelat ?? 0);

    $grandTotal = $totalRental + $denda;
@endphp


<div class="receipt">

    <!-- =========================
         HEADER
    ========================= -->

    <div class="header">

        <div class="brand">
            RENTAL
        </div>

        <div class="subtitle">
            Sistem Informasi Penyewaan
        </div>

        <div class="receipt-title">
            STRUK TRANSAKSI
        </div>

    </div>


    <!-- =========================
         NOMOR TRANSAKSI
    ========================= -->

    <div class="section">

        <div class="row">
            <div class="label">
                No. Struk
            </div>

            <div class="value">
                {{ $payment->payment_code ?? 'PAY-' . $payment->id }}
            </div>
        </div>

        <div class="row">
            <div class="label">
                Kode Rental
            </div>

            <div class="value">
                {{ $rental->rental_code ?? '-' }}
            </div>
        </div>

        <div class="row">
            <div class="label">
                Tanggal
            </div>

            <div class="value">
                {{ $payment->payment_date
                    ? \Carbon\Carbon::parse($payment->payment_date)->format('d/m/Y')
                    : now()->format('d/m/Y') }}
            </div>
        </div>

        <div class="row">
            <div class="label">
                Jam
            </div>

            <div class="value">
                {{ now()->format('H:i') }}
            </div>
        </div>

    </div>


    <!-- =========================
         PELANGGAN
    ========================= -->

    <div class="section">

        <div class="section-title">
            Pelanggan
        </div>

        <div class="customer-name">
            {{ $customer->name ?? '-' }}
        </div>

        @if(!empty($customer->phone))

            <div class="customer-detail">
                {{ $customer->phone }}
            </div>

        @endif

    </div>


    <!-- =========================
         PERIODE RENTAL
    ========================= -->

    <div class="section">

        <div class="row">

            <div class="label">
                Mulai Sewa
            </div>

            <div class="value">

                {{ $rental->rental_date
                    ? \Carbon\Carbon::parse($rental->rental_date)->format('d/m/Y')
                    : '-' }}

            </div>

        </div>

        <div class="row">

            <div class="label">
                Pengembalian
            </div>

            <div class="value">

                {{ $rental->return_date
                    ? \Carbon\Carbon::parse($rental->return_date)->format('d/m/Y')
                    : '-' }}

            </div>

        </div>

    </div>


    <!-- =========================
         BARANG
    ========================= -->

    <div class="section">

        <div class="section-title">
            Detail Barang
        </div>

        @forelse($details as $detail)

            @php

                $product = $detail->product ?? null;

                $quantity = (int) ($detail->quantity ?? 0);

                $price = (float) ($detail->price ?? 0);

                $subtotal = (float) (
                    $detail->subtotal
                    ?? ($price * $quantity)
                );

            @endphp

            <div class="item">

                <div class="item-name">
                    {{ $product->name ?? 'Barang Rental' }}
                </div>

                <div class="item-price">

                    <div class="item-left">
                        {{ $quantity }} ×
                        Rp {{ number_format($price, 0, ',', '.') }}
                    </div>

                    <div class="item-right">
                        Rp {{ number_format($subtotal, 0, ',', '.') }}
                    </div>

                </div>

            </div>

        @empty

            <div class="small">
                Tidak ada detail barang.
            </div>

        @endforelse

    </div>


    <!-- =========================
         TOTAL
    ========================= -->

    <div class="totals">

        <div class="total-row">

            <div class="total-label">
                Subtotal
            </div>

            <div class="total-value">
                Rp {{ number_format($totalRental, 0, ',', '.') }}
            </div>

        </div>


        @if($denda > 0)

            <div class="total-row">

                <div class="total-label">
                    Denda
                </div>

                <div class="total-value">
                    Rp {{ number_format($denda, 0, ',', '.') }}
                </div>

            </div>

        @endif


        <div class="grand-total">

            <div class="grand-label">
                TOTAL
            </div>

            <div class="grand-value">
                Rp {{ number_format($grandTotal, 0, ',', '.') }}
            </div>

        </div>

    </div>


    <!-- =========================
         PEMBAYARAN
    ========================= -->

    <div class="payment">

        <div class="status">

            @if(($payment->payment_status ?? '') === 'Lunas')
                PEMBAYARAN LUNAS
            @else
                {{ strtoupper($payment->payment_status ?? 'MENUNGGU') }}
            @endif

        </div>


        <div class="payment-row">

            <div class="payment-label">
                Metode
            </div>

            <div class="payment-value">
                {{ $payment->payment_method ?? '-' }}
            </div>

        </div>


        <div class="payment-row">

            <div class="payment-label">
                Dibayar
            </div>

            <div class="payment-value">
                Rp {{ number_format($totalBayar, 0, ',', '.') }}
            </div>

        </div>

    </div>


    <!-- =========================
         PENGEMBALIAN
    ========================= -->

    @if($pengembalian)

        <div class="return-info">

            <div class="section-title">
                Pengembalian
            </div>

            <div class="row">

                <div class="label">
                    Status
                </div>

                <div class="value">
                    Sudah Dikembalikan
                </div>

            </div>

            @if($denda > 0)

                <div class="row">

                    <div class="label">
                        Denda
                    </div>

                    <div class="value">
                        Rp {{ number_format($denda, 0, ',', '.') }}
                    </div>

                </div>

            @endif

        </div>

    @endif


    <!-- =========================
         FOOTER
    ========================= -->

    <div class="footer">

        <div class="thanks">
            TERIMA KASIH
        </div>

        <div class="footer-text">
            Terima kasih telah menggunakan<br>
            layanan rental kami.
        </div>

        <div class="print-date">
            Dicetak {{ now()->format('d/m/Y H:i') }}
        </div>

    </div>

</div>

</body>
</html>
```
