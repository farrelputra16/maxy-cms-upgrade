@extends('layout.main-v3')

@section('title', 'Ubah Konfirmasi Pesanan Transaksi')

@section('content')
    <!-- Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Ubah Data</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a>Transaksi</a></li>
                        <li class="breadcrumb-item"><a href="">Pesanan</a></li>
                        <li class="breadcrumb-item"><a href="">Bukti Pembayaran</a></li>
                        <li class="breadcrumb-item active">Ubah Bukti Pembayaran</li>
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

                    <h4 class="card-title">Ubah Bukti Pembayaran</h4>
                    <p class="card-title-desc">Gunakan halaman ini untuk memperbarui informasi bukti pembayaran. Pastikan
                        semua data yang Anda masukkan akurat untuk memberikan pengalaman terbaik bagi peserta kursus.</p>

                    <form action="{{ route('postEditTransOrderConfirm', ['id' => request()->query('id')]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="img_keep" value="{{ $currentData->image }}" hidden>
                        <input type="text" name="m_bank" value="{{ $m_bank_account_now->m_bank_id }}" hidden>
                        <input type="text" name="idtransorder" value="{{ $idtransorder }}" hidden>
                        <h4 class="ui dividing header">Informasi Pesanan</h4>
                        <hr>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Nomor Pesanan</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" value="{{ $currentData->order_confirm_number }}"
                                    name="name_order" id="orderNumber">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Tanggal</label>
                            <div class="col-md-10">
                                <input class="form-control" type="datetime-local" name="date" id="date"
                                    value="{{ $currentData->date }}">
                            </div>
                        </div>

                        <br>
                        <h4 class="ui dividing header">Informasi Pengguna</h4>
                        <hr>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Nama Akun</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="sender_account_name"
                                    value="{{ $currentData->sender_account_name }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Nomor Akun</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="sender_account_number"
                                    value="{{ $currentData->sender_account_number }}">
                            </div>
                        </div>
                        <br>
                        <h4 class="ui dividing header">Informasi Pembayaran</h4>
                        <hr>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Jumlah</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="amount" value="" id="amount"
                                    placeholder="Rp. 0">
                                @error('amount')
                                    <div class="text-danger">
                                        {{ $errors }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Rekening Bank</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="m_bank_account_id" id="type_selector">
                                    <option value="">-- Pilih Rekening Bank --</option>
                                    @foreach ($bankAccounts as $bankAccount)
                                        <option value="{{ $bankAccount->id }}">{{ $bankAccount->id }}
                                            - {{ $bankAccount->account_name }} - {{ $bankAccount->account_number }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-file" class="col-md-2 col-form-label">Gambar</label>
                            <div class="col-md-10">
                                <input class="form-control" type="file" name="file_image" id="input-file"
                                    accept="image/png, image/jpeg, image/jpg" onchange="preview()">
                                <img id="frame" class="img-fluid" width="300" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Catatan Admin</label>
                            <div class="col-md-10">
                                <textarea id="elm2" class="form-control" name="description"></textarea>
                            </div>
                        </div>
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    name="status">
                                <label class="m-0">Aktif</label>
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary w-md text-center">Tambah Konfirmasi
                                    Pesanan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- akhir kolom -->
    </div> <!-- akhir baris -->
@endsection

@section('script')
    <script>
        function preview() {
            frame.src = URL.createObjectURL(event.target.files[0]);
        }

        let total = document.getElementById('total');
        total.addEventListener('keyup', function(e) {
            total.value = formatRupiah(this.value, 'Rp. ');
        });

        function formatRupiah(angka, prefix) {
            let number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                total = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                total += separator + ribuan.join('.');
            }

            total = split[1] != undefined ? total + ',' + split[1] : total;
            return prefix == undefined ? total : (total ? 'Rp. ' + total : '');
        }

        $("#discount").on("keyup", function(event) {
            let total = $("#total").val().replace('Rp. ', '').split('.').join("");
            let discount = Number(total * $("#discount").val() / 100);
            let afterDisc = discount - total;

            $("#afterDisc").val(
                formatRupiah(String(afterDisc), 'Rp. ')
            );
        })

        $("#total").on("keyup", function(event) {
            let total = $("#total").val().replace('Rp. ', '').split('.').join("");
            let discount = Number(total * $("#discount").val() / 100);
            let afterDisc = discount - total;

            $("#afterDisc").val(
                formatRupiah(String(afterDisc), 'Rp. ')
            );
        })
    </script>

@endsection
