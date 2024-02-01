@extends('layout.master')

@section('title', 'Add General Data')

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
<div style="padding: 0px 12px 0px 12px;">
    <h2>Add General</h2>
    <hr style="padding-bottom:1%">
        <form class="ui form" action="{{ route('postAddGeneral') }}" method="post">
            @csrf
            <div class="field">
                <div class="two fields">
                    <div class="field">
                        <label for="">Name</label>
                        <input type="text" name="name" placeholder="Masukkan Nama">
                        @if ($errors->has('name'))
                            @foreach ($errors->get('name') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">Value</label>
                        <input type="text" name="value" placeholder="Masukkan Value">
                        @if ($errors->has('value'))
                            @foreach ($errors->get('value') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
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