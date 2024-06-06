@extends('layout.master')

@section('title', 'Edit User')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grading</title>
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
        .breadcrumb .sectionMaster,
        .breadcrumb .sectionCourse {
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
        <h2 class="h2">Edit Course</h2>
        <button class="logout">Logout</button>
    </div>

    <div class="breadcrumb pt-2 pb-4">
        <a class="sectionDashboard" href="{{ url('/') }}">Dashboard</a>
        <span class="divider">></span>
        <div class="sectionMaster">Master</div>
        <span class="divider">></span>
        <div class="sectionCourse">Course</div>
        <span class="divider">></span>
        <div class="sectionCourse">Edit Course</div>
    </div>

    <div class="container">
        <form class="ui form" action="{{ route('postEditCCMH', ['id' => $currentData->id]) }}" method="post">
            @csrf
            <input type="text" name="class_id" value="{{ $class_id }}" hidden>
            <div class="field">
                <div class="field">
                    <label for="">Member</label>
                    <input type="text" name="user_name" value="{{ $currentData->user_name }}" disabled>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label for="">Submitted At</label>
                        <input type="text" name="user_name" value="{{ $currentData->submitted_at }}" disabled>
                    </div>
                    <div class="field">
                        <label for="">Updated At</label>
                        <input type="text" name="user_name" value="{{ $currentData->updated_at }}" disabled>
                    </div>
                </div>

                <div class="field">
                    <label for="">Submitted File</label>
                    <a href="{{ asset($currentData->submission_url) }}" target="_blank">
                        <h3>{{$currentData->submitted_file}}</h3>
                    </a>
                    <!-- <input type="text" name="submitted_file" value="{{ $currentData->submitted_file }}" disabled> -->
                </div>
                <div class="field">
                    <label for="">Student's Comment</label>
                    <textarea name="comment" id="comment" disabled>{{ $currentData->comment }}</textarea>
                </div>
                <div class="field">
                    <label for="grade">Grade (min 0 ,max 100)</label>
                    <input type="number" name="grade" id="grade" value="{{ $currentData->grade }}" min="0" max="100">
                </div>
                <div class="field">
                    <label for="">Mentor's Comment</label>
                    <textarea name="tutor_comment" id="tutor_comment">{{ $currentData->tutor_comment }}</textarea>
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
</body>

</html>
@endsection