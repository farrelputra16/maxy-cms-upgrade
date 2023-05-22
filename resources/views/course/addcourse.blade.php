@extends('layout.master')

@section('title', 'Tambah Course')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <form action="" method="post">
            @csrf
            <div class="row" style="margin-bottom: 12px;">
                <div class="col-8">
                    <label class="form-label">Course Name</label>
                    <input type="text" class="form-control" id="" placeholder="Course Name" name="courseName">
                </div>
                <div class="col">
                    <label for="" class="form-label">Slug</label>
                    <input type="text" class="form-control" placeholder="Course Slug">
                </div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Keterangan</label>
                <textarea class="form-control" id="" rows="3"></textarea>
              </div>
            <div class="row">
                <div class="col">
                    <label for="" class="form-label">Course Type</label>
                    <input type="text" class="form-control" placeholder="Course Type">
                </div>
                <div class="col">
                    <label for="" class="form-label">Course Level</label>
                    <input type="text" class="form-control" placeholder="Course Level">
                </div>
                <div class="col">
                    <label for="" class="form-label">Course Tutor</label>
                    <input type="text" class="form-control" placeholder="Course Tutor">
                </div>
            </div>
        </form>
    </div>
@endsection