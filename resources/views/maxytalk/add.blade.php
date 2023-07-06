@extends('layout.master')

@section('title', 'Add Maxy Talk Data')

@section('content')
<div style="padding: 0px 12px 0px 12px;">
        <form class="ui form" action="{{ route('postAddMaxyTalk') }}" method="post">
            @csrf
                <div class="three fields">
                    <div class="field">
                        <label for="">Name</label>
                        <input type="text" name="name">
                        @if ($errors->has('name'))
                            @foreach ($errors->get('name') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="eight fields">
                    <div class="field">
                        <label for="start-date">Start Date</label>
                        <input type="datetime-local" id="start-date" name="datestart" onchange="updateEndDateMin()">
                        @if ($errors->has('datestart'))
                        @foreach ($errors->get('datestart') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                    </div>
                </div>
                <div class="eight fields">
                    <div class="field">
                        <label for="end-date">End Date</label>
                        <input type="datetime-local" id="end-date" name="dateend">
                        @if ($errors->has('dateend'))
                        @foreach ($errors->get('dateend') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                    </div>
                </div>
                <div class="three fields">
                    <div class="field">
                        <label for="">Regsistration Link</label>
                        <input type="text" name="registration">
                    </div>
                </div>
                <div class="field">
                    <label for="">User ID</label>
                    <select name="userid" class="ui dropdown">
                    <option value="">-- Pilih User --</option>
                        @foreach ($users as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('userid'))
                        @foreach ($errors->get('userid') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="field">
                    <label for="">Maxy Talk Parents</label>
                    <select name="parentsid" class="ui dropdown">
                    <option value="">-- Pilih Parents --</option>
                        @foreach ($maxytalk as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
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
            <button class="right floated ui button primary">Tambah Data</button>
        </form>
        <a href="{{ route('getMaxyTalk') }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
    <script>
        function updateEndDateMin() {
        var startDateInput = document.getElementById('start-date');
        var endDateInput = document.getElementById('end-date');
        endDateInput.min = startDateInput.value;
    }
    </script>
@endsection