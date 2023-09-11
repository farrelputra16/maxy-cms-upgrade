@extends('layout.master')

@section('title', 'Add User')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <form class="ui form" method="post">
            @csrf
            <div class="field">
                <div class="field">
                    <label for="">Username</label>
                    <input type="text" name="name">
                </div>
                @if ($errors->has('username'))
                    @foreach ($errors->get('username') as $error)
                        <span style="color: red;">{{$error}}</span>
                    @endforeach
                @endif
                <div class="field">
                    <label for="">Email</label>
                    <input type="email" name="email">
                </div>
                @if ($errors->has('email'))
                    @foreach ($errors->get('email') as $error)
                        <span style="color: red;">{{$error}}</span>
                    @endforeach
                @endif
                <div class="field">
                    <label>Password</label>
                    <input type="password" name="password">
                </div>
                @if ($errors->has('password'))
                    @foreach ($errors->get('password') as $error)
                        <span style="color: red;">{{$error}}</span>
                    @endforeach
                @endif
                <div class="three wide field">
                    <label for="">User Type</label>
                    <select class="ui dropdown" name="type" id="">
                        <option value="">-- Pilih User Type --</option>
                        <option value="admin">Admin</option>
                        <option value="tutor">Tutor</option>
                    </select>
                    @if ($errors->has('type'))
                        @foreach ($errors->get('type') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="three wide field">
                    <label for="">Access Group</label>
                    <select name="access_group" class="ui dropdown" >
                        <option value="">-- Pilih Access Group --</option>
                        @foreach ($allAccessGroups as $item)
                            <option value="{{ $item->id }}">{{ $item->name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('access_group'))
                        @foreach ($errors->get('access_group') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="field">
                    <label for="">Users Description (Optional)</label>
                    <textarea name="description" id=""></textarea>
                </div>
                
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" name="status" >
                        <label>Aktif</label>
                    </div>
                </div>
            </div>
            <button class="right floated ui button primary">Tambah User</button>
        </form>
        <a href="{{ route("getUser") }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
@endsection