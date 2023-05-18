@extends('layout.master')

@section('title', 'Login')

@section('content')
<div class="card" style="width: 18rem;">
    <form style="padding: 10px;" method="post">
        @csrf
        <div class="form-group">
            <label for="">Email address</label>
            <input type="email" class="form-control" placeholder="Enter email" name="email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control" id="" placeholder="Password" name="password"></div>
            <div class="form-group form-check">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection