@extends('jago-digital.layouts.main-v3')

@section('title', 'Testimonial')

@section('content')
    <form action="{{ route('agent.postTestimonial') }}" method="post" enctype="multipart/form-data">
        @csrf
        @foreach ($content_data as $key => $item)
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">{{ $item->name }}</label>
                                @if ($item->type == 'text')
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" value="{{ $item->value }}"
                                            id="input-text-{{ $key }}" name="{{ $item->name }}">
                                    </div>
                                @elseif ($item->type == 'image')
                                    <div class="col-md-10" style="height: 200px">
                                        <input class="form-control" type="file" name="{{ $item->name }}"
                                            id="input-file-{{ $key }}"
                                            onchange="previewImage(event, 'frame_{{ $item->name }}')">
                                        <img id="frame_{{ $item->name }}"
                                            src="{{ asset('jago-digital/agent/' . Auth::user()->id . '/img/' . $item->value) }}"
                                            class="img-fluid h-100" />
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3 row justify-content-end">
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary w-md text-center">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        @endforeach
    </form>


    <!-- end row -->
@endsection

@section('script')
    <script src="{{ asset('jago-digital/assets/libs/jquery.repeater/jquery.repeater.min.js') }}"></script>
    <script src="{{ asset('jago-digital/assets/js/pages/form-repeater.int.js') }}"></script>
    <script>
        // preview image
        function previewImage(event, frameId) {
            const frame = document.getElementById(frameId);
            frame.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection
