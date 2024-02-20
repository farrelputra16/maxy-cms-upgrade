@extends('layout.master')

@section('title', 'Add Course Class Module')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <div style="padding: 12px 12px 0px 12px;">
        <h2>Edit Child Module:</h2>
        <hr>  
        <form class="ui form" action="{{ route('postEditCourseClassChildModule', ['id' => $child_detail->id]) }}" method="post">
            @csrf
            <input type="hidden" name="course_class_id" value="{{ $class_detail->id }}">
            <input type="hidden" name="ccmod_parent_id" value="{{ $parent_ccmod_detail->id }}">
            <div class="field">
                <label for="">Class</label>
                <input type="text" value="{{ $class_detail->course_name }} Batch {{ $class_detail->batch}}" disabled>
            </div>   
            <div class="four fields">
                <div class="field">
                    <label for="">Course Module</label>
                    <select name="course_module_id" class="ui dropdown">
                        @foreach ($child_cm_list as $item)
                            <option value="{{ $item->id }}" @if($item->id == $child_detail->course_module_id) selected @endif>[{{ $item->type }}] {{ $item->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('course_module_id'))
                        @foreach ($errors->get('course_module_id') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div> 
                <div class="field">
                    <label for="">Priority</label>
                    <input type="number" name="priority" value="{{ $child_detail->priority }}">
                    @if ($errors->has('priority'))
                        @foreach ($errors->get('priority') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="field">
                    <label for="">Waktu Mulai</label>
                    <input type="date" id="date" name="start" value="{{ \Carbon\Carbon::parse($child_detail->start_date)->format('Y-m-d') }}">
                    @if ($errors->has('start'))
                        @foreach ($errors->get('start') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="field">
                    <label for="">Waktu Berakhir</label>
                    <input type="date" id="date" name="end" value="{{ \Carbon\Carbon::parse($child_detail->end_date)->format('Y-m-d') }}">
                    @if ($errors->has('end'))
                        @foreach ($errors->get('end') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="p-5 m-5" style="border-radius: 25px; border: 2px solid #73AD21;">
                <a href="{{ route('getEditChildModule', ['id' => $child_cm_detail->id]) }}"><h3>Material <i class="fa fa-edit"></i></h3></a>
                <div class="field">
                    <label for=""></label>
                    <a href="{{ asset('fe/public/files/'.$child_cm_detail->material) }}" download>{{$child_cm_detail->material}}</a>
                </div>

                <div class="field">
                    <label for=""></label>
                    <textarea name="content" readonly>{{ $child_cm_detail->content }}</textarea>
                </div>
            </div>
            
            <div class="field">
                <label for="">Description</label>
                <textarea name="description">{{ $child_detail->description }}</textarea>
            </div>
            <div class="field">
                <div class="ui checkbox">
                    <input class="form-check-input" type="checkbox" value="1" {{ $child_detail->status == 1 ? 'checked' : ''}} name="status" >
                    <label>Aktif</label>
                </div>
            </div>
            <button class="right floated ui button primary">Save</button>
        </form>
        <a href="{{ url()->previous() }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
    
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('content');
    </script>
@endsection