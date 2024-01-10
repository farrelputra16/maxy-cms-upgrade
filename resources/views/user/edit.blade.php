@extends('layout.master')

@section('title', 'Edit User')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <h2 style="padding-bottom:3%">Edit Users</h2>
        <form class="ui form" method="post">
            @csrf
            <div class="field">
                <div class="three fields">
                    <div class="field">
                        <label for="">ID</label>
                        <input type="text" name="name" value="{{ request()->query('id') }}" disabled>
                    </div>
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
                        <div class="field">
                            <label for="">Access Group</label>
                            <select name="access_group" class="ui dropdown">
                                <option selected value="{{ $currentData->access_group_id }}">
                                    {{ $currentData->access_group_name }}</option>
                                @foreach ($allAccessGroups as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="three fields">
                    <div class="field">
                        <label for="name">Nickname</label>
                        <input type="text" name="nickname" id="nickname" placeholder="Masukkan Nickname "
                            value="{{ $currentData->nickname }}">
                        @if ($errors->has('name'))
                            @foreach ($errors->get('name') as $error)
                                <span style="color: red;">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" id="phone" placeholder="Masukkan Nomor Telepon"
                            value="{{ $currentData->phone }}">
                        @if ($errors->has('phone'))
                            @foreach ($errors->get('phone') as $error)
                                <span style="color: red;">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>

                    <div class="field">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" placeholder="Masukkan Alamat"
                            value="{{ $currentData->address }}">
                        @if ($errors->has('address'))
                            @foreach ($errors->get('address') as $error)
                                <span style="color: red;">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                </div>

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
                    <small>The user's password has been hashed to protect their privacy, proceed to change it to your
                        liking. <span style="color: blue;">Just make sure to remember it.</span></small>
                    <input type="password" name="password" value="{{ $currentData->password }}">
                </div>
                @if ($errors->has('password'))
                    @foreach ($errors->get('password') as $error)
                        <span style="color: red;">{{ $error }}</span>
                    @endforeach
                @endif

                <div class="two fields">
                    <div class="field">
                        <label for="birth">Date of Birth</label>
                        <input type="date" name="birth" id="birth" placeholder="Masukkan Tanggal Lahir"
                            value="{{ $currentData->date_of_birth }}">
                        @if ($errors->has('birth'))
                            @foreach ($errors->get('birth') as $error)
                                <span style="color: red;">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="referral">Refferal (Optional)</label>
                        <input type="text" name="referal" id="referal" placeholder="Masukkan Kode Referral"
                            value="{{ $currentData->referal }}">
                    </div>
                </div>
                <div class="three fields">
                    <div class="field">
                        <label for="university">University</label>
                        <input type="text" name="university" id="university" placeholder="Masukkan Universitas"
                            value="{{ $currentData->university }}">
                        @if ($errors->has('university'))
                            @foreach ($errors->get('university') as $error)
                                <span style="color: red;">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="major">Major</label>
                        <input type="text" name="major" id="major" placeholder="Masukkan Jurusan"
                            value="{{ $currentData->major }}">
                        @if ($errors->has('major'))
                            @foreach ($errors->get('major') as $error)
                                <span style="color: red;">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="semester">Semester</label>
                        <input type="number" name="semester" id="semester" placeholder="Masukkan Semester"
                            value="{{ $currentData->semester }}">
                        @if ($errors->has('semester'))
                            @foreach ($errors->get('semester') as $error)
                                <span style="color: red;">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="four fields">
                    <div class="field">
                        <label for="city">City</label>
                        <input type="text" name="city" id="city" placeholder="Masukkan Kota"
                            value="{{ $currentData->city }}">
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
                    <div class="field">
                        <label for="country">Country</label>
                        <input type="text" name="country" id="country" placeholder="Masukkan Negara"
                            value="{{ $currentData->country }}">
                        @if ($errors->has('country'))
                            @foreach ($errors->get('country') as $error)
                                <span style="color: red;">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="postal_code">Postal Code</label>
                        <input type="number" name="postal_code" id="postal_code" placeholder="Masukkan Kode Pos"
                            value="{{ $currentData->postal_code }}">
                        @if ($errors->has('postal_code'))
                            @foreach ($errors->get('postal_code') as $error)
                                <span style="color: red;">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="three fields">
                    <div class="field">
                        <label for="linkedin">LinkedIn (Optional)</label>
                        <input type="text" name="linkedin" id="linkedin" placeholder="Masukkan LinkedIn"
                            value="{{ $currentData->linked_in }}">
                    </div>
                    <div class="field">
                        <label for="user_request">Request (Optional)</label>
                        <input type="text" name="user_request" id="user_request" placeholder="Masukkan Request"
                            value="{{ $currentData->request }}">
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

                <div class="field">
                    <label for="profile_picture">Photo Profile (Optional)</label>
                    <input type="file" name="file_image" id="file_image" accept="image/png, image/jpeg, image/jpg"
                        style="border: none; padding-left: 0;">
                    @error('profile_picture')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="field">
                    <label for="">Users Description (Optional)</label>
                    <textarea selected value="{{ $currentData->description }}" name="description" id="description" rows="5">{{ $currentData->description }}</textarea>
                </div>

                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1"
                            {{ $currentData->status == 1 ? 'checked' : '' }} name="status">
                        <label>Aktif</label>
                    </div>
                </div>
            </div>
            <button class="right floated ui button primary">Save & Update</button>
        </form>
        <a href="{{ route('getUser') }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection
