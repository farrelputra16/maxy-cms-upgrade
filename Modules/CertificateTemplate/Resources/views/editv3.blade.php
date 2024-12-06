@extends('layout.main-v3')

@section('title', 'Ubah Template Sertifikat')

@section('content')
    <!-- Mulai Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Ubah Template Sertifikat</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('certificate-templates.index') }}">Template
                                Sertifikat</a></li>
                        <li class="breadcrumb-item active">Ubah Template Sertifikat</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Judul Halaman -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form Ubah Template Sertifikat</h4>
                    <p class="card-title-desc">Gunakan form di bawah ini untuk memperbarui informasi template sertifikat.
                        Pastikan semua informasi yang Anda masukkan akurat agar sertifikat yang dihasilkan sesuai dengan
                        kebutuhan peserta mata kuliah.</p>

                    <form action="{{ route('certificate-templates.update', $certificateTemplate->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Tipe Mata Kuliah <span
                                    class="text-danger" data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="m_course_type_id" id="courseType">
                                    @foreach ($courseTypes as $courseType)
                                        <option value="{{ $courseType->id }}"
                                            {{ old('m_course_type_id', $certificateTemplate->m_course_type_id) == $courseType->id ? 'selected' : '' }}>
                                            {{ $courseType->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('m_course_type_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Paralel <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="batch" id="batch" min="0"
                                    value="{{ old('batch', $certificateTemplate->batch) }}"
                                    placeholder="Masukkan kelas paralel (contoh: 2024)">
                                @error('batch')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="Image" class="col-md-2 col-form-label">Contoh Template</label>
                            <div class="col-md-10">
                                <img src="{{ asset('uploads/certificate/template_example.png') }}" class="img-fluid"
                                    alt="Contoh Template Sertifikat" />
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="Image" class="col-md-2 col-form-label">Unggah Template <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="file" name="filename" id="templateImage"
                                    accept=".png">
                                <small>* Format file yang diterima: .png</small>
                                <div
                                    class="position-relative d-flex flex-column justify-content-center align-items-center mt-2">
                                    <img id="sourceImage" class="img-fluid" alt="Pratinjau Template"
                                        src="{{ asset('uploads/certificate/' . $certificateTemplate->m_course_type_id . '/' . $certificateTemplate->filename) }}" />
                                    <img id="originalImage" class="img-fluid position-absolute" alt="Pratinjau Template"
                                        src="{{ asset('uploads/certificate/' . $certificateTemplate->m_course_type_id . '/' . $certificateTemplate->filename) }}" />
                                </div>
                                @error('filename')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Isi Template <span
                                    class="text-danger" data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="template_content"
                                    placeholder="Contoh: Telah berhasil menyelesaikan program [[class_name]]">{{ old('template_content', $certificateTemplate->template_content) }}</textarea>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Catatan Admin</label>
                            <div class="col-md-10">
                                <textarea id="elm2" name="description" class="form-control" placeholder="Tambahkan deskripsi template (opsional)">{{ old('description', $certificateTemplate->description) }}</textarea>
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary w-md text-center">Simpan & Perbarui</button>
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
        $(function() {
            let editors = {};

            $("#templateImage").change(function() {
                let file = this.files[0];
                let reader = new FileReader();

                reader.onload = function(e) {
                    $('#sourceImage').attr('src', e.target.result);
                    $('#originalImage').attr('src', e.target.result);
                }

                reader.readAsDataURL(file);
            });

            let sourceImage, targetRoot, maState;

            function setSourceImage(source) {
                sourceImage = source;
                targetRoot = source.parentElement;
            }

            function showMarkerArea(target) {
                const markerArea = new markerjs2.MarkerArea(sourceImage);
                markerArea.availableMarkerTypes = ["CaptionFrameMarker"];
                markerArea.targetRoot = targetRoot;
                markerArea.addEventListener("render", (event) => {
                    target.src = event.dataUrl;
                    maState = event.state;
                });

                markerArea.show();

                if (maState) {
                    markerArea.restoreState(maState);
                }

                markerArea.addEventListener("markerchange", (event) => {
                    console.log(event.marker.captionText);
                });
            }

            setSourceImage(document.getElementById("sourceImage"));

            const sampleImage = document.getElementById("originalImage");
            $(sampleImage).on("click", () => {
                showMarkerArea(sampleImage);
            });

            $("#templateForm").on("submit", function(e) {
                e.preventDefault();
                $("input[name='marker_state']").val(JSON.stringify(maState));
                this.submit();
            });

            if ($("#description").length) {
                ClassicEditor
                    .create(document.querySelector("#description"))
                    .then(editor => {
                        editors["description"] = editor;
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }

            if ($("#templateContent").length) {
                ClassicEditor
                    .create(document.querySelector("#templateContent"))
                    .then(editor => {
                        editors["templateContent"] = editor;
                    })
                    .catch(error => {
                        console.error(error);
                    });
            };
        });
    </script>
@endsection
