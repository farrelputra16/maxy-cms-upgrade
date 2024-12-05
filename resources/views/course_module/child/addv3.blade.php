@extends('layout.main-v3')

@section('title', 'Tambah Sub Modul Mata Kuliah')

@section('content')
    <!-- Awal Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Tambah Data Baru</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCourse') }}">Mata Kuliah</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{ route('getCourseModule', ['course_id' => $parent->course_id, 'page_type' => 'LMS']) }}">Modul
                                Mata Kuliah</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{ route('getCourseSubModule', ['course_id' => $parent->course_id, 'module_id' => $parent->id, 'page_type' => 'LMS_child']) }}">Sub
                                Modul Mata Kuliah</a></li>
                        <li class="breadcrumb-item active">Tambah Sub Modul Mata Kuliah Baru</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Judul Halaman -->

    <!-- Awal Konten -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Tambah Sub Modul Mata Kuliah Baru</h4>
                    <p class="card-title-desc">
                        Halaman ini memungkinkan Anda untuk menambahkan sub modul mata kuliah pada mata kuliah yang ada. Isi
                        data-data
                        dengan lengkap dan pastikan informasinya akurat agar pengalaman belajar peserta mata kuliah
                        maksimal.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li>Isi <b>Nama Modul</b> dengan judul yang sesuai dan singkat.</li>
                        <li>Atur <b>Prioritas</b> untuk menentukan urutan tampil modul.</li>
                        <li>Pilih <b>Jenis Modul</b> yang sesuai, kemudian isi konten tambahan yang muncul berdasarkan jenis
                            tersebut.</li>
                        <li>Pastikan untuk menambahkan deskripsi yang menjelaskan modul ini.</li>
                        <li>Klik <b>Tambah Sub Modul Mata Kuliah</b> untuk menyimpan data yang telah diisi.</li>
                    </ul>
                    </p>

                    <form id="addChildModule"
                        action="{{ route('postAddChildModule', ['parentId' => $parent->id, 'page_type' => $page_type]) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Modul Induk</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" value="{{ $parent->name }}" disabled>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Nama Modul <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name"
                                    placeholder="Contoh: Analisis Laporan Keuangan, Dasar-dasar Manajemen, atau Pengantar Ekonomi Mikro"
                                    value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    @foreach ($errors->get('name') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Prioritas <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="priority" min="1"
                                    placeholder="Contoh: 1 untuk modul pertama, 2 untuk modul kedua, dan seterusnya"
                                    value="{{ old('priority') }}">
                                @if ($errors->has('priority'))
                                    @foreach ($errors->get('priority') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        @if ($course_type->slug == 'rapid-onboarding')
                            <div class="mb-3 row">
                                <label for="input-content" class="col-md-2 col-form-label">HTML</label>
                                <div class="col-md-10">
                                    <textarea id="elm1" name="html">{{ old('html') }}</textarea>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="input-content" class="col-md-2 col-form-label">JS</label>
                                <div class="col-md-10">
                                    <textarea id="elm1" name="js">{{ old('js') }}</textarea>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="input-content" class="col-md-2 col-form-label">Konten</label>
                                <div class="col-md-10">
                                    <textarea id="elm1" name="content">{{ old('content') }}</textarea>
                                </div>
                            </div>
                            <input type="hidden" name="rapid" value="1">
                        @else
                            <div class="mb-3 row">
                                <label for="input-tag" class="col-md-2 col-form-label">Jenis Modul <span class="text-danger"
                                        data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                                <div class="col-md-10">
                                    <select class="form-control" name="type" id="type_selector" required>
                                        <option value="" disabled {{ old('type') == '' ? 'selected' : '' }}>Pilih
                                            Jenis Modul</option>
                                        <option value="materi_pembelajaran"
                                            {{ old('type') == 'materi_pembelajaran' ? 'selected' : '' }}>Materi
                                            Pembelajaran (PDF, Slide, dll.)</option>
                                        <option value="video_pembelajaran"
                                            {{ old('type') == 'video_pembelajaran' ? 'selected' : '' }}> Video Pembelajaran
                                            (MP4, YouTube, dll.)
                                        </option>
                                        <option value="assignment" {{ old('type') == 'assignment' ? 'selected' : '' }}>
                                            Tugas (Unggah Berkas)</option>
                                        <option value="quiz" {{ old('type') == 'quiz' ? 'selected' : '' }}>Kuis (Pilih
                                            dari daftar kuis yang tersedia)</option>
                                        <option value="eval" {{ old('type') == 'eval' ? 'selected' : '' }}>Evaluasi Akhir
                                            (Survey atau Tes Akhir)</option>
                                    </select>
                                    @if ($errors->has('type'))
                                        @foreach ($errors->get('type') as $error)
                                            <span style="color: red;">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="field" id="material"></div>
                            <div class="field" id="duration"></div>
                        @endif
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Catatan Admin</label>
                            <div class="col-md-10">
                                <textarea id="content" class="form-control" name="description"
                                    placeholder="Contoh: Modul ini membahas teknik menganalisis laporan keuangan untuk perusahaan kecil dan menengah.">{{ old('description') }}</textarea>
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
                                    form="addChildModule">Tambah Sub Modul Mata Kuliah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- akhir col -->
    </div> <!-- akhir row -->
@endsection

@section('script')

    @if ($course_type->slug != 'rapid-onboarding')
        <script>
            var typeSelector = document.getElementById('type_selector');
            var material = document.getElementById('material');
            var duration = document.getElementById('duration');

            function loadType() {
                if (tinymce.get('elm1')) {
                    tinymce.get('elm1').remove();
                }

                if (typeSelector.value === 'materi_pembelajaran') {
                    material.innerHTML = `
                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label">File Materi Pembelajaran</label>
                        <div class="col-md-10">
                            <input class="form-control" type="file" name="material" placeholder="Unggah dokumen seperti PDF atau slide presentasi terkait topik ekonomi/bisnis.">
                            @if ($errors->has('material'))
                                @foreach ($errors->get('material') as $error)
                                    <span style="color: red;">{{ $error }}</span>
                                @endforeach
                            @endif
                        </div>
                    </div>
                `;
                    duration.innerHTML = `
                <input type="hidden" name="duration" value="">
                <div class="mb-3 row">
                    <label for="input-content" class="col-md-2 col-form-label">Konten</label>
                    <div class="col-md-10">
                        <textarea id="elm1" name="content">{{ old('content') }}</textarea>
                    </div>
                </div>
                `;
                } else if (typeSelector.value === 'video_pembelajaran') {
                    material.innerHTML = `
                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label">Link Video</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="material" placeholder="Masukkan tautan video dari YouTube seperti 'Pengantar Investasi Pasar Modal'." value="{{ old('material') }}">
                            @if ($errors->has('material'))
                                @foreach ($errors->get('material') as $error)
                                    <span style="color: red;">{{ $error }}</span>
                                @endforeach
                            @endif
                        </div>
                    </div>
                `;
                    duration.innerHTML = `
                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label">Durasi Video</label>
                        <div class="col-md-10">
                            <input class="form-control" type="number" name="duration" placeholder="Durasi dalam menit, misalnya 15 atau 30." value="{{ old('duration') }}">
                            @if ($errors->has('duration'))
                                @foreach ($errors->get('duration') as $error)
                                    <span style="color: red;">{{ $error }}</span>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input-content" class="col-md-2 col-form-label">Konten</label>
                        <div class="col-md-10">
                            <textarea id="elm1" name="content">{{ old('content') }}</textarea>
                        </div>
                    </div>
                `;
                } else if (typeSelector.value === 'assignment') {
                    material.innerHTML = `
                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label">File Tugas</label>
                        <div class="col-md-10">
                            <input class="form-control" type="file" name="material">
                        </div>
                    </div>
                    <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                        <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Dapat Dinilai</label>
                        <div class="col-md-10 d-flex align-items-center">
                            <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                name="grade_status" {{ old('grade_status') ? 'checked' : '' }}>
                            <label class="m-0">Iya</label>
                        </div>
                    </div>
                `;
                    duration.innerHTML = `
                <input type="hidden" name="duration" value="">
                <div class="mb-3 row">
                    <label for="input-content" class="col-md-2 col-form-label">Konten</label>
                    <div class="col-md-10">
                        <textarea id="elm1" name="content">{{ old('content') }}</textarea>
                    </div>
                </div>
                `;
                } else if (typeSelector.value === 'quiz') {
                    material.innerHTML = `
                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label">Pilih Kuis</label>
                        <div class="col-md-10">
                            <select class="form-control select2" name="quiz_content" required>
                                @foreach ($quiz as $item)
                                <option value="{{ config('app.frontend_app_url') . '/lms/survey/' . $item->id }}"
                                    {{ old('quiz_content') == config('app.frontend_app_url') . '/lms/survey/' . $item->id ? 'selected' : '' }}>
                                    {{ $item->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                `;
                    duration.innerHTML = `<input type="hidden" name="duration" value="">`;
                } else if (typeSelector.value === 'eval') {
                    material.innerHTML = `
                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label">Pilih Kuis</label>
                        <div class="col-md-10">
                            <select class="form-control select2" name="eval_content" required>
                                @foreach ($eval as $item)
                                <option value="{{ config('app.frontend_app_url') . '/lms/survey/' . $item->id }}"
                                    {{ old('eval_content') == config('app.frontend_app_url') . '/lms/survey/' . $item->id ? 'selected' : '' }}>
                                    {{ $item->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                `;
                    duration.innerHTML = `<input type="hidden" name="duration" value="">`;
                }

                if (document.querySelector("textarea#elm1")) {
                    tinymce.init({
                        selector: "textarea#elm1",
                        height: 350,
                        plugins: [
                            "advlist", "autolink", "lists", "link", "image", "charmap", "preview", "anchor",
                            "searchreplace",
                            "visualblocks", "code", "fullscreen", "insertdatetime", "media", "table", "help",
                            "wordcount",
                        ],
                        toolbar: "undo redo | blocks | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help",
                        content_style: 'body { font-family:"Poppins",sans-serif; font-size:16px }',
                    });
                }
            }

            // Jalankan fungsi loadType() saat halaman pertama kali dimuat
            document.addEventListener('DOMContentLoaded', function() {
                loadType();
            });

            // Panggil loadType() saat typeSelector diubah
            typeSelector.addEventListener('change', loadType);
        </script>
    @endif
@endsection
