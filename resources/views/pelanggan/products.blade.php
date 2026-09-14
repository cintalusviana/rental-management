@extends('pelanggan.layout')

@section('title', 'Data Barang')
@section('page-title', 'Data Barang')

@section('content')

<style>

/* =========================================================
   MODERN PRODUCT PAGE
========================================================= */

@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

:root {
    --primary: #2563EB;
    --primary-dark: #1D4ED8;
    --primary-soft: #EFF6FF;

    --success: #16A34A;
    --success-soft: #DCFCE7;

    --warning: #D97706;
    --warning-soft: #FEF3C7;

    --danger: #DC2626;
    --danger-soft: #FEE2E2;

    --text: #0F172A;
    --text-secondary: #475569;
    --text-muted: #94A3B8;

    --border: #E2E8F0;
    --surface: #FFFFFF;
    --background: #F6F8FC;

    --shadow-sm: 0 4px 14px rgba(15, 23, 42, .04);
    --shadow-md: 0 10px 28px rgba(15, 23, 42, .07);
    --shadow-lg: 0 18px 45px rgba(15, 23, 42, .11);
}


/* =========================================================
   GLOBAL
========================================================= */

body {
    background: var(--background);
    color: var(--text);
    font-family: 'Inter', sans-serif;
}

.products-page {
    width: 100%;
    max-width: 100%;
    overflow: hidden;
}


/* =========================================================
   HEADER
========================================================= */

.products-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    margin-bottom: 22px;
}

.products-header-left {
    display: flex;
    align-items: center;
    gap: 13px;
    min-width: 0;
}

.products-header-icon {
    width: 50px;
    height: 50px;
    flex: 0 0 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 14px;
    background: linear-gradient(135deg, #2563EB, #3B82F6);
    color: #fff;
    font-size: 21px;
    box-shadow: 0 8px 20px rgba(37, 99, 235, .20);
}

.products-header-text {
    min-width: 0;
}

.products-header-text h2 {
    margin: 0 0 4px;
    color: var(--text);
    font-size: 27px;
    font-weight: 800;
    letter-spacing: -.5px;
    line-height: 1.2;
}

.products-header-text p {
    margin: 0;
    color: var(--text-secondary);
    font-size: 12px;
    line-height: 1.5;
}

.product-count {
    display: flex;
    align-items: center;
    gap: 7px;
    padding: 8px 13px;
    flex-shrink: 0;
    border: 1px solid var(--border);
    border-radius: 11px;
    background: #fff;
    color: var(--text-secondary);
    font-size: 11px;
    font-weight: 700;
    box-shadow: var(--shadow-sm);
}

.product-count i {
    color: var(--primary);
    font-size: 14px;
}


/* =========================================================
   SEARCH
========================================================= */

.products-toolbar {
    margin-bottom: 20px;
}

.search-wrapper {
    position: relative;
    width: 100%;
}

.search-wrapper .search-icon {
    position: absolute;
    top: 50%;
    left: 16px;
    z-index: 3;
    color: #94A3B8;
    font-size: 17px;
    pointer-events: none;
    transform: translateY(-50%);
}

.search-wrapper input {
    width: 100%;
    height: 50px;
    padding: 0 46px;
    border: 1px solid var(--border);
    border-radius: 13px;
    background: #fff;
    color: var(--text);
    font-family: 'Inter', sans-serif;
    font-size: 12px;
    box-shadow: var(--shadow-sm);
    transition: .2s ease;
}

.search-wrapper input::placeholder {
    color: #A0AEC0;
}

.search-wrapper input:focus {
    border-color: #93C5FD;
    outline: none;
    box-shadow:
        0 0 0 4px rgba(37, 99, 235, .07),
        var(--shadow-sm);
}

.search-clear {
    position: absolute;
    top: 50%;
    right: 11px;
    width: 29px;
    height: 29px;
    display: none;
    align-items: center;
    justify-content: center;
    border: 0;
    border-radius: 8px;
    background: #F1F5F9;
    color: #64748B;
    cursor: pointer;
    transform: translateY(-50%);
}


/* =========================================================
   CATEGORY
========================================================= */

.category-section {
    margin-bottom: 23px;
}

.category-heading {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 10px;
}

.category-heading-left {
    display: flex;
    align-items: center;
    gap: 7px;
    color: var(--text);
    font-size: 12px;
    font-weight: 700;
}

.category-heading-left i {
    color: var(--primary);
    font-size: 15px;
}

.category-list {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
}

.category-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    padding: 8px 13px;
    flex-shrink: 0;
    border: 1px solid var(--border);
    border-radius: 9px;
    background: #fff;
    color: #64748B;
    font-family: 'Inter', sans-serif;
    font-size: 11px;
    font-weight: 600;
    box-shadow: var(--shadow-sm);
    cursor: pointer;
    transition: .2s ease;
}

.category-btn i {
    font-size: 12px;
}

.category-btn:hover {
    border-color: #BFDBFE;
    background: #F8FBFF;
    color: var(--primary);
}

.category-btn.active {
    border-color: var(--primary);
    background: var(--primary);
    color: #fff;
    box-shadow: 0 6px 16px rgba(37, 99, 235, .18);
}


/* =========================================================
   PRODUCT GRID
========================================================= */

.product-grid {
    --bs-gutter-x: 16px;
    --bs-gutter-y: 16px;
}

.product-item {
    min-width: 0;
}


/* =========================================================
   PRODUCT CARD
========================================================= */

.product-card {
    height: 100%;
    overflow: hidden;
    border: 1px solid #E6EAF0;
    border-radius: 17px;
    background: #fff;
    box-shadow: var(--shadow-sm);
    cursor: pointer;
    transition:
        transform .25s ease,
        box-shadow .25s ease,
        border-color .25s ease;
}

.product-card:hover {
    border-color: #D7E3F7;
    box-shadow: var(--shadow-lg);
    transform: translateY(-3px);
}


/* =========================================================
   IMAGE
========================================================= */

.image-box {
    position: relative;
    width: 100%;
    height: 195px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    background: #F8FAFC;
    border-bottom: 1px solid #F1F5F9;
}

.product-image {
    display: block;
    width: 100%;
    height: 100%;
    padding: 8px;
    object-fit: contain;
    object-position: center;
    background: #fff;
    transition: transform .35s ease;
}

.product-card:hover .product-image {
    transform: scale(1.04);
}


/* =========================================================
   STATUS
========================================================= */

.status-badge {
    position: absolute;
    top: 11px;
    left: 11px;
    z-index: 5;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 5px 9px;
    border-radius: 8px;
    background: rgba(220, 252, 231, .96);
    color: #15803D;
    font-size: 9px;
    font-weight: 700;
    box-shadow: 0 5px 14px rgba(15, 23, 42, .07);
    backdrop-filter: blur(5px);
}

.status-badge.unavailable {
    background: rgba(254, 226, 226, .96);
    color: #B91C1C;
}


/* =========================================================
   FAVORITE
========================================================= */

.favorite {
    position: absolute;
    top: 10px;
    right: 10px;
    z-index: 8;
    width: 34px;
    height: 34px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid rgba(226, 232, 240, .8);
    border-radius: 50%;
    background: rgba(255, 255, 255, .96);
    color: #64748B;
    box-shadow: 0 5px 14px rgba(15, 23, 42, .09);
    cursor: pointer;
}

.favorite i {
    font-size: 15px;
}


/* =========================================================
   PRODUCT BODY
========================================================= */

.product-body {
    padding: 14px 15px 15px;
}

.category-text {
    display: flex;
    align-items: center;
    gap: 5px;
    margin-bottom: 4px;
    color: var(--primary);
    font-size: 9px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: .25px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.category-text i {
    flex-shrink: 0;
}

.product-title {
    margin: 0 0 3px;
    color: var(--text);
    font-size: 16px;
    font-weight: 800;
    line-height: 1.3;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;
    line-clamp: 2;
    overflow: hidden;
}

.rating {
    display: flex;
    align-items: center;
    gap: 2px;
    min-width: 0;
    color: #FBBF24;
    font-size: 11px;
}

.rating span {
    margin-left: 5px;
    color: #94A3B8;
    font-size: 9px;
    font-weight: 500;
    white-space: nowrap;
}

.product-desc {
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;
    line-clamp: 2;
    min-height: 29px;
    margin: 5px 0 8px;
    overflow: hidden;
    color: #64748B;
    font-size: 10px;
    line-height: 1.45;
}


/* =========================================================
   BOTTOM AREA
========================================================= */

.bottom-area {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 8px;
    padding-top: 8px;
    border-top: 1px solid #F1F5F9;
}

.bottom-area > div:first-child {
    min-width: 0;
}

.price-label {
    display: flex;
    align-items: center;
    gap: 4px;
    margin-bottom: 2px;
    color: #94A3B8;
    font-size: 8px;
    font-weight: 600;
}

.price {
    color: var(--primary);
    font-size: 16px;
    font-weight: 800;
    line-height: 1.2;
    white-space: nowrap;
}

.price-period {
    color: #94A3B8;
    font-size: 9px;
    font-weight: 500;
}

.stock-info {
    display: flex;
    align-items: center;
    gap: 5px;
    margin-top: 4px;
    color: #64748B;
    font-size: 9px;
    font-weight: 600;
    white-space: nowrap;
}

.stock-info strong {
    color: #334155;
}

.stock-info.stock-low,
.stock-info.stock-low i,
.stock-info.stock-low strong {
    color: var(--warning);
}

.stock-info.stock-empty,
.stock-info.stock-empty i,
.stock-info.stock-empty strong {
    color: var(--danger);
}


/* =========================================================
   RENT BUTTON
========================================================= */

.rent-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
    flex: 0 0 auto;
    padding: 8px 11px;
    border: 0;
    border-radius: 9px;
    background: linear-gradient(135deg, #2563EB, #1D4ED8);
    color: #fff;
    font-family: 'Inter', sans-serif;
    font-size: 10px;
    font-weight: 700;
    white-space: nowrap;
    box-shadow: 0 6px 15px rgba(37, 99, 235, .20);
    cursor: pointer;
}

.rent-btn.disabled-stock {
    background: #CBD5E1;
    color: #64748B;
    box-shadow: none;
}


/* =========================================================
   EMPTY
========================================================= */

.empty-products,
.no-result {
    padding: 50px 20px;
    border: 1px dashed #CBD5E1;
    border-radius: 17px;
    background: #fff;
    text-align: center;
}

.empty-icon,
.no-result-icon {
    width: 58px;
    height: 58px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    border-radius: 16px;
    background: var(--primary-soft);
    color: var(--primary);
    font-size: 24px;
}

.empty-products h5,
.no-result h5 {
    margin: 14px 0 5px;
    color: #334155;
    font-size: 16px;
    font-weight: 700;
}

.empty-products p,
.no-result p {
    margin: 0;
    color: #64748B;
    font-size: 11px;
}


/* =========================================================
   DETAIL MODAL
========================================================= */

.product-detail-dialog {
    width: calc(100% - 30px);
    max-width: 780px;
    margin: 1rem auto;
}

.product-modal .modal-content {
    width: 100%;
    overflow: hidden;
    border: 1px solid rgba(226, 232, 240, .9);
    border-radius: 20px;
    background: #fff;
    box-shadow:
        0 25px 70px rgba(15, 23, 42, .18),
        0 8px 25px rgba(15, 23, 42, .06);
}

.product-modal .modal-body {
    padding: 0;
}

.product-modal .detail-image-wrapper {
    min-height: 430px;
    height: 100%;
    padding: 15px;
    display: flex;
    flex-direction: column;
    background: linear-gradient(145deg, #F8FAFC 0%, #F1F5F9 100%);
}

.product-modal .detail-main-image {
    width: 100%;
    height: 315px;
    display: block;
    padding: 8px;
    object-fit: contain;
    object-position: center;
    border: 1px solid #E2E8F0;
    border-radius: 14px;
    background: #fff;
}

.product-modal .detail-thumbnails {
    display: flex;
    align-items: center;
    gap: 7px;
    margin-top: 9px;
    overflow-x: auto;
    scrollbar-width: none;
}

.product-modal .detail-thumbnails::-webkit-scrollbar {
    display: none;
}

.product-modal .detail-thumbnail {
    width: 48px;
    height: 48px;
    flex: 0 0 48px;
    padding: 3px;
    object-fit: contain;
    border: 1px solid #E2E8F0;
    border-radius: 9px;
    background: #fff;
    cursor: pointer;
}

.product-modal .detail-content {
    padding: 20px 21px 19px;
    background: #fff;
    min-width: 0;
}

.product-modal .detail-category {
    display: flex;
    align-items: center;
    gap: 5px;
    margin-bottom: 4px;
    color: var(--primary);
    font-size: 9px;
    font-weight: 800;
    text-transform: uppercase;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.product-modal .detail-title {
    max-width: 330px;
    margin: 0 0 4px;
    color: var(--text);
    font-size: 22px;
    font-weight: 800;
    line-height: 1.2;
    overflow-wrap: anywhere;
}

.product-modal .detail-rating {
    display: flex;
    align-items: center;
    gap: 2px;
    color: #FBBF24;
    font-size: 11px;
    flex-wrap: wrap;
}

.product-modal .detail-rating span {
    margin-left: 5px;
    color: #64748B;
    font-size: 9px;
}

.product-modal .btn-close {
    width: 31px;
    height: 31px;
    flex: 0 0 31px;
    padding: 0;
    border: 1px solid #E2E8F0;
    border-radius: 9px;
    background-color: #F8FAFC;
    opacity: 1;
}


/* =========================================================
   DETAIL PRICE
========================================================= */

.product-modal .detail-price-box {
    padding: 11px 13px;
    margin: 13px 0;
    border: 1px solid #DBEAFE;
    border-radius: 12px;
    background: linear-gradient(135deg, #F8FBFF, #EFF6FF);
}

.product-modal .detail-price-label {
    display: flex;
    align-items: center;
    gap: 5px;
    margin-bottom: 2px;
    color: #64748B;
    font-size: 8px;
    font-weight: 700;
}

.product-modal .detail-price {
    margin: 0;
    color: var(--primary);
    font-size: 23px;
    font-weight: 800;
    overflow-wrap: anywhere;
}


/* =========================================================
   DETAIL INFO
========================================================= */

.product-modal .detail-info {
    margin-bottom: 12px;
}

.product-modal .detail-info-row {
    min-height: 35px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    padding: 7px 0;
    border-bottom: 1px solid #F1F5F9;
}

.product-modal .detail-info-label {
    display: flex;
    align-items: center;
    gap: 6px;
    color: #64748B;
    font-size: 9px;
    min-width: 0;
}

.product-modal .detail-info-value {
    color: #1E293B;
    font-size: 9px;
    font-weight: 700;
    text-align: right;
    max-width: 55%;
    overflow-wrap: anywhere;
}

.product-modal .detail-info-row .badge {
    flex-shrink: 0;
    padding: 5px 9px !important;
    font-size: 8px;
}

.product-modal .stock-detail-badge {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    padding: 4px 8px;
    border-radius: 999px;
    font-size: 8px;
    font-weight: 700;
    white-space: nowrap;
}

.stock-detail-badge.available {
    background: var(--success-soft);
    color: #15803D;
}

.stock-detail-badge.low {
    background: var(--warning-soft);
    color: #B45309;
}

.stock-detail-badge.empty {
    background: var(--danger-soft);
    color: #B91C1C;
}


/* =========================================================
   DETAIL DESCRIPTION
========================================================= */

.product-modal .detail-description {
    padding: 10px 12px;
    margin-bottom: 11px;
    border: 1px solid #E5EAF1;
    border-radius: 11px;
    background: #F8FAFC;
}

.product-modal .detail-description h6 {
    display: flex;
    align-items: center;
    gap: 5px;
    margin: 0 0 4px;
    color: var(--text);
    font-size: 9px;
    font-weight: 700;
}

.product-modal .detail-description p {
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 3;
    line-clamp: 3;
    margin: 0;
    overflow: hidden;
    color: #64748B;
    font-size: 9px;
    line-height: 1.5;
}

.product-modal .detail-rent-btn {
    width: 100%;
    min-height: 39px;
    padding: 9px 14px;
    border: 0;
    border-radius: 9px;
    background: linear-gradient(135deg, #2563EB, #1D4ED8);
    color: #fff;
    font-family: 'Inter', sans-serif;
    font-size: 10px;
    font-weight: 700;
    box-shadow: 0 7px 18px rgba(37, 99, 235, .20);
}


/* =========================================================
   RENT MODAL
========================================================= */

.rent-modal .modal-dialog {
    width: calc(100% - 30px);
    max-width: 700px;
    margin: 1rem auto;
}

.rent-modal .modal-content {
    width: 100%;
    overflow: hidden;
    border: 1px solid rgba(226, 232, 240, .9);
    border-radius: 18px;
    background: #fff;
    box-shadow:
        0 25px 70px rgba(15, 23, 42, .18),
        0 8px 25px rgba(15, 23, 42, .06);
}

.rent-modal .modal-header {
    padding: 15px 19px 12px;
    border-bottom: 1px solid #F1F5F9 !important;
}

.rent-modal .modal-header h4 {
    display: flex;
    align-items: center;
    margin: 0;
    color: var(--text);
    font-size: 16px;
    font-weight: 800;
}

.rent-modal .modal-header h4 i {
    width: 33px;
    height: 33px;
    flex: 0 0 33px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    margin-right: 8px;
    border-radius: 9px;
    background: var(--primary-soft);
    color: var(--primary);
    font-size: 14px;
}

.rent-modal .modal-body {
    padding: 15px 19px 17px;
    min-width: 0;
}

.rent-modal .rent-summary {
    padding: 10px 12px;
    margin-bottom: 14px;
    border: 1px solid #E5EAF1;
    border-radius: 12px;
    background: #F8FAFC;
    overflow: hidden;
}

.rent-modal .rent-product-image {
    width: 65px;
    height: 65px;
    flex: 0 0 65px;
    object-fit: contain;
    border: 1px solid #E2E8F0;
    border-radius: 9px;
    background: #fff;
}

.rent-modal .rent-summary .ms-3 {
    min-width: 0;
}

.rent-modal .rent-product-name {
    margin-bottom: 2px;
    color: var(--text);
    font-size: 13px;
    font-weight: 800;
    overflow-wrap: anywhere;
}

.rent-modal .rent-product-price {
    color: var(--primary);
    font-size: 10px;
    font-weight: 700;
    overflow-wrap: anywhere;
}

.rent-modal .rent-product-price small {
    color: #64748B;
    font-size: 8px;
}

.rent-modal .rent-summary small.text-muted {
    display: block;
    font-size: 8px;
    overflow-wrap: anywhere;
}

.rent-modal .rent-stock-info {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    margin-top: 3px;
    font-size: 8px;
    font-weight: 700;
    max-width: 100%;
    overflow-wrap: anywhere;
}

.rent-modal .rent-stock-info.available {
    color: #15803D;
}

.rent-modal .rent-stock-info.low {
    color: #B45309;
}

.rent-modal .rent-stock-info.empty {
    color: #B91C1C;
}


/* =========================================================
   RENT FORM
========================================================= */

.rent-modal .rent-form-label {
    display: flex;
    align-items: center;
    gap: 6px;
    margin-bottom: 5px;
    color: #334155;
    font-size: 9px;
    font-weight: 700;
}

.rent-modal .rent-form-label i {
    color: var(--primary);
    font-size: 10px;
}

.rent-modal .rent-form-control {
    width: 100%;
    min-height: 38px;
    border: 1px solid #E2E8F0;
    border-radius: 8px;
    color: #0F172A;
    font-family: 'Inter', sans-serif;
    font-size: 10px;
    box-shadow: none;
}

.rent-modal .rent-form-control:focus {
    border-color: #93C5FD;
    box-shadow: 0 0 0 3px rgba(37, 99, 235, .07);
}

.rent-modal textarea.rent-form-control {
    min-height: 72px;
    padding-top: 8px;
    resize: vertical;
}


/* =========================================================
   TOTAL
========================================================= */

.rent-modal .rent-total-box {
    padding: 11px 13px;
    margin-top: 7px;
    border: 1px solid #DBEAFE;
    border-radius: 12px;
    background: linear-gradient(135deg, #F8FBFF, #EFF6FF);
}

.rent-modal .rent-total-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    margin-bottom: 6px;
    color: #64748B;
    font-size: 9px;
}

.rent-modal .rent-total-row span {
    min-width: 0;
}

.rent-modal .rent-total-row strong {
    color: #0F172A;
    font-size: 9px;
    text-align: right;
    white-space: nowrap;
}

.rent-modal .rent-total-divider {
    margin: 8px 0;
    border: 0;
    border-top: 1px solid #CFE0FA;
}

.rent-modal .rent-total-final {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
}

.rent-modal .rent-total-final h5 {
    display: flex;
    align-items: center;
    gap: 6px;
    margin: 0;
    color: #0F172A;
    font-size: 11px;
    font-weight: 750;
}

.rent-modal .rent-total-final h4 {
    margin: 0;
    color: var(--primary);
    font-size: 16px;
    font-weight: 800;
    white-space: nowrap;
}


/* =========================================================
   FOOTER
========================================================= */

.rent-modal .modal-footer {
    padding: 9px 19px 15px;
    border-top: 1px solid #F1F5F9 !important;
    gap: 8px;
}

.rent-modal .modal-footer .btn {
    min-height: 37px;
    border-radius: 8px !important;
    font-family: 'Inter', sans-serif;
    font-size: 10px;
    font-weight: 700;
}

.modal-backdrop.show {
    opacity: .62;
}


/* =========================================================
   DESKTOP
========================================================= */

@media (min-width: 992px) {

    .product-modal .col-lg-6:first-child {
        width: 45%;
    }

    .product-modal .col-lg-6:last-child {
        width: 55%;
    }
}


/* =========================================================
   TABLET
========================================================= */

@media (max-width: 991px) {

    .products-header-text h2 {
        font-size: 25px;
    }

    .product-detail-dialog {
        max-width: 680px;
    }

    .product-modal .detail-image-wrapper {
        min-height: auto;
    }

    .product-modal .detail-main-image {
        height: 280px;
    }

    .product-modal .detail-content {
        padding: 18px;
    }

    .product-modal .detail-title {
        font-size: 21px;
    }
}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 767px) {

    .products-page {
        width: 100%;
        max-width: 100%;
        overflow-x: hidden;
    }

    .products-header {
        gap: 10px;
        margin-bottom: 16px;
    }

    .products-header-left {
        gap: 9px;
    }

    .products-header-icon {
        width: 42px;
        height: 42px;
        flex-basis: 42px;
        border-radius: 11px;
        font-size: 18px;
    }

    .products-header-text h2 {
        font-size: 20px;
    }

    .products-header-text p {
        max-width: 250px;
        font-size: 9px;
        line-height: 1.4;
    }

    .product-count {
        display: none;
    }

    .products-toolbar {
        margin-bottom: 15px;
    }

    .search-wrapper input {
        height: 46px;
        padding-left: 42px;
        padding-right: 42px;
        border-radius: 11px;
        font-size: 11px;
    }

    .search-wrapper .search-icon {
        left: 14px;
        font-size: 15px;
    }

    .category-section {
        margin-bottom: 17px;
    }

    .category-heading {
        margin-bottom: 8px;
    }

    .category-heading-left {
        font-size: 11px;
    }

    .category-list {
        flex-wrap: nowrap;
        overflow-x: auto;
        gap: 6px;
        padding-bottom: 4px;
        scrollbar-width: none;
    }

    .category-list::-webkit-scrollbar {
        display: none;
    }

    .category-btn {
        padding: 7px 10px;
        border-radius: 8px;
        font-size: 9px;
    }

    .category-btn i {
        font-size: 10px;
    }

    .product-grid {
        --bs-gutter-x: 9px;
        --bs-gutter-y: 10px;
        margin-left: -4.5px;
        margin-right: -4.5px;
    }

    .product-item {
        width: 50%;
        padding-left: 4.5px;
        padding-right: 4.5px;
    }

    .product-card {
        border-radius: 13px;
    }

    .product-card:hover {
        transform: none;
        box-shadow: var(--shadow-sm);
    }

    .image-box {
        height: 135px;
    }

    .product-image {
        padding: 5px;
    }

    .status-badge {
        top: 7px;
        left: 7px;
        gap: 3px;
        padding: 4px 6px;
        border-radius: 6px;
        font-size: 7px;
    }

    .status-badge i {
        font-size: 7px;
    }

    .favorite {
        top: 7px;
        right: 7px;
        width: 27px;
        height: 27px;
    }

    .favorite i {
        font-size: 12px;
    }

    .product-body {
        padding: 10px;
    }

    .category-text {
        margin-bottom: 3px;
        font-size: 7px;
    }

    .category-text i {
        font-size: 7px;
    }

    .product-title {
        min-height: 34px;
        margin-bottom: 3px;
        font-size: 12px;
        line-height: 1.4;
    }

    .rating {
        font-size: 8px;
    }

    .rating span {
        margin-left: 3px;
        font-size: 6.5px;
    }

    .product-desc {
        min-height: 26px;
        margin: 4px 0 7px;
        font-size: 7.5px;
        line-height: 1.4;
    }

    .bottom-area {
        align-items: flex-end;
        gap: 5px;
        padding-top: 7px;
    }

    .price-label {
        gap: 3px;
        font-size: 6.5px;
    }

    .price-label i {
        font-size: 7px;
    }

    .price {
        font-size: 11px;
    }

    .price-period {
        font-size: 6.5px;
    }

    .stock-info {
        gap: 3px;
        margin-top: 3px;
        font-size: 6.5px;
    }

    .stock-info i {
        font-size: 7px;
    }

    .rent-btn {
        min-width: 48px;
        padding: 6px 7px;
        border-radius: 7px;
        font-size: 7.5px;
    }

    .rent-btn i {
        font-size: 8px;
    }

    .product-detail-dialog {
        width: calc(100% - 20px) !important;
        max-width: none !important;
        margin: 10px auto !important;
    }

    .product-modal .modal-content {
        max-height: calc(100vh - 20px);
        border-radius: 15px;
    }

    .product-modal .modal-body {
        max-height: calc(100vh - 20px);
        overflow-y: auto;
        overflow-x: hidden;
        scrollbar-width: thin;
    }

    .product-modal .detail-image-wrapper {
        min-height: auto;
        padding: 8px;
    }

    .product-modal .detail-main-image {
        width: 100%;
        height: 150px;
        padding: 5px;
        border-radius: 10px;
    }

    .product-modal .detail-thumbnails {
        gap: 5px;
        margin-top: 6px;
    }

    .product-modal .detail-thumbnail {
        width: 35px;
        height: 35px;
        flex-basis: 35px;
        border-radius: 7px;
    }

    .product-modal .detail-content {
        padding: 11px;
    }

    .product-modal .detail-category {
        margin-bottom: 2px;
        font-size: 7px;
    }

    .product-modal .detail-title {
        max-width: calc(100% - 35px);
        margin-bottom: 2px;
        font-size: 15px;
        line-height: 1.25;
    }

    .product-modal .detail-rating {
        font-size: 8px;
    }

    .product-modal .detail-rating span {
        margin-left: 3px;
        font-size: 7px;
    }

    .product-modal .btn-close {
        width: 27px;
        height: 27px;
        flex-basis: 27px;
    }

    .product-modal .detail-price-box {
        padding: 8px 10px;
        margin: 8px 0;
        border-radius: 9px;
    }

    .product-modal .detail-price-label {
        font-size: 7px;
    }

    .product-modal .detail-price {
        font-size: 17px;
    }

    .product-modal .detail-info {
        margin-bottom: 7px;
    }

    .product-modal .detail-info-row {
        min-height: 29px;
        gap: 7px;
        padding: 5px 0;
    }

    .product-modal .detail-info-label {
        gap: 4px;
        font-size: 7px;
    }

    .product-modal .detail-info-label i {
        font-size: 7px;
    }

    .product-modal .detail-info-value {
        max-width: 52%;
        font-size: 7px;
    }

    .product-modal .detail-info-row .badge {
        padding: 3px 6px !important;
        font-size: 6.5px;
    }

    .product-modal .stock-detail-badge {
        gap: 3px;
        padding: 3px 6px;
        font-size: 6.5px;
    }

    .product-modal .detail-description {
        padding: 7px 9px;
        margin-bottom: 7px;
        border-radius: 8px;
    }

    .product-modal .detail-description h6 {
        gap: 4px;
        margin-bottom: 3px;
        font-size: 7px;
    }

    .product-modal .detail-description p {
        -webkit-line-clamp: 3;
        line-clamp: 3;
        font-size: 7px;
        line-height: 1.4;
    }

    .product-modal .detail-rent-btn {
        min-height: 34px;
        padding: 7px 10px;
        border-radius: 7px;
        font-size: 8px;
    }

    .rent-modal .modal-dialog {
        width: calc(100% - 20px) !important;
        max-width: none !important;
        margin: 10px auto !important;
    }

    .rent-modal .modal-content {
        max-height: calc(100vh - 20px);
        border-radius: 14px;
    }

    .rent-modal .modal-header {
        padding: 10px 12px 9px;
    }

    .rent-modal .modal-header h4 {
        font-size: 12px;
    }

    .rent-modal .modal-header h4 i {
        width: 27px;
        height: 27px;
        flex-basis: 27px;
        margin-right: 6px;
        border-radius: 7px;
        font-size: 11px;
    }

    .rent-modal .modal-body {
        padding: 10px 12px 12px;
        max-height: calc(100vh - 125px);
        overflow-y: auto;
        overflow-x: hidden;
        scrollbar-width: thin;
    }

    .rent-modal .rent-summary {
        padding: 7px 8px;
        margin-bottom: 9px;
        border-radius: 9px;
    }

    .rent-modal .rent-product-image {
        width: 48px;
        height: 48px;
        flex-basis: 48px;
        border-radius: 7px;
    }

    .rent-modal .rent-summary .ms-3 {
        margin-left: 8px !important;
    }

    .rent-modal .rent-product-name {
        margin-bottom: 1px;
        font-size: 10px;
    }

    .rent-modal .rent-product-price {
        font-size: 8px;
    }

    .rent-modal .rent-product-price small {
        font-size: 6.5px;
    }

    .rent-modal .rent-summary small.text-muted {
        font-size: 6.5px;
    }

    .rent-modal .rent-stock-info {
        gap: 3px;
        margin-top: 2px;
        font-size: 6.5px;
    }

    .rent-modal .rent-form-label {
        gap: 4px;
        margin-bottom: 3px;
        font-size: 7.5px;
    }

    .rent-modal .rent-form-label i {
        font-size: 8px;
    }

    .rent-modal .rent-form-control {
        width: 100%;
        min-height: 32px;
        padding: 5px 8px;
        border-radius: 7px;
        font-size: 8px;
    }

    .rent-modal textarea.rent-form-control {
        min-height: 55px;
        padding-top: 6px;
    }

    .rent-modal .row {
        --bs-gutter-x: 8px;
        --bs-gutter-y: 0;
    }

    .rent-modal .row > [class*="mb-3"] {
        margin-bottom: 8px !important;
    }

    .rent-modal .text-muted {
        font-size: 6.5px !important;
    }

    .rent-modal .rent-total-box {
        padding: 8px 9px;
        margin-top: 2px;
        border-radius: 9px;
    }

    .rent-modal .rent-total-row {
        gap: 8px;
        margin-bottom: 4px;
        font-size: 7px;
    }

    .rent-modal .rent-total-row strong {
        font-size: 7px;
    }

    .rent-modal .rent-total-divider {
        margin: 5px 0;
    }

    .rent-modal .rent-total-final {
        gap: 8px;
    }

    .rent-modal .rent-total-final h5 {
        gap: 4px;
        font-size: 8px;
    }

    .rent-modal .rent-total-final h4 {
        font-size: 12px;
    }

    .rent-modal .modal-footer {
        padding: 7px 12px 9px;
        gap: 6px;
    }

    .rent-modal .modal-footer .btn {
        min-height: 31px;
        padding: 6px 10px !important;
        border-radius: 7px !important;
        font-size: 7.5px;
    }

    .rent-modal .modal-footer .btn i {
        font-size: 8px;
    }
}


/* =========================================================
   SMALL MOBILE
========================================================= */

@media (max-width: 480px) {

    .products-header {
        margin-bottom: 14px;
    }

    .products-header-icon {
        width: 38px;
        height: 38px;
        flex-basis: 38px;
        border-radius: 10px;
        font-size: 16px;
    }

    .products-header-text h2 {
        font-size: 18px;
    }

    .products-header-text p {
        max-width: 220px;
        font-size: 8px;
    }

    .search-wrapper input {
        height: 44px;
        font-size: 10px;
    }

    .category-btn {
        padding: 6px 9px;
        font-size: 8px;
    }

    .product-grid {
        --bs-gutter-x: 7px;
        --bs-gutter-y: 8px;
        margin-left: -3.5px;
        margin-right: -3.5px;
    }

    .product-item {
        width: 50%;
        padding-left: 3.5px;
        padding-right: 3.5px;
    }

    .product-card {
        border-radius: 11px;
    }

    .image-box {
        height: 120px;
    }

    .status-badge {
        top: 6px;
        left: 6px;
        padding: 3px 5px;
        font-size: 6px;
    }

    .favorite {
        top: 6px;
        right: 6px;
        width: 25px;
        height: 25px;
    }

    .favorite i {
        font-size: 11px;
    }

    .product-body {
        padding: 8px;
    }

    .category-text {
        font-size: 6.5px;
    }

    .product-title {
        min-height: 32px;
        font-size: 11px;
    }

    .rating {
        font-size: 7px;
    }

    .rating span {
        font-size: 6px;
    }

    .product-desc {
        min-height: 24px;
        font-size: 7px;
    }

    .bottom-area {
        gap: 3px;
    }

    .price-label {
        font-size: 6px;
    }

    .price {
        font-size: 10px;
    }

    .price-period {
        font-size: 6px;
    }

    .stock-info {
        font-size: 6px;
    }

    .rent-btn {
        min-width: 43px;
        padding: 5px 6px;
        font-size: 7px;
    }

    .rent-btn i {
        font-size: 7px;
    }

    .product-detail-dialog {
        width: calc(100% - 12px) !important;
        margin: 6px auto !important;
    }

    .product-modal .modal-content {
        max-height: calc(100vh - 12px);
        border-radius: 12px;
    }

    .product-modal .modal-body {
        max-height: calc(100vh - 12px);
    }

    .product-modal .detail-image-wrapper {
        padding: 6px;
    }

    .product-modal .detail-main-image {
        height: 125px;
    }

    .product-modal .detail-thumbnail {
        width: 31px;
        height: 31px;
        flex-basis: 31px;
    }

    .product-modal .detail-content {
        padding: 9px;
    }

    .product-modal .detail-title {
        font-size: 14px;
    }

    .product-modal .detail-price {
        font-size: 16px;
    }

    .product-modal .detail-info-row {
        min-height: 27px;
    }

    .product-modal .detail-description {
        padding: 6px 8px;
    }

    .product-modal .detail-rent-btn {
        min-height: 32px;
        font-size: 7.5px;
    }

    .rent-modal .modal-dialog {
        width: calc(100% - 12px) !important;
        margin: 6px auto !important;
    }

    .rent-modal .modal-content {
        max-height: calc(100vh - 12px);
    }

    .rent-modal .modal-body {
        max-height: calc(100vh - 105px);
        padding: 8px 9px 10px;
    }

    .rent-modal .modal-header {
        padding: 8px 9px 7px;
    }

    .rent-modal .modal-header h4 {
        font-size: 11px;
    }

    .rent-modal .modal-header h4 i {
        width: 24px;
        height: 24px;
        flex-basis: 24px;
        font-size: 10px;
    }

    .rent-modal .rent-summary {
        padding: 6px 7px;
        margin-bottom: 7px;
    }

    .rent-modal .rent-product-image {
        width: 42px;
        height: 42px;
        flex-basis: 42px;
    }

    .rent-modal .rent-summary .ms-3 {
        margin-left: 7px !important;
    }

    .rent-modal .rent-product-name {
        font-size: 9px;
    }

    .rent-modal .rent-product-price {
        font-size: 7px;
    }

    .rent-modal .rent-summary small.text-muted {
        font-size: 6px;
    }

    .rent-modal .rent-stock-info {
        font-size: 6px;
    }

    .rent-modal .rent-form-label {
        font-size: 7px;
    }

    .rent-modal .rent-form-control {
        min-height: 30px;
        font-size: 7.5px;
    }

    .rent-modal textarea.rent-form-control {
        min-height: 48px;
    }

    .rent-modal .row > [class*="mb-3"] {
        margin-bottom: 6px !important;
    }

    .rent-modal .rent-total-box {
        padding: 7px 8px;
    }

    .rent-modal .rent-total-row {
        font-size: 6.5px;
    }

    .rent-modal .rent-total-row strong {
        font-size: 6.5px;
    }

    .rent-modal .rent-total-final h5 {
        font-size: 7px;
    }

    .rent-modal .rent-total-final h4 {
        font-size: 11px;
    }

    .rent-modal .modal-footer {
        padding: 6px 9px 7px;
    }

    .rent-modal .modal-footer .btn {
        min-height: 29px;
        padding: 5px 8px !important;
        font-size: 7px;
    }
}


/* =========================================================
   VERY SMALL PHONE
========================================================= */

@media (max-width: 360px) {

    .product-grid {
        --bs-gutter-x: 6px;
        --bs-gutter-y: 7px;
        margin-left: -3px;
        margin-right: -3px;
    }

    .product-item {
        padding-left: 3px;
        padding-right: 3px;
    }

    .image-box {
        height: 108px;
    }

    .product-body {
        padding: 7px;
    }

    .product-title {
        font-size: 10px;
    }

    .product-desc {
        font-size: 6.5px;
    }

    .price {
        font-size: 9px;
    }

    .stock-info {
        font-size: 5.7px;
    }

    .rent-btn {
        min-width: 40px;
        padding: 5px;
        font-size: 6.5px;
    }

    .product-detail-dialog,
    .rent-modal .modal-dialog {
        width: calc(100% - 8px) !important;
        margin: 4px auto !important;
    }

    .product-modal .detail-main-image {
        height: 110px;
    }

    .product-modal .detail-title {
        font-size: 13px;
    }

    .product-modal .detail-price {
        font-size: 14px;
    }

    .product-modal .detail-info-label,
    .product-modal .detail-info-value {
        font-size: 6.5px;
    }

    .product-modal .detail-description p {
        font-size: 6.5px;
    }

    .rent-modal .modal-header h4 {
        font-size: 10px;
    }

    .rent-modal .rent-product-image {
        width: 38px;
        height: 38px;
        flex-basis: 38px;
    }

    .rent-modal .rent-product-name {
        font-size: 8px;
    }

    .rent-modal .rent-form-label {
        font-size: 6.5px;
    }

    .rent-modal .rent-form-control {
        min-height: 28px;
        font-size: 7px;
    }

    .rent-modal .rent-total-final h4 {
        font-size: 10px;
    }

    .rent-modal .modal-footer .btn {
        font-size: 6.5px;
    }
}

</style>

<div class="products-page">

{{-- =========================================================
HEADER
========================================================= --}}

<div class="products-header">

    <div class="products-header-left">

        <div class="products-header-icon">
            <i class="bi bi-box-seam-fill"></i>
        </div>

        <div class="products-header-text">

            <h2>Data Barang</h2>

            <p>
                Temukan perlengkapan rental yang sesuai dengan kebutuhan Anda.
            </p>

        </div>

    </div>

    <div class="product-count">

        <i class="bi bi-box-seam"></i>

        <span>
            {{ $products->count() }} Barang
        </span>

    </div>

</div>


{{-- =========================================================
SEARCH
========================================================= --}}

<div class="products-toolbar">

    <div class="search-wrapper">

        <i class="bi bi-search search-icon"></i>

        <input
            type="text"
            id="searchProduct"
            placeholder="Cari nama barang..."
            autocomplete="off">

        <button
            type="button"
            id="clearSearch"
            class="search-clear"
            aria-label="Hapus pencarian">

            <i class="bi bi-x-lg"></i>

        </button>

    </div>

</div>


{{-- =========================================================
CATEGORY
========================================================= --}}

<div class="category-section">

    <div class="category-heading">

        <div class="category-heading-left">

            <i class="bi bi-tags-fill"></i>

            <span>Pilih Kategori</span>

        </div>

    </div>

    <div class="category-list">

        <button
            type="button"
            class="category-btn active"
            data-category="all"
            aria-pressed="true">

            <i class="bi bi-grid-fill"></i>

            <span>Semua</span>

        </button>

        @foreach($categories as $category)

            <button
                type="button"
                class="category-btn"
                data-category="{{ $category->id }}"
                aria-pressed="false">

                <i class="bi bi-tag-fill"></i>

                <span>
                    {{ $category->name }}
                </span>

            </button>

        @endforeach

    </div>

</div>


{{-- =========================================================
PRODUCT GRID
========================================================= --}}

<div
    class="row product-grid"
    id="productGrid">

    @forelse($products as $product)

        <div
            class="col-xl-4 col-lg-6 col-md-6 product-item"
            data-name="{{ strtolower($product->name) }}"
            data-category="{{ $product->category_id }}">

            <div
                class="product-card"
                data-bs-toggle="modal"
                data-bs-target="#detailModal{{ $product->id }}">

                {{-- IMAGE --}}

                <div class="image-box">

                    @if($product->image)

                        <img
                            src="{{ asset('uploads/products/' . $product->image) }}"
                            class="product-image"
                            alt="{{ $product->name }}"
                            loading="lazy"
                            onerror="this.onerror=null;this.src='https://placehold.co/600x400?text=No+Image';">

                    @else

                        <img
                            src="https://placehold.co/600x400?text=No+Image"
                            class="product-image"
                            alt="No Image"
                            loading="lazy">

                    @endif


                    {{-- STATUS --}}

                    @if($product->stock > 0)

                        <span class="status-badge">

                            <i class="bi bi-check-circle-fill"></i>

                            Tersedia

                        </span>

                    @else

                        <span class="status-badge unavailable">

                            <i class="bi bi-x-circle-fill"></i>

                            Stok Habis

                        </span>

                    @endif


                    {{-- FAVORITE --}}

                    <button
                        type="button"
                        class="favorite"
                        aria-label="Tambahkan ke favorit">

                        <i class="bi bi-heart"></i>

                    </button>

                </div>


                {{-- BODY --}}

                <div class="product-body">

                    <div class="category-text">

                        <i class="bi bi-tag-fill"></i>

                        {{ $product->category->name ?? '-' }}

                    </div>

                    <div class="product-title">
                        {{ $product->name }}
                    </div>

                    <div class="rating">

                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>

                        <span>
                            4.9 (120 Ulasan)
                        </span>

                    </div>

                    <div class="product-desc">
                        {{ $product->description ?? 'Barang siap disewa.' }}
                    </div>

                    <div class="bottom-area">

                        <div>

                            <span class="price-label">

                                <i class="bi bi-wallet2"></i>

                                Harga sewa

                            </span>

                            <div class="price">

                                Rp
                                {{ number_format(
                                    $product->price_per_day,
                                    0,
                                    ',',
                                    '.'
                                ) }}

                                <span class="price-period">
                                    /hari
                                </span>

                            </div>


                            @if($product->stock > 0)

                                @if($product->stock <= 3)

                                    <div class="stock-info stock-low">

                                        <i class="bi bi-box-seam-fill"></i>

                                        <span>
                                            Sisa:
                                        </span>

                                        <strong>
                                            {{ $product->stock }} Unit
                                        </strong>

                                    </div>

                                @else

                                    <div class="stock-info">

                                        <i class="bi bi-box-seam-fill"></i>

                                        <span>
                                            Stok:
                                        </span>

                                        <strong>
                                            {{ $product->stock }} Unit
                                        </strong>

                                    </div>

                                @endif

                            @else

                                <div class="stock-info stock-empty">

                                    <i class="bi bi-x-circle-fill"></i>

                                    <strong>
                                        Stok habis
                                    </strong>

                                </div>

                            @endif

                        </div>


                        @if($product->stock > 0)

                            <button
                                type="button"
                                class="rent-btn"
                                onclick="event.stopPropagation();"
                                data-bs-toggle="modal"
                                data-bs-target="#rentModal{{ $product->id }}">

                                <i class="bi bi-cart-plus"></i>

                                Sewa

                            </button>

                        @else

                            <button
                                type="button"
                                class="rent-btn disabled-stock"
                                disabled
                                onclick="event.stopPropagation();">

                                <i class="bi bi-x-circle"></i>

                                Habis

                            </button>

                        @endif

                    </div>

                </div>

            </div>

        </div>

    @empty

        <div class="col-12">

            <div class="empty-products">

                <div class="empty-icon">
                    <i class="bi bi-box-seam"></i>
                </div>

                <h5>
                    Belum Ada Barang
                </h5>

                <p>
                    Belum ada barang yang tersedia untuk disewa.
                </p>

            </div>

        </div>

    @endforelse


    {{-- NO RESULT --}}

    <div
        class="col-12"
        id="noFilterResult"
        style="display: none;">

        <div class="no-result">

            <div class="no-result-icon">
                <i class="bi bi-search"></i>
            </div>

            <h5>
                Barang Tidak Ditemukan
            </h5>

            <p>
                Tidak ada barang yang sesuai dengan pencarian atau kategori yang dipilih.
            </p>

        </div>

    </div>

</div>


</div>

{{-- =========================================================
DETAIL MODAL
========================================================= --}}

@foreach($products as $product)

<div
    class="modal fade product-modal"
    id="detailModal{{ $product->id }}"
    tabindex="-1"
    aria-hidden="true">


<div
    class="modal-dialog product-detail-dialog modal-dialog-centered modal-dialog-scrollable">

    <div class="modal-content">

        <div class="modal-body">

            <div class="row g-0">

                {{-- IMAGE --}}

                <div class="col-lg-6">

                    <div class="detail-image-wrapper">

                        @if($product->image)

                            <img
                                src="{{ asset('uploads/products/' . $product->image) }}"
                                class="detail-main-image"
                                alt="{{ $product->name }}"
                                onerror="this.onerror=null;this.src='https://placehold.co/900x600?text=No+Image';">

                        @else

                            <img
                                src="https://placehold.co/900x600?text=No+Image"
                                class="detail-main-image"
                                alt="No Image">

                        @endif


                        <div class="detail-thumbnails">

                            @if($product->image)

                                @for($i = 0; $i < 4; $i++)

                                    <img
                                        src="{{ asset('uploads/products/' . $product->image) }}"
                                        class="detail-thumbnail"
                                        alt="{{ $product->name }}"
                                        onerror="this.onerror=null;this.src='https://placehold.co/120x120?text=No+Image';">

                                @endfor

                            @else

                                @for($i = 0; $i < 4; $i++)

                                    <img
                                        src="https://placehold.co/120x120?text=No+Image"
                                        class="detail-thumbnail"
                                        alt="No Image">

                                @endfor

                            @endif

                        </div>

                    </div>

                </div>


                {{-- CONTENT --}}

                <div class="col-lg-6">

                    <div class="detail-content">

                        <div class="d-flex justify-content-between align-items-start">

                            <div style="min-width:0;">

                                <div class="detail-category">

                                    <i class="bi bi-tag-fill"></i>

                                    {{ $product->category->name ?? '-' }}

                                </div>


                                <h3 class="detail-title">
                                    {{ $product->name }}
                                </h3>


                                <div class="detail-rating">

                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>

                                    <span>
                                        4.9 (120 Ulasan)
                                    </span>

                                </div>

                            </div>


                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close">
                            </button>

                        </div>


                        {{-- PRICE --}}

                        <div class="detail-price-box">

                            <span class="detail-price-label">

                                <i class="bi bi-wallet2"></i>

                                Harga Sewa Per Hari

                            </span>

                            <h2 class="detail-price">

                                Rp
                                {{ number_format(
                                    $product->price_per_day,
                                    0,
                                    ',',
                                    '.'
                                ) }}

                            </h2>

                        </div>


                        {{-- INFO --}}

                        <div class="detail-info">

                            <div class="detail-info-row">

                                <span class="detail-info-label">

                                    <i class="bi bi-circle-fill"></i>

                                    Status

                                </span>


                                @if($product->stock > 0)

                                    <span class="badge bg-success rounded-pill">

                                        <i class="bi bi-check-circle me-1"></i>

                                        Tersedia

                                    </span>

                                @else

                                    <span class="badge bg-danger rounded-pill">

                                        <i class="bi bi-x-circle me-1"></i>

                                        Stok Habis

                                    </span>

                                @endif

                            </div>


                            <div class="detail-info-row">

                                <span class="detail-info-label">

                                    <i class="bi bi-tags-fill"></i>

                                    Kategori

                                </span>

                                <span class="detail-info-value">

                                    {{ $product->category->name ?? '-' }}

                                </span>

                            </div>


                            <div class="detail-info-row">

                                <span class="detail-info-label">

                                    <i class="bi bi-box-seam-fill"></i>

                                    Stok Tersedia

                                </span>


                                @if($product->stock > 3)

                                    <span class="stock-detail-badge available">

                                        <i class="bi bi-box-seam"></i>

                                        {{ $product->stock }} Unit

                                    </span>

                                @elseif($product->stock > 0)

                                    <span class="stock-detail-badge low">

                                        <i class="bi bi-exclamation-triangle-fill"></i>

                                        {{ $product->stock }} Unit

                                    </span>

                                @else

                                    <span class="stock-detail-badge empty">

                                        <i class="bi bi-x-circle-fill"></i>

                                        Habis

                                    </span>

                                @endif

                            </div>


                            <div class="detail-info-row">

                                <span class="detail-info-label">

                                    <i class="bi bi-shield-check"></i>

                                    Kondisi

                                </span>

                                <span class="detail-info-value">
                                    Sangat Baik
                                </span>

                            </div>

                        </div>


                        {{-- DESCRIPTION --}}

                        <div class="detail-description">

                            <h6>

                                <i class="bi bi-info-circle-fill"></i>

                                Deskripsi Barang

                            </h6>

                            <p>
                                {{ $product->description ?? 'Belum ada deskripsi.' }}
                            </p>

                        </div>


                        {{-- RENT BUTTON --}}

                        <div class="d-grid">

                            @if($product->stock > 0)

                                <button
                                    type="button"
                                    class="detail-rent-btn"
                                    data-bs-dismiss="modal"
                                    data-bs-toggle="modal"
                                    data-bs-target="#rentModal{{ $product->id }}">

                                    <i class="bi bi-cart-plus me-2"></i>

                                    Sewa Sekarang

                                </button>

                            @else

                                <button
                                    type="button"
                                    class="detail-rent-btn"
                                    disabled>

                                    <i class="bi bi-x-circle me-2"></i>

                                    Stok Habis

                                </button>

                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


</div>

@endforeach

{{-- =========================================================
RENT MODAL
========================================================= --}}

@foreach($products as $product)

<div
    class="modal fade rent-modal"
    id="rentModal{{ $product->id }}"
    tabindex="-1"
    aria-hidden="true">


<div class="modal-dialog modal-dialog-centered">

    <div class="modal-content">

        <form
            action="{{ route('pelanggan.rentals.store') }}"
            method="POST">

            @csrf

            <input
                type="hidden"
                name="product_id"
                value="{{ $product->id }}">

            <input
                type="hidden"
                name="product_price"
                class="product-price"
                value="{{ $product->price_per_day }}">


            {{-- HEADER --}}

            <div class="modal-header">

                <h4>

                    <i class="bi bi-cart-plus"></i>

                    Form Penyewaan

                </h4>


                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close">
                </button>

            </div>


            {{-- BODY --}}

            <div class="modal-body">


                {{-- PRODUCT SUMMARY --}}

                <div class="rent-summary">

                    <div class="d-flex align-items-center">

                        @if($product->image)

                            <img
                                src="{{ asset('uploads/products/' . $product->image) }}"
                                class="rent-product-image"
                                alt="{{ $product->name }}"
                                onerror="this.onerror=null;this.src='https://placehold.co/90x90?text=No+Image';">

                        @else

                            <img
                                src="https://placehold.co/90x90?text=No+Image"
                                class="rent-product-image"
                                alt="No Image">

                        @endif


                        <div class="ms-3">

                            <div class="rent-product-name">
                                {{ $product->name }}
                            </div>


                            <div class="rent-product-price">

                                <i class="bi bi-wallet2 me-1"></i>

                                Rp
                                {{ number_format(
                                    $product->price_per_day,
                                    0,
                                    ',',
                                    '.'
                                ) }}

                                <small>
                                    /hari
                                </small>

                            </div>


                            <small class="text-muted">

                                <i class="bi bi-tag me-1"></i>

                                {{ $product->category->name ?? '-' }}

                            </small>


                            @if($product->stock > 3)

                                <div class="rent-stock-info available">

                                    <i class="bi bi-box-seam-fill"></i>

                                    Stok tersedia:
                                    {{ $product->stock }} Unit

                                </div>

                            @elseif($product->stock > 0)

                                <div class="rent-stock-info low">

                                    <i class="bi bi-exclamation-triangle-fill"></i>

                                    Stok tersisa:
                                    {{ $product->stock }} Unit

                                </div>

                            @else

                                <div class="rent-stock-info empty">

                                    <i class="bi bi-x-circle-fill"></i>

                                    Stok habis

                                </div>

                            @endif

                        </div>

                    </div>

                </div>


                {{-- FORM GRID --}}

                <div class="row">


                    {{-- TANGGAL SEWA --}}

                    <div class="col-md-6 mb-3">

                        <label class="rent-form-label">

                            <i class="bi bi-calendar-event"></i>

                            Tanggal Sewa

                        </label>

                        <input
                            type="date"
                            name="rental_date"
                            class="form-control rent-form-control"
                            required>

                    </div>


                    {{-- TANGGAL KEMBALI --}}

                    <div class="col-md-6 mb-3">

                        <label class="rent-form-label">

                            <i class="bi bi-calendar-check"></i>

                            Tanggal Kembali

                        </label>

                        <input
                            type="date"
                            name="return_date"
                            class="form-control rent-form-control"
                            required>

                    </div>


                    {{-- JUMLAH --}}

                    <div class="col-md-6 mb-3">

                        <label class="rent-form-label">

                            <i class="bi bi-box-seam"></i>

                            Jumlah

                        </label>

                        <input
                            type="number"
                            name="qty"
                            value="1"
                            min="1"
                            max="{{ $product->stock }}"
                            class="form-control rent-form-control qty-input"
                            data-stock="{{ $product->stock }}"
                            required>

                        <small class="text-muted d-block mt-1">

                            Maksimal
                            {{ $product->stock }}
                            unit.

                        </small>

                    </div>


                    {{-- PEMBAYARAN --}}

                    <div class="col-md-6 mb-3">

                        <label class="rent-form-label">

                            <i class="bi bi-credit-card-fill"></i>

                            Metode Pembayaran

                        </label>

                        <select
                            name="payment_method"
                            class="form-select rent-form-control">

                            <option value="Transfer Bank">
                                Transfer Bank
                            </option>

                            <option value="QRIS">
                                QRIS
                            </option>

                            <option value="E-Wallet">
                                E-Wallet
                            </option>

                            <option value="Tunai">
                                Tunai
                            </option>

                        </select>

                    </div>


                    {{-- CATATAN --}}

                    <div class="col-12">

                        <label class="rent-form-label">

                            <i class="bi bi-pencil-square"></i>

                            Catatan

                        </label>

                        <textarea
                            name="note"
                            rows="3"
                            class="form-control rent-form-control"
                            placeholder="Tambahkan catatan jika diperlukan..."></textarea>

                    </div>

                </div>


                {{-- TOTAL --}}

                <div class="rent-total-box">

                    <div class="rent-total-row">

                        <span>

                            <i class="bi bi-wallet2"></i>

                            Harga / Hari

                        </span>

                        <strong>

                            Rp
                            {{ number_format(
                                $product->price_per_day,
                                0,
                                ',',
                                '.'
                            ) }}

                        </strong>

                    </div>


                    <div class="rent-total-row">

                        <span>

                            <i class="bi bi-calendar3"></i>

                            Lama Sewa

                        </span>

                        <strong id="lama{{ $product->id }}">
                            0 Hari
                        </strong>

                    </div>


                    <div class="rent-total-row">

                        <span>

                            <i class="bi bi-box-seam"></i>

                            Jumlah Barang

                        </span>

                        <strong id="jumlah{{ $product->id }}">
                            1 Unit
                        </strong>

                    </div>


                    <hr class="rent-total-divider">


                    <div class="rent-total-final">

                        <h5>

                            <i class="bi bi-receipt"></i>

                            Estimasi Total

                        </h5>

                        <h4 id="total{{ $product->id }}">
                            Rp 0
                        </h4>

                    </div>

                </div>

            </div>


            {{-- FOOTER --}}

            <div class="modal-footer">

                <button
                    type="button"
                    class="btn btn-light px-4"
                    data-bs-dismiss="modal">

                    Batal

                </button>


                @if($product->stock > 0)

                    <button
                        type="submit"
                        class="btn btn-primary px-5">

                        <i class="bi bi-check-circle me-2"></i>

                        Konfirmasi Sewa

                    </button>

                @else

                    <button
                        type="button"
                        class="btn btn-secondary px-5"
                        disabled>

                        <i class="bi bi-x-circle me-2"></i>

                        Stok Habis

                    </button>

                @endif

            </div>

        </form>

    </div>

</div>


</div>

@endforeach

{{-- =========================================================
JAVASCRIPT
========================================================= --}}

<script>

document.addEventListener('DOMContentLoaded', function () {


    /* =====================================================
       FAVORITE
    ===================================================== */

    document.querySelectorAll('.favorite').forEach(function (button) {

        button.addEventListener('click', function (event) {

            event.preventDefault();
            event.stopPropagation();

            this.classList.toggle('text-danger');

            const icon = this.querySelector('i');

            if (!icon) {
                return;
            }

            icon.classList.toggle('bi-heart');
            icon.classList.toggle('bi-heart-fill');

        });

    });


    /* =====================================================
       SEARCH & FILTER
    ===================================================== */

    const searchInput =
        document.getElementById('searchProduct');

    const clearSearch =
        document.getElementById('clearSearch');

    const noFilterResult =
        document.getElementById('noFilterResult');

    const categoryButtons =
        document.querySelectorAll('.category-btn');

    const productItems =
        document.querySelectorAll('.product-item');

    let currentCategory = 'all';


    function filterProducts() {

        const keyword = searchInput
            ? searchInput.value.toLowerCase().trim()
            : '';

        let visibleCount = 0;


        productItems.forEach(function (item) {

            const name =
                (
                    item.getAttribute('data-name') || ''
                ).toLowerCase();

            const category =
                item.getAttribute('data-category') || '';


            const matchName =
                name.includes(keyword);

            const matchCategory =
                currentCategory === 'all' ||
                category === String(currentCategory);


            const visible =
                matchName &&
                matchCategory;


            if (visible) {

                item.style.display = '';

                visibleCount++;

            } else {

                item.style.display = 'none';

            }

        });


        if (clearSearch) {

            clearSearch.style.display =
                keyword.length > 0
                    ? 'flex'
                    : 'none';

        }


        if (noFilterResult) {

            if (
                visibleCount === 0 &&
                productItems.length > 0
            ) {

                noFilterResult.style.display = '';

            } else {

                noFilterResult.style.display = 'none';

            }

        }

    }


    if (searchInput) {

        searchInput.addEventListener(
            'input',
            filterProducts
        );

    }


    if (clearSearch) {

        clearSearch.addEventListener(
            'click',
            function () {

                if (!searchInput) {
                    return;
                }

                searchInput.value = '';

                searchInput.focus();

                filterProducts();

            }
        );

    }


    categoryButtons.forEach(function (button) {

        button.addEventListener(
            'click',
            function (event) {

                event.preventDefault();
                event.stopPropagation();


                categoryButtons.forEach(function (btn) {

                    btn.classList.remove('active');

                    btn.setAttribute(
                        'aria-pressed',
                        'false'
                    );

                });


                this.classList.add('active');

                this.setAttribute(
                    'aria-pressed',
                    'true'
                );


                currentCategory =
                    this.getAttribute(
                        'data-category'
                    ) || 'all';


                filterProducts();

            }
        );

    });


    /* =====================================================
       RENT CALCULATION
    ===================================================== */

    document
        .querySelectorAll('.rent-modal')
        .forEach(function (modal) {

            const id =
                modal.id.replace('rentModal', '');

            const start =
                modal.querySelector(
                    '[name="rental_date"]'
                );

            const end =
                modal.querySelector(
                    '[name="return_date"]'
                );

            const qty =
                modal.querySelector(
                    '[name="qty"]'
                );

            const priceInput =
                modal.querySelector(
                    '.product-price'
                );

            const total =
                document.getElementById(
                    'total' + id
                );

            const lama =
                document.getElementById(
                    'lama' + id
                );

            const jumlah =
                document.getElementById(
                    'jumlah' + id
                );


            if (
                !start ||
                !end ||
                !qty ||
                !priceInput ||
                !total ||
                !lama
            ) {
                return;
            }


            const harga =
                Number(priceInput.value) || 0;


            const stock =
                Number(
                    qty.getAttribute('max')
                ) || 0;


            function hitungTotal() {

                let jumlahValue =
                    Number(qty.value) || 1;


                if (jumlahValue < 1) {
                    jumlahValue = 1;
                }


                if (
                    stock > 0 &&
                    jumlahValue > stock
                ) {

                    jumlahValue = stock;

                    qty.value = stock;

                }


                if (jumlah) {

                    jumlah.textContent =
                        jumlahValue + ' Unit';

                }


                if (
                    !start.value ||
                    !end.value
                ) {

                    lama.textContent =
                        '0 Hari';

                    total.textContent =
                        'Rp 0';

                    return;

                }


                const mulai =
                    new Date(
                        start.value + 'T00:00:00'
                    );


                const selesai =
                    new Date(
                        end.value + 'T00:00:00'
                    );


                let hari =
                    Math.ceil(
                        (
                            selesai - mulai
                        ) /
                        (
                            1000 *
                            60 *
                            60 *
                            24
                        )
                    );


                if (hari < 1) {
                    hari = 1;
                }


                const totalHarga =
                    harga *
                    jumlahValue *
                    hari;


                lama.textContent =
                    hari + ' Hari';


                total.textContent =
                    'Rp ' +
                    totalHarga.toLocaleString(
                        'id-ID'
                    );

            }


            start.addEventListener(
                'change',
                hitungTotal
            );

            end.addEventListener(
                'change',
                hitungTotal
            );

            qty.addEventListener(
                'input',
                hitungTotal
            );

            qty.addEventListener(
                'change',
                hitungTotal
            );


            hitungTotal();

        });


    /* =====================================================
       TANGGAL SEWA
    ===================================================== */

    document
        .querySelectorAll('[name="rental_date"]')
        .forEach(function (startInput) {

            startInput.addEventListener(
                'change',
                function () {

                    const modal =
                        this.closest('.modal');


                    if (!modal) {
                        return;
                    }


                    const endInput =
                        modal.querySelector(
                            '[name="return_date"]'
                        );


                    if (!endInput) {
                        return;
                    }


                    endInput.min =
                        this.value;


                    if (
                        endInput.value &&
                        endInput.value < this.value
                    ) {

                        endInput.value = '';

                    }

                }
            );

        });


    /* =====================================================
       MINIMUM TANGGAL HARI INI
    ===================================================== */

    const now = new Date();

    const year =
        now.getFullYear();

    const month =
        String(
            now.getMonth() + 1
        ).padStart(2, '0');

    const day =
        String(
            now.getDate()
        ).padStart(2, '0');


    const today =
        `${year}-${month}-${day}`;


    document
        .querySelectorAll('[name="rental_date"]')
        .forEach(function (input) {

            input.min = today;

        });


    /* =====================================================
       THUMBNAIL
    ===================================================== */

    document
        .querySelectorAll('.product-modal')
        .forEach(function (modal) {

            const mainImage =
                modal.querySelector(
                    '.detail-main-image'
                );

            const thumbnails =
                modal.querySelectorAll(
                    '.detail-thumbnail'
                );


            if (!mainImage) {
                return;
            }


            thumbnails.forEach(function (thumbnail) {

                thumbnail.addEventListener(
                    'click',
                    function (event) {

                        event.preventDefault();
                        event.stopPropagation();


                        const newImage =
                            this.getAttribute('src');


                        if (
                            newImage &&
                            !newImage.includes('No+Image')
                        ) {

                            mainImage.setAttribute(
                                'src',
                                newImage
                            );

                        }

                    }
                );

            });

        });


    /* =====================================================
       MODAL
    ===================================================== */

    document
        .querySelectorAll('.product-modal')
        .forEach(function (modal) {

            modal.addEventListener(
                'show.bs.modal',
                function () {

                    document.body.classList.add(
                        'product-detail-open'
                    );

                }
            );


            modal.addEventListener(
                'hidden.bs.modal',
                function () {

                    document.body.classList.remove(
                        'product-detail-open'
                    );

                }
            );

        });


    /* =====================================================
       INITIAL FILTER
    ===================================================== */

    filterProducts();

});

</script>

@endsection
