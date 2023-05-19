@extends('layout.master')

@section('title', 'Tambah Course')

@section('content')
<div style="padding: 0px 12px 0px 12px;">
    <form action="{{ route('submit.course') }}" method="post">
        @csrf
        <div class="row" style="margin-bottom: 12px;">
            <div class="col-8">
                <label for="name" class="form-label">Course Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Course Name" required>
            </div>
            <div class="col">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" id="slug" name="slug" class="form-control" placeholder="Course Slug" required>
            </div>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Keterangan</label>
            <textarea class="form-control" rows="3" id="description" name="description" required></textarea>
        </div>
        <div class="row">
            <div class="col">
                <label for="coursetype" class="form-label">Course Type</label>
                <input type="text" id="type" name="id_m_course_type" class="form-control" placeholder="Course Type" required>
            </div>
            <div class="col">
                <label for="courselevel" class="form-label">Course Level</label>
                <input type="text" id="level" name="id_m_difficulty_type" class="form-control" placeholder="Course Level" required>
            </div>
            <div class="col">
                <label for="coursetutor" class="form-label">Course Tutor</label>
                <input type="text" name="coursetutor" class="form-control" placeholder="Course Tutor">
            </div>
        </div>
        <nav class="navbar bg-body-tertiary" style="padding: 12px 0px 12px 0px;">
            <div class="navbar-nav">
            <button type="submit">Submit</button>

                <!-- <a class="btn btn-primary" href="{{ route('submit.course') }}" role="button">Tambah Course +</a> -->
            </div>    
        </form>
</div>

@endsection