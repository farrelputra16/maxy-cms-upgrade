@extends('layout.main-v3')

@section('title', 'Edit Anggota Kelas')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Edit Data</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCourseClass') }}">Kelas</a></li>
                        <li class="breadcrumb-item"><a href="">Daftar Anggota</a></li>
                        <li class="breadcrumb-item active">Edit Anggota Kelas</li>
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

                    <h4 class="card-title">Edit Anggota Kelas: {{ $courseClassMember->id }} -
                        {{ $courseClassMember->user->name }} di Kelas: {{ $courseClassMember->courseClass->course->name }}
                        Batch {{ $courseClassMember->courseClass->batch }}</h4>
                    <p class="card-title-desc">
                        Halaman ini memungkinkan Anda untuk memperbarui informasi anggota kelas. Pastikan semua data yang
                        Anda masukkan akurat untuk mendukung pengalaman belajar yang optimal bagi peserta.
                        <br><br>
                        <strong>Tips:</strong>
                    <ul>
                        <li><strong>Dosen:</strong> Atur dosen yang bertanggung jawab untuk peserta ini, termasuk
                            deskripsi tugasnya.</li>
                        <li><strong>Status:</strong> Pastikan status keanggotaan peserta diatur sesuai dengan kondisi
                            terkini.</li>
                    </ul>
                    </p>

                    <form action="{{ route('postEditCourseClassMember', $courseClassMember->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $courseClassMember->id }}">
                        <input type="hidden" name="cc_id" value="{{ $courseClassMember->course_class_id }}">
                        <input type="hidden" name="member_id" value="{{ $users }}">

                        @if (env('APP_ENV') != 'local')
                            <div class="mb-3 row">
                                <label for="dailyScore" class="col-md-2 col-form-label">Nilai Harian</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="number" name="daily_score"
                                        placeholder="Masukkan nilai harian"
                                        value="{{ old('daily_score', $courseClassMember->daily_score) }}" id="dailyScore"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                    @error('daily_score')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="absenceScore" class="col-md-2 col-form-label">Nilai Absensi</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="number" name="absence_score"
                                        placeholder="Masukkan nilai absensi"
                                        value="{{ old('absence_score', $courseClassMember->absence_score) }}"
                                        id="absenceScore" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                    @error('absence_score')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="hackathon1Score" class="col-md-2 col-form-label">Hackathon 1 Score</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="number" name="hackathon_1_score"
                                        placeholder="Masukkan nilai hackathon ke-1"
                                        value="{{ old('hackathon_1_score', $courseClassMember->hackathon_1_score) }}"
                                        id="hackathon1Score" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                    @error('hackathon_1_score')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="hackathon2Score" class="col-md-2 col-form-label">Hackathon 2 Score</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="number" name="hackathon_2_score"
                                        placeholder="Masukkan nilai hackathon ke-2"
                                        value="{{ old('hackathon_2_score', $courseClassMember->hackathon_2_score) }}"
                                        id="hackathon2Score" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                    @error('hackathon_2_score')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="internshipScore" class="col-md-2 col-form-label">Internship Score</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="number" name="internship_score"
                                        placeholder="Masukkan nilai internship"
                                        value="{{ old('internship_score', $courseClassMember->internship_score) }}"
                                        id="internshipScore" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                    @error('internship_score')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="finalScore" class="col-md-2 col-form-label">Final Score</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="number" name="final_score"
                                        value="{{ old('final_score', $courseClassMember->final_score) }}" id="finalScore"
                                        readonly>
                                    @error('final_score')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        @endif

                        <!-- Mentor Fields -->
                        <div id="mentor-fields-container">
                            @foreach ($currentMentors as $index => $currentMentor)
                                <div class="mb-3 row mentor-field-group">
                                    <label for="mentor_{{ $index }}" class="col-md-2 col-form-label">Pilih Dosen:
                                    </label>
                                    <div class="col-md-4">
                                        <select class="form-control select2 mentor-select" name="mentor[]">
                                            <option value="">Pilih Dosen</option>
                                            @foreach ($mentors as $mentor)
                                                <option value="{{ $mentor->id }}"
                                                    {{ old('mentor.' . $index, $currentMentor->mentor_id) == $mentor->id ? 'selected' : '' }}>
                                                    {{ $mentor->email }} - {{ $mentor->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label for="jobdesc_{{ $index }}" class="col-md-2 col-form-label">Deskripsi
                                        Pekerjaan</label>
                                    <div class="col-md-4">
                                        <select name="jobdesc[]" class="form-control select2 jobdesc-select">
                                            <option value="">Pilih Deskripsi Pekerjaan</option>
                                            @foreach ($jobdescriptions as $jobdesc)
                                                <option value="{{ $jobdesc->id }}"
                                                    {{ old('jobdesc.' . $index, $currentMentor->m_jobdesc_id) == $jobdesc->id ? 'selected' : '' }}>
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
                                        <option value="">Pilih Partner</option>
                                        @foreach ($partners as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('partner') == $item->id ? 'selected' : '' }}
                                                @if ($item->id == $courseClassMember->m_partner_id) selected @endif>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endif
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Deskripsi</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="content">{{ old('content', $courseClassMember->description) }}</textarea>
                            </div>
                        </div>
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    value="1" {{ old('status', $courseClassMember->status) == 1 ? 'checked' : '' }}
                                    name="status">
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
    <script>
        // Elemen input untuk nilai
        let dailyScoreEl = $("input[name='daily_score']");
        let absenceScoreEl = $("input[name='absence_score']");
        let hackathon1ScoreEl = $("input[name='hackathon_1_score']");
        let hackathon2ScoreEl = $("input[name='hackathon_2_score']");
        let internshipScoreEl = $("input[name='internship_score']");
        let finalScoreEl = $("input[name='final_score']");

        // Fungsi untuk menghitung nilai akhir
        function calculateFinalScore() {
            let dailyScore = parseFloat(dailyScoreEl.val()) || 0;
            let absenceScore = parseFloat(absenceScoreEl.val()) || 0;
            let hackathon1Score = hackathon1ScoreEl.length ? parseFloat(hackathon1ScoreEl.val()) || 0 : 0;
            let hackathon2Score = hackathon2ScoreEl.length ? parseFloat(hackathon2ScoreEl.val()) || 0 : 0;
            let internshipScore = internshipScoreEl.length ? parseFloat(internshipScoreEl.val()) || 0 : 0;

            let finalScore = (dailyScore * 0.15) + (absenceScore * 0.05) +
                (hackathon1Score * 0.25) + (hackathon2Score * 0.25) +
                (internshipScore * 0.30);
            finalScoreEl.val(finalScore.toFixed(2));
        }

        // Event listener untuk perhitungan otomatis saat nilai diubah
        dailyScoreEl.on('input', calculateFinalScore);
        absenceScoreEl.on('input', calculateFinalScore);
        if (hackathon1ScoreEl.length) hackathon1ScoreEl.on('input', calculateFinalScore);
        if (hackathon2ScoreEl.length) hackathon2ScoreEl.on('input', calculateFinalScore);
        if (internshipScoreEl.length) internshipScoreEl.on('input', calculateFinalScore);
    </script>

    <script>
        // Fungsi untuk menambah mentor baru
        document.getElementById('add-mentor-button').addEventListener('click', function() {
            const mentorFieldsContainer = document.getElementById('mentor-fields-container');
            const newMentorFieldGroup = document.createElement('div');
            newMentorFieldGroup.className = 'mb-3 row mentor-field-group';

            newMentorFieldGroup.innerHTML = `
            <label for="mentor" class="col-md-2 col-form-label">Pilih Dosen: </label>
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
            <label for="jobdesc" class="col-md-2 col-form-label">Deskripsi Pekerjaan</label>
            <div class="col-md-4">
                <select name="jobdesc[]" class="form-control select2 jobdesc-select" data-placeholder="Pilih Deskripsi Pekerjaan">
                    <option value="">Pilih Deskripsi Pekerjaan</option>
                    @foreach ($jobdescriptions as $jobdesc)
                        <option value="{{ $jobdesc->id }}">{{ $jobdesc->name }}</option>
                    @endforeach
                </select>
            </div>
        `;

            mentorFieldsContainer.appendChild(newMentorFieldGroup);

            // Inisialisasi kembali Select2 untuk elemen baru
            $(newMentorFieldGroup).find('.select2').select2();
        });

        // Fungsi untuk mengurangi mentor
        document.getElementById('remove-mentor-button').addEventListener('click', function() {
            const mentorFieldsContainer = document.getElementById('mentor-fields-container');
            const mentorFieldGroups = mentorFieldsContainer.getElementsByClassName('mentor-field-group');

            // Hanya hapus jika ada lebih dari satu field mentor
            if (mentorFieldGroups.length > 1) {
                mentorFieldsContainer.removeChild(mentorFieldGroups[mentorFieldGroups.length - 1]);
            } else {
                alert("Minimal satu mentor harus tersedia.");
            }
        });
    </script>

@endsection
