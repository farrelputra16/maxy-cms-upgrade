@extends('layout.master')

@section('title', 'Add Access Group')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Access Group</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap-5-theme@1.1.2/dist/select2-bootstrap-5-theme.min.css" rel="stylesheet" />

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

        .formMaster {
            padding-left: 1rem;
            padding-right: 2rem;
        }

        .select2-container--bootstrap-5 .select2-selection {
            height: calc(1.5em + .75rem + 2px);
            padding: .375rem .75rem;
        }

        .select2-container .select2-selection--single {
            box-sizing: border-box;
            cursor: pointer;
            display: block;
            height: 38px;
            /* Ubah nilai height sesuai kebutuhan Anda */
            user-select: none;
            -webkit-user-select: none;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #444;
            line-height: 33px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 33px;
            position: absolute;
            top: 1px;
            right: 1px;
            width: 20px;
        }
    </style>
</head>

<body>
    <div class="container conTitle">
        <h2 class="h2">Add Access Group</h2>
        <form class="form-inline my-2 my-lg-0 me-3" method="post" action="{{ route('logout') }}">
            @csrf
            <button class="btnlogout" type="submit">Logout</button>
        </form>
    </div>

    <div class="breadcrumb pt-2 pb-4">
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <a class="sectionDashboard" href="{{ url('/') }}">Dashboard</a>
                    <span class="divider">></span>
                    <div class="sectionMaster">User & Access</div>
                    <span class="divider">></span>
                    <div class="sectionCourse">Access Group</div>
                    <span class="divider">></span>
                    <div class="sectionCourse">Add Access Group</div>
                </div>
            </div>
        </div>

    </div>

    <form class="formMaster ui form" action="{{ route('postAddAccessGroup') }}" method="post">
        @csrf
        <div class="field">
            <div class="field">
                <label for="">Name</label>
                <input type="text" name="name" placeholder="Masukkan Nama Access Group">
                @if ($errors->has('name'))
                @foreach ($errors->get('name') as $error)
                <span style="color: red;">{{$error}}</span>
                @endforeach
                @endif
            </div>

            <div class="field">
                <label for="">Description</label>
                <textarea name="description" id="description"></textarea>
            </div>

            <div class="field">
                <label for="multiple-select-clear-field">Pilih Access Master:</label>
                <select name="access_master[]" class="form-select select2" style="width: 100%;" id="multiple-select-clear-field" data-placeholder="Pilih Access Master:" multiple>
                    @foreach ($accessMasters as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('access_master'))
                @foreach ($errors->get('access_master') as $error)
                <span style="color: red;">{{$error}}</span>
                @endforeach
                @endif
            </div>

            <div class="field">
                <div class="ui checkbox">
                    <input class="form-check-input" type="checkbox" value="1" name="status">
                    <label>Aktif</label>
                </div>
            </div>
        </div>
        <div class="divTambah">
            <button class="btnTambah">Add Access Group</button>
        </div>
    </form>
    <div class="divBatal">
        <a href="{{ url()->previous() }}">
            <button class="btnBatal">Batal</button>
        </a>
    </div>
</body>

</html>
<!-- <a href="{{ route("getAccessGroup") }}"><button class=" right floated ui red button">Batal</button></a> -->
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.form-select2').select2({
            theme: 'bootstrap-5',
            width: '100%',
            allowClear: true,
        });
        // $('#multiple-select-clear-field').select2({
        //     theme: "bootstrap-5",
        //     width: '100%',
        //     placeholder: 'Pilih User',
        //     closeOnSelect: false,
        //     allowClear: true
        // });

        $('#mentor').select2({
            theme: 'bootstrap-5',
            width: '100%',
            placeholder: 'Pilih Mentor'
        });

        $(document).ready(function() {
            $('.select2').select2();
        });

        $('.ui.search.selection.dropdown').dropdown({
            keepSearchTerm: true
        });
    });
</script>
<script>
    CKEDITOR.replace('description');
</script>
@endsection