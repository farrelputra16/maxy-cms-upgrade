@extends('layout.main-v3')

@section('title', 'Tambah MBKM')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Tambah Data Baru</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCourseMBKM') }}">MBKM</a></li>
                        <li class="breadcrumb-item active">Tambah MBKM Baru</li>
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

                    <h4 class="card-title">Tambah MBKM Baru</h4>
                    <p class="card-title-desc">
                        Silakan lengkapi informasi mata kuliah di bawah ini.
                        Pastikan data yang Anda masukkan benar agar peserta mata kuliah mendapatkan pengalaman belajar yang
                        terbaik.
                    </p>


                    <form id="mbkmForm" action="{{ route('postAddCourse') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="mbkmForm">
                        {{-- <input type="text" name="img_keep" value="{{ $blog->cover_img }}" hidden> --}}


                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Nama MBKM <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" id="name"
                                    placeholder="Contoh: MBKM Akuntansi, MBKM Manajemen Keuangan, atau MBKM Ekonomi Digital"
                                    value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    @foreach ($errors->get('name') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-slug" class="col-md-2 col-form-label">Slug <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="slug" id="slug"
                                    placeholder="Slug otomatis berdasarkan nama MBKM" readonly>
                                @if ($errors->has('slug'))
                                    @foreach ($errors->get('slug') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        @if (env('APP_ENV') != 'local')
                            <div class="mb-3 row">
                                <label for="input-payment" class="col-md-2 col-form-label">Tautan Pembayaran</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="payment_link" id="payment_link"
                                        value="{{ old('payment_link') }}" placeholder="https://example.com">
                                    @if ($errors->has('payment_link'))
                                        @foreach ($errors->get('payment_link') as $error)
                                            <span style="color: red;">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        @endif
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Tingkat Kesulitan <small>(Program
                                    MBKM)</small></label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="level"
                                    data-placeholder="Pilih Tingkat Kesulitan">
                                    @foreach ($allCourseDifficulty as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('level') == $item->id ? 'selected' : '' }}> {{ $item->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Jenis MBKM <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <!-- Menampilkan nilai MBKM yang sudah dipilih dan tidak bisa diubah -->
                                <input class="form-control" type="text" value="MBKM" disabled>

                                <!-- Mengirimkan nilai type yang readonly ke server melalui hidden input -->
                                <input type="hidden" name="type" value="{{ $mbkmTypeId }}">

                                @if ($errors->has('type'))
                                    @foreach ($errors->get('type') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Kategori Mata Kuliah
                                <small>(Prodi)</small></label>
                            <div class="col-md-10">
                                <select class="form-control select2 multiple" name="courseCategory[]"
                                    data-placeholder="Pilih Program Studi" id="type_selector" multiple="multiple">
                                    @foreach ($allCourseCategory as $courseCategory)
                                        <option value="{{ $courseCategory->id }}"
                                            {{ in_array($courseCategory->id, old('courseCategory', [])) ? 'selected' : '' }}>
                                            {{ $courseCategory->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('courseCategory[]'))
                                    @foreach ($errors->get('courseCategory[]') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-file" class="col-md-2 col-form-label">Gambar</label>
                            <div class="col-md-10">
                                <input class="form-control" type="file" name="file_image" id="input-file"
                                    accept="image/*" onchange="previewImage()"
                                    placeholder="Unggah gambar representatif untuk MBKM, seperti logo atau infografis.">

                                <!-- Preview gambar yang dipilih -->
                                <img id="frame" src="" alt="Preview Image" class="img-fluid"
                                    style="margin-top: 20px; max-height: 180px; object-fit: contain; display: block;" />

                                <br>
                                @if ($errors->has('file_image'))
                                    @foreach ($errors->get('file_image') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Konten</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="content"
                                    placeholder="Contoh: Kegiatan meliputi magang di perusahaan akuntansi dan proyek kolaborasi bisnis.">{{ old('content') }}</textarea>
                                @if ($errors->has('content'))
                                    @foreach ($errors->get('content') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-short-description" class="col-md-2 col-form-label">Deskripsi Pratinjau</label>
                            <div class="col-md-10">
                                <textarea id="elmDesc" name="short_description" class="form-control"
                                    placeholder="Contoh: Program MBKM ini memberikan pengalaman praktis melalui magang di perusahaan keuangan terkemuka.">{{ old('short_description') }}</textarea>
                                @if ($errors->has('short_description'))
                                    @foreach ($errors->get('short_description') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Catatan Admin</label>
                            <div class="col-md-10">
                                <textarea id="elm3" name="description" class="form-control"
                                    placeholder="Contoh: Program MBKM ini bertujuan untuk mengasah kemampuan analisis laporan keuangan dan manajemen risiko.">{{ old('description') }}</textarea>
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
                                    name="status" {{ old('status') ? 'checked' : '' }}>
                                <label class="m-0">Aktif</label>
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary w-md text-center custom-btn-submit"
                                    form="mbkmForm">Tambah MBKM</button>
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
        // autofill slug
        document.getElementById('name').addEventListener('input', function() {
            var name = this.value;
            var slug = name.toLowerCase().trim().replace(/[^a-z0-9\s-]/g, '').replace(/\s+/g, '-');
            document.getElementById('slug').value = slug;
        });

        // preview image
        function previewImage() {
            const input = document.getElementById('input-file');
            const frame = document.getElementById('frame');

            // Check if a file is selected and it's an image
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                // Event listener for when the file is read
                reader.onload = function(e) {
                    frame.src = e.target.result; // Set the image source to the file
                }

                // Read the selected file as a Data URL (base64)
                reader.readAsDataURL(input.files[0]);
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            // Initialize TinyMCE for the 'content' textarea
            if (document.getElementById("elmDesc")) {
                tinymce.init({
                    selector: "textarea#elmDesc",
                    height: 350,
                    plugins: [
                        "advlist",
                        "autolink",
                        "lists",
                        "link",
                        "image",
                        "charmap",
                        "preview",
                        "anchor",
                        "searchreplace",
                        "visualblocks",
                        "code",
                        "fullscreen",
                        "insertdatetime",
                        "media",
                        "table",
                        "help",
                        "wordcount",
                    ],
                    toolbar: "undo redo | blocks | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help",
                    content_style: 'body { font-family:"Poppins",sans-serif; font-size:16px }',
                });
            }
        });

        if ($('#type_selector').val() == '') {
            $("#show_course_package").hide();
            $("#show_course_mini_price").hide();
            $("#show_course_mini_fake_price").hide();
        }
        $('#type_selector').change(function() {
            var responseID = $(this).val();
            if (responseID == 1) {
                $("#show_course_mini_fake_price").hide();
                $("#show_course_mini_price").hide();
                $("#show_course_package").show();
            } else if (responseID == 3) {
                $("#show_course_mini_fake_price").show();
                $("#show_course_mini_price").show();
                $("#show_course_package").hide();
            } else {
                $("#show_course_mini_fake_price").hide();
                $("#show_course_mini_price").hide();
                $("#show_course_package").hide();
            }
        })

        var rupiah = document.getElementById('mini_price');
        rupiah.addEventListener('keyup', function(e) {
            rupiah.value = formatRupiah(this.value, 'Rp. ');
        });

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }

        var rupiah1 = document.getElementById('fake_price');
        rupiah1.addEventListener('keyup', function(e) {
            rupiah1.value = formatRupiah(this.value, 'Rp. ');
        });

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah1 = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah1 += separator + ribuan.join('.');
            }

            rupiah1 = split[1] != undefined ? rupiah1 + ',' + split[1] : rupiah1;
            return prefix == undefined ? rupiah1 : (rupiah1 ? 'Rp. ' + rupiah1 : '');
        }

        CKEDITOR.replace('content');
        CKEDITOR.replace('description');
    </script>
@endsection
