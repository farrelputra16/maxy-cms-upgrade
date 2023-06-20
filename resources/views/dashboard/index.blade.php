@extends('layout.master')

@section('title', 'Dashboard')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <div class="ui message">
            <div class="header">
                Sugeng Rawuh, {{ Auth::user()->name }}
            </div>
            <p>Aplikasi ini sedang tahap pengembangan, beberapa kesalahan mungkin terjadi. Silakan hubungi <a href="">backend team development</a>.</p>
        </div>
        <div class="ui three stackable cards">
            <div class="ui card" style="width: 10%;">
                <div class="content">
                    <div class="center aligned header">{{ $accessMaster }}</div>
                </div>
                <div class="extra content">
                    <div class="center aligned">
                        Access Master
                    </div>
                </div>
            </div>
            <div class="ui card" style="width: 10%;">
                <div class="content">
                    <div class="center aligned header">{{ $user }}</div>
                </div>
                <div class="extra content">
                    <div class="center aligned">
                        User Active
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection