@extends('layout.master')

@section('title', 'Edit Course')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Course</title>
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
        <h2 class="h2">Edit Course</h2>
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
        <form class="ui form" action="{{ route('postEditCourse', ['id' => request()->query('id')]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="field">
                <input type="text" name="img_keep" value="{{ $courses->image }}" hidden>
                <br>

                <div class="two fields">
                    <div class="field">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ $courses->id }}">
                    </div>
                    <div class="field">
                        <label for="">Slug</label>
                        <input type="text" name="slug" value="{{ $courses->slug }}">
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label for="">Payment Link</label>
                        <input type="url" id="payment_link" name="payment_link" placeholder="https://example.com" value="{{ $courses->payment_link }}">
                    </div>
                    <div class="field">
                        <label for="">Difficulty</label>
                        <select name="level" class="ui dropdown">
                            @if ($currentDataCourse)
                            <option selected value="{{ $currentDataCourse->m_difficulty_type_id }}">
                                {{ $currentDataCourse->course_difficulty }}
                            </option>
                            @endif
                            @foreach ($allDifficultyTypes as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label for="">Package</label>
                        <select name="package">
                            @if ($currentCoursePackages)
                            <option selected value="{{ $item->course_package_id }}">
                                {{ $item->course_package_name }} -Rp. {{ $item->course_package_price }}
                            </option>
                            @elseif ($currentCoursePackages == null)
                            <option selected value="">Tidak ada paket yang dipilih</option>
                            @endif
                            @foreach ($allCoursePackages as $item)
                            <option value="{{ $item->id }}">{{ $item->name }} - Rp. {{ $item->price }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="field">
                        <label for="">Type</label>
                        <select name="type" class="ui dropdown" id="type_selector">
                            @if ($currentDataCourse)
                            <option selected value="{{ $currentDataCourse->m_course_type_id }}">
                                {{ $currentDataCourse->course_type_name }}
                            </option>
                            @endif
                            @foreach ($allCourseTypes as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="field" id="mini_fake_price">
                        <label for="">Mini Bootcamp Fake Price</label>
                        <input type="text" name="mini_fake_price" id="fake_price" value="{{ $currentDataCourse ? $currentDataCourse->fake_price : '' }}">

                    </div>
                    <div class="field" id="mini_price">
                        <label for="">Mini Bootcamp Price</label>
                        <input type="text" name="mini_price" id="price" value="{{ $currentDataCourse ? $currentDataCourse->price : '' }}">
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label for="Image" class="form-label">Image</label>
                        <input class="formImg" type="file" id="formFile" name="file_image" onchange="preview()">
                    </div>
                    <div class="field">
                        <div class="ui centered medium image">
                            <img id="frame" src="{{ asset('uploads/course_img/' . $courses->image) }}" class="img-fluid" />
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="field">
                    <label>Content</label>
                    <textarea name="content" id="content" placeholder="Enter Content">{{ $courses->content }}</textarea>
                </div>

                <!-- Description -->
                <div class="field">
                    <label>Description</label>
                    <textarea name="description" placeholder="Enter Description">{{ $courses->description }}</textarea>
                </div>

                <!-- Short Description -->
                <div class="field">
                    <label>Short Description</label>
                    <textarea name="short_description" id="short_description" placeholder="Enter Short Description">{{ $courses->short_description }}</textarea>
                </div>

                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" {{ $courses->status == 1 ? 'checked' : '' }} name="status">
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
        <!-- </div> -->
    </div>
</body>

</html>

<script>
    function preview() {
        frame.src = URL.createObjectURL(event.target.files[0]);
        if ($('#type_selector').val() == 1) {
            console.log("Bootcamp");
            $('#mini_fake_price').hide();
            $('#mini_price').hide();
            $('#course_package').show();
        } else if ($('#type_selector').val() == 3) {
            console.log("Mini Bootcamp");
            $('#course_package').hide();
            $('#mini_fake_price').show();
            $('#mini_price').show();
        } else {
            console.log("Rapid Onboarding atau Hackathon atau Prakerja atau MSIB");
            $('#mini_fake_price').hide();
            $('#mini_price').hide();
            $('#course_package').hide();
        }
    }

    $('#type_selector').change(function() {
        let val = $(this).val();
        if (val == 1) {
            $('#mini_fake_price').hide();
            $('#mini_price').hide();
            $('#course_package').show();
        } else if (val == 3) {
            $('#course_package').hide();
            $('#mini_fake_price').show();
            $('#mini_price').show();
        } else {
            $('#mini_fake_price').hide();
            $('#mini_price').hide();
            $('#course_package').hide()
        }
    })

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

    // CK EDITOR
    CKEDITOR.replace('short_description');
    CKEDITOR.replace('content');
    CKEDITOR.replace('description');

    // Fungsi untuk membuat slug berdasarkan nama yang diberikan
    function slugify(text) {
        return text.toString().toLowerCase()
            .replace(/\s+/g, '-')
            .replace(/[^\w\-]+/g, '')
            .replace(/\-\-+/g, '-')
            .replace(/^-+/, '')
            .replace(/-+$/, '');
    }

    // Event listener untuk input nama
    document.getElementById('name').addEventListener('input', function() {
        // Ambil nilai dari input nama
        const nameValue = this.value;

        // Buat slug berdasarkan nilai nama
        const slugValue = slugify(nameValue);

        // Set nilai slug ke input slug
        document.getElementsByName('slug')[0].value = slugValue;
    });
</script>
@endsection