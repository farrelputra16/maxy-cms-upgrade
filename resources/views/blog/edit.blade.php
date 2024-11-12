@extends('layout.main-v3')

@section('title', 'Edit Blog')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Edit Data</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getBlog') }}">Blog</a></li>
                        <li class="breadcrumb-item active">Edit Blog: {{ $data->title }}</li>
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

                    <h4 class="card-title">Edit Data Blog</h4>
                    <p class="card-title-desc">Halaman ini digunakan untuk memperbarui informasi blog.</p>

                    <form action="{{ route('postEditBlog', ['id' => request()->query('id')]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="img_keep" value="{{ $data->cover_img }}" hidden>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Judul</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="title"
                                    value="{{ old('title', $data->title) }}" id="input-title">
                                @if ($errors->has('title'))
                                    @foreach ($errors->get('title') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-slug" class="col-md-2 col-form-label">Slug</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="slug"
                                    value="{{ old('slug', $data->slug) }}" id="input-slug" readonly>
                                @if ($errors->has('slug'))
                                    @foreach ($errors->get('slug') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Tags Saat Ini</label>
                            <div class="col-md-10">
                                <select class="form-control select2 select2-multiple" multiple="multiple" name="tag_old[]"
                                    data-placeholder="Choose ...">
                                    {{-- <option>Select</option> --}}
                                    @foreach ($currentTags as $key => $value)
                                        <option value="{{ $key }}" selected>{{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Tags Tersedia</label>
                            <div class="col-md-10">
                                <select class="form-control select2 select2-multiple" multiple="multiple" name="tag[]"
                                    data-placeholder="Choose ...">
                                    @foreach ($blogTagList as $item)
                                        <option value="{{ $item->id }}"
                                            @if (in_array($item->id, old('tag', [])) || $item->selected) selected @endif>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-file" class="col-md-2 col-form-label">Gambar Cover</label>
                            <div class="col-md-10" style="height: 200px">
                                <input class="form-control" type="file" name="file_image" id="input-file">
                                <img id="frame"
                                    src="{{ asset('uploads/blog/' . $data->slug . '/' . $data->cover_img) }}"
                                    class="img-fluid h-100" />
                                @if ($errors->has('file_image'))
                                    @foreach ($errors->get('file_image') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Konten</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="content">{{ old('content', $data->content) }}</textarea>
                                @if ($errors->has('content'))
                                    @foreach ($errors->get('content') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-description" class="col-md-2 col-form-label">Deskripsi
                                <small>(Admin)</small></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="description"
                                    value="{{ old('description', strip_tags($data->description)) }}"
                                    id="input-description">
                                @if ($errors->has('description'))
                                    @foreach ($errors->get('description') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Highlight</label>
                            <div class="col-md-10" style="display: flex; align-items: center;">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    value="1" name="status_highlight"
                                    {{ old('status_highlight', $data->status_highlight) == 1 ? 'checked' : '' }}
                                    style="left: 0;">
                            </div>
                        </div>
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <!-- Hidden input untuk mengirim nilai 0 jika checkbox tidak dicentang -->
                                <input type="hidden" name="status" value="0">

                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    value="1" name="status"
                                    {{ old('status', isset($data) ? $data->status : false) ? 'checked' : '' }}>
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary w-md text-center">Submit</button>
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
        // autofill slug
        document.getElementById('input-title').addEventListener('input', function() {
            var name = this.value;
            var slug = name.toLowerCase().trim().replace(/[^a-z0-9\s-]/g, '').replace(/\s+/g, '-');
            document.getElementById('input-slug').value = slug;
        });

        // preview image
        document.getElementById('input-file').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('frame').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
