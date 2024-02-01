@extends('layout.master')

@section('title', 'Edit Access Master')

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <div style="padding: 0px 12px 0px 12px;">
        <h2>Edit Access Master</h2>
        <hr style="padding-bottom:1%">
        <form class="ui form" action="{{ route('postEditAccessMaster', ['id' => request()->query('id')]) }}" method="post">
            @csrf
            <div class="field">
                <div class="two fields">
                    <div class="field">
                        <label for="">ID</label>
                        <input type="text" value="{{ $accessmasters->id }}" disabled>
                    </div>
                    <div class="field">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ $accessmasters->name }}">
                    </div>
                </div>
                <div class="field">
                    <label for="">Description</label>
                    <textarea name="description" id="description"{{ $accessmasters->description }}</textarea>
                    </div>
                    <div class="field">
                        <div class="ui checkbox">
                            <input class="form-check-input" type="checkbox" value="1" {{ $accessmasters->status == 1 ? 'checked' : '' }} name="status" >
                            <label>Aktif</label>
                        </div>
                      </div>
                </div>
                <button class="right floated ui button primary">Save & Update</button>
            </form>
            <a href="{{ route('getAccessMaster') }}"><button class=" right floated ui red button">Batal</button></a>
        </div>
        <script>
            CKEDITOR.replace('description');
        </script>
@endsection
