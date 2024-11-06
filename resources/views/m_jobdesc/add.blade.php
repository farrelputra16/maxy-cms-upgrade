@extends('layout.master')

@section('title', 'Add Partnership')

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <div style="padding: 0px 12px 0px 12px;">
        <h2>Add Partnership</h2>
        <hr style="padding-bottom:1%">
        <form class="ui form" action="{{ route('postAddPartnership') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="field">
                <div class="field">
                    <label for="">Partner</label>
                    <select name="partner" class="ui dropdown">
                        @foreach ($partners as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="field">
                    <label for="">Partnership Type</label>
                    <select name="partnership_type" class="ui dropdown">
                        @foreach ($partnership_types as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="field">
                    <label for="date">File</label>
                    <input class="form-control" type="file" id="file" name="file">
                    <p>recommended size max 5mb</p>
                    @if ($errors->has('file'))
                        @foreach ($errors->get('file') as $error)
                            <span style="color: red;">{{ $error }}</span>
                        @endforeach
                    @endif
                </div>

                <div class="field">
                    <label for="date_start">Date Start</label>
                    <input type="date" id="date_start" name="date_start">
                    @if ($errors->has('date_start'))
                        @foreach ($errors->get('date_start') as $error)
                            <span style="color: red;">{{ $error }}</span>
                        @endforeach
                    @endif
                </div>

                <div class="field">
                    <label for="date_end">Date End</label>
                    <input type="date" id="date_end" name="date_end">
                    @if ($errors->has('date_end'))
                        @foreach ($errors->get('date_end') as $error)
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
                        <input class="form-check-input" type="checkbox" value="1" name="status">
                        <label>Aktif</label>
                    </div>
                </div>
            </div>
            <button class="right floated ui button primary">Tambah Data</button>
        </form>
        <a href="{{ route('getPartnership') }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection
