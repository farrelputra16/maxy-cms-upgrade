@extends('layout.master')

@section('title', 'Add Course Class Member')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <form class="ui form" action="{{ route('postEditCourseClassMember', ['id' => request()->query('id') ])}}" method="post">
            @csrf
            <div class="three fields">
                <div class="field">
                    <label for="">ID Course Class Member</label>
                    <input type="text" value="{{ request()->query('id') }}" disabled>
                </div>
                <div class="three wide field">
                    <label for="">ID Member</label>
                    <select class="ui dropdown" name="user_id" id="">
                    <option value="{{ $currentData[0]->ccm_member_id }}" selected>{{ $currentData[0]->ccm_member_id }} - {{ $currentData[0]->user_name }}</option>
                        @foreach ($allMembers as $item)
                            <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('member'))
                        @foreach ($errors->get('member') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="three wide field">
                    <label for="">ID Course Class (Batch)</label>
                    <select class="ui dropdown" name="course_class" id="">
                    <option value="{{ $currentData[0]->ccm_course_class_id }}" selected>{{ $currentData[0]->course_class_batch }} - {{ $currentData[0]->user_name }}</option>

                    @foreach ($allCourseClasses as $item)
                        <option value="{{ $item->course_class_id }}">{{ $item->course_class_batch }} - {{ $item->course_name }}</option>
                    @endforeach

                    </select>
                    @if ($errors->has('course_class'))
                        @foreach ($errors->get('course_class') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="field">
                <label for="">Course Class Description</label>
                @if ($currentData->isNotEmpty())
                    <textarea name="description">{{ $currentData[0]->ccm_description }}</textarea>
                @endif


            </div>
            <div class="field">
                <div class="ui checkbox">
                @if ($currentData->isNotEmpty())
                    <input class="form-check-input" type="checkbox" value="1" {{ $currentData[0]->ccm_status == 1 ? 'checked' : '' }} name="status">
                @endif

                    <label>Aktif</label>
                </div>
            </div>
            <button class="right floated ui button primary">Save & Update</button>
        </form>
        <a href="{{ route("getCourseClassMember") }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
@endsection