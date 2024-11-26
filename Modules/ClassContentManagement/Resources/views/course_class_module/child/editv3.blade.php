@extends('layout.main-v3')

@section('title', 'Ubah Sub Module Kelas Mata Kuliah')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Ubah Sub Module</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCourseClass') }}">Kelas</a></li>
                        <li class="breadcrumb-item"><a>Ubah Modul</a></li>
                        <li class="breadcrumb-item"><a>Konten</a></li>
                        <li class="breadcrumb-item active"><a>Ubah Konten</a></li>
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

                    <h4 class="card-title">Ubah Sub Module</h4>
                    <p class="card-title-desc">Halaman ini memungkinkan Anda untuk memperbarui informasi modul anak dengan
                        mengedit data yang tercantum di bawah ini. Pastikan semua informasi yang Anda masukkan akurat untuk
                        memberikan pengalaman belajar terbaik bagi peserta mata kuliah.</p>

                    <form action="{{ route('postEditCourseClassChildModule', ['id' => $child_detail->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="course_class_id" value="{{ $class_detail->id }}">
                        <input type="hidden" name="ccmod_parent_id" value="{{ $parent_ccmod_detail->id }}">

                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Kelas</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text"
                                    value="{{ $class_detail->course_name }} Batch {{ $class_detail->batch }}" disabled>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Modul Mata Kuliah <span class="text-danger"
                                data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="course_module_id" data-placeholder="Pilih ...">
                                    @foreach ($child_cm_list as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('course_module_id') == $item->id ? 'selected' : '' }}
                                            @if ($item->id == $child_detail->course_module_id) selected @endif>[{{ $item->type }}]
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('course_module_id'))
                                    @foreach ($errors->get('course_module_id') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Prioritas <span class="text-danger"
                                data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="priority"
                                    value="{{ old('priority', $child_detail->priority) }}">
                                @if ($errors->has('priority'))
                                    @foreach ($errors->get('priority') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Waktu Mulai <span class="text-danger"
                                data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" id="date" type="date" name="start"
                                    value="{{ old('start', \Carbon\Carbon::parse($child_detail->start_date)->format('Y-m-d')) }}">
                                @if ($errors->has('start'))
                                    @foreach ($errors->get('start') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Waktu Berakhir <span class="text-danger"
                                data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" id="date" type="date" name="end"
                                    value="{{ old('end', \Carbon\Carbon::parse($child_detail->end_date)->format('Y-m-d')) }}">
                                @if ($errors->has('end'))
                                    @foreach ($errors->get('end') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="card m-5 p-5" style="border-radius: 25px; border: 1px solid #b0bad8;">
                            <a href="{{ route('getEditChildModule', ['id' => $child_cm_detail->id]) }}">
                                <h3>Materi <i class="fa fa-edit"></i></h3>
                            </a>
                            <div class="field">
                                <label for=""></label>
                                <a href="{{ asset('fe/public/files/' . $child_cm_detail->material) }}"
                                    download>{{ $child_cm_detail->material }}</a>
                            </div>

                            <div class="field">
                                <label for=""></label>
                                <textarea id="elm1" name="content" readonly>{{ old('content', $child_cm_detail->content) }}</textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Catatan Admin</label>
                            <div class="col-md-10">
                                <textarea class="form-control" id="content" name="description">{{ old('description', $child_detail->description) }}</textarea>
                            </div>
                        </div>
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <!-- Hidden input untuk mengirim nilai 0 jika checkbox tidak dicentang -->
                                <input type="hidden" name="status" value="0">

                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    value="1" name="status"
                                    {{ old('status', isset($child_detail) ? $child_detail->status : false) ? 'checked' : '' }}>
                                <label class="m-0">Aktif</label>
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary w-md text-center">Simpan & Perbarui</button>
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
