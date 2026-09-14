@extends('pelanggan.layout')

@section('content')

<style>
/* =========================================================
   PROFILE PAGE
========================================================= */

.profile-page{
    width:100%;
    max-width:100%;
    min-width:0;
    overflow:hidden;
    font-family:'Inter', sans-serif;
    color:#1e293b;
}

.profile-container{
    width:100%;
    max-width:1200px;
    margin:0 auto;
    padding:24px 28px 35px;
    box-sizing:border-box;
}


/* =========================================================
   HEADER
========================================================= */

.profile-header{
    margin-bottom:20px;
}

.profile-header h2{
    display:flex;
    align-items:center;
    gap:9px;

    margin:0 0 5px;

    font-size:26px;
    line-height:1.25;
    font-weight:800;

    color:#172554;
}

.profile-header h2 i{
    color:#2563eb;
    font-size:25px;
}

.profile-header p{
    margin:0;
    color:#64748b;
    font-size:13px;
    line-height:1.5;
}


/* =========================================================
   ALERT
========================================================= */

.profile-alert{
    margin-bottom:15px;
}

.profile-alert .alert{
    margin:0;
    border:none;
    border-radius:12px;
    padding:12px 15px;
    font-size:13px;
}

.profile-alert ul{
    padding-left:20px;
}


/* =========================================================
   MAIN CARD
========================================================= */

.profile-card{
    width:100%;
    min-width:0;
    box-sizing:border-box;

    display:grid;
    grid-template-columns:235px minmax(0,1fr);

    gap:28px;

    background:#fff;
    border:1px solid #edf1f6;
    border-radius:18px;

    padding:24px;

    box-shadow:0 7px 24px rgba(15,23,42,.06);
}


/* =========================================================
   LEFT PROFILE
========================================================= */

.profile-left{
    width:100%;
    min-width:0;

    border-right:1px solid #e5e7eb;

    padding-right:24px;

    display:flex;
    align-items:flex-start;
    justify-content:center;

    box-sizing:border-box;
}

.profile-photo{
    width:100%;
    max-width:205px;
    text-align:center;
}


/* =========================================================
   PROFILE IMAGE
========================================================= */

.profile-image,
.default-photo{
    width:112px;
    height:112px;

    margin:0 auto 12px;

    border-radius:50%;

    object-fit:cover;

    display:block;
}

.default-photo{
    background:#eff6ff;

    display:flex;
    align-items:center;
    justify-content:center;

    color:#2563eb;
    font-size:44px;
}


/* =========================================================
   NAME
========================================================= */

.profile-photo h3{
    margin:7px 0 9px;

    color:#1e293b;

    font-size:18px;
    line-height:1.35;
    font-weight:700;

    word-break:break-word;
}


/* =========================================================
   CUSTOMER BADGE
========================================================= */

.badge-customer{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:5px;

    padding:5px 13px;

    border-radius:20px;

    background:#eff6ff;
    color:#2563eb;

    font-size:12px;
    font-weight:600;
}


/* =========================================================
   PHOTO BUTTON
========================================================= */

.btn-photo{
    width:100%;
    min-height:40px;

    margin:16px auto 0;

    padding:9px 12px;

    display:flex;
    align-items:center;
    justify-content:center;
    gap:7px;

    border:0;
    border-radius:10px;

    background:#2563eb;
    color:#fff;

    font-size:13px;
    font-weight:600;

    cursor:pointer;

    transition:.2s ease;
    box-sizing:border-box;
}

.btn-photo:hover{
    background:#1d4ed8;
    transform:translateY(-1px);
}

.photo-info{
    display:block;

    margin-top:8px;

    color:#94a3b8;

    font-size:10.5px;
    line-height:1.5;
}


/* =========================================================
   RIGHT
========================================================= */

.profile-right{
    min-width:0;
    width:100%;
}


/* =========================================================
   SECTION TITLE
========================================================= */

.title-section{
    display:flex;
    align-items:center;
    gap:7px;

    margin:0 0 4px;

    color:#1e293b;

    font-size:17px;
    line-height:1.4;
    font-weight:700;
}

.title-section i{
    color:#2563eb;
    font-size:17px;
}

.subtitle-section{
    margin:0 0 16px;

    color:#64748b;

    font-size:12.5px;
    line-height:1.5;
}


/* =========================================================
   FORM GRID
========================================================= */

.form-grid{
    width:100%;
    min-width:0;

    display:grid;
    grid-template-columns:repeat(2,minmax(0,1fr));

    gap:16px;
}

.form-item{
    min-width:0;
}

.form-item label{
    display:block;

    margin:0 0 6px;

    color:#334155;

    font-size:12.5px;
    font-weight:600;
}


/* =========================================================
   INPUT
========================================================= */

.input-box{
    width:100%;
    min-width:0;
    min-height:43px;

    box-sizing:border-box;

    display:flex;
    align-items:center;

    gap:9px;

    padding:9px 12px;

    background:#f8fbff;

    border:1px solid #dbeafe;

    border-radius:10px;

    transition:.2s ease;
}

.input-box:focus-within{
    border-color:#93c5fd;
    background:#fff;

    box-shadow:0 0 0 3px rgba(37,99,235,.07);
}

.input-box > i{
    flex:0 0 auto;

    color:#64748b;
    font-size:15px;
}

.input-box input,
.input-box textarea{
    width:100%;
    min-width:0;

    border:0;
    outline:0;

    background:transparent;

    color:#1e293b;

    font-family:inherit;
    font-size:13px;

    box-sizing:border-box;
}

.input-box input{
    height:23px;
}

.input-box input::placeholder,
.input-box textarea::placeholder{
    color:#94a3b8;
}

.input-box input[readonly]{
    cursor:not-allowed;
    color:#64748b;
}


/* =========================================================
   ADDRESS
========================================================= */

.full{
    margin-top:16px;
}

.textarea-box{
    min-height:90px;
    align-items:flex-start;
}

.textarea-box > i{
    margin-top:2px;
}

.input-box textarea{
    min-height:68px;

    padding:0;

    resize:vertical;

    line-height:1.5;
}


/* =========================================================
   PASSWORD SECTION
========================================================= */

.password-section{
    width:100%;
    min-width:0;

    box-sizing:border-box;

    margin-top:22px;

    padding:18px;

    background:#f8fafc;

    border:1px solid #e2e8f0;

    border-radius:14px;
}

.password-list{
    width:100%;
    min-width:0;

    display:grid;
    grid-template-columns:repeat(3,minmax(0,1fr));

    gap:14px;
}


/* =========================================================
   PASSWORD INPUT
========================================================= */

.password-input{
    width:100%;
    min-width:0;

    display:flex;
    align-items:center;
    gap:7px;
}

.password-input input{
    flex:1;
    min-width:0;
}

.password-input i{
    flex:0 0 auto;

    color:#64748b;

    font-size:16px;

    cursor:pointer;

    transition:.2s ease;
}

.password-input i:hover{
    color:#2563eb;
}


/* =========================================================
   ACTION
========================================================= */

.profile-action{
    width:100%;
    min-width:0;

    display:flex;
    justify-content:flex-end;
    align-items:center;

    gap:10px;

    margin-top:22px;
}

.btn-cancel,
.btn-save{
    min-height:42px;

    display:inline-flex;
    align-items:center;
    justify-content:center;

    gap:7px;

    padding:10px 20px;

    border-radius:10px;

    font-family:inherit;
    font-size:13px;
    font-weight:600;

    cursor:pointer;

    transition:.2s ease;

    box-sizing:border-box;
}

.btn-cancel{
    border:1px solid #2563eb;

    background:#fff;

    color:#2563eb;
}

.btn-cancel:hover{
    background:#eff6ff;
}

.btn-save{
    border:1px solid #2563eb;

    background:#2563eb;

    color:#fff;
}

.btn-save:hover{
    background:#1d4ed8;
    transform:translateY(-1px);
}


/* =========================================================
   LARGE TABLET
========================================================= */

@media (max-width:1100px){

    .profile-container{
        padding:22px 20px 30px;
    }

    .profile-card{
        grid-template-columns:205px minmax(0,1fr);
        gap:22px;
        padding:20px;
    }

    .profile-left{
        padding-right:20px;
    }

    .profile-photo{
        max-width:180px;
    }

    .password-list{
        grid-template-columns:1fr 1fr;
    }

}


/* =========================================================
   TABLET
========================================================= */

@media (max-width:900px){

    .profile-container{
        padding:20px;
    }

    .profile-card{
        display:flex;
        flex-direction:column;

        gap:20px;

        padding:20px;
    }

    .profile-left{
        width:100%;

        border-right:0;
        border-bottom:1px solid #e5e7eb;

        padding:0 0 20px;
    }

    .profile-photo{
        max-width:260px;
    }

    .profile-image,
    .default-photo{
        width:100px;
        height:100px;
    }

    .default-photo{
        font-size:40px;
    }

    .btn-photo{
        max-width:220px;
    }

}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width:600px){

    .profile-container{
        padding:14px 12px 24px;
    }


    /* HEADER */

    .profile-header{
        margin-bottom:15px;
    }

    .profile-header h2{
        font-size:22px;
        gap:7px;
    }

    .profile-header h2 i{
        font-size:21px;
    }

    .profile-header p{
        font-size:11.5px;
        line-height:1.45;
    }


    /* CARD */

    .profile-card{
        width:100%;

        gap:17px;

        padding:15px;

        border-radius:15px;
    }


    /* PROFILE */

    .profile-left{
        padding-bottom:17px;
    }

    .profile-photo{
        max-width:230px;
    }

    .profile-image,
    .default-photo{
        width:82px;
        height:82px;

        margin-bottom:9px;
    }

    .default-photo{
        font-size:34px;
    }

    .profile-photo h3{
        margin:5px 0 7px;

        font-size:16px;
    }

    .badge-customer{
        padding:4px 11px;

        font-size:11px;
    }

    .btn-photo{
        width:auto;
        min-width:145px;

        min-height:37px;

        margin-top:12px;

        padding:8px 12px;

        border-radius:9px;

        font-size:12px;
    }

    .photo-info{
        margin-top:6px;
        font-size:9.5px;
    }


    /* RIGHT */

    .title-section{
        font-size:15px;
    }

    .title-section i{
        font-size:15px;
    }

    .subtitle-section{
        margin-bottom:13px;
        font-size:11px;
    }


    /* FORM */

    .form-grid{
        grid-template-columns:1fr;
        gap:12px;
    }

    .form-item label{
        margin-bottom:5px;
        font-size:11.5px;
    }

    .input-box{
        min-height:40px;

        padding:8px 10px;

        gap:8px;

        border-radius:9px;
    }

    .input-box > i{
        font-size:14px;
    }

    .input-box input,
    .input-box textarea{
        font-size:12px;
    }

    .input-box input{
        height:21px;
    }


    /* ADDRESS */

    .full{
        margin-top:13px;
    }

    .textarea-box{
        min-height:82px;
    }

    .input-box textarea{
        min-height:60px;
    }


    /* PASSWORD */

    .password-section{
        margin-top:17px;

        padding:14px;

        border-radius:12px;
    }

    .password-list{
        grid-template-columns:1fr;
        gap:12px;
    }


    /* BUTTON */

    .profile-action{
        gap:8px;

        margin-top:17px;
    }

    .btn-cancel,
    .btn-save{
        flex:1;

        min-width:0;
        min-height:40px;

        padding:9px 10px;

        border-radius:9px;

        font-size:11.5px;
    }

}


/* =========================================================
   VERY SMALL PHONE
========================================================= */

@media (max-width:380px){

    .profile-container{
        padding:12px 9px 20px;
    }

    .profile-card{
        padding:13px;
    }

    .profile-header h2{
        font-size:20px;
    }

    .profile-header p{
        font-size:10.5px;
    }

    .profile-image,
    .default-photo{
        width:76px;
        height:76px;
    }

    .profile-photo h3{
        font-size:15px;
    }

    .btn-cancel,
    .btn-save{
        font-size:10.5px;
        padding-left:7px;
        padding-right:7px;
    }
}
</style>


<div class="profile-page">

    {{-- =====================================================
         FORM
    ====================================================== --}}

    <form
        action="{{ route('pelanggan.profile.update') }}"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf
        @method('PUT')


        <div class="profile-container">


            {{-- =================================================
                 ALERT
            ================================================== --}}

            <div class="profile-alert">

                @if(session('success'))

                    <div class="alert alert-success">

                        <i class="bi bi-check-circle me-2"></i>

                        {{ session('success') }}

                    </div>

                @endif


                @if(session('error'))

                    <div class="alert alert-danger">

                        <i class="bi bi-exclamation-circle me-2"></i>

                        {{ session('error') }}

                    </div>

                @endif


                @if($errors->any())

                    <div class="alert alert-danger">

                        <strong>Terjadi kesalahan:</strong>

                        <ul class="mb-0 mt-2">

                            @foreach($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endif

            </div>


            {{-- =================================================
                 HEADER
            ================================================== --}}

            <div class="profile-header">

                <h2>

                    <i class="bi bi-person-circle"></i>

                    Profil Saya

                </h2>

                <p>
                    Kelola informasi akun dan keamanan Anda
                </p>

            </div>


            {{-- =================================================
                 MAIN CARD
            ================================================== --}}

            <div class="profile-card">


                {{-- =============================================
                     LEFT PROFILE
                ============================================== --}}

                <div class="profile-left">

                    <div class="profile-photo">


                        {{-- FOTO --}}

                        @if(
                            $customer->photo &&
                            file_exists(
                                public_path(
                                    'uploads/customers/' .
                                    $customer->photo
                                )
                            )
                        )

                            <img
                                src="{{ asset('uploads/customers/' . $customer->photo) }}"
                                alt="Foto Profile"
                                class="profile-image"
                            >

                        @else

                            <div class="default-photo">

                                <i class="bi bi-person"></i>

                            </div>

                        @endif


                        {{-- NAMA --}}

                        <h3>
                            {{ $customer->name }}
                        </h3>


                        {{-- BADGE --}}

                        <span class="badge-customer">

                            <i class="bi bi-person-check-fill"></i>

                            Customer

                        </span>


                        {{-- UPLOAD FOTO --}}

                        <label
                            for="photo"
                            class="btn-photo"
                        >

                            <i class="bi bi-camera-fill"></i>

                            Ubah Foto

                        </label>


                        <input
                            type="file"
                            name="photo"
                            id="photo"
                            accept="image/jpeg,image/png,image/webp"
                            hidden
                        >


                        <small class="photo-info">

                            JPG, JPEG, PNG, WEBP
                            <br>
                            Maksimal 2 MB

                        </small>

                    </div>

                </div>


                {{-- =============================================
                     RIGHT CONTENT
                ============================================== --}}

                <div class="profile-right">


                    {{-- =============================================
                         INFORMASI PRIBADI
                    ============================================== --}}

                    <h3 class="title-section">

                        <i class="bi bi-person-vcard"></i>

                        Informasi Pribadi

                    </h3>

                    <p class="subtitle-section">

                        Perbarui informasi akun Anda

                    </p>


                    {{-- =============================================
                         FORM GRID
                    ============================================== --}}

                    <div class="form-grid">


                        {{-- NAMA --}}

                        <div class="form-item">

                            <label>
                                Nama Lengkap
                            </label>

                            <div class="input-box">

                                <i class="bi bi-person"></i>

                                <input
                                    type="text"
                                    name="name"
                                    value="{{ old('name', $customer->name) }}"
                                    placeholder="Masukkan nama lengkap"
                                >

                            </div>

                        </div>


                        {{-- EMAIL --}}

                        <div class="form-item">

                            <label>
                                Alamat Email
                            </label>

                            <div class="input-box">

                                <i class="bi bi-envelope"></i>

                                <input
                                    type="email"
                                    value="{{ $customer->user->email ?? '' }}"
                                    readonly
                                >

                            </div>

                        </div>


                        {{-- PHONE --}}

                        <div class="form-item">

                            <label>
                                Nomor HP
                            </label>

                            <div class="input-box">

                                <i class="bi bi-telephone"></i>

                                <input
                                    type="text"
                                    name="phone"
                                    value="{{ old('phone', $customer->phone) }}"
                                    placeholder="Masukkan nomor HP"
                                >

                            </div>

                        </div>


                        {{-- STATUS --}}

                        <div class="form-item">

                            <label>
                                Status
                            </label>

                            <div class="input-box">

                                <i class="bi bi-person-check"></i>

                                <input
                                    type="text"
                                    value="{{ $customer->status }}"
                                    readonly
                                >

                            </div>

                        </div>

                    </div>


                    {{-- =============================================
                         ADDRESS
                    ============================================== --}}

                    <div class="form-item full">

                        <label>
                            Alamat Lengkap
                        </label>

                        <div class="input-box textarea-box">

                            <i class="bi bi-geo-alt"></i>

                            <textarea
                                name="address"
                                rows="3"
                                placeholder="Masukkan alamat lengkap"
                            >{{ old('address', $customer->address) }}</textarea>

                        </div>

                    </div>


                    {{-- =============================================
                         PASSWORD
                    ============================================== --}}

                    <div class="password-section">

                        <h3 class="title-section">

                            <i class="bi bi-shield-lock"></i>

                            Ubah Password

                        </h3>

                        <p class="subtitle-section">

                            Kosongkan jika tidak ingin mengubah password

                        </p>


                        <div class="password-list">


                            {{-- PASSWORD LAMA --}}

                            <div class="form-item">

                                <label>
                                    Password Lama
                                </label>

                                <div class="input-box">

                                    <i class="bi bi-lock"></i>

                                    <div class="password-input">

                                        <input
                                            type="password"
                                            name="old_password"
                                            id="old_password"
                                            placeholder="Password lama"
                                        >

                                        <i
                                            class="bi bi-eye password-toggle"
                                            data-target="old_password"
                                        ></i>

                                    </div>

                                </div>

                            </div>


                            {{-- PASSWORD BARU --}}

                            <div class="form-item">

                                <label>
                                    Password Baru
                                </label>

                                <div class="input-box">

                                    <i class="bi bi-lock"></i>

                                    <div class="password-input">

                                        <input
                                            type="password"
                                            name="password"
                                            id="password"
                                            placeholder="Password baru"
                                        >

                                        <i
                                            class="bi bi-eye password-toggle"
                                            data-target="password"
                                        ></i>

                                    </div>

                                </div>

                            </div>


                            {{-- KONFIRMASI --}}

                            <div class="form-item">

                                <label>
                                    Konfirmasi Password Baru
                                </label>

                                <div class="input-box">

                                    <i class="bi bi-lock"></i>

                                    <div class="password-input">

                                        <input
                                            type="password"
                                            name="password_confirmation"
                                            id="password_confirmation"
                                            placeholder="Konfirmasi password"
                                        >

                                        <i
                                            class="bi bi-eye password-toggle"
                                            data-target="password_confirmation"
                                        ></i>

                                    </div>

                                </div>

                            </div>


                        </div>

                    </div>


                    {{-- =============================================
                         ACTION BUTTON
                    ============================================== --}}

                    <div class="profile-action">

                        <button
                            type="button"
                            class="btn-cancel"
                            id="btnCancelProfile"
                            data-url="{{ route('pelanggan.dashboard') }}"
                        >

                            <i class="bi bi-x-lg"></i>

                            Batal

                        </button>


                        <button
                            type="submit"
                            class="btn-save"
                        >

                            <i class="bi bi-check-lg"></i>

                            Simpan Perubahan

                        </button>

                    </div>


                </div>

            </div>

        </div>

    </form>

</div>


<script>
document.addEventListener('DOMContentLoaded', function () {

    /* =========================================================
       TOGGLE PASSWORD
    ========================================================= */

    const passwordToggles =
        document.querySelectorAll('.password-toggle');

    passwordToggles.forEach(function (icon) {

        icon.addEventListener('click', function () {

            const targetId = this.dataset.target;

            const input =
                document.getElementById(targetId);

            if (!input) {
                return;
            }

            if (input.type === 'password') {

                input.type = 'text';

                this.classList.remove('bi-eye');
                this.classList.add('bi-eye-slash');

            } else {

                input.type = 'password';

                this.classList.remove('bi-eye-slash');
                this.classList.add('bi-eye');

            }

        });

    });


    /* =========================================================
       PREVIEW FOTO
    ========================================================= */

    const photoInput =
        document.getElementById('photo');

    if (photoInput) {

        photoInput.addEventListener(
            'change',
            function (event) {

                const file =
                    event.target.files[0];

                if (!file) {
                    return;
                }

                const reader =
                    new FileReader();

                reader.onload = function (e) {

                    const container =
                        document.querySelector(
                            '.profile-photo'
                        );

                    if (!container) {
                        return;
                    }


                    let image =
                        container.querySelector(
                            '.profile-image'
                        );

                    const defaultPhoto =
                        container.querySelector(
                            '.default-photo'
                        );


                    if (defaultPhoto) {
                        defaultPhoto.remove();
                    }


                    if (!image) {

                        image =
                            document.createElement('img');

                        image.classList.add(
                            'profile-image'
                        );

                        image.alt =
                            'Foto Profile';


                        const name =
                            container.querySelector('h3');

                        if (name) {

                            container.insertBefore(
                                image,
                                name
                            );

                        } else {

                            container.prepend(image);

                        }

                    }


                    image.src =
                        e.target.result;

                };

                reader.readAsDataURL(file);

            }
        );

    }


    /* =========================================================
       BUTTON BATAL
    ========================================================= */

    const btnCancel =
        document.getElementById(
            'btnCancelProfile'
        );

    if (btnCancel) {

        btnCancel.addEventListener(
            'click',
            function () {

                const url =
                    this.dataset.url;

                if (url) {

                    window.location.href =
                        url;

                }

            }
        );

    }

});
</script>

@endsection