@extends('layout.main-v3')

@section('title', 'Profile User')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Profile User</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">User & Access</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getUser') }}">Users</a></li>
                        <li class="breadcrumb-item active">Profile User</li>
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

                    <h4 class="card-title">Profile User: {{ $currentData->name }}</small></h4>
                    <p class="card-title-desc">This page allows you to update a data's information by modifying the data
                        listed below. Ensure that all the information you enter is accurate to provide the best learning
                        experience for the course participants.</p>

                    <form method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">ID</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="id"
                                    value="{{ $currentData->id ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Name</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name"
                                    value="{{ $currentData->name ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">KTP</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="no_ktp"
                                    value="{{ $currentData->no_ktp ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Telp</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="phone"
                                    value="{{ $currentData->phone ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Nama Pembimbing</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="supervisor_name" id="supervisor_name"
                                    value="{{ $currentData->supervisor_name ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-discount" class="col-md-2 col-form-label">Email Pembimbing</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="supervisor_email" id="supervisor_email"
                                    value="{{ $currentData->supervisor_email }}" id="input-discount" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Nama Ayah</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="father_name"
                                    value="{{ $father->name ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Pekerjaan Ayah</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="father_job"
                                    value="{{ $father->job ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Nama Ibu</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="mother_name"
                                    value="{{ $mother->name ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Pekerjaan Ibu</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="mother_job"
                                    value="{{ $mother->job ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Agama</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="religion"
                                    value="{{ $currentData->religion ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Status Kewarganegaraan</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="citizenship_status"
                                    value="{{ $currentData->citizenship_status ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-slug" class="col-md-2 col-form-label">Transkrip Nilai</label>
                            <div class="col-md-10">
                                <a
                                    href="{{ asset('uploads/' . $currentData->transcripts) }}">{{ $currentData->transcripts }}</a>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">IPK</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="ipk"
                                    value="{{ $currentData->ipk ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">kota</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="city"
                                    value="{{ $currentData->city ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Provinsi</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="province"
                                    value="{{ $currentData->MProvince->name ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Negara</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="country"
                                    value="{{ $currentData->country ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Kode Pos</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="postal_code"
                                    value="{{ $currentData->postal_code ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Alamat</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="address"
                                    value="{{ $currentData->address ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Hobi</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="hobby"
                                    value="{{ $currentData->hobby ?? '-' }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="description" class="col-md-2 col-form-label">Deskripsi Diri</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="self_desc" class="form-control" disabled>{{ $currentData->description }}</textarea>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-slug" class="col-md-2 col-form-label">Video Perkenalan</label>
                            <div class="col-md-10">
                                <a
                                    href="{{ $currentData->detail_description_video ?? '-' }}">{{ $currentData->detail_description_video ?? '-' }}</a>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="description" class="col-md-2 col-form-label">Ringkasan Pribadi</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="self_desc" class="form-control" disabled>{{ $currentData->personal_summary }}</textarea>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <h6>Riwayat Karir</h6>
                            @if ($currentData->UserExperience->count() > 0)
                                <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Position</th>
                                            <th>Job Type</th>
                                            <th>Company</th>
                                            <th>Industry</th>
                                            <th>Location</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <!-- Add more table headers as needed -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($currentData->UserExperience as $portofolio)
                                            <tr>
                                                <td>{{ $portofolio->name }}</td>
                                                <td>{{ $portofolio->job_type }}</td>
                                                <td>{{ $portofolio->company }}</td>
                                                <td>{{ $portofolio->industry }}</td>
                                                <td>{{ $portofolio->location }}</td>
                                                <td>{{ $portofolio->start_date }}</td>
                                                <td>{{ $portofolio->end_date }}</td>
                                                <!-- Add more table data as needed -->
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="mb-3 row justify-content">
                                    <div class="">
                                        <div class="border card border-danger">
                                            <div class="card-body text-center">
                                                <p class="card-text text-danger">No data available</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>


                        <div class="mb-3 row">
                            <h6>Education</h6>
                            @if ($currentData->UserEducation->count() > 0)
                                <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>School</th>
                                            <th>Degree</th>
                                            <th>Fields of Study</th>
                                            <th>Score</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <!-- Add more table headers as needed -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($currentData->UserEducation as $portofolio)
                                            <tr>
                                                <td>{{ $portofolio->name }}</td>
                                                <td>{{ $portofolio->degree }}</td>
                                                <td>{{ $portofolio->fields_of_study }}</td>
                                                <td>{{ $portofolio->score }}</td>
                                                <td>{{ $portofolio->start_date }}</td>
                                                <td>{{ $portofolio->end_date }}</td>
                                                <!-- Add more table data as needed -->
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="mb-3 row justify-content">
                                    <div class="">
                                        <div class="border card border-danger">
                                            <div class="card-body text-center">
                                                <p class="card-text text-danger">No data available</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="mb-3 row">
                            <h6>Portofolio</h6>
                            @if ($currentData->UserPortofolio->count() > 0)
                                <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>URL</th>
                                            <th>Date Created</th>
                                            <!-- Add more table headers as needed -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($currentData->UserPortofolio as $portofolio)
                                            <tr>
                                                <td>{{ $portofolio->url_portfolio }}</td>
                                                <td>{{ $portofolio->created_at }}</td>
                                                <!-- Add more table data as needed -->
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="mb-3 row justify-content">
                                    <div class="">
                                        <div class="border card border-danger">
                                            <div class="card-body text-center">
                                                <p class="card-text text-danger">No data available</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="mb-3 row">
                            <h6>Certificate</h6>
                            @if ($currentData->UserCertificate->count() > 0)
                                <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Company</th>
                                            <th>ID Credential</th>
                                            <th>URL Credential</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Description</th>
                                            <!-- Add more table headers as needed -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($currentData->UserCertificate as $portofolio)
                                            <tr>
                                                <td>{{ $portofolio->name }}</td>
                                                <td>{{ $portofolio->company }}</td>
                                                <td>{{ $portofolio->id_credential }}</td>
                                                <td>{{ $portofolio->url_credential }}</td>
                                                <td>{{ $portofolio->start_date }}</td>
                                                <td>{{ $portofolio->end_date }}</td>
                                                <td>{{ $portofolio->description }}</td>
                                                <!-- Add more table data as needed -->
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="mb-3 row justify-content">
                                    <div class="">
                                        <div class="border card border-danger">
                                            <div class="card-body text-center">
                                                <p class="card-text text-danger">No data available</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <br>
                        <div class="mb-3 row">
                            <h6>Language</h6>
                            @if ($currentData->UserLanguage->count() > 0)
                                <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Language</th>
                                            <th>Proficiency</th>
                                            <!-- Add more table headers as needed -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($currentData->UserLanguage as $portofolio)
                                            <tr>
                                                <td>{{ $portofolio->MLanguage->name }}</td>
                                                <td>{{ $portofolio->proficiency }}</td>
                                                <!-- Add more table data as needed -->
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="mb-3 row justify-content">
                                    <div class="">
                                        <div class="border card border-danger">
                                            <div class="card-body text-center">
                                                <p class="card-text text-danger">No data available</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="mb-3 row">
                            <h6>Active Course</h6>
                            @foreach ($currentData->courseClassMembers as $portofolio)
                                @if (isset($portofolio->courseClass) &&
                                        !is_null($portofolio->courseClass) &&
                                        $portofolio->courseClass->status_ongoing == 1)
                                    <p class='active_course'>{{ $portofolio->courseClass->slug }}</p>
                                @endif
                            @endforeach
                            <p id='active_course' class="d-none">No data available</p>
                        </div>
                        <div class="mb-3 row">
                            <h6>Completed Course</h6>
                            @foreach ($currentData->courseClassMembers as $portofolio)
                                @if (isset($portofolio->courseClass) &&
                                        !is_null($portofolio->courseClass) &&
                                        $portofolio->courseClass->status_ongoing == 2)
                                    <p class='completed_course'>{{ $portofolio->courseClass->slug }}</p>
                                @endif
                            @endforeach
                            <p id='completed_course' class="d-none">No data available</p>
                        </div>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var activeCourses = document.getElementsByClassName("active_course");
            if (activeCourses.length === 0) {
                var noDataElement = document.getElementById("active_course");
                if (noDataElement) {
                    noDataElement.classList.remove("d-none");
                }
            }

            var activeCourses = document.getElementsByClassName("completed_course");
            if (activeCourses.length === 0) {
                var noDataElement = document.getElementById("completed_course");
                if (noDataElement) {
                    noDataElement.classList.remove("d-none");
                }
            }
        });
    </script>
@endsection
