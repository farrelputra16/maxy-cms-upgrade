@extends('layout.main-v3')

@section('title', isset($course) ? 'Edit Course' : 'Add New Course')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">{{ isset($course) ? 'Edit Course' : 'Add New Course' }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCourse') }}">Course</a></li>
                        <li class="breadcrumb-item active">
                            {{ isset($course) ? 'Edit Course: ' . $course->name : 'Add New Course' }}</li>
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
                    <h4 class="card-title">
                        {{ isset($course) ? $course->name . ' <small>[ ID: ' . $course->id . ' ]</small>' : 'Add New Course' }}
                    </h4>
                    <p class="card-title-desc">
                        This page is used to manage courses, to its modules and submodules.
                    </p>

                    <form
                        action="{{ isset($course) ? route('postEditCourse', ['id' => $course->id]) : route('postAddCourse') }}"
                        method="post" enctype="multipart/form-data">
                        @csrf

                        <hr>
                        <strong class="text-secondary">GENERAL DATA</strong>

                        <!-- start course name -->
                        <div class="my-3 row">
                            <label for="name" class="col-md-2 col-form-label">
                                Course Name <span class="text-danger" data-bs-toggle="tooltip" title="Required">*</span>
                            </label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" id="name"
                                    value="{{ old('name', isset($course) ? $course->name : '') }}"
                                    placeholder="Enter the name of the course..." required>
                                @if ($errors->has('name'))
                                    @foreach ($errors->get('name') as $error)
                                        <span class="text-danger">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- end course name -->

                        <!-- start slug -->
                        <div class="mb-3 row">
                            <label for="slug" class="col-md-2 col-form-label">
                                Slug <span class="text-danger" data-bs-toggle="tooltip" title="Required">*</span>
                            </label>
                            <div class="col-md-10">
                                <input class="form-control bg-light" type="text" name="slug" id="slug"
                                    value="{{ old('slug', isset($course) ? $course->slug : '') }}" readonly
                                    style="cursor: not-allowed;"
                                    placeholder="This field will be filled automatically as you type the course name">
                                @if ($errors->has('slug'))
                                    @foreach ($errors->get('slug') as $error)
                                        <span class="text-danger">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- end slug -->

                        <!-- start course type -->
                        <div class="mb-3 row">
                            <label for="type" class="col-md-2 col-form-label">
                                Course Type <span class="text-danger" data-bs-toggle="tooltip" title="Required">*</span>
                            </label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="type" id="type_selector"
                                    data-placeholder="Choose Course Type..." required>
                                    @foreach ($allCourseTypes as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('type', isset($course) ? $course->m_course_type_id : '') == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('type'))
                                    @foreach ($errors->get('type') as $error)
                                        <span class="text-danger">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- end course type -->

                        <!-- start difficulty level -->
                        <div class="mb-3 row">
                            <label for="level" class="col-md-2 col-form-label">
                                Difficulty <span class="text-danger" data-bs-toggle="tooltip" title="Required">*</span>
                            </label>
                            <div class="col-md-10">
                                <select class="form-control select2" id="level" name="level"
                                    data-placeholder="Choose Difficulty ...">
                                    @foreach ($allDifficultyTypes as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('level', isset($course) ? $course->m_difficulty_type_id : '') == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('level'))
                                    @foreach ($errors->get('level') as $error)
                                        <span class="text-danger">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- end difficulty level -->

                        <!-- start category -->
                        <div class="mb-3 row">
                            <label for="courseCategory" class="col-md-2 col-form-label">
                                Category <span class="text-danger" data-bs-toggle="tooltip" title="Required">*</span>
                            </label>
                            <div class="col-md-10">
                                <select class="form-control select2 multiple" name="courseCategory[]"
                                    data-placeholder="Pilih ..." multiple="multiple">
                                    @foreach ($allCourseCategory as $courseCategory)
                                        <option value="{{ $courseCategory->id }}"
                                            {{ in_array($courseCategory->id, old('courseCategory', isset($course) ? $selectedCategoryId : [])) ? 'selected' : '' }}>
                                            {{ $courseCategory->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('courseCategory'))
                                    @foreach ($errors->get('courseCategory') as $error)
                                        <span class="text-danger">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- end category -->

                        <!-- start durasi pembelajaran -->
                        <div class="mb-3 row">
                            <label for="credits" class="col-md-2 col-form-label">
                                Lesson Duration <small>(Lesson Hour)</small> <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Required">*</span>
                            </label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="credits" id="credits"
                                    value="{{ old('credits', isset($course) ? $course->credits : '') }}" min="0">
                                @if ($errors->has('credits'))
                                    @foreach ($errors->get('credits') as $error)
                                        <span class="text-danger">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- end durasi pembelajaran -->

                        <!-- start cover image -->
                        <div class="mb-3 row">
                            <label for="file_image" class="col-md-2 col-form-label">
                                Course Cover Image <span class="text-danger" data-bs-toggle="tooltip"
                                    title="Required">*</span>
                            </label>
                            <div class="col-md-10">
                                <!-- File Input -->
                                <input class="form-control" type="file" name="file_image" id="input-file"
                                    accept="image/*" onchange="previewImage()">

                                <div class="position-relative mt-3" style="height: 200px;">
                                    <!-- Current Image (from database) -->
                                    @if (isset($course) && $course->image)
                                        <img id="current-image" src="{{ asset('uploads/course_img/' . $course->image) }}"
                                            class="img-fluid h-100 w-auto position-absolute top-0 start-0"
                                            alt="Current Image" />
                                    @endif

                                    <!-- Preview Image (newly selected) -->
                                    <img id="preview-image" src="#"
                                        class="img-fluid h-100 w-auto position-absolute top-0 start-0 d-none"
                                        alt="New Image" />

                                    <!-- Error Messages -->
                                    @if ($errors->has('file_image'))
                                        @foreach ($errors->get('file_image') as $error)
                                            <span class="text-danger">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- end cover image -->

                        <!-- start preview text -->
                        <div class="mb-3 row">
                            <label for="short_description" class="col-md-2 col-form-label">
                                Preview Text <span class="text-danger" data-bs-toggle="tooltip" title="Required">*</span>
                            </label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="short_description" class="form-control">{{ old('short_description', isset($course) ? $course->short_description : '') }}</textarea>
                                @if ($errors->has('short_description'))
                                    @foreach ($errors->get('short_description') as $error)
                                        <span class="text-danger">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- end preview text -->

                        <!-- start content -->
                        <div class="mb-3 row">
                            <label for="content" class="col-md-2 col-form-label">
                                Content Text <small>(full)</small> <span class="text-danger" data-bs-toggle="tooltip"
                                    title="Required">*</span>
                            </label>
                            <div class="col-md-10">
                                <textarea id="elm2" name="content">{{ old('content', isset($course) ? $course->content : '') }}</textarea>
                                @if ($errors->has('content'))
                                    @foreach ($errors->get('content') as $error)
                                        <span class="text-danger">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- end content -->

                        <!-- start payment section -->
                        <hr>
                        <div id="payment-section">
                            <strong class="text-secondary">PAYMENT</strong> <small
                                class="text-secondary">(OPTIONAL)</small>
                            <!-- start payment link // soon to be removed, replaced with xendit create payment link -->
                            <div class="mt-3 mb-3 row">
                                <label for="payment_link" class="col-md-2 col-form-label">
                                    Payment Link
                                </label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="payment_link" id="payment_link"
                                        value="{{ old('payment_link', isset($course) ? $course->payment_link : '') }}">
                                    @if ($errors->has('payment_link'))
                                        @foreach ($errors->get('payment_link') as $error)
                                            <span class="text-danger">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <!-- end payment link -->

                            <!-- start price -->
                            <div id="show_course_mini_fake_price" class="mb-3 row">
                                <label for="fake_price" class="col-md-2 col-form-label">
                                    Price
                                </label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="mini_fake_price" id="fake_price"
                                        value="{{ old('mini_fake_price', isset($course) ? $course->fake_price : '') }}">
                                    @if ($errors->has('mini_fake_price'))
                                        @foreach ($errors->get('mini_fake_price') as $error)
                                            <span class="text-danger">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <!-- end price -->

                            <!-- start discounted price -->
                            <div id="show_course_mini_price" class="mb-3 row">
                                <label for="price" class="col-md-2 col-form-label">
                                    Discounted Price
                                </label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="mini_price" id="price"
                                        value="{{ old('mini_price', isset($course) ? $course->price : '') }}">
                                    @if ($errors->has('mini_price'))
                                        @foreach ($errors->get('mini_price') as $error)
                                            <span class="text-danger">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <!-- end discounted price -->
                        </div>
                        <hr>
                        <!-- end payment section -->

                        <strong class="text-secondary">FOOTER DATA</strong>

                        <!-- start description (admin notes) -->
                        <div class="my-3 row">
                            <label for="input-description" class="col-md-2 col-form-label">Admin Notes</label>
                            <div class="col-md-10">
                                <input type="text" id="input-description" name="description" class="form-control"
                                    placeholder="This note won't be shown to the students. Only admins or mentors can see it"
                                    value="{{ old('description', isset($course) ? $course->description : '') }}">
                                @if ($errors->has('description'))
                                    @foreach ($errors->get('description') as $error)
                                        <span class="text-danger">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- end admin notes -->

                        <!-- start status -->
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <input type="hidden" name="status" value="0">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    name="status" value="1"
                                    {{ old('status', isset($course) ? $course->status : false) ? 'checked' : '' }}>
                                <span>
                                    <i class="far fa-question-circle" data-bs-toggle="tooltip"
                                        title="Turn this OFF to archive the data instead of publishing it"></i>
                                </span>
                            </div>
                        </div>
                        <!-- end status -->

                        <!-- start submit button -->
                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit"
                                    class="btn maxy-btn-secondary w-md text-center">{{ isset($course) ? 'Save' : 'Add New Course' }}</button>
                            </div>
                        </div>
                        <!-- end submit button -->

                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('script')
    <script>
        // Function to restrict special characters
        function restrictSpecialChars(event) {
            const regex = /^[a-zA-Z0-9\s]*$/; // Allows letters, numbers, and spaces only
            const input = event.target;
            const value = input.value;

            if (!regex.test(value)) {
                input.value = value.replace(/[^a-zA-Z0-9\s]/g, ''); // Remove invalid characters
            }
        }

        // Attach event listeners to input fields
        document.getElementById('name').addEventListener('input', restrictSpecialChars);

        // Auto-generate Slug
        document.getElementById('name').addEventListener('input', function() {
            const name = this.value;
            const slug = name.toLowerCase().trim().replace(/[^a-z0-9\s-]/g, '').replace(/\s+/g, '-');
            document.getElementById('slug').value = slug;
        });

        // Preview Image
        function previewImage() {
            const input = document.getElementById('input-file');
            const currentImage = document.getElementById('current-image');
            const previewImage = document.getElementById('preview-image');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Hide the current image (from database) if it exists
                    if (currentImage) {
                        currentImage.classList.add('d-none');
                    }

                    // Show the preview image and set its source
                    previewImage.classList.remove('d-none');
                    previewImage.src = e.target.result;

                    // Ensure the image maintains aspect ratio and fits within the fixed height
                    previewImage.onload = function() {
                        const aspectRatio = previewImage.naturalWidth / previewImage.naturalHeight;
                        const containerHeight = 200; // Fixed height of the container
                        const calculatedWidth = containerHeight * aspectRatio;

                        previewImage.style.width = `${calculatedWidth}px`;
                    };
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                if (currentImage) {
                    currentImage.classList.remove('d-none');
                }
                previewImage.classList.add('d-none');
            }
        }

        // Currency Formatter
        $(document).ready(function() {
            const formatRupiah = (angka, prefix) => {
                const number_string = angka.replace(/[^,\d]/g, '').toString();
                const split = number_string.split(',');
                let rupiah = split[0].replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                return prefix ? 'Rp. ' + rupiah : rupiah;
            };

            $('#fake_price, #price').on('keyup', function() {
                this.value = formatRupiah(this.value, 'Rp. ');
            });
        });
    </script>
@endsection
