@extends('layout.master')

@section('title', 'Add Transaction Order')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Orders Confirm</title>
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

        .formAdd {
            padding-left: 1rem;
            padding-right: 1.5rem;
        }
    </style>
</head>

<body>
    <div class="container conTitle">
        <h2 class="h2">Add Orders Confirm</h2>
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
        <div class="sectionCourse">Add</div>
    </div>

    <form class="formAdd ui form" action="{{ route('postAddTransOrderConfirm') }}" method="post" enctype="multipart/form-data">
        @csrf

        <h3 class="ui dividing header" style="margin-top: 1rem;">Order Information</h3>

        <div class="field">
            <div class="two fields">
                <div class="field">
                    <label for="orderNumber">Order Number</label>
                    <input type="hidden" name="trans_order_id" value="{{ $transOrder->id }}">
                    <input type="text" name="order_number" value="{{ $transOrder->order_number }}" id="orderNumber" placeholder="Masukkan Nomor Order" readonly>
                </div>
                <div class="field">
                    <label for="date">Date</label>
                    <input id="date" type="datetime-local" name="date" value="">
                </div>
            </div>

            <h4 class="ui dividing header">User Information</h4>

            <div class="two fields">
                <div class="field">
                    <label for="">Account Name</label>
                    <input type="text" name="sender_account_name" placeholder="Masukkan Account Name">
                </div>
                <div class="field">
                    <label for="">Account Number</label>
                    <input type="text" name="sender_account_number" placeholder="Masukkan Account Number">
                </div>
            </div>

            <h3 class="ui dividing header">Payment Information</h3>

            <div class="two fields">
                <div class="field">
                    <label for="amount">Amount</label>
                    <input type="number" name="amount" value="" id="amount" placeholder="Rp. 0" step="10000">
                    @error('total')
                    <div class="text-danger">
                        {{ $error }}
                    </div>
                    @enderror
                </div>

                <div class="field">
                    <label for="">Bank Account</label>
                    <select class="ui dropdown" name="m_bank_account_id" id="">
                        <option value="" selected disabled>-- Pilih Bank Account --</option>
                        @foreach ($bankAccounts as $bankAccount)
                        <option value="{{ $bankAccount->id }}">{{ $bankAccount->id }}
                            - {{ $bankAccount->account_name }} - {{ $bankAccount->account_number }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="field">
                <label for="Image" class="form-label">Image</label>
                <input class="form-control" type="file" id="formFile" name="file_image" onchange="preview()">
                <br>
                <img id="frame" src="" class="img-fluid" width="300" />
            </div>

            <div class="ui dividing header"></div>

            <div class="field">
                <label for="description">Description</label>
                <textarea name="description" id="description"></textarea>
            </div>

            <div class="field">
                <div class="ui checkbox">
                    <input id="isActive" class="form-check-input" type="checkbox" value="1" name="status" checked>
                    <label for="isActive">Aktif</label>
                </div>
            </div>
        </div>
        <div class="divTambah">
            <button class="btnTambah">Add Orders Confirm</button>
        </div>
    </form>
    <div class="divBatal">
        <a href="{{ url()->previous() }}">
            <button class="btnBatal">Batal</button>
        </a>
    </div>
</body>
</html>
<script>
    function preview() {
        frame.src = URL.createObjectURL(event.target.files[0]);
    }

    let total = document.getElementById('total');
    total.addEventListener('keyup', function(e) {
        total.value = formatRupiah(this.value, 'Rp. ');
    });

    function formatRupiah(angka, prefix) {
        let number_string = angka.replace(/[^,\d]/g, '').toString(),
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
        let total = $("#total").val().replace('Rp. ', '').split('.').join("");
        let discount = Number(total * $("#discount").val() / 100);
        let afterDisc = discount - total;

        $("#afterDisc").val(
            formatRupiah(String(afterDisc), 'Rp. ')
        );
    })

    $("#total").on("keyup", function(event) {
        let total = $("#total").val().replace('Rp. ', '').split('.').join("");
        let discount = Number(total * $("#discount").val() / 100);
        let afterDisc = discount - total;

        $("#afterDisc").val(
            formatRupiah(String(afterDisc), 'Rp. ')
        );
    })
</script>
@endsection