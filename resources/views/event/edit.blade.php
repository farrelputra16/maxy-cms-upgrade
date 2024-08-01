@extends('layout.master')

@section('title', 'Edit Event')

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <div style="padding: 0px 12px 0px 12px;">
        <h2>Edit Event</h2>
        <hr style="padding-bottom:1%">
        <form class="ui form" action="{{ route('postEditEvent', ['id' => request()->query('id')]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="field">
                <div class="field">
                    <label for="">Event Type</label>
                    <select name="event_type" class="ui dropdown">
                        @foreach ($event_types as $item)
                        <option value="{{ $item->id }}" {{ $event->m_event_type_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="field">
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{ $event->name }}">
                    @if ($errors->has('name'))
                        @foreach ($errors->get('name') as $error)
                            <span style="color: red;">{{ $error }}</span>
                        @endforeach
                    @endif
                </div>

                <div class="field">
                    <label for="date">Date Start</label>
                    <input type="datetime-local" id="date" name="date_start" value="{{ $event->date_start }}">
                    @if ($errors->has('date'))
                        @foreach ($errors->get('date') as $error)
                            <span style="color: red;">{{ $error }}</span>
                        @endforeach
                    @endif
                </div>

                <div class="field">
                    <label for="date">Date End</label>
                    <input type="datetime-local" id="date" name="date_end" value="{{ $event->date_end }}">
                    @if ($errors->has('date'))
                        @foreach ($errors->get('date') as $error)
                            <span style="color: red;">{{ $error }}</span>
                        @endforeach
                    @endif
                </div>

                <div class="field">
                    <label for="">Url</label>
                    <input type="text" name="url" value="{{ $event->url }}">
                    @if ($errors->has('url'))
                        @foreach ($errors->get('url') as $error)
                            <span style="color: red;">{{ $error }}</span>
                        @endforeach
                    @endif
                </div>

                <div class="field">
                    <label for="date">Image</label>
                    <img src="{{ asset('uploads/event/'.$event->image) }}" width="100px" height="auto" alt="image"/>
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
                    <textarea name="description" id="description">{{ $event->description }}</textarea>
                </div>

                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" name="need_verification" {{ $event->is_need_verification == 1 ? 'checked' : '' }}>
                        <label>Need Verification</label>
                    </div>
                </div>

                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" name="public" {{ $event->is_public == 1 ? 'checked' : '' }}>
                        <label>Public</label>
                    </div>
                </div>

                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1"
                            {{ $event->status == 1 ? 'checked' : '' }} name="status">
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
        CKEDITOR.replace('content');
    </script>
@endsection
