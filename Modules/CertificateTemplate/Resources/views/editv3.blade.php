@extends('layout.main-v3')

@section('title', 'Edit Certificate Template')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Edit Data</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="certificate-templates.index">Template</a></li>
                        <li class="breadcrumb-item active">Edit Certificate Template</li>
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

                    <h4 class="card-title">Edit Certificate Template</h4>
                    <p class="card-title-desc">This page allows you to update a data's information by modifying the data
                        listed below. Ensure that all the information you enter is accurate to provide the best learning
                        experience for the course participants.</p>

                    <form action="{{ route('certificate-templates.update', $certificateTemplate->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Course Type</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="m_course_type_id" id="courseType">
                                    @foreach ($courseTypes as $courseType)
                                        <option value="{{ $courseType->id }}"
                                            {{ old('m_course_type_id', $certificateTemplate->m_course_type_id) == $courseType->id ? 'selected' : '' }}>
                                            {{ $courseType->name }}</option>
                                    @endforeach
                                </select>
                                @error('m_course_type_id')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Batch</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="batch" id="batch" min="0"
                                    value="{{ old('batch', $certificateTemplate->batch) }}">
                                @error('batch')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="Image" class="col-md-2 col-form-label">Sample</label>
                            <div class="col-md-10">
                                <img src="{{ asset('uploads/certificate/template_example.png') }}" class="img-fluid"
                                    alt="" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="Image" class="col-md-2 col-form-label">Template</label>
                            <div class="col-md-10">
                                <input class="form-control" type="file" name="filename" id="templateImage"
                                    accept=".png">
                                <small>* Accepted File Type: .png</small>
                                <div class="position-relative d-flex flex-column justify-content-center align-items-center">
                                    <img id="sourceImage" class="img-fluid" alt=""
                                        src="{{ asset('uploads/certificate/' . $certificateTemplate->m_course_type_id . '/' . $certificateTemplate->filename) }}" />
                                    <img id="originalImage" class="img-fluid position-absolute" alt=""
                                        src="{{ asset('uploads/certificate/' . $certificateTemplate->m_course_type_id . '/' . $certificateTemplate->filename) }}" />
                                </div>
                                @error('filename')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Template Content</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="template_content" placeholder="Ex: Telah berhasil menyelesaikan program [[class_name]]">{!! old('template_content', $certificateTemplate->template_content) !!}</textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Description</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="description">{!! old('description', $certificateTemplate->description) !!}</textarea>
                                @error('description')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary w-md text-center">Save & Update</button>
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

            // Correctly pass the JSON string from Blade to JavaScript
            // maState = {
            //     {
            //         Js::from($certificateTemplate - > marker_state)
            //     }
            // };

            maState = JSON.parse(maState);

            // save references to the original image and its parent div (positioning root)
            function setSourceImage(source) {
                sourceImage = source;
                targetRoot = source.parentElement;
            }

            function showMarkerArea(target) {
                const markerArea = new markerjs2.MarkerArea(sourceImage);
                markerArea.availableMarkerTypes = ["CaptionFrameMarker"];

                // since the container div is set to position: relative it is now our positioning root
                // and we have to let marker.js know that
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
