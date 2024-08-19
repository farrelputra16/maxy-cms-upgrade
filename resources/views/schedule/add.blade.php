@extends('layout.master')

@section('title', 'Add Carousel')

@section('head')
<link href="{{ asset('assets\cms-v3\libs\tui-date-picker\tui-date-picker.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets\cms-v3\libs\tui-time-picker\tui-time-picker.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets\cms-v3\libs\tui-calendar\tui-calendar.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <div style="padding: 0px 12px 0px 12px;">
        <h2>Add Carousel</h2>
        <hr style="padding-bottom:1%">
        <form class="ui form" action="{{ route('postAddCarousel') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="field">
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
                    <label for="">Short Description</label>
                    <input type="text" name="short_desc">
                    @if ($errors->has('short_desc'))
                        @foreach ($errors->get('short_desc') as $error)
                            <span style="color: red;">{{ $error }}</span>
                        @endforeach
                    @endif
                </div>

                <div class="field">
                    <label for="date">Date</label>
                    <input type="date" id="date" name="date">
                    @if ($errors->has('date'))
                        @foreach ($errors->get('date') as $error)
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
                        <input class="form-check-input" type="checkbox" value="1" name="status">
                        <label>Aktif</label>
                    </div>
                </div>
            </div>
            <button class="right floated ui button primary">Tambah Data</button>
        </form>
        <a href="{{ route('getCarousel') }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection
