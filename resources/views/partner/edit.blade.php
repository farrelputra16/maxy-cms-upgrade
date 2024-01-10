@extends('layout.master')

@section('title', 'Add Partners')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <h2 style="padding-bottom:3%">Edit Partner</h2>
        <form class="ui form"
            action="{{ route('postEditPartner', ['id' => request()->query('id'), 'logo_dump' => $partners->logo]) }}"
            method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" name="img_keep" value="{{ $partners->logo }}" hidden>
            <div class="field">

                <div class="three fields">
                    <div class="field">
                        <label for="">ID</label>
                        <input type="text" value="{{ $partners->id }}" disabled>
                    </div>
                    <div class="field">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ $partners->name }}">
                        @if ($errors->has('name'))
                            @foreach ($errors->get('name') as $error)
                                <span style="color: red;">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">Type</label>
                        <input type="text" name="type" value="{{ $partners->type }}">
                        @if ($errors->has('type'))
                            @foreach ($errors->get('type') as $error)
                                <span style="color: red;">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <!-- <div class="field">
                                                <label for="">Logo</label>
                                                <input type="file" name="logo">
                                                <small>Current logo: {{ $partners->logo }}</small>
                                            </div> -->
                </div>
                <div class="three fields">
                    <div class="field">
                        <label for="">Email</label>
                        <input type="text" name="email" value="{{ $partners->email }}">
                        @if ($errors->has('email'))
                            @foreach ($errors->get('email') as $error)
                                <span style="color: red;">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">Phone</label>
                        <input type="number" name="phone" value="{{ $partners->phone }}">
                        @if ($errors->has('phone'))
                            @foreach ($errors->get('phone') as $error)
                                <span style="color: red;">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">Contact Person</label>
                        <input type="number" name="contact_person" value="{{ $partners->contact_person }}">
                        @if ($errors->has('contact_person'))
                            @foreach ($errors->get('contact_person') as $error)
                                <span style="color: red;">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="field">
                    <label for="">URL</label>
                    <input type="text" name="url" value="{{ $partners->url }}">
                    @if ($errors->has('url'))
                        @foreach ($errors->get('url') as $error)
                            <span style="color: red;">{{ $error }}</span>
                        @endforeach
                    @endif
                </div>
                <div class="field">
                    <label for="">Logo</label>
                    <input type="file" id="formFile" name="logo" onchange="preview()">
                    <br>
                    <img id="frame" src="{{ asset('uploads/partner/' . $partners->logo) }}" class="img-fluid" />
                </div>
                <div class="field">
                    <label for="">Address</label>
                    <textarea name="address" id="address">{{ $partners->address }}</textarea>
                </div>

                <div class="field">
                    <label for="">Description</label>
                    <textarea name="description" id="description">{{ $partners->description }}</textarea>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1"
                            {{ $partners->status_highlight == 1 ? 'checked' : '' }} name="status_highlight">
                        <label>Highlight</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1"
                            {{ $partners->status == 1 ? 'checked' : '' }} name="status">
                        <label>Aktif</label>
                    </div>
                </div>
            </div>
            <button class="right floated ui button primary">Save & Update</button>
        </form>
        <a href="{{ route('getPartner') }}"><button class=" right floated ui red button">Batal</button></a>
    </div>

    <script>
        CKEDITOR.replace('address');
        CKEDITOR.replace('description');
    </script>
@endsection

<script>
    function preview() {
        frame.src = URL.createObjectURL(event.target.files[0]);
    }
</script>
