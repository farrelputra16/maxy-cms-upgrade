@extends('layout.main-v3')

@section('title', 'Edit Tingkat Nilai')

@section('content')
    <!-- Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Edit Data</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getScore') }}">Tingkat Nilai</a></li>
                        <li class="breadcrumb-item active">Edit Tingkat Nilai: {{ $data->name }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Judul Halaman -->

    <!-- Konten -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">{{ $data->name }} <small>[ ID: {{ $data->id }} ]</small></h4>
                    <p class="card-title-desc">Halaman ini memungkinkan Anda untuk memperbarui informasi dengan mengubah
                        data yang tercantum di bawah ini. Pastikan semua informasi yang Anda masukkan akurat untuk
                        memberikan pengalaman belajar terbaik bagi peserta kursus.</p>

                    <form action="{{ route('postEditScore', ['id' => request()->query('id')]) }}" method="post">
                        @csrf
                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Tingkat Nilai</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name"
                                    value="{{ old('name', $data->name) }}" id="input-title">
                                @if ($errors->has('name'))
                                    @foreach ($errors->get('name') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Rentang Awal</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="range_start"
                                    value="{{ old('range_start', $data->range_start) }}" id="input-title"
                                    inputmode="numeric" pattern="[0-9]*"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                @if ($errors->has('range_start'))
                                    @foreach ($errors->get('range_start') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Rentang Akhir</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="range_end"
                                    value="{{ old('range_end', $data->range_end) }}" id="input-title" inputmode="numeric"
                                    pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                @if ($errors->has('range_end'))
                                    @foreach ($errors->get('range_end') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-description" class="col-md-2 col-form-label">Deskripsi
                                <small>(Admin)</small></label>
                            <div class="col-md-10">
                                <textarea type="text" name="description" id="elm1">{{ old('description', $data->description) }}</textarea>
                            </div>
                        </div>

                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10" style="display: flex; align-items: center;">
                                <!-- Hidden input untuk mengirim nilai 0 jika checkbox tidak dicentang -->
                                <input type="hidden" name="status" value="0">

                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    value="1" name="status"
                                    {{ old('status', isset($data) ? $data->status : false) ? 'checked' : '' }}>
                            </div>
                        </div>

                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary w-md text-center">Kirim</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div> <!-- akhir kolom -->
    </div> <!-- akhir baris -->
@endsection

@section('script')

@endsection
