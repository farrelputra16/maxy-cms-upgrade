@extends('layout.master')

@section('title', 'Dashboard')

@section('content')
    <div style="padding: 12px;">
       Sugeng Ravvuh, {{Auth::user()->name}}
    </div>
@endsection