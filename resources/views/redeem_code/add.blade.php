@extends('layout.master')

@section('title', 'Add Redeem Code')

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <div style="padding: 0px 12px 0px 12px;">
        <h2>Add Redeem Code</h2>
        <hr style="padding-bottom:1%">
        <form class="ui form" action="{{ route('postAddRedeemCode') }}" method="post">
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

                <div class="three fields">
                    <div class="field">
                        <label for="">Quota</label>
                        <input type="number" name="quota" id="maxdiscount">
                    </div>

                    <div class="field">
                        <label for="">Type</label>
                        <input type="text" name="type" placeholder="Masukkan Type">
                    </div>

                    <div class="field">
                        <label for="">Expired Date</label>
                        <input type="datetime-local" id="expired_date" name="expired_date">
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
        <a href="{{ route('getRedeemCode') }}"><button class=" right floated ui red button">Batal</button></a>
    </div>

    <script>
        CKEDITOR.replace('description');
    </script>
@endsection
