@extends ('layout.master')

@section('title', 'History')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCMH Tracking</title>
    <!-- Include CSS libraries for styling the table -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">

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

        .form-container {
            width: 48%;
        }

        /* CSS untuk kolom-kolom yang disembunyikan */
        .hidden-column {
            display: none;
        }

        .select2-container .select2-selection--single {
            box-sizing: border-box;
            cursor: pointer;
            display: block;
            height: 35px;
            /* Ubah nilai height sesuai kebutuhan Anda */
            user-select: none;
            -webkit-user-select: none;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #444;
            line-height: 33px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 33px;
            position: absolute;
            top: 1px;
            right: 1px;
            width: 1rem;
        }

        .conTitle {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 2rem;
        }

        .h2 {
            font-weight: bold;
            color: #232E66;
            padding-left: .1rem;
            font-size: 22px;
            margin-bottom: -0.5rem;
            margin-left: 1rem;
        }

        .logout {
            margin-right: 1rem;
            margin-bottom: .5rem;
            background-color: #FBB041;
            color: #FFF;
            width: 80px;
            height: 35px;
            border-radius: 10px;
            border: none;
            box-shadow: none;
            font-weight: bold;
        }

        .breadcrumb {
            border-top: 2px solid black;
            display: inline-block;
            width: 1010px;
            margin-left: 1rem;
            margin-bottom: 1rem;
        }

        .breadcrumb .sectionDashboard,
        .breadcrumb .divider,
        .breadcrumb .sectionMaster,
        .breadcrumb .sectionCourse {
            display: inline;
            font-size: 11px;
            font-weight: bold;
        }

        .breadcrumb .divider {
            margin: 0 5px;
        }

        .btnSubmit {
            background-color: #4056A1;
            color: #FFF;
            width: 80px;
            height: 30px;
            border-radius: 8px;
            border: none;
            box-shadow: none;
            font-weight: bold;
            font-size: 13px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
            margin-left: .5rem;
            margin-bottom: 3rem;
            padding-top: .3rem;
        }

        .conBtn {
            display: flex;
            justify-content: flex-end;
            margin-right: 1rem;
        }

        .conBtn button {
            margin-right: 1rem;
            margin-left: .5rem;
        }

        .conShow {
            display: flex;
            align-items: center;
            gap: .5rem;
        }

        .conPagi {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 10px;
        }

        .buttons-prev,
        .buttons-next {
            background-color: #4056A1;
            color: #FFF;
            border: none;
            border-radius: 8px;
            padding: 6px 12px;
            font-size: 12px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .buttons-prev:hover,
        .buttons-next:hover {
            background-color: #31446B;
        }

        .buttons-prev:active,
        .buttons-next:active {
            background-color: #2C3F63;
        }

        th,
        td {
            padding: 12px;
            /* Adjust this value as needed for the desired spacing */
            text-align: center;
            /* Optional: Center-align text */
        }

        th {
            width: 1%;
            font-weight: bold;
            color: #232E66;
            font-size: 13px;
        }

        .buttons-colvis {
            background-color: #4056A1;
            color: #FFF;
            width: 135px;
            height: 30px;
            border-radius: 8px;
            border: none;
            box-shadow: none;
            font-weight: bold;
            font-size: 12px;
            margin-left: .5rem;
            margin-bottom: .5rem;
            padding: 6px 12px;
            transition: background-color 0.3s ease;
        }

        .buttons-colvis:hover {
            background-color: #31446B;
        }

        .buttons-colvis:active {
            background-color: #2C3F63;
        }

        .buttons-copy,
        .buttons-excel,
        .buttons-pdf {
            background-color: #4056A1;
            color: #FFF;
            width: 80px;
            height: 30px;
            border-radius: 8px;
            border: none;
            box-shadow: none;
            font-size: 12px;
            font-weight: bold;
            margin-left: 1rem;
            margin-bottom: .5rem;
            padding: 6px 12px;
            transition: background-color 0.3s ease;
        }

        .buttons-copy:hover,
        .buttons-excel:hover,
        .buttons-pdf:hover {
            background-color: #31446B;
        }

        .buttons-copy:active,
        .buttons-excel:active,
        .buttons-pdf:active {
            background-color: #2C3F63;
        }

        .buttons-container {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .tableTrack {
            border: 1px solid #000000;
            border-radius: 8px;
            overflow: hidden;
        }

        .btnGene {
            background-color: #4056A1;
            color: #FFF !important;
            width: 300px;
            height: 30px;
            border-radius: 8px;
            border: none;
            box-shadow: none;
            font-weight: bold;
            font-size: 12px;
            text-align: center;
            display: inline-block;
            cursor: pointer;
            margin-right: 0.5rem;
        }

        .dataTables_wrapper .dataTables_filter {
            margin-top: 20px;
        }

        .form-label {
            margin-left: 1rem;
        }

        .ddShow {
            background-color: #4056A1;
            color: #FFF !important;
            width: 100px;
            height: 30px;
            border-radius: 8px;
            border: none;
            box-shadow: none;
            font-weight: bold;
            font-size: 12px;
            text-align: center;
            display: inline-block;
            cursor: pointer;
        }

        .ddMenu {
            display: none;
            /* Sembunyikan dropdown secara default */
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .ddMenu a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .ddMenu a:hover {
            background-color: #f1f1f1;
        }

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
</head>

<body>
    <div class="container conTitle">
        <h2 class="h2">CCMH Tracking</h2>
        <button class="logout">Logout</button>
    </div>

    <div class="breadcrumb pt-2 pb-4">
        <a class="sectionDashboard" href="{{ url('/') }}">Dashboard</a>
        <span class="divider">></span>
        <div class="sectionMaster">Class</div>
        <span class="divider">></span>
        <div class="sectionCourse">Student Tracker</div>
        <span class="divider">></span>
        <div class="sectionCourse">CCMH Tracking</div>
    </div>

    <div class="container">
        <form class="ui form" action="{{ route('getnameCCMH') }}" method="post">
            <div class="field">
                <div class="two fields">
                    <div class="field">
                        <label for="">Course</label>
                        <select class="ddCourse ui dropdown" name="course_name">
                            <option value="all" {{ request()->get('course_name') == 'all' ? 'selected' : '' }}>all</option>
                            @foreach ($course_name as $name)
                            <option value="{{ $name->name }}" {{ request()->get('course_name') == $name->name ? 'selected' : '' }}>{{ $name->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="field">
                        <label for="">Member</label>
                        <select class="ddMember ui dropdown" name="user_name">
                            <option value="all" {{ request()->get('user_name') == 'all' ? 'selected' : '' }}>all</option>
                            @foreach ($user_name as $userName)
                            <option value="{{ $userName }}" {{ request()->get('user_name') == $userName ? 'selected' : '' }}>{{ $userName }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <button class="btnGene">Generate</button>
                    </div>
                    <div class="field">
                        <div class="divShow">
                            <button class="ddShow dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Show/Hide
                            </button>
                            <div class="ddMenu" aria-labelledby="addColumnDropdown">
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
        </form>
    </div>

    <div class="container">
        <div class="row">
            <table id="table" class="tableTrack table-striped" style="width:100%">
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
                            @if ($item->status_log == 1)
                            @if (in_array($item->course_type, ['pretest', 'postest', 'unjukketerampilan']))
                            {{ $item->user_name }} di kelas {{ $item->course_name }} - Batch {{ $item->batch }} Mendapatkan Paket Soal {{ $item->paket_soal }} Mengerjakan Module yaitu {{ $item->course_module_name }} - Day {{ $item->day }}
                            @elseif($item->course_type == 'assignment')
                            {{ $item->user_name }} di kelas {{ $item->course_name }} - Batch {{ $item->batch }} Mengumpulkan(submit) Tugas Module yaitu {{ $item->course_module_name }} - Day {{ $item->day }}
                            @endif
                            @elseif($item->status_log == 2)
                            @if ($item->log_type == 'profile')
                            {{ $item->user_name }} Membuka Profilenya
                            @else
                            {{ $item->user_name }} di kelas {{ $item->course_name }} - Batch {{ $item->batch }}, Membuka Module yaitu {{ $item->course_module_name }} - Day {{ $item->day }}
                            @endif
                            @elseif($item->status_log == 3)
                            {{ $item->user_name }} Mengubah Profilenya
                            @elseif($item->status_log == 4)
                            @if ($item->log_type == 'profile')
                            {{ $item->user_name }} Mengubah Foto Profilenya
                            @else
                            {{ $item->user_name }} di kelas {{ $item->course_name }} - Batch {{ $item->batch }}, Menghapus(unsubmit) Tugas Modulenya yaitu {{ $item->course_module_name }} - Day {{ $item->day }}
                            @endif
                            @else
                            {{ '' }}
                            @endif
                        </td>
                        <td>{{ $item->course_name ? $item->course_name . ' - Batch ' . $item->batch : '' }}</td>
                        <td>{{ $item->log_type ?? '' }}</td>
                        <td>{{ $item->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>History</th>
                        <th>Course type</th>
                        <th>log type</th>
                        <th>Created At</th>
                    </tr>
                </tfoot>
            </table>

            <!-- Info and Pagination container -->
            <div class="buttons-container">
                <div class="custom-info-text"></div>
                <div class="custom-pagination-container"></div>
            </div>
        </div>
    </div>

    <!-- Include the required scripts -->
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
            let table = $('#table').DataTable({
                scrollX: true,
                lengthChange: true,
                lengthMenu: [10, 25, 50, 100],
                buttons: [
                    'colvis',
                    {
                        extend: 'copy',
                        className: 'buttons-copy',
                    },
                    {
                        extend: 'excel',
                        className: 'buttons-excel',
                    },
                    {
                        extend: 'pdf',
                        className: 'buttons-pdf',
                    },
                ],
                searching: true,
                columnDefs: [{
                    "visible": false,
                    "targets": [0]
                }],
                initComplete: function() {
                    this.api()
                        .columns()
                        .every(function() {
                            var column = this;
                            var title = column.footer().textContent;

                            // Create input element and add event listener
                            $('<input class="form-control" type="text" placeholder="Search ' + title + '" />')
                                .appendTo($(column.footer()).empty())
                                .on('keyup change clear', function() {
                                    if (column.search() !== this.value) {
                                        column.search(this.value).draw();
                                    }
                                });
                        });
                }
            });

            // Create container for buttons and pagination
            let buttonPaginationContainer = $('<div>').addClass('button-pagination-container');
            buttonPaginationContainer.css({
                display: 'block',
                flexDirection: 'row',
                alignItems: 'flex-start',
                // marginBottom: '10px'
            });

            // Insert the buttons into the new container
            table.buttons().container().appendTo(buttonPaginationContainer);

            // Insert the show entries and info into the new container with custom classes
            // $('.dataTables_length').addClass('custom-length-container').appendTo(buttonPaginationContainer);
            // $('.dataTables_info').addClass('custom-info-text').appendTo(buttonPaginationContainer);
            // $('.dataTables_paginate').addClass('custom-pagination-container').appendTo(buttonPaginationContainer);

            // Insert the new container before the table
            buttonPaginationContainer.insertBefore('#table');

            // Add individual column search inputs and titles
            // $('#table thead th').each(function() {
            //     let title = $(this).text();
            //     $(this).html('<div class="text-center">' + title +
            //         '</div><div class="mt-2"><input type="text" placeholder="Search ' + title +
            //         '" /></div>');
            // });

            // Apply individual column search
            // Apply the search for individual columns
            table.columns().every(function() {
                let that = this;

                $('input', this.header()).on('keyup change clear', function() {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });

            table.buttons().container().appendTo('#table_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.ddShow').click(function(e) {
                e.stopPropagation(); // Untuk mencegah penyebaran event klik ke elemen lain
                $(this).next('.ddMenu').toggle(); // Toggle tampilan dropdown
            });

            $(document).click(function(e) {
                if (!$(e.target).closest('.ddShow').length) {
                    $('.ddMenu').hide();
                }
            });

            function toggleColumns() {
                $('.column-checkbox').each(function() {
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

</body>

</html>
@endsection