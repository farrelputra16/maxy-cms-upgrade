@extends('layout.master')

@section('title', 'Add Transaction Order')

@section('content')
    <div class="px-3 pb-3 mb-3">
        <h2 class="pb-5">Add Orders Confirm</h2>
        <form class="ui form" action="{{ route('postAddTransOrderConfirm') }}" method="post"
              enctype="multipart/form-data">
            @csrf

            <h3 class="ui dividing header">Order Information</h3>

            <div class="field">
                <div class="two fields">
                    <div class="field">
                        <label for="orderNumber">Order Number</label>
                        <input type="hidden" name="trans_order_id" value="{{ $transOrder->id }}">
                        <input type="text" name="order_number" value="{{ $transOrder->order_number }}" id="orderNumber"
                               placeholder="Masukkan Nomor Order" readonly>
                    </div>
                    <div class="field">
                        <label for="date">Date</label>
                        <input id="date" type="datetime-local" name="date" value="">
                    </div>
                </div>

                <h4 class="ui dividing header">User Information</h4>

                <div class="two fields">
                    <div class="field">
                        <label for="">Account Name</label>
                        <input type="text" name="sender_account_name" placeholder="Masukkan Account Name">
                    </div>
                    <div class="field">
                        <label for="">Account Number</label>
                        <input type="text" name="sender_account_number" placeholder="Masukkan Account Number">
                    </div>
                </div>

                <h3 class="ui dividing header">Payment Information</h3>

                <div class="two fields">
                    <div class="field">
                        <label for="amount">Amount</label>
                        <input type="number" name="amount" value="" id="amount" placeholder="Rp. 0" step="10000">
                        @error('total')
                            <div class="text-danger">
                                {{ $error }}
                            </div>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="">Bank Account</label>
                        <select class="ui dropdown" name="m_bank_account_id" id="">
                            <option value="" selected disabled>-- Pilih Bank Account --</option>
                            @foreach ($bankAccounts as $bankAccount)
                                <option
                                    value="{{ $bankAccount->id }}">{{ $bankAccount->id }}
                                    - {{ $bankAccount->account_name }} - {{ $bankAccount->account_number }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="field">
                    <label for="Image" class="form-label">Image</label>
                    <input class="form-control" type="file" id="formFile" name="file_image" onchange="preview()">
                    <br>
                    <img id="frame" src="" class="img-fluid" width="300"/>
                </div>

                <div class="ui dividing header"></div>

                <div class="field">
                    <label for="description">Description</label>
                    <textarea name="description" id="description"></textarea>
                </div>

                <div class="field">
                    <div class="ui checkbox">
                        <input id="isActive" class="form-check-input" type="checkbox" value="1" name="status" checked>
                        <label for="isActive">Aktif</label>
                    </div>
                </div>
            </div>
            <button class="right floated ui button primary">Tambah Transaksi Order</button>
        </form>

        <a href="{{ route("getTransOrderConfirm") }}">
            <button class="right floated ui red button">Batal</button>
        </a>
    </div>
    <script>
        function preview() {
            frame.src = URL.createObjectURL(event.target.files[0]);
        }

        let total = document.getElementById('total');
        total.addEventListener('keyup', function (e) {
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

        $("#discount").on("keyup", function (event) {
            let total = $("#total").val().replace('Rp. ', '').split('.').join("");
            let discount = Number(total * $("#discount").val() / 100);
            let afterDisc = discount - total;

            $("#afterDisc").val(
                formatRupiah(String(afterDisc), 'Rp. ')
            );
        })

        $("#total").on("keyup", function (event) {
            let total = $("#total").val().replace('Rp. ', '').split('.').join("");
            let discount = Number(total * $("#discount").val() / 100);
            let afterDisc = discount - total;

            $("#afterDisc").val(
                formatRupiah(String(afterDisc), 'Rp. ')
            );
        })
    </script>
@endsection
