@extends('layout.main-v3')

@section('title', isset($data) ? 'Edit Class' : 'Add New Class')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">{{ isset($data) ? 'Edit Class' : 'Add New Class' }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Class</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCourse') }}">Class List</a></li>
                        <li class="breadcrumb-item active">
                            {{ isset($data) ? 'Edit Class: ' . $data->course_name . ' Batch ' . $data->batch : 'Add New Class' }}
                        </li>
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
                        @if (isset($data))
                            {{ $data->course_name }} Batch {{ $data->batch }} <small>[ #{{ $data->id }} ]</small>
                        @else
                            Add New Class
                        @endif
                    </h4>
                    <p class="card-title-desc">
                        This page is used to manage a class. Adjust the class information accordingly.
                    </p>

                    <form
                        action="{{ isset($data) ? route('postEditCourseClass', ['id' => $data->id]) : route('postAddCourseClass') }}"
                        method="post" enctype="multipart/form-data">
                        @csrf

                        <hr>
                        <strong class="text-secondary">GENERAL DATA</strong>

                        <!-- Start Course Name -->
                        <div class="mb-3 row">
                            <label for="course" class="col-md-2 col-form-label">
                                Course <span class="text-danger" data-bs-toggle="tooltip" title="Required">*</span></label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="course" id="course"
                                    {{ isset($data) ? 'disabled' : '' }}>
                                    @if (isset($data))
                                        <option selected>
                                            {{ $data->course_name }}
                                        </option>
                                    @else
                                        @foreach ($courseList as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('course') == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                                @if ($errors->has('course'))
                                    @foreach ($errors->get('course') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- End Course Name -->

                        <!-- Start Batch -->
                        <div class="mb-3 row">
                            <label for="batch" class="col-md-2 col-form-label">
                                Batch <span class="text-danger" data-bs-toggle="tooltip" title="Required">*</span>
                            </label>

                            <div class="col-md-10">
                                <input class="form-control" type="text" name="batch"
                                    value="{{ old('batch', isset($data) ? $data->batch : '') }}" id="batch">
                                @if ($errors->has('batch'))
                                    @foreach ($errors->get('batch') as $error)
                                        <span class="text-danger">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- End Batch -->

                        <!-- Start Slug -->
                        <div class="mb-3 row">
                            <label for="slug" class="col-md-2 col-form-label">
                                Slug <span class="text-danger" data-bs-toggle="tooltip" title="Required">*</span>
                            </label>
                            <div class="col-md-10">
                                <input class="form-control bg-light" type="text" name="slug" id="slug"
                                    value="{{ old('slug', isset($data) ? $data->slug : '') }}" readonly
                                    style="cursor: not-allowed;"
                                    placeholder="This field will be filled automatically as you type the batch of the class">
                                @if ($errors->has('slug'))
                                    @foreach ($errors->get('slug') as $error)
                                        <span class="text-danger">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- End Slug -->

                        <!-- Start Quota -->
                        <div class="mb-3 row">
                            <label for="quota" class="col-md-2 col-form-label">
                                Quota <span class="text-danger" data-bs-toggle="tooltip" title="Required">*</span>
                            </label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="quota"
                                    value="{{ old('quota', isset($data) ? $data->quota : '') }}" id="quota"
                                    min="1">
                                @if ($errors->has('quota'))
                                    @foreach ($errors->get('quota') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- End Quota -->

                        <!-- Start Start Date -->
                        <div class="mb-3 row">
                            <label for="start" class="col-md-2 col-form-label">
                                Start Date
                            </label>
                            <div class="col-md-10">
                                <input class="form-control" type="date" name="start"
                                    value="{{ old('start', isset($data) ? $data->start_date : '') }}" id="start">
                                @if ($errors->has('start_date'))
                                    @foreach ($errors->get('start_date') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- End Start Date -->

                        <!-- Start End Date -->
                        <div class="mb-3 row">
                            <label for="end" class="col-md-2 col-form-label">
                                End Date
                            </label>
                            <div class="col-md-10">
                                <input class="form-control" type="date" name="end"
                                    value="{{ old('end', isset($data) ? $data->end_date : '') }}" id="end">
                                @if ($errors->has('end_date'))
                                    @foreach ($errors->get('end_date') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- End End Date -->

                        <!-- Start Learning Type -->
                        <div class="mb-3 row">
                            <label for="classTypeId" class="col-md-2 col-form-label">
                                Learning Type <span class="text-danger" data-bs-toggle="tooltip"
                                    title="Required">*</span></label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="classTypeId" id="classTypeId"
                                    data-placeholder="Choose The Class Learning Type...">
                                    @foreach ($classTypeList as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('classTypeId') == $item->id ? 'selected' : (isset($data) && $data->m_class_type_id == $item->id ? 'selected' : '') }}>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('classTypeId'))
                                    @foreach ($errors->get('classTypeId') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- End Learning Type -->

                        <!-- Start Recommended Semester-->
                        <div class="mb-3 row">
                            <label for="semester" class="col-md-2 col-form-label">
                                Recommended Semester
                            </label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="semester"
                                    value="{{ old('semester', isset($data) ? $data->semester : '') }}" id="semester">
                                @if ($errors->has('semester'))
                                    @foreach ($errors->get('semester') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- End Recommended Semester-->

                        <!-- Start Credits-->
                        <div class="mb-3 row">
                            <label for="credits" class="col-md-2 col-form-label">
                                Convertion Credits <small>(SKS)</small>
                            </label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="credits"
                                    value="{{ old('credits', isset($data) ? $data->credits : '') }}" id="credits">
                                @if ($errors->has('credits'))
                                    @foreach ($errors->get('credits') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- End Credits-->

                        <!-- Start Learning Duration -->
                        <div class="mb-3 row">
                            <label for="duration" class="col-md-2 col-form-label">
                                Duration <small>(in minutes)</small>
                            </label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="duration"
                                    value="{{ old('duration', isset($data) ? $data->duration : '') }}" id="duration">
                                @if ($errors->has('duration'))
                                    @foreach ($errors->get('duration') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- End Learning Duration -->

                        <!-- Start Announcement -->
                        <div class="mb-3 row">
                            <label for="announcement-editor" class="col-md-2 col-form-label">
                                Announcement
                            </label>
                            <div class="col-md-10">
                                <textarea id="announcement-editor" name="announcement" class="form-control">{{ old('announcement', isset($data) ? $data->announcement : '') }}</textarea>
                                @if ($errors->has('announcement'))
                                    @foreach ($errors->get('announcement') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- End Announcement -->

                        <!-- End Content -->
                        <div class="mb-3 row">
                            <label for="content-editor" class="col-md-2 col-form-label">
                                Class Description
                            </label>
                            <div class="col-md-10">
                                <textarea id="content-editor" name="content" class="form-control">{{ old('content', isset($data) ? $data->content : '') }}</textarea>
                                @if ($errors->has('content'))
                                    @foreach ($errors->get('content') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- End Content -->

                        <!-- Start Ongoing Status -->
                        <div class="mb-3 row">
                            <label for="ongoing" class="col-md-2 col-form-label">
                                Class Ongoing Status <span class="text-danger" data-bs-toggle="tooltip"
                                    title="Wajib diisi">*</span>
                            </label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="ongoing" id="ongoing"
                                    data-placeholder="Choose current class's ongoing status">
                                    <option value="" disabled selected>Select a status...</option>
                                    <option value="0"
                                        {{ old('ongoing') == '0' ? 'selected' : ($data->status_ongoing == 0 ? 'selected' : '') }}>
                                        Planning
                                    </option>
                                    <option value="1"
                                        {{ old('ongoing') == '1' ? 'selected' : ($data->status_ongoing == 1 ? 'selected' : '') }}>
                                        Ongoing
                                    </option>
                                    <option value="2"
                                        {{ old('ongoing') == '2' ? 'selected' : ($data->status_ongoing == 2 ? 'selected' : '') }}>
                                        Completed
                                    </option>
                                </select>
                                @error('ongoing')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- End Ongoing Status -->

                        <hr>
                        <strong class="text-secondary">AUTO CERTIFICATE CONFIGURATION</strong>

                        <!-- Start Autocert Status -->
                        <div class="row form-switch form-switch-md my-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="autocert">Auto Certificate</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <input type="hidden" name="autocert" value="0">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="autocert" name="autocert"
                                    value="1"
                                    {{ old('autocert', isset($data) ? $data->autocert : false) ? 'checked' : '' }}>
                                <span>
                                    <i class="far fa-question-circle" data-bs-toggle="tooltip"
                                        title="Turn this OFF to disable granting students certificate automatically on class completion"></i>
                                </span>
                            </div>
                        </div>
                        <!-- End Autocert Status -->

                        <!-- Start Additional Fields (Initially Hidden) -->
                        <div id="autocert-fields" style="display: none;">
                            <!-- Congratulatory Message Field -->
                            <div class="mb-3 row">
                                <label for="congratulatory_message" class="col-md-2 col-form-label">
                                    Congratulatory Message
                                    <span class="text-danger" data-bs-toggle="tooltip" title="Required">*</span>
                                </label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" id="congratulatory_message"
                                        name="congratulatory_message"
                                        value="{{ old('congratulatory_message', isset($data) ? $data->certificate_congratulatory_message : '') }}"
                                        placeholder="Enter a congratulatory message for the certificate">
                                    @if ($errors->has('congratulatory_message'))
                                        @foreach ($errors->get('congratulatory_message') as $error)
                                            <span style="color: red;">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <!-- Expiration Date Configuration -->
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">
                                    Expiration Date
                                    <span class="text-danger" data-bs-toggle="tooltip" title="Required">*</span>
                                </label>
                                <div class="col-md-10">

                                    <!-- Radio Buttons for Expiration Options -->
                                    <div class="d-flex justify-content-between w-50">

                                        <!-- Start Option 1: Specific Date -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="expiration_type"
                                                id="expiration_date_option" value="specific_date" checked>
                                            <label class="form-check-label" for="expiration_date_option">
                                                On a Specific Date
                                            </label>
                                        </div>
                                        <!-- End Option 1: Specific Date -->

                                        <!-- Start Option 2: After X Months -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="expiration_type"
                                                id="expiration_months_option" value="after_months">
                                            <label class="form-check-label" for="expiration_months_option">
                                                After X Months
                                            </label>
                                        </div>
                                        <!-- End Option 2: After X Months -->

                                        <!-- Start Option 3: Never -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="expiration_type"
                                                id="never_expired_option" value="never_expired">
                                            <label class="form-check-label" for="never_expired_option">
                                                Never
                                            </label>
                                        </div>
                                        <!-- End Option 3: Never -->

                                    </div>

                                    <!-- Specific Date Input -->
                                    <div id="specific_date_field" class="mt-2">
                                        <input class="form-control" type="date" id="specific_date_field"
                                            name="certificate_expired_date"
                                            value="{{ old('certificate_expired_date', isset($data) ? $data->certificate_expired_date : '') }}">
                                        @if ($errors->has('certificate_expired_date'))
                                            @foreach ($errors->get('certificate_expired_date') as $error)
                                                <span style="color: red;">{{ $error }}</span>
                                            @endforeach
                                        @endif
                                    </div>

                                    <!-- Months Input -->
                                    <div id="months_field" class="mt-2" style="display: none;">
                                        <input class="form-control" type="number" id="months"
                                            name="certificate_expired_after" min="1"
                                            value="{{ old('certificate_expired_after', isset($data) ? $data->certificate_expired_after : '') }}"
                                            placeholder="Enter number of months">
                                        @if ($errors->has('certificate_expired_after'))
                                            @foreach ($errors->get('certificate_expired_after') as $error)
                                                <span style="color: red;">{{ $error }}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Additional Fields -->

                        <hr>
                        <strong class="text-secondary">FOOTER DATA</strong>

                        <!-- Start Admin Notes -->
                        <div class="my-3 row">
                            <label for="admin-note" class="col-md-2 col-form-label">Admin Notes</label>
                            <div class="col-md-10">
                                <input type="text" id="admin-note" name="description" class="form-control"
                                    placeholder="This note won't be shown to the students. Only admins or mentors can see it"
                                    value="{{ old('description', isset($data) ? $data->description : '') }}">
                                @if ($errors->has('description'))
                                    @foreach ($errors->get('description') as $error)
                                        <span class="text-danger">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- End Admin Notes -->


                        <!-- Start Status -->
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <input type="hidden" name="status" value="0">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    name="status" value="1"
                                    {{ old('status', isset($data) ? $data->status : false) ? 'checked' : '' }}>
                                <span>
                                    <i class="far fa-question-circle" data-bs-toggle="tooltip"
                                        title="Turn this OFF to archive the data instead of publishing it"></i>
                                </span>
                            </div>
                        </div>
                        <!-- End Status -->

                        <!-- start submit button -->
                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit"
                                    class="btn maxy-btn-secondary w-md text-center">{{ isset($data) ? 'Save' : 'Add New Class' }}</button>
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
        // Function to restrict harmful special characters
        function restrictSpecialChars(event) {
            // Define a regex that allows letters, numbers, spaces, and name-friendly special characters
            const regex = /^[a-zA-Z0-9\s\-\/&.'’]+$/; // Allows letters, numbers, spaces, -, /, &, ., ', and ’

            const input = event.target;
            const value = input.value;

            if (!regex.test(value)) {
                // Remove invalid characters from the input
                input.value = value.replace(/[^a-zA-Z0-9\s\-\/&.'’]/g, '');
            }
        }

        // Attach event listeners to input fields
        // document.getElementById('name').addEventListener('input', restrictSpecialChars);
    </script>

    <script id="auto-slug">
        // Attach event listeners
        document.addEventListener('DOMContentLoaded', () => {
            // Listen for changes in the batch input
            document.getElementById('batch').addEventListener('input', updateSlug);

            // Listen for changes in the course dropdown
            document.getElementById('course').addEventListener('change', updateSlug);

            // Trigger the initial update on page load (if data exists)
            updateSlug();

            // Utility function to generate a slug
            function generateSlug(name, batch) {
                // Format the course name: lowercase, remove special characters, replace spaces with hyphens
                const formattedName = name
                    .toLowerCase()
                    .trim()
                    .replace(/[^a-z0-9\s-]/g, '') // Remove invalid characters
                    .replace(/\s+/g, '-'); // Replace spaces with hyphens

                // Combine the formatted name and batch
                return `${formattedName}-${batch.toLowerCase().trim()}`;
            }

            // Function to update the slug field
            function updateSlug() {
                // Get the selected course name
                const courseDropdown = document.getElementById('course');
                console.log(courseDropdown);
                const selectedOption = courseDropdown.options[courseDropdown.selectedIndex];
                const courseName = selectedOption.text;

                // Get the batch value
                const batchInput = document.getElementById('batch');
                const batchValue = batchInput.value;

                // Generate and set the slug
                if (courseName && batchValue) {
                    const slug = generateSlug(courseName, batchValue);
                    document.getElementById('slug').value = slug;
                } else {
                    document.getElementById('slug').value = ''; // Clear the slug if either field is empty
                }
            }
        });
    </script>

    <script id="autocert-fields">
        document.addEventListener('DOMContentLoaded', () => {
            const autocertCheckbox = document.getElementById('autocert');
            const autocertFields = document.getElementById('autocert-fields');
            const expirationTypeDate = document.getElementById('expiration_date_option');
            const expirationTypeMonths = document.getElementById('expiration_months_option');
            const neverExpiredOption = document.getElementById('never_expired_option');
            const specificDateField = document.getElementById('specific_date_field');
            const monthsField = document.getElementById('months_field');

            // Function to toggle visibility of additional fields
            function toggleAutocertFields() {
                if (autocertCheckbox.checked) {
                    autocertFields.style.display = 'block';
                } else {
                    autocertFields.style.display = 'none';
                }
            }

            // Function to toggle expiration fields based on selected option
            function toggleExpirationFields() {
                if (expirationTypeDate.checked) {
                    specificDateField.style.display = 'block';
                    monthsField.style.display = 'none';
                } else if (expirationTypeMonths.checked) {
                    specificDateField.style.display = 'none';
                    monthsField.style.display = 'block';
                } else if (neverExpiredOption.checked) {
                    specificDateField.style.display = 'none';
                    monthsField.style.display = 'none';
                }
            }

            // Event listener for Auto Certificate checkbox
            autocertCheckbox.addEventListener('change', toggleAutocertFields);

            // Event listeners for expiration type radio buttons
            expirationTypeDate.addEventListener('change', toggleExpirationFields);
            expirationTypeMonths.addEventListener('change', toggleExpirationFields);
            neverExpiredOption.addEventListener('change', toggleExpirationFields);

            // Initialize fields based on current state
            toggleAutocertFields();
            toggleExpirationFields();
        });
    </script>

    <script id="tinymce-init">
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi untuk Pengumuman
            tinymce.init({
                selector: '#announcement-editor',
                plugins: 'lists link image table',
                toolbar: 'bold italic | alignleft aligncenter alignright | bullist numlist | link',
                height: 300,
            });

            // Inisialisasi untuk Konten
            tinymce.init({
                selector: '#content-editor',
                plugins: 'lists link image table',
                toolbar: 'bold italic | alignleft aligncenter alignright | bullist numlist | link',
                height: 300,
            });
        });
    </script>
@endsection
