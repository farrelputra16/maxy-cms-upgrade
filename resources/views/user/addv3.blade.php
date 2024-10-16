@extends('layout.main-v3')

@section('title', 'Add New User')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Add New Data</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a>Users & Access</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getUser') }}">Users</a></li>
                        <li class="breadcrumb-item active">Add New User</li>
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

                    <h4 class="card-title">Add New User</h4>
                    <p class="card-title-desc">This page allows you to update a data's information by modifying the data
                        listed below. Ensure that all the information you enter is accurate to provide the best learning
                        experience for the course participants.</p>

                    <form id="addUser" action="{{ route('postAddUser') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{-- <input type="text" name="img_keep" value="{{ $blog->cover_img }}" hidden> --}}

                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Name</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" id="name"
                                    placeholder="Masukkan Nama">
                                @if ($errors->has('name'))
                                    @foreach ($errors->get('name') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Date of Birth</label>
                            <div class="col-md-10">
                                <input class="form-control" type="date" name="birth" id="birth"
                                    placeholder="Masukkan Tanggal Lahir">
                                @if ($errors->has('birth'))
                                    @foreach ($errors->get('birth') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Email</label>
                            <div class="col-md-10">
                                <input class="form-control" type="email" name="email" id="email"
                                    placeholder="Masukkan Email">
                                @if ($errors->has('email'))
                                    @foreach ($errors->get('email') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Role</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="access_group" data-placeholder="Choose ..."
                                    id="type_selector">
                                    @foreach ($allAccessGroups as $item)
                                        <option value="{{ $item->id }}">[{{ $item->id }}] {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('access_group'))
                                    @foreach ($errors->get('access_group') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Phone</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="phone" id="phone"
                                    placeholder="Masukkan Nomor Telepon"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                @if ($errors->has('phone'))
                                    @foreach ($errors->get('phone') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Password</label>
                            <div class="col-md-10">
                                <input class="form-control" type="password" name="password" id="password"
                                    placeholder="Masukkan Password">
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
                                <input class="form-control" type="text" name="address" id="address"
                                    placeholder="Masukkan Alamat">
                                @if ($errors->has('address'))
                                    @foreach ($errors->get('address') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Postal Code</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="postal_code" id="postal_code"
                                    placeholder="Masukkan Kode Pos">
                                @if ($errors->has('postal_code'))
                                    @foreach ($errors->get('postal_code') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <br>
                        <hr>
                        <br>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Supervisor Name (Nama Dosen
                                Pembimbing)</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="supervisor_name" id="supervisor_name"
                                    placeholder="Masukkan Nama Dosen Pembimbing">
                                @if ($errors->has('supervisor_name'))
                                    @foreach ($errors->get('supervisor_name') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Supervisor Email (Email Dosen
                                Pembimbing)</label>
                            <div class="col-md-10">
                                <input class="form-control" type="email" name="supervisor_email" id="supervisor_email"
                                    placeholder="Masukkan Email Dosen Pembimbing">
                                @if ($errors->has('supervisor_email'))
                                    @foreach ($errors->get('supervisor_email') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">University</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="university" id="university"
                                    placeholder="Masukkan Universitas">
                                @if ($errors->has('university'))
                                    @foreach ($errors->get('university') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Major</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="major" id="major"
                                    placeholder="Masukkan Jurusan">
                                @if ($errors->has('major'))
                                    @foreach ($errors->get('major') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Semester</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="semester" id="semester"
                                    placeholder="Masukkan Semester">
                                @if ($errors->has('semester'))
                                    @foreach ($errors->get('semester') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">City</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="city" id="city"
                                    placeholder="Masukkan Kota">
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
                                <select class="form-control select2" name="province" data-placeholder="Choose ..."
                                    id="type_selector">
                                    @foreach ($allProvince as $item)
                                        <option value="{{ $item->id }}">[{{ $item->id }}] {{ $item->name }}
                                        </option>
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
                            <label for="input-name" class="col-md-2 col-form-label">Country</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="country" id="country"
                                    placeholder="Masukkan Negara">
                                @if ($errors->has('country'))
                                    @foreach ($errors->get('country') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="linkedin" class="col-md-2 col-form-label">LinkedIn (Optional)</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="linkedin" id="linkedin"
                                    placeholder="Masukkan LinkedIn">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="partner" class="col-md-2 col-form-label">Partner</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="partner" id="partner_selector"
                                    data-placeholder="Choose ...">
                                    @foreach ($allPartner as $item)
                                        <option value="{{ $item->id }}">[{{ $item->id }}] {{ $item->name }}
                                        </option>
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
                            <label for="input-name" class="col-md-2 col-form-label">Referral (Optional)</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="referal" id="referal"
                                    placeholder="Masukkan Kode Referral">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Request (Optional)</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="user_request" id="user_request"
                                    placeholder="Masukkan Request">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Users Description
                                (Optional)</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="description"></textarea>
                            </div>
                        </div>
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    name="status">
                                <label class="m-0">Aktif</label>
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary w-md text-center custom-btn-submit" form="addUser">Add User</button>
                            </div>
                        </div>
                    </form>
                    <br>
                    @if (Route::has('user.import-csv'))
                        <h4>Add Multiple Users by Uploading CSV File</h4>
                        <form action="{{ route('user.import-csv') }}" method="post" enctype="multipart/form-data"
                            class="dropzone text-center" id="csv-upload">
                            @csrf
                            <div class="row justify-content-center align-items-center" style="height: 100%;">
                                <div class="col-6">
                                    <div class="fallback">
                                        <input name="csv_file" type="file" id="csv_file" accept=".csv">
                                        @error('csv_file')
                                            <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="dz-message needsclick">
                                        <div class="mb-3">
                                            <i class="mdi mdi-cloud-upload display-4 text-muted"></i>
                                        </div>
                                        <h4>Drop files here or click to upload.</h4>
                                        <br>
                                        <small>sample: <i class="fa fa-file" aria-hidden="true"></i> <a
                                                href="{{ asset('csv/useraddexample.csv') }}" download>csv example
                                                (click me to download)</a></small>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('style')
    <style>
        #csv-upload {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 30%;
        }

        .dz-message {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        #csv-upload .dz-message h4 {
            font-size: 18px;
            font-weight: bold;
            white-space: nowrap;
        }

        #csv-upload .dz-message small {
            font-size: 14px;
            color: #666;
            white-space: nowrap;
        }
    </style>
@endsection

@section('script')

    <script src="{{ URL::asset('assets/cms-v3/libs/dropzone/dropzone.min.js') }}"></script>

@endsection
