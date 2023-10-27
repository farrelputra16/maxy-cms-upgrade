@extends('layout.master')

@section('title', 'Edit Access Group')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <h2 style="padding-bottom:3%">Edit Access Group</h2>
        <form class="ui form" action="{{ route('postEditAccessGroup', ['id' => request()->query('id')]) }}" method="post">
            @csrf
            <div class="field">
                <div class="two fields">
                    <div class="field">
                        <label for="">ID</label>
                        <input type="text" value="{{ $accessgroups->id }}" disabled>
                    </div>
                    <div class="field">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ $accessgroups->name }}">
                    </div>
                </div>
                <div class="two fields">
                    <div class="field">
                        <label for="">Access Master saat ini:</label>
                        <small>Pilih untuk hapus Access Master</small>
                        <select id="hapus" name="access_master_old[]" multiple="multiple">
                            @foreach ($currentData as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="field">
                        <label for="">Access Master tersedia:</label>
                        <small>Pilih untuk tambah Access Master</small>
                        <select id="tambah" name="access_master_available[]" multiple="multiple">
                            @foreach ($allAccessMaster as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="field">
                    <label for="">Description</label>
                    <textarea name="description">{{ $accessgroups->description }}</textarea>
                </div>  
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" {{ $accessgroups->status == 1 ? 'checked' : ''}} name="status" >
                        <label>Aktif</label>
                    </div>
                  </div>
            </div>
            <button class="right floated ui button primary">Save & Update</button>
        </form>
        <a href="{{ route("getAccessGroup") }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
    <script>
        $('#hapus, #tambah').multiselect({
            maxHeight: 300,
            includeSelectAllOption: true,
            enableFiltering: true,
        });
    </script>
@endsection