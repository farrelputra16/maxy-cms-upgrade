@extends('layout.master')

@section('title', 'Add Partners')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <form class="ui form" action="" method="post">
            @csrf
            <div class="field">
                <div class="three fields">
                    <div class="field">
                        <label for="">Partners Name</label>
                        <input type="text" name="name">
                        @if ($errors->has('name'))
                            @foreach ($errors->get('name') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">Partners Type</label>
                        <input type="text" name="type">
                        @if ($errors->has('type'))
                            @foreach ($errors->get('type') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">Partners Logo</label>
                        <input type="file" name="logo">
                    </div>
                </div>
                <div class="field">
                    <label for="">Partners URL</label>
                    <input type="text" name="url">
                    @if ($errors->has('url'))
                        @foreach ($errors->get('url') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="field">
                    <label for="">Address</label>
                    <textarea name="address"></textarea>
                </div>
                <div class="three fields">
                    <div class="field">
                        <label for="">Partners Email</label>
                        <input type="text" name="email">
                        @if ($errors->has('email'))
                            @foreach ($errors->get('email') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">Partners Phone</label>
                        <input type="number" name="phone">
                        @if ($errors->has('phone'))
                            @foreach ($errors->get('phone') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">Partners Contact Person</label>
                        <input type="number" name="contact_person">
                        @if ($errors->has('contact_person'))
                            @foreach ($errors->get('contact_person') as $error)
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
                        <input class="form-check-input" type="checkbox" value="1" name="status_highlight" >
                        <label>Aktif (Status Highlight)</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" name="status" >
                        <label>Aktif</label>
                    </div>
                </div>
            </div>
            <button class="right floated ui button primary">Tambah Partner</button>
        </form>
        <a href="{{ route("getPartner") }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
@endsection