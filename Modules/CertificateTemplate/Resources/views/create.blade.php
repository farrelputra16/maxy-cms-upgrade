@extends('layout.master')

@section('title', 'Tambah Template')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Template Sertifikat</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">

    <style>
        .conTitle {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 2rem;
        }

        .h2 {
            font-weight: bold;
            color: #232E66;
            padding-left: .1rem;
            font-size: 22px;
            margin-bottom: -0.5rem;
            margin-left: 1rem;
        }

        .logout {
            margin-right: 1rem;
            margin-bottom: .5rem;
            background-color: #FBB041;
            color: #FFF;
            width: 80px;
            height: 35px;
            border-radius: 10px;
            border: none;
            box-shadow: none;
            font-weight: bold;
        }

        .breadcrumb {
            border-top: 2px solid black;
            display: inline-block;
            width: 97%;;
            margin-left: 1rem;
            margin-bottom: 1rem;
        }

        .breadcrumb .secDash,
        .breadcrumb .divider,
        .breadcrumb .secClass,
        .breadcrumb .secCerti,
        .breadcrumb .secAdd {
            /* padding-top: 1rem; */
            /* margin-top: 1rem; */
            display: inline;
            font-size: 11px;
            font-weight: bold;
        }

        .breadcrumb .divider {
            margin: 0 5px;
        }

        .btnBatal {
            background-color: #F13C20;
            color: #FFF;
            color: #FFF;
            width: 80px;
            height: 35px;
            border-radius: 10px;
            border: none;
            box-shadow: none;
            font-weight: bold;
        }

        .btnSave {
            background-color: #4056A1;
            color: #FFF;
            color: #FFF;
            width: 120px;
            height: 35px;
            border-radius: 10px;
            border: none;
            box-shadow: none;
            font-weight: bold;
        }

        .divBatal {
            text-align: right;
            margin-right: 10rem;
            margin-bottom: 1rem;
            margin-top: -3rem;
            z-index: 1000;
        }

        .divSave {
            text-align: right;
            margin-right: 1rem;
            margin-bottom: .5rem;
            margin-left: 65rem;
        }

        .form-container {
            width: 48%;
        }

        /* CSS untuk kolom-kolom yang disembunyikan */
        .hidden-column {
            display: none;
        }

        .select2-container .select2-selection--single {
            box-sizing: border-box;
            cursor: pointer;
            display: block;
            height: 38px;
            /* Ubah nilai height sesuai kebutuhan Anda */
            user-select: none;
            -webkit-user-select: none;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #444;
            line-height: 33px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 33px;
            position: absolute;
            top: 1px;
            right: 1px;
            width: 20px;
        }

        .ck-editor__editable_inline:not(.ck-comment__input *) {
            height: 250px;
            overflow-y: auto;
        }
    </style>
</head>

<body>
    <div class="container conTitle">
        <h2 class="h2">Tambah Template Sertifikat</h2>
        <button class="logout">Logout</button>
    </div>

    <div class="breadcrumb pt-2 pb-4">
        <a class="secDash" href="{{ url('/') }}">Dashboard</a>
        <span class="divider">></span>
        <div class="secClass">Class</div>
        <span class="divider">></span>
        <div class="secCerti">Certificate Templates</div>
        <span class="divider">></span>
        <div class="secAdd">Add Certificate Templates</div>
    </div>

    <div class="container">
        <form id="templateForm" class="formCerti ui form" action="{{ route('certificate-templates.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="two fields">
                <div class="field">
                    <label for="courseType" class="form-label fs-5 mb-3">Course Type</label>
                    <select class="ui search selection dropdown" id="courseType" name="m_course_type_id">
                        <option value="" disabled selected>Pilih Tipe Kursus</option>
                        @foreach($courseTypes as $courseType)
                        <option value="{{ $courseType->id }}" {{ $loop->iteration === 1 ? 'selected' : '' }}>{{ $courseType->name }}</option>
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
                    <img src="{{ asset('uploads/certificate/template_example.png') }}" class="img-fluid" alt="" />
                </div>
                <div class="field">
                    <label for="Image" class="form-label fs-5 mb-3">Template</label>
                    <input class="form-control" type="file" id="templateImage" name="filename" accept=".png">
                    <small>* Accepted File Type: .png</small>
                    <div class="position-relative d-flex flex-column justify-content-center align-items-center">
                        <img id="sourceImage" class="img-fluid" alt="" src="" />
                        <img id="originalImage" class="img-fluid position-absolute" alt="" src="" />
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
                    <textarea id="templateContent" name="template_content" placeholder="Ex: Telah berhasil menyelesaikan program [[class_name]]"></textarea>
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

            <div class="divSave">
                <button class="btnSave">Save</button>
            </div>
        </form>
        <a href="{{ url()->previous() }}">
            <button class="btnBatal">Batal</button>
        </a>
        <script src="https://unpkg.com/markerjs2/markerjs2.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
        <script>
            $("#courseType").dropdown();

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

                $("#templateForm").on("submit", function(e) {
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
    </div>
</body>

</html>
@endsection