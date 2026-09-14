@extends('layout.app')

@section('content')

<style>
/* =========================================================
   EDIT PENYEWAAN
   ========================================================= */

.edit-rental-page,
.edit-rental-page * {
    box-sizing: border-box;
}

.edit-rental-page {
    width: 100%;
    padding: 4px 12px 40px;
    color: #172033;
}

/* =========================================================
   PAGE HEADER
   ========================================================= */

.edit-rental-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    margin-bottom: 24px;
}

.edit-rental-header-left {
    min-width: 0;
}

.edit-rental-title-row {
    display: flex;
    align-items: flex-start;
    gap: 13px;
}

.edit-rental-title-icon {
    width: 46px;
    height: 46px;

    flex: 0 0 46px;

    display: flex;
    align-items: center;
    justify-content: center;

    margin-top: 1px;

    border-radius: 12px;

    background: #eff6ff;
    color: #2563eb;

    font-size: 20px;

    box-shadow:
        0 5px 14px rgba(37, 99, 235, .10);
}

.edit-rental-title {
    margin: 0 !important;

    font-size: 28px !important;
    line-height: 1.2 !important;

    font-weight: 800 !important;

    color: #172033 !important;

    letter-spacing: -.5px;
}

.edit-rental-subtitle {
    margin: 7px 0 0 !important;

    color: #64748b !important;

    font-size: 14px !important;
}

/* =========================================================
   BACK BUTTON
   ========================================================= */

.edit-rental-back {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;

    height: 42px;

    padding: 0 16px;

    border: 1px solid #e2e8f0;
    border-radius: 10px;

    background: #fff;
    color: #334155;

    font-size: 13px;
    font-weight: 600;

    text-decoration: none !important;

    transition: .2s ease;
}

.edit-rental-back:hover {
    background: #f8fafc;
    color: #2563eb;
    border-color: #bfdbfe;
}

/* =========================================================
   MAIN CARD
   ========================================================= */

.edit-rental-main {
    display: grid;

    grid-template-columns: 280px minmax(0, 1fr);

    min-height: 560px;

    overflow: hidden;

    border: 1px solid #e3e9f1;
    border-radius: 20px;

    background: #fff;

    box-shadow:
        0 8px 30px rgba(15, 23, 42, .055),
        0 2px 5px rgba(15, 23, 42, .025);
}

/* =========================================================
   LEFT INFORMATION
   ========================================================= */

.edit-rental-info {
    position: relative;

    padding: 28px 23px;

    overflow: hidden;

    background:
        linear-gradient(
            155deg,
            #eff6ff 0%,
            #f6f9ff 52%,
            #ffffff 100%
        );

    border-right: 1px solid #e5ebf3;
}

/* Decorative circle */

.edit-rental-info::before {
    content: "";

    position: absolute;

    width: 170px;
    height: 170px;

    right: -70px;
    top: -65px;

    border-radius: 50%;

    background: rgba(59, 130, 246, .055);

    pointer-events: none;
}

.edit-rental-info::after {
    content: "";

    position: absolute;

    width: 120px;
    height: 120px;

    left: -60px;
    bottom: -55px;

    border-radius: 50%;

    background: rgba(37, 99, 235, .035);

    pointer-events: none;
}

/* =========================================================
   LEFT DESCRIPTION
   ========================================================= */

.edit-rental-info-description {
    position: relative;

    z-index: 2;

    margin: 0;

    color: #64748b;

    font-size: 12px;
    line-height: 1.7;
}

/* =========================================================
   RENTAL CODE
   ========================================================= */

.edit-rental-code-box {
    position: relative;

    z-index: 2;

    margin-top: 28px;

    padding: 14px 15px;

    border: 1px solid rgba(219, 231, 247, .9);

    border-radius: 12px;

    background: rgba(255, 255, 255, .72);
}

.edit-rental-code-label {
    display: block;

    margin-bottom: 5px;

    color: #94a3b8;

    font-size: 10px;
    font-weight: 700;

    text-transform: uppercase;

    letter-spacing: .7px;
}

.edit-rental-code-value {
    color: #2563eb;

    font-size: 14px;

    font-weight: 800;
}

/* =========================================================
   INFO LIST
   ========================================================= */

.edit-rental-info-list {
    position: relative;

    z-index: 2;

    margin-top: 25px;
}

.edit-rental-info-item {
    display: flex;

    align-items: flex-start;

    gap: 11px;

    margin-bottom: 17px;
}

.edit-rental-info-item:last-child {
    margin-bottom: 0;
}

.edit-rental-info-item-icon {
    width: 30px;
    height: 30px;

    flex: 0 0 30px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 9px;

    background: #fff;

    color: #2563eb;

    font-size: 13px;

    box-shadow:
        0 2px 7px rgba(15, 23, 42, .04);
}

.edit-rental-info-item-text {
    min-width: 0;
}

.edit-rental-info-item-label {
    display: block;

    color: #94a3b8;

    font-size: 10px;

    font-weight: 600;
}

.edit-rental-info-item-value {
    display: block;

    margin-top: 2px;

    color: #334155;

    font-size: 12px;

    font-weight: 650;

    word-break: break-word;
}

/* =========================================================
   RIGHT FORM
   ========================================================= */

.edit-rental-form {
    min-width: 0;

    display: flex;

    flex-direction: column;

    background: #fff;
}

/* =========================================================
   FORM HEADER
   ========================================================= */

.edit-rental-form-header {
    display: flex;

    align-items: center;

    gap: 12px;

    padding: 21px 27px;

    border-bottom: 1px solid #edf1f5;
}

.edit-rental-form-icon {
    width: 41px;
    height: 41px;

    flex: 0 0 41px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 11px;

    background: #eff6ff;

    color: #2563eb;

    font-size: 17px;
}

.edit-rental-form-heading {
    min-width: 0;
}

.edit-rental-form-heading h5 {
    margin: 0;

    color: #172033;

    font-size: 16px;

    font-weight: 750;
}

.edit-rental-form-heading p {
    margin: 3px 0 0;

    color: #94a3b8;

    font-size: 11px;
}

/* =========================================================
   FORM
   ========================================================= */

#editRentalForm {
    display: flex;

    flex: 1;

    flex-direction: column;

    min-width: 0;
}

/* =========================================================
   FORM CONTENT
   ========================================================= */

.edit-rental-form-content {
    flex: 1;

    padding: 26px 27px 22px;
}

/* =========================================================
   SECTION TITLE
   ========================================================= */

.edit-rental-section-title {
    display: flex;

    align-items: center;

    gap: 9px;

    margin-bottom: 19px;
}

.edit-rental-section-title-icon {
    width: 29px;
    height: 29px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 8px;

    background: #eff6ff;

    color: #2563eb;

    font-size: 13px;
}

.edit-rental-section-title h6 {
    margin: 0;

    color: #334155;

    font-size: 13px;

    font-weight: 750;
}

/* =========================================================
   FORM GRID
   ========================================================= */

.edit-rental-fields {
    display: grid;

    grid-template-columns:
        repeat(2, minmax(0, 1fr));

    gap: 19px 17px;
}

/* =========================================================
   FIELD
   ========================================================= */

.edit-rental-field {
    min-width: 0;
}

.edit-rental-label {
    display: block;

    margin-bottom: 7px;

    color: #475569;

    font-size: 11px;

    font-weight: 700;
}

.edit-rental-required {
    color: #ef4444;

    margin-left: 2px;
}

/* =========================================================
   INPUT & SELECT
   ========================================================= */

.edit-rental-input,
.edit-rental-select {
    display: block;

    width: 100%;

    height: 46px;

    padding: 0 13px;

    border: 1px solid #dfe7f0 !important;

    border-radius: 10px !important;

    background: #f8fafc !important;

    color: #172033 !important;

    font-family: inherit;

    font-size: 13px;

    font-weight: 500;

    outline: none;

    box-shadow: none !important;

    transition:
        border-color .2s ease,
        background .2s ease,
        box-shadow .2s ease;
}

.edit-rental-input:hover,
.edit-rental-select:hover {
    background: #fff !important;

    border-color: #cbd7e5 !important;
}

.edit-rental-input:focus,
.edit-rental-select:focus {
    background: #fff !important;

    border-color: #3b82f6 !important;

    box-shadow:
        0 0 0 3px rgba(37, 99, 235, .08) !important;
}

.edit-rental-select {
    cursor: pointer;
}

.edit-rental-input[type="date"] {
    color-scheme: light;
}

/* =========================================================
   FORM FOOTER
   ========================================================= */

.edit-rental-form-footer {
    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 20px;

    padding: 18px 27px;

    border-top: 1px solid #edf1f5;

    background: #fcfdff;
}

.edit-rental-footer-note {
    display: flex;

    align-items: center;

    gap: 7px;

    color: #94a3b8;

    font-size: 10px;
}

.edit-rental-footer-note i {
    color: #2563eb;

    font-size: 13px;
}

.edit-rental-actions {
    display: flex;

    align-items: center;

    gap: 9px;
}

/* =========================================================
   CANCEL BUTTON
   ========================================================= */

.edit-rental-cancel {
    height: 41px;

    padding: 0 18px;

    display: inline-flex;

    align-items: center;

    justify-content: center;

    border: 1px solid #e2e8f0;

    border-radius: 9px;

    background: #fff;

    color: #475569;

    font-size: 12px;

    font-weight: 650;

    text-decoration: none !important;

    transition: .2s ease;
}

.edit-rental-cancel:hover {
    background: #f8fafc;

    color: #334155;

    border-color: #cbd5e1;
}

/* =========================================================
   SAVE BUTTON
   ========================================================= */

.edit-rental-save {
    height: 41px;

    padding: 0 20px;

    display: inline-flex;

    align-items: center;

    justify-content: center;

    gap: 7px;

    border: 1px solid #2563eb;

    border-radius: 9px;

    background: #2563eb;

    color: #fff;

    font-family: inherit;

    font-size: 12px;

    font-weight: 650;

    cursor: pointer;

    box-shadow:
        0 4px 10px rgba(37, 99, 235, .16);

    transition: .2s ease;
}

.edit-rental-save:hover {
    background: #1d4ed8;

    border-color: #1d4ed8;

    color: #fff;

    transform: translateY(-1px);
}

/* =========================================================
   TABLET
   ========================================================= */

@media (max-width: 1100px) {

    .edit-rental-main {
        grid-template-columns:
            245px minmax(0, 1fr);
    }

    .edit-rental-info {
        padding: 24px 19px;
    }

    .edit-rental-form-content {
        padding-left: 22px;
        padding-right: 22px;
    }

    .edit-rental-form-header,
    .edit-rental-form-footer {
        padding-left: 22px;
        padding-right: 22px;
    }
}

/* =========================================================
   TABLET KECIL
   ========================================================= */

@media (max-width: 850px) {

    .edit-rental-main {
        grid-template-columns: 1fr;
    }

    .edit-rental-info {
        display: none;
    }
}

/* =========================================================
   MOBILE
   ========================================================= */

@media (max-width: 767px) {

    .edit-rental-page {
        padding: 0 0 25px;
    }

    .edit-rental-header {
        align-items: center;

        margin-bottom: 18px;

        gap: 10px;
    }

    .edit-rental-title-row {
        gap: 10px;
    }

    .edit-rental-title-icon {
        width: 40px;
        height: 40px;

        flex-basis: 40px;

        border-radius: 10px;

        font-size: 17px;
    }

    .edit-rental-title {
        font-size: 22px !important;
    }

    .edit-rental-subtitle {
        margin-top: 5px !important;

        font-size: 12px !important;
    }

    .edit-rental-back {
        width: 40px;
        height: 40px;

        padding: 0;

        flex: 0 0 40px;
    }

    .edit-rental-back span {
        display: none;
    }

    .edit-rental-main {
        border-radius: 15px;
    }

    .edit-rental-form-header {
        padding: 16px 17px;
    }

    .edit-rental-form-icon {
        width: 39px;
        height: 39px;

        flex-basis: 39px;

        font-size: 16px;
    }

    .edit-rental-form-heading h5 {
        font-size: 14px;
    }

    .edit-rental-form-heading p {
        font-size: 10px;
    }

    .edit-rental-form-content {
        padding: 19px 17px;
    }

    .edit-rental-fields {
        grid-template-columns: 1fr;

        gap: 16px;
    }

    .edit-rental-label {
        font-size: 11px;
    }

    .edit-rental-input,
    .edit-rental-select {
        height: 44px;

        font-size: 13px;
    }

    .edit-rental-form-footer {
        padding: 16px 17px;

        flex-direction: column;

        align-items: stretch;

        gap: 13px;
    }

    .edit-rental-footer-note {
        justify-content: center;

        text-align: center;
    }

    .edit-rental-actions {
        display: grid;

        grid-template-columns:
            1fr 1.5fr;

        width: 100%;
    }

    .edit-rental-cancel,
    .edit-rental-save {
        width: 100%;

        height: 43px;
    }
}

/* =========================================================
   SMALL MOBILE
   ========================================================= */

@media (max-width: 420px) {

    .edit-rental-title-row {
        gap: 8px;
    }

    .edit-rental-title-icon {
        width: 37px;
        height: 37px;

        flex-basis: 37px;

        font-size: 16px;
    }

    .edit-rental-title {
        font-size: 19px !important;
    }

    .edit-rental-form-content {
        padding: 18px 14px;
    }

    .edit-rental-form-header {
        padding: 15px 14px;
    }

    .edit-rental-form-footer {
        padding: 15px 14px;
    }

    .edit-rental-actions {
        grid-template-columns: 1fr;
    }

    .edit-rental-cancel {
        order: 2;
    }

    .edit-rental-save {
        order: 1;
    }
}
</style>


<div class="container-fluid">

    <div class="edit-rental-page">

        {{-- =====================================================
             PAGE HEADER
        ====================================================== --}}

        <div class="edit-rental-header">

            <div class="edit-rental-header-left">

                <div class="edit-rental-title-row">

                    {{-- ICON JUDUL --}}

                    <div class="edit-rental-title-icon">
                        <i class="bi bi-pencil-square"></i>
                    </div>

                    <div>

                        <h2 class="edit-rental-title">
                            Edit Penyewaan
                        </h2>

                        <p class="edit-rental-subtitle">
                            Perbarui data transaksi penyewaan. Pembayaran dilakukan setelah penyewaan disetujui admin.
                        </p>

                    </div>

                </div>

            </div>


            {{-- KEMBALI --}}

            <a href="{{ route('rentals.index') }}"
               class="edit-rental-back">

                <i class="bi bi-arrow-left"></i>

                <span>Kembali</span>

            </a>

        </div>


        {{-- =====================================================
             MAIN CARD
        ====================================================== --}}

        <div class="edit-rental-main">


            {{-- =================================================
                 LEFT INFORMATION
            ================================================== --}}

            <div class="edit-rental-info">

                <p class="edit-rental-info-description">
                    Perbarui informasi transaksi penyewaan
                    dengan memastikan semua data sudah sesuai. Setelah disetujui, pelanggan melakukan pembayaran sebelum mulai menyewa.
                </p>


                {{-- KODE RENTAL --}}

                @if(isset($rental->rental_code))

                    <div class="edit-rental-code-box">

                        <span class="edit-rental-code-label">
                            Kode Rental
                        </span>

                        <span class="edit-rental-code-value">
                            {{ $rental->rental_code }}
                        </span>

                    </div>

                @endif


                {{-- INFORMASI RENTAL --}}

                <div class="edit-rental-info-list">

                    {{-- PELANGGAN --}}

                    <div class="edit-rental-info-item">

                        <div class="edit-rental-info-item-icon">
                            <i class="bi bi-person"></i>
                        </div>

                        <div class="edit-rental-info-item-text">

                            <span class="edit-rental-info-item-label">
                                Pelanggan
                            </span>

                            <span class="edit-rental-info-item-value">
                                {{ $rental->customer->name ?? '-' }}
                            </span>

                        </div>

                    </div>


                    {{-- TANGGAL SEWA --}}

                    <div class="edit-rental-info-item">

                        <div class="edit-rental-info-item-icon">
                            <i class="bi bi-calendar3"></i>
                        </div>

                        <div class="edit-rental-info-item-text">

                            <span class="edit-rental-info-item-label">
                                Tanggal Sewa
                            </span>

                            <span class="edit-rental-info-item-value">

                                {{ $rental->rental_date
                                    ? \Carbon\Carbon::parse($rental->rental_date)->format('d M Y')
                                    : '-'
                                }}

                            </span>

                        </div>

                    </div>


                    {{-- BATAS KEMBALI --}}

                    <div class="edit-rental-info-item">

                        <div class="edit-rental-info-item-icon">
                            <i class="bi bi-calendar-check"></i>
                        </div>

                        <div class="edit-rental-info-item-text">

                            <span class="edit-rental-info-item-label">
                                Batas Kembali
                            </span>

                            <span class="edit-rental-info-item-value">

                                {{ $rental->return_date
                                    ? \Carbon\Carbon::parse($rental->return_date)->format('d M Y')
                                    : '-'
                                }}

                            </span>

                        </div>

                    </div>


                    {{-- STATUS --}}

                    <div class="edit-rental-info-item">

                        <div class="edit-rental-info-item-icon">
                            <i class="bi bi-info-circle"></i>
                        </div>

                        <div class="edit-rental-info-item-text">

                            <span class="edit-rental-info-item-label">
                                Status Saat Ini
                            </span>

                            <span class="edit-rental-info-item-value">

                                @switch($rental->status)

                                    @case('pending')
                                        Pending
                                        @break

                                    @case('approved')
                                        Disetujui & Menunggu Pembayaran
                                        @break

                                    @case('completed')
                                        Selesai
                                        @break

                                    @case('cancelled')
                                        Dibatalkan
                                        @break

                                    @default
                                        {{ ucfirst($rental->status) }}

                                @endswitch

                            </span>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 RIGHT FORM
            ================================================== --}}

            <div class="edit-rental-form">


                {{-- FORM HEADER --}}

                <div class="edit-rental-form-header">

                    <div class="edit-rental-form-icon">
                        <i class="bi bi-clipboard2-plus"></i>
                    </div>

                    <div class="edit-rental-form-heading">

                        <h5>
                            Informasi Transaksi
                        </h5>

                        <p>
                            Ubah data penyewaan di bawah ini. Pembayaran dilakukan setelah status disetujui.
                        </p>

                    </div>

                </div>


                {{-- =================================================
                     FORM
                ================================================== --}}

                <form id="editRentalForm"
                      action="{{ route('rentals.update', $rental->id) }}"
                      method="POST">

                    @csrf

                    @method('PUT')


                    {{-- FORM CONTENT --}}

                    <div class="edit-rental-form-content">


                        {{-- SECTION TITLE --}}

                        <div class="edit-rental-section-title">

                            <div class="edit-rental-section-title-icon">
                                <i class="bi bi-pencil"></i>
                            </div>

                            <h6>
                                Data Penyewaan
                            </h6>

                        </div>


                        {{-- FORM FIELDS --}}

                        <div class="edit-rental-fields">


                            {{-- PELANGGAN --}}

                            <div class="edit-rental-field">

                                <label class="edit-rental-label">

                                    Pelanggan

                                    <span class="edit-rental-required">
                                        *
                                    </span>

                                </label>

                                <select name="customer_id"
                                        class="edit-rental-select"
                                        required>

                                    <option value="">
                                        Pilih pelanggan
                                    </option>

                                    @foreach($customers as $customer)

                                        <option value="{{ $customer->id }}"
                                            @selected(
                                                $rental->customer_id == $customer->id
                                            )>

                                            {{ $customer->name }}

                                        </option>

                                    @endforeach

                                </select>

                            </div>


                            {{-- BARANG --}}

                            <div class="edit-rental-field">

                                <label class="edit-rental-label">

                                    Barang

                                    <span class="edit-rental-required">
                                        *
                                    </span>

                                </label>

                                <select name="product_id"
                                        class="edit-rental-select"
                                        required>

                                    <option value="">
                                        Pilih barang
                                    </option>

                                    @foreach($products as $product)

                                        <option value="{{ $product->id }}"
                                            @selected(
                                                $rental->details->first() &&
                                                $rental->details->first()->product_id == $product->id
                                            )>

                                            {{ $product->name }}
                                            (Stok {{ $product->stock }})

                                        </option>

                                    @endforeach

                                </select>

                            </div>


                            {{-- JUMLAH --}}

                            <div class="edit-rental-field">

                                <label class="edit-rental-label">

                                    Jumlah

                                    <span class="edit-rental-required">
                                        *
                                    </span>

                                </label>

                                <input
                                    type="number"
                                    name="quantity"
                                    class="edit-rental-input"
                                    min="1"
                                    value="{{ $rental->details->first()->quantity ?? 1 }}"
                                    required
                                >

                            </div>


                            {{-- TANGGAL SEWA --}}

                            <div class="edit-rental-field">

                                <label class="edit-rental-label">

                                    Tanggal Sewa

                                    <span class="edit-rental-required">
                                        *
                                    </span>

                                </label>

                                <input
                                    type="date"
                                    name="rental_date"
                                    class="edit-rental-input"
                                    value="{{ $rental->rental_date }}"
                                    required
                                >

                            </div>


                            {{-- TANGGAL KEMBALI --}}

                            <div class="edit-rental-field">

                                <label class="edit-rental-label">

                                    Tanggal Kembali

                                    <span class="edit-rental-required">
                                        *
                                    </span>

                                </label>

                                <input
                                    type="date"
                                    name="return_date"
                                    class="edit-rental-input"
                                    value="{{ $rental->return_date }}"
                                    required
                                >

                            </div>


                            {{-- STATUS --}}

                            <div class="edit-rental-field">

                                <label class="edit-rental-label">

                                    Status Penyewaan

                                    <span class="edit-rental-required">
                                        *
                                    </span>

                                </label>

                                <select name="status"
                                        class="edit-rental-select"
                                        required>

                                    <option value="pending"
                                        @selected($rental->status == 'pending')>
                                        Pending
                                    </option>

                                    <option value="approved"
                                        @selected($rental->status == 'approved')>
                                        Disetujui
                                    </option>

                                    <option value="completed"
                                        @selected($rental->status == 'completed')>
                                        Selesai
                                    </option>

                                    <option value="cancelled"
                                        @selected($rental->status == 'cancelled')>
                                        Dibatalkan
                                    </option>

                                </select>

                                <small style="
                                    display:block;
                                    margin-top:7px;
                                    color:#94a3b8;
                                    font-size:10px;
                                    line-height:1.5;
                                ">
                                    Status <strong>Disetujui</strong> berarti pengajuan telah diterima admin.
                                    Pelanggan kemudian melakukan pembayaran sebelum penyewaan berjalan.
                                </small>

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                         FORM FOOTER
                    ================================================== --}}

                    <div class="edit-rental-form-footer">

                        <div class="edit-rental-footer-note">

                            <i class="bi bi-shield-check"></i>

                            <span>
                                Pastikan data sudah benar. Setelah disetujui, pelanggan melakukan pembayaran sebelum barang disewa.
                            </span>

                        </div>


                        <div class="edit-rental-actions">

                            <a href="{{ route('rentals.index') }}"
                               class="edit-rental-cancel">

                                Batal

                            </a>

                            <button
                                type="submit"
                                class="edit-rental-save"
                            >

                                <i class="bi bi-check2-circle"></i>

                                Simpan Perubahan

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection