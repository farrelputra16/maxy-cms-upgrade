@extends('layout.main-v3')

@section('title', 'Ubah Halaman')

@section('content')
    <!-- Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">
                    @if (isset($pageContents) && $pageContents->first()->page_id == 1)
                        Ubah Halaman - Beranda
                    @elseif (isset($pageContents) && $pageContents->first()->page_id == 2)
                        Ubah Halaman - Jelajahi Kursus
                    @elseif (isset($pageContents) && $pageContents->first()->page_id == 3)
                        Ubah Halaman - Blog
                    @else
                        Ubah Halaman - Konten Tidak Tersedia
                    @endif
                </h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a>Pengaturan</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getGeneral') }}">Halaman</a></li>
                        <li class="breadcrumb-item active">Ubah Halaman</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Judul Halaman -->

    <form action="{{ route('savePageContent') }}" method="POST" enctype="multipart/form-data" id="contentForm">
        @csrf
        @foreach ($pageContents as $index => $section)
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Bagian: {{ $section->section_name }}</h4>
                            <input type="hidden" name="page_id[]" value="{{ $section->page_id }}">
                            <input type="hidden" name="section_name[]" value="{{ $section->section_name }}">
                            <input type="hidden" name="order[]" value="{{ $section->order }}">

                            <div class="mb-3 row">
                                <label for="input-content" class="col-md-2 col-form-label">Pratinjau Tampilan</label>
                                <div class="col-md-10">
                                    <img src="{{ asset('assets/m_pages/' . $section->section_name . '.PNG') }}"
                                        alt="Pratinjau bagian" class="img-fluid border border-3 rounded">
                                </div>
                            </div>

                            @if (
                                $section->section_name != 'banner' &&
                                    $section->section_name != 'blog-small' &&
                                    $section->section_name != 'blog-trending')
                                <div class="mb-3 row">
                                    <label for="input-content" class="col-md-2 col-form-label">Teks</label>
                                    <div class="col-md-10">
                                        <textarea id="elm1" name="content[]" class="form-control">{{ $section->content }}</textarea>
                                    </div>
                                </div>
                            @endif

                            @if ($section->section_name == 'hero' || $section->section_name == 'banner')
                                <input type="text" name="oldImage[]" hidden value="{{ $section->image }}">
                                <div class="mb-3 row">
                                    <label for="input-content" class="col-md-2 col-form-label">Gambar</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="file" name="image[]"
                                            id="image-{{ $index }}">
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- Tombol Simpan -->
        <div class="mb-3 d-flex justify-content-end">
            @if (isset($pageContents) && $pageContents->first()->page_id == 3)
                <button type="submit" class="btn btn-primary">Tukar Urutan Blog</button>
            @elseif (isset($pageContents) && $pageContents->first()->page_id == 2)
                <button type="submit" class="btn btn-primary">Simpan & Perbarui Kursus</button>
            @else
                <button type="submit" class="btn btn-primary">Simpan & Perbarui</button>
            @endif
        </div>
    </form>
@endsection

@section('script')
@endsection
