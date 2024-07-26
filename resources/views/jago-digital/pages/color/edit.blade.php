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

                    <form action="{{ route('agent.postColor') }}" method="post" enctype="multipart/form-data">
                        {{-- <form action="#" method="post" enctype="multipart/form-data"> --}}
                        @csrf

                        @foreach ($color_data as $key => $item)
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">{{ $item->name }}</label>
                                <div class="col-md-10">
                                    <input type="text" name="{{ $item->name }}" class="form-control color-picker"
                                        id="{{ $item->name }}" value="{{ $item->value }}">
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
    </script>
@endsection
