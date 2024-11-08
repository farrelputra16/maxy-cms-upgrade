@extends('layout.main-v3')

@section('title', 'Edit MBKM')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Edit Data</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCourseMBKM') }}">MBKM</a></li>
                        <li class="breadcrumb-item active">Edit MBKM</li>
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

                    <h4 class="card-title">Edit MBKM</h4>
                    <p class="card-title-desc">This page allows you to update a data's information by modifying the data
                        listed below. Ensure that all the information you enter is accurate to provide the best learning
                        experience for the course participants.</p>

                    <form action="{{ route('postEditCourse', ['id' => request()->query('id')]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="img_keep" value="{{ $courses->image }}" hidden>

                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Name</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" id="name"
                                    value="{{ old('name', $courses->name) }}" required>
                                @if ($errors->has('name'))
                                    @foreach ($errors->get('name') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-slug" class="col-md-2 col-form-label">Slug</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="slug" id="slug"
                                    value="{{ old('slug', $courses->slug) }}" readonly required>
                                @if ($errors->has('slug'))
                                    @foreach ($errors->get('slug') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        @if (env('APP_ENV') != 'local')
                            <div class="mb-3 row">
                                <label for="input-payment" class="col-md-2 col-form-label">Payment Link</label>
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
                        @endif
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
                                        <option value="{{ $item->id }}"
                                            {{ old('level') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">MBKM Type</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="type" data-placeholder="Choose ..."
                                    id="type_selector">
                                    @if ($currentDataCourse)
                                        <option selected value="{{ $currentDataCourse->m_course_type_id }}">
                                            {{ $currentDataCourse->course_type_name }}
                                        </option>
                                    @endif
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
                                            @if (old('courseCategory') && in_array($courseCategory->id, old('courseCategory'))) selected
                                            @elseif (in_array($courseCategory->id, $selectedCategoryId))
                                                selected @endif>
                                            {{ $courseCategory->name }}
                                        </option>
                                    @endforeach
                                </select>
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
                            <label for="input-content" class="col-md-2 col-form-label">Content</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="content">{{ old('content', $courses->content) }}</textarea>
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
                                <textarea id="elm2" name="description" class="form-control">{{ old('description', $courses->description) }}</textarea>
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
                                <!-- Hidden input untuk mengirim nilai 0 jika checkbox tidak dicentang -->
                                <input type="hidden" name="status" value="0">

                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    value="1" name="status"
                                    {{ old('status', isset($courses) ? $courses->status : false) ? 'checked' : '' }}>
                                <label class="m-0">Aktif</label>
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
        document.getElementById('name').addEventListener('input', function() {
            var name = this.value;
            var slug = name.toLowerCase().trim().replace(/[^a-z0-9\s-]/g, '').replace(/\s+/g, '-');
            document.getElementById('slug').value = slug;
        });

        // preview image
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
