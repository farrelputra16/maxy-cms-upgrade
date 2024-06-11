@extends('layout.master')

@section('title', 'Edit Course Class Module')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Child Module: </title>
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

        .btnlogout {
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
            width: 97%;
            ;
            margin-left: 1rem;
            margin-bottom: 1rem;
        }

        .breadcrumb .sectionDashboard,
        .breadcrumb .divider,
        .breadcrumb .secClass {
            /* padding-top: 1rem; */
            /* margin-top: 1rem; */
            display: inline;
            font-size: 11px;
            font-weight: bold;
        }

        .breadcrumb .divider {
            margin: 0 5px;
        }

        .btnModule {
            background-color: #4056A1;
            color: #FFF;
            width: 120px;
            height: 30px;
            border-radius: 8px;
            border: none;
            box-shadow: none;
            font-weight: bold;
            font-size: 13px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
            margin-left: .5rem;
            margin-bottom: 3rem;
            padding-top: .3rem;
        }

        .conBtn {
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            margin-right: 1rem;
        }

        .conBtn button {
            margin-right: 1rem;
            margin-left: .5rem;
        }

        th {
            font-weight: bold;
            color: #232E66;
            font-size: 12px;
            /* padding-left: .2rem; */
            /* margin-bottom: -0.5rem; */
        }

        .buttons-colvis {
            background-color: #4056A1;
            color: #FFF;
            width: 135px;
            height: 30px;
            border-radius: 8px;
            border: none;
            box-shadow: none;
            font-weight: bold;
            font-size: 12px;
            margin-left: .5rem;
            margin-bottom: .5rem;
            padding: 6px 12px;
            transition: background-color 0.3s ease;
        }

        .buttons-colvis:hover {
            background-color: #31446B;
        }

        .buttons-colvis:active {
            background-color: #2C3F63;
        }

        .buttons-copy,
        .buttons-excel,
        .buttons-pdf {
            background-color: #4056A1;
            color: #FFF;
            width: 80px;
            height: 30px;
            border-radius: 8px;
            border: none;
            box-shadow: none;
            font-size: 12px;
            font-weight: bold;
            margin-left: 45rem;
            margin-bottom: .5rem;
            /* margin-right: .5rem; */
            padding: 6px 12px;
            transition: background-color 0.3 ease;
        }

        .buttons-copy:hover,
        .buttons-excel:hover,
        .buttons-pdf:hover {
            background-color: #31446B;
        }

        .buttons-copy:active,
        .buttons-excel:active,
        .buttons-pdf:active {
            background-color: #2C3F63;
        }

        .buttons-container {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            margin-bottom: 10px;
        }

        .dataTables_length {
            margin-bottom: 10px;
        }

        .buttons-container .dt-buttons {
            margin-bottom: 10px;
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
        <h2 class="h2">Edit Child Course: </h2>
        <form class="form-inline my-2 my-lg-0 me-3" method="post" action="{{ route('logout') }}">
            @csrf
            <button class="btnlogout" type="submit">Logout</button>
        </form>
    </div>

        <div class="breadcrumb pt-2 pb-4">
            <a class="sectionDashboard" href="{{ url('/') }}">Dashboard</a>
            <span class="divider">></span>
            <div class="secClass">Class</div>
            <span class="divider">></span>
            <div class="secClass">Module List</div>
            <span class="divider">></span>
            <div class="secClass">Content</div>
            <span class="divider">></span>
            <div class="secClass">Edit Content</div>
        </div>

        <div class="container">
            <form class="ui form" action="{{ route('postEditCourseClassChildModule', ['id' => $child_detail->id]) }}" method="post">
                @csrf
                <input type="hidden" name="course_class_id" value="{{ $class_detail->id }}">
                <input type="hidden" name="ccmod_parent_id" value="{{ $parent_ccmod_detail->id }}">
                
                <div class="field">
                    <label for="">Class</label>
                    <input type="text" value="{{ $class_detail->course_name }} Batch {{ $class_detail->batch}}" disabled>
                </div>

                <div class="four fields">
                    <div class="field">
                        <label for="">Course Module</label>
                        <select name="course_module_id" class="ui dropdown">
                            @foreach ($child_cm_list as $item)
                            <option value="{{ $item->id }}" @if($item->id == $child_detail->course_module_id) selected @endif>[{{ $item->type }}] {{ $item->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('course_module_id'))
                        @foreach ($errors->get('course_module_id') as $error)
                        <span style="color: red;">{{$error}}</span>
                        @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">Priority</label>
                        <input type="number" name="priority" value="{{ $child_detail->priority }}">
                        @if ($errors->has('priority'))
                        @foreach ($errors->get('priority') as $error)
                        <span style="color: red;">{{$error}}</span>
                        @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">Waktu Mulai</label>
                        <input type="date" id="date" name="start" value="{{ \Carbon\Carbon::parse($child_detail->start_date)->format('Y-m-d') }}">
                        @if ($errors->has('start'))
                        @foreach ($errors->get('start') as $error)
                        <span style="color: red;">{{$error}}</span>
                        @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">Waktu Berakhir</label>
                        <input type="date" id="date" name="end" value="{{ \Carbon\Carbon::parse($child_detail->end_date)->format('Y-m-d') }}">
                        @if ($errors->has('end'))
                        @foreach ($errors->get('end') as $error)
                        <span style="color: red;">{{$error}}</span>
                        @endforeach
                        @endif
                    </div>
                </div>

                <div class="p-5 m-5" style="border-radius: 25px; border: 2px solid #73AD21;">
                    <a href="{{ route('getEditChildModule', ['id' => $child_cm_detail->id]) }}">
                        <h3>Material <i class="fa fa-edit"></i></h3>
                    </a>
                    <div class="field">
                        <label for=""></label>
                        <a href="{{ asset('fe/public/files/'.$child_cm_detail->material) }}" download>{{$child_cm_detail->material}}</a>
                    </div>

                    <div class="field">
                        <label for=""></label>
                        <textarea name="content" readonly>{{ $child_cm_detail->content }}</textarea>
                    </div>
                </div>

                <div class="field">
                    <label for="">Description</label>
                    <textarea name="description">{{ $child_detail->description }}</textarea>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" {{ $child_detail->status == 1 ? 'checked' : ''}} name="status">
                        <label>Aktif</label>
                    </div>
                </div>
                <div class="divSave">
                    <button class="btnSave">Save & Update</button>
                </div>
            </form>
            <a href="{{ url()->previous() }}" class="divBatal">
                <button class="btnBatal">Batal</button>
            </a>
        </div>
    </div>

</body>

</html>

<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace('content');
</script>
@endsection