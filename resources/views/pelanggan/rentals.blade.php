@extends('pelanggan.layout')

@section('title', 'Penyewaan Saya')
@section('page-title', 'Penyewaan Saya')
@section('breadcrumb', 'Penyewaan Saya')

@section('content')

<style>

@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

:root{
    --primary:#2563EB;
    --primary-dark:#1D4ED8;
    --primary-soft:#EFF6FF;

    --success:#059669;
    --success-dark:#047857;
    --success-soft:#ECFDF5;

    --warning:#D97706;
    --warning-soft:#FFFBEB;

    --purple:#7C3AED;
    --purple-soft:#F5F3FF;

    --danger:#DC2626;
    --danger-soft:#FEF2F2;

    --text:#0F172A;
    --text-2:#334155;
    --muted:#64748B;
    --muted-2:#94A3B8;

    --border:#E2E8F0;
    --border-light:#EEF2F7;

    --page:#F5F8FC;
    --white:#fff;

    --shadow-sm:0 2px 10px rgba(15,23,42,.04);
    --shadow:0 10px 28px rgba(15,23,42,.06);
    --shadow-lg:0 20px 55px rgba(15,23,42,.14);
}

*{
    box-sizing:border-box;
}

html,
body{
    width:100%;
    max-width:100%;
    overflow-x:hidden;
}

body{
    margin:0;
    background:var(--page)!important;
    color:var(--text);
    font-family:'Inter',sans-serif!important;
}

/* =========================================================
   PAGE
========================================================= */

.rental-page{
    width:100%;
    max-width:1500px;
    margin:0 auto;
    padding:8px 22px 40px;
    animation:rentalFade .35s ease;
}

@keyframes rentalFade{
    from{
        opacity:0;
        transform:translateY(7px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}

/* =========================================================
   HEADER
========================================================= */

.rental-header{
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:20px;
    margin-bottom:18px;
}

.rental-heading{
    display:flex;
    align-items:center;
    gap:13px;
    min-width:0;
}

.rental-heading-icon{
    width:52px;
    height:52px;
    flex:0 0 52px;

    display:flex;
    align-items:center;
    justify-content:center;

    border-radius:16px;

    background:linear-gradient(145deg,#3B82F6,#2563EB);
    color:#fff;
    font-size:21px;

    box-shadow:0 8px 20px rgba(37,99,235,.20);
}

.rental-heading h1{
    margin:0;

    color:var(--text);
    font-size:26px;
    line-height:1.15;
    font-weight:800;
    letter-spacing:-.5px;
}

.rental-heading p{
    margin:5px 0 0;

    color:var(--muted);
    font-size:12px;
    line-height:1.45;
}

/* =========================================================
   HEADER STATS
========================================================= */

.header-stats{
    display:flex;
    gap:9px;
    flex-shrink:0;
}

.header-stat{
    min-width:120px;
    padding:11px 14px;

    background:#fff;
    border:1px solid var(--border-light);
    border-radius:14px;

    box-shadow:var(--shadow-sm);
}

.header-stat-label{
    display:block;
    margin-bottom:3px;

    color:var(--muted-2);
    font-size:9px;
    font-weight:700;
    text-transform:uppercase;
    letter-spacing:.45px;
}

.header-stat-value{
    display:block;

    color:var(--text);
    font-size:19px;
    line-height:1;
    font-weight:800;
}

/* =========================================================
   FILTER
========================================================= */

.filter-wrapper{
    width:100%;
    margin-bottom:17px;
    padding:5px;

    background:#fff;
    border:1px solid var(--border-light);
    border-radius:15px;

    box-shadow:var(--shadow-sm);

    overflow-x:auto;
    scrollbar-width:none;
}

.filter-wrapper::-webkit-scrollbar{
    display:none;
}

.filter-menu{
    display:flex;
    align-items:center;
    gap:3px;
    width:max-content;
    min-width:100%;
}

.filter-btn{
    height:39px;
    padding:0 13px;

    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:6px;

    border:0;
    border-radius:10px;

    background:transparent;
    color:#64748B;

    font-family:inherit;
    font-size:10.5px;
    font-weight:700;

    white-space:nowrap;
    cursor:pointer;

    transition:.2s ease;
}

.filter-btn i{
    font-size:11px;
}

.filter-btn:hover{
    background:#F8FAFC;
    color:var(--primary);
}

.filter-btn.active{
    background:var(--primary);
    color:#fff;
    box-shadow:0 5px 13px rgba(37,99,235,.20);
}

/* =========================================================
   RENTAL CARD
========================================================= */

.rental-card{
    position:relative;
    width:100%;
    margin-bottom:13px;

    background:#fff;
    border:1px solid var(--border-light);
    border-radius:18px;

    overflow:hidden;

    box-shadow:var(--shadow-sm);

    transition:.25s ease;
}

.rental-card:hover{
    transform:translateY(-2px);
    border-color:#DDE7F3;
    box-shadow:var(--shadow);
}

/* =========================================================
   RENTAL MAIN
========================================================= */

.rental-main{
    padding:17px 18px 16px;
}

.rental-top{
    display:flex;
    align-items:flex-start;
    justify-content:space-between;

    gap:15px;
    margin-bottom:14px;
}

.product-area{
    display:flex;
    align-items:center;
    min-width:0;
    gap:11px;
}

.product-image{
    width:61px;
    height:61px;
    flex:0 0 61px;

    display:flex;
    align-items:center;
    justify-content:center;

    overflow:hidden;

    border-radius:14px;
    border:1px solid #DBEAFE;
    background:#F8FAFC;
}

.product-image img{
    width:100%;
    height:100%;
    object-fit:cover;
}

.product-fallback{
    width:100%;
    height:100%;

    display:flex;
    align-items:center;
    justify-content:center;

    background:linear-gradient(145deg,#EFF6FF,#F8FAFC);

    color:var(--primary);
    font-size:22px;
}

.product-info{
    min-width:0;
}

.product-name{
    max-width:100%;
    margin:0;

    color:var(--text);
    font-size:15px;
    line-height:1.3;
    font-weight:800;

    white-space:nowrap;
    overflow:hidden;
    text-overflow:ellipsis;
}

.product-code{
    margin-top:4px;

    display:flex;
    align-items:center;
    gap:3px;

    color:var(--muted-2);
    font-size:10px;
    font-weight:600;
}

.product-code i{
    font-size:9px;
}

/* =========================================================
   STATUS
========================================================= */

.status-badge{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:6px;

    min-height:29px;
    padding:6px 10px;

    border-radius:999px;

    font-size:9px;
    font-weight:800;

    white-space:nowrap;
}

.status-dot{
    width:6px;
    height:6px;
    flex:0 0 6px;

    border-radius:50%;
    background:currentColor;
}

.status-pending{
    color:#A16207;
    background:#FFFBEB;
    border:1px solid #FDE68A;
}

.status-rented{
    color:#047857;
    background:#ECFDF5;
    border:1px solid #A7F3D0;
}

.status-return{
    color:#7C3AED;
    background:#F5F3FF;
    border:1px solid #DDD6FE;
}

.status-payment{
    color:#1D4ED8;
    background:#EFF6FF;
    border:1px solid #BFDBFE;
}

.status-completed{
    color:#047857;
    background:#ECFDF5;
    border:1px solid #86EFAC;
}

.status-cancelled{
    color:#B91C1C;
    background:#FEF2F2;
    border:1px solid #FECACA;
}

.status-default{
    color:#475569;
    background:#F8FAFC;
    border:1px solid #E2E8F0;
}

/* =========================================================
   INFO GRID
========================================================= */

.rental-info-grid{
    display:grid;
    grid-template-columns:repeat(4,minmax(0,1fr));
    gap:8px;
    margin-bottom:14px;
}

.info-item{
    min-width:0;
    padding:10px 11px;

    background:#F8FAFC;
    border:1px solid #F1F5F9;
    border-radius:11px;
}

.info-label{
    display:flex;
    align-items:center;
    gap:5px;

    margin-bottom:5px;

    color:var(--muted-2);
    font-size:9px;
    font-weight:600;
}

.info-label i{
    font-size:10px;
}

.info-value{
    color:var(--text-2);
    font-size:10.5px;
    font-weight:700;

    white-space:nowrap;
    overflow:hidden;
    text-overflow:ellipsis;
}

.info-value.price{
    color:var(--primary);
    font-size:13px;
    font-weight:800;
}

/* =========================================================
   PAYMENT NOTICE
========================================================= */

.final-payment-notice{
    display:flex;
    align-items:center;
    gap:10px;

    margin-bottom:14px;
    padding:11px 12px;

    border:1px solid #BFDBFE;
    border-radius:11px;
    background:#EFF6FF;
}

.final-payment-notice-icon{
    width:32px;
    height:32px;
    flex:0 0 32px;

    display:flex;
    align-items:center;
    justify-content:center;

    border-radius:9px;

    background:#DBEAFE;
    color:#2563EB;

    font-size:13px;
}

.final-payment-notice-title{
    margin-bottom:2px;

    color:#1E3A8A;
    font-size:10px;
    font-weight:800;
}

.final-payment-notice-description{
    color:#64748B;
    font-size:9px;
    line-height:1.45;
}

/* =========================================================
   PROGRESS
========================================================= */

.rental-progress{
    padding:11px 12px;

    background:#FCFDFE;
    border:1px solid #EEF2F7;
    border-radius:12px;
}

.progress-track{
    display:flex;
    align-items:center;
    width:100%;
}

.progress-step{
    display:flex;
    align-items:center;
    flex:0 0 auto;
}

.progress-circle{
    width:21px;
    height:21px;
    flex:0 0 21px;

    display:flex;
    align-items:center;
    justify-content:center;

    border-radius:50%;

    background:#F1F5F9;
    border:1px solid #E2E8F0;

    color:#94A3B8;
    font-size:8px;
    font-weight:800;
}

.progress-step.active .progress-circle{
    background:var(--primary);
    border-color:var(--primary);
    color:#fff;

    box-shadow:0 3px 8px rgba(37,99,235,.20);
}

.progress-step.completed .progress-circle{
    background:#10B981;
    border-color:#10B981;
    color:#fff;
}

.progress-label{
    margin-left:5px;

    color:#94A3B8;
    font-size:8px;
    font-weight:700;

    white-space:nowrap;
}

.progress-step.active .progress-label,
.progress-step.completed .progress-label{
    color:#475569;
}

.progress-line{
    height:1px;
    flex:1;
    min-width:8px;

    margin:0 5px;

    background:#E2E8F0;
}

.progress-line.completed{
    background:#86EFAC;
}

/* =========================================================
   FOOTER
========================================================= */

.rental-footer{
    display:flex;
    align-items:center;
    justify-content:space-between;

    gap:12px;

    padding:11px 18px;

    border-top:1px solid #F1F5F9;
    background:#FCFDFE;
}

.created-info{
    display:flex;
    align-items:center;
    gap:5px;

    min-width:0;

    color:#94A3B8;
    font-size:9px;
    font-weight:500;

    white-space:nowrap;
    overflow:hidden;
    text-overflow:ellipsis;
}

.action-group{
    display:flex;
    align-items:center;
    gap:6px;

    flex-shrink:0;
}

.btn-action{
    height:34px;

    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:5px;

    padding:0 11px;

    border-radius:9px;

    font-family:inherit;
    font-size:10px;
    font-weight:700;

    text-decoration:none;
    cursor:pointer;

    transition:.2s ease;
}

.btn-action:hover{
    transform:translateY(-1px);
}

.btn-detail{
    background:#fff;
    color:var(--primary);
    border:1px solid #BFDBFE;
}

.btn-detail:hover{
    background:#EFF6FF;
    color:var(--primary-dark);
}

.btn-success{
    background:#ECFDF5;
    color:#047857;
    border:1px solid #A7F3D0;
    cursor:default;
}

.btn-wait{
    background:#F5F3FF;
    color:#7C3AED;
    border:1px solid #DDD6FE;
    cursor:default;
}

.btn-disabled{
    background:#F8FAFC;
    color:#94A3B8;
    border:1px solid #E2E8F0;
    cursor:default;
}

/* =========================================================
   ALERT
========================================================= */

.rental-alert{
    display:flex;
    align-items:center;
    gap:8px;

    margin-bottom:14px;
    padding:11px 13px;

    border-radius:11px;

    font-size:10px;
    font-weight:600;
}

.rental-alert.success{
    background:#ECFDF5;
    border:1px solid #A7F3D0;
    color:#047857;
}

.rental-alert.error{
    background:#FEF2F2;
    border:1px solid #FECACA;
    color:#B91C1C;
}

/* =========================================================
   MODAL
========================================================= */

.detail-modal{
    max-width:880px!important;
}

.detail-modal .modal-content{
    border:0!important;
    border-radius:21px!important;
    overflow:hidden;

    box-shadow:var(--shadow-lg)!important;

    background:#fff;
}

.detail-modal .modal-header{
    position:relative;

    padding:19px 21px!important;

    border:0!important;

    background:linear-gradient(
        135deg,
        #F8FBFF 0%,
        #FFFFFF 70%
    );
}

.modal-title-wrap{
    display:flex;
    align-items:center;
    gap:11px;
    min-width:0;
}

.modal-icon{
    width:43px;
    height:43px;
    flex:0 0 43px;

    display:flex;
    align-items:center;
    justify-content:center;

    border-radius:12px;

    background:linear-gradient(
        145deg,
        #EFF6FF,
        #DBEAFE
    );

    color:var(--primary);
    font-size:18px;
}

.modal-title{
    margin:0!important;

    color:var(--text);
    font-size:16px!important;
    font-weight:800!important;
}

.modal-subtitle{
    margin-top:3px;

    color:var(--muted);
    font-size:9px;
    font-weight:600;
}

.detail-modal .modal-body{
    padding:0 21px 21px!important;
}

/* =========================================================
   DETAIL HERO
========================================================= */

.detail-hero{
    display:flex;
    align-items:center;
    justify-content:space-between;

    gap:15px;

    margin-bottom:16px;
    padding:15px;

    border:1px solid #E8EEF6;
    border-radius:14px;

    background:#fff;

    box-shadow:0 4px 15px rgba(15,23,42,.03);
}

.detail-hero-left{
    display:flex;
    align-items:center;

    gap:10px;

    min-width:0;
}

.detail-hero-image{
    width:52px;
    height:52px;
    flex:0 0 52px;

    display:flex;
    align-items:center;
    justify-content:center;

    overflow:hidden;

    border-radius:12px;
    background:#F8FAFC;
    border:1px solid #E2E8F0;
}

.detail-hero-image img{
    width:100%;
    height:100%;
    object-fit:cover;
}

.detail-hero-image i{
    color:var(--primary);
    font-size:20px;
}

.detail-hero-name{
    margin:0 0 3px;

    color:var(--text);
    font-size:14px;
    font-weight:800;
}

.detail-hero-code{
    color:var(--muted);
    font-size:9px;
}

.detail-status{
    flex-shrink:0;
}

/* =========================================================
   DETAIL SUMMARY
========================================================= */

.detail-summary{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:8px;

    margin-bottom:18px;
}

.summary-box{
    padding:12px;

    background:#F8FAFC;
    border:1px solid #EEF2F7;
    border-radius:12px;
}

.summary-icon{
    width:27px;
    height:27px;

    display:flex;
    align-items:center;
    justify-content:center;

    margin-bottom:7px;

    border-radius:8px;

    background:#EFF6FF;
    color:var(--primary);

    font-size:11px;
}

.summary-label{
    display:block;
    margin-bottom:3px;

    color:#94A3B8;
    font-size:8px;
    font-weight:700;

    text-transform:uppercase;
    letter-spacing:.3px;
}

.summary-value{
    color:var(--text);
    font-size:10.5px;
    font-weight:700;
}

/* =========================================================
   SECTION
========================================================= */

.detail-section{
    margin-top:18px;
}

.detail-section-header{
    display:flex;
    align-items:center;
    justify-content:space-between;

    margin-bottom:9px;
}

.detail-section-title{
    display:flex;
    align-items:center;
    gap:6px;

    margin:0;

    color:var(--text);
    font-size:11px;
    font-weight:800;
}

.detail-section-title i{
    color:var(--primary);
}

.detail-section-caption{
    color:#94A3B8;
    font-size:8px;
    font-weight:600;
}

/* =========================================================
   PRODUCT LIST
========================================================= */

.detail-products{
    overflow:hidden;

    border:1px solid #E9EEF5;
    border-radius:13px;
}

.detail-product{
    display:flex;
    align-items:center;
    justify-content:space-between;

    gap:10px;

    padding:11px 12px;

    background:#fff;
}

.detail-product + .detail-product{
    border-top:1px solid #F1F5F9;
}

.detail-product-left{
    display:flex;
    align-items:center;

    gap:9px;

    min-width:0;
}

.detail-product-image{
    width:43px;
    height:43px;
    flex:0 0 43px;

    display:flex;
    align-items:center;
    justify-content:center;

    overflow:hidden;

    border-radius:10px;

    background:#F8FAFC;
    border:1px solid #E2E8F0;
}

.detail-product-image img{
    width:100%;
    height:100%;
    object-fit:cover;
}

.detail-product-image i{
    color:var(--primary);
    font-size:16px;
}

.detail-product-name{
    max-width:100%;
    margin:0 0 3px;

    color:var(--text);
    font-size:10px;
    font-weight:800;

    white-space:nowrap;
    overflow:hidden;
    text-overflow:ellipsis;
}

.detail-product-meta{
    color:#94A3B8;
    font-size:8px;
}

.detail-product-right{
    flex-shrink:0;
    text-align:right;
}

.detail-product-subtotal{
    color:var(--text);
    font-size:10px;
    font-weight:800;
}

.detail-product-price{
    margin-top:2px;

    color:#94A3B8;
    font-size:8px;
}

/* =========================================================
   RETURN CARD
========================================================= */

.return-card{
    padding:13px;

    border:1px solid #DDD6FE;
    border-radius:13px;

    background:linear-gradient(
        135deg,
        #FAF9FF,
        #F5F3FF
    );
}

.return-card-header{
    display:flex;
    align-items:center;
    gap:7px;

    margin-bottom:10px;

    color:#5B21B6;
    font-size:10px;
    font-weight:800;
}

.return-card-header i{
    color:#7C3AED;
}

.return-grid{
    display:grid;
    grid-template-columns:repeat(2,1fr);
    gap:7px;
}

.return-item{
    padding:9px 10px;

    background:rgba(255,255,255,.7);

    border:1px solid rgba(221,214,254,.8);
    border-radius:9px;
}

.return-item-label{
    display:block;
    margin-bottom:3px;

    color:#8B7BB5;
    font-size:8px;
    font-weight:600;
}

.return-item-value{
    color:#4C1D95;
    font-size:9px;
    font-weight:800;
}

/* =========================================================
   FINE CARD
========================================================= */

.fine-card{
    margin-top:9px;
    padding:13px;

    border:1px solid #FDE68A;
    border-radius:13px;

    background:#FFFBEB;
}

.fine-header{
    display:flex;
    align-items:center;
    gap:6px;

    margin-bottom:9px;

    color:#92400E;
    font-size:10px;
    font-weight:800;
}

.fine-header i{
    color:#D97706;
}

.fine-row{
    display:flex;
    align-items:center;
    justify-content:space-between;

    padding:6px 0;

    border-bottom:1px dashed #FDE68A;

    color:#78350F;
    font-size:9px;
}

.fine-row:last-child{
    border-bottom:0;
}

.fine-row strong{
    font-size:9.5px;
}

/* =========================================================
   TOTAL
========================================================= */

.detail-total{
    margin-top:16px;
    padding:15px;

    border-radius:15px;

    background:linear-gradient(
        135deg,
        #2563EB,
        #1D4ED8
    );

    color:#fff;

    box-shadow:0 10px 24px rgba(37,99,235,.18);
}

.detail-total-top{
    display:flex;
    align-items:center;
    justify-content:space-between;

    gap:10px;
}

.detail-total-label{
    margin-bottom:3px;

    color:rgba(255,255,255,.72);
    font-size:8px;
    font-weight:700;

    text-transform:uppercase;
    letter-spacing:.4px;
}

.detail-total-value{
    color:#fff;

    font-size:22px;
    line-height:1.1;
    font-weight:800;

    letter-spacing:-.4px;
}

.detail-total-icon{
    width:39px;
    height:39px;
    flex:0 0 39px;

    display:flex;
    align-items:center;
    justify-content:center;

    border-radius:11px;

    background:rgba(255,255,255,.14);

    font-size:16px;
}

.detail-total.completed-total{
    background:linear-gradient(
        135deg,
        #059669,
        #047857
    );

    box-shadow:0 10px 24px rgba(5,150,105,.18);
}

/* =========================================================
   PAYMENT INFO
========================================================= */

.payment-info-card{
    display:flex;
    align-items:flex-start;

    gap:9px;

    margin-top:10px;
    padding:12px;

    border:1px solid #BFDBFE;
    border-radius:12px;

    background:#EFF6FF;
}

.payment-info-icon{
    width:31px;
    height:31px;
    flex:0 0 31px;

    display:flex;
    align-items:center;
    justify-content:center;

    border-radius:9px;

    background:#DBEAFE;
    color:#2563EB;

    font-size:12px;
}

.payment-info-title{
    margin-bottom:2px;

    color:#1E3A8A;
    font-size:10px;
    font-weight:800;
}

.payment-info-text{
    color:#64748B;
    font-size:8px;
    line-height:1.5;
}

/* =========================================================
   COMPLETED
========================================================= */

.completed-message{
    display:flex;
    align-items:center;

    gap:9px;

    margin-top:10px;
    padding:12px;

    border:1px solid #A7F3D0;
    border-radius:12px;

    background:#ECFDF5;
}

.completed-message-icon{
    width:32px;
    height:32px;
    flex:0 0 32px;

    display:flex;
    align-items:center;
    justify-content:center;

    border-radius:9px;

    background:#D1FAE5;
    color:#059669;

    font-size:14px;
}

.completed-message-title{
    margin-bottom:2px;

    color:#065F46;
    font-size:10px;
    font-weight:800;
}

.completed-message-text{
    color:#047857;
    font-size:8px;
    line-height:1.45;
}

/* =========================================================
   MODAL FOOTER
========================================================= */

.detail-modal .modal-footer{
    padding:11px 21px!important;

    border-top:1px solid #EEF2F7!important;

    background:#FCFDFE;
}

.btn-modal-close{
    height:35px;
    padding:0 14px;

    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:5px;

    border:0;
    border-radius:9px;

    background:#F1F5F9;
    color:#475569;

    font-family:inherit;
    font-size:10px;
    font-weight:700;

    cursor:pointer;
}

.btn-modal-close:hover{
    background:#E2E8F0;
}

/* =========================================================
   EMPTY
========================================================= */

.empty-card{
    padding:60px 20px;

    text-align:center;

    background:#fff;
    border:1px solid var(--border-light);
    border-radius:18px;

    box-shadow:var(--shadow-sm);
}

.empty-icon{
    width:65px;
    height:65px;

    display:flex;
    align-items:center;
    justify-content:center;

    margin:0 auto 14px;

    border-radius:18px;

    background:#EFF6FF;
    color:var(--primary);

    font-size:27px;
}

.empty-card h4{
    margin:0 0 6px;

    color:var(--text);
    font-size:16px;
    font-weight:800;
}

.empty-card p{
    max-width:430px;
    margin:0 auto 18px;

    color:var(--muted);
    font-size:11px;
    line-height:1.5;
}

.empty-btn{
    height:38px;
    padding:0 17px;

    display:inline-flex;
    align-items:center;
    gap:6px;

    border-radius:9px;

    background:var(--primary);
    color:#fff;

    text-decoration:none;

    font-size:10px;
    font-weight:700;
}

/* =========================================================
   TABLET
========================================================= */

@media(max-width:1100px){

    .rental-info-grid{
        grid-template-columns:repeat(2,1fr);
    }

}

/* =========================================================
   TABLET / HP BESAR
========================================================= */

@media(max-width:850px){

    .rental-page{
        padding:5px 14px 30px;
    }

    .rental-header{
        align-items:flex-start;
        flex-direction:column;
        gap:13px;
    }

    .rental-heading{
        width:100%;
    }

    .header-stats{
        width:100%;
    }

    .header-stat{
        flex:1;
        min-width:0;
    }

    .rental-top{
        gap:10px;
    }

    .detail-hero{
        align-items:flex-start;
        flex-direction:column;
    }

    .detail-status{
        align-self:flex-start;
    }

}

/* =========================================================
   HP - UKURAN DIPERBESAR
========================================================= */

@media(max-width:650px){

    .rental-page{
        padding:2px 10px 25px;
    }

    /* =====================================================
       HEADER
    ====================================================== */

    .rental-header{
        margin-bottom:14px;
        gap:12px;
    }

    .rental-heading{
        gap:10px;
    }

    .rental-heading-icon{
        width:46px;
        height:46px;
        flex-basis:46px;

        border-radius:13px;
        font-size:19px;
    }

    .rental-heading h1{
        font-size:22px;
        letter-spacing:-.4px;
    }

    .rental-heading p{
        margin-top:4px;
        font-size:10px;
        line-height:1.45;
    }

    /* =====================================================
       STATS HP
       DIBESARKAN
    ====================================================== */

    .header-stats{
        width:100%;

        display:grid;
        grid-template-columns:repeat(2,minmax(0,1fr));

        gap:10px;
    }

    .header-stat{
        width:100%;
        min-width:0;
        min-height:82px;

        padding:13px 14px;

        display:flex;
        flex-direction:column;
        justify-content:center;

        border-radius:15px;

        box-shadow:0 3px 12px rgba(15,23,42,.06);
    }

    .header-stat-label{
        display:block;

        margin-bottom:7px;

        font-size:9.5px;
        line-height:1.2;

        letter-spacing:.5px;
    }

    .header-stat-value{
        display:block;

        font-size:25px;
        line-height:1;

        font-weight:800;
    }

    /* =====================================================
       FILTER
    ====================================================== */

    .filter-wrapper{
        margin-bottom:13px;
        padding:4px;

        border-radius:13px;
    }

    .filter-btn{
        height:38px;
        padding:0 12px;

        font-size:10px;
    }

    .filter-btn i{
        font-size:11px;
    }

    /* =====================================================
       CARD
    ====================================================== */

    .rental-card{
        margin-bottom:11px;
        border-radius:16px;
    }

    .rental-main{
        padding:15px 13px 14px;
    }

    .rental-top{
        margin-bottom:12px;
        gap:8px;
    }

    .product-area{
        gap:9px;
    }

    .product-image{
        width:55px;
        height:55px;
        flex-basis:55px;

        border-radius:12px;
    }

    .product-fallback{
        font-size:20px;
    }

    .product-name{
        font-size:14px;
    }

    .product-code{
        margin-top:3px;
        font-size:9px;
    }

    .status-badge{
        min-height:28px;
        padding:5px 9px;

        gap:5px;

        font-size:8.5px;
    }

    .status-dot{
        width:5px;
        height:5px;
        flex-basis:5px;
    }

    /* =====================================================
       INFO
    ====================================================== */

    .rental-info-grid{
        grid-template-columns:repeat(2,minmax(0,1fr));
        gap:7px;

        margin-bottom:12px;
    }

    .info-item{
        padding:9px 9px;
        border-radius:10px;
    }

    .info-label{
        margin-bottom:5px;
        gap:4px;

        font-size:8px;
    }

    .info-label i{
        font-size:9px;
    }

    .info-value{
        font-size:10px;
    }

    .info-value.price{
        font-size:12px;
    }

    /* =====================================================
       NOTICE
    ====================================================== */

    .final-payment-notice{
        gap:8px;

        margin-bottom:12px;
        padding:10px 10px;

        border-radius:10px;
    }

    .final-payment-notice-icon{
        width:30px;
        height:30px;
        flex-basis:30px;

        border-radius:8px;
        font-size:12px;
    }

    .final-payment-notice-title{
        font-size:9.5px;
    }

    .final-payment-notice-description{
        font-size:8px;
    }

    /* =====================================================
       PROGRESS
    ====================================================== */

    .rental-progress{
        padding:10px 8px;
        border-radius:10px;
    }

    .progress-circle{
        width:20px;
        height:20px;
        flex-basis:20px;

        font-size:7px;
    }

    .progress-label{
        display:none;
    }

    .progress-line{
        min-width:7px;
        margin:0 4px;
    }

    /* =====================================================
       FOOTER
    ====================================================== */

    .rental-footer{
        align-items:center;

        gap:8px;

        padding:10px 13px;
    }

    .created-info{
        font-size:8px;
    }

    .action-group{
        gap:5px;
    }

    .btn-action{
        height:32px;
        padding:0 9px;

        border-radius:8px;

        font-size:9px;
    }

    /* =====================================================
       EMPTY
    ====================================================== */

    .empty-card{
        padding:48px 15px;
        border-radius:16px;
    }

    .empty-icon{
        width:60px;
        height:60px;
        border-radius:16px;
        font-size:25px;
    }

}

/* =========================================================
   HP KECIL
========================================================= */

@media(max-width:430px){

    .rental-page{
        padding:2px 8px 22px;
    }

    /* HEADER */

    .rental-heading h1{
        font-size:20px;
    }

    .rental-heading p{
        max-width:280px;
        font-size:9px;
    }

    .rental-heading-icon{
        width:43px;
        height:43px;
        flex-basis:43px;

        border-radius:12px;
        font-size:18px;
    }

    /* =====================================================
       STATS HP KECIL
       TETAP BESAR
    ====================================================== */

    .header-stats{
        gap:9px;
    }

    .header-stat{
        min-height:80px;

        padding:12px 13px;

        border-radius:14px;
    }

    .header-stat-label{
        font-size:9px;
        margin-bottom:7px;
    }

    .header-stat-value{
        font-size:24px;
    }

    /* FILTER */

    .filter-btn{
        height:36px;
        padding:0 10px;

        font-size:9px;
    }

    /* CARD */

    .rental-main{
        padding:13px 11px;
    }

    .product-image{
        width:50px;
        height:50px;
        flex-basis:50px;
    }

    .product-name{
        font-size:12.5px;
    }

    .product-code{
        font-size:8px;
    }

    .status-badge{
        padding:4px 7px;
        font-size:7.5px;
    }

    /* INFO */

    .info-item{
        padding:8px;
    }

    .info-label{
        font-size:7px;
    }

    .info-value{
        font-size:9px;
    }

    .info-value.price{
        font-size:10.5px;
    }

    /* FOOTER */

    .created-info{
        max-width:45%;
        font-size:7px;
    }

    .btn-action{
        height:30px;
        padding:0 8px;

        font-size:8px;
    }

    /* =====================================================
       MODAL
    ====================================================== */

    .detail-modal{
        margin:7px!important;
    }

    .detail-modal .modal-content{
        border-radius:17px!important;
    }

    .detail-modal .modal-header{
        padding:15px 14px!important;
    }

    .detail-modal .modal-body{
        padding:0 14px 15px!important;
    }

    .detail-modal .modal-footer{
        padding:9px 14px!important;
    }

    .modal-icon{
        width:37px;
        height:37px;

        flex-basis:37px;

        border-radius:10px;
        font-size:15px;
    }

    .modal-title{
        font-size:14px!important;
    }

    .modal-subtitle{
        font-size:8px;
    }

    .detail-hero{
        padding:11px;
        margin-bottom:12px;
        border-radius:11px;
    }

    .detail-hero-image{
        width:45px;
        height:45px;
        flex-basis:45px;
    }

    .detail-hero-name{
        font-size:12px;
    }

    .detail-hero-code{
        font-size:8px;
    }

    .detail-summary{
        gap:6px;
        margin-bottom:13px;
    }

    .summary-box{
        padding:9px;
        border-radius:10px;
    }

    .summary-icon{
        width:24px;
        height:24px;
        margin-bottom:5px;
        border-radius:7px;
        font-size:10px;
    }

    .summary-label{
        font-size:7px;
    }

    .summary-value{
        font-size:9px;
    }

    .detail-section{
        margin-top:13px;
    }

    .detail-section-title{
        font-size:10px;
    }

    .detail-products{
        border-radius:10px;
    }

    .detail-product{
        padding:9px;
    }

    .detail-product-image{
        width:38px;
        height:38px;
        flex-basis:38px;
    }

    .detail-product-name{
        font-size:9px;
    }

    .detail-product-meta,
    .detail-product-price{
        font-size:7px;
    }

    .detail-product-subtotal{
        font-size:9px;
    }

    .return-card,
    .fine-card{
        padding:10px;
        border-radius:11px;
    }

    .return-grid{
        gap:6px;
    }

    .return-item{
        padding:8px;
        border-radius:8px;
    }

    .return-item-label{
        font-size:7px;
    }

    .return-item-value{
        font-size:8px;
    }

    .fine-row{
        font-size:8px;
    }

    .fine-row strong{
        font-size:8.5px;
    }

    .detail-total{
        margin-top:12px;
        padding:12px;
        border-radius:12px;
    }

    .detail-total-label{
        font-size:7px;
    }

    .detail-total-value{
        font-size:19px;
    }

    .detail-total-icon{
        width:34px;
        height:34px;
        flex-basis:34px;
        border-radius:9px;
        font-size:14px;
    }

}

/* =========================================================
   HP SANGAT KECIL
========================================================= */

@media(max-width:360px){

    .rental-page{
        padding-left:6px;
        padding-right:6px;
    }

    .rental-heading h1{
        font-size:19px;
    }

    .rental-heading p{
        font-size:8px;
    }

    /* =====================================================
       STATS SANGAT KECIL
       MASIH DIBUAT BESAR
    ====================================================== */

    .header-stats{
        gap:8px;
    }

    .header-stat{
        min-height:76px;
        padding:11px 12px;
        border-radius:13px;
    }

    .header-stat-label{
        font-size:8px;
        margin-bottom:6px;
    }

    .header-stat-value{
        font-size:22px;
    }

    .filter-btn{
        padding:0 9px;
        font-size:8.5px;
    }

    .product-image{
        width:45px;
        height:45px;
        flex-basis:45px;
    }

    .product-name{
        font-size:11px;
    }

    .status-badge{
        font-size:7px;
        padding:4px 6px;
    }

    .info-label{
        font-size:6.5px;
    }

    .info-value{
        font-size:8.5px;
    }

    .info-value.price{
        font-size:10px;
    }

    .created-info{
        font-size:6.5px;
    }

    .btn-action{
        padding:0 7px;
        font-size:7.5px;
    }

}

</style>


<div class="rental-page">

{{-- =========================================================
     ALERT
========================================================= --}}

@if(session('success'))

    <div class="rental-alert success">
        <i class="bi bi-check-circle-fill"></i>
        <span>{{ session('success') }}</span>
    </div>

@endif

@if(session('error'))

    <div class="rental-alert error">
        <i class="bi bi-exclamation-circle-fill"></i>
        <span>{{ session('error') }}</span>
    </div>

@endif


{{-- =========================================================
     HEADER
========================================================= --}}

<div class="rental-header">

    <div class="rental-heading">

        <div class="rental-heading-icon">
            <i class="bi bi-receipt"></i>
        </div>

        <div>
            <h1>Penyewaan Saya</h1>

            <p>
                Pantau penyewaan, pengembalian, dan status pembayaran Anda.
            </p>
        </div>

    </div>


    @php

        $totalTransactions = $rentals->count();

        $activeTransactions = $rentals->filter(function($rental){

            return $rental->status === 'approved';

        })->count();

    @endphp


    <div class="header-stats">

        <div class="header-stat">

            <span class="header-stat-label">
                Total Transaksi
            </span>

            <span class="header-stat-value">
                {{ $totalTransactions }}
            </span>

        </div>


        <div class="header-stat">

            <span class="header-stat-label">
                Aktif
            </span>

            <span class="header-stat-value">
                {{ $activeTransactions }}
            </span>

        </div>

    </div>

</div>


{{-- =========================================================
     FILTER
========================================================= --}}

<div class="filter-wrapper">

    <div class="filter-menu">

        <button
            type="button"
            class="filter-btn active"
            data-filter="all">

            <i class="bi bi-grid"></i>
            Semua

        </button>


        <button
            type="button"
            class="filter-btn"
            data-filter="pending">

            <i class="bi bi-hourglass-split"></i>
            Menunggu Persetujuan

        </button>


        <button
            type="button"
            class="filter-btn"
            data-filter="approved">

            <i class="bi bi-box-seam"></i>
            Sedang Disewa

        </button>


        <button
            type="button"
            class="filter-btn"
            data-filter="return_request">

            <i class="bi bi-arrow-return-left"></i>
            Pengembalian

        </button>


        <button
            type="button"
            class="filter-btn"
            data-filter="waiting_final_payment">

            <i class="bi bi-credit-card"></i>
            Menunggu Pembayaran

        </button>


        <button
            type="button"
            class="filter-btn"
            data-filter="completed">

            <i class="bi bi-check-circle"></i>
            Selesai

        </button>


        <button
            type="button"
            class="filter-btn"
            data-filter="cancelled">

            <i class="bi bi-x-circle"></i>
            Dibatalkan

        </button>

    </div>

</div>


{{-- =========================================================
     RENTAL LIST
========================================================= --}}

@forelse($rentals as $rental)

@php

    $firstDetail = $rental->details->first();

    $product = $firstDetail
        ? $firstDetail->product
        : null;


    /* PAYMENT */

    $payments = $rental->payments ?? collect();

    $latestPayment = $payments
        ->sortByDesc('created_at')
        ->first();

    $paymentStatus = $latestPayment
        ? strtolower(trim($latestPayment->payment_status ?? ''))
        : null;


    /* RENTAL STATUS */

    $rentalStatus = strtolower(
        trim($rental->status ?? '')
    );


    /* RETURN */

    $pengembalian = $rental->pengembalian;

    $returnStatus = $pengembalian
        ? strtolower(trim($pengembalian->status ?? ''))
        : null;


    /* DISPLAY STATUS */

    if($rentalStatus === 'cancelled'){

        $status = 'cancelled';

    }elseif(
        $rentalStatus === 'approved' &&
        $returnStatus === 'menunggu'
    ){

        $status = 'return_request';

    }elseif($rentalStatus === 'completed'){

        if($paymentStatus === 'lunas'){

            $status = 'completed';

        }else{

            $status = 'waiting_final_payment';

        }

    }else{

        $status = $rentalStatus;

    }


    /* DURATION */

    $duration = 1;

    if(
        $rental->rental_date &&
        $rental->return_date
    ){

        $duration = max(
            1,
            (int) \Carbon\Carbon::parse(
                $rental->rental_date
            )->diffInDays(
                \Carbon\Carbon::parse(
                    $rental->return_date
                )
            )
        );

    }


    /* FINE */

    $dendaTelat = 0;
    $dendaRusak = 0;

    if($pengembalian){

        $dendaTelat = (float)(
            $pengembalian->denda_telat ?? 0
        );

        $dendaRusak = (float)(
            $pengembalian->denda_rusak ?? 0
        );

    }

    $totalDenda =
        $dendaTelat +
        $dendaRusak;


    $totalAkhir =
        (float)($rental->total_price ?? 0)
        +
        $totalDenda;


    /* PROGRESS */

    $progress = match($status){

        'pending' => 1,

        'approved' => 3,

        'return_request' => 4,

        'waiting_final_payment' => 5,

        'completed' => 6,

        'cancelled' => 1,

        default => 1

    };

@endphp


<div
    class="rental-card"
    data-status="{{ $status }}">

    {{-- =====================================================
         MAIN
    ====================================================== --}}

    <div class="rental-main">

        <div class="rental-top">

            <div class="product-area">

                <div class="product-image">

                    @if(
                        $product &&
                        $product->image &&
                        file_exists(
                            public_path(
                                'uploads/products/'.$product->image
                            )
                        )
                    )

                        <img
                            src="{{ asset('uploads/products/'.$product->image) }}"
                            alt="{{ $product->name }}">

                    @else

                        <div class="product-fallback">
                            <i class="bi bi-box-seam"></i>
                        </div>

                    @endif

                </div>


                <div class="product-info">

                    <h3 class="product-name">
                        {{ $product->name ?? 'Barang Rental' }}
                    </h3>

                    <div class="product-code">

                        <i class="bi bi-hash"></i>

                        {{ $rental->rental_code }}

                    </div>

                </div>

            </div>


            {{-- STATUS --}}

            <div>

                @if($status === 'pending')

                    <span class="status-badge status-pending">
                        <span class="status-dot"></span>
                        Menunggu Persetujuan
                    </span>

                @elseif($status === 'approved')

                    <span class="status-badge status-rented">
                        <span class="status-dot"></span>
                        Sedang Disewa
                    </span>

                @elseif($status === 'return_request')

                    <span class="status-badge status-return">
                        <span class="status-dot"></span>
                        Menunggu Konfirmasi
                    </span>

                @elseif($status === 'waiting_final_payment')

                    <span class="status-badge status-payment">
                        <span class="status-dot"></span>
                        Menunggu Pembayaran
                    </span>

                @elseif($status === 'completed')

                    <span class="status-badge status-completed">
                        <span class="status-dot"></span>
                        Selesai
                    </span>

                @elseif($status === 'cancelled')

                    <span class="status-badge status-cancelled">
                        <span class="status-dot"></span>
                        Dibatalkan
                    </span>

                @else

                    <span class="status-badge status-default">
                        <span class="status-dot"></span>

                        {{ ucfirst(
                            str_replace('_',' ',$status)
                        ) }}

                    </span>

                @endif

            </div>

        </div>


        {{-- =====================================================
             INFO
        ====================================================== --}}

        <div class="rental-info-grid">

            <div class="info-item">

                <div class="info-label">

                    <i class="bi bi-calendar-event"></i>

                    Tanggal Sewa

                </div>

                <div class="info-value">

                    {{ $rental->rental_date
                        ? \Carbon\Carbon::parse(
                            $rental->rental_date
                        )->format('d M Y')
                        : '-'
                    }}

                </div>

            </div>


            <div class="info-item">

                <div class="info-label">

                    <i class="bi bi-calendar-check"></i>

                    Batas Pengembalian

                </div>

                <div class="info-value">

                    {{ $rental->return_date
                        ? \Carbon\Carbon::parse(
                            $rental->return_date
                        )->format('d M Y')
                        : '-'
                    }}

                </div>

            </div>


            <div class="info-item">

                <div class="info-label">

                    <i class="bi bi-clock"></i>

                    Durasi

                </div>

                <div class="info-value">

                    {{ $duration }} Hari

                </div>

            </div>


            <div class="info-item">

                <div class="info-label">

                    <i class="bi bi-wallet2"></i>

                    Total Transaksi

                </div>

                <div class="info-value price">

                    Rp {{ number_format(
                        $totalAkhir,
                        0,
                        ',',
                        '.'
                    ) }}

                </div>

            </div>

        </div>


        {{-- =====================================================
             FINAL PAYMENT NOTICE
        ====================================================== --}}

        @if($status === 'waiting_final_payment')

            <div class="final-payment-notice">

                <div class="final-payment-notice-icon">

                    <i class="bi bi-credit-card"></i>

                </div>

                <div>

                    <div class="final-payment-notice-title">
                        Menunggu Pembayaran
                    </div>

                    <div class="final-payment-notice-description">

                        Pengembalian sudah diperiksa oleh admin.
                        Pembayaran akan diproses oleh admin setelah
                        pengembalian selesai.

                    </div>

                </div>

            </div>

        @endif


        {{-- =====================================================
             PROGRESS
        ====================================================== --}}

        <div class="rental-progress">

            <div class="progress-track">

                {{-- 1 --}}

                <div class="progress-step
                    {{ $progress > 1
                        ? 'completed'
                        : ($progress == 1 ? 'active' : '')
                    }}">

                    <div class="progress-circle">

                        @if($progress > 1)

                            <i class="bi bi-check"></i>

                        @else

                            1

                        @endif

                    </div>

                    <span class="progress-label">
                        Pengajuan
                    </span>

                </div>


                <div class="progress-line
                    {{ $progress > 1 ? 'completed' : '' }}">
                </div>


                {{-- 2 --}}

                <div class="progress-step
                    {{ $progress > 2
                        ? 'completed'
                        : ($progress == 2 ? 'active' : '')
                    }}">

                    <div class="progress-circle">

                        @if($progress > 2)

                            <i class="bi bi-check"></i>

                        @else

                            2

                        @endif

                    </div>

                    <span class="progress-label">
                        Disetujui
                    </span>

                </div>


                <div class="progress-line
                    {{ $progress > 2 ? 'completed' : '' }}">
                </div>


                {{-- 3 --}}

                <div class="progress-step
                    {{ $progress > 3
                        ? 'completed'
                        : ($progress == 3 ? 'active' : '')
                    }}">

                    <div class="progress-circle">

                        @if($progress > 3)

                            <i class="bi bi-check"></i>

                        @else

                            3

                        @endif

                    </div>

                    <span class="progress-label">
                        Disewa
                    </span>

                </div>


                <div class="progress-line
                    {{ $progress > 3 ? 'completed' : '' }}">
                </div>


                {{-- 4 --}}

                <div class="progress-step
                    {{ $progress > 4
                        ? 'completed'
                        : ($progress == 4 ? 'active' : '')
                    }}">

                    <div class="progress-circle">

                        @if($progress > 4)

                            <i class="bi bi-check"></i>

                        @else

                            4

                        @endif

                    </div>

                    <span class="progress-label">
                        Kembali
                    </span>

                </div>


                <div class="progress-line
                    {{ $progress > 4 ? 'completed' : '' }}">
                </div>


                {{-- 5 --}}

                <div class="progress-step
                    {{ $progress > 5
                        ? 'completed'
                        : ($progress == 5 ? 'active' : '')
                    }}">

                    <div class="progress-circle">

                        @if($progress > 5)

                            <i class="bi bi-check"></i>

                        @else

                            5

                        @endif

                    </div>

                    <span class="progress-label">
                        Pembayaran
                    </span>

                </div>


                <div class="progress-line
                    {{ $progress >= 6 ? 'completed' : '' }}">
                </div>


                {{-- 6 --}}

                <div class="progress-step
                    {{ $progress >= 6 ? 'completed' : '' }}">

                    <div class="progress-circle">

                        @if($progress >= 6)

                            <i class="bi bi-check"></i>

                        @else

                            6

                        @endif

                    </div>

                    <span class="progress-label">
                        Selesai
                    </span>

                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
         FOOTER
    ====================================================== --}}

    <div class="rental-footer">

        <div class="created-info">

            <i class="bi bi-clock-history"></i>

            Dibuat
            {{ optional($rental->created_at)
                ->timezone('Asia/Jakarta')
                ->format('d M Y, H:i') }}
            WIB

        </div>


        <div class="action-group">

            <button
                type="button"
                class="btn-action btn-detail"
                data-bs-toggle="modal"
                data-bs-target="#detailRental{{ $rental->id }}">

                <i class="bi bi-eye"></i>

                Lihat Detail

            </button>


            @if($status === 'pending')

                <span class="btn-action btn-disabled">

                    <i class="bi bi-hourglass-split"></i>

                    Menunggu Admin

                </span>

            @elseif($status === 'approved')

                <span class="btn-action btn-success">

                    <i class="bi bi-box-seam"></i>

                    Sedang Disewa

                </span>

            @elseif($status === 'return_request')

                <span class="btn-action btn-wait">

                    <i class="bi bi-hourglass-split"></i>

                    Menunggu Admin

                </span>

            @elseif($status === 'waiting_final_payment')

                <span class="btn-action btn-wait">

                    <i class="bi bi-credit-card"></i>

                    Menunggu Pembayaran

                </span>

            @elseif($status === 'completed')

                <span class="btn-action btn-success">

                    <i class="bi bi-check-circle-fill"></i>

                    Selesai

                </span>

            @elseif($status === 'cancelled')

                <span class="btn-action btn-disabled">

                    <i class="bi bi-x-circle"></i>

                    Dibatalkan

                </span>

            @endif

        </div>

    </div>

</div>


{{-- =========================================================
     MODAL DETAIL
========================================================= --}}

<div
    class="modal fade"
    id="detailRental{{ $rental->id }}"
    tabindex="-1"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered detail-modal">

        <div class="modal-content">

            {{-- HEADER --}}

            <div class="modal-header">

                <div class="modal-title-wrap">

                    <div class="modal-icon">

                        <i class="bi bi-receipt"></i>

                    </div>

                    <div>

                        <h4 class="modal-title">
                            Detail Penyewaan
                        </h4>

                        <div class="modal-subtitle">

                            <i class="bi bi-hash"></i>

                            {{ $rental->rental_code }}

                        </div>

                    </div>

                </div>


                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>

            </div>


            <div class="modal-body">

                {{-- HERO --}}

                <div class="detail-hero">

                    <div class="detail-hero-left">

                        <div class="detail-hero-image">

                            @if(
                                $product &&
                                $product->image &&
                                file_exists(
                                    public_path(
                                        'uploads/products/'.$product->image
                                    )
                                )
                            )

                                <img
                                    src="{{ asset(
                                        'uploads/products/'.$product->image
                                    ) }}"
                                    alt="{{ $product->name }}">

                            @else

                                <i class="bi bi-box-seam"></i>

                            @endif

                        </div>


                        <div style="min-width:0">

                            <h3 class="detail-hero-name">

                                {{ $product->name ?? 'Barang Rental' }}

                            </h3>

                            <div class="detail-hero-code">

                                Nomor transaksi
                                #{{ $rental->rental_code }}

                            </div>

                        </div>

                    </div>


                    <div class="detail-status">

                        @if($status === 'pending')

                            <span class="status-badge status-pending">
                                <span class="status-dot"></span>
                                Menunggu Persetujuan
                            </span>

                        @elseif($status === 'approved')

                            <span class="status-badge status-rented">
                                <span class="status-dot"></span>
                                Sedang Disewa
                            </span>

                        @elseif($status === 'return_request')

                            <span class="status-badge status-return">
                                <span class="status-dot"></span>
                                Menunggu Konfirmasi
                            </span>

                        @elseif($status === 'waiting_final_payment')

                            <span class="status-badge status-payment">
                                <span class="status-dot"></span>
                                Menunggu Pembayaran
                            </span>

                        @elseif($status === 'completed')

                            <span class="status-badge status-completed">
                                <span class="status-dot"></span>
                                Selesai
                            </span>

                        @elseif($status === 'cancelled')

                            <span class="status-badge status-cancelled">
                                <span class="status-dot"></span>
                                Dibatalkan
                            </span>

                        @endif

                    </div>

                </div>


                {{-- SUMMARY --}}

                <div class="detail-summary">

                    <div class="summary-box">

                        <div class="summary-icon">
                            <i class="bi bi-calendar-event"></i>
                        </div>

                        <span class="summary-label">
                            Tanggal Sewa
                        </span>

                        <span class="summary-value">

                            {{ $rental->rental_date
                                ? \Carbon\Carbon::parse(
                                    $rental->rental_date
                                )->format('d M Y')
                                : '-'
                            }}

                        </span>

                    </div>


                    <div class="summary-box">

                        <div class="summary-icon">
                            <i class="bi bi-calendar-check"></i>
                        </div>

                        <span class="summary-label">
                            Pengembalian
                        </span>

                        <span class="summary-value">

                            {{ $rental->return_date
                                ? \Carbon\Carbon::parse(
                                    $rental->return_date
                                )->format('d M Y')
                                : '-'
                            }}

                        </span>

                    </div>


                    <div class="summary-box">

                        <div class="summary-icon">
                            <i class="bi bi-clock"></i>
                        </div>

                        <span class="summary-label">
                            Durasi Sewa
                        </span>

                        <span class="summary-value">
                            {{ $duration }} Hari
                        </span>

                    </div>

                </div>


                {{-- BARANG --}}

                <div class="detail-section">

                    <div class="detail-section-header">

                        <h5 class="detail-section-title">

                            <i class="bi bi-box-seam"></i>

                            Barang yang Disewa

                        </h5>

                        <span class="detail-section-caption">

                            {{ $rental->details->count() }} item

                        </span>

                    </div>


                    <div class="detail-products">

                        @foreach($rental->details as $detail)

                            <div class="detail-product">

                                <div class="detail-product-left">

                                    <div class="detail-product-image">

                                        @if(
                                            $detail->product &&
                                            $detail->product->image &&
                                            file_exists(
                                                public_path(
                                                    'uploads/products/'.$detail->product->image
                                                )
                                            )
                                        )

                                            <img
                                                src="{{ asset(
                                                    'uploads/products/'.$detail->product->image
                                                ) }}"
                                                alt="{{ $detail->product->name }}">

                                        @else

                                            <i class="bi bi-box-seam"></i>

                                        @endif

                                    </div>


                                    <div style="min-width:0">

                                        <h6 class="detail-product-name">

                                            {{ $detail->product->name ?? '-' }}

                                        </h6>

                                        <div class="detail-product-meta">

                                            {{ $detail->quantity }} ×
                                            Rp {{ number_format(
                                                $detail->price,
                                                0,
                                                ',',
                                                '.'
                                            ) }}

                                        </div>

                                    </div>

                                </div>


                                <div class="detail-product-right">

                                    <div class="detail-product-subtotal">

                                        Rp {{ number_format(
                                            $detail->subtotal,
                                            0,
                                            ',',
                                            '.'
                                        ) }}

                                    </div>

                                    <div class="detail-product-price">
                                        Subtotal
                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>


                {{-- PENGEMBALIAN --}}

                @if(
                    in_array(
                        $status,
                        [
                            'return_request',
                            'waiting_final_payment',
                            'completed'
                        ]
                    )
                    &&
                    $pengembalian
                )

                    <div class="detail-section">

                        <div class="return-card">

                            <div class="return-card-header">

                                <i class="bi bi-arrow-return-left"></i>

                                Informasi Pengembalian

                            </div>


                            <div class="return-grid">

                                <div class="return-item">

                                    <span class="return-item-label">
                                        Status
                                    </span>

                                    <span class="return-item-value">

                                        {{ ucfirst(
                                            $pengembalian->status ?? '-'
                                        ) }}

                                    </span>

                                </div>


                                <div class="return-item">

                                    <span class="return-item-label">
                                        Kondisi Barang
                                    </span>

                                    <span class="return-item-value">

                                        {{ $pengembalian->kondisi ?? '-' }}

                                    </span>

                                </div>

                            </div>

                        </div>


                        {{-- DENDA --}}

                        @if($totalDenda > 0)

                            <div class="fine-card">

                                <div class="fine-header">

                                    <i class="bi bi-exclamation-triangle-fill"></i>

                                    Denda Pengembalian

                                </div>


                                @if($dendaTelat > 0)

                                    <div class="fine-row">

                                        <span>
                                            Keterlambatan
                                        </span>

                                        <strong>

                                            Rp {{ number_format(
                                                $dendaTelat,
                                                0,
                                                ',',
                                                '.'
                                            ) }}

                                        </strong>

                                    </div>

                                @endif


                                @if($dendaRusak > 0)

                                    <div class="fine-row">

                                        <span>
                                            Kerusakan
                                        </span>

                                        <strong>

                                            Rp {{ number_format(
                                                $dendaRusak,
                                                0,
                                                ',',
                                                '.'
                                            ) }}

                                        </strong>

                                    </div>

                                @endif


                                <div class="fine-row">

                                    <span>
                                        Total Denda
                                    </span>

                                    <strong>

                                        Rp {{ number_format(
                                            $totalDenda,
                                            0,
                                            ',',
                                            '.'
                                        ) }}

                                    </strong>

                                </div>

                            </div>

                        @endif

                    </div>

                @endif


                {{-- PAYMENT NOTICE --}}

                @if($status === 'waiting_final_payment')

                    <div class="payment-info-card">

                        <div class="payment-info-icon">

                            <i class="bi bi-credit-card"></i>

                        </div>

                        <div>

                            <div class="payment-info-title">

                                Pembayaran Diproses Admin

                            </div>

                            <div class="payment-info-text">

                                Pengembalian telah diperiksa.
                                Pembayaran akhir akan dicatat oleh admin
                                setelah proses pengembalian selesai.

                            </div>

                        </div>

                    </div>

                @endif


                {{-- COMPLETED --}}

                @if($status === 'completed')

                    <div class="completed-message">

                        <div class="completed-message-icon">

                            <i class="bi bi-check-circle-fill"></i>

                        </div>

                        <div>

                            <div class="completed-message-title">
                                Transaksi Selesai
                            </div>

                            <div class="completed-message-text">

                                Pengembalian dan pembayaran telah selesai
                                diproses oleh admin.

                            </div>

                        </div>

                    </div>

                @endif


                {{-- TOTAL --}}

                <div class="detail-total
                    {{ $status === 'completed'
                        ? 'completed-total'
                        : ''
                    }}">

                    <div class="detail-total-top">

                        <div>

                            <div class="detail-total-label">

                                {{ $totalDenda > 0
                                    ? 'Total Pembayaran'
                                    : 'Total Sewa'
                                }}

                            </div>

                            <div class="detail-total-value">

                                Rp {{ number_format(
                                    $totalAkhir,
                                    0,
                                    ',',
                                    '.'
                                ) }}

                            </div>

                        </div>


                        <div class="detail-total-icon">

                            @if($status === 'completed')

                                <i class="bi bi-check-circle-fill"></i>

                            @else

                                <i class="bi bi-wallet2"></i>

                            @endif

                        </div>

                    </div>

                </div>

            </div>


            {{-- FOOTER --}}

            <div class="modal-footer">

                <button
                    type="button"
                    class="btn-modal-close"
                    data-bs-dismiss="modal">

                    <i class="bi bi-x-lg"></i>

                    Tutup

                </button>

            </div>

        </div>

    </div>

</div>

@empty

{{-- =========================================================
     EMPTY
========================================================= --}}

<div class="empty-card">

    <div class="empty-icon">

        <i class="bi bi-receipt"></i>

    </div>

    <h4>
        Belum Ada Transaksi
    </h4>

    <p>

        Anda belum memiliki transaksi penyewaan.
        Yuk mulai sewa barang yang Anda butuhkan.

    </p>

    <a
        href="{{ route('pelanggan.products') }}"
        class="empty-btn">

        <i class="bi bi-cart-plus"></i>

        Mulai Sewa

    </a>

</div>

@endforelse

</div>


<script>

document.addEventListener('DOMContentLoaded', function(){

    /* =====================================================
       FILTER
    ====================================================== */

    const filterButtons =
        document.querySelectorAll('.filter-btn');

    const rentalCards =
        document.querySelectorAll(
            '.rental-card[data-status]'
        );


    filterButtons.forEach(function(button){

        button.addEventListener('click', function(){

            const filter =
                this.dataset.filter;


            filterButtons.forEach(function(btn){

                btn.classList.remove('active');

            });


            this.classList.add('active');


            rentalCards.forEach(function(card){

                const status =
                    card.dataset.status;


                if(
                    filter === 'all' ||
                    status === filter
                ){

                    card.style.display = '';

                }else{

                    card.style.display = 'none';

                }

            });

        });

    });


    /* =====================================================
       AUTO HIDE ALERT
    ====================================================== */

    const alerts =
        document.querySelectorAll('.rental-alert');


    alerts.forEach(function(alert){

        setTimeout(function(){

            alert.style.transition =
                'opacity .3s ease, transform .3s ease';

            alert.style.opacity = '0';

            alert.style.transform =
                'translateY(-5px)';

            setTimeout(function(){

                alert.remove();

            },300);

        },4500);

    });

});

</script>

@endsection