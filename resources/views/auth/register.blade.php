@extends('layout.master')

@section('title', 'Register')

@section('content')
<div style="width: 18rem; top:50%; left:50%; position: absolute; transform: translate(-50%, -50%);">
    <center>
        <h1>Maxy's CMS</h1>
    </center>
    <hr>
    <form class="ui form" style="padding: 10px;" method="post">
        @csrf
        <div class="field">
            <label>Nama</label>
            <input type="text" name="nama">
        </div>
        <div class="field">
            <label>Email</label>
            <input type="email" name="email">
        </div>
        <div class="field">
            <label>Password</label>
            <input type="password" name="password">
        </div>
        <div class="ui horizontal divider">     
            <button class="ui button primary" type="submit">Register</button>
        </div>
        <p>Wis nduwe akun? <a href="{{ route('login') }}">Login ingkene</a></p>
    </form>
</div>
@endsection