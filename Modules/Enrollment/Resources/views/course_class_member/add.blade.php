@extends('layout.master')

@section('title', 'Add Course Class Member')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha384-btZ82u+UkZp2Hd4zDTLzLzbn/7KW8xbDQbl5cpkL6uj5L/2m8cndGmYVRJsF70UtO" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <div style="padding: 12px 12px 0px 12px;">
        <h2 style="">Add Member for Class: {{ $course_class_detail->course_name }} Batch
            {{ $course_class_detail->batch }}</h2>
        <hr>
        <form class="ui form" action="{{ route('postAddCourseClassMember') }}" method="post">
            @csrf
            <div class="field">
                        <label for="">Select User:</label>
                        <select id="hapus" name="users[]" multiple="">
                            @foreach ($users as $item)
                                <option value="{{ $item->id }}">{{ $item->email }} - {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
            <!-- <div class="field">
                <select class="ui fluid multiple search selection dropdown" name="users[]">
                    <option value="">Select User</option>
                    @foreach ($users as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div> -->
            <input type="hidden" name="course_class" value="{{ $course_class_detail->id }}">
            <div class="field">
                <label for="">Course Class Description</label>
                <textarea name="description"></textarea>
            </div>
            <div class="field">
                <div class="ui checkbox">
                    <input class="form-check-input" type="checkbox" value="1" name="status" id="status">
                    <label for="status">Aktif</label>
                </div>
            </div>
            <button type="submit" class="right floated ui button primary">Tambah Course Class Member</button>
        </form>
        <a href="{{ route('getCourseClassMember') }}"><button class="right floated ui red button"
                style="margin-right:2%;">Batal</button></a>
        </form>

        <br><br>
        <hr>
        <h2>Bulk Upload</h2>
        <hr>
        <div class="content pb-5">
            <form method="post" action="{{ route('course-class-member.import-csv') }}" enctype="multipart/form-data">
                @csrf
                <div class="card p-5">
                    <div class="row">
                        <div class="col-6">
                            <label for="csv_file">Upload File CSV:</label>
                            <input type="file" name="csv_file" id="csv_file" accept=".csv">
                            @error('csv_file')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                            <br>
                            <small>sample: <i class="fa fa-file" aria-hidden="true"></i> <a href="{{ asset('csv/addccmember.csv') }}" download>csv example (click me to download)</a></small>
                        </div>
                        <div class="col-6" style="text-align:right">
                            <button type="submit" class="ui button primary">Tambah Multiple Users</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>


    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"
        integrity="sha384-oBEahFNqz9AORwL3hFZO9zrZcIEJ0VlX4z/6xLc3pNRdh5iRNXFbpekwB6h5U2Pg" crossorigin="anonymous">
    </script>
    <script>
        $('.ui.search.selection.dropdown')
            .dropdown({
                keepSearchTerm: true
            });
    </script>

<script>
        $('#hapus, #tambah').multiselect({
            maxHeight: 300,
            includeSelectAllOption: true,
            enableFiltering: true,
        });
    </script>
@endsection
