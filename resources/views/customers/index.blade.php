@extends('layout.app')

@section('content')

<style>

/* =========================================================
   CUSTOMER PAGE
========================================================= */

.customer-page {
    animation: customerFade .35s ease;
    width: 100%;
    max-width: 100%;
    overflow-x: hidden;
}

@keyframes customerFade {
    from {
        opacity: 0;
        transform: translateY(12px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

body {
    background: #F5F7FB;
}


/* =========================================================
   HEADER
========================================================= */

.customer-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 16px;
    margin-bottom: 22px;
    width: 100%;
}

.customer-title {
    min-width: 0;
    flex: 1;
}

.customer-title h2 {
    font-size: 30px;
    font-weight: 750;
    color: #0F172A;
    margin: 0 0 5px;
    letter-spacing: -0.5px;

    display: flex;
    align-items: center;

    line-height: 1.25;
}

.customer-title h2 i {
    flex-shrink: 0;
}

.customer-title p {
    color: #64748B;
    margin: 0;
    font-size: 14px;
    line-height: 1.45;
}


/* =========================================================
   ADD BUTTON
========================================================= */

.btn-add {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;

    background: #2563EB;
    color: #FFFFFF;

    border: none;
    border-radius: 11px;

    padding: 10px 16px;

    font-size: 13px;
    font-weight: 600;

    white-space: nowrap;
    flex-shrink: 0;

    box-shadow: 0 6px 16px rgba(37, 99, 235, .16);

    transition: .25s ease;
}

.btn-add:hover {
    background: #1D4ED8;
    color: #FFFFFF;

    transform: translateY(-2px);

    box-shadow:
        0 9px 20px rgba(37, 99, 235, .22);
}


/* =========================================================
   SEARCH
========================================================= */

.search-wrapper {
    background: #FFFFFF;

    border: 1px solid #E5EAF2;
    border-radius: 14px;

    padding: 12px;

    margin-bottom: 20px;

    box-shadow:
        0 5px 18px rgba(15, 23, 42, .035);

    width: 100%;
}

.search-box {
    position: relative;
    width: 100%;
}

.search-box i {
    position: absolute;

    left: 15px;
    top: 50%;

    transform: translateY(-50%);

    color: #94A3B8;

    font-size: 15px;

    z-index: 2;
}

.search-box input {
    width: 100%;
    height: 45px;

    border: 1px solid #DDE5F0;
    border-radius: 10px;

    background: #F8FAFC;

    padding: 0 16px 0 43px;

    color: #334155;
    font-size: 13px;

    transition: .2s ease;
}

.search-box input::placeholder {
    color: #94A3B8;
}

.search-box input:focus {
    outline: none;

    background: #FFFFFF;

    border-color: #93C5FD;

    box-shadow:
        0 0 0 3px rgba(37, 99, 235, .08);
}


/* =========================================================
   CUSTOMER GRID
   DESKTOP = 2 CARD
========================================================= */

.customer-grid {
    display: grid;

    grid-template-columns:
        repeat(2, minmax(0, 1fr));

    gap: 16px;

    width: 100%;
}


/* =========================================================
   CUSTOMER CARD
========================================================= */

.customer-card {
    background: #FFFFFF;

    border: 1px solid #E7ECF3;
    border-radius: 16px;

    padding: 16px;

    box-shadow:
        0 5px 18px rgba(15, 23, 42, .035);

    transition: .25s ease;

    min-width: 0;
    width: 100%;

    overflow: hidden;
}

.customer-card:hover {
    transform: translateY(-2px);

    border-color: #D5E3FF;

    box-shadow:
        0 10px 24px rgba(37, 99, 235, .08);
}


/* =========================================================
   CUSTOMER TOP
========================================================= */

.customer-top {
    display: flex;

    justify-content: space-between;
    align-items: flex-start;

    gap: 10px;

    min-width: 0;
}

.customer-profile {
    display: flex;

    align-items: flex-start;

    gap: 11px;

    min-width: 0;
    flex: 1;
}


/* =========================================================
   CUSTOMER PHOTO
========================================================= */

.customer-photo {
    width: 50px;
    height: 50px;

    flex: 0 0 50px;

    object-fit: cover;

    border-radius: 12px;

    border: 2px solid #DBEAFE;

    background: #EFF6FF;

    box-shadow:
        0 3px 8px rgba(37, 99, 235, .08);
}


/* =========================================================
   CUSTOMER NAME
========================================================= */

.customer-name {
    font-size: 15px;

    line-height: 1.25;

    font-weight: 700;

    color: #0F172A;

    margin: 1px 0 6px;

    word-break: break-word;

    overflow-wrap: anywhere;
}


/* =========================================================
   CUSTOMER INFO
========================================================= */

.customer-info {
    display: flex;

    flex-direction: column;

    gap: 4px;

    color: #64748B;

    font-size: 12px;

    line-height: 1.35;

    min-width: 0;
}

.customer-info span {
    display: flex;

    align-items: center;

    min-width: 0;

    max-width: 100%;
}

.customer-info i {
    width: 17px;
    min-width: 17px;

    margin-right: 2px;

    color: #2563EB;

    font-size: 12px;
}

.customer-info span > span {
    display: inline-flex;
}


/* =========================================================
   STATUS
========================================================= */

.status-dot {
    width: 6px !important;
    min-width: 6px !important;

    height: 6px;

    border-radius: 50%;

    margin-right: 6px !important;

    background: #22C55E;
}

.status-badge {
    display: inline-flex !important;

    align-items: center;

    background: #ECFDF5;

    color: #15803D;

    border: 1px solid #BBF7D0;

    border-radius: 999px;

    padding: 3px 8px;

    font-size: 11px;

    font-weight: 600;

    white-space: nowrap;
}

.status-badge.nonaktif {
    background: #F1F5F9;

    color: #64748B;

    border-color: #E2E8F0;
}


/* =========================================================
   ACTION BUTTONS
========================================================= */

.customer-action {
    display: flex;

    gap: 4px;

    flex-shrink: 0;
}

.btn-circle {
    width: 30px;
    height: 30px;

    padding: 0;

    border: none;

    border-radius: 8px;

    display: flex;

    justify-content: center;
    align-items: center;

    transition: .2s ease;
}

.btn-circle i {
    font-size: 13px;
}

.btn-view {
    background: #EFF6FF;
    color: #2563EB;
}

.btn-edit {
    background: #F5F3FF;
    color: #7C3AED;
}

.btn-delete {
    background: #FEF2F2;
    color: #EF4444;
}

.btn-circle:hover {
    transform: translateY(-2px);
}

.btn-view:hover {
    background: #DBEAFE;
    color: #1D4ED8;
}

.btn-edit:hover {
    background: #EDE9FE;
    color: #6D28D9;
}

.btn-delete:hover {
    background: #FEE2E2;
    color: #DC2626;
}


/* =========================================================
   CUSTOMER BOTTOM
========================================================= */

.customer-bottom {
    display: flex;

    justify-content: space-between;
    align-items: center;

    gap: 8px;

    margin-top: 14px;
    padding-top: 11px;

    border-top: 1px solid #EEF2F7;

    min-width: 0;
}

.customer-rental {
    display: inline-flex;

    align-items: center;

    gap: 5px;

    background: #EFF6FF;

    color: #2563EB;

    padding: 5px 8px;

    border-radius: 7px;

    font-size: 11px;

    font-weight: 600;

    white-space: nowrap;
}

.customer-history {
    display: inline-flex;

    align-items: center;

    color: #64748B;

    text-decoration: none;

    font-size: 11px;

    font-weight: 600;

    white-space: nowrap;

    transition: .2s ease;
}

.customer-history i {
    margin-right: 4px;

    font-size: 12px;
}

.customer-history:hover {
    color: #2563EB;
}


/* =========================================================
   EMPTY STATE
========================================================= */

.empty-customer {
    grid-column: 1 / -1;

    background: #FFFFFF;

    border: 1px dashed #CBD5E1;

    border-radius: 16px;

    padding: 50px 20px;

    text-align: center;
}

.empty-customer-icon {
    width: 65px;
    height: 65px;

    margin: 0 auto 14px;

    border-radius: 17px;

    display: flex;

    align-items: center;
    justify-content: center;

    background: #EFF6FF;

    color: #2563EB;

    font-size: 28px;
}


/* =========================================================
   MODAL
========================================================= */

.modal-content {
    overflow: hidden;
}

.modal-dialog {
    width: auto;

    max-width: 750px;
}

.modal-header-custom {
    padding: 21px 23px 12px;
}

.modal-header-custom h4 {
    font-size: 19px;

    font-weight: 700;

    color: #0F172A;

    margin: 0 0 3px;
}

.modal-header-custom small {
    color: #64748B;

    font-size: 12px;
}

.modal-body-custom {
    padding: 11px 23px 19px;
}

.modal-footer-custom {
    padding: 11px 23px 20px;

    border-top: 1px solid #F1F5F9;

    display: flex;

    justify-content: flex-end;

    gap: 8px;
}


/* =========================================================
   FORM
========================================================= */

.form-label-custom {
    display: block;

    margin-bottom: 5px;

    color: #475569;

    font-size: 12px;

    font-weight: 600;
}

.form-control,
.form-select {
    border-color: #DDE5F0;

    min-height: 40px;

    font-size: 12px;

    border-radius: 9px !important;

    color: #334155;
}

textarea.form-control {
    min-height: auto;
}

.form-control:focus,
.form-select:focus {
    border-color: #93C5FD;

    box-shadow:
        0 0 0 3px rgba(37, 99, 235, .08);
}


/* =========================================================
   PHOTO PREVIEW
========================================================= */

.photo-preview-wrapper {
    display: flex;

    justify-content: center;
    align-items: center;

    height: 100%;

    min-height: 90px;
}

.photo-preview {
    width: 100px;
    height: 100px;

    object-fit: cover;

    border-radius: 14px;

    border: 3px solid #DBEAFE;

    background: #EFF6FF;

    box-shadow:
        0 5px 15px rgba(15, 23, 42, .08);
}


/* =========================================================
   DETAIL PHOTO
========================================================= */

.detail-photo {
    width: 145px;
    height: 145px;

    object-fit: cover;

    border-radius: 18px;

    border: 4px solid #DBEAFE;

    background: #EFF6FF;

    box-shadow:
        0 8px 22px rgba(15, 23, 42, .08);
}

.detail-field label {
    display: block;

    color: #64748B;

    font-size: 11px;

    font-weight: 600;

    margin-bottom: 4px;
}

.detail-field .form-control {
    background: #F8FAFC;
}


/* =========================================================
   DELETE MODAL
========================================================= */

.delete-icon {
    width: 70px;
    height: 70px;

    margin: 4px auto 16px;

    border-radius: 18px;

    display: flex;

    align-items: center;
    justify-content: center;

    background: #FEF2F2;

    color: #DC2626;

    font-size: 27px;
}

.delete-title {
    font-size: 19px;

    font-weight: 700;

    color: #0F172A;
}

.delete-description {
    color: #64748B;

    font-size: 13px;
}


/* =========================================================
   TABLET
   TETAP 2 CARD
========================================================= */

@media (max-width: 992px) {

    .customer-title h2 {
        font-size: 27px;
    }

    .customer-grid {
        grid-template-columns:
            repeat(2, minmax(0, 1fr));

        gap: 14px;
    }

    .customer-card {
        padding: 15px;
    }

}


/* =========================================================
   MOBILE
   1 CARD SAJA
========================================================= */

@media (max-width: 768px) {

    .customer-header {
        gap: 10px;

        align-items: flex-start;
    }

    .customer-title {
        min-width: 0;
    }

    .customer-title h2 {
        font-size: 22px;

        margin-bottom: 4px;

        line-height: 1.25;
    }

    .customer-title h2 i {
        margin-right: 7px !important;
    }

    /*
     * DESKRIPSI TETAP MUNCUL
     */

    .customer-title p {
        display: block;

        font-size: 11px;

        line-height: 1.45;

        margin: 0;
    }


    /* =====================================================
       BUTTON TAMBAH
    ===================================================== */

    .btn-add {
        padding: 9px 12px;

        font-size: 11px;

        border-radius: 9px;

        gap: 5px;

        flex-shrink: 0;
    }

    .btn-add i {
        font-size: 11px;
    }


    /* =====================================================
       SEARCH
    ===================================================== */

    .search-wrapper {
        padding: 10px;

        margin-bottom: 16px;
    }

    .search-box input {
        height: 42px;

        font-size: 12px;
    }


    /* =====================================================
       1 CARD PER BARIS
    ===================================================== */

    .customer-grid {
        grid-template-columns: 1fr;

        gap: 10px;
    }

    .customer-card {
        width: 100%;

        padding: 13px;

        border-radius: 14px;
    }


    /* =====================================================
       CUSTOMER TOP
    ===================================================== */

    .customer-top {
        gap: 8px;
    }

    .customer-profile {
        gap: 9px;
    }


    /* =====================================================
       FOTO
    ===================================================== */

    .customer-photo {
        width: 45px;
        height: 45px;

        flex: 0 0 45px;

        border-radius: 10px;
    }


    /* =====================================================
       NAMA
    ===================================================== */

    .customer-name {
        font-size: 14px;

        margin: 1px 0 5px;
    }


    /* =====================================================
       INFO
    ===================================================== */

    .customer-info {
        font-size: 11px;

        gap: 3px;
    }

    .customer-info i {
        width: 15px;

        min-width: 15px;

        font-size: 11px;
    }


    /* =====================================================
       ACTION
    ===================================================== */

    .customer-action {
        gap: 3px;
    }

    .btn-circle {
        width: 28px;
        height: 28px;

        border-radius: 7px;
    }

    .btn-circle i {
        font-size: 11px;
    }


    /* =====================================================
       BOTTOM
    ===================================================== */

    .customer-bottom {
        margin-top: 11px;

        padding-top: 9px;
    }

    .customer-rental,
    .customer-history {
        font-size: 10px;
    }

    .customer-rental {
        padding: 4px 7px;
    }

}


/* =========================================================
   HP KECIL
========================================================= */

@media (max-width: 575px) {

    .customer-header {
        gap: 7px;

        align-items: flex-start;
    }

    .customer-title {
        flex: 1;
    }

    .customer-title h2 {
        font-size: 19px;

        letter-spacing: -0.2px;

        line-height: 1.25;

        margin-bottom: 4px;
    }

    /*
     * DESKRIPSI TETAP ADA
     */

    .customer-title p {
        display: block;

        font-size: 10px;

        line-height: 1.4;

        max-width: 230px;
    }


    /* =====================================================
       BUTTON TAMBAH TETAP DI SAMPING
    ===================================================== */

    .btn-add {
        padding: 8px 10px;

        font-size: 10px;

        gap: 4px;

        border-radius: 8px;
    }

    .btn-add i {
        font-size: 10px;
    }


    /* =====================================================
       SEARCH
    ===================================================== */

    .search-wrapper {
        padding: 9px;

        margin-bottom: 14px;
    }

    .search-box input {
        height: 40px;

        font-size: 11px;
    }


    /* =====================================================
       TETAP 1 CARD
    ===================================================== */

    .customer-grid {
        grid-template-columns: 1fr;

        gap: 10px;
    }

    .customer-card {
        padding: 13px;

        border-radius: 13px;
    }


    .customer-photo {
        width: 44px;
        height: 44px;

        flex-basis: 44px;
    }

    .customer-name {
        font-size: 13px;
    }

    .customer-info {
        font-size: 10px;
    }

    .customer-info i {
        font-size: 10px;

        width: 14px;

        min-width: 14px;
    }


    .btn-circle {
        width: 27px;
        height: 27px;
    }

    .btn-circle i {
        font-size: 11px;
    }


    .customer-rental,
    .customer-history {
        font-size: 10px;
    }

}


/* =========================================================
   HP SANGAT KECIL
========================================================= */

@media (max-width: 380px) {

    .customer-title h2 {
        font-size: 17px;
    }

    .customer-title p {
        font-size: 9px;

        max-width: 200px;
    }

    .btn-add {
        padding: 7px 8px;

        font-size: 9px;
    }

    .btn-add i {
        font-size: 9px;
    }

    .customer-card {
        padding: 12px;
    }

}


/* =========================================================
   MODAL RESPONSIVE
========================================================= */

@media (max-width: 768px) {

    .modal-dialog {
        width: auto;

        max-width: none !important;

        margin: 10px;
    }

    .modal-header-custom {
        padding: 17px 18px 10px;
    }

    .modal-header-custom h4 {
        font-size: 17px;
    }

    .modal-body-custom {
        padding: 10px 18px 17px;
    }

    .modal-footer-custom {
        padding: 10px 18px 17px;

        flex-wrap: wrap;
    }

    .modal-footer-custom .btn {
        font-size: 12px;

        padding-left: 14px !important;
        padding-right: 14px !important;
    }

    .detail-photo {
        width: 115px;
        height: 115px;
    }

}


@media (max-width: 575px) {

    .modal-dialog {
        margin: 8px;
    }

    .modal-header-custom {
        padding: 15px 15px 9px;
    }

    .modal-body-custom {
        padding: 9px 15px 15px;
    }

    .modal-footer-custom {
        padding: 9px 15px 15px;
    }

    .photo-preview-wrapper {
        min-height: 80px;
    }

    .photo-preview {
        width: 85px;
        height: 85px;
    }

    .detail-photo {
        width: 100px;
        height: 100px;
    }

    .delete-description {
        font-size: 12px;
    }

}


/* =========================================================
   PREVENT OVERFLOW
========================================================= */

img {
    max-width: 100%;
}

input,
textarea,
select,
button {
    max-width: 100%;
}

</style>


<div class="container-fluid customer-page">

    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="customer-header">

        <div class="customer-title">

            <h2>
                <i class="bi bi-people-fill text-primary me-2"></i>
                Data Pelanggan
            </h2>

            <p>
                Kelola informasi pelanggan yang terdaftar di sistem rental.
            </p>

        </div>


        <button
            type="button"
            class="btn btn-add"
            data-bs-toggle="modal"
            data-bs-target="#addModal">

            <i class="bi bi-person-plus-fill"></i>

            Tambah Pelanggan

        </button>

    </div>


    {{-- =====================================================
         SEARCH
    ====================================================== --}}

    <div class="search-wrapper">

        <div class="search-box">

            <i class="bi bi-search"></i>

            <input
                type="text"
                id="searchCustomer"
                class="form-control"
                placeholder="Cari nama, email atau nomor HP..."
            >

        </div>

    </div>


    {{-- =====================================================
         CUSTOMER GRID
    ====================================================== --}}

    <div class="customer-grid">

        @forelse($customers as $customer)

            <div class="customer-card">

                <div class="customer-top">

                    {{-- PROFILE --}}

                    <div class="customer-profile">

                        {{-- FOTO CUSTOMER --}}

                        @if(
                            $customer->photo &&
                            file_exists(
                                public_path(
                                    'uploads/customers/' . $customer->photo
                                )
                            )
                        )

                            <img
                                src="{{ asset('uploads/customers/' . $customer->photo) }}"
                                class="customer-photo"
                                alt="{{ $customer->name }}"
                            >

                        @else

                            <img
                                src="https://ui-avatars.com/api/?name={{ urlencode($customer->name) }}&background=2563EB&color=ffffff&size=200"
                                class="customer-photo"
                                alt="{{ $customer->name }}"
                            >

                        @endif


                        {{-- INFO CUSTOMER --}}

                        <div style="min-width:0; flex:1;">

                            <h5 class="customer-name">
                                {{ $customer->name }}
                            </h5>


                            <div class="customer-info">

                                {{-- TELEPON --}}

                                <span>

                                    <i class="bi bi-telephone"></i>

                                    <span style="
                                        overflow:hidden;
                                        text-overflow:ellipsis;
                                        white-space:nowrap;
                                    ">
                                        {{ $customer->phone ?: '-' }}
                                    </span>

                                </span>


                                {{-- EMAIL --}}

                                <span>

                                    <i class="bi bi-envelope"></i>

                                    <span style="
                                        overflow:hidden;
                                        text-overflow:ellipsis;
                                        white-space:nowrap;
                                    ">
                                        {{ $customer->email ?: '-' }}
                                    </span>

                                </span>


                                {{-- ALAMAT --}}

                                <span>

                                    <i class="bi bi-geo-alt"></i>

                                    <span style="
                                        overflow:hidden;
                                        text-overflow:ellipsis;
                                        white-space:nowrap;
                                    ">
                                        {{ $customer->address ?: '-' }}
                                    </span>

                                </span>


                                {{-- STATUS --}}

                                <span>

                                    <i class="bi bi-circle-fill"></i>

                                    @if($customer->status == 'Aktif')

                                        <span class="status-badge">

                                            <span class="status-dot"></span>

                                            Aktif

                                        </span>

                                    @else

                                        <span class="status-badge nonaktif">

                                            <span
                                                class="status-dot"
                                                style="
                                                    background:#94A3B8 !important;
                                                ">
                                            </span>

                                            Nonaktif

                                        </span>

                                    @endif

                                </span>

                            </div>

                        </div>

                    </div>


                    {{-- ACTION --}}

                    <div class="customer-action">

                        {{-- DETAIL --}}

                        <button
                            type="button"
                            class="btn-circle btn-view"
                            data-bs-toggle="modal"
                            data-bs-target="#detailModal{{ $customer->id }}"
                            title="Lihat Detail">

                            <i class="bi bi-eye"></i>

                        </button>


                        {{-- EDIT --}}

                        <button
                            type="button"
                            class="btn-circle btn-edit editBtn"

                            data-id="{{ $customer->id }}"
                            data-name="{{ $customer->name }}"
                            data-phone="{{ $customer->phone }}"
                            data-email="{{ $customer->email }}"
                            data-address="{{ $customer->address }}"
                            data-status="{{ $customer->status }}"

                            data-photo="{{ $customer->photo
                                ? asset('uploads/customers/' . $customer->photo)
                                : '' }}"

                            data-bs-toggle="modal"
                            data-bs-target="#editModal"

                            title="Edit">

                            <i class="bi bi-pencil-square"></i>

                        </button>


                        {{-- DELETE --}}

                        <button
                            type="button"
                            class="btn-circle btn-delete deleteBtn"

                            data-id="{{ $customer->id }}"
                            data-name="{{ $customer->name }}"

                            data-bs-toggle="modal"
                            data-bs-target="#deleteModal"

                            title="Hapus">

                            <i class="bi bi-trash3"></i>

                        </button>

                    </div>

                </div>


                {{-- FOOTER --}}

                <div class="customer-bottom">

                    <span class="customer-rental">

                        <i class="bi bi-arrow-repeat"></i>

                        {{ $customer->rentals_count ?? 0 }}

                        Penyewaan

                    </span>


                    <a
                        href="#"
                        class="customer-history"
                        onclick="return false;">

                        <i class="bi bi-clock-history"></i>

                        Riwayat

                    </a>

                </div>

            </div>

        @empty

            <div class="empty-customer">

                <div class="empty-customer-icon">

                    <i class="bi bi-people"></i>

                </div>

                <h5 class="fw-bold mb-2">
                    Belum Ada Pelanggan
                </h5>

                <p class="text-muted mb-0">
                    Silakan tambahkan pelanggan pertama.
                </p>

            </div>

        @endforelse

    </div>

</div>



{{-- =========================================================
     MODAL DETAIL PELANGGAN
========================================================= --}}

@foreach($customers as $customer)

<div
    class="modal fade"
    id="detailModal{{ $customer->id }}"
    tabindex="-1"
    aria-hidden="true"
>

    <div
        class="modal-dialog modal-lg modal-dialog-centered"
        style="max-width:750px;"
    >

        <div class="modal-content border-0 shadow rounded-4">

            <div class="modal-header border-0 modal-header-custom">

                <div>

                    <h4>

                        <i class="bi bi-person-vcard text-primary me-2"></i>

                        Detail Pelanggan

                    </h4>

                    <small>
                        Informasi lengkap pelanggan.
                    </small>

                </div>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>

            </div>


            <div class="modal-body modal-body-custom">

                <div class="row g-4 align-items-center">

                    <div class="col-md-4 text-center">

                        @if(
                            $customer->photo &&
                            file_exists(
                                public_path(
                                    'uploads/customers/' . $customer->photo
                                )
                            )
                        )

                            <img
                                src="{{ asset('uploads/customers/' . $customer->photo) }}"
                                class="detail-photo"
                                alt="{{ $customer->name }}"
                            >

                        @else

                            <img
                                src="https://ui-avatars.com/api/?name={{ urlencode($customer->name) }}&background=2563EB&color=ffffff&size=250"
                                class="detail-photo"
                                alt="{{ $customer->name }}"
                            >

                        @endif

                    </div>


                    <div class="col-md-8">

                        <div class="row g-3">

                            <div class="col-md-6 detail-field">

                                <label>
                                    Nama Pelanggan
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $customer->name }}"
                                    readonly
                                >

                            </div>


                            <div class="col-md-6 detail-field">

                                <label>
                                    Nomor HP
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $customer->phone ?: '-' }}"
                                    readonly
                                >

                            </div>


                            <div class="col-md-6 detail-field">

                                <label>
                                    Email
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $customer->email ?: '-' }}"
                                    readonly
                                >

                            </div>


                            <div class="col-md-6 detail-field">

                                <label>
                                    Status
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $customer->status }}"
                                    readonly
                                >

                            </div>


                            <div class="col-12 detail-field">

                                <label>
                                    Alamat
                                </label>

                                <textarea
                                    class="form-control"
                                    rows="3"
                                    readonly
                                >{{ $customer->address ?: '-' }}</textarea>

                            </div>


                            <div class="col-md-6 detail-field">

                                <label>
                                    Total Penyewaan
                                </label>

                                <div class="mt-1">

                                    <span class="customer-rental">

                                        <i class="bi bi-arrow-repeat"></i>

                                        {{ $customer->rentals_count ?? 0 }}

                                        Penyewaan

                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            <div class="modal-footer-custom">

                <button
                    type="button"
                    class="btn btn-primary rounded-3 px-4"
                    data-bs-dismiss="modal"
                >

                    <i class="bi bi-check-lg me-2"></i>

                    Tutup

                </button>

            </div>

        </div>

    </div>

</div>

@endforeach



{{-- =========================================================
     MODAL TAMBAH PELANGGAN
========================================================= --}}

<div
    class="modal fade"
    id="addModal"
    tabindex="-1"
    aria-hidden="true"
>

    <div
        class="modal-dialog modal-lg modal-dialog-centered"
        style="max-width:750px;"
    >

        <div class="modal-content border-0 shadow rounded-4">

            <form
                action="{{ route('customers.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf

                <div class="modal-header border-0 modal-header-custom">

                    <div>

                        <h4>

                            <i class="bi bi-person-plus-fill text-primary me-2"></i>

                            Tambah Pelanggan

                        </h4>

                        <small>
                            Lengkapi informasi pelanggan baru.
                        </small>

                    </div>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                    </button>

                </div>


                <div class="modal-body modal-body-custom">

                    <div class="row g-3">

                        <div class="col-md-6">

                            <label class="form-label-custom">
                                Nama Pelanggan
                            </label>

                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                placeholder="Masukkan nama pelanggan"
                                required
                            >

                        </div>


                        <div class="col-md-6">

                            <label class="form-label-custom">
                                Nomor HP
                            </label>

                            <input
                                type="text"
                                name="phone"
                                class="form-control"
                                placeholder="08xxxxxxxxxx"
                                required
                            >

                        </div>


                        <div class="col-md-6">

                            <label class="form-label-custom">
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                placeholder="email@example.com"
                            >

                        </div>


                        <div class="col-md-6">

                            <label class="form-label-custom">
                                Status
                            </label>

                            <select
                                name="status"
                                class="form-select"
                            >

                                <option value="Aktif">
                                    Aktif
                                </option>

                                <option value="Nonaktif">
                                    Nonaktif
                                </option>

                            </select>

                        </div>


                        <div class="col-md-6">

                            <label class="form-label-custom">
                                Foto Pelanggan
                            </label>

                            <input
                                type="file"
                                name="photo"
                                id="photoInput"
                                class="form-control"
                                accept="image/jpeg,image/jpg,image/png"
                            >

                            <small class="text-muted">
                                JPG, JPEG atau PNG. Maksimal 2 MB.
                            </small>

                        </div>


                        <div class="col-md-6">

                            <div class="photo-preview-wrapper">

                                <img
                                    id="previewPhoto"
                                    src="https://ui-avatars.com/api/?name=Customer&background=2563EB&color=ffffff&size=250"
                                    class="photo-preview"
                                    alt="Preview Foto"
                                >

                            </div>

                        </div>


                        <div class="col-12">

                            <label class="form-label-custom">
                                Alamat
                            </label>

                            <textarea
                                name="address"
                                rows="3"
                                class="form-control"
                                placeholder="Masukkan alamat pelanggan..."
                            ></textarea>

                        </div>

                    </div>

                </div>


                <div class="modal-footer-custom">

                    <button
                        type="button"
                        class="btn btn-light rounded-3 px-4"
                        data-bs-dismiss="modal"
                    >
                        Batal
                    </button>

                    <button
                        type="submit"
                        class="btn btn-primary rounded-3 px-4"
                    >

                        <i class="bi bi-check-lg me-2"></i>

                        Simpan Pelanggan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>



{{-- =========================================================
     MODAL EDIT PELANGGAN
========================================================= --}}

<div
    class="modal fade"
    id="editModal"
    tabindex="-1"
    aria-hidden="true"
>

    <div
        class="modal-dialog modal-lg modal-dialog-centered"
        style="max-width:750px;"
    >

        <div class="modal-content border-0 shadow rounded-4">

            <form
                id="editForm"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf

                @method('PUT')


                <div class="modal-header border-0 modal-header-custom">

                    <div>

                        <h4>

                            <i class="bi bi-pencil-square text-primary me-2"></i>

                            Edit Pelanggan

                        </h4>

                        <small>
                            Perbarui informasi pelanggan.
                        </small>

                    </div>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                    </button>

                </div>


                <div class="modal-body modal-body-custom">

                    <div class="row g-3">

                        <div class="col-md-6">

                            <label class="form-label-custom">
                                Nama Pelanggan
                            </label>

                            <input
                                type="text"
                                id="editName"
                                name="name"
                                class="form-control"
                                placeholder="Masukkan nama pelanggan"
                                required
                            >

                        </div>


                        <div class="col-md-6">

                            <label class="form-label-custom">
                                Nomor HP
                            </label>

                            <input
                                type="text"
                                id="editPhone"
                                name="phone"
                                class="form-control"
                                placeholder="08xxxxxxxxxx"
                                required
                            >

                        </div>


                        <div class="col-md-6">

                            <label class="form-label-custom">
                                Email
                            </label>

                            <input
                                type="email"
                                id="editEmail"
                                name="email"
                                class="form-control"
                                placeholder="email@example.com"
                            >

                        </div>


                        <div class="col-md-6">

                            <label class="form-label-custom">
                                Status
                            </label>

                            <select
                                id="editStatus"
                                name="status"
                                class="form-select"
                            >

                                <option value="Aktif">
                                    Aktif
                                </option>

                                <option value="Nonaktif">
                                    Nonaktif
                                </option>

                            </select>

                        </div>


                        <div class="col-md-6">

                            <label class="form-label-custom">
                                Foto Pelanggan
                            </label>

                            <input
                                type="file"
                                id="editPhotoInput"
                                name="photo"
                                class="form-control"
                                accept="image/jpeg,image/jpg,image/png"
                            >

                            <small class="text-muted">
                                Kosongkan jika foto tidak ingin diganti.
                            </small>

                        </div>


                        <div class="col-md-6">

                            <div class="photo-preview-wrapper">

                                <img
                                    id="editPreviewPhoto"
                                    src="https://ui-avatars.com/api/?name=Customer&background=2563EB&color=ffffff&size=250"
                                    class="photo-preview"
                                    alt="Preview Foto"
                                >

                            </div>

                        </div>


                        <div class="col-12">

                            <label class="form-label-custom">
                                Alamat
                            </label>

                            <textarea
                                id="editAddress"
                                name="address"
                                rows="3"
                                class="form-control"
                                placeholder="Masukkan alamat pelanggan..."
                            ></textarea>

                        </div>

                    </div>

                </div>


                <div class="modal-footer-custom">

                    <button
                        type="button"
                        class="btn btn-light rounded-3 px-4"
                        data-bs-dismiss="modal"
                    >
                        Batal
                    </button>

                    <button
                        type="submit"
                        class="btn btn-primary rounded-3 px-4"
                    >

                        <i class="bi bi-arrow-repeat me-2"></i>

                        Update Pelanggan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>



{{-- =========================================================
     MODAL HAPUS PELANGGAN
========================================================= --}}

<div
    class="modal fade"
    id="deleteModal"
    tabindex="-1"
    aria-hidden="true"
>

    <div
        class="modal-dialog modal-dialog-centered"
        style="max-width:470px;"
    >

        <div class="modal-content border-0 shadow rounded-4">

            <form
                id="deleteForm"
                method="POST"
            >

                @csrf

                @method('DELETE')


                <div class="modal-header border-0 pb-0">

                    <button
                        type="button"
                        class="btn-close ms-auto"
                        data-bs-dismiss="modal">
                    </button>

                </div>


                <div class="modal-body text-center px-5 pb-4">

                    <div class="delete-icon">

                        <i class="bi bi-trash3"></i>

                    </div>


                    <h4 class="delete-title mb-2">

                        Hapus Pelanggan?

                    </h4>


                    <p class="delete-description mb-1">

                        Apakah Anda yakin ingin menghapus pelanggan

                        <strong id="deleteName"></strong>?

                    </p>


                    <small class="text-danger">

                        Data yang sudah dihapus tidak dapat dikembalikan.

                    </small>

                </div>


                <div class="modal-footer border-0 justify-content-center pb-4">

                    <button
                        type="button"
                        class="btn btn-light rounded-3 px-4"
                        data-bs-dismiss="modal"
                    >

                        Batal

                    </button>


                    <button
                        type="submit"
                        class="btn btn-danger rounded-3 px-4"
                    >

                        <i class="bi bi-trash3 me-2"></i>

                        Hapus

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>



{{-- =========================================================
     JAVASCRIPT
========================================================= --}}

<script>

document.addEventListener('DOMContentLoaded', function () {


    /* =====================================================
       PREVIEW FOTO TAMBAH
    ====================================================== */

    const photoInput =
        document.getElementById('photoInput');

    const previewPhoto =
        document.getElementById('previewPhoto');


    if (photoInput && previewPhoto) {

        photoInput.addEventListener('change', function (event) {

            const file =
                event.target.files[0];

            if (!file) {
                return;
            }

            if (!file.type.startsWith('image/')) {

                alert('File yang dipilih harus berupa gambar.');

                this.value = '';

                return;
            }

            const reader =
                new FileReader();

            reader.onload =
                function (event) {

                    previewPhoto.src =
                        event.target.result;

                };

            reader.readAsDataURL(file);

        });

    }



    /* =====================================================
       PREVIEW FOTO EDIT
    ====================================================== */

    const editPhotoInput =
        document.getElementById('editPhotoInput');

    const editPreviewPhoto =
        document.getElementById('editPreviewPhoto');


    if (editPhotoInput && editPreviewPhoto) {

        editPhotoInput.addEventListener('change', function (event) {

            const file =
                event.target.files[0];

            if (!file) {
                return;
            }

            if (!file.type.startsWith('image/')) {

                alert('File yang dipilih harus berupa gambar.');

                this.value = '';

                return;
            }

            const reader =
                new FileReader();

            reader.onload =
                function (event) {

                    editPreviewPhoto.src =
                        event.target.result;

                };

            reader.readAsDataURL(file);

        });

    }



    /* =====================================================
       EDIT CUSTOMER
    ====================================================== */

    document
        .querySelectorAll('.editBtn')
        .forEach(function (button) {

            button.addEventListener('click', function () {

                const customerId =
                    this.dataset.id;

                const customerName =
                    this.dataset.name;

                const customerPhone =
                    this.dataset.phone;

                const customerEmail =
                    this.dataset.email;

                const customerAddress =
                    this.dataset.address;

                const customerStatus =
                    this.dataset.status;

                const customerPhoto =
                    this.dataset.photo;


                document.getElementById('editForm').action =
                    "{{ url('/customers') }}/" + customerId;


                document.getElementById('editName').value =
                    customerName || '';

                document.getElementById('editPhone').value =
                    customerPhone || '';

                document.getElementById('editEmail').value =
                    customerEmail || '';

                document.getElementById('editAddress').value =
                    customerAddress || '';

                document.getElementById('editStatus').value =
                    customerStatus || 'Aktif';


                if (customerPhoto) {

                    editPreviewPhoto.src =
                        customerPhoto;

                } else {

                    editPreviewPhoto.src =
                        "https://ui-avatars.com/api/?name=" +
                        encodeURIComponent(customerName) +
                        "&background=2563EB&color=ffffff&size=250";

                }


                if (editPhotoInput) {

                    editPhotoInput.value = '';

                }

            });

        });



    /* =====================================================
       DELETE CUSTOMER
    ====================================================== */

    document
        .querySelectorAll('.deleteBtn')
        .forEach(function (button) {

            button.addEventListener('click', function () {

                const customerId =
                    this.dataset.id;

                const customerName =
                    this.dataset.name;


                document.getElementById('deleteForm').action =
                    "{{ url('/customers') }}/" + customerId;


                document.getElementById('deleteName').textContent =
                    customerName;

            });

        });



    /* =====================================================
       SEARCH CUSTOMER
    ====================================================== */

    const searchInput =
        document.getElementById('searchCustomer');


    if (searchInput) {

        searchInput.addEventListener('input', function () {

            const keyword =
                this.value.toLowerCase().trim();


            document
                .querySelectorAll('.customer-card')
                .forEach(function (card) {

                    const text =
                        card.innerText.toLowerCase();


                    if (text.includes(keyword)) {

                        card.style.display = '';

                    } else {

                        card.style.display = 'none';

                    }

                });

        });

    }



    /* =====================================================
       RESET PREVIEW TAMBAH
    ====================================================== */

    const addModal =
        document.getElementById('addModal');


    if (addModal) {

        addModal.addEventListener(
            'hidden.bs.modal',
            function () {

                if (photoInput) {

                    photoInput.value = '';

                }

                if (previewPhoto) {

                    previewPhoto.src =
                        "https://ui-avatars.com/api/?name=Customer&background=2563EB&color=ffffff&size=250";

                }

            }
        );

    }



    /* =====================================================
       RESET PREVIEW EDIT
    ====================================================== */

    const editModal =
        document.getElementById('editModal');


    if (editModal) {

        editModal.addEventListener(
            'hidden.bs.modal',
            function () {

                if (editPhotoInput) {

                    editPhotoInput.value = '';

                }

            }
        );

    }

});

</script>

@endsection