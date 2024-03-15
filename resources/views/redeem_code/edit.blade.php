@extends('layout.master')

@section('title', 'Edit Redeem Code')

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <div style="padding: 0px 12px 0px 12px;">
        <h2>Edit Redeem Code</h2>
        <hr style="padding-bottom:1%">
        <form class="ui form" action="{{ route('postEditRedeemCode', ['id' => request()->query('id')]) }}" method="post">
            @csrf

            <input type="text" name="id" value="{{ $currentData->id }}" style="display: none;">

            <div class="field">
                <div class="field">
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{ $currentData->name }}">
                </div>
                <div class="field">
                    <label for="">Code</label>
                    <input type="text" name="code" value="{{ $currentData->code }}">
                </div>

                <div class="three fields">

                    <div class="field">
                        <label for="">Quota</label>
                        <input type="number" name="quota" id="quota"
                            value="{{ $currentData->quota }}">
                    </div>

                    <div class="field">
                        <label for="">Type</label>
                        <input type="text" name="type" value="{{ $currentData->type }}">
                    </div>

                    <div class="field">
                        <label for="">Expired Date</label>
                        <input type="datetime-local" name="expired_date" value="{{ $currentData->expired_date }}">
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label for="">Access Master saat ini:</label>
                        <small>Pilih untuk hapus Access Master</small>
                        <select id="hapus" name="access_master_old[]" multiple="">
                            @foreach ($current_course_class_redeem_code as $item)
                                <option value="{{ $item->id }}">{{ $item->name }} - Batch{{ $item->batch }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="field">
                        <label for="">Access Master tersedia:</label>
                        <small>Pilih untuk tambah Access Master</small>
                        <select id="tambah" name="access_master_available[]" multiple="multiple">
                            @foreach ($allcourse_class_redeem_code as $item)
                                <option value="{{ $item->id }}">{{ $item->name }} - Batch{{ $item->batch }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="field">
                    <label for="">Description</label>
                    <textarea name="description" id="description">{{ $currentData->description }}</textarea>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1"
                            {{ $currentData->status == 1 ? 'checked' : '' }} name="status">
                        <label>Aktif</label>
                    </div>
                </div>
            </div>
            <button class="right floated ui button primary">Save & Update</button>
        </form>
        <a href="{{ route('getRedeemCode') }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
    <script>
        $('#hapus, #tambah').multiselect({
            maxHeight: 300,
            includeSelectAllOption: true,
            enableFiltering: true,
        });
    </script>
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection
