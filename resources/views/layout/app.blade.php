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

        /* =========================================================
           RESPONSIVE TABLET
        ========================================================= */

        @media (max-width: 991px) {

            .sidebar {
                width: 230px;
                padding: 18px;
            }

            .main {
                width: calc(100% - 230px);
                margin-left: 230px;
                padding: 18px;
            }

            .logo {
                gap: 10px;
                margin-bottom: 22px;
            }

            .logo-icon {
                width: 44px;
                height: 44px;
                min-width: 44px;
                font-size: 20px;
            }

            .logo-text h4 {
                font-size: 17px;
            }

            .logo-text small {
                font-size: 11px;
            }

            .admin-card {
                padding: 15px;
                margin-bottom: 20px;
            }

            .menu {
                padding: 11px 12px;
                gap: 11px;
                font-size: 13px;
            }

            .menu i {
                width: 20px;
                min-width: 20px;
                font-size: 16px;
            }

            .content-card {
                padding: 20px;
            }

            .topbar {
                padding: 9px 14px;
            }

            .profile-info h6,
            .profile-info small {
                max-width: 130px;
            }

            .summary-card {
                padding: 14px;
            }

            .summary-icon {
                width: 52px;
                height: 52px;
                min-width: 52px;
                font-size: 22px;
            }
        }


        /* =========================================================
           RESPONSIVE HP / MOBILE
        ========================================================= */

        @media (max-width: 767px) {

            html,
            body {
                width: 100%;
                max-width: 100%;
                overflow-x: hidden;
            }

            body {
                font-size: 14px;
            }

            .sidebar {
                position: relative;
                top: auto;
                left: auto;
                width: 100%;
                height: auto;
                min-height: auto;
                padding: 15px;
                border-radius: 0;
                overflow: visible;
            }

            .logo {
                margin-bottom: 18px;
            }

            .logo-icon {
                width: 42px;
                height: 42px;
                min-width: 42px;
                border-radius: 12px;
                font-size: 19px;
            }

            .logo-text h4 {
                font-size: 16px;
            }

            .logo-text small {
                font-size: 10px;
            }

            .admin-card {
                padding: 13px;
                margin-bottom: 17px;
                border-radius: 14px;
            }

            .admin-title {
                font-size: 11px;
            }

            .admin-name {
                font-size: 14px;
            }

            .admin-role {
                font-size: 11px;
            }

            .menu-title {
                margin-bottom: 9px;
                font-size: 9px;
            }

            .sidebar-menu {
                width: 100%;
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 7px;
                overflow: visible;
            }

            .menu {
                width: 100%;
                min-width: 0;
                margin-bottom: 0;
                padding: 10px 9px;
                gap: 8px;
                border-radius: 11px;
                font-size: 12px;
                white-space: nowrap;
                overflow: hidden;
            }

            .menu span {
                min-width: 0;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .menu i {
                width: 18px;
                min-width: 18px;
                font-size: 15px;
            }

            .menu:hover {
                transform: none;
            }

            .sidebar-footer {
                margin-top: 14px;
                padding-top: 12px;
            }

            .customer-mode,
            .logout-btn {
                padding: 10px 11px;
                border-radius: 11px;
                font-size: 12px;
            }

            .customer-mode i,
            .logout-btn i {
                font-size: 16px;
            }

            .main {
                width: 100%;
                margin-left: 0;
                padding: 10px;
            }

            .topbar {
                width: 100%;
                min-height: 56px;
                padding: 8px 10px;
                margin-bottom: 12px;
                border-radius: 13px;
                gap: 8px;
            }

            .breadcrumb-bar {
                min-width: 0;
                gap: 6px;
            }

            .breadcrumb-home {
                width: 38px;
                height: 38px;
                min-width: 38px;
                border-radius: 10px;
                font-size: 15px;
            }

            .breadcrumb-arrow {
                font-size: 11px;
            }

            .breadcrumb-current {
                min-width: 0;
                max-width: 130px;
                font-size: 12px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .profile {
                gap: 6px;
            }

            .profile-info {
                display: none;
            }

            .avatar {
                width: 38px;
                height: 38px;
                min-width: 38px;
                border-radius: 10px;
                font-size: 13px;
            }

            .content-card {
                width: 100%;
                padding: 14px;
                border-radius: 14px;
            }

            .dashboard-header {
                width: 100%;
                align-items: flex-start;
                gap: 13px;
                margin-bottom: 17px;
            }

            .dashboard-left {
                width: 100%;
                min-width: 0;
            }

            .dashboard-left h1 {
                font-size: 21px;
                line-height: 1.3;
                word-break: break-word;
            }

            .dashboard-left p {
                font-size: 12px;
                line-height: 1.5;
            }

            .breadcrumb-dashboard {
                margin-bottom: 7px;
                font-size: 11px;
            }

            .dashboard-right {
                width: 100%;
                display: flex;
                gap: 7px;
            }

            .dashboard-right .btn-month,
            .dashboard-right .btn-download {
                flex: 1;
                min-width: 0;
                padding: 9px 10px;
                font-size: 11px;
                border-radius: 10px;
                white-space: nowrap;
            }

            .summary-card {
                min-height: 115px;
                padding: 12px;
                border-radius: 13px;
            }

            .summary-top {
                gap: 7px;
            }

            .summary-title {
                font-size: 9px;
                line-height: 1.3;
            }

            .summary-card h2 {
                font-size: 19px;
                line-height: 1.2;
                word-break: break-word;
            }

            .summary-card p {
                font-size: 9px;
                line-height: 1.35;
            }

            .summary-icon {
                width: 42px;
                height: 42px;
                min-width: 42px;
                border-radius: 11px;
                font-size: 18px;
            }

            .summary-footer {
                padding-top: 10px;
                margin-top: 12px;
                font-size: 10px;
            }

            .dashboard-card {
                width: 100%;
                padding: 15px;
                border-radius: 15px;
                overflow: hidden;
            }

            .dashboard-card-title {
                font-size: 16px;
                line-height: 1.3;
            }

            .table-responsive {
                width: 100%;
                max-width: 100%;
                overflow-x: auto;
                overflow-y: hidden;
                -webkit-overflow-scrolling: touch;
                border-radius: 10px;
            }

            .table {
                min-width: 620px;
                margin-bottom: 0;
            }

            .table thead th {
                padding: 11px 10px;
                font-size: 10px;
                white-space: nowrap;
            }

            .table tbody td {
                padding: 12px 10px;
                font-size: 11px;
                white-space: nowrap;
            }

            .badge {
                padding: 5px 8px;
                font-size: 10px;
                white-space: nowrap;
            }

            .row {
                --bs-gutter-x: .75rem;
                --bs-gutter-y: .75rem;
            }

            img {
                max-width: 100%;
                height: auto;
            }
        }


        /* =========================================================
           HP KECIL
        ========================================================= */

        @media (max-width: 480px) {

            .sidebar {
                padding: 12px;
            }

            .logo {
                gap: 9px;
                margin-bottom: 15px;
            }

            .logo-icon {
                width: 40px;
                height: 40px;
                min-width: 40px;
                border-radius: 11px;
            }

            .logo-text h4 {
                font-size: 15px;
            }

            .logo-text small {
                font-size: 9px;
            }

            .admin-card {
                padding: 11px;
                border-radius: 12px;
            }

            .sidebar-menu {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 6px;
            }

            .menu {
                padding: 9px 8px;
                gap: 7px;
                font-size: 11px;
            }

            .menu i {
                width: 17px;
                min-width: 17px;
                font-size: 14px;
            }

            .main {
                padding: 8px;
            }

            .topbar {
                padding: 8px;
                border-radius: 12px;
            }

            .breadcrumb-home {
                width: 36px;
                height: 36px;
                min-width: 36px;
            }

            .breadcrumb-current {
                max-width: 105px;
                font-size: 11px;
            }

            .avatar {
                width: 36px;
                height: 36px;
                min-width: 36px;
            }

            .content-card {
                padding: 12px;
                border-radius: 13px;
            }

            .dashboard-left h1 {
                font-size: 19px;
            }

            .dashboard-left p {
                font-size: 11px;
            }

            .dashboard-right {
                flex-direction: column;
            }

            .dashboard-right .btn-month,
            .dashboard-right .btn-download {
                width: 100%;
                min-height: 40px;
                flex: none;
                font-size: 11px;
            }

            .summary-card {
                min-height: 108px;
                padding: 10px;
            }

            .summary-icon {
                width: 38px;
                height: 38px;
                min-width: 38px;
                font-size: 16px;
            }

            .summary-title {
                font-size: 8px;
            }

            .summary-card h2 {
                font-size: 17px;
            }

            .summary-card p {
                font-size: 8px;
            }

            .dashboard-card {
                padding: 13px;
                border-radius: 13px;
            }

            .dashboard-card-title {
                font-size: 15px;
            }
        }


        /* =========================================================
           HP SANGAT KECIL
        ========================================================= */

        @media (max-width: 360px) {

            .sidebar {
                padding: 10px;
            }

            .menu {
                padding: 8px 6px;
                font-size: 10px;
            }

            .menu i {
                width: 16px;
                min-width: 16px;
                font-size: 13px;
            }

            .main {
                padding: 6px;
            }

            .topbar {
                padding: 7px;
                gap: 4px;
            }

            .breadcrumb-current {
                max-width: 80px;
                font-size: 10px;
            }

            .avatar {
                width: 34px;
                height: 34px;
                min-width: 34px;
                font-size: 12px;
            }

            .content-card {
                padding: 10px;
            }

            .dashboard-left h1 {
                font-size: 18px;
            }

            .summary-card {
                padding: 9px;
            }

            .summary-icon {
                width: 34px;
                height: 34px;
                min-width: 34px;
                font-size: 14px;
            }

            .summary-card h2 {
                font-size: 16px;
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

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js">
    </script>

</body>
</html>