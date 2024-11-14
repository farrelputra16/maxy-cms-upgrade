@extends('layout.main-v3')

@section('title', 'Edit Blog')

@section('content')
    <!-- Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Edit Data</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Transaksi</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getTransOrder') }}">Pesanan</a></li>
                        <li class="breadcrumb-item active">Edit Pesanan: {{ $data->order_number }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Judul Halaman -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">{{ $data->order_number }} <small>[ ID: {{ $data->id }} ]</small></h4>
                    <p class="card-title-desc">Gunakan halaman ini untuk memperbarui data pesanan dengan informasi terbaru.
                        Pastikan semua data yang Anda masukkan akurat untuk memberikan pengalaman belajar terbaik bagi
                        peserta kursus.</p>

                    <form action="{{ route('postEditTransOrder', ['id' => request()->query('id')]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Nomor Pesanan</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="title" value="{{ $data->order_number }}"
                                    id="input-title" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-member" class="col-md-2 col-form-label">Mahasiswa</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="member" value="{{ $data->users_name }}"
                                    id="input-member" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-course" class="col-md-2 col-form-label">Kursus</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="course" value="{{ $data->course_name }}"
                                    id="input-course" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-date" class="col-md-2 col-form-label">Tanggal</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="date" value="{{ $data->date }}"
                                    id="input-date" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-price" class="col-md-2 col-form-label">Harga</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="price" value="{{ $data->total }}"
                                    id="input-price" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-discount" class="col-md-2 col-form-label">Diskon</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="discount" value="{{ $data->discount }}"
                                    id="input-discount" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-total" class="col-md-2 col-form-label">Total Setelah Diskon</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="total"
                                    value="{{ $data->total_after_discount }}" id="input-total" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-payment-status" class="col-md-2 col-form-label">Status Pembayaran</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="payment_status"
                                    data-placeholder="Pilih Status ...">
                                    <option value="0" {{ old('payment_status') == 0 ? 'selected' : '' }}
                                        @if ($data->payment_status == 0) selected @endif>Belum Lunas</option>
                                    <option value="1" {{ old('payment_status') == 1 ? 'selected' : '' }}
                                        @if ($data->payment_status == 1) selected @endif>Lunas</option>
                                    <option value="2" {{ old('payment_status') == 2 ? 'selected' : '' }}
                                        @if ($data->payment_status == 2) selected @endif>Sebagian</option>
                                    <option value="3" {{ old('payment_status') == 3 ? 'selected' : '' }}
                                        @if ($data->payment_status == 3) selected @endif>Dibatalkan</option>
                                    <option value="4" {{ old('payment_status') == 4 ? 'selected' : '' }}
                                        @if ($data->payment_status == 4) selected @endif>Status Tidak Diketahui</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-course" class="col-md-2 col-form-label">Kursus</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="course"
                                    value="{{ $data->course_name }}" id="input-course" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-class" class="col-md-2 col-form-label">Kelas</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="class_id" data-placeholder="Pilih Kelas ...">
                                    <option value="">Pilih Kelas...</option>
                                    @foreach ($class_list as $key => $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('class_id') == $item->id ? 'selected' : '' }}
                                            @if ($data->course_class_id == $item->id) selected @endif>{{ $item->course_name }}
                                            Batch {{ $item->batch }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-promo" class="col-md-2 col-form-label">Promo</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="promo"
                                    value="{{ $data->promotion_name }}" id="input-promo" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-agent" class="col-md-2 col-form-label">Agen Penjual</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="agent"
                                    value="{{ $data->agent_name }}" id="input-agent" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-description" class="col-md-2 col-form-label">Deskripsi
                                <small>(Admin)</small></label>
                            <div class="col-md-10">
                                <textarea id="elm1" type="text" name="description">{{ $data->description }}</textarea>
                            </div>
                        </div>
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10" style="display: flex; align-items: center;">
                                <input type="hidden" name="status" value="0">

                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    value="1" name="status"
                                    {{ old('status', isset($data) ? $data->status : false) ? 'checked' : '' }}>
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary w-md text-center">Simpan</button>
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
        // autofill slug
        document.getElementById('input-title').addEventListener('input', function() {
            var name = this.value;
            var slug = name.toLowerCase().trim().replace(/[^a-z0-9\s-]/g, '').replace(/\s+/g, '-');
            document.getElementById('input-slug').value = slug;
        });

        // preview image
        document.getElementById('input-file').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('frame').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
