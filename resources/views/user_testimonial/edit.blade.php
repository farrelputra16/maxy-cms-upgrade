@extends('layout.master')

@section('title', 'Add General Data')

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <div style="padding: 0px 12px 0px 12px;">
        <h2>Edit Testimonial</h2>
        <hr style="padding-bottom:1%">
        <form class="ui form" action="{{ route('postEditTestimonial', ['id' => request()->query('id')]) }}" method="post">
            @csrf
            <div class="field">
                <div class="three fields">
                    <div class="field">
                        <label for="">Rating (in stars)</label>
                        <input type="number" min="1" max="5" name="stars"
                            value="{{ $testimonials->stars }}">
                    </div>
                    <div class="field">
                        <label for="">Role</label>
                        <input type="text" name="role" value="{{ $testimonials->role }}">
                    </div>
                    <div class="ui checkbox" style="margin-top:2.5%;margin-left:1%">
                        <input class="form-check-input" type="checkbox" value="1"
                            {{ $testimonials->status_highlight == 1 ? 'checked' : '' }} name="status_highlight">
                        <label>Highlight</label>
                    </div>
                </div>
                <div class="three fields">
                    <div class="field">
                        <label for="">User</label>
                        <select name="user_id" class="ui dropdown">
                            @if ($currentData != null)
                                <option selected value="{{ $currentData->user_id }}"> {{ $currentData->membername }}
                                </option>
                            @endif
                            @foreach ($allmember as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="field">
                        <label for="">Course Class Batch</label>
                        <select name="course_class_id" class="ui dropdown">
                            @if ($currentData != null)
                                <option selected value="{{ $currentData->course_class_id }}">
                                    {{ $currentData->coursebatch }} </option>
                            @endif
                            @foreach ($allcourseclass as $item)
                                <option value="{{ $item->id }}">{{ $item->batch }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="field">
                    <label for="">Content</label>
                    <textarea name="content" id="content">{{ $testimonials->content }}</textarea>
                </div>
                <div class="field">
                    <label for="">Description</label>
                    <textarea name="description" id="description">{{ $testimonials->description }}</textarea>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1"
                            {{ $testimonials->status == 1 ? 'checked' : '' }} name="status">
                        <label>Aktif</label>
                    </div>
                </div>
            </div>
            <button class="right floated ui button primary">Tambah Data</button>
        </form>
        <a href="{{ route('getTestimonial') }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
    <script>
        CKEDITOR.replace('description');
        CKEDITOR.replace('content');
    </script>
@endsection
