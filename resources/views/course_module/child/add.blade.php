@extends('layout.master')

@section('title', 'Add Child Module')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Child Module</title>
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

        .breadcrumb .sectionDashboard,
        .breadcrumb .divider,
        .breadcrumb .secMaster,
        .breadcrumb .secCourse,
        .breadcrumb .secModule,
        .breadcrumb .secContent,
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

        .btnTambah {
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

        .divTambah {
            text-align: right;
            margin-right: 1rem;
            margin-bottom: .5rem;
            margin-left: 65rem;
        }
    </style>
</head>

<body>
    <div class="container conTitle">
        <h2 class="h2">Add New Child Module</h2>
        <button class="logout">Logout</button>
    </div>
    <div class="breadcrumb pt-2 pb-4">
        <a class="sectionDashboard" href="{{ url('/') }}">Dashboard</a>
        <span class="divider">></span>
        <div class="secMaster">Master</div>
        <span class="divider">></span>
        <div class="secCourse">Course</div>
        <span class="divider">></span>
        <div class="secModule">Module List</div>
        <span class="divider">></span>
        <div class="secContent">Content</div>
        <span class="divider">></span>
        <div class="secAdd">Add Content</div>
    </div>

    <div class="container">
        <form class="formAdd ui form" action="{{ route('postAddChildModule', ['parentId' => $parent->id, 'page_type' => $page_type]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="field">
                <div class="field">
                    <label for="">Parent Module</label>
                    <input type="text" value="{{ $parent->name }}" disabled>
                </div>
                <div class="two fields">
                    <div class="field">
                        <label for="">Name</label>
                        <input type="text" name="name" required>
                    </div>
                    <div class="field">
                        <label for="">Priority</label>
                        <input type="number" name="priority" required>
                    </div>
                </div>
                <!-- cek tipe course -->
                @if($course_type->slug == 'rapid-onboarding')
                <div class="field">
                    <label for="">HTML</label>
                    <textarea class="texteditor" name="html"></textarea>
                </div>
                <div class="field">
                    <label for="">JS</label>
                    <textarea class="texteditor" name="js"></textarea>
                </div>
                <div class="field">
                    <label for="">Content</label>
                    <textarea class="texteditor" name="content"></textarea>
                </div>
                <input type="hidden" name="rapid" value="1">
                @else
                <!-- TO DO -->
                <div class="two fields">
                    <div class="field">
                        <label for="">Module Type</label>
                        <select name="type" class="ui dropdown" id="type_selector" required>
                            <option selected value="">-- Pilih Tipe Modul --</option>
                            <option value="materi_pembelajaran">Materi Pembelajaran</option>
                            <option value="video_pembelajaran">Video Pembelajaran</option>
                            <option value="assignment">Assignment</option>
                            <option value="form">Form</option>
                            @if(Route::has('getCMQuiz'))
                            <option value="quiz">Quiz</option>
                            @endif
                        </select>
                    </div>
                    <div class="field" id="material"></div>
                </div>
                <div class="field" id="duration"></div>
                @endif
                <!-- end materi -->
                <div class="field">
                    <label for="">Description</label>
                    <textarea class="texteditor" name="description"></textarea>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" name="status">
                        <label>Aktif</label>
                    </div>
                </div>
            </div>
            <div class="divTambah">
                <button class="btnTambah">Tambah Course</button>
            </div>
        </form>
        <!-- <div style="margin-top:-4%"> -->
        <!-- <div class="divBatal"> -->
        <a href="{{ url()->previous() }}">
            <button class="btnBatal">Batal</button>
        </a>
        <!-- </div> -->
    </div>
</body>
</html>

    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('content');
    </script>

    @if($course_type->slug != 'rapid-onboarding')
    <script>
        var typeSelector = document.getElementById('type_selector');
        var material = document.getElementById('material');
        var duration = document.getElementById('duration');

        // Menambahkan event listener untuk perubahan pada elemen select
        typeSelector.addEventListener('change', function() {
            // Memeriksa apakah opsi yang dipilih adalah "assignment"
            if (typeSelector.value === 'materi_pembelajaran') {
                material.innerHTML = `
                <label for="" class="form-label">File materi_pembelajaran</label>
                <input class="form-control" type="file" id="formFile" name="material">
            `;
                duration.innerHTML = `<input type="hidden" name="duration" value="">`;
            } else if (typeSelector.value === 'video_pembelajaran') {
                material.innerHTML = `
                <label for="">Link Video</label>
                <input type="text" name="material">
            `;
                duration.innerHTML = `
                <label for="">Durasi</label>
                <input type="number" name="duration">
            `;
            } else if (typeSelector.value === 'assignment') {
                material.innerHTML = `
                <label for="" class="form-label">File Assignment</label>
                <input class="form-control" type="file" id="formFile" name="material">
            `;
                duration.innerHTML = `<input type="hidden" name="duration" value="">`;
            } else if (typeSelector.value === 'form' || typeSelector.value === 'quiz') {
                material.innerHTML = ``;
                duration.innerHTML = `<input type="hidden" name="duration" value="">`;
            }
        });
    </script>
    @endif

    @endsection