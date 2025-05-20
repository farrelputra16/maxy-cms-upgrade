@extends('layout.main-v3')

@section('title', 'Landing Pages Settings')

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
                        <li class="breadcrumb-item"><a>Settings</a></li>
                        <li class="breadcrumb-item active">Landing Page</li>
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
                    <h4 class="card-title">ManajemenLanding Page</h4>
                    <p class="card-title-desc">
                        Halaman ini dapat digunakan untuk mengelola seluruh landing page beserta konfigurasi meta data yang
                        dimiliki oleh masing-masing halaman.
                    </p>


                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100" data-colvis="[]">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Halaman</th>
                                <th>URL</th>
                                <th>Title</th>
                                <th>Favicon</th>
                                <th>GA ID</th>
                                <th>Social Image URL</th>
                                <th>Admin Note</th>
                                <th>Created At</th>
                                <th>Created By</th>
                                <th>Updated At</th>
                                <th>Updated By</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td><a href="{{ $item->url }}" target="_blank">{{ $item->url }}</a></td>
                                    <td>{{ $item->title }}</td>
                                    <td>
                                        @if (!empty($item->favicon_url))
                                            <img src="{{ $item->favicon_url }}" alt="Favicon" class="img-thumbnail" style="max-width: 30px;">
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{ $item->ga_id ?? '-' }}</td>
                                    <td>
                                        @if (!empty($item->social_image_url))
                                            <a href="{{ $item->social_image_url }}" target="_blank">View Image</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="data-long" data-toggle="tooltip" title="{{ strip_tags($item->description) }}">
                                        {!! $item->description ? \Str::limit($item->description, 30) : '-' !!}
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y H:i') }}</td>
                                    <td>{{ $item->created_id }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->updated_at)->format('d-m-Y H:i') }}</td>
                                    <td>{{ $item->updated_id }}</td>
                                    <td>
                                        <span class="badge {{ $item->status === 'active' ? 'badge-success' : 'badge-danger' }}">
                                            {{ ucfirst($item->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('pageManagement.page.getEdit', ['id' => $item->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Halaman</th>
                                <th>URL</th>
                                <th>Title</th>
                                <th>Favicon</th>
                                <th>GA ID</th>
                                <th>Social Image URL</th>
                                <th>Admin Note</th>
                                <th>Created At</th>
                                <th>Created By</th>
                                <th>Updated At</th>
                                <th>Updated By</th>
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

    <!-- FAB Add Starts -->
    <div id="floating-whatsapp-button">
        <a href="{{ route('pageManagement.page.getAdd') }}" data-toggle="tooltip" title="Tambah Data">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- FAB Add Ends -->
@endsection

@section('script')

@endsection
