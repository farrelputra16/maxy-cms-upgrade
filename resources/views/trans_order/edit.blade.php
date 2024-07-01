@extends('layout.master')

@section('title', 'Edit Transaction Order')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order</title>

    <!-- css -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />

    <!-- Javascript -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
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

        .h4 {
            font-weight: bold;
            color: #232E66;
            padding-left: .1rem;
            font-size: 18px;
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
        <h2 class="h2">Edit Order</h2>
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
        <div class="sectionCourse">Edit Order</div>
    </div>

    <div class="container">
        <form class="ui form" action="{{ route('postEditTransOrder', ['id' => request()->query('id')]) }}" method="post">
            @csrf
            <h4 class="ui dividing header">Order Information</h4>
            <div class="field">
                <div class="two fields">
                    <div class="field">
                        <label for="">Order Number</label>
                        <input readonly type="text" name="order_number" value="{{ $currentData->order_number }}">
                        @if ($errors->has('order_number'))
                        @foreach ($errors->get('order_number') as $error)
                        <span style="color: red;">{{ $error }}</span>
                        @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">Date</label>
                        <input type="datetime-local" name="date" value="{{ $currentData->dates }}">
                    </div>
                </div>

                <h4 class="ui dividing header">User Information</h4>
                <div class="two fields">
                    <div class="field">
                        <label for="">User</label>
                        {{-- <select class="ui dropdown" name="user_id" id=""> --}}
                        <select class="form-control" name="user_id" id="" required>

                            <option value="{{ $currentData->user_id }}" selected>{{ $currentData->member_name }}</option>
                            @foreach ($allMember as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('member_id'))
                        @foreach ($errors->get('member_id') as $error)
                        <span style="color: red;">{{ $error }}</span>
                        @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">Course</label>
                        {{-- <select class="ui dropdown" name="course_id" id=""> --}}
                        <select class="form-control" name="course_id" id="" required>

                            <option value="{{ $currentData->course_id }}" selected>{{ $currentData->course_name }}</option>
                            @foreach ($allCourse as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                        <select class="form-control" name="course_class_id" id="" required>

                            <option value="{{ $currentData->course_class_id }}" selected>
                                {{ $currentData->course_class_batch }}
                            </option>
                            @foreach ($allCourseClass as $item)
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
                        <select class="form-control" name="course_package_id" id="" required>

                            <option value="{{ $currentData->course_package_id }}" selected>
                                {{ $currentData->course_package_name }}
                            </option>
                            @foreach ($allCoursePackage as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                        {{-- <select class="ui dropdown" name="payment_status" id=""> --}}
                        <select class="form-control" name="payment_status" id="" required>

                            @if ($currentData->payment_status == 0)
                            <option value="0" selected>0 - Not Completed </option>
                            <option value="1">1 - Completed </option>
                            <option value="2">2 - Partial </option>
                            <option value="3">3 - Cancelled </option>
                            @endif
                            @if ($currentData->payment_status == 1)
                            <option value="0">0 - Not Completed </option>
                            <option value="1" selected>1 - Completed </option>
                            <option value="2">2 - Partial </option>
                            <option value="3">3 - Cancelled </option>
                            @endif
                            @if ($currentData->payment_status == 2)
                            <option value="0">0 - Not Completed </option>
                            <option value="1">1 - Completed </option>
                            <option value="2" selected>2 - Partial </option>
                            <option value="3">3 - Cancelled </option>
                            @endif
                            @if ($currentData->payment_status == 3)
                            <option value="0">0 - Not Completed </option>
                            <option value="1">1 - Completed </option>
                            <option value="2">2 - Partial </option>
                            <option value="3" selected>3 - Cancelled </option>
                            @endif
                        </select>
                    </div>
                    <!-- <div class="field">
                        <label for="">Total</label>
                        <input type="text" name="total" id="total" placeholder="Rp. 0" value="{{ $currentData->total }}">
                        @if ($errors->has('total'))
                        @foreach ($errors->get('total') as $error)
                        <span style="color: red;">{{$error}}</span>
                        @endforeach
                        @endif
                    </div> -->
                    <div class="field">
                        <label for="">Total</label>
                        <?php
                        // Format mata uang Rupiah dengan pemisah ribuan
                        $formattedTotal = number_format($currentData->total, 0, ',', '.');
                        ?>
                        <input type="text" name="total" id="total" placeholder="Rp. {{ $formattedTotal }}" value="{{ $formattedTotal }}" required>
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
                        <input type="number" name="discount" id="discount" placeholder="0%" value="{{ $currentData->discount }}">
                        @if ($errors->has('discount'))
                        @foreach ($errors->get('discount') as $error)
                        <span style="color: red;">{{ $error }}</span>
                        @endforeach
                        @endif
                    </div>
                    <!-- <div class="field">
                        <label for="">After Discount (automatically)</label>
                        <input type="text" name="total_after_discount" id="afterDisc" value="{{ $currentData->total_after_discount }}">
                        @if ($errors->has('total_after_discount'))
                        @foreach ($errors->get('total_after_discount') as $error)
                        <span style="color: red;">{{$error}}</span>
                        @endforeach
                        @endif
                    </div> -->
                    <div class="field">
                        <label for="">After Discount (automatically)</label>
                        <?php
                        // Format mata uang Rupiah dengan pemisah ribuan
                        $formattedAfterDiscount = number_format($currentData->total_after_discount, 0, ',', '.');
                        ?>
                        <input type="text" name="total_after_discount" id="afterDisc" value="Rp {{ $formattedAfterDiscount }}">
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

                            @if ($currentData->m_promo_id)
                            <option value="{{ $currentData->m_promo_id }}" selected>
                                {{ $currentData->promotion_name }}
                            </option>
                            @else
                            <option value="" selected>Tidak ada</option> {{-- Set your default value here --}}
                            @endif

                            @foreach ($allPromotion as $item)
                            <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Description -->
                <div class="field">
                    <label for="">Description</label>
                    <textarea name="description" placeholder="Description" id="editor">{{ $currentData->description }}</textarea>
                </div>

                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" {{ $currentData->status == 1 ? 'checked' : '' }} name="status">
                        <label>Aktif</label>
                    </div>
                </div>
            </div>
            <div class="divTambah">
                <button class="btnSave">Save & Update</button>
            </div>
        </form>

        <!-- <div class="divBatal"> -->
        <a href="{{ url()->previous() }}" class="divBatal">
            <button class="btnBatal">Batal</button>
        </a>
    </div>
</body>

</html>
<!-- </div> -->
<script>
    // var total = document.getElementById('total');
    // total.addEventListener('keyup', function(e) {
    //     total.value = formatRupiah(this.value, 'Rp. ');
    // });

    // function formatRupiah(angka, prefix) {
    //     var number_string = angka.replace(/[^,\d]/g, '').toString(),
    //         split = number_string.split(','),
    //         sisa = split[0].length % 3,
    //         total = split[0].substr(0, sisa),
    //         ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    //     if (ribuan) {
    //         separator = sisa ? '.' : '';
    //         total += separator + ribuan.join('.');
    //     }

    //     total = split[1] != undefined ? total + ',' + split[1] : total;
    //     return prefix == undefined ? total : (total ? 'Rp. ' + total : '');
    // }
    // 
    var total = document.getElementById('total');
    total.addEventListener('input', function(e) {
        this.value = formatRupiah(this.value, 'Rp. ');
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

    // Set placeholder saat halaman dimuat
    // total.value = formatRupiah(total.value, 'Rp. ');

    // $("#discount").on("keyup", function(event) {
    //     var total = $("#total").val().replace('Rp. ', '').split('.').join("");
    //     var discount = Number(total * $("#discount").val() / 100);
    //     var afterDisc = discount - total;

    //     $("#afterDisc").val(
    //         formatRupiah(String(afterDisc), 'Rp. ')
    //     );
    // })
    var afterDisc = document.getElementById('afterDisc');
    afterDisc.addEventListener('input', function(e) {
        this.value = formatRupiah(this.value, 'Rp. ');
    });

    // Set nilai awal saat halaman dimuat
    afterDisc.value = formatRupiah(afterDisc.value, 'Rp. ');

    // Event handler untuk input discount
    $("#discount").on("input", function(event) {
        var total = $("#total").val().replace('Rp. ', '').split('.').join("");
        var discount = Number(total * $("#discount").val() / 100);
        var afterDisc = discount - total;

        $("#afterDisc").val(formatRupiah(String(afterDisc), 'Rp. '));
    });

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
@endsection