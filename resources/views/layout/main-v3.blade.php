<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>
        @yield('title') | {{ config('app.name') }}
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <link rel="icon" href="{{ asset('assets/cms-v3/images/logo-m.png') }}" type="image/x-icon">

    <script src="https://unpkg.com/knockout/build/output/knockout-latest.js"></script>
    <script src="https://unpkg.com/survey-core@1.10.5/survey.core.min.js"></script>
    <script src="https://unpkg.com/survey-core@1.10.5/survey.i18n.min.js"></script>
    <script src="https://unpkg.com/survey-core@1.10.5/themes/index.min.js"></script>
    <script src="https://unpkg.com/survey-knockout-ui@1.10.5/survey-knockout-ui.min.js"></script>
    <script src="https://unpkg.com/survey-creator-core@1.10.5/survey-creator-core.min.js"></script>
    <script src="https://unpkg.com/survey-creator-core@1.10.5/survey-creator-core.i18n.min.js"></script>
    <script src="https://unpkg.com/survey-creator-knockout@1.10.5/survey-creator-knockout.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/survey-core@1.10.5/defaultV2.css" />
    <link rel="stylesheet" href="https://unpkg.com/survey-creator-core@1.10.5/survey-creator-core.css" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/cms-v3/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
        type="text/css" />

    <!-- Fontawesome Icons -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <!-- BoxIcons Css -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Material Design Icons Css -->
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">

    <!-- Icons Css -->
    <link href="{{ asset('assets/cms-v3/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">

    <!-- DataTables Buttons CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

    <!-- DataTables Fixed Column -->
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/4.3.0/css/fixedColumns.dataTables.min.css">

    <!-- SWAL -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Advanced Forms -->
    <link href="{{ asset('assets/cms-v3/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/cms-v3/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}"
        rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/cms-v3/libs/spectrum-colorpicker2/spectrum.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('assets/cms-v3/libs/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}"
        rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/cms-v3/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/cms-v3/libs/@chenfengyuan/datepicker/datepicker.min.css') }}">
    @yield('style')

    <!-- CodeMirror Core -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/codemirror@5.65.18/lib/codemirror.min.css">
    <script src="https://cdn.jsdelivr.net/npm/codemirror@5.65.18/lib/codemirror.min.js"></script>

    <!-- CodeMirror Themes -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/codemirror@5.65.18/theme/dracula.min.css">

    <!-- CodeMirror Keymap & Modes -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/keymap/sublime.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/codemirror@5.65.18/mode/htmlmixed/htmlmixed.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/codemirror@5.65.18/mode/javascript/javascript.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/codemirror@5.65.18/mode/css/css.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/codemirror@5.65.18/mode/xml/xml.js"></script>

    <!-- CodeMirror Addons -->
    <script src="https://cdn.jsdelivr.net/npm/codemirror@5.65.18/addon/edit/matchbrackets.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/codemirror@5.65.18/addon/edit/closetag.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/codemirror/addon/hint/show-hint.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/codemirror@5.65.18/addon/hint/show-hint.css">

    <!-- CodeMirror Addons for Autocomplete -->
    <script src="https://cdn.jsdelivr.net/npm/codemirror@5.65.18/addon/hint/show-hint.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/codemirror@5.65.18/addon/hint/html-hint.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/codemirror@5.65.18/addon/hint/javascript-hint.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/codemirror@5.65.18/addon/hint/css-hint.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/codemirror@5.65.18/addon/hint/xml-hint.min.js"></script>

    <!-- App Css-->
    <link href="{{ asset('assets/cms-v3/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    <!-- App js -->
    <script src="{{ asset('assets/cms-v3/js/plugin.js') }}"></script>

    <!-- Custom Css -->
    <link href="{{ asset('assets/cms-v3/css/datatables-custom.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/cms-v3/css/maxy-custom.css') }}" rel="stylesheet" type="text/css" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body data-sidebar="dark">
    <!-- Note: Template from https://themesbrand.com/skote/layouts/index.html -->
    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner-chase">
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
            </div>
        </div>
    </div>

    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('partials.top-navbar')
        @include('partials.side-navbar')
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- Begin notification -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <!-- End notification -->

                    @yield('content')
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            @include('partials.footer')
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div data-simplebar class="h-100">
            <div class="rightbar-title d-flex align-items-center px-3 py-4">

                <h5 class="m-0 me-2">Settings</h5>

                <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                    <i class="mdi mdi-close noti-icon"></i>
                </a>
            </div>

            <!-- Settings -->
            <hr class="mt-0" />
            <h6 class="text-center mb-0">Choose Layouts</h6>

            <div class="p-4">


                <div class="form-check form-switch mb-3">
                    <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
                    <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                </div>

                <div class="form-check form-switch mb-3">
                    <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch">
                    <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                </div>
            </div>

        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/cms-v3/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/cms-v3/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/cms-v3/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/cms-v3/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/cms-v3/libs/node-waves/waves.min.js') }}"></script>

    <!-- apexcharts -->
    <script src="{{ asset('assets/cms-v3/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- FullCalendar -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>

    <!--tinymce js-->
    <script src="{{ asset('assets/cms-v3/libs/tinymce/tinymce.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ asset('assets/cms-v3/js/pages/form-editor.init.js') }}"></script>

    <!-- dashboard init -->
    <script src="{{ asset('assets/cms-v3/js/pages/dashboard.init.js') }}"></script>

    <!-- Required datatable js -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>


    <!-- DataTables Initialization -->
    <script src="{{ asset('assets/cms-v3/js/pages/datatables.init.js') }}"></script>

    <!-- DataTables FixedColumns Library -->
    <script src="https://cdn.datatables.net/fixedcolumns/4.3.0/js/dataTables.fixedColumns.min.js"></script>

    <!-- Advanced Forms -->
    <script src="{{ asset('assets/cms-v3/libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/cms-v3/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/cms-v3/libs/spectrum-colorpicker2/spectrum.min.js') }}"></script>
    <script src="{{ asset('assets/cms-v3/libs/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('assets/cms-v3/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ asset('assets/cms-v3/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
    <script src="{{ asset('assets/cms-v3/libs/@chenfengyuan/datepicker/datepicker.min.js') }}"></script>

    <!-- form advanced init -->
    <script src="{{ asset('assets/cms-v3/js/pages/form-advanced.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/cms-v3/js/app.js') }}"></script>

    @yield('fontAwesomePicker')

    <!-- Submit Button -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const saveButtons = document.querySelectorAll('.custom-btn-submit');

            saveButtons.forEach(saveButton => {
                saveButton.addEventListener('click', function() {
                    if (saveButton.disabled)
                        return; // Jika tombol sudah dinonaktifkan, keluar dari fungsi

                    // Mendapatkan form yang sesuai dengan tombol yang diklik
                    const formId = saveButton.getAttribute('form');
                    console.log('Form ID:', formId); // Debug
                    const form = document.getElementById(formId);
                    console.log('Form ditemukan:', form); // Debug

                    if (form && form.checkValidity()) {
                        console.log('Form valid'); // Debug
                        saveButton.disabled = true; // Nonaktifkan tombol saat diklik
                        saveButton.innerHTML =
                            '<div class="spinner-border text-light spinner-wrapper" role="status"><span class="sr-only">Loading...</span></div>'; // Ubah tampilan tombol
                        form.submit(); // Kirim formulir
                    } else {
                        form.reportValidity();
                    }

                    // Check if there are validation errors from the server
                });
            });
        });
        @if ($errors->any())
            let errorMessages = '';
            @foreach ($errors->all() as $error)
                errorMessages += "{{ $error }}<br>";
            @endforeach

            // Show error using SweetAlert
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                html: errorMessages
            });
        @endif
    </script>

    <!-- Status Button For Models -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.body.addEventListener('click', function(e) {
                if (e.target.classList.contains('btn-status')) {
                    const button = e.target;
                    const courseId = button.getAttribute('data-id');
                    const currentStatus = button.getAttribute('data-status');
                    const courseModel = button.getAttribute('data-model');

                    Swal.fire({
                        title: 'Konfirmasi',
                        text: `Apakah Anda yakin ingin mengubah status data ini?`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, Ubah!',
                        cancelButtonText: 'Batal',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch("{{ route('updateStatus') }}", {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    body: JSON.stringify({
                                        model: `App\\Models\\${courseModel}`,
                                        id: courseId,
                                        column: 'status' // Kolom yang ingin diubah
                                    })
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        button.setAttribute('data-status', data.newStatus);
                                        button.classList.toggle('btn-success', data.newStatus ==
                                            1);
                                        button.classList.toggle('btn-danger', data.newStatus ==
                                            0);
                                        button.textContent = data.newStatus == 1 ? 'Aktif' :
                                            'Nonaktif';

                                        Swal.fire('Berhasil!', data.message, 'success');
                                    } else {
                                        Swal.fire('Gagal!', data.message, 'error');
                                    }
                                })
                                .catch(error => {
                                    Swal.fire('Error!',
                                        'Terjadi kesalahan saat mengubah status.', 'error');
                                    console.error('Error:', error);
                                });
                        }
                    });
                }
            });
        });
    </script>

    <!-- Status Button For Entities -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.body.addEventListener('click', function(e) {
                if (e.target.classList.contains('btn-status-entities')) {
                    const button = e.target;
                    const courseId = button.getAttribute('data-id');
                    const currentStatus = button.getAttribute('data-status');
                    const parentEntities = button.getAttribute('data-parent');
                    const courseModel = button.getAttribute('data-model');

                    Swal.fire({
                        title: 'Konfirmasi',
                        text: `Apakah Anda yakin ingin mengubah status data ini?`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, Ubah!',
                        cancelButtonText: 'Batal',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch("{{ route('updateStatus') }}", {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    body: JSON.stringify({
                                        model: `Modules\\${parentEntities}\\Entities\\${courseModel}`,
                                        id: courseId,
                                        column: 'status' // Kolom yang ingin diubah
                                    })
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        button.setAttribute('data-status', data.newStatus);
                                        button.classList.toggle('btn-success', data.newStatus ==
                                            1);
                                        button.classList.toggle('btn-danger', data.newStatus ==
                                            0);
                                        button.textContent = data.newStatus == 1 ? 'Aktif' :
                                            'Nonaktif';

                                        Swal.fire('Berhasil!', data.message, 'success');
                                    } else {
                                        Swal.fire('Gagal!', data.message, 'error');
                                    }
                                })
                                .catch(error => {
                                    Swal.fire('Error!',
                                        'Terjadi kesalahan saat mengubah status.', 'error');
                                    console.log('Error:', error);
                                });
                        }
                    });
                }
            });
        });
    </script>
    @yield('script')

</body>

</html>
