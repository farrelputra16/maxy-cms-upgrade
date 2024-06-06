@extends('layout.master')

@section('title', 'Add Course Module')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Parent Module</title>
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

        .btnAdd {
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

        .divAdd {
            text-align: right;
            margin-right: 1rem;
            margin-bottom: .5rem;
            margin-left: 65rem;
        }
    </style>
</head>

<body>
    <div class="container conTitle">
        <h2 class="h2">Add New Parent Module</h2>
        <button class="logout">Logout</button>
    </div>
    <div class="breadcrumb pt-2 pb-4">
        <a class="sectionDashboard" href="{{ url('/') }}">Dashboard</a>
        <span class="divider">></span>
        <div class="sectionMaster">Master</div>
        <span class="divider">></span>
        <div class="sectionCourse" href="{{ url('/course') }}">Course</div>
        <span class="divider">></span>
        <div class="sectionMaster">Modules List</div>
        <span class="divider">></span>
        <div class="sectionMaster">Add New Parent Module</div>
    </div>

    <div class="container">
        <form class="ui form" action="{{ route('postAddCourseModule', ['page_type' => $page_type]) }}" method="post">
            @csrf
            <div class="field">
                <label for="">Course</label>
                <input type="text" name="course_name" value="{{ $course_detail->name }}" disabled>
                <input type="hidden" name="course_id" value="{{ $course_detail->id }}">
            </div>
            <div class="field">
                <div class="two fields">
                    <div class="field">
                        <label for="">Module Name</label>
                        <input type="text" name="name" placeholder="Masukkan Nama Course Module">
                    </div>
                    <div class="field">
                        <label for="">Day / Priority</label>
                        <input type="number" name="priority">
                    </div>
                </div>
                @if($page_type == 'company_profile')
                <div class="field">
                    <label for="">Content</label>
                    <textarea name="content"></textarea>
                </div>
                @endif
                <div class="field">
                    <label for="">Description</label>
                    <textarea name="description"></textarea>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" name="status">
                        <label>Aktif</label>
                    </div>
                </div>
            </div>
            <div class="divAdd">
                <button class="btnAdd">Add Course</button>
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
@endsection