@extends('layout.master')

@section('title', 'Add Partner University Details')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <form class="ui form" action="" method="post">
            @csrf
            <div class="field">
                <div class="three fields">
                    <div class="field">
                        <label for="">University Details Name</label>
                        <input type="text" name="name">
                        @if ($errors->has('name'))
                            @foreach ($errors->get('name') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">University Details Type</label>
                        <select name="type" id="">
                            <option value="">-- Silakan pilih tipe detail --</option>
                            <option value="faculty">Faculty</option>
                            <option value="major">Major</option>
                        </select>
                        @if ($errors->has('type'))
                            @foreach ($errors->get('type') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">University Details Ref (Parent)</label>
                        <input type="text" name="ref" placeholder="set null or ignore if this parent">
                        @if ($errors->has('ref'))
                            @foreach ($errors->get('ref') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="field">
                    <label for="">ID Partner University</label>
                    <select name="partner_id" id="">
                        <option value="">-- Silakan pilih universitas --</option>
                        @foreach ($partners as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('partner_id'))
                        @foreach ($errors->get('partner_id') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="field">
                    <label for="">Description</label>
                    <textarea name="description"></textarea>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" name="status" >
                        <label>Aktif</label>
                    </div>
                </div>
            </div>
            <button class="right floated ui button primary">Tambah Detail Partner Universitas</button>
        </form>
        <a href="{{ route("getPartnerUniversityDetail") }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
@endsection