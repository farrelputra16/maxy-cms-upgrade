@extends('layout.master')

@section('title', 'Edit Proposal')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Proposal</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">

    <style>
        body {
            background-color: #E3E5EE;
        }
        
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
            margin-bottom: .5rem;
            margin-right: .5rem;
        }

        .formAdd {
            padding-left: 1rem;
            padding-right: 2rem;
        }
    </style>
</head>

<body>

    <div class="container conTitle">
        <h2 class="h2">Edit Proposal</h2>
        <form class="form-inline my-2 my-lg-0 me-3" method="post" action="{{ route('logout') }}">
            @csrf
            <button class="btnlogout" type="submit">Logout</button>
        </form>
    </div>

    <div class="breadcrumb pt-2 pb-4">
        <a class="sectionDashboard" href="{{ url('/') }}">Dashboard</a>
        <span class="divider">></span>
        <div class="sectionMaster">Members</div>
        <span class="divider">></span>
        <div class="sectionCourse">Proposal</div>
        <span class="divider">></span>
        <div class="sectionCourse">Edit Proposal</div>
    </div>

    <form class="formAdd ui form" action="{{ route('postEditProposal', ['id' => request()->query('id')]) }}" method="post">
        @csrf
        <input type="text" name="id" value="{{ $currentData->id }}" style="display: none;">

        <div class="field">
            <div class="three fields">
                <div class="field">
                    <label for="">Title</label>
                    <input type="text" name="name" value="{{ $currentData->name }}" disabled>
                </div>
                <div class="field">
                    <label for="">Name</label>
                    <input type="text" name="url" value="{{ $currentData->User->name }}" disabled>
                </div>
                <div class="field">
                    <label for="">URL</label>
                    <input type="text" name="url" value="{{ $currentData->proposal_url }}" disabled>
                </div>
            </div>

            <div class="field">
                <label for="">Status</label>
                <select name="status" class="ui dropdown">
                    @foreach ($status as $stat)
                    <option value="{{ $stat->id }}" @if ($currentData->m_proposal_status_id == $stat->id) selected @endif>{{ $stat->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="field">
                <label for="">Grade</label>
                <input type="number" name="proposal_grade" value="{{ $currentData->proposal_grade }}">
            </div>

            <div class="field">
                <label for="">Description</label>
                <textarea name="description" id="description"></textarea>
            </div>

            <div class="divSave">
                <button class="btnSave">Save & Update</button>
            </div>
        </div>
    </form>
    <a href="{{ url()->previous() }}">
        <button class="btnBatal">Batal</button>
    </a>
    <script>
        $('#hapus, #tambah').multiselect({
            maxHeight: 300,
            includeSelectAllOption: true,
            enableFiltering: true,
        });
    </script>
    <script>
        CKEDITOR.replace('description');
    </script>
    @endsection