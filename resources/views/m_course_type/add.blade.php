@extends('layout.master')

@section('title', 'Add Difficulty Type')

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <div style="padding: 0px 12px 0px 12px;">
        <h2>Add Course Type</h2>
        <hr style="padding-bottom:1%">
        <form class="ui form" action="" method="post">
            @csrf
            <div class="field">
                <div class="field">
                    <label for="">Name</label>
                    <input type="text" name="name" placeholder="Masukkan Nama Course Type">
                    @if ($errors->has('name'))
                        @foreach ($errors->get('name') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="field">
                    <label for="">Slug</label>
                    <input type="text" name="slug" placeholder="Masukkan Slug Course Type">
                    @if ($errors->has('slug'))
                        @foreach ($errors->get('slug') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
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
            <button class="right floated ui button primary">Tambah Course Type</button>
        </form>
        <a href="{{ route('getCourseType') }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
@endsection