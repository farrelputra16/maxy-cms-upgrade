@extends('layout.main-v3')

@section('title', 'Presensi Mahasiswa')

@section('content')
    <!-- Mulai Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Ikhtisar Data Presensi</h4>

                <!-- Mulai Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCourseClass') }}">Kelas</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Presensi</a></li>
                        <li class="breadcrumb-item active">Presensi Mahasiswa</li>
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
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Presensi {{ $class->course_name }} Batch {{ $class->batch }}</h4>
                    <p class="card-title-desc">
                        Di halaman ini, Anda dapat melihat dan mengelola data presensi seluruh mahasiswa. Setiap baris
                        menampilkan data penting seperti nama mahasiswa, status kehadiran, dan deskripsi. Anda dapat
                        menggunakan fitur <b>tampilan kolom, pengurutan, dan pencarian</b> untuk menyesuaikan tampilan
                        sesuai kebutuhan.
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th class="data-medium">Nama</th>
                                <th class="data-medium">Feedback</th>
                                <th class="data-long">Deskripsi</th>
                                <th>Dibuat Pada</th>
                                <th>ID Pembuat</th>
                                <th>Diperbarui Pada</th>
                                <th>ID Pembaru</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendance as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->attendance ? $item->attendance->id : '-' }}</td>
                                    <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                        title="{{ $item->user_name }}">
                                        {!! \Str::limit($item->user_name, 30) !!}
                                    </td>
                                    <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                        title="{{ $item->attendance ? $item->attendance->feedback : '-' }}">
                                        {!! \Str::limit($item->attendance ? $item->attendance->feedback : '-', 30) !!}
                                    </td>
                                    <td class="data-long" data-toggle="tooltip" data-placement="top"
                                        title="{!! strip_tags($item->attendance ? $item->attendance->description : '-') !!}">
                                        {!! !empty($item->attendance) ? \Str::limit($item->attendance->description, 30) : '-' !!}
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->created_id }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>{{ $item->updated_id }}</td>
                                    <td value="{{ $item->attendance ? $item->attendance->status : 0 }}">
                                        @if ($item->attendance)
                                            @if ($item->attendance->status == 0)
                                                <span class="badge bg-danger">Tidak Hadir</span>
                                            @elseif ($item->attendance->status == 1)
                                                <span class="badge bg-primary">Hadir</span>
                                            @elseif($item->attendance->status == 2)
                                                <span class="badge bg-warning">Izin</span>
                                            @endif
                                        @else
                                            <span class="badge bg-danger">Tidak Hadir</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->attendance)
                                            <a href="{{ route('getEditMemberAttendance', ['id' => $item->attendance->id, 'class_id' => $class->id, 'class_attendance_id' => $class_attendance_id]) }}"
                                                class="btn btn-primary">Ubah</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th class="data-medium">Nama</th>
                                <th class="data-medium">Feedback</th>
                                <th class="data-long">Deskripsi</th>
                                <th>Dibuat Pada</th>
                                <th>ID Pembuat</th>
                                <th>Diperbarui Pada</th>
                                <th>ID Pembaru</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Konten -->

@endsection

@section('script')

@endsection
