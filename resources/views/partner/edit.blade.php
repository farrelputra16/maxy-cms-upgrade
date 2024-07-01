@extends('layout.master')

@section('title', 'Add Partners')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Partner</title>

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

        .cbAktif {
            margin-left: 2rem;
        }
    </style>
</head>

<body>
    <div class="container conTitle">
        <h2 class="h2">Edit Partner</h2>
        <form class="form-inline my-2 my-lg-0 me-3" method="post" action="{{ route('logout') }}">
            @csrf
            <button class="btnlogout" type="submit">Logout</button>
        </form>
    </div>

    <div class="breadcrumb pt-2 pb-4">
        <a class="sectionDashboard" href="{{ url('/') }}">Dashboard</a>
        <span class="divider">></span>
        <div class="sectionMaster">Master</div>
        <span class="divider">></span>
        <div class="sectionCourse">Partner</div>
    </div>

    <div class="container">
        <form class="ui form" action="{{ route('postEditPartner', ['id' => request()->query('id'), 'logo_dump' => $partners->logo]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" name="img_keep" value="{{ $partners->logo }}" hidden>
            <div class="field">

                <div class="two fields">
                    <div class="field">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ $partners->name }}">
                        @if ($errors->has('name'))
                        @foreach ($errors->get('name') as $error)
                        <span style="color: red;">{{ $error }}</span>
                        @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">Type</label>
                        <input type="text" name="type" value="{{ $partners->type }}">
                        @if ($errors->has('type'))
                        @foreach ($errors->get('type') as $error)
                        <span style="color: red;">{{ $error }}</span>
                        @endforeach
                        @endif
                    </div>
                    <!-- <div class="field">
                                                <label for="">Logo</label>
                                                <input type="file" name="logo">
                                                <small>Current logo: {{ $partners->logo }}</small>
                                            </div> -->
                </div>

                <div class="two fields">
                    <div class="field">
                        <label for="">Email</label>
                        <input type="text" name="email" value="{{ $partners->email }}">
                        @if ($errors->has('email'))
                        @foreach ($errors->get('email') as $error)
                        <span style="color: red;">{{ $error }}</span>
                        @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">Phone</label>
                        <input type="number" name="phone" value="{{ $partners->phone }}">
                        @if ($errors->has('phone'))
                        @foreach ($errors->get('phone') as $error)
                        <span style="color: red;">{{ $error }}</span>
                        @endforeach
                        @endif
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label for="">Contact Person</label>
                        <input type="number" name="contact_person" value="{{ $partners->contact_person }}">
                        @if ($errors->has('contact_person'))
                        @foreach ($errors->get('contact_person') as $error)
                        <span style="color: red;">{{ $error }}</span>
                        @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">URL</label>
                        <input type="text" name="url" value="{{ $partners->url }}">
                        @if ($errors->has('url'))
                        @foreach ($errors->get('url') as $error)
                        <span style="color: red;">{{ $error }}</span>
                        @endforeach
                        @endif
                    </div>
                </div>

                <div class="two fields">
                    <div class="fields">
                        <label for="Image" class="form-label">Image</label>
                        <input class="formImg" type="file" id="formFile" name="file_image" onchange="preview()">
                    </div>
                    <div class="field">
                        <div class="ui centered medium image">
                            <img id="frame" src="{{ $partners->url }}" class="img-fluid" />
                        </div>
                    </div>
                </div>

                <!-- Address -->
                <div class="field">
                    <label for="">Address</label>
                    <textarea name="address" id="address">{{ $partners->address }}</textarea>
                </div>

                <!-- Description -->
                <div class="field">
                    <label for="">Description</label>
                    <textarea name="description" id="description">{{ $partners->description }}</textarea>
                </div>

                <div class="field">
                    <div class="cbHight ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" {{ $partners->status_highlight == 1 ? 'checked' : '' }} name="status_highlight">
                        <label>Highlight</label>
                    </div>
                    <div class="cbAktif ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" {{ $partners->status == 1 ? 'checked' : '' }} name="status">
                        <label>Aktif</label>
                    </div>
                </div>
            </div>
            <div class="divSave">
                <button class="btnSave">Save & Update</button>
            </div>
        </form>
        <a href="{{ route('getPartner') }}" class="divBatal">
            <button class="btnBatal">Batal</button>
        </a>
    </div>

    <script>
        CKEDITOR.replace('address');
        CKEDITOR.replace('description');
    </script>
    @endsection

    <script>
        function preview() {
            frame.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>