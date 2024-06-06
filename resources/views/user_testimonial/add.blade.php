@extends('layout.master')

@section('title', 'Add General Data')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Testimonial</title>
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
            margin-right: 1rem;
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
            width: 1010px;
            margin-left: 1rem;
            margin-bottom: 1rem;
        }

        .breadcrumb .sectionDashboard,
        .breadcrumb .divider,
        .breadcrumb .sectionMaster,
        .breadcrumb .sectionCourse {
            /* padding-top: 1rem; */
            /* margin-top: 1rem; */
            display: inline;
            font-size: 11px;
            font-weight: bold;
        }

        .breadcrumb .divider {
            margin: 0 5px;
        }

        .btnBatal {
            background-color: #F13C20;
            color: #FFF;
            /* margin-right: 1rem;
        margin-left: 58rem;
        margin-bottom: .5rem; */
            color: #FFF;
            width: 80px;
            height: 35px;
            border-radius: 10px;
            border: none;
            box-shadow: none;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .btnAdd {
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
            margin-right: 15rem;
            margin-bottom: 1rem;
            margin-top: -3rem;
        }

        .divAdd {
            text-align: right;
            /* margin-right: .5rem; */
            margin-bottom: .5rem;
            /* margin-left: 65rem; */
        }
    </style>
</head>

<body>
    <div class="container conTitle">
        <h2 class="h2">Add Testimonial</h2>
        <button class="logout">Logout</button>
    </div>
    <div class="breadcrumb pt-2 pb-4">
        <a class="sectionDashboard" href="{{ url('/') }}">Dashboard</a>
        <span class="divider">></span>
        <div class="sectionMaster">Members</div>
        <span class="divider">></span>
        <div class="sectionCourse">Testimonial</div>
        <span class="divider">></span>
        <div class="sectionCourse">Add Testimonial</div>
    </div>
    <form class="formAdd ui form" action="{{ route('postAddTestimonial') }}" method="post">
        @csrf
        <div class="field">
            <div class="two fields">
                <div class="field">
                    <label for="">Rating (in stars)</label>
                    <input type="number" min="1" max="5" name="stars">
                </div>
                <div class="field">
                    <label for="">Role</label>
                    <input type="text" name="role" placeholder="Ex : Alumni Bootcamp Rapid UI/UX Batch 3">
                    @if ($errors->has('role'))
                    @foreach ($errors->get('role') as $error)
                    <span style="color: red;">{{ $error }}</span>
                    @endforeach
                    @endif
                </div>
            </div>

            <div class="two fields">
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
                <div class="ui checkbox" style="margin-right: 2rem;">
                    <input class="form-check-input" type="checkbox" value="1" name="status">
                    <label>Aktif</label>
                </div>
                <div class="ui checkbox">
                    <input class="form-check-input" type="checkbox" value="1" name="status_highlight">
                    <label>Highlight</label>
                </div>
            </div>
        </div>
        <div class="divAdd">
            <button class="btnAdd">Add Testimonial</button>
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