@extends('layout.master')

@section('title', 'Add Difficulty Type')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course Type</title>
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
        }

        .breadcrumb .divider {
            margin: 0 5px;
        }

        .btnBatal {
            background-color: #F13C20;
            color: #FFF;
            margin-left: 53rem;
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
            margin-left: 1.5rem;
            width: 180px;
            height: 35px;
            border-radius: 10px;
            border: none;
            box-shadow: none;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container conTitle">
        <h2 class="h2">Add Course Type</h2>
        <button class="logout">Logout</button>
    </div>
    <div class="breadcrumb pt-2 pb-4">
        <a class="sectionDashboard" href="{{ url('/') }}">Dashboard</a>
        <span class="divider">></span>
        <div class="sectionMaster">Master</div>
        <span class="divider">></span>
        <div class="sectionCourse">Course Type</div>
    </div>

    <form class="ui form" action="" method="post">
        @csrf
        <div class="field">
            <div class="field">
                <label for="">Name</label>
                <input type="text" name="name" placeholder="Masukkan Nama Course Type">
                @if ($errors->has('name'))
                @foreach ($errors->get('name') as $error)
                <span style="color: red;">{{$error}}</span>
                @endforeach
                @endif
            </div>
            <div class="field">
                <label for="">Slug</label>
                <input type="text" name="slug" placeholder="Masukkan Slug Course Type">
                @if ($errors->has('slug'))
                @foreach ($errors->get('slug') as $error)
                <span style="color: red;">{{$error}}</span>
                @endforeach
                @endif
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
        </div>
        <div class="divTambah">
            <button class="btnTambah">Tambah Course</button>
        </div>
        <!-- <a href="{{ url()->previous() }}">
            <button class="btnBatal">Batal</button>
        </a> -->
    </form>
    <div class="divBatal">
        <a href="{{ url()->previous() }}">
            <button class="btnBatal">Batal</button>
        </a>
    </div>
</body>

</html>
</div>
@endsection