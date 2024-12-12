@extends('layout.main-v3')

@section('title', 'Anggota Kelas')

@section('content')
    <!-- Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Ikhtisar Data</h4>

                <!-- Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Kelas</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCourseClass') }}">Daftar Kelas</a></li>
                        <li class="breadcrumb-item active">Daftar Anggota: {{ $courseClassDetail->course_name }}
                            {{ $courseClassDetail->batch }}</li>
                    </ol>
                </div>
                <!-- Akhir Breadcrumb -->
            </div>
        </div>
    </div>
    <!-- Akhir Judul Halaman -->

    <!-- Konten -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Anggota Kelas: {{ $courseClassDetail->course_name }} Batch
                        {{ $courseClassDetail->batch }}</h4>
                    <p class="card-title-desc">
                        Halaman ini memungkinkan Anda untuk mengelola dan memantau data anggota kelas yang tersedia di
                        platform. Setiap baris dalam tabel ini berisi informasi penting mengenai anggota kelas, termasuk
                        nama, catatan admin, status, dan tanggal pembaruan data.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li><strong>Visibilitas Kolom dan Pengurutan:</strong> Atur tampilan dengan mengurutkan kolom
                            tertentu untuk mempermudah pencarian data spesifik. Anda juga dapat menggunakan bilah pencarian
                            untuk mencari anggota tertentu berdasarkan nama atau ID.</li>
                        <li><strong>Ubah Data:</strong> Klik tombol <em>Ubah</em> pada kolom “Aksi” untuk memperbarui
                            informasi anggota kelas.</li>
                        <li><strong>Generate Sertifikat:</strong> Gunakan tombol <em>Generate Sertifikat</em> untuk membuat
                            sertifikat kelulusan anggota kelas secara otomatis.</li>
                        <li><strong>Status Anggota:</strong> Status anggota ditampilkan dalam kolom “Status.” Anggota dengan
                            status "Aktif" memiliki akses penuh ke kelas, sedangkan yang "Non Aktif" tidak memiliki akses.
                        </li>
                        <li><strong>Tambah Anggota Baru:</strong> Gunakan ikon <em>Tambah</em> di kanan bawah untuk
                            menambahkan anggota baru ke kelas.</li>
                    </ul>
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Nama</th>
                                <th class="data-medium">Email</th>
                                @if ($courseClassDetail->course_type_id == $mbkmType)
                                    <th>Mitra</th>
                                @endif
                                <th class="data-long">Catatan Admin</th>
                                <th>Dibuat Pada</th>
                                <th>Dibuat Oleh</th>
                                <th>Diperbarui Pada</th>
                                <th>Diperbarui Oleh</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courseClassMembers as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td class="batch" scope="row">{{ $item->user_name }}</td>
                                    <td class="batch" scope="row">{{ $item->user_email }}</td>
                                    @if ($courseClassDetail->course_type_id == $mbkmType)
                                        <td>{{ $item->partner_name }}</td>
                                    @endif
                                    <td class="data-long" data-toggle="tooltip" data-placement="top"
                                        title="{!! strip_tags($item->description) !!}">
                                        {!! !empty($item->description) ? \Str::limit($item->description, 30) : '-' !!}
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->created_id }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>{{ $item->updated_id }}</td>
                                    <td>
                                        <button
                                            class="btn btn-status {{ $item->status == 1 ? 'btn-success' : 'btn-danger' }}"
                                            data-id="{{ $item->id }}" data-status="{{ $item->status }}"
                                            data-model="CourseClassMember">
                                            {{ $item->status == 1 ? 'Aktif' : 'Nonaktif' }}
                                        </button>
                                    </td>
                                    <td>
                                        <a href="{{ route('getEditCourseClassMember', $item->id) }}"
                                            class="btn btn-primary rounded">Ubah</a>
                                        <a href="{{ route('getGenerateCertificate', ['course_class_member' => $item->id, 'user' => $item->user_id, 'course_class' => $courseClassDetail->id]) }}"
                                            class="btn btn-info rounded">Buat Sertifikat</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Nama</th>
                                <th>Email</th>
                                @if ($courseClassDetail->course_type_id == $mbkmType)
                                    <th>Mitra</th>
                                @endif
                                <th>Catatan Admin</th>
                                <th>Dibuat Pada</th>
                                <th>Dibuat Oleh</th>
                                <th>Diperbarui Pada</th>
                                <th>Diperbarui Oleh</th>
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

    <!-- Tombol FAB Tambah -->
    <div id="floating-whatsapp-button">
        @if (!empty($courseClassDetail->id))
            <a href="{{ route('getAddCourseClassMember', ['id' => $courseClassDetail->id]) }}" target="_blank"
                data-toggle="tooltip" title="Tambah Anggota Kelas">
            @else
                <a href="{{ route('getAddCourseClassMember') }}" target="_blank" data-toggle="tooltip"
                    title="Tambah Anggota Kelas">
        @endif
        <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- Akhir Tombol FAB Tambah -->
@endsection

@section('script')

@endsection
