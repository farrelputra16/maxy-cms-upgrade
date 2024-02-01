@extends ('layout.master')

@section ('title', 'Voucher')
@section ('content')
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
                            <input type="checkbox" class="column-checkbox" data-column="ID Course Module"> ID Course Module
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
        <table class="ui tablet unstackable table">
            <thead>
                <tr>
                    <th>Member</th>
                    <th>Day</th>
                    <th>Course - Batch</th>
                    <th data-column="ID Course Class Member" class="hidden-column">ID Course Class Member</th>
                    <th data-column="ID Course Module" class="hidden-column">ID Course Module</th>
                    <th data-column="Description" class="hidden-column">Description</th>
                    <th data-column="Paket Soal" class="hidden-column">Paket Soal</th>
                    <th data-column="Package Type" class="hidden-column">Package Type</th>
                    <th data-column="Created At" class="hidden-column">Created At</th>
                    <th>Course Module</th>
                    <th>Type</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ccmh as $item)
                <tr>
                    <td>{{ $item->user_name }}</td>
                    <td>{{ $item->day }}</td>
                    <td>{{ $item->course_name }} - Batch {{$item->batch }}</td>
                    <td data-column="ID Course Class Member" class="hidden-column">{{ $item->course_class_member_id }}</td>
                    <td data-column="ID Course Module" class="hidden-column">{{ $item->course_module_id }}</td>
                    <td data-column="Description" class="hidden-column">{{ $item->description }}</td>
                    <td data-column="Paket Soal" class="hidden-column">{{ $item->paket_soal }}</td>
                    <td data-column="Package Type" class="hidden-column">{{ $item->package_type }}</td>
                    <td data-column="Created At" class="hidden-column">{{ $item->created_at }}</td>
                    <td>{{ $item->course_module_name }}</td>
                    <td>{{ $item->course_type }}</td>
                    <td>{{ $item->updated_at }}</td>
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
