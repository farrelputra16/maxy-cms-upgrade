@extends('layout.main-v3')

@section('title', 'User')

@section('content')
    <!-- Begin Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Overview</h4>

                <!-- Begin Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a>Users & Access</a></li>
                        <li class="breadcrumb-item active">User</li>
                    </ol>
                </div>
                <!-- End Breadcrumb -->
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Begin Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Users</h4>
                    <p class="card-title-desc">
                        This page presents a comprehensive overview of all available data, displayed in an interactive
                        and sortable DataTable format. Each row represents a unique data, providing key details such as
                        name, description, and status. Utilize the <b>column visibility, sorting, and column search bar</b>
                        features to
                        customize your view and quickly access the specific information you need.
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Member</th>
                                <th class="data-medium">Email</th>
                                <th>Access Group</th>
                                <th class="data-long">Description</th>
                                <th>Date Of Birth</th>
                                <th>Phone</th>
                                <th class="data-long">Address</th>
                                <th>University</th>
                                <th>Major</th>
                                <th>Semester</th>
                                <th>City</th>
                                <th>Country</th>
                                <th>Level</th>
                                <th>supervisor_name</th>
                                <th>supervisor_email</th>
                                <th>IPK</th>
                                <th>Religion</th>
                                <th>Hobby</th>
                                <th>Citizenship Status</th>
                                <th>Created At</th>
                                <th>Created Id</th>
                                <th>Updated At</th>
                                <th>Updated Id</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                        title="{{ $item->name }}">
                                        {!! \Str::limit($item->name, 30) !!}
                                    </td>
                                    <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                        title="{{ $item->email }}">
                                        {!! \Str::limit($item->email, 30) !!}
                                    </td>
                                    <td>{{ $item->accessgroup }}</td>
                                    <td class="data-long" data-toggle="tooltip" data-placement="top"
                                        title="{!! strip_tags($item->description) !!}">
                                        {!! !empty($item->description) ? \Str::limit($item->description, 30) : '-' !!}
                                    </td>
                                    <td>{!! !empty($item->date_of_birth) ? \Str::limit($item->date_of_birth, 30) : '-' !!}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td class="data-long" data-toggle="tooltip" data-placement="top"
                                        title="{!! strip_tags($item->address) !!}">
                                        {!! !empty($item->address) ? \Str::limit($item->address, 30) : '-' !!}
                                    </td>
                                    <td>{!! !empty($item->university) ? \Str::limit($item->university, 30) : '-' !!}</td>
                                    <td>{!! !empty($item->major) ? \Str::limit($item->major, 30) : '-' !!}</td>
                                    <td>{!! !empty($item->semester) ? \Str::limit($item->semester, 30) : '-' !!}</td>
                                    <td>{!! !empty($item->city) ? \Str::limit($item->city, 30) : '-' !!}</td>
                                    <td>{!! !empty($item->country) ? \Str::limit($item->country, 30) : '-' !!}</td>
                                    <td>{{ $item->level }}</td>
                                    <td>{!! !empty($item->supervisor_name) ? \Str::limit($item->supervisor_name, 30) : '-' !!}</td>
                                    <td>{!! !empty($item->supervisor_email) ? \Str::limit($item->supervisor_email, 30) : '-' !!}</td>
                                    <td>{!! !empty($item->ipk) ? \Str::limit($item->ipk, 30) : '-' !!}</td>
                                    <td>{!! !empty($item->religion) ? \Str::limit($item->religion, 30) : '-' !!}</td>
                                    <td>{!! !empty($item->hobby) ? \Str::limit($item->hobby, 30) : '-' !!}</td>
                                    <td>{!! !empty($item->citizenship_status) ? \Str::limit($item->citizenship_status, 30) : '-' !!}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->created_id }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>{{ $item->updated_id }}</td>
                                    <td value="{{ $item->status }}">
                                        @if ($item->status == 1)
                                            <a class="btn btn-success" style="pointer-events: none;">Aktif</a>
                                        @else
                                            <a class="btn btn-danger" style="pointer-events: none;">Non Aktif</a>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- <div class="btn-group"> --}}
                                        <a href="{{ route('getEditUser', ['id' => $item->id]) }}"
                                            class="btn btn-primary rounded">Edit</a>
                                        <a href="{{ route('getProfileUser', ['id' => $item->id]) }}"
                                            class="btn btn-outline-primary rounded">Profile</a>
                                        {{-- </div> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Member</th>
                                <th>Email</th>
                                <th>Access Group</th>
                                <th>Description</th>
                                <th>Date Of Birth</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>University</th>
                                <th>Major</th>
                                <th>Semester</th>
                                <th>City</th>
                                <th>Country</th>
                                <th>Level</th>
                                <th>supervisor_name</th>
                                <th>supervisor_email</th>
                                <th>IPK</th>
                                <th>Religion</th>
                                <th>Hobby</th>
                                <th>Citizenship Status</th>
                                <th>Created At</th>
                                <th>Created Id</th>
                                <th>Updated At</th>
                                <th>Updated Id</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->

    <!-- FAB Add Starts -->
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddUser') }}" target="_blank" data-toggle="tooltip" title="Add User">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- FAB Add Ends -->
@endsection

@section('script')

@endsection
