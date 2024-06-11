@extends('layout.master')

@section('title', 'Edit Transaction Order Confirm')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order Confirm</title>
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
    </style>
</head>

<body>
    <div class="container conTitle">
        <h2 class="h2">Edit Order Confirm</h2>
        <form class="form-inline my-2 my-lg-0 me-3" method="post" action="{{ route('logout') }}">
            @csrf
            <button class="btnlogout" type="submit">Logout</button>
        </form>
    </div>

    <div class="breadcrumb pt-2 pb-4">
        <a class="sectionDashboard" href="{{ url('/') }}">Dashboard</a>
        <span class="divider">></span>
        <div class="sectionMaster">Order</div>
        <span class="divider">></span>
        <div class="sectionCourse">Trans Order Confirm</div>
        <span class="divider">></span>
        <div class="sectionCourse">Edit</div>
    </div>

    <div class="container">
        <form class="ui form" action="{{ route('postEditTransOrderConfirm', ['id' => request()->query('id')]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" name="img_keep" value="{{ $currentData->image }}" hidden>
            <input type="text" name="m_bank" value="{{ $m_bank_account_now->m_bank_id }}" hidden>
            <input type="text" name="idtransorder" value="{{ $idtransorder }}" hidden>
            <h4 class="ui dividing header">Order Information</h4>
            <div class="field">
                <div class="two fields">
                    <div class="field">
                        <label for="">Order Number</label>
                        <input type="text" name="order_number" value="{{ $currentData->order_confirm_number }}">
                        @if ($errors->has('order_number'))
                        @foreach ($errors->get('order_number') as $error)
                        <span style="color: red;">{{$error}}</span>
                        @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">Date</label>
                        <input type="datetime-local" name="date" value="{{ $currentData->date }}">
                    </div>
                </div>
                <h4 class="ui dividing header">User Information</h4>
                <div class="two fields">
                    <div class="field">
                        <label for="">Account Name</label>
                        <input type="text" name="sender_account_name" placeholder="Masukkan Account Name" value="{{ $currentData->sender_account_name }}">
                    </div>
                    <div class="field">
                        <label for="">Account Number</label>
                        <input type="text" name="sender_account_number" placeholder="Masukkan Account Number" value="{{ $currentData->sender_account_number }}">
                    </div>
                </div>
                <div class="three fields">
                    <div class="field">
                        <label for="">User</label>
                        <select class="ui dropdown" name="user_id" id="" type="hidden">
                            @foreach ($idmembers as $item)
                            <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('member_id'))
                        @foreach ($errors->get('member_id') as $error)
                        <span style="color: red;">{{$error}}</span>
                        @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">Course</label>
                        <select class="ui dropdown" name="course_id" id="" type="hidden">
                            @foreach ($idcourses as $item)
                            <option selected value="{{ $item->id }}">{{ $item->id }} - {{ $item->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('course_id'))
                        @foreach ($errors->get('course_id') as $error)
                        <span style="color: red;">{{$error}}</span>
                        @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">Course Class</label>
                        <select class="ui dropdown" name="course_class_id" id="" type="hidden">
                            @foreach ($idcourseclasses as $item)
                            <option value="{{ $item->id }}">{{ $item->id }} - Batch {{ $item->batch }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('course_class_id'))
                        @foreach ($errors->get('course_class_id') as $error)
                        <span style="color: red;">{{$error}}</span>
                        @endforeach
                        @endif
                    </div>

                </div>
                <h4 class="ui dividing header">Payment Information</h4>
                <div class="two fields">
                    <div class="field">
                        <label for="">Amount</label>
                        <input type="text" name="total" id="total" value="{{ $currentData->amount }}">
                        @if ($errors->has('total'))
                        @foreach ($errors->get('total') as $error)
                        <span style="color: red;">{{$error}}</span>
                        @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">Bank Account</label>
                        <select class="ui dropdown" name="bank_account_id" id="">
                            <option value="{{ $m_bank_account_now->id }}|{{ $m_bank_account_now->m_bank_id }}" selected>{{ $m_bank_account_now->id }} - {{ $m_bank_account_now->account_name }} - {{ $m_bank_account_now->account_number }}</option>
                            @foreach ($m_bank_account as $item)
                            <option value="{{ $item->id }}|{{ $item->m_bank_id }}">{{ $item->id }} - {{ $item->account_name }} - {{ $item->account_number }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="field">
                    <label for="Image" class="form-label">Image</label>
                    <input class="form-control" type="file" id="formFile" name="file_image" onchange="preview()">
                    <br>
                    <img id="frame" src="{{ asset('uploads/trans_order/' . $currentData->image) }}" class="img-fluid" />
                </div>
                <div class="ui dividing header"></div>
                <div class="field">
                    <label for="">Description</label>
                    <textarea name="description">{{ $currentData->description }}</textarea>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" {{ $currentData->status == 1 ? "checked" : "" }} name="status">
                        <label>Aktif</label>
                    </div>
                </div>
            </div>
            <button class="right floated ui button primary">Save & Update</button>
        </form>
        <a href="{{ route("getTransOrder") }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
</body>

</html>
<script>
    function preview() {
        frame.src = URL.createObjectURL(event.target.files[0]);
    }
    var total = document.getElementById('total');
    total.addEventListener('keyup', function(e) {
        total.value = formatRupiah(this.value, 'Rp. ');
    });

    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            total = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            total += separator + ribuan.join('.');
        }

        total = split[1] != undefined ? total + ',' + split[1] : total;
        return prefix == undefined ? total : (total ? 'Rp. ' + total : '');
    }

    $("#discount").on("keyup", function(event) {
        var total = $("#total").val().replace('Rp. ', '').split('.').join("");
        var discount = Number(total * $("#discount").val() / 100);
        var afterDisc = discount - total;

        $("#afterDisc").val(
            formatRupiah(String(afterDisc), 'Rp. ')
        );
    })

    $("#total").on("keyup", function(event) {
        var total = $("#total").val().replace('Rp. ', '').split('.').join("");
        var discount = Number(total * $("#discount").val() / 100);
        var afterDisc = discount - total;

        $("#afterDisc").val(
            formatRupiah(String(afterDisc), 'Rp. ')
        );
    })
</script>
@endsection