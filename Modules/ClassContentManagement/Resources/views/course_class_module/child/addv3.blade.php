@extends('layout.main-v3')

@section('title', 'Tambah Sub Modul Kelas Mata Kuliah')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Tambah Data Baru</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCourseClass') }}">Daftar Kelas</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{ route('getCourseClassChildModule', ['id' => $parent_ccmod_detail->id]) }}">Modul
                                Kelas</a></li>
                        <li class="breadcrumb-item active">Tambah Sub Modul Baru</li>
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

                    <h4 class="card-title">Tambah Sub Modul Mata Kuliah Baru</h4>
                    <p class="card-title-desc">Halaman ini memungkinkan Anda untuk memperbarui informasi data dengan
                        memodifikasi data yang tercantum di bawah ini. Pastikan semua informasi yang Anda masukkan akurat
                        untuk memberikan pengalaman belajar terbaik bagi peserta mata kuliah.</p>

                    <form id="addCourseClassModuleChild" action="{{ route('postAddCourseClassChildModule') }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="course_class_id" value="{{ $class_detail->id }}">
                        <input type="hidden" name="ccmod_parent_id" value="{{ $parent_ccmod_detail->id }}">
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Kelas</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text"
                                    value="{{ $class_detail->course_name }} Batch {{ $class_detail->batch }}" disabled>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Modul <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <div class="d-flex gap-2 justify-content-between align-items-center">
                                    <select class="form-control select2 flex-grow-1" name="course_module_id"
                                        data-placeholder="Pilih Modul..." id="type_selector">
                                        <option value="" disabled
                                            {{ old('course_module_id') == '' ? 'selected' : '' }}>
                                            Pilih Modul</option>
                                        @foreach ($child_cm_list as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('course_module_id') == $item->id ? 'selected' : '' }}>
                                                [{{ $item->type }}] {{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modalId">
                                        Tambah Modul Baru
                                    </button>
                                </div>

                                @if ($errors->has('course_module_id'))
                                    @foreach ($errors->get('course_module_id') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-slug" class="col-md-2 col-form-label">Prioritas <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="priority"
                                    placeholder="Tentukan prioritas pelaksanaan modul (contoh: 1, 2, 3)" required
                                    value="{{ old('priority') }}">
                                @if ($errors->has('priority'))
                                    @foreach ($errors->get('priority') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Tanggal Mulai <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="date" name="start" id="date"
                                    value="{{ old('start') }}">
                                @if ($errors->has('start'))
                                    @foreach ($errors->get('start') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Tanggal Selesai <span
                                    class="text-danger" data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="date" name="end" id="date"
                                    value="{{ old('end') }}">
                                @if ($errors->has('end'))
                                    @foreach ($errors->get('end') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        {{-- Rich Text Field --}}
                        <div id="input-class-content" class="mb-3 row" style="display: none;">
                            <label class="col-md-2 col-form-label">Konten</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="class_content">{{ old('class_content') }}</textarea>
                            </div>
                        </div>
                        {{-- Dropdown Quiz Field --}}
                        <div id="input-class-quiz" class="mb-3 row" style="display: none;">
                            <label class="col-md-2 col-form-label">Konten</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="class_content" id="quiz_content"
                                    style="width: 100%">
                                    @foreach ($quiz as $item)
                                        <option value="{{ config('app.frontend_app_url') . '/lms/survey/' . $item->id }}">
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- Dropdown Eval Field --}}
                        <div id="input-class-eval" class="mb-3 row" style="display: none;">
                            <label class="col-md-2 col-form-label">Konten</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="class_content" id="eval_content"
                                    style="width: 100%">
                                    @foreach ($eval as $item)
                                        <option value="{{ config('app.frontend_app_url') . '/lms/survey/' . $item->id }}">
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Catatan Admin</label>
                            <div class="col-md-10">
                                <textarea class="form-control" id="content" name="description"
                                    placeholder="Deskripsikan tujuan atau isi modul (misalnya: Mengajarkan dasar-dasar akuntansi)">{{ old('description') }}</textarea>
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
                                    form="addCourseClassModuleChild">Tambah Sub Modul</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Tambah Modul Baru
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addChildModule"
                        action="{{ route('postAddChildModule', ['parentId' => $parent_cm_detail->id, 'page_type' => 'LMS_child']) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="current_page" value="class_management">

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Modul Induk</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" value="{{ $parent_cm_detail->name }}"
                                    disabled>
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
                        @if ($class_detail->course_type_slug == 'rapid-onboarding')
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
                                <label for="input-tag" class="col-md-2 col-form-label">Jenis Modul <span
                                        class="text-danger" data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                                <div class="col-md-10">
                                    <select class="form-control" name="type" id="type_selector_modal" required>
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
                                        <option value="eval" {{ old('type') == 'eval' ? 'selected' : '' }}>Evaluasi
                                            Akhir
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
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="submit" class="btn btn-primary w-md text-center custom-btn-submit"
                                    form="addChildModule">Tambah Sub Modul Mata Kuliah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#type_selector').on('change', function() {
                const moduleId = $(this).val();
                const frontendUrl = '{{ config('app.frontend_app_url') }}';
                const editor = tinymce.get('elm1');

                if (!editor) {
                    console.error('Editor not found');
                    return;
                }

                if (moduleId) {
                    $.ajax({
                        url: `/get-course-module-content/${moduleId}`,
                        method: 'GET',
                        success: function(data) {
                            console.log('Module content fetched:', data);

                            if (data.type === 'quiz') {
                                var idQuiz = afterLastSlash(data.content);

                                $('#quiz_content').val(frontendUrl + '/lms/survey/' + idQuiz);
                                $('#quiz_content').trigger('change');

                                $('#input-class-content').hide();
                                $('#input-class-quiz').show();
                                $('#input-class-eval').hide();

                                $('#elm1').removeAttr('name');
                                $('#eval_content').removeAttr('name');
                            } else if (data.type === 'eval') {
                                var idEval = afterLastSlash(data.content);

                                $('#eval_content').val(frontendUrl + '/lms/survey/' + idEval);
                                $('#eval_content').trigger('change');

                                $('#input-class-content').hide();
                                $('#input-class-quiz').hide();
                                $('#input-class-eval').show();

                                $('#elm1').removeAttr('name');
                                $('#quiz_content').removeAttr('name');
                            } else {
                                editor.setContent(data.content || '');

                                $('#input-class-content').show();
                                $('#input-class-quiz').hide();
                                $('#input-class-eval').hide();

                                $('#quiz_content').removeAttr('name');
                                $('#eval_content').removeAttr('name');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching module content:', error);
                        }
                    });
                } else {
                    // Reset the editor and hide both inputs if no moduleId is selected
                    editor.setContent('');
                    $('#input-class-content').hide();
                    $('#input-class-quiz').hide();
                    $('#input-class-eval').hide();
                }
            });
        });

        function afterLastSlash(str) {
            // Find the position of the last '/'
            const lastIndex = str.lastIndexOf('/');

            // Get the substring after the last '/'
            return lastIndex !== -1 ? str.substring(lastIndex + 1) : '';
        }
    </script>

    @if ($class_detail->course_type_slug != 'rapid-onboarding')
        <script>
            var typeSelectorModal = document.getElementById('type_selector_modal');
            var material = document.getElementById('material');
            var duration = document.getElementById('duration');

            function loadType() {
                if (tinymce.get('elm1')) {
                    tinymce.get('elm1').remove();
                }

                if (typeSelectorModal.value === 'materi_pembelajaran') {
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
                } else if (typeSelectorModal.value === 'video_pembelajaran') {
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
                } else if (typeSelectorModal.value === 'assignment') {
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
                } else if (typeSelectorModal.value === 'quiz') {
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
                } else if (typeSelectorModal.value === 'eval') {
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

            // Panggil loadType() saat typeSelectorModal diubah
            typeSelectorModal.addEventListener('change', loadType);
        </script>
    @endif
@endsection
