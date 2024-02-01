@extends('layout.master')

@section('title', 'Add General Data')

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <div style="padding: 0px 12px 0px 12px;">
        <h2>Add Testimonial</h2>
        <hr style="padding-bottom:1%">
        <form class="ui form" action="{{ route('postAddTestimonial') }}" method="post">
            @csrf
            <div class="field">
                <div class="two fields">

                    <div class="field">
                        <label for="">Rating (in stars)</label>
                        <input type="number" min="1" max="5" name="stars">
                    </div>

                    <div class="two fields">
                        <div class="field">
                            <label for="">Role</label>
                            <input type="text" name="role" placeholder="Ex : Alumni Bootcamp Rapid UI/UX Batch 3">
                            @if ($errors->has('role'))
                                @foreach ($errors->get('role') as $error)
                                    <span style="color: red;">{{ $error }}</span>
                                @endforeach
                            @endif
                        </div>
                        <div class="field" style="margin-top:4.5%">
                            <div class="ui checkbox">
                                <input class="form-check-input" type="checkbox" value="1" name="status_highlight">
                                <label>Highlight</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="three fields">
                    <div class="field">
                        <label for="">User</label>
                        <select name="user_id" class="ui dropdown">
                            <option selected value="">-- Pilih User --</option>
                            @foreach ($allmember as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('member_id'))
                            @foreach ($errors->get('member_id') as $error)
                                <span style="color: red;">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">Course Class Batch</label>
                        <select name="course_class_id" class="ui dropdown">
                            <option selected value="">-- Pilih Batch Course Class --</option>
                            @foreach ($allcourseclass as $item)
                                <option value="{{ $item->id }}">{{ $item->batch }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('course_class_id'))
                            @foreach ($errors->get('course_class_id') as $error)
                                <span style="color: red;">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="field">
                    <label for="">Content</label>
                    <textarea name="content" id="content"></textarea>
                </div>
                <div class="field">
                    <label for="">Description</label>
                    <textarea name="description" id="description"></textarea>
                    @if ($errors->has('description'))
                        @foreach ($errors->get('description') as $error)
                            <span style="color: red;">{{ $error }}</span>
                        @endforeach
                    @endif
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" name="status">
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
