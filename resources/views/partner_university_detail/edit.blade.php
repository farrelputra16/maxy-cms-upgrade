@extends('layout.master')

@section('title', 'Add Partner University Details')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <form class="ui form" action="{{ route('postEditPartnerUniversityDetail', ['id' => request()->query('id')]) }}" method="post">
            @csrf
            <div class="field">
                <div class="field">
                    <label for="">ID University Details</label>
                    <input type="text" disabled value="{{ $currentData->pud_id }}">
                </div>
                <div class="three fields">
                    <div class="field">
                        <label for="">University Details Name</label>
                        <input type="text" name="name" value="{{ $currentData->pud_name }}">
                        @if ($errors->has('name'))
                            @foreach ($errors->get('name') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">University Details Type</label>
                        <select name="type" id="">
                            @if ($currentData->pud_type == "faculty")
                                <option selected value="faculty">Faculty</option>
                                <option value="major">Major</option>
                            @else
                                <option value="faculty">Faculty</option>
                                <option selected value="major">Major</option>
                            @endif
                        </select>
                    </div>
                    <div class="field">
                        <label for="">University Details Ref (Parent)</label>
                        <input type="text" name="ref" placeholder="set null or ignore if this parent" value="{{ $currentData->pud_ref }}">
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
                        <option value="{{ $currentData->partner_id }}" selected>{{ $currentData->partner_name }}</option>
                        @foreach ($allPartnerUniversitiesDetail as $item)
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
                    <textarea name="description">{{ $currentData->pud_description }}</textarea>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" {{ $currentData->pud_status == 1 ? "checked" : "" }} name="status" >
                        <label>Aktif</label>
                    </div>
                </div>
            </div>
            <button class="right floated ui button primary">Save & Update</button>
        </form>
        <a href="{{ route("getPartnerUniversityDetail") }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
@endsection