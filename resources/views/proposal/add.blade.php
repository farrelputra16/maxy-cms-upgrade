@extends('layout.master')

@section('title', 'Add Proposal')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Proposal</title>
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
            width: 97%;
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

        .btnBatal {
            background-color: #F13C20;
            color: #FFF;
            /* margin-right: 1rem;
        margin-left: 58rem;
        margin-bottom: .5rem; */
            color: #FFF;
            width: 80px;
            height: 35px;
            border-radius: 10px;
            border: none;
            box-shadow: none;
            font-weight: bold;
            margin-bottom: 20px;
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
            padding-right: 2rem;
        }
    </style>
</head>

<body>
    <div class="container conTitle">
        <h2 class="h2">Add Proposal</h2>
        <form class="form-inline my-2 my-lg-0 me-3" method="post" action="{{ route('logout') }}">
            @csrf
            <button class="btnlogout" type="submit">Logout</button>
        </form>
    </div>
    <div class="breadcrumb pt-2 pb-4">
        <a class="sectionDashboard" href="{{ url('/') }}">Dashboard</a>
        <span class="divider">></span>
        <div class="sectionMaster">Members</div>
        <span class="divider">></span>
        <div class="sectionCourse">Proposal</div>
        <span class="divider">></span>
        <div class="sectionCourse">Add Proposal</div>
    </div>

    <form class="formAdd ui form" action="{{ route('postAddProposal') }}" method="post">
        @csrf
        <div class="field">
            <div class="two fields">
                <div class="field">
                    <label for="">Name</label>
                    <input type="text" name="name" placeholder="Masukkan Nama Voucher">
                </div>
                <div class="field">
                    <label for="">Code</label>
                    <input type="text" name="code" placeholder="Masukkan Kode Voucher">
                </div>
            </div>

            <div class="three fields">
                <div class="field">
                    <label for="">Quota</label>
                    <input type="number" name="quota" id="maxdiscount">
                </div>

                <div class="field">
                    <label for="">Type</label>
                    <input type="text" name="type" placeholder="Masukkan Type">
                </div>

                <div class="field">
                    <label for="">Expired Date</label>
                    <input type="datetime-local" id="expired_date" name="expired_date">
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
        </div>
        <div class="divAdd">
            <button class="btnAdd">Add Proposal</button>
        </div>
    </form>
    <a href="{{ url()->previous() }}">
        <button class="btnBatal">Batal</button>
    </a>
</body>

</html>

<script>
    CKEDITOR.replace('description');
</script>
@endsection