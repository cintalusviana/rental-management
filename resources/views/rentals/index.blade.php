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
    --primary-soft:#EFF6FF;

    --success:#16A34A;
    --success-soft:#DCFCE7;

    --warning:#D97706;
    --warning-soft:#FEF3C7;

    --danger:#DC2626;
    --danger-soft:#FEE2E2;

    --purple:#7C3AED;
    --purple-soft:#EDE9FE;

    --cyan:#0284C7;
    --cyan-soft:#E0F2FE;

    --dark:#0F172A;
    --text:#334155;
    --muted:#64748B;
    --light:#94A3B8;

    --border:#E2E8F0;
    --border-soft:#F1F5F9;

    --bg:#F6F8FC;
    --white:#FFFFFF;

    --shadow-sm:0 2px 10px rgba(15,23,42,.04);
    --shadow:0 8px 28px rgba(15,23,42,.06);
    --shadow-lg:0 20px 55px rgba(15,23,42,.14);
}


/* =========================================================
   GLOBAL
========================================================= */
*{
    box-sizing:border-box;
}

body{
    background:var(--bg)!important;
    font-family:'Inter',sans-serif;
    color:var(--dark);
}

button,
input,
select{
    font-family:inherit;
}


/* =========================================================
   PAGE
========================================================= */
.rental-page{
    width:100%;
    padding:18px 24px 40px;
    animation:pageEnter .35s ease;
}

@keyframes pageEnter{
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
.page-header{
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:20px;
    margin-bottom:24px;
}

.page-heading{
    display:flex;
    align-items:center;
    gap:15px;
    min-width:0;
}

.heading-icon{
    width:52px;
    height:52px;

    display:flex;
    align-items:center;
    justify-content:center;

    flex-shrink:0;

    border-radius:15px;

    background:linear-gradient(
        135deg,
        #DBEAFE,
        #EFF6FF
    );

    color:var(--primary);

    font-size:22px;

    box-shadow:
        0 8px 20px rgba(37,99,235,.10);
}

.page-heading > div:last-child{
    min-width:0;
}

.page-heading h2{
    margin:0;

    color:var(--dark);

    font-size:26px;
    font-weight:800;

    letter-spacing:-.5px;
}

.page-heading p{
    margin:6px 0 0;

    color:var(--muted);

    font-size:13px;
    font-weight:400;
}


/* =========================================================
   ADD BUTTON
========================================================= */
.btn-add-rental{
    height:44px;

    display:inline-flex;
    align-items:center;
    justify-content:center;

    gap:9px;

    padding:0 18px;

    flex-shrink:0;

    border:0;
    border-radius:11px;

    background:linear-gradient(
        135deg,
        var(--primary),
        #3B82F6
    );

    color:#fff;

    font-size:12px;
    font-weight:700;

    box-shadow:
        0 7px 18px rgba(37,99,235,.20);

    transition:.2s ease;
}

.btn-add-rental:hover{
    color:#fff;

    transform:translateY(-2px);

    box-shadow:
        0 11px 25px rgba(37,99,235,.27);
}


/* =========================================================
   SUMMARY
========================================================= */
.summary-grid{
    display:grid;

    grid-template-columns:
        repeat(4,minmax(0,1fr));

    gap:16px;

    margin-bottom:22px;
}

.summary-card{
    position:relative;

    min-height:92px;

    display:flex;
    align-items:center;

    gap:14px;

    padding:18px;

    background:var(--white);

    border:1px solid var(--border-soft);

    border-radius:16px;

    box-shadow:var(--shadow-sm);

    overflow:hidden;

    transition:.2s ease;
}

.summary-card:hover{
    transform:translateY(-2px);
    box-shadow:var(--shadow);
}

.summary-card::after{
    content:"";

    position:absolute;

    right:-20px;
    bottom:-25px;

    width:75px;
    height:75px;

    border-radius:50%;

    background:#F8FAFC;
}

.summary-icon{
    width:44px;
    height:44px;

    display:flex;
    align-items:center;
    justify-content:center;

    flex-shrink:0;

    border-radius:13px;

    font-size:18px;

    position:relative;
    z-index:1;
}

.summary-icon.blue{
    background:var(--primary-soft);
    color:var(--primary);
}

.summary-icon.orange{
    background:var(--warning-soft);
    color:var(--warning);
}

.summary-icon.purple{
    background:var(--purple-soft);
    color:var(--purple);
}

.summary-icon.green{
    background:var(--success-soft);
    color:var(--success);
}

.summary-info{
    position:relative;
    z-index:1;

    min-width:0;
}

.summary-label{
    margin-bottom:4px;

    color:var(--muted);

    font-size:11px;
    font-weight:600;

    line-height:1.35;
}

.summary-value{
    color:var(--dark);

    font-size:21px;
    font-weight:800;

    line-height:1.2;
}


/* =========================================================
   BUTTON TAMBAH DI BAWAH CARD
========================================================= */
.rental-add-wrapper{
    display:flex;
    justify-content:flex-end;
    align-items:center;

    margin-top:-8px;
    margin-bottom:18px;
}

.rental-add-wrapper .btn-add-rental{
    height:42px;
}


/* =========================================================
   ALERT
========================================================= */
.alert{
    border:0!important;
    border-radius:12px!important;

    padding:13px 16px;

    font-size:12px;

    box-shadow:var(--shadow-sm);
}

.alert-success{
    background:var(--success-soft)!important;
    color:#166534!important;
}

.alert-danger{
    background:var(--danger-soft)!important;
    color:#991B1B!important;
}


/* =========================================================
   MAIN CARD
========================================================= */
.rental-card{
    background:#fff;

    border:1px solid var(--border);

    border-radius:18px;

    overflow:visible;

    box-shadow:var(--shadow);
}


/* =========================================================
   TOOLBAR
========================================================= */
.toolbar{
    display:flex;
    align-items:center;

    gap:10px;

    padding:18px;

    background:#fff;

    border-bottom:1px solid var(--border-soft);

    border-radius:18px 18px 0 0;
}

.search-wrapper{
    position:relative;
    flex:1;
    min-width:0;
}

.search-wrapper i{
    position:absolute;

    top:50%;
    left:15px;

    transform:translateY(-50%);

    color:#94A3B8;

    font-size:16px;

    pointer-events:none;
}

.search-wrapper input{
    width:100%;
    height:46px;

    padding:0 16px 0 43px;

    border:1px solid var(--border);

    border-radius:11px;

    background:#F8FAFC;

    color:var(--dark);

    font-size:12px;

    outline:none;

    transition:.2s ease;
}

.search-wrapper input:focus{
    background:#fff;

    border-color:var(--primary);

    box-shadow:
        0 0 0 3px rgba(37,99,235,.08);
}

.search-wrapper input::placeholder{
    color:#94A3B8;
}

.filter-wrapper{
    width:165px;

    flex-shrink:0;
}

.filter-wrapper select{
    width:100%;
    height:46px;

    padding:0 13px;

    border:1px solid var(--border);

    border-radius:11px;

    background:#F8FAFC;

    color:var(--text);

    font-size:12px;

    outline:none;

    cursor:pointer;

    transition:.2s ease;
}

.filter-wrapper select:focus{
    background:#fff;

    border-color:var(--primary);

    box-shadow:
        0 0 0 3px rgba(37,99,235,.08);
}


/* =========================================================
   LIHAT SEMUA
   SEKARANG DI DALAM TOOLBAR
========================================================= */
.btn-view-all-rental{
    display:inline-flex;
    align-items:center;
    justify-content:center;

    gap:6px;

    height:46px;
    padding:0 15px;

    flex-shrink:0;

    border:1px solid #D7E3F4;
    border-radius:11px;

    background:#F8FAFC;
    color:#475569;

    font-size:10px;
    font-weight:700;

    cursor:pointer;
    white-space:nowrap;

    transition:.18s ease;
}

.btn-view-all-rental:hover{
    background:#EFF6FF;
    border-color:#BFDBFE;
    color:#2563EB;
}

.btn-view-all-rental.active{
    background:#EFF6FF;
    border-color:#BFDBFE;
    color:#2563EB;
}

.btn-view-all-rental i{
    font-size:11px;
}

.rental-row.extra-row{
    display:none;
}


/* =========================================================
   TABLE
========================================================= */
.table-container{
    width:100%;

    overflow-x:auto;

    border-radius:0 0 18px 18px;
}

.table-container::-webkit-scrollbar{
    height:8px;
}

.table-container::-webkit-scrollbar-track{
    background:#F8FAFC;
}

.table-container::-webkit-scrollbar-thumb{
    background:#CBD5E1;
    border-radius:10px;
}

.rental-table{
    width:100%;

    min-width:1180px;

    margin:0;

    border-collapse:separate;

    border-spacing:0;

    table-layout:fixed;
}

.rental-table thead th{
    padding:15px 14px;

    background:#F8FAFC;

    color:#64748B;

    font-size:10px;

    font-weight:800;

    text-transform:uppercase;

    letter-spacing:.4px;

    border:0;

    white-space:nowrap;

    vertical-align:middle;
}

.rental-table tbody td{
    padding:17px 14px;

    color:var(--text);

    font-size:12px;

    border-top:1px solid var(--border-soft);

    vertical-align:middle;

    background:#fff;
}

.rental-table tbody tr{
    transition:.15s ease;
}

.rental-table tbody tr:hover td{
    background:#FAFCFF;
}


/* =========================================================
   COLUMN
========================================================= */
.rental-table th:nth-child(1),
.rental-table td:nth-child(1){
    width:60px;
    text-align:center;
}

.rental-table th:nth-child(2),
.rental-table td:nth-child(2){
    width:20%;
}

.rental-table th:nth-child(3),
.rental-table td:nth-child(3){
    width:17%;
}

.rental-table th:nth-child(4),
.rental-table td:nth-child(4){
    width:10%;
}

.rental-table th:nth-child(5),
.rental-table td:nth-child(5){
    width:10%;
}

.rental-table th:nth-child(6),
.rental-table td:nth-child(6){
    width:10%;
}

.rental-table th:nth-child(7),
.rental-table td:nth-child(7){
    width:13%;
}

.rental-table th:nth-child(8),
.rental-table td:nth-child(8){
    width:13%;
}

.rental-table th:nth-child(9),
.rental-table td:nth-child(9){
    width:10%;
}


/* =========================================================
   NUMBER
========================================================= */
.number{
    width:30px;
    height:30px;

    margin:auto;

    display:flex;
    align-items:center;
    justify-content:center;

    border-radius:9px;

    background:#F1F5F9;

    color:#475569;

    font-size:11px;

    font-weight:800;
}


/* =========================================================
   CUSTOMER
========================================================= */
.customer-box{
    display:flex;
    align-items:center;

    gap:11px;

    min-width:0;
}

.customer-avatar{
    width:40px;
    height:40px;

    display:flex;
    align-items:center;
    justify-content:center;

    flex-shrink:0;

    border-radius:11px;

    background:linear-gradient(
        135deg,
        #DBEAFE,
        #EFF6FF
    );

    color:var(--primary);

    font-size:13px;
    font-weight:800;
}

.customer-content{
    min-width:0;
}

.customer-name{
    color:var(--dark);

    font-size:12px;

    font-weight:700;

    line-height:1.4;

    overflow-wrap:anywhere;
}

.customer-phone{
    margin-top:4px;

    color:#94A3B8;

    font-size:10px;

    white-space:nowrap;

    overflow:hidden;

    text-overflow:ellipsis;
}


/* =========================================================
   PRODUCT
========================================================= */
.product-list{
    min-width:0;
}

.product{
    margin-bottom:7px;
}

.product:last-child{
    margin-bottom:0;
}

.product-name{
    color:var(--dark);

    font-size:12px;

    font-weight:700;

    line-height:1.45;

    overflow-wrap:anywhere;
}

.product-qty{
    margin-top:3px;

    color:#94A3B8;

    font-size:10px;
}


/* =========================================================
   DATE
========================================================= */
.date-main{
    color:#334155;

    font-size:11px;

    font-weight:700;

    white-space:nowrap;
}

.date-sub{
    display:block;

    margin-top:4px;

    color:#A0AEC0;

    font-size:9px;
}


/* =========================================================
   PRICE
========================================================= */
.price{
    color:var(--primary);

    font-size:12px;

    font-weight:800;

    white-space:nowrap;
}


/* =========================================================
   STATUS
========================================================= */
.badge-status{
    display:inline-flex;

    align-items:center;
    justify-content:center;

    gap:5px;

    padding:7px 10px;

    border-radius:999px;

    font-size:9px;

    font-weight:800;

    line-height:1.2;

    white-space:nowrap;
}

.badge-status i{
    font-size:9px;
}

.status-pending{
    background:#FEF3C7;
    color:#92400E;
}

.status-payment{
    background:#FEF3C7;
    color:#92400E;
}

.status-approved{
    background:#DBEAFE;
    color:#1D4ED8;
}

.status-completed{
    background:#DCFCE7;
    color:#166534;
}

.status-cancelled{
    background:#FEE2E2;
    color:#991B1B;
}

.status-returned{
    background:#DCFCE7;
    color:#166534;
}

.status-waiting{
    background:#FEF3C7;
    color:#92400E;
}

.status-verification{
    background:#E0F2FE;
    color:#0369A1;
}


/* =========================================================
   FINE
========================================================= */
.fine{
    display:block;

    margin-top:6px;

    color:var(--danger);

    font-size:9px;

    font-weight:700;
}


/* =========================================================
   ACTION
========================================================= */
.action-area{
    display:flex;

    align-items:center;
    justify-content:center;

    gap:7px;
}

.action-main{
    width:36px;
    height:36px;

    display:flex;

    align-items:center;
    justify-content:center;

    border:0;

    border-radius:10px;

    background:var(--cyan-soft);

    color:var(--cyan);

    font-size:14px;

    transition:.18s ease;
}

.action-main:hover{
    background:#BAE6FD;

    color:#0369A1;

    transform:translateY(-1px);
}

.action-menu-btn{
    width:36px;
    height:36px;

    display:flex;

    align-items:center;
    justify-content:center;

    border:1px solid var(--border);

    border-radius:10px;

    background:#fff;

    color:#64748B;

    font-size:16px;

    transition:.18s ease;
}

.action-menu-btn:hover,
.action-menu-btn.show{
    background:#F8FAFC;

    border-color:#CBD5E1;

    color:var(--dark);
}

.action-dropdown{
    min-width:200px;

    padding:7px;

    border:1px solid var(--border);

    border-radius:13px;

    box-shadow:
        0 15px 35px rgba(15,23,42,.12);

    background:#fff;
}

.action-dropdown .dropdown-item{
    display:flex;

    align-items:center;

    gap:10px;

    padding:9px 10px;

    border-radius:8px;

    color:#334155;

    font-size:11px;

    font-weight:600;

    transition:.15s ease;
}

.action-dropdown .dropdown-item:hover{
    background:#F8FAFC;

    color:var(--dark);
}

.action-dropdown .dropdown-item i{
    width:18px;

    text-align:center;

    font-size:13px;
}

.action-dropdown .dropdown-item.text-success{
    color:#15803D!important;
}

.action-dropdown .dropdown-item.text-primary{
    color:#2563EB!important;
}

.action-dropdown .dropdown-item.text-danger{
    color:#DC2626!important;
}

.action-dropdown .dropdown-divider{
    margin:6px 0;

    border-color:var(--border-soft);
}


/* =========================================================
   EMPTY
========================================================= */
.empty-state{
    padding:70px 20px;

    text-align:center;
}

.empty-icon{
    width:72px;
    height:72px;

    margin:0 auto 16px;

    display:flex;

    align-items:center;
    justify-content:center;

    border-radius:20px;

    background:#F8FAFC;

    color:#CBD5E1;

    font-size:30px;
}

.empty-state h5,
.search-empty h5{
    margin:0 0 6px;

    color:#334155;

    font-size:15px;

    font-weight:800;
}

.empty-state p,
.search-empty p{
    margin:0;

    color:#94A3B8;

    font-size:11px;
}

.search-empty{
    display:none;

    padding:65px 20px;

    text-align:center;
}


/* =========================================================
   MODAL
========================================================= */
.modal-dialog{
    max-width:760px;
}

.modal-content{
    border:0!important;

    border-radius:20px!important;

    overflow:hidden;

    box-shadow:var(--shadow-lg);
}

.modal-header{
    padding:20px 24px;

    background:#fff;

    border-bottom:1px solid var(--border-soft);
}

.modal-title-area{
    display:flex;

    align-items:center;

    gap:12px;
}

.modal-title-icon{
    width:43px;
    height:43px;

    display:flex;

    align-items:center;
    justify-content:center;

    border-radius:12px;

    background:var(--primary-soft);

    color:var(--primary);

    font-size:18px;
}

.modal-title-text h4{
    margin:0;

    color:var(--dark);

    font-size:17px;

    font-weight:800;
}

.modal-title-text p{
    margin:4px 0 0;

    color:var(--muted);

    font-size:11px;
}

.modal-body{
    padding:24px;

    background:#fff;
}

.modal-footer{
    padding:16px 24px;

    background:#fff;

    border-top:1px solid var(--border-soft);
}

.form-label{
    display:block;

    margin-bottom:7px;

    color:#334155;

    font-size:11px;

    font-weight:700;
}

.form-control,
.form-select{
    height:45px;

    border:1px solid var(--border)!important;

    border-radius:10px!important;

    background:#F8FAFC;

    color:var(--dark);

    font-size:12px;

    box-shadow:none!important;

    transition:.2s ease;
}

.form-control:focus,
.form-select:focus{
    background:#fff;

    border-color:var(--primary)!important;

    box-shadow:
        0 0 0 3px rgba(37,99,235,.08)!important;
}

.form-control[readonly]{
    background:#F8FAFC;
    color:#475569;
}

.btn{
    border-radius:10px;

    font-size:12px;

    font-weight:700;
}


/* =========================================================
   INFO BOX
========================================================= */
.info-box{
    height:100%;

    padding:15px;

    background:#F8FAFC;

    border:1px solid var(--border);

    border-radius:13px;
}

.info-label{
    margin-bottom:5px;

    color:#94A3B8;

    font-size:9px;

    font-weight:800;

    text-transform:uppercase;

    letter-spacing:.4px;
}

.info-value{
    color:var(--dark);

    font-size:12px;

    font-weight:700;
}


/* =========================================================
   RETURN BOX
========================================================= */
.return-box{
    padding:17px;

    background:#F8FAFC;

    border:1px solid var(--border);

    border-radius:15px;
}

.return-box-title{
    display:flex;

    align-items:center;

    gap:8px;

    margin-bottom:13px;

    color:var(--dark);

    font-size:12px;

    font-weight:800;
}

.return-box-title i{
    color:var(--success);
}


/* =========================================================
   FINE BOX
========================================================= */
.fine-box{
    padding:17px;

    background:#FFF7ED;

    border:1px solid #FED7AA;

    border-radius:15px;
}

.fine-title{
    display:flex;

    align-items:center;

    gap:7px;

    margin-bottom:10px;

    color:#C2410C;

    font-size:12px;

    font-weight:800;
}

.fine-row{
    display:flex;

    align-items:center;

    justify-content:space-between;

    gap:15px;

    padding:7px 0;

    color:#7C2D12;

    font-size:11px;
}

.fine-total{
    display:flex;

    align-items:center;

    justify-content:space-between;

    gap:15px;

    margin-top:7px;

    padding-top:11px;

    border-top:1px solid #FED7AA;

    color:#9A3412;

    font-size:13px;

    font-weight:800;
}


/* =========================================================
   VERIFICATION BOX
========================================================= */
.verification-box{
    padding:16px;

    background:#EFF6FF;

    border:1px solid #BFDBFE;

    border-radius:14px;
}

.verification-title{
    display:flex;

    align-items:center;

    gap:8px;

    margin-bottom:6px;

    color:#1D4ED8;

    font-size:12px;

    font-weight:800;
}

.verification-text{
    margin:0;

    color:#475569;

    font-size:10px;

    line-height:1.6;
}


/* =========================================================
   PRODUCT DETAIL
========================================================= */
.detail-product{
    display:flex;

    align-items:center;

    justify-content:space-between;

    gap:15px;

    padding:11px 0;

    border-bottom:1px solid var(--border-soft);
}

.detail-product:last-child{
    border-bottom:0;

    padding-bottom:0;
}

.detail-product-name{
    color:var(--dark);

    font-size:11px;

    font-weight:700;
}

.detail-product-qty{
    color:var(--muted);

    font-size:10px;
}


/* =========================================================
   TABLET
========================================================= */
@media(max-width:1200px){

    .rental-page{
        padding-left:16px;
        padding-right:16px;
    }

    .summary-grid{
        gap:12px;
    }

    .rental-table{
        min-width:1150px;
    }
}


/* =========================================================
   TABLET KECIL
========================================================= */
@media(max-width:991px){

    .summary-grid{
        grid-template-columns:
            repeat(2,minmax(0,1fr));
    }

    .page-heading h2{
        font-size:23px;
    }

    .table-container{
        overflow-x:auto;
    }

    .toolbar{
        flex-wrap:wrap;
    }

    .toolbar .search-wrapper{
        flex:1 1 100%;
        width:100%;
    }

    .toolbar .filter-wrapper{
        flex:1;
        width:auto;
    }

    .toolbar .btn-view-all-rental{
        flex-shrink:0;
    }
}


/* =========================================================
   HP
========================================================= */
@media(max-width:768px){

    .rental-page{
        width:100%;
        padding:16px 14px 32px;
    }


    /* =====================================================
       HEADER HP
    ===================================================== */

    .page-header{
        display:flex;

        flex-direction:row;

        align-items:center;
        justify-content:space-between;

        gap:12px;

        margin-bottom:20px;
    }

    .page-heading{
        display:flex;

        align-items:center;

        gap:11px;

        flex:1;

        min-width:0;
    }

    .heading-icon{
        width:46px;
        height:46px;

        min-width:46px;

        border-radius:13px;

        font-size:20px;
    }

    .page-heading h2{
        font-size:21px;

        line-height:1.25;

        letter-spacing:-.3px;

        white-space:nowrap;
    }

    .page-heading p{
        margin-top:5px;

        font-size:11px;

        line-height:1.45;

        max-width:280px;
    }


    /* =====================================================
       BUTTON TAMBAH
    ===================================================== */

    .rental-add-wrapper{
        width:100%;

        justify-content:stretch;

        margin-top:-5px;

        margin-bottom:15px;
    }

    .rental-add-wrapper .btn-add-rental{
        width:100%;

        height:44px;

        padding:0 15px;

        gap:7px;

        border-radius:11px;

        font-size:11px;

        white-space:nowrap;
    }

    .rental-add-wrapper .btn-add-rental i{
        font-size:14px;
    }


    /* =====================================================
       SUMMARY
    ===================================================== */

    .summary-grid{
        grid-template-columns:
            repeat(2,minmax(0,1fr));

        gap:11px;

        margin-bottom:19px;
    }

    .summary-card{
        min-height:92px;
        height:92px;

        gap:11px;

        padding:14px;

        border-radius:15px;

        box-shadow:
            0 4px 15px rgba(15,23,42,.06);
    }

    .summary-card::after{
        width:65px;
        height:65px;

        right:-20px;
        bottom:-24px;
    }

    .summary-icon{
        width:40px;
        height:40px;

        min-width:40px;

        border-radius:11px;

        font-size:17px;
    }

    .summary-label{
        margin-bottom:4px;

        font-size:10px;

        line-height:1.35;
    }

    .summary-value{
        font-size:21px;

        line-height:1.2;
    }


    /* =====================================================
       ALERT
    ===================================================== */

    .alert{
        padding:13px 14px;

        margin-bottom:14px!important;

        border-radius:11px!important;

        font-size:11px;

        line-height:1.5;
    }


    /* =====================================================
       MAIN CARD
    ===================================================== */

    .rental-card{
        width:100%;

        border-radius:16px;

        box-shadow:
            0 7px 25px rgba(15,23,42,.08);
    }


    /* =====================================================
       TOOLBAR
    ===================================================== */

    .toolbar{
        padding:13px;

        gap:9px;

        border-radius:16px 16px 0 0;

        flex-wrap:wrap;
    }

    .toolbar .search-wrapper{
        flex:1 1 100%;
        width:100%;
    }

    .search-wrapper input{
        height:45px;

        padding:0 13px 0 41px;

        border-radius:10px;

        font-size:11px;
    }

    .search-wrapper i{
        left:13px;

        font-size:15px;
    }

    .filter-wrapper{
        width:auto;

        flex:1;
        min-width:0;
    }

    .filter-wrapper select{
        height:45px;

        width:100%;

        padding:0 11px;

        border-radius:10px;

        font-size:11px;
    }

    .btn-view-all-rental{
        height:45px;

        padding:0 12px;

        border-radius:10px;

        font-size:9px;
    }

    .btn-view-all-rental i{
        font-size:10px;
    }


    /* =====================================================
       TABLE
    ===================================================== */

    .table-container{
        width:100%;

        border-radius:0 0 16px 16px;

        overflow-x:auto;

        -webkit-overflow-scrolling:touch;

        scrollbar-width:thin;
    }

    .rental-table{
        min-width:1120px;
    }

    .rental-table thead th{
        padding:15px 12px;

        font-size:9px;

        letter-spacing:.3px;
    }

    .rental-table tbody td{
        padding:16px 12px;

        font-size:11px;
    }


    /* =====================================================
       NUMBER
    ===================================================== */

    .number{
        width:30px;
        height:30px;

        border-radius:9px;

        font-size:10px;
    }


    /* =====================================================
       CUSTOMER
    ===================================================== */

    .customer-box{
        gap:9px;
    }

    .customer-avatar{
        width:38px;
        height:38px;

        min-width:38px;

        border-radius:10px;

        font-size:12px;
    }

    .customer-name{
        font-size:11px;

        line-height:1.4;
    }

    .customer-phone{
        margin-top:3px;

        font-size:9px;
    }


    /* =====================================================
       PRODUCT
    ===================================================== */

    .product{
        margin-bottom:6px;
    }

    .product-name{
        font-size:11px;

        line-height:1.45;
    }

    .product-qty{
        margin-top:3px;

        font-size:9px;
    }


    /* =====================================================
       DATE
    ===================================================== */

    .date-main{
        font-size:10px;
    }

    .date-sub{
        margin-top:3px;

        font-size:9px;
    }


    /* =====================================================
       PRICE
    ===================================================== */

    .price{
        font-size:11px;
    }


    /* =====================================================
       STATUS
    ===================================================== */

    .badge-status{
        gap:4px;

        padding:7px 9px;

        border-radius:999px;

        font-size:8.5px;

        line-height:1.3;
    }

    .badge-status i{
        font-size:9px;
    }

    .fine{
        margin-top:5px;

        font-size:8.5px;
    }


    /* =====================================================
       ACTION
    ===================================================== */

    .action-area{
        gap:8px;
    }

    .action-main,
    .action-menu-btn{
        width:38px;
        height:38px;

        min-width:38px;

        border-radius:10px;

        font-size:15px;
    }


    /* =====================================================
       DROPDOWN
    ===================================================== */

    .action-dropdown{
        min-width:220px;

        padding:8px;
    }

    .action-dropdown .dropdown-item{
        padding:12px 10px;

        font-size:11px;
    }

    .action-dropdown .dropdown-item i{
        font-size:14px;
    }


    /* =====================================================
       EMPTY
    ===================================================== */

    .empty-state{
        padding:58px 18px;
    }

    .empty-icon{
        width:64px;
        height:64px;

        margin-bottom:14px;

        border-radius:18px;

        font-size:27px;
    }

    .empty-state h5,
    .search-empty h5{
        font-size:14px;
    }

    .empty-state p,
    .search-empty p{
        font-size:10px;

        line-height:1.5;
    }


    /* =====================================================
       MODAL
    ===================================================== */

    .modal-dialog{
        max-width:none;

        margin:10px;
    }

    .modal-content{
        border-radius:18px!important;
    }

    .modal-header{
        padding:17px 18px;
    }

    .modal-title-area{
        gap:10px;
    }

    .modal-title-icon{
        width:40px;
        height:40px;

        border-radius:11px;

        font-size:17px;
    }

    .modal-title-text h4{
        font-size:16px;
    }

    .modal-title-text p{
        margin-top:3px;

        font-size:10px;
    }

    .modal-body{
        padding:18px;
    }

    .modal-footer{
        padding:14px 18px;
    }

    .form-label{
        margin-bottom:6px;

        font-size:10px;
    }

    .form-control,
    .form-select{
        height:44px;

        border-radius:9px!important;

        font-size:11px;
    }

    .btn{
        min-height:41px;

        font-size:11px;

        border-radius:9px;
    }


    /* =====================================================
       INFO BOX
    ===================================================== */

    .info-box{
        padding:14px;

        border-radius:12px;
    }

    .info-label{
        margin-bottom:5px;

        font-size:8.5px;
    }

    .info-value{
        font-size:11px;
    }


    /* =====================================================
       RETURN BOX
    ===================================================== */

    .return-box{
        padding:15px;

        border-radius:13px;
    }

    .return-box-title{
        margin-bottom:12px;

        font-size:11px;
    }

    .detail-product{
        padding:10px 0;
    }

    .detail-product-name{
        font-size:10px;
    }

    .detail-product-qty{
        font-size:9px;
    }


    /* =====================================================
       FINE BOX
    ===================================================== */

    .fine-box{
        padding:15px;

        border-radius:13px;
    }

    .fine-title{
        margin-bottom:9px;

        font-size:11px;
    }

    .fine-row{
        padding:7px 0;

        font-size:10px;
    }

    .fine-total{
        margin-top:6px;

        padding-top:10px;

        font-size:12px;
    }


    /* =====================================================
       VERIFICATION
    ===================================================== */

    .verification-box{
        padding:14px;

        border-radius:12px;
    }

    .verification-title{
        font-size:11px;
    }

    .verification-text{
        font-size:9px;

        line-height:1.6;
    }
}


/* =========================================================
   HP KECIL
   360px - 480px
========================================================= */
@media(max-width:480px){

    .rental-page{
        padding:13px 11px 27px;
    }


    /* =====================================================
       HEADER
    ===================================================== */

    .page-header{
        display:flex;

        flex-direction:column;

        align-items:stretch;

        gap:13px;

        margin-bottom:18px;
    }

    .page-heading{
        width:100%;

        display:flex;

        align-items:center;

        gap:9px;
    }

    .heading-icon{
        width:43px;
        height:43px;

        min-width:43px;

        border-radius:11px;

        font-size:18px;
    }

    .page-heading h2{
        font-size:19px;

        line-height:1.25;

        white-space:nowrap;
    }

    .page-heading p{
        margin-top:4px;

        font-size:10px;

        line-height:1.4;

        max-width:none;
    }


    /* =====================================================
       BUTTON TAMBAH FULL WIDTH
    ===================================================== */

    .rental-add-wrapper{
        width:100%;

        justify-content:stretch;

        margin-top:-3px;

        margin-bottom:14px;
    }

    .rental-add-wrapper .btn-add-rental{
        width:100%;

        height:43px;

        display:flex;

        align-items:center;
        justify-content:center;

        margin:0;

        padding:0 14px;

        gap:7px;

        border-radius:10px;

        font-size:11px;

        white-space:nowrap;
    }

    .rental-add-wrapper .btn-add-rental i{
        font-size:13px;
    }


    /* =====================================================
       SUMMARY CARD
    ===================================================== */

    .summary-grid{
        grid-template-columns:
            repeat(2,minmax(0,1fr));

        gap:9px;

        margin-bottom:16px;
    }

    .summary-card{
        min-height:88px;
        height:88px;

        padding:12px;

        gap:9px;

        border-radius:13px;

        box-shadow:
            0 4px 14px rgba(15,23,42,.06);
    }

    .summary-card::after{
        width:58px;
        height:58px;

        right:-19px;
        bottom:-21px;
    }

    .summary-icon{
        width:37px;
        height:37px;

        min-width:37px;

        border-radius:10px;

        font-size:16px;
    }

    .summary-label{
        margin-bottom:3px;

        font-size:9.5px;

        line-height:1.35;
    }

    .summary-value{
        font-size:20px;
    }


    /* =====================================================
       ALERT
    ===================================================== */

    .alert{
        font-size:10px;

        padding:11px 12px;

        line-height:1.5;
    }


    /* =====================================================
       MAIN CARD
    ===================================================== */

    .rental-card{
        border-radius:14px;
    }


    /* =====================================================
       TOOLBAR
    ===================================================== */

    .toolbar{
        padding:10px;

        gap:8px;
    }

    .search-wrapper input{
        height:42px;

        padding-left:36px;

        font-size:10.5px;

        border-radius:9px;
    }

    .search-wrapper i{
        left:11px;

        font-size:13px;
    }

    .filter-wrapper{
        width:auto;

        flex:1;
    }

    .filter-wrapper select{
        height:42px;

        padding:0 8px;

        font-size:10px;

        border-radius:9px;
    }

    .btn-view-all-rental{
        height:42px;

        padding:0 10px;

        border-radius:9px;

        font-size:8.5px;
    }

    .btn-view-all-rental i{
        font-size:9px;
    }


    /* =====================================================
       TABLE
    ===================================================== */

    .rental-table{
        min-width:1080px;
    }

    .rental-table thead th{
        padding:13px 10px;

        font-size:8px;
    }

    .rental-table tbody td{
        padding:14px 10px;

        font-size:10px;
    }


    /* =====================================================
       NUMBER
    ===================================================== */

    .number{
        width:28px;
        height:28px;

        font-size:9px;
    }


    /* =====================================================
       CUSTOMER
    ===================================================== */

    .customer-avatar{
        width:35px;
        height:35px;

        min-width:35px;

        font-size:11px;
    }

    .customer-name{
        font-size:10px;
    }

    .customer-phone{
        font-size:8.5px;
    }


    /* =====================================================
       PRODUCT
    ===================================================== */

    .product-name{
        font-size:10px;
    }

    .product-qty{
        font-size:8.5px;
    }


    /* =====================================================
       DATE
    ===================================================== */

    .date-main{
        font-size:9.5px;
    }

    .date-sub{
        font-size:8px;
    }


    /* =====================================================
       PRICE
    ===================================================== */

    .price{
        font-size:10px;
    }


    /* =====================================================
       STATUS
    ===================================================== */

    .badge-status{
        padding:6px 8px;

        font-size:8px;
    }

    .badge-status i{
        font-size:8px;
    }

    .fine{
        font-size:8px;
    }


    /* =====================================================
       ACTION
    ===================================================== */

    .action-main,
    .action-menu-btn{
        width:36px;
        height:36px;

        min-width:36px;

        font-size:14px;
    }


    /* =====================================================
       EMPTY
    ===================================================== */

    .empty-state{
        padding:48px 15px;
    }

    .empty-icon{
        width:60px;
        height:60px;

        font-size:25px;
    }

    .empty-state h5,
    .search-empty h5{
        font-size:13px;
    }

    .empty-state p,
    .search-empty p{
        font-size:9.5px;
    }


    /* =====================================================
       MODAL
    ===================================================== */

    .modal-dialog{
        margin:7px;
    }

    .modal-content{
        border-radius:16px!important;
    }

    .modal-header{
        padding:15px 16px;
    }

    .modal-title-icon{
        width:38px;
        height:38px;

        font-size:16px;
    }

    .modal-title-text h4{
        font-size:15px;
    }

    .modal-title-text p{
        font-size:9px;
    }

    .modal-body{
        padding:15px;
    }

    .modal-footer{
        padding:12px 15px;
    }

    .form-label{
        font-size:9.5px;
    }

    .form-control,
    .form-select{
        height:42px;

        font-size:10.5px;
    }

    .btn{
        min-height:40px;

        font-size:10.5px;
    }


    /* =====================================================
       INFO BOX
    ===================================================== */

    .info-box{
        padding:13px;

        border-radius:11px;
    }

    .info-label{
        font-size:8px;
    }

    .info-value{
        font-size:10.5px;
    }


    /* =====================================================
       RETURN BOX
    ===================================================== */

    .return-box{
        padding:14px;

        border-radius:12px;
    }

    .return-box-title{
        font-size:10.5px;
    }

    .detail-product{
        padding:9px 0;
    }

    .detail-product-name{
        font-size:10px;
    }

    .detail-product-qty{
        font-size:8.5px;
    }


    /* =====================================================
       FINE BOX
    ===================================================== */

    .fine-box{
        padding:14px;

        border-radius:12px;
    }

    .fine-title{
        font-size:10.5px;
    }

    .fine-row{
        font-size:9.5px;
    }

    .fine-total{
        font-size:11px;
    }


    /* =====================================================
       VERIFICATION
    ===================================================== */

    .verification-box{
        padding:13px;

        border-radius:11px;
    }

    .verification-title{
        font-size:10.5px;
    }

    .verification-text{
        font-size:9px;
    }

}


/* =========================================================
   HP SANGAT KECIL
   ≤359px
========================================================= */
@media(max-width:359px){

    .rental-page{
        padding:11px 9px 24px;
    }


    /* =====================================================
       HEADER
    ===================================================== */

    .page-header{
        gap:11px;

        margin-bottom:17px;
    }

    .page-heading{
        gap:8px;
    }

    .page-heading h2{
        font-size:17px;
    }

    .page-heading p{
        font-size:9px;

        max-width:none;
    }

    .heading-icon{
        width:39px;
        height:39px;

        min-width:39px;

        font-size:16px;
    }


    /* =====================================================
       BUTTON TAMBAH
    ===================================================== */

    .rental-add-wrapper{
        margin-top:-2px;

        margin-bottom:12px;
    }

    .rental-add-wrapper .btn-add-rental{
        width:100%;

        height:40px;

        padding:0 10px;

        font-size:10px;

        gap:6px;
    }

    .rental-add-wrapper .btn-add-rental i{
        font-size:12px;
    }


    /* =====================================================
       SUMMARY
    ===================================================== */

    .summary-grid{
        gap:8px;
    }

    .summary-card{
        min-height:84px;
        height:84px;

        padding:10px;

        gap:8px;
    }

    .summary-icon{
        width:34px;
        height:34px;

        min-width:34px;

        font-size:14px;
    }

    .summary-label{
        font-size:8.5px;
    }

    .summary-value{
        font-size:18px;
    }


    /* =====================================================
       TOOLBAR
    ===================================================== */

    .toolbar{
        padding:8px;

        gap:6px;
    }

    .search-wrapper input,
    .filter-wrapper select{
        height:40px;

        font-size:9.5px;
    }

    .filter-wrapper{
        width:auto;

        flex:1;
    }

    .btn-view-all-rental{
        height:40px;

        padding:0 8px;

        font-size:8px;
    }

    .btn-view-all-rental i{
        font-size:8px;
    }

}

</style>


<div class="container-fluid rental-page">

    {{-- =====================================================
       HEADER
    ====================================================== --}}
    <div class="page-header">

        <div class="page-heading">

            <div class="heading-icon">
                <i class="bi bi-calendar-check"></i>
            </div>

            <div>

                <h2>Data Penyewaan</h2>

                <p>
                    Kelola transaksi rental, pelanggan,
                    pembayaran, dan pengembalian.
                </p>

            </div>

        </div>

    </div>


    {{-- =====================================================
       SUMMARY
    ====================================================== --}}
    @php

        $totalRental = $rentals->count();


        $isPaid = function($rental){

            if(
                !isset($rental->payments) ||
                !$rental->payments
            ){
                return false;
            }

            return $rental->payments->contains(
                function($payment){

                    return strtolower(
                        trim(
                            $payment->payment_status ?? ''
                        )
                    ) === 'lunas';

                }
            );

        };


        $totalMenungguPembayaran = $rentals
            ->filter(function($rental) use ($isPaid){

                $pengembalian =
                    $rental->pengembalian ?? null;

                return
                    $pengembalian &&
                    $pengembalian->status === 'Menunggu Pembayaran';

            })
            ->count();


        $totalAktif = $rentals
            ->filter(function($rental){

                return
                    $rental->status !== 'cancelled'
                    &&
                    !in_array(
                        $rental->status,
                        ['completed']
                    );

            })
            ->count();


        $totalSelesai = $rentals
            ->filter(function($rental){

                return
                    $rental->status === 'completed';

            })
            ->count();

    @endphp


    <div class="summary-grid">

        <div class="summary-card">

            <div class="summary-icon blue">
                <i class="bi bi-clipboard-data"></i>
            </div>

            <div class="summary-info">

                <div class="summary-label">
                    Total Penyewaan
                </div>

                <div class="summary-value">
                    {{ $totalRental }}
                </div>

            </div>

        </div>


        <div class="summary-card">

            <div class="summary-icon orange">
                <i class="bi bi-wallet2"></i>
            </div>

            <div class="summary-info">

                <div class="summary-label">
                    Menunggu Pembayaran
                </div>

                <div class="summary-value">
                    {{ $totalMenungguPembayaran }}
                </div>

            </div>

        </div>


        <div class="summary-card">

            <div class="summary-icon purple">
                <i class="bi bi-box-seam"></i>
            </div>

            <div class="summary-info">

                <div class="summary-label">
                    Rental Aktif
                </div>

                <div class="summary-value">
                    {{ $totalAktif }}
                </div>

            </div>

        </div>


        <div class="summary-card">

            <div class="summary-icon green">
                <i class="bi bi-check2-circle"></i>
            </div>

            <div class="summary-info">

                <div class="summary-label">
                    Selesai
                </div>

                <div class="summary-value">
                    {{ $totalSelesai }}
                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
       BUTTON TAMBAH PENYEWAAN
       SEKARANG DI BAWAH 4 CARD
    ====================================================== --}}
    <div class="rental-add-wrapper">

        <button
            type="button"
            class="btn-add-rental"
            data-bs-toggle="modal"
            data-bs-target="#modalTambah">

            <i class="bi bi-plus-lg"></i>

            Tambah Penyewaan

        </button>

    </div>


    {{-- =====================================================
       ALERT
    ====================================================== --}}
    @if(session('success'))

        <div class="alert alert-success mb-3">

            <i class="bi bi-check-circle me-2"></i>

            {{ session('success') }}

        </div>

    @endif


    @if(session('error'))

        <div class="alert alert-danger mb-3">

            <i class="bi bi-exclamation-circle me-2"></i>

            {{ session('error') }}

        </div>

    @endif


    @if($errors->any())

        <div class="alert alert-danger mb-3">

            <div class="fw-bold mb-2">

                <i class="bi bi-exclamation-triangle me-2"></i>

                Terdapat kesalahan:

            </div>

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- =====================================================
       MAIN CARD
    ====================================================== --}}
    <div class="rental-card">

        {{-- =================================================
           TOOLBAR
        ================================================== --}}
        <div class="toolbar">

            <div class="search-wrapper">

                <i class="bi bi-search"></i>

                <input
                    type="text"
                    id="rentalSearch"
                    placeholder="Cari pelanggan, barang, kode rental, status...">

            </div>


            <div class="filter-wrapper">

                <select id="statusFilter">

                    <option value="">
                        Semua Status
                    </option>

                    <option value="waiting-payment">
                        Menunggu Pembayaran
                    </option>

                    <option value="completed">
                        Selesai
                    </option>

                    <option value="return-waiting">
                        Menunggu Verifikasi Pengembalian
                    </option>

                    <option value="returned">
                        Sudah Dikembalikan
                    </option>

                    <option value="not-returned">
                        Belum Dikembalikan
                    </option>

                    <option value="cancelled">
                        Dibatalkan
                    </option>

                </select>

            </div>


            {{-- =================================================
               LIHAT SEMUA
            ================================================== --}}
            @if($rentals->count() > 5)

                <button
                    type="button"
                    id="btnViewRentals"
                    class="btn-view-all-rental">

                    <i class="bi bi-chevron-down"></i>

                    <span>Lihat Semua</span>

                </button>

            @endif

        </div>


        {{-- =====================================================
           TABLE
        ====================================================== --}}
        <div class="table-container">

            <table class="rental-table">

                <thead>

                    <tr>

                        <th>No</th>
                        <th>Pelanggan</th>
                        <th>Barang</th>
                        <th>Tanggal Sewa</th>
                        <th>Batas Kembali</th>
                        <th>Total</th>
                        <th>Status Rental</th>
                        <th>Pengembalian</th>
                        <th>Aksi</th>

                    </tr>

                </thead>


                <tbody id="rentalTableBody">

                    @forelse($rentals as $rental)

                        @php

                            $pengembalian =
                                $rental->pengembalian ?? null;


                            $pengembalianMenunggu =
                                $pengembalian &&
                                $pengembalian->status === 'Menunggu';


                            $sudahDikembalikan =
                                $pengembalian &&
                                in_array(
                                    $pengembalian->status,
                                    [
                                        'Menunggu Pembayaran',
                                        'Selesai'
                                    ]
                                );


                            $sudahBayar =
                                $isPaid($rental);


                            if($rental->status === 'cancelled'){

                                $displayStatus = 'cancelled';

                            }elseif(
                                $pengembalian &&
                                $pengembalian->status === 'Menunggu Pembayaran'
                            ){

                                $displayStatus = 'waiting-payment';

                            }elseif($rental->status === 'completed'){

                                $displayStatus = 'completed';

                            }else{

                                $displayStatus =
                                    $rental->status ?? 'pending';

                            }


                            if($pengembalianMenunggu){

                                $returnFilterStatus =
                                    'return-waiting';

                            }elseif($sudahDikembalikan){

                                $returnFilterStatus =
                                    'returned';

                            }else{

                                $returnFilterStatus =
                                    'not-returned';

                            }


                            $totalDenda =
                                $pengembalian
                                    ? (
                                        ($pengembalian->denda_telat ?? 0)
                                        +
                                        ($pengembalian->denda_rusak ?? 0)
                                    )
                                    : 0;

                        @endphp


                        <tr
                            class="rental-row {{ $loop->iteration > 5 ? 'extra-row' : '' }}"
                            data-rental-status="{{ $displayStatus }}"
                            data-return-status="{{ $returnFilterStatus }}"
                            data-index="{{ $loop->iteration }}">

                            <td>

                                <div class="number">
                                    {{ $loop->iteration }}
                                </div>

                            </td>


                            <td>

                                <div class="customer-box">

                                    <div class="customer-avatar">

                                        {{
                                            strtoupper(
                                                substr(
                                                    $rental->customer->name ?? 'U',
                                                    0,
                                                    1
                                                )
                                            )
                                        }}

                                    </div>

                                    <div class="customer-content">

                                        <div class="customer-name">
                                            {{ $rental->customer->name ?? '-' }}
                                        </div>

                                        <div class="customer-phone">

                                            <i class="bi bi-telephone me-1"></i>

                                            {{ $rental->customer->phone ?? '-' }}

                                        </div>

                                    </div>

                                </div>

                            </td>


                            <td>

                                <div class="product-list">

                                    @forelse($rental->details as $detail)

                                        <div class="product">

                                            <div class="product-name">
                                                {{ $detail->product->name ?? '-' }}
                                            </div>

                                            <div class="product-qty">

                                                <i class="bi bi-box-seam me-1"></i>

                                                {{ $detail->quantity }} unit

                                            </div>

                                        </div>

                                    @empty

                                        <span class="text-muted">
                                            Tidak ada barang
                                        </span>

                                    @endforelse

                                </div>

                            </td>


                            <td>

                                <div class="date-main">

                                    {{
                                        $rental->rental_date
                                            ? \Carbon\Carbon::parse(
                                                $rental->rental_date
                                            )->format('d M Y')
                                            : '-'
                                    }}

                                </div>

                                <span class="date-sub">
                                    Tanggal sewa
                                </span>

                            </td>


                            <td>

                                <div class="date-main">

                                    {{
                                        $rental->return_date
                                            ? \Carbon\Carbon::parse(
                                                $rental->return_date
                                            )->format('d M Y')
                                            : '-'
                                    }}

                                </div>

                                <span class="date-sub">
                                    Batas kembali
                                </span>

                            </td>


                            <td>

                                <span class="price">

                                    Rp
                                    {{
                                        number_format(
                                            $rental->total_price ?? 0,
                                            0,
                                            ',',
                                            '.'
                                        )
                                    }}

                                </span>

                            </td>


                            <td>

                                @if($displayStatus === 'waiting-payment')

                                    <span class="badge-status status-payment">

                                        <i class="bi bi-wallet2"></i>

                                        Menunggu Pembayaran

                                    </span>

                                @elseif($displayStatus === 'completed')

                                    <span class="badge-status status-completed">

                                        <i class="bi bi-check-circle"></i>

                                        Selesai

                                    </span>

                                @elseif($displayStatus === 'cancelled')

                                    <span class="badge-status status-cancelled">

                                        <i class="bi bi-x-circle"></i>

                                        Dibatalkan

                                    </span>

                                @elseif($displayStatus === 'approved')

                                    <span class="badge-status status-approved">

                                        <i class="bi bi-check-circle"></i>

                                        Disetujui

                                    </span>

                                @else

                                    <span class="badge-status status-pending">

                                        <i class="bi bi-clock"></i>

                                        Menunggu

                                    </span>

                                @endif

                            </td>


                            <td>

                                @if($pengembalian)

                                    @if($pengembalian->status === 'Menunggu')

                                        <span class="badge-status status-verification">

                                            <i class="bi bi-shield-check"></i>

                                            Menunggu Verifikasi

                                        </span>

                                    @elseif(
                                        $pengembalian->status ===
                                        'Menunggu Pembayaran'
                                    )

                                        <span class="badge-status status-payment">

                                            <i class="bi bi-wallet2"></i>

                                            Menunggu Pembayaran

                                        </span>

                                    @else

                                        <span class="badge-status status-returned">

                                            <i class="bi bi-check-circle"></i>

                                            Sudah Dikembalikan

                                        </span>

                                    @endif


                                    @if($totalDenda > 0)

                                        <small class="fine">

                                            Denda Rp

                                            {{
                                                number_format(
                                                    $totalDenda,
                                                    0,
                                                    ',',
                                                    '.'
                                                )
                                            }}

                                        </small>

                                    @endif

                                @else

                                    <span class="badge-status status-waiting">

                                        <i class="bi bi-clock"></i>

                                        Belum Dikembalikan

                                    </span>

                                @endif

                            </td>


                            <td>

                                <div class="action-area">

                                    <button
                                        type="button"
                                        class="action-main"
                                        title="Lihat Detail"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalDetail{{ $rental->id }}">

                                        <i class="bi bi-eye"></i>

                                    </button>


                                    <div class="dropdown">

                                        <button
                                            type="button"
                                            class="action-menu-btn dropdown-toggle"
                                            data-bs-toggle="dropdown"
                                            aria-expanded="false"
                                            title="Aksi lainnya">

                                            <i class="bi bi-three-dots"></i>

                                        </button>


                                        <ul class="dropdown-menu dropdown-menu-end action-dropdown">

                                            <li>

                                                <a
                                                    href="{{ route('rentals.edit', $rental->id) }}"
                                                    class="dropdown-item text-primary">

                                                    <i class="bi bi-pencil-square"></i>

                                                    Edit Penyewaan

                                                </a>

                                            </li>


                                            @if(
                                                $rental->status === 'approved' &&
                                                !$pengembalian
                                            )

                                                <li>

                                                    <button
                                                        type="button"
                                                        class="dropdown-item text-warning"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modalAjukanPengembalian{{ $rental->id }}">

                                                        <i class="bi bi-box-arrow-left"></i>

                                                        Ajukan Pengembalian

                                                    </button>

                                                </li>

                                            @endif


                                            @if($pengembalianMenunggu)

                                                <li>

                                                    <button
                                                        type="button"
                                                        class="dropdown-item text-success"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modalVerifikasiPengembalian{{ $rental->id }}">

                                                        <i class="bi bi-shield-check"></i>

                                                        Verifikasi Pengembalian

                                                    </button>

                                                </li>

                                            @endif


                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>


                                            <li>

                                                <form
                                                    action="{{ route('rentals.destroy', $rental->id) }}"
                                                    method="POST">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button
                                                        type="submit"
                                                        class="dropdown-item text-danger"
                                                        onclick="return confirm('Yakin ingin menghapus data penyewaan ini?')">

                                                        <i class="bi bi-trash3"></i>

                                                        Hapus Penyewaan

                                                    </button>

                                                </form>

                                            </li>

                                        </ul>

                                    </div>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="9">

                                <div class="empty-state">

                                    <div class="empty-icon">
                                        <i class="bi bi-clipboard-x"></i>
                                    </div>

                                    <h5>
                                        Belum Ada Penyewaan
                                    </h5>

                                    <p>
                                        Belum terdapat transaksi rental.
                                        Tambahkan penyewaan pertama.
                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>


            <div
                id="searchEmpty"
                class="search-empty">

                <div class="empty-icon">
                    <i class="bi bi-search"></i>
                </div>

                <h5>
                    Data tidak ditemukan
                </h5>

                <p>
                    Coba gunakan kata kunci atau filter yang berbeda.
                </p>

            </div>

        </div>

    </div>

</div>


{{-- =========================================================
   MODAL TAMBAH PENYEWAAN
========================================================= --}}
<div
    class="modal fade"
    id="modalTambah"
    tabindex="-1"
    aria-hidden="true">

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content">

            <form
                action="{{ route('rentals.store') }}"
                method="POST">

                @csrf

                <div class="modal-header">

                    <div class="modal-title-area">

                        <div class="modal-title-icon">

                            <i class="bi bi-clipboard-plus"></i>

                        </div>

                        <div class="modal-title-text">

                            <h4>
                                Tambah Penyewaan
                            </h4>

                            <p>
                                Masukkan informasi transaksi rental baru.
                            </p>

                        </div>

                    </div>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                    </button>

                </div>


                <div class="modal-body">

                    <div class="row g-3">

                        <div class="col-md-6">

                            <label class="form-label">
                                Pelanggan
                            </label>

                            <select
                                name="customer_id"
                                class="form-select"
                                required>

                                <option value="">
                                    Pilih pelanggan
                                </option>

                                @foreach($customers as $customer)

                                    <option value="{{ $customer->id }}">
                                        {{ $customer->name }}
                                    </option>

                                @endforeach

                            </select>

                        </div>


                        <div class="col-md-6">

                            <label class="form-label">
                                Barang
                            </label>

                            <select
                                name="product_id"
                                id="productSelect"
                                class="form-select"
                                required>

                                <option value="">
                                    Pilih barang
                                </option>

                                @foreach($products as $product)

                                    <option
                                        value="{{ $product->id }}"
                                        data-price="{{ $product->price_per_day }}"
                                        data-stock="{{ $product->stock }}">

                                        {{ $product->name }}
                                        — Stok {{ $product->stock }}

                                    </option>

                                @endforeach

                            </select>

                        </div>


                        <div class="col-md-6">

                            <label class="form-label">
                                Harga / Hari
                            </label>

                            <input
                                type="text"
                                id="priceDisplay"
                                class="form-control"
                                value="Rp 0"
                                readonly>

                        </div>


                        <div class="col-md-6">

                            <label class="form-label">
                                Jumlah
                            </label>

                            <input
                                type="number"
                                name="quantity"
                                id="quantity"
                                class="form-control"
                                value="1"
                                min="1"
                                required>

                        </div>


                        <div class="col-md-6">

                            <label class="form-label">
                                Tanggal Sewa
                            </label>

                            <input
                                type="date"
                                name="rental_date"
                                id="rentalDate"
                                class="form-control"
                                required>

                        </div>


                        <div class="col-md-6">

                            <label class="form-label">
                                Tanggal Kembali
                            </label>

                            <input
                                type="date"
                                name="return_date"
                                id="returnDate"
                                class="form-control"
                                required>

                        </div>


                        <div class="col-md-6">

                            <label class="form-label">
                                Status Penyewaan
                            </label>

                            <select
                                name="status"
                                class="form-select"
                                required>

                                <option value="pending">
                                    Menunggu
                                </option>

                                <option value="approved">
                                    Disetujui
                                </option>

                                <option value="completed">
                                    Selesai
                                </option>

                                <option value="cancelled">
                                    Dibatalkan
                                </option>

                            </select>

                        </div>


                        <div class="col-md-6">

                            <label class="form-label">
                                Total Pembayaran
                            </label>

                            <input
                                type="text"
                                id="totalDisplay"
                                class="form-control fw-bold text-primary"
                                value="Rp 0"
                                readonly>

                        </div>

                    </div>

                </div>


                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-light px-4"
                        data-bs-dismiss="modal">

                        Batal

                    </button>

                    <button
                        type="submit"
                        class="btn btn-primary px-4">

                        <i class="bi bi-check-circle me-2"></i>

                        Simpan Penyewaan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


{{-- =========================================================
   MODAL DETAIL + VERIFIKASI
========================================================= --}}
@foreach($rentals as $rental)

    @php

        $pengembalian =
            $rental->pengembalian ?? null;


        $pengembalianMenunggu =
            $pengembalian &&
            $pengembalian->status === 'Menunggu';


        $sudahDikembalikan =
            $pengembalian &&
            in_array(
                $pengembalian->status,
                [
                    'Menunggu Pembayaran',
                    'Selesai'
                ]
            );


        $sudahBayar =
            $isPaid($rental);


        if($rental->status === 'cancelled'){

            $displayStatus = 'cancelled';

        }elseif(
            $pengembalian &&
            $pengembalian->status === 'Menunggu Pembayaran'
        ){

            $displayStatus = 'waiting-payment';

        }elseif($rental->status === 'completed'){

            $displayStatus = 'completed';

        }else{

            $displayStatus =
                $rental->status ?? 'pending';

        }

    @endphp


    {{-- =====================================================
       MODAL AJUKAN PENGEMBALIAN
    ====================================================== --}}

    @if(
        $rental->status === 'approved' &&
        !$pengembalian
    )

        <div
            class="modal fade"
            id="modalAjukanPengembalian{{ $rental->id }}"
            tabindex="-1"
            aria-hidden="true">

            <div class="modal-dialog modal-lg modal-dialog-centered">

                <div class="modal-content">

                    <form
                        action="{{ route('pengembalians.store') }}"
                        method="POST">

                        @csrf

                        <input
                            type="hidden"
                            name="rental_id"
                            value="{{ $rental->id }}">

                        <div class="modal-header">

                            <div class="modal-title-area">

                                <div
                                    class="modal-title-icon"
                                    style="background:#FEF3C7;color:#D97706;">

                                    <i class="bi bi-box-arrow-left"></i>

                                </div>

                                <div class="modal-title-text">

                                    <h4>
                                        Ajukan Pengembalian
                                    </h4>

                                    <p>
                                        Masukkan data pengembalian barang.
                                    </p>

                                </div>

                            </div>

                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Tutup">
                            </button>

                        </div>


                        <div class="modal-body">

                            <div class="verification-box mb-4">

                                <div class="verification-title">
                                    <i class="bi bi-info-circle"></i>
                                    Informasi Penyewaan
                                </div>

                                <div class="row g-3">

                                    <div class="col-md-6">

                                        <div class="info-box">

                                            <div class="info-label">
                                                Kode Rental
                                            </div>

                                            <div class="info-value">
                                                {{ $rental->rental_code ?? '-' }}
                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="info-box">

                                            <div class="info-label">
                                                Pelanggan
                                            </div>

                                            <div class="info-value">
                                                {{ $rental->customer->name ?? $rental->customer->nama ?? '-' }}
                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="info-box">

                                            <div class="info-label">
                                                Tanggal Sewa
                                            </div>

                                            <div class="info-value">
                                                {{
                                                    $rental->rental_date
                                                        ? \Carbon\Carbon::parse($rental->rental_date)->format('d M Y')
                                                        : '-'
                                                }}
                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="info-box">

                                            <div class="info-label">
                                                Batas Pengembalian
                                            </div>

                                            <div class="info-value">
                                                {{
                                                    $rental->return_date
                                                        ? \Carbon\Carbon::parse($rental->return_date)->format('d M Y')
                                                        : '-'
                                                }}
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>


                            <div class="mb-3">

                                <label
                                    for="tanggalKembali{{ $rental->id }}"
                                    class="form-label fw-semibold">

                                    Tanggal Pengembalian

                                </label>

                                <input
                                    type="date"
                                    class="form-control"
                                    id="tanggalKembali{{ $rental->id }}"
                                    name="tanggal_kembali"
                                    value="{{ date('Y-m-d') }}"
                                    required>

                            </div>


                            <div class="mb-3">

                                <label
                                    for="kondisi{{ $rental->id }}"
                                    class="form-label fw-semibold">

                                    Kondisi Barang

                                </label>

                                <select
                                    class="form-select"
                                    id="kondisi{{ $rental->id }}"
                                    name="kondisi"
                                    required>

                                    <option value="">
                                        Pilih kondisi barang
                                    </option>

                                    <option value="Baik">
                                        Baik
                                    </option>

                                    <option value="Rusak Ringan">
                                        Rusak Ringan
                                    </option>

                                    <option value="Rusak Berat">
                                        Rusak Berat
                                    </option>

                                </select>

                            </div>


                            <div class="mb-3">

                                <label
                                    for="catatan{{ $rental->id }}"
                                    class="form-label fw-semibold">

                                    Catatan

                                </label>

                                <textarea
                                    class="form-control"
                                    id="catatan{{ $rental->id }}"
                                    name="catatan"
                                    rows="3"
                                    placeholder="Tambahkan catatan jika diperlukan..."></textarea>

                            </div>


                            <div
                                class="alert alert-warning d-flex align-items-start gap-2 mb-0">

                                <i class="bi bi-exclamation-triangle-fill"></i>

                                <div>
                                    Pastikan kondisi barang sudah diperiksa
                                    sebelum mengajukan pengembalian.
                                </div>

                            </div>

                        </div>


                        <div class="modal-footer">

                            <button
                                type="button"
                                class="btn btn-light px-4"
                                data-bs-dismiss="modal">

                                Batal

                            </button>

                            <button
                                type="submit"
                                class="btn btn-warning px-4">

                                <i class="bi bi-box-arrow-left me-2"></i>

                                Ajukan Pengembalian

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    @endif


    {{-- =====================================================
       DETAIL MODAL
    ====================================================== --}}
    <div
        class="modal fade"
        id="modalDetail{{ $rental->id }}"
        tabindex="-1"
        aria-hidden="true">

        <div class="modal-dialog modal-lg modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-header">

                    <div class="modal-title-area">

                        <div class="modal-title-icon">

                            <i class="bi bi-receipt"></i>

                        </div>

                        <div class="modal-title-text">

                            <h4>
                                Detail Penyewaan
                            </h4>

                            <p>
                                Informasi lengkap transaksi rental.
                            </p>

                        </div>

                    </div>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                    </button>

                </div>


                <div class="modal-body">

                    <div class="row g-3">

                        <div class="col-md-6">

                            <div class="info-box">

                                <div class="info-label">
                                    Pelanggan
                                </div>

                                <div class="info-value">
                                    {{ $rental->customer->name ?? '-' }}
                                </div>

                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="info-box">

                                <div class="info-label">
                                    Kode Rental
                                </div>

                                <div class="info-value">
                                    {{ $rental->rental_code ?? '-' }}
                                </div>

                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="info-box">

                                <div class="info-label">
                                    Tanggal Sewa
                                </div>

                                <div class="info-value">

                                    {{
                                        $rental->rental_date
                                            ? \Carbon\Carbon::parse(
                                                $rental->rental_date
                                            )->format('d M Y')
                                            : '-'
                                    }}

                                </div>

                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="info-box">

                                <div class="info-label">
                                    Batas Kembali
                                </div>

                                <div class="info-value">

                                    {{
                                        $rental->return_date
                                            ? \Carbon\Carbon::parse(
                                                $rental->return_date
                                            )->format('d M Y')
                                            : '-'
                                    }}

                                </div>

                            </div>

                        </div>


                        <div class="col-12">

                            <div class="return-box">

                                <div class="return-box-title">

                                    <i class="bi bi-box-seam"></i>

                                    Barang Rental

                                </div>


                                @forelse($rental->details as $detail)

                                    <div class="detail-product">

                                        <div>

                                            <div class="detail-product-name">
                                                {{ $detail->product->name ?? '-' }}
                                            </div>

                                            <div class="detail-product-qty">
                                                Jumlah {{ $detail->quantity }} unit
                                            </div>

                                        </div>

                                    </div>

                                @empty

                                    <span class="text-muted">
                                        Tidak ada barang.
                                    </span>

                                @endforelse

                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="info-box">

                                <div class="info-label">
                                    Total Rental
                                </div>

                                <div class="info-value text-primary">

                                    Rp
                                    {{
                                        number_format(
                                            $rental->total_price ?? 0,
                                            0,
                                            ',',
                                            '.'
                                        )
                                    }}

                                </div>

                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="info-box">

                                <div class="info-label">
                                    Status Rental
                                </div>

                                <div class="info-value">

                                    @if($displayStatus === 'waiting-payment')

                                        <span class="badge-status status-payment">

                                            <i class="bi bi-wallet2"></i>

                                            Menunggu Pembayaran

                                        </span>

                                    @elseif($displayStatus === 'completed')

                                        <span class="badge-status status-completed">

                                            <i class="bi bi-check-circle"></i>

                                            Selesai

                                        </span>

                                    @elseif($displayStatus === 'cancelled')

                                        <span class="badge-status status-cancelled">

                                            <i class="bi bi-x-circle"></i>

                                            Dibatalkan

                                        </span>

                                    @elseif($displayStatus === 'approved')

                                        <span class="badge-status status-approved">

                                            <i class="bi bi-check-circle"></i>

                                            Disetujui

                                        </span>

                                    @else

                                        <span class="badge-status status-pending">

                                            <i class="bi bi-clock"></i>

                                            Menunggu

                                        </span>

                                    @endif

                                </div>

                            </div>

                        </div>


                        @if($pengembalian)

                            @php

                                $totalDenda =
                                    ($pengembalian->denda_telat ?? 0)
                                    +
                                    ($pengembalian->denda_rusak ?? 0);

                            @endphp


                            <div class="col-12">

                                <div class="fine-box">

                                    <div class="fine-title">

                                        <i class="bi bi-arrow-return-left"></i>

                                        Data Pengembalian

                                    </div>


                                    <div class="fine-row">

                                        <span>
                                            Status Pengembalian
                                        </span>

                                        <strong>
                                            {{ $pengembalian->status }}
                                        </strong>

                                    </div>


                                    <div class="fine-row">

                                        <span>
                                            Tanggal Pengembalian
                                        </span>

                                        <strong>

                                            {{
                                                $pengembalian->tanggal_kembali
                                                    ? \Carbon\Carbon::parse(
                                                        $pengembalian->tanggal_kembali
                                                    )->format('d M Y')
                                                    : '-'
                                            }}

                                        </strong>

                                    </div>


                                    <div class="fine-row">

                                        <span>
                                            Kondisi Barang
                                        </span>

                                        <strong>
                                            {{ $pengembalian->kondisi ?? '-' }}
                                        </strong>

                                    </div>


                                    <div class="fine-row">

                                        <span>
                                            Denda Keterlambatan
                                        </span>

                                        <strong>

                                            Rp
                                            {{
                                                number_format(
                                                    $pengembalian->denda_telat ?? 0,
                                                    0,
                                                    ',',
                                                    '.'
                                                )
                                            }}

                                        </strong>

                                    </div>


                                    <div class="fine-row">

                                        <span>
                                            Denda Kerusakan
                                        </span>

                                        <strong>

                                            Rp
                                            {{
                                                number_format(
                                                    $pengembalian->denda_rusak ?? 0,
                                                    0,
                                                    ',',
                                                    '.'
                                                )
                                            }}

                                        </strong>

                                    </div>


                                    <div class="fine-total">

                                        <span>
                                            Total Denda
                                        </span>

                                        <span>

                                            Rp
                                            {{
                                                number_format(
                                                    $totalDenda,
                                                    0,
                                                    ',',
                                                    '.'
                                                )
                                            }}

                                        </span>

                                    </div>

                                </div>

                            </div>

                        @else

                            <div class="col-12">

                                <div class="info-box">

                                    <div class="info-label">
                                        Pengembalian
                                    </div>

                                    <div class="info-value text-warning">

                                        <i class="bi bi-clock me-1"></i>

                                        Belum Dikembalikan

                                    </div>

                                </div>

                            </div>

                        @endif

                    </div>

                </div>


                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-light px-4"
                        data-bs-dismiss="modal">

                        Tutup

                    </button>

                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
       MODAL VERIFIKASI PENGEMBALIAN
    ====================================================== --}}
    @if($pengembalianMenunggu)

        @php

            $dendaTelat =
                $pengembalian->denda_telat ?? 0;

            $dendaRusak =
                $pengembalian->denda_rusak ?? 0;

            $totalDenda =
                $dendaTelat +
                $dendaRusak;

        @endphp


        <div
            class="modal fade"
            id="modalVerifikasiPengembalian{{ $rental->id }}"
            tabindex="-1"
            aria-hidden="true">

            <div class="modal-dialog modal-lg modal-dialog-centered">

                <div class="modal-content">

                    <form
                        action="{{ route('pengembalians.update', $pengembalian->id) }}"
                        method="POST">

                        @csrf
                        @method('PUT')


                        <div class="modal-header">

                            <div class="modal-title-area">

                                <div
                                    class="modal-title-icon"
                                    style="background:#DCFCE7;color:#16A34A;">

                                    <i class="bi bi-shield-check"></i>

                                </div>

                                <div class="modal-title-text">

                                    <h4>
                                        Verifikasi Pengembalian
                                    </h4>

                                    <p>
                                        Periksa data pengembalian yang diajukan pelanggan.
                                    </p>

                                </div>

                            </div>

                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal">
                            </button>

                        </div>


                        <div class="modal-body">

                            <div class="verification-box mb-3">

                                <div class="verification-title">

                                    <i class="bi bi-info-circle"></i>

                                    Pengajuan dari Pelanggan

                                </div>

                                <p class="verification-text">

                                    Data di bawah berasal dari pengajuan
                                    pengembalian pelanggan. Admin tidak perlu
                                    mengisi ulang data. Silakan periksa dan
                                    lakukan verifikasi.

                                </p>

                            </div>


                            <div class="row g-3">

                                <div class="col-md-6">

                                    <label class="form-label">
                                        Pelanggan
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $rental->customer->name ?? '-' }}"
                                        readonly>

                                </div>


                                <div class="col-md-6">

                                    <label class="form-label">
                                        Kode Rental
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $rental->rental_code ?? '-' }}"
                                        readonly>

                                </div>


                                <div class="col-md-6">

                                    <label class="form-label">
                                        Batas Kembali
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{
                                            $rental->return_date
                                                ? \Carbon\Carbon::parse(
                                                    $rental->return_date
                                                )->format('d M Y')
                                                : '-'
                                        }}"
                                        readonly>

                                </div>


                                <div class="col-md-6">

                                    <label class="form-label">
                                        Tanggal Pengembalian
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{
                                            $pengembalian->tanggal_kembali
                                                ? \Carbon\Carbon::parse(
                                                    $pengembalian->tanggal_kembali
                                                )->format('d M Y')
                                                : '-'
                                        }}"
                                        readonly>

                                </div>


                                <div class="col-md-6">

                                    <label class="form-label">
                                        Kondisi Barang
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $pengembalian->kondisi ?? '-' }}"
                                        readonly>

                                </div>


                                <div class="col-md-6">

                                    <label class="form-label">
                                        Status Pengajuan
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        value="Menunggu Verifikasi"
                                        readonly>

                                </div>


                                <div class="col-12">

                                    <div class="fine-box">

                                        <div class="fine-title">

                                            <i class="bi bi-exclamation-triangle"></i>

                                            Ringkasan Denda

                                        </div>


                                        <div class="fine-row">

                                            <span>
                                                Denda Keterlambatan
                                            </span>

                                            <strong>

                                                Rp
                                                {{
                                                    number_format(
                                                        $dendaTelat,
                                                        0,
                                                        ',',
                                                        '.'
                                                    )
                                                }}

                                            </strong>

                                        </div>


                                        <div class="fine-row">

                                            <span>
                                                Denda Kerusakan
                                            </span>

                                            <strong>

                                                Rp
                                                {{
                                                    number_format(
                                                        $dendaRusak,
                                                        0,
                                                        ',',
                                                        '.'
                                                    )
                                                }}

                                            </strong>

                                        </div>


                                        <div class="fine-total">

                                            <span>
                                                Total Denda
                                            </span>

                                            <span>

                                                Rp
                                                {{
                                                    number_format(
                                                        $totalDenda,
                                                        0,
                                                        ',',
                                                        '.'
                                                    )
                                                }}

                                            </span>

                                        </div>

                                    </div>

                                </div>


                                <div class="col-12">

                                    <div class="return-box">

                                        <div class="return-box-title">

                                            <i class="bi bi-box-seam"></i>

                                            Barang yang Dikembalikan

                                        </div>


                                        @forelse($rental->details as $detail)

                                            <div class="detail-product">

                                                <div>

                                                    <div class="detail-product-name">

                                                        {{ $detail->product->name ?? '-' }}

                                                    </div>

                                                    <div class="detail-product-qty">

                                                        Jumlah
                                                        {{ $detail->quantity }}
                                                        unit

                                                    </div>

                                                </div>

                                            </div>

                                        @empty

                                            <span class="text-muted">
                                                Tidak ada barang.
                                            </span>

                                        @endforelse

                                    </div>

                                </div>

                            </div>

                        </div>


                        <div class="modal-footer">

                            <button
                                type="button"
                                class="btn btn-light px-4"
                                data-bs-dismiss="modal">

                                Batal

                            </button>


                            <button
                                type="submit"
                                class="btn btn-success px-4">

                                <i class="bi bi-shield-check me-2"></i>

                                Verifikasi Pengembalian

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    @endif

@endforeach


<script>

document.addEventListener('DOMContentLoaded', function(){

    /* =====================================================
       SEARCH + FILTER + LIHAT SEMUA
    ===================================================== */

    const searchInput =
        document.getElementById('rentalSearch');

    const statusFilter =
        document.getElementById('statusFilter');

    const rows =
        Array.from(
            document.querySelectorAll('.rental-row')
        );

    const searchEmpty =
        document.getElementById('searchEmpty');

    const btnViewRentals =
        document.getElementById('btnViewRentals');

    let rentalsExpanded = false;


    /* =====================================================
       FILTER RENTAL
    ===================================================== */

    function filterRentals(){

        const keyword =
            searchInput
                ? searchInput.value.toLowerCase().trim()
                : '';

        const status =
            statusFilter
                ? statusFilter.value.toLowerCase().trim()
                : '';

        let found = 0;


        rows.forEach(function(row,index){

            const text =
                row.innerText.toLowerCase();

            const rentalStatus =
                (
                    row.dataset.rentalStatus || ''
                ).toLowerCase();

            const returnStatus =
                (
                    row.dataset.returnStatus || ''
                ).toLowerCase();


            /* =========================================
               CARI
            ========================================= */

            const matchSearch =
                text.includes(keyword);


            /* =========================================
               FILTER STATUS
            ========================================= */

            let matchStatus = true;

            if(status){

                if(
                    status === 'returned' ||
                    status === 'not-returned' ||
                    status === 'return-waiting'
                ){

                    matchStatus =
                        returnStatus === status;

                }else{

                    matchStatus =
                        rentalStatus === status;

                }

            }


            const matched =
                matchSearch &&
                matchStatus;


            /* =========================================
               TIDAK COCOK
            ========================================= */

            if(!matched){

                row.style.display = 'none';

                return;

            }


            /* =========================================
               SEARCH / FILTER AKTIF
               TAMPILKAN SEMUA HASIL
            ========================================= */

            if(
                keyword !== '' ||
                status !== ''
            ){

                row.style.display = 'table-row';

                found++;

                return;

            }


            /* =========================================
               MODE NORMAL
               HANYA 5 TERBARU
            ========================================= */

            if(
                rentalsExpanded ||
                index < 5
            ){

                row.style.display = 'table-row';

                found++;

            }else{

                row.style.display = 'none';

            }

        });


        /* =============================================
           EMPTY HASIL SEARCH
        ============================================= */

        if(
            searchEmpty &&
            found === 0 &&
            (keyword || status)
        ){

            searchEmpty.style.display = 'block';

        }else if(searchEmpty){

            searchEmpty.style.display = 'none';

        }

    }


    /* =====================================================
       BUTTON LIHAT SEMUA
    ===================================================== */

    btnViewRentals?.addEventListener(
        'click',
        function(){

            rentalsExpanded =
                !rentalsExpanded;


            if(rentalsExpanded){

                this.classList.add('active');

                this.innerHTML =
                    '<i class="bi bi-chevron-up"></i>' +
                    '<span>Sembunyikan</span>';

            }else{

                this.classList.remove('active');

                this.innerHTML =
                    '<i class="bi bi-chevron-down"></i>' +
                    '<span>Lihat Semua</span>';

            }


            filterRentals();

        }
    );


    /* =====================================================
       SEARCH EVENT
    ===================================================== */

    searchInput?.addEventListener(
        'input',
        filterRentals
    );


    /* =====================================================
       FILTER EVENT
    ===================================================== */

    statusFilter?.addEventListener(
        'change',
        filterRentals
    );


    /* =====================================================
       DEFAULT
       HANYA 5 RENTAL TERBARU
    ===================================================== */

    filterRentals();


    /* =====================================================
       HITUNG TOTAL RENTAL
    ===================================================== */

    const productSelect =
        document.getElementById('productSelect');

    const quantity =
        document.getElementById('quantity');

    const rentalDate =
        document.getElementById('rentalDate');

    const returnDate =
        document.getElementById('returnDate');

    const priceDisplay =
        document.getElementById('priceDisplay');

    const totalDisplay =
        document.getElementById('totalDisplay');


    function calculateRentalTotal(){

        if(!productSelect){
            return;
        }


        /* =============================================
           BELUM PILIH BARANG
        ============================================= */

        if(!productSelect.value){

            if(priceDisplay){
                priceDisplay.value = 'Rp 0';
            }

            if(totalDisplay){
                totalDisplay.value = 'Rp 0';
            }

            return;

        }


        const option =
            productSelect.options[
                productSelect.selectedIndex
            ];


        const price =
            parseInt(
                option.dataset.price || 0
            );


        /* =============================================
           HARGA PER HARI
        ============================================= */

        if(priceDisplay){

            priceDisplay.value =
                'Rp ' +
                price.toLocaleString('id-ID');

        }


        /* =============================================
           TANGGAL BELUM LENGKAP
        ============================================= */

        if(
            !rentalDate?.value ||
            !returnDate?.value
        ){

            if(totalDisplay){
                totalDisplay.value = 'Rp 0';
            }

            return;

        }


        const start =
            new Date(
                rentalDate.value + 'T00:00:00'
            );


        const end =
            new Date(
                returnDate.value + 'T00:00:00'
            );


        let days =
            Math.ceil(
                (end - start)
                /
                (1000 * 60 * 60 * 24)
            );


        if(days <= 0){
            days = 1;
        }


        const qty =
            parseInt(
                quantity?.value || 1
            );


        const total =
            price *
            qty *
            days;


        if(totalDisplay){

            totalDisplay.value =
                'Rp ' +
                total.toLocaleString('id-ID');

        }

    }


    /* =====================================================
       EVENT HITUNG TOTAL
    ===================================================== */

    productSelect?.addEventListener(
        'change',
        calculateRentalTotal
    );


    quantity?.addEventListener(
        'input',
        calculateRentalTotal
    );


    rentalDate?.addEventListener(
        'change',
        calculateRentalTotal
    );


    returnDate?.addEventListener(
        'change',
        calculateRentalTotal
    );


    /* =====================================================
       DEFAULT DATE
    ===================================================== */

    if(
        rentalDate &&
        !rentalDate.value
    ){

        const today =
            new Date()
                .toISOString()
                .split('T')[0];

        rentalDate.value =
            today;

    }


    if(
        returnDate &&
        !returnDate.value &&
        rentalDate
    ){

        returnDate.value =
            rentalDate.value;

    }


    calculateRentalTotal();


    /* =====================================================
       DROPDOWN Z-INDEX
    ===================================================== */

    document
        .querySelectorAll('.action-menu-btn')
        .forEach(function(button){

            button.addEventListener(
                'click',
                function(){

                    setTimeout(function(){

                        const menu =
                            button
                                .closest('.dropdown')
                                ?.querySelector('.dropdown-menu');

                        if(menu){

                            menu.style.zIndex =
                                '1080';

                        }

                    },50);

                }
            );

        });


    /* =====================================================
       AUTO HIDE ALERT
    ===================================================== */

    setTimeout(function(){

        document
            .querySelectorAll('.alert')
            .forEach(function(alert){

                alert.style.transition =
                    'opacity .4s ease';

                alert.style.opacity = '0';

                setTimeout(function(){

                    alert.remove();

                },400);

            });

    },5000);

});

</script>

@endsection