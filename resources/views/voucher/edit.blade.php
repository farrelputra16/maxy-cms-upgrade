@extends('layout.master')

@section('title', 'Edit Voucher')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <form class="ui form" action="{{ route('postEditVoucher', ['id' => request()->query('id')]) }}" method="post">
        @csrf
            <div class="field">
                <div class="field">
                    <label for="">Voucher Name</label>
                    <input type="text" name="name" value="{{ $currentData->name }}">
                </div>
                <div class="field">
                    <label for="">Voucher Code</label>
                    <input type="text" name="code" value="{{ $currentData->code }}">
                </div>

                <div class="two fields">
                    <div class="field">
                        <label for="">Waktu Mulai</label>
                        <input type="datetime-local" name="start_date" value="{{ $currentData->start_date }}">
                    </div>
                    <div class="field">
                        <label for="">Waktu Berakhir</label>
                        <input type="datetime-local" name="end_date" value="{{ $currentData->end_date }}">
                    </div>
                </div>
                <div class="three fields">
                    <div class="field">
                        <label for="">Discount Type</label>
                        <select class="ui dropdown" name="discount_type" >
                            @if ($currentData->discount_type == "PERCENTAGE")
                                <option value="PERCENTAGE" selected>PERCENTAGE</option>
                                <option value="FIXED">FIXED</option>

                            @elseif ($currentData->discount_type == "FIXED")
                                <option value="PERCENTAGE" selected>PERCENTAGE</option>
                                <option value="FIXED" selected>FIXED</option>
                            @endif
                            
                        </select>
                    </div>

                    <div class="field">
                        <label for="">Discount</label>
                        <input type="text" name="discount" value="{{ $currentData->discount }}">
                    </div>

                    <div class="field">
                        <label for="">Max Discount</label>
                        <input type="number" name="maxdiscount" id="maxdiscount" placeholder="e.g. 5" value="{{ $currentData->max_discount }}">
                    </div>
                </div>

                <div class="field">
                    <label for="">Voucher Description</label>
                    <textarea name="description" value="{{ $currentData->description }}"></textarea>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" {{ $currentData->status == 1 ? "checked" : "" }} name="status" >
                        <label>Aktif</label>
                    </div>
                </div>
            </div>
            <button class="right floated ui button primary">Save & Update</button>
        </form>
        <a href="{{ route("getVoucher") }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
@endsection