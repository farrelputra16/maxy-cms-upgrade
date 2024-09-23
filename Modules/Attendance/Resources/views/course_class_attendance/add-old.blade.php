@extends('layout.master')

@section('title', 'Add Class Attendance')

@section('styles')
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
@endsection

@section('content')
    <div class="container conTitle">
        <h2 class="h2">Add New Attendance</h2>
        <form class="form-inline my-2 my-lg-0 me-3" method="post" action="{{ route('logout') }}">
            @csrf
            <button class="btnlogout" type="submit">Logout</button>
        </form>
    </div>
    <div class="container">
        <div class="breadcrumb pt-2 pb-4">
            <a class="sectionDashboard" href="{{ url('/') }}">Dashboard</a>
            <span class="divider">></span>
            <div class="sectionMaster">Class</div>
            <span class="divider">></span>
            <div class="sectionCourse">Attendance</div>
            <span class="divider">></span>
            <div class="sectionMaster">Add New Attendance</div>
        </div>
    </div>

    <div class="container">
        <form class="ui form" action="{{ route('postAddCourseClassAttendance') }}" method="post">
            @csrf
            <input type="hidden" name="class_id" value="{{ $class->id }}">

            <div class="field">
                <label for="">Name</label>
                <input type="text" name="name" placeholder="Masukkan Nama">
            </div>
            <div class="field">
                <label for="">Day</label>
                <select class="form-control select2 w-100" name="day" data-placeholder="Choose ...">
                    @foreach ($class->parent_modules as $item)
                        <option value="{{ $item->id }}"> Day {{ $item->priority }} : {{ $item->module_name }}
                        </option>
                    @endforeach
                </select>
            </div>
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

            <div class="divAdd">
                <a href="{{ url()->previous() }}" class="btn btn-danger btnBatal">Batal</a>
                <button class="btnAdd">Add Attendance</button>
            </div>
        </form>


    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        CKEDITOR.replace('description');

        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endsection
