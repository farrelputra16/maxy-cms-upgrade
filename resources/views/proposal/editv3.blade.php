@extends('layout.main-v3')

@section('title', 'Edit Proposal')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Edit Data</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a>Member</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getProposal') }}">Proposals</a></li>
                        <li class="breadcrumb-item active">Edit Proposal</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Edit Proposal</h4>
                    <p class="card-title-desc">Halaman ini digunakan untuk memperbarui informasi proposal.</p>

                    <form action="{{ route('postEditProposal', ['id' => request()->query('id')]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="id" value="{{ $currentData->id }}" style="display: none;">
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Title</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="title" value="{{ $currentData->name }}"
                                    disabled>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Nama</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name"
                                    value="{{ $currentData->User->name }}" disabled>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Link URL</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="url"
                                    value="{{ $currentData->proposal_url }}" disabled>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Status</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="status" data-placeholder="Choose ...">
                                    @foreach ($status as $stat)
                                        <option value="{{ $stat->id }}"
                                            @if ($currentData->m_proposal_status_id == $stat->id) selected @endif>{{ $stat->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('status'))
                                    @foreach ($errors->get('status') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Nilai</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="proposal_grade"
                                    value="{{ $currentData->proposal_grade }}">
                                @if ($errors->has('proposal_grade'))
                                    @foreach ($errors->get('proposal_grade') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Deskripsi</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="description">{{ $currentData->description }}</textarea>
                                @if ($errors->has('description'))
                                    @foreach ($errors->get('description') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary w-md text-center">Save & Update</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('script')
    <script>
        // preview image
        function previewImage() {
            const input = document.getElementById('file');
            const frame = document.getElementById('frame');

            // Check if a file is selected and it's an image
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                // Event listener for when the file is read
                reader.onload = function(e) {
                    frame.src = e.target.result; // Set the image source to the file
                }

                // Read the selected file as a Data URL (base64)
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
