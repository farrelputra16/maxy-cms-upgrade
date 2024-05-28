@extends('layout.master')

@section('title', 'Edit Course Class')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Class</title>
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
            width: 1010px;
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
        <h2 class="h2">Edit Class</h2>
        <button class="logout">Logout</button>
    </div>

    <div class="breadcrumb pt-2 pb-4">
        <a class="sectionDashboard" href="{{ url('/') }}">Dashboard</a>
        <span class="divider">></span>
        <div class="sectionMaster">Class</div>
        <span class="divider">></span>
        <div class="sectionCourse">Class</div>
    </div>

    <div class="container">
        <form class="ui form" action="{{ route('postEditCourseClass', ['id' => request()->query('id')]) }}" method="post">
            @csrf
            <div class="field">
                <input type="hidden" name="course_class_id" value="{{ $course_class_detail->id }}">
                <div class="two fields">
                    <div class="field">
                        <label for="">Batch</label>
                        <input type="text" name="batch" value="{{ $course_class_detail->batch }}">
                    </div>
                    <div class="field">
                        <label for="">Quota</label>
                        <input type="number" name="quota" value="{{ $course_class_detail->quota }}">
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label for="">Start Date</label>
                        <input type="date" name="start" value="{{ $course_class_detail->start_date }}">
                    </div>
                    <div class="field">
                        <label for="">End Date</label>
                        <input type="date" name="end" value="{{ $course_class_detail->end_date }}">
                    </div>
                </div>

                <div class="two class">
                    <div class="field">
                        <label for="">Course</label>
                        <select name="course_id" class="ui dropdown">
                            @foreach ($course_list as $items)
                            <option value="{{ $items->id }}" @if ($items->id == $course_class_detail->course_id) selected @endif>
                                {{ $items->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="field">

                    </div>
                </div><br>

                <div class="field">
                    <label for="">Announcement</label>
                    <textarea name="announcement">{{ $course_class_detail->announcement }}</textarea>
                </div>

                <div class="field">
                    <label for="">Content</label>
                    <textarea name="content">{{ $course_class_detail->content }}</textarea>
                </div>

                <div class="field">
                    <label for="">Description</label>
                    <textarea name="description">{{ $course_class_detail->description }}</textarea>
                </div>

                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" {{ $course_class_detail->status == 1 ? 'checked' : '' }} name="status">
                        <label>Aktif</label>
                    </div>
                </div>
            </div>
            <div class="divTambah">
                <button class="btnTambah">Tambah Course Module</button>
                <button class="btnSave">Save & Update</button>
            </div>
        </form>
        <a href="{{ url()->previous() }}" class="divBatal">
            <button class="btnBatal">Batal</button>
        </a>
    </div>
    <script>
        CKEDITOR.replace('content');
        CKEDITOR.replace('description');
    </script>
    @endsection