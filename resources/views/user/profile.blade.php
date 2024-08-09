@extends('layout.master')

@section('title', 'Profile User')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Users</title>
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
            /* padding-top: 1rem; */
            /* margin-top: 1rem; */
            display: inline;
            font-size: 11px;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .breadcrumb .divider {
            margin: 0 5px;
        }

        #content,
        #short_description,
        #description {
            width: 1000px;
            height: auto;
        }

        .btnBatal {
            background-color: #F13C20;
            color: #FFF;
            margin-right: 1rem;
            margin-left: 38.5rem;
            margin-bottom: .5rem;
            color: #FFF;
            width: 80px;
            height: 35px;
            border-radius: 10px;
            border: none;
            box-shadow: none;
            font-weight: bold;
        }

        .btnTambah {
            background-color: #4056A1;
            color: #FFF;
            margin-right: 1rem;
            margin-bottom: .5rem;
            color: #FFF;
            width: 180px;
            height: 35px;
            border-radius: 10px;
            border: none;
            box-shadow: none;
            font-weight: bold;
        }

        .btnSave {
            background-color: #4056A1;
            color: #FFF;
            margin-bottom: .5rem;
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
            margin-right: 20rem;
            margin-bottom: 1rem;
            margin-top: -3rem;
        }

        .divTambah {
            text-align: right;
            margin-bottom: .5rem;
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
        <h2 class="h2">Profile User</h2>
        <form class="form-inline my-2 my-lg-0 me-3" method="post" action="{{ route('logout') }}">
            @csrf
            <button class="btnlogout" type="submit">Logout</button>
        </form>
    </div>

    <div class="breadcrumb pt-2 pb-4">
        <a class="sectionDashboard" href="{{ url('/') }}">Dashboard</a>
        <span class="divider">></span>
        <div class="sectionMaster">User</div>
        <span class="divider">></span>
        <div class="sectionCourse">Profile User</div>
    </div>

    <div class="container">
        <form class="ui form" method="post">
            @csrf
            <div class="field">
                <div class="two fields">
                    <div class="field">
                        <label for="">ID</label>
                        <input type="text" name="id" value="{{ $currentData->id }}">
                    </div>
                    <div class="field">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ $currentData->name }}">
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label for="no_ktp">KTP</label>
                        <input type="text" name="no_ktp" id="no_ktp" value="{{ $currentData->no_ktp }}">
                    </div>
                    <div class="field">
                        <label for="">Telp</label>
                        <input type="text" name="phone" value="{{ $currentData->phone }}">
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label for="supervisor_name">Nama Pembimbing</label>
                        <input type="text" name="supervisor_name" id="supervisor_name" value="{{ $currentData->supervisor_name }}">
                    </div>
                    <div class="field">
                        <label for="supervisor_email">Email Pembimbing</label>
                        <input type="text" name="supervisor_email" id="supervisor_email" value="{{ $currentData->supervisor_email }}">
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label for="supervisor_name">Nama Ayah</label>
                        <input type="text" name="supervisor_name" id="supervisor_name" value="{{ $father->name }}">
                    </div>
                    <div class="field">
                        <label for="supervisor_email">Pekerjaan Ayah</label>
                        <input type="text" name="supervisor_email" id="supervisor_email" value="{{ $father->job }}">
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label for="supervisor_name">Nama Ibu</label>
                        <input type="text" name="supervisor_name" id="supervisor_name" value="{{ $mother->name }}">
                    </div>
                    <div class="field">
                        <label for="supervisor_email">Pekerjaan Ibu</label>
                        <input type="text" name="supervisor_email" id="supervisor_email" value="{{ $mother->job }}">
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label for="supervisor_name">Agama</label>
                        <input type="text" name="supervisor_name" id="supervisor_name" value="{{ $currentData->religion }}">
                    </div>
                    <div class="field">
                        <label for="supervisor_email">Status Kewarganegaraan</label>
                        <input type="text" name="supervisor_email" id="supervisor_email" value="{{ $currentData->citizenship_status }}">
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label for="supervisor_name">Transkrip Nilai</label>
                        <label>{{ asset('uploads/' . $currentData->transcripts) }}</label>
                    </div>
                    <div class="field">
                        <label for="supervisor_email">IPK</label>
                        <input type="text" name="supervisor_email" id="supervisor_email" value="{{ $currentData->ipk }}">
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label for="supervisor_name">Kota</label>
                        <input type="text" name="supervisor_name" id="supervisor_name" value="{{ $currentData->city }}">
                    </div>
                    <div class="field">
                        <label for="supervisor_email">Provinsi</label>
                        <input type="text" name="supervisor_email" id="supervisor_email" value="{{ $currentData->MProvince->name }}">
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label for="supervisor_name">Negara</label>
                        <input type="text" name="supervisor_name" id="supervisor_name" value="{{ $currentData->country }}">
                    </div>
                    <div class="field">
                        <label for="supervisor_email">Kode Pos</label>
                        <input type="text" name="supervisor_email" id="supervisor_email" value="{{ $currentData->postal_code }}">
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label for="supervisor_name">Alamat</label>
                        <input type="text" name="supervisor_name" id="supervisor_name" value="{{ $currentData->address }}">
                    </div>
                    <div class="field">
                        <label for="">Hobby</label>
                        <input type="text" name="hobby" value="{{ $currentData->hobby }}">
                    </div>
                </div>

                <div class="field">
                    <label for="supervisor_name">Deskripsi Diri</label>
                    {!! $currentData->detail_description_text !!}
                </div>

                <div class="field">
                    <label for="supervisor_name">Video Perkenalan</label>
                    <input type="text" name="supervisor_name" id="supervisor_name" value="{{ $currentData->detail_description_video }}">
                </div>

                <div class="field">
                    <label for="supervisor_name">Ringkasan Pribadi</label>
                    {!! $currentData->personal_summary !!}
                </div>

                <div class="field">
                    <h3>Riwayat Karir</h3>
                    @if($currentData->UserExperience->count() > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Position</th>
                                    <th>Job Type</th>
                                    <th>Company</th>
                                    <th>Industry</th>
                                    <th>Location</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <!-- Add more table headers as needed -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($currentData->UserExperience as $portofolio)
                                    <tr>
                                        <td>{{ $portofolio->name }}</td>
                                        <td>{{ $portofolio->job_type }}</td>
                                        <td>{{ $portofolio->company }}</td>
                                        <td>{{ $portofolio->industry }}</td>
                                        <td>{{ $portofolio->location }}</td>
                                        <td>{{ $portofolio->start_date }}</td>
                                        <td>{{ $portofolio->end_date }}</td>
                                        <!-- Add more table data as needed -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No data available</p>
                    @endif
                </div>

                <div class="field">
                    <h3>Education</h3>
                    @if($currentData->UserEducation->count() > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>School</th>
                                    <th>Degree</th>
                                    <th>Fields of Study</th>
                                    <th>Score</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <!-- Add more table headers as needed -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($currentData->UserEducation as $portofolio)
                                    <tr>
                                        <td>{{ $portofolio->name }}</td>
                                        <td>{{ $portofolio->degree }}</td>
                                        <td>{{ $portofolio->fields_of_study }}</td>
                                        <td>{{ $portofolio->score }}</td>
                                        <td>{{ $portofolio->start_date }}</td>
                                        <td>{{ $portofolio->end_date }}</td>
                                        <!-- Add more table data as needed -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No data available</p>
                    @endif
                </div>

                <div class="field">
                    <h3>Portofolio</h3>
                    @if($currentData->UserPortofolio->count() > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>URL</th>
                                    <th>Date Created</th>
                                    <!-- Add more table headers as needed -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($currentData->UserPortofolio as $portofolio)
                                    <tr>
                                        <td>{{ $portofolio->url_portfolio }}</td>
                                        <td>{{ $portofolio->created_at }}</td>
                                        <!-- Add more table data as needed -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No data available</p>
                    @endif
                </div>

                <div class="field">
                    <h3>Certificate</h3>
                    @if($currentData->UserCertificate->count() > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Company</th>
                                    <th>ID Credential</th>
                                    <th>URL Credential</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Description</th>
                                    <!-- Add more table headers as needed -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($currentData->UserCertificate as $portofolio)
                                    <tr>
                                        <td>{{ $portofolio->name }}</td>
                                        <td>{{ $portofolio->company }}</td>
                                        <td>{{ $portofolio->id_credential }}</td>
                                        <td>{{ $portofolio->url_credential }}</td>
                                        <td>{{ $portofolio->start_date }}</td>
                                        <td>{{ $portofolio->end_date }}</td>
                                        <td>{{ $portofolio->description }}</td>
                                        <!-- Add more table data as needed -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No data available</p>
                    @endif
                </div>

                <div class="field">
                    <h3>Language</h3>
                    @if($currentData->UserLanguage->count() > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Language</th>
                                    <th>Proficiency</th>
                                    <!-- Add more table headers as needed -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($currentData->UserLanguage as $portofolio)
                                    <tr>
                                        <td>{{ $portofolio->MLanguage->name }}</td>
                                        <td>{{ $portofolio->proficiency }}</td>
                                        <!-- Add more table data as needed -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No data available</p>
                    @endif
                </div>
            </div>
        </form>

        <!-- <div class="divBatal"> -->
        <a href="{{ url()->previous() }}" class="divBatal">
            <button class="btnBatal">Batal</button>
        </a>
        <!-- </div> -->
    </div>

</body>

</html>
<script>
    CKEDITOR.replace('description');
</script>
@endsection