@extends('layout.main-v3')

@section('title', 'Verifikasi Acara')

@section('content')
    <!-- begin page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Overview</h4>

                <!-- begin breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getEvent') }}">Acara</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{ route('getAttendanceEvent', ['id' => $event_id]) }}">Kehadiran</a></li>
                        <li class="breadcrumb-item active">Verifikasi Kehadiran</li>
                    </ol>
                </div>
                <!-- end breadcrumb -->
            </div>
        </div>
    </div>
    <!-- end page title -->

    <!-- begin content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Verifikasi Acara</h4>
                    <p class="card-title-desc">
                        This page presents a comprehensive overview of all available data, displayed in an interactive
                        and sortable DataTable format. Each row represents a unique data, providing key details such as
                        name, description, and status. Utilize the <b>column visibility, sorting, and column
                            search bar</b> features to
                        customize your view and quickly access the specific information you need.
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100"
                        data-colvis="[1, 4, 5, 6, 7]">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Requirement</th>
                                <th class="data-medium">Value</th>
                                <th>Created At</th>
                                <th>Created Id</th>
                                <th>Updated At</th>
                                <th>Updated Id</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($requirement as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->EventRequirement->name }}</td>
                                    <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                        title="{!! strip_tags($item->value) !!}">

                                        @php
                                            $fileExtension = pathinfo($item->value, PATHINFO_EXTENSION);
                                            $allowedExtensions = ['png', 'pdf', 'jpg', 'jpeg']; // Ekstensi yang diizinkan
                                        @endphp

                                        @if (in_array($fileExtension, $allowedExtensions))
                                            <!-- Jika ekstensi file cocok -->
                                            <a href="{{ asset('uploads/event-registration/' . $event_id . '/' . $user_id . '/' . $item->value) }}"
                                                target="_blank">
                                                {{ $item->value }}
                                            </a>
                                        @else
                                            {{ $item->value ? \Str::limit($item->value, 30) : '-' }}
                                        @endif
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->created_id }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>{{ $item->updated_id }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Requirement</th>
                                <th class="data-medium">Value</th>
                                <th>Created At</th>
                                <th>Created Id</th>
                                <th>Updated At</th>
                                <th>Updated Id</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end content -->
@endsection

@section('script')

@endsection
