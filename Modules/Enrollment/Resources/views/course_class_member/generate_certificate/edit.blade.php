@extends('layout.master')

@section('title', 'Set Template')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
<style>
    .field img {
        height: 70%;
    }
</style>
<div style="padding: 12px 12px 50px 12px;">
    <h2>Set Certificate Template For Class: {{ $class_detail->course_name }} Batch {{ $class_detail->batch }}</h2>
    <hr>
    <form class="ui form" action="{{ route('postEditCertificateTemplate', ['id' => $class_detail->id]) }}"
        method="post" enctype="multipart/form-data">
        @csrf
        <div class="two fields">
            <div class="field">
                <label for="Image" class="form-label"><h3>Sample:</h3></label>
                <br>
                <img src="{{ asset('uploads/certificate/template_example.png') }}" class="img-fluid" />
            </div>
            <div class="field">
                <label for="Image" class="form-label"><h3>Template</h3></label>
                <input class="form-control" type="file" id="formFile" name="file_image" onchange="preview()" accept=".png">
                <small>* Accepted File Type: .png</small>
                <br>
                <img id="frame" @if($check_template == 1) src="{{ asset('uploads/certificate/' . $class_detail->id. '/template.png') }}" @endif class="img-fluid" />
            </div>
        </div>
        <button class="right floated ui button primary">Save</button>
    </form>
    <a href="{{ url()->previous() }}"><button class=" right floated ui red button">Batal</button></a>
</div>

<script>
    function preview() {
        frame.src = URL.createObjectURL(event.target.files[0]);
    }
</script>
@endsection