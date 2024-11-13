@extends('layout.main-v3')

@section('title', 'Edit Event')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Edit Data</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getEvent') }}">Event</a></li>
                        <li class="breadcrumb-item active">Edit Event</li>
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

                    <h4 class="card-title">Edit Event</h4>
                    <p class="card-title-desc">Halaman ini digunakan untuk memperbarui informasi event.</p>

                    <form action="{{ route('postEditEvent', ['id' => request()->query('id')]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Tipe Kegiatan</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="event_type" data-placeholder="Choose ...">
                                    @foreach ($event_types as $item)
                                        <option value="{{ $item->id }}"
                                            {{-- Pilih opsi berdasarkan old data atau data dari model event --}}
                                            {{ old('event_type', $event->m_event_type_id) == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Nama <span class="text-danger"
                                data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" id="name"
                                    value="{{ old('name', $event->name) }}">
                                @if ($errors->has('name'))
                                    @foreach ($errors->get('name') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Tanggal Mulai <span class="text-danger"
                                data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="datetime-local" name="date_start" id="date"
                                    value="{{ old('date_start', $event->date_start) }}">
                                @if ($errors->has('date'))
                                    @foreach ($errors->get('date') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Tanggal Akhir <span class="text-danger"
                                data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="datetime-local" name="date_end" id="date"
                                    value="{{ old('date_end', $event->date_end) }}">
                                @if ($errors->has('date'))
                                    @foreach ($errors->get('date') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-payment" class="col-md-2 col-form-label">Link URL</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="url" id="url"
                                    value="{{ old('url', $event->url) }}">
                                @if ($errors->has('url'))
                                    @foreach ($errors->get('url') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-file" class="col-md-2 col-form-label">Gambar <span class="text-danger"
                                data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10" style="height: 200px">
                                <input class="form-control" type="file" name="image" id="image" accept="image/*"
                                    onchange="previewImage()">
                                <p class="text-muted mb-0 text-truncate">Ukuran yang direkomendasikan maksimal 5MB.</p>
                                <img id="frame" src="{{ asset('uploads/event/' . $event->image) }}" alt="Preview Image"
                                    class="img-fluid h-100" />
                                @if ($errors->has('image'))
                                    @foreach ($errors->get('image') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Deskripsi</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="description">{{ old('description', $event->description) }}</textarea>
                                @if ($errors->has('description'))
                                    @foreach ($errors->get('description') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Verifikasi</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <!-- Hidden input untuk mengirim nilai 0 jika checkbox tidak dicentang -->
                                <input type="hidden" name="need_verification" value="0">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    name="need_verification" {{ old('need_verification', isset($event) ? $event->is_need_verification : false) ? 'checked' : '' }}>
                            </div>
                        </div>
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Publik</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <!-- Hidden input untuk mengirim nilai 0 jika checkbox tidak dicentang -->
                                <input type="hidden" name="public" value="0">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    name="public" {{ old('public', isset($event) ? $event->is_public : false) ? 'checked' : '' }}>
                            </div>
                        </div>
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <!-- Hidden input untuk mengirim nilai 0 jika checkbox tidak dicentang -->
                                <input type="hidden" name="status" value="0">

                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    value="1" name="status"
                                    {{ old('status', isset($event) ? $event->status : false) ? 'checked' : '' }}>
                                <label class="m-0">Aktif</label>
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary w-md text-center">Edit Event</button>
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
            const input = document.getElementById('image');
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
