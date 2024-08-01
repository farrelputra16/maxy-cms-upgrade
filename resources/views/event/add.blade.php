@extends('layout.master')

@section('title', 'Add Event')

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <div style="padding: 0px 12px 0px 12px;">
        <h2>Add Event</h2>
        <hr style="padding-bottom:1%">
        <form class="ui form" action="{{ route('postAddEvent') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="field">
                <div class="field">
                    <label for="">Event Type</label>
                    <select name="event_type" class="ui dropdown">
                        @foreach ($event_types as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="field">
                    <label for="">Name</label>
                    <input type="text" name="name">
                    @if ($errors->has('name'))
                        @foreach ($errors->get('name') as $error)
                            <span style="color: red;">{{ $error }}</span>
                        @endforeach
                    @endif
                </div>

                <div class="field">
                    <label for="date">Date Start</label>
                    <input type="datetime-local" id="date" name="date_start">
                    @if ($errors->has('date'))
                        @foreach ($errors->get('date') as $error)
                            <span style="color: red;">{{ $error }}</span>
                        @endforeach
                    @endif
                </div>

                <div class="field">
                    <label for="date">Date End</label>
                    <input type="datetime-local" id="date" name="date_end">
                    @if ($errors->has('date'))
                        @foreach ($errors->get('date') as $error)
                            <span style="color: red;">{{ $error }}</span>
                        @endforeach
                    @endif
                </div>

                <div class="field">
                    <label for="">Url</label>
                    <input type="text" name="url">
                    @if ($errors->has('url'))
                        @foreach ($errors->get('url') as $error)
                            <span style="color: red;">{{ $error }}</span>
                        @endforeach
                    @endif
                </div>

                <div class="field">
                    <label for="date">Image</label>
                    <input class="form-control" type="file" id="image" name="image">
                    <p>recommended size max 5mb</p>
                    @if ($errors->has('image'))
                        @foreach ($errors->get('image') as $error)
                            <span style="color: red;">{{ $error }}</span>
                        @endforeach
                    @endif
                </div>
    
                <div class="field">
                    <label for="">Description</label>
                    <textarea name="description" id="description"></textarea>
                    @if ($errors->has('description'))
                        @foreach ($errors->get('description') as $error)
                            <span style="color: red;">{{ $error }}</span>
                        @endforeach
                    @endif
                </div>

                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" name="need_verification">
                        <label>Need Verification</label>
                    </div>
                </div>

                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" name="public">
                        <label>Public</label>
                    </div>
                </div>

                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" name="status">
                        <label>Aktif</label>
                    </div>
                </div>
            </div>
            <button class="right floated ui button primary">Tambah Data</button>
        </form>
        <a href="{{ route('getEvent') }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection
