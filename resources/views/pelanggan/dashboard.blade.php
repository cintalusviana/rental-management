@extends('pelanggan.layout')

@section('title','Dashboard')

@section('page-title','Dashboard')

@section('breadcrumb','Dashboard')

@section('content')

<style>

/* =========================================================
   DASHBOARD
========================================================= */

.dashboard-page{
    width:100%;
    max-width:100%;
    overflow:hidden;
    box-sizing:border-box;
}


/* =========================================================
   HERO
========================================================= */

.hero-card{
    position:relative;
    overflow:hidden;
    min-height:190px;
    padding:30px 32px;
    margin-bottom:22px;
    border-radius:20px;
    color:#fff;

    background:
        radial-gradient(
            circle at 90% 10%,
            rgba(59,130,246,.22),
            transparent 30%
        ),
        radial-gradient(
            circle at 0% 100%,
            rgba(37,99,235,.14),
            transparent 35%
        ),
        linear-gradient(
            135deg,
            #081a31 0%,
            #0d2340 52%,
            #102b4d 100%
        );

    border:1px solid rgba(255,255,255,.06);

    box-shadow:
        0 8px 22px rgba(8,26,49,.08),
        0 16px 35px rgba(8,26,49,.08);

    box-sizing:border-box;
}


/* =========================================================
   HERO DECORATION
========================================================= */

.hero-card::before{
    content:"";
    position:absolute;

    width:300px;
    height:300px;

    right:-150px;
    top:-180px;

    border-radius:50%;
    border:50px solid rgba(255,255,255,.035);

    pointer-events:none;
}

.hero-card::after{
    content:"";
    position:absolute;

    width:180px;
    height:180px;

    right:60px;
    bottom:-135px;

    border-radius:50%;

    background:rgba(59,130,246,.06);

    box-shadow:
        0 0 80px rgba(59,130,246,.08);

    pointer-events:none;
}


/* =========================================================
   HERO CONTENT
========================================================= */

.hero-content{
    position:relative;
    z-index:2;
    max-width:100%;
}

.hero-card small{
    display:block;
    margin-bottom:6px;

    color:#b9c8dc;
    font-size:13px;
    font-weight:500;
}

.hero-card h2{
    margin:0 0 8px;

    color:#fff;

    font-size:28px;
    line-height:1.25;
    font-weight:700;

    letter-spacing:-.4px;

    overflow-wrap:anywhere;
}

.hero-card p{
    margin:0 0 17px;

    max-width:560px;

    color:#d7e1ee;

    font-size:14px;
    line-height:1.55;
}


/* =========================================================
   HERO BUTTON
========================================================= */

.hero-btn{
    display:inline-flex;
    align-items:center;
    justify-content:center;

    gap:7px;

    padding:10px 17px;

    border-radius:10px;
    border:1px solid #3b82f6;

    background:#2563eb;

    color:#fff !important;
    text-decoration:none;

    font-size:12px;
    font-weight:600;

    box-shadow:
        0 5px 14px rgba(37,99,235,.20);

    transition:
        background .2s ease,
        transform .2s ease,
        box-shadow .2s ease;

    max-width:100%;
    box-sizing:border-box;
}

.hero-btn:hover{
    background:#3b82f6;
    color:#fff !important;

    transform:translateY(-1px);

    box-shadow:
        0 8px 20px rgba(37,99,235,.28);
}


/* =========================================================
   STATISTICS
========================================================= */

.dashboard-stats{
    margin-bottom:22px;

    --bs-gutter-x:1rem;
    --bs-gutter-y:1rem;
}

.dashboard-stats > div{
    min-width:0;
}


/* =========================================================
   STAT CARD
========================================================= */

.stat-card{
    width:100%;
    height:100%;

    min-height:110px;

    padding:18px 19px;

    background:#fff;

    border:1px solid #edf0f5;
    border-radius:16px;

    box-shadow:
        0 4px 12px rgba(15,23,42,.025),
        0 8px 20px rgba(15,23,42,.025);

    transition:
        transform .2s ease,
        box-shadow .2s ease,
        border-color .2s ease;

    box-sizing:border-box;
}

.stat-card:hover{
    transform:translateY(-2px);

    border-color:#dbe5f2;

    box-shadow:
        0 8px 18px rgba(15,23,42,.05),
        0 14px 28px rgba(15,23,42,.06);
}


/* =========================================================
   STAT CONTENT
========================================================= */

.stat-content{
    min-width:0;
    flex:1;
}

.stat-title{
    margin-bottom:5px;

    color:#64748b;

    font-size:11px;
    font-weight:700;

    text-transform:uppercase;
    letter-spacing:.3px;

    white-space:nowrap;
    overflow:hidden;
    text-overflow:ellipsis;
}

.stat-value{
    color:#111827;

    font-size:25px;
    line-height:1.2;

    font-weight:750;

    letter-spacing:-.4px;

    white-space:nowrap;
    overflow:hidden;
    text-overflow:ellipsis;
}


/* =========================================================
   STAT ICON
========================================================= */

.icon-circle{
    width:46px;
    height:46px;

    flex:0 0 46px;

    display:flex;
    align-items:center;
    justify-content:center;

    border-radius:13px;

    font-size:18px;
}

.icon-blue{
    background:#eff6ff;
    color:#2563eb;
}

.icon-orange{
    background:#fff7ed;
    color:#d97706;
}

.icon-purple{
    background:#faf5ff;
    color:#9333ea;
}


/* =========================================================
   CONTENT GRID
========================================================= */

.content-row{
    --bs-gutter-x:1rem;
    --bs-gutter-y:1rem;
}


/* =========================================================
   CONTENT BOX
========================================================= */

.content-box{
    height:100%;

    overflow:hidden;

    background:#fff;

    border:1px solid #edf0f5;
    border-radius:16px;

    box-shadow:
        0 4px 12px rgba(15,23,42,.025),
        0 8px 20px rgba(15,23,42,.025);
}


/* =========================================================
   CONTENT HEADER
========================================================= */

.content-header{
    min-height:64px;

    padding:16px 18px;

    display:flex;
    align-items:center;
    justify-content:space-between;

    gap:12px;

    border-bottom:1px solid #eef1f5;

    box-sizing:border-box;
}

.content-header-left{
    min-width:0;
    flex:1;
}

.content-header h5{
    margin:0;

    color:#111827;

    font-size:15px;
    font-weight:700;

    overflow-wrap:anywhere;
}

.content-header small{
    display:block;

    margin-top:4px;

    color:#94a3b8;

    font-size:11px;
    line-height:1.3;
}

.content-header a{
    display:inline-flex;

    align-items:center;

    flex-shrink:0;

    color:#2563eb;

    text-decoration:none;

    font-size:11px;
    font-weight:600;

    white-space:nowrap;

    transition:.2s ease;
}

.content-header a:hover{
    color:#1d4ed8;
}


/* =========================================================
   RENTAL ITEM
========================================================= */

.rental-item{
    min-width:0;

    display:flex;

    align-items:center;
    justify-content:space-between;

    gap:14px;

    padding:15px 18px;

    border-bottom:1px solid #eef1f5;

    transition:
        background .2s ease;

    box-sizing:border-box;
}

.rental-item:last-child{
    border-bottom:none;
}

.rental-item:hover{
    background:#f8fafc;
}


/* =========================================================
   RENTAL INFO
========================================================= */

.rental-info{
    min-width:0;
    flex:1;
}

.rental-info strong{
    display:block;

    max-width:100%;

    overflow:hidden;
    text-overflow:ellipsis;
    white-space:nowrap;

    color:#1f2937;

    font-size:13px;
    font-weight:650;

    line-height:1.4;
}

.rental-info small{
    display:block;

    margin-top:3px;

    color:#64748b;

    font-size:11px;
    line-height:1.4;

    white-space:nowrap;
    overflow:hidden;
    text-overflow:ellipsis;
}


/* =========================================================
   RENTAL RIGHT
========================================================= */

.rental-right{
    flex-shrink:0;

    text-align:right;

    min-width:0;
}

.rental-right strong{
    display:block;

    color:#1f2937;

    font-size:12px;
    font-weight:700;

    white-space:nowrap;
}

.rental-right small{
    display:block;

    margin-top:3px;

    font-size:10px;
}


/* =========================================================
   STATUS
========================================================= */

.badge-status{
    flex-shrink:0;

    display:inline-flex;

    align-items:center;
    justify-content:center;

    min-height:27px;

    padding:5px 10px;

    border-radius:30px;

    font-size:10px;
    font-weight:600;

    line-height:1;

    white-space:nowrap;

    box-sizing:border-box;
}

.pending{
    background:#fef3c7;
    color:#92400e;
}

.approved{
    background:#dbeafe;
    color:#1d4ed8;
}

.completed{
    background:#dcfce7;
    color:#15803d;
}

.cancelled{
    background:#fee2e2;
    color:#dc2626;
}


/* =========================================================
   EMPTY STATE
========================================================= */

.empty-state{
    padding:35px 20px;

    text-align:center;

    color:#94a3b8;
}

.empty-state i{
    display:block;

    margin-bottom:9px;

    color:#cbd5e1;

    font-size:30px;
}

.empty-state h4{
    margin:0 0 5px;

    color:#475569;

    font-size:14px;
}

.empty-state p{
    margin:0;

    font-size:11px;
}


/* =========================================================
   TABLET
========================================================= */

@media(max-width:992px){

    .hero-card{
        min-height:180px;
        padding:28px;
    }

    .hero-card h2{
        font-size:25px;
    }

    .hero-card p{
        font-size:13px;
    }

    .dashboard-stats{
        --bs-gutter-x:.8rem;
        --bs-gutter-y:.8rem;
    }

    .stat-card{
        min-height:100px;
        padding:16px 15px;
    }

    .stat-title{
        font-size:10px;
    }

    .stat-value{
        font-size:22px;
    }

    .icon-circle{
        width:43px;
        height:43px;
        flex-basis:43px;
        border-radius:11px;
        font-size:17px;
    }

    .content-header{
        padding:15px 16px;
    }

    .rental-item{
        padding:14px 16px;
    }
}


/* =========================================================
   MOBILE
========================================================= */

@media(max-width:768px){

    .dashboard-page{
        width:100%;
        max-width:100%;
        overflow:hidden;
    }

    /* HERO */

    .hero-card{
        min-height:auto;
        padding:23px 19px;
        margin-bottom:18px;
        border-radius:17px;
    }

    .hero-card h2{
        font-size:23px;
        line-height:1.25;
        letter-spacing:-.3px;
    }

    .hero-card small{
        font-size:12px;
    }

    .hero-card p{
        margin-bottom:16px;
        font-size:12.5px;
        line-height:1.55;
    }

    .hero-btn{
        padding:10px 15px;
        border-radius:10px;
        font-size:11.5px;
    }


    /* STATISTICS */

    .dashboard-stats{
        margin-bottom:18px;

        --bs-gutter-x:.65rem;
        --bs-gutter-y:.65rem;

        width:100%;
        margin-left:0;
        margin-right:0;
    }

    .dashboard-stats > .col-md-4{
        width:33.333333%;
        padding-left:calc(var(--bs-gutter-x) * .5);
        padding-right:calc(var(--bs-gutter-x) * .5);
    }


    /* STAT CARD */

    .stat-card{
        min-height:135px;
        padding:13px 6px;

        border-radius:14px;

        display:flex;
        align-items:center;
        justify-content:center;

        text-align:center;
    }


    .stat-card > .d-flex{
        width:100%;

        display:flex !important;
        flex-direction:column;

        align-items:center !important;
        justify-content:center !important;

        gap:8px !important;
    }


    /* STAT CONTENT */

    .stat-content{
        width:100%;
        order:2;

        display:flex;
        flex-direction:column;
        align-items:center;

        min-width:0;
    }


    /* TITLE */

    .stat-title{
        order:1;

        width:100%;

        margin-bottom:4px;

        color:#64748b;

        font-size:9.5px;

        line-height:1.3;
        letter-spacing:.05px;

        white-space:normal;
        overflow:visible;
        text-overflow:clip;

        overflow-wrap:anywhere;
    }


    /* VALUE */

    .stat-value{
        order:2;

        width:100%;
        max-width:100%;

        font-size:22px;
        line-height:1.15;

        letter-spacing:-.3px;

        overflow:hidden;
        text-overflow:ellipsis;
    }


    /* ICON */

    .icon-circle{
        order:1;

        width:45px;
        height:45px;

        flex:0 0 45px;

        border-radius:12px;

        font-size:18px;
    }


    /* CONTENT */

    .content-row{
        --bs-gutter-x:.85rem;
        --bs-gutter-y:.85rem;
    }

    .content-box{
        border-radius:15px;
    }


    /* HEADER */

    .content-header{
        min-height:60px;
        padding:14px;
        gap:8px;
    }

    .content-header h5{
        font-size:14px;
    }

    .content-header small{
        font-size:10px;
    }

    .content-header a{
        font-size:10.5px;
    }


    /* RENTAL */

    .rental-item{
        padding:14px;
        gap:9px;
    }

    .rental-info{
        min-width:0;
    }

    .rental-info strong{
        font-size:11.5px;
    }

    .rental-info small{
        font-size:9.5px;
    }

    .badge-status{
        min-height:26px;
        padding:5px 8px;
        font-size:8.5px;
    }

    .rental-right strong{
        font-size:10.5px;
    }

    .rental-right small{
        font-size:8.5px;
    }
}


/* =========================================================
   SMALL PHONE
========================================================= */

@media(max-width:576px){

    .hero-card{
        padding:21px 16px;
        border-radius:15px;
    }

    .hero-card h2{
        font-size:21px;
    }

    .hero-card small{
        font-size:11px;
    }

    .hero-card p{
        font-size:11.5px;
    }

    .hero-btn{
        padding:9px 13px;
        font-size:10.5px;
    }


    /* STATISTICS */

    .dashboard-stats{
        --bs-gutter-x:.5rem;
        --bs-gutter-y:.5rem;
    }

    .dashboard-stats > .col-md-4{
        width:33.333333%;
    }


    /* STAT CARD */

    .stat-card{
        min-height:128px;
        padding:11px 5px;
        border-radius:13px;
    }

    .stat-card > .d-flex{
        gap:7px !important;
    }


    /* ICON */

    .icon-circle{
        width:42px;
        height:42px;
        flex-basis:42px;
        border-radius:11px;
        font-size:17px;
    }


    /* TITLE */

    .stat-title{
        font-size:8.5px;
        line-height:1.25;
    }


    /* VALUE */

    .stat-value{
        font-size:20px;
    }


    /* CONTENT */

    .content-header{
        min-height:57px;
        padding:13px;
    }

    .content-header h5{
        font-size:13px;
    }

    .content-header small{
        font-size:9px;
    }

    .content-header a{
        font-size:9.5px;
    }


    /* RENTAL */

    .rental-item{
        padding:13px;
        gap:8px;
    }

    .rental-info strong{
        font-size:11px;
    }

    .rental-info small{
        font-size:9px;
    }

    .badge-status{
        min-height:25px;
        padding:4px 7px;
        font-size:8px;
    }

    .rental-right strong{
        font-size:10px;
    }

    .rental-right small{
        font-size:8px;
    }
}


/* =========================================================
   VERY SMALL PHONE
========================================================= */

@media(max-width:400px){

    .hero-card{
        padding:20px 14px;
        border-radius:14px;
    }

    .hero-card h2{
        font-size:20px;
    }

    .hero-card small{
        font-size:10.5px;
    }

    .hero-card p{
        font-size:11px;
        line-height:1.5;
    }

    .hero-btn{
        padding:9px 12px;
        font-size:10px;
    }


    /* STATISTICS */

    .dashboard-stats{
        --bs-gutter-x:.4rem;
        --bs-gutter-y:.4rem;
    }

    .dashboard-stats > .col-md-4{
        width:33.333333%;
    }


    /* STAT CARD */

    .stat-card{
        min-height:122px;
        padding:10px 4px;
        border-radius:12px;
    }

    .stat-card > .d-flex{
        gap:6px !important;
    }


    /* ICON */

    .icon-circle{
        width:39px;
        height:39px;
        flex-basis:39px;
        border-radius:10px;
        font-size:16px;
    }


    /* TITLE */

    .stat-title{
        font-size:8px;
        line-height:1.2;
    }


    /* VALUE */

    .stat-value{
        font-size:18px;
    }


    /* CONTENT */

    .content-header{
        padding:12px;
    }

    .content-header h5{
        font-size:12px;
    }

    .content-header small{
        font-size:8.5px;
    }

    .content-header a{
        font-size:9px;
    }


    .rental-item{
        padding:12px;
        gap:7px;
    }

    .rental-info strong{
        font-size:10px;
    }

    .rental-info small{
        font-size:8.5px;
    }

    .badge-status{
        min-height:24px;
        padding:4px 6px;
        font-size:7.5px;
    }

    .rental-right strong{
        font-size:9.5px;
    }

    .rental-right small{
        font-size:7.5px;
    }
}


/* =========================================================
   EXTRA SMALL PHONE
========================================================= */

@media(max-width:360px){

    .hero-card{
        padding:18px 12px;
    }

    .hero-card h2{
        font-size:19px;
    }

    .hero-card p{
        font-size:10.5px;
    }

    .hero-btn{
        padding:8px 11px;
        font-size:9.5px;
    }


    /* STAT */

    .dashboard-stats{
        --bs-gutter-x:.3rem;
        --bs-gutter-y:.3rem;
    }

    .stat-card{
        min-height:116px;
        padding:9px 3px;
        border-radius:11px;
    }

    .stat-card > .d-flex{
        gap:5px !important;
    }


    .icon-circle{
        width:37px;
        height:37px;
        flex-basis:37px;
        border-radius:9px;
        font-size:15px;
    }

    .stat-title{
        font-size:7.5px;
    }

    .stat-value{
        font-size:17px;
    }


    /* CONTENT */

    .content-header{
        padding:11px;
    }

    .content-header h5{
        font-size:12px;
    }

    .content-header small{
        font-size:8px;
    }

    .content-header a{
        font-size:8.5px;
    }

    .rental-item{
        padding:11px;
        gap:6px;
    }

    .rental-info strong{
        font-size:9.5px;
    }

    .rental-info small{
        font-size:8px;
    }

    .badge-status{
        min-height:23px;
        padding:4px 5px;
        font-size:7px;
    }

    .rental-right strong{
        font-size:9px;
    }

    .rental-right small{
        font-size:7.5px;
    }
}

</style>

<div class="dashboard-page">

```
<!-- =====================================================
     HERO
====================================================== -->

<div class="hero-card">

    <div class="hero-content">

        <small>
            Selamat datang kembali,
        </small>

        <h2>
            {{ $customer->name }} 👋
        </h2>

        <p>
            Temukan barang rental terbaik untuk kebutuhan Anda.
        </p>

        <a
            href="{{ route('pelanggan.products') }}"
            class="hero-btn"
        >
            Jelajahi Barang
            <i class="bi bi-arrow-right"></i>
        </a>

    </div>

</div>


<!-- =====================================================
     STATISTICS
====================================================== -->

<div class="row dashboard-stats">


    <!-- PENYEWAAN AKTIF -->

    <div class="col-md-4">

        <div class="stat-card">

            <div class="d-flex align-items-center justify-content-between gap-2">

                <div class="stat-content">

                    <div class="stat-title">
                        Penyewaan Aktif
                    </div>

                    <div class="stat-value">
                        {{ $activeRentals }}
                    </div>

                </div>

                <div class="icon-circle icon-blue">

                    <i class="bi bi-box-seam"></i>

                </div>

            </div>

        </div>

    </div>


    <!-- TOTAL PEMBAYARAN -->

    <div class="col-md-4">

        <div class="stat-card">

            <div class="d-flex align-items-center justify-content-between gap-2">

                <div class="stat-content">

                    <div class="stat-title">
                        Total Pembayaran
                    </div>

                    <div class="stat-value">
                        Rp {{ number_format($totalPayment,0,',','.') }}
                    </div>

                </div>

                <div class="icon-circle icon-orange">

                    <i class="bi bi-credit-card"></i>

                </div>

            </div>

        </div>

    </div>


    <!-- TOTAL PENYEWAAN -->

    <div class="col-md-4">

        <div class="stat-card">

            <div class="d-flex align-items-center justify-content-between gap-2">

                <div class="stat-content">

                    <div class="stat-title">
                        Total Penyewaan
                    </div>

                    <div class="stat-value">
                        {{ $totalRentals }}
                    </div>

                </div>

                <div class="icon-circle icon-purple">

                    <i class="bi bi-clock-history"></i>

                </div>

            </div>

        </div>

    </div>

</div>


<!-- =====================================================
     CONTENT
====================================================== -->

<div class="row content-row">


    <!-- PENYEWAAN TERBARU -->

    <div class="col-lg-7">

        <div class="content-box">

            <div class="content-header">

                <div class="content-header-left">

                    <h5>
                        Penyewaan Terbaru
                    </h5>

                </div>

                <a href="{{ route('pelanggan.rentals') }}">

                    Lihat Semua

                    <i class="bi bi-arrow-right ms-1"></i>

                </a>

            </div>


            @forelse($rentals as $rental)

                @php

                    $class = match($rental->status){

                        'pending' => 'pending',

                        'approved' => 'approved',

                        'completed' => 'completed',

                        'cancelled' => 'cancelled',

                        default => 'approved'

                    };

                @endphp


                <div class="rental-item">


                    <!-- INFO RENTAL -->

                    <div class="rental-info">

                        <strong>
                            {{ $rental->rental_code }}
                        </strong>

                        <small>

                            {{ $rental->rental_date }}

                            -

                            {{ $rental->return_date }}

                        </small>

                    </div>


                    <!-- STATUS -->

                    <span class="badge-status {{ $class }}">

                        @if($rental->status === 'pending')

                            Menunggu

                        @elseif($rental->status === 'approved')

                            Disetujui

                        @elseif($rental->status === 'completed')

                            Selesai

                        @elseif($rental->status === 'cancelled')

                            Dibatalkan

                        @else

                            {{ $rental->status }}

                        @endif

                    </span>


                </div>


            @empty

                <div class="empty-state">

                    <i class="bi bi-inbox"></i>

                    <h4>
                        Belum ada penyewaan
                    </h4>

                    <p>
                        Data penyewaan Anda akan muncul di sini.
                    </p>

                </div>

            @endforelse

        </div>

    </div>


    <!-- REKOMENDASI BARANG -->

    <div class="col-lg-5">

        <div class="content-box">

            <div class="content-header">

                <div class="content-header-left">

                    <h5>
                        Rekomendasi Barang
                    </h5>

                    <small>
                        Barang terbaru
                    </small>

                </div>

            </div>


            @forelse($products as $product)

                <div class="rental-item">


                    <!-- PRODUCT -->

                    <div class="rental-info">

                        <strong>
                            {{ $product->name }}
                        </strong>

                        <small>
                            {{ $product->category->name ?? '-' }}
                        </small>

                    </div>


                    <!-- PRICE -->

                    <div class="rental-right">

                        <strong>

                            Rp {{ number_format(
                                $product->price_per_day,
                                0,
                                ',',
                                '.'
                            ) }}

                        </strong>


                        @if($product->status === 'available')

                            <small class="text-success">

                                <i class="bi bi-check-circle me-1"></i>

                                Tersedia

                            </small>

                        @else

                            <small class="text-danger">

                                <i class="bi bi-x-circle me-1"></i>

                                Tidak Tersedia

                            </small>

                        @endif

                    </div>


                </div>


            @empty

                <div class="empty-state">

                    <i class="bi bi-box"></i>

                    <h4>
                        Belum ada barang
                    </h4>

                    <p>
                        Barang terbaru akan muncul di sini.
                    </p>

                </div>

            @endforelse

        </div>

    </div>


</div>
```

</div>

@endsection
