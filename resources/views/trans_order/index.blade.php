@extends('layout.main-v3')

@section('title', 'Order')

@section('content')
    <!-- begin page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Ringkasan Data</h4>

                <!-- begin breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item active">Pesanan</li>
                    </ol>
                </div>
                <!-- end breadcrumb -->
            </div>
        </div>
    </div>
    <!-- end page title -->

    <!-- begin content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Pesanan</h4>
                    <p class="card-title-desc">
                        Halaman ini menampilkan ringkasan data pesanan dalam format tabel interaktif yang mudah diurutkan.
                        Setiap baris berisi informasi penting, seperti nama, deskripsi, dan status pesanan. Gunakan fitur
                        <b>pengaturan kolom, pengurutan, dan pencarian kolom</b> untuk menyesuaikan tampilan sesuai
                        kebutuhan Anda
                        dan menemukan informasi yang diinginkan dengan cepat.
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Nomor Pesanan</th>
                                <th>Anggota</th>
                                <th>Kursus</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>Diskon</th>
                                <th>Setelah Diskon</th>
                                <th>Paket Kursus</th>
                                <th>Promo</th>
                                <th>Agen Penjual</th>
                                <th>Status Pembayaran</th>
                                <th class="data-long">Deskripsi</th>
                                <th>Dibuat Pada</th>
                                <th>Dibuat Oleh</th>
                                <th>Diperbarui Pada</th>
                                <th>Diperbarui Oleh</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($order as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                        title="{{ $item->order_number }}">
                                        {!! \Str::limit($item->order_number, 30) !!}
                                    </td>
                                    <td>{{ $item->users_name }}</td>
                                    <td>{{ $item->course_name }}</td>
                                    <td>{{ $item->date }}</td>
                                    <td>{{ 'Rp ' . number_format($item->total, 0, ',', '.') }}</td>
                                    <td>{{ $item->discount ?? 0 }}%</td>
                                    <td>{{ 'Rp' . number_format($item->total_after_discount) }}</td>
                                    <td>{{ $item->course_package_name }}</td>
                                    <td>
                                        @if ($item->promotion_name !== null)
                                            {{ $item->promotion_name }}
                                        @else
                                            Tidak ada
                                        @endif
                                    </td>
                                    <td>{{ $item->agent_name }}</td>
                                    <td>
                                        @if ($item->payment_status == 0)
                                            <!-- Not Completed -->
                                            <a class="btn btn-info" style="pointer-events: none;">Not
                                                Completed</a>
                                        @elseif ($item->payment_status == 1)
                                            <!-- Completed -->
                                            <a class="btn btn-success" style="pointer-events: none;">Completed</a>
                                        @elseif ($item->payment_status == 2)
                                            <!-- Partial -->
                                            <a class="btn btn-warning" style="pointer-events: none;">Partial</a>
                                        @elseif ($item->payment_status == 3)
                                            <!-- Cancelled -->
                                            <a class="btn btn-danger" style="pointer-events: none;">Cancelled</a>
                                        @else
                                            <!-- Unknown Status -->
                                            <a class="btn btn-dark" style="pointer-events: none;">Unknown Status</a>
                                        @endif
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
                                            <a class="btn btn-success" style="pointer-events: none;">Aktif</a>
                                        @else
                                            <a class="btn btn-danger" style="pointer-events: none;">Non Aktif</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('getEditTransOrder', ['id' => $item->id]) }}"
                                            class="btn btn-primary rounded">Edit</a>
                                        <a href="{{ route('getTransOrderConfirm', ['id' => $item->id]) }}"
                                            class="btn btn-info rounded">Bukti Pembayaran</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Nomor Pesanan</th>
                                <th>Anggota</th>
                                <th>Kursus</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>Diskon</th>
                                <th>Setelah Diskon</th>
                                <th>Paket Kursus</th>
                                <th>Promo</th>
                                <th>Agen Penjual</th>
                                <th>Status Pembayaran</th>
                                <th class="data-long">Deskripsi</th>
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
    <!-- end content -->

    <!-- FAB add starts -->
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddTransOrder') }}" target="_blank">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- FAB add ends -->
@endsection

@section('script')

@endsection
