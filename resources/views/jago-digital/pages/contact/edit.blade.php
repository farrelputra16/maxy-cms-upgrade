@extends('jago-digital.layouts.main-v3')

@section('title', 'Content')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Textual inputs</h4>
                    <p class="card-title-desc">Here are examples of <code>.form-control</code> applied
                        to
                        each
                        textual HTML5 <code>&lt;input&gt;</code> <code>type</code>.</p>

                    <form action="{{ route('agent.postSetting') }}" method="post" enctype="multipart/form-data">
                        {{-- <form action="#" method="post" enctype="multipart/form-data"> --}}
                        @csrf
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-2 col-form-label">page_name</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" value="{{ $page_name }}"
                                    id="input-text-page-name" name="page_name" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-2 col-form-label">slug</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" value="{{ $slug }}" id="input-text-slug"
                                    name="slug" required>
                                <div id="spinner" class="spinner-border spinner-border-sm pt-1" role="status"
                                    style="display: none;">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <div class="color-red" id="slug-warning" style="display: none; color: red">
                                    slug has been taken! please use another one
                                </div>
                            </div>
                        </div>

                        @foreach ($contact_data as $key => $item)
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">{{ $item->name }}</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" value="{{ $item->value }}"
                                        id="input-text-{{ $key }}" name="{{ $item->name }}" required>
                                </div>
                            </div>
                        @endforeach
                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary w-md text-center">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection

@section('script')
    <script>
        // preview image
        function previewImage(event, frameId) {
            const frame = document.getElementById(frameId);
            frame.src = URL.createObjectURL(event.target.files[0]);
        }

        // slug check
        var debounceTimeout;

        document.getElementById('input-text-slug').addEventListener('input', function() {
            var slug = this.value;

            clearTimeout(debounceTimeout); // Clear previous timeout

            debounceTimeout = setTimeout(function() {
                document.getElementById('spinner').style.display = 'block'; // Show spinner
                document.getElementById('slug-warning').style.display = 'none';
                if (slug.length > 0) {
                    checkSlugAvailability(slug);
                } else {
                    document.getElementById('slug-warning').style.display = 'none';
                    document.getElementById('spinner').style.display = 'none';
                }
            }, 500); // Set delay to 500ms
        });

        function checkSlugAvailability(slug) {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/agent/check-slug?slug=' + encodeURIComponent(slug), true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.exists) {
                        document.getElementById('slug-warning').style.display = 'block';
                    } else {
                        document.getElementById('slug-warning').style.display = 'none';
                    }
                    document.getElementById('spinner').style.display = 'none'; // Hide spinner
                }
            };
            xhr.send();
        }
    </script>
@endsection
