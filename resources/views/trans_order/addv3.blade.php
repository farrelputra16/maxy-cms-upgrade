@extends('layout.main-v3')

@section('title', 'Tambah Pesanan Transaksi')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Add New Data</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a>Pembayaran</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getTransOrder') }}">Pesanan</a></li>
                        <li class="breadcrumb-item active">Tambah Pesanan Transaksi</li>
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

                    <h4 class="card-title">Tambah Pesanan Transaksi Baru</h4>
                    <p class="card-title-desc">Isi data pesanan transaksi baru dengan benar agar proses dapat berjalan
                        lancar.</p>

                    <form id="addPaymentOrder" action="{{ route('postAddTransOrder') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <br>
                        <h4 class="ui dividing header">Informasi Pesanan</h4>
                        <hr>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Nomor Pesanan</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="order_number" id="order_number"
                                    placeholder="Masukkan Nomor Pesanan" value="{{ old('order_number') }}">
                                @if ($errors->has('order_number'))
                                    @foreach ($errors->get('order_number') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Tanggal</label>
                            <div class="col-md-10">
                                <input class="form-control" type="datetime-local" name="date" id="date"
                                    value="{{ old('date') }}">
                                @if ($errors->has('date'))
                                    @foreach ($errors->get('date') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <br>
                        <h4 class="ui dividing header">Informasi Pengguna</h4>
                        <hr>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Nama Pengguna</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="user_id" data-placeholder="-- Pilih User --"
                                    id="type_selector">
                                    @foreach ($idmembers as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('user_id') == $item->id ? 'selected' : '' }}>{{ $item->id }} -
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('user_id'))
                                    @foreach ($errors->get('user_id') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Kursus</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="course_id" data-placeholder="-- Pilih Course --"
                                    id="">
                                    <option value="">-- Pilih Kursus --</option>
                                    @foreach ($idcourses as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('course_id') == $item->id ? 'selected' : '' }}>{{ $item->id }} -
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('course_id'))
                                    @foreach ($errors->get('course_id') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Kelas Kursus</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="course_class_id" id="">
                                    <option value="">-- Pilih Kelas Kursus --</option>
                                    @foreach ($idcourseclasses as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('course_class_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->id }} - Batch
                                            {{ $item->batch }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('course_class_id'))
                                    @foreach ($errors->get('course_class_id') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Paket Kursus</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="course_package_id"
                                    data-placeholder="-- Pilih Course Package --" id="type_selector">
                                    @foreach ($idcoursepackages as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('course_package_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->id }} - {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('course_package_id'))
                                    @foreach ($errors->get('course_package_id') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <br>
                        <h4 class="ui dividing header">Informasi Pembayaran</h4>
                        <hr>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Status Pembayaran</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="payment_status" id="type_selector">
                                    <option value="">-- Pilih Status Pembayaran --</option>
                                    <option value="0" {{ old('payment_status') == 0 ? 'selected' : '' }}>0 - Belum Lunas </option>
                                    <option value="1" {{ old('payment_status') == 1 ? 'selected' : '' }}>1 - Lunas
                                    </option>
                                    <option value="2" {{ old('payment_status') == 2 ? 'selected' : '' }}>2 - Sebagian
                                    </option>
                                    <option value="3" {{ old('payment_status') == 3 ? 'selected' : '' }}>3 - Dibatalkan
                                    </option>
                                </select>
                                @if ($errors->has('payment_status'))
                                    @foreach ($errors->get('payment_status') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Total Pembayaran</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="total" id="total"
                                    placeholder="Rp. 0" value="{{ old('total') }}">
                                @if ($errors->has('total'))
                                    @foreach ($errors->get('total') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Diskon (Maks 100%)</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="discount" id="discount"
                                    placeholder="e. g. 5" value="{{ old('discount') }}">
                                @if ($errors->has('discount'))
                                    @foreach ($errors->get('discount') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Total Setelah Diskon (Otomatis)</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="total_after_discount" id="afterDisc"
                                    placeholder="Rp. 0" value="{{ old('total_after_discount') }}">
                                @if ($errors->has('total_after_discount'))
                                    @foreach ($errors->get('total_after_discount') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Referral (Optional)</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="m_promo_id" id="type_selector">
                                    <option value="">-- Pilih Promotion --</option>
                                    @foreach ($idpromotions as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('m_promo_id') == $item->id ? 'selected' : '' }}>{{ $item->id }} -
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Catatan Admin</label>
                            <div class="col-md-10">
                                <textarea id="elm2" class="form-control" name="description" id="editor">{{ old('description', $currentData->description ?? 'Tidak ada') }}</textarea>
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
                                <button type="submit" class="btn btn-primary w-md text-center custom-btn-submit"
                                    form="addPaymentOrder">Simpan Pesanan Pembayaran</button>
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
        var total = document.getElementById('total');
        total.addEventListener('keyup', function(e) {
            total.value = formatRupiah(this.value, 'Rp. ');
        });

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
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
            var total = $("#total").val().replace('Rp. ', '').split('.').join("");
            var discount = Number(total * $("#discount").val() / 100);
            var afterDisc = discount - total;

            $("#afterDisc").val(
                formatRupiah(String(afterDisc), 'Rp. ')
            );
        })

        $("#total").on("keyup", function(event) {
            var total = $("#total").val().replace('Rp. ', '').split('.').join("");
            var discount = Number(total * $("#discount").val() / 100);
            var afterDisc = discount - total;

            $("#afterDisc").val(
                formatRupiah(String(afterDisc), 'Rp. ')
            );
        })
        $(document).ready(function() {
            $('select').selectize({
                sortField: 'text'
            });
        });

        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>

@endsection
