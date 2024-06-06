@extends('layout.master')

@section('title', 'Edit Child Module')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Child Module For: {{ $parentModule->name }}</title>
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
        .breadcrumb .secParent,
        .breadcrumb .secID {
            /* padding-top: 1rem; */
            /* margin-top: 1rem; */
            display: inline;
            font-size: 11px;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .breadcrumb .divider {
            margin: 0 5px;
        }

        #content,
        #short_description,
        #description {
            width: 1000px;
            height: auto;
        }

        .btnBatal {
            background-color: #F13C20;
            color: #FFF;
            margin-right: 1rem;
            margin-left: 38.5rem;
            margin-bottom: .5rem;
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
            margin-right: 1rem;
            margin-bottom: .5rem;
            color: #FFF;
            width: 180px;
            height: 35px;
            border-radius: 10px;
            border: none;
            box-shadow: none;
            font-weight: bold;
        }

        .btnSave {
            background-color: #4056A1;
            color: #FFF;
            margin-bottom: .5rem;
            color: #FFF;
            width: 130px;
            height: 35px;
            border-radius: 10px;
            border: none;
            box-shadow: none;
            font-weight: bold;
        }

        .divBatal {
            text-align: right;
            margin-right: 20rem;
            margin-bottom: 1rem;
            margin-top: -3rem;
        }

        .divTambah {
            text-align: right;
            margin-bottom: .5rem;
        }

        .divSave {
            text-align: right;
            margin-right: 1rem;
            margin-bottom: .5rem;
            margin-left: 65rem;
        }
    </style>
</head>

<body>
    <div class="container conTitle">
        <h2 class="h2">Edit Child Module For: {{ $parentModule->name }}</h2>
        <button class="logout">Logout</button>
    </div>

    <div class="breadcrumb pt-2 pb-4">
        <a class="sectionDashboard" href="{{ url('/') }}">Dashboard</a>
        <span class="divider">></span>
        <div class="secMaster">Master</div>
        <span class="divider">></span>
        <div class="secMaster">Course</div>
        <span class="divider">></span>
        <div class="secMaster">Module List</div>
        <span class="divider">></span>
        <div class="secMaster">Content</div>
        <span class="divider">></span>
        <div class="secMaster">Edit Content</div>
        <span class="divider">></span>
    </div>

    <div class="container">
        <form class="ui form" action="{{ route('postEditChildModule', ['id' => $childModule->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="field">
                <div class="field">
                    <label for="">Parent Module</label>
                    <input type="text" value="{{ $parentModule->name }}" disabled>
                </div>
                <div class="two fields">
                    <div class="field">
                        <label for="">Priority</label>
                        <input type="number" name="priority" value="{{ $childModule->priority }}">
                    </div>
                    <div class="field">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ $childModule->name }}">
                    </div>
                </div>
                <!-- cek tipe course -->
                @if($course_type->slug == 'rapid-onboarding')
                <div class="field">
                    <label for="">HTML</label>
                    <textarea name="html">{{ $childModule->html }}</textarea>
                </div>
                <div class="field">
                    <label for="">JS</label>
                    <textarea name="js">{{ $childModule->js }}</textarea>
                </div>
                <div class="field">
                    <label for="">Content</label>
                    <textarea class="texteditor" name="content">{{ $childModule->content }}</textarea>
                </div>
                <input type="hidden" name="rapid" value="1">
                @else
                <hr>
                <div class="card m-5 p-5">
                    <h3>Current:</h3>
                    @if($childModule->type == 'materi_pembelajaran')
                    Materi Pembelajaran
                    <a href="{{ asset('fe/public/files/'.$childModule->material) }}" download>{{$childModule->material}}</a>
                    @elseif($childModule->type == 'video_pembelajaran')
                    Video Pembelajaran
                    <a href="{{ $childModule->material }}">{{$childModule->material}}</a>
                    @elseif($childModule->type == 'assignment')
                    <a href="{{ asset('fe/public/files/'.$childModule->material) }}" download>{{$childModule->material}}</a>
                    Assignment
                    @endif

                    <h3>Change To:</h3>
                    <!-- TO DO -->
                    <div class="two fields">
                        <div class="field">
                            <label for="">Module Type</label>
                            <select name="type" class="ui dropdown" id="type_selector">
                                <option value="materi_pembelajaran" @if($childModule->type == 'materi_pembelajaran')
                                    selected
                                    @endif>materi_pembelajaran</option>
                                <option value="video_pembelajaran" @if($childModule->type == 'video_pembelajaran') selected
                                    @endif>video_pembelajaran</option>
                                <option value="assignment" @if($childModule->type == 'assignment') selected
                                    @endif>Assignment
                                </option>
                                @if(Route::has('getCMQuiz'))
                                <option value="quiz" @if($childModule->type == 'quiz') selected @endif>Quiz</option>
                                @endif
                            </select>
                        </div>
                        <div class="field" id="material">
                            @if ($childModule->type === 'materi_pembelajaran')
                            <label for="" class="form-label">File materi_pembelajaran</label>
                            <input class="form-control" type="file" id="formFile" name="material">
                            <p class="pt-2">{{ $childModule->material }}</p>
                            <input type="hidden" name="duration" value="">
                            @elseif ($childModule->type === 'video_pembelajaran')
                            <label for="">Link Video</label>
                            <input type="text" name="material" @if($childModule->type == 'video_pembelajaran') value="{{
                        $childModule->material }}" @endif>
                            <label for="">Durasi</label>
                            <input type="number" name="duration" @if($childModule->type == 'video_pembelajaran') value="{{
                        $childModule->duration }}" @endif>
                            @else
                            <label for="" class="form-label">File Assignment</label>
                            <input class="form-control" type="file" id="formFile" name="material">
                            <input type="hidden" name="duration" value="">
                            @endif
                        </div>
                    </div>
                    <div class="field" id="duration"></div>
                    @endif
                </div>
                <!-- end materi -->

                <div class="field">
                    <label for="">Content</label>
                    <textarea name="content">{{ $childModule->content }}</textarea>
                </div>
                <div class="field">
                    <label for="">Description</label>
                    <textarea name="description">{{ $childModule->description }}</textarea>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" {{ $childModule->status == 1 ? 'checked' :
                    ''}} name="status">
                        <label>Aktif</label>
                    </div>
                </div>
            </div>
            <div class="divTambah">
                <button class="btnSave">Save & Update</button>
            </div>
        </form>

        <!-- <div class="divBatal"> -->
        <a href="{{ url()->previous() }}" class="divBatal">
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
                <input class="form-control" type="file" id="formFile" name="material" @if($childModule->type == 'materi_pembelajaran') value="{{ $childModule->material }}" @endif>
            `;
            duration.innerHTML = `<input type="hidden" name="duration" value="">`;
        } else if (typeSelector.value === 'video_pembelajaran') {
            material.innerHTML = `
                <label for="">Link Video</label>
                <input type="text" name="material" @if($childModule->type == 'video_pembelajaran') value="{{ $childModule->material }}" @endif>
            `;
            duration.innerHTML = `
                <label for="">Durasi</label>
                <input type="number" name="duration" @if($childModule->type == 'video_pembelajaran') value="{{ $childModule->duration }}" @endif>
            `;
        } else {
            material.innerHTML = `
                <label for="" class="form-label">File Assignment</label>
                <input class="form-control" type="file" id="formFile" name="material" @if($childModule->type == 'asignment') value="{{ $childModule->material }}" @endif>
            `;
            duration.innerHTML = `<input type="hidden" name="duration" value="">`;
        }
    });
</script>

@endsection