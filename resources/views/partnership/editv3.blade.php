@extends('layout.main-v3')

@section('title', 'Edit Partnership')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Edit Data</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a>Content</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getPartnership') }}">Partnerships</a></li>
                        <li class="breadcrumb-item active">Edit Partnership</li>
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

                    <h4 class="card-title">Edit Partnership</h4>
                    <p class="card-title-desc">This page allows you to update a data's information by modifying the data
                        listed below. Ensure that all the information you enter is accurate to provide the best learning
                        experience for the course participants.</p>

                    <form action="{{ route('postEditPartnership', ['id' => request()->query('id')]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Partner</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="partner" data-placeholder="Choose ...">
                                    @foreach ($partners as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $partnership->m_partner_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Partnership Type</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="partnership_type" data-placeholder="Choose ...">
                                    @foreach ($partnership_types as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $partnership->m_partnership_type_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-file" class="col-md-2 col-form-label">File</label>
                            <div class="col-md-10">
                                <input class="form-control" type="file" name="file" id="file">
                                <p class="text-muted mb-0 text-truncate">recommended size max 5mb</p>
                                <img id="frame" src="{{ asset('uploads/partnership/' . $partnership->file) }}"
                                    width="100px" height="auto" alt="image" />
                                @if ($errors->has('file'))
                                    @foreach ($errors->get('file') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Date Start</label>
                            <div class="col-md-10">
                                <input class="form-control" type="date" name="date_start" id="date_start"
                                    value="{{ $partnership->date_start }}">
                                @if ($errors->has('date_start'))
                                    @foreach ($errors->get('date_start') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Date End</label>
                            <div class="col-md-10">
                                <input class="form-control" type="date" name="date_end" id="date_end"
                                    value="{{ $partnership->date_end }}">
                                @if ($errors->has('date_end'))
                                    @foreach ($errors->get('date_end') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Description</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="description">{{ $partnership->description }}</textarea>
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
                                    name="status" {{ $partnership->status == 1 ? 'checked' : '' }}>
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
        // preview image
        function previewImage() {
            const input = document.getElementById('file');
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
    </script>
@endsection
