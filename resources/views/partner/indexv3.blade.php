@extends('layout.main-v3')

@section('title', 'Mitra')

@section('content')
    <!-- Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Mitra</h4>

                <!-- Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        <li class="breadcrumb-item active">Mitra</li>
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
                    <h4 class="card-title">Daftar Mitra</h4>
                    <p class="card-title-desc">
                        Halaman ini menampilkan daftar mitra dalam format tabel interaktif yang memudahkan Anda mengelola
                        data mitra yang terdaftar. Setiap baris tabel berisi informasi detail seperti nama partner, logo,
                        tipe, alamat, kontak, catatan admin, dan status. Anda bisa menggunakan <b>fitur visibilitas kolom,
                            pencarian, dan pengurutan</b> untuk menyesuaikan tampilan data sesuai kebutuhan.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li>Klik ikon <b>+ Tambah</b> di sudut kanan bawah untuk menambahkan mitra baru.</li>
                        <li>Pada setiap baris, tombol <b>Ubah</b> memungkinkan Anda memperbarui informasi mitra tersebut.
                        </li>
                        <li>Periksa kolom <b>Status</b> dan <b>Status Sorotan</b> untuk melihat apakah mitra dalam kondisi
                            aktif atau nonaktif.</li>
                        <li>Manfaatkan fitur <b>Visibilitas Kolom</b>, <b>Pengurutan</b>, dan <b>Pencarian</b> pada tabel
                            untuk memudahkan penyesuaian atau penyaringan data mitra yang Anda butuhkan.</li>
                    </ul>
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100" data-server-processing="true" data-url="{{ route('getPartnerData') }}" data-colvis="[-3, -4, -5, -6, -17]">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Nama Partner</th>
                                <th>Logo</th>
                                <th>Tipe</th>
                                <th>URL</th>
                                <th class="data-medium">Alamat</th>
                                <th>Telepon</th>
                                <th>Email</th>
                                <th>Kontak Person</th>
                                <th>Status Sorotan</th>
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
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Nama Partner</th>
                                <th>Logo</th>
                                <th>Tipe</th>
                                <th>URL</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th>Email</th>
                                <th>Kontak Person</th>
                                <th>Status Sorotan</th>
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
    @if (Session::has('access_master') &&
            Session::get('access_master')->contains('access_master_name', 'm_partner_create'))
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddPartner') }}" target="_blank" data-toggle="tooltip" title="Tambah Mitra Baru">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    @endif
    <!-- Akhir Tombol Tambah -->
@endsection

@section('script')
<script>
    const columns = [
        { data: "DT_RowIndex", name: "DT_RowIndex", orderable: false, searchable: false },
        { data: "id", name: "id" },
        { data: "name", name: "name", orderable: true, searchable: true },
        { data: "logo", name: "logo", orderable: false, searchable: false },
        { data: "m_partner_type", name: "m_partner_type", orderable: true, searchable: true },
        { data: "url", name: "url", orderable: true, searchable: true },
        { data: "address", name: "address", orderable: true, searchable: true },
        { data: "phone", name: "phone", orderable: true, searchable: true },
        { data: "email", name: "email", orderable: true, searchable: true },
        { data: "contact_person", name: "contact_person", orderable: true, searchable: true },
        { data: "status_highlight", name: "status_highlight", orderable: true, searchable: true },
        { data: "description", name: "description", orderable: true, searchable: true },
        { data: "created_at", name: "created_at" },
        { data: "created_id", name: "created_id" },
        { data: "updated_at", name: "updated_at" },
        { data: "updated_id", name: "updated_id" },
        { data: "status", name: "status", orderable: true, searchable: true },
        { data: "action", name: "action", orderable: false, searchable: false },
    ];
</script>
@endsection
