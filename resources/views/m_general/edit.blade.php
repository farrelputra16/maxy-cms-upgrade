@extends('layout.master')

@section('title', 'Edit General Data')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
    <h2 style="padding-bottom:3%">Edit General</h2>
        <form class="ui form" action="{{ route('postEditGeneral', ['id' => request()->query('id')]) }}" method="post">
            @csrf
            <div class="field">
                <div class="three fields">
                    <div class="field">
                        <label for="">ID Data</label>
                        <input type="text" value="{{ $generals->id }}" disabled>
                    </div>
                    <div class="field">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ $generals->name }}">
                    </div>
                    <div class="field">
                        <label for="">Value</label>
                        <input type="text" name="value" value="{{ $generals->value }}">
                    </div>
                </div>
                    
                <div class="field">
                    <label for="">Description</label>
                    <textarea name="description">{{ $generals->description }}</textarea>
                </div>
               
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" {{ $generals->status == 1 ? 'checked' : ''}} name="status" >
                        <label>Aktif</label>
                    </div>
                  </div>
            </div>
            <button class="right floated ui button primary">Save & Update</button>
        </form>
        <a href="{{ route("getGeneral") }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
@endsection