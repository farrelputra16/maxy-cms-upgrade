@extends('layout.master')

@section('title', 'Add Course')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course</title>
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
            /* margin-right: .5rem; */
            margin-bottom: .5rem;
            /* margin-left: 65rem; */
        }
    </style>
</head>

<body>
    <div class="container conTitle">
        <h2 class="h2">Add Course</h2>
        <form class="form-inline my-2 my-lg-0 me-3" method="post" action="{{ route('logout') }}">
            @csrf
            <button class="btnlogout" type="submit">Logout</button>
        </form>
    </div>
    <div class="breadcrumb pt-2 pb-4">
        <a class="sectionDashboard" href="{{ url('/') }}">Dashboard</a>
        <span class="divider">></span>
        <div class="sectionMaster">Master</div>
        <span class="divider">></span>
        <div class="sectionCourse">Course</div>
    </div>

    <div class="container">
        <form class="formAdd ui form" action="{{ route('postAddCourse') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="field">
                <div class="two fields">
                    <div class="field">
                        <label for="">Name</label>
                        <input type="text" name="name" placeholder="Masukkan Nama Course">
                        @if ($errors->has('name'))
                        @foreach ($errors->get('name') as $error)
                        <span style="color: red;">{{ $error }}</span>
                        @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">Slug</label>
                        <input type="text" name="slug">
                        @if ($errors->has('slug'))
                        @foreach ($errors->get('slug') as $error)
                        <span style="color: red;">{{ $error }}</span>
                        @endforeach
                        @endif
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label for="">Payment Link</label>
                        <input type="text" id="payment_link" name="payment_link" placeholder="Masukkan Payment Link">
                    </div>

                    <div class="field">
                        <label for="">Difficulty</label>
                        <select name="level" class="ui dropdown">
                            @foreach ($allCourseDifficulty as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label for="">Course Type</label>
                        <select name="type" class="ui dropdown" id="type_selector">
                            <option selected value="">-- Pilih Tipe Course --</option>
                            @foreach ($allCourseTypes as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('type'))
                        @foreach ($errors->get('type') as $error)
                        <span style="color: red;">{{ $error }}</span>
                        @endforeach
                        @endif
                    </div>

                    <div class="field">
                        <label for="">Short Description</label>
                        <input type="text" id="short_description" name="short_description" placeholder="Masukkan Short Description">
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label for="Image" class="form-label">Image</label>
                        <input class="formImg" type="file" id="formFile" name="file_image" onchange="preview()">
                    </div>
                </div>

                <div class="field">
                    <label for="">Content</label>
                    <textarea name="content"></textarea>
                </div>
                <div class="field">
                    <label for="">Description</label>
                    <textarea name="description"></textarea>
                </div>

                <select class="js-example-basic-multiple" name="courseCategory[]" multiple="multiple">
                    @foreach ($allCourseCategory as $courseCategory)
                        <option value="{{ $courseCategory->id }}">{{ $courseCategory->name }}</option>
                    @endforeach
                </select>

                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" name="status">
                        <label>Aktif</label>
                    </div>
                </div>
            </div>
            <div class="divAdd">
                <button class="btnAdd">Add Course</button>
            </div>
        </form>
        <!-- <div style="margin-top:-4%"> -->
        <!-- <div class="divBatal"> -->
        <a href="{{ url()->previous() }}">
            <button class="btnBatal">Batal</button>
        </a>
        <br>
        <!-- </div> -->
    </div>
</body>

</html>
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
    function preview() {
        frame.src = URL.createObjectURL(event.target.files[0]);
    }

    if ($('#type_selector').val() == '') {
        $("#show_course_package").hide();
        $("#show_course_mini_price").hide();
        $("#show_course_mini_fake_price").hide();
    }
    $('#type_selector').change(function() {
        var responseID = $(this).val();
        if (responseID == 1) {
            $("#show_course_mini_fake_price").hide();
            $("#show_course_mini_price").hide();
            $("#show_course_package").show();
        } else if (responseID == 3) {
            $("#show_course_mini_fake_price").show();
            $("#show_course_mini_price").show();
            $("#show_course_package").hide();
        } else {
            $("#show_course_mini_fake_price").hide();
            $("#show_course_mini_price").hide();
            $("#show_course_package").hide();
        }
    })

    var rupiah = document.getElementById('mini_price');
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

    var rupiah1 = document.getElementById('fake_price');
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

    CKEDITOR.replace('content');
    CKEDITOR.replace('description');
</script>
@endsection