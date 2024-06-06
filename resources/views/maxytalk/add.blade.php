@extends('layout.master')

@section('title', 'Add Maxy Talk Data')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Maxy Talks</title>
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
            margin-bottom: 10px;
        }

        .btnAdd {
            background-color: #4056A1;
            color: #FFF;
            color: #FFF;
            width: 200px;
            height: 35px;
            border-radius: 10px;
            border: none;
            box-shadow: none;
            font-weight: bold;
        }

        .divBatal {
            text-align: right;
            margin-right: 15rem;
            margin-bottom: 1rem;
            margin-top: -3rem;
        }

        .divAdd {
            text-align: right;
            /* margin-right: .5rem; */
            margin-bottom: .5rem;
            /* margin-left: 65rem; */
        }

        .formAdd {
            padding-left: 1rem;
            padding-right: 1.5rem;
        }
    </style>
</head>

<body>
    <div class="container conTitle">
        <h2 class="h2">Add Maxy Talks</h2>
        <button class="logout">Logout</button>
    </div>
    <div class="breadcrumb pt-2 pb-4">
        <a class="sectionDashboard" href="{{ url('/') }}">Dashboard</a>
        <span class="divider">></span>
        <div class="sectionMaster">Settings</div>
        <span class="divider">></span>
        <div class="sectionCourse">Maxy Talk</div>
        <span class="divider">></span>
        <div class="sectionCourse">Add Maxy Talk</div>
    </div>

    <form class="formAdd ui form" action="{{ route('postAddMaxyTalk') }}" method="post">
        @csrf
        <div class="three fields">
            <div class="field">
                <label for="">Name</label>
                <input type="text" name="name" placeholder="Masukkan Nama MaxyTalk">
                @if ($errors->has('name'))
                @foreach ($errors->get('name') as $error)
                <span style="color: red;">{{ $error }}</span>
                @endforeach
                @endif
            </div>
            <div class="field">
                <label for="start-date">Start Pendaftaran</label>
                <input type="datetime-local" id="start-date" name="datestart" onchange="updateEndDateMin()">
                @if ($errors->has('datestart'))
                @foreach ($errors->get('datestart') as $error)
                <span style="color: red;">{{ $error }}</span>
                @endforeach
                @endif
            </div>
            <div class="field">
                <label for="end-date">End Pendaftaran</label>
                <input type="datetime-local" id="end-date" name="dateend">
                @if ($errors->has('dateend'))
                @foreach ($errors->get('dateend') as $error)
                <span style="color: red;">{{ $error }}</span>
                @endforeach
                @endif
            </div>
        </div>

        <div class="two fields">
            <div class="field">
                <label for="">Registration Link</label>
                <input type="text" name="registration" placeholder="Masukkan Link Registrasi">
                @if ($errors->has('registration'))
                @foreach ($errors->get('registration') as $error)
                <span style="color: red;">{{ $error }}</span>
                @endforeach
                @endif
            </div>
            <div class="field">
                <label for="">Priority</label>
                <input type="number" name="priority">
                @if ($errors->has('priority'))
                @foreach ($errors->get('priority') as $error)
                <span style="color: red;">{{ $error }}</span>
                @endforeach
                @endif
            </div>
        </div>
        <div class="two fields">
            <div class="field">
                <label for="">User ID</label>
                <select name="userid" class="ui dropdown">
                    <option value="">-- Pilih User --</option>
                    @foreach ($users as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('userid'))
                @foreach ($errors->get('userid') as $error)
                <span style="color: red;">{{ $error }}</span>
                @endforeach
                @endif
            </div>
            <div class="field">
                <label for="">Maxy Talk Parents (optional)</label>
                <select name="parentsid" class="ui dropdown">
                    <option value="">-- Pilih Parents --</option>
                    @foreach ($maxytalk as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="field">
            <label>Description</label>
            <textarea name="description" id="description" placeholder="Enter Description"></textarea>
        </div>
        <div class="field">
            <div class="ui checkbox">
                <input class="form-check-input" type="checkbox" value="1" name="status">
                <label>Aktif</label>
            </div>
        </div>
        <div class="divAdd">
            <button class="btnAdd">Add Course Package</button>
        </div>
    </form>
    <a href="{{ url()->previous() }}">
        <button class="btnBatal">Batal</button>
    </a>

</body>

</html>
<script>
    function updateEndDateMin() {
        var startDateInput = document.getElementById('start-date');
        var endDateInput = document.getElementById('end-date');
        endDateInput.min = startDateInput.value;
    }
</script>
<script>
    CKEDITOR.replace('description');
</script>
@endsection