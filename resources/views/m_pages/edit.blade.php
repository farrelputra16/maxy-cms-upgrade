@extends('layout.main-v3')

@section('title', 'Edit General Data')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">
                    @if (isset($pageContents) && $pageContents->first()->page_id == 1)
                        Edit Pages - Home
                    @elseif (isset($pageContents) && $pageContents->first()->page_id == 2)
                        Edit Pages - Browse Courses
                    @elseif (isset($pageContents) && $pageContents->first()->page_id == 3)
                        Edit Pages - Blog
                    @else
                        Edit Pages - No Content Available
                    @endif
                </h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a>Settings</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getGeneral') }}">Pages</a></li>
                        <li class="breadcrumb-item active">Edit Pages</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <form action="{{ route('savePageContent') }}" method="POST" enctype="multipart/form-data" id="contentForm">
        @csrf
        @foreach ($pageContents as $index => $section)
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Section {{ $section->section_name }}</h4>
                            <input type="hidden" name="page_id[]" value="{{ $section->page_id }}">
                            <input type="hidden" name="section_name[]" value="{{ $section->section_name }}">
                            <input type="hidden" name="order[]" value="{{ $section->order }}">

                            <div class="mb-3 row">
                                <label for="input-content" class="col-md-2 col-form-label">Display</label>
                                <div class="col-md-10">
                                    <img src="{{ asset('assets/m_pages/' . $section->section_name . '.PNG') }}"
                                        alt="image section" class="img-fluid border border-3 rounded">
                                </div>
                            </div>

                            @if (
                                $section->section_name != 'banner' &&
                                    $section->section_name != 'blog-small' &&
                                    $section->section_name != 'blog-trending')
                                <div class="mb-3 row">
                                    <label for="input-content" class="col-md-2 col-form-label">Text</label>
                                    <div class="col-md-10">
                                        <textarea id="elm1" name="content[]" class="form-control">{{ $section->content }}</textarea>
                                    </div>
                                </div>
                            @endif

                            @if ($section->section_name == 'hero' || $section->section_name == 'banner')
                                    <input type="text" name="oldImage[]" hidden value="{{ $section->image }}">
                                <div class="mb-3 row">
                                    <label for="input-content" class="col-md-2 col-form-label">Image</label>
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

        <!-- Save button outside the loop -->
        <div class="mb-3 d-flex justify-content-end">
            @if (isset($pageContents) && $pageContents->first()->page_id == 3)
                <button type="submit" class="btn btn-primary">Switch Order Blog</button>
            @else
                <button type="submit" class="btn btn-primary">Save & Update Blog</button>
            @endif
        </div>
    </form>
@endsection

@section('script')
@endsection
