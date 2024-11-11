@extends('layout.main-v3')

@section('title', 'Edit Tingkat Kesulitan')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Edit Data</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getDifficulty') }}">Jenis Kursus</a></li>
                        <li class="breadcrumb-item active">Edit Jenis Kursus: {{ $currentData->name }}</li>
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

                    <h4 class="card-title">{{ $currentData->name }} <small>[ ID: {{ $currentData->id }} ]</small></h4>
                    <p class="card-title-desc">
                        Halaman ini memungkinkan Anda untuk memperbarui informasi tingkat kesulitan pada paket kursus. 
                        Pastikan semua detail yang dimasukkan akurat agar peserta dapat memahami dengan jelas tingkat kesulitan yang akan mereka hadapi.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                        <ul>
                            <li><strong>Nama Tingkat Kesulitan:</strong> Isi kolom dengan nama tingkat kesulitan (misalnya, Mudah, Menengah, Sulit) yang sesuai.</li>
                            <li><strong>Deskripsi:</strong> Jelaskan secara singkat deskripsi tingkat kesulitan tersebut, seperti level keterampilan atau tantangan yang dihadapi peserta.</li>
                            <li>Setelah semua detail terisi, gunakan tombol <strong>'Simpan & Perbarui'</strong> untuk menyimpan perubahan yang telah Anda buat.</li>
                        </ul>
                    </p>                    

                    <form action="{{ route('postEditDifficultyType', ['id' => request()->query('id')]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Nama Tingkat Kesulitan</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name"
                                    value="{{ old('name', $currentData->name) }}" id="name">
                                @if ($errors->has('name'))
                                    @foreach ($errors->get('name') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Deskripsi</label>
                            <div class="col-md-10">
                                <textarea id="elm2" name="description" class="form-control">{{ old('description', $currentData->description) }}</textarea>
                            </div>
                        </div>
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <!-- Hidden input untuk mengirim nilai 0 jika checkbox tidak dicentang -->
                                <input type="hidden" name="status" value="0">

                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    value="1" name="status"
                                    {{ old('status', $currentData->status) ? 'checked' : '' }}>
                                <label class="m-0">Aktif</label>
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary w-md text-center">Simpan & Perbarui</button>
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
