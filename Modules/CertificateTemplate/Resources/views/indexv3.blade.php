@extends('layout.main-v3')

@section('title', 'Template Sertifikat')

@section('content')
    <!-- Begin Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Template Sertifikat</h4>

                <!-- Begin Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        <li class="breadcrumb-item active">Template Sertifikat</li>
                    </ol>
                </div>
                <!-- End Breadcrumb -->
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Begin Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Template Sertifikat</h4>
                    <p class="card-title-desc">
                        Halaman ini menampilkan semua template sertifikat dalam tabel interaktif yang terorganisir. Setiap
                        baris memberikan informasi penting mengenai setiap template, seperti jenis kursus, batch, status
                        penanda, dan konten template. Gunakan fitur <b>visibilitas kolom, pengurutan, dan pencarian</b>
                        untuk menyesuaikan tampilan Anda dan menemukan template tertentu dengan cepat. Arahkan kursor ke
                        teks yang terpotong untuk melihat deskripsi lengkap.
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100"
                        data-colvis="[1, 6, 7, 8, 9]">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Jenis Kursus - Batch</th>
                                <th>Gambar</th>
                                <th>Status Penanda</th>
                                <th>Konten Template</th>
                                <th>Dibuat Pada</th>
                                <th>ID Pembuat</th>
                                <th>Diperbarui Pada</th>
                                <th>ID Pembaruan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($certificateTemplates as $key => $certificateTemplate)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $certificateTemplate->id }}</td>
                                    <td>{{ $certificateTemplate->type->name . ' - ' . "Batch $certificateTemplate->batch" ?? '-' }}
                                    </td>
                                    <td>
                                        <img src="{{ asset('uploads/certificate/' . $certificateTemplate->type->id . '/' . $certificateTemplate->filename) }}"
                                            alt="{{ $certificateTemplate->filename }}" width="225">
                                    </td>
                                    <td class="text-wrap">{{ \Str::limit($certificateTemplate->marker_state) }}</td>
                                    <td id="description" class="text-wrap" data-toggle="tooltip" data-placement="top"
                                        title="{{ $certificateTemplate->template_content }}">{!! !empty($certificateTemplate->template_content) ? \Str::limit($certificateTemplate->template_content) : '-' !!}</td>
                                    <td>{{ $certificateTemplate->created_at }}</td>
                                    <td>{{ $certificateTemplate->created_id }}</td>
                                    <td>{{ $certificateTemplate->updated_at }}</td>
                                    <td>{{ $certificateTemplate->updated_id }}</td>
                                    <td>
                                        <a href="{{ route('certificate-templates.edit', $certificateTemplate->id) }}"
                                            class="btn btn-primary">Edit</a>
                                        <!-- Delete Form -->
                                        <form
                                            action="{{ route('certificate-templates.destroy', $certificateTemplate->id) }}"
                                            method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus template ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Jenis Kursus - Batch</th>
                                <th>Gambar</th>
                                <th>Status Penanda</th>
                                <th>Konten Template</th>
                                <th>Dibuat Pada</th>
                                <th>ID Pembuat</th>
                                <th>Diperbarui Pada</th>
                                <th>ID Pembaruan</th>
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
        <a href="{{ route('certificate-templates.create') }}" target="_blank" data-toggle="tooltip"
            title="Tambah Sertifikat">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- FAB Add Ends -->

@endsection

@section('script')

@endsection
