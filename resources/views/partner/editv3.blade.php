@extends('layout.main-v3')

@section('title', 'Ubah Mitra')

@section('content')
    <!-- Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Ubah Data Mitra</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getPartner') }}">Mitra</a></li>
                        <li class="breadcrumb-item active">Ubah Mitra: {{ $partners->name }}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- Akhir Judul Halaman -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">{{ $partners->name }} <small>[ ID: {{ $partners->id }} ]</small></h4>
                    <p class="card-title-desc">
                        Di halaman ini, Anda bisa memperbarui data mitra yang sudah ada. Pastikan semua data yang diedit,
                        mulai dari nama, kontak, hingga deskripsi, sudah benar sebelum menyimpan perubahan. Setelah selesai,
                        klik "Simpan & Perbarui" untuk memperbarui data.
                    </p>


                    <form
                        action="{{ route('postEditPartner', ['id' => request()->query('id'), 'logo_dump' => $partners->logo]) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="img_keep" value="{{ $partners->logo }}" hidden>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Nama <span class="text-danger"
                                data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name"
                                    value="{{ old('name', $partners->name) }}">
                                @if ($errors->has('name'))
                                    @foreach ($errors->get('name') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Tipe <span class="text-danger"
                                data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="type" data-placeholder="Pilih ..." id="type_selector">
                                    <!-- Menampilkan pilihan yang ada di database (jika ada) -->
                                    @foreach ($partnerTypes as $item)
                                        <option value="{{ $item->id }}" {{ $partners->m_partner_type_id == $item->id ? 'selected' : '' }}
                                            {{ old('type', $partners->type) == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Email <span class="text-danger"
                                data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="email"
                                    value="{{ old('email', $partners->email) }}">
                                @if ($errors->has('email'))
                                    @foreach ($errors->get('email') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Telepon <span class="text-danger"
                                data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="phone"
                                    value="{{ old('phone', $partners->phone) }}"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                @if ($errors->has('phone'))
                                    @foreach ($errors->get('phone') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Kontak Person (Nama) <span class="text-danger"
                                data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="contact_person"
                                    value="{{ old('contact_person', $partners->contact_person) }}">
                                @if ($errors->has('contact_person'))
                                    @foreach ($errors->get('contact_person') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">URL <span class="text-danger"
                                data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="url"
                                    value="{{ old('url', $partners->url) }}">
                                @if ($errors->has('url'))
                                    @foreach ($errors->get('url') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Logo</label>
                            <div class="col-md-10">
                                <input class="form-control" type="file" id="formFile" name="logo"
                                    onchange="preview()">
                                <br>
                                <img id="frame" src="" class="img-fluid">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Alamat <span class="text-danger"
                                data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="address">{{ old('address', $partners->address) }}</textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Catatan Admin</label>
                            <div class="col-md-10">
                                <textarea id="elm2" class="form-control" name="description">{{ old('description', $partners->description) }}</textarea>
                            </div>
                        </div>
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Sorot Status <span class="text-primary"
                                data-bs-toggle="tooltip" title="Mitra akan ditampilkan di front-page">*</span></label>
                            <div class="col-md-10 d-flex align-items-center">
                                <input type="hidden" name="status_highlight" value="0">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    value="1" name="status_highlight"
                                    {{ old('status_highlight', $partners->status_highlight) ? 'checked' : '' }}>
                                <label class="m-0">Aktif</label>
                            </div>
                        </div>
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <input type="hidden" name="status" value="0">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    value="1" name="status"
                                    {{ old('status', $partners->status) ? 'checked' : '' }}>
                                <label class="m-0">Aktif</label>
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary w-md text-center">Simpan & Perbarui</button>
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
        function preview() {
            frame.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>

@endsection
