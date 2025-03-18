<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Fontawesome Icons -->
    <link href="{{ asset('assets/cms-v3/css/fontawesome-5-15-1.min.css') }}" rel="stylesheet" type="text/css">
    <!-- BoxIcons Css -->
    <link href="{{ asset('assets/cms-v3/css/boxicons.min.css') }}" rel="stylesheet">
    <!-- Material Design Icons Css -->
    <link rel="stylesheet" href="{{ asset('assets/cms-v3/css/materialdesignicons.min.css') }}" rel="stylesheet">

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/cms-v3/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/cms-v3/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <!-- App js -->
    <script src="{{ asset('assets/js/plugin.js') }}"></script>
    <!-- Custom Css -->
    <link href="{{ asset('assets/css/datatables-custom.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/0756825c13.js" crossorigin="anonymous"></script>
    <!-- swal -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Login - {{ config('app.name') }}</title>
</head>

<body>
    <section style="height: 100vh">
        <div class="container h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="overflow-hidden card">
                        <div class="bg-primary-subtle">
                            <div class="row">
                                <div class="col-7 col">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Selamat Datang Kembali!</h5>
                                        <p>Masuk untuk melanjutkan ke CMS</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end col">
                                    <img src="{{ asset('assets/images/profile-img.png') }}" alt=""
                                        class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="pt-0 card-body">
                            <div class="auth-logo"><a class="auth-logo-light" href="/">
                                    <div class="avatar-md profile-user-wid mb-4"><span
                                            class="avatar-title rounded-circle bg-light">
                                            <img src="{{ asset('assets/images/logo-m.png') }}" alt=""
                                                class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a><a class="auth-logo-dark" href="/">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="{{ asset('assets/images/logo-m.png') }}" alt=""
                                                class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a></div>
                            {{-- @if ($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li class="list-unstyled">
                                                <i class="fas fa-exclamation-circle"></i> {{ $error }}</i>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif --}}
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                                </div>
                            @endif

                            <div class="p-2">
                                <form id="loginForm" class="form-horizontal" {{ route('login') }} method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input name="email" id="email" placeholder="Masukkan email" type="text"
                                            class="form-control">
                                        <!-- Error client-side -->
                                        <span id="emailError" class="text-danger small"></span>
                                        <!-- Error server-side -->
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Kata Sandi</label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input name="password" placeholder="Masukkan Kata Sandi" id="password"
                                                type="password" class="form-control" aria-invalid="false"
                                                minlength="6">
                                            <button class="btn btn-light " type="button" id="password-addon"><i
                                                    class="mdi mdi-eye-outline"></i></button>
                                        </div>
                                        <!-- Error client-side -->
                                        <span id="passwordError" class="text-danger small"></span>
                                        <!-- Error server-side -->
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mt-3 d-grid"><button class="btn btn-primary btn-block "
                                            type="submit">Masuk</button></div>
                                    {{-- <div class="mt-4 text-center">
                                        <h5 class="font-size-14 mb-3">Sign in with</h5>
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><a
                                                    class="social-list-item bg-primary text-white border-primary"
                                                    href="/pages-login"><i class="mdi mdi-facebook"></i></a></li>
                                            <li class="list-inline-item"><a
                                                    class="social-list-item bg-info text-white border-info"
                                                    href="/pages-login"><i class="mdi mdi-twitter"></i></a></li>
                                            <li class="list-inline-item"><a
                                                    class="social-list-item bg-danger text-white border-danger"
                                                    href="/pages-login"><i class="mdi mdi-google"></i></a></li>
                                        </ul>
                                    </div> --}}
                                    {{-- <div class="mt-4 text-center"><a class="text-muted" href="/pages-forgot-pwd"><i
                                                class="mdi mdi-lock me-1"></i> Forgot your password?</a></div> --}}
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>© 2024 Maxy Academy</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Toggle password visibility
        const passwordInput = document.getElementById('password');
        const passwordInputBtn = document.getElementById('password-addon');

        passwordInputBtn.addEventListener('click', () => {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordInputBtn.innerHTML = '<i class="mdi mdi-eye-off-outline"></i>';
            } else {
                passwordInput.type = 'password';
                passwordInputBtn.innerHTML = '<i class="mdi mdi-eye-outline"></i>';
            }
        });

        // Client-side validation
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            const emailError = document.getElementById('emailError');
            const passwordError = document.getElementById('passwordError');

            let isValid = true;

            // Reset error messages
            emailError.textContent = '';
            passwordError.textContent = '';

            // Validasi Email
            if (!emailInput.value.trim()) {
                emailError.textContent = 'Email tidak boleh kosong.';
                isValid = false;
            } else if (!/\S+@\S+\.\S+/.test(emailInput.value.trim())) {
                emailError.textContent = 'Format email tidak valid.';
                isValid = false;
            }

            // Validasi Password
            if (!passwordInput.value.trim()) {
                passwordError.textContent = 'Password tidak boleh kosong.';
                isValid = false;
            } else if (passwordInput.value.trim().length < 6) {
                passwordError.textContent = 'Password harus minimal 6 karakter.';
                isValid = false;
            }

            // Cegah submit jika validasi gagal
            if (!isValid) {
                event.preventDefault();
            }
        });
    </script>
</body>

</html>
