@extends ('layout.master')

@section ('title', 'Voucher')
@section ('content')
<head>
    <title>Course</title>
    <!-- Include CSS libraries for styling the table -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">

</head>
<div style="padding: 0px 12px 0px 12px;">
    <h2>CCHM Tracking</h2>
    <hr style="margin-bottom: 0px;">

    <div class="row">
        <div class="col-10">
            <div class="form-container" style="padding-top: 3%;">
                <form method="GET" action="{{ route('getnameCCMH') }}" class="flex-container">
                    <div class="navbar-nav" style="margin-right: 10px;">
                        <label for="">Course</label>
                        @if(isset($_GET['course_name']))
                        <select class="ui dropdown" name="course_name">
                            <option value="all" {{ ($_GET['course_name'] == 'all') ? 'selected' : '' }}>all</option>
                            @foreach($course_name as $name)
                                <option value="{{ $name->name }}" {{ ($_GET['course_name'] == $name->name) ? 'selected' : '' }}>{{ $name->name }}</option>
                            @endforeach
                        </select>
                        @else
                        <select class="ui dropdown" name="course_name">
                            <option value="all" selected >all</option>
                            @foreach($course_name as $name)
                                <option value="{{ $name->name }}" >{{ $name->name }}</option>
                            @endforeach
                        </select>
                        @endif
                    </div>

                    <div class="navbar-nav">
                        <label for="">Member</label>
                        @if(isset($_GET['user_name']))
                        <select class="ui dropdown" name="user_name">
                            <option value="all" {{ ($_GET['user_name'] == 'all') ? 'selected' : '' }}>all</option>
                            @foreach($user_name as $userName)
                                <option value="{{ $userName->name }}" {{ ($_GET['user_name'] == $userName->name) ? 'selected' : '' }}>{{ $userName->name }}</option>
                            @endforeach
                        </select>
                        @else
                        <select class="ui dropdown" name="user_name">
                            <option value="all" selected >all</option>
                            @foreach($user_name as $userName)
                                <option value="{{ $userName->name }}">{{ $userName->name }}</option>
                            @endforeach
                        </select>
                        @endif
                    </div>

                    <div class="navbar-nav" style="margin-left: 4%; margin-top: 4%">
                        <button type="submit" class="btn btn-primary">Generate</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-2" style="padding-top: 3.7%">
            <div class="settings-container" style="margin-top: 2%; text-align: right">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="addColumnDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Show/Hide Column
                    </button>
                    <div class="dropdown-menu" aria-labelledby="addColumnDropdown">
                        <label class="dropdown-item">
                            <input type="checkbox" class="column-checkbox" data-column="ID Course Class Member"> ID Course Class Member
                        </label>
                        <label class="dropdown-item">
                            <input type="checkbox" class="column-checkbox" data-column="ID Course Class Module"> ID Course Class Module
                        </label>
                        <label class="dropdown-item">
                            <input type="checkbox" class="column-checkbox" data-column="Description"> Description
                        </label>
                        <label class="dropdown-item">
                            <input type="checkbox" class="column-checkbox" data-column="Paket Soal"> Paket Soal
                        </label>
                        <label class="dropdown-item">
                            <input type="checkbox" class="column-checkbox" data-column="Package Type"> Package Type
                        </label>
                        <label class="dropdown-item">
                            <input type="checkbox" class="column-checkbox" data-column="Created At"> Created At
                        </label>
                        <label class="dropdown-item">
                            <input type="checkbox" class="column-checkbox" data-column="Updated At"> Updated At
                        </label>
                        <div class="dropdown-divider"></div>
                        <label class="dropdown-item">
                            <input type="checkbox" id="checkAllColumns"> Check All
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="table_content">
    <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>History</th>
                    <th>Course type</th>
                    <th>log type</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ccmh as $item)
                <tr>
                    <td>
                        @if($item->status_log == 1)
                            @if($item->course_type == "pretest" || $item->course_type == "postest" || $item->course_type == "unjukketerampilan")
                                {{ $item->user_name }} di kelas {{ $item->course_name }} - Batch {{ $item->batch }} Mendapatkan Paket Soal {{$item->paket_soal}} Mengerjakan Module yaitu {{ $item->course_module_name}} -Day {{$item->day}}
                            @elseif($item->course_type == "assignment")
                                {{ $item->user_name }} di kelas {{ $item->course_name }} - Batch {{ $item->batch }} Mengumpulkan(submit) Tugas Module yaitu {{ $item->course_module_name}} - Day {{$item->day}}
                            @endif
                        @elseif($item->status_log == 2)
                            @if($item->log_type == "profile")
                                {{ $item->user_name }} Membuka Profilenya
                            @else
                                {{ $item->user_name }} di kelas {{ $item->course_name }} - Batch {{ $item->batch }}, Membuka Module yaitu {{ $item->course_module_name}} - Day {{$item->day}}
                            @endif
                        @elseif($item->status_log == 3)
                            {{ $item->user_name }} Mengubah Profilenya
                        @elseif($item->status_log == 4)

                            @if($item->log_type == "profile")
                                {{ $item->user_name }} Mengubah Foto Profilenya
                            @else
                                {{ $item->user_name }} di kelas {{ $item->course_name }} - Batch {{ $item->batch }}, Menghapus(unsubmit) Tugas Modulenya yaitu {{ $item->course_module_name}} - Day {{$item->day}}
                            @endif
                            @else
                            {{''}}
                        @endif
                    </td>
                    <td>
                        @if($item->course_name || $item->batch)
                            {{ $item->course_name }} - Batch {{ $item->batch }}
                        @else
                            {{ '' }}
                        @endif
                    </td>
                    <td>{{ $item->log_type ?? '' }}</td>
                    <td>{{ $item->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<style>
    .flex-container {
        display: flex;
        justify-content: space-between;
    }

    .form-container {
        width: 48%;
    }

    /* CSS untuk kolom-kolom yang disembunyikan */
    .hidden-column {
        display: none;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                lengthChange: true, // Aktifkan opsi perubahan jumlah entri
                lengthMenu: [10, 25, 50, 100], // Menentukan pilihan jumlah entri yang dapat ditampilkan
                buttons: ['copy', 'excel', 'pdf', 'colvis']
            });

        table.buttons().container()
            .appendTo('#example_wrapper .col-md-6:eq(0)');
        });
    </script>
<script>
    $(document).ready(function () {
        $('#checkAllColumns').on('change', function () {
            var checked = $(this).prop('checked');
            $('.column-checkbox').prop('checked', checked);
            toggleColumns();
        });

        $('.column-checkbox').on('change', function () {
            toggleColumns();
        });

        function toggleColumns() {
            $('.column-checkbox').each(function () {
                var column = $(this).data('column');
                if ($(this).prop('checked')) {
                    $('th[data-column="' + column + '"]').removeClass('hidden-column');
                    $('td[data-column="' + column + '"]').removeClass('hidden-column');
                } else {
                    $('th[data-column="' + column + '"]').addClass('hidden-column');
                    $('td[data-column="' + column + '"]').addClass('hidden-column');
                }
            });
        }

        toggleColumns(); // Untuk menyembunyikan kolom secara default pada awalnya
    });
</script>
@endsection
