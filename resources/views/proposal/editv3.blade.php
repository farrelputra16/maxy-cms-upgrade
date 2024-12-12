@extends('layout.main-v3')

@section('title', 'Ubah Proposal')

@section('content')
    <!-- Mulai Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Ubah Data Proposal</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mahasiswa</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getProposal') }}">Proposal</a></li>
                        <li class="breadcrumb-item active">Ubah Proposal</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Judul Halaman -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Perbarui Data Proposal</h4>
                    <p class="card-title-desc">Gunakan halaman ini untuk memperbarui informasi proposal secara detail.</p>

                    <form action="{{ route('postEditProposal', ['id' => request()->query('id')]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $currentData->id }}">

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Judul Proposal</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="title" value="{{ $currentData->name }}"
                                    disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Nama Pengusul</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name"
                                    value="{{ $currentData->User->name }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-url" class="col-md-2 col-form-label">Link Proposal</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="url"
                                    value="{{ $currentData->proposal_url }}" disabled>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-description" class="col-md-2 col-form-label">Deskripsi Proposal</label>
                            <div class="col-md-10">
                                {{-- <textarea id="elmDesc" name="description" readonly>{{ $currentData->description }}</textarea>
                                 --}}
                                <div class="form-control" style="height: auto; min-height: 150px;" readonly>
                                    {!! $currentData->description !!}</div>
                                @if ($errors->has('description'))
                                    @foreach ($errors->get('description') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-status" class="col-md-2 col-form-label">Status Proposal</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="status" data-placeholder="Pilih Status">
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
                            <label for="input-grade" class="col-md-2 col-form-label">Nilai Proposal</label>
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

                        @if (isset($proposal_bimbingan))
                            @foreach ($proposal_bimbingan as $bimbingan)
                                <section class="gradient-custom">
                                    <div class="container">
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-md-12 col-lg-10 col-xl-8">
                                                <div class="card w-100">
                                                    <div class="card-body p-4">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="d-flex flex-start">
                                                                    @if (empty($bimbingan->User->profile_picture))
                                                                        <i class="fas fa-user-circle"></i>
                                                                    @else
                                                                        <img src="{{ config('app.url_backend') }}/uploads/{{ $bimbingan->User->profile_picture }}"
                                                                            class="rounded-circle shadow-1-strong me-3"
                                                                            alt="Profile Picture" width="65"
                                                                            height="65">
                                                                    @endif
                                                                    <div class="flex-grow-1 flex-shrink-1">
                                                                        <div>
                                                                            <div
                                                                                class="d-flex justify-content-between align-items-center">
                                                                                <p class="mb-1">
                                                                                    {{ $bimbingan->User->name }} <span
                                                                                        class="small">-
                                                                                        {{ $bimbingan->diff }}</span>
                                                                                </p>
                                                                            </div>
                                                                            <p class="small mb-0">
                                                                                {!! $bimbingan->description !!}
                                                                            </p>
                                                                        </div>
                                                                        @foreach ($bimbingan->child as $child)
                                                                            <div class="d-flex flex-start mt-4">
                                                                                <a class="me-3" href="#">
                                                                                    @if (empty($member->profile_picture))
                                                                                        <i class="fas fa-user-circle"></i>
                                                                                    @else
                                                                                        <img src="{{ config('app.url_backend') }}/uploads/{{ $member->profile_picture }}"
                                                                                            class="rounded-circle shadow-1-strong"
                                                                                            alt="Profile Picture"
                                                                                            width="65"
                                                                                            height="65" />
                                                                                    @endif
                                                                                </a>
                                                                                <div class="flex-grow-1 flex-shrink-1">
                                                                                    <div>
                                                                                        <div
                                                                                            class="d-flex justify-content-between align-items-center">
                                                                                            <p class="mb-1">
                                                                                                {{ $member->name }}
                                                                                                <span class="small">-
                                                                                                    {{ $child->diff }}</span>
                                                                                            </p>
                                                                                        </div>
                                                                                        <p class="small mb-0">
                                                                                            {!! $child->description !!}
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            @endforeach
                        @endif

                        <div class="mb-3 row">
                            <label for="input-description" class="col-md-2 col-form-label">Komentar</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="comment">{{ old('comment') }}</textarea>
                                @if ($errors->has('comment'))
                                    @foreach ($errors->get('comment') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row justify-content-end">
                            <div class="col-md-10 text-end">
                                <button type="submit" class="btn btn-primary w-md text-center">Simpan & Perbarui</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        // Pratinjau Gambar
        function previewImage() {
            const input = document.getElementById('file');
            const frame = document.getElementById('frame');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    frame.src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
