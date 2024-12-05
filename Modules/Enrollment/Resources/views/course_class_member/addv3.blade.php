@extends('layout.main-v3')

@section('title', 'Tambah Anggota Kelas')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Tambah Anggota Baru</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCourseClass') }}">Daftar Kelas</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{ route('getCourseClassMember', ['id' => $course_class_detail->id]) }}">Daftar
                                Anggota</a></li>
                        <li class="breadcrumb-item active">Tambah Anggota Baru</li>
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

                    <h4 class="card-title">Tambah Anggota Kelas: {{ $course_class_detail->course_name }}
                        Batch {{ $course_class_detail->batch }}</h4>
                    <p class="card-title-desc">
                        Halaman ini memungkinkan Anda untuk menambahkan anggota baru ke dalam kelas. Anda dapat melakukannya
                        satu per satu atau beberapa sekaligus melalui fitur impor file CSV.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li><strong>Tambah Individu:</strong> Pilih anggota menggunakan dropdown "Pilih User." Anda juga
                            dapat menambahkan dosen dan mendeskripsikan tugasnya.</li>
                        <li><strong>Tambah Massal:</strong> Gunakan fitur unggah file CSV untuk menambahkan beberapa anggota
                            secara sekaligus.</li>
                        <li><strong>Konfigurasi Data:</strong> Pastikan data seperti deskripsi kelas, partner (jika
                            berlaku), dan status diatur dengan benar sebelum disimpan.</li>
                    </ul>
                    </p>

                    <form id="addCCMember" action="{{ route('postAddCourseClassMember') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Pilih Pengguna: </label>
                            <div class="col-md-10">
                                <select class="form-control select2 multiple" multiple="multiple" name="users[]"
                                    data-placeholder="Pilih pengguna yang ingin ditambahkan ke kelas">
                                    @foreach ($users as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('users') && in_array($item->id, old('users')) ? 'selected' : '' }}>
                                            {{ $item->email }} - {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- Mentor Fields -->
                        <div id="mentor-fields-container">
                            @foreach (old('mentor', ['']) as $index => $oldMentor)
                                <div class="mb-3 row mentor-field-group">
                                    <label for="mentor" class="col-md-2 col-form-label">Pilih Dosen: </label>
                                    <div class="col-md-4">
                                        <select class="form-control select2 mentor-select" name="mentor[]"
                                            data-placeholder="Pilih dosen yang akan mendampingi kelas">
                                            <option value="">Pilih Dosen</option>
                                            @foreach ($mentors as $mentor)
                                                <option value="{{ $mentor->id }}"
                                                    {{ $oldMentor == $mentor->id ? 'selected' : '' }}>
                                                    {{ $mentor->email }} - {{ $mentor->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label for="jobdesc" class="col-md-2 col-form-label">Deskripsi Pekerjaan</label>
                                    <div class="col-md-4">
                                        <select name="jobdesc[]" class="form-control select2 jobdesc-select"
                                            data-placeholder="Pilih deskripsi tugas dosen">
                                            <option value="">Pilih Deskripsi Pekerjaan</option>
                                            @foreach ($jobdescriptions as $jobdesc)
                                                <option value="{{ $jobdesc->id }}"
                                                    {{ old('jobdesc.' . $index) == $jobdesc->id ? 'selected' : '' }}>
                                                    {{ $jobdesc->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="row">
                            <div class="col-md-10 offset-md-2">
                                <button type="button" class="btn btn-secondary" id="add-mentor-button">Tambah
                                    Dosen</button>
                                <button type="button" class="btn btn-danger" id="remove-mentor-button">Kurangi
                                    Dosen</button>
                            </div>
                        </div>
                        <br>
                        @if ($course_class_detail->course_type_id == $mbkmType)
                            <div class="mb-3 row">
                                <label for="input-tag" class="col-md-2 col-form-label">Pilih Mitra: </label>
                                <div class="col-md-10">
                                    <select class="form-control select2" name="partner" data-placeholder="Pilih Mitra"
                                        required>
                                        <option value="">Pilih Mitra</option>
                                        @foreach ($partners as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('partner') == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endif
                        <input type="hidden" name="course_class" value="{{ $course_class_detail->id }}">
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Catatan Admin</label>
                            <div class="col-md-10">
                                <textarea class="form-control" id="content" name="description"
                                    placeholder="Tambahkan deskripsi singkat tentang kelas (opsional)">{{ old('description') }}</textarea>
                            </div>
                        </div>
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    name="status" {{ old('status') ? 'checked' : '' }}>
                                <label class="m-0">Aktif</label>
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary w-md text-center custom-btn-submit"
                                    form="addCCMember">Simpan Anggota Kelas</button>
                            </div>
                        </div>
                    </form>
                    <br>


                    <!-- CSV upload form -->
                    <h4>Tambah Anggota Massal melalui CSV</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-5">
                                        <form action="{{ route('course-class-member.import-csv') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @method('POST')
                                            @csrf


                                            <div class="mb-3">
                                                <label for="csv_file" class="form-label">Unggah CSV disini</label>
                                                <br>
                                                <small>Sample: <i class="fa fa-file" aria-hidden="true"></i> <a
                                                        href="{{ env('APP_ENV') == 'local' ? asset('csv/addccmember.csv') : asset('csv/addccmember_maxy.csv') }}"
                                                        download>Contoh CSV
                                                        (Klik untuk Unduh)</a></small>
                                                <input class="form-control" type="file" id="csv_file"
                                                    name="csv_file">
                                            </div>

                                            <button type="submit" class="btn btn-primary">Tambah Anggota Massal</button>
                                        </form>
                                        {{-- <form action="{{ route('course-class-member.import-csv') }}"
                                            enctype="multipart/form-data" class="dropzone text-center" id="csv-upload"
                                            method="POST">
                                            @method('POST')
                                            @csrf
                                            <div class="row justify-content-center align-items-center"
                                                style="height: 100%;">
                                                <div class="col-6">
                                                    <div class="fallback">
                                                        <input name="csv_file" type="file" id="csv_file"
                                                            accept=".csv">
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
                                                        <small>Sample: <i class="fa fa-file" aria-hidden="true"></i> <a
                                                                href="{{ asset('csv/addccmember.csv') }}" download>CSV
                                                                Example (Click to Download)</a></small>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Align button at the bottom-right -->
                                            <div class="row mt-4">
                                                <div class="col-12 text-end">
                                                    <button type="submit"
                                                        class="btn btn-primary w-md text-center custom-btn-submit">Add
                                                        Multiple Members</button>
                                                </div>
                                            </div>
                                        </form><!-- end form --> --}}
                                    </div>
                                </div><!-- end cardbody -->
                            </div><!-- end card -->
                        </div> <!-- end col -->
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Daftar Dosen</h4>
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Id</th>
                                                <th class="data-medium">Nama</th>
                                                <th>Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($mentors as $key => $item)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $item->id }}</td>
                                                    <td class="batch" scope="row">{{ $item->name }}</td>
                                                    <td>{{ $item->email }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Id</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
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

            /* #csv-upload input[type="file"] {
                                        display: block;
                                        margin: 0 auto;
                                        padding: 10px;
                                        border-radius: 4px;
                                        border: 1px solid #ccc;
                                    }

                                    #csv-upload label {
                                        margin-bottom: 10px;
                                        font-weight: bold;
                                    } */

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
        <script>
            // Add event listener for the button to add a new mentor field
            document.getElementById('add-mentor-button').addEventListener('click', function() {
                const mentorFieldsContainer = document.getElementById('mentor-fields-container');
                const newMentorFieldGroup = document.createElement('div');
                newMentorFieldGroup.className = 'mb-3 row mentor-field-group';

                newMentorFieldGroup.innerHTML = `
                <label for="mentor" class="col-md-2 col-form-label">Pilih Mentor: </label>
                <div class="col-md-4">
                    <select class="form-control select2 mentor-select" name="mentor[]" data-placeholder="Pilih Dosen">
                        <option value="">Pilih Dosen</option>
                        @foreach ($mentors as $mentor)
                            <option value="{{ $mentor->id }}" data-jobdesc="{{ $jobdescriptions[$mentor->id] ?? '' }}">
                                {{ $mentor->email }} - {{ $mentor->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <label for="jobdesc" class="col-md-2 col-form-label">Job Description</label>
                <div class="col-md-4">
                    <select name="jobdesc[]" class="form-control select2 jobdesc-select" data-placeholder="Pilih Job Description">
                        @foreach ($jobdescriptions as $jobdesc)
                            <option value="{{ $jobdesc->id ?? '' }}">{{ $jobdesc->name ?? '' }}</option>
                        @endforeach
                    </select>
                </div>
            `;

                mentorFieldsContainer.appendChild(newMentorFieldGroup);
            });

            // Event listener untuk tombol "Kurangi Mentor"
            document.getElementById('remove-mentor-button').addEventListener('click', function() {
                const mentorFieldsContainer = document.getElementById('mentor-fields-container');
                const mentorFieldGroups = mentorFieldsContainer.getElementsByClassName('mentor-field-group');

                // Hanya hapus jika ada lebih dari satu field mentor
                if (mentorFieldGroups.length > 1) {
                    mentorFieldsContainer.removeChild(mentorFieldGroups[mentorFieldGroups.length - 1]);
                } else {
                    alert("Minimal satu dosen harus tersedia.");
                }
            });
        </script>

    @endsection
