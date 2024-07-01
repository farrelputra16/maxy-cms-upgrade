@extends('layout.master')

@section('title', 'Edit User')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Users</title>
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
        <h2 class="h2">Edit User</h2>
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
        <div class="sectionCourse">Edit User</div>
    </div>

    <div class="container">
        <form class="ui form" method="post">
            @csrf
            <div class="field">
                <div class="two fields">
                    <div class="field">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ $currentData->name }}">
                    </div>
                    @if ($errors->has('name'))
                    @foreach ($errors->get('name') as $error)
                    <span style="color: red;">{{ $error }}</span>
                    @endforeach
                    @endif
                    <div class="field">
                        <label for="name">Nickname</label>
                        <input type="text" name="nickname" id="nickname" placeholder="Masukkan Nickname " value="{{ $currentData->nickname }}">
                        @if ($errors->has('name'))
                        @foreach ($errors->get('name') as $error)
                        <span style="color: red;">{{ $error }}</span>
                        @endforeach
                        @endif
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label for="">Access Group</label>
                        <select name="access_group" class="ui dropdown">
                            <option selected value="{{ $currentData->access_group_id }}">
                                {{ $currentData->access_group_name }}
                            </option>
                            @foreach ($allAccessGroups as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="field">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" id="phone" placeholder="Masukkan Nomor Telepon" value="{{ $currentData->phone }}">
                        @if ($errors->has('phone'))
                        @foreach ($errors->get('phone') as $error)
                        <span style="color: red;">{{ $error }}</span>
                        @endforeach
                        @endif
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label for="">Email</label>
                        <input type="email" name="email" value="{{ $currentData->email }}">
                    </div>
                    @if ($errors->has('email'))
                    @foreach ($errors->get('email') as $error)
                    <span style="color: red;">{{ $error }}</span>
                    @endforeach
                    @endif
                    <div class="field">
                        <label>Password</label>
                        <!-- <small>The user's password has been hashed to protect their privacy, proceed to change it to your
                            liking. <span style="color: blue;">Just make sure to remember it.</span></small> -->
                        <input type="password" name="password" value="{{ $currentData->password }}">
                    </div>
                    @if ($errors->has('password'))
                    @foreach ($errors->get('password') as $error)
                    <span style="color: red;">{{ $error }}</span>
                    @endforeach
                    @endif
                </div>

                <div class="two fields">
                    <div class="field">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" placeholder="Masukkan Alamat" value="{{ $currentData->address }}">
                        @if ($errors->has('address'))
                        @foreach ($errors->get('address') as $error)
                        <span style="color: red;">{{ $error }}</span>
                        @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="referral">Refferal (Optional)</label>
                        <input type="text" name="referal" id="referal" placeholder="Masukkan Kode Referral" value="{{ $currentData->referal }}">
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label for="birth">Date of Birth</label>
                        <input type="date" name="birth" id="birth" placeholder="Masukkan Tanggal Lahir" value="{{ $currentData->date_of_birth }}">
                        @if ($errors->has('birth'))
                        @foreach ($errors->get('birth') as $error)
                        <span style="color: red;">{{ $error }}</span>
                        @endforeach
                        @endif
                    </div>
                </div>
                <br><br>

                <div class="two fields">
                    <div class="field">
                        <label for="university">Supervisor Name(Nama Dosen Pembimbing)</label>
                        <input type="text" name="supervisor_name" id="supervisor_name" placeholder="Masukkan Nama Dosen Pembimbing" value="{{ $currentData->supervisor_name }}">
                        @if ($errors->has('supervisor_name'))
                        @foreach ($errors->get('supervisor_name') as $error)
                        <span style="color: red;">{{ $error }}</span>
                        @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="university">Supervisor Email(Email Dosen Pembimbing)</label>
                        <input type="text" name="supervisor_email" id="supervisor_email" placeholder="Masukkan Email Dosen Pembimbing" value="{{ $currentData->supervisor_email }}">
                        @if ($errors->has('supervisor_email'))
                        @foreach ($errors->get('supervisor_email') as $error)
                        <span style="color: red;">{{ $error }}</span>
                        @endforeach
                        @endif
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label for="university">University</label>
                        <input type="text" name="university" id="university" placeholder="Masukkan Universitas" value="{{ $currentData->university }}">
                        @if ($errors->has('university'))
                        @foreach ($errors->get('university') as $error)
                        <span style="color: red;">{{ $error }}</span>
                        @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="major">Major</label>
                        <input type="text" name="major" id="major" placeholder="Masukkan Jurusan" value="{{ $currentData->major }}">
                        @if ($errors->has('major'))
                        @foreach ($errors->get('major') as $error)
                        <span style="color: red;">{{ $error }}</span>
                        @endforeach
                        @endif
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label for="semester">Semester</label>
                        <input type="number" name="semester" id="semester" placeholder="Masukkan Semester" value="{{ $currentData->semester }}">
                        @if ($errors->has('semester'))
                        @foreach ($errors->get('semester') as $error)
                        <span style="color: red;">{{ $error }}</span>
                        @endforeach
                        @endif
                    </div>
                </div>
                <br><br>

                <div class="two fields">
                    <div class="field">
                        <label for="city">City</label>
                        <input type="text" name="city" id="city" placeholder="Masukkan Kota" value="{{ $currentData->city }}">
                        @if ($errors->has('city'))
                        @foreach ($errors->get('city') as $error)
                        <span style="color: red;">{{ $error }}</span>
                        @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="province">Province</label>
                        <select name="province" class="ui dropdown" id="province">
                            @foreach ($allProvince as $item)
                            @if ($item->id == $currentData->m_province_id)
                            <option selected value="{{ $item->id }}">{{ $item->name }}</option>
                            @else
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endif
                            @endforeach
                        </select>
                        @if ($errors->has('province'))
                        @foreach ($errors->get('province') as $error)
                        <span style="color: red;">{{ $error }}</span>
                        @endforeach
                        @endif
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label for="country">Country</label>
                        <input type="text" name="country" id="country" placeholder="Masukkan Negara" value="{{ $currentData->country }}">
                        @if ($errors->has('country'))
                        @foreach ($errors->get('country') as $error)
                        <span style="color: red;">{{ $error }}</span>
                        @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="postal_code">Postal Code</label>
                        <input type="number" name="postal_code" id="postal_code" placeholder="Masukkan Kode Pos" value="{{ $currentData->postal_code }}">
                        @if ($errors->has('postal_code'))
                        @foreach ($errors->get('postal_code') as $error)
                        <span style="color: red;">{{ $error }}</span>
                        @endforeach
                        @endif
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label for="linkedin">LinkedIn (Optional)</label>
                        <input type="text" name="linkedin" id="linkedin" placeholder="Masukkan LinkedIn" value="{{ $currentData->linked_in }}">
                    </div>
                    <div class="field">
                        <label for="partner">Partner</label>
                        <select name="partner" class="ui dropdown" id="partner">
                            <option value="">-- Pilih Partner --</option>
                            @foreach ($allPartner as $item)
                            @if ($item->id == $currentData->m_partner_id)
                            <option selected value="{{ $item->id }}">{{ $item->name }}</option>
                            @else
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endif
                            @endforeach
                        </select>
                        @if ($errors->has('partner'))
                        @foreach ($errors->get('partner') as $error)
                        <span style="color: red;">{{ $error }}</span>
                        @endforeach
                        @endif
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <label for="profile_picture">Photo Profile (Optional)</label>
                        <input type="file" name="file_image" id="file_image" accept="image/png, image/jpeg, image/jpg" style="border: none; padding-left: 0;">
                        @error('profile_picture')
                        <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="field">
                        <div class="ui centered medium image">
                            <img id="frame" class="img-fluid" />
                        </div>
                    </div>
                </div>

                <div class="field">
                    <label for="">Users Description (Optional)</label>
                    <textarea selected value="{{ $currentData->description }}" name="description" id="description" rows="5">{{ $currentData->description }}</textarea>
                </div>

                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" {{ $currentData->status == 1 ? 'checked' : '' }} name="status">
                        <label>Aktif</label>
                    </div>
                </div>

                <div class="divTambah">
                    <button class="btnSave">Save & Update</button>
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