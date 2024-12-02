@extends('layout.main-v3')

@section('title', 'Duplikasi Kelas')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Tambah Duplikasi Kelas</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCourseClass') }}">Kelas</a></li>
                        <li class="breadcrumb-item active">Duplikasi Kelas</li>
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

                    <p class="card-title-desc">
                        Halaman ini memungkinkan Anda untuk menduplikasi kelas yang sudah ada dengan menambahkan kelas baru.
                        Pastikan semua informasi yang diisi sudah benar agar proses pembelajaran dapat berjalan dengan
                        lancar dan optimal.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li>Isi kolom <strong>Mata Kuliah</strong> dengan memilih mata kuliah yang sesuai dari daftar yang
                            tersedia.</li>
                        <li>Masukkan <strong>Batch</strong> untuk menentukan kelas paralel dari kelas baru yang akan dibuat.
                        </li>
                        <li>Gunakan tombol <strong>'Duplikasi Modul Mata Kuliah'</strong> untuk menyimpan dan membuat kelas
                            baru.</li>
                    </ul>
                    </p>


                    <form action="{{ route('postDuplicateCourseClass') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <br>
                        <h4><b>Pilih Kelas</b></h4>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Kelas</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="course_class_id"
                                    data-placeholder="Pilih kelas yang ingin diduplikasi..." id="type_selector">
                                    @foreach ($class_list as $item)
                                        <option value="{{ $item->id }}">{{ $item->course_name }} Kelas Paralel
                                            {{ $item->batch }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('courseid'))
                                    @foreach ($errors->get('courseid') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <br>
                        <h4><b>Kelas Baru</b></h4>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Mata Kuliah</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="course_id"
                                    data-placeholder="Pilih mata kuliah untuk kelas baru..." id="type_selector">
                                    @foreach ($course_list as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('course_id'))
                                    @foreach ($errors->get('course_id') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Kelas Paralel</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="batch"
                                    placeholder="Masukkan kelas paralel (contoh: 2024)">
                                @if ($errors->has('batch'))
                                    @foreach ($errors->get('batch') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Semester</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="semester" placeholder="Masukkan Semester">
                                @if ($errors->has('semester'))
                                    @foreach ($errors->get('semester') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="class_type_id" class="col-md-2 col-form-label">Jenis Kelas <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <select id="class_type_id" class="form-control select2" name="class_type_id"
                                    data-placeholder="Pilih Mata Kuliah yang tersedia">
                                    @foreach ($allClassType as $ctype)
                                        <option value="{{ $ctype->id }}"
                                            {{ old('class_type_id') == $ctype->id ? 'selected' : '' }}>
                                            {{ $ctype->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('class_type_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
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
                                <button type="submit" class="btn btn-primary w-md text-center">Duplikasi Kelas Mata
                                    Kuliah</button>
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
