<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Rental Management System</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        rel="stylesheet"
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>
        :root {
            --sidebar: #111827;
            --sidebar-hover: #1f2937;
            --primary: #2563eb;
            --primary-light: #3b82f6;
            --background: #f5f7fb;
            --white: #ffffff;
            --text: #111827;
            --muted: #94a3b8;
            --border: #e5e7eb;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            width: 100%;
            min-height: 100%;
            overflow-x: hidden;
        }

        body {
            width: 100%;
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            background: var(--background);
            color: var(--text);
            overflow-x: hidden;
        }

        button,
        input,
        select,
        textarea {
            font-family: 'Inter', sans-serif;
        }

        img {
            max-width: 100%;
        }

        a {
            text-decoration: none;
        }

        /* SIDEBAR */

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 280px;
            height: 100vh;
            padding: 22px;
            background: var(--sidebar);
            display: flex;
            flex-direction: column;
            z-index: 1050;
            transition: all .3s ease;
        }

        /* LOGO */

        .logo {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 28px;
            flex-shrink: 0;
        }

        .logo-icon {
            width: 48px;
            height: 48px;
            min-width: 48px;
            border-radius: 14px;
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-size: 22px;
            box-shadow: 0 8px 20px rgba(37, 99, 235, .25);
        }

        .logo-text {
            min-width: 0;
        }

        .logo-text h4 {
            margin: 0;
            color: #ffffff;
            font-size: 18px;
            font-weight: 700;
        }

        .logo-text small {
            display: block;
            margin-top: 2px;
            color: #94a3b8;
            font-size: 12px;
        }

        /* ADMIN CARD */

        .admin-card {
            padding: 18px;
            margin-bottom: 26px;
            background: #1e293b;
            border: 1px solid rgba(255, 255, 255, .06);
            border-radius: 18px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, .08);
            flex-shrink: 0;
        }

        .admin-title {
            margin-bottom: 4px;
            color: #60a5fa;
            font-size: 13px;
            font-weight: 700;
        }

        .admin-name {
            color: #ffffff;
            font-size: 16px;
            font-weight: 600;
            overflow-wrap: anywhere;
        }

        .admin-role {
            margin-top: 2px;
            color: #94a3b8;
            font-size: 13px;
        }

        /* MENU TITLE */

        .menu-title {
            margin-bottom: 14px;
            color: #6b7280;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            flex-shrink: 0;
        }

        /* SIDEBAR MENU */

        .sidebar-menu {
            flex: 1;
            overflow-x: hidden;
            overflow-y: auto;
            padding-right: 3px;
        }

        .sidebar-menu::-webkit-scrollbar {
            width: 5px;
        }

        .sidebar-menu::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar-menu::-webkit-scrollbar-thumb {
            background: #374151;
            border-radius: 10px;
        }

        .menu {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 13px 16px;
            margin-bottom: 6px;
            color: #9ca3af;
            border-radius: 14px;
            font-size: 15px;
            font-weight: 500;
            transition: all .25s ease;
        }

        .menu i {
            width: 22px;
            min-width: 22px;
            text-align: center;
            font-size: 18px;
        }

        .menu:hover {
            color: #ffffff;
            background: var(--sidebar-hover);
            transform: translateX(4px);
        }

        .menu.active {
            color: #ffffff;
            background: linear-gradient(90deg, #2563eb, #3b82f6);
            box-shadow: 0 10px 25px rgba(37, 99, 235, .25);
        }

        /* SIDEBAR FOOTER */

        .sidebar-footer {
            padding-top: 18px;
            border-top: 1px solid rgba(255, 255, 255, .08);
            flex-shrink: 0;
        }

        .customer-mode {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 13px 15px;
            color: #9ca3af;
            border-radius: 14px;
            font-size: 14px;
            transition: all .25s ease;
        }

        .customer-mode:hover {
            color: #ffffff;
            background: #1f2937;
        }

        .customer-mode i {
            font-size: 18px;
        }

        .logout-btn {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 13px 15px;
            margin-top: 10px;
            color: #ef4444;
            background: transparent;
            border: none;
            border-radius: 14px;
            font-size: 14px;
            cursor: pointer;
            transition: all .25s ease;
        }

        .logout-btn:hover {
            color: #ffffff;
            background: #7f1d1d;
        }

        .logout-btn i {
            font-size: 18px;
        }

        /* MAIN */

        .main {
            width: calc(100% - 280px);
            min-height: 100vh;
            margin-left: 280px;
            padding: 22px;
            transition: all .3s ease;
        }

        /* TOPBAR */

        .topbar {
            min-height: 64px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            padding: 10px 18px;
            margin-bottom: 20px;
            background: #ffffff;
            border: 1px solid var(--border);
            border-radius: 18px;
            box-shadow: 0 5px 20px rgba(15, 23, 42, .04);
        }

        /* BREADCRUMB */

        .breadcrumb-bar {
            min-width: 0;
            display: flex;
            align-items: center;
            gap: 12px;
            flex: 1;
        }

        .breadcrumb-home {
            width: 40px;
            height: 40px;
            min-width: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #2563eb;
            background: #eff6ff;
            border-radius: 12px;
            font-size: 17px;
        }

        .breadcrumb-arrow {
            color: #cbd5e1;
            font-size: 14px;
            flex-shrink: 0;
        }

        .breadcrumb-current {
            min-width: 0;
            color: #334155;
            font-size: 14px;
            font-weight: 600;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* PROFILE */

        .profile {
            display: flex;
            align-items: center;
            gap: 14px;
            flex-shrink: 0;
        }

        .profile-info {
            min-width: 0;
            padding-left: 4px;
            text-align: right;
        }

        .profile-info h6 {
            max-width: 180px;
            margin: 0;
            color: #111827;
            font-size: 13px;
            font-weight: 700;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .profile-info small {
            display: block;
            max-width: 180px;
            margin-top: 3px;
            color: #94a3b8;
            font-size: 11px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .avatar {
            width: 44px;
            height: 44px;
            min-width: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            border-radius: 14px;
            font-size: 15px;
            font-weight: 700;
            box-shadow: 0 6px 15px rgba(37, 99, 235, .20);
        }

        /* CONTENT */

        .content-card {
            width: 100%;
            padding: 25px;
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, .05);
        }

        /* DASHBOARD */

        .dashboard-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 28px;
        }

        .dashboard-left {
            min-width: 0;
        }

        .dashboard-left h1 {
            margin-bottom: 4px;
            font-size: 26px;
            font-weight: 700;
        }

        .dashboard-left p {
            margin: 0;
            color: #6b7280;
        }

        .breadcrumb-dashboard {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 10px;
            color: #94a3b8;
            font-size: 14px;
        }

        .dashboard-right {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        /* BUTTON */

        .btn-month,
        .btn-download {
            padding: 11px 18px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 600;
        }

        .btn-month {
            color: #111827;
            background: #ffffff;
            border: 1px solid #e5e7eb;
        }

        .btn-download {
            color: #ffffff;
            background: #2563eb;
            border: none;
        }

        .btn-download:hover {
            background: #1d4ed8;
        }

        /* SUMMARY */

        .summary-card {
            height: 100%;
            min-height: 140px;
            padding: 16px;
            background: #ffffff;
            border: 1px solid #eef2f7;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, .06);
            transition: all .25s ease;
        }

        .summary-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 35px rgba(15, 23, 42, .10);
        }

        .summary-top {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        .summary-title {
            color: #94a3b8;
            font-size: 12px;
            font-weight: 700;
        }

        .summary-card h2 {
            margin: 5px 0;
            font-size: 26px;
        }

        .summary-card p {
            margin: 0;
            color: #94a3b8;
        }

        .summary-icon {
            width: 60px;
            height: 60px;
            min-width: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            border-radius: 18px;
            font-size: 26px;
        }

        .blue {
            background: #2563eb;
        }

        .green {
            background: #16a34a;
        }

        .orange {
            background: #f97316;
        }

        .purple {
            background: #7c3aed;
        }

        .cyan {
            background: #06b6d4;
        }

        .pink {
            background: #ec4899;
        }

        .summary-footer {
            padding-top: 15px;
            margin-top: 18px;
            border-top: 1px solid #eef2f7;
            font-size: 13px;
        }

        .success {
            color: #16a34a;
        }

        .danger {
            color: #dc2626;
        }

        /* DASHBOARD CARD */

        .dashboard-card {
            padding: 25px;
            background: #ffffff;
            border: 1px solid #eef2f7;
            border-radius: 22px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, .05);
        }

        .dashboard-card-title {
            font-size: 20px;
            font-weight: 700;
        }

        /* TABLE */

        .table {
            width: 100%;
        }

        .table thead th {
            padding: 16px;
            color: #64748b;
            background: #f8fafc;
            border: none;
            font-size: 13px;
        }

        .table tbody td {
            padding: 18px 16px;
            vertical-align: middle;
            border-top: 1px solid #f1f5f9;
        }

        .table tbody tr:hover {
            background: #f8fafc;
        }

        /* ACTIVITY */

        .activity-item {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .activity-icon {
            width: 42px;
            height: 42px;
            min-width: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            border-radius: 12px;
        }

        /* BADGE STATUS */

        .badge {
            padding: 8px 14px;
            border-radius: 30px;
        }

        /* MOBILE MENU BUTTON */

        .mobile-menu-btn {
            display: none;
            width: 42px;
            height: 42px;
            min-width: 42px;
            border: 0;
            border-radius: 12px;
            background: #eff6ff;
            color: #2563eb;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            cursor: pointer;
            transition: .2s ease;
        }

        .mobile-menu-btn:hover {
            background: #dbeafe;
        }

        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, .55);
            backdrop-filter: blur(2px);
            z-index: 1040;
        }

        .sidebar-overlay.show {
            display: block;
        }

        /* TABLET BESAR */

        @media (max-width: 1199px) {
            .sidebar {
                width: 260px;
                padding: 20px;
            }

            .main {
                width: calc(100% - 260px);
                margin-left: 260px;
                padding: 20px;
            }

            .menu {
                padding: 12px 14px;
                font-size: 14px;
            }

            .menu i {
                font-size: 17px;
            }

            .profile-info h6,
            .profile-info small {
                max-width: 150px;
            }
        }

        /* TABLET */

        @media (max-width: 991px) {
            .sidebar {
                width: 240px;
                padding: 20px;
                box-shadow: 12px 0 35px rgba(15, 23, 42, .10);
            }

            .main {
                width: calc(100% - 240px);
                margin-left: 240px;
                padding: 18px;
            }

            .content-card {
                padding: 22px;
            }

            .topbar {
                margin-bottom: 18px;
            }
        }

        /* HP / MOBILE */

        @media (max-width: 768px) {
            body {
                font-size: 14px;
            }

            /* Sidebar disembunyikan terlebih dahulu */
            .sidebar {
                position: fixed;
                top: 0;
                left: 0;
                width: min(300px, 84vw);
                height: 100vh;
                min-height: 100vh;
                padding: 18px;
                overflow-y: auto;
                transform: translateX(-105%);
                box-shadow: 12px 0 35px rgba(15, 23, 42, .22);
                z-index: 1050;
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .sidebar-menu {
                overflow: visible;
            }

            .sidebar-footer {
                margin-top: 15px;
            }

            .sidebar-overlay.show {
                display: block;
            }

            /* Tombol garis 3 hanya muncul di HP */
            .mobile-menu-btn {
                display: flex;
            }

            .main {
                width: 100%;
                margin-left: 0;
                padding: 12px;
            }

            .topbar {
                width: 100%;
                min-height: 60px;
                padding: 9px 10px;
                margin-bottom: 14px;
                border-radius: 15px;
                gap: 9px;
                position: relative;
                z-index: 1000;
            }

            .breadcrumb-bar {
                gap: 7px;
                min-width: 0;
            }

            .breadcrumb-home {
                width: 40px;
                height: 40px;
                min-width: 40px;
                border-radius: 11px;
            }

            .breadcrumb-current {
                max-width: 160px;
                font-size: 14px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .profile {
                gap: 7px;
                margin-left: auto;
            }

            .profile-info {
                display: none;
            }

            .avatar {
                width: 40px;
                height: 40px;
                min-width: 40px;
                border-radius: 11px;
                font-size: 14px;
            }

            .content-card {
                padding: 17px;
                border-radius: 16px;
            }

            .dashboard-header {
                align-items: flex-start;
                gap: 15px;
                margin-bottom: 20px;
            }

            .dashboard-left {
                width: 100%;
            }

            .dashboard-left h1 {
                font-size: 23px;
                line-height: 1.25;
            }

            .dashboard-left p {
                font-size: 13px;
                line-height: 1.5;
            }

            .breadcrumb-dashboard {
                margin-bottom: 8px;
                font-size: 12px;
            }

            .dashboard-right {
                width: 100%;
                gap: 8px;
            }

            .dashboard-right .btn-month,
            .dashboard-right .btn-download {
                flex: 1;
                padding: 10px 12px;
                font-size: 12px;
            }

            .summary-card {
                min-height: 130px;
                padding: 15px;
                border-radius: 15px;
            }

            .summary-icon {
                width: 50px;
                height: 50px;
                min-width: 50px;
                border-radius: 14px;
                font-size: 22px;
            }

            .summary-title {
                font-size: 11px;
            }

            .summary-card h2 {
                font-size: 22px;
            }

            .summary-card p {
                font-size: 11px;
            }

            .dashboard-card {
                padding: 18px;
                border-radius: 17px;
            }

            .dashboard-card-title {
                font-size: 17px;
            }

            .table-responsive {
                width: 100%;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }

            .table {
                min-width: 620px;
            }

            .table thead th {
                padding: 13px 12px;
                font-size: 11px;
                white-space: nowrap;
            }

            .table tbody td {
                padding: 14px 12px;
                font-size: 12px;
                white-space: nowrap;
            }

            .badge {
                padding: 6px 10px;
                font-size: 11px;
            }
        }

        /* HP KECIL */

        @media (max-width: 480px) {
            .sidebar {
                width: min(290px, 86vw);
                padding: 16px;
            }

            .main {
                padding: 9px;
            }

            .topbar {
                min-height: 56px;
                padding: 8px;
                margin-bottom: 11px;
                border-radius: 14px;
                gap: 7px;
            }

            .mobile-menu-btn {
                width: 40px;
                height: 40px;
                min-width: 40px;
                border-radius: 11px;
                font-size: 23px;
            }

            .breadcrumb-bar {
                gap: 5px;
            }

            .breadcrumb-home {
                display: none;
            }

            .breadcrumb-arrow {
                display: none;
            }

            .breadcrumb-current {
                max-width: 120px;
                font-size: 13px;
            }

            .avatar {
                width: 38px;
                height: 38px;
                min-width: 38px;
            }

            .content-card {
                padding: 14px;
                border-radius: 14px;
            }

            .dashboard-left h1 {
                font-size: 21px;
            }

            .dashboard-left p {
                font-size: 12px;
            }

            .breadcrumb-dashboard {
                font-size: 11px;
            }

            .dashboard-right {
                flex-direction: column;
            }

            .dashboard-right .btn-month,
            .dashboard-right .btn-download {
                width: 100%;
                min-height: 42px;
                flex: none;
                font-size: 12px;
            }

            .summary-card {
                min-height: 120px;
                padding: 13px;
            }

            .summary-icon {
                width: 45px;
                height: 45px;
                min-width: 45px;
                border-radius: 13px;
                font-size: 20px;
            }

            .summary-title {
                font-size: 10px;
            }

            .summary-card h2 {
                font-size: 20px;
            }

            .summary-card p {
                font-size: 10px;
            }

            .dashboard-card {
                padding: 15px;
                border-radius: 15px;
            }

            .dashboard-card-title {
                font-size: 16px;
            }
        }

        /* HP SANGAT KECIL */

        @media (max-width: 360px) {
            .sidebar {
                width: 88vw;
            }

            .main {
                padding: 7px;
            }

            .topbar {
                padding: 7px;
                gap: 5px;
            }

            .mobile-menu-btn {
                width: 38px;
                height: 38px;
                min-width: 38px;
            }

            .breadcrumb-current {
                max-width: 100px;
                font-size: 12px;
            }

            .avatar {
                width: 36px;
                height: 36px;
                min-width: 36px;
            }

            .content-card {
                padding: 12px;
            }
        }

        .container,
        .container-fluid {
            max-width: 100%;
        }

        .row {
            --bs-gutter-x: 1rem;
        }
    </style>
</head>

<body>

    <!-- MOBILE SIDEBAR OVERLAY -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- SIDEBAR -->

    <aside class="sidebar" id="sidebar">

        <div class="logo">
            <div class="logo-icon">
                <i class="bi bi-box-seam"></i>
            </div>

            <div class="logo-text">
                <h4>Rental</h4>
                <small>Management System</small>
            </div>
        </div>

        <div class="admin-card">
            <div class="admin-title">MODE ADMIN</div>

            <div class="admin-name">
                {{ auth()->user()->name ?? 'Administrator' }}
            </div>

            <div class="admin-role">
                Administrator
            </div>
        </div>

        <div class="menu-title">
            MENU UTAMA
        </div>

        <div class="sidebar-menu">

            <a
                href="{{ route('dashboard') }}"
                class="menu {{ request()->routeIs('dashboard') ? 'active' : '' }}"
            >
                <i class="bi bi-grid-1x2-fill"></i>
                <span>Dashboard</span>
            </a>

            <a
                href="{{ route('categories.index') }}"
                class="menu {{ request()->routeIs('categories.*') ? 'active' : '' }}"
            >
                <i class="bi bi-tags-fill"></i>
                <span>Kategori</span>
            </a>

            <a
                href="{{ route('products.index') }}"
                class="menu {{ request()->routeIs('products.*') ? 'active' : '' }}"
            >
                <i class="bi bi-box-seam-fill"></i>
                <span>Data Barang</span>
            </a>

            <a
                href="{{ route('customers.index') }}"
                class="menu {{ request()->routeIs('customers.*') ? 'active' : '' }}"
            >
                <i class="bi bi-people-fill"></i>
                <span>Data Pelanggan</span>
            </a>

            <a
                href="{{ route('rentals.index') }}"
                class="menu {{ request()->routeIs('rentals.*') ? 'active' : '' }}"
            >
                <i class="bi bi-calendar-check-fill"></i>
                <span>Transaksi Rental</span>
            </a>

            <a
                href="{{ route('payments.index') }}"
                class="menu {{ request()->routeIs('payments.*') ? 'active' : '' }}"
            >
                <i class="bi bi-credit-card-fill"></i>
                <span>Pembayaran</span>
            </a>

            <a
                href="{{ route('reports.index') }}"
                class="menu {{ request()->routeIs('reports.*') ? 'active' : '' }}"
            >
                <i class="bi bi-bar-chart-fill"></i>
                <span>Laporan</span>
            </a>

        </div>

        <div class="sidebar-footer">

            <a
                href="{{ route('admin.customer-mode.index') }}"
                class="customer-mode"
            >
                <i class="bi bi-person-circle"></i>
                <span>Lihat Mode Pelanggan</span>
            </a>

            <form
                method="POST"
                action="{{ route('logout') }}"
            >
                @csrf

                <button
                    type="submit"
                    class="logout-btn"
                >
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Logout</span>
                </button>
            </form>

        </div>

    </aside>

    <!-- MAIN -->

    <main class="main">

        <!-- TOPBAR -->

        <header class="topbar">

            <button type="button" class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Buka menu">
                <i class="bi bi-list"></i>
            </button>

            <div class="breadcrumb-bar">

                <div class="breadcrumb-home">
                    <i class="bi bi-house-fill"></i>
                </div>

                <i class="bi bi-chevron-right breadcrumb-arrow"></i>

                <div class="breadcrumb-current">

                    @if(request()->routeIs('dashboard'))
                        Dashboard
                    @elseif(request()->routeIs('categories.*'))
                        Kategori
                    @elseif(request()->routeIs('products.*'))
                        Data Barang
                    @elseif(request()->routeIs('customers.*'))
                        Data Pelanggan
                    @elseif(request()->routeIs('rentals.*'))
                        Transaksi Rental
                    @elseif(request()->routeIs('payments.*'))
                        Pembayaran
                    @elseif(request()->routeIs('reports.*'))
                        Laporan
                    @elseif(request()->routeIs('pengembalian.*'))
                        Pengembalian
                    @else
                        Dashboard
                    @endif

                </div>

            </div>

            <div class="profile">

                <div class="profile-info">
                    <h6>
                        {{ auth()->user()->name ?? 'Administrator' }}
                    </h6>

                    <small>
                        {{ auth()->user()->email ?? '-' }}
                    </small>
                </div>

                <div class="avatar">
                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                </div>

            </div>

        </header>

        @yield('content')

    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const menuButton = document.getElementById('mobileMenuBtn');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');

            if (!menuButton || !sidebar || !overlay) return;

            function openSidebar() {
                sidebar.classList.add('open');
                overlay.classList.add('show');
                menuButton.setAttribute('aria-label', 'Tutup menu');
                menuButton.innerHTML = '<i class="bi bi-x-lg"></i>';
                document.body.style.overflow = 'hidden';
            }

            function closeSidebar() {
                sidebar.classList.remove('open');
                overlay.classList.remove('show');
                menuButton.setAttribute('aria-label', 'Buka menu');
                menuButton.innerHTML = '<i class="bi bi-list"></i>';
                document.body.style.overflow = '';
            }

            menuButton.addEventListener('click', function () {
                if (sidebar.classList.contains('open')) {
                    closeSidebar();
                } else {
                    openSidebar();
                }
            });

            overlay.addEventListener('click', closeSidebar);

            sidebar.querySelectorAll('a').forEach(function (link) {
                link.addEventListener('click', function () {
                    if (window.innerWidth <= 768) {
                        closeSidebar();
                    }
                });
            });

            window.addEventListener('resize', function () {
                if (window.innerWidth > 768) {
                    closeSidebar();
                }
            });
        });
    </script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js">
    </script>

</body>
</html>