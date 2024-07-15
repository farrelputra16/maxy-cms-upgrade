@extends('layout.master')

@section('title', 'Add General Data')

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <div style="padding: 0px 12px 0px 12px;">
        <h2>Edit Carousel</h2>
        <hr style="padding-bottom:1%">
        <form class="ui form" action="{{ route('postEditCarousel', ['id' => request()->query('id')]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="field">
                <div class="field">
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{ $carousel->name }}">
                    @if ($errors->has('name'))
                        @foreach ($errors->get('name') as $error)
                            <span style="color: red;">{{ $error }}</span>
                        @endforeach
                    @endif
                </div>

                <div class="field">
                    <label for="">Short Description</label>
                    <input type="text" name="short_desc" value="{{ $carousel->short_desc }}">
                    @if ($errors->has('short_desc'))
                        @foreach ($errors->get('short_desc') as $error)
                            <span style="color: red;">{{ $error }}</span>
                        @endforeach
                    @endif
                </div>
                <div class="field">
                    <label for="date">Date</label>
                    <input type="date" id="date" name="date" value="{{ $carousel->date }}">
                    @if ($errors->has('date'))
                        @foreach ($errors->get('date') as $error)
                            <span style="color: red;">{{ $error }}</span>
                        @endforeach
                    @endif
                </div>
                <div class="field">
                    <label for="date">Image</label>
                    <img src="{{ asset('uploads/carousel/about-us/'.$carousel->image) }}" width="100px" height="auto" alt="image"/>
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
                    <textarea name="description" id="description">{{ $carousel->description }}</textarea>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1"
                            {{ $carousel->status == 1 ? 'checked' : '' }} name="status">
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
        CKEDITOR.replace('content');
    </script>
@endsection
