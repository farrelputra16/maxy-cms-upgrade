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
                    <textarea disabled>{{ $currentData->content }}</textarea>
                </div>

                <div class="field">
                    <label for="">Score</label>
                    <input type="text" value="{{ $currentData->score }}" disabled style='background-color: white;'>
                </div>

                <div class="field">
                    <label for="">Created At</label>
                    <input type="text" value="{{ $currentData->created_at }}" disabled style='background-color: white;'>
                </div>
            </div>
        </form>
    </div>
    <script>
        CKEDITOR.replace('description');
        CKEDITOR.replace('content');
    </script>
@endsection
