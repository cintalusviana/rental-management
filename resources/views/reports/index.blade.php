@extends('layout.app')

@section('content')

<style>

/* =====================================================
   FONT
===================================================== */

@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');


/* =====================================================
   ROOT
===================================================== */

:root{
    --primary:#2563EB;
    --primary-dark:#1D4ED8;

    --blue-soft:#EFF6FF;
    --green:#16A34A;
    --green-soft:#F0FDF4;
    --purple:#7C3AED;
    --purple-soft:#F5F3FF;
    --orange:#EA580C;
    --orange-soft:#FFF7ED;

    --bg:#F6F8FC;
    --white:#FFFFFF;

    --text:#0F172A;
    --muted:#64748B;
    --border:#E8EDF5;

    --shadow:0 6px 20px rgba(15,23,42,.045);
    --shadow-hover:0 12px 28px rgba(15,23,42,.09);
}


/* =====================================================
   GLOBAL
===================================================== */

body{
    background:var(--bg)!important;
    font-family:'Inter',sans-serif;
    color:var(--text);
}

.report-page{
    width:100%;
    padding:4px 18px 25px;
    animation:pageIn .35s ease;
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


/* =====================================================
   HEADER
===================================================== */

.report-header{
    display:flex;
    align-items:flex-start;
    justify-content:space-between;
    gap:25px;
    margin-bottom:20px;
}

.report-title{
    display:flex;
    align-items:center;
    gap:12px;
    padding-top:3px;
}

.title-icon{
    width:43px;
    height:43px;
    border-radius:12px;

    display:flex;
    align-items:center;
    justify-content:center;

    background:linear-gradient(
        135deg,
        #2563EB,
        #60A5FA
    );

    color:#fff;
    font-size:18px;

    box-shadow:
        0 7px 15px rgba(37,99,235,.20);

    flex-shrink:0;
}

.report-title h2{
    margin:0;
    font-size:24px;
    line-height:1.2;
    font-weight:800;
    letter-spacing:-.5px;
    color:var(--text);
}

.report-title p{
    margin:4px 0 0;
    color:var(--muted);
    font-size:12px;
}


/* =====================================================
   ACTION AREA
===================================================== */

.report-actions{
    display:flex;
    flex-direction:column;
    align-items:flex-end;
    gap:8px;
    min-width:390px;
}


/* =====================================================
   DATE AREA
===================================================== */

.date-form{
    display:flex;
    align-items:flex-end;
    justify-content:flex-end;
    gap:7px;
    width:100%;
}

.filter-group{
    display:flex;
    flex-direction:column;
    gap:3px;
}

.filter-group small{
    font-size:10px;
    font-weight:600;
    color:var(--muted);
}

.filter-group input{
    width:130px;
    height:37px;

    padding:6px 10px;

    border:1px solid var(--border);
    border-radius:9px;

    background:#fff;

    font-size:11px;
    box-shadow:none;

    transition:.2s;
}

.filter-group input:focus{
    border-color:#93C5FD;

    box-shadow:
        0 0 0 3px rgba(37,99,235,.08);
}


/* =====================================================
   BUTTON AREA
===================================================== */

.action-buttons{
    display:flex;
    align-items:center;
    justify-content:flex-end;
    gap:7px;
    width:100%;
}


/* =====================================================
   BUTTON
===================================================== */

.report-btn{
    height:37px;

    padding:0 12px;

    border-radius:9px;

    display:inline-flex;
    align-items:center;
    justify-content:center;

    gap:6px;

    font-size:11px;
    font-weight:600;

    text-decoration:none;

    transition:.2s;
    white-space:nowrap;

    cursor:pointer;
}

.report-btn:hover{
    transform:translateY(-1px);
}


/* FILTER */

.btn-filter{
    background:#fff;
    border:1px solid var(--border);
    color:var(--primary);
}

.btn-filter:hover{
    background:var(--blue-soft);
    border-color:#BFDBFE;
    color:var(--primary-dark);
}


/* PDF */

.btn-pdf{
    background:#fff;
    border:1px solid var(--border);
    color:#475569;
}

.btn-pdf:hover{
    background:#F8FAFC;
    border-color:#CBD5E1;
    color:var(--primary);
}


/* EXCEL */

.btn-excel{
    background:var(--primary);
    border:1px solid var(--primary);
    color:#fff;

    box-shadow:
        0 5px 12px rgba(37,99,235,.15);
}

.btn-excel:hover{
    background:var(--primary-dark);
    border-color:var(--primary-dark);
    color:#fff;
}


/* =====================================================
   SUMMARY GRID
===================================================== */

.summary-grid{
    display:grid;

    grid-template-columns:
        repeat(4,minmax(0,1fr));

    gap:14px;

    margin-bottom:20px;
}


/* =====================================================
   REPORT CARD
===================================================== */

.report-card{
    position:relative;

    min-width:0;

    background:var(--white);

    border:1px solid var(--border);

    border-radius:16px;

    padding:17px 17px 15px;

    min-height:190px;

    display:flex;

    flex-direction:column;

    align-items:center;

    text-align:center;

    overflow:hidden;

    box-shadow:var(--shadow);

    transition:
        transform .25s ease,
        box-shadow .25s ease,
        border-color .25s ease;

    text-decoration:none;
}

.report-card::before{
    content:"";

    position:absolute;

    width:95px;
    height:95px;

    border-radius:50%;

    top:-52px;
    right:-40px;

    opacity:.65;
}

.card-blue::before{
    background:#DBEAFE;
}

.card-green::before{
    background:#DCFCE7;
}

.card-purple::before{
    background:#EDE9FE;
}

.card-orange::before{
    background:#FFEDD5;
}

.report-card:hover{
    transform:translateY(-3px);

    box-shadow:var(--shadow-hover);

    border-color:#D9E2EF;
}


/* =====================================================
   CARD ICON
===================================================== */

.card-icon{
    position:relative;

    z-index:1;

    width:43px;
    height:43px;

    border-radius:12px;

    display:flex;

    align-items:center;
    justify-content:center;

    font-size:18px;

    margin-bottom:11px;

    transition:.25s;
}

.report-card:hover .card-icon{
    transform:scale(1.06);
}

.icon-blue{
    background:var(--blue-soft);
    color:var(--primary);
}

.icon-green{
    background:var(--green-soft);
    color:var(--green);
}

.icon-purple{
    background:var(--purple-soft);
    color:var(--purple);
}

.icon-orange{
    background:var(--orange-soft);
    color:var(--orange);
}


/* =====================================================
   CARD TEXT
===================================================== */

.report-card h5{
    margin:0;

    font-size:13px;

    font-weight:700;

    color:var(--text);

    line-height:1.4;
}

.report-card small{
    margin-top:4px;

    font-size:10px;

    color:var(--muted);

    line-height:1.4;
}


/* =====================================================
   VALUE
===================================================== */

.report-value{
    margin-top:12px;

    font-size:22px;

    line-height:1.2;

    font-weight:800;

    letter-spacing:-.4px;

    color:var(--text);
}

.card-blue .report-value{
    color:var(--primary);
}

.card-green .report-value{
    color:var(--green);
}

.card-purple .report-value{
    color:var(--purple);
}

.card-orange .report-value{
    color:var(--orange);
}


/* =====================================================
   CARD FOOTER
===================================================== */

.report-detail{
    width:100%;

    margin-top:auto;

    padding-top:10px;

    display:flex;

    align-items:center;
    justify-content:center;

    gap:5px;

    border-top:1px solid #F1F5F9;

    color:var(--muted);

    font-size:10px;

    font-weight:600;
}

.report-detail i{
    font-size:10px;

    transition:.2s;
}

.report-card:hover .report-detail i{
    transform:translateX(3px);
}


/* =====================================================
   CHART GRID
===================================================== */

.chart-grid{
    display:grid;

    grid-template-columns:
        minmax(0,1.35fr)
        minmax(0,.9fr);

    gap:14px;
}


/* =====================================================
   CHART BOX
===================================================== */

.chart-box{
    background:#fff;

    border:1px solid var(--border);

    border-radius:16px;

    padding:17px;

    box-shadow:var(--shadow);

    min-width:0;
}


/* =====================================================
   CHART HEADER
===================================================== */

.chart-header{
    display:flex;

    align-items:center;

    gap:10px;

    margin-bottom:14px;
}

.chart-icon{
    width:36px;
    height:36px;

    border-radius:10px;

    background:var(--blue-soft);

    color:var(--primary);

    display:flex;

    align-items:center;
    justify-content:center;

    font-size:15px;

    flex-shrink:0;
}

.chart-title{
    font-size:13px;
    font-weight:800;
    color:var(--text);
}

.chart-desc{
    margin-top:2px;
    font-size:10px;
    color:var(--muted);
}


/* =====================================================
   CHART AREA
===================================================== */

.chart-area{
    height:245px;
    position:relative;
}


/* =====================================================
   TABLET
===================================================== */

@media(max-width:1100px){

    .report-header{
        flex-direction:column;
        align-items:stretch;
        gap:15px;
    }

    .report-actions{
        width:100%;
        min-width:0;
        align-items:stretch;
    }

    .date-form{
        justify-content:flex-start;
    }

    .action-buttons{
        justify-content:flex-start;
    }

    .summary-grid{
        grid-template-columns:
            repeat(2,minmax(0,1fr));
    }

    .chart-grid{
        grid-template-columns:1fr;
    }

}


/* =====================================================
   HP
===================================================== */

@media(max-width:768px){

    .report-page{
        padding:5px 10px 20px;
    }

    .report-header{
        margin-bottom:16px;
        gap:12px;
    }

    .report-title{
        gap:10px;
        padding-top:0;
    }

    .title-icon{
        width:39px;
        height:39px;
        border-radius:11px;
        font-size:16px;
    }

    .report-title h2{
        font-size:20px;
    }

    .report-title p{
        font-size:10px;
        margin-top:3px;
    }

    .report-actions{
        width:100%;
        min-width:0;
        gap:7px;
    }

    .date-form{
        display:grid;
        grid-template-columns:1fr 1fr;
        gap:7px;
        width:100%;
    }

    .filter-group{
        width:100%;
    }

    .filter-group input{
        width:100%;
        height:35px;
        font-size:10px;
    }

    .action-buttons{
        display:grid;
        grid-template-columns:
            repeat(3,minmax(0,1fr));
        gap:6px;
        width:100%;
    }

    .report-btn{
        width:100%;
        height:35px;
        padding:0 5px;
        border-radius:8px;
        font-size:9px;
        gap:4px;
    }

    .report-btn i{
        font-size:10px;
    }

    .summary-grid{
        grid-template-columns:
            repeat(2,minmax(0,1fr));

        gap:9px;

        margin-bottom:14px;
    }

    .report-card{
        min-height:165px;
        padding:14px 10px 12px;
        border-radius:14px;
    }

    .card-icon{
        width:38px;
        height:38px;
        border-radius:10px;
        font-size:16px;
        margin-bottom:9px;
    }

    .report-card h5{
        font-size:11px;
    }

    .report-card small{
        font-size:8px;
    }

    .report-value{
        margin-top:10px;
        font-size:18px;
    }

    .report-detail{
        padding-top:8px;
        font-size:8px;
    }

    .chart-grid{
        gap:10px;
    }

    .chart-box{
        padding:13px;
        border-radius:14px;
    }

    .chart-header{
        margin-bottom:10px;
        gap:8px;
    }

    .chart-icon{
        width:32px;
        height:32px;
        border-radius:9px;
        font-size:13px;
    }

    .chart-title{
        font-size:11px;
    }

    .chart-desc{
        font-size:8px;
    }

    .chart-area{
        height:210px;
    }

}


/* =====================================================
   HP SANGAT KECIL
===================================================== */

@media(max-width:420px){

    .report-page{
        padding-left:8px;
        padding-right:8px;
    }

    .date-form{
        gap:5px;
    }

    .filter-group small{
        font-size:9px;
    }

    .filter-group input{
        height:34px;
        padding-left:8px;
        padding-right:8px;
        font-size:9px;
    }

    .action-buttons{
        gap:5px;
    }

    .report-btn{
        height:34px;
        padding:0 3px;
        font-size:8px;
    }

    .report-btn i{
        font-size:9px;
    }

    .summary-grid{
        gap:7px;
    }

    .report-card{
        min-height:155px;
        padding:12px 8px 10px;
    }

    .card-icon{
        width:35px;
        height:35px;
        font-size:14px;
    }

    .report-card h5{
        font-size:10px;
    }

    .report-card small{
        font-size:7.5px;
    }

    .report-value{
        font-size:16px;
    }

    .chart-area{
        height:195px;
    }

}

</style>


{{-- =====================================================
     DATA CHART
===================================================== --}}

<div
    id="reportChartData"
    data-months="{{ json_encode($months) }}"
    data-income="{{ json_encode($incomeData) }}"
    data-transactions="{{ json_encode($transactionData) }}"
></div>


<div class="container-fluid report-page">


    {{-- =================================================
         HEADER
    ================================================== --}}

    <div class="report-header">


        {{-- TITLE --}}

        <div class="report-title">

            <div class="title-icon">
                <i class="bi bi-bar-chart-line-fill"></i>
            </div>

            <div>

                <h2>
                    Laporan
                </h2>

                <p>
                    Analitik dan laporan bisnis rental Anda.
                </p>

            </div>

        </div>


        {{-- =================================================
             ACTION
        ================================================== --}}

        <div class="report-actions">


            {{-- =================================================
                 FORM FILTER
            ================================================== --}}

            <form
                action="{{ route('reports.index') }}"
                method="GET"
                class="date-form"
                id="reportFilterForm"
            >

                <div class="filter-group">

                    <small>
                        Mulai
                    </small>

                    <input
                        type="date"
                        name="start_date"
                        value="{{ $startDate }}"
                        class="form-control"
                        required
                    >

                </div>


                <div class="filter-group">

                    <small>
                        Sampai
                    </small>

                    <input
                        type="date"
                        name="end_date"
                        value="{{ $endDate }}"
                        class="form-control"
                        required
                    >

                </div>

            </form>


            {{-- =================================================
                 BUTTON
            ================================================== --}}

            <div class="action-buttons">


                {{-- FILTER --}}

                <button
                    type="submit"
                    form="reportFilterForm"
                    class="report-btn btn-filter"
                >

                    <i class="bi bi-funnel"></i>

                    Filter

                </button>


                {{-- PDF --}}

                <a
                    href="{{ route('reports.exportPdf', [
                        'start_date' => $startDate,
                        'end_date' => $endDate
                    ]) }}"
                    class="report-btn btn-pdf"
                    target="_blank"
                >

                    <i class="bi bi-printer"></i>

                    Cetak PDF

                </a>


                {{-- EXCEL --}}

                <a
                    href="{{ route('reports.exportExcel', [
                        'start_date' => $startDate,
                        'end_date' => $endDate
                    ]) }}"
                    class="report-btn btn-excel"
                >

                    <i class="bi bi-file-earmark-excel"></i>

                    Export Excel

                </a>


            </div>

        </div>

    </div>


    {{-- =================================================
         SUMMARY
    ================================================== --}}

    <div class="summary-grid">


        {{-- PENYEWAAN --}}

        <a
            href="{{ route('rentals.index', [
                'start_date' => $startDate,
                'end_date' => $endDate
            ]) }}"
            class="report-card card-blue"
        >

            <div class="card-icon icon-blue">

                <i class="bi bi-cart3"></i>

            </div>

            <h5>
                Laporan Penyewaan
            </h5>

            <small>
                Total transaksi dan status sewa
            </small>

            <div class="report-value">
                {{ $totalRental }}
            </div>

            <div class="report-detail">

                <i class="bi bi-arrow-right"></i>

                Lihat Detail

            </div>

        </a>


        {{-- PENDAPATAN --}}

        <a
            href="{{ route('payments.index', [
                'start_date' => $startDate,
                'end_date' => $endDate
            ]) }}"
            class="report-card card-green"
        >

            <div class="card-icon icon-green">

                <i class="bi bi-cash-stack"></i>

            </div>

            <h5>
                Laporan Pendapatan
            </h5>

            <small>
                Pendapatan rental keseluruhan
            </small>

            <div class="report-value">
                Rp {{ number_format($totalIncome,0,',','.') }}
            </div>

            <div class="report-detail">

                <i class="bi bi-arrow-right"></i>

                Lihat Detail

            </div>

        </a>


        {{-- BARANG --}}

        <a
            href="{{ route('products.index') }}"
            class="report-card card-purple"
        >

            <div class="card-icon icon-purple">

                <i class="bi bi-box-seam"></i>

            </div>

            <h5>
                Laporan Barang
            </h5>

            <small>
                Stok dan kondisi barang
            </small>

            <div class="report-value">
                {{ $totalProduct }}
            </div>

            <div class="report-detail">

                <i class="bi bi-arrow-right"></i>

                Lihat Detail

            </div>

        </a>


        {{-- PELANGGAN --}}

        <a
            href="{{ route('customers.index') }}"
            class="report-card card-orange"
        >

            <div class="card-icon icon-orange">

                <i class="bi bi-people"></i>

            </div>

            <h5>
                Laporan Pelanggan
            </h5>

            <small>
                Data pelanggan rental
            </small>

            <div class="report-value">
                {{ $totalCustomer }}
            </div>

            <div class="report-detail">

                <i class="bi bi-arrow-right"></i>

                Lihat Detail

            </div>

        </a>


    </div>


    {{-- =================================================
         CHART
    ================================================== --}}

    <div class="chart-grid">


        {{-- PENDAPATAN --}}

        <div class="chart-box">

            <div class="chart-header">

                <div class="chart-icon">
                    <i class="bi bi-graph-up"></i>
                </div>

                <div>

                    <div class="chart-title">
                        Pendapatan Bulanan
                    </div>

                    <div class="chart-desc">
                        Total pendapatan rental setiap bulan
                    </div>

                </div>

            </div>

            <div class="chart-area">

                <canvas id="incomeChart"></canvas>

            </div>

        </div>


        {{-- TRANSAKSI --}}

        <div class="chart-box">

            <div class="chart-header">

                <div class="chart-icon">

                    <i class="bi bi-bar-chart-fill"></i>

                </div>

                <div>

                    <div class="chart-title">
                        Volume Transaksi
                    </div>

                    <div class="chart-desc">
                        Jumlah transaksi setiap bulan
                    </div>

                </div>

            </div>

            <div class="chart-area">

                <canvas id="transactionChart"></canvas>

            </div>

        </div>


    </div>

</div>


{{-- =====================================================
     CHART JS
===================================================== --}}

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>

document.addEventListener('DOMContentLoaded', function(){


    /* =================================================
       VALIDASI TANGGAL
    ================================================= */

    const form =
        document.getElementById('reportFilterForm');

    const startInput =
        document.querySelector(
            'input[name="start_date"]'
        );

    const endInput =
        document.querySelector(
            'input[name="end_date"]'
        );


    if(form && startInput && endInput){

        form.addEventListener(
            'submit',
            function(event){

                if(
                    startInput.value &&
                    endInput.value &&
                    startInput.value > endInput.value
                ){

                    event.preventDefault();

                    alert(
                        'Tanggal Mulai tidak boleh lebih besar dari Tanggal Sampai.'
                    );

                    return;

                }

            }
        );

    }


    /* =================================================
       DATA CHART
    ================================================= */

    const chartDataElement =
        document.getElementById('reportChartData');


    if(!chartDataElement){
        return;
    }


    let months = [];
    let incomeData = [];
    let transactionData = [];


    try{

        months = JSON.parse(
            chartDataElement.dataset.months || '[]'
        );

        incomeData = JSON.parse(
            chartDataElement.dataset.income || '[]'
        );

        transactionData = JSON.parse(
            chartDataElement.dataset.transactions || '[]'
        );

    }catch(error){

        console.error(
            'Data laporan tidak dapat dibaca:',
            error
        );

        return;

    }


    /* =================================================
       CHART PENDAPATAN
    ================================================= */

    const incomeCanvas =
        document.getElementById('incomeChart');


    if(incomeCanvas){

        const incomeContext =
            incomeCanvas.getContext('2d');


        const incomeGradient =
            incomeContext.createLinearGradient(
                0,
                0,
                0,
                245
            );


        incomeGradient.addColorStop(
            0,
            'rgba(37,99,235,.18)'
        );

        incomeGradient.addColorStop(
            1,
            'rgba(37,99,235,.01)'
        );


        new Chart(
            incomeCanvas,
            {

                type:'line',

                data:{

                    labels:months,

                    datasets:[{

                        label:'Pendapatan',

                        data:incomeData,

                        borderColor:'#2563EB',

                        backgroundColor:
                            incomeGradient,

                        borderWidth:2.5,

                        pointBackgroundColor:
                            '#2563EB',

                        pointBorderColor:
                            '#FFFFFF',

                        pointBorderWidth:2,

                        pointRadius:3,

                        pointHoverRadius:5,

                        fill:true,

                        tension:.4

                    }]

                },

                options:{

                    responsive:true,

                    maintainAspectRatio:false,

                    interaction:{
                        intersect:false,
                        mode:'index'
                    },

                    plugins:{

                        legend:{
                            display:false
                        },

                        tooltip:{

                            backgroundColor:'#0F172A',

                            titleColor:'#FFFFFF',

                            bodyColor:'#FFFFFF',

                            padding:10,

                            displayColors:false,

                            callbacks:{

                                label:function(context){

                                    return 'Rp ' +

                                        new Intl.NumberFormat(
                                            'id-ID'
                                        ).format(
                                            context.parsed.y
                                        );

                                }

                            }

                        }

                    },

                    scales:{

                        x:{

                            grid:{
                                display:false
                            },

                            ticks:{

                                color:'#64748B',

                                font:{
                                    size:9
                                }

                            }

                        },

                        y:{

                            beginAtZero:true,

                            grid:{

                                color:'#EEF2F7',

                                drawBorder:false

                            },

                            ticks:{

                                color:'#64748B',

                                font:{
                                    size:9
                                },

                                callback:function(value){

                                    return 'Rp ' +

                                        new Intl.NumberFormat(
                                            'id-ID'
                                        ).format(value);

                                }

                            }

                        }

                    }

                }

            }
        );

    }


    /* =================================================
       CHART TRANSAKSI
    ================================================= */

    const transactionCanvas =
        document.getElementById(
            'transactionChart'
        );


    if(transactionCanvas){

        new Chart(
            transactionCanvas,
            {

                type:'bar',

                data:{

                    labels:months,

                    datasets:[{

                        label:'Transaksi',

                        data:transactionData,

                        backgroundColor:'#2563EB',

                        hoverBackgroundColor:'#1D4ED8',

                        borderRadius:6,

                        borderSkipped:false,

                        barPercentage:.55,

                        categoryPercentage:.7

                    }]

                },

                options:{

                    responsive:true,

                    maintainAspectRatio:false,

                    plugins:{

                        legend:{
                            display:false
                        },

                        tooltip:{

                            backgroundColor:'#0F172A',

                            titleColor:'#FFFFFF',

                            bodyColor:'#FFFFFF',

                            padding:10,

                            displayColors:false,

                            callbacks:{

                                label:function(context){

                                    return context.parsed.y +
                                        ' Transaksi';

                                }

                            }

                        }

                    },

                    scales:{

                        x:{

                            grid:{
                                display:false
                            },

                            ticks:{

                                color:'#64748B',

                                font:{
                                    size:9
                                }

                            }

                        },

                        y:{

                            beginAtZero:true,

                            ticks:{

                                precision:0,

                                color:'#64748B',

                                font:{
                                    size:9
                                }

                            },

                            grid:{

                                color:'#EEF2F7',

                                drawBorder:false

                            }

                        }

                    }

                }

            }
        );

    }

});

</script>

@endsection

