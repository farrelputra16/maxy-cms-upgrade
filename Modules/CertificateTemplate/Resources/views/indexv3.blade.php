@extends('layout.main-v3')

@section('title', 'Certificate Template')

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
                        <li class="breadcrumb-item active">Certificate Template</li>
                    </ol>
                </div>
                <!-- End Breadcrumb -->
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Begin Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Certificate Templates</h4>
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
                                <th>Course Type - Batch</th>
                                <th>Image</th>
                                <th>Marker State</th>
                                <th>Template Content</th>
                                <th>Created At</th>
                                <th>Created Id</th>
                                <th>Updated At</th>
                                <th>Updated Id</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($certificateTemplates as $key => $certificateTemplate)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $certificateTemplate->id }}</td>
                                    <td>{{ $certificateTemplate->type->name . ' - ' . "Batch $certificateTemplate->batch" ?? '-' }}
                                    </td>
                                    <td>
                                        <img src="{{ asset('uploads/certificate/' . $certificateTemplate->type->id . '/' . $certificateTemplate->filename) }}"
                                            alt="{{ $certificateTemplate->filename }}" width="225">
                                    </td>
                                    <td class="text-wrap">{{ \Str::limit($certificateTemplate->marker_state) }}</td>
                                    <td id="description" class="text-wrap">{!! !empty($certificateTemplate->template_content) ? \Str::limit($certificateTemplate->template_content) : '-' !!}</td>
                                    <td>{{ $certificateTemplate->created_at }}</td>
                                    <td>{{ $certificateTemplate->created_id }}</td>
                                    <td>{{ $certificateTemplate->updated_at }}</td>
                                    <td>{{ $certificateTemplate->updated_id }}</td>
                                    <td>
                                        <a href="{{ route('certificate-templates.edit', $certificateTemplate->id) }}"
                                            class="btn btn-primary">Edit</a>
                                        <!-- Delete Form -->
                                        <form action="{{ route('certificate-templates.destroy', $certificateTemplate->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this template?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Course Type - Batch</th>
                                <th>Image</th>
                                <th>Marker State</th>
                                <th>Template Content</th>
                                <th>Created At</th>
                                <th>Created Id</th>
                                <th>Updated At</th>
                                <th>Updated Id</th>
                                <th>Action</th>
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
        <a href="{{ route('certificate-templates.create') }}" target="_blank" data-toggle="tooltip"
            title="Add Certificate">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- FAB Add Ends -->

@endsection

@section('script')

@endsection
