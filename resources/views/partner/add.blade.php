@extends('layout.master')

@section('title', 'Add Partners')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <h2 style="padding-bottom:3%">Add Partner</h2>    
        <form class="ui form" action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="field">
                <div class="three fields">
                    <div class="field">
                        <label for="">Name</label>
                        <input type="text" name="name" placeholder="Masukkan Nama Partner">
                        @if ($errors->has('name'))
                            @foreach ($errors->get('name') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="type">Type</label>
                        <select class="ui dropdown" name="type">
                            @foreach ($partnerTypes as $partnerType)
                                <option value="{{ $partnerType->type }}">{{ $partnerType->type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- <div class="field">
                        <label for="">Logo</label>
                        <input type="file" name="logo">
                    </div> -->

                    <div class="field">
                        <label>Logo</label>
                        <input type="file" id="formFile" name="logo" onchange="preview()">
                        <br>
                        <img id="frame" src="" class="img-fluid" />
                    </div>
                </div>
                <div class="field">
                    <label for="">URL</label>
                    <input type="text" name="url" placeholder="Masukkan Link URL">
                    @if ($errors->has('url'))
                        @foreach ($errors->get('url') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="field">
                    <label for="">Address</label>
                    <textarea name="address"></textarea>
                </div>
                <div class="three fields">
                    <div class="field">
                        <label for="">Email</label>
                        <input type="text" name="email" placeholder="Masukkan Email Partner">
                        @if ($errors->has('email'))
                            @foreach ($errors->get('email') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">Phone</label>
                        <input type="number" name="phone" placeholder="Masukkan Nomor Telepon Partner">
                        @if ($errors->has('phone'))
                            @foreach ($errors->get('phone') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">Contact Person</label>
                        <input type="number" name="contact_person" placeholder="Masukkan Contact Person">
                        @if ($errors->has('contact_person'))
                            @foreach ($errors->get('contact_person') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="field">
                    <label for="">Description</label>
                    <textarea name="description"></textarea>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" name="status_highlight" >
                        <label>Highlight</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" name="status" >
                        <label>Aktif</label>
                    </div>
                </div>
            </div>
            <button class="right floated ui button primary">Tambah Partner</button>
        </form>
        <a href="{{ route("getPartner") }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
@endsection
<script>
        function preview() {
            frame.src = URL.createObjectURL(event.target.files[0]);
        }
</script>