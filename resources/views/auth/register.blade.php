<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register | Rental Management System</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Bootstrap Icons -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet"
    >

    <!-- Google Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

<style>

/* =====================================================
   GLOBAL
===================================================== */

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Inter',sans-serif;
}

html,
body{
    width:100%;
    min-height:100%;
}

body{

    min-height:100vh;

    background:
        radial-gradient(
            circle at 15% 20%,
            rgba(37,99,235,.13),
            transparent 32%
        ),
        radial-gradient(
            circle at 85% 80%,
            rgba(59,130,246,.08),
            transparent 30%
        ),
        #070b14;

    display:flex;

    align-items:center;

    justify-content:center;

    padding:18px;

    color:white;
}


/* =====================================================
   MAIN CARD
===================================================== */

.auth-wrapper{

    width:100%;

    max-width:1180px;

    height:650px;

    min-height:650px;

    display:flex;

    background:#0d1320;

    border:1px solid rgba(255,255,255,.07);

    border-radius:25px;

    overflow:hidden;

    box-shadow:
        0 30px 80px rgba(0,0,0,.55),
        0 10px 35px rgba(0,0,0,.25);
}


/* =====================================================
   LEFT SIDE
===================================================== */

.left-side{

    width:54%;

    position:relative;

    overflow:hidden;

    padding:38px 48px;

    display:flex;

    flex-direction:column;

    justify-content:space-between;

    background:
        linear-gradient(
            145deg,
            #0b1220 0%,
            #0b1830 45%,
            #102d5c 100%
        );
}


/* =====================================================
   GLOW
===================================================== */

.glow-one{

    position:absolute;

    width:400px;
    height:400px;

    border-radius:50%;

    background:
        radial-gradient(
            circle,
            rgba(37,99,235,.27),
            transparent 68%
        );

    top:-180px;

    right:-150px;

    pointer-events:none;
}

.glow-two{

    position:absolute;

    width:350px;
    height:350px;

    border-radius:50%;

    background:
        radial-gradient(
            circle,
            rgba(30,64,175,.17),
            transparent 70%
        );

    bottom:-180px;

    left:-150px;

    pointer-events:none;
}


/* =====================================================
   GRID
===================================================== */

.grid-bg{

    position:absolute;

    inset:0;

    opacity:.035;

    background-image:
        linear-gradient(
            rgba(255,255,255,.5) 1px,
            transparent 1px
        ),
        linear-gradient(
            90deg,
            rgba(255,255,255,.5) 1px,
            transparent 1px
        );

    background-size:40px 40px;

    pointer-events:none;
}


/* =====================================================
   BRAND
===================================================== */

.brand{

    position:relative;

    z-index:5;

    display:flex;

    align-items:center;

    gap:12px;
}

.brand-icon{

    width:48px;

    height:48px;

    border-radius:14px;

    background:
        linear-gradient(
            135deg,
            #3b82f6,
            #1d4ed8
        );

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:21px;

    color:white;

    box-shadow:
        0 8px 25px rgba(37,99,235,.32);
}

.brand-text h3{

    margin:0;

    font-size:19px;

    font-weight:800;

    letter-spacing:-.4px;
}

.brand-text span{

    display:block;

    margin-top:2px;

    font-size:10px;

    color:#8b98ad;

    letter-spacing:.3px;
}


/* =====================================================
   HERO CONTENT
===================================================== */

.left-content{

    position:relative;

    z-index:5;

    max-width:530px;
}

.left-small-title{

    display:inline-flex;

    align-items:center;

    gap:7px;

    margin-bottom:13px;

    padding:6px 11px;

    border:1px solid rgba(59,130,246,.22);

    border-radius:30px;

    background:rgba(37,99,235,.08);

    color:#72a7ff;

    font-size:10px;

    font-weight:600;
}

.left-small-title::before{

    content:"";

    width:6px;

    height:6px;

    border-radius:50%;

    background:#3b82f6;

    box-shadow:
        0 0 10px #3b82f6;
}

.left-content h1{

    font-size:40px;

    line-height:1.1;

    font-weight:800;

    letter-spacing:-1.5px;

    margin-bottom:16px;

    color:#ffffff;
}

.left-content h1 span{

    display:block;

    color:#4f8cff;
}

.blue-line{

    width:60px;

    height:3px;

    border-radius:10px;

    background:
        linear-gradient(
            90deg,
            #3b82f6,
            #60a5fa
        );

    margin-bottom:16px;

    box-shadow:
        0 0 12px rgba(59,130,246,.4);
}

.left-content p{

    max-width:500px;

    font-size:12px;

    line-height:1.7;

    color:#9aa7ba;

    margin-bottom:20px;
}


/* =====================================================
   FEATURES
===================================================== */

.features{

    display:flex;

    flex-direction:column;

    gap:10px;
}

.feature-item{

    display:flex;

    align-items:center;

    gap:11px;

    padding:9px 12px;

    width:100%;

    max-width:430px;

    border-radius:12px;

    border:1px solid rgba(255,255,255,.055);

    background:rgba(255,255,255,.025);

    transition:.25s;
}

.feature-item:hover{

    transform:translateX(4px);

    border-color:rgba(59,130,246,.2);

    background:rgba(59,130,246,.055);
}

.feature-icon{

    width:35px;

    height:35px;

    flex-shrink:0;

    border-radius:10px;

    display:flex;

    align-items:center;

    justify-content:center;

    color:#63a0ff;

    background:
        rgba(37,99,235,.13);

    border:1px solid rgba(59,130,246,.12);

    font-size:15px;
}

.feature-text strong{

    display:block;

    font-size:11px;

    font-weight:700;

    margin-bottom:2px;

    color:#e8edf5;
}

.feature-text span{

    font-size:9px;

    color:#77859a;
}


/* =====================================================
   DOTS
===================================================== */

.dots{

    position:absolute;

    bottom:24px;

    left:48px;

    display:grid;

    grid-template-columns:
        repeat(5,4px);

    gap:7px;

    z-index:3;
}

.dots span{

    width:3px;

    height:3px;

    border-radius:50%;

    background:#3b82f6;

    opacity:.45;
}


/* =====================================================
   RIGHT SIDE
===================================================== */

.right-side{

    width:46%;

    padding:30px 58px;

    display:flex;

    align-items:center;

    justify-content:center;

    background:#0a0f1a;

    border-left:1px solid rgba(255,255,255,.055);
}

.auth-box{

    width:100%;

    max-width:390px;

    margin:auto;
}


/* =====================================================
   AUTH ICON
===================================================== */

.auth-icon{

    width:58px;

    height:58px;

    margin:0 auto 12px;

    border-radius:17px;

    display:flex;

    align-items:center;

    justify-content:center;

    color:#65a0ff;

    font-size:25px;

    background:
        linear-gradient(
            145deg,
            rgba(37,99,235,.18),
            rgba(37,99,235,.06)
        );

    border:1px solid rgba(59,130,246,.18);

    box-shadow:
        0 10px 25px rgba(0,0,0,.2);
}


/* =====================================================
   HEADER
===================================================== */

.auth-header{

    text-align:center;
}

.auth-title{

    font-size:25px;

    font-weight:800;

    color:#f8fafc;

    margin-bottom:5px;

    letter-spacing:-.5px;
}

.auth-subtitle{

    font-size:11px;

    line-height:1.5;

    color:#77859a;

    margin-bottom:19px;
}


/* =====================================================
   ALERT
===================================================== */

.alert{

    border-radius:9px;

    border:1px solid transparent;

    font-size:10px;

    margin-bottom:12px;

    padding:9px 11px;
}

.alert-danger{

    background:rgba(239,68,68,.08);

    border-color:rgba(239,68,68,.15);

    color:#fca5a5;
}


/* =====================================================
   FORM LABEL
===================================================== */

.form-label{

    font-size:11px;

    font-weight:700;

    color:#cbd5e1;

    margin-bottom:6px;
}


/* =====================================================
   INPUT
===================================================== */

.input-box{

    position:relative;

    margin-bottom:11px;
}

.input-box > i:first-child{

    position:absolute;

    left:15px;

    top:50%;

    transform:translateY(-50%);

    color:#5e83b9;

    font-size:15px;

    z-index:3;
}

.form-control{

    width:100%;

    height:45px;

    border-radius:10px;

    border:1px solid #202b3d;

    background:#111827;

    color:#f8fafc;

    padding-left:44px;

    padding-right:44px;

    font-size:11px;

    box-shadow:none !important;

    transition:.2s;
}

.form-control::placeholder{

    color:#59677b;
}

.form-control:focus{

    border-color:#3578e5;

    background:#111827;

    color:#ffffff;

    box-shadow:
        0 0 0 3px rgba(37,99,235,.10) !important;
}


/* =====================================================
   PASSWORD TOGGLE
===================================================== */

.password-toggle{

    position:absolute !important;

    left:auto !important;

    right:15px;

    top:50%;

    transform:translateY(-50%);

    color:#65748a !important;

    cursor:pointer;

    z-index:5;

    transition:.2s;
}

.password-toggle:hover{

    color:#60a5fa !important;
}


/* =====================================================
   FIELD ERROR
===================================================== */

.field-error{

    display:block;

    color:#f87171;

    font-size:9px;

    margin-top:-7px;

    margin-bottom:8px;
}


/* =====================================================
   BUTTON
===================================================== */

.btn-auth{

    width:100%;

    height:47px;

    border:none;

    border-radius:10px;

    background:
        linear-gradient(
            135deg,
            #2563eb,
            #1d4ed8
        );

    color:white;

    font-size:11px;

    font-weight:700;

    display:flex;

    align-items:center;

    justify-content:center;

    gap:8px;

    box-shadow:
        0 10px 25px rgba(37,99,235,.22);

    transition:.25s;

    margin-top:5px;
}

.btn-auth:hover{

    transform:translateY(-2px);

    color:white;

    background:
        linear-gradient(
            135deg,
            #3478ef,
            #2563eb
        );

    box-shadow:
        0 13px 30px rgba(37,99,235,.30);
}

.btn-auth:active{

    transform:translateY(0);
}


/* =====================================================
   DIVIDER
===================================================== */

.divider{

    display:flex;

    align-items:center;

    gap:12px;

    margin:17px 0;

    color:#566276;

    font-size:9px;
}

.divider::before,
.divider::after{

    content:"";

    flex:1;

    height:1px;

    background:#1d2737;
}


/* =====================================================
   SWITCH FORM
===================================================== */

.switch-form{

    text-align:center;

    font-size:10px;

    color:#69778b;
}

.switch-form a{

    color:#5795ff;

    font-weight:800;

    text-decoration:none;

    margin-left:3px;

    transition:.2s;
}

.switch-form a:hover{

    color:#8ab7ff;
}


/* =====================================================
   FOOTER
===================================================== */

.auth-footer{

    text-align:center;

    margin-top:17px;

    font-size:8px;

    color:#465267;
}


/* =====================================================
   RESPONSIVE
===================================================== */

@media(max-width:1100px){

    .auth-wrapper{

        max-width:950px;
    }

    .left-side{

        padding:35px;
    }

    .right-side{

        padding:30px 40px;
    }

    .left-content h1{

        font-size:36px;
    }

    .feature-item{

        max-width:100%;
    }
}


@media(max-width:900px){

    body{

        padding:12px;
    }

    .auth-wrapper{

        height:auto;

        min-height:auto;

        flex-direction:column;

        max-width:600px;
    }

    .left-side,
    .right-side{

        width:100%;
    }

    .left-side{

        min-height:480px;

        padding:35px;
    }

    .right-side{

        padding:35px;
    }

    .left-content h1{

        font-size:38px;
    }
}


@media(max-width:576px){

    body{

        padding:10px;
    }

    .auth-wrapper{

        border-radius:18px;
    }

    .left-side{

        min-height:450px;

        padding:28px;
    }

    .right-side{

        padding:30px 20px;
    }

    .brand-icon{

        width:45px;

        height:45px;

        font-size:20px;
    }

    .brand-text h3{

        font-size:18px;
    }

    .brand-text span{

        font-size:9px;
    }

    .left-content h1{

        font-size:30px;

        letter-spacing:-1px;
    }

    .left-content p{

        font-size:11px;
    }

    .feature-item{

        padding:9px;

        gap:9px;
    }

    .feature-icon{

        width:34px;

        height:34px;

        font-size:14px;
    }

    .feature-text strong{

        font-size:10px;
    }

    .feature-text span{

        font-size:8px;
    }

    .auth-icon{

        width:55px;

        height:55px;

        font-size:24px;
    }

    .auth-title{

        font-size:23px;
    }

    .auth-subtitle{

        font-size:10px;
    }

    .dots{

        display:none;
    }
}

</style>

</head>


<body>


<div class="auth-wrapper">


    <!-- =====================================================
         LEFT SIDE
    ====================================================== -->

    <div class="left-side">

        <div class="grid-bg"></div>

        <div class="glow-one"></div>

        <div class="glow-two"></div>


        <!-- BRAND -->

        <div class="brand">

            <div class="brand-icon">

                <i class="bi bi-box-seam-fill"></i>

            </div>

            <div class="brand-text">

                <h3>
                    Rental
                </h3>

                <span>
                    Management System
                </span>

            </div>

        </div>


        <!-- HERO -->

        <div class="left-content">

            <div class="left-small-title">

                Mulai Bersama Kami

            </div>


            <h1>

                Buat Akun

                <span>
                    Lebih Mudah.
                </span>

            </h1>


            <div class="blue-line"></div>


            <p>

                Daftarkan akun Anda dan nikmati kemudahan
                mengelola penyewaan barang. Temukan barang
                yang Anda butuhkan dan lakukan penyewaan
                dengan cepat dalam satu platform.

            </p>


            <!-- FEATURES -->

            <div class="features">


                <div class="feature-item">

                    <div class="feature-icon">

                        <i class="bi bi-person-check"></i>

                    </div>

                    <div class="feature-text">

                        <strong>
                            Akun Pelanggan
                        </strong>

                        <span>
                            Kelola data dan aktivitas rental Anda.
                        </span>

                    </div>

                </div>


                <div class="feature-item">

                    <div class="feature-icon">

                        <i class="bi bi-search"></i>

                    </div>

                    <div class="feature-text">

                        <strong>
                            Temukan Barang
                        </strong>

                        <span>
                            Cari barang rental sesuai kebutuhan.
                        </span>

                    </div>

                </div>


                <div class="feature-item">

                    <div class="feature-icon">

                        <i class="bi bi-calendar-check"></i>

                    </div>

                    <div class="feature-text">

                        <strong>
                            Sewa Dengan Mudah
                        </strong>

                        <span>
                            Proses penyewaan cepat dan praktis.
                        </span>

                    </div>

                </div>


            </div>

        </div>


        <!-- DOTS -->

        <div class="dots">

            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>

            <span></span>
            <span></span>
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



    <!-- =====================================================
         RIGHT SIDE
    ====================================================== -->

    <div class="right-side">

        <div class="auth-box">


            <!-- ICON -->

            <div class="auth-icon">

                <i class="bi bi-person-plus"></i>

            </div>


            <!-- HEADER -->

            <div class="auth-header">

                <h2 class="auth-title">

                    Buat Akun 👋

                </h2>

                <p class="auth-subtitle">

                    Lengkapi data berikut untuk membuat
                    akun pelanggan Anda.

                </p>

            </div>


            <!-- ERROR -->

            @if($errors->any())

                <div class="alert alert-danger">

                    <i class="bi bi-exclamation-circle me-1"></i>

                    {{ $errors->first() }}

                </div>

            @endif


            <!-- FORM -->

            <form
                method="POST"
                action="{{ route('register') }}"
            >

                @csrf


                <!-- NAMA -->

                <label class="form-label">

                    Nama Lengkap

                </label>

                <div class="input-box">

                    <i class="bi bi-person"></i>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="{{ old('name') }}"
                        placeholder="Masukkan nama lengkap"
                        required
                        autofocus
                    >

                </div>

                @error('name')

                    <small class="field-error">

                        {{ $message }}

                    </small>

                @enderror


                <!-- EMAIL -->

                <label class="form-label">

                    Email

                </label>

                <div class="input-box">

                    <i class="bi bi-envelope"></i>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email') }}"
                        placeholder="Masukkan email Anda"
                        required
                    >

                </div>

                @error('email')

                    <small class="field-error">

                        {{ $message }}

                    </small>

                @enderror


                <!-- PASSWORD -->

                <label class="form-label">

                    Password

                </label>

                <div class="input-box">

                    <i class="bi bi-lock"></i>

                    <input
                        type="password"
                        id="registerPassword"
                        name="password"
                        class="form-control"
                        placeholder="Masukkan password"
                        required
                    >

                    <i
                        class="bi bi-eye password-toggle"
                        onclick="
                            togglePassword(
                                'registerPassword',
                                this
                            )
                        "
                    ></i>

                </div>

                @error('password')

                    <small class="field-error">

                        {{ $message }}

                    </small>

                @enderror


                <!-- KONFIRMASI PASSWORD -->

                <label class="form-label">

                    Konfirmasi Password

                </label>

                <div class="input-box">

                    <i class="bi bi-shield-lock"></i>

                    <input
                        type="password"
                        id="registerPasswordConfirmation"
                        name="password_confirmation"
                        class="form-control"
                        placeholder="Ulangi password"
                        required
                    >

                    <i
                        class="bi bi-eye password-toggle"
                        onclick="
                            togglePassword(
                                'registerPasswordConfirmation',
                                this
                            )
                        "
                    ></i>

                </div>


                <!-- BUTTON -->

                <button
                    type="submit"
                    class="btn-auth"
                >

                    <i class="bi bi-person-plus"></i>

                    Daftar Akun

                </button>

            </form>


            <!-- DIVIDER -->

            <div class="divider">

                atau

            </div>


            <!-- LOGIN -->

            <div class="switch-form">

                Sudah punya akun?

                <a href="{{ route('login') }}">

                    Masuk Sekarang

                </a>

            </div>


            <!-- FOOTER -->

            <div class="auth-footer">

                © {{ date('Y') }} Rental Management System.
                All rights reserved.

            </div>

        </div>

    </div>


</div>



<script>

/* =====================================================
   PASSWORD TOGGLE
===================================================== */

function togglePassword(id, icon){

    const input =
        document.getElementById(id);


    if(input.type === 'password'){

        input.type = 'text';

        icon.classList.remove('bi-eye');

        icon.classList.add('bi-eye-slash');

    }else{

        input.type = 'password';

        icon.classList.remove('bi-eye-slash');

        icon.classList.add('bi-eye');

    }

}

</script>


</body>

</html>