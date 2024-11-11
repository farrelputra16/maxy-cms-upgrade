@extends('layout.main-v3')

@section('title', 'MBKM')

@section('content')
    <!-- Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Ringkasan Data MBKM</h4>

                <!-- Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        <li class="breadcrumb-item active">MBKM</li>
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
                    <h4 class="card-title">MBKM</h4>
                    <p class="card-title-desc">
                        Halaman ini memberikan gambaran umum mengenai program MBKM yang tersedia. Anda dapat melihat
                        informasi inti dari setiap program, termasuk nama, ringkasan, dan status aktif.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li><strong>Mencari Data:</strong> Gunakan kolom pencarian untuk menemukan program MBKM berdasarkan
                            nama atau deskripsi.</li>
                        <li><strong>Mengurutkan Kolom:</strong> Klik pada judul kolom untuk mengurutkan data berdasarkan
                            kriteria tertentu seperti "Tanggal Dibuat" atau "Status".</li>
                        <li><strong>Mengedit Data:</strong> Klik tombol <em>Edit</em> di kolom "Tindakan" untuk mengubah
                            informasi program MBKM yang ada.</li>
                        <li><strong>Melihat Daftar Modul:</strong> Gunakan tombol <em>Daftar Modul</em> untuk melihat atau
                            menambahkan modul terkait dengan program yang dipilih.</li>
                        <li><strong>Menambah Data Baru:</strong> Klik tombol <em>Tambah Program MBKM</em> (+) di pojok kanan
                            bawah untuk membuka form penambahan data program baru. Isi form dengan lengkap, lalu klik
                            <em>Simpan</em> untuk menambah data program MBKM baru ke dalam daftar.</li>
                    </ul>
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Program MBKM</th>
                                <th class="data-medium">Ringkasan Singkat</th>
                                <th class="data-long">Detail Ringkasan</th>
                                <th class="data-long">Konten Tambahan</th>
                                <th>Waktu Dibuat</th>
                                <th>Dibuat Oleh</th>
                                <th>Waktu Diperbarui</th>
                                <th>Diperbarui Oleh</th>
                                <th>Status</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                        title="{{ $item->name }}">
                                        {!! \Str::limit($item->name, 30) !!}
                                    </td>
                                    <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                        title="{{ $item->short_description }}">
                                        {!! !empty($item->short_description) ? \Str::limit($item->short_description, 30) : '-' !!}
                                    </td>
                                    <td class="data-long" data-toggle="tooltip" data-placement="top"
                                        title="{!! strip_tags($item->description) !!}">
                                        {!! !empty($item->description) ? \Str::limit($item->description, 30) : '-' !!}
                                    </td>
                                    <td class="data-long" data-toggle="tooltip" data-placement="top"
                                        title="{!! strip_tags($item->content) !!}">
                                        {!! !empty($item->content) ? \Str::limit($item->content, 30) : '-' !!}
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->created_id }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>{{ $item->updated_id }}</td>
                                    <td value="{{ $item->status }}">
                                        @if ($item->status == 1)
                                            <a class="btn btn-success" style="pointer-events: none;">Aktif</a>
                                        @else
                                            <a class="btn btn-danger" style="pointer-events: none;">Non Aktif</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('getEditMBKM', ['id' => $item->id]) }}"
                                            class="btn btn-primary rounded">Edit</a>
                                        <a href="{{ route('getCourseModule', ['course_id' => $item->id, 'page_type' => 'LMS']) }}"
                                            class="btn btn-outline-primary rounded">Daftar Modul</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Program MBKM</th>
                                <th class="data-medium">Ringkasan Singkat</th>
                                <th class="data-long">Detail Ringkasan</th>
                                <th class="data-long">Konten Tambahan</th>
                                <th>Waktu Dibuat</th>
                                <th>Dibuat Oleh</th>
                                <th>Waktu Diperbarui</th>
                                <th>Diperbarui Oleh</th>
                                <th>Status</th>
                                <th>Tindakan</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Konten -->

    <!-- FAB untuk Tambah -->
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddMBKM') }}" target="_blank">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- Akhir FAB -->
@endsection

@section('script')
    @if (session('course_added'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: 'Informasi!',
                    html: "<strong>{{ session('course_added') }}</strong>",
                    icon: 'info',
                    confirmButtonText: 'OK',
                });
            });
        </script>
    @endif
@endsection
