@extends('layout.master')

@section('title', 'Edit Access Master')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Access Master</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">

    <style>
        body {
            background-color: #E3E5EE;
        }
        
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
        <h2 class="h2">Edit Access Master</h2>
        <form class="form-inline my-2 my-lg-0 me-3" method="post" action="{{ route('logout') }}">
            @csrf
            <button class="btnlogout" type="submit">Logout</button>
        </form>
    </div>

    <div class="breadcrumb pt-2 pb-4">
        <a class="sectionDashboard" href="{{ url('/') }}">Dashboard</a>
        <span class="divider">></span>
        <div class="sectionMaster">User & Access</div>
        <span class="divider">></span>
        <div class="sectionCourse">Access Master</div>
        <span class="divider">></span>
        <div class="sectionCourse">Edit Access Master</div>
    </div>

    <div class="container">
        <form class="ui form" action="{{ route('postEditAccessMaster', ['id' => request()->query('id')]) }}" method="post">
            @csrf
            <div class="field">
                <div class="two fields">
                    <div class="field">
                        <label for="">ID</label>
                        <input type="text" value="{{ $accessmasters->id }}" disabled>
                    </div>
                    <div class="field">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ $accessmasters->name }}">
                    </div>
                </div>

                <div class="field">
                    <label for="">Description</label>
                    <textarea name="description" placeholder="Enter Description">{{ $accessmasters->description }}</textarea>
                </div>

                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" {{ $accessmasters->status == 1 ? 'checked' : '' }} name="status" >
                        <label>Aktif</label>
                    </div>
                </div>
            </div>
            <div class="divSave">
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
<script>
    CKEDITOR.replace('description');
</script>
@endsection