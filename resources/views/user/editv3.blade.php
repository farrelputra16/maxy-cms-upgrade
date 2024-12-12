@extends('layout.main-v3')

@section('title', 'Ubah Pengguna')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Ubah Data</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pengguna & Akses</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getUser') }}">Pengguna</a></li>
                        <li class="breadcrumb-item active">Ubah Pengguna</li>
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

                    <h4 class="card-title">Ubah Pengguna: {{ $currentData->name }}</h4>
                    <p class="card-title-desc">Halaman ini memungkinkan Anda untuk memperbarui informasi pengguna dengan
                        mengedit data yang tercantum di bawah ini. Pastikan semua data yang Anda masukkan benar untuk
                        memastikan kelancaran proses dan pengalaman pengguna yang optimal.</p>

                    <form method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Nama Lengkap <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name"
                                    value="{{ old('name', $currentData->name) }}" id="name">
                                @if ($errors->has('name'))
                                    @foreach ($errors->get('name') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Nama Panggilan <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="nickname"
                                    value="{{ old('nickname', $currentData->nickname) }}" id="nickname">
                                @if ($errors->has('nickname'))
                                    @foreach ($errors->get('nickname') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Peran <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="access_group"
                                    data-placeholder="Pilih Grup Akses...">
                                    {{-- <option>Select</option> --}}
                                    <option selected value="{{ $currentData->access_group_id }}"
                                        {{ old('access_group', $currentData->access_group_id) }}>
                                        {{ $currentData->access_group_name }}
                                    </option>
                                    @foreach ($allAccessGroups as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('access_group', $currentData->access_group_id) == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Nomor Telepon <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="phone"
                                    value="{{ old('phone', $currentData->phone) }}" id="phone"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                @if ($errors->has('phone'))
                                    @foreach ($errors->get('phone') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Email <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="email" name="email"
                                    value="{{ old('email', $currentData->email) }}" id="email">
                                @if ($errors->has('email'))
                                    @foreach ($errors->get('email') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-password" class="col-md-2 col-form-label">Kata Sandi</label>
                            <div class="col-md-10">
                                <input class="form-control" type="password" name="password" value="" id="password"
                                    placeholder="●●●●●●●●">
                                @if ($errors->has('password'))
                                    @foreach ($errors->get('password') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Alamat</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="address"
                                    value="{{ old('address', $currentData->address) }}" id="address">
                                @if ($errors->has('address'))
                                    @foreach ($errors->get('address') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Referral (Opsional)</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="referal"
                                    placeholder="Masukkan Kode Referral"
                                    value="{{ old('referal', $currentData->referal) }}" id="referal">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-md-10">
                                <input class="form-control" type="date" name="birth"
                                    placeholder="Masukkan Kode Referral"
                                    value="{{ old('birth', $currentData->date_of_birth) }}" id="birth">
                                @if ($errors->has('birth'))
                                    @foreach ($errors->get('birth') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Nama Dosen Pembimbing</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="supervisor_name"
                                    placeholder="Masukkan Nama Dosen Pembimbing"
                                    value="{{ old('supervisor_name', $currentData->supervisor_name) }}"
                                    id="supervisor_name">
                                @if ($errors->has('supervisor_name'))
                                    @foreach ($errors->get('supervisor_name') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Email Dosen
                                Pembimbing</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="supervisor_email"
                                    placeholder="Masukkan Nama Dosen Pembimbing"
                                    value="{{ old('supervisor_email', $currentData->supervisor_email) }}"
                                    id="supervisor_email">
                                @if ($errors->has('supervisor_email'))
                                    @foreach ($errors->get('supervisor_email') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="university" class="col-md-2 col-form-label">Universitas</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="university"
                                    placeholder="Masukkan Nama Dosen Pembimbing"
                                    value="{{ old('university', $currentData->university) }}" id="university">
                                @if ($errors->has('university'))
                                    @foreach ($errors->get('university') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="major" class="col-md-2 col-form-label">Jurusan</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="major" placeholder="Masukkan Jurusan"
                                    value="{{ old('major', $currentData->major) }}" id="major">
                                @if ($errors->has('major'))
                                    @foreach ($errors->get('major') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="university" class="col-md-2 col-form-label">Semester</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="semester"
                                    placeholder="Masukkan Semester" value="{{ old('semester', $currentData->semester) }}"
                                    id="semester">
                                @if ($errors->has('semester'))
                                    @foreach ($errors->get('semester') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="city" class="col-md-2 col-form-label">Kota</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="city" placeholder="Masukkan Kota"
                                    value="{{ old('city', $currentData->city) }}" id="city">
                                @if ($errors->has('city'))
                                    @foreach ($errors->get('city') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Provinsi</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="province" data-placeholder="Choose ...">
                                    @foreach ($allProvince as $item)
                                        @if ($item->id == $currentData->m_province_id)
                                            <option selected value="{{ $item->id }}"
                                                {{ old('province', $currentData->m_province_id ? 'selected' : '') }}>
                                                {{ $item->name }}</option>
                                        @else
                                            <option value="{{ $item->id }}"
                                                {{ old('province') == $item->id ? 'selected' : '' }}>{{ $item->name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                @if ($errors->has('province'))
                                    @foreach ($errors->get('province') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="country" class="col-md-2 col-form-label">Negara</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="country" placeholder="Masukkan Negara"
                                    value="{{ old('country', $currentData->country) }}" id="country">
                                @if ($errors->has('country'))
                                    @foreach ($errors->get('country') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="postal_code" class="col-md-2 col-form-label">Kode Pos</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="postal_code"
                                    placeholder="Masukkan Semester"
                                    value="{{ old('postal_code', $currentData->postal_code) }}" id="postal_code">
                                @if ($errors->has('postal_code'))
                                    @foreach ($errors->get('postal_code') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="linkedin" class="col-md-2 col-form-label">LinkedIn (Opsional)</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="linkedin" id="linkedin"
                                    placeholder="Masukkan LinkedIn"
                                    value="{{ old('linkedin', $currentData->linked_in) }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="partner" class="col-md-2 col-form-label">Partner</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="partner" id="partner_selector"
                                    data-placeholder="Choose ...">
                                    @foreach ($allPartner as $item)
                                        @if ($item->id == $currentData->m_partner_id)
                                            <option selected value="{{ $item->id }}"
                                                {{ old('partner', $currentData->m_partner_id ? 'selected' : '') }}>
                                                {{ $item->name }}</option>
                                        @else
                                            <option value="{{ $item->id }}"
                                                {{ old('partner') == $item->id ? 'selected' : '' }}>{{ $item->name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                @if ($errors->has('partner'))
                                    @foreach ($errors->get('partner') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-file" class="col-md-2 col-form-label">Foto Profil (Opsional)</label>
                            <div class="col-md-10">
                                <input class="form-control" type="file" name="file_image" id="input-file"
                                    accept="image/png, image/jpeg, image/jpg">
                                @error('profile_picture')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                                <img id="frame" class="img-fluid h-100" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Catatan Admin</label>
                            <div class="col-md-10">
                                <textarea id="elm2" class="form-control" name="description" rows="5">{{ old('description', $currentData->description) }}</textarea>
                            </div>
                        </div>
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <!-- Hidden input untuk mengirim nilai 0 jika checkbox tidak dicentang -->
                                <input type="hidden" name="status" value="0">

                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    value="1" name="status"
                                    {{ old('status', isset($currentData) ? $currentData->status : false) ? 'checked' : '' }}>
                                <label>Aktif</label>
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

@endsection
