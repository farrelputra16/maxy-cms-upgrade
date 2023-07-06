@extends('layout.master')

@section('title', 'Add General Data')

@section('content')
<div style="padding: 0px 12px 0px 12px;">
        <form class="ui form" action="{{ route('postEditTestimonial', ['id' => request()->query('id')]) }}" method="post">
            @csrf
            <div class="field">
                <div class="ten fields">
                    <div class="field">
                        <label for="">Rating (in stars)</label>
                        <input type="number" min="1" max="5" name="stars" value="{{ $testimonials->stars }}">
                    </div>
                </div>
                <div class="three fields">
                    <div class="field">
                        <label for="">Role</label>
                        <input type="text" name="role" value="{{ $testimonials->role }}">
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" {{ $testimonials->status_highlight == 1 ? 'checked' : ''}} name="status_highlight" >
                        <label>Status Highlight</label>
                    </div>
                </div>
                <div class="three fields">
                    <div class="field">
                        <label for="">Course</label>
                        <select name="course_id" class="ui dropdown">
                            @foreach ($currentData as $item)
                            <option selected value="{{ $item->course_id }}">-- {{ $item->coursename }} --</option>
                            @endforeach
                            @foreach ($allcourse as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="three fields">
                    <div class="field">
                        <label for="">Member</label>
                        <select name="member_id" class="ui dropdown">
                            @foreach ($currentData as $item) 
                            <option selected value="{{ $item->member_id }}">-- {{ $item->membername }} --</option>
                            @endforeach
                            @foreach ($allmember as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="three fields">
                    <div class="field">
                        <label for="">Course Class Batch</label>
                        <select name="course_class_id" class="ui dropdown"> 
                            @foreach ($currentData as $item)
                            <option selected value="{{ $item->course_class_id }}">-- {{ $item->coursebatch }} --</option>
                            @endforeach
                            @foreach ($allcourseclass as $item)
                                <option value="{{ $item->id }}">{{ $item->batch }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                    
                </div>
                <div class="field">
                    <label for="">Description</label>
                    <textarea name="description">{{ $testimonials->description }}</textarea>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" {{ $testimonials->status == 1 ? 'checked' : ''}} name="status" >
                        <label>Aktif</label>
                    </div>
                </div>
            </div>
            <button class="right floated ui button primary">Tambah Data</button>
        </form>
        <a href="{{ route('getTestimonial') }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
@endsection