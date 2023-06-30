@extends('layout.master')

@section('title', 'Add General Data')

@section('content')
<div style="padding: 0px 12px 0px 12px;">
        <form class="ui form" action="{{ route('postAddGeneral') }}" method="post">
            @csrf
            <div class="field">
                <div class="three fields">
                    <div class="field">
                        <label for="">Name</label>
                        <input type="text" name="name">
                        @if ($errors->has('name'))
                            @foreach ($errors->get('name') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="field">
                    <label for="">Value</label>
                    <input type="text" name="value">
                    @if ($errors->has('value'))
                        @foreach ($errors->get('value') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="field">
                    <label for="">Description</label>
                    <textarea name="description"></textarea>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" name="status" >
                        <label>Aktif</label>
                    </div>
                </div>
            </div>
            <button class="right floated ui button primary">Tambah Data</button>
        </form>
        <a href="{{ route('getGeneral') }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
@endsection