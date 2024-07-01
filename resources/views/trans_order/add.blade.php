@extends('layout.master')

@section('title', 'Add Transaction Order')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Orders</title>
    <!-- css -->
    {{-- <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css"
        integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" /> --}}

    <!-- Javascript -->
    {{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"
        integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script> --}}

    {{-- --}}
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script> --}}
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

        .formOrder {
            padding-left: 1rem;
            padding-right: 1.8rem;
        }
    </style>
</head>

<body>
    <div class="container conTitle">
        <h2 class="h2">Add Orders</h2>
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
        <div class="sectionCourse">Add Order</div>
    </div>

    <form class="formOrder ui form" action="{{ route('postAddTransOrder') }}" method="post">
        @csrf
        <h4 class="ui dividing header">Order Information</h4>
        <div class="two fields">
            <div class="field">
                <label for="">Order Number</label>
                <input type="text" name="order_number" placeholder="Masukkan Nomor Order">
                @if ($errors->has('order_number'))
                @foreach ($errors->get('order_number') as $error)
                <span style="color: red;">{{ $error }}</span>
                @endforeach
                @endif
            </div>
            <div class="field">
                <label for="">Date</label>
                <input type="datetime-local" name="date">
                @if ($errors->has('date'))
                @foreach ($errors->get('date') as $error)
                <span style="color: red;">{{ $error }}</span>
                @endforeach
                @endif
            </div>
        </div>

        <h4 class="ui dividing header">User Information</h4>
        <div class="two fields">
            <div class="field">
                <label for="">User</label>
                {{-- <select class="ui dropdown" name="user_id" id=""> --}}
                <select class="form-control" name="user_id" id="">
                    <option value="">-- Pilih User --</option>
                    @foreach ($idmembers as $item)
                    <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('user_id'))
                @foreach ($errors->get('user_id') as $error)
                <span style="color: red;">{{ $error }}</span>
                @endforeach
                @endif
            </div>
            <div class="field">
                <label for="">Course</label>
                {{-- <select class="ui dropdown" name="course_id" id=""> --}}
                <select class="form-control" name="course_id" id="">

                    <option value="">-- Pilih Course --</option>
                    @foreach ($idcourses as $item)
                    <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('course_id'))
                @foreach ($errors->get('course_id') as $error)
                <span style="color: red;">{{ $error }}</span>
                @endforeach
                @endif
            </div>
        </div>

        <div class="two fields">
            <div class="field">
                <label for="">Course Class</label>
                {{-- <select class="ui dropdown" name="course_class_id" id=""> --}}
                <select class="form-control" name="course_class_id" id="">

                    <option value="">-- Pilih Course Class --</option>
                    @foreach ($idcourseclasses as $item)
                    <option value="{{ $item->id }}">{{ $item->id }} - Batch {{ $item->batch }}
                    </option>
                    @endforeach
                </select>
                @if ($errors->has('course_class_id'))
                @foreach ($errors->get('course_class_id') as $error)
                <span style="color: red;">{{ $error }}</span>
                @endforeach
                @endif
            </div>
            <div class="field">
                <label for="">Course Package</label>
                {{-- <select class="ui dropdown" name="course_package_id" id=""> --}}
                <select class="form-control" name="course_package_id" id="">

                    <option value="">-- Pilih Course Package --</option>
                    @foreach ($idcoursepackages as $item)
                    <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('course_package_id'))
                @foreach ($errors->get('course_package_id') as $error)
                <span style="color: red;">{{ $error }}</span>
                @endforeach
                @endif
            </div>
        </div>

        <h4 class="ui dividing header">Payment Information</h4>
        <div class="two fields">
            <div class="field">
                <label for="">Status Pembayaran</label>
                {{-- <select class="form-control" name="course_package_id" id="" > --}}
                <select class="form-control" name="payment_status" id="">

                    <option value="">-- Status Pembayaran --</option>
                    <option value="0">0 - Not Completed </option>
                    <option value="1">1 - Completed </option>
                    <option value="2">2 - Partial </option>
                    <option value="3">3 - Cancelled </option>
                </select>
                @if ($errors->has('payment_status'))
                @foreach ($errors->get('payment_status') as $error)
                <span style="color: red;">{{ $error }}</span>
                @endforeach
                @endif
            </div>
            <div class="field">
                <label for="">Total</label>
                <input type="text" name="total" id="total" placeholder="Rp. 0">
                @if ($errors->has('total'))
                @foreach ($errors->get('total') as $error)
                <span style="color: red;">{{ $error }}</span>
                @endforeach
                @endif
            </div>
        </div>
        <div class="three fields">
            <div class="field">
                <label for="">Discount (max 100%)</label>
                <input type="number" name="discount" id="discount" placeholder="e.g. 5" value="{{ old('discount', 0) }}">
                @if ($errors->has('discount'))
                @foreach ($errors->get('discount') as $error)
                <span style="color: red;">{{ $error }}</span>
                @endforeach
                @endif
            </div>
            <div class="field">
                <label for="">After Discount (automatically)</label>
                <input type="text" name="total_after_discount" id="afterDisc" placeholder="Rp. 0">
                @if ($errors->has('total_after_discount'))
                @foreach ($errors->get('total_after_discount') as $error)
                <span style="color: red;">{{ $error }}</span>
                @endforeach
                @endif
            </div>
            <div class="field">
                <label for="">Promotion (Optional)</label>
                {{-- <select class="ui dropdown" name="m_promo_id" id=""> --}}
                <select class="form-control" name="m_promo_id" id="">

                    <option value="">-- Pilih Promotion --</option>
                    @foreach ($idpromotions as $item)
                    <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="field">
            <label for="">Description</label>
            <textarea name="description" placeholder="Description" id="editor">{{ $currentData->description ?? 'Tidak ada' }}</textarea>
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
    <script>
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
        $(document).ready(function() {
            $('select').selectize({
                sortField: 'text'
            });
        });

        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        CKEDITOR.replace('content');
        CKEDITOR.replace('description');
    </script>
    @endsection