@extends('layout.master')

@section('title', 'Survey Result Detil')

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
<div style="padding: 0px 12px 0px 12px;">
    <h2>Survey Result Detil</h2>
    <hr style="padding-bottom:1%">
    <form class="ui form">
        <div class="field">
            <div class="field">
                <label for="">Survey</label>
                <input type="text" value="{{ $currentData->MSurvey->name }}" disabled style='background-color: white;'>
            </div>

            <div class="field">
                <label for="">Responden</label>
                <input type="text" value="{{ $currentData->User->name }}" disabled style='background-color: white;'>
            </div>

            <div class="field">
    <label for="">Content</label>
    @php
        $contentData = json_decode($currentData->content, true); // Decode JSON data
    @endphp

    @if($contentData)
        @foreach($contentData as $key => $value)
            @if($key != 'id' && $key != 'score')
                @php
                    $formattedKey = str_replace('_', ' ', $key);
                @endphp
                <div class="field">
                <textarea readonly>
Q: {{ $formattedKey }}{{ substr($formattedKey, -1) == '?' ? '' : '?' }}
A: {{ $value }}
                </textarea>
            @endif
            </div>
        @endforeach
    @else
        <textarea readonly>Tidak ada data.</textarea>
    @endif
</div>

            <div class="ui form stacked">
                <div class="field">
                    <label for="">Score</label>
                    <input type="text" value="{{ $currentData->score }}" disabled style='background-color: white;'>
                </div>
            </div>
            
            <div class="ui form stacked">
                <div class="field">
                    <label for="">Created At</label>
                    <input type="text" value="{{ $currentData->created_at }}" disabled style='background-color: white;'>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    CKEDITOR.replace('description');
    CKEDITOR.replace('content');
</script>


@endsection
