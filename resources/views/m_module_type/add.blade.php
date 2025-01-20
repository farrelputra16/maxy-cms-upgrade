@extends('layout.main-v3')

@section('title', 'Tambah Jenis Modul')

@section('fontAwesomePicker')
    <link href="https://cdn.jsdelivr.net/npm/fontawesome-iconpicker/dist/css/fontawesome-iconpicker.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fontawesome-iconpicker/dist/js/fontawesome-iconpicker.min.js"></script>
@endsection

@section('style')
<style>
	.iconpicker-popover {
		z-index: 1050 !important; /* Ensure it displays above modals or other components */
	}
</style>
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Tambah Data Baru</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getModuleType') }}">Jenis Modul</a></li>
                        <li class="breadcrumb-item active">Tambah Jenis Modul</li>
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

                    <h4 class="card-title">Tambah Jenis Modul</h4>
                    <p class="card-title-desc">Halaman ini memungkinkan Anda menambahkan jenis kelas dengan
                        melengkapi informasi yang tercantum di bawah ini. Pastikan semua data yang dimasukkan sudah benar
                        agar informasi yang diberikan kepada pengguna menjadi akurat.</p>

                    <form id="addModuleType" action="{{ route('postAddModuleType') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Nama<span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name"
                                    placeholder="Contoh: assignment, materi_pembelajaran" value="{{ old('name') }}">
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
                                <textarea id="content" class="form-control" name="description"
                                    placeholder="Contoh: Administrator Database bertanggung jawab atas pemeliharaan, keamanan, dan pengelolaan data perusahaan.">{{ old('description') }}</textarea>
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
                        <div class="mb-3 row">
                            <label for="iconPicker" class="col-md-2 col-form-label">Pilih Ikon</label>
                            <div class="col-md-10">
                                <div class="input-group">
                                    <input type="text" id="iconPicker" class="form-control" placeholder="Pilih Ikon" name="icon">
                                    <span class="input-group-text"><i id="iconPreview"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary w-md text-center custom-btn-submit"
                                    form="addModuleType">Tambah Jenis Modul</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('script')
<script>
	$(document).ready(function () {
		// Initialize the icon picker
		$('#iconPicker').iconpicker({
			placement: 'bottomLeft', // Position of the picker
			templates: {
				search: '<input type="search" class="form-control iconpicker-search" placeholder="Search icons">'
			}
		});

		// Update the icon preview when an icon is selected
		$('#iconPicker').on('iconpickerSelected', function (event) {
			$('#iconPreview').attr('class', event.iconpickerValue);
		});
	});
</script>
@endsection
