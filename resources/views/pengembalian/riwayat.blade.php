@extends('layout.app')

@section('content')

<style>

/* =========================================
   GLOBAL
========================================= */

body{
    background:#F4F8FF;
    font-family:'Inter',sans-serif;
}

.container-fluid{
    padding-bottom:40px;
}


/* =========================================
   PAGE HEADER
========================================= */

.page-header{
    margin-bottom:26px;
}

.page-header h2{
    font-size:32px;
    font-weight:800;
    color:#1E293B;
    margin:0 0 6px;
}

.page-header p{
    margin:0;
    font-size:14px;
    color:#64748B;
}


/* =========================================
   CARD
========================================= */

.card-custom{
    background:#FFFFFF;
    border:none;
    border-radius:22px;
    box-shadow:0 10px 30px rgba(15,23,42,.06);
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

.section-title h5{
    margin:0;
    font-size:22px;
    font-weight:800;
    color:#1E293B;
}


/* =========================================
   TABLE
========================================= */

.table-responsive{
    width:100%;
    overflow-x:auto;
}

.table{
    width:100%;
    margin:0;
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
    transition:.2s;
}

.table tbody tr:hover{
    background:#F8FBFF;
}


/* =========================================
   TRANSACTION CODE
========================================= */

.transaction-code{
    font-weight:700;
    color:#2563EB;
    white-space:nowrap;
}


/* =========================================
   CUSTOMER
========================================= */

.customer-name{
    font-weight:600;
    color:#1E293B;
}

.customer-phone{
    font-size:12px;
    color:#64748B;
}


/* =========================================
   PRODUCT
========================================= */

.product-item{
    margin-bottom:4px;
    color:#334155;
}

.product-item:last-child{
    margin-bottom:0;
}

.product-quantity{
    color:#64748B;
    font-size:12px;
}


/* =========================================
   CONDITION BADGE
========================================= */

.condition-badge{
    display:inline-flex;
    align-items:center;
    gap:5px;

    padding:6px 12px;

    border-radius:30px;

    font-size:11px;
    font-weight:700;

    white-space:nowrap;
}

.condition-good{
    background:#DCFCE7;
    color:#16A34A;
}

.condition-light{
    background:#FEF3C7;
    color:#D97706;
}

.condition-heavy{
    background:#FEE2E2;
    color:#DC2626;
}


/* =========================================
   STATUS
========================================= */

.badge-status{
    display:inline-flex;
    align-items:center;
    gap:5px;

    background:#DBEAFE;
    color:#2563EB;

    padding:6px 12px;

    border-radius:30px;

    font-size:11px;
    font-weight:700;

    white-space:nowrap;
}


/* =========================================
   MONEY
========================================= */

.money{
    font-weight:700;
    font-size:13px;
    color:#EF4444;
    white-space:nowrap;
}

.money-empty{
    color:#94A3B8;
    font-weight:600;
}


/* =========================================
   EMPTY DATA
========================================= */

.empty-data{
    text-align:center;
    padding:55px 20px;
}

.empty-data i{
    font-size:50px;
    color:#94A3B8;
}

.empty-data h5{
    margin-top:15px;
    margin-bottom:5px;

    font-size:17px;
    font-weight:700;

    color:#334155;
}

.empty-data p{
    margin:0;
    font-size:13px;
    color:#64748B;
}


/* =========================================
   PAGINATION
========================================= */

/*
   HAPUS STYLE PAGINATION LAMA
   DAN GUNAKAN STYLE INI
*/

.pagination-wrapper{
    display:flex;
    align-items:center;
    justify-content:space-between;

    gap:20px;

    margin-top:24px;
    padding-top:20px;

    border-top:1px solid #EEF2F7;
}

.pagination-info{
    font-size:13px;
    color:#64748B;
}


/* Pagination Laravel Bootstrap */

.pagination{
    display:flex;
    align-items:center;
    gap:6px;

    margin:0;
    padding:0;

    list-style:none;
}

.pagination .page-item{
    list-style:none;
}

.pagination .page-link{
    display:flex;
    align-items:center;
    justify-content:center;

    min-width:38px;
    height:38px;

    padding:0 12px;

    border:1px solid #E2E8F0;
    border-radius:10px !important;

    background:#FFFFFF;
    color:#475569;

    font-size:13px;
    font-weight:600;

    text-decoration:none;

    box-shadow:none !important;
    outline:none !important;

    transition:.2s;
}

.pagination .page-link:hover{
    background:#EFF6FF;
    border-color:#BFDBFE;
    color:#2563EB;
}

.pagination .page-item.active .page-link{
    background:#2563EB;
    border-color:#2563EB;
    color:#FFFFFF;
}

.pagination .page-item.disabled .page-link{
    background:#F8FAFC;
    border-color:#E2E8F0;
    color:#CBD5E1;

    cursor:not-allowed;
}


/*
   PENTING:
   HILANGKAN SVG PANAH BESAR LARAVEL
*/

.pagination svg{
    width:16px !important;
    height:16px !important;

    max-width:16px !important;
    max-height:16px !important;
}

.pagination .page-link svg{
    width:16px !important;
    height:16px !important;
}


/* =========================================
   BACK BUTTON
========================================= */

.back-wrapper{
    margin-top:20px;
}

.btn-back{
    display:inline-flex;
    align-items:center;
    gap:8px;

    padding:10px 18px;

    border-radius:10px;

    background:#F1F5F9;
    color:#475569;

    border:1px solid #E2E8F0;

    text-decoration:none;

    font-size:13px;
    font-weight:600;

    transition:.2s;
}

.btn-back:hover{
    background:#E2E8F0;
    color:#1E293B;
}


/* =========================================
   RESPONSIVE
========================================= */

@media(max-width:768px){

    .page-header h2{
        font-size:27px;
    }

    .card-body-custom{
        padding:18px;
    }

    .pagination-wrapper{
        flex-direction:column;
        align-items:center;
    }

    .pagination{
        flex-wrap:wrap;
        justify-content:center;
    }

}

</style>


<div class="container-fluid">


    {{-- =========================================
         PAGE HEADER
    ========================================== --}}

    <div class="page-header">

        <h2>
            Semua Riwayat Pengembalian
        </h2>

        <p>
            Menampilkan seluruh data pengembalian barang.
        </p>

    </div>



    {{-- =========================================
         CARD RIWAYAT
    ========================================== --}}

    <div class="card card-custom">

        <div class="card-body-custom">


            {{-- =====================================
                 SECTION TITLE
            ====================================== --}}

            <div class="section-title">

                <div class="icon">

                    <i class="bi bi-clock-history"></i>

                </div>

                <div>

                    <h5>
                        Riwayat Pengembalian
                    </h5>

                </div>

            </div>



            {{-- =====================================
                 TABLE
            ====================================== --}}

            <div class="table-responsive">

                <table class="table align-middle">


                    {{-- =================================
                         TABLE HEADER
                    ================================== --}}

                    <thead>

                    <tr>

                        <th>
                            No Transaksi
                        </th>

                        <th>
                            Pelanggan
                        </th>

                        <th>
                            Barang
                        </th>

                        <th>
                            Tanggal
                        </th>

                        <th>
                            Kondisi
                        </th>

                        <th>
                            Denda Telat
                        </th>

                        <th>
                            Denda Rusak
                        </th>

                        <th>
                            Status
                        </th>

                    </tr>

                    </thead>



                    {{-- =================================
                         TABLE BODY
                    ================================== --}}

                    <tbody>


                    @forelse($riwayat as $item)


                        <tr>


                            {{-- =============================
                                 NO TRANSAKSI
                            ============================== --}}

                            <td>

                                <span class="transaction-code">

                                    {{ $item->rental->rental_code }}

                                </span>

                            </td>



                            {{-- =============================
                                 PELANGGAN
                            ============================== --}}

                            <td>

                                <div class="customer-name">

                                    {{ $item->rental->customer->name }}

                                </div>

                                <div class="customer-phone">

                                    {{ $item->rental->customer->phone ?? '-' }}

                                </div>

                            </td>



                            {{-- =============================
                                 BARANG
                            ============================== --}}

                            <td>

                                @foreach($item->rental->details as $detail)

                                    <div class="product-item">

                                        <span>

                                            {{ $detail->product->name }}

                                        </span>

                                        <span class="product-quantity">

                                            ({{ $detail->quantity }}x)

                                        </span>

                                    </div>

                                @endforeach

                            </td>



                            {{-- =============================
                                 TANGGAL
                            ============================== --}}

                            <td>

                                {{ \Carbon\Carbon::parse($item->tanggal_kembali)->format('d M Y') }}

                            </td>



                            {{-- =============================
                                 KONDISI
                            ============================== --}}

                            <td>


                                @if($item->kondisi == 'Baik')

                                    <span class="condition-badge condition-good">

                                        <i class="bi bi-check-circle-fill"></i>

                                        Baik

                                    </span>


                                @elseif($item->kondisi == 'Rusak Ringan')

                                    <span class="condition-badge condition-light">

                                        <i class="bi bi-exclamation-circle-fill"></i>

                                        Rusak Ringan

                                    </span>


                                @else

                                    <span class="condition-badge condition-heavy">

                                        <i class="bi bi-x-circle-fill"></i>

                                        Rusak Berat

                                    </span>

                                @endif


                            </td>



                            {{-- =============================
                                 DENDA TELAT
                            ============================== --}}

                            <td>

                                @if($item->denda_telat > 0)

                                    <span class="money">

                                        Rp
                                        {{ number_format($item->denda_telat, 0, ',', '.') }}

                                    </span>

                                @else

                                    <span class="money-empty">

                                        Rp -

                                    </span>

                                @endif

                            </td>



                            {{-- =============================
                                 DENDA RUSAK
                            ============================== --}}

                            <td>

                                @if($item->denda_rusak > 0)

                                    <span class="money">

                                        Rp
                                        {{ number_format($item->denda_rusak, 0, ',', '.') }}

                                    </span>

                                @else

                                    <span class="money-empty">

                                        Rp -

                                    </span>

                                @endif

                            </td>



                            {{-- =============================
                                 STATUS
                            ============================== --}}

                            <td>

                                <span class="badge-status">

                                    <i class="bi bi-check-circle"></i>

                                    {{ $item->status }}

                                </span>

                            </td>


                        </tr>


                    @empty


                        {{-- =============================
                             EMPTY
                        ============================== --}}

                        <tr>

                            <td colspan="8">

                                <div class="empty-data">

                                    <i class="bi bi-inbox"></i>

                                    <h5>
                                        Belum Ada Riwayat
                                    </h5>

                                    <p>
                                        Data pengembalian akan tampil setelah transaksi selesai.
                                    </p>

                                </div>

                            </td>

                        </tr>


                    @endforelse


                    </tbody>


                </table>

            </div>



            {{-- =========================================
                 PAGINATION
            ========================================== --}}

            @if($riwayat->hasPages())

                <div class="pagination-wrapper">


                    {{-- INFO --}}

                    <div class="pagination-info">

                        Menampilkan

                        <strong>
                            {{ $riwayat->firstItem() }}
                        </strong>

                        sampai

                        <strong>
                            {{ $riwayat->lastItem() }}
                        </strong>

                        dari

                        <strong>
                            {{ $riwayat->total() }}
                        </strong>

                        data

                    </div>



                    {{-- PAGINATION --}}

                    <div>

                        {{ $riwayat->onEachSide(1)->links('pagination::bootstrap-5') }}

                    </div>


                </div>

            @endif



            {{-- =========================================
                 BACK BUTTON
            ========================================== --}}

            <div class="back-wrapper">

                <a
                    href="{{ route('pengembalian.index') }}"
                    class="btn-back"
                >

                    <i class="bi bi-arrow-left"></i>

                    Kembali

                </a>

            </div>


        </div>

    </div>


</div>


@endsection