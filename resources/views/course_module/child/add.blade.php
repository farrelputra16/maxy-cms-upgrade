@extends('layout.master')

@section('title', 'Add Child Module')
    
@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <form class="ui form" action="{{ route('postAddChildModule', ['parentId' => $parent->id]) }}" method="post">
            @csrf
            <div class="field">
                <div class="field">
                    <label for="">Parent Module</label>
                    <input type="text" value="{{ $parent->name }}" disabled>
                </div>
                <div class="three fields">
                    <div class="field">
                        <label for="">Child Module Name</label>
                        <input type="text" name="name">
                    </div>
                    <div class="field">
                        <label for="">Child Priority</label>
                        <input type="number" name="priority">
                    </div>
                    <div class="field">
                        <label for="">Child Level</label>
                        <input type="number" name="level">
                    </div>
                </div>
                <div class="field">
                    <label for="">Child Module Content</label>
                    <textarea name="content"></textarea>
                </div>
                <div class="field">
                    <label for="">Child Module Description</label>
                    <textarea name="description"></textarea>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" name="status" >
                        <label>Aktif</label>
                    </div>
                </div>
            </div>
            <button class="right floated ui button primary">Tambah Child Module</button>
        </form>
        <a href="{{ url()->previous() }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
@endsection