@extends('layout.main-v3')

@section('title', 'Edit Course')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Edit Data</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCourse') }}">Course</a></li>
                        <li class="breadcrumb-item active">Edit Course: {{ $courses->name }}</li>
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

                    <h4 class="card-title">{{ $courses->name }} <small>[ ID: {{ $courses->id }} ]</small></h4>
                    <p class="card-title-desc">This page allows you to update a data's information by modifying the data
                        listed below. Ensure that all the information you enter is accurate to provide the best learning
                        experience for the course participants.</p>

                    <form action="{{ route('postEditCourse', ['id' => request()->query('id')]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="img_keep" value="{{ $courses->file_image }}" hidden>

                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Name Course</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name"
                                    value="{{ old('name', $courses->name) }}" id="name">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-slug" class="col-md-2 col-form-label">Slug</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="slug"
                                    value="{{ old('slug', $courses->slug) }}" id="slug" readonly>
                            </div>
                        </div>
                        @if (env('APP_ENV') != 'local')
                            <div class="mb-3 row">
                                <label for="input-content" class="col-md-2 col-form-label">Payment</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="payment_link" id="payment_link"
                                        value="{{ old('payment_link', $courses->payment_link) }}">
                                    @if ($errors->has('payment_link'))
                                        @foreach ($errors->get('payment_link') as $error)
                                            <span style="color: red;">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        @endif
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Difficulty</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="level" data-placeholder="Choose ...">
                                    @if ($currentDataCourse)
                                        <option selected value="{{ $currentDataCourse->m_difficulty_type_id }}">
                                            {{ $currentDataCourse->course_difficulty }}
                                        </option>
                                    @endif
                                    @foreach ($allDifficultyTypes as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('level') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Course Type</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="type" id="type_selector"
                                    data-placeholder="Choose ...">
                                    @if ($currentDataCourse)
                                        <option selected value="{{ $currentDataCourse->m_course_type_id }}">
                                            {{ $currentDataCourse->course_type_name }}
                                        </option>
                                    @endif
                                    @foreach ($allCourseTypes as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('type') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Course Category</label>
                            <div class="col-md-10">
                                <select class="form-control select2 multiple" name="courseCategory[]"
                                    data-placeholder="Choose ..." id="course_category_selector" multiple="multiple">
                                    @foreach ($allCourseCategory as $courseCategory)
                                        <option value="{{ $courseCategory->id }}"
                                            @if (old('courseCategory') && in_array($courseCategory->id, old('courseCategory'))) selected
                                            @elseif (in_array($courseCategory->id, $selectedCategoryId))
                                                selected @endif>
                                            {{ $courseCategory->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div id="show_course_package" class="mb-3 row">
                            <label for="input-package" class="col-md-2 col-form-label">Package</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="package" data-placeholder="Choose ...">
                                    <option value="" disabled
                                        {{ old('package', $currentCoursePackages ? '' : 'selected') }}>Pilih Paket</option>
                                    @if ($currentCoursePackages)
                                        <option value="{{ $currentCoursePackages->course_package_id }}"
                                            {{ old('package', $currentCoursePackages->course_package_id) == $currentCoursePackages->course_package_id ? 'selected' : '' }}>
                                            {{ $currentCoursePackages->course_package_name }} - Rp.
                                            {{ $currentCoursePackages->course_package_price }}
                                        </option>
                                    @endif
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
                                    value="{{ old('mini_fake_price', $currentDataCourse ? $currentDataCourse->fake_price : '') }}">
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
                                    value="{{ old('mini_price', $currentDataCourse ? $currentDataCourse->price : '') }}">
                                @if ($errors->has('mini_price'))
                                    @foreach ($errors->get('mini_price') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-credits" class="col-md-2 col-form-label">Credits<small>(sks)</small></label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="credits" id="credits"
                                    value="{{ old('credits', $currentDataCourse ? $currentDataCourse->credits : '') }}"
                                    min="0">
                                @if ($errors->has('credits'))
                                    @foreach ($errors->get('credits') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-duration" class="col-md-2 col-form-label">Duration<small>(in minute)</small></label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="duration" id="duration"
                                    value="{{ old('duration', $currentDataCourse ? $currentDataCourse->duration : '') }}"
                                    min="0">
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
                                    accept="image/*" onchange="previewImage()">

                                <!-- Image pertama untuk gambar yang ada -->
                                <img id="current-image" src="{{ asset('uploads/course_img/' . $courses->image) }}"
                                    class="img-fluid h-100" alt="Current Image" />

                                <!-- Image kedua untuk preview gambar baru yang diunggah -->
                                <img id="preview-image" src="#" class="img-fluid h-100" alt="New Image"
                                    style="display: none;" />

                                @if ($errors->has('file_image'))
                                    @foreach ($errors->get('file_image') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Content<small>(isi)</small></label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="content">{{ old('content', $courses->content) }}</textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-short-description" class="col-md-2 col-form-label">Short Description</label>
                            <div class="col-md-10">
                                <textarea id="elmDesc" name="short_description">{{ old('short_description', $courses->short_description) }}</textarea>
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
                                <textarea id="elm3" name="description" class="form-control">{{ old('description', $courses->description) }}</textarea>
                            </div>
                        </div>
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <!-- Hidden input untuk mengirim nilai 0 jika checkbox tidak dicentang -->
                                <input type="hidden" name="status" value="0">

                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    value="1" name="status"
                                    {{ old('status', isset($courses) ? $courses->status : false) ? 'checked' : '' }}>
                                <label>Aktif</label>
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary w-md text-center">Save & Update</button>
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
        function previewImage() {
            const input = document.getElementById('input-file');
            const currentImage = document.getElementById('current-image');
            const previewImage = document.getElementById('preview-image');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    // Menyembunyikan gambar pertama dan menampilkan gambar preview
                    currentImage.style.display = "none";
                    previewImage.style.display = "block";
                    previewImage.src = e.target.result;
                }

                reader.readAsDataURL(input.files[0]);
            } else {
                // Jika tidak ada file yang dipilih, kembali ke gambar pertama
                currentImage.style.display = "block";
                previewImage.style.display = "none";
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
            // Format input "Mini Bootcamp Fake Price" to Rupiah on load and when typing
            var fakePriceInput = document.getElementById('fake_price');
            if (fakePriceInput.value) {
                fakePriceInput.value = formatRupiah(fakePriceInput.value, 'Rp. '); // Format when page loads
            }
            fakePriceInput.addEventListener('keyup', function(e) {
                fakePriceInput.value = formatRupiah(this.value, 'Rp. ');
            });

            // Format input "Mini Bootcamp Price" to Rupiah on load and when typing
            var miniPriceInput = document.getElementById('price');
            if (miniPriceInput.value) {
                miniPriceInput.value = formatRupiah(miniPriceInput.value, 'Rp. '); // Format when page loads
            }
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
