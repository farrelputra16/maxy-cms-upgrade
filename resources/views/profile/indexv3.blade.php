@extends('layout.main-v3')

@section('title', 'Maxy Talk!')

@section('content')
    <!-- Begin Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Overview</h4>

                <!-- Begin Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
                <!-- End Breadcrumb -->
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Begin Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Profile</h4>
                    <div class="mt-5 text-center">
                        <p>Untuk mengakses halaman profil, silahkan klik <a
                                href="{{ env('FRONTEND_APP_URL') }}/login2?redirect=lms.edit-profile">disini</a>.</p>
                        <br>
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
            </div>
        </div>
    </div>
    <!-- End Content -->
@endsection

@section('script')

    <script>
        $(document).ready(function() {

            table.buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');
        });
    </script>

@endsection
