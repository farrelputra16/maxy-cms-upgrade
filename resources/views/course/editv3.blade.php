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
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                                            @if ($selectedCategoryId->contains('category_id', $courseCategory->id)) selected @endif>{{ $courseCategory->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div id="show_course_package" class="mb-3 row">
                            <label for="input-package" class="col-md-2 col-form-label">Package</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="package" data-placeholder="Choose ...">
                                    @if ($currentCoursePackages)
                                        <option selected value="{{ $currentCoursePackages->course_package_id }}">
                                            {{ $currentCoursePackages->course_package_name }} - Rp.
                                            {{ $currentCoursePackages->course_package_price }}
                                        </option>
                                    @else
                                        <option selected value="">Tidak ada paket yang dipilih</option>
                                    @endif
                                    @foreach ($allCoursePackages as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }} - Rp. {{ $item->price }}
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
                                    value="{{ $currentDataCourse ? $currentDataCourse->fake_price : '' }}">
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
                                    value="{{ $currentDataCourse ? $currentDataCourse->price : '' }}">
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
                                    value="{{ $currentDataCourse ? $currentDataCourse->credits : '' }}">
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
                                    value="{{ $currentDataCourse ? $currentDataCourse->duration : '' }}">
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
        $(document).ready(function() {
            // autofill slug
            document.getElementById('name').addEventListener('input', function() {
                var name = this.value;
                var slug = name.toLowerCase().trim().replace(/[^a-z0-9\s-]/g, '').replace(/\s+/g, '-');
                document.getElementById('slug').value = slug;
            });

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
    </script>
@endsection
