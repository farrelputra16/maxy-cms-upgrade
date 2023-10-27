@extends('layout.master')

@section('title', 'Edit User')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <form class="ui form" method="post">
            @csrf
            <div class="field">
                <div class="three fields">
                    <div class="field">
                        <label for="">ID Users</label>
                        <input type="text" name="name" value="{{ request()->query('id') }}" disabled>
                    </div>
                    <div class="field">
                        <label for="">Username</label>
                        <input type="text" name="name" value="{{ $currentData->name }}">
                    </div>
                    @if ($errors->has('username'))
                        @foreach ($errors->get('username') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                    <div class="field">
                        <div class="field" style="margin-top: 12px;">
                            <label for="">Access Group</label>
                            <select name="access_group" class="ui dropdown" >
                                <option selected value="{{ $currentData->access_group_id }}">{{ $currentData->access_group_name }}</option>
                                @foreach ($allAccessGroups as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label for="">Email</label>
                    <input type="email" name="email" value="{{ $currentData->email }}">
                </div>
                @if ($errors->has('email'))
                    @foreach ($errors->get('email') as $error)
                        <span style="color: red;">{{$error}}</span>
                    @endforeach
                @endif
                <div class="field">
                    <label>Password</label>
                    <small>The user's password has been hashed to protect their privacy, proceed to change it to your liking. <span style="color: blue;">Just make sure to remember it.</span></small>
                    <input type="password" name="password" value="{{ $currentData->password }}">
                </div>
                @if ($errors->has('password'))
                    @foreach ($errors->get('password') as $error)
                        <span style="color: red;">{{$error}}</span>
                    @endforeach
                @endif
                
                
                <div class="field">
                    <label for="">Users Description (Optional)</label>
                    <textarea selected value="{{ $currentData->description }}" name="description" id="" rows="5">{{ $currentData->description }}</textarea>
                </div>
                
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" {{ $currentData->status == 1 ? 'checked' : '' }} name="status" >
                        <label>Aktif</label>
                    </div>
                </div>
            </div>
            <button class="right floated ui button primary">Save & Update</button>
        </form>
        <a href="{{ route("getUser") }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
@endsection