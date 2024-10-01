@extends('layout.main-v3')

@section('title', 'Add Transaction Order')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Add New Data</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a>Transaction</a></li>
                        <li class="breadcrumb-item"><a href="">Orders</a></li>
                        <li class="breadcrumb-item"><a href="">Proof of Payment</a></li>
                        <li class="breadcrumb-item active">Add New Proof</li>
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

                    <h4 class="card-title">Add New Payment Proof</h4>
                    <p class="card-title-desc">This page allows you to update a data's information by modifying the data
                        listed below. Ensure that all the information you enter is accurate to provide the best learning
                        experience for the course participants.</p>

                    <form action="{{ route('postAddTransOrderConfirm') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <h4 class="ui dividing header">Order Information</h4>
                        <hr>
                        <input type="hidden" name="trans_order_id" value="{{ $transOrder->id }}">
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Order Number</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" value="{{ $transOrder->order_number }}"
                                    name="name_order" id="orderNumber" placeholder="Masukkan Nomor Order" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Date</label>
                            <div class="col-md-10">
                                <input class="form-control" type="datetime-local" name="date" id="date">
                                @if ($errors->has('date'))
                                    @foreach ($errors->get('date') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <br>
                        <h4 class="ui dividing header">User Information</h4>
                        <hr>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Account Name</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="sender_account_name" placeholder="Masukkan Account Name">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Account Number</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="sender_account_number" placeholder="Masukkan Account Number">
                            </div>
                        </div>
                        <br>
                        <h4 class="ui dividing header">Payment Information</h4>
                        <hr>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Amount</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="amount" value="" id="amount" placeholder="Rp. 0">
                                @error('amount')
                                    <div class="text-danger">
                                        {{ $errors }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Bank Account</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="m_bank_account_id" id="type_selector">
                                    <option value="">-- Pilih Bank Account --</option>
                                    @foreach ($bankAccounts as $bankAccount)
                                        <option value="{{ $bankAccount->id }}">{{ $bankAccount->id }}
                                            - {{ $bankAccount->account_name }} - {{ $bankAccount->account_number }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-file" class="col-md-2 col-form-label">Image</label>
                            <div class="col-md-10">
                                <input class="form-control" type="file" name="file_image" id="input-file"
                                    accept="image/png, image/jpeg, image/jpg" onchange="preview()">
                                <img id="frame" class="img-fluid" width="300" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Description</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="description"></textarea>
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
                                <button type="submit" class="btn btn-primary w-md text-center">Add Orders Confirm</button>
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
