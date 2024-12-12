@extends('layout.main-v3')

@section('title', 'Tambah Data Umum')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Tambah Data Baru</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pengaturan</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getGeneral') }}">Pengaturan Umum</a></li>
                        <li class="breadcrumb-item active">Tambah Data</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Data Umum Baru</h4>
                    <p class="card-title-desc">
                        Halaman ini digunakan untuk menambahkan data umum baru. Lengkapi input di bawah untuk menambahkan
                        data baru. Pastikan data yang Anda masukkan sudah benar, termasuk nama, nilai, dan deskripsi.
                    </p>

                    <form id="addGeneral" action="{{ route('postAddGeneral') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Nama
                                <span class="text-danger" data-bs-toggle="tooltip" title="Wajib diisi">*</span>
                            </label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" id="name"
                                    placeholder="Masukkan Nama Data Umum">
                                @if ($errors->has('name'))
                                    @foreach ($errors->get('name') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-type" class="col-md-2 col-form-label">Isi
                                <span class="text-danger" data-bs-toggle="tooltip" title="Wajib diisi">*</span>
                            </label>
                            <div class="col-md-10">
                                <select id="input-type" class="form-control mb-2" name="type">
                                    <option value="text" {{ old('type') === 'text' ? 'selected' : '' }}>Teks</option>
                                    <option value="richtext" {{ old('type') === 'richtext' ? 'selected' : '' }}>Rich Text
                                    </option>
                                </select>

                                <input class="form-control d-none" type="text" name="value-text" id="value-text"
                                    placeholder="Masukkan isi data">

                                <div id="richtext-container" class="position-relative d-none">
                                    <div id="loading-spinner"
                                        class="spinner-border text-primary position-absolute top-50 start-50" role="status"
                                        style="display: none; z-index: 1;">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <textarea class="form-control" name="value-richtext" id="value-richtext" placeholder="Masukkan isi data"></textarea>
                                </div>

                                @if ($errors->has('value'))
                                    @foreach ($errors->get('value') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Catatan Admin</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="description">
                                @if ($errors->has('description'))
                                    @foreach ($errors->get('description') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    name="status">
                                <label class="m-0">Aktif</label>
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary w-md text-center custom-btn-submit"
                                    form="addGeneral">Tambah Data Umum</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const inputTypeSelector = document.getElementById('input-type');
            const textInput = document.getElementById('value-text');
            const richTextContainer = document.getElementById('richtext-container');
            const richTextInput = document.getElementById('value-richtext');
            const spinner = document.getElementById('loading-spinner');

            // Fungsi untuk toggle tampilan input
            function toggleInputType() {
                const selectedType = inputTypeSelector.value;

                if (selectedType === 'text') {
                    textInput.classList.remove('d-none');
                    richTextContainer.classList.add('d-none');

                    // Hapus editor TinyMCE jika ada
                    if (tinymce.get("value-richtext")) {
                        tinymce.remove("#value-richtext");
                    }
                } else if (selectedType === 'richtext') {
                    textInput.classList.add('d-none');
                    richTextContainer.classList.remove('d-none');

                    // Tampilkan spinner setiap kali richtext dipilih
                    spinner.style.display = 'block';

                    // Inisialisasi ulang TinyMCE
                    if (!tinymce.get("value-richtext")) {
                        tinymce.init({
                            selector: "#value-richtext",
                            height: 350,
                            plugins: [
                                "advlist autolink lists link image charmap preview anchor",
                                "searchreplace visualblocks code fullscreen",
                                "insertdatetime media table help wordcount"
                            ],
                            toolbar: "undo redo | blocks | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help",
                            content_style: 'body { font-family: "Poppins", sans-serif"; font-size: 16px; }',
                            setup: function(editor) {
                                editor.on('init', function() {
                                    // Sembunyikan spinner setelah TinyMCE selesai dimuat
                                    spinner.style.display = 'none';
                                });
                            }
                        });
                    } else {
                        // Jika TinyMCE sudah ada, cukup reset spinner
                        spinner.style.display = 'none';
                    }
                }
            }

            // Event listener untuk perubahan dropdown
            inputTypeSelector.addEventListener('change', toggleInputType);

            // Set tampilan awal
            toggleInputType();
        });
    </script>
@endsection
