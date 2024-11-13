@extends('layout.main-v3')

@section('title', 'Modul Kelas Child')

@section('content')
    <!-- Begin Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Modul Child untuk Modul Kelas</h4>

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
                    <h4 class="card-title">Modul Child dalam: {{ $parent_module->detail->name }}</h4>
                    <p class="card-title-desc">
                        Halaman ini menyediakan tampilan terorganisir dari semua modul anak yang termasuk dalam modul utama
                        ini. Setiap baris menampilkan detail utama, seperti nama modul, prioritas, tipe, konten, materi
                        kursus, dan jadwal. Gunakan fitur <b>pengaturan kolom, pengurutan, dan pencarian</b> untuk
                        menyesuaikan tampilan sesuai kebutuhan dan menemukan modul tertentu dengan cepat.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li><strong>Atur Kolom:</strong> Gunakan pengurutan di header kolom untuk mengelompokkan data
                            berdasarkan hari atau tanggal.</li>
                        <li><strong>Lihat Deskripsi Lengkap:</strong> Arahkan kursor ke deskripsi yang terpotong untuk
                            melihat konten penuh.</li>
                        <li><strong>Edit Modul:</strong> Klik tombol <em>Edit</em> pada kolom “Aksi” untuk memperbarui
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
                                <th class="data-medium">Modul Kursus</th>
                                <th>Prioritas</th>
                                <th>Tipe</th>
                                <th class="data-long">Konten</th>
                                <th class="data-long">Materi Kursus</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th class="data-long">Deskripsi</th>
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
                                        title="{!! strip_tags($item->course_module_content) !!}">
                                        {!! !empty($item->course_module_content) ? \Str::limit($item->course_module_content, 30) : '-' !!}
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
                                    <td value="{{ $item->status }}">
                                        @if ($item->status == 1)
                                            <a class="btn btn-success" style="pointer-events: none;">Aktif</a>
                                        @else
                                            <a class="btn btn-danger" style="pointer-events: none;">Tidak Aktif</a>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- <div class="btn-group"> --}}
                                        <a href="{{ route('getEditCourseClassChildModule', ['id' => $item->id, 'parent_id' => $parent_module->id]) }}"
                                            class="btn btn-primary rounded">Edit</a>
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
                                <th>Modul Kursus</th>
                                <th>Prioritas</th>
                                <th>Tipe</th>
                                <th>Konten</th>
                                <th>Materi Kursus</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Deskripsi</th>
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
