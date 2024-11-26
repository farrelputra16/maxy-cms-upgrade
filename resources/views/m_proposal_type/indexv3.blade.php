@extends('layout.main-v3')

@section('title', 'Jenis Proposal')

@section('content')
    <!-- Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Jenis Proposal</h4>

                <!-- Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        <li class="breadcrumb-item active">Jenis Proposal</li>
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
                    <h4 class="card-title">Jenis Proposal</h4>
                    <div class="card-title-desc">
                        <p>
                            Halaman ini menyediakan daftar semua jenis proposal yang ada dalam bentuk tabel interaktif.
                            Setiap baris menampilkan informasi kunci, seperti nama jenis proposal, catatan admin singkat, status
                            aktif atau nonaktif, serta data terkait pembuat dan pembaruan. <br><br>

                            <strong>Cara Penggunaan:</strong>
                        <ul>
                            <li><strong>Visibilitas Kolom:</strong> Sesuaikan kolom yang ingin ditampilkan di tabel untuk
                                melihat data yang lebih relevan sesuai kebutuhan Anda.</li>
                            <li><strong>Pencarian Data:</strong> Gunakan kolom pencarian untuk menemukan jenis proposal
                                tertentu dengan cepat berdasarkan kata kunci seperti nama atau catatan admin.</li>
                            <li><strong>Pengurutan Kolom:</strong> Klik judul kolom tertentu untuk mengurutkan data,
                                misalnya untuk menampilkan jenis proposal yang terakhir diperbarui di urutan atas.</li>
                            <li><strong>Ubah Data:</strong> Klik tombol <em>Ubah</em> di kolom Aksi pada baris data yang
                                ingin Anda perbarui untuk mengedit informasi atau status jenis proposal.</li>
                            <li><strong>Tambah Jenis Proposal Baru:</strong> Klik ikon <em>Tambah</em> di pojok kanan bawah
                                untuk menambahkan jenis proposal baru ke dalam sistem.</li>
                        </ul>
                        </p>
                    </div>


                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Nama Jenis Proposal</th>
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
                            @foreach ($MProposalType as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                        title="{{ $item->name }}">
                                        {!! \Str::limit($item->name, 30) !!}
                                    </td>
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
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-danger">Non Aktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('getEditProposalType', ['id' => $item->id, 'access' => 'm_proposal_type_update']) }}"
                                            class="btn btn-primary rounded">Ubah</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Nama</th>
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

    <!-- Tombol Tambah -->
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddProposalType', ['access' => 'm_Proposal_type_create']) }}" target="_blank"
            data-toggle="tooltip" title="Tambah Jenis Proposal Baru">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- Akhir Tombol Tambah -->
@endsection

@section('script')

@endsection
