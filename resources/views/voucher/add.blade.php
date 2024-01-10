@extends('layout.master')

@section('title', 'Add Voucher')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <h2 style="padding-bottom:3%">Add Vouchers</h2>
        <form class="ui form" action="{{ route('postAddVoucher') }}" method="post">
            @csrf
            <div class="field">
                <div class="two fields">
                    <div class="field">
                        <label for="">Name</label>
                        <input type="text" name="name" placeholder="Masukkan Nama Voucher">
                    </div>
                    <div class="field">
                        <label for="">Code</label>
                        <input type="text" name="code" placeholder="Masukkan Kode Voucher">
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label for="">Waktu Mulai</label>
                        <input type="datetime-local" id="start_date" name="start_date">
                    </div>
                    <div class="field">
                        <label for="">Waktu Berakhir</label>
                        <input type="datetime-local" id="start_date" name="end_date">
                    </div>
                </div>
                <div class="three fields">
                    <div class="field">
                        <label for="">Discount Type</label>
                        <select class="ui dropdown" name="discount_type" id="discount_type">
                            <option value="">-- Pilih Discount Type --</option>
                            <option value="PERCENTAGE">PERCENTAGE</option>
                            <option value="FIXED">FIXED</option>
                        </select>
                    </div>

                    <div class="field">
                        <label for="">Discount</label>
                        <input type="text" name="discount">
                    </div>

                    <div class="field">
                        <label for="">Max Discount</label>
                        <input type="number" name="maxdiscount" id="maxdiscount" placeholder="e.g. 5">
                    </div>
                </div>

                <div class="field">
                    <label>Description</label>
                    <textarea name="description" id="description" placeholder="Enter Description"></textarea>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" name="status">
                        <label>Aktif</label>
                    </div>
                </div>
            </div>
            <button class="right floated ui button primary">Tambah Voucher</button>
        </form>
        <a href="{{ route('getVoucher') }}"><button class=" right floated ui red button">Batal</button></a>
    </div>

    <script>
        CKEDITOR.replace('description');
    </script>
@endsection
