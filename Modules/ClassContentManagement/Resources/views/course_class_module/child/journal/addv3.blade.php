@extends('layout.main-v3')

@section('title', 'Balas Jurnal Mahasiswa')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Balas Jurnal Mahasiswa</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCourseClass') }}">Kelas</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCourseClassModule') }}">Modul Kelas</a></li>
                        <li class="breadcrumb-item active">Balas Jurnal</li>
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

                    <h4 class="card-title">Balas Jurnal Mahasiswa</h4>
                    <p class="card-title-desc">Halaman ini memungkinkan Anda untuk memperbarui informasi data dengan
                        memodifikasi data yang tercantum di bawah ini. Pastikan semua informasi yang Anda masukkan akurat
                        untuk memberikan pengalaman belajar terbaik bagi peserta mata kuliah.</p>

                    <form id="addCourseClassModuleChild" action="{{ route('postAddJournalCourseClassChildModule') }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="course_class_module_id" value="{{ $parent_module->id }}">
                        <input type="hidden" name="course_journal_parent_id" value="{{ $course_journal_parent_id }}">
                        <input type="hidden" name="user_id" value="{{ $comment->User->id }}">
                        <div class="mb-3 row">
                            <label for="input-slug" class="col-md-2 col-form-label">Materi</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" value="{!! $parent_module->detail->content !!}" disabled>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">File Materi</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <a href="{{ asset('fe/public/files/' . $parent_module->detail->material) }}" download>
                                    {{ $parent_module->detail->material }}
                                </a>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <section class="gradient-custom">
                                <div class="container">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-md-12 col-lg-10 col-xl-8">
                                            <div class="card w-100">
                                                <div class="card-body p-4">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="d-flex flex-start">
                                                                @if (empty($comment->User->profile_picture))
                                                                    <i class="fas fa-user-circle"></i>
                                                                @else
                                                                    <img src="{{ config('app.url_backend') }}/uploads/{{ $comment->User->profile_picture }}"
                                                                        class="rounded-circle shadow-1-strong me-3"
                                                                        alt="Profile Picture" width="65" height="65">
                                                                @endif
                                                                <div class="flex-grow-1 flex-shrink-1">
                                                                    <div>
                                                                        <div
                                                                            class="d-flex justify-content-between align-items-center">
                                                                            <p class="mb-1">
                                                                                {{ $comment->User->name }} <span
                                                                                    class="small">-
                                                                                    {{ $comment->diff }}</span>
                                                                            </p>
                                                                        </div>
                                                                        <p class="small mb-0">
                                                                            {!! $comment->description !!}
                                                                        </p>
                                                                    </div>
                                                                    @foreach ($comment->child as $child)
                                                                        <div class="d-flex flex-start mt-4">
                                                                            <a class="me-3" href="#">
                                                                                @if (empty(auth()->user()->profile_picture))
                                                                                    <i class="fas fa-user-circle"></i>
                                                                                @else
                                                                                    <img src="{{ config('app.url_backend') }}/uploads/{{ auth()->user()->profile_picture }}"
                                                                                        class="rounded-circle shadow-1-strong"
                                                                                        alt="Profile Picture" width="65"
                                                                                        height="65" />
                                                                                @endif
                                                                            </a>
                                                                            <div class="flex-grow-1 flex-shrink-1">
                                                                                <div>
                                                                                    <div
                                                                                        class="d-flex justify-content-between align-items-center">
                                                                                        <p class="mb-1">
                                                                                            {{ auth()->user()->name }}
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
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Deskripsi</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="description">{{ old('description') }}</textarea>
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary w-md text-center custom-btn-submit"
                                    form="addCourseClassModuleChild">Balas Jurnal</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('script')

@endsection
