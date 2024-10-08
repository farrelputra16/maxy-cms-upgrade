@extends('layout.main-v3')

@section('title', 'Edit User')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Edit Data</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a>Users & Access</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getUser') }}">Users</a></li>
                        <li class="breadcrumb-item active">Edit User</li>
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

                    <h4 class="card-title">Edit User: {{ $currentData->name }}</h4>
                    <p class="card-title-desc">This page allows you to update a data's information by modifying the data
                        listed below. Ensure that all the information you enter is accurate to provide the best learning
                        experience for the course participants.</p>

                    <form method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Name</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" value="{{ $currentData->name }}"
                                    id="name">
                                @if ($errors->has('name'))
                                    @foreach ($errors->get('name') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Nickname</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="nickname"
                                    value="{{ $currentData->nickname }}" id="nickname">
                                @if ($errors->has('nickname'))
                                    @foreach ($errors->get('nickname') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Access Group</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="access_group" data-placeholder="Choose ...">
                                    {{-- <option>Select</option> --}}
                                    <option selected value="{{ $currentData->access_group_id }}">
                                        {{ $currentData->access_group_name }}
                                    </option>
                                    @foreach ($allAccessGroups as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Phone</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="phone" value="{{ $currentData->phone }}"
                                    id="phone" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                @if ($errors->has('phone'))
                                    @foreach ($errors->get('phone') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Email</label>
                            <div class="col-md-10">
                                <input class="form-control" type="email" name="email" value="{{ $currentData->email }}"
                                    id="email">
                                @if ($errors->has('email'))
                                    @foreach ($errors->get('email') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Password</label>
                            <div class="col-md-10">
                                <input class="form-control" type="password" name="password"
                                    value="{{ $currentData->paswword }}" id="password">
                                @if ($errors->has('password'))
                                    @foreach ($errors->get('password') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Address</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="address"
                                    value="{{ $currentData->address }}" id="address">
                                @if ($errors->has('address'))
                                    @foreach ($errors->get('address') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Referral (Optional)</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="referal"
                                    placeholder="Masukkan Kode Referral" value="{{ $currentData->referal }}"
                                    id="referal">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Date of Birth</label>
                            <div class="col-md-10">
                                <input class="form-control" type="date" name="birth"
                                    placeholder="Masukkan Kode Referral" value="{{ $currentData->date_of_birth }}"
                                    id="birth">
                                @if ($errors->has('birth'))
                                    @foreach ($errors->get('birth') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Supervisor Name(Nama Dosen
                                Pembimbing)</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="supervisor_name"
                                    placeholder="Masukkan Nama Dosen Pembimbing"
                                    value="{{ $currentData->supervisor_name }}" id="supervisor_name">
                                @if ($errors->has('supervisor_name'))
                                    @foreach ($errors->get('supervisor_name') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Supervisor Email(Email Dosen
                                Pembimbing)</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="supervisor_email"
                                    placeholder="Masukkan Nama Dosen Pembimbing"
                                    value="{{ $currentData->supervisor_email }}" id="supervisor_email">
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
                                    placeholder="Masukkan Nama Dosen Pembimbing" value="{{ $currentData->university }}"
                                    id="university">
                                @if ($errors->has('university'))
                                    @foreach ($errors->get('university') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="major" class="col-md-2 col-form-label">Major</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="major" placeholder="Masukkan Jurusan"
                                    value="{{ $currentData->major }}" id="major">
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
                                    placeholder="Masukkan Semester" value="{{ $currentData->semester }}" id="semester">
                                @if ($errors->has('semester'))
                                    @foreach ($errors->get('semester') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="city" class="col-md-2 col-form-label">City</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="city" placeholder="Masukkan Kota"
                                    value="{{ $currentData->city }}" id="city">
                                @if ($errors->has('city'))
                                    @foreach ($errors->get('city') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Province</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="province" data-placeholder="Choose ...">
                                    @foreach ($allProvince as $item)
                                        @if ($item->id == $currentData->m_province_id)
                                            <option selected value="{{ $item->id }}">{{ $item->name }}</option>
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                            <label for="country" class="col-md-2 col-form-label">Country</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="country" placeholder="Masukkan Negara"
                                    value="{{ $currentData->country }}" id="country">
                                @if ($errors->has('country'))
                                    @foreach ($errors->get('country') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="postal_code" class="col-md-2 col-form-label">Postal Code</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="postal_code"
                                    placeholder="Masukkan Semester" value="{{ $currentData->postal_code }}"
                                    id="postal_code">
                                @if ($errors->has('postal_code'))
                                    @foreach ($errors->get('postal_code') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="linkedin" class="col-md-2 col-form-label">LinkedIn (Optional)</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="linkedin" id="linkedin"
                                    placeholder="Masukkan LinkedIn" value="{{ $currentData->linked_in }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="partner" class="col-md-2 col-form-label">Partner</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="partner" id="partner_selector"
                                    data-placeholder="Choose ...">
                                    @foreach ($allPartner as $item)
                                        @if ($item->id == $currentData->m_partner_id)
                                            <option selected value="{{ $item->id }}">{{ $item->name }}</option>
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                            <label for="input-file" class="col-md-2 col-form-label">Photo Profle (Optional)</label>
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
                            <label for="input-content" class="col-md-2 col-form-label">User Description (Optional)</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="description" rows="5">{{ $currentData->description }}</textarea>
                            </div>
                        </div>
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    value="1" {{ $currentData->status == 1 ? 'checked' : '' }} name="status">
                                <label>Aktif</label>
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

@endsection
