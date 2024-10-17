@extends('layout.main-v3')

@section('title', 'Add Maxy Talk Data')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Add New Data</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a>Settings</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getMaxyTalk') }}">Maxy Talks</a></li>
                        <li class="breadcrumb-item active">Add Maxy Talk</li>
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

                    <h4 class="card-title">Add New Member Testimonial</h4>
                    <p class="card-title-desc">This page allows you to update a data's information by modifying the data
                        listed below. Ensure that all the information you enter is accurate to provide the best learning
                        experience for the course participants.</p>

                    <form id="addMaxyTalk" action="{{ route('postAddMaxyTalk') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Name</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" id="name"
                                    placeholder="Masukkan nama Maxy Talk">
                                @if ($errors->has('name'))
                                    @foreach ($errors->get('name') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Start Pendaftaran</label>
                            <div class="col-md-10">
                                <input class="form-control" type="datetime-local" name="datestart" id="start-date"
                                    onchange="updateEndDateMin()">
                                @if ($errors->has('datestart'))
                                    @foreach ($errors->get('datestart') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">End Pendaftaran</label>
                            <div class="col-md-10">
                                <input class="form-control" type="datetime-local" name="dateend" id="end-date">
                                @if ($errors->has('dateend'))
                                    @foreach ($errors->get('dateend') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Registration Link</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="registration" id="registration"
                                    placeholder="Masukkan Link Registrasi">
                                @if ($errors->has('registration'))
                                    @foreach ($errors->get('registration') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Priority</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="priority" id="priority">
                                @if ($errors->has('priority'))
                                    @foreach ($errors->get('priority') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">User ID</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="userid" id="type_selector">
                                    <option selected value="">-- Pilih User --</option>
                                    @foreach ($users as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                            <label for="input-tag" class="col-md-2 col-form-label">Maxy Talk Parents (Optional)</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="parentsid" id="type_selector">
                                    <option selected value="">-- Pilih Parent --</option>
                                    @foreach ($maxytalk as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-file" class="col-md-2 col-form-label">Image</label>
                            <div class="col-md-10" style="height: 200px">
                                <input class="form-control" type="file" name="img" id="input-file" accept="image/*"
                                    onchange="previewImage()">
                                <img id="frame" src="" alt="Preview Image" class="img-fluid h-100"
                                    style="display: none;" />
                                <br>
                                @if ($errors->has('img'))
                                    @foreach ($errors->get('img') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Description</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="description" id="description"></textarea>
                            </div>
                        </div>
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    name="status" value="1">
                                <label class="m-0">Aktif</label>
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary w-md text-center custom-btn-submit"
                                    form="addMaxyTalk">Add Maxy Talk</button>
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

            // Cek apakah ada file yang dipilih
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                // Ketika file selesai dibaca
                reader.onload = function(e) {
                    frame.src = e.target.result; // Atur sumber gambar ke file yang dipilih
                    frame.style.display = 'block'; // Tampilkan gambar pratinjau
                }

                // Baca file sebagai URL
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection
