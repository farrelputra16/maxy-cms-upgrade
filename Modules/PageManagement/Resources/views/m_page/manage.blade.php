@extends('layout.main-v3')

@section('title', 'Pengaturan Landing Page')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Pengaturan Data</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Pengaturan Landing Page @if (request()->query('id'))
                                : {{ $data->title }}
                            @endif
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

                    <h4 class="card-title">Pengaturan Landing Page</h4>
                    <p class="card-title-desc">
                        Halaman ini digunakan untuk mengatur konfigurasi Landing Page.
                    </p>

                    <form
                        action="{{ request()->query('id') ? route('pageManagement.page.postEdit', ['id' => request()->query('id')]) : route('pageManagement.page.postAdd') }}"
                        method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">
                                Nama Halaman <span class="text-danger" data-bs-toggle="tooltip" title="Wajib diisi">*</span>
                            </label>
                            <div class="col-md-10">
                                <input type="text" id="input-name" name="name" class="form-control"
                                    @if (request()->query('id')) value="{{ old('name', $data->name) }}" @endif>

                                @if ($errors->has('name'))
                                    @foreach ($errors->get('name') as $error)
                                        <span class="text-danger">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-slug" class="col-md-2 col-form-label">
                                URL <span class="text-danger" data-bs-toggle="tooltip" title="Wajib diisi">*</span>
                            </label>
                            <div class="col-md-10">
                                <input type="text" id="input-url" name="url" class="form-control"
                                    @if (request()->query('id')) value="{{ old('url', $data->url) }}" @endif>

                                @if ($errors->has('url'))
                                    @foreach ($errors->get('url') as $error)
                                        <span class="text-danger">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">
                                Title <span class="text-danger" data-bs-toggle="tooltip" title="Wajib diisi">*</span>
                            </label>
                            <div class="col-md-10">
                                <input type="text" id="input-title" name="title" class="form-control"
                                    @if (request()->query('id')) value="{{ old('title', $data->title) }}" @endif>

                                @if ($errors->has('title'))
                                    @foreach ($errors->get('title') as $error)
                                        <span class="text-danger">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-favicon" class="col-md-2 col-form-label">
                                Favicon
                            </label>
                            <div class="col-md-10">
                                <input type="text" id="input-favicon_url" name="favicon_url" class="form-control"
                                    @if (request()->query('id')) value="{{ old('favicon_url', $data->favicon_url) }}" @endif>

                                @if ($errors->has('favicon_url'))
                                    @foreach ($errors->get('favicon_url') as $error)
                                        <span class="text-danger">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-gtm_header" class="col-md-2 col-form-label">
                                Google Tag Manager (Header)
                            </label>
                            <div class="col-md-10">

                                <textarea id="textarea-gtm_header" name="gtm_header" class="form-control" rows="10">{{ request()->query('id') ? old('gtm_header', $data->gtm_header) : '' }}</textarea>

                                @if ($errors->has('gtm_header'))
                                    @foreach ($errors->get('gtm_header') as $error)
                                        <span class="text-danger">{{ $error }}</span>
                                    @endforeach
                                @endif

                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-gtm_body" class="col-md-2 col-form-label">
                                Google Tag Manager (Body)
                            </label>

                            <div class="col-md-10">
                                <textarea id="textarea-gtm_body" name="gtm_body" class="form-control" rows="6">{{ request()->query('id') ? old('gtm_body', $data->gtm_body) : '' }}</textarea>

                                @if ($errors->has('gtm_body'))
                                    @foreach ($errors->get('gtm_body') as $error)
                                        <span class="text-danger">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-ga_id" class="col-md-2 col-form-label">
                                Google Analytics ID
                            </label>
                            <div class="col-md-10">
                                <input type="text" id="input-ga_id" name="ga_id" class="form-control"
                                    value="{{ request()->query('id') ? old('ga_id', $data->ga_id) : '' }}">

                                @if ($errors->has('ga_id'))
                                    @foreach ($errors->get('ga_id') as $error)
                                        <span class="text-danger">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-custom_css" class="col-md-2 col-form-label">
                                Custom CSS
                            </label>

                            <div class="col-md-10">
                                <textarea name="custom_css" id="textarea-custom_css" rows="10" class="form-control">{{ request()->query('id') ? old('custom_css', $data->custom_css) : '' }}</textarea>

                                @if ($errors->has('custom_css'))
                                    @foreach ($errors->get('custom_css') as $error)
                                        <span class="text-danger">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-header_code" class="col-md-2 col-form-label">
                                Additional Header Code
                            </label>

                            <div class="col-md-10">
                                <textarea name="header_code" id="textarea-header_code" rows="10" class="form-control">{{ request()->query('id') ? old('header_code', $data->header_code) : '' }}</textarea>

                                @if ($errors->has('header_code'))
                                    @foreach ($errors->get('header_code') as $error)
                                        <span class="text-danger">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-footer_code" class="col-md-2 col-form-label">
                                Additional Footer Code
                            </label>

                            <div class="col-md-10">
                                <textarea name="footer_code" id="textarea-footer_code" rows="10" class="form-control">{{ request()->query('id') ? old('footer_code', $data->footer_code) : '' }}</textarea>

                                @if ($errors->has('footer_code'))
                                    @foreach ($errors->get('footer_code') as $error)
                                        <span class="text-danger">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-additional_script" class="col-md-2 col-form-label">
                                Additional Script
                            </label>

                            <div class="col-md-10">
                                <textarea name="additional_script" id="textarea-additional_script" rows="10" class="form-control">{{ request()->query('id') ? old('additional_script', $data->additional_script) : '' }}</textarea>

                                @if ($errors->has('additional_script'))
                                    @foreach ($errors->get('additional_script') as $error)
                                        <span class="text-danger">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-social_image_url" class="col-md-2 col-form-label">
                                Social Image URL
                            </label>
                            <div class="col-md-10">
                                <input type="text" id="input-social_image_url" name="social_image_url"
                                    class="form-control"
                                    @if (request()->query('id')) value="{{ old('social_image_url', $data->social_image_url) }}" @endif>

                                @if ($errors->has('social_image_url'))
                                    @foreach ($errors->get('social_image_url') as $error)
                                        <span class="text-danger">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-description" class="col-md-2 col-form-label">
                                Admin Notes
                            </label>
                            <div class="col-md-10">
                                <input type="text" id="input-description" name="description" class="form-control"
                                    @if (request()->query('id')) value="{{ old('description', $data->description) }}" @endif>

                                @if ($errors->has('description'))
                                    @foreach ($errors->get('description') as $error)
                                        <span class="text-danger">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    value="1" name="status"
                                    {{ old('status', isset($data) ? $data->status : false) ? 'checked' : '' }}>
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary w-md text-center">{{ request()->query('id') ? 'Simpan Perubahan' : 'Tambah Halaman' }}</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
