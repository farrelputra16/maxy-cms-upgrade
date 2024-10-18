@extends('layout.main-v3')

@section('title', 'Edit Maxy Talk Data')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Edit Maxy Talk Data</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a>Settings</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getMaxyTalk') }}">Maxy Talks</a></li>
                        <li class="breadcrumb-item active">Edit Maxy Talk</li>
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

                    <h4 class="card-title">Edit Member Testimonial</h4>
                    <p class="card-title-desc">Update the information of this Maxy Talk entry below. Ensure all the details are correct before saving.</p>

                    <form id="editMaxyTalk" action="{{ route('postEditMaxyTalk', ['id' => request()->query('id')]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Name</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" id="name"
                                    value="{{ $maxytalk->name }}">
                                @if ($errors->has('name'))
                                    @foreach ($errors->get('name') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="start-date" class="col-md-2 col-form-label">Start Pendaftaran</label>
                            <div class="col-md-10">
                                <input class="form-control" type="datetime-local" name="datestart" id="start-date"
                                    value="{{ $maxytalk->start_date }}">
                                @if ($errors->has('datestart'))
                                    @foreach ($errors->get('datestart') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="end-date" class="col-md-2 col-form-label">End Pendaftaran</label>
                            <div class="col-md-10">
                                <input class="form-control" type="datetime-local" name="dateend" id="end-date"
                                    value="{{ $maxytalk->end_date }}">
                                @if ($errors->has('dateend'))
                                    @foreach ($errors->get('dateend') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="registration" class="col-md-2 col-form-label">Registration Link</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="registration" id="registration"
                                    value="{{ $maxytalk->register_link }}">
                                @if ($errors->has('registration'))
                                    @foreach ($errors->get('registration') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="priority" class="col-md-2 col-form-label">Priority</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="priority" id="priority"
                                    value="{{ $maxytalk->priority }}">
                                @if ($errors->has('priority'))
                                    @foreach ($errors->get('priority') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="type_selector" class="col-md-2 col-form-label">User ID</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="userid" id="type_selector">
                                    <option value="">-- Pilih User --</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" {{ $maxytalk->users_id == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('userid'))
                                    @foreach ($errors->get('userid') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="type_selector" class="col-md-2 col-form-label">Maxy Talk Parent (Optional)</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="parentsid" id="type_selector">
                                    <option value="">-- Pilih Parent --</option>
                                    @foreach ($maxytalk_all as $parent)
                                        <option value="{{ $parent->id }}" {{ $maxytalk->maxy_talk_parent_id == $parent->id ? 'selected' : '' }}>
                                            {{ $parent->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-file" class="col-md-2 col-form-label">Image</label>
                            <div class="col-md-10" style="height: 200px">
                                <input class="form-control" type="file" name="img" id="input-file" accept="image/*" onchange="previewImage()">
                                <img id="frame" src="{{ asset('uploads/maxytalk/'.$maxytalk->img) }}" alt="Preview Image" class="img-fluid h-100" style="display: block;" />
                                <br>
                                @if ($errors->has('img'))
                                    @foreach ($errors->get('img') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="description" class="col-md-2 col-form-label">Description</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="description">{{ $maxytalk->description }}</textarea>
                            </div>
                        </div>

                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd" name="status" value="1" {{ $maxytalk->status == 1 ? 'checked' : '' }}>
                                <label class="m-0">Aktif</label>
                            </div>
                        </div>

                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary w-md text-center custom-btn-submit" form="editMaxyTalk">Update Maxy Talk</button>
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
            const frame = document.getElementById('frame');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    frame.src = e.target.result;
                    frame.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
