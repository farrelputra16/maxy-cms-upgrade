@extends('layout.main-v3')

@section('title', 'Ubah Data Umum')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Ubah Data</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a>Pengaturan</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getGeneral') }}">Umum</a></li>
                        <li class="breadcrumb-item active">Ubah Data</li>
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

                    <h4 class="card-title">Ubah Data: {{ $generals->name }} </h4>
                    <p class="card-title-desc">
                        Halaman ini digunakan untuk memperbarui data <strong>{{ $generals->name }}</strong>. Anda dapat
                        mengubah nilai,
                        deskripsi, dan status aktif dari pengaturan yang dipilih. Pastikan semua perubahan yang Anda buat
                        sudah benar
                        sebelum menyimpannya.
                    </p>

                    <form action="{{ route('postEditGeneral', ['id' => request()->query('id')]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Nama <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" id="name"
                                    value="{{ $generals->name }}">
                                @if ($errors->has('name'))
                                    @foreach ($errors->get('name') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        @if ($generals->name == 'logo' || $generals->name == 'icon')
                            <div class="mb-3 row">
                                <label for="input-value" class="col-md-2 col-form-label">Current
                                    {{ $generals->name }}</label>

                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="value" id="value"
                                        value="{{ $generals->value }}">
                                    @if ($errors->has('value'))
                                        @foreach ($errors->get('value') as $error)
                                            <span style="color: red;">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                    <img class="mt-2 img-fluid w-25" src="{{ asset('uploads/' . $generals->value) }}"
                                        alt="logo">
                                </div>

                            </div>
                        @else
                            <div class="mb-3 row">
                            <label for="input-type" class="col-md-2 col-form-label">Isi
                                <span class="text-danger" data-bs-toggle="tooltip" title="Wajib diisi">*</span>
                            </label>
                            <div class="col-md-10">
                                <select id="input-type" class="form-control mb-2" name="type">
                                    <option value="text">Teks sederhana</option>
                                    <option value="richtext">Teks kompleks
                                    </option>
                                </select>

                                <input class="form-control d-none" type="text" name="value-text" id="value-text"
                                    placeholder="Masukkan isi data" value="{!! strip_tags($generals->value) !!}">

                                <div id="richtext-container" class="position-relative d-none">
                                    <div id="loading-spinner"
                                        class="spinner-border text-primary position-absolute top-50 start-50" role="status"
                                        style="display: none; z-index: 1;">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <textarea class="form-control" name="value-richtext" id="value-richtext" placeholder="Masukkan isi data">{{ $generals->value }}</textarea>
                                </div>

                                @if ($errors->has('value'))
                                    @foreach ($errors->get('value') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        @endif

                        <!-- Input untuk Gambar -->
                        @if ($generals->name == 'logo' || $generals->name == 'icon')
                            <div class="mb-3 row">
                                <label for="input-image" class="col-md-2 col-form-label">Gambar</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="file" name="image" id="image">
                                    @if ($errors->has('image'))
                                        @foreach ($errors->get('image') as $error)
                                            <span style="color: red;">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        @else
                            <input type="text" name="image" hidden value="{{ $generals->image }}">
                        @endif

                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Catatan Admin</label>
                            <div class="col-md-10">
                                <textarea id="content" class="form-control" name="description" id="description">{{ $generals->description }}</textarea>
                            </div>
                        </div>
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    name="status" value="1" {{ $generals->status == 1 ? 'checked' : '' }}>
                                <label class="m-0">Aktif</label>
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary w-md text-center">Simpan & Perbarui Data
                                    Umum</button>
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
