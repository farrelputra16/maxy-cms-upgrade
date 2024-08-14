@extends('layout.master')

@section('title', 'Add Survey')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Survey</title>
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
            width: 97%;
            ;
            margin-left: 1rem;
            margin-bottom: 1rem;
        }

        .breadcrumb .sectionDashboard,
        .breadcrumb .divider,
        .breadcrumb .sectionMaster,
        .breadcrumb .sectionProposal {
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
            margin-left: 53rem;
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
            margin-left: 1.5rem;
            width: 180px;
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
    <!-- survey builder -->
    <script src="https://unpkg.com/knockout/build/output/knockout-latest.js"></script>
    <script src="https://unpkg.com/survey-core@1.10.5/survey.core.min.js"></script>
    <script src="https://unpkg.com/survey-core@1.10.5/survey.i18n.min.js"></script>
    <script src="https://unpkg.com/survey-core@1.10.5/themes/index.min.js"></script>
    <script src="https://unpkg.com/survey-knockout-ui@1.10.5/survey-knockout-ui.min.js"></script>
    <script src="https://unpkg.com/survey-creator-core@1.10.5/survey-creator-core.min.js"></script>
    <script src="https://unpkg.com/survey-creator-core@1.10.5/survey-creator-core.i18n.min.js"></script>
    <script src="https://unpkg.com/survey-creator-knockout@1.10.5/survey-creator-knockout.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/survey-core@1.10.5/defaultV2.css" />
    <link rel="stylesheet" href="https://unpkg.com/survey-creator-core@1.10.5/survey-creator-core.css" />
</head>

<body>
    <div class="container conTitle">
        <h2 class="h2">Add Survey</h2>
        <form class="form-inline my-2 my-lg-0 me-3" method="post" action="{{ route('logout') }}">
            @csrf
            <button class="btnlogout" type="submit">Logout</button>
        </form>
    </div>

    <div class="breadcrumb pt-2 pb-4">
        <a class="sectionDashboard" href="{{ url('/') }}">Dashboard</a>
        <span class="divider">></span>
        <div class="sectionMaster">Master</div>
        <span class="divider">></span>
        <div class="sectionProposal">Survey</div>
    </div>

    <div class="container">
        <form class="ui form" action="" method="post">
            @csrf
            <div class="field">
                <label for="">Name</label>
                <input type="text" name="name">
            </div>
            <div class="field">
                <label for="expired_date">Date Expired</label>
                <input type="datetime-local" id="expired_date" name="expired_date">
                @if ($errors->has('expired_date'))
                    @foreach ($errors->get('expired_date') as $error)
                        <span style="color: red;">{{ $error }}</span>
                    @endforeach
                @endif
            </div>
            <div class="field">
                <label for="">Type</label>
                <select name="type" class="ui dropdown">
                    <option value="0"> Evaluasi </option>
                    <option value="1"> Quiz </option>
                </select>
            </div>
            <div class="field">
                <label for="">Description</label>
                <textarea name="description"></textarea>
            </div>
            <div class="field">
                <div class="ui checkbox">
                    <input class="form-check-input" type="checkbox" value="1" name="status">
                    <label>Aktif</label>
                </div>
            </div>
            <div class="divAdd">
                <button class="btnAdd">Add Proposal</button>
                <a href="{{ url()->previous() }}">
                    <button class="btnBatal">Batal</button>
                </a>
            </div>
            <div class="field">
                <label for="">Survey</label>
                <input type="hidden" name='survey' id='survey'>
                <div id="surveyCreatorContainer" style="position: absolute; height: 100%; width: 100%"></div>
            </div>
            <!-- <a href="{{ url()->previous() }}">
            <button class="btnBatal">Batal</button>
        </a> -->
        </form>
    </div>
</body>

<script>
    const options = {
        showLogicTab: true
    };
    const creator = new SurveyCreator.SurveyCreator(options);
    //Automatically save survey definition on changing. Hide "Save" button
    creator.isAutoSave = true;
    //Show state button here
    creator.showState = true;

    var localStorageName = "SaveLoadSurveyCreatorExample";
    //Setting this callback will make visible the "Save" button
    creator.saveSurveyFunc = (saveNo, callback) => {
        $('#survey').val(JSON.stringify(creator.JSON));
        console.log(JSON.stringify(creator.JSON));
    };

    var defaultJSON = { pages: [{ name: 'page1', elements: [{ type: 'text', name: "q1" }] }] };
    creator.text = window.localStorage.getItem(localStorageName) || JSON.stringify(defaultJSON);
    //If you get JSON from your database then you can use creator.JSON property
    // creator.JSON = "sss";
    creator.render("surveyCreatorContainer");
</script>
</html>
@endsection