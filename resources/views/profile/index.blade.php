@extends('layout.master')

@section('title', 'Profile')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <!DOCTYPE html>
        <html>

        <head>
            <title>Profiles</title>
            <!-- Include CSS libraries for styling the table -->
            <link rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css"
                href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">

        </head>

        <body>
            <h2>Profile</h2>
            <hr>
            <div class="ui breadcrumb pt-2 pb-4">
                <a class="section" href="{{ url('/') }}">Dashboard</a>
                <i class="right angle icon divider"></i>
                <div class="active section">Profiles</div>
            </div>
            <div id="example_wrapper">
                
                <div class="container mt-5 text-center">
                    <p>Untuk mengakses halaman profil, silahkan klik <a href="{{ env('FRONTEND_APP_URL') }}/login2?redirect=lms.edit-profile">disini</a>.</p>
                    <div class="alert alert-info d-inline-block text-start" role="alert">
                        <strong>Langkah-langkah mengakses halaman profil:</strong>
                        <ol class="mt-2 mb-0">
                            <li>Klik teks "disini".</li>
                            <li>Masukkan informasi akun di halaman login.</li>
                            <li>Jika berhasil, Anda akan diarahkan ke halaman profil.</li>
                        </ol>
                    </div>
                </div>
            </div>

            <!-- Include JS libraries for DataTable initialization -->
            <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
            
            <script>
                $(document).ready(function () {

                    table.buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');
                });
            </script>

        </body>

        </html>

    </div>
@endsection
