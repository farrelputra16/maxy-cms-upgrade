@extends('layout.master')

@section('title', 'Add Course Module')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <div style="padding: 12px 12px 0px 12px;">
        <h2>Add New Module</h2>
        <hr><br>
        <form class="ui form" action="{{ route('postAddCourseModule', ['page_type' => $page_type]) }}" method="post">
            @csrf
            <div class="field">
                <label for="">Course</label>
                <input type="text" name="course_name" value="{{ $course_detail->name }}" disabled>
                <input type="hidden" name="course_id" value="{{ $course_detail->id }}">
            </div>
            <div class="field">
                <div class="two fields">
                    <div class="field">
                        <label for="">Module Name</label>
                        <input type="text" name="name" placeholder="Masukkan Nama Course Module">
                    </div>
                    <div class="field">
                        <label for="">Day / Priority</label>
                        <input type="number" name="priority">
                    </div>
                </div>
                @if($page_type == 'company_profile')
                <div class="field">
                    <label for="">Content</label>
                    <textarea name="content"></textarea>
                </div>
                @endif
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
            <button class="right floated ui button primary">Tambah Course Module</button>
        </form>
        <a href="{{ url()->previous() }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
@endsection