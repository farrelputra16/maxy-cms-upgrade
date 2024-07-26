@extends('jago-digital.layouts.main-v3')

@section('title', 'Testimonial')

@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ route('agent.postTestimonial') }}" method="post" enctype="multipart/form-data">
                {{-- <form action="#" method="post" enctype="multipart/form-data"> --}}
                @csrf
                @foreach ($testimonial_data as $key => $item)
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Testimonial {{ $key + 1 }}</h4>
                            <p class="card-title-desc">Here are examples of <code>.form-control</code> applied
                                to
                                each
                                textual HTML5 <code>&lt;input&gt;</code> <code>type</code>.</p>

                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">Name</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" value="{{ $item->name }}"
                                        id="input-text-name{{ $key }}" name="testi{{ $key }}-name"
                                        required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">Image</label>
                                <div class="col-md-10" style="height: 200px">
                                    <input class="form-control" type="file" name="testi{{ $key }}-image"
                                        id="input-file-image{{ $key }}"
                                        onchange="previewImage(event, 'frame_testi{{ $key }}')">
                                    <img id="frame_testi{{ $key }}"
                                        src="{{ asset('jago-digital/agent/' . Auth::user()->id . '/img/' . $item->image) }}"
                                        class="img-fluid h-100" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">City</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" value="{{ $item->city }}"
                                        id="input-text-city{{ $key }}" name="testi{{ $key }}-city"
                                        required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">Rating</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="number" value="{{ $item->rating }}"
                                        id="input-text-rating{{ $key }}" name="testi{{ $key }}-rating"
                                        required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">Content</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" value="{{ $item->content }}"
                                        id="input-text-content{{ $key }}" name="testi{{ $key }}-content"
                                        required>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="mb-3 row justify-content-end">
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary w-md text-center">Submit</button>
                    </div>
                </div>
            </form>
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
    </script>
@endsection
