@extends('layout.master')

@section('title', 'Edit Testimonial')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Testimonial</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">

    <style>
        .conTitle {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 2rem;
        }

        .h2 {
            font-weight: bold;
            color: #232E66;
            padding-left: .1rem;
            font-size: 22px;
            margin-bottom: -0.5rem;
            margin-left: 1rem;
        }

        .logout {
            margin-right: 2rem;
            margin-bottom: .5rem;
            background-color: #FBB041;
            color: #FFF;
            width: 80px;
            height: 35px;
            border-radius: 10px;
            border: none;
            box-shadow: none;
            font-weight: bold;
        }

        .breadcrumb {
            border-top: 2px solid black;
            display: inline-block;
            width: 97%;;
            margin-left: 1rem;
            margin-bottom: 1rem;
        }

        .breadcrumb .sectionDashboard,
        .breadcrumb .divider,
        .breadcrumb .sectionMaster,
        .breadcrumb .sectionCourse {
            display: inline;
            font-size: 11px;
            font-weight: bold;
        }

        .breadcrumb .divider {
            margin: 0 5px;
        }

        .container-form {
            margin-top: 2rem;
        }

        .field {
            margin-bottom: 1rem;
        }

        .right-button {
            float: right;
        }

        .btnBatal {
            background-color: #F13C20;
            color: #FFF;
            color: #FFF;
            width: 80px;
            height: 35px;
            border-radius: 10px;
            border: none;
            box-shadow: none;
            font-weight: bold;
        }

        .btnSave {
            background-color: #4056A1;
            color: #FFF;
            color: #FFF;
            width: 130px;
            height: 35px;
            border-radius: 10px;
            border: none;
            box-shadow: none;
            font-weight: bold;
        }

        .divBatal {
            text-align: right;
            margin-right: 10rem;
            margin-bottom: 1rem;
            margin-top: -3rem;
        }

        .divSave {
            text-align: right;
            margin-right: 1rem;
            margin-bottom: .5rem;
            margin-left: 65rem;
        }
    </style>
</head>

<body>
    <div class="container conTitle">
        <h2 class="h2">Edit Testimonial</h2>
        <button class="logout">Logout</button>
    </div>

    <div class="breadcrumb pt-2 pb-4">
        <a class="sectionDashboard" href="{{ url('/') }}">Dashboard</a>
        <span class="divider">></span>
        <div class="sectionMaster">Members</div>
        <span class="divider">></span>
        <div class="sectionCourse">Testimonial</div>
        <span class="divider">></span>
        <div class="sectionCourse">Edit Testimonial</div>
    </div>

    <div class="container">
        <form class="ui form" action="{{ route('postEditTestimonial', ['id' => request()->query('id')]) }}" method="post">
            @csrf
            <div class="field">
                <div class="two fields">
                    <div class="field">
                        <label for="">Rating (in stars)</label>
                        <input type="number" min="1" max="5" name="stars" value="{{ $testimonials->stars }}">
                    </div>
                    <div class="field">
                        <label for="">Role</label>
                        <input type="text" name="role" value="{{ $testimonials->role }}">
                    </div>
                </div>

                <div class="two fields">
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
                                {{ $currentData->coursebatch }}
                            </option>
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
                        <input class="form-check-input" type="checkbox" value="1" {{ $testimonials->status == 1 ? 'checked' : '' }} name="status">
                        <label>Aktif</label>
                    </div>

                    <div class="ui checkbox" style="margin-top:2.5%;margin-left:1%">
                        <input class="form-check-input" type="checkbox" value="1" {{ $testimonials->status_highlight == 1 ? 'checked' : '' }} name="status_highlight">
                        <label>Highlight</label>
                    </div>
                </div>
                <br>
                <div class="divSave">
                    <button class="btnSave">Save & Update</button>
                </div>
            </div>
        </form>
        <a href="{{ url()->previous() }}">
            <button class="btnBatal">Batal</button>
        </a>
    </div>
</body>

</html>
<script>
    CKEDITOR.replace('description');
    CKEDITOR.replace('content');
</script>
@endsection