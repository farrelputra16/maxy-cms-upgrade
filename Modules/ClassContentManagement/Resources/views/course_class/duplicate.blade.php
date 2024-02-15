@extends('layout.master')

@section('title', 'Add Course Class')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <style>
        .select2-container .select2-selection--single{
            height:3vh !important;
            width: 100% !important;
        }
        .select2-container--default .select2-selection--single{
            border: 1px solid #ccc !important; 
            border-radius: 3px !important; 
        }
    </style>

    <div style="padding: 12px 12px 0px 12px;">
        <h2>Duplicate Class</h2>
        <hr>
        <form class="ui form" action="{{ route('postDuplicateCourseClass') }}" method="post">
            @csrf
            <div class="field">
                <div class="header" style="display: flex; justify-content: center; margin-bottom: 20px; background: #e0e0e0; padding: 10px 0px 10px 0px;">
                    <h5><b>Choose Class</b></h5>
                </div>
                <div class="field">
                    <label for="">Class</label>
                    <select id="course_class" class="ui dropdown">
                        <option value="">Select</option>
                        @foreach ($class_list as $item)
                            <option value="{{ $item->id }}">{{ $item->course_name }} Batch {{ $item->batch }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('courseid'))
                        @foreach ($errors->get('courseid') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>

                <div class="header" style="display: flex; justify-content: center; margin-bottom: 20px; background: #e0e0e0; padding: 10px 0px 10px 0px; margin-top: 50px;">
                    <h5><b>New Class</b></h5>
                </div>
                <div class="two fields">
                    <div class="field">
                        <label for="course_id">Course</label>
                        <select id="course_id" name="course_id" class="form-control select2">
                            <option value="">Select</option>
                            @foreach ($course_list as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('course_id'))
                            @foreach ($errors->get('course_id') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">Batch</label>
                        <input type="number" name="batch" placeholder="Masukkan Batch" style="height:3vh">
                        @if ($errors->has('batch'))
                            @foreach ($errors->get('batch') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                    
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" name="status" >
                        <label>Aktif</label>
                    </div>
                </div>
            </div>
            <button class="right floated ui button primary">Tambah Course Class</button>
        </form>
        <a href="{{ route("getCourseClass") }}"><button class=" right floated ui red button">Batal</button></a>
    </div>

    
    <script>
    $(document).ready(function() {
        $('#course_class').select2({
            placeholder: "Search for a class",
            allowClear: true
        });
    });
    </script>

    <script>
        $(document).ready(function() {
            $('#course_id').select2({
                placeholder: "Search for a course",
                allowClear: true
            });
        });
    </script>

    
@endsection