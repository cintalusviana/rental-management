@extends('pelanggan.layout')

@section('title', 'Pembayaran')

@section('page-title', 'Pembayaran')

@section('breadcrumb', 'Pembayaran')

@section('content')

<style>

/* =========================================================
   PAYMENT PAGE
========================================================= */

.payment-page {
    animation: paymentFade .35s ease;
}

@keyframes paymentFade {
    from {
        opacity: 0;
        transform: translateY(8px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}


/* =========================================================
   HEADER
========================================================= */

.payment-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    gap: 20px;
    margin-bottom: 28px;
    flex-wrap: wrap;
}

.payment-heading {
    display: flex;
    align-items: center;
    gap: 15px;
}

.payment-heading-icon {
    width: 54px;
    height: 54px;
    border-radius: 16px;
    background: linear-gradient(135deg, #2563EB, #3B82F6);
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 23px;
    box-shadow: 0 10px 25px rgba(37, 99, 235, .20);
}

.payment-heading h1 {
    margin: 0;
    color: #0F172A;
    font-size: 27px;
    font-weight: 800;
}

.payment-heading p {
    margin: 5px 0 0;
    color: #64748B;
    font-size: 14px;
}


/* =========================================================
   ALERT
========================================================= */

.payment-alert {
    border: none;
    border-radius: 14px;
    padding: 14px 18px;
    margin-bottom: 22px;
    box-shadow: 0 5px 18px rgba(15, 23, 42, .04);
}


/* =========================================================
   RENTAL SELECTOR
========================================================= */

.rental-selector-card {
    background: #fff;
    border: 1px solid #E2E8F0;
    border-radius: 20px;
    padding: 18px 20px;
    margin-bottom: 22px;
    box-shadow: 0 8px 25px rgba(15, 23, 42, .04);
}

.rental-selector-label {
    display: block;
    font-size: 12px;
    color: #64748B;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .5px;
    margin-bottom: 8px;
}

.rental-selector {
    display: flex;
    align-items: center;
    gap: 14px;
}

.rental-selector-icon {
    width: 44px;
    height: 44px;
    flex-shrink: 0;
    border-radius: 13px;
    background: #EFF6FF;
    color: #2563EB;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 19px;
}

.rental-selector select {
    height: 46px;
    border-radius: 12px;
    border: 1px solid #E2E8F0;
    font-size: 14px;
    font-weight: 600;
    color: #334155;
}

.rental-selector select:focus {
    border-color: #93C5FD;
    box-shadow: 0 0 0 3px rgba(37, 99, 235, .08);
}


/* =========================================================
   MAIN GRID
========================================================= */

.payment-grid {
    display: grid;
    grid-template-columns: minmax(0, 1.35fr) minmax(320px, .65fr);
    gap: 22px;
}


/* =========================================================
   CARD
========================================================= */

.payment-card {
    background: #fff;
    border: 1px solid #E2E8F0;
    border-radius: 22px;
    box-shadow: 0 10px 30px rgba(15, 23, 42, .05);
    overflow: hidden;
}

.payment-card-header {
    padding: 22px 24px;
    border-bottom: 1px solid #F1F5F9;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px;
}

.payment-card-title {
    display: flex;
    align-items: center;
    gap: 11px;
}

.payment-card-title-icon {
    width: 40px;
    height: 40px;
    border-radius: 12px;
    background: #EFF6FF;
    color: #2563EB;
    display: flex;
    align-items: center;
    justify-content: center;
}

.payment-card-title h3 {
    margin: 0;
    color: #0F172A;
    font-size: 17px;
    font-weight: 800;
}

.payment-card-title p {
    margin: 3px 0 0;
    color: #94A3B8;
    font-size: 12px;
}


/* =========================================================
   INVOICE
========================================================= */

.invoice-body {
    padding: 25px;
}

.invoice-top {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 20px;
    margin-bottom: 25px;
}

.invoice-label {
    color: #94A3B8;
    text-transform: uppercase;
    letter-spacing: .7px;
    font-size: 11px;
    font-weight: 800;
    margin-bottom: 5px;
}

.invoice-code {
    margin: 0;
    color: #2563EB;
    font-size: 24px;
    font-weight: 800;
}

.invoice-status {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 8px 13px;
    border-radius: 30px;
    font-size: 12px;
    font-weight: 700;
    white-space: nowrap;
}

.status-paid {
    background: #DCFCE7;
    color: #15803D;
}

.status-waiting {
    background: #FEF3C7;
    color: #B45309;
}

.status-rejected {
    background: #FEE2E2;
    color: #B91C1C;
}

.status-unpaid {
    background: #F1F5F9;
    color: #64748B;
}

.status-process {
    background: #DBEAFE;
    color: #1D4ED8;
}


/* =========================================================
   CUSTOMER INFO
========================================================= */

.customer-info-box {
    background: #F8FAFC;
    border: 1px solid #F1F5F9;
    border-radius: 15px;
    padding: 15px 17px;
    margin-bottom: 22px;
}

.customer-info-label {
    color: #94A3B8;
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
}

.customer-info-name {
    margin-top: 4px;
    color: #1E293B;
    font-size: 15px;
    font-weight: 700;
}


/* =========================================================
   DETAIL TABLE
========================================================= */

.invoice-table {
    width: 100%;
    border-collapse: collapse;
}

.invoice-table tr {
    border-bottom: 1px solid #F1F5F9;
}

.invoice-table tr:last-child {
    border-bottom: none;
}

.invoice-table td {
    padding: 14px 0;
    font-size: 13px;
    vertical-align: top;
}

.invoice-table td:first-child {
    color: #64748B;
    width: 42%;
}

.invoice-table td:last-child {
    color: #1E293B;
    text-align: right;
    font-weight: 600;
}

.product-list {
    display: flex;
    flex-direction: column;
    gap: 6px;
    align-items: flex-end;
}

.product-item {
    background: #F8FAFC;
    border: 1px solid #E2E8F0;
    border-radius: 8px;
    padding: 5px 9px;
    font-size: 12px;
}


/* =========================================================
   TOTAL
========================================================= */

.total-box {
    margin-top: 20px;
    padding: 18px;
    background: linear-gradient(135deg, #EFF6FF, #F8FAFC);
    border: 1px solid #DBEAFE;
    border-radius: 16px;
}

.total-label {
    color: #64748B;
    font-size: 12px;
    font-weight: 600;
}

.total-price {
    margin-top: 4px;
    color: #2563EB;
    font-size: 27px;
    font-weight: 800;
}

.total-note {
    color: #64748B;
    font-size: 11px;
    margin-top: 6px;
}


/* =========================================================
   BUTTON
========================================================= */

.btn-print-invoice {
    height: 48px;
    border: none;
    border-radius: 12px;
    background: #2563EB;
    color: #fff;
    font-size: 13px;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    text-decoration: none;
    transition: .2s;
}

.btn-print-invoice:hover {
    background: #1D4ED8;
    color: #fff;
    transform: translateY(-1px);
}


/* =========================================================
   UPLOAD
========================================================= */

.upload-body {
    padding: 25px;
}

.upload-description {
    color: #64748B;
    font-size: 13px;
    line-height: 1.7;
    margin-bottom: 20px;
}

.upload-area {
    border: 2px dashed #CBD5E1;
    border-radius: 17px;
    padding: 28px 18px;
    text-align: center;
    background: #FAFCFF;
    transition: .25s;
    margin-bottom: 20px;
}

.upload-area:hover {
    border-color: #60A5FA;
    background: #F8FBFF;
}

.upload-icon {
    width: 58px;
    height: 58px;
    border-radius: 17px;
    background: #EFF6FF;
    color: #2563EB;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 14px;
    font-size: 26px;
}

.upload-title {
    color: #1E293B;
    font-size: 14px;
    font-weight: 700;
    margin-bottom: 5px;
}

.upload-help {
    color: #94A3B8;
    font-size: 11px;
    line-height: 1.6;
    margin-bottom: 16px;
}

.upload-input {
    font-size: 12px;
    border-radius: 10px;
}

.form-label-custom {
    color: #334155;
    font-size: 12px;
    font-weight: 700;
    margin-bottom: 7px;
}

.form-control-custom,
.form-select-custom {
    height: 46px;
    border: 1px solid #E2E8F0;
    border-radius: 11px;
    font-size: 13px;
}

.form-control-custom:focus,
.form-select-custom:focus {
    border-color: #93C5FD;
    box-shadow: 0 0 0 3px rgba(37, 99, 235, .08);
}

.btn-submit-payment {
    height: 48px;
    border: none;
    border-radius: 12px;
    background: #2563EB;
    color: #fff;
    font-size: 13px;
    font-weight: 700;
    width: 100%;
    transition: .2s;
}

.btn-submit-payment:hover {
    background: #1D4ED8;
}


/* =========================================================
   PAYMENT STATE
========================================================= */

.payment-state {
    min-height: 390px;
    padding: 35px 25px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
}

.payment-state-icon {
    width: 78px;
    height: 78px;
    margin: 0 auto 18px;
    border-radius: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 35px;
}

.state-waiting {
    background: #FEF3C7;
    color: #D97706;
}

.state-success {
    background: #DCFCE7;
    color: #16A34A;
}

.state-rejected {
    background: #FEE2E2;
    color: #DC2626;
}

.state-process {
    background: #DBEAFE;
    color: #2563EB;
}

.payment-state h3 {
    color: #1E293B;
    font-size: 19px;
    font-weight: 800;
}

.payment-state p {
    color: #64748B;
    font-size: 13px;
    line-height: 1.7;
}


/* =========================================================
   HISTORY
========================================================= */

.history-card {
    margin-top: 22px;
}

.history-body {
    padding: 22px;
}

.history-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    padding: 15px;
    border: 1px solid #E2E8F0;
    border-radius: 15px;
    margin-bottom: 11px;
    transition: .2s;
}

.history-item:last-child {
    margin-bottom: 0;
}

.history-item:hover {
    border-color: #BFDBFE;
    background: #FAFCFF;
}

.history-left {
    display: flex;
    align-items: center;
    gap: 12px;
    min-width: 0;
}

.history-icon {
    width: 42px;
    height: 42px;
    flex-shrink: 0;
    border-radius: 12px;
    background: #EFF6FF;
    color: #2563EB;
    display: flex;
    align-items: center;
    justify-content: center;
}

.history-code {
    color: #2563EB;
    font-size: 13px;
    font-weight: 800;
}

.history-product {
    color: #334155;
    font-size: 12px;
    margin-top: 2px;
}

.history-date {
    color: #94A3B8;
    font-size: 11px;
    margin-top: 2px;
}

.history-right {
    display: flex;
    align-items: center;
    gap: 10px;
}

.history-price {
    color: #1E293B;
    font-size: 12px;
    font-weight: 700;
    white-space: nowrap;
}

.history-btn {
    width: 35px;
    height: 35px;
    border-radius: 10px;
    border: 1px solid #DBEAFE;
    background: #EFF6FF;
    color: #2563EB;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
}

.history-btn:hover {
    background: #2563EB;
    color: #fff;
}


/* =========================================================
   EMPTY
========================================================= */

.empty-payment {
    background: #fff;
    border: 1px solid #E2E8F0;
    border-radius: 22px;
    padding: 65px 25px;
    text-align: center;
    box-shadow: 0 10px 30px rgba(15, 23, 42, .04);
}

.empty-payment-icon {
    width: 70px;
    height: 70px;
    border-radius: 22px;
    background: #F1F5F9;
    color: #94A3B8;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 18px;
    font-size: 30px;
}

.empty-payment h3 {
    color: #334155;
    font-size: 18px;
    font-weight: 800;
}

.empty-payment p {
    color: #94A3B8;
    font-size: 13px;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 1100px) {

    .payment-grid {
        grid-template-columns: 1fr;
    }

}

@media (max-width: 768px) {

    .payment-header {
        align-items: flex-start;
    }

    .payment-heading h1 {
        font-size: 23px;
    }

    .payment-heading-icon {
        width: 48px;
        height: 48px;
    }

    .invoice-body,
    .upload-body {
        padding: 20px;
    }

    .invoice-top {
        flex-direction: column;
    }

    .history-item {
        align-items: flex-start;
    }

    .history-right {
        flex-direction: column;
        align-items: flex-end;
    }

}

@media (max-width: 520px) {

    .payment-heading {
        align-items: flex-start;
    }

    .payment-heading p {
        max-width: 260px;
    }

    .rental-selector {
        align-items: flex-start;
    }

    .history-item {
        flex-direction: column;
    }

    .history-right {
        width: 100%;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
    }

    .invoice-table td {
        font-size: 12px;
    }

    .total-price {
        font-size: 23px;
    }

}

</style>


<div class="payment-page">

    {{-- =====================================================
         ALERT
    ====================================================== --}}

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show payment-alert">

            <i class="bi bi-check-circle-fill me-2"></i>

            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    @if(session('error'))

        <div class="alert alert-danger alert-dismissible fade show payment-alert">

            <i class="bi bi-exclamation-circle-fill me-2"></i>

            {{ session('error') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    @if($errors->any())

        <div class="alert alert-danger payment-alert">

            <div class="fw-bold mb-1">

                <i class="bi bi-exclamation-triangle-fill me-2"></i>

                Terjadi kesalahan

            </div>

            <ul class="mb-0 ps-4">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="payment-header">

        <div class="payment-heading">

            <div class="payment-heading-icon">

                <i class="bi bi-credit-card-2-front-fill"></i>

            </div>

            <div>

                <h1>Pembayaran</h1>

                <p>
                    Pembayaran dilakukan setelah proses pengembalian rental selesai.
                </p>

            </div>

        </div>

    </div>


    @if(!$rental)

        {{-- =================================================
             EMPTY
        ================================================== --}}

        <div class="empty-payment">

            <div class="empty-payment-icon">

                <i class="bi bi-receipt"></i>

            </div>

            <h3>Belum Ada Penyewaan</h3>

            <p>
                Anda belum memiliki transaksi penyewaan.
            </p>

            @if(Route::has('pelanggan.products'))

                <a
                    href="{{ route('pelanggan.products') }}"
                    class="btn btn-primary rounded-pill px-4 mt-2"
                >

                    <i class="bi bi-box-seam me-2"></i>

                    Lihat Barang

                </a>

            @endif

        </div>

    @else


        {{-- =================================================
             DATA STATUS PEMBAYARAN
        ================================================== --}}

        @php

            /*
             * Prioritas payment:
             * 1. Lunas
             * 2. Menunggu
             * 3. Payment terbaru
             *
             * Ini penting supaya jika sudah pernah Lunas,
             * status tidak berubah hanya karena ada record
             * payment lain yang lebih baru.
             */

            $paidPayment = $rental->payments
                ->where('payment_status', 'Lunas')
                ->sortByDesc(function ($payment) {
                    return $payment->payment_date ?? $payment->created_at;
                })
                ->first();

            $waitingPayment = $rental->payments
                ->where('payment_status', 'Menunggu')
                ->sortByDesc(function ($payment) {
                    return $payment->payment_date ?? $payment->created_at;
                })
                ->first();

            $latestPayment = $rental->payments
                ->sortByDesc(function ($payment) {
                    return $payment->payment_date ?? $payment->created_at;
                })
                ->first();

            /*
             * Payment yang dipakai untuk tampilan.
             */
            if ($paidPayment) {

                $currentPayment = $paidPayment;

            } elseif ($waitingPayment) {

                $currentPayment = $waitingPayment;

            } else {

                $currentPayment = $latestPayment;

            }


            /*
             * Total denda.
             */
            $totalDenda = (float) ($rental->total_denda ?? 0);


            /*
             * Total tagihan akhir.
             *
             * Prioritas:
             * total_tagihan
             * jika tidak ada, total_price + total_denda
             */

            $totalTagihan = isset($rental->total_tagihan)
                ? (float) $rental->total_tagihan
                : ((float) ($rental->total_price ?? 0) + $totalDenda);


            /*
             * Status rental.
             */
            $rentalStatus = strtolower(
                trim((string) ($rental->status ?? ''))
            );


            /*
             * Pembayaran hanya dibuka setelah rental selesai /
             * barang sudah dikembalikan.
             *
             * Dibuat cukup fleksibel terhadap nama status.
             */

            $rentalSudahSelesai =
                in_array($rentalStatus, [
                    'selesai',
                    'dikembalikan',
                    'sudah dikembalikan',
                    'menunggu pembayaran',
                    'siap dibayar',
                    'selesai dikembalikan',
                    'returned',
                    'completed',
                    'complete'
                ]);


            /*
             * Jika status rental memang memakai "Selesai",
             * pembayaran bisa dilakukan.
             *
             * Jika sudah Lunas, tetap tampil lunas.
             */

            $sudahLunas = $paidPayment &&
                $paidPayment->payment_status === 'Lunas';

        @endphp


        {{-- =================================================
             PILIH RENTAL
        ================================================== --}}

        @if($rentals->count() > 1)

            <div class="rental-selector-card">

                <label class="rental-selector-label">

                    Pilih Transaksi Penyewaan

                </label>

                <div class="rental-selector">

                    <div class="rental-selector-icon">

                        <i class="bi bi-receipt"></i>

                    </div>

                    <select
                        class="form-select"
                        onchange="changeRental(this.value)"
                    >

                        @foreach($rentals as $item)

                            <option
                                value="{{ $item->id }}"
                                {{ $rental->id == $item->id ? 'selected' : '' }}
                            >

                                {{ $item->rental_code }}

                                —

                                Rp {{ number_format(
                                    $item->total_tagihan
                                    ?? (($item->total_price ?? 0) + ($item->total_denda ?? 0)),
                                    0,
                                    ',',
                                    '.'
                                ) }}

                            </option>

                        @endforeach

                    </select>

                </div>

            </div>

        @endif


        {{-- =================================================
             MAIN CONTENT
        ================================================== --}}

        <div class="payment-grid">


            {{-- =================================================
                 DETAIL TAGIHAN
            ================================================== --}}

            <div class="payment-card">

                <div class="payment-card-header">

                    <div class="payment-card-title">

                        <div class="payment-card-title-icon">

                            <i class="bi bi-receipt"></i>

                        </div>

                        <div>

                            <h3>Detail Tagihan</h3>

                            <p>
                                Rincian akhir transaksi rental
                            </p>

                        </div>

                    </div>


                    {{-- STATUS --}}

                    @if($sudahLunas)

                        <span class="invoice-status status-paid">

                            <i class="bi bi-check-circle-fill"></i>

                            Lunas

                        </span>

                    @elseif($currentPayment && $currentPayment->payment_status === 'Menunggu')

                        <span class="invoice-status status-waiting">

                            <i class="bi bi-clock-fill"></i>

                            Menunggu

                        </span>

                    @elseif($currentPayment && $currentPayment->payment_status === 'Ditolak')

                        <span class="invoice-status status-rejected">

                            <i class="bi bi-x-circle-fill"></i>

                            Ditolak

                        </span>

                    @elseif($rentalSudahSelesai)

                        <span class="invoice-status status-unpaid">

                            <i class="bi bi-wallet2"></i>

                            Belum Bayar

                        </span>

                    @else

                        <span class="invoice-status status-process">

                            <i class="bi bi-hourglass-split"></i>

                            Rental Berjalan

                        </span>

                    @endif

                </div>


                <div class="invoice-body">


                    {{-- =================================================
                         KODE RENTAL
                    ================================================== --}}

                    <div class="invoice-top">

                        <div>

                            <div class="invoice-label">

                                Kode Transaksi

                            </div>

                            <h2 class="invoice-code">

                                {{ $rental->rental_code }}

                            </h2>

                        </div>

                    </div>


                    {{-- =================================================
                         CUSTOMER
                    ================================================== --}}

                    <div class="customer-info-box">

                        <div class="customer-info-label">

                            Pelanggan

                        </div>

                        <div class="customer-info-name">

                            <i class="bi bi-person-circle text-primary me-1"></i>

                            {{ $rental->customer->name ?? '-' }}

                        </div>

                    </div>


                    {{-- =================================================
                         DETAIL
                    ================================================== --}}

                    <table class="invoice-table">

                        <tr>

                            <td>
                                Barang yang disewa
                            </td>

                            <td>

                                <div class="product-list">

                                    @forelse($rental->details as $detail)

                                        <span class="product-item">

                                            <i class="bi bi-box-seam me-1 text-primary"></i>

                                            {{ $detail->product->name ?? '-' }}

                                        </span>

                                    @empty

                                        <span class="text-muted">
                                            -
                                        </span>

                                    @endforelse

                                </div>

                            </td>

                        </tr>


                        <tr>

                            <td>
                                Tanggal Sewa
                            </td>

                            <td>

                                {{ $rental->rental_date
                                    ? \Carbon\Carbon::parse($rental->rental_date)->format('d M Y')
                                    : '-'
                                }}

                            </td>

                        </tr>


                        <tr>

                            <td>
                                Tanggal Kembali
                            </td>

                            <td>

                                {{ $rental->return_date
                                    ? \Carbon\Carbon::parse($rental->return_date)->format('d M Y')
                                    : '-'
                                }}

                            </td>

                        </tr>


                        <tr>

                            <td>
                                Lama Sewa
                            </td>

                            <td>

                                @if($rental->rental_date && $rental->return_date)

                                    {{ \Carbon\Carbon::parse($rental->rental_date)
                                        ->diffInDays(
                                            \Carbon\Carbon::parse($rental->return_date)
                                        )
                                    }}

                                    Hari

                                @else

                                    -

                                @endif

                            </td>

                        </tr>


                        <tr>

                            <td>
                                Harga Sewa
                            </td>

                            <td>

                                Rp {{ number_format(
                                    $rental->total_price ?? 0,
                                    0,
                                    ',',
                                    '.'
                                ) }}

                            </td>

                        </tr>


                        {{-- DENDA --}}

                        @if($totalDenda > 0)

                            <tr>

                                <td>

                                    <span class="text-danger">

                                        Denda

                                    </span>

                                </td>

                                <td>

                                    <span class="text-danger">

                                        Rp {{ number_format(
                                            $totalDenda,
                                            0,
                                            ',',
                                            '.'
                                        ) }}

                                    </span>

                                </td>

                            </tr>

                        @endif


                        {{-- METODE PAYMENT --}}

                        @if($currentPayment)

                            <tr>

                                <td>
                                    Metode Pembayaran
                                </td>

                                <td>

                                    {{ $currentPayment->payment_method ?? '-' }}

                                </td>

                            </tr>

                        @endif

                    </table>


                    {{-- =================================================
                         TOTAL AKHIR
                    ================================================== --}}

                    <div class="total-box">

                        <div class="total-label">

                            Total Tagihan Akhir

                        </div>


                        @if($totalDenda > 0)

                            <div style="margin-top:12px;">

                                <div class="d-flex justify-content-between mb-2">

                                    <span class="text-muted">

                                        Harga Sewa

                                    </span>

                                    <strong>

                                        Rp {{ number_format(
                                            $rental->total_price ?? 0,
                                            0,
                                            ',',
                                            '.'
                                        ) }}

                                    </strong>

                                </div>


                                <div class="d-flex justify-content-between mb-2 text-danger">

                                    <span>

                                        Denda

                                    </span>

                                    <strong>

                                        + Rp {{ number_format(
                                            $totalDenda,
                                            0,
                                            ',',
                                            '.'
                                        ) }}

                                    </strong>

                                </div>


                                <hr>

                            </div>

                        @endif


                        <div class="total-price">

                            Rp {{ number_format(
                                $totalTagihan,
                                0,
                                ',',
                                '.'
                            ) }}

                        </div>


                        @if($totalDenda > 0)

                            <div class="total-note">

                                <i class="bi bi-info-circle me-1"></i>

                                Total sudah termasuk denda pengembalian.

                            </div>

                        @endif

                    </div>


                    {{-- =================================================
                         CETAK INVOICE
                    ================================================== --}}

                    @if(Route::has('pelanggan.payments.print'))

                        <a
                            href="{{ route(
                                'pelanggan.payments.print',
                                $rental->id
                            ) }}"
                            class="btn-print-invoice mt-4"
                            target="_blank"
                        >

                            <i class="bi bi-printer-fill"></i>

                            Cetak / Download Invoice

                        </a>

                    @endif


                </div>

            </div>


            {{-- =================================================
                 PANEL PEMBAYARAN
            ================================================== --}}

            <div class="payment-card">


                {{-- =================================================
                     SUDAH LUNAS
                ================================================== --}}

                @if($sudahLunas)

                    <div class="payment-state">

                        <div>

                            <div class="payment-state-icon state-success">

                                <i class="bi bi-check-circle-fill"></i>

                            </div>

                            <h3 class="text-success">

                                Pembayaran Berhasil

                            </h3>

                            <p>

                                Pembayaran untuk rental

                                <strong>
                                    {{ $rental->rental_code }}
                                </strong>

                                telah diverifikasi oleh admin.

                                <br>

                                Tidak ada pembayaran tambahan yang diperlukan.

                            </p>

                        </div>

                    </div>


                {{-- =================================================
                     MENUNGGU VERIFIKASI
                ================================================== --}}

                @elseif($currentPayment &&
                        $currentPayment->payment_status === 'Menunggu')

                    <div class="payment-state">

                        <div>

                            <div class="payment-state-icon state-waiting">

                                <i class="bi bi-clock-history"></i>

                            </div>

                            <h3>

                                Menunggu Verifikasi

                            </h3>

                            <p>

                                Bukti pembayaran Anda sudah berhasil dikirim.

                                <br>

                                Admin sedang memeriksa pembayaran sebesar

                                <strong>

                                    Rp {{ number_format(
                                        $currentPayment->amount ?? $totalTagihan,
                                        0,
                                        ',',
                                        '.'
                                    ) }}

                                </strong>

                                .

                            </p>

                        </div>

                    </div>


                {{-- =================================================
                     RENTAL BELUM SELESAI
                ================================================== --}}

                @elseif(!$rentalSudahSelesai)

                    <div class="payment-state">

                        <div>

                            <div class="payment-state-icon state-process">

                                <i class="bi bi-hourglass-split"></i>

                            </div>

                            <h3>

                                Pembayaran Belum Dibuka

                            </h3>

                            <p>

                                Pembayaran dilakukan

                                <strong>
                                    setelah barang dikembalikan
                                </strong>

                                dan proses pengembalian selesai.

                                <br><br>

                                Jika terdapat denda, denda akan otomatis
                                digabungkan dengan harga sewa menjadi

                                <strong>
                                    satu total tagihan akhir.
                                </strong>

                            </p>

                        </div>

                    </div>


                {{-- =================================================
                     DITOLAK / BELUM BAYAR
                ================================================== --}}

                @else


                    <div class="payment-card-header">

                        <div class="payment-card-title">

                            <div class="payment-card-title-icon">

                                <i class="bi bi-cloud-arrow-up-fill"></i>

                            </div>

                            <div>

                                <h3>

                                    Bukti Pembayaran

                                </h3>

                                <p>

                                    Kirim bukti pembayaran akhir

                                </p>

                            </div>

                        </div>

                    </div>


                    <div class="upload-body">


                        @if($currentPayment &&
                            $currentPayment->payment_status === 'Ditolak')

                            <div class="alert alert-danger rounded-4 border-0 mb-4">

                                <div class="fw-bold mb-1">

                                    <i class="bi bi-x-circle-fill me-1"></i>

                                    Pembayaran Ditolak

                                </div>

                                <div style="font-size:12px;">

                                    Bukti pembayaran sebelumnya ditolak oleh
                                    admin. Silakan upload bukti pembayaran
                                    yang benar.

                                </div>

                            </div>

                        @endif


                        <p class="upload-description">

                            Pembayaran dilakukan setelah pengembalian selesai.

                            <br><br>

                            Total yang harus dibayar adalah:

                            <strong>

                                Rp {{ number_format(
                                    $totalTagihan,
                                    0,
                                    ',',
                                    '.'
                                ) }}

                            </strong>

                            @if($totalDenda > 0)

                                , termasuk denda

                                <strong class="text-danger">

                                    Rp {{ number_format(
                                        $totalDenda,
                                        0,
                                        ',',
                                        '.'
                                    ) }}

                                </strong>.

                            @endif

                        </p>


                        {{-- =================================================
                             FORM PAYMENT
                        ================================================== --}}

                        <form
                            action="{{ route('pelanggan.payments.store') }}"
                            method="POST"
                            enctype="multipart/form-data"
                        >

                            @csrf


                            <input
                                type="hidden"
                                name="rental_id"
                                value="{{ $rental->id }}"
                            >


                            <input
                                type="hidden"
                                name="amount"
                                value="{{ $totalTagihan }}"
                            >


                            {{-- TOTAL YANG AKAN DIBAYAR --}}

                            <div class="customer-info-box mb-4">

                                <div class="customer-info-label">

                                    Total Pembayaran

                                </div>

                                <div
                                    class="customer-info-name text-primary"
                                    style="font-size:21px;"
                                >

                                    Rp {{ number_format(
                                        $totalTagihan,
                                        0,
                                        ',',
                                        '.'
                                    ) }}

                                </div>

                                @if($totalDenda > 0)

                                    <div
                                        class="text-danger mt-1"
                                        style="font-size:11px;"
                                    >

                                        <i class="bi bi-exclamation-circle me-1"></i>

                                        Sudah termasuk denda pengembalian.

                                    </div>

                                @endif

                            </div>


                            {{-- =================================================
                                 UPLOAD
                            ================================================== --}}

                            <div class="upload-area">

                                <div class="upload-icon">

                                    <i class="bi bi-cloud-arrow-up-fill"></i>

                                </div>

                                <div class="upload-title">

                                    Pilih Bukti Pembayaran

                                </div>

                                <div class="upload-help">

                                    JPG, JPEG, PNG, atau WEBP

                                    <br>

                                    Maksimal ukuran 5 MB

                                </div>

                                <input
                                    type="file"
                                    name="proof"
                                    class="form-control upload-input"
                                    accept=".jpg,.jpeg,.png,.webp"
                                    required
                                >

                            </div>


                            {{-- =================================================
                                 METODE PEMBAYARAN
                            ================================================== --}}

                            <div class="mb-3">

                                <label class="form-label-custom">

                                    <i class="bi bi-credit-card me-1"></i>

                                    Metode Pembayaran

                                </label>

                                <select
                                    name="payment_method"
                                    class="form-select form-select-custom"
                                    required
                                >

                                    <option value="">

                                        Pilih metode pembayaran

                                    </option>

                                    <option value="Transfer BCA">

                                        Transfer BCA

                                    </option>

                                    <option value="Transfer BNI">

                                        Transfer BNI

                                    </option>

                                    <option value="Transfer Mandiri">

                                        Transfer Mandiri

                                    </option>

                                    <option value="QRIS">

                                        QRIS

                                    </option>

                                    <option value="Cash">

                                        Cash

                                    </option>

                                </select>

                            </div>


                            {{-- =================================================
                                 SUBMIT
                            ================================================== --}}

                            <button
                                type="submit"
                                class="btn-submit-payment"
                            >

                                <i class="bi bi-send-fill me-2"></i>

                                Kirim Bukti Pembayaran

                            </button>


                        </form>

                    </div>

                @endif

            </div>

        </div>


        {{-- =================================================
             HISTORY
        ================================================== --}}

        @if($rentals->count() > 0)

            <div class="payment-card history-card">

                <div class="payment-card-header">

                    <div class="payment-card-title">

                        <div class="payment-card-title-icon">

                            <i class="bi bi-clock-history"></i>

                        </div>

                        <div>

                            <h3>

                                Riwayat Penyewaan

                            </h3>

                            <p>

                                Daftar transaksi rental Anda

                            </p>

                        </div>

                    </div>

                </div>


                <div class="history-body">

                    @foreach($rentals as $item)

                        @php

                            /*
                             * Payment Lunas harus diprioritaskan.
                             */

                            $itemPaidPayment = $item->payments
                                ->where('payment_status', 'Lunas')
                                ->sortByDesc(function ($payment) {
                                    return $payment->payment_date ?? $payment->created_at;
                                })
                                ->first();

                            $itemWaitingPayment = $item->payments
                                ->where('payment_status', 'Menunggu')
                                ->sortByDesc(function ($payment) {
                                    return $payment->payment_date ?? $payment->created_at;
                                })
                                ->first();

                            $itemLatestPayment = $item->payments
                                ->sortByDesc(function ($payment) {
                                    return $payment->payment_date ?? $payment->created_at;
                                })
                                ->first();

                            if ($itemPaidPayment) {

                                $itemPayment = $itemPaidPayment;

                            } elseif ($itemWaitingPayment) {

                                $itemPayment = $itemWaitingPayment;

                            } else {

                                $itemPayment = $itemLatestPayment;

                            }


                            $itemStatus = strtolower(
                                trim((string) ($item->status ?? ''))
                            );


                            $itemSelesai =
                                in_array($itemStatus, [
                                    'selesai',
                                    'dikembalikan',
                                    'sudah dikembalikan',
                                    'menunggu pembayaran',
                                    'siap dibayar',
                                    'selesai dikembalikan',
                                    'returned',
                                    'completed',
                                    'complete'
                                ]);


                            $itemTotalDenda =
                                (float) ($item->total_denda ?? 0);


                            $itemTotalTagihan =
                                isset($item->total_tagihan)
                                ? (float) $item->total_tagihan
                                : (
                                    (float) ($item->total_price ?? 0)
                                    + $itemTotalDenda
                                );

                        @endphp


                        <div class="history-item">


                            {{-- LEFT --}}

                            <div class="history-left">

                                <div class="history-icon">

                                    <i class="bi bi-receipt-cutoff"></i>

                                </div>


                                <div>

                                    <div class="history-code">

                                        {{ $item->rental_code }}

                                    </div>


                                    <div class="history-product">

                                        {{ $item->details->first()->product->name
                                            ?? 'Barang rental'
                                        }}

                                    </div>


                                    <div class="history-date">

                                        {{ $item->rental_date
                                            ? \Carbon\Carbon::parse(
                                                $item->rental_date
                                            )->format('d M Y')
                                            : '-'
                                        }}

                                        —

                                        {{ $item->return_date
                                            ? \Carbon\Carbon::parse(
                                                $item->return_date
                                            )->format('d M Y')
                                            : '-'
                                        }}

                                    </div>

                                </div>

                            </div>


                            {{-- RIGHT --}}

                            <div class="history-right">


                                <div class="history-price">

                                    Rp {{ number_format(
                                        $itemTotalTagihan,
                                        0,
                                        ',',
                                        '.'
                                    ) }}

                                </div>


                                @if(
                                    $itemPayment &&
                                    $itemPayment->payment_status === 'Lunas'
                                )

                                    <span
                                        class="badge bg-success rounded-pill px-3 py-2"
                                    >

                                        <i class="bi bi-check-circle me-1"></i>

                                        Lunas

                                    </span>


                                @elseif(
                                    $itemPayment &&
                                    $itemPayment->payment_status === 'Menunggu'
                                )

                                    <span
                                        class="badge bg-warning text-dark rounded-pill px-3 py-2"
                                    >

                                        <i class="bi bi-clock me-1"></i>

                                        Menunggu

                                    </span>


                                @elseif(
                                    $itemPayment &&
                                    $itemPayment->payment_status === 'Ditolak'
                                )

                                    <span
                                        class="badge bg-danger rounded-pill px-3 py-2"
                                    >

                                        <i class="bi bi-x-circle me-1"></i>

                                        Ditolak

                                    </span>


                                @elseif($itemSelesai)

                                    <span
                                        class="badge bg-secondary rounded-pill px-3 py-2"
                                    >

                                        Belum Bayar

                                    </span>


                                @else

                                    <span
                                        class="badge bg-primary rounded-pill px-3 py-2"
                                    >

                                        <i class="bi bi-hourglass me-1"></i>

                                        Rental Berjalan

                                    </span>

                                @endif


                                <a
                                    href="{{ route(
                                        'pelanggan.payments',
                                        ['rental' => $item->id]
                                    ) }}"
                                    class="history-btn"
                                    title="Lihat pembayaran"
                                >

                                    <i class="bi bi-arrow-right"></i>

                                </a>


                            </div>


                        </div>

                    @endforeach

                </div>

            </div>

        @endif


    @endif

</div>


<script>

function changeRental(id)
{
    if (!id) {
        return;
    }

    window.location.href =
        "{{ route('pelanggan.payments') }}" +
        "?rental=" +
        encodeURIComponent(id);
}

</script>

@endsection