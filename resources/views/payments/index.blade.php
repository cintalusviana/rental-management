@extends('layout.app')

@section('content')

<style>
/* =========================================================
   FONT & VARIABLE
========================================================= */

@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

:root{
    --primary:#2563EB;
    --primary-dark:#1D4ED8;
    --primary-soft:#EFF6FF;
    --primary-border:#BFDBFE;

    --success:#16A34A;
    --success-soft:#F0FDF4;

    --danger:#DC2626;
    --danger-soft:#FEF2F2;

    --dark:#0F172A;
    --text:#334155;
    --muted:#64748B;

    --border:#E2E8F0;
    --border-light:#F1F5F9;

    --bg:#F5F8FC;
    --white:#FFFFFF;
}


/* =========================================================
   GLOBAL
========================================================= */

body{
    background:var(--bg);
    font-family:'Inter',sans-serif;
    color:var(--text);
}

.payment-page{
    padding-bottom:45px;
}


/* =========================================================
   HEADER
========================================================= */

.payment-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:18px;
    margin-bottom:25px;
}

.payment-header-left{
    min-width:0;
}

.payment-header-left h2{
    margin:0;
    color:var(--dark);
    font-size:30px;
    font-weight:800;
    letter-spacing:-.6px;

    display:flex;
    align-items:center;
    gap:11px;
}

.payment-header-left h2 i{
    width:44px;
    height:44px;
    min-width:44px;

    display:inline-flex;
    align-items:center;
    justify-content:center;

    background:var(--primary-soft);
    color:var(--primary);

    border:1px solid var(--primary-border);
    border-radius:13px;

    font-size:20px;

    box-shadow:0 5px 14px rgba(37,99,235,.08);
}

.payment-header-left p{
    margin:7px 0 0;

    color:var(--muted);
    font-size:13px;
    line-height:1.5;
    max-width:650px;
}


/* =========================================================
   BUTTON CATAT PEMBAYARAN
   MODERN
========================================================= */

.payment-add-wrapper{
    width:100%;
    display:flex;
    justify-content:flex-end;
    margin-bottom:25px;
}

.btn-add-payment{
    position:relative;

    appearance:none !important;
    -webkit-appearance:none !important;

    border:0 !important;

    background:linear-gradient(
        135deg,
        #2563EB 0%,
        #1D4ED8 100%
    ) !important;

    color:#FFFFFF !important;

    min-height:46px;
    padding:0 18px !important;

    border-radius:12px !important;

    font-size:12px !important;
    font-weight:700 !important;

    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:8px;

    cursor:pointer;

    white-space:nowrap;

    box-shadow:
        0 7px 18px rgba(37,99,235,.22) !important;

    transition:
        transform .2s ease,
        box-shadow .2s ease,
        background .2s ease;
}

.btn-add-payment::before{
    content:"";

    position:absolute;
    inset:1px;

    border-radius:11px;

    background:linear-gradient(
        180deg,
        rgba(255,255,255,.12),
        rgba(255,255,255,0)
    );

    pointer-events:none;
}

.btn-add-payment i,
.btn-add-payment span{
    position:relative;
    z-index:1;
}

.btn-add-payment i{
    width:25px;
    height:25px;

    display:flex;
    align-items:center;
    justify-content:center;

    background:rgba(255,255,255,.16);

    border-radius:7px;

    color:#FFFFFF !important;

    font-size:12px;
}

.btn-add-payment:hover{
    background:linear-gradient(
        135deg,
        #1D4ED8 0%,
        #1E40AF 100%
    ) !important;

    color:#FFFFFF !important;

    transform:translateY(-2px);

    box-shadow:
        0 10px 23px rgba(37,99,235,.28) !important;
}

.btn-add-payment:active{
    transform:translateY(0);

    box-shadow:
        0 5px 12px rgba(37,99,235,.2) !important;
}

.btn-add-payment:focus{
    outline:none !important;

    box-shadow:
        0 0 0 4px rgba(37,99,235,.13),
        0 7px 18px rgba(37,99,235,.22) !important;
}


/* =========================================================
   STATISTIK
========================================================= */

.stat-grid{
    display:grid;
    grid-template-columns:repeat(3,minmax(0,1fr));
    gap:20px;
    margin-bottom:20px;
}

.stat-card{
    min-width:0;

    background:#fff;

    border:1px solid var(--border);
    border-radius:18px;

    padding:24px 18px;

    min-height:160px;

    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:center;

    text-align:center;

    box-shadow:
        0 5px 18px rgba(15,23,42,.045);

    transition:.2s ease;
}

.stat-card:hover{
    transform:translateY(-3px);

    box-shadow:
        0 12px 28px rgba(15,23,42,.08);
}

.stat-icon{
    width:55px;
    height:55px;
    min-width:55px;

    border-radius:15px;

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:23px;

    margin-bottom:12px;
}

.icon-green{
    background:var(--success-soft);
    color:var(--success);
}

.icon-orange{
    background:var(--primary-soft);
    color:var(--primary);
}

.icon-red{
    background:var(--danger-soft);
    color:var(--danger);
}

.stat-content{
    width:100%;
}

.stat-card small{
    display:block;

    color:var(--muted);

    font-size:12px;
    font-weight:600;

    margin-bottom:5px;
}

.stat-card strong{
    display:block;

    color:var(--dark);

    font-size:27px;
    font-weight:800;

    line-height:1.3;

    word-break:break-word;
}


/* =========================================================
   CARD UTAMA
========================================================= */

.payment-card{
    background:#fff;

    border:1px solid var(--border);
    border-radius:17px;

    overflow:hidden;

    box-shadow:
        0 5px 18px rgba(15,23,42,.035);

    margin-bottom:22px;
}

.payment-card-header{
    padding:18px 20px;

    border-bottom:1px solid var(--border);

    display:flex;
    justify-content:space-between;
    align-items:center;

    gap:14px;

    flex-wrap:wrap;
}

.section-title{
    display:flex;
    align-items:center;
    gap:10px;

    min-width:0;
}

.section-icon{
    width:41px;
    height:41px;
    min-width:41px;

    border-radius:11px;

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:17px;
}

.section-icon.red{
    background:var(--danger-soft);
    color:var(--danger);
}

.section-icon.blue{
    background:var(--primary-soft);
    color:var(--primary);
}

.section-title h5{
    margin:0;

    color:var(--dark);

    font-size:16px;
    font-weight:800;
}

.section-title p{
    margin:3px 0 0;

    color:var(--muted);

    font-size:11px;
}

.header-actions{
    display:flex;
    align-items:center;
    gap:8px;
}


/* =========================================================
   SEARCH
========================================================= */

.search-box{
    width:270px;
    position:relative;
}

.search-box i{
    position:absolute;

    left:12px;
    top:50%;

    transform:translateY(-50%);

    color:#94A3B8;

    pointer-events:none;

    font-size:13px;
}

.search-box input{
    width:100%;
    height:38px;

    border:1px solid var(--border);

    border-radius:10px;

    padding:0 11px 0 35px;

    outline:none;

    font-size:12px;

    background:#fff;

    transition:.2s ease;
}

.search-box input:hover{
    border-color:#CBD5E1;
}

.search-box input:focus{
    border-color:var(--primary);

    box-shadow:
        0 0 0 3px rgba(37,99,235,.08);
}


/* =========================================================
   VIEW ALL
========================================================= */

.btn-view-all{
    height:38px;

    border:1px solid var(--primary-border);

    background:var(--primary-soft);

    color:var(--primary);

    padding:0 12px;

    border-radius:10px;

    font-size:11px;
    font-weight:700;

    display:inline-flex;
    align-items:center;
    justify-content:center;

    gap:6px;

    cursor:pointer;

    white-space:nowrap;

    transition:.2s ease;
}

.btn-view-all:hover{
    background:#DBEAFE;

    border-color:#93C5FD;

    transform:translateY(-1px);
}

.btn-view-all.active{
    background:var(--primary);

    color:#fff;

    border-color:var(--primary);
}


/* =========================================================
   TABLE
========================================================= */

.table{
    margin:0;

    min-width:900px;
}

.table thead th{
    background:#F8FAFC;

    border-bottom:1px solid var(--border);

    color:#64748B;

    font-size:10px;
    font-weight:700;

    text-transform:uppercase;

    padding:14px 16px;

    white-space:nowrap;
}

.table tbody td{
    padding:15px 16px;

    vertical-align:middle;

    border-bottom:1px solid var(--border-light);

    color:var(--text);

    font-size:12px;
}

.table tbody tr:last-child td{
    border-bottom:0;
}

.table tbody tr{
    transition:.15s ease;
}

.table tbody tr:hover{
    background:#FAFCFF;
}


/* =========================================================
   TEXT
========================================================= */

.payment-code{
    color:var(--primary);

    font-weight:800;

    font-size:12px;
}

.customer-name{
    color:var(--dark);

    font-weight:700;

    font-size:12px;
}

.rental-code{
    color:#475569;

    font-weight:600;

    font-size:12px;
}

.amount{
    color:var(--dark);

    font-weight:800;

    white-space:nowrap;

    font-size:12px;
}

.date-text{
    color:#64748B;

    font-size:11px;
}


/* =========================================================
   TAG DENDA
========================================================= */

.bill-detail{
    margin-top:5px;

    display:flex;
    flex-wrap:wrap;

    gap:4px;
}

.bill-tag{
    display:inline-flex;
    align-items:center;

    padding:3px 7px;

    border-radius:6px;

    background:#EFF6FF;
    color:#1D4ED8;

    font-size:9px;
    font-weight:700;
}

.bill-tag.blue{
    background:#EFF6FF;
    color:#1D4ED8;
}


/* =========================================================
   STATUS
========================================================= */

.status{
    display:inline-flex;
    align-items:center;

    gap:5px;

    padding:6px 10px;

    border-radius:30px;

    font-size:10px;
    font-weight:700;

    white-space:nowrap;
}

.status i{
    font-size:6px;
}

.status-lunas{
    background:#F0FDF4;
    color:#15803D;
}

.status-menunggu{
    background:#EFF6FF;
    color:#1D4ED8;
}

.status-belum{
    background:#FEF2F2;
    color:#B91C1C;
}

.status-ditolak{
    background:#FEF2F2;
    color:#B91C1C;
}

.status-proses{
    background:#EFF6FF;
    color:#1D4ED8;
}


/* =========================================================
   ACTION BUTTON MODERN
========================================================= */

.action-group{
    display:flex;
    align-items:center;
    gap:6px;
}

.action-group form{
    margin:0;
}

.action-btn{
    width:34px;
    height:34px;

    border:1px solid #E2E8F0;

    border-radius:9px;

    background:#FFFFFF;

    color:#64748B;

    display:inline-flex;

    align-items:center;
    justify-content:center;

    text-decoration:none;

    transition:
        background .18s ease,
        border-color .18s ease,
        color .18s ease,
        transform .18s ease,
        box-shadow .18s ease;

    cursor:pointer;

    padding:0;

    box-shadow:
        0 2px 5px rgba(15,23,42,.03);
}

.action-btn i{
    font-size:14px;
}

.action-btn:hover{
    color:var(--primary);

    border-color:#BFDBFE;

    background:#EFF6FF;

    transform:translateY(-2px);

    box-shadow:
        0 5px 10px rgba(37,99,235,.10);
}

.action-btn.pay{
    color:#2563EB;

    background:#EFF6FF;

    border-color:#BFDBFE;
}

.action-btn.pay:hover{
    color:#FFFFFF;

    background:#2563EB;

    border-color:#2563EB;

    box-shadow:
        0 6px 13px rgba(37,99,235,.20);
}

.action-btn.verify{
    color:#2563EB;

    background:#EFF6FF;

    border-color:#BFDBFE;
}

.action-btn.verify:hover{
    color:#FFFFFF;

    background:#2563EB;

    border-color:#2563EB;
}

.action-btn.delete{
    color:#DC2626;
}

.action-btn.delete:hover{
    color:#FFFFFF;

    background:#DC2626;

    border-color:#DC2626;

    box-shadow:
        0 6px 13px rgba(220,38,38,.18);
}

.action-btn:disabled{
    opacity:.42;

    cursor:not-allowed;

    transform:none !important;

    box-shadow:none !important;
}


/* =========================================================
   EMPTY
========================================================= */

.empty-state{
    text-align:center;

    padding:55px 25px;
}

.empty-icon{
    width:64px;
    height:64px;

    margin:0 auto 14px;

    border-radius:17px;

    background:var(--primary-soft);

    color:var(--primary);

    display:flex;

    align-items:center;
    justify-content:center;

    font-size:27px;
}

.empty-state h5{
    margin:0 0 6px;

    color:var(--dark);

    font-size:16px;
    font-weight:800;
}

.empty-state p{
    margin:0;

    color:var(--muted);

    font-size:11px;
}


/* =========================================================
   MODAL MODERN
========================================================= */

.modal-content{
    border:0;

    border-radius:18px;

    overflow:hidden;

    box-shadow:
        0 25px 65px rgba(15,23,42,.18);
}

.modal-header{
    background:linear-gradient(
        135deg,
        #2563EB,
        #1D4ED8
    );

    color:#fff;

    border:0;

    padding:18px 20px;
}

.modal-title{
    font-size:16px;
    font-weight:800;

    display:flex;
    align-items:center;
}

.modal-header .btn-close{
    filter:brightness(0) invert(1);

    opacity:.85;
}

.modal-header .btn-close:hover{
    opacity:1;
}

.modal-body{
    padding:23px;
}

.modal-footer{
    border-top:1px solid var(--border);

    padding:14px 20px;

    background:#FAFCFF;
}

.add-payment-dialog{
    max-width:720px;

    width:calc(100% - 25px);
}

.add-payment-body{
    padding:23px;
}

.add-payment-grid{
    display:grid;

    grid-template-columns:1fr 1fr;

    gap:17px 20px;
}

.form-full{
    grid-column:1 / -1;
}


/* =========================================================
   FORM
========================================================= */

.form-label{
    color:var(--dark);

    font-size:11px;

    font-weight:700;

    margin-bottom:7px;
}

.form-control,
.form-select{
    min-height:43px;

    border:1px solid var(--border);

    border-radius:10px;

    font-size:12px;

    color:var(--text);

    transition:.2s ease;
}

.form-control:hover,
.form-select:hover{
    border-color:#CBD5E1;
}

.form-control:focus,
.form-select:focus{
    border-color:var(--primary);

    box-shadow:
        0 0 0 3px rgba(37,99,235,.08);
}


/* =========================================================
   TOTAL
========================================================= */

.total-box{
    background:#EFF6FF;

    border:1px solid #DBEAFE;

    border-radius:11px;

    padding:14px;
}

.total-box small{
    display:block;

    color:#64748B;

    font-size:10px;

    margin-bottom:4px;
}

.total-box strong{
    color:#1D4ED8;

    font-size:19px;

    font-weight:800;
}


/* =========================================================
   BREAKDOWN
========================================================= */

.bill-breakdown{
    background:#F8FAFC;

    border:1px solid var(--border);

    border-radius:12px;

    padding:13px 15px;
}

.breakdown-row{
    display:flex;

    justify-content:space-between;

    align-items:center;

    gap:12px;

    padding:7px 0;

    font-size:11px;
}

.breakdown-row:not(:last-child){
    border-bottom:1px dashed var(--border);
}

.breakdown-row span{
    color:var(--muted);
}

.breakdown-row strong{
    color:var(--dark);

    text-align:right;
}

.breakdown-row.total{
    margin-top:3px;

    padding-top:10px;
}

.breakdown-row.total span{
    color:var(--dark);

    font-weight:800;
}

.breakdown-row.total strong{
    color:var(--primary);

    font-size:14px;
}


/* =========================================================
   INFO
========================================================= */

.info-box{
    background:#F8FAFC;

    border:1px solid var(--border);

    border-radius:10px;

    padding:12px 14px;

    font-size:11px;

    color:var(--muted);

    margin-bottom:14px;
}

.info-box.warning{
    background:#EFF6FF;

    border-color:#BFDBFE;

    color:#1D4ED8;
}

.info-box.success{
    background:#F0FDF4;

    border-color:#BBF7D0;

    color:#166534;
}


/* =========================================================
   DETAIL
========================================================= */

.detail-row{
    display:flex;

    justify-content:space-between;

    align-items:center;

    gap:15px;

    padding:10px 0;

    border-bottom:1px dashed var(--border);
}

.detail-row:last-child{
    border-bottom:0;
}

.detail-row span{
    color:var(--muted);

    font-size:11px;
}

.detail-row strong{
    color:var(--dark);

    font-size:11px;

    text-align:right;

    word-break:break-word;
}


/* =========================================================
   VERIFICATION
========================================================= */

.verify-box{
    margin-top:17px;

    padding:14px;

    background:#EFF6FF;

    border:1px solid #BFDBFE;

    border-radius:11px;
}

.verify-title{
    color:#1D4ED8;

    font-size:11px;

    font-weight:800;

    margin-bottom:9px;
}


/* =========================================================
   BOOTSTRAP BUTTON OVERRIDE
========================================================= */

.btn-primary{
    background:linear-gradient(
        135deg,
        #2563EB,
        #1D4ED8
    ) !important;

    border:0 !important;

    color:#fff !important;

    font-size:11px;

    font-weight:700;

    border-radius:9px;

    padding:9px 15px;

    box-shadow:
        0 5px 12px rgba(37,99,235,.16);

    transition:.2s ease;
}

.btn-primary:hover{
    background:linear-gradient(
        135deg,
        #1D4ED8,
        #1E40AF
    ) !important;

    transform:translateY(-1px);

    box-shadow:
        0 7px 16px rgba(37,99,235,.22);
}

.btn-primary:focus{
    box-shadow:
        0 0 0 3px rgba(37,99,235,.13),
        0 5px 12px rgba(37,99,235,.16) !important;
}

.btn-light{
    border:1px solid var(--border);

    background:#fff;

    color:#475569;

    font-size:11px;

    font-weight:600;

    border-radius:9px;

    padding:9px 15px;

    transition:.2s ease;
}

.btn-light:hover{
    background:#F8FAFC;

    border-color:#CBD5E1;

    color:#334155;
}


/* =========================================================
   ROW VISIBILITY
========================================================= */

.extra-row{
    display:none;
}

.extra-row.show-row{
    display:table-row !important;
}

.no-search-row{
    display:none;
}

.no-search-result{
    text-align:center;

    padding:35px 20px;

    color:var(--muted);

    font-size:11px;
}

.no-search-result i{
    display:block;

    font-size:25px;

    margin-bottom:8px;

    color:#94A3B8;
}


/* =========================================================
   TABLET
========================================================= */

@media(max-width:1000px){

    .stat-grid{
        grid-template-columns:repeat(3,minmax(0,1fr));
        gap:15px;
    }

    .stat-card{
        min-height:150px;
        padding:20px 10px;
    }

    .stat-icon{
        width:50px;
        height:50px;
        min-width:50px;
        font-size:21px;
    }

    .stat-card small{
        font-size:12px;
    }

    .stat-card strong{
        font-size:24px;
    }

    .search-box{
        width:245px;
    }

    .table{
        min-width:900px;
    }
}


/* =========================================================
   MOBILE
========================================================= */

@media(max-width:767px){

    .payment-page{
        padding-left:12px;
        padding-right:12px;
        padding-bottom:30px;
    }


    /* HEADER */

    .payment-header{
        align-items:flex-start;
        margin-bottom:18px;
        gap:10px;
    }

    .payment-header-left{
        flex:1;
    }

    .payment-header-left h2{
        font-size:24px;
        gap:8px;
    }

    .payment-header-left h2 i{
        width:36px;
        height:36px;
        min-width:36px;
        border-radius:10px;
        font-size:17px;
    }

    .payment-header-left p{
        font-size:10px;
    }


    /* STAT */

    .stat-grid{
        grid-template-columns:repeat(3,minmax(0,1fr));

        gap:8px;

        margin-bottom:15px;
    }

    .stat-card{
        min-height:142px;

        padding:16px 5px;

        border-radius:15px;
    }

    .stat-icon{
        width:43px;
        height:43px;

        min-width:43px;

        border-radius:12px;

        font-size:18px;

        margin-bottom:9px;
    }

    .stat-card small{
        font-size:9.5px;
    }

    .stat-card strong{
        font-size:18px;
    }


    /* CATAT PEMBAYARAN */

    .payment-add-wrapper{
        width:100%;

        justify-content:stretch;

        margin-bottom:19px;
    }

    .btn-add-payment{
        width:100% !important;

        min-height:46px;

        border-radius:11px !important;

        font-size:11px !important;
    }

    .btn-add-payment i{
        width:24px;
        height:24px;
    }


    /* CARD */

    .payment-card{
        border-radius:14px;

        margin-bottom:18px;
    }

    .payment-card-header{
        padding:14px;

        gap:11px;
    }

    .section-title{
        width:100%;
    }

    .section-icon{
        width:35px;
        height:35px;

        min-width:35px;

        font-size:14px;
    }

    .section-title h5{
        font-size:14px;
    }

    .section-title p{
        font-size:9px;
    }

    .header-actions{
        width:100%;

        display:flex;

        gap:7px;
    }


    /* SEARCH */

    .search-box{
        flex:1;

        width:auto;
    }

    .search-box input{
        height:36px;

        font-size:10px;

        padding-left:31px;
    }

    .btn-view-all{
        min-width:98px;

        height:36px;

        padding:7px 9px;

        font-size:9px;
    }


    /* TABLE */

    .table-responsive{
        overflow-x:auto;

        -webkit-overflow-scrolling:touch;
    }

    .table{
        min-width:900px;
    }

    .table thead th{
        padding:12px 13px;

        font-size:9px;
    }

    .table tbody td{
        padding:13px;

        font-size:11px;
    }

    .payment-code,
    .customer-name,
    .rental-code,
    .amount{
        font-size:11px;
    }

    .date-text{
        font-size:10px;
    }

    .status{
        font-size:9px;

        padding:5px 8px;
    }

    .bill-tag{
        font-size:8px;
    }

    .action-btn{
        width:31px;
        height:31px;

        border-radius:8px;
    }

    .action-btn i{
        font-size:12px;
    }


    /* MODAL */

    .modal-dialog{
        margin:10px auto;

        width:calc(100% - 18px);

        max-width:none;
    }

    .modal-content{
        border-radius:14px;
    }

    .modal-header{
        padding:15px 17px;
    }

    .modal-title{
        font-size:14px;
    }

    .modal-body{
        padding:18px;
    }

    .modal-footer{
        padding:12px 17px;
    }

    .add-payment-dialog{
        width:calc(100% - 18px);

        max-width:none;
    }

    .add-payment-body{
        padding:18px;
    }

    .add-payment-grid{
        grid-template-columns:1fr;

        gap:13px;
    }

    .form-full{
        grid-column:auto;
    }

    .form-label{
        font-size:10px;
    }

    .form-control,
    .form-select{
        min-height:41px;

        font-size:11px;
    }

    .info-box{
        font-size:10px;

        padding:10px 12px;
    }

    .detail-row{
        padding:9px 0;
    }

    .detail-row span,
    .detail-row strong{
        font-size:10px;
    }

    .breakdown-row{
        font-size:10px;
    }

    .breakdown-row.total strong{
        font-size:13px;
    }

    .verify-title{
        font-size:10px;
    }

    .btn-primary,
    .btn-light{
        font-size:10px;

        padding:8px 12px;
    }
}


/* =========================================================
   HP SANGAT KECIL
========================================================= */

@media(max-width:400px){

    .payment-page{
        padding-left:8px;
        padding-right:8px;
    }

    .payment-header-left h2{
        font-size:22px;
    }

    .payment-header-left h2 i{
        width:33px;
        height:33px;

        min-width:33px;

        font-size:15px;
    }

    .payment-header-left p{
        font-size:9px;
    }

    .stat-grid{
        gap:6px;
    }

    .stat-card{
        min-height:134px;

        padding:14px 3px;

        border-radius:14px;
    }

    .stat-icon{
        width:39px;
        height:39px;

        min-width:39px;

        font-size:16px;

        margin-bottom:8px;
    }

    .stat-card small{
        font-size:8.5px;
    }

    .stat-card strong{
        font-size:16px;
    }

    .btn-add-payment{
        min-height:44px;

        font-size:10px !important;
    }

    .section-title h5{
        font-size:13px;
    }

    .section-title p{
        font-size:8px;
    }

    .search-box input{
        font-size:9px;
    }

    .btn-view-all{
        min-width:90px;

        font-size:8px;
    }
}
</style>


<div class="container-fluid payment-page">


{{-- =====================================================
     HEADER
====================================================== --}}

<div class="payment-header">

    <div class="payment-header-left">

        <h2>
            <i class="bi bi-wallet2"></i>
            <span>Pembayaran</span>
        </h2>

        <p>
            Kelola pembayaran akhir rental dan verifikasi transaksi.
        </p>

    </div>

</div>


{{-- =====================================================
     DATA
====================================================== --}}

@php

    $paymentCollection = collect($payments ?? []);

    $unpaidRentalCollection = collect($unpaidRentals ?? []);

    $totalPayments = $paymentCollection->count();

    $totalLunas = $paymentCollection
        ->filter(function ($payment) {

            $status = strtolower(
                trim((string)($payment->payment_status ?? ''))
            );

            return in_array($status, [
                'lunas',
                'approved',
                'verified'
            ]);

        })
        ->count();

    $totalNominal = $paymentCollection
        ->filter(function ($payment) {

            $status = strtolower(
                trim((string)($payment->payment_status ?? ''))
            );

            return in_array($status, [
                'lunas',
                'approved',
                'verified'
            ]);

        })
        ->sum(function ($payment) {

            return (float)($payment->amount ?? 0);

        });

    $totalUnpaid = $unpaidRentalCollection->count();

    $totalOutstanding = $unpaidRentalCollection->sum(
        function ($rental) {

            $rentalTotal = (float)(
                $rental->total_price ?? 0
            );

            $return = $rental->pengembalian
                ?? $rental->pengembalianData
                ?? null;

            $lateFine = $return
                ? (float)($return->denda_telat ?? 0)
                : 0;

            $damageFine = $return
                ? (float)($return->denda_rusak ?? 0)
                : 0;

            return
                $rentalTotal
                + $lateFine
                + $damageFine;

        }
    );

    $latestUnpaid = $unpaidRentalCollection
        ->sortByDesc(function ($rental) {

            if($rental->created_at){

                return \Carbon\Carbon::parse(
                    $rental->created_at
                )->timestamp;

            }

            if($rental->rental_date){

                return \Carbon\Carbon::parse(
                    $rental->rental_date
                )->timestamp;

            }

            return 0;

        })
        ->values();

    $latestPayments = $paymentCollection
        ->sortByDesc(function ($payment) {

            if($payment->created_at){

                return \Carbon\Carbon::parse(
                    $payment->created_at
                )->timestamp;

            }

            if($payment->payment_date){

                return \Carbon\Carbon::parse(
                    $payment->payment_date
                )->timestamp;

            }

            return 0;

        })
        ->values();

@endphp


{{-- =====================================================
     STATISTIK
====================================================== --}}

<div class="stat-grid">

    <div class="stat-card">

        <div class="stat-icon icon-red">
            <i class="bi bi-exclamation-circle"></i>
        </div>

        <div class="stat-content">

            <small>
                Belum Dibayar
            </small>

            <strong>
                {{ $totalUnpaid }}
            </strong>

        </div>

    </div>


    <div class="stat-card">

        <div class="stat-icon icon-green">
            <i class="bi bi-check-circle"></i>
        </div>

        <div class="stat-content">

            <small>
                Pembayaran Lunas
            </small>

            <strong>
                {{ $totalLunas }}
            </strong>

        </div>

    </div>


    <div class="stat-card">

        <div class="stat-icon icon-orange">
            <i class="bi bi-wallet2"></i>
        </div>

        <div class="stat-content">

            <small>
                Total Pendapatan
            </small>

            <strong>
                Rp {{ number_format($totalNominal,0,',','.') }}
            </strong>

        </div>

    </div>

</div>


{{-- =====================================================
     TOMBOL CATAT PEMBAYARAN
====================================================== --}}

<div class="payment-add-wrapper">

    <button
        type="button"
        class="btn-add-payment"
        data-bs-toggle="modal"
        data-bs-target="#addPaymentModal"
    >

        <i class="bi bi-plus-lg"></i>

        <span>
            Catat Pembayaran
        </span>

    </button>

</div>


{{-- =====================================================
     TAGIHAN BELUM DIBAYAR
====================================================== --}}

<div class="payment-card">

    <div class="payment-card-header">

        <div class="section-title">

            <div class="section-icon red">
                <i class="bi bi-wallet2"></i>
            </div>

            <div>

                <h5>
                    Tagihan Belum Dibayar
                </h5>

                <p>
                    5 tagihan terbaru
                </p>

            </div>

        </div>


        <div class="header-actions">

            <div class="search-box">

                <i class="bi bi-search"></i>

                <input
                    type="text"
                    id="unpaidSearch"
                    placeholder="Cari rental / pelanggan..."
                    autocomplete="off"
                >

            </div>


            @if($totalUnpaid > 5)

                <button
                    type="button"
                    class="btn-view-all"
                    id="btnViewUnpaid"
                >

                    <i class="bi bi-grid-3x3-gap"></i>

                    <span>
                        Lihat Semua
                    </span>

                </button>

            @endif

        </div>

    </div>


    <div class="table-responsive">

        <table class="table">

            <thead>

                <tr>

                    <th>No</th>
                    <th>Kode Rental</th>
                    <th>Pelanggan</th>
                    <th>Tanggal Rental</th>
                    <th>Tagihan Akhir</th>
                    <th>Status</th>
                    <th>Aksi</th>

                </tr>

            </thead>


            <tbody id="unpaidTable">

                @forelse($latestUnpaid as $rental)

                    @php

                        $customer =
                            $rental->customer;

                        $customerName =
                            $customer
                                ? (
                                    $customer->name
                                    ?? $customer->nama
                                    ?? $customer->customer_name
                                    ?? 'Pelanggan'
                                )
                                : 'Pelanggan';

                        $rentalCode =
                            $rental->rental_code ?? '-';

                        $rentalTotal =
                            (float)(
                                $rental->total_price ?? 0
                            );

                        $return =
                            $rental->pengembalian
                            ?? $rental->pengembalianData
                            ?? null;

                        $lateFine =
                            $return
                                ? (float)(
                                    $return->denda_telat ?? 0
                                )
                                : 0;

                        $damageFine =
                            $return
                                ? (float)(
                                    $return->denda_rusak ?? 0
                                )
                                : 0;

                        $finalBill =
                            $rentalTotal
                            + $lateFine
                            + $damageFine;

                        $rentalDate =
                            $rental->rental_date
                                ? \Carbon\Carbon::parse(
                                    $rental->rental_date
                                )->format('d/m/Y')
                                : '-';

                        $isReturned =
                            $return !== null;

                        $searchUnpaid =
                            strtolower(
                                $rentalCode . ' ' .
                                $customerName . ' ' .
                                $rentalDate
                            );

                    @endphp


                    <tr
                        class="unpaid-row {{ $loop->iteration > 5 ? 'extra-row' : '' }}"
                        data-search="{{ $searchUnpaid }}"
                    >

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            <span class="rental-code">
                                {{ $rentalCode }}
                            </span>
                        </td>

                        <td>
                            <span class="customer-name">
                                {{ $customerName }}
                            </span>
                        </td>

                        <td>
                            <span class="date-text">
                                {{ $rentalDate }}
                            </span>
                        </td>

                        <td>

                            <span class="amount">
                                Rp {{ number_format($finalBill,0,',','.') }}
                            </span>

                            <div class="bill-detail">

                                @if($lateFine > 0)

                                    <span class="bill-tag">
                                        Telat:
                                        Rp {{ number_format($lateFine,0,',','.') }}
                                    </span>

                                @endif

                                @if($damageFine > 0)

                                    <span class="bill-tag">
                                        Rusak:
                                        Rp {{ number_format($damageFine,0,',','.') }}
                                    </span>

                                @endif

                                @if(!$isReturned)

                                    <span class="bill-tag blue">
                                        Belum Kembali
                                    </span>

                                @endif

                            </div>

                        </td>

                        <td>

                            @if($isReturned)

                                <span class="status status-belum">

                                    <i class="bi bi-circle-fill"></i>

                                    Belum Bayar

                                </span>

                            @else

                                <span class="status status-proses">

                                    <i class="bi bi-circle-fill"></i>

                                    Menunggu Pengembalian

                                </span>

                            @endif

                        </td>

                        <td>

                            @if($isReturned)

                                <button
                                    type="button"
                                    class="action-btn pay"
                                    data-bs-toggle="modal"
                                    data-bs-target="#addPaymentModal"
                                    data-rental-id="{{ $rental->id }}"
                                    title="Catat Pembayaran"
                                >

                                    <i class="bi bi-cash-coin"></i>

                                </button>

                            @else

                                <button
                                    type="button"
                                    class="action-btn"
                                    disabled
                                    title="Pembayaran belum dapat dilakukan"
                                >

                                    <i class="bi bi-lock"></i>

                                </button>

                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7" class="p-0">

                            <div class="empty-state">

                                <div class="empty-icon">
                                    <i class="bi bi-check-circle"></i>
                                </div>

                                <h5>
                                    Tidak Ada Tagihan
                                </h5>

                                <p>
                                    Semua rental sudah dibayar atau belum memasuki tahap pembayaran akhir.
                                </p>

                            </div>

                        </td>

                    </tr>

                @endforelse


                <tr
                    id="unpaidNoResult"
                    class="no-search-row"
                >

                    <td colspan="7">

                        <div class="no-search-result">

                            <i class="bi bi-search"></i>

                            Rental yang dicari tidak ditemukan.

                        </div>

                    </td>

                </tr>

            </tbody>

        </table>

    </div>

</div>


{{-- =====================================================
     RIWAYAT PEMBAYARAN
====================================================== --}}

<div class="payment-card">

    <div class="payment-card-header">

        <div class="section-title">

            <div class="section-icon blue">
                <i class="bi bi-receipt"></i>
            </div>

            <div>

                <h5>
                    Riwayat Pembayaran
                </h5>

                <p>
                    5 pembayaran terbaru
                </p>

            </div>

        </div>


        <div class="header-actions">

            <div class="search-box">

                <i class="bi bi-search"></i>

                <input
                    type="text"
                    id="paymentSearch"
                    placeholder="Cari kode, pelanggan, rental..."
                    autocomplete="off"
                >

            </div>


            @if($totalPayments > 5)

                <button
                    type="button"
                    class="btn-view-all"
                    id="btnViewPayments"
                >

                    <i class="bi bi-grid-3x3-gap"></i>

                    <span>
                        Lihat Semua
                    </span>

                </button>

            @endif

        </div>

    </div>


    <div class="table-responsive">

        <table class="table">

            <thead>

                <tr>

                    <th>No</th>
                    <th>Kode Pembayaran</th>
                    <th>Pelanggan</th>
                    <th>Kode Rental</th>
                    <th>Metode</th>
                    <th>Nominal</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>

                </tr>

            </thead>


            <tbody id="paymentTable">

                @forelse($latestPayments as $payment)

                    @php

                        $rental =
                            $payment->rental;

                        $customer =
                            $rental
                                ? $rental->customer
                                : null;

                        $customerName =
                            $customer
                                ? (
                                    $customer->name
                                    ?? $customer->nama
                                    ?? $customer->customer_name
                                    ?? 'Pelanggan'
                                )
                                : 'Pelanggan';

                        $rentalCode =
                            $rental
                                ? (
                                    $rental->rental_code ?? '-'
                                )
                                : '-';

                        $paymentCode =
                            $payment->payment_code
                            ?? ('PAY-' . $payment->id);

                        $method =
                            $payment->payment_method
                            ?? 'Cash';

                        $amount =
                            (float)(
                                $payment->amount ?? 0
                            );

                        $status =
                            strtolower(
                                trim(
                                    (string)(
                                        $payment->payment_status
                                        ?? 'menunggu'
                                    )
                                )
                            );

                        if($status === 'pending'){
                            $status = 'menunggu';
                        }

                        if(
                            $status === 'approved' ||
                            $status === 'verified'
                        ){
                            $status = 'lunas';
                        }

                        if($status === 'rejected'){
                            $status = 'ditolak';
                        }

                        switch($status){

                            case 'lunas':

                                $statusClass =
                                    'status-lunas';

                                $statusText =
                                    'Lunas';

                                break;

                            case 'ditolak':

                                $statusClass =
                                    'status-ditolak';

                                $statusText =
                                    'Ditolak';

                                break;

                            default:

                                $statusClass =
                                    'status-menunggu';

                                $statusText =
                                    'Menunggu';

                                break;

                        }

                        $paymentDate =
                            $payment->payment_date
                                ? \Carbon\Carbon::parse(
                                    $payment->payment_date
                                )->format('d/m/Y')
                                : '-';

                        $searchPayment =
                            strtolower(
                                $paymentCode . ' ' .
                                $customerName . ' ' .
                                $rentalCode . ' ' .
                                $method . ' ' .
                                $statusText
                            );

                    @endphp


                    <tr
                        class="payment-row {{ $loop->iteration > 5 ? 'extra-row' : '' }}"
                        data-search="{{ $searchPayment }}"
                    >

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            <span class="payment-code">
                                {{ $paymentCode }}
                            </span>
                        </td>

                        <td>
                            <span class="customer-name">
                                {{ $customerName }}
                            </span>
                        </td>

                        <td>
                            <span class="rental-code">
                                {{ $rentalCode }}
                            </span>
                        </td>

                        <td>
                            {{ $method }}
                        </td>

                        <td>

                            <span class="amount">
                                Rp {{ number_format($amount,0,',','.') }}
                            </span>

                        </td>

                        <td>

                            <span class="status {{ $statusClass }}">

                                <i class="bi bi-circle-fill"></i>

                                {{ $statusText }}

                            </span>

                        </td>

                        <td>

                            <span class="date-text">
                                {{ $paymentDate }}
                            </span>

                        </td>

                        <td>

                            <div class="action-group">

                                {{-- DETAIL --}}

                                <button
                                    type="button"
                                    class="action-btn"
                                    data-bs-toggle="modal"
                                    data-bs-target="#detailPayment{{ $payment->id }}"
                                    title="Detail Pembayaran"
                                >

                                    <i class="bi bi-eye"></i>

                                </button>


                                {{-- VERIFIKASI --}}

                                @if($status === 'menunggu')

                                    <button
                                        type="button"
                                        class="action-btn verify"
                                        data-bs-toggle="modal"
                                        data-bs-target="#verifyPayment{{ $payment->id }}"
                                        title="Verifikasi Pembayaran"
                                    >

                                        <i class="bi bi-check2-circle"></i>

                                    </button>

                                @endif


                                {{-- CETAK --}}

                                @if($status === 'lunas')

                                    <a
                                        href="{{ route('payments.print', $payment->id) }}"
                                        target="_blank"
                                        class="action-btn"
                                        title="Cetak Bukti"
                                    >

                                        <i class="bi bi-printer"></i>

                                    </a>

                                @endif


                                {{-- HAPUS --}}

                                <form
                                    action="{{ route('payments.destroy', $payment->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus pembayaran ini?')"
                                >

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="action-btn delete"
                                        title="Hapus"
                                    >

                                        <i class="bi bi-trash"></i>

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="9" class="p-0">

                            <div class="empty-state">

                                <div class="empty-icon">
                                    <i class="bi bi-wallet2"></i>
                                </div>

                                <h5>
                                    Belum Ada Pembayaran
                                </h5>

                                <p>
                                    Pembayaran akhir rental akan muncul di sini.
                                </p>

                            </div>

                        </td>

                    </tr>

                @endforelse


                <tr
                    id="paymentNoResult"
                    class="no-search-row"
                >

                    <td colspan="9">

                        <div class="no-search-result">

                            <i class="bi bi-search"></i>

                            Pembayaran yang dicari tidak ditemukan.

                        </div>

                    </td>

                </tr>

            </tbody>

        </table>

    </div>

</div>

</div>


{{-- =========================================================
DETAIL + VERIFIKASI
========================================================== --}}

@foreach($latestPayments as $payment)

@php

    $rental =
        $payment->rental;

    $customer =
        $rental
            ? $rental->customer
            : null;

    $customerName =
        $customer
            ? (
                $customer->name
                ?? $customer->nama
                ?? $customer->customer_name
                ?? 'Pelanggan'
            )
            : 'Pelanggan';

    $rentalCode =
        $rental
            ? ($rental->rental_code ?? '-')
            : '-';

    $paymentCode =
        $payment->payment_code
        ?? ('PAY-' . $payment->id);

    $method =
        $payment->payment_method
        ?? 'Cash';

    $amount =
        (float)(
            $payment->amount ?? 0
        );

    $status =
        strtolower(
            trim(
                (string)(
                    $payment->payment_status
                    ?? 'menunggu'
                )
            )
        );

    if($status === 'pending'){
        $status = 'menunggu';
    }

    if(
        $status === 'approved' ||
        $status === 'verified'
    ){
        $status = 'lunas';
    }

    if($status === 'rejected'){
        $status = 'ditolak';
    }

    if($status === 'lunas'){

        $statusClass =
            'status-lunas';

        $statusText =
            'Lunas';

    }elseif($status === 'ditolak'){

        $statusClass =
            'status-ditolak';

        $statusText =
            'Ditolak';

    }else{

        $statusClass =
            'status-menunggu';

        $statusText =
            'Menunggu';

    }

    $paymentDate =
        $payment->payment_date
            ? \Carbon\Carbon::parse(
                $payment->payment_date
            )->format('d/m/Y')
            : '-';

    $return =
        $rental
            ? (
                $rental->pengembalian
                ?? $rental->pengembalianData
                ?? null
            )
            : null;

    $rentalTotal =
        $rental
            ? (float)($rental->total_price ?? 0)
            : 0;

    $lateFine =
        $return
            ? (float)($return->denda_telat ?? 0)
            : 0;

    $damageFine =
        $return
            ? (float)($return->denda_rusak ?? 0)
            : 0;

    $finalBill =
        $rentalTotal
        + $lateFine
        + $damageFine;

@endphp


{{-- =========================================================
DETAIL MODAL
========================================================== --}}

<div
    class="modal fade"
    id="detailPayment{{ $payment->id }}"
    tabindex="-1"
    aria-hidden="true"
>

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">

                    <i class="bi bi-receipt me-2"></i>

                    Detail Pembayaran

                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                ></button>

            </div>


            <div class="modal-body">

                <div class="detail-row">
                    <span>Kode Pembayaran</span>

                    <strong>
                        {{ $paymentCode }}
                    </strong>
                </div>

                <div class="detail-row">
                    <span>Pelanggan</span>

                    <strong>
                        {{ $customerName }}
                    </strong>
                </div>

                <div class="detail-row">
                    <span>Kode Rental</span>

                    <strong>
                        {{ $rentalCode }}
                    </strong>
                </div>

                <div class="detail-row">
                    <span>Metode Pembayaran</span>

                    <strong>
                        {{ $method }}
                    </strong>
                </div>

                <div class="detail-row">
                    <span>Nominal Dibayar</span>

                    <strong>
                        Rp {{ number_format($amount,0,',','.') }}
                    </strong>
                </div>


                @if($finalBill > 0)

                    <div class="bill-breakdown mt-3">

                        <div class="breakdown-row">

                            <span>
                                Total Rental
                            </span>

                            <strong>
                                Rp {{ number_format($rentalTotal,0,',','.') }}
                            </strong>

                        </div>

                        @if($lateFine > 0)

                            <div class="breakdown-row">

                                <span>
                                    Denda Telat
                                </span>

                                <strong>
                                    Rp {{ number_format($lateFine,0,',','.') }}
                                </strong>

                            </div>

                        @endif

                        @if($damageFine > 0)

                            <div class="breakdown-row">

                                <span>
                                    Denda Kerusakan
                                </span>

                                <strong>
                                    Rp {{ number_format($damageFine,0,',','.') }}
                                </strong>

                            </div>

                        @endif

                        <div class="breakdown-row total">

                            <span>
                                Total Tagihan Akhir
                            </span>

                            <strong>
                                Rp {{ number_format($finalBill,0,',','.') }}
                            </strong>

                        </div>

                    </div>

                @endif


                <div class="detail-row">

                    <span>
                        Tanggal Pembayaran
                    </span>

                    <strong>
                        {{ $paymentDate }}
                    </strong>

                </div>


                <div class="detail-row">

                    <span>
                        Status
                    </span>

                    <strong>

                        <span class="status {{ $statusClass }}">

                            <i class="bi bi-circle-fill"></i>

                            {{ $statusText }}

                        </span>

                    </strong>

                </div>


                @if($payment->proof)

                    <div class="info-box success mt-3 mb-0">

                        <i class="bi bi-file-earmark-check me-1"></i>

                        Bukti pembayaran tersedia pada transaksi ini.

                    </div>

                @else

                    <div class="info-box mt-3 mb-0">

                        <i class="bi bi-info-circle me-1"></i>

                        Pembayaran dicatat tanpa bukti pembayaran.

                    </div>

                @endif

            </div>


            <div class="modal-footer">

                <button
                    type="button"
                    class="btn btn-light"
                    data-bs-dismiss="modal"
                >
                    Tutup
                </button>


                @if($status === 'menunggu')

                    <button
                        type="button"
                        class="btn btn-primary"
                        data-bs-dismiss="modal"
                        data-bs-toggle="modal"
                        data-bs-target="#verifyPayment{{ $payment->id }}"
                    >

                        <i class="bi bi-check2-circle me-1"></i>

                        Verifikasi

                    </button>

                @endif


                @if($status === 'lunas')

                    <a
                        href="{{ route('payments.print', $payment->id) }}"
                        target="_blank"
                        class="btn btn-primary"
                    >

                        <i class="bi bi-printer me-1"></i>

                        Cetak Bukti

                    </a>

                @endif

            </div>

        </div>

    </div>

</div>


{{-- =========================================================
VERIFIKASI
========================================================== --}}

@if($status === 'menunggu')

<div
    class="modal fade"
    id="verifyPayment{{ $payment->id }}"
    tabindex="-1"
    aria-hidden="true"
>

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <form
                action="{{ route('payments.updateStatus', $payment->id) }}"
                method="POST"
            >

                @csrf
                @method('PUT')


                <div class="modal-header">

                    <h5 class="modal-title">

                        <i class="bi bi-shield-check me-2"></i>

                        Verifikasi Pembayaran

                    </h5>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                    ></button>

                </div>


                <div class="modal-body">

                    <div class="info-box">

                        <i class="bi bi-info-circle me-1"></i>

                        Periksa pembayaran akhir rental sebelum menentukan status transaksi.

                    </div>


                    <div class="detail-row">

                        <span>
                            Kode Pembayaran
                        </span>

                        <strong>
                            {{ $paymentCode }}
                        </strong>

                    </div>


                    <div class="detail-row">

                        <span>
                            Pelanggan
                        </span>

                        <strong>
                            {{ $customerName }}
                        </strong>

                    </div>


                    <div class="detail-row">

                        <span>
                            Rental
                        </span>

                        <strong>
                            {{ $rentalCode }}
                        </strong>

                    </div>


                    <div class="detail-row">

                        <span>
                            Metode
                        </span>

                        <strong>
                            {{ $method }}
                        </strong>

                    </div>


                    <div class="detail-row">

                        <span>
                            Nominal Dibayar
                        </span>

                        <strong>
                            Rp {{ number_format($amount,0,',','.') }}
                        </strong>

                    </div>


                    @if($finalBill > 0)

                        <div class="bill-breakdown mt-3">

                            <div class="breakdown-row">

                                <span>
                                    Total Rental
                                </span>

                                <strong>
                                    Rp {{ number_format($rentalTotal,0,',','.') }}
                                </strong>

                            </div>


                            @if($lateFine > 0)

                                <div class="breakdown-row">

                                    <span>
                                        Denda Telat
                                    </span>

                                    <strong>
                                        Rp {{ number_format($lateFine,0,',','.') }}
                                    </strong>

                                </div>

                            @endif


                            @if($damageFine > 0)

                                <div class="breakdown-row">

                                    <span>
                                        Denda Rusak
                                    </span>

                                    <strong>
                                        Rp {{ number_format($damageFine,0,',','.') }}
                                    </strong>

                                </div>

                            @endif


                            <div class="breakdown-row total">

                                <span>
                                    Total Tagihan
                                </span>

                                <strong>
                                    Rp {{ number_format($finalBill,0,',','.') }}
                                </strong>

                            </div>

                        </div>

                    @endif


                    @if($payment->proof)

                        <div class="info-box success mt-3">

                            <i class="bi bi-paperclip me-1"></i>

                            Bukti pembayaran tersedia.

                        </div>

                    @endif


                    <div class="verify-box">

                        <div class="verify-title">

                            <i class="bi bi-check2-square me-1"></i>

                            Tentukan Status Pembayaran

                        </div>


                        <select
                            name="payment_status"
                            class="form-select"
                            required
                        >

                            <option value="Lunas">
                                Lunas — Pembayaran valid
                            </option>

                            <option value="Menunggu">
                                Menunggu — Belum diverifikasi
                            </option>

                            <option value="Ditolak">
                                Ditolak — Pembayaran tidak valid
                            </option>

                        </select>

                    </div>

                </div>


                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-light"
                        data-bs-dismiss="modal"
                    >
                        Batal
                    </button>


                    <button
                        type="submit"
                        class="btn btn-primary"
                    >

                        <i class="bi bi-check-lg me-1"></i>

                        Simpan Status

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endif

@endforeach


{{-- =========================================================
MODAL CATAT PEMBAYARAN
========================================================== --}}

<div
    class="modal fade"
    id="addPaymentModal"
    tabindex="-1"
    aria-hidden="true"
>

    <div class="modal-dialog modal-dialog-centered add-payment-dialog">

        <div class="modal-content">

            <form
                action="{{ route('payments.store') }}"
                method="POST"
            >

                @csrf


                <div class="modal-header">

                    <h5 class="modal-title">

                        <i class="bi bi-cash-coin me-2"></i>

                        Catat Pembayaran Akhir

                    </h5>


                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                    ></button>

                </div>


                <div class="modal-body add-payment-body">

                    <div class="info-box warning form-full">

                        <i class="bi bi-info-circle me-1"></i>

                        Pembayaran dilakukan setelah rental dikembalikan.

                    </div>


                    <div class="add-payment-grid">

                        <div class="form-full">

                            <label class="form-label">
                                Pilih Rental
                            </label>


                            <select
                                name="rental_id"
                                id="rentalSelect"
                                class="form-select"
                                required
                            >

                                <option value="">
                                    -- Pilih Rental --
                                </option>


                                @foreach($unpaidRentalCollection as $rental)

                                    @php

                                        $customer =
                                            $rental->customer;

                                        $customerName =
                                            $customer
                                                ? (
                                                    $customer->name
                                                    ?? $customer->nama
                                                    ?? $customer->customer_name
                                                    ?? 'Pelanggan'
                                                )
                                                : 'Pelanggan';

                                        $return =
                                            $rental->pengembalian
                                            ?? $rental->pengembalianData
                                            ?? null;

                                        $rentalTotal =
                                            (float)(
                                                $rental->total_price ?? 0
                                            );

                                        $lateFine =
                                            $return
                                                ? (float)(
                                                    $return->denda_telat ?? 0
                                                )
                                                : 0;

                                        $damageFine =
                                            $return
                                                ? (float)(
                                                    $return->denda_rusak ?? 0
                                                )
                                                : 0;

                                        $finalBill =
                                            $rentalTotal
                                            + $lateFine
                                            + $damageFine;

                                    @endphp


                                    @if($return)

                                        <option
                                            value="{{ $rental->id }}"
                                            data-rental-total="{{ $rentalTotal }}"
                                            data-late-fine="{{ $lateFine }}"
                                            data-damage-fine="{{ $damageFine }}"
                                            data-total="{{ $finalBill }}"
                                        >

                                            {{ $rental->rental_code }}
                                            -
                                            {{ $customerName }}

                                        </option>

                                    @endif

                                @endforeach

                            </select>

                        </div>


                        <div
                            class="bill-breakdown form-full"
                            id="paymentBreakdown"
                        >

                            <div class="breakdown-row">

                                <span>
                                    Total Rental
                                </span>

                                <strong id="rentalBaseTotal">
                                    Rp 0
                                </strong>

                            </div>


                            <div class="breakdown-row">

                                <span>
                                    Denda Keterlambatan
                                </span>

                                <strong id="lateFineTotal">
                                    Rp 0
                                </strong>

                            </div>


                            <div class="breakdown-row">

                                <span>
                                    Denda Kerusakan
                                </span>

                                <strong id="damageFineTotal">
                                    Rp 0
                                </strong>

                            </div>


                            <div class="breakdown-row total">

                                <span>
                                    Total Tagihan Akhir
                                </span>

                                <strong id="rentalTotal">
                                    Rp 0
                                </strong>

                            </div>

                        </div>


                        <div>

                            <label class="form-label">
                                Nominal Pembayaran
                            </label>

                            <input
                                type="number"
                                name="amount"
                                id="paymentAmount"
                                class="form-control"
                                min="0"
                                placeholder="Nominal pembayaran"
                                required
                            >

                        </div>


                        <div>

                            <label class="form-label">
                                Metode Pembayaran
                            </label>

                            <select
                                name="payment_method"
                                class="form-select"
                                required
                            >

                                <option value="">
                                    -- Pilih Metode --
                                </option>

                                <option value="Cash">
                                    Cash / Tunai
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

                            </select>

                        </div>


                        <div>

                            <label class="form-label">
                                Status Pembayaran
                            </label>

                            <select
                                name="payment_status"
                                class="form-select"
                                required
                            >

                                <option value="Lunas">
                                    Lunas
                                </option>

                                <option value="Menunggu">
                                    Menunggu
                                </option>

                            </select>

                        </div>


                        <div>

                            <label class="form-label">
                                Tanggal Pembayaran
                            </label>

                            <input
                                type="date"
                                name="payment_date"
                                class="form-control"
                                value="{{ date('Y-m-d') }}"
                                required
                            >

                        </div>

                    </div>

                </div>


                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-light"
                        data-bs-dismiss="modal"
                    >
                        Batal
                    </button>


                    <button
                        type="submit"
                        class="btn btn-primary"
                    >

                        <i class="bi bi-check-lg me-1"></i>

                        Simpan Pembayaran

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


{{-- =========================================================
JAVASCRIPT
========================================================== --}}

<script>

document.addEventListener('DOMContentLoaded', function () {


    /* =====================================================
       NORMALIZE
    ===================================================== */

    function normalize(value){

        return String(value || '')
            .toLowerCase()
            .trim();

    }


    /* =====================================================
       FORMAT RUPIAH
    ===================================================== */

    function rupiah(value){

        const number =
            Number(value || 0);

        return 'Rp ' +
            number.toLocaleString('id-ID');

    }


    /* =====================================================
       VIEW ALL
    ===================================================== */

    function setupViewAll(
        buttonId,
        rowSelector
    ){

        const button =
            document.getElementById(buttonId);

        if(!button){
            return;
        }

        let expanded = false;

        button.addEventListener(
            'click',
            function(){

                const rows =
                    Array.from(
                        document.querySelectorAll(
                            rowSelector
                        )
                    );

                expanded =
                    !expanded;

                rows.forEach(
                    function(row,index){

                        if(expanded){

                            row.classList.add(
                                'show-row'
                            );

                            row.style.display =
                                'table-row';

                            return;

                        }

                        if(index < 5){

                            row.classList.remove(
                                'extra-row'
                            );

                            row.classList.remove(
                                'show-row'
                            );

                            row.style.display =
                                'table-row';

                        }else{

                            row.classList.add(
                                'extra-row'
                            );

                            row.classList.remove(
                                'show-row'
                            );

                            row.style.display =
                                'none';

                        }

                    }
                );

                if(expanded){

                    button.classList.add(
                        'active'
                    );

                    button.innerHTML =
                        '<i class="bi bi-chevron-up"></i>' +
                        '<span>Sembunyikan</span>';

                }else{

                    button.classList.remove(
                        'active'
                    );

                    button.innerHTML =
                        '<i class="bi bi-grid-3x3-gap"></i>' +
                        '<span>Lihat Semua</span>';

                }

            }
        );

    }


    setupViewAll(
        'btnViewUnpaid',
        '.unpaid-row'
    );


    setupViewAll(
        'btnViewPayments',
        '.payment-row'
    );


    /* =====================================================
       SEARCH
    ===================================================== */

    function setupSearch(
        inputId,
        rowSelector,
        noResultId
    ){

        const input =
            document.getElementById(inputId);

        if(!input){
            return;
        }

        input.addEventListener(
            'input',
            function(){

                const keyword =
                    normalize(this.value);

                const rows =
                    Array.from(
                        document.querySelectorAll(
                            rowSelector
                        )
                    );

                const noResult =
                    document.getElementById(
                        noResultId
                    );

                let visibleCount = 0;

                rows.forEach(
                    function(row,index){

                        const data =
                            normalize(
                                row.getAttribute(
                                    'data-search'
                                )
                            );

                        const matched =
                            data.includes(
                                keyword
                            );

                        if(keyword !== ''){

                            if(matched){

                                row.style.display =
                                    'table-row';

                                visibleCount++;

                            }else{

                                row.style.display =
                                    'none';

                            }

                            return;

                        }

                        if(index < 5){

                            row.style.display =
                                'table-row';

                            visibleCount++;

                        }else{

                            row.style.display =
                                'none';

                        }

                    }
                );

                if(noResult){

                    noResult.style.display =
                        visibleCount === 0
                            ? 'table-row'
                            : 'none';

                }

            }
        );

    }


    setupSearch(
        'unpaidSearch',
        '.unpaid-row',
        'unpaidNoResult'
    );


    setupSearch(
        'paymentSearch',
        '.payment-row',
        'paymentNoResult'
    );


    /* =====================================================
       RENTAL SELECT
    ===================================================== */

    const rentalSelect =
        document.getElementById(
            'rentalSelect'
        );

    const paymentAmount =
        document.getElementById(
            'paymentAmount'
        );

    const rentalTotal =
        document.getElementById(
            'rentalTotal'
        );

    const rentalBaseTotal =
        document.getElementById(
            'rentalBaseTotal'
        );

    const lateFineTotal =
        document.getElementById(
            'lateFineTotal'
        );

    const damageFineTotal =
        document.getElementById(
            'damageFineTotal'
        );


    function updateRentalAmount(){

        if(!rentalSelect){
            return;
        }

        const selectedOption =
            rentalSelect.options[
                rentalSelect.selectedIndex
            ];

        if(!selectedOption){
            return;
        }

        const rentalBase =
            Number(
                selectedOption.getAttribute(
                    'data-rental-total'
                ) || 0
            );

        const lateFine =
            Number(
                selectedOption.getAttribute(
                    'data-late-fine'
                ) || 0
            );

        const damageFine =
            Number(
                selectedOption.getAttribute(
                    'data-damage-fine'
                ) || 0
            );

        const total =
            Number(
                selectedOption.getAttribute(
                    'data-total'
                ) || 0
            );


        if(rentalBaseTotal){

            rentalBaseTotal.textContent =
                rupiah(rentalBase);

        }

        if(lateFineTotal){

            lateFineTotal.textContent =
                rupiah(lateFine);

        }

        if(damageFineTotal){

            damageFineTotal.textContent =
                rupiah(damageFine);

        }

        if(rentalTotal){

            rentalTotal.textContent =
                rupiah(total);

        }

        if(paymentAmount){

            paymentAmount.value =
                total > 0
                    ? total
                    : '';

        }

    }


    if(rentalSelect){

        rentalSelect.addEventListener(
            'change',
            updateRentalAmount
        );

    }


    /* =====================================================
       BUTTON BAYAR DARI TABEL
    ===================================================== */

    document
        .querySelectorAll(
            '[data-rental-id]'
        )
        .forEach(
            function(button){

                button.addEventListener(
                    'click',
                    function(){

                        const rentalId =
                            this.getAttribute(
                                'data-rental-id'
                            );

                        if(!rentalSelect){
                            return;
                        }

                        rentalSelect.value =
                            rentalId;

                        updateRentalAmount();

                    }
                );

            }
        );


    /* =====================================================
       RESET MODAL
    ===================================================== */

    const addPaymentModal =
        document.getElementById(
            'addPaymentModal'
        );

    if(addPaymentModal){

        addPaymentModal.addEventListener(
            'hidden.bs.modal',
            function(){

                if(rentalSelect){

                    rentalSelect.value =
                        '';

                }

                if(rentalBaseTotal){

                    rentalBaseTotal.textContent =
                        'Rp 0';

                }

                if(lateFineTotal){

                    lateFineTotal.textContent =
                        'Rp 0';

                }

                if(damageFineTotal){

                    damageFineTotal.textContent =
                        'Rp 0';

                }

                if(rentalTotal){

                    rentalTotal.textContent =
                        'Rp 0';

                }

                if(paymentAmount){

                    paymentAmount.value =
                        '';

                }

            }
        );

    }


    /* =====================================================
       URL RENTAL
       ?rental=4
    ===================================================== */

    const urlParams =
        new URLSearchParams(
            window.location.search
        );

    const rentalFromUrl =
        urlParams.get(
            'rental'
        );

    if(
        rentalFromUrl &&
        rentalSelect
    ){

        rentalSelect.value =
            rentalFromUrl;

        updateRentalAmount();

    }

});

</script>


{{-- =========================================================
SWEET ALERT
========================================================== --}}

@if(session('success'))

<div
    id="paymentSuccessMessage"
    data-message="{{ session('success') }}"
    hidden
></div>

@endif


@if(session('error'))

<div
    id="paymentErrorMessage"
    data-message="{{ session('error') }}"
    hidden
></div>

@endif


<script>

document.addEventListener(
    'DOMContentLoaded',
    function(){

        const successElement =
            document.getElementById(
                'paymentSuccessMessage'
            );

        const errorElement =
            document.getElementById(
                'paymentErrorMessage'
            );


        if(
            successElement &&
            typeof Swal !== 'undefined'
        ){

            Swal.fire({

                icon:'success',

                title:'Berhasil',

                text:
                    successElement.getAttribute(
                        'data-message'
                    ) ||
                    'Pembayaran berhasil disimpan.',

                confirmButtonColor:
                    '#2563EB',

                confirmButtonText:
                    'OK'

            });

        }


        if(
            errorElement &&
            typeof Swal !== 'undefined'
        ){

            Swal.fire({

                icon:'error',

                title:'Gagal',

                text:
                    errorElement.getAttribute(
                        'data-message'
                    ) ||
                    'Terjadi kesalahan.',

                confirmButtonColor:
                    '#DC2626',

                confirmButtonText:
                    'OK'

            });

        }

    }
);

</script>

@endsection