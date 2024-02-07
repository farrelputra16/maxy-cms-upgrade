@extends('layout.master')

@section('title', 'Add User')

@section('content') 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <div style="padding: 12px 12px 0px 12px;">
        <h2>Add Users</h2>
        <hr><br>
        <form class="ui form" method="post" action="{{ route('postAddUser') }}" enctype="multipart/form-data">
            @csrf
            <!-- REQUIRED DATA -->
            <div class="two fields">
                <div class="field">
                    <label for="name">Name*</label>
                    <input type="text" name="name" id="name" placeholder="Masukkan Nama">
                    @if ($errors->has('name'))
                        @foreach ($errors->get('name') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="field">
                    <label for="birth">Date of Birth*</label>
                    <input type="date" name="birth" id="birth" placeholder="Masukkan Tanggal Lahir">
                    @if ($errors->has('birth'))
                        @foreach ($errors->get('birth') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="two fields">
                <div class="field">
                    <label for="email">Email*</label>
                    <input type="email" name="email" id="email" placeholder="Masukkan Email">
                    @if ($errors->has('email'))
                        @foreach ($errors->get('email') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="field">
                    <label for="access_group">Role*</label>
                    <select name="access_group" class="ui dropdown" id="access_group">
                        <option value="">-- Pilih Access Group --</option>
                        @foreach ($allAccessGroups as $item)
                            <option value="{{ $item->id }}">[{{ $item->id }}] {{ $item->name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('access_group'))
                        @foreach ($errors->get('access_group') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="two fields">
                <div class="field">
                    <label for="phone">Phone*</label>
                    <input type="text" name="phone" id="phone" placeholder="Masukkan Nomor Telepon">
                    @if ($errors->has('phone'))
                        @foreach ($errors->get('phone') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="field">
                    <label for="password">Password*</label>
                    <input type="password" name="password" id="password" placeholder="Masukkan Password">
                    @if ($errors->has('password'))
                        @foreach ($errors->get('password') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
            </div>
            <br><hr>

            <!-- ADDITIONAL DATA -->
            <div class="two fields">
                <div class="field">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" placeholder="Masukkan Alamat">
                    @if ($errors->has('address'))
                        @foreach ($errors->get('address') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="field">
                    <label for="postal_code">Postal Code</label>
                    <input type="number" name="postal_code" id="postal_code" placeholder="Masukkan Kode Pos">
                    @if ($errors->has('postal_code'))
                        @foreach ($errors->get('postal_code') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="three fields">
                <div class="field">
                    <label for="city">City</label>
                    <input type="text" name="city" id="city" placeholder="Masukkan Kota">
                    @if ($errors->has('city'))
                        @foreach ($errors->get('city') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="field">
                    <label for="province">Province</label>
                    <select name="province" class="ui dropdown" id="province">
                        <option value="">-- Pilih Provinsi --</option>
                        @foreach ($allProvince as $item)
                            <option value="{{ $item->id }}">{{ $item->name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('province'))
                        @foreach ($errors->get('province') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="field">
                    <label for="country">Country</label>
                    <input type="text" name="country" id="country" placeholder="Masukkan Negara">
                    @if ($errors->has('country'))
                        @foreach ($errors->get('country') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="three fields">
                <div class="field">
                    <label for="university">University</label>
                    <input type="text" name="university" id="university" placeholder="Masukkan Universitas">
                    @if ($errors->has('university'))
                        @foreach ($errors->get('university') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="field">
                    <label for="major">Major</label>
                    <input type="text" name="major" id="major" placeholder="Masukkan Jurusan">
                    @if ($errors->has('major'))
                        @foreach ($errors->get('major') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="field">
                    <label for="semester">Semester</label>
                    <input type="number" name="semester" id="semester" placeholder="Masukkan Semester">
                    @if ($errors->has('semester'))
                        @foreach ($errors->get('semester') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
            </div>
            <br><hr>

            <div class="two fields">
                <div class="field">
                    <label for="partner">Partner</label>
                    <select name="partner" class="ui dropdown" id="partner">
                        <option value="">-- Pilih Partner --</option>
                        @foreach ($allPartner as $item)
                            <option value="{{ $item->id }}">{{ $item->name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('partner'))
                        @foreach ($errors->get('partner') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="field">
                    <label for="referral">Refferal (Optional)</label>
                    <input type="text" name="referal" id="referal" placeholder="Masukkan Kode Referral">
                </div>
            </div>         
            <div class="two fields">
                <div class="field">
                    <label for="linkedin">LinkedIn (Optional)</label>
                    <input type="text" name="linkedin" id="linkedin" placeholder="Masukkan LinkedIn">
                </div>
                <div class="field">
                    <label for="user_request">Request (Optional)</label>
                    <input type="text" name="user_request" id="user_request" placeholder="Masukkan Request">
                </div>
            </div>
            <div class="field">
                <label for="description">Users Description (Optional)</label>
                <textarea name="description"></textarea>
            </div>
            <div class="field">
                <label for="status">Aktif</label>
                <div class="ui checkbox">
                    <input class="form-check-input" type="checkbox" value="1" name="status" id="status">
                    <label for="status">Aktif</label>
                </div>
            </div>
            <button class="right floated ui button primary">Tambah User</button>
        </form>
        <a href="{{ url()->previous() }}"><button class=" right floated ui red button">Batal</button></a>
        <br><br>

        @if(Route::has('user.import-csv'))
        <hr>
        <br>
        <h2>Bulk Action</h2>
        <div class="content pb-5">
            <form method="post" action="{{ route('user.import-csv') }}" enctype="multipart/form-data">
                @csrf
                <div class="card p-5">
                    <div class="row">
                        <div class="col-6">
                            <label for="csv_file">Upload File CSV:</label>
                            <input type="file" name="csv_file" id="csv_file" accept=".csv">
                            @error('csv_file')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                            <br>
                            <small>sample: <i class="fa fa-file" aria-hidden="true"></i> <a href="{{ asset('csv/useraddexample.csv') }}" download>csv example (click me to download)</a></small>
                        </div>
                        <div class="col-6" style="text-align:right">
                            <button type="submit" class="ui button primary">Tambah Multiple Users</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        @endif
    </div>
@endsection
