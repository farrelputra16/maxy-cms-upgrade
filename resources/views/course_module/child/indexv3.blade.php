@extends('layout.main-v3')

@section('title', 'Sub Modul Mata Kuliah')

@section('content')
    <!-- Awal Halaman Judul -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Ringkasan Data</h4>

                <!-- Awal Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        @if ($bcMBKM == true)
                            <li class="breadcrumb-item"><a href="{{ route('getCourseMBKM') }}">MBKM</a></li>
                        @else
                            <li class="breadcrumb-item"><a href="{{ route('getCourse') }}">Mata Kuliah</a></li>
                        @endif
                        <li class="breadcrumb-item"><a
                                href="{{ route('getCourseModule', ['course_id' => $parent_module_detail->course_id, 'page_type' => 'LMS']) }}">Modul
                                {{ $bcMBKM ? 'MBKM' : 'Mata Kuliah' }}</a></li>
                        <li class="breadcrumb-item active">Sub Modul: {{ $parent_module_detail->name }}</li>
                    </ol>
                </div>
                <!-- Akhir Breadcrumb -->
            </div>
        </div>
    </div>
    <!-- Akhir Halaman Judul -->

    <!-- Awal Konten -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Sub Modul untuk Mata Kuliah: {{ $parent_module_detail->name }}</h4>
                    <p class="card-title-desc">
                        Halaman ini menampilkan daftar sub modul yang terkait dengan modul utama mata kuliah tertentu,
                        dalam format tabel interaktif. Anda dapat melihat detail utama, seperti nama modul, prioritas,
                        jenis, materi, dan status. Fitur <b>pencarian, pengurutan, dan visibilitas kolom</b> membantu Anda
                        menyesuaikan tampilan dan menemukan data dengan cepat.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li>Pilih kolom tertentu yang ingin ditampilkan atau disembunyikan untuk menyesuaikan tampilan data
                            sesuai kebutuhan.</li>
                        <li>Gunakan fitur pengurutan untuk mengurutkan data berdasarkan prioritas, jenis, atau waktu
                            pembuatan.</li>
                        <li>Manfaatkan pencarian kolom untuk menemukan modul tertentu dengan cepat berdasarkan kata kunci.
                        </li>
                        <li>Tekan tombol <b>Ubah</b> pada kolom Aksi untuk memperbarui informasi sub modul atau mengubah
                            status aktif/nonaktif modul.</li>
                        <li>Klik tombol <b>Tambah</b> di sudut kanan bawah untuk menambahkan sub modul baru ke dalam modul
                            utama.</li>
                    </ul>
                    </p>


                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Nama Modul</th>
                                <th>Prioritas</th>
                                <th>Jenis</th>
                                <th class="data-long">Materi</th>
                                <th class="data-long">Konten</th>
                                <th class="data-long">Catatan Admin</th>
                                <th>Dibuat Pada</th>
                                <th>Id Pembuat</th>
                                <th>Diperbarui Pada</th>
                                <th>Id Pembaruan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sub_modules as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->id }}</td>

                                    <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                        title="{{ $item->name }}">
                                        {!! \Str::limit($item->name, 30) !!}
                                    </td>

                                    <td>{{ $item->priority }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td class="data-long" data-toggle="tooltip" data-placement="top"
                                        title="{{ strip_tags($item->material) }}">
                                        {{ !empty($item->material) ? \Str::limit(strip_tags($item->material), 10) : '-' }}
                                    </td>
                                    <td class="data-long" data-toggle="tooltip" data-placement="top"
                                        title="{{ strip_tags($item->content) }}">
                                        {{ !empty($item->content) ? \Str::limit(strip_tags($item->content), 30) : '-' }}
                                    </td>
                                    <td class="data-long" data-toggle="tooltip" data-placement="top"
                                        title="{{ strip_tags($item->description) }}">
                                        {{ !empty($item->description) ? \Str::limit(strip_tags($item->description), 30) : '-' }}
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->created_id }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>{{ $item->updated_id }}</td>
                                    <td>
                                        <button
                                            class="btn btn-status {{ $item->status == 1 ? 'btn-success' : 'btn-danger' }}"
                                            data-id="{{ $item->id }}" data-status="{{ $item->status }}"
                                            data-model="CourseModule">
                                            {{ $item->status == 1 ? 'Aktif' : 'Nonaktif' }}
                                        </button>
                                    </td>
                                    <td>
                                        <a href="{{ route('getEditChildModule', ['id' => $item->id]) }}"
                                            class="btn btn-primary rounded">Ubah</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Nama Modul</th>
                                <th>Prioritas</th>
                                <th>Jenis</th>
                                <th>Materi</th>
                                <th>Konten</th>
                                <th>Catatan Admin</th>
                                <th>Dibuat Pada</th>
                                <th>Id Pembuat</th>
                                <th>Diperbarui Pada</th>
                                <th>Id Pembaruan</th>
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

    <!-- FAB Tambah Mulai -->
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddCourseChildModule', ['id' => $parent_module_detail->id, 'course_id' => $course_detail->id, 'page_type' => $page_type]) }}"
            target="_blank">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- FAB Tambah Selesai -->
@endsection

@section('script')

@endsection
