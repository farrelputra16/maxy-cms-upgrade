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
        <h2 class="h2">Edit Member Attendance</h2>
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
            <div class="sectionCourse">Member Attendance</div>
            <span class="divider">></span>
            <div class="sectionMaster">Edit Attendance</div>
        </div>
    </div>

    <div class="container pb-5">
        <form class="ui form" action="{{ route('postEditMemberAttendance') }}" method="post">
            @csrf
            <input type="hidden" name="class_id" value="{{ $class->id }}">
            <input type="hidden" name="attendance_id" value="{{ $attendance->id }}">
            <input type="hidden" name="class_attendance_id" value="{{ $class_attendance_id }}">

            <div class="two fields">
                <div class="field">
                    <label for="">User</label>
                    <input type="text" name="name" placeholder="Masukkan Nama" value="{{ $attendance->user_name }}"
                        disabled>
                </div>
                <div class="field">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        <option value="0" @if ($attendance->status == 0) selected @endif>Tidak Hadir</option>
                        <option value="1" @if ($attendance->status == 1) selected @endif>Hadir</option>
                        <option value="2" @if ($attendance->status == 2) selected @endif>Izin</option>
                    </select>
                </div>
            </div>

            <div class="field">
                <label>Feedback</label>
                <div class="card w-100 h-100">
                    <ul class="list-group list-group-flush">
                        @foreach (json_decode($attendance->feedback) as $item)
                            <li class="list-group-item">
                                <b>{{ $item->question }}</b>
                                <p>{{ $item->answer }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="field">
                <label for="">Description</label>
                <textarea name="description">{{ $attendance->description }}</textarea>
            </div>


            <div class="divAdd">
                <a href="{{ url()->previous() }}" class="btn btn-danger">Batal</a>
                <button class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection
