@extends('layout.main-v3')

@section('title', 'Tingkat Kesulitan Mata Kuliah')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Tambah Data Baru</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getDifficulty') }}">Tingkat Kesulitan Mata Kuliah</a></li>
                        <li class="breadcrumb-item active">Tambah Tingkat Kesulitan Mata Kuliah</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Tambah Tingkat Kesulitan Mata Kuliah</h4>
                    <p class="card-title-desc">
                        Halaman ini memungkinkan Anda untuk menambahkan tingkat kesulitan baru pada Paket Mata Kuliah.
                        Isikan informasi berikut untuk menggambarkan tingkat kesulitan yang akan dihadapi peserta selama
                        mengikuti mata kuliah.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li><strong>Nama Tingkat Kesulitan:</strong> Isi kolom dengan nama tingkat kesulitan (misalnya,
                            Mudah, Menengah, Sulit) yang sesuai.</li>
                        <li><strong>Catatan Admin:</strong> Jelaskan secara singkat catatan admin tingkat kesulitan tersebut,
                            seperti level keterampilan atau tantangan yang dihadapi peserta.</li>
                        <li>Setelah semua detail terisi, gunakan tombol <strong>'Tambah Tingkat Kesulitan'</strong> untuk
                            menyimpan perubahan yang telah Anda buat.</li>
                    </ul>
                    </p>

                    <form id="addDifficultyType" action="{{ route('postAddDifficultyType') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        {{-- <input type="text" name="img_keep" value="{{ $blog->cover_img }}" hidden> --}}

                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Nama Tingkat Kesulitan <span
                                    class="text-danger" data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" id="name"
                                    placeholder="Contoh: Dasar Ekonomi, Menengah Keuangan, atau Ekonomi Mahir"
                                    value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    @foreach ($errors->get('name') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Catatan Admin</label>
                            <div class="col-md-10">
                                <textarea id="elm3" name="description" class="form-control"
                                    placeholder="Contoh: Tingkat kesulitan ini mencakup dasar-dasar ekonomi seperti teori permintaan dan penawaran, atau tingkat lanjutan seperti analisis laporan keuangan.">{{ old('description') }}</textarea>
                            </div>
                        </div>
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    name="status" {{ old('status') ? 'checked' : '' }}>
                                <label class="m-0">Aktif</label>
                            </div>
                        </div>
                </div>
                <div class="mb-3 row justify-content-end">
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary w-md text-center custom-btn-submit"
                            style="margin-right: 1%" form="addDifficultyType">Tambah Tingkat Kesulitan</button>
                    </div>
                </div>
                </form>

            </div>
        </div>
    </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('script')

@endsection
