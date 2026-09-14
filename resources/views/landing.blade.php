<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta
        name="description"
        content="RentalKu - Platform penyewaan barang yang mudah, cepat, dan praktis."
    >

    <title>RentalKu - Sewa Barang Lebih Mudah</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <style>
        /* =========================================================
           ROOT
        ========================================================= */
        :root{
            --bg:#050b16;
            --bg2:#071222;

            --primary:#2563eb;
            --blue:#3b82f6;
            --cyan:#22d3ee;
            --violet:#8b5cf6;
            --green:#22c55e;

            --white:#fff;
            --text:#f8fafc;
            --muted:#94a3b8;
            --muted2:#64748b;

            --border:rgba(255,255,255,.075);

            /*
             * SATU UKURAN UNTUK SELURUH HALAMAN
             */
            --container:1180px;
            --gutter:24px;
        }


        /* =========================================================
           RESET
        ========================================================= */
        *,
        *::before,
        *::after{
            box-sizing:border-box;
            margin:0;
            padding:0;
        }

        html{
            width:100%;
            scroll-behavior:smooth;
            overflow-x:hidden;
        }

        body{
            width:100%;
            min-width:0;
            margin:0;
            font-family:'Inter',sans-serif;
            color:var(--white);
            background:var(--bg);
            overflow-x:hidden;
        }

        a{
            color:inherit;
            text-decoration:none;
        }

        button,
        input{
            font-family:inherit;
        }

        img{
            display:block;
            max-width:100%;
        }


        /* =========================================================
           GLOBAL CONTAINER
        ========================================================= */
        .rk-container{
            width:min(var(--container),calc(100% - (var(--gutter) * 2)));
            margin-left:auto;
            margin-right:auto;
        }

        /*
         * Semua section langsung mengikuti container yang sama.
         */
        .rk-section-inner{
            width:100%;
        }


        /* =========================================================
           PAGE
        ========================================================= */
        .rk-page{
            position:relative;
            width:100%;
            min-height:100vh;
            overflow:hidden;

            background:
                radial-gradient(
                    circle at 8% 8%,
                    rgba(37,99,235,.14),
                    transparent 28%
                ),
                radial-gradient(
                    circle at 92% 16%,
                    rgba(139,92,246,.11),
                    transparent 27%
                ),
                linear-gradient(
                    180deg,
                    #050b16 0%,
                    #06101e 48%,
                    #050b16 100%
                );
        }


        /* =========================================================
           HEADER
        ========================================================= */
        .rk-header{
            position:fixed;
            inset:0 0 auto 0;
            z-index:9999;

            width:100%;
            height:76px;

            background:rgba(5,11,22,.64);
            border-bottom:1px solid transparent;

            backdrop-filter:blur(18px);
            -webkit-backdrop-filter:blur(18px);

            transition:.3s ease;
        }

        .rk-header.scrolled{
            background:rgba(5,11,22,.96);
            border-color:rgba(255,255,255,.07);
            box-shadow:0 10px 40px rgba(0,0,0,.25);
        }

        .rk-header-inner{
            height:76px;

            display:flex;
            align-items:center;
            justify-content:space-between;

            gap:20px;
            min-width:0;
        }


        /* =========================================================
           LOGO
        ========================================================= */
        .rk-logo{
            display:inline-flex;
            align-items:center;
            gap:10px;
            flex-shrink:0;
        }

        .rk-logo-icon{
            width:42px;
            height:42px;

            display:grid;
            place-items:center;

            flex-shrink:0;

            border-radius:13px;

            color:#fff;

            background:
                linear-gradient(
                    135deg,
                    #2563eb,
                    #06b6d4
                );

            box-shadow:
                0 8px 25px rgba(37,99,235,.3),
                inset 0 1px rgba(255,255,255,.3);

            font-size:19px;
        }

        .rk-logo-text{
            color:#fff;
            font-size:20px;
            font-weight:900;
            letter-spacing:-.8px;
        }

        .rk-logo-text span{
            color:#38bdf8;
        }


        /* =========================================================
           NAV
        ========================================================= */
        .rk-nav{
            display:flex;
            align-items:center;
            justify-content:center;

            gap:2px;

            min-width:0;
        }

        .rk-nav a{
            position:relative;

            padding:10px 12px;

            color:var(--muted);

            border-radius:10px;

            font-size:12px;
            font-weight:700;

            white-space:nowrap;

            transition:.25s ease;
        }

        .rk-nav a:hover,
        .rk-nav a.active{
            color:#fff;
            background:rgba(255,255,255,.045);
        }

        .rk-nav a.active::after{
            content:"";

            position:absolute;
            left:50%;
            bottom:3px;

            width:18px;
            height:2px;

            border-radius:99px;

            background:#38bdf8;

            transform:translateX(-50%);
        }


        /* =========================================================
           HEADER ACTIONS
        ========================================================= */
        .rk-header-actions{
            display:flex;
            align-items:center;
            gap:7px;
            flex-shrink:0;
        }

        .rk-login{
            padding:10px 13px;

            color:#cbd5e1;

            border-radius:10px;

            font-size:12px;
            font-weight:700;

            white-space:nowrap;

            transition:.25s;
        }

        .rk-login:hover{
            color:#fff;
            background:rgba(255,255,255,.05);
        }

        .rk-register,
        .rk-primary{
            display:inline-flex;
            align-items:center;
            justify-content:center;

            gap:8px;

            color:#fff;

            background:
                linear-gradient(
                    135deg,
                    #2563eb,
                    #3b82f6
                );

            box-shadow:0 12px 30px rgba(37,99,235,.25);

            transition:.3s ease;
        }

        .rk-register{
            padding:11px 16px;

            border-radius:11px;

            font-size:12px;
            font-weight:800;

            white-space:nowrap;
        }

        .rk-register:hover,
        .rk-primary:hover{
            color:#fff;
            transform:translateY(-3px);
            box-shadow:0 18px 38px rgba(37,99,235,.35);
        }

        .rk-menu{
            display:none;

            width:40px;
            height:40px;

            align-items:center;
            justify-content:center;

            flex-shrink:0;

            color:#fff;

            border:1px solid rgba(255,255,255,.08);
            border-radius:11px;

            background:rgba(255,255,255,.04);

            cursor:pointer;

            font-size:19px;
        }


        /* =========================================================
           HERO
        ========================================================= */
        .rk-hero{
            position:relative;

            min-height:850px;

            padding:
                76px 0 80px;

            display:flex;
            align-items:center;

            overflow:hidden;
        }

        .rk-hero::before,
        .rk-hero::after{
            content:"";

            position:absolute;

            border-radius:50%;

            filter:blur(100px);

            pointer-events:none;
        }

        .rk-hero::before{
            width:550px;
            height:550px;

            left:-300px;
            top:100px;

            background:rgba(37,99,235,.13);
        }

        .rk-hero::after{
            width:500px;
            height:500px;

            right:-260px;
            top:80px;

            background:rgba(139,92,246,.10);
        }

        .rk-hero-grid{
            position:relative;
            z-index:2;

            width:100%;

            display:grid;
            grid-template-columns:minmax(0,.88fr) minmax(0,1.12fr);

            align-items:center;

            gap:40px;

            min-width:0;
        }

        .rk-hero-copy{
            position:relative;
            z-index:5;
            min-width:0;
        }

        .rk-badge{
            display:inline-flex;
            align-items:center;

            gap:9px;

            margin-bottom:22px;
            padding:8px 13px;

            color:#7dd3fc;

            border:1px solid rgba(56,189,248,.18);
            border-radius:999px;

            background:rgba(56,189,248,.06);

            font-size:10px;
            font-weight:800;
        }

        .rk-badge-dot{
            width:7px;
            height:7px;

            flex-shrink:0;

            border-radius:50%;

            background:#22d3ee;

            box-shadow:
                0 0 0 5px rgba(34,211,238,.08),
                0 0 15px rgba(34,211,238,.7);

            animation:pulseDot 2s infinite;
        }

        @keyframes pulseDot{
            50%{
                opacity:.4;
                transform:scale(.8);
            }
        }

        .rk-hero-title{
            margin:0;

            color:#fff;

            font-size:clamp(45px,5.2vw,73px);

            line-height:1.02;

            letter-spacing:-4px;

            font-weight:900;
        }

        .rk-hero-title span{
            display:block;

            background:
                linear-gradient(
                    100deg,
                    #60a5fa,
                    #22d3ee,
                    #a78bfa
                );

            -webkit-background-clip:text;
            background-clip:text;

            color:transparent;
        }

        .rk-hero-desc{
            max-width:570px;

            margin-top:24px;

            color:var(--muted);

            font-size:14px;
            line-height:1.85;
        }

        .rk-hero-actions{
            display:flex;
            flex-wrap:wrap;

            gap:11px;

            margin-top:29px;
        }

        .rk-primary{
            padding:14px 20px;

            border-radius:12px;

            font-size:12px;
            font-weight:800;
        }

        .rk-secondary{
            display:inline-flex;
            align-items:center;
            justify-content:center;

            gap:8px;

            padding:14px 20px;

            color:#cbd5e1;

            border:1px solid rgba(255,255,255,.08);
            border-radius:12px;

            background:rgba(255,255,255,.035);

            font-size:12px;
            font-weight:800;

            transition:.3s;
        }

        .rk-secondary:hover{
            color:#fff;

            border-color:rgba(56,189,248,.2);

            background:rgba(56,189,248,.06);
        }

        .rk-trust-text{
            display:flex;
            flex-wrap:wrap;

            gap:17px;

            margin-top:26px;

            color:#64748b;

            font-size:9px;
            font-weight:700;
        }

        .rk-trust-text span{
            display:flex;
            align-items:center;
            gap:6px;
        }

        .rk-trust-text i{
            color:var(--green);
        }


        /* =========================================================
           HERO VISUAL
        ========================================================= */
        .rk-visual{
            position:relative;

            width:100%;
            min-width:0;
            min-height:570px;

            display:flex;
            align-items:center;
            justify-content:center;

            perspective:1300px;
        }

        .rk-glow{
            position:absolute;

            width:480px;
            height:480px;

            border-radius:50%;

            background:
                radial-gradient(
                    circle,
                    rgba(37,99,235,.22),
                    rgba(34,211,238,.07) 38%,
                    transparent 68%
                );

            filter:blur(15px);

            animation:glow 5s ease-in-out infinite;
        }

        @keyframes glow{
            0%,100%{
                transform:scale(.95);
                opacity:.75;
            }

            50%{
                transform:scale(1.08);
                opacity:1;
            }
        }

        .rk-dashboard-stage{
            position:relative;

            width:600px;
            height:480px;

            max-width:none;

            flex-shrink:0;

            transform-style:preserve-3d;

            transform:
                rotateX(8deg)
                rotateY(-12deg)
                rotateZ(-1deg);

            transition:transform .15s ease-out;
        }


        /* =========================================================
           RINGS
        ========================================================= */
        .rk-ring{
            position:absolute;

            left:50%;
            top:50%;

            border:1px solid rgba(56,189,248,.12);
            border-radius:50%;

            transform:
                translate(-50%,-50%)
                rotateX(70deg);
        }

        .rk-ring.one{
            width:570px;
            height:570px;

            animation:ringSpin 20s linear infinite;
        }

        .rk-ring.two{
            width:420px;
            height:420px;

            border-color:rgba(139,92,246,.1);

            animation:ringSpinReverse 16s linear infinite;
        }

        @keyframes ringSpin{
            from{
                transform:
                    translate(-50%,-50%)
                    rotateX(70deg)
                    rotateZ(0deg);
            }

            to{
                transform:
                    translate(-50%,-50%)
                    rotateX(70deg)
                    rotateZ(360deg);
            }
        }

        @keyframes ringSpinReverse{
            from{
                transform:
                    translate(-50%,-50%)
                    rotateX(70deg)
                    rotateZ(360deg);
            }

            to{
                transform:
                    translate(-50%,-50%)
                    rotateX(70deg)
                    rotateZ(0deg);
            }
        }


        /* =========================================================
           DOTS
        ========================================================= */
        .rk-dot{
            position:absolute;
            z-index:20;

            width:8px;
            height:8px;

            border-radius:50%;

            background:#38bdf8;

            box-shadow:
                0 0 0 5px rgba(56,189,248,.08),
                0 0 20px rgba(56,189,248,.8);
        }

        .rk-dot.a{
            left:80px;
            top:130px;
        }

        .rk-dot.b{
            right:78px;
            bottom:90px;

            background:#a78bfa;

            box-shadow:
                0 0 0 5px rgba(167,139,250,.08),
                0 0 20px rgba(167,139,250,.8);
        }

        .rk-dot.c{
            right:145px;
            top:42px;

            width:5px;
            height:5px;

            background:#22c55e;
        }


        /* =========================================================
           DASHBOARD
        ========================================================= */
        .rk-dashboard-depth,
        .rk-dashboard{
            position:absolute;

            left:50%;
            top:50%;

            width:500px;
            height:330px;

            border-radius:24px;
        }

        .rk-dashboard-depth{
            transform:
                translate(-50%,-50%)
                translate3d(-18px,24px,-15px);

            border:1px solid rgba(255,255,255,.05);

            background:
                linear-gradient(
                    145deg,
                    #10294a,
                    #071222
                );

            box-shadow:-20px 25px 45px rgba(0,0,0,.45);
        }

        .rk-dashboard{
            transform:
                translate(-50%,-50%)
                translateZ(30px);

            overflow:hidden;

            border:1px solid rgba(255,255,255,.12);

            background:
                linear-gradient(
                    145deg,
                    rgba(18,36,62,.98),
                    rgba(7,17,32,.98)
                );

            box-shadow:
                -30px 35px 70px rgba(0,0,0,.45),
                0 0 60px rgba(37,99,235,.12),
                inset 0 1px rgba(255,255,255,.08);

            transform-style:preserve-3d;
        }

        .rk-dashboard-top{
            height:57px;

            display:flex;
            align-items:center;
            justify-content:space-between;

            padding:0 19px;

            border-bottom:1px solid rgba(255,255,255,.07);

            background:rgba(255,255,255,.025);
        }

        .rk-dashboard-brand{
            display:flex;
            align-items:center;
            gap:9px;

            font-size:11px;
            font-weight:800;
        }

        .rk-dashboard-brand-icon{
            width:28px;
            height:28px;

            display:grid;
            place-items:center;

            border-radius:8px;

            background:
                linear-gradient(
                    135deg,
                    #2563eb,
                    #06b6d4
                );

            font-size:12px;
        }

        .rk-dashboard-user{
            display:flex;
            align-items:center;
            gap:8px;

            color:#94a3b8;

            font-size:8px;
        }

        .rk-user{
            width:24px;
            height:24px;

            display:grid;
            place-items:center;

            border-radius:50%;

            background:
                linear-gradient(
                    135deg,
                    #8b5cf6,
                    #3b82f6
                );

            color:#fff;
        }

        .rk-dashboard-body{
            height:273px;

            display:grid;

            grid-template-columns:145px minmax(0,1fr);
        }

        .rk-dash-sidebar{
            padding:17px 10px;

            border-right:1px solid rgba(255,255,255,.06);

            background:rgba(0,0,0,.08);
        }

        .rk-side-label{
            padding:0 9px;
            margin-bottom:9px;

            color:#475569;

            font-size:7px;
            font-weight:800;

            letter-spacing:1px;
            text-transform:uppercase;
        }

        .rk-side-item{
            display:flex;
            align-items:center;

            gap:8px;

            padding:9px;
            margin-bottom:3px;

            color:#64748b;

            border-radius:8px;

            font-size:8px;
            font-weight:700;
        }

        .rk-side-item.active{
            color:#93c5fd;

            background:
                linear-gradient(
                    90deg,
                    rgba(37,99,235,.18),
                    rgba(37,99,235,.03)
                );

            box-shadow:inset 2px 0 #3b82f6;
        }

        .rk-side-item i{
            font-size:10px;
        }

        .rk-dash-content{
            min-width:0;
            padding:17px;
        }

        .rk-dash-title{
            display:flex;
            align-items:center;
            justify-content:space-between;

            margin-bottom:13px;
        }

        .rk-dash-title h3{
            font-size:14px;
            font-weight:800;
        }

        .rk-dash-title span{
            color:#475569;
            font-size:7px;
        }

        .rk-stat-grid{
            display:grid;

            grid-template-columns:repeat(3,minmax(0,1fr));

            gap:8px;
        }

        .rk-stat{
            min-height:65px;

            padding:10px;

            overflow:hidden;

            border:1px solid rgba(255,255,255,.06);
            border-radius:11px;

            background:rgba(255,255,255,.035);
        }

        .rk-stat-icon{
            width:22px;
            height:22px;

            display:grid;
            place-items:center;

            margin-bottom:6px;

            border-radius:7px;

            color:#60a5fa;
            background:rgba(37,99,235,.14);

            font-size:10px;
        }

        .rk-stat:nth-child(2) .rk-stat-icon{
            color:#67e8f9;
            background:rgba(34,211,238,.1);
        }

        .rk-stat:nth-child(3) .rk-stat-icon{
            color:#c4b5fd;
            background:rgba(139,92,246,.12);
        }

        .rk-stat-label{
            color:#64748b;
            font-size:6.5px;
        }

        .rk-stat-value{
            margin-top:2px;

            color:#f8fafc;

            font-size:13px;
            font-weight:900;
        }

        .rk-dash-lower{
            display:grid;

            grid-template-columns:minmax(0,1.45fr) minmax(0,.8fr);

            gap:8px;

            margin-top:9px;
        }

        .rk-chart,
        .rk-recent{
            position:relative;

            height:105px;

            min-width:0;

            padding:10px;

            overflow:hidden;

            border:1px solid rgba(255,255,255,.06);
            border-radius:11px;

            background:rgba(255,255,255,.025);
        }

        .rk-chart-title,
        .rk-recent-title{
            color:#94a3b8;

            font-size:7px;
            font-weight:800;
        }

        .rk-chart svg{
            position:absolute;

            left:8px;
            right:8px;
            bottom:7px;

            width:calc(100% - 16px);
            height:65px;
        }

        .rk-chart-line{
            fill:none;

            stroke:#38bdf8;

            stroke-width:3;

            stroke-linecap:round;
            stroke-linejoin:round;

            filter:
                drop-shadow(
                    0 0 4px rgba(56,189,248,.5)
                );
        }

        .rk-chart-area{
            fill:#38bdf8;
            opacity:.08;
        }

        .rk-rental-row{
            display:flex;
            align-items:center;
            justify-content:space-between;

            gap:5px;

            padding:5px 0;

            border-bottom:1px solid rgba(255,255,255,.035);

            font-size:6px;
        }

        .rk-rental-name{
            display:flex;
            align-items:center;

            gap:5px;

            min-width:0;
        }

        .rk-rental-dot{
            width:5px;
            height:5px;

            flex-shrink:0;

            border-radius:50%;

            background:#22c55e;

            box-shadow:0 0 7px rgba(34,197,94,.6);
        }

        .rk-rental-price{
            color:#64748b;
        }


        /* =========================================================
           FLOATING
        ========================================================= */
        .rk-float{
            position:absolute;
            z-index:30;

            border:1px solid rgba(255,255,255,.1);
            border-radius:16px;

            background:
                linear-gradient(
                    145deg,
                    rgba(19,38,65,.96),
                    rgba(8,19,35,.97)
                );

            box-shadow:
                0 25px 45px rgba(0,0,0,.35),
                0 0 25px rgba(37,99,235,.08);

            backdrop-filter:blur(12px);

            animation:floatCard 5s ease-in-out infinite;
        }

        @keyframes floatCard{
            0%,100%{
                transform:translateY(0) translateZ(70px);
            }

            50%{
                transform:translateY(-13px) translateZ(90px);
            }
        }

        .rk-float-orders{
            left:0;
            top:55px;

            width:145px;

            padding:14px;
        }

        .rk-float-head{
            display:flex;
            align-items:center;
            justify-content:space-between;

            margin-bottom:10px;

            color:#94a3b8;

            font-size:8px;
            font-weight:800;
        }

        .rk-float-head i{
            color:#38bdf8;
        }

        .rk-order-big{
            font-size:23px;
            font-weight:900;
        }

        .rk-order-small{
            margin-top:3px;

            color:#22c55e;

            font-size:7px;
            font-weight:700;
        }

        .rk-float-status{
            right:-7px;
            top:115px;

            width:150px;

            padding:13px;

            border-radius:15px;

            animation-delay:-2s;
        }

        .rk-status-head{
            display:flex;
            align-items:center;

            gap:8px;

            margin-bottom:9px;
        }

        .rk-status-icon{
            width:27px;
            height:27px;

            display:grid;
            place-items:center;

            flex-shrink:0;

            border-radius:9px;

            color:#4ade80;
            background:rgba(34,197,94,.1);
        }

        .rk-status-title{
            font-size:8px;
            font-weight:800;
        }

        .rk-status-sub{
            margin-top:2px;

            color:#64748b;

            font-size:6px;
        }

        .rk-status-bar{
            height:4px;

            overflow:hidden;

            border-radius:99px;

            background:rgba(255,255,255,.07);
        }

        .rk-status-progress{
            width:78%;
            height:100%;

            border-radius:99px;

            background:
                linear-gradient(
                    90deg,
                    #22c55e,
                    #4ade80
                );
        }

        .rk-float-product{
            left:55px;
            bottom:16px;

            width:180px;

            display:flex;
            align-items:center;

            gap:10px;

            padding:12px;

            border-radius:15px;

            animation-delay:-3s;
        }

        .rk-product-icon{
            width:40px;
            height:40px;

            display:grid;
            place-items:center;

            flex-shrink:0;

            border-radius:11px;

            color:#60a5fa;

            background:
                linear-gradient(
                    135deg,
                    rgba(37,99,235,.25),
                    rgba(34,211,238,.08)
                );

            font-size:19px;
        }

        .rk-product-info{
            min-width:0;
        }

        .rk-product-info strong{
            display:block;

            color:#fff;

            font-size:9px;
            font-weight:800;

            overflow:hidden;
            text-overflow:ellipsis;
            white-space:nowrap;
        }

        .rk-product-info span{
            display:block;

            margin-top:3px;

            color:#64748b;

            font-size:6.5px;
        }


        /* =========================================================
           TRUST BAR
        ========================================================= */
        .rk-trust-bar{
            position:relative;
            z-index:10;

            margin-top:-35px;
        }

        .rk-trust-grid{
            display:grid;

            grid-template-columns:repeat(4,minmax(0,1fr));

            padding:20px 24px;

            border:1px solid rgba(255,255,255,.07);
            border-radius:18px;

            background:
                linear-gradient(
                    135deg,
                    rgba(255,255,255,.045),
                    rgba(255,255,255,.018)
                );

            backdrop-filter:blur(15px);

            box-shadow:0 20px 60px rgba(0,0,0,.2);
        }

        .rk-trust-item{
            min-width:0;

            display:flex;
            align-items:center;
            justify-content:center;

            gap:10px;

            padding:7px 15px;

            border-right:1px solid rgba(255,255,255,.06);
        }

        .rk-trust-item:last-child{
            border-right:0;
        }

        .rk-trust-icon{
            width:34px;
            height:34px;

            display:grid;
            place-items:center;

            flex-shrink:0;

            border-radius:10px;

            color:#60a5fa;
            background:rgba(37,99,235,.1);
        }

        .rk-trust-item strong{
            display:block;

            font-size:11px;
            font-weight:800;
        }

        .rk-trust-item small{
            display:block;

            margin-top:2px;

            color:#64748b;

            font-size:7px;
        }


        /* =========================================================
           SECTION GLOBAL
        ========================================================= */
        .rk-section{
            position:relative;

            width:100%;

            padding:105px 0;
        }

        .rk-section-head{
            width:100%;
            max-width:680px;

            margin:0 auto 45px;

            text-align:center;
        }

        .rk-label{
            display:inline-block;

            margin-bottom:11px;

            color:#38bdf8;

            font-size:9px;
            font-weight:900;

            letter-spacing:2px;
            text-transform:uppercase;
        }

        .rk-section-title{
            color:#fff;

            font-size:clamp(30px,4vw,44px);

            line-height:1.1;

            letter-spacing:-2px;

            font-weight:900;
        }

        .rk-section-desc{
            max-width:570px;

            margin:14px auto 0;

            color:#64748b;

            font-size:12px;
            line-height:1.8;
        }


        /* =========================================================
           CATEGORY
        ========================================================= */
        .rk-category-grid{
            display:grid;

            grid-template-columns:
                repeat(4,minmax(0,1fr));

            gap:15px;

            width:100%;
        }

        .rk-category{
            position:relative;

            min-width:0;
            min-height:150px;

            padding:22px;

            overflow:hidden;

            border:1px solid rgba(255,255,255,.07);
            border-radius:20px;

            background:
                linear-gradient(
                    145deg,
                    rgba(16,32,55,.75),
                    rgba(7,17,31,.75)
                );

            transition:.35s;
        }

        .rk-category:hover{
            transform:translateY(-7px);

            border-color:rgba(56,189,248,.2);

            box-shadow:0 20px 50px rgba(0,0,0,.25);
        }

        .rk-category-icon{
            width:43px;
            height:43px;

            display:grid;
            place-items:center;

            margin-bottom:16px;

            border-radius:13px;

            color:#60a5fa;

            background:
                linear-gradient(
                    135deg,
                    rgba(37,99,235,.2),
                    rgba(34,211,238,.08)
                );

            font-size:18px;
        }

        .rk-category h3{
            color:#fff;

            font-size:13px;
            font-weight:800;
        }

        .rk-category p{
            margin-top:6px;

            color:#64748b;

            font-size:8px;
        }


        /* =========================================================
           PRODUCTS
        ========================================================= */
        .rk-product-grid{
            display:grid;

            grid-template-columns:
                repeat(4,minmax(0,1fr));

            gap:15px;

            width:100%;
        }

        .rk-product-card{
            min-width:0;

            overflow:hidden;

            border:1px solid rgba(255,255,255,.07);
            border-radius:20px;

            background:
                linear-gradient(
                    145deg,
                    rgba(15,31,53,.9),
                    rgba(7,16,29,.9)
                );

            transition:.35s;
        }

        .rk-product-card:hover{
            transform:translateY(-7px);

            border-color:rgba(56,189,248,.2);

            box-shadow:0 25px 50px rgba(0,0,0,.25);
        }

        .rk-product-img{
            width:100%;
            height:190px;

            display:flex;
            align-items:center;
            justify-content:center;

            overflow:hidden;

            background:
                radial-gradient(
                    circle,
                    rgba(37,99,235,.15),
                    transparent 60%
                );
        }

        .rk-product-img img{
            width:100%;
            height:100%;

            padding:8px;

            object-fit:contain;
            object-position:center;

            transition:.5s;
        }

        .rk-product-card:hover img{
            transform:scale(1.03);
        }

        .rk-placeholder{
            width:100%;
            height:100%;

            display:grid;
            place-items:center;

            color:#3b82f6;

            font-size:40px;
        }

        .rk-product-content{
            min-width:0;

            padding:16px;
        }

        .rk-product-category{
            overflow:hidden;

            color:#38bdf8;

            font-size:7px;
            font-weight:800;

            letter-spacing:.7px;

            text-overflow:ellipsis;
            text-transform:uppercase;
            white-space:nowrap;
        }

        .rk-product-name{
            margin:7px 0;

            overflow:hidden;

            color:#fff;

            font-size:12px;
            font-weight:800;

            text-overflow:ellipsis;
            white-space:nowrap;
        }

        .rk-product-bottom{
            display:flex;
            align-items:center;
            justify-content:space-between;

            gap:8px;
        }

        .rk-price{
            min-width:0;

            color:#cbd5e1;

            font-size:11px;
            font-weight:900;

            white-space:nowrap;
        }

        .rk-price small{
            color:#64748b;
            font-size:7px;
        }

        .rk-product-btn{
            width:31px;
            height:31px;

            display:grid;
            place-items:center;

            flex-shrink:0;

            color:#fff;

            border-radius:9px;

            background:#2563eb;

            transition:.25s;
        }

        .rk-product-btn:hover{
            color:#fff;
            transform:scale(1.08);
        }


        /* =========================================================
           PROCESS
        ========================================================= */
        .rk-process-grid{
            display:grid;

            grid-template-columns:
                repeat(5,minmax(0,1fr));

            gap:13px;

            width:100%;
        }

        .rk-process{
            position:relative;

            min-width:0;

            padding:25px 17px;

            text-align:center;

            border:1px solid rgba(255,255,255,.07);
            border-radius:19px;

            background:rgba(255,255,255,.025);

            transition:.3s;
        }

        .rk-process:hover{
            transform:translateY(-5px);

            border-color:rgba(56,189,248,.18);
        }

        .rk-process-number{
            position:absolute;

            top:11px;
            right:13px;

            color:rgba(255,255,255,.05);

            font-size:28px;
            font-weight:900;
        }

        .rk-process-icon{
            width:47px;
            height:47px;

            display:grid;
            place-items:center;

            margin:0 auto 14px;

            border-radius:14px;

            color:#60a5fa;

            background:
                linear-gradient(
                    135deg,
                    rgba(37,99,235,.17),
                    rgba(34,211,238,.06)
                );

            font-size:18px;
        }

        .rk-process h3{
            color:#fff;

            font-size:11px;
            font-weight:800;
        }

        .rk-process p{
            margin-top:7px;

            color:#64748b;

            font-size:8px;
            line-height:1.6;
        }


        /* =========================================================
           WHY
        ========================================================= */
        .rk-why{
            width:100%;

            display:grid;

            grid-template-columns:
                minmax(0,1fr)
                minmax(0,1fr);

            align-items:center;

            gap:70px;
        }

        .rk-why-copy{
            min-width:0;
        }

        .rk-why-title{
            color:#fff;

            font-size:clamp(30px,4vw,44px);

            line-height:1.1;

            letter-spacing:-2px;

            font-weight:900;
        }

        .rk-why-title span{
            color:#38bdf8;
        }

        .rk-why-desc{
            margin:16px 0 25px;

            color:#64748b;

            font-size:12px;
            line-height:1.8;
        }

        .rk-feature-list{
            display:grid;
            gap:14px;
        }

        .rk-feature{
            display:flex;
            align-items:flex-start;

            gap:12px;
        }

        .rk-feature-icon{
            width:35px;
            height:35px;

            display:grid;
            place-items:center;

            flex-shrink:0;

            border-radius:10px;

            color:#60a5fa;
            background:rgba(37,99,235,.1);
        }

        .rk-feature strong{
            display:block;

            color:#fff;

            font-size:11px;
            font-weight:800;
        }

        .rk-feature p{
            margin-top:3px;

            color:#64748b;

            font-size:8px;
            line-height:1.6;
        }


        /* =========================================================
           WHY VISUAL
        ========================================================= */
        .rk-why-visual{
            width:100%;
            min-height:360px;

            display:flex;
            align-items:center;
            justify-content:center;

            min-width:0;
        }

        .rk-stat-card{
            position:relative;

            width:350px;
            height:250px;

            max-width:100%;

            padding:22px;

            overflow:hidden;

            border:1px solid rgba(255,255,255,.09);
            border-radius:24px;

            background:
                linear-gradient(
                    145deg,
                    rgba(16,35,61,.95),
                    rgba(6,16,29,.95)
                );

            box-shadow:30px 35px 70px rgba(0,0,0,.4);

            transform:
                perspective(1000px)
                rotateY(-13deg)
                rotateX(5deg);
        }

        .rk-stat-header{
            display:flex;
            align-items:center;
            justify-content:space-between;
        }

        .rk-stat-header strong{
            color:#fff;
            font-size:12px;
        }

        .rk-live{
            display:flex;
            align-items:center;
            gap:5px;

            color:#4ade80;

            font-size:7px;
        }

        .rk-live i{
            font-size:5px;
        }

        .rk-big-number{
            margin-top:20px;

            color:#fff;

            font-size:34px;

            letter-spacing:-2px;

            font-weight:900;
        }

        .rk-big-number small{
            color:#22c55e;

            font-size:9px;

            letter-spacing:0;
        }

        .rk-stat-caption{
            margin-top:3px;

            color:#64748b;

            font-size:7px;
        }

        .rk-bars{
            height:80px;

            display:flex;
            align-items:flex-end;

            gap:6px;

            margin-top:18px;
        }

        .rk-bars span{
            flex:1;

            border-radius:5px 5px 2px 2px;

            background:
                linear-gradient(
                    180deg,
                    #38bdf8,
                    #2563eb
                );

            opacity:.75;

            animation:barMove 3s ease-in-out infinite;
        }

        .rk-bars span:nth-child(1){height:35%;}
        .rk-bars span:nth-child(2){height:55%;animation-delay:-.2s;}
        .rk-bars span:nth-child(3){height:42%;animation-delay:-.4s;}
        .rk-bars span:nth-child(4){height:70%;animation-delay:-.6s;}
        .rk-bars span:nth-child(5){height:60%;animation-delay:-.8s;}
        .rk-bars span:nth-child(6){height:85%;animation-delay:-1s;}
        .rk-bars span:nth-child(7){height:72%;animation-delay:-1.2s;}
        .rk-bars span:nth-child(8){height:95%;animation-delay:-1.4s;}

        @keyframes barMove{
            50%{
                opacity:1;
                transform:scaleY(.88);
            }
        }


        /* =========================================================
           CTA
        ========================================================= */
        .rk-cta{
            position:relative;

            width:100%;

            overflow:hidden;

            padding:70px 30px;

            text-align:center;

            border:1px solid rgba(56,189,248,.12);
            border-radius:30px;

            background:
                radial-gradient(
                    circle at 20% 20%,
                    rgba(37,99,235,.2),
                    transparent 35%
                ),
                radial-gradient(
                    circle at 80% 70%,
                    rgba(139,92,246,.15),
                    transparent 35%
                ),
                linear-gradient(
                    135deg,
                    #0b1c35,
                    #071325
                );
        }

        .rk-cta h2{
            color:#fff;

            font-size:clamp(29px,4vw,44px);

            letter-spacing:-2px;

            font-weight:900;
        }

        .rk-cta p{
            max-width:520px;

            margin:13px auto 24px;

            color:#94a3b8;

            font-size:11px;
            line-height:1.8;
        }


        /* =========================================================
           FOOTER
        ========================================================= */
        .rk-footer{
            width:100%;

            padding:70px 0 25px;

            background:#030812;

            border-top:1px solid rgba(255,255,255,.06);
        }

        .rk-footer-grid{
            display:grid;

            /*
             * DIBUAT LEBIH SEIMBANG
             */
            grid-template-columns:
                minmax(0,1.5fr)
                minmax(100px,.8fr)
                minmax(100px,.8fr)
                minmax(0,1.25fr);

            gap:45px;

            width:100%;

            padding-bottom:45px;
        }

        .rk-footer-brand,
        .rk-footer-column{
            min-width:0;
        }

        .rk-footer-brand p{
            max-width:330px;

            margin:16px 0 20px;

            color:#64748b;

            font-size:9px;
            line-height:1.8;
        }

        .rk-socials{
            display:flex;
            gap:8px;
        }

        .rk-social{
            width:36px;
            height:36px;

            display:grid;
            place-items:center;

            color:#94a3b8;

            border:1px solid rgba(255,255,255,.08);
            border-radius:11px;

            background:rgba(255,255,255,.035);

            font-size:14px;

            transition:.25s;
        }

        .rk-social:hover{
            color:#fff;

            border-color:#2563eb;

            background:#2563eb;

            transform:translateY(-3px);
        }

        .rk-footer-column h4{
            margin-bottom:17px;

            color:#fff;

            font-size:11px;
            font-weight:900;
        }

        .rk-footer-column > a:not(.rk-contact){
            display:block;

            width:max-content;
            max-width:100%;

            margin-bottom:10px;

            color:#64748b;

            font-size:9px;

            transition:.2s;
        }

        .rk-footer-column > a:not(.rk-contact):hover{
            color:#38bdf8;
        }


        /* =========================================================
           CONTACT
           TIDAK MENGGUNAKAN CARD
        ========================================================= */
        .rk-contact-list{
            display:flex;
            flex-direction:column;

            gap:10px;
        }

        .rk-contact{
            display:flex;
            align-items:center;

            gap:10px;

            width:100%;

            padding:0;

            color:#94a3b8;

            background:transparent;

            border:0;

            transition:.25s;
        }

        .rk-contact:hover{
            color:#fff;

            background:transparent;

            transform:translateX(3px);
        }

        .rk-contact-icon{
            width:30px;
            height:30px;

            display:grid;
            place-items:center;

            flex-shrink:0;

            border-radius:9px;

            color:#60a5fa;

            background:rgba(37,99,235,.1);

            font-size:13px;
        }

        .rk-contact-content{
            min-width:0;
        }

        .rk-contact-label{
            display:block;

            margin-bottom:2px;

            color:#475569;

            font-size:6px;
            font-weight:800;

            letter-spacing:.8px;

            text-transform:uppercase;
        }

        .rk-contact-value{
            display:block;

            max-width:180px;

            overflow:hidden;

            color:#cbd5e1;

            font-size:8px;

            text-overflow:ellipsis;

            white-space:nowrap;
        }

        .rk-footer-bottom{
            display:flex;
            align-items:center;
            justify-content:space-between;

            gap:15px;

            padding-top:22px;

            color:#475569;

            border-top:1px solid rgba(255,255,255,.06);

            font-size:7px;
        }


        /* =========================================================
           REVEAL
        ========================================================= */
        .rk-reveal{
            opacity:0;

            transform:translateY(25px);

            transition:
                opacity .7s ease,
                transform .7s ease;
        }

        .rk-reveal.show{
            opacity:1;

            transform:translateY(0);
        }


        /* =========================================================
           LARGE TABLET
        ========================================================= */
        @media (max-width:1100px){

            :root{
                --gutter:24px;
            }

            .rk-nav a{
                padding-left:9px;
                padding-right:9px;

                font-size:11px;
            }

            .rk-hero-grid{
                gap:20px;
            }

            .rk-dashboard-stage{
                transform:
                    scale(.88)
                    rotateX(8deg)
                    rotateY(-12deg)
                    rotateZ(-1deg);
            }

            .rk-footer-grid{
                gap:28px;
            }
        }


        /* =========================================================
           TABLET
        ========================================================= */
        @media (max-width:1000px){

            :root{
                --gutter:24px;
            }

            .rk-nav{
                display:none;
            }

            .rk-menu{
                display:flex;
            }

            .rk-nav.mobile-open{
                position:absolute;

                left:var(--gutter);
                right:var(--gutter);
                top:76px;

                display:flex;

                flex-direction:column;
                align-items:stretch;

                gap:2px;

                padding:9px;

                border:1px solid rgba(255,255,255,.08);
                border-radius:16px;

                background:rgba(6,15,28,.98);

                box-shadow:0 25px 60px rgba(0,0,0,.4);
            }

            .rk-nav.mobile-open a{
                padding:13px;
            }

            .rk-hero{
                min-height:auto;

                padding-top:125px;
                padding-bottom:80px;
            }

            .rk-hero-grid{
                grid-template-columns:1fr;

                text-align:center;

                gap:10px;
            }

            .rk-hero-copy{
                display:flex;
                flex-direction:column;
                align-items:center;
            }

            .rk-hero-desc{
                max-width:650px;
            }

            .rk-trust-text{
                justify-content:center;
            }

            .rk-visual{
                min-height:530px;

                width:100%;

                overflow:visible;
            }

            .rk-dashboard-stage{
                transform:
                    scale(.86)
                    rotateX(8deg)
                    rotateY(-12deg)
                    rotateZ(-1deg);
            }

            .rk-category-grid,
            .rk-product-grid{
                grid-template-columns:
                    repeat(2,minmax(0,1fr));
            }

            .rk-process-grid{
                grid-template-columns:
                    repeat(3,minmax(0,1fr));
            }

            .rk-why{
                grid-template-columns:1fr;

                gap:45px;
            }

            .rk-why-copy{
                text-align:center;
            }

            .rk-feature-list{
                max-width:550px;

                margin-left:auto;
                margin-right:auto;

                text-align:left;
            }

            .rk-footer-grid{
                grid-template-columns:
                    minmax(0,1.2fr)
                    minmax(0,.8fr)
                    minmax(0,.8fr);

                grid-template-areas:
                    "brand nav help"
                    "brand contact contact";

                gap:35px 25px;
            }

            .rk-footer-brand{
                grid-area:brand;
            }

            .rk-footer-column:nth-child(2){
                grid-area:nav;
            }

            .rk-footer-column:nth-child(3){
                grid-area:help;
            }

            .rk-footer-column:nth-child(4){
                grid-area:contact;
            }

            .rk-contact-list{
                display:grid;

                grid-template-columns:
                    repeat(3,minmax(0,1fr));

                gap:15px;
            }
        }


        /* =========================================================
           TABLET KECIL
        ========================================================= */
        @media (max-width:800px){

            :root{
                --gutter:18px;
            }

            .rk-dashboard-stage{
                transform:
                    scale(.76)
                    rotateX(8deg)
                    rotateY(-12deg)
                    rotateZ(-1deg);
            }

            .rk-visual{
                min-height:475px;
            }

            .rk-footer-grid{
                grid-template-columns:
                    repeat(3,minmax(0,1fr));

                grid-template-areas:
                    "brand brand brand"
                    "nav help contact";

                gap:28px 18px;
            }

            .rk-footer-brand{
                text-align:center;
            }

            .rk-footer-brand .rk-logo{
                justify-content:center;
            }

            .rk-footer-brand p{
                max-width:500px;

                margin-left:auto;
                margin-right:auto;
            }

            .rk-socials{
                justify-content:center;
            }

            .rk-contact-list{
                display:flex;
                flex-direction:column;

                gap:9px;
            }
        }


        /* =========================================================
           MOBILE
        ========================================================= */
        @media (max-width:650px){

            :root{
                --gutter:15px;
            }

            .rk-header{
                height:68px;
            }

            .rk-header-inner{
                height:68px;

                gap:8px;
            }

            .rk-logo-icon{
                width:38px;
                height:38px;
            }

            .rk-logo-text{
                font-size:18px;
            }

            .rk-login{
                display:none;
            }

            .rk-register{
                padding:9px 12px;

                font-size:9px;
            }

            .rk-menu{
                width:38px;
                height:38px;
            }

            .rk-nav.mobile-open{
                top:68px;

                left:var(--gutter);
                right:var(--gutter);
            }


            /* HERO */
            .rk-hero{
                padding-top:110px;
                padding-bottom:40px;
            }

            .rk-hero-grid{
                gap:0;
            }

            .rk-hero-title{
                font-size:42px;

                letter-spacing:-2.8px;
            }

            .rk-hero-desc{
                font-size:11px;
            }

            .rk-primary,
            .rk-secondary{
                padding:12px 15px;

                font-size:10px;
            }

            .rk-trust-text{
                gap:10px;

                font-size:7px;
            }


            /* VISUAL */
            .rk-visual{
                min-height:390px;

                margin-top:0;

                overflow:visible;
            }

            .rk-dashboard-stage{
                transform:
                    scale(.60)
                    rotateX(8deg)
                    rotateY(-12deg)
                    rotateZ(-1deg);
            }


            /* TRUST */
            .rk-trust-bar{
                margin-top:0;
            }

            .rk-trust-grid{
                grid-template-columns:
                    repeat(2,minmax(0,1fr));

                padding:10px;
            }

            .rk-trust-item{
                padding:12px 6px;

                border-right:0;
                border-bottom:1px solid rgba(255,255,255,.05);
            }

            .rk-trust-item:nth-child(3),
            .rk-trust-item:nth-child(4){
                border-bottom:0;
            }

            .rk-trust-icon{
                width:28px;
                height:28px;

                font-size:11px;
            }

            .rk-trust-item strong{
                font-size:8px;
            }

            .rk-trust-item small{
                font-size:5.5px;
            }


            /* SECTIONS */
            .rk-section{
                padding:75px 0;
            }

            .rk-section-title{
                font-size:29px;

                letter-spacing:-1.5px;
            }

            .rk-section-desc{
                font-size:9px;
            }


            /* CATEGORY */
            .rk-category-grid,
            .rk-product-grid{
                grid-template-columns:
                    repeat(2,minmax(0,1fr));

                gap:9px;
            }

            .rk-category{
                min-height:130px;

                padding:16px;

                border-radius:16px;
            }

            .rk-category-icon{
                width:36px;
                height:36px;

                margin-bottom:12px;

                font-size:14px;
            }

            .rk-category h3{
                font-size:10px;
            }

            .rk-category p{
                font-size:6px;
            }


            /* PRODUCTS */
            .rk-product-img{
                height:135px;
            }

            .rk-product-img img{
                padding:7px;
            }

            .rk-product-content{
                padding:11px;
            }

            .rk-product-name{
                font-size:9px;
            }

            .rk-price{
                font-size:8px;
            }

            .rk-price small{
                font-size:6px;
            }

            .rk-product-btn{
                width:27px;
                height:27px;

                font-size:9px;
            }


            /* PROCESS */
            .rk-process-grid{
                grid-template-columns:
                    repeat(2,minmax(0,1fr));

                gap:9px;
            }

            .rk-process{
                padding:20px 11px;
            }

            .rk-process-icon{
                width:40px;
                height:40px;

                font-size:14px;
            }


            /* WHY */
            .rk-why{
                gap:25px;
            }

            .rk-why-title{
                font-size:29px;
            }

            .rk-why-desc{
                font-size:9px;
            }

            .rk-feature strong{
                font-size:9px;
            }

            .rk-feature p{
                font-size:7px;
            }

            .rk-why-visual{
                min-height:300px;

                overflow:visible;
            }

            .rk-stat-card{
                transform:
                    perspective(1000px)
                    rotateY(-8deg)
                    rotateX(4deg)
                    scale(.88);
            }


            /* CTA */
            .rk-cta{
                padding:50px 18px;

                border-radius:22px;
            }

            .rk-cta h2{
                font-size:28px;
            }


            /* FOOTER */
            .rk-footer{
                padding-top:55px;
            }

            .rk-footer-grid{
                display:grid;

                grid-template-columns:
                    minmax(0,1fr)
                    minmax(0,1fr)
                    minmax(0,1.25fr);

                grid-template-areas:
                    "brand brand brand"
                    "nav help contact";

                gap:28px 12px;

                padding-bottom:32px;

                align-items:start;
            }

            .rk-footer-brand{
                grid-area:brand;

                text-align:center;
            }

            .rk-footer-brand .rk-logo{
                justify-content:center;
            }

            .rk-footer-brand p{
                max-width:420px;

                margin:14px auto 17px;

                font-size:8px;
            }

            .rk-socials{
                justify-content:center;
            }

            .rk-footer-column:nth-child(2){
                grid-area:nav;
            }

            .rk-footer-column:nth-child(3){
                grid-area:help;
            }

            .rk-footer-column:nth-child(4){
                grid-area:contact;
            }

            .rk-footer-column h4{
                margin-bottom:14px;

                font-size:8px;
            }

            .rk-footer-column > a:not(.rk-contact){
                width:auto;

                margin-bottom:9px;

                font-size:7px;
            }

            .rk-contact-list{
                display:flex;

                flex-direction:column;

                gap:9px;
            }

            .rk-contact{
                padding:0;

                gap:6px;
            }

            .rk-contact:hover{
                transform:none;
            }

            .rk-contact-icon{
                width:25px;
                height:25px;

                border-radius:8px;

                font-size:10px;
            }

            .rk-contact-label{
                font-size:4.5px;
            }

            .rk-contact-value{
                max-width:100%;

                font-size:6px;
            }

            .rk-footer-bottom{
                flex-direction:column;

                gap:7px;

                text-align:center;

                font-size:6px;
            }
        }


        /* =========================================================
           MOBILE KECIL
        ========================================================= */
        @media (max-width:480px){

            :root{
                --gutter:14px;
            }

            .rk-register{
                padding:8px 10px;
            }

            .rk-register i{
                display:none;
            }

            .rk-hero-title{
                font-size:38px;
            }

            .rk-hero-actions{
                width:100%;

                justify-content:center;
            }

            .rk-primary,
            .rk-secondary{
                padding:11px 13px;
            }

            .rk-visual{
                min-height:350px;
            }

            .rk-dashboard-stage{
                transform:
                    scale(.53)
                    rotateX(8deg)
                    rotateY(-12deg)
                    rotateZ(-1deg);
            }

            .rk-footer-grid{
                grid-template-columns:
                    minmax(0,.95fr)
                    minmax(0,.95fr)
                    minmax(0,1.15fr);

                gap:20px 8px;
            }

            .rk-footer-column h4{
                font-size:7.5px;
            }

            .rk-footer-column > a:not(.rk-contact){
                font-size:6.5px;
            }

            .rk-contact{
                gap:5px;
            }

            .rk-contact-icon{
                width:22px;
                height:22px;

                font-size:9px;
            }

            .rk-contact-value{
                font-size:5.5px;
            }

            .rk-contact-label{
                font-size:4px;
            }
        }


        /* =========================================================
           VERY SMALL
        ========================================================= */
        @media (max-width:400px){

            :root{
                --gutter:12px;
            }

            .rk-logo-text{
                font-size:17px;
            }

            .rk-register{
                display:none;
            }

            .rk-hero-title{
                font-size:36px;
            }

            .rk-visual{
                min-height:320px;

                /*
                 * TIDAK LAGI margin negatif besar.
                 * Visual tetap berada pada grid utama.
                 */
                margin-left:0;
                margin-right:0;
            }

            .rk-dashboard-stage{
                transform:
                    scale(.48)
                    rotateX(8deg)
                    rotateY(-12deg)
                    rotateZ(-1deg);
            }

            .rk-footer-grid{
                grid-template-columns:
                    minmax(0,.9fr)
                    minmax(0,.9fr)
                    minmax(0,1.2fr);

                gap:18px 6px;
            }

            .rk-footer-column h4{
                font-size:7px;
            }

            .rk-footer-column > a:not(.rk-contact){
                margin-bottom:8px;

                font-size:6px;
            }

            .rk-contact-list{
                gap:7px;
            }

            .rk-contact-icon{
                width:20px;
                height:20px;

                font-size:8px;
            }

            .rk-contact-value{
                font-size:5px;
            }

            .rk-contact-label{
                display:none;
            }

            .rk-footer-bottom{
                font-size:5.5px;
            }
        }


        /* =========================================================
           ACCESSIBILITY
        ========================================================= */
        @media (prefers-reduced-motion:reduce){

            *,
            *::before,
            *::after{
                animation-duration:.01ms !important;
                animation-iteration-count:1 !important;
                transition-duration:.01ms !important;
                scroll-behavior:auto !important;
            }
        }
    
        /* =========================================================
           FINAL POLISH
           - harga produk tampil dari price_per_day
           - jarak hero / ilustrasi 3D / trust / section lebih seimbang
           - footer 4 kolom lebih rata dan konsisten
        ========================================================= */

        .rk-hero{
            min-height:820px;
            padding:76px 0 58px;
        }

        .rk-hero-grid{
            gap:48px;
        }

        .rk-visual{
            min-height:535px;
        }

        .rk-dashboard-stage{
            transform:
                rotateX(8deg)
                rotateY(-12deg)
                rotateZ(-1deg);
        }

        .rk-trust-bar{
            margin-top:-18px;
        }

        .rk-section{
            padding:92px 0;
        }

        /* Bagian Barang tidak lagi memakai padding inline yang terlalu kecil */
        #barang.rk-section{
            padding-top:88px;
        }

        .rk-section-head{
            margin-bottom:38px;
        }

        .rk-category-grid,
        .rk-product-grid{
            gap:18px;
        }

        .rk-product-card{
            height:100%;
        }

        .rk-product-content{
            padding:18px;
        }

        .rk-product-bottom{
            min-height:34px;
        }

        .rk-price{
            display:flex;
            align-items:baseline;
            gap:4px;
            min-width:0;
            line-height:1.2;
        }

        .rk-price small{
            flex-shrink:0;
        }

        /* =========================================================
           FOOTER DESKTOP
        ========================================================= */
        .rk-footer{
            padding:76px 0 28px;
        }

        .rk-footer-grid{
            grid-template-columns:
                minmax(0,1.45fr)
                minmax(120px,.72fr)
                minmax(120px,.72fr)
                minmax(0,1.35fr);

            gap:64px;
            align-items:start;
            padding-bottom:48px;
        }

        .rk-footer-brand{
            min-width:0;
        }

        .rk-footer-brand p{
            max-width:360px;
            margin:17px 0 22px;
        }

        .rk-footer-column{
            min-width:0;
        }

        .rk-footer-column h4{
            margin:2px 0 18px;
        }

        .rk-footer-column > a:not(.rk-contact){
            margin-bottom:11px;
        }

        .rk-contact-list{
            gap:12px;
        }

        .rk-contact{
            align-items:center;
            gap:11px;
            width:100%;
        }

        .rk-contact-content{
            min-width:0;
            flex:1;
        }

        .rk-contact-value{
            max-width:100%;
        }

        .rk-footer-bottom{
            min-height:42px;
            padding-top:22px;
        }

        /* =========================================================
           LARGE TABLET
        ========================================================= */
        @media (max-width:1100px){
            .rk-hero-grid{
                gap:28px;
            }

            .rk-dashboard-stage{
                transform:
                    scale(.88)
                    rotateX(8deg)
                    rotateY(-12deg)
                    rotateZ(-1deg);
            }

            .rk-footer-grid{
                gap:34px;
            }
        }

        /* =========================================================
           TABLET
        ========================================================= */
        @media (max-width:1000px){
            .rk-hero{
                min-height:auto;
                padding-top:125px;
                padding-bottom:55px;
            }

            .rk-hero-grid{
                gap:4px;
            }

            .rk-visual{
                min-height:510px;
                margin-top:0;
            }

            .rk-trust-bar{
                margin-top:-8px;
            }

            .rk-section{
                padding:82px 0;
            }

            #barang.rk-section{
                padding-top:82px;
            }

            .rk-footer-grid{
                gap:28px;
            }
        }

        /* =========================================================
           TABLET KECIL
        ========================================================= */
        @media (max-width:800px){
            .rk-hero{
                padding-bottom:38px;
            }

            .rk-visual{
                min-height:465px;
            }

            .rk-trust-bar{
                margin-top:0;
            }

            .rk-section{
                padding:72px 0;
            }

            #barang.rk-section{
                padding-top:72px;
            }

            .rk-section-head{
                margin-bottom:32px;
            }

            .rk-category-grid,
            .rk-product-grid{
                gap:12px;
            }

            .rk-footer-grid{
                gap:30px 20px;
            }
        }

        /* =========================================================
           MOBILE
        ========================================================= */
        @media (max-width:650px){
            .rk-hero{
                padding-top:110px;
                padding-bottom:30px;
            }

            .rk-visual{
                min-height:390px;
            }

            .rk-trust-bar{
                margin-top:0;
            }

            .rk-section{
                padding:64px 0;
            }

            #barang.rk-section{
                padding-top:64px;
            }

            .rk-section-head{
                margin-bottom:28px;
            }

            .rk-category-grid,
            .rk-product-grid{
                gap:10px;
            }

            .rk-product-content{
                padding:12px;
            }

            .rk-price{
                font-size:8.5px;
            }

            .rk-footer{
                padding:58px 0 24px;
            }

            .rk-footer-grid{
                grid-template-columns:
                    minmax(0,1fr)
                    minmax(0,1fr)
                    minmax(0,1.15fr);

                grid-template-areas:
                    "brand brand brand"
                    "nav help contact";

                gap:30px 14px;
                padding-bottom:34px;
            }

            .rk-footer-column h4{
                margin-bottom:13px;
            }

            .rk-footer-column > a:not(.rk-contact){
                margin-bottom:9px;
            }

            .rk-contact-list{
                gap:9px;
            }

            .rk-contact{
                gap:6px;
            }

            .rk-footer-bottom{
                gap:8px;
            }
        }

        /* =========================================================
           MOBILE KECIL
        ========================================================= */
        @media (max-width:480px){
            .rk-visual{
                min-height:350px;
            }

            .rk-dashboard-stage{
                transform:
                    scale(.53)
                    rotateX(8deg)
                    rotateY(-12deg)
                    rotateZ(-1deg);
            }

            .rk-footer-grid{
                gap:24px 9px;
            }
        }

        /* =========================================================
           VERY SMALL
        ========================================================= */
        @media (max-width:400px){
            .rk-visual{
                min-height:320px;
            }

            .rk-dashboard-stage{
                transform:
                    scale(.48)
                    rotateX(8deg)
                    rotateY(-12deg)
                    rotateZ(-1deg);
            }

            .rk-footer-grid{
                gap:20px 7px;
            }
        }


        /* =========================================================
           RESPONSIVE FINAL FIX
           - Tombol Masuk & Daftar tetap tampil di HP
           - Header tidak overflow
           - Menu mobile tetap tersedia
           - Hero dan ilustrasi 3D menyesuaikan lebar layar
        ========================================================= */

        .rk-header-inner,
        .rk-header-actions{
            min-width:0;
        }

        .rk-header-actions{
            flex-shrink:1;
        }

        @media (max-width:650px){

            .rk-header-inner{
                gap:6px;
            }

            .rk-logo{
                min-width:0;
                flex:1 1 auto;
            }

            .rk-logo-icon{
                width:36px;
                height:36px;
                border-radius:11px;
                font-size:16px;
            }

            .rk-logo-text{
                font-size:17px;
                letter-spacing:-.6px;
            }

            .rk-header-actions{
                flex:0 0 auto;
                gap:4px;
            }

            /* Masuk wajib tetap terlihat di HP */
            .rk-login{
                display:inline-flex !important;
                align-items:center;
                justify-content:center;
                padding:8px 8px;
                min-height:36px;
                font-size:9px;
                border-radius:9px;
            }

            /* Daftar juga tetap terlihat di HP */
            .rk-register{
                display:inline-flex !important;
                align-items:center;
                justify-content:center;
                padding:8px 9px;
                min-height:36px;
                font-size:9px;
                border-radius:9px;
            }

            .rk-register i{
                display:none;
            }

            .rk-menu{
                display:flex !important;
                width:36px;
                height:36px;
                border-radius:9px;
                font-size:17px;
            }

            .rk-nav.mobile-open{
                z-index:10000;
            }

            /* Hero lebih aman di layar HP */
            .rk-hero{
                width:100%;
                min-height:auto;
                padding-top:104px;
                padding-bottom:26px;
            }

            .rk-hero-grid{
                width:100%;
                grid-template-columns:minmax(0,1fr);
                gap:0;
            }

            .rk-hero-copy{
                width:100%;
                min-width:0;
            }

            .rk-badge{
                max-width:100%;
                margin-bottom:17px;
            }

            .rk-hero-title{
                width:100%;
                font-size:clamp(34px,10.5vw,42px);
                line-height:1.04;
                letter-spacing:-2.4px;
            }

            .rk-hero-desc{
                width:100%;
                max-width:520px;
                margin-top:17px;
                font-size:10.5px;
                line-height:1.75;
            }

            .rk-hero-actions{
                width:100%;
                max-width:430px;
                margin-top:22px;
                gap:8px;
            }

            .rk-primary,
            .rk-secondary{
                min-height:42px;
                padding:11px 14px;
                font-size:10px;
            }

            .rk-trust-text{
                width:100%;
                justify-content:center;
                gap:9px 12px;
                margin-top:18px;
                font-size:7px;
            }

            /* Visual tidak boleh melebar keluar layar */
            .rk-visual{
                width:100%;
                min-width:0;
                min-height:360px;
                margin-top:2px;
                overflow:visible;
            }

            .rk-dashboard-stage{
                width:600px;
                max-width:none;
                transform:
                    scale(.55)
                    rotateX(8deg)
                    rotateY(-12deg)
                    rotateZ(-1deg);
            }

            .rk-glow{
                width:340px;
                height:340px;
            }

            .rk-ring.one{
                width:510px;
                height:510px;
            }

            .rk-ring.two{
                width:390px;
                height:390px;
            }

            /* Trust card tidak terlalu mepet */
            .rk-trust-grid{
                width:100%;
            }
        }

        @media (max-width:480px){

            :root{
                --gutter:12px;
            }

            .rk-header-inner{
                gap:4px;
            }

            .rk-logo{
                gap:7px;
            }

            .rk-logo-icon{
                width:34px;
                height:34px;
                border-radius:10px;
                font-size:15px;
            }

            .rk-logo-text{
                font-size:16px;
            }

            .rk-header-actions{
                gap:3px;
            }

            .rk-login{
                padding:7px 7px;
                min-height:34px;
                font-size:8px;
            }

            .rk-register{
                padding:7px 8px;
                min-height:34px;
                font-size:8px;
            }

            .rk-menu{
                width:34px;
                height:34px;
                font-size:16px;
            }

            .rk-nav.mobile-open{
                top:68px;
                left:var(--gutter);
                right:var(--gutter);
            }

            .rk-hero{
                padding-top:100px;
                padding-bottom:20px;
            }

            .rk-hero-title{
                font-size:clamp(32px,10.8vw,38px);
                letter-spacing:-2.2px;
            }

            .rk-hero-desc{
                font-size:10px;
            }

            .rk-hero-actions{
                gap:7px;
            }

            .rk-primary,
            .rk-secondary{
                flex:0 1 auto;
                min-height:40px;
                padding:10px 12px;
                font-size:9px;
            }

            .rk-trust-text{
                font-size:6.5px;
                gap:8px 10px;
            }

            .rk-visual{
                min-height:335px;
            }

            .rk-dashboard-stage{
                transform:
                    scale(.49)
                    rotateX(8deg)
                    rotateY(-12deg)
                    rotateZ(-1deg);
            }
        }

        @media (max-width:380px){

            .rk-logo-text{
                font-size:15px;
            }

            .rk-login{
                padding-left:6px;
                padding-right:6px;
                font-size:7.5px;
            }

            .rk-register{
                padding-left:7px;
                padding-right:7px;
                font-size:7.5px;
            }

            .rk-menu{
                width:32px;
                height:32px;
            }

            .rk-hero-title{
                font-size:32px;
            }

            .rk-primary,
            .rk-secondary{
                padding-left:10px;
                padding-right:10px;
            }

            .rk-visual{
                min-height:310px;
            }

            .rk-dashboard-stage{
                transform:
                    scale(.45)
                    rotateX(8deg)
                    rotateY(-12deg)
                    rotateZ(-1deg);
            }
        }



        /* =========================================================
           FINAL RESPONSIVE OVERRIDE
        ========================================================= */

        html, body{
            width:100%;
            max-width:100%;
            overflow-x:hidden;
        }

        .rk-page{
            width:100%;
            max-width:100%;
            overflow-x:hidden;
        }

        .rk-container,
        .rk-header-inner{
            width:min(1180px, calc(100% - 40px));
            max-width:100%;
            margin-left:auto;
            margin-right:auto;
        }

        /* Header desktop */
        .rk-header-actions{
            display:flex;
            align-items:center;
            gap:18px;
            margin-left:auto;
        }

        .rk-login,
        .rk-register{
            background:transparent !important;
            box-shadow:none !important;
            border:0 !important;
            transform:none !important;
        }

        .rk-login{
            padding:8px 0 !important;
            color:#cbd5e1 !important;
        }

        .rk-login:hover{
            color:#fff !important;
            background:transparent !important;
        }

        .rk-register{
            padding:8px 0 !important;
            color:#fff !important;
        }

        .rk-register:hover{
            color:#60a5fa !important;
            background:transparent !important;
            box-shadow:none !important;
        }

        .rk-menu{
            margin-left:2px;
        }

        /* Desktop: hero selalu mengikuti tinggi viewport */
        .rk-hero{
            min-height:calc(100vh - 76px) !important;
            height:auto;
            padding:54px 0 38px !important;
        }

        .rk-hero-grid{
            width:100%;
            min-width:0;
            gap:28px;
        }

        .rk-hero-title{
            font-size:clamp(48px, 5vw, 72px);
        }

        .rk-hero-desc{
            margin-top:18px;
            font-size:13px;
            line-height:1.75;
        }

        .rk-hero-actions{
            margin-top:22px;
        }

        .rk-trust-text{
            margin-top:20px;
        }

        .rk-visual{
            min-height:0;
            height:clamp(430px, 61vh, 570px);
        }

        .rk-dashboard-stage{
            transform:scale(.82) rotateX(8deg) rotateY(-12deg) rotateZ(-1deg) !important;
            transform-origin:center center;
        }

        /* Laptop / desktop sempit */
        @media (max-width:1400px){
            .rk-container,
            .rk-header-inner{
                width:min(1120px, calc(100% - 44px));
            }

            .rk-hero-grid{
                grid-template-columns:minmax(0,.9fr) minmax(0,1.1fr);
                gap:16px;
            }

            .rk-hero-title{
                font-size:clamp(44px,5vw,64px);
                letter-spacing:-3.2px;
            }

            .rk-visual{
                height:clamp(420px, 59vh, 530px);
            }

            .rk-dashboard-stage{
                transform:scale(.72) rotateX(8deg) rotateY(-12deg) rotateZ(-1deg) !important;
            }
        }

        /* Laptop pendek: jangan membuat hero lebih tinggi dari layar */
        @media (min-width:1001px) and (max-height:780px){
            .rk-hero{
                min-height:calc(100vh - 76px) !important;
                padding-top:30px !important;
                padding-bottom:24px !important;
            }

            .rk-hero-title{
                font-size:clamp(42px,4.6vw,60px);
            }

            .rk-badge{
                margin-bottom:15px;
            }

            .rk-hero-desc{
                margin-top:14px;
            }

            .rk-hero-actions{
                margin-top:18px;
            }

            .rk-trust-text{
                margin-top:15px;
            }

            .rk-visual{
                height:calc(100vh - 145px);
                max-height:500px;
            }

            .rk-dashboard-stage{
                transform:scale(.66) rotateX(8deg) rotateY(-12deg) rotateZ(-1deg) !important;
            }
        }

        /* Tablet */
        @media (max-width:1000px){
            :root{
                --gutter:22px;
            }

            .rk-container,
            .rk-header-inner{
                width:calc(100% - 44px);
            }

            .rk-header{
                height:72px;
            }

            .rk-header-inner{
                height:72px;
            }

            .rk-nav{
                display:none !important;
            }

            .rk-header-actions{
                display:flex !important;
                gap:14px;
            }

            .rk-login,
            .rk-register{
                display:inline-flex !important;
                padding:7px 0 !important;
                min-height:0 !important;
                border-radius:0 !important;
            }

            .rk-register i{
                display:none;
            }

            .rk-menu{
                display:flex !important;
                width:40px;
                height:40px;
                margin-left:0;
            }

            .rk-hero{
                min-height:auto !important;
                padding:110px 0 38px !important;
            }

            .rk-hero-grid{
                grid-template-columns:minmax(0,1fr);
                gap:0;
                text-align:center;
            }

            .rk-hero-copy{
                display:flex;
                flex-direction:column;
                align-items:center;
                width:100%;
            }

            .rk-hero-desc{
                max-width:680px;
            }

            .rk-hero-actions,
            .rk-trust-text{
                justify-content:center;
            }

            .rk-visual{
                width:100%;
                height:470px;
                min-height:0;
                overflow:hidden;
            }

            .rk-dashboard-stage{
                transform:scale(.70) rotateX(8deg) rotateY(-12deg) rotateZ(-1deg) !important;
            }
        }

        /* HP */
        @media (max-width:700px){
            :root{
                --gutter:12px;
            }

            .rk-container,
            .rk-header-inner{
                width:calc(100% - 24px);
            }

            .rk-header{
                height:62px;
            }

            .rk-header-inner{
                height:62px;
                gap:4px;
            }

            .rk-logo{
                flex:1 1 auto;
                min-width:0;
                gap:7px;
            }

            .rk-logo-icon{
                width:36px;
                height:36px;
                border-radius:11px;
                font-size:16px;
            }

            .rk-logo-text{
                font-size:17px;
                letter-spacing:-.7px;
                white-space:nowrap;
            }

            /* [ Masuk ][ Daftar ][ ☰ ] rapat, tanpa card */
            .rk-header-actions{
                flex:0 0 auto;
                display:flex !important;
                align-items:center;
                gap:10px;
                margin-left:auto;
            }

            .rk-login,
            .rk-register{
                display:inline-flex !important;
                align-items:center;
                justify-content:center;
                flex:0 0 auto;
                padding:6px 0 !important;
                min-height:0 !important;
                border:0 !important;
                border-radius:0 !important;
                background:transparent !important;
                box-shadow:none !important;
                font-size:9px;
                font-weight:800;
                line-height:1;
                white-space:nowrap;
            }

            .rk-login{
                color:#cbd5e1 !important;
            }

            .rk-register{
                color:#60a5fa !important;
            }

            .rk-register:hover,
            .rk-login:hover{
                background:transparent !important;
                box-shadow:none !important;
                transform:none !important;
            }

            .rk-register i{
                display:none !important;
            }

            .rk-menu{
                display:flex !important;
                flex:0 0 36px;
                width:36px;
                height:36px;
                margin:0;
                padding:0;
                border-radius:10px;
                font-size:18px;
            }

            .rk-nav.mobile-open{
                top:62px !important;
                left:12px !important;
                right:12px !important;
                width:auto !important;
            }

            .rk-hero{
                min-height:auto !important;
                padding:90px 0 20px !important;
            }

            .rk-hero-title{
                width:100%;
                font-size:clamp(34px,10.2vw,43px);
                line-height:1.04;
                letter-spacing:-2.4px;
            }

            .rk-hero-desc{
                width:100%;
                margin-top:15px;
                font-size:10px;
                line-height:1.7;
            }

            .rk-hero-actions{
                width:100%;
                margin-top:19px;
                gap:7px;
            }

            .rk-primary,
            .rk-secondary{
                min-height:40px;
                padding:10px 12px;
                font-size:9px;
            }

            .rk-trust-text{
                margin-top:16px;
                gap:7px 10px;
                font-size:6.5px;
            }

            .rk-visual{
                width:100%;
                height:320px;
                min-height:0;
                overflow:hidden;
                margin-top:0;
            }

            .rk-dashboard-stage{
                width:600px;
                height:480px;
                transform:scale(.48) rotateX(8deg) rotateY(-12deg) rotateZ(-1deg) !important;
            }
        }

        @media (max-width:480px){
            .rk-container,
            .rk-header-inner{
                width:calc(100% - 20px);
            }

            .rk-header{
                height:60px;
            }

            .rk-header-inner{
                height:60px;
                gap:3px;
            }

            .rk-logo{
                gap:6px;
            }

            .rk-logo-icon{
                width:34px;
                height:34px;
                font-size:15px;
            }

            .rk-logo-text{
                font-size:16px;
            }

            .rk-header-actions{
                gap:8px;
            }

            .rk-login,
            .rk-register{
                font-size:8px;
            }

            .rk-menu{
                flex-basis:34px;
                width:34px;
                height:34px;
                font-size:17px;
            }

            .rk-nav.mobile-open{
                top:60px !important;
                left:10px !important;
                right:10px !important;
            }

            .rk-hero{
                padding-top:84px !important;
            }

            .rk-hero-title{
                font-size:clamp(31px,10.5vw,38px);
                letter-spacing:-2px;
            }

            .rk-hero-desc{
                font-size:9.5px;
            }

            .rk-visual{
                height:295px;
            }

            .rk-dashboard-stage{
                transform:scale(.43) rotateX(8deg) rotateY(-12deg) rotateZ(-1deg) !important;
            }
        }

        @media (max-width:360px){
            .rk-logo-text{
                font-size:15px;
            }

            .rk-header-actions{
                gap:7px;
            }

            .rk-login,
            .rk-register{
                font-size:7.5px;
            }

            .rk-menu{
                flex-basis:32px;
                width:32px;
                height:32px;
            }
        }

        /* =========================================================
           MOBILE FOOTER
        ========================================================= */
        .rk-mobile-footer{
            display:none;
        }

        @media (max-width:700px){
            .rk-footer{
                display:none !important;
            }

            .rk-mobile-footer{
                display:block !important;
                width:100%;
                padding:30px 0 16px;
                background:#030812;
                border-top:1px solid rgba(255,255,255,.06);
            }

            .rk-mobile-footer-inner{
                width:calc(100% - 24px);
                max-width:520px;
                margin:0 auto;
            }

            .rk-mobile-footer-top{
                display:grid;
                grid-template-columns:repeat(2,minmax(0,1fr));
                gap:18px;
                padding-bottom:22px;
            }

            .rk-mobile-footer-column h4,
            .rk-mobile-help h4{
                margin:0 0 11px;
                color:#fff;
                font-size:12px;
                font-weight:900;
            }

            .rk-mobile-footer-column a{
                display:flex;
                align-items:center;
                gap:7px;
                margin-bottom:9px;
                color:#71829a;
                font-size:9px;
                line-height:1.3;
            }

            .rk-mobile-footer-column a i{
                font-size:9px;
                color:#64748b;
            }

            .rk-mobile-help{
                padding:21px 0;
                border-top:1px solid rgba(255,255,255,.055);
            }

            .rk-mobile-help-list{
                display:grid;
                gap:8px;
            }

            .rk-mobile-help-item{
                display:flex;
                align-items:center;
                justify-content:space-between;
                gap:8px;
            }

            .rk-mobile-help-item span{
                display:flex;
                align-items:center;
                gap:6px;
                color:#64748b;
                font-size:9px;
            }

            .rk-mobile-help-item span i{
                width:14px;
                text-align:center;
                font-size:11px;
                color:#58708c;
            }

            .rk-mobile-help-item small{
                padding:4px 7px;
                color:#71829a;
                background:rgba(255,255,255,.035);
                border:1px solid rgba(255,255,255,.07);
                border-radius:6px;
                font-size:6.5px;
                font-weight:800;
                white-space:nowrap;
            }

            .rk-mobile-footer-bottom{
                padding-top:19px;
                border-top:1px solid rgba(255,255,255,.055);
                text-align:center;
                color:#475569;
                font-size:7.5px;
                line-height:1.7;
            }

            .rk-mobile-footer-bottom strong{
                color:#64748b;
            }

            .rk-mobile-footer-bottom p{
                margin-top:2px;
            }
        }


        /* =========================================================
           FINAL RESPONSIVE / LAYOUT OVERRIDE
        ========================================================= */

        html,
        body{
            width:100%;
            max-width:100%;
            overflow-x:hidden;
        }

        .rk-page{
            width:100%;
            max-width:100%;
            overflow:hidden;
        }

        .rk-container{
            width:min(1180px, calc(100% - 40px));
            max-width:1180px;
            margin-left:auto;
            margin-right:auto;
        }

        /* HEADER DESKTOP:
           nav benar-benar berada di tengah viewport,
           bukan sekadar di tengah ruang flex. */
        .rk-header-inner{
            position:relative;
            width:min(1180px, calc(100% - 40px));
        }

        @media (min-width:1001px){
            .rk-nav{
                position:absolute;
                left:50%;
                top:50%;
                transform:translate(-50%,-50%);
                margin:0;
                white-space:nowrap;
            }

            .rk-header-actions{
                margin-left:auto;
            }

            .rk-menu{
                display:none !important;
            }

            .rk-nav-mobile-account{
                display:none !important;
            }
        }

        /* Menu HP/TABLET */
        .rk-nav-mobile-account{
            display:none;
        }

        @media (max-width:1000px){
            .rk-header-inner{
                width:calc(100% - 40px);
            }

            .rk-nav.mobile-open{
                z-index:10001;
            }

            .rk-nav-mobile-account{
                display:block;
                margin-top:7px;
                padding-top:8px;
                border-top:1px solid rgba(255,255,255,.07);
            }

            .rk-nav-mobile-label{
                padding:8px 13px 5px;
                color:#64748b;
                font-size:9px;
                font-weight:800;
                text-transform:uppercase;
                letter-spacing:.08em;
            }

            .rk-nav.mobile-open .rk-nav-mobile-account a{
                display:flex;
                align-items:center;
                gap:9px;
                padding:11px 13px;
            }

            .rk-nav.mobile-open .rk-nav-mobile-account a i{
                width:16px;
                color:#38bdf8;
                font-size:13px;
            }
        }

        /* HEADER HP: rapat dan tidak membuat tombol Daftar jadi card */
        @media (max-width:700px){
            .rk-header-inner{
                width:calc(100% - 20px);
                gap:5px;
            }

            .rk-logo{
                min-width:0;
                flex:1 1 auto;
            }

            .rk-logo-text{
                white-space:nowrap;
            }

            .rk-header-actions{
                display:flex !important;
                align-items:center;
                justify-content:flex-end;
                flex:0 0 auto;
                gap:9px;
                margin-left:auto;
            }

            .rk-login,
            .rk-register{
                display:inline-flex !important;
                align-items:center;
                justify-content:center;
                padding:4px 0 !important;
                margin:0 !important;
                border:0 !important;
                border-radius:0 !important;
                background:transparent !important;
                box-shadow:none !important;
                transform:none !important;
                min-height:0 !important;
                line-height:1;
                white-space:nowrap;
            }

            .rk-login{
                color:#e2e8f0 !important;
                font-size:9px;
            }

            .rk-register{
                color:#60a5fa !important;
                font-size:9px;
            }

            .rk-register i{
                display:none !important;
            }

            .rk-menu{
                display:flex !important;
                width:35px;
                height:35px;
                flex:0 0 35px;
                margin:0 !important;
                padding:0;
                border-radius:10px;
            }

            .rk-nav.mobile-open{
                top:60px !important;
                left:10px !important;
                right:10px !important;
                width:auto !important;
                max-height:calc(100vh - 72px);
                overflow-y:auto;
            }
        }

        @media (max-width:400px){
            .rk-header-inner{
                width:calc(100% - 16px);
                gap:3px;
            }

            .rk-header-actions{
                gap:7px;
            }

            .rk-login,
            .rk-register{
                font-size:8px;
            }

            .rk-menu{
                width:33px;
                height:33px;
                flex-basis:33px;
            }
        }

        /* =========================================================
           HERO - ukuran mengikuti viewport, tidak melebihi desktop
        ========================================================= */
        .rk-hero{
            width:100%;
            max-width:100%;
            overflow:hidden;
        }

        .rk-hero-grid{
            width:100%;
            max-width:1180px;
        }

        .rk-visual{
            min-width:0;
            max-width:100%;
            overflow:hidden;
        }

        .rk-dashboard-stage{
            transform-origin:center center;
            max-width:none;
        }

        @media (min-width:1400px){
            .rk-hero{
                min-height:calc(100vh - 76px);
            }

            .rk-hero-grid{
                min-height:calc(100vh - 76px);
            }
        }

        @media (min-width:1001px) and (max-height:800px){
            .rk-hero{
                min-height:auto !important;
                padding-top:105px !important;
                padding-bottom:35px !important;
            }

            .rk-hero-grid{
                min-height:0;
            }

            .rk-visual{
                min-height:500px;
            }

            .rk-dashboard-stage{
                transform:scale(.80) rotateX(8deg) rotateY(-12deg) rotateZ(-1deg) !important;
            }
        }

        @media (min-width:1001px) and (max-width:1250px){
            .rk-container,
            .rk-header-inner{
                width:calc(100% - 40px);
            }

            .rk-nav a{
                padding-left:8px;
                padding-right:8px;
            }

            .rk-hero-grid{
                gap:20px;
            }

            .rk-dashboard-stage{
                transform:scale(.78) rotateX(8deg) rotateY(-12deg) rotateZ(-1deg) !important;
            }
        }

        /* =========================================================
           3 FEATURE "CARD" DI TENTANG:
           tetap 3 buah, tetapi berada di tengah dan tidak mepet kiri
        ========================================================= */
        @media (max-width:1000px){
            .rk-feature-list{
                width:min(100%, 620px);
                margin-left:auto !important;
                margin-right:auto !important;
                display:grid;
                gap:11px;
            }

            .rk-feature{
                width:min(100%, 430px);
                margin-left:auto;
                margin-right:auto;
                padding:11px 14px;
                align-items:center;
                border:1px solid rgba(255,255,255,.055);
                border-radius:14px;
                background:rgba(255,255,255,.025);
                text-align:left;
            }

            .rk-feature-icon{
                width:38px;
                height:38px;
            }
        }

        @media (max-width:600px){
            .rk-feature-list{
                width:100%;
            }

            .rk-feature{
                width:min(100%, 360px);
            }
        }

        /* =========================================================
           SATU FOOTER SAJA
           3 kolom sejajar: Navigasi | Bantuan | Hubungi Kami
        ========================================================= */
        .rk-footer{
            display:block !important;
            width:100%;
            padding:48px 0 20px;
            background:#030812;
            border-top:1px solid rgba(255,255,255,.06);
        }

        .rk-footer-main{
            display:grid;
            grid-template-columns:repeat(3,minmax(0,1fr));
            gap:50px;
            max-width:850px;
            margin:0 auto;
            padding-bottom:34px;
        }

        .rk-footer-column{
            min-width:0;
        }

        .rk-footer-column h4{
            margin:0 0 16px;
            color:#fff;
            font-size:12px;
            font-weight:900;
        }

        .rk-footer-column > a:not(.rk-contact){
            display:flex;
            align-items:center;
            gap:7px;
            margin:0 0 10px;
            color:#71829a;
            font-size:9px;
            line-height:1.4;
            transition:.2s ease;
        }

        .rk-footer-column > a:not(.rk-contact) i{
            color:#64748b;
            font-size:8px;
        }

        .rk-footer-column > a:not(.rk-contact):hover{
            color:#fff;
            transform:translateX(2px);
        }

        .rk-footer-contact{
            min-width:0;
        }

        .rk-contact-list{
            display:grid;
            gap:10px;
        }

        .rk-contact{
            display:flex;
            align-items:center;
            gap:9px;
            width:100%;
            color:#71829a;
        }

        .rk-contact-icon{
            width:30px;
            height:30px;
            flex:0 0 30px;
            display:grid;
            place-items:center;
            border:1px solid rgba(255,255,255,.06);
            border-radius:9px;
            background:rgba(255,255,255,.025);
            color:#60a5fa;
            font-size:12px;
        }

        .rk-contact-content{
            min-width:0;
            display:flex;
            flex-direction:column;
            gap:2px;
        }

        .rk-contact-label{
            color:#64748b;
            font-size:7px;
            font-weight:700;
        }

        .rk-contact-value{
            color:#cbd5e1;
            font-size:8px;
            overflow-wrap:anywhere;
        }

        .rk-footer-bottom{
            display:flex;
            align-items:center;
            justify-content:center;
            gap:10px 25px;
            flex-wrap:wrap;
            padding-top:20px;
            border-top:1px solid rgba(255,255,255,.055);
            color:#475569;
            font-size:7.5px;
            line-height:1.6;
            text-align:center;
        }

        /* Sembunyikan struktur footer lama yang mungkin masih punya selector */
        .rk-footer-brand,
        .rk-socials{
            display:none !important;
        }

        /* Tidak ada footer mobile kedua */
        .rk-mobile-footer{
            display:none !important;
        }

        @media (max-width:700px){
            .rk-footer{
                padding:34px 0 15px;
            }

            .rk-footer-main{
                width:100%;
                max-width:430px;
                grid-template-columns:repeat(3,minmax(0,1fr));
                gap:18px;
                padding-bottom:25px;
            }

            .rk-footer-column h4{
                margin-bottom:12px;
                font-size:10px;
            }

            .rk-footer-column > a:not(.rk-contact){
                gap:4px;
                margin-bottom:8px;
                font-size:7.5px;
            }

            .rk-footer-column > a:not(.rk-contact) i{
                font-size:7px;
            }

            .rk-contact-list{
                gap:8px;
            }

            .rk-contact{
                gap:5px;
            }

            .rk-contact-icon{
                width:25px;
                height:25px;
                flex-basis:25px;
                border-radius:7px;
                font-size:10px;
            }

            .rk-contact-label{
                font-size:6px;
            }

            .rk-contact-value{
                font-size:6.5px;
            }

            .rk-footer-bottom{
                gap:3px 12px;
                padding-top:16px;
                font-size:6.5px;
            }
        }

        @media (max-width:390px){
            .rk-footer-main{
                gap:11px;
            }

            .rk-footer-column h4{
                font-size:9px;
            }

            .rk-footer-column > a:not(.rk-contact){
                font-size:6.7px;
            }

            .rk-contact-icon{
                width:23px;
                height:23px;
                flex-basis:23px;
            }

            .rk-contact-value{
                font-size:5.8px;
            }
        }



/* =========================================================
   FINAL MOBILE POLISH
   Deskripsi hero lebih rapi + footer tidak berantakan
========================================================= */

@media (max-width:700px){
    .rk-hero-copy{
        width:100%;
        max-width:100%;
        padding-left:0;
        padding-right:0;
    }

    .rk-hero-title{
        width:100%;
        max-width:350px;
        margin-left:auto;
        margin-right:auto;
        text-align:center;
    }

    .rk-hero-desc{
        width:calc(100% - 28px) !important;
        max-width:330px !important;
        margin:15px auto 0 !important;
        text-align:center;
        font-size:10px !important;
        line-height:1.65 !important;
        overflow-wrap:break-word;
    }

    /* Footer tetap satu footer, tetapi susunannya bersih di HP */
    .rk-footer{
        padding:30px 0 16px !important;
    }

    .rk-footer .rk-container{
        width:calc(100% - 28px) !important;
        max-width:520px;
        margin:0 auto;
    }

    .rk-footer-main{
        width:100% !important;
        max-width:none !important;
        display:grid !important;
        grid-template-columns:1fr 1fr !important;
        gap:26px 22px !important;
        padding-bottom:22px !important;
    }

    .rk-footer-column{
        min-width:0 !important;
    }

    .rk-footer-column h4{
        margin:0 0 11px !important;
        font-size:11px !important;
        line-height:1.3;
    }

    .rk-footer-column > a:not(.rk-contact){
        display:flex !important;
        width:max-content;
        max-width:100%;
        align-items:center;
        gap:5px !important;
        margin-bottom:8px !important;
        font-size:8px !important;
        line-height:1.4 !important;
        white-space:nowrap;
    }

    .rk-footer-column > a:not(.rk-contact) i{
        flex:0 0 auto;
        font-size:7px !important;
    }

    /* Hubungi Kami mengambil satu baris penuh supaya nomor/email tidak sempit */
    .rk-footer-contact{
        grid-column:1 / -1;
        width:100%;
        padding-top:2px;
    }

    .rk-footer-contact .rk-contact-list{
        display:grid;
        grid-template-columns:repeat(3,minmax(0,1fr));
        gap:10px;
        width:100%;
    }

    .rk-footer-contact .rk-contact{
        min-width:0;
        display:flex;
        align-items:center;
        gap:7px;
    }

    .rk-contact-icon{
        width:27px !important;
        height:27px !important;
        flex:0 0 27px !important;
        border-radius:8px !important;
        font-size:10px !important;
    }

    .rk-contact-content{
        min-width:0;
        overflow:hidden;
    }

    .rk-contact-label{
        font-size:6.5px !important;
        line-height:1.2;
    }

    .rk-contact-value{
        display:block;
        max-width:100%;
        font-size:7px !important;
        line-height:1.35;
        white-space:nowrap;
        overflow:hidden;
        text-overflow:ellipsis;
    }

    .rk-footer-bottom{
        display:flex !important;
        flex-direction:column;
        gap:3px !important;
        padding-top:15px !important;
        font-size:6.8px !important;
        line-height:1.5 !important;
    }
}

@media (max-width:430px){
    .rk-hero-title{
        max-width:330px;
    }

    .rk-hero-desc{
        width:calc(100% - 34px) !important;
        max-width:310px !important;
        font-size:9.5px !important;
    }

    .rk-footer .rk-container{
        width:calc(100% - 24px) !important;
    }

    .rk-footer-main{
        gap:23px 18px !important;
    }

    .rk-footer-contact .rk-contact-list{
        grid-template-columns:1fr;
        gap:8px;
    }

    .rk-footer-contact .rk-contact{
        width:100%;
    }

    .rk-contact-value{
        font-size:7.5px !important;
    }
}

@media (max-width:360px){
    .rk-hero-title{
        max-width:300px;
    }

    .rk-hero-desc{
        max-width:285px !important;
        font-size:9px !important;
    }

    .rk-footer-main{
        gap:20px 14px !important;
    }

    .rk-footer-column h4{
        font-size:10px !important;
    }

    .rk-footer-column > a:not(.rk-contact){
        font-size:7.2px !important;
    }
}



/* =========================================================
   FINAL MOBILE HEADER + FOOTER FIX
========================================================= */
@media (max-width:1000px){
    /* Pastikan menu benar-benar tampil ketika tombol garis 3 ditekan */
    .rk-nav.mobile-open{
        display:flex !important;
        position:absolute !important;
        visibility:visible !important;
        opacity:1 !important;
        pointer-events:auto !important;
        flex-direction:column !important;
        align-items:stretch !important;
        gap:2px !important;
        padding:10px !important;
        background:#06101d !important;
        border:1px solid rgba(255,255,255,.09) !important;
        border-radius:14px !important;
        box-shadow:0 20px 50px rgba(0,0,0,.45) !important;
    }

    .rk-nav.mobile-open > a{
        display:flex !important;
        align-items:center !important;
        min-height:42px !important;
        padding:10px 13px !important;
        color:#cbd5e1 !important;
        background:transparent !important;
        border-radius:9px !important;
        font-size:11px !important;
        font-weight:700 !important;
    }

    .rk-nav.mobile-open > a:hover,
    .rk-nav.mobile-open > a.active{
        color:#fff !important;
        background:rgba(37,99,235,.13) !important;
    }

    .rk-nav.mobile-open .rk-nav-mobile-account{
        display:block !important;
        margin-top:6px !important;
        padding-top:7px !important;
        border-top:1px solid rgba(255,255,255,.08) !important;
    }

    .rk-nav.mobile-open .rk-nav-mobile-label{
        display:block !important;
        padding:7px 13px 4px !important;
        color:#64748b !important;
        font-size:8px !important;
        font-weight:800 !important;
        letter-spacing:.08em !important;
    }

    .rk-nav.mobile-open .rk-nav-mobile-account a{
        display:flex !important;
        align-items:center !important;
        min-height:40px !important;
        padding:9px 13px !important;
        color:#cbd5e1 !important;
        background:transparent !important;
        font-size:11px !important;
    }

    .rk-nav.mobile-open .rk-nav-mobile-account a i{
        width:18px !important;
        color:#38bdf8 !important;
        font-size:13px !important;
    }
}

@media (max-width:700px){
    /* Footer HP: 3 bagian tetap satu footer, rapi dan seimbang */
    .rk-footer{
        padding:34px 0 18px !important;
    }

    .rk-footer .rk-container{
        width:calc(100% - 28px) !important;
        max-width:560px !important;
    }

    .rk-footer-main{
        display:grid !important;
        grid-template-columns:repeat(3,minmax(0,1fr)) !important;
        gap:18px !important;
        align-items:start !important;
        padding-bottom:22px !important;
    }

    .rk-footer-column,
    .rk-footer-contact{
        grid-column:auto !important;
        width:100% !important;
        min-width:0 !important;
        padding:0 !important;
    }

    .rk-footer-column h4{
        margin:0 0 12px !important;
        color:#fff !important;
        font-size:10px !important;
        font-weight:800 !important;
    }

    .rk-footer-column > a:not(.rk-contact){
        display:flex !important;
        align-items:center !important;
        gap:4px !important;
        width:100% !important;
        margin:0 0 9px !important;
        padding:0 !important;
        color:#71829a !important;
        font-size:8px !important;
        line-height:1.3 !important;
        white-space:normal !important;
    }

    .rk-footer-column > a:not(.rk-contact) i{
        flex:0 0 auto !important;
        width:10px !important;
        font-size:7px !important;
    }

    .rk-footer-contact .rk-contact-list{
        display:flex !important;
        flex-direction:column !important;
        gap:8px !important;
        width:100% !important;
    }

    .rk-footer-contact .rk-contact{
        display:flex !important;
        align-items:center !important;
        gap:6px !important;
        width:100% !important;
        min-width:0 !important;
        margin:0 !important;
        padding:0 !important;
        background:transparent !important;
        border:0 !important;
    }

    .rk-contact-icon{
        width:22px !important;
        height:22px !important;
        min-width:22px !important;
        display:flex !important;
        align-items:center !important;
        justify-content:center !important;
        border-radius:6px !important;
        font-size:9px !important;
    }

    .rk-contact-content{
        min-width:0 !important;
        display:flex !important;
        flex-direction:column !important;
        overflow:hidden !important;
    }

    .rk-contact-label{
        font-size:6px !important;
        line-height:1.2 !important;
        color:#475569 !important;
    }

    .rk-contact-value{
        display:block !important;
        max-width:100% !important;
        color:#71829a !important;
        font-size:7px !important;
        line-height:1.35 !important;
        white-space:nowrap !important;
        overflow:hidden !important;
        text-overflow:ellipsis !important;
    }

    .rk-footer-bottom{
        display:flex !important;
        flex-direction:column !important;
        align-items:center !important;
        justify-content:center !important;
        gap:2px !important;
        padding-top:16px !important;
        text-align:center !important;
        font-size:6.8px !important;
        line-height:1.5 !important;
    }
}

@media (max-width:430px){
    .rk-header-inner{
        width:calc(100% - 16px) !important;
    }

    .rk-header-actions{
        gap:6px !important;
    }

    .rk-login,
    .rk-register{
        font-size:8px !important;
    }

    .rk-menu{
        width:33px !important;
        height:33px !important;
        flex-basis:33px !important;
    }

    .rk-footer .rk-container{
        width:calc(100% - 22px) !important;
    }

    .rk-footer-main{
        gap:13px !important;
    }

    .rk-footer-column h4{
        font-size:9px !important;
    }

    .rk-footer-column > a:not(.rk-contact){
        font-size:7px !important;
    }

    .rk-contact-icon{
        width:20px !important;
        min-width:20px !important;
        height:20px !important;
        font-size:8px !important;
    }

    .rk-contact-label{
        font-size:5.5px !important;
    }

    .rk-contact-value{
        font-size:6.5px !important;
    }
}

@media (max-width:360px){
    .rk-header-actions{
        gap:5px !important;
    }

    .rk-login,
    .rk-register{
        font-size:7.5px !important;
    }

    .rk-menu{
        width:31px !important;
        height:31px !important;
        flex-basis:31px !important;
    }

    .rk-footer-main{
        gap:10px !important;
    }

    .rk-footer-column h4{
        font-size:8.5px !important;
    }

    .rk-footer-column > a:not(.rk-contact){
        font-size:6.6px !important;
    }
}


/* =========================================================
   FINAL FOOTER — 3 KOLOM SELALU SEJAJAR
   Navigasi | Bantuan | Hubungi Kami
========================================================= */

.rk-footer-main{
    display:grid !important;
    grid-template-columns:repeat(3,minmax(0,1fr)) !important;
    align-items:start !important;
    justify-content:center !important;
    width:100% !important;
    max-width:980px !important;
    margin:0 auto !important;
    column-gap:56px !important;
}

.rk-footer-column,
.rk-footer-contact{
    width:100% !important;
    min-width:0 !important;
    grid-column:auto !important;
}

.rk-footer-column h4{
    margin-top:0 !important;
}

.rk-footer-column > a:not(.rk-contact){
    width:fit-content !important;
    max-width:100% !important;
}

.rk-footer-contact .rk-contact-list{
    width:100% !important;
}

.rk-footer-contact .rk-contact{
    width:100% !important;
    min-width:0 !important;
}

.rk-contact-content{
    min-width:0 !important;
    max-width:100% !important;
}

.rk-contact-value{
    max-width:100% !important;
    overflow-wrap:anywhere !important;
}

/* HP: tetap 3 kolom sejajar, tetapi dipadatkan */
@media (max-width:700px){
    .rk-footer{
        padding:30px 0 16px !important;
    }

    .rk-footer .rk-container{
        width:calc(100% - 28px) !important;
        max-width:900px !important;
    }

    .rk-footer-main{
        grid-template-columns:repeat(3,minmax(0,1fr)) !important;
        column-gap:18px !important;
        row-gap:0 !important;
        align-items:start !important;
        max-width:700px !important;
    }

    .rk-footer-column,
    .rk-footer-contact{
        grid-column:auto !important;
        width:100% !important;
        min-width:0 !important;
    }

    .rk-footer-column h4{
        font-size:10px !important;
        line-height:1.2 !important;
        margin:0 0 12px !important;
        white-space:nowrap !important;
    }

    .rk-footer-column > a:not(.rk-contact){
        width:100% !important;
        margin-bottom:9px !important;
        font-size:8px !important;
        line-height:1.35 !important;
        white-space:normal !important;
    }

    .rk-footer-column > a:not(.rk-contact) i{
        width:9px !important;
        flex:0 0 9px !important;
    }

    .rk-footer-contact .rk-contact-list{
        display:flex !important;
        flex-direction:column !important;
        gap:8px !important;
    }

    .rk-footer-contact .rk-contact{
        display:flex !important;
        align-items:center !important;
        gap:5px !important;
        margin:0 !important;
        padding:0 !important;
    }

    .rk-contact-icon{
        width:22px !important;
        min-width:22px !important;
        height:22px !important;
        flex:0 0 22px !important;
        border-radius:6px !important;
    }

    .rk-contact-content{
        flex:1 1 auto !important;
        width:0 !important;
        min-width:0 !important;
    }

    .rk-contact-label{
        display:block !important;
        font-size:6px !important;
        line-height:1.15 !important;
    }

    .rk-contact-value{
        display:block !important;
        width:100% !important;
        max-width:100% !important;
        font-size:6.5px !important;
        line-height:1.35 !important;
        white-space:normal !important;
        overflow-wrap:anywhere !important;
        word-break:break-word !important;
    }

    .rk-footer-bottom{
        margin-top:4px !important;
        padding-top:15px !important;
        text-align:center !important;
    }
}

@media (max-width:430px){
    .rk-footer .rk-container{
        width:calc(100% - 20px) !important;
    }

    .rk-footer-main{
        column-gap:11px !important;
    }

    .rk-footer-column h4{
        font-size:9px !important;
        margin-bottom:10px !important;
    }

    .rk-footer-column > a:not(.rk-contact){
        font-size:7px !important;
        margin-bottom:8px !important;
        gap:3px !important;
    }

    .rk-footer-column > a:not(.rk-contact) i{
        width:8px !important;
        flex-basis:8px !important;
        font-size:6px !important;
    }

    .rk-contact-icon{
        width:19px !important;
        min-width:19px !important;
        height:19px !important;
        flex-basis:19px !important;
        font-size:7px !important;
    }

    .rk-contact-label{
        font-size:5px !important;
    }

    .rk-contact-value{
        font-size:5.8px !important;
    }
}

@media (max-width:360px){
    .rk-footer .rk-container{
        width:calc(100% - 16px) !important;
    }

    .rk-footer-main{
        column-gap:8px !important;
    }

    .rk-footer-column h4{
        font-size:8px !important;
    }

    .rk-footer-column > a:not(.rk-contact){
        font-size:6.3px !important;
    }

    .rk-contact-icon{
        width:18px !important;
        min-width:18px !important;
        height:18px !important;
        flex-basis:18px !important;
    }

    .rk-contact-label{
        font-size:4.7px !important;
    }

    .rk-contact-value{
        font-size:5.3px !important;
    }
}



/* =========================================================
   FOOTER FIX — POSISI 3 KOLOM BENAR-BENAR SEJAJAR
   Navigasi | Bantuan | Hubungi Kami
========================================================= */

.rk-footer-main{
    display:grid !important;
    grid-template-columns:minmax(0,1fr) minmax(0,1fr) minmax(0,1fr) !important;
    grid-template-areas:none !important;
    align-items:start !important;
    gap:40px !important;
    width:100% !important;
    max-width:960px !important;
    margin:0 auto !important;
}

.rk-footer-main > .rk-footer-column:nth-child(1),
.rk-footer-main > .rk-footer-column:nth-child(2),
.rk-footer-main > .rk-footer-column:nth-child(3){
    grid-area:auto !important;
    grid-column:auto !important;
    grid-row:auto !important;
    align-self:start !important;
    width:100% !important;
    min-width:0 !important;
    margin:0 !important;
    padding:0 !important;
}

/* Pastikan ketiga judul mulai dari tinggi yang sama */
.rk-footer-main > .rk-footer-column h4{
    margin-top:0 !important;
}

/* HP tetap 3 kolom, bukan 1 kolom / 2+1 */
@media (max-width:700px){
    .rk-footer{
        padding:28px 0 16px !important;
    }

    .rk-footer-main{
        display:grid !important;
        grid-template-columns:minmax(0,1fr) minmax(0,1fr) minmax(0,1fr) !important;
        grid-template-areas:none !important;
        gap:0 12px !important;
        width:100% !important;
        max-width:none !important;
        margin:0 auto !important;
        padding:0 0 20px !important;
        align-items:start !important;
    }

    .rk-footer-main > .rk-footer-column:nth-child(1),
    .rk-footer-main > .rk-footer-column:nth-child(2),
    .rk-footer-main > .rk-footer-column:nth-child(3){
        grid-area:auto !important;
        grid-column:auto !important;
        grid-row:auto !important;
        align-self:start !important;
        width:100% !important;
        margin:0 !important;
        padding:0 !important;
    }

    .rk-footer-main > .rk-footer-column h4{
        min-height:14px !important;
        margin:0 0 11px !important;
        white-space:nowrap !important;
        font-size:10px !important;
    }

    .rk-footer-main > .rk-footer-column > a:not(.rk-contact){
        width:100% !important;
        max-width:100% !important;
        margin:0 0 8px !important;
        font-size:7.5px !important;
        white-space:normal !important;
    }

    .rk-footer-main > .rk-footer-contact .rk-contact-list{
        display:flex !important;
        flex-direction:column !important;
        gap:8px !important;
        width:100% !important;
    }

    .rk-footer-main > .rk-footer-contact .rk-contact{
        width:100% !important;
        min-width:0 !important;
        gap:5px !important;
    }

    .rk-footer-main > .rk-footer-contact .rk-contact-icon{
        width:22px !important;
        height:22px !important;
        min-width:22px !important;
        flex:0 0 22px !important;
    }

    .rk-footer-main > .rk-footer-contact .rk-contact-content{
        min-width:0 !important;
        width:0 !important;
        flex:1 1 auto !important;
    }

    .rk-footer-main > .rk-footer-contact .rk-contact-label{
        font-size:5.5px !important;
    }

    .rk-footer-main > .rk-footer-contact .rk-contact-value{
        font-size:6px !important;
        overflow-wrap:anywhere !important;
        word-break:break-word !important;
    }
}

@media (max-width:430px){
    .rk-footer .rk-container{
        width:calc(100% - 20px) !important;
    }

    .rk-footer-main{
        grid-template-columns:minmax(0,1fr) minmax(0,1fr) minmax(0,1fr) !important;
        gap:0 8px !important;
    }

    .rk-footer-main > .rk-footer-column h4{
        font-size:8px !important;
        margin-bottom:9px !important;
    }

    .rk-footer-main > .rk-footer-column > a:not(.rk-contact){
        font-size:6.5px !important;
        margin-bottom:7px !important;
    }

    .rk-footer-main > .rk-footer-contact .rk-contact-icon{
        width:19px !important;
        height:19px !important;
        min-width:19px !important;
        flex-basis:19px !important;
        font-size:7px !important;
    }

    .rk-footer-main > .rk-footer-contact .rk-contact-label{
        font-size:4.8px !important;
    }

    .rk-footer-main > .rk-footer-contact .rk-contact-value{
        font-size:5.4px !important;
    }
}



/* =========================================================
   FOOTER — GESER KE TENGAH
========================================================= */
.rk-footer-main{
    width:calc(100% - 80px) !important;
    max-width:900px !important;
    margin-left:auto !important;
    margin-right:auto !important;
    padding-left:20px !important;
    padding-right:20px !important;
    box-sizing:border-box !important;
}

@media (max-width:700px){
    .rk-footer .rk-container{
        width:100% !important;
        padding-left:20px !important;
        padding-right:20px !important;
        box-sizing:border-box !important;
    }

    .rk-footer-main{
        width:100% !important;
        max-width:620px !important;
        margin-left:auto !important;
        margin-right:auto !important;
        padding-left:8px !important;
        padding-right:8px !important;
        box-sizing:border-box !important;
    }
}

@media (max-width:430px){
    .rk-footer .rk-container{
        padding-left:14px !important;
        padding-right:14px !important;
    }

    .rk-footer-main{
        max-width:390px !important;
        padding-left:4px !important;
        padding-right:4px !important;
    }
}



        /* =========================================================
           FINAL HEADER ALIGNMENT
           Header sejajar dengan container kategori/konten
           dan tidak terlalu mepet ke sisi layar
        ========================================================= */
        .rk-header-inner{
            width:min(var(--container), calc(100% - 48px)) !important;
            max-width:var(--container) !important;
            margin-left:auto !important;
            margin-right:auto !important;
        }

        @media (max-width:1000px){
            .rk-header-inner{
                width:calc(100% - 44px) !important;
                max-width:none !important;
                margin-left:auto !important;
                margin-right:auto !important;
            }
        }

        @media (max-width:700px){
            .rk-header-inner{
                width:calc(100% - 40px) !important;
                max-width:none !important;
                margin-left:auto !important;
                margin-right:auto !important;
            }
        }

        @media (max-width:430px){
            .rk-header-inner{
                width:calc(100% - 36px) !important;
                max-width:none !important;
                margin-left:auto !important;
                margin-right:auto !important;
            }
        }
</style>
</head>

<body>

<div class="rk-page">

    {{-- =========================================================
         HEADER
    ========================================================= --}}
    <header class="rk-header" id="rkHeader">

        <div class="rk-container rk-header-inner">

            <a href="{{ url('/') }}" class="rk-logo">

                <div class="rk-logo-icon">
                    <i class="bi bi-box-seam"></i>
                </div>

                <div class="rk-logo-text">
                    Rental<span>Ku</span>
                </div>

            </a>


            <nav class="rk-nav" id="rkNav">

                <a href="#beranda" class="active">
                    Beranda
                </a>

                <a href="#kategori">
                    Kategori
                </a>

                <a href="#barang">
                    Barang
                </a>

                <a href="#cara-rental">
                    Cara Rental
                </a>

                <a href="#tentang">
                    Tentang
                </a>

                <div class="rk-nav-mobile-account">
                    <div class="rk-nav-mobile-label">Akun</div>

                    <a href="{{ route('login') }}">
                        <i class="bi bi-box-arrow-in-right"></i>
                        Masuk
                    </a>

                    <a href="{{ route('register') }}">
                        <i class="bi bi-person-plus"></i>
                        Daftar
                    </a>
                </div>

            </nav>


            <div class="rk-header-actions">

                <a
                    href="{{ route('login') }}"
                    class="rk-login"
                >
                    Masuk
                </a>

                <a
                    href="{{ route('register') }}"
                    class="rk-register"
                >
                    Daftar
                    <i class="bi bi-arrow-right"></i>
                </a>

                <button
                    type="button"
                    class="rk-menu"
                    id="rkMenu"
                    aria-label="Buka menu"
                >
                    <i class="bi bi-list"></i>
                </button>

            </div>

        </div>

    </header>


    {{-- =========================================================
         HERO
    ========================================================= --}}
    <section class="rk-hero" id="beranda">

        <div class="rk-container rk-hero-grid">

            <div class="rk-hero-copy rk-reveal">

                <div class="rk-badge">

                    <span class="rk-badge-dot"></span>

                    Platform Rental Digital

                </div>


                <h1 class="rk-hero-title">

                    Sewa barang.

                    <span>
                        Tanpa ribet.
                    </span>

                </h1>


                <p class="rk-hero-desc">

                    Temukan berbagai kebutuhan rental dalam satu tempat.
                    Pilih barang, tentukan tanggal, dan nikmati proses
                    penyewaan yang lebih cepat dan praktis.

                </p>


                <div class="rk-hero-actions">

                    <a
                        href="#barang"
                        class="rk-primary"
                    >
                        <i class="bi bi-search"></i>
                        Jelajahi Barang
                    </a>

                    <a
                        href="#cara-rental"
                        class="rk-secondary"
                    >
                        <i class="bi bi-play-circle"></i>
                        Cara Rental
                    </a>

                </div>


                <div class="rk-trust-text">

                    <span>
                        <i class="bi bi-check-circle-fill"></i>
                        Barang Terverifikasi
                    </span>

                    <span>
                        <i class="bi bi-check-circle-fill"></i>
                        Proses Mudah
                    </span>

                    <span>
                        <i class="bi bi-check-circle-fill"></i>
                        Aman
                    </span>

                </div>

            </div>


            {{-- =================================================
                 VISUAL
            ================================================= --}}
            <div class="rk-visual rk-reveal">

                <div class="rk-glow"></div>

                <div
                    class="rk-dashboard-stage"
                    id="rkDashboard"
                >

                    <div class="rk-ring one"></div>
                    <div class="rk-ring two"></div>

                    <div class="rk-dot a"></div>
                    <div class="rk-dot b"></div>
                    <div class="rk-dot c"></div>

                    <div class="rk-dashboard-depth"></div>


                    <div class="rk-dashboard">

                        <div class="rk-dashboard-top">

                            <div class="rk-dashboard-brand">

                                <div class="rk-dashboard-brand-icon">
                                    <i class="bi bi-grid-1x2-fill"></i>
                                </div>

                                RentalKu Dashboard

                            </div>


                            <div class="rk-dashboard-user">

                                Admin Rental

                                <div class="rk-user">
                                    <i class="bi bi-person-fill"></i>
                                </div>

                            </div>

                        </div>


                        <div class="rk-dashboard-body">

                            <div class="rk-dash-sidebar">

                                <div class="rk-side-label">
                                    Menu
                                </div>

                                <div class="rk-side-item active">
                                    <i class="bi bi-grid"></i>
                                    Dashboard
                                </div>

                                <div class="rk-side-item">
                                    <i class="bi bi-box"></i>
                                    Data Barang
                                </div>

                                <div class="rk-side-item">
                                    <i class="bi bi-people"></i>
                                    Pelanggan
                                </div>

                                <div class="rk-side-item">
                                    <i class="bi bi-calendar-check"></i>
                                    Penyewaan
                                </div>

                                <div class="rk-side-item">
                                    <i class="bi bi-wallet2"></i>
                                    Pembayaran
                                </div>

                                <div
                                    class="rk-side-label"
                                    style="margin-top:13px;"
                                >
                                    Lainnya
                                </div>

                                <div class="rk-side-item">
                                    <i class="bi bi-bar-chart"></i>
                                    Laporan
                                </div>

                            </div>


                            <div class="rk-dash-content">

                                <div class="rk-dash-title">

                                    <h3>
                                        Ringkasan
                                    </h3>

                                    <span>
                                        Hari ini
                                    </span>

                                </div>


                                <div class="rk-stat-grid">

                                    <div class="rk-stat">

                                        <div class="rk-stat-icon">
                                            <i class="bi bi-box-seam"></i>
                                        </div>

                                        <div class="rk-stat-label">
                                            Total Barang
                                        </div>

                                        <div class="rk-stat-value">
                                            128
                                        </div>

                                    </div>


                                    <div class="rk-stat">

                                        <div class="rk-stat-icon">
                                            <i class="bi bi-arrow-repeat"></i>
                                        </div>

                                        <div class="rk-stat-label">
                                            Barang Disewa
                                        </div>

                                        <div class="rk-stat-value">
                                            36
                                        </div>

                                    </div>


                                    <div class="rk-stat">

                                        <div class="rk-stat-icon">
                                            <i class="bi bi-people"></i>
                                        </div>

                                        <div class="rk-stat-label">
                                            Pelanggan
                                        </div>

                                        <div class="rk-stat-value">
                                            84
                                        </div>

                                    </div>

                                </div>


                                <div class="rk-dash-lower">

                                    <div class="rk-chart">

                                        <div class="rk-chart-title">
                                            Statistik Penyewaan
                                        </div>

                                        <svg
                                            viewBox="0 0 300 80"
                                            preserveAspectRatio="none"
                                        >

                                            <path
                                                class="rk-chart-area"
                                                d="M0,65 L30,58 L60,62 L90,45 L120,52 L150,32 L180,40 L210,20 L240,27 L270,12 L300,18 L300,80 L0,80 Z"
                                            />

                                            <path
                                                class="rk-chart-line"
                                                d="M0,65 L30,58 L60,62 L90,45 L120,52 L150,32 L180,40 L210,20 L240,27 L270,12 L300,18"
                                            />

                                        </svg>

                                    </div>


                                    <div class="rk-recent">

                                        <div class="rk-recent-title">
                                            Rental Terbaru
                                        </div>

                                        <div class="rk-rental-row">

                                            <div class="rk-rental-name">
                                                <span class="rk-rental-dot"></span>
                                                Kamera
                                            </div>

                                            <span class="rk-rental-price">
                                                Rp120k
                                            </span>

                                        </div>


                                        <div class="rk-rental-row">

                                            <div class="rk-rental-name">
                                                <span class="rk-rental-dot"></span>
                                                Tenda
                                            </div>

                                            <span class="rk-rental-price">
                                                Rp80k
                                            </span>

                                        </div>


                                        <div class="rk-rental-row">

                                            <div class="rk-rental-name">
                                                <span class="rk-rental-dot"></span>
                                                Speaker
                                            </div>

                                            <span class="rk-rental-price">
                                                Rp100k
                                            </span>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- FLOATING TOTAL --}}
                    <div class="rk-float rk-float-orders">

                        <div class="rk-float-head">

                            <span>
                                Total Penyewaan
                            </span>

                            <i class="bi bi-graph-up-arrow"></i>

                        </div>

                        <div class="rk-order-big">
                            248
                        </div>

                        <div class="rk-order-small">
                            ↑ 18.6% bulan ini
                        </div>

                    </div>


                    {{-- FLOATING STATUS --}}
                    <div class="rk-float rk-float-status">

                        <div class="rk-status-head">

                            <div class="rk-status-icon">
                                <i class="bi bi-check-lg"></i>
                            </div>

                            <div>

                                <div class="rk-status-title">
                                    Rental Aktif
                                </div>

                                <div class="rk-status-sub">
                                    36 transaksi berjalan
                                </div>

                            </div>

                        </div>

                        <div class="rk-status-bar">
                            <div class="rk-status-progress"></div>
                        </div>

                    </div>


                    {{-- FLOATING PRODUCT --}}
                    <div class="rk-float rk-float-product">

                        <div class="rk-product-icon">
                            <i class="bi bi-camera"></i>
                        </div>

                        <div class="rk-product-info">

                            <strong>
                                Kamera Mirrorless
                            </strong>

                            <span>
                                Tersedia untuk disewa
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
         TRUST BAR
    ========================================================= --}}
    <section class="rk-trust-bar">

        <div class="rk-container">

            <div class="rk-trust-grid">

                <div class="rk-trust-item">

                    <div class="rk-trust-icon">
                        <i class="bi bi-box-seam"></i>
                    </div>

                    <div>
                        <strong>Banyak Barang</strong>
                        <small>Pilihan lebih lengkap</small>
                    </div>

                </div>


                <div class="rk-trust-item">

                    <div class="rk-trust-icon">
                        <i class="bi bi-lightning-charge"></i>
                    </div>

                    <div>
                        <strong>Proses Cepat</strong>
                        <small>Rental tanpa ribet</small>
                    </div>

                </div>


                <div class="rk-trust-item">

                    <div class="rk-trust-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>

                    <div>
                        <strong>Lebih Aman</strong>
                        <small>Data terkelola</small>
                    </div>

                </div>


                <div class="rk-trust-item">

                    <div class="rk-trust-icon">
                        <i class="bi bi-headset"></i>
                    </div>

                    <div>
                        <strong>Bantuan</strong>
                        <small>Siap membantu</small>
                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
         DATA KATEGORI
    ========================================================= --}}
    @php

        $landingCategories = \App\Models\Category::with([
            'products' => function ($query) {
                $query->latest();
            }
        ])
        ->latest()
        ->take(8)
        ->get();

        $categoryIcons = [
            'bi-camera',
            'bi-backpack',
            'bi-house',
            'bi-speaker',
            'bi-camera-reels',
            'bi-bicycle',
            'bi-tools',
            'bi-box-seam'
        ];

    @endphp


    {{-- =========================================================
         KATEGORI
    ========================================================= --}}
    <section
        class="rk-section"
        id="kategori"
    >

        <div class="rk-container">

            <div class="rk-section-head rk-reveal">

                <div class="rk-label">
                    Kategori
                </div>

                <h2 class="rk-section-title">
                    Pilih sesuai kebutuhanmu
                </h2>

                <p class="rk-section-desc">
                    Berbagai kategori barang tersedia untuk membantu
                    memenuhi kebutuhanmu dengan lebih mudah.
                </p>

            </div>


            <div class="rk-category-grid">

                @forelse($landingCategories as $index => $category)

                    <a
                        href="{{ url('/produk?category=' . $category->id) }}"
                        class="rk-category rk-reveal"
                    >

                        <div class="rk-category-icon">

                            <i class="bi {{ $categoryIcons[$index % count($categoryIcons)] }}"></i>

                        </div>

                        <h3>
                            {{ $category->name }}
                        </h3>

                        <p>
                            {{ $category->products->count() }}
                            barang tersedia
                        </p>

                    </a>

                @empty

                    @foreach([
                        ['Kamera','bi-camera'],
                        ['Outdoor','bi-backpack'],
                        ['Elektronik','bi-speaker'],
                        ['Furniture','bi-house']
                    ] as $item)

                        <a
                            href="#barang"
                            class="rk-category rk-reveal"
                        >

                            <div class="rk-category-icon">
                                <i class="bi {{ $item[1] }}"></i>
                            </div>

                            <h3>
                                {{ $item[0] }}
                            </h3>

                            <p>
                                Berbagai pilihan barang
                            </p>

                        </a>

                    @endforeach

                @endforelse

            </div>

        </div>

    </section>


    {{-- =========================================================
         DATA PRODUK
    ========================================================= --}}
    @php

        $landingProducts = \App\Models\Product::with('category')
            ->where('status', 'Aktif')
            ->latest()
            ->take(8)
            ->get();

        if ($landingProducts->count() === 0) {

            $landingProducts = \App\Models\Product::with('category')
                ->latest()
                ->take(8)
                ->get();

        }

    @endphp


    {{-- =========================================================
         BARANG
    ========================================================= --}}
    <section
        class="rk-section"
        id="barang"
    >

        <div class="rk-container">

            <div class="rk-section-head rk-reveal">

                <div class="rk-label">
                    Barang Pilihan
                </div>

                <h2 class="rk-section-title">
                    Barang yang siap kamu sewa
                </h2>

                <p class="rk-section-desc">
                    Pilih barang yang kamu butuhkan dan mulai proses
                    penyewaan dengan mudah.
                </p>

            </div>


            <div class="rk-product-grid">

                @forelse($landingProducts as $product)

                    <div class="rk-product-card rk-reveal">

                        <div class="rk-product-img">

                            @if($product->image)

                                <img
                                    src="{{ asset('uploads/products/' . $product->image) }}"
                                    alt="{{ $product->name }}"
                                    loading="lazy"
                                >

                            @else

                                <div class="rk-placeholder">

                                    <i class="bi bi-box-seam"></i>

                                </div>

                            @endif

                        </div>


                        <div class="rk-product-content">

                            <div class="rk-product-category">

                                {{ $product->category->name ?? 'Barang' }}

                            </div>


                            <div class="rk-product-name">

                                {{ $product->name }}

                            </div>


                            <div class="rk-product-bottom">

                                <div class="rk-price">

                                    Rp{{ number_format($product->price_per_day ?? 0, 0, ',', '.') }}

                                    <small>
                                        /hari
                                    </small>

                                </div>


                                <a
                                    href="{{ url('/produk/' . $product->id) }}"
                                    class="rk-product-btn"
                                    aria-label="Lihat {{ $product->name }}"
                                >
                                    <i class="bi bi-arrow-up-right"></i>
                                </a>

                            </div>

                        </div>

                    </div>

                @empty

                    <div
                        style="
                            grid-column:1/-1;
                            text-align:center;
                            padding:60px 20px;
                            color:#64748b;
                        "
                    >

                        <i
                            class="bi bi-box-seam"
                            style="
                                display:block;
                                font-size:40px;
                                margin-bottom:15px;
                            "
                        ></i>

                        Belum ada barang yang tersedia.

                    </div>

                @endforelse

            </div>

        </div>

    </section>


    {{-- =========================================================
         CARA RENTAL
    ========================================================= --}}
    <section
        class="rk-section"
        id="cara-rental"
    >

        <div class="rk-container">

            <div class="rk-section-head rk-reveal">

                <div class="rk-label">
                    Cara Rental
                </div>

                <h2 class="rk-section-title">
                    Semudah ini prosesnya
                </h2>

                <p class="rk-section-desc">
                    Tidak perlu proses yang rumit. Ikuti beberapa
                    langkah sederhana berikut.
                </p>

            </div>


            <div class="rk-process-grid">

                <div class="rk-process rk-reveal">

                    <span class="rk-process-number">
                        01
                    </span>

                    <div class="rk-process-icon">
                        <i class="bi bi-person-plus"></i>
                    </div>

                    <h3>
                        Daftar
                    </h3>

                    <p>
                        Buat akun untuk mulai menggunakan RentalKu.
                    </p>

                </div>


                <div class="rk-process rk-reveal">

                    <span class="rk-process-number">
                        02
                    </span>

                    <div class="rk-process-icon">
                        <i class="bi bi-search"></i>
                    </div>

                    <h3>
                        Pilih Barang
                    </h3>

                    <p>
                        Cari barang sesuai kebutuhanmu.
                    </p>

                </div>


                <div class="rk-process rk-reveal">

                    <span class="rk-process-number">
                        03
                    </span>

                    <div class="rk-process-icon">
                        <i class="bi bi-calendar2-check"></i>
                    </div>

                    <h3>
                        Ajukan Rental
                    </h3>

                    <p>
                        Tentukan tanggal dan jumlah barang.
                    </p>

                </div>


                <div class="rk-process rk-reveal">

                    <span class="rk-process-number">
                        04
                    </span>

                    <div class="rk-process-icon">
                        <i class="bi bi-check-circle"></i>
                    </div>

                    <h3>
                        Tunggu Persetujuan
                    </h3>

                    <p>
                        Admin akan memeriksa dan menyetujui rental.
                    </p>

                </div>


                <div class="rk-process rk-reveal">

                    <span class="rk-process-number">
                        05
                    </span>

                    <div class="rk-process-icon">
                        <i class="bi bi-box-arrow-in-down"></i>
                    </div>

                    <h3>
                        Kembalikan
                    </h3>

                    <p>
                        Setelah selesai digunakan, barang dikembalikan.
                    </p>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
         TENTANG
    ========================================================= --}}
    <section
        class="rk-section"
        id="tentang"
    >

        <div class="rk-container">

            <div class="rk-why">

                <div class="rk-why-copy rk-reveal">

                    <div class="rk-label">
                        Kenapa RentalKu?
                    </div>

                    <h2 class="rk-why-title">

                        Rental lebih

                        <span>
                            praktis.
                        </span>

                    </h2>

                    <p class="rk-why-desc">

                        RentalKu dirancang untuk membuat proses
                        penyewaan barang menjadi lebih sederhana,
                        teratur, dan nyaman.

                    </p>


                    <div class="rk-feature-list">

                        <div class="rk-feature">

                            <div class="rk-feature-icon">
                                <i class="bi bi-search"></i>
                            </div>

                            <div>

                                <strong>
                                    Cari barang dengan mudah
                                </strong>

                                <p>
                                    Temukan berbagai barang melalui
                                    kategori dan daftar produk.
                                </p>

                            </div>

                        </div>


                        <div class="rk-feature">

                            <div class="rk-feature-icon">
                                <i class="bi bi-calendar-check"></i>
                            </div>

                            <div>

                                <strong>
                                    Atur tanggal rental
                                </strong>

                                <p>
                                    Tentukan kapan barang akan digunakan
                                    sesuai kebutuhan.
                                </p>

                            </div>

                        </div>


                        <div class="rk-feature">

                            <div class="rk-feature-icon">
                                <i class="bi bi-shield-check"></i>
                            </div>

                            <div>

                                <strong>
                                    Proses lebih terkontrol
                                </strong>

                                <p>
                                    Setiap transaksi dikelola melalui
                                    sistem RentalKu.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>


                <div class="rk-why-visual rk-reveal">

                    <div class="rk-stat-card">

                        <div class="rk-stat-header">

                            <strong>
                                Statistik Rental
                            </strong>

                            <span class="rk-live">

                                <i class="bi bi-circle-fill"></i>

                                Live

                            </span>

                        </div>


                        <div class="rk-big-number">

                            1.248

                            <small>
                                +18.4%
                            </small>

                        </div>


                        <div class="rk-stat-caption">
                            Total penyewaan
                        </div>


                        <div class="rk-bars">

                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
         CTA
    ========================================================= --}}
    <section class="rk-section">

        <div class="rk-container">

            <div class="rk-cta rk-reveal">

                <h2>
                    Siap mulai rental?
                </h2>

                <p>
                    Temukan barang yang kamu butuhkan dan mulai
                    proses penyewaan sekarang.
                </p>

                <a
                    href="#barang"
                    class="rk-primary"
                >
                    Mulai Jelajahi
                    <i class="bi bi-arrow-right"></i>
                </a>

            </div>

        </div>

    </section>


    {{-- =========================================================
         FOOTER
         Satu footer untuk desktop, tablet, dan HP
    ========================================================= --}}
    <footer class="rk-footer">

        <div class="rk-container">

            <div class="rk-footer-main">

                {{-- NAVIGASI --}}
                <div class="rk-footer-column">

                    <h4>Navigasi</h4>

                    <a href="#beranda">
                        <i class="bi bi-chevron-right"></i>
                        Beranda
                    </a>

                    <a href="#kategori">
                        <i class="bi bi-chevron-right"></i>
                        Kategori
                    </a>

                    <a href="#barang">
                        <i class="bi bi-chevron-right"></i>
                        Barang
                    </a>

                    <a href="#cara-rental">
                        <i class="bi bi-chevron-right"></i>
                        Cara Rental
                    </a>

                    <a href="#tentang">
                        <i class="bi bi-chevron-right"></i>
                        Tentang
                    </a>

                </div>


                {{-- BANTUAN --}}
                <div class="rk-footer-column">

                    <h4>Bantuan</h4>

                    <a href="#cara-rental">
                        <i class="bi bi-chevron-right"></i>
                        Cara Rental
                    </a>

                    <a href="#barang">
                        <i class="bi bi-chevron-right"></i>
                        Cari Barang
                    </a>

                    <a href="{{ route('login') }}">
                        <i class="bi bi-chevron-right"></i>
                        Masuk
                    </a>

                    <a href="{{ route('register') }}">
                        <i class="bi bi-chevron-right"></i>
                        Daftar
                    </a>

                </div>


                {{-- HUBUNGI KAMI --}}
                <div class="rk-footer-column rk-footer-contact">

                    <h4>Hubungi Kami</h4>

                    <a
                        href="https://wa.me/6285812465970"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="rk-contact"
                        aria-label="Hubungi WhatsApp"
                    >
                        <span class="rk-contact-icon">
                            <i class="bi bi-whatsapp"></i>
                        </span>

                        <span class="rk-contact-content">
                            <span class="rk-contact-label">WhatsApp</span>
                            <span class="rk-contact-value">085812465970</span>
                        </span>
                    </a>


                    <a
                        href="https://instagram.com/clsvn4a"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="rk-contact"
                        aria-label="Buka Instagram"
                    >
                        <span class="rk-contact-icon">
                            <i class="bi bi-instagram"></i>
                        </span>

                        <span class="rk-contact-content">
                            <span class="rk-contact-label">Instagram</span>
                            <span class="rk-contact-value">@clsvn4a</span>
                        </span>
                    </a>


                    <a
                        href="mailto:cintalusviana@gmail.com"
                        class="rk-contact"
                        aria-label="Kirim email"
                    >
                        <span class="rk-contact-icon">
                            <i class="bi bi-envelope"></i>
                        </span>

                        <span class="rk-contact-content">
                            <span class="rk-contact-label">Email</span>
                            <span class="rk-contact-value">cintalusviana@gmail.com</span>
                        </span>
                    </a>

                </div>

            </div>


            <div class="rk-footer-bottom">

                <span>
                    © {{ date('Y') }} RentalKu. Semua hak dilindungi.
                </span>

                <span>
                    Dibuat untuk pengalaman rental yang lebih sederhana.
                </span>

            </div>

        </div>

    </footer>

</div>


<script>
    /* =========================================================
       HEADER
    ========================================================= */
    const header = document.getElementById('rkHeader');

    window.addEventListener('scroll', function () {

        if (!header) return;

        if (window.scrollY > 20) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }

    });


    /* =========================================================
       MOBILE MENU
    ========================================================= */
    const menu = document.getElementById('rkMenu');
    const nav = document.getElementById('rkNav');

    if (menu && nav) {

        menu.addEventListener('click', function () {

            const isOpen = nav.classList.toggle('mobile-open');
            menu.setAttribute('aria-expanded', isOpen ? 'true' : 'false');

            const icon = menu.querySelector('i');

            if (
                icon &&
                nav.classList.contains('mobile-open')
            ) {
                icon.className = 'bi bi-x-lg';
            } else if (icon) {
                icon.className = 'bi bi-list';
            }

        });

    }


    /* =========================================================
       CLOSE MOBILE MENU WHEN CLICKING OUTSIDE
    ========================================================= */
    document.addEventListener('click', function (event) {
        if (!nav || !menu) return;

        if (
            nav.classList.contains('mobile-open') &&
            !nav.contains(event.target) &&
            !menu.contains(event.target)
        ) {
            nav.classList.remove('mobile-open');
            menu.setAttribute('aria-expanded', 'false');

            const icon = menu.querySelector('i');
            if (icon) icon.className = 'bi bi-list';
        }
    });


    /* =========================================================
       CLOSE MOBILE MENU
    ========================================================= */
    document
        .querySelectorAll('.rk-nav a')
        .forEach(function (link) {

            link.addEventListener('click', function () {

                if (nav) {
                    nav.classList.remove('mobile-open');
                }

                const icon = menu?.querySelector('i');

                if (icon) {
                    icon.className = 'bi bi-list';
                }

            });

        });


    /* =========================================================
       REVEAL ANIMATION
    ========================================================= */
    const revealElements =
        document.querySelectorAll('.rk-reveal');

    if ('IntersectionObserver' in window) {

        const revealObserver =
            new IntersectionObserver(
                function (entries) {

                    entries.forEach(function (entry) {

                        if (entry.isIntersecting) {

                            entry.target.classList.add('show');

                            revealObserver.unobserve(
                                entry.target
                            );

                        }

                    });

                },
                {
                    threshold:.1
                }
            );

        revealElements.forEach(function (element) {

            revealObserver.observe(element);

        });

    } else {

        revealElements.forEach(function (element) {

            element.classList.add('show');

        });

    }


    /* =========================================================
       ACTIVE NAV
    ========================================================= */
    const sections =
        document.querySelectorAll(
            '#beranda, #kategori, #barang, #cara-rental, #tentang'
        );

    const navLinks =
        document.querySelectorAll('.rk-nav a');

    window.addEventListener('scroll', function () {

        let current = '';

        sections.forEach(function (section) {

            const top =
                section.offsetTop - 160;

            if (window.scrollY >= top) {

                current =
                    section.getAttribute('id');

            }

        });

        navLinks.forEach(function (link) {

            link.classList.remove('active');

            if (
                link.getAttribute('href') ===
                '#' + current
            ) {

                link.classList.add('active');

            }

        });

    });


    /* =========================================================
       3D MOUSE PARALLAX
    ========================================================= */
    const dashboard =
        document.getElementById('rkDashboard');

    const visual =
        document.querySelector('.rk-visual');

    if (
        dashboard &&
        visual &&
        window.matchMedia('(pointer:fine)').matches
    ) {

        visual.addEventListener(
            'mousemove',
            function (e) {

                if (window.innerWidth <= 1000) {
                    return;
                }

                const rect =
                    visual.getBoundingClientRect();

                const x =
                    (e.clientX - rect.left) /
                    rect.width;

                const y =
                    (e.clientY - rect.top) /
                    rect.height;

                const rotateY =
                    -12 + ((x - .5) * 13);

                const rotateX =
                    8 - ((y - .5) * 10);

                dashboard.style.transform =
                    'rotateX(' +
                    rotateX +
                    'deg) rotateY(' +
                    rotateY +
                    'deg) rotateZ(-1deg)';

            }
        );


        visual.addEventListener(
            'mouseleave',
            function () {

                if (window.innerWidth <= 1000) {
                    return;
                }

                dashboard.style.transform =
                    'rotateX(8deg) rotateY(-12deg) rotateZ(-1deg)';

            }
        );

    }


    /* =========================================================
       IMAGE FALLBACK
    ========================================================= */
    document
        .querySelectorAll('.rk-product-img img')
        .forEach(function (img) {

            img.addEventListener(
                'error',
                function () {

                    img.parentElement.innerHTML =
                        '<div class="rk-placeholder">' +
                            '<i class="bi bi-box-seam"></i>' +
                        '</div>';

                }
            );

        });


    /* =========================================================
       SMOOTH SCROLL
    ========================================================= */
    document
        .querySelectorAll('a[href^="#"]')
        .forEach(function (anchor) {

            anchor.addEventListener(
                'click',
                function (e) {

                    const id =
                        this.getAttribute('href');

                    if (!id || id === '#') {
                        return;
                    }

                    const target =
                        document.querySelector(id);

                    if (target) {

                        e.preventDefault();

                        const headerHeight =
                            header
                                ? header.offsetHeight
                                : 0;

                        const position =
                            target
                                .getBoundingClientRect()
                                .top +
                            window.scrollY -
                            headerHeight -
                            12;

                        window.scrollTo({
                            top:position,
                            behavior:'smooth'
                        });

                    }

                }
            );

        });
</script>

</body>
</html>