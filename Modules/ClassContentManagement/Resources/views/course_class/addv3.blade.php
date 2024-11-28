@extends('layout.main-v3')

@section('title', 'Tambah Kelas Mata Kuliah Baru')

@section('content')
    <!-- Mulai Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Tambah Kelas Mata Kuliah Baru</h4>

                <!-- Mulai Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCourseClass') }}">Daftar Kelas</a></li>
                        <li class="breadcrumb-item active">Tambah Kelas Mata Kuliah Baru</li>
                    </ol>
                </div>
                <!-- Akhir Breadcrumb -->
            </div>
        </div>
    </div>
    <!-- Akhir Judul Halaman -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Buat Kelas Mata Kuliah Baru</h4>
                    <p class="card-title-desc">Isi informasi berikut dengan cermat untuk menambahkan kelas baru. Informasi
                        yang lengkap dan akurat akan memastikan pengalaman belajar terbaik bagi peserta.</p>

                    <form id="addCourseClass" action="{{ route('postAddCourseClass') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3 row">
                            <label for="type_selector" class="col-md-2 col-form-label">Mata Kuliah <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="course_id" id="type_selector"
                                    data-placeholder="Pilih Mata Kuliah yang tersedia">
                                    @foreach ($allCourses as $course)
                                        <option value="{{ $course->id }}" data-slug="{{ $course->slug }}"
                                            {{ old('course_id') == $course->id ? 'selected' : '' }}>
                                            {{ $course->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('course_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="batch" class="col-md-2 col-form-label">Kelas Paralel <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="batch" id="batch"
                                    placeholder="Masukkan tahun kelas paralel (contoh: 2023)" value="{{ old('batch') }}">
                                @error('batch')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="slug" class="col-md-2 col-form-label">Slug <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="slug" id="slug"
                                    value="{{ old('slug') }}"
                                    placeholder="Slug akan diisi otomatis berdasarkan mata kuliah dan kelas paralel" readonly>
                                @error('slug')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="start" class="col-md-2 col-form-label">Tanggal Mulai <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="date" name="start" id="start"
                                    value="{{ old('start') }}">
                                @error('start')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="end" class="col-md-2 col-form-label">Tanggal Selesai <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="date" name="end" id="end"
                                    value="{{ old('end') }}">
                                @error('end')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="quota" class="col-md-2 col-form-label">Kuota Peserta <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="quota" min="0" id="quota"
                                    placeholder="Jumlah peserta maksimal (misalnya: 40)" value="{{ old('quota') }}"
                                    min="1">
                                @error('quota')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="credits" class="col-md-2 col-form-label">Semester <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="semester" id="semester"
                                    placeholder="Masukkan semester (misalnya: 1)" value="{{ old('semester') }}"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="credits" class="col-md-2 col-form-label">Kredit (SKS) <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="credits" id="credits"
                                    placeholder="Masukkan jumlah SKS (misalnya: 3)" value="{{ old('credits') }}"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="duration" class="col-md-2 col-form-label">Durasi (menit) <span
                                    class="text-danger" data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="duration" id="duration"
                                    placeholder="Durasi kelas dalam menit (misalnya: 90)" value="{{ old('duration') }}"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="announcement" class="col-md-2 col-form-label">Pengumuman</label>
                            <div class="col-md-10">
                                <textarea class="form-control" id="elm1" name="announcement"
                                    placeholder="Tambahkan pengumuman khusus untuk kelas, misalnya: 'Kelas ini akan dimulai tepat pukul 08:00 setiap hari Rabu. Harap membawa kalkulator dan buku catatan untuk setiap pertemuan.'">{{ old('announcement') }}</textarea>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="content" class="col-md-2 col-form-label">Konten Kelas</label>
                            <div class="col-md-10">
                                <textarea class="form-control" id="content" name="content"
                                    placeholder="Deskripsikan konten kelas yang akan diajarkan, misalnya: 'Kelas ini mencakup konsep dasar Akuntansi Keuangan, termasuk jurnal umum, buku besar, neraca saldo, dan laporan keuangan. Mahasiswa juga akan belajar cara menggunakan perangkat lunak akuntansi modern untuk mencatat dan menganalisis data keuangan.'">{{ old('content') }}</textarea>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="description" class="col-md-2 col-form-label">Catatan Admin</label>
                            <div class="col-md-10">
                                <textarea class="form-control" id="content" name="description"
                                    placeholder="Deskripsi singkat mengenai kelas, misalnya: 'Kelas Akuntansi Keuangan dirancang untuk memberikan pemahaman dasar tentang pencatatan dan pelaporan keuangan yang penting untuk manajemen bisnis dan pengambilan keputusan strategis.'">{{ old('description') }}</textarea>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="ongoing" class="col-md-2 col-form-label">Status Kelas <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="ongoing" id="ongoing"
                                    data-placeholder="Pilih Status Kelas">
                                    <option value="" disabled selected>Pilih Status...</option>
                                    <option value="0" {{ old('ongoing') == '0' ? 'selected' : '' }}>Belum Dimulai
                                    </option>
                                    <option value="1" {{ old('ongoing') == '1' ? 'selected' : '' }}>Sedang Berjalan
                                    </option>
                                    <option value="2" {{ old('ongoing') == '2' ? 'selected' : '' }}>Selesai</option>
                                </select>
                                @error('ongoing')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-switch form-switch-md mb-3 p-0">
                            <label class="col-md-2 col-form-label" for="statusSwitch">Status Aktif</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="statusSwitch" name="status"
                                    {{ old('status') ? 'checked' : '' }}>
                                <label for="statusSwitch" class="m-0 ms-2">Aktif</label>
                            </div>
                        </div>

                        <div class="mb-3 row justify-content-end">
                            <div class="col-md-10 text-end">
                                <button type="submit" class="custom-btn-submit btn btn-primary w-md"
                                    form="addCourseClass">Simpan Kelas</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const batchInput = document.getElementById('batch');
            const slugInput = document.getElementById('slug');

            function updateSlug() {
                const selectedCourse = $('#type_selector').find(':selected');
                const courseSlug = selectedCourse.data('slug') || '';
                const batchValue = batchInput.value;

                slugInput.value = `${courseSlug}-${batchValue}`;
            }

            $('#type_selector').on('change', function() {
                updateSlug();
            });

            batchInput.addEventListener('input', updateSlug);
        });
    </script>
@endsection
