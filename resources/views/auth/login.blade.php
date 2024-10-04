<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-multiselect.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.css">

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-multiselect.js') }}"></script>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script src="https://unpkg.com/alpinejs@3.13.10/dist/cdn.min.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-multiselect.js') }}"></script>

    <style>
        @media screen and (max-width: 766px) {
            .field {
                text-align: left;
                padding-left: 10px;
            }
        }

        @media only screen and (max-width: 428px) {
            .col-6 {
                width: 100%;
                padding-left: 0;
                padding-right: 0;
            }

            h1 {
                text-align: center;
                font-size: 20px;
            }

            .field {
                margin-bottom: 15px;
            }

            input[type="email"],
            input[type="password"] {
                width: calc(100% - 20px);
                margin-right: 10px;
                padding-left: 5px;
            }

            #loginBtn {
                width: 100%;
                margin-top: 10px;
            }

            .field a {
                font-size: 10px;
            }
        }
    </style>

</head>

<body>
    <div class="row" style="height:100vh">
        <div class="col-12 col-md-6" style="padding-top:6%; padding-left:15%;">
            <h1
                style="color: #000000; font-weight: 600; padding-bottom: 5px; font-family: Inter, sans-serif; letter-spacing: 2px; font-size: 64px">
                @if (env('APP_ENV') == 'local')
                    Bina Karya's CMS
                @else
                    Maxy's CMS
                @endif
            </h1>
            <br>

            <form class="ui form" method="post" action="{{ route('login') }}">
                @csrf
                <div class="field" style="margin-bottom: 20px;">
                    <label style="font-size: 28px; font-weight: bold;">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email"
                        style="width: 100%; height: 45px; border-radius: 25px; border-color: #1533B5; border-width: 1.5px;
                    border-style: solid; font-size: 24px; padding: 6%">
                    @if (session('error'))
                        <p class="text-danger">
                            {{ session('error') }}
                        </p>
                    @endif
                </div>

                <div class="field" style="position: relative;">
                    <label style="font-size: 28px; font-weight: bold; padding-bottom: 10px;">Password</label>
                    <div style="position: relative;">
                        <input type="password" id="pw" name="password" placeholder="Enter your password"
                            style="width: 100%; height: 45px; border-radius: 25px; border-color: #1533B5; border-width: 1.5px;
                        border-style: solid; font-size: 24px; padding: 6%;">

                        <span style="height: 45px; margin-left: -50px;">
                            <img src="{{ asset('uploads/eyeLogin.png') }}" alt="showPw"
                                style="height: 100%; margin-top: 3vh" id="showPw">
                        </span>
                    </div>
                </div>

                <div class="field" style="padding-top: 10px; text-align: right">
                    <a href="https://wa.me/+62895631388845/?text=hello"
                        style="font-size: 12px; color: #4056A1; font-weight: bold;">Forget
                        Password</a>
                </div>

                <button id="loginBtn" class="ui button primary" type="submit"
                    style="margin-top: 50px; width: 100%; background-color: #4056A1; color: #FFF; border-radius:30px; font-size: 28px;">Login</button>
            </form>
        </div>

        <div class="col-6" style="height:100%">
            @if (env('APP_ENV') == 'local')
                <img src="{{ asset('uploads/LogoMaxy.png') }}" alt="Logo" style="height:100%; padding-left:45%">
            @else
                <img src="{{ asset('uploads/LogoLogin.png') }}" alt="Logo" style="height:100%; padding-left:45%">
            @endif
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loginBtn = document.getElementById('loginBtn');

            loginBtn.addEventListener('click', function() {
                loginBtn.style.backgroundColor = '#FBB041';
            });

            const pwInput = document.getElementById('pw');
            const showPw = document.getElementById('showPw');

            showPw.addEventListener('click', function() {
                if (pwInput.type === 'password') {
                    pwInput.type = 'text';
                    showPw.src = "{{ asset('uploads/eyeLoginHidden.png') }}";
                } else {
                    pwInput.type = 'password';
                    showPw.src = "{{ asset('uploads/eyeLogin.png') }}";
                }
            });
        });
    </script>
</body>

</html>
