@extends('layout.main-v3')

@section('title', 'Pengguna')

@section('content')
    <!-- Mulai Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Ringkasan Data</h4>

                <!-- Breadcrumb Mulai -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a>Pengguna & Akses</a></li>
                        <li class="breadcrumb-item active">Pengguna</li>
                    </ol>
                </div>
                <!-- Breadcrumb Selesai -->
            </div>
        </div>
    </div>
    <!-- Judul Halaman Selesai -->

    <!-- Mulai Konten -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Pengguna</h4>
                    <p class="card-title-desc">
                        Halaman ini berfungsi untuk mengelola data pengguna di platform. Anda dapat melihat semua informasi
                        pengguna, termasuk nama, email, grup akses, dan status. Gunakan fitur <b>visibilitas kolom,
                            pengurutan, dan pencarian kolom</b> untuk mengatur tampilan dan menemukan informasi yang relevan
                        dengan cepat.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li><strong>Atur Kolom:</strong> Gunakan pengaturan visibilitas kolom untuk memilih kolom mana yang
                            ingin ditampilkan atau disembunyikan.</li>
                        <li><strong>Pengurutan dan Pencarian:</strong> Klik pada header kolom untuk mengurutkan data, atau
                            gunakan bilah pencarian untuk menemukan pengguna tertentu berdasarkan kata kunci.</li>
                        <li><strong>Ubah dan Lihat Profil:</strong> Gunakan tombol <em>Ubah</em> untuk mengubah data
                            pengguna atau <em>Profil</em> untuk melihat profil pengguna secara detail.</li>
                        <li><strong>Tambah Pengguna Baru:</strong> Klik ikon <em>Tambah</em> di kanan bawah untuk
                            menambahkan pengguna baru.</li>
                    </ul>
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Nama Pengguna</th>
                                <th>Email</th>
                                <th>Grup Akses</th>
                                <th>Catatan Admin</th>
                                <th>Tanggal Lahir</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                                <th>Universitas</th>
                                <th>Jurusan</th>
                                <th>Semester</th>
                                <th>Kota</th>
                                <th>Negara</th>
                                <th>Level</th>
                                <th>Nama Pembimbing</th>
                                <th>Email Pembimbing</th>
                                <th>IPK</th>
                                <th>Agama</th>
                                <th>Hobi</th>
                                <th>Status Kewarganegaraan</th>
                                <th>Dibuat Pada</th>
                                <th>Dibuat Oleh</th>
                                <th>Diperbarui Pada</th>
                                <th>Diperbarui Oleh</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                        title="{{ $item->name }}">
                                        {!! \Str::limit($item->name, 30) !!}
                                    </td>
                                    <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                        title="{{ $item->email }}">
                                        {!! \Str::limit($item->email, 30) !!}
                                    </td>
                                    <td>{{ $item->accessgroup }}</td>
                                    <td class="data-long" data-toggle="tooltip" data-placement="top"
                                        title="{!! strip_tags($item->description) !!}">
                                        {!! !empty($item->description) ? \Str::limit($item->description, 30) : '-' !!}
                                    </td>
                                    <td>{!! !empty($item->date_of_birth) ? \Str::limit($item->date_of_birth, 30) : '-' !!}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td class="data-long" data-toggle="tooltip" data-placement="top"
                                        title="{!! strip_tags($item->address) !!}">
                                        {!! !empty($item->address) ? \Str::limit($item->address, 30) : '-' !!}
                                    </td>
                                    <td>{!! !empty($item->university) ? \Str::limit($item->university, 30) : '-' !!}</td>
                                    <td>{!! !empty($item->major) ? \Str::limit($item->major, 30) : '-' !!}</td>
                                    <td>{!! !empty($item->semester) ? \Str::limit($item->semester, 30) : '-' !!}</td>
                                    <td>{!! !empty($item->city) ? \Str::limit($item->city, 30) : '-' !!}</td>
                                    <td>{!! !empty($item->country) ? \Str::limit($item->country, 30) : '-' !!}</td>
                                    <td>{{ $item->level }}</td>
                                    <td>{!! !empty($item->supervisor_name) ? \Str::limit($item->supervisor_name, 30) : '-' !!}</td>
                                    <td>{!! !empty($item->supervisor_email) ? \Str::limit($item->supervisor_email, 30) : '-' !!}</td>
                                    <td>{!! !empty($item->ipk) ? \Str::limit($item->ipk, 30) : '-' !!}</td>
                                    <td>{!! !empty($item->religion) ? \Str::limit($item->religion, 30) : '-' !!}</td>
                                    <td>{!! !empty($item->hobby) ? \Str::limit($item->hobby, 30) : '-' !!}</td>
                                    <td>{!! !empty($item->citizenship_status) ? \Str::limit($item->citizenship_status, 30) : '-' !!}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->created_id }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>{{ $item->updated_id }}</td>
                                    <td>
                                        <button 
                                            class="btn btn-status {{ $item->status == 1 ? 'btn-success' : 'btn-danger' }}" 
                                            data-id="{{ $item->id }}" 
                                            data-status="{{ $item->status }}"
                                            data-model="User">
                                            {{ $item->status == 1 ? 'Aktif' : 'Nonaktif' }}
                                        </button>
                                    </td>
                                    <td>
                                        <a href="{{ route('getEditUser', ['id' => $item->id]) }}"
                                            class="btn btn-primary rounded">Ubah</a>
                                        <a href="{{ route('getProfileUser', ['id' => $item->id]) }}"
                                            class="btn btn-outline-primary rounded">Profil</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Nama Pengguna</th>
                                <th>Email</th>
                                <th>Grup Akses</th>
                                <th>Catatan Admin</th>
                                <th>Tanggal Lahir</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                                <th>Universitas</th>
                                <th>Jurusan</th>
                                <th>Semester</th>
                                <th>Kota</th>
                                <th>Negara</th>
                                <th>Level</th>
                                <th>Nama Pembimbing</th>
                                <th>Email Pembimbing</th>
                                <th>IPK</th>
                                <th>Agama</th>
                                <th>Hobi</th>
                                <th>Status Kewarganegaraan</th>
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
    <!-- Konten Selesai -->

    <!-- FAB Tambah Mulai -->
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddUser') }}" target="_blank" data-toggle="tooltip" title="Tambah Pengguna">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- FAB Tambah Selesai -->
@endsection

@section('script')

@endsection
