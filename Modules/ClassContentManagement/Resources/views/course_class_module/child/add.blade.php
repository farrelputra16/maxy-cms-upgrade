@extends('layout.master')

@section('title', 'Add Child Module')

@section('styles')
    <style>
        .hidden-inputs {
            display: none;
        }
    </style>
@endsection

@section('content')
    <div style="padding: 0px 30px 0px 30px;">
        <form class="ui form" action="{{ route('postAddCourseClassChildModule', ['courseParentId' => $courseParent->id]) }}"
            method="post">
            @csrf
            <div class="field">
                <div class="field">
                    <label for="">Parent Module</label>
                    <input type="text" value="{{ $courseParent->courseModule->name }}" readonly>
                </div>
                <div class="three fields">
                    <div class="field">
                        <label for="">start date</label>
                        <input type="date" name="start_date" readonly
                            value="{{ date('Y-m-d', strtotime($courseParent->start_date)) }}">
                    </div>
                    <div class="field">
                        <label for="">end date</label>
                        <input type="date" name="end_date" readonly
                            value="{{ date('Y-m-d', strtotime($courseParent->end_date)) }}">
                    </div>
                    <div class="field">
                        <label for="">Course Module</label>
                        <select name="coursemoduleid" class="ui dropdown" id="selectModule">
                            <option value="" selected>Pilih Modul</option>
                            @foreach ($allModules as $item)
                                @if ($item->course_module_parent_id)
                                    <option value="{{ $item->id }}">[{{ $item->type }}]{{ $item->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        @if ($errors->has('coursemoduleid'))
                            @foreach ($errors->get('coursemoduleid') as $error)
                                <span style="color: red;">{{ $error }}</span>
                            @endforeach
                        @endif
                        <a href="#" id="toggleChildInputs">Tambah Module</a>
                    </div>
                </div>
                <div class="three fields hidden-inputs d-none">
                    <div class="field">
                        <label for="">Child Module Name</label>
                        <input type="text" name="name" id="moduleName">
                    </div>
                    <div class="field">
                        <label for="">Child Priority</label>
                        <input type="number" name="priority" id="modulePriority">
                    </div>
                    <div class="field">
                        <label for="">Child Level</label>
                        <input type="number" name="level" id="moduleLevel">
                    </div>
                </div>
                <div class="field">
                    <label>Child Module Content</label>
                    <textarea name="content" id="content" placeholder="Enter Content"></textarea>
                </div>
                <div class="field">
                    <label>Child Module Description</label>
                    <textarea name="description" id="description"></textarea>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" name="status">
                        <label>Aktif</label>
                    </div>
                </div>
            </div>
            <button class="right floated ui button primary">Tambah Child Module</button>
        </form>
        <a href="{{ url()->previous() }}"><button class="right floated ui red button">Batal</button></a>
    </div>

    <script>
        CKEDITOR.replace('content');
        CKEDITOR.replace('description');
    </script>

    <script>
        $(document).ready(function() {
            $("#selectModule").change(function() {
                var selectedModule = $(this).children("option:selected").val();

                if (selectedModule === "") {
                    $('#moduleName').val('');
                    $('#modulePriority').val('');
                    $('#moduleLevel').val('');
                    return;
                }

                $.ajax({
                    url: "{{ route('getAddCourseClassChildModule') }}",
                    type: "GET",
                    data: {
                        id: selectedModule
                    },
                    success: function(data) {
                        console.log(data);
                        $('#moduleName').val(data.name);
                        $('#modulePriority').val(data.priority);
                        $('#moduleLevel').val(data.level);
                    }
                });
            });

            $('#toggleChildInputs').click(function(e) {
                e.preventDefault(); // Mencegah default aksi link

                // Toggle tampilan input
                $('.hidden-inputs').toggle();
                $('.hidden-inputs').removeClass('d-none');

                // Ganti teks link berdasarkan keadaan tampilan
                if ($('.hidden-inputs').is(':visible')) {
                    $(this).text('Sembunyikan Module');
                } else {
                    $(this).text('Tambah Module');
                }
            });
        });
    </script>
@endsection
