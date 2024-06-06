@extends('layout.master')

@section('title', 'Add Partners')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Partner</title>

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

        .cbAktif {
            margin-left: 2rem;
        }
    </style>
</head>

<body>
    <div class="container conTitle">
        <h2 class="h2">Add Partner</h2>
        <button class="logout">Logout</button>
    </div>
    <div class="breadcrumb pt-2 pb-4">
        <a class="sectionDashboard" href="{{ url('/') }}">Dashboard</a>
        <span class="divider">></span>
        <div class="sectionMaster">Master</div>
        <span class="divider">></span>
        <div class="sectionCourse">Partner</div>
    </div>

    <div class="container">
        <form class="formAdd ui form" action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="field">
                <div class="two fields">
                    <div class="field">
                        <label for="">Name</label>
                        <input type="text" name="name" placeholder="Masukkan Nama Partner">
                        @if ($errors->has('name'))
                        @foreach ($errors->get('name') as $error)
                        <span style="color: red;">{{ $error }}</span>
                        @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="type">Type</label>
                        <select class="ui dropdown" name="type">
                            @foreach ($partnerTypes as $partnerType)
                            <option value="{{ $partnerType->type }}">{{ $partnerType->type }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- <div class="field">
                                            <label for="">Logo</label>
                                            <input type="file" name="logo">
                                        </div> -->
                <div class="two fields">
                    <div class="field">
                        <label for="">Email</label>
                        <input type="text" name="email" placeholder="Masukkan Email Partner">
                        @if ($errors->has('email'))
                        @foreach ($errors->get('email') as $error)
                        <span style="color: red;">{{ $error }}</span>
                        @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">Phone</label>
                        <input type="number" name="phone" placeholder="Masukkan Nomor Telepon Partner">
                        @if ($errors->has('phone'))
                        @foreach ($errors->get('phone') as $error)
                        <span style="color: red;">{{ $error }}</span>
                        @endforeach
                        @endif
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label for="">URL</label>
                        <input type="text" name="url" placeholder="Masukkan Link URL">
                        @if ($errors->has('url'))
                        @foreach ($errors->get('url') as $error)
                        <span style="color: red;">{{ $error }}</span>
                        @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">Contact Person</label>
                        <input type="number" name="contact_person" placeholder="Masukkan Contact Person">
                        @if ($errors->has('contact_person'))
                        @foreach ($errors->get('contact_person') as $error)
                        <span style="color: red;">{{ $error }}</span>
                        @endforeach
                        @endif
                    </div>

                </div>

                <div class="field">
                    <label>Logo</label>
                    <input type="file" id="formFile" name="logo" onchange="preview()">
                    <br>
                    <img id="frame" src="" class="img-fluid" />
                </div>
                <div class="field">
                    <label>Address</label>
                    <textarea name="address" id="address" placeholder="Enter address"></textarea>
                </div>
                <div class="field">
                    <label>Description</label>
                    <textarea name="description" id="description" placeholder="Enter Description"></textarea>
                </div>
                <div class="field">
                    <div class="cbHight ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" name="status_highlight">
                        <label>Highlight</label>
                    </div>
                    <div class="cbAktif ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" name="status">
                        <label>Aktif</label>
                    </div>
                </div>
            </div>
            <div class="divAdd">
                <button class="btnAdd">Add Course</button>
            </div>
        </form>
        <a href="{{ route('getPartner') }}">
            <button class="btnBatal">Batal</button>
        </a>
        <br>
    </div>
    <br>
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