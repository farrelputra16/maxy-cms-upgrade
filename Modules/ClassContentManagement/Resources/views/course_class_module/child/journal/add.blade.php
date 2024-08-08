@extends('layout.master')

@section('title', 'Add Course Class Module Journal')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course Class Module Journal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
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

        .btnlogout {
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
            color: #FFF;
            width: 80px;
            height: 35px;
            border-radius: 10px;
            border: none;
            box-shadow: none;
            font-weight: bold;
        }

        .btnAdd {
            background-color: #4056A1;
            color: #FFF;
            color: #FFF;
            width: 180px;
            height: 35px;
            border-radius: 10px;
            border: none;
            box-shadow: none;
            font-weight: bold;
            margin-right: 10rem;
        }

        .divBatal {
            text-align: right;
            margin-right: 10rem;
            margin-bottom: 1rem;
            margin-top: -3rem;
            z-index: 1000;
        }

        .divAdd {
            text-align: right;
            margin-right: 1rem;
            margin-bottom: .5rem;
            margin-left: 60rem;
        }
    </style>
</head>

<body>
    <div class="container conTitle">
        <h2 class="h2">Add Course Class Module Journal</h2>
        <form class="form-inline my-2 my-lg-0 me-3" method="post" action="{{ route('logout') }}">
            @csrf
            <button class="btnlogout" type="submit">Logout</button>
        </form>
    </div>
    <div class="breadcrumb pt-2 pb-4">
        <a class="sectionDashboard" href="{{ url('/') }}">Dashboard</a>
        <span class="divider">></span>
        <div class="sectionMaster">Class</div>
        <span class="divider">></span>
        <div class="sectionCourse">Module</div>
        <span class="divider">></span>
        <div class="sectionCourse">Content</div>
        <span class="divider">></span>
        <div class="sectionCourse">Add Content</div>
    </div>

    <div class="container">
        <form class="ui form" action="{{ route('postAddJournalCourseClassChildModule') }}" method="post">
            @csrf
            <input type="hidden" name="course_class_module_id" value="{{ $parent_module->id }}">
            <input type="hidden" name="course_journal_parent_id" value="{{ $course_journal_parent_id }}">
            <input type="hidden" name="user_id" value="{{ $comments[0]->User->id }}">
            <div class="field">
                <label for="">Materi</label>
                <div>
                    {!! $parent_module->detail->content !!}
                </div>
                <input type="text" value="" disabled>
            </div>
            <div class="field">
                <label for="">File Materi</label>
                <a href="{{ asset('fe/public/files/'.$parent_module->detail->material) }}" download>{{ $parent_module->detail->material }}</a>
            </div>
            @foreach($comments as $comment)
<section class="gradient-custom">
    <div class="container my-5 py-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-lg-10 col-xl-8">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col">
                                <div class="d-flex flex-start">
                                    @if (empty($comment->User->profile_picture))
                                        <i class="fas fa-user-circle"></i>
                                    @else
                                        <img src="{{ config('app.url_backend') }}/uploads/{{ $comment->User->profile_picture }}" class="rounded-circle shadow-1-strong me-3" alt="Profile Picture" width="65" height="65">
                                    @endif
                                    <div class="flex-grow-1 flex-shrink-1">
                                        <div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="mb-1">
                                                    {{ $comment->User->name }} <span class="small">- {{ $comment->diff }}</span>
                                                </p>
                                            </div>
                                            <p class="small mb-0">
                                                {!! $comment->description !!}
                                            </p>
                                        </div>
                                        @foreach ($comment->child as $child)
                                        <div class="d-flex flex-start mt-4">
                                            <a class="me-3" href="#">
                                                @if (empty(auth()->user()->profile_picture))
                                                    <i class="fas fa-user-circle"></i>
                                                @else
                                                    <img src="{{ config('app.url_backend') }}/uploads/{{ auth()->user()->profile_picture }}"
                                                        class="rounded-circle shadow-1-strong" alt="Profile Picture" width="65" height="65" />
                                                @endif
                                            </a>
                                            <div class="flex-grow-1 flex-shrink-1">
                                                <div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p class="mb-1">
                                                            {{ auth()->user()->name }} <span class="small">- {{ $child->diff }}</span>
                                                        </p>
                                                    </div>
                                                    <p class="small mb-0">
                                                        {!! $child->description !!}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
            @endforeach
            <div class="field">
                <label for="">Description</label>
                <textarea name="description"></textarea>
            </div>
            <div class="divAdd">
                <button class="btnAdd">Add Journal</button>
            </div>
        </form>
        <a href="{{ url()->previous() }}">
            <button class="btnBatal">Batal</button>
        </a><br>
    </div>
</body>

</html>
@endsection