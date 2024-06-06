@extends('layout.master')

@section('title', 'Add Voucher')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Vouchers</title>
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
        <h2 class="h2">Add Vouchers</h2>
        <button class="logout">Logout</button>
    </div>
    <div class="breadcrumb pt-2 pb-4">
        <a class="sectionDashboard" href="{{ url('/') }}">Dashboard</a>
        <span class="divider">></span>
        <div class="sectionMaster">Order</div>
        <span class="divider">></span>
        <div class="sectionCourse">Voucher</div>
        <span class="divider">></span>
        <div class="sectionCourse">Add Voucher</div>
    </div>

    <form class="formAdd ui form" action="{{ route('postAddVoucher') }}" method="post">
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

            <div class="two fields">
                <div class="field">
                    <label for="">Waktu Mulai</label>
                    <input type="datetime-local" id="start_date" name="start_date">
                </div>
                <div class="field">
                    <label for="">Waktu Berakhir</label>
                    <input type="datetime-local" id="start_date" name="end_date">
                </div>
            </div>
            <div class="three fields">
                <div class="field">
                    <label for="">Discount Type</label>
                    <select class="ui dropdown" name="discount_type" id="discount_type">
                        <option value="">-- Pilih Discount Type --</option>
                        <option value="PERCENTAGE">PERCENTAGE</option>
                        <option value="FIXED">FIXED</option>
                    </select>
                </div>

                <div class="field">
                    <label for="">Discount</label>
                    <input type="text" name="discount">
                </div>

                <div class="field">
                    <label for="">Max Discount</label>
                    <input type="number" name="maxdiscount" id="maxdiscount" placeholder="e.g. 5">
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
                    <button class="btnAdd">Add Course Package</button>
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