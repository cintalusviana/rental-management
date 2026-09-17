<!DOCTYPE html>

<html lang="id">

<head>

```
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>
    @yield('title', 'Rental Management System')
</title>

<!-- Bootstrap -->
<link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
    rel="stylesheet">

<!-- Bootstrap Icons -->
<link
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    rel="stylesheet">

<!-- Font -->
<link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
    rel="stylesheet">
```

<style>

/* =========================================================
   ROOT
========================================================= */

:root {
    --sidebar: #111827;
    --sidebar-hover: #1F2937;

    --primary: #2563EB;
    --primary-light: #3B82F6;

    --background: #F5F7FB;
    --white: #FFFFFF;

    --text: #111827;
    --muted: #94A3B8;

    --border: #E5E7EB;
}


/* =========================================================
   GLOBAL
========================================================= */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html,
body {
    width: 100%;
    min-height: 100%;
}

body {
    font-family: 'Inter', sans-serif;
    background: var(--background);
    color: var(--text);
    overflow-x: hidden;
}

img {
    max-width: 100%;
    height: auto;
}

button,
input,
select,
textarea {
    font-family: inherit;
}

a {
    -webkit-tap-highlight-color: transparent;
}


/* =========================================================
   SIDEBAR
========================================================= */

.sidebar {
    position: fixed;
    top: 0;
    left: 0;

    width: 280px;
    height: 100vh;
    height: 100dvh;

    background: var(--sidebar);

    padding: 22px;

    display: flex;
    flex-direction: column;

    z-index: 1050;

    transition: transform .28s ease;

    overflow: hidden;
}


/* =========================================================
   LOGO
========================================================= */

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

    background: linear-gradient(
        135deg,
        #3B82F6,
        #2563EB
    );

    display: flex;
    justify-content: center;
    align-items: center;

    color: white;
    font-size: 22px;

    box-shadow:
        0 8px 20px rgba(37,99,235,.25);
}

.logo-text {
    min-width: 0;
}

.logo-text h4 {
    margin: 0;

    color: white;

    font-size: 18px;
    font-weight: 700;
}

.logo-text small {
    display: block;

    margin-top: 2px;

    color: #94A3B8;

    font-size: 12px;

    white-space: nowrap;
}


/* =========================================================
   CUSTOMER CARD
========================================================= */

.customer-card {
    background: #1E293B;

    border-radius: 18px;

    padding: 18px;

    margin-bottom: 26px;

    border: 1px solid rgba(255,255,255,.06);

    box-shadow:
        0 8px 20px rgba(0,0,0,.08);

    flex-shrink: 0;
}

.customer-title {
    color: #60A5FA;

    font-size: 12px;
    font-weight: 700;

    margin-bottom: 5px;

    letter-spacing: .4px;
}

.customer-name {
    color: white;

    font-size: 16px;
    font-weight: 600;

    white-space: nowrap;

    overflow: hidden;

    text-overflow: ellipsis;
}

.customer-role {
    color: #94A3B8;

    font-size: 13px;

    margin-top: 3px;
}


/* =========================================================
   MENU TITLE
========================================================= */

.menu-title {
    color: #6B7280;

    font-size: 11px;

    letter-spacing: 1px;

    text-transform: uppercase;

    margin-bottom: 14px;

    flex-shrink: 0;
}


/* =========================================================
   SIDEBAR MENU
========================================================= */

.sidebar-menu {
    flex: 1;

    min-height: 0;

    overflow-y: auto;
    overflow-x: hidden;

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


/* =========================================================
   MENU
========================================================= */

.menu {
    display: flex;
    align-items: center;

    gap: 14px;

    padding: 13px 16px;

    margin-bottom: 7px;

    border-radius: 14px;

    color: #9CA3AF;

    text-decoration: none;

    font-size: 15px;
    font-weight: 500;

    transition: all .25s ease;

    min-height: 48px;
}

.menu i {
    width: 22px;
    min-width: 22px;

    text-align: center;

    font-size: 18px;
}

.menu span {
    min-width: 0;
}

.menu:hover {
    background: var(--sidebar-hover);

    color: white;

    transform: translateX(4px);
}

.menu.active {
    background: linear-gradient(
        90deg,
        #2563EB,
        #3B82F6
    );

    color: white;

    box-shadow:
        0 10px 25px rgba(37,99,235,.25);
}


/* =========================================================
   SIDEBAR FOOTER
========================================================= */

.sidebar-footer {
    padding-top: 18px;

    margin-top: 10px;

    border-top:
        1px solid rgba(255,255,255,.08);

    flex-shrink: 0;
}


/* =========================================================
   KEMBALI KE ADMIN
========================================================= */

.customer-mode {
    display: flex;
    align-items: center;

    gap: 12px;

    padding: 13px 15px;

    min-height: 46px;

    border-radius: 14px;

    color: #9CA3AF;

    text-decoration: none;

    transition: .25s;
}

.customer-mode:hover {
    background: #1F2937;
    color: white;
}

.customer-mode i {
    font-size: 18px;
    min-width: 18px;
}


/* =========================================================
   LOGOUT
========================================================= */

.logout-btn {
    width: 100%;

    display: flex;
    align-items: center;

    gap: 12px;

    padding: 13px 15px;

    min-height: 46px;

    margin-top: 10px;

    border: none;

    border-radius: 14px;

    background: transparent;

    color: #EF4444;

    cursor: pointer;

    transition: .25s;

    font-family: inherit;

    font-size: 15px;

    text-align: left;
}

.logout-btn:hover {
    background: #7F1D1D;
    color: white;
}

.logout-btn i {
    font-size: 18px;
    min-width: 18px;
}


/* =========================================================
   MOBILE MENU BUTTON
========================================================= */

.mobile-menu-btn {
    display: none;

    width: 42px;
    height: 42px;

    min-width: 42px;

    border: none;

    border-radius: 12px;

    background: #EFF6FF;

    color: #2563EB;

    align-items: center;
    justify-content: center;

    font-size: 23px;

    cursor: pointer;

    transition: .2s ease;

    flex-shrink: 0;
}

.mobile-menu-btn:hover {
    background: #DBEAFE;
}


/* =========================================================
   MOBILE SIDEBAR OVERLAY
========================================================= */

.sidebar-overlay {
    display: none;

    position: fixed;

    inset: 0;

    background: rgba(15,23,42,.55);

    backdrop-filter: blur(2px);

    z-index: 1040;
}

.sidebar-overlay.show {
    display: block;
}


/* =========================================================
   MAIN
========================================================= */

.main {
    margin-left: 280px;

    min-height: 100vh;
    min-height: 100dvh;

    padding: 22px;

    width: calc(100% - 280px);

    max-width: 100%;

    overflow-x: hidden;
}


/* =========================================================
   TOPBAR
========================================================= */

.topbar {
    min-height: 64px;

    background: #FFFFFF;

    border-radius: 18px;

    padding: 10px 18px;

    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 15px;

    margin-bottom: 20px;

    border: 1px solid #E5E7EB;

    box-shadow:
        0 5px 20px rgba(15,23,42,.04);

    width: 100%;
    max-width: 100%;
}


/* =========================================================
   BREADCRUMB
========================================================= */

.breadcrumb-bar {
    display: flex;
    align-items: center;

    gap: 12px;

    min-width: 0;

    overflow: hidden;

    flex: 1;
}


/* =========================================================
   HOME
========================================================= */

.breadcrumb-home {
    width: 40px;
    height: 40px;

    min-width: 40px;

    flex-shrink: 0;

    border-radius: 12px;

    background: #EFF6FF;

    color: #2563EB;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 17px;
}


/* =========================================================
   ARROW
========================================================= */

.breadcrumb-arrow {
    color: #CBD5E1;

    font-size: 14px;

    flex-shrink: 0;
}


/* =========================================================
   CURRENT PAGE
========================================================= */

.breadcrumb-current {
    font-size: 14px;

    font-weight: 600;

    color: #334155;

    white-space: nowrap;

    overflow: hidden;

    text-overflow: ellipsis;
}


/* =========================================================
   PROFILE
========================================================= */

.profile {
    display: flex;
    align-items: center;

    gap: 14px;

    flex-shrink: 0;
}


/* =========================================================
   NOTIFICATION
========================================================= */

.notification-btn {
    position: relative;

    width: 42px;
    height: 42px;

    min-width: 42px;

    flex-shrink: 0;

    border: 1px solid #E5E7EB;

    background: #FFFFFF;

    border-radius: 13px;

    display: flex;
    align-items: center;
    justify-content: center;

    color: #64748B;

    font-size: 18px;

    transition: .2s;

    cursor: pointer;
}

.notification-btn:hover {
    background: #F8FAFC;

    color: #2563EB;

    border-color: #BFDBFE;

    transform: translateY(-1px);
}

.notification-badge {
    position: absolute;

    top: 3px;
    right: 3px;

    width: 16px;
    height: 16px;

    background: #EF4444;

    color: #FFFFFF;

    border-radius: 50%;

    font-size: 9px;

    font-weight: 700;

    display: flex;
    align-items: center;
    justify-content: center;

    border: 2px solid #FFFFFF;
}


/* =========================================================
   PROFILE INFO
========================================================= */

.profile-info {
    text-align: right;

    padding-left: 4px;

    min-width: 0;
}

.profile-info h6 {
    margin: 0;

    font-size: 13px;

    font-weight: 700;

    color: #111827;

    white-space: nowrap;

    overflow: hidden;

    text-overflow: ellipsis;

    max-width: 180px;
}

.profile-info small {
    display: block;

    margin-top: 3px;

    color: #94A3B8;

    font-size: 11px;

    white-space: nowrap;

    overflow: hidden;

    text-overflow: ellipsis;

    max-width: 180px;
}


/* =========================================================
   AVATAR
========================================================= */

.avatar {
    width: 44px;
    height: 44px;

    min-width: 44px;

    flex-shrink: 0;

    border-radius: 14px;

    background: linear-gradient(
        135deg,
        #2563EB,
        #3B82F6
    );

    display: flex;
    align-items: center;
    justify-content: center;

    color: #FFFFFF;

    font-size: 15px;

    font-weight: 700;

    box-shadow:
        0 6px 15px rgba(37,99,235,.20);
}


/* =========================================================
   CONTENT
========================================================= */

.content-card {
    background: white;

    border-radius: 20px;

    padding: 25px;

    width: 100%;

    max-width: 100%;

    box-shadow:
        0 10px 30px rgba(15,23,42,.05);

    overflow: hidden;
}


/* =========================================================
   DASHBOARD HEADER
========================================================= */

.dashboard-header {
    display: flex;

    justify-content: space-between;

    align-items: center;

    margin-bottom: 28px;

    flex-wrap: wrap;

    gap: 20px;
}

.dashboard-left {
    min-width: 0;
}

.dashboard-left h1 {
    font-size: 26px;

    font-weight: 700;

    margin-bottom: 4px;

    word-break: break-word;
}

.dashboard-left p {
    margin: 0;

    color: #6B7280;
}

.breadcrumb-dashboard {
    display: flex;
    align-items: center;

    gap: 8px;

    color: #94A3B8;

    font-size: 14px;

    margin-bottom: 10px;
}

.dashboard-right {
    display: flex;

    gap: 12px;

    flex-wrap: wrap;
}


/* =========================================================
   BUTTON
========================================================= */

.btn-month,
.btn-download {
    padding: 11px 18px;

    border-radius: 12px;

    font-size: 14px;

    font-weight: 600;

    white-space: nowrap;
}

.btn-month {
    background: white;

    border: 1px solid #E5E7EB;
}

.btn-download {
    background: #2563EB;

    color: white;

    border: none;
}

.btn-download:hover {
    background: #1D4ED8;
}


/* =========================================================
   SUMMARY CARD
========================================================= */

.summary-card {
    background: white;

    border-radius: 18px;

    padding: 16px;

    height: 100%;

    min-height: 140px;

    border: 1px solid #EEF2F7;

    box-shadow:
        0 10px 30px rgba(15,23,42,.06);

    transition: .25s;

    overflow: hidden;
}

.summary-card:hover {
    transform: translateY(-6px);

    box-shadow:
        0 15px 35px rgba(15,23,42,.10);
}

.summary-top {
    display: flex;

    justify-content: space-between;

    align-items: flex-start;

    gap: 10px;
}

.summary-title {
    font-size: 12px;

    color: #94A3B8;

    font-weight: 700;
}

.summary-card h2 {
    font-size: 26px;

    margin: 5px 0;

    word-break: break-word;
}

.summary-card p {
    margin: 0;

    color: #94A3B8;
}


/* =========================================================
   SUMMARY ICON
========================================================= */

.summary-icon {
    width: 60px;
    height: 60px;

    min-width: 60px;

    border-radius: 18px;

    display: flex;

    justify-content: center;

    align-items: center;

    color: white;

    font-size: 26px;
}

.blue {
    background: #2563EB;
}

.green {
    background: #16A34A;
}

.orange {
    background: #F97316;
}

.purple {
    background: #7C3AED;
}

.cyan {
    background: #06B6D4;
}

.pink {
    background: #EC4899;
}


/* =========================================================
   SUMMARY FOOTER
========================================================= */

.summary-footer {
    margin-top: 18px;

    padding-top: 15px;

    border-top: 1px solid #EEF2F7;

    font-size: 13px;
}


/* =========================================================
   TEXT STATUS
========================================================= */

.success {
    color: #16A34A;
}

.danger {
    color: #DC2626;
}


/* =========================================================
   DASHBOARD CARD
========================================================= */

.dashboard-card {
    background: white;

    border-radius: 22px;

    padding: 25px;

    border: 1px solid #EEF2F7;

    box-shadow:
        0 10px 30px rgba(15,23,42,.05);

    width: 100%;

    max-width: 100%;

    overflow: hidden;
}

.dashboard-card-title {
    font-size: 20px;

    font-weight: 700;

    word-break: break-word;
}


/* =========================================================
   TABLE WRAPPER
========================================================= */

.table-responsive {
    width: 100%;

    max-width: 100%;

    overflow-x: auto;

    -webkit-overflow-scrolling: touch;
}


/* =========================================================
   TABLE
========================================================= */

.table {
    min-width: 650px;
}

.table thead th {
    background: #F8FAFC;

    border: none;

    padding: 16px;

    font-size: 13px;

    color: #64748B;

    white-space: nowrap;
}

.table tbody td {
    padding: 18px 16px;

    vertical-align: middle;

    border-top: 1px solid #F1F5F9;
}

.table tbody tr:hover {
    background: #F8FAFC;
}


/* =========================================================
   ACTIVITY
========================================================= */

.activity-item {
    display: flex;

    align-items: center;

    gap: 14px;

    min-width: 0;
}

.activity-icon {
    width: 42px;
    height: 42px;

    min-width: 42px;

    border-radius: 12px;

    display: flex;

    align-items: center;
    justify-content: center;

    color: white;
}


/* =========================================================
   BADGE
========================================================= */

.badge {
    padding: 8px 14px;

    border-radius: 30px;

    white-space: nowrap;
}


/* =========================================================
   BOOTSTRAP ROW FIX
========================================================= */

.row {
    max-width: 100%;
}

[class*="col-"] {
    min-width: 0;
}


/* =========================================================
   TABLET BESAR
========================================================= */

@media (max-width: 1199px) {

    .sidebar {
        width: 260px;

        padding: 20px;
    }

    .main {
        margin-left: 260px;

        width: calc(100% - 260px);

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


/* =========================================================
   TABLET
========================================================= */

@media (max-width: 991px) {

    .sidebar {
        width: 240px;

        padding: 20px;

        box-shadow:
            10px 0 30px rgba(0,0,0,.10);
    }

    .main {
        margin-left: 240px;

        width: calc(100% - 240px);

        padding: 18px;
    }

    .content-card {
        padding: 22px;
    }

    .topbar {
        margin-bottom: 18px;
    }
}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 768px) {

    /* =====================================================
       SIDEBAR
    ===================================================== */

    .sidebar {
        width: min(285px, 82vw);

        height: 100vh;
        height: 100dvh;

        padding: 12px;

        transform: translateX(-105%);

        box-shadow:
            12px 0 35px rgba(15,23,42,.22);

        z-index: 1050;
    }

    .sidebar.open {
        transform: translateX(0);
    }


    /* =====================================================
       MOBILE MENU BUTTON
    ===================================================== */

    .mobile-menu-btn {
        display: flex;
    }


    /* =====================================================
       LOGO COMPACT
    ===================================================== */

    .logo {
        gap: 9px;

        margin-bottom: 10px;
    }

    .logo-icon {
        width: 38px;
        height: 38px;

        min-width: 38px;

        border-radius: 11px;

        font-size: 18px;
    }

    .logo-text h4 {
        font-size: 16px;
    }

    .logo-text small {
        font-size: 10px;
    }


    /* =====================================================
       CUSTOMER CARD COMPACT
    ===================================================== */

    .customer-card {
        padding: 10px 12px;

        margin-bottom: 10px;

        border-radius: 13px;
    }

    .customer-title {
        font-size: 10px;

        margin-bottom: 3px;
    }

    .customer-name {
        font-size: 14px;
    }

    .customer-role {
        font-size: 10px;
    }


    /* =====================================================
       MENU TITLE
    ===================================================== */

    .menu-title {
        margin-bottom: 5px;

        font-size: 9px;
    }


    /* =====================================================
       MENU COMPACT
    ===================================================== */

    .menu {
        gap: 9px;

        padding: 7px 9px;

        margin-bottom: 2px;

        border-radius: 9px;

        font-size: 12px;

        min-height: 32px;
    }

    .menu i {
        width: 18px;

        min-width: 18px;

        font-size: 14px;
    }


    /* =====================================================
       SIDEBAR FOOTER
    ===================================================== */

    .sidebar-footer {
        margin-top: 6px;

        padding-top: 8px;
    }

    .customer-mode,
    .logout-btn {
        gap: 8px;

        padding: 7px 9px;

        margin-top: 3px;

        min-height: 32px;

        border-radius: 9px;

        font-size: 11px;
    }

    .customer-mode i,
    .logout-btn i {
        font-size: 14px;
    }


    /* =====================================================
       MAIN FULL WIDTH
    ===================================================== */

    .main {
        width: 100%;

        margin-left: 0;

        padding: 12px;
    }


    /* =====================================================
       TOPBAR
    ===================================================== */

    .topbar {
        min-height: 60px;

        padding: 9px 12px;

        border-radius: 16px;

        margin-bottom: 16px;

        gap: 9px;
    }


    /* =====================================================
       BREADCRUMB
    ===================================================== */

    .breadcrumb-bar {
        gap: 9px;

        flex: 1;

        min-width: 0;
    }

    .breadcrumb-current {
        font-size: 13px;
    }


    /* =====================================================
       PROFILE
    ===================================================== */

    .profile {
        gap: 8px;
    }

    .profile-info {
        display: none;
    }


    /* =====================================================
       DASHBOARD
    ===================================================== */

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
    }

    .dashboard-left p {
        font-size: 13px;

        line-height: 1.5;
    }

    .dashboard-right {
        width: 100%;

        gap: 8px;
    }

    .dashboard-right > * {
        flex: 1;
    }


    /* =====================================================
       CONTENT
    ===================================================== */

    .content-card {
        padding: 18px;

        border-radius: 17px;
    }

    .dashboard-card {
        padding: 18px;

        border-radius: 18px;
    }

    .dashboard-card-title {
        font-size: 18px;
    }


    /* =====================================================
       SUMMARY
    ===================================================== */

    .summary-card {
        min-height: 130px;

        padding: 15px;
    }

    .summary-card h2 {
        font-size: 24px;
    }

    .summary-icon {
        width: 52px;
        height: 52px;

        min-width: 52px;

        border-radius: 15px;

        font-size: 22px;
    }
}


/* =========================================================
   HP KECIL
========================================================= */

@media (max-width: 480px) {

    .sidebar {
        width: min(285px, 84vw);

        padding: 11px;
    }


    /* LOGO */

    .logo {
        gap: 8px;

        margin-bottom: 8px;
    }

    .logo-icon {
        width: 36px;
        height: 36px;

        min-width: 36px;

        font-size: 17px;
    }

    .logo-text h4 {
        font-size: 15px;
    }

    .logo-text small {
        font-size: 9px;
    }


    /* CUSTOMER */

    .customer-card {
        padding: 8px 10px;

        margin-bottom: 8px;
    }


    /* MENU */

    .menu-title {
        margin-bottom: 4px;
    }

    .menu {
        padding: 6px 8px;

        min-height: 30px;

        font-size: 11px;
    }


    /* FOOTER */

    .sidebar-footer {
        padding-top: 6px;
    }


    /* MAIN */

    .main {
        padding: 10px;
    }


    /* TOPBAR */

    .topbar {
        padding: 8px 10px;

        border-radius: 14px;

        margin-bottom: 12px;

        gap: 8px;
    }


    /* HOME */

    .breadcrumb-home {
        width: 37px;
        height: 37px;

        min-width: 37px;

        border-radius: 10px;

        font-size: 15px;
    }

    .breadcrumb-arrow {
        font-size: 11px;
    }

    .breadcrumb-current {
        font-size: 12px;

        max-width: 100px;
    }


    /* NOTIFICATION */

    .notification-btn {
        width: 37px;
        height: 37px;

        min-width: 37px;

        border-radius: 10px;

        font-size: 16px;
    }


    /* AVATAR */

    .avatar {
        width: 37px;
        height: 37px;

        min-width: 37px;

        border-radius: 11px;

        font-size: 13px;
    }

    .notification-badge {
        width: 14px;
        height: 14px;

        font-size: 8px;

        top: 2px;
        right: 2px;
    }


    /* CONTENT */

    .content-card {
        padding: 14px;

        border-radius: 15px;
    }

    .dashboard-card {
        padding: 14px;

        border-radius: 16px;
    }

    .dashboard-card-title {
        font-size: 17px;
    }

    .dashboard-left h1 {
        font-size: 21px;

        line-height: 1.3;
    }

    .breadcrumb-dashboard {
        font-size: 12px;

        margin-bottom: 7px;
    }


    /* BUTTON */

    .dashboard-right {
        flex-direction: column;

        width: 100%;
    }

    .dashboard-right > * {
        width: 100%;

        flex: none;
    }


    /* SUMMARY */

    .summary-card {
        min-height: 120px;

        padding: 14px;

        border-radius: 15px;
    }

    .summary-card h2 {
        font-size: 22px;
    }

    .summary-title {
        font-size: 11px;
    }

    .summary-card p {
        font-size: 11px;
    }

    .summary-icon {
        width: 46px;
        height: 46px;

        min-width: 46px;

        border-radius: 13px;

        font-size: 20px;
    }

    .summary-footer {
        margin-top: 13px;

        padding-top: 12px;

        font-size: 11px;
    }
}


/* =========================================================
   HP SANGAT KECIL
========================================================= */

@media (max-width: 360px) {

    .sidebar {
        width: 84vw;

        padding: 10px;
    }

    .logo {
        margin-bottom: 6px;
    }

    .customer-card {
        padding: 7px 9px;

        margin-bottom: 6px;
    }

    .menu {
        padding: 5px 7px;

        min-height: 28px;

        font-size: 10.5px;
    }

    .menu i {
        font-size: 13px;
    }

    .customer-mode,
    .logout-btn {
        padding: 6px 7px;

        font-size: 10px;
    }

    .main {
        padding: 8px;
    }
}


/* =========================================================
   TOUCH DEVICE
========================================================= */

@media (hover: none) {

    .menu:hover {
        transform: none;
    }

    .summary-card:hover {
        transform: none;
    }
}


/* =========================================================
   REDUCE MOTION
========================================================= */

@media (prefers-reduced-motion: reduce) {

    * {
        scroll-behavior: auto !important;

        transition: none !important;

        animation: none !important;
    }
}

</style>

</head>

<body>

@php
$customerUser = auth()->user();
@endphp

<!-- =====================================================
     MOBILE SIDEBAR OVERLAY
===================================================== -->

<div
    class="sidebar-overlay"
    id="sidebarOverlay">
</div>

<!-- =====================================================
     SIDEBAR
===================================================== -->

<div
    class="sidebar"
    id="sidebar">

```
<!-- =================================================
     LOGO
================================================== -->

<div class="logo">

    <div class="logo-icon">

        <i class="bi bi-box-seam"></i>

    </div>

    <div class="logo-text">

        <h4>Rental</h4>

        <small>
            Management System
        </small>

    </div>

</div>


<!-- =================================================
     CUSTOMER CARD
================================================== -->

<div class="customer-card">

    <div class="customer-title">
        AREA PELANGGAN
    </div>

    <div class="customer-name">

        {{ $customerUser->name ?? 'Pelanggan' }}

    </div>

    <div class="customer-role">

        Pelanggan

    </div>

</div>


<!-- =================================================
     MENU TITLE
================================================== -->

<div class="menu-title">

    MENU UTAMA

</div>


<!-- =================================================
     SIDEBAR MENU
================================================== -->

<div class="sidebar-menu">


    <!-- DASHBOARD -->

    <a
        href="{{ route('pelanggan.dashboard') }}"
        class="menu {{ request()->routeIs('pelanggan.dashboard') ? 'active' : '' }}"
    >

        <i class="bi bi-grid-1x2-fill"></i>

        <span>
            Dashboard
        </span>

    </a>


    <!-- DATA BARANG -->

    <a
        href="{{ route('pelanggan.products') }}"
        class="menu {{ request()->routeIs('pelanggan.products*') ? 'active' : '' }}"
    >

        <i class="bi bi-box-seam-fill"></i>

        <span>
            Data Barang
        </span>

    </a>


    <!-- TRANSAKSI RENTAL -->

    <a
        href="{{ route('pelanggan.rentals') }}"
        class="menu {{ request()->routeIs('pelanggan.rentals*') ? 'active' : '' }}"
    >

        <i class="bi bi-calendar-check-fill"></i>

        <span>
            Transaksi Rental
        </span>

    </a>


    <!-- PROFILE -->

    <a
        href="{{ route('pelanggan.profile') }}"
        class="menu {{ request()->routeIs('pelanggan.profile*') ? 'active' : '' }}"
    >

        <i class="bi bi-person-fill"></i>

        <span>
            Profile
        </span>

    </a>


</div>


<!-- =================================================
     SIDEBAR FOOTER
================================================== -->

<div class="sidebar-footer">


    <!-- KEMBALI KE ADMIN -->

    @if(session('customer_mode'))

        <a
            href="{{ route('admin.customer-mode.exit') }}"
            class="customer-mode"
        >

            <i class="bi bi-arrow-left"></i>

            <span>
                Kembali ke Admin
            </span>

        </a>

    @endif


    <!-- LOGOUT -->

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

            <span>
                Logout
            </span>

        </button>

    </form>


</div>
```

</div>

<!-- =====================================================
     MAIN
===================================================== -->

<div class="main">

```
<!-- =================================================
     TOPBAR
================================================== -->

<div class="topbar">


    <!-- MOBILE MENU -->

    <button
        type="button"
        class="mobile-menu-btn"
        id="mobileMenuBtn"
        aria-label="Buka menu"
        aria-expanded="false"
    >

        <i class="bi bi-list"></i>

    </button>


    <!-- =================================================
         BREADCRUMB
    ================================================== -->

    <div class="breadcrumb-bar">


        <!-- HOME -->

        <div class="breadcrumb-home">

            <i class="bi bi-house-fill"></i>

        </div>


        <!-- ARROW -->

        <i class="bi bi-chevron-right breadcrumb-arrow"></i>


        <!-- CURRENT PAGE -->

        <div class="breadcrumb-current">

            @if(request()->routeIs('pelanggan.dashboard'))

                Dashboard

            @elseif(
                request()->routeIs('pelanggan.products.*') ||
                request()->routeIs('pelanggan.products')
            )

                Data Barang

            @elseif(
                request()->routeIs('pelanggan.rentals.*') ||
                request()->routeIs('pelanggan.rentals')
            )

                Transaksi Rental

            @elseif(
                request()->routeIs('pelanggan.profile.*') ||
                request()->routeIs('pelanggan.profile')
            )

                Profile

            @else

                Dashboard

            @endif

        </div>


    </div>


    <!-- =================================================
         PROFILE TOPBAR
    ================================================== -->

    <div class="profile">


        <!-- NOTIFICATION -->

        <button
            type="button"
            class="notification-btn"
            title="Notifikasi"
            aria-label="Notifikasi"
        >

            <i class="bi bi-bell"></i>

            <span class="notification-badge">
                0
            </span>

        </button>


        <!-- PROFILE INFO -->

        <div class="profile-info">

            <h6>

                {{ $customerUser->name ?? 'Pelanggan' }}

            </h6>

            <small>

                {{ $customerUser->email ?? '-' }}

            </small>

        </div>


        <!-- AVATAR -->

        <div class="avatar">

            {{ strtoupper(substr($customerUser->name ?? 'P', 0, 1)) }}

        </div>


    </div>


</div>


<!-- =================================================
     PAGE CONTENT
================================================== -->

@yield('content')
```

</div>

<!-- =====================================================
     MOBILE SIDEBAR SCRIPT
===================================================== -->

<script>

document.addEventListener('DOMContentLoaded', function () {

    const menuButton =
        document.getElementById('mobileMenuBtn');

    const sidebar =
        document.getElementById('sidebar');

    const overlay =
        document.getElementById('sidebarOverlay');


    if (!menuButton || !sidebar || !overlay) {
        return;
    }


    /* =====================================================
       BUKA SIDEBAR
    ===================================================== */

    function openSidebar() {

        sidebar.classList.add('open');

        overlay.classList.add('show');

        menuButton.setAttribute(
            'aria-label',
            'Tutup menu'
        );

        menuButton.setAttribute(
            'aria-expanded',
            'true'
        );

        menuButton.innerHTML =
            '<i class="bi bi-x-lg"></i>';

        document.body.style.overflow = 'hidden';
    }


    /* =====================================================
       TUTUP SIDEBAR
    ===================================================== */

    function closeSidebar() {

        sidebar.classList.remove('open');

        overlay.classList.remove('show');

        menuButton.setAttribute(
            'aria-label',
            'Buka menu'
        );

        menuButton.setAttribute(
            'aria-expanded',
            'false'
        );

        menuButton.innerHTML =
            '<i class="bi bi-list"></i>';

        document.body.style.overflow = '';
    }


    /* =====================================================
       TOMBOL MENU
    ===================================================== */

    menuButton.addEventListener(
        'click',
        function () {

            if (
                sidebar.classList.contains('open')
            ) {

                closeSidebar();

            } else {

                openSidebar();

            }

        }
    );


    /* =====================================================
       KLIK OVERLAY
    ===================================================== */

    overlay.addEventListener(
        'click',
        function () {

            closeSidebar();

        }
    );


    /* =====================================================
       KLIK MENU
    ===================================================== */

    sidebar
        .querySelectorAll('a')
        .forEach(function (link) {

            link.addEventListener(
                'click',
                function () {

                    if (
                        window.innerWidth <= 768
                    ) {

                        closeSidebar();

                    }

                }
            );

        });


    /* =====================================================
       RESIZE
    ===================================================== */

    window.addEventListener(
        'resize',
        function () {

            if (window.innerWidth > 768) {

                closeSidebar();

            }

        }
    );


    /* =====================================================
       ESCAPE
    ===================================================== */

    document.addEventListener(
        'keydown',
        function (event) {

            if (
                event.key === 'Escape' &&
                sidebar.classList.contains('open')
            ) {

                closeSidebar();

            }

        }
    );

});

</script>

<!-- =====================================================
     BOOTSTRAP JS
===================================================== -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js">
</script>

</body>

</html>
