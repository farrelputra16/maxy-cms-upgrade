@extends('layout.master')

@section('title', 'Add User')

@section('content') 
    <div style="padding: 0px 12px 0px 12px;">
        <h2 style="padding-bottom:3%">Add Users</h2>
        <form class="ui form" method="post" action="{{ route('postAddUser') }}">
            @csrf
            <div class="two fields">
                <div class="field">
                    <label for="name">Username</label>
                    <input type="text" name="name" id="name" placeholder="Masukkan Username">
                    @if ($errors->has('name'))
                        @foreach ($errors->get('name') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="field">
                    <label for="access_group">Role</label>
                    <select name="access_group" class="ui dropdown" id="access_group">
                        <option value="">-- Pilih Role --</option>
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
            </div>
            <div class="two fields">
                <div class="field">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Masukkan Email">
                    @if ($errors->has('email'))
                        @foreach ($errors->get('email') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="field">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Masukkan Password">
                    @if ($errors->has('password'))
                        @foreach ($errors->get('password') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="field">
                <label for="description">Users Description (Optional)</label>
                <textarea name="description" id="description"></textarea>
            </div>
            
            <div class="field">
                <label for="status">Aktif</label>
                <div class="ui checkbox">
                    <input class="form-check-input" type="checkbox" value="1" name="status" id="status">
                    <label for="status">Aktif</label>
                </div>
            </div>
            <button class="right floated ui button primary">Tambah User</button>
        </form>
        <form method="post" action="{{ route('user.import-csv') }}" enctype="multipart/form-data">
            @csrf
            <div class="field">
                <label for="csv_file">Upload File CSV:</label>
                <input type="file" name="csv_file" id="csv_file" accept=".csv">
                @error('csv_file')
                    <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="right floated ui button primary" style="margin-top:-1.9%">Upload CSV</button>
        </form>

        <a href="{{ route("getUser") }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
@endsection
