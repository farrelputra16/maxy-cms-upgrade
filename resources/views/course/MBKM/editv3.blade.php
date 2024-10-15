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
                                    value="{{ $courses->name }}">
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
                                    value="{{ $courses->slug }}">
                                @if ($errors->has('slug'))
                                    @foreach ($errors->get('slug') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
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
                            <label for="input-tag" class="col-md-2 col-form-label">MBKM Type</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="type" data-placeholder="Choose ..."
                                    id="type_selector" disabled>
                                    <option>-- Pilih Tipe Course --</option>
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
                                    value="{{ $currentDataCourse ? $currentDataCourse->fake_price : '' }}"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                @if ($errors->has('mini_fake_price'))
                                    @foreach ($errors->get('mini_fake_price') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-mini-price" class="col-md-2 col-form-label">Mini Bootcamp Price</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="mini_price" id="price"
                                    value="{{ $currentDataCourse ? $currentDataCourse->price : '' }}"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                @if ($errors->has('mini_price'))
                                    @foreach ($errors->get('mini_price') as $error)
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
                                <img id="frame" src="{{ asset('uploads/course_img/' . $courses->image) }}"
                                    alt="Preview Image" class="img-fluid h-100" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Content</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="content">{{ $courses->content }}</textarea>
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
                                <textarea id="elm1" name="short_description">{{ strip_tags($courses->short_description) }}</textarea>
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
                                <textarea id="elm1" name="description">{{ $courses->description }}</textarea>
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
                                    name="status" {{ $courses->status == 1 ? 'checked' : '' }}>
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
        document.getElementById('input-name').addEventListener('input', function() {
            var name = this.value;
            var slug = name.toLowerCase().trim().replace(/[^a-z0-9\s-]/g, '').replace(/\s+/g, '-');
            document.getElementById('input-slug').value = slug;
        });

        // preview image
        function previewImage() {
            const input = document.getElementById('input-file');
            const frame = document.getElementById('frame');

            // Check if a file is selected and it's an image
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                // Event listener for when the file is read
                reader.onload = function(e) {
                    frame.src = e.target.result; // Set the image source to the file
                }

                // Read the selected file as a Data URL (base64)
                reader.readAsDataURL(input.files[0]);
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
    </script>
@endsection
