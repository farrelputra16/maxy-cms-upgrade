@extends('layout.master')

@section('title', 'Edit Access Master')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <form class="ui form" action="{{ route('postEditAccessMaster', ['id' => request()->query('id')]) }}" method="post">
            @csrf
            <div class="field">
                <div class="field">
                    <label for="">ID Access Master</label>
                    <input type="text" value="{{ $accessmasters->id }}" disabled>
                </div>
                <div class="field">
                    <label for="">Access Master Name</label>
                    <input type="text" name="name" value="{{ $accessmasters->name }}">
                </div>
                <div class="field">
                    <label for="">Description</label>
                    <textarea name="description">{{ $accessmasters->description }}</textarea>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" {{ $accessmasters->status == 1 ? 'checked' : ''}} name="status" >
                        <label>Aktif</label>
                    </div>
                  </div>
            </div>
            <button class="right floated ui button primary">Save & Update</button>
        </form>
        <a href="{{ route("getAccessMaster") }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
   
@endsection