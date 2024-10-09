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
                            <label for="input-name" class="col-md-2 col-form-label">Name</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" value="{{ $courses->name }}"
                                    id="name">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-slug" class="col-md-2 col-form-label">Slug</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="slug" value="{{ $courses->slug }}"
                                    id="slug" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Payment</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="payment_link" id="payment_link"
                                    value="{{ $courses->payment_link }}">
                                @if ($errors->has('payment_link'))
                                    @foreach ($errors->get('payment_link') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Difficulty</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="level" data-placeholder="Choose ...">
                                    {{-- <option>Select</option> --}}
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
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Package</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="package" data-placeholder="Choose ...">
                                    {{-- <option>Select</option> --}}
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
                        </div>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Course Type</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="type" id="type_selector"
                                    data-placeholder="Choose ...">
                                    {{-- <option>Select</option> --}}
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
                        </div>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Course Category</label>
                            <div class="col-md-10">
                                <select class="form-control select2 multiple" name="courseCategory[]"
                                    data-placeholder="Choose ..." id="type_selector" multiple="multiple">
                                    @foreach ($allCourseCategory as $courseCategory)
                                        <option value="{{ $courseCategory->id }}"
                                            @if ($selectedCategoryId->contains('category_id', $courseCategory->id)) selected @endif>{{ $courseCategory->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-mini-fake-price" class="col-md-2 col-form-label">Mini Bootcamp Fake
                                Price</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="mini_fake_price" id="fake_price"
                                    value="{{ $currentDataCourse ? $currentDataCourse->fake_price : '' }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-mini-price" class="col-md-2 col-form-label">Mini Bootcamp Price</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="mini_price" id="price"
                                    value="{{ $currentDataCourse ? $currentDataCourse->price : '' }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-credits" class="col-md-2 col-form-label">Credits</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="credits" id="credits"
                                    value="{{ $currentDataCourse ? $currentDataCourse->credits : '' }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-duration" class="col-md-2 col-form-label">Duration</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="duration" id="duration"
                                    value="{{ $currentDataCourse ? $currentDataCourse->duration : '' }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-file" class="col-md-2 col-form-label">Image</label>
                            <div class="col-md-10" style="height: 200px">
                                <input class="form-control" type="file" name="file_image" id="input-file"
                                    accept="image/*" onchange="previewImage()">
                                <img id="frame"
                                    src="{{ asset('uploads/course_img/' . $courses->slug . '/' . $courses->image) }}"
                                    class="img-fluid h-100" alt="Current Image" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Content</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="content">{{ $courses->content }}</textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-short-description" class="col-md-2 col-form-label">Short Description</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="short_description">{{ strip_tags($courses->short_description) }}</textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Description</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="description">{{ $courses->description }}</textarea>
                            </div>
                        </div>
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    value="1" {{ $courses->status == 1 ? 'checked' : '' }} name="status">
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
        // autofill slug
        document.getElementById('input-name').addEventListener('input', function() {
            var name = this.value;
            var slug = name.toLowerCase().trim().replace(/[^a-z0-9\s-]/g, '').replace(/\s+/g, '-');
            document.getElementById('input-slug').value = slug;
        });

        function previewImage() {
            const input = document.getElementById('input-file');
            const frame = document.getElementById('frame');

            // Check if a file is selected and it's an image
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                // Event listener for when the file is read
                reader.onload = function(e) {
                    frame.src = e.target.result; // Set the image source to the new selected file
                }

                // Read the selected file as a Data URL (base64)
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });

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
