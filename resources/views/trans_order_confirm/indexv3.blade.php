@extends('layout.main-v3')

@section('title', 'Konfirmasi Pesanan Transaksi')

@section('content')
    <!-- Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Ringkasan Data</h4>

                <!-- Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a>Transaksi</a></li>
                        <li class="breadcrumb-item"><a>Pesanan</a></li>
                        <li class="breadcrumb-item active">Bukti Pembayaran</li>
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
                    <h4 class="card-title">Bukti Pembayaran</h4>
                    <p class="card-title-desc">
                        Halaman ini menampilkan ringkasan lengkap dari semua data yang tersedia dalam format tabel interaktif yang dapat diurutkan. Setiap baris mencakup detail penting seperti nama, deskripsi, dan status. Gunakan fitur <b>visibilitas kolom, pengurutan, dan pencarian kolom</b> untuk menyesuaikan tampilan dan mengakses informasi yang Anda butuhkan dengan cepat.
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Nomor Konfirmasi Pesanan</th>
                                <th>Date</th>
                                <th>Jumlah</th>
                                <th>Nama Akun Pengirim</th>
                                <th>Nomor Akun Pengirim</th>
                                <th>Bank Pengirim</th>
                                <th>ID Pesanan Transaksi</th>
                                <th>ID Akun Bank</th>
                                <th>Created At</th>
                                <th>Created By</th>
                                <th>Updated At</th>
                                <th>Updated By</th>
                                <th>Status</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transOrderConfirms as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->order_confirm_number }}</td>
                                    <td>{{ $item->date }}</td>
                                    <td>{{ $item->amount }}</td>
                                    <td>{{ $item->sender_account_name }}</td>
                                    <td>{{ $item->sender_account_number }}</td>
                                    <td>{{ $item->sender_bank }}</td>
                                    <td>{{ $item->trans_order_id }}</td>
                                    <td>{{ $item->m_bank_account_id }}</td>
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
                                    {{-- <td>
                                        <div class="btn-group">
                                            <a href="{{ route('getEditTransOrderConfirm', ['id' => $item->id]) }}"
                                                class="btn btn-primary rounded">Edit</a>
                                        </div>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Nomor Konfirmasi Pesanan</th>
                                <th>Date</th>
                                <th>Jumlah</th>
                                <th>Nama Akun Pengirim</th>
                                <th>Nomor Akun Pengirim</th>
                                <th>Bank Pengirim</th>
                                <th>ID Pesanan Transaksi</th>
                                <th>ID Akun Bank</th>
                                <th>Created At</th>
                                <th>Created By</th>
                                <th>Updated At</th>
                                <th>Updated By</th>
                                <th>Status</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Konten -->

    <!-- Tombol Tambah Transaksi -->
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddTransOrderConfirm', ['id' => $transOrderId]) }}" target="_blank" data-toggle="tooltip" title="Tambah Konfirmasi Pesanan">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- Akhir Tombol Tambah Transaksi -->
@endsection

@section('script')

@endsection
