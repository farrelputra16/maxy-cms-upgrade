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
                        <li class="breadcrumb-item active">Proposal</li>
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
                    <h4 class="card-title">Proposal</h4>
                    <p class="card-title-desc">
                        Halaman ini menampilkan table untuk melakukan manajemen proposal.
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th class="data-medium">Nama</th>
                                <th class="data-medium">Judul</th>
                                <th>Proposal</th>
                                <th>Tanggal Pembuatan</th>
                                <th>Created Id</th>
                                <th>Updated At</th>
                                <th>Updated Id</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($proposals as $key => $proposal)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $proposal->id }}</td>
                                    <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                        title="{{ $proposal->user_name }}">
                                        {!! \Str::limit($proposal->user_name, 30) !!}
                                    </td>
                                    <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                        title="{{ $proposal->name }}">
                                        {!! \Str::limit($proposal->name, 30) !!}
                                    </td>
                                    <td>
                                        <a href="{{ asset('/uploads/proposal/proposal/' . $proposal->student_id . '/proposal/' . $proposal->proposal) }}"
                                            target="_blank">{{ $proposal->proposal }}</a>
                                    </td>
                                    <td>{{ $proposal->created_at }}</td>
                                    <td>{{ $proposal->created_id }}</td>
                                    <td>{{ $proposal->updated_at }}</td>
                                    <td>{{ $proposal->updated_id }}</td>
                                    <td>
                                        @if ($proposal->m_proposal_status_id == 6)
                                            <span class="badge bg-danger"
                                                style="pointer-events: none;">{{ $proposal->status }}</span>
                                        @elseif ($proposal->m_proposal_status_id == 7)
                                            <span class="badge bg-success"
                                                style="pointer-events: none;">{{ $proposal->status }}</span>
                                        @elseif ($proposal->m_proposal_status_id == 8)
                                            <span class="badge bg-warning"
                                                style="pointer-events: none;">{{ $proposal->status }}</span>
                                        @elseif ($proposal->m_proposal_status_id == 9)
                                            <span class="badge bg-primary"
                                                style="pointer-events: none;">{{ $proposal->status }}</span>
                                        @else
                                            <span class="badge bg-info"
                                                style="pointer-events: none;">{{ $proposal->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('getEditProposal', ['id' => $proposal->id]) }}"
                                            class="btn btn-primary rounded">Ubah</a>
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
                                <th>Proposal</th>
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
