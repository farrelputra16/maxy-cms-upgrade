@extends('layout.master')

@section('title', 'Add Course Class')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duplicate Class</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

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
        .breadcrumb .secClass,
        .breadcrumb .secDupli {
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

        /* .select2-container .select2-selection--single {
            height: 3vh !important;
            width: 100% !important;
        } */

        .select2-container--default .select2-selection--single {
            border: 1px solid #ccc !important;
            border-radius: 3px !important;
        }
    </style>
</head>

<body>
    <div class="container conTitle">
        <h2 class="h2">Duplicate Class</h2>
        <button class="logout">Logout</button>
    </div>

    <div class="breadcrumb pt-2 pb-4">
        <a class="sectionDashboard" href="{{ url('/') }}">Dashboard</a>
        <span class="divider">></span>
        <div class="secClass">Class Course</div>
        <span class="divider">></span>
        <div class="secDupli">Duplicate Class</div>
    </div>

    <div class="container">
        <form class="ui form" action="{{ route('postDuplicateCourseClass') }}" method="post">
            @csrf
            <div class="field">
                <div class="header" style="display: flex; justify-content: center; margin-bottom: 20px; background: #e0e0e0; padding: 10px 0px 10px 0px;">
                    <h5><b>Choose Class</b></h5>
                </div>
                
                <div class="field">
                    <label for="">Class</label>
                    <select id="course_class" name="course_class_id" class="ui dropdown">
                        <option value="">Select</option>
                        @foreach ($class_list as $item)
                        <option value="{{ $item->id }}">{{ $item->course_name }} Batch {{ $item->batch }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('courseid'))
                    @foreach ($errors->get('courseid') as $error)
                    <span style="color: red;">{{$error}}</span>
                    @endforeach
                    @endif
                </div>

                <div class="header" style="display: flex; justify-content: center; margin-bottom: 20px; background: #e0e0e0; padding: 10px 0px 10px 0px; margin-top: 50px;">
                    <h5><b>New Class</b></h5>
                </div>
                <div class="two fields">
                    <div class="field">
                        <label for="course_id">Course</label>
                        <select id="course_id" name="course_id" class="form-control select2">
                            <option value="">Select</option>
                            @foreach ($course_list as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('course_id'))
                        @foreach ($errors->get('course_id') as $error)
                        <span style="color: red;">{{$error}}</span>
                        @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">Batch</label>
                        <input type="number" name="batch" placeholder="Masukkan Batch" style="height:3vh">
                        @if ($errors->has('batch'))
                        @foreach ($errors->get('batch') as $error)
                        <span style="color: red;">{{$error}}</span>
                        @endforeach
                        @endif
                    </div>

                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" name="status">
                        <label>Aktif</label>
                    </div>
                </div>

                <div class="divTambah">
                    <button class="btnTambah">Tambah Course Module</button>
                </div>
            </div>
        </form>
        <a href="{{ url()->previous() }}" class="divBatal">
            <button class="btnBatal">Batal</button>
        </a>
    </div>

</body>

</html>

<script>
    $(document).ready(function() {
        $('#course_class').select2({
            placeholder: "Search for a class",
            allowClear: true
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#course_id').select2({
            placeholder: "Search for a course",
            allowClear: true
        });
    });
</script>


@endsection