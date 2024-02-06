@extends('layout.master')

@section('title', 'Tambah Template')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <style>
        .ck-editor__editable_inline:not(.ck-comment__input *) {
            height: 250px;
            overflow-y: auto;
        }
    </style>
@endsection

@section('content')
    <div class="px-3 pb-3">
        <h2>Tambah Template Sertifikat</h2>
        <hr>
        <form id="templateForm" class="ui form" action="{{ route('certificate-templates.store') }}"
              method="POST" enctype="multipart/form-data">
            @csrf

            <div class="two fields">
                <div class="field">
                    <label for="courseType" class="form-label fs-5 mb-3">Course Type</label>
                    <select class="ui search selection dropdown" id="courseType" name="m_course_type_id">
                        <option value="" disabled selected>Pilih Tipe Kursus</option>
                        @foreach($courseTypes as $courseType)
                            <option
                                value="{{ $courseType->id }}" {{ $loop->iteration === 1 ? 'selected' : '' }}>{{ $courseType->name }}</option>
                        @endforeach
                    </select>
                    @error("m_course_type_id")
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="field">
                    <label for="batch" class="form-label fs-5 mb-3">Batch</label>
                    <input type="number" name="batch" id="batch" class="form-control" min="0" placeholder="Masukkan batch">
                    @error("batch")
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="two fields">
                <div class="field">
                    <label for="Image" class="form-label fs-5 mb-3">Sample:</label>
                    <img src="{{ asset('uploads/certificate/template_example.png') }}" class="img-fluid" alt=""/>
                </div>

                <div class="field">
                    <label for="Image" class="form-label fs-5 mb-3">Template</label>
                    <input class="form-control" type="file" id="templateImage" name="filename" accept=".png">
                    <small>* Accepted File Type: .png</small>
                    <div class="position-relative d-flex flex-column justify-content-center align-items-center">
                        <img id="sourceImage" class="img-fluid" alt="" src=""/>
                        <img id="originalImage" class="img-fluid position-absolute" alt="" src=""/>
                    </div>
                    @error("filename")
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="two fields">
                <div class="field">
                    <label for="templateContent" class="form-label fs-5 mb-3">Template Content</label>
                    <textarea id="templateContent" name="template_content"
                              placeholder="Ex: Telah berhasil menyelesaikan program [[class_name]]"></textarea>
                    @error("template_content")
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="field">
                    <label for="description" class="form-label fs-5 mb-3">Description</label>
                    <textarea id="description" name="description"></textarea>
                    @error("description")
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <input type="hidden" name="marker_state">

            <div class="d-flex gap-2 justify-content-end">
                <a href="{{ url()->previous() }}" class="ui red button">
                    Batal
                </a>
                <button class="ui button primary" type="submit">Save</button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="https://unpkg.com/markerjs2/markerjs2.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        $("#courseType").dropdown();

        $(function () {
            let editors = {};

            $("#templateImage").change(function () {
                let file = this.files[0];
                let reader = new FileReader();

                reader.onload = function (e) {
                    $('#sourceImage').attr('src', e.target.result);
                    $('#originalImage').attr('src', e.target.result);
                }

                reader.readAsDataURL(file);
            });

            let sourceImage, targetRoot, maState;

            // save references to the original image and its parent div (positioning root)
            function setSourceImage(source) {
                sourceImage = source;
                targetRoot = source.parentElement;
            }

            function showMarkerArea(target) {
                const markerArea = new markerjs2.MarkerArea(sourceImage);
                markerArea.availableMarkerTypes = ["CaptionFrameMarker"];

                // since the container div is set to position: relative it is now our positioning root
                // end we have to let marker.js know that
                markerArea.targetRoot = targetRoot;
                markerArea.addEventListener("render", (event) => {
                    target.src = event.dataUrl;
                    // save the state of MarkerArea
                    maState = event.state;
                    console.log(maState);
                });

                markerArea.show();

                // if previous state is present - restore it
                if (maState) {
                    markerArea.restoreState(maState);
                }

                markerArea.addEventListener("markerchange", (event) => {
                    console.log(event.marker.captionText);
                });
            }

            setSourceImage(document.getElementById("sourceImage"));

            const sampleImage = document.getElementById("originalImage");
            sampleImage.addEventListener("click", () => {
                showMarkerArea(sampleImage);
            });

            $("#templateForm").on("submit", function (e) {
                e.preventDefault();
                $("input[name='marker_state']").val(JSON.stringify(maState));
                this.submit();
            })

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
                        editors["description"] = editor;
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }
        })
    </script>
@endsection
