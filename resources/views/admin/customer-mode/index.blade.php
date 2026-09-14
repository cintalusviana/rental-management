@extends('layout.app')

@section('content')

<style>

/* =========================================================
   FONT
========================================================= */

@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');


/* =========================================================
   ROOT
========================================================= */

:root{
    --primary:#2563EB;
    --primary-dark:#1D4ED8;

    --blue-soft:#EFF6FF;

    --bg:#F6F8FC;
    --white:#FFFFFF;

    --text:#0F172A;
    --muted:#64748B;

    --border:#E5EAF2;

    --shadow:0 5px 18px rgba(15,23,42,.04);
    --shadow-hover:0 10px 24px rgba(37,99,235,.08);
}


/* =========================================================
   GLOBAL
========================================================= */

body{
    background:var(--bg)!important;
    font-family:'Inter',sans-serif;
    color:var(--text);
}

.customer-mode-page{
    width:100%;
    padding:5px 18px 30px;
    animation:pageIn .3s ease;
}

@keyframes pageIn{
    from{
        opacity:0;
        transform:translateY(8px);
    }

    to{
        opacity:1;
        transform:translateY(0);
    }
}


/* =========================================================
   HEADER
========================================================= */

.customer-mode-header{
    display:flex;
    align-items:center;
    justify-content:space-between;

    gap:18px;

    margin-bottom:20px;
}

.customer-mode-title{
    display:flex;
    align-items:center;
    gap:11px;

    min-width:0;
}

.customer-mode-title-icon{
    width:42px;
    height:42px;

    border-radius:12px;

    background:#EFF6FF;
    color:#2563EB;

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:18px;

    flex-shrink:0;
}

.customer-mode-title h1{
    margin:0;

    font-size:23px;
    line-height:1.2;

    font-weight:800;

    letter-spacing:-.4px;

    color:#0F172A;
}

.customer-mode-title p{
    margin:4px 0 0;

    color:#64748B;

    font-size:12px;
    line-height:1.4;
}

.customer-count{
    display:inline-flex;
    align-items:center;

    white-space:nowrap;

    background:#fff;

    border:1px solid var(--border);

    padding:8px 12px;

    border-radius:10px;

    color:#475569;

    font-size:11px;
    font-weight:600;

    box-shadow:var(--shadow);
}

.customer-count i{
    color:#2563EB;
    margin-right:5px;
}


/* =========================================================
   MAIN CARD
========================================================= */

.customer-list-card{
    background:#fff;

    border-radius:17px;

    padding:20px;

    border:1px solid var(--border);

    box-shadow:var(--shadow);
}


/* =========================================================
   LIST HEADER
========================================================= */

.customer-list-header{
    display:flex;
    align-items:center;
    justify-content:space-between;

    gap:15px;

    margin-bottom:18px;
}

.customer-list-header h3{
    margin:0;

    font-size:16px;
    font-weight:750;

    color:#0F172A;
}

.customer-list-header p{
    margin:3px 0 0;

    font-size:11px;

    color:#64748B;
}


/* =========================================================
   SEARCH
========================================================= */

.customer-search{
    position:relative;

    width:235px;

    flex-shrink:0;
}

.customer-search i{
    position:absolute;

    left:12px;
    top:50%;

    transform:translateY(-50%);

    color:#94A3B8;

    font-size:13px;

    pointer-events:none;
}

.customer-search input{
    width:100%;
    height:36px;

    border:1px solid #E2E8F0;

    border-radius:9px;

    padding:0 11px 0 34px;

    outline:none;

    font-size:11px;

    color:#334155;

    background:#F8FAFC;

    transition:.2s;
}

.customer-search input:focus{
    background:#fff;

    border-color:#93C5FD;

    box-shadow:
        0 0 0 3px rgba(37,99,235,.07);
}


/* =========================================================
   GRID
========================================================= */

.customer-grid{
    display:grid;

    grid-template-columns:
        repeat(3,minmax(0,1fr));

    gap:13px;
}


/* =========================================================
   CUSTOMER CARD
========================================================= */

.customer-card{
    position:relative;

    min-width:0;

    background:#fff;

    border:1px solid #E2E8F0;

    border-radius:14px;

    padding:15px;

    overflow:hidden;

    transition:
        transform .22s ease,
        box-shadow .22s ease,
        border-color .22s ease;
}

.customer-card::before{
    content:"";

    position:absolute;

    left:0;
    top:0;

    width:100%;
    height:3px;

    background:#2563EB;

    opacity:0;

    transition:.2s;
}

.customer-card:hover{
    transform:translateY(-2px);

    border-color:#BFDBFE;

    box-shadow:var(--shadow-hover);
}

.customer-card:hover::before{
    opacity:1;
}


/* =========================================================
   CUSTOMER TOP
========================================================= */

.customer-top{
    display:flex;

    align-items:center;

    gap:10px;

    margin-bottom:14px;

    min-width:0;
}


/* =========================================================
   AVATAR
========================================================= */

.customer-avatar{
    width:43px;
    height:43px;

    border-radius:12px;

    background:#2563EB;

    color:#fff;

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:15px;

    font-weight:800;

    flex-shrink:0;

    overflow:hidden;
}

.customer-avatar-img{
    width:100%;
    height:100%;

    object-fit:cover;

    display:block;
}


/* =========================================================
   CUSTOMER NAME
========================================================= */

.customer-name{
    min-width:0;
}

.customer-name h4{
    margin:0 0 3px;

    font-size:13px;

    font-weight:700;

    color:#0F172A;

    white-space:nowrap;

    overflow:hidden;

    text-overflow:ellipsis;
}

.customer-name span{
    display:block;

    font-size:10px;

    color:#64748B;

    white-space:nowrap;

    overflow:hidden;

    text-overflow:ellipsis;
}


/* =========================================================
   CUSTOMER INFO
========================================================= */

.customer-info{
    display:flex;

    flex-direction:column;

    gap:7px;

    margin-bottom:13px;
}

.customer-info-item{
    display:flex;

    align-items:center;

    gap:7px;

    min-width:0;

    font-size:10.5px;

    color:#64748B;
}

.customer-info-item i{
    width:15px;

    text-align:center;

    color:#2563EB;

    font-size:12px;

    flex-shrink:0;
}

.customer-info-item span{
    min-width:0;

    white-space:nowrap;

    overflow:hidden;

    text-overflow:ellipsis;
}


/* =========================================================
   STATUS
========================================================= */

.customer-status{
    display:flex;

    align-items:center;

    justify-content:space-between;

    gap:8px;

    padding-top:10px;

    margin-bottom:12px;

    border-top:1px solid #F1F5F9;
}

.status-label{
    display:flex;

    align-items:center;

    gap:5px;

    font-size:10px;

    color:#64748B;
}

.status-dot{
    width:6px;
    height:6px;

    background:#22C55E;

    border-radius:50%;

    flex-shrink:0;
}

.status-badge{
    padding:4px 7px;

    border-radius:7px;

    background:#ECFDF5;

    color:#15803D;

    font-size:9px;

    font-weight:700;

    white-space:nowrap;
}


/* =========================================================
   BUTTON
========================================================= */

.view-customer-btn{
    width:auto;

    display:inline-flex;

    align-items:center;
    justify-content:center;

    gap:6px;

    padding:7px 10px;

    border:1px solid #2563EB;

    border-radius:8px;

    background:#2563EB;

    color:#fff;

    text-decoration:none;

    font-size:10px;

    font-weight:650;

    line-height:1;

    transition:.2s;
}

.view-customer-btn:hover{
    background:#1D4ED8;

    border-color:#1D4ED8;

    color:#fff;

    transform:translateY(-1px);
}

.view-customer-btn i{
    font-size:11px;
}


/* =========================================================
   EMPTY
========================================================= */

.empty-customer{
    grid-column:1 / -1;

    text-align:center;

    padding:55px 20px;

    color:#64748B;
}

.empty-customer i{
    display:block;

    font-size:40px;

    color:#CBD5E1;

    margin-bottom:10px;
}

.empty-customer h4{
    color:#334155;

    font-size:15px;

    margin:0 0 4px;
}

.empty-customer p{
    font-size:11px;

    margin:0;
}


/* =========================================================
   TABLET
========================================================= */

@media(max-width:1100px){

    .customer-grid{
        grid-template-columns:
            repeat(2,minmax(0,1fr));
    }

}


/* =========================================================
   TABLET KECIL
========================================================= */

@media(max-width:850px){

    .customer-mode-header{
        align-items:flex-start;

        flex-direction:column;

        gap:10px;
    }

    .customer-count{
        align-self:flex-start;
    }

    .customer-list-header{
        align-items:stretch;

        flex-direction:column;

        gap:11px;
    }

    .customer-search{
        width:100%;
    }

}


/* =========================================================
   HP
========================================================= */

@media(max-width:768px){

    .customer-mode-page{
        padding:4px 10px 20px;
    }

    .customer-mode-header{
        margin-bottom:14px;
    }

    .customer-mode-title{
        width:100%;
    }

    .customer-mode-title-icon{
        width:38px;
        height:38px;

        border-radius:10px;

        font-size:16px;
    }

    .customer-mode-title h1{
        font-size:19px;
    }

    .customer-mode-title p{
        font-size:10px;

        margin-top:3px;
    }

    .customer-count{
        font-size:10px;

        padding:7px 10px;
    }


    /* MAIN */

    .customer-list-card{
        padding:14px;

        border-radius:14px;
    }

    .customer-list-header{
        margin-bottom:13px;
    }

    .customer-list-header h3{
        font-size:14px;
    }

    .customer-list-header p{
        font-size:9px;
    }


    /* GRID */

    .customer-grid{
        grid-template-columns:1fr;

        gap:9px;
    }


    /* CARD */

    .customer-card{
        padding:13px;

        border-radius:12px;
    }

    .customer-top{
        margin-bottom:11px;
    }

    .customer-avatar{
        width:40px;
        height:40px;

        border-radius:10px;

        font-size:14px;
    }

    .customer-name h4{
        font-size:12px;
    }

    .customer-name span{
        font-size:9px;
    }

    .customer-info{
        gap:6px;

        margin-bottom:10px;
    }

    .customer-info-item{
        font-size:9.5px;
    }

    .customer-info-item i{
        font-size:11px;
    }

    .customer-status{
        padding-top:9px;

        margin-bottom:10px;
    }

    .status-label{
        font-size:9px;
    }

    .status-badge{
        font-size:8px;

        padding:4px 6px;
    }

    /* BUTTON */

    .view-customer-btn{
        padding:7px 9px;

        font-size:9px;

        border-radius:7px;
    }

    .view-customer-btn i{
        font-size:10px;
    }

}


/* =========================================================
   HP SANGAT KECIL
========================================================= */

@media(max-width:420px){

    .customer-mode-page{
        padding-left:7px;
        padding-right:7px;
    }

    .customer-list-card{
        padding:12px;
    }

    .customer-card{
        padding:12px;
    }

    .customer-mode-title h1{
        font-size:18px;
    }

    .customer-mode-title p{
        font-size:9px;
    }

    .customer-search input{
        height:34px;

        font-size:10px;
    }

    .view-customer-btn{
        padding:6px 8px;

        font-size:8.5px;
    }

}

</style>


<div class="customer-mode-page">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="customer-mode-header">

        <div class="customer-mode-title">

            <div class="customer-mode-title-icon">
                <i class="bi bi-person-check-fill"></i>
            </div>

            <div>

                <h1>
                    Lihat Mode Pelanggan
                </h1>

                <p>
                    Pilih pelanggan untuk melihat tampilan sebagai pelanggan.
                </p>

            </div>

        </div>


        <div class="customer-count">

            <i class="bi bi-people-fill"></i>

            {{ $customers->count() }} pelanggan terdaftar

        </div>

    </div>


    {{-- =====================================================
         CUSTOMER LIST
    ====================================================== --}}

    <div class="customer-list-card">


        {{-- HEADER --}}

        <div class="customer-list-header">

            <div>

                <h3>
                    Pilih Pelanggan
                </h3>

                <p>
                    Pilih pelanggan untuk masuk ke mode pelanggan.
                </p>

            </div>


            {{-- SEARCH --}}

            <div class="customer-search">

                <i class="bi bi-search"></i>

                <input
                    type="text"
                    id="customerSearch"
                    placeholder="Cari pelanggan..."
                    autocomplete="off"
                >

            </div>

        </div>


        {{-- =================================================
             GRID
        ================================================== --}}

        <div
            class="customer-grid"
            id="customerGrid"
        >

            @forelse($customers as $customer)


                <div
                    class="customer-card"
                    data-search="{{ strtolower(
                        ($customer->name ?? '') . ' ' .
                        ($customer->email ?? '') . ' ' .
                        ($customer->phone ?? '') . ' ' .
                        ($customer->address ?? '')
                    ) }}"
                >


                    {{-- =================================================
                         CUSTOMER TOP
                    ================================================== --}}

                    <div class="customer-top">


                        {{-- AVATAR --}}

                        <div class="customer-avatar">

                            @if(
                                $customer->photo &&
                                file_exists(
                                    public_path(
                                        'uploads/customers/' . $customer->photo
                                    )
                                )
                            )

                                <img
                                    src="{{ asset(
                                        'uploads/customers/' . $customer->photo
                                    ) }}"
                                    alt="{{ $customer->name }}"
                                    class="customer-avatar-img"
                                >

                            @else

                                @php

                                    $name = trim(
                                        $customer->name ?? 'Pelanggan'
                                    );

                                    $words = preg_split(
                                        '/\s+/',
                                        $name
                                    );

                                    if(count($words) >= 2){

                                        $initial =
                                            strtoupper(
                                                substr(
                                                    $words[0],
                                                    0,
                                                    1
                                                )
                                            )
                                            .
                                            strtoupper(
                                                substr(
                                                    $words[1],
                                                    0,
                                                    1
                                                )
                                            );

                                    }else{

                                        $initial =
                                            strtoupper(
                                                substr(
                                                    $name,
                                                    0,
                                                    1
                                                )
                                            );

                                    }

                                @endphp

                                {{ $initial }}

                            @endif

                        </div>


                        {{-- NAME --}}

                        <div class="customer-name">

                            <h4
                                title="{{ $customer->name }}"
                            >
                                {{ $customer->name ?? 'Pelanggan' }}
                            </h4>

                            <span
                                title="{{ $customer->email }}"
                            >
                                {{ $customer->email ?? 'Email tidak tersedia' }}
                            </span>

                        </div>

                    </div>


                    {{-- =================================================
                         INFO
                    ================================================== --}}

                    <div class="customer-info">


                        <div class="customer-info-item">

                            <i class="bi bi-telephone"></i>

                            <span>
                                {{ $customer->phone ?? '-' }}
                            </span>

                        </div>


                        <div class="customer-info-item">

                            <i class="bi bi-geo-alt"></i>

                            <span
                                title="{{ $customer->address }}"
                            >
                                {{ $customer->address ?: '-' }}
                            </span>

                        </div>

                    </div>


                    {{-- =================================================
                         STATUS
                    ================================================== --}}

                    <div class="customer-status">


                        <div class="status-label">

                            <span class="status-dot"></span>

                            Status pelanggan

                        </div>


                        <span class="status-badge">

                            {{ $customer->status ?? 'Aktif' }}

                        </span>

                    </div>


                    {{-- =================================================
                         BUTTON
                    ================================================== --}}

                    <a
                        href="{{ route(
                            'admin.customer-mode.enter',
                            $customer->id
                        ) }}"
                        class="view-customer-btn"
                    >

                        <i class="bi bi-eye"></i>

                        Lihat sebagai Pelanggan

                    </a>


                </div>


            @empty


                <div class="empty-customer">

                    <i class="bi bi-people"></i>

                    <h4>
                        Belum ada pelanggan
                    </h4>

                    <p>
                        Data pelanggan belum tersedia.
                    </p>

                </div>


            @endforelse

        </div>

    </div>

</div>


<script>

document.addEventListener(
    'DOMContentLoaded',
    function(){

        const searchInput =
            document.getElementById(
                'customerSearch'
            );

        const cards =
            document.querySelectorAll(
                '.customer-card'
            );


        if(!searchInput){
            return;
        }


        searchInput.addEventListener(
            'input',
            function(){

                const keyword =
                    this.value
                        .toLowerCase()
                        .trim();


                cards.forEach(
                    function(card){

                        const data =
                            card.dataset.search || '';


                        if(
                            data.includes(keyword)
                        ){

                            card.style.display = '';

                        }else{

                            card.style.display = 'none';

                        }

                    }
                );

            }
        );

    }
);

</script>

@endsection