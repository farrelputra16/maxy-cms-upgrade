@extends('layout.main-v3')

@section('title', 'Tambah Paket Kursus')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Tambah Paket Kursus</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('getCoursePackage') }}">Modul Kursus</a></li>
                    <li class="breadcrumb-item active">Tambah Paket Kursus</li>
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

                <h4 class="card-title">Tambah Paket Kursus</h4>
                <p class="card-title-desc">
                    Halaman ini memungkinkan Anda untuk menambahkan paket kursus baru.
                    Isi informasi berikut untuk membuat paket kursus yang sesuai dengan kebutuhan Anda.
                </p>

                <form id="addCoursePackage" action="{{ route('postAddCoursePackage') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3 row">
                        <label for="input-title" class="col-md-2 col-form-label">Nama Paket Kursus <span class="text-danger"
                            data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="name"" placeholder=" Masukkan Nama Paket" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                            @foreach ($errors->get('name') as $error)
                            <span style="color: red;">{{ $error }}</span>
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input-title" class="col-md-2 col-form-label">Link Pembayaran</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="payment_link"
                                placeholder="https://example.com" value="{{ old('payment_link') }}">
                                @if ($errors->has('payment_link'))
                                    @foreach ($errors->get('payment_link') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input-title" class="col-md-2 col-form-label">Harga Fiktif <span class="text-danger"
                            data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="fake" id="fake_price"
                                placeholder="Masukkan Fake Price" value="{{ old('fake') }}">
                            @if ($errors->has('fake'))
                            @foreach ($errors->get('fake') as $error)
                            <span style="color: red;">{{ $error }}</span>
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input-title" class="col-md-2 col-form-label">Harga <span class="text-danger"
                            data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" id="price" name="price"
                                placeholder="Masukkan Price" value="{{ old('price') }}">
                            @if ($errors->has('price'))
                            @foreach ($errors->get('price') as $error)
                            <span style="color: red;">{{ $error }}</span>
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input-content" class="col-md-2 col-form-label">Deskripsi</label>
                        <div class="col-md-10">
                            <textarea id="elm1" name="description">{{  old('description') }}</textarea>
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
                    <div class="mb-3 row justify-content-end">
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary w-md text-center custom-btn-submit" form="addCoursePackage">Tambah Paket Kursus</button>
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
    var rupiah = document.getElementById('fake_price');
    rupiah.addEventListener('keyup', function(e) {
        rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    var rupiah1 = document.getElementById('price');
    rupiah1.addEventListener('keyup', function(e) {
        rupiah1.value = formatRupiah(this.value, 'Rp. ');
    });

    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah1 = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah1 += separator + ribuan.join('.');
        }

        rupiah1 = split[1] != undefined ? rupiah1 + ',' + split[1] : rupiah1;
        return prefix == undefined ? rupiah1 : (rupiah1 ? 'Rp. ' + rupiah1 : '');
    }
</script>

@endsection
