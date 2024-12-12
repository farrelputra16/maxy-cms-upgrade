@extends('layout.main-v3')

@section('title', 'Ubah Kelas')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Ubah Data Modul Kelas</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Kelas</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCourseClass') }}">Daftar Kelas</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{ route('getCourseClassModule', ['id' => $course_class_module->course_class_id]) }}">Modul
                                Kelas</a></li>
                        <li class="breadcrumb-item active">Ubah Module:
                            @if ($course_class_module->course_module_type != '')
                                [{{ $course_class_module->course_module_type }}]
                            @else
                                [Parent Module Day {{ $course_class_module->priority }}]
                            @endif{{ $course_class_module->course_module_name }}
                        </li>
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

                    <h4 class="card-title">Ubah Modul Kelas: {{ $course_class_module->course_module_name }} <small>[ ID:
                            {{ $classDetail->course_class_id }} ]</small></h4>
                    <p class="card-title-desc">Halaman ini memungkinkan Anda memperbarui informasi modul kelas. Pastikan
                        semua data yang Anda masukkan sudah benar untuk memberikan pengalaman belajar terbaik kepada peserta
                        mata kuliah.</p>

                    <form action="{{ route('postEditCourseClassModule', ['id' => request()->query('id')]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="course_class_id" value="{{ $classDetail->course_class_id }}">

                        <div class="mb-3 row">
                            <label for="input-batch" class="col-md-2 col-form-label">Tanggal Mulai <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="date" name="start"
                                    value="{{ old('start', \Carbon\Carbon::parse($course_class_module->start_date)->format('Y-m-d')) }}">
                                @if ($errors->has('start'))
                                    @foreach ($errors->get('start') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-batch" class="col-md-2 col-form-label">Tanggal Selesai <span
                                    class="text-danger" data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="date" name="end"
                                    value="{{ old('end', \Carbon\Carbon::parse($course_class_module->end_date)->format('Y-m-d')) }}">
                                @if ($errors->has('end'))
                                    @foreach ($errors->get('end') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Tingkat <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="level"
                                    value="{{ old('level', $course_class_module->level) }}" id="name"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                @if ($errors->has('level'))
                                    @foreach ($errors->get('level') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-slug" class="col-md-2 col-form-label">Hari ke-* <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="priority"
                                    value="{{ old('priority', $course_class_module->priority) }}" id="slug"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                @if ($errors->has('priority'))
                                    @foreach ($errors->get('priority') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Modul Mata Kuliah <span
                                    class="text-danger" data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="coursemodulesid" data-placeholder="Pilih ...">
                                    {{-- <option>Select</option> --}}
                                    @foreach ($allModules as $item)
                                        @if ($item->type == '')
                                            <option value="{{ $item->id }}"
                                                {{ old('coursemodulesid') == $item->id ? 'selected' : '' }}
                                                @if ($item->id == $course_class_module->course_module_id) selected @endif>Day {{ $item->day }}:
                                                {{ $item->name }}</option>
                                        @else
                                            <option value="{{ $item->id }}"
                                                {{ old('coursemodulesid') == $item->id ? 'selected' : '' }}
                                                @if ($item->id == $course_class_module->course_module_id) selected @endif>
                                                [{{ $item->type }}]{{ $item->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Kelas Mata Kuliah (Kelas Paralel) - Mata
                                Kuliah</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="courseclassid" disabled>
                                    <option value="{{ $classDetail->course_class_id }}">Batch {{ $classDetail->batch }} -
                                        {{ $classDetail->course_name }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Deskripsi Modul Kelas Mata
                                Kuliah</label>
                            <div class="col-md-10">
                                <textarea class="form-control" id="content" name="description">{{ old('description', $course_class_module->description) }}</textarea>
                                @if ($errors->has('description'))
                                    @foreach ($errors->get('description') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <!-- Hidden input untuk mengirim nilai 0 jika checkbox tidak dicentang -->
                                <input type="hidden" name="status" value="0">

                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    value="1" name="status"
                                    {{ old('status', isset($course_class_module) ? $course_class_module->status : false) ? 'checked' : '' }}>
                                <label>Aktif</label>
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
