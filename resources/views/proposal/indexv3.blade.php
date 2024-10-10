@extends('layout.main-v3')

@section('title', 'Proposal')

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
                        <li class="breadcrumb-item"><a>Members</a></li>
                        <li class="breadcrumb-item active">Proposals</li>
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
                    <h4 class="card-title">Proposals</h4>
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
                                <th class="data-medium">Name</th>
                                <th class="data-medium">Title</th>
                                <th>Created At</th>
                                <th>Created Id</th>
                                <th>Updated At</th>
                                <th>Updated Id</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($proposals as $key => $proposal)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $proposal->id }}</td>
                                    <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                        title="{{ $proposal->User->name }}">
                                        {!! \Str::limit($proposal->User->name, 30) !!}
                                    </td>
                                    <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                        title="{{ $proposal->name }}">
                                        {!! \Str::limit($proposal->name, 30) !!}
                                    </td>
                                    <td>{{ $proposal->created_at }}</td>
                                    <td>{{ $proposal->created_id }}</td>
                                    <td>{{ $proposal->updated_at }}</td>
                                    <td>{{ $proposal->updated_id }}</td>
                                    <td>
                                        @if ($proposal->m_proposal_status_id == 6)
                                            <span class="btn btn-danger disabled">{{ $proposal->MProposalStatus->name }}</span>
                                        @elseif ($proposal->m_proposal_status_id == 7)
                                            <span class="btn btn-success disabled">{{ $proposal->MProposalStatus->name }}</span>
                                        @elseif ($proposal->m_proposal_status_id == 8)
                                            <span class="btn btn-warning disabled">{{ $proposal->MProposalStatus->name }}</span>
                                        @elseif ($proposal->m_proposal_status_id == 9)
                                            <span class="btn btn-primary disabled">{{ $proposal->MProposalStatus->name }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- <div class="btn-group"> --}}
                                        <a href="{{ route('getEditProposal', ['id' => $proposal->id]) }}"
                                            class="btn btn-primary rounded">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Name</th>
                                <th class="data-medium">Title</th>
                                <th>Created At</th>
                                <th>Created Id</th>
                                <th>Updated At</th>
                                <th>Updated Id</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->
@endsection

@section('script')

@endsection
