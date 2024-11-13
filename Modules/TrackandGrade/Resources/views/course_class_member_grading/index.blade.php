@extends ('layout.main-v3')

@section('title', 'Penilaian Tugas')

@section('content')
    <!-- Mulai Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Penilaian Tugas</h4>

                <!-- Mulai Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item active">Penilaian Tugas</li>
                    </ol>
                </div>
                <!-- Akhir Breadcrumb -->
            </div>
        </div>
    </div>
    <!-- Akhir Judul Halaman -->

    <!-- Mulai Konten -->
    <div class="row">
        <div class="col-12">
            <!-- Mulai Card Pemilihan Kelas -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Pilih Kelas</h4>

                    <!-- Mulai Pemilihan Kelas -->
                    <form action="{{ route('getGrade') }}" method="GET">
                        @csrf
                        <div class="row">
                            <div class="col-10">
                                <select class="form-control select2 w-100" name="class_id"
                                    data-placeholder="Pilih Kelas ...">
                                    @foreach ($class_list as $item)
                                        <option value="{{ $item->class_id }}"
                                            @if ($class_id == $item->class_id) selected @endif>
                                            {{ $item->course_name }} - Batch {{ $item->batch }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-2 d-flex align-items-center justify-content-end">
                                <button type="submit" class="btn btn-primary">Tampilkan</button>
                            </div>
                        </div>
                    </form>
                    <!-- Akhir Pemilihan Kelas -->
                </div>
            </div>
            <!-- Akhir Card Pemilihan Kelas -->

            <!-- Mulai Card DataTables -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Penilaian Tugas</h4>
                    <p class="card-title-desc">
                        Halaman ini menampilkan seluruh data pengumpulan tugas dalam format tabel interaktif yang dapat
                        disesuaikan. Setiap baris memberikan informasi penting seperti nama siswa, status pengumpulan, dan
                        komentar. Gunakan fitur <b>visibilitas kolom, pengurutan, dan pencarian kolom</b> untuk menyesuaikan
                        tampilan data sesuai kebutuhan Anda.
                    </p>

                    <!-- Mulai DataTables Pengumpulan Tugas -->
                    @if (count($data) > 0)
                        <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>Modul</th>
                                    <th>Hari</th>
                                    <th>Nama Siswa</th>
                                    <th>Berkas Tugas</th>
                                    <th>Waktu Pengumpulan</th>
                                    <th>Nilai</th>
                                    <th>Diperbarui Pada</th>
                                    <th>Komentar Siswa</th>
                                    <th>Komentar Tutor</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $data_index = 0; @endphp
                                @foreach ($data as $item)
                                    @foreach ($item->member_list as $key => $member)
                                        @php $data_index += 1; @endphp
                                        <tr>
                                            <td>{{ str_pad($data_index, 2, '0', STR_PAD_LEFT) }}</td>
                                            <td>{{ isset($member->submission) ? str_pad($member->submission->id, 2, '0', STR_PAD_LEFT) : '-' }}
                                            </td>
                                            <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                                title="{{ $item->module_name }}">
                                                {!! \Str::limit($item->module_name, 30) !!}
                                            </td>
                                            <td>{{ isset($item->parent->priority) ? str_pad($item->parent->priority, 2, '0', STR_PAD_LEFT) : '-' }}
                                            </td>
                                            <td>{{ $member->user_name }}</td>
                                            <td>{{ $member->submission->submitted_file ?? '-' }}</td>
                                            <td>{{ $member->submission->submitted_at ?? '-' }}</td>
                                            <td>{{ $member->submission->grade ?? '-' }}</td>
                                            <td>{{ $member->submission->updated_at ?? '-' }}</td>
                                            <td class="data-long" data-toggle="tooltip" data-placement="top"
                                                title="{{ $member->submission ? strip_tags($member->submission->comment) : '-' }}">
                                                {!! $member->submission && $member->submission->comment
                                                    ? \Str::limit(strip_tags($member->submission->comment), 30)
                                                    : '-' !!}
                                            </td>
                                            <td class="data-long" data-toggle="tooltip" data-placement="top"
                                                title="{{ $member->submission ? strip_tags($member->submission->tutor_comment) : '-' }}">
                                                {!! $member->submission && $member->submission->tutor_comment
                                                    ? \Str::limit(strip_tags($member->submission->tutor_comment), 30)
                                                    : '-' !!}
                                            </td>
                                            <td>
                                                @if (isset($member->submission))
                                                    <div
                                                        class="badge {{ $member->submission->grade ? 'bg-success' : 'bg-warning' }}">
                                                        {{ $member->submission->grade ? 'Sudah Dinilai' : 'Menunggu Penilaian' }}
                                                    </div>
                                                @else
                                                    <div class="badge bg-danger">Belum Mengumpulkan</div>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($member->submission)
                                                    <a href="{{ route('getEditGrade', ['id' => $member->submission->id]) }}"
                                                        class="btn btn-primary btn-sm">Nilai Tugas</a>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>Modul</th>
                                    <th>Hari</th>
                                    <th>Nama Siswa</th>
                                    <th>Berkas Tugas</th>
                                    <th>Waktu Pengumpulan</th>
                                    <th>Nilai</th>
                                    <th>Diperbarui Pada</th>
                                    <th>Komentar Siswa</th>
                                    <th>Komentar Tutor</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    @else
                        <p class="text-center text-muted">Silakan pilih kelas terlebih dahulu...</p>
                    @endif
                </div>
            </div>
            <!-- Akhir Card DataTables -->
        </div>
    </div>
    <!-- Akhir Konten -->
@endsection

@section('script')

@endsection
