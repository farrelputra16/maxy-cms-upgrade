@extends('layout.main-v3')

@section('title', 'Sub Modul Kelas Child')

@section('content')
    <!-- Begin Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Sub Modul untuk Modul Kelas</h4>

                <!-- Begin Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCourseClass') }}">Kelas</a></li>
                        <li class="breadcrumb-item"><a>Daftar Modul</a></li>
                        <li class="breadcrumb-item active">Konten: {{ $parent_module->detail->name }}</li>
                    </ol>
                </div>
                <!-- End Breadcrumb -->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Sub Modul dalam: {{ $parent_module->detail->name }}</h4>
                    <p class="card-title-desc">
                        Halaman ini menyediakan tampilan terorganisir dari semua modul anak yang termasuk dalam modul utama
                        ini. Setiap baris menampilkan detail utama, seperti nama modul, prioritas, tipe, konten, materi
                        mata kuliah, dan jadwal. Gunakan fitur <b>pengaturan kolom, pengurutan, dan pencarian</b> untuk
                        menyesuaikan tampilan sesuai kebutuhan dan menemukan modul tertentu dengan cepat.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li><strong>Atur Kolom:</strong> Gunakan pengurutan di header kolom untuk mengelompokkan data
                            berdasarkan hari atau tanggal.</li>
                        <li><strong>Lihat Catatan Admin Lengkap:</strong> Arahkan kursor ke catatan admin yang terpotong
                            untuk
                            melihat konten penuh.</li>
                        <li><strong>Ubah Modul:</strong> Klik tombol <em>Ubah</em> pada kolom “Aksi” untuk memperbarui
                            informasi modul yang ada.</li>
                        <li><strong>Kelola Jurnal:</strong> Tombol <em>Kelola Jurnal</em> memungkinkan Anda mengakses jurnal
                            terkait modul.</li>
                        <li><strong>Tambah Modul:</strong> Gunakan ikon <em>Tambah Modul Anak (+)</em> di kanan bawah untuk
                            menambahkan modul anak baru ke dalam modul ini.</li>
                    </ul>
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Modul Mata Kuliah</th>
                                <th>Prioritas</th>
                                <th>Tipe</th>
                                <th class="data-long">Konten</th>
                                <th class="data-long">Materi Mata Kuliah</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th class="data-long">Catatan Admin</th>
                                <th>Dibuat Pada</th>
                                <th>Id Pembuat</th>
                                <th>Diperbarui Pada</th>
                                <th>Id Pembaru</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($child_modules as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td class="batch" scope="row">{{ $item->course_module_name }}</td>
                                    <td data-toggle="tooltip" data-placement="top" title="Urutan prioritas dalam modul">
                                        {{ $item->priority }} </td>
                                    <td>{{ $item->type }}</td>
                                    <td class="data-long" data-toggle="tooltip" data-placement="top"
                                        title="{!! strip_tags($item->content) !!}">
                                        {!! !empty($item->content) ? \Str::limit($item->content, 30) : '-' !!}
                                    </td>
                                    <td class="data-long" data-toggle="tooltip" data-placement="top"
                                        title="{!! strip_tags($item->course_module_material) !!}">
                                        {!! !empty($item->course_module_material) ? \Str::limit($item->course_module_material, 30) : '-' !!}
                                    </td>
                                    <td>{{ $item->start_date }}</td>
                                    <td>{{ $item->end_date }}</td>
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
                                            class="btn btn-status-entities {{ $item->status == 1 ? 'btn-success' : 'btn-danger' }}"
                                            data-id="{{ $item->id }}" data-status="{{ $item->status }}"
                                            data-parent="ClassContentManagement" data-model="CourseClassModule">
                                            {{ $item->status == 1 ? 'Aktif' : 'Nonaktif' }}
                                        </button>
                                    </td>
                                    <td>
                                        {{-- <div class="btn-group"> --}}
                                        <a href="{{ route('getEditCourseClassChildModule', ['id' => $item->id, 'parent_id' => $parent_module->id]) }}"
                                            class="btn btn-primary rounded">Ubah</a>
                                        <a href="{{ route('getJournalCourseClassChildModule', ['id' => $item->id]) }}"
                                            class="btn btn-outline-primary rounded">Kelola Jurnal</a>
                                        {{-- </div> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Modul Mata Kuliah</th>
                                <th>Prioritas</th>
                                <th>Tipe</th>
                                <th>Konten</th>
                                <th>Materi Mata Kuliah</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Catatan Admin</th>
                                <th>Dibuat Pada</th>
                                <th>Id Pembuat</th>
                                <th>Diperbarui Pada</th>
                                <th>Id Pembaru</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->

    <!-- FAB Add Starts -->
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddCourseClassChildModule', ['id' => $parent_module->id]) }}" target="_blank"
            data-toggle="tooltip" title="Tambah Modul Anak">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- FAB Add Ends -->
@endsection

@section('script')

@endsection
