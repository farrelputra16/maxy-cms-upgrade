@extends('layout.master')

@section('title', 'Edit General Data')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit General</title>
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
            margin-right: 2rem;
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
            display: inline;
            font-size: 11px;
            font-weight: bold;
        }

        .breadcrumb .divider {
            margin: 0 5px;
        }

        .container-form {
            margin-top: 2rem;
        }

        .field {
            margin-bottom: 1rem;
        }

        .right-button {
            float: right;
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

        .btnSave {
            background-color: #4056A1;
            color: #FFF;
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
            margin-right: 10rem;
            margin-bottom: 1rem;
            margin-top: -5rem;
        }

        .divSave {
            text-align: right;
            /* margin-right: 1rem; */
            margin-bottom: .5rem;
            margin-right: 1rem;
        }

        .formEdit {
            padding-left: 1rem;
            padding-right: 2rem;
        }
    </style>
</head>

<body>
    <div class="container conTitle">
        <h2 class="h2">Edit General</h2>
        <button class="logout">Logout</button>
    </div>

    <div class="breadcrumb pt-2 pb-4">
        <a class="sectionDashboard" href="{{ url('/') }}">Dashboard</a>
        <span class="divider">></span>
        <div class="sectionMaster">Settings</div>
        <span class="divider">></span>
        <div class="sectionCourse">General Settings</div>
        <span class="divider">></span>
        <div class="sectionCourse">Edit General Settings</div>
    </div>

    <div class="container">
        <form class="formEdit ui form" action="{{ route('postEditGeneral', ['id' => request()->query('id')]) }}" method="post">
            @csrf
            <div class="field">
                <div class="two fields">
                    <!-- <div class="field">
                        <label for="">ID Data</label>
                        <input type="text" value="{{ $generals->id }}" disabled>
                    </div> -->
                    <div class="field">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ $generals->name }}">
                    </div>
                    <div class="field">
                        <label for="">Value</label>
                        <input type="text" name="value" value="{{ $generals->value }}">
                    </div>
                </div>

                <div class="field">
                    <label for="">Description</label>
                    <textarea name="description">{{ $generals->description }}</textarea>
                </div>

                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" {{ $generals->status == 1 ? 'checked' : ''}} name="status">
                        <label>Aktif</label>
                    </div>
                </div>
                <div class="divSave">
                    <button class="btnSave">Save & Update</button>
                </div>
            </div>
        </form>
        <a href="{{ url()->previous() }}">
            <button class="btnBatal">Batal</button>
        </a>
    </div>

</body>

</html>
@endsection