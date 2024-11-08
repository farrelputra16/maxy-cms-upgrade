@extends('layout.main-v3')

@section('title', 'Add New Course')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Add New Data</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCourse') }}">Course</a></li>
                        <li class="breadcrumb-item active">Add New Course</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Add New Course</h4>
                    <p class="card-title-desc">This page allows you to update a data's information by modifying the data
                        listed below. Ensure that all the information you enter is accurate to provide the best learning
                        experience for the course participants.</p>

                    <form id="courseForm" action="{{ route('postAddCourse') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3 row">
                            <label for="name" class="col-md-2 col-form-label">Name</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" id="name"
                                    placeholder="Masukkan Nama Course" value="{{ old('name') }}" required>
                                @if ($errors->has('name'))
                                    @foreach ($errors->get('name') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="slug" class="col-md-2 col-form-label">Slug</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="slug" id="slug" readonly required
                                    value="{{ old('slug') }}">
                                @if ($errors->has('slug'))
                                    @foreach ($errors->get('slug') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        {{-- <div class="mb-3 row">
                            <label for="input-payment" class="col-md-2 col-form-label">Payment Link</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="payment_link" id="payment_link"
                                    value="{{ old('payment_link') }}" placeholder="https://example.com" required>
                                @if ($errors->has('payment_link'))
                                    @foreach ($errors->get('payment_link') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div> --}}
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Difficulty</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="level" data-placeholder="Choose ...">
                                    @foreach ($allCourseDifficulty as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('level') == $item->id ? 'selected' : '' }}> {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('level'))
                                    @foreach ($errors->get('level') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Course Type</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="type" data-placeholder="Choose ..."
                                    id="type_selector" required>
                                    @foreach ($allCourseTypes as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('type') == $item->id ? 'selected' : '' }}> {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('type'))
                                    @foreach ($errors->get('type') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Course Category</label>
                            <div class="col-md-10">
                                <select class="form-control select2 multiple" name="courseCategory[]"
                                    data-placeholder="Choose ..." id="course_category_selector" multiple="multiple">
                                    @foreach ($allCourseCategory as $courseCategory)
                                        <option value="{{ $courseCategory->id }}"
                                            {{ in_array($courseCategory->id, old('courseCategory', [])) ? 'selected' : '' }}>
                                            {{ $courseCategory->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('courseCategory'))
                                    @foreach ($errors->get('courseCategory') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div id="show_course_package" class="mb-3 row">
                            <label for="input-package" class="col-md-2 col-form-label">Course Package</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="package" data-placeholder="Choose ...">
                                    @foreach ($allCoursePackages as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('package') == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }} - Rp. {{ $item->price }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div id="show_course_mini_fake_price" class="mb-3 row">
                            <label for="input-mini-fake-price" class="col-md-2 col-form-label">Mini Bootcamp Fake
                                Price</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="mini_fake_price" id="fake_price"
                                    value="{{ old('mini_fake_price') }}"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                @if ($errors->has('mini_fake_price'))
                                    @foreach ($errors->get('mini_fake_price') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div id="show_course_mini_price" class="mb-3 row">
                            <label for="input-mini-price" class="col-md-2 col-form-label">Mini Bootcamp Price</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="mini_price" id="price"
                                    value="{{ old('mini_price') }}"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                @if ($errors->has('mini_price'))
                                    @foreach ($errors->get('mini_price') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-credits" class="col-md-2 col-form-label">Credits</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="credits" id="credits"
                                    value="{{ old('credits') }}" min="0">
                                @if ($errors->has('credits'))
                                    @foreach ($errors->get('credits') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-duration" class="col-md-2 col-form-label">Duration</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="duration" id="duration"
                                    value="{{ old('duration') }}" min="0">
                                @if ($errors->has('duration'))
                                    @foreach ($errors->get('duration') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-file" class="col-md-2 col-form-label">Image</label>
                            <div class="col-md-10" style="height: 200px">
                                <input class="form-control" type="file" name="file_image" id="input-file"
                                    accept="image/*" onchange="previewImage()" required>
                                <img id="frame" src="" alt="Preview Image" class="img-fluid h-100" />
                                <br>
                                @if ($errors->has('file_image'))
                                    @foreach ($errors->get('file_image') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Content</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="content">{{ old('content') }}</textarea>
                                @if ($errors->has('content'))
                                    @foreach ($errors->get('content') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-short-description" class="col-md-2 col-form-label">Short Description</label>
                            <div class="col-md-10">
                                <textarea id="elmDesc" name="short_description" class="form-control">{{ old('short_description') }}</textarea>
                                @if ($errors->has('short_description'))
                                    @foreach ($errors->get('short_description') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Description</label>
                            <div class="col-md-10">
                                <textarea id="elm3" name="description" class="form-control">{{ old('description') }}</textarea>
                                @if ($errors->has('description'))
                                    @foreach ($errors->get('description') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    name="status" {{ old('status') ? 'checked' : '' }}>
                                <label class="m-0">Aktif</label>
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary w-md text-center custom-btn-submit"
                                    form="courseForm">Add Course</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('script')
    <script>
        console.log(@json($errors->all()))
        // preview image
        function previewImage() {
            const input = document.getElementById('input-file');
            const frame = document.getElementById('frame');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    frame.src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(document).ready(function() {
            // autofill slug
            document.getElementById('name').addEventListener('input', function() {
                var name = this.value;
                var slug = name.toLowerCase().trim().replace(/[^a-z0-9\s-]/g, '').replace(/\s+/g, '-');
                document.getElementById('slug').value = slug;
            });

            function toggleFieldsByCourseType(value) {
                if (value == 1) { // Bootcamp
                    $("#show_course_package").show();
                    $("#show_course_mini_price").hide();
                    $("#show_course_mini_fake_price").hide();
                } else if (value == 3) { // Mini Bootcamp
                    $("#show_course_package").hide();
                    $("#show_course_mini_price").show();
                    $("#show_course_mini_fake_price").show();
                } else {
                    $("#show_course_package").hide();
                    $("#show_course_mini_price").hide();
                    $("#show_course_mini_fake_price").hide();
                }
            }

            // Saat halaman dimuat pertama kali, jalankan logika untuk menentukan tampilan awal berdasarkan nilai `type_selector`
            const initialTypeValue = $('#type_selector').val();
            toggleFieldsByCourseType(initialTypeValue);

            // Event listener saat user mengubah pilihan di select type
            $('#type_selector').on('change', function() {
                const selectedValue = $(this).val();
                toggleFieldsByCourseType(selectedValue);
            });
        });

        $(document).ready(function() {
            // Format input "Mini Bootcamp Fake Price" to Rupiah
            var fakePriceInput = document.getElementById('fake_price');
            fakePriceInput.addEventListener('keyup', function(e) {
                fakePriceInput.value = formatRupiah(this.value, 'Rp. ');
            });

            // Format input "Mini Bootcamp Price" to Rupiah
            var miniPriceInput = document.getElementById('price');
            miniPriceInput.addEventListener('keyup', function(e) {
                miniPriceInput.value = formatRupiah(this.value, 'Rp. ');
            });

            // Function to format numbers into Rupiah format
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
        });

        document.addEventListener("DOMContentLoaded", function() {
            // Initialize TinyMCE for the 'content' textarea
            if (document.getElementById("elmDesc")) {
                tinymce.init({
                    selector: "textarea#elmDesc",
                    height: 350,
                    plugins: [
                        "advlist",
                        "autolink",
                        "lists",
                        "link",
                        "image",
                        "charmap",
                        "preview",
                        "anchor",
                        "searchreplace",
                        "visualblocks",
                        "code",
                        "fullscreen",
                        "insertdatetime",
                        "media",
                        "table",
                        "help",
                        "wordcount",
                    ],
                    toolbar: "undo redo | blocks | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help",
                    content_style: 'body { font-family:"Poppins",sans-serif; font-size:16px }',
                });
            }
        });
    </script>
@endsection
