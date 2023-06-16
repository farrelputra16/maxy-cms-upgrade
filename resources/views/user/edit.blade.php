@extends('layout.master')

@section('title', 'Edit User')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <form class="ui form" method="post">
            @csrf
            <div class="field">
                <div class="field">
                    <label for="">ID Users</label>
                    <input type="text" name="name" value="{{ request()->query('id') }}" disabled>
                </div>
                <div class="field">
                    <label for="">Username</label>
                    <input type="text" name="name" value="{{ $currentData->value('name') }}">
                </div>
                @if ($errors->has('username'))
                    @foreach ($errors->get('username') as $error)
                        <span style="color: red;">{{$error}}</span>
                    @endforeach
                @endif
                <div class="field">
                    <label for="">Email</label>
                    <input type="email" name="email" value="{{ $currentData->value('email') }}">
                </div>
                @if ($errors->has('email'))
                    @foreach ($errors->get('email') as $error)
                        <span style="color: red;">{{$error}}</span>
                    @endforeach
                @endif
                <div class="field">
                    <label>Password</label>
                    <small>The password has been hashing, no one can't see the password. <span style="color: blue;">You can change below if you want it.</span></small>
                    <input type="password" name="password" value="{{ $currentData->value('password') }}">
                </div>
                @if ($errors->has('password'))
                    @foreach ($errors->get('password') as $error)
                        <span style="color: red;">{{$error}}</span>
                    @endforeach
                @endif
                <div class="two fields">
                    <div class="field">
                        <div class="field">
                            <label for="">User Type</label>
                            <select class="ui dropdown" name="type" id="">
                                @if ($currentData->value('type') == 'admin')
                                    <option selected value="{{ $currentData->value('type') }}">{{ $currentData->value('type') }}</option>
                                    <option value="tutor">Tutor</option>
                                @else
                                    <option selected value="{{ $currentData->value('type') }}">{{ $currentData->value('type') }}</option>
                                    <option value="admin">Admin</option>
                                @endif
                            </select>
                        </div>
                        <div class="field" style="margin-top: 12px;">
                            <label for="">Access Group</label>
                            <select name="access_group" class="ui dropdown" >
                                <option selected value="{{ $currentData->value('access_group_id') }}">{{ $currentData->value('access_group_name') }}</option>
                                @foreach ($allAccessGroups as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="field">
                        <label for="">Users Description (Optional)</label>
                        <textarea name="" id="" rows="5">{{ $currentData->value('description') }}</textarea>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" {{ $currentData->value('status') == 1 ? 'checked' : '' }} name="status" >
                        <label>Aktif</label>
                    </div>
                </div>
            </div>
            <button class="right floated ui button primary">Save & Update</button>
        </form>
        <a href="{{ route("getUser") }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
@endsection