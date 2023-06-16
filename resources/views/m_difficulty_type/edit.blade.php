@extends('layout.master')

@section('title', 'Edit Difficulty Type')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <form class="ui form" action="{{ route('postEditDifficultyType', ['id' => request()->query('id')])}}" method="post">
            @csrf
            <div class="field">
                <div class="field">
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{ $currentData->name }}">
                    @if ($errors->has('name'))
                        @foreach ($errors->get('name') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="field">
                    <label for="">Difficulty Description</label>
                    <textarea name="description">{{ $currentData->description }}</textarea>
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
        <a href="{{ route('getDifficulty') }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
@endsection