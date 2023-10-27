@extends('layout.master')

@section('title', 'Add Access Group')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <h2 style="padding-bottom:3%">Add Access Group</h2>
        <form class="ui form" action="{{ route('postAddAccessGroup') }}" method="post">
            @csrf
            <div class="field">
                <div class="field">
                    <label for="">Name</label>
                    <input type="text" name="name" placeholder="Masukkan Nama Access Group">
                    @if ($errors->has('name'))
                        @foreach ($errors->get('name') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="field">
                    <label for="">Description</label>
                    <textarea name="description"></textarea>
                </div>
                <div class="field">
                    <label for="access_master">Pilih Access Master:</label>
                    <select id="demo" name="access_master[]" multiple="multiple">
                        @foreach ($accessMasters as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('access_master'))
                        @foreach ($errors->get('access_master') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" name="status" >
                        <label>Aktif</label>
                    </div>
                  </div>
            </div>
            <button class="right floated ui button primary">Tambah Access Group</button>
        </form>
        <a href="{{ route("getAccessGroup") }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
    <script>
        $('#demo').multiselect({
            maxHeight: 300,
            includeSelectAllOption: true,
            enableFiltering: true,
        });
    </script>
@endsection