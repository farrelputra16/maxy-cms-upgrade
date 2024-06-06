@extends('layout.master')

@section('title', 'Add Course Package')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course Package</title>

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
            margin-right: 2rem;
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
    </style>
</head>

<body>
    <div class="container conTitle">
        <h2 class="h2">Add Course Package</h2>
        <button class="logout">Logout</button>
    </div>
    <div class="breadcrumb pt-2 pb-4">
        <a class="sectionDashboard" href="{{ url('/') }}">Dashboard</a>
        <span class="divider">></span>
        <div class="sectionMaster">Master</div>
        <span class="divider">></span>
        <div class="sectionCourse">Course Package</div>
    </div>

    <div class="container">
        <form class="ui form" action="{{ route('postAddCoursePackage') }}" method="post">
            @csrf
            <div class="field">
                <div class="two fields">
                    <div class="field">
                        <label for="">Name</label>
                        <input type="text" name="name" placeholder="Masukkan Nama Package">
                        @if ($errors->has('name'))
                        @foreach ($errors->get('name') as $error)
                        <span style="color: red;">{{ $error }}</span>
                        @endforeach
                        @endif
                    </div>

                    <div class="field">
                        <label for="">Payment Link</label>
                        <input type="text" name="payment_link" placeholder="Masukkan Payment Link ">
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label for="">Fake Price</label>
                        <input type="text" name="fake" id="fake_price" placeholder="Masukkan Fake Price">
                        @if ($errors->has('fake'))
                        @foreach ($errors->get('fake') as $error)
                        <span style="color: red;">{{ $error }}</span>
                        @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">Price</label>
                        <input type="text" name="price" id="price" placeholder="Masukkan Price">
                        @if ($errors->has('price'))
                        @foreach ($errors->get('price') as $error)
                        <span style="color: red;">{{ $error }}</span>
                        @endforeach
                        @endif
                    </div>
                </div>

                <div class="field">
                    <label for="">Description</label>
                    <textarea name="description"></textarea>
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
    </div>
</body>

</html>

<script>
    var rupiah = document.getElementById('fake_price');
    rupiah.addEventListener('keyup', function(e) {
        rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    var rupiah1 = document.getElementById('price');
    rupiah1.addEventListener('keyup', function(e) {
        rupiah1.value = formatRupiah(this.value, 'Rp. ');
    });

    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah1 = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah1 += separator + ribuan.join('.');
        }

        rupiah1 = split[1] != undefined ? rupiah1 + ',' + split[1] : rupiah1;
        return prefix == undefined ? rupiah1 : (rupiah1 ? 'Rp. ' + rupiah1 : '');
    }
</script>
@endsection