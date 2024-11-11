@extends('layout.main-v3')

@section('title', 'Tambah Modul Child Kelas Kursus')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Tambah Data Baru</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCourseClass') }}">Kelas</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCourseClassModule') }}">Modul Kelas</a></li>
                        <li class="breadcrumb-item active">Tambah Modul Child Baru</li>
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

                    <h4 class="card-title">Tambah Modul Kursus Baru</h4>
                    <p class="card-title-desc">Halaman ini memungkinkan Anda untuk memperbarui informasi data dengan
                        memodifikasi data yang tercantum di bawah ini. Pastikan semua informasi yang Anda masukkan akurat
                        untuk memberikan pengalaman belajar terbaik bagi peserta kursus.</p>

                    <form id="addCourseClassModuleChild" action="{{ route('postAddCourseClassChildModule') }}"
                        method="post" enctype="multipart/form-data">
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
                            <label for="input-tag" class="col-md-2 col-form-label">Modul</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="course_module_id" data-placeholder="Pilih ..."
                                    id="type_selector">
                                    <option value="0">-- Pilih Tipe Kursus --</option>
                                    @foreach ($child_cm_list as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('course_module_id') == $item->id ? 'selected' : '' }}>
                                            [{{ $item->type }}] {{ $item->name }}</option>
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
                            <label for="input-slug" class="col-md-2 col-form-label">Prioritas</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="priority" required
                                    value="{{ old('priority') }}">
                                @if ($errors->has('priority'))
                                    @foreach ($errors->get('priority') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Tanggal Mulai</label>
                            <div class="col-md-10">
                                <input class="form-control" type="date" name="start" id="date"
                                    value="{{ old('start') }}">
                                @if ($errors->has('start'))
                                    @foreach ($errors->get('start') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Tanggal Selesai</label>
                            <div class="col-md-10">
                                <input class="form-control" type="date" name="end" id="date"
                                    value="{{ old('end') }}">
                                @if ($errors->has('end'))
                                    @foreach ($errors->get('end') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Deskripsi</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="description">{{ old('description') }}</textarea>
                            </div>
                        </div>
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    name="status" {{ old('status') ? 'checked' : '' }}>
                                <label class="m-0">Aktif</label>
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary w-md text-center custom-btn-submit"
                                    form="addCourseClassModuleChild">Tambah Modul Anak</button>
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
