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

                    <form action="{{ route('agent.postContent') }}" method="post" enctype="multipart/form-data">
                        {{-- <form action="#" method="post" enctype="multipart/form-data"> --}}
                        @csrf

                        @foreach ($content_data as $key => $item)
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
    </script>
@endsection
