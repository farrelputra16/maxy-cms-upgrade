@extends('layout.master')

@section('title', 'Survey Result')

@section('content')
<!DOCTYPE html>
<html>

<head>
    <title>Survey Result</title>
    <!-- Include CSS libraries for styling the table -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">

    <style>
        body {
            background-color: #DFE3F1;
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

        .btnlogout {
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
            width: 97%;
            ;
            margin-left: 1rem;
            margin-bottom: 1rem;
        }

        .breadcrumb .sectionDashboard,
        .breadcrumb .divider,
        .breadcrumb .sectionMaster,
        .breadcrumb .sectionProposal {
            /* padding-top: 1rem; */
            /* margin-top: 1rem; */
            display: inline;
            font-size: 11px;
            font-weight: bold;
        }

        .breadcrumb .divider {
            margin: 0 5px;
        }

        .btnAdd {
            color: #1533B5;
            width: 140px;
            height: 30px;
            font-weight: bold;
            font-size: 13px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
            padding-top: .3rem;
            margin-left: 1rem;
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

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        th {
            font-weight: bold;
            color: #232E66;
            font-size: 13px;
            /* padding-left: .2rem; */
            /* margin-bottom: -0.5rem; */
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
            margin-top: .5rem;
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
            margin-top: .5rem;
            margin-left: 45rem;
            margin-bottom: .5rem;
            /* margin-right: .5rem; */
            padding: 6px 12px;
            transition: background-color 0.3 ease;
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
            flex-direction: column;
            align-items: flex-end;
            margin-bottom: 10px;
        }

        .dataTables_length {
            margin-bottom: 10px;
        }

        .buttons-container .dt-buttons {
            margin-bottom: 10px;
        }

        .tableSurvey Result {
            overflow: hidden;
        }

        .custom-striped tbody tr:nth-of-type(odd) {
            background-color: #E3E3E3;
        }

        .custom-striped tbody tr:nth-of-type(even) {
            background-color: #FFF;
        }

        .custom-striped tbody tr:nth-of-type(odd) td,
        .custom-striped tbody tr:nth-of-type(even) td {
            color: #000000;
        }

        .btnAktif {
            background-color: #46E44C;
            width: 5rem;
            height: 1rem;
            color: #FFF !important;
            font-size: 12px;
            text-align: center;
            display: inline-block;
            padding-top: 4px;
            padding-bottom: 10px;
            border-radius: .4rem;
        }

        .btnNon {
            background-color: #F13C20;
            width: 5rem;
            height: 1rem;
            color: #FFF !important;
            font-size: 12px;
            text-align: center;
            display: inline-block;
            padding-top: 4px;
            padding-bottom: 10px;
            border-radius: .4rem;
        }

        .btnEdit {
            background-color: #4056A1;
            width: 3rem;
            height: 1rem;
            color: #FFF !important;
            font-size: 12px;
            text-align: center;
            display: inline-block;
            padding-top: 4px;
            padding-bottom: 10px;
            border-radius: .4rem;
            margin-right: .5rem;
        }

        .btnModul {
            background-color: #4056A1;
            width: 6rem;
            height: 1rem;
            color: #FFF !important;
            font-size: 12px;
            text-align: center;
            display: inline-block;
            padding-top: 4px;
            padding-bottom: 10px;
            border-radius: .4rem;
        }

        .custom-length-container {
            margin-bottom: 10px;
            margin-left: .5rem;
            font-size: 12px;
        }

        .custom-pagination-container {
            margin-left: 10rem;
        }

        .custom-info-text {
            margin-bottom: 10px;
            margin-left: .5rem;
            font-size: 12px;
        }

        .dataTables_paginate {
            font-size: 12px;
        }

        .buttons-container .dt-buttons {
            margin-bottom: 10px;
            /* margin-right: 10rem; */
        }

        .card {
            margin-right: 1rem;
            margin-bottom: 2rem;
            border-radius: 15px;
        }
    </style>
</head>

<body>
    <div class="container conTitle">
        <h2 class="h2">Survey Result</h2>
        <form class="form-inline my-2 my-lg-0 me-3" method="post" action="{{ route('logout') }}">
            @csrf
            <button class="btnlogout" type="submit">Logout</button>
        </form>
    </div>

    <div class="breadcrumb pt-2 pb-4">
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <a class="sectionDashboard" href="{{ url('/') }}">Dashboard</a>
                    <span class="divider">></span>
                    <div class="sectionMaster">Master</div>
                    <span class="divider">></span>
                    <div class="sectionProposal">Survey</div>
                    <span class="divider">></span>
                    <div class="sectionProposal">Survey Result</div>
                </div>
                <div class="col-2">
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <table id="table" class="tableSurvey Result table-striped custom-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Survey Name</th>
                                <th>Respondent Name</th>
                                <th>Content</th>
                                <th>Score</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($SurveyResult as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->MSurvey->name }}</td>
                                <td>{{ $item->User->name }}</td>
                                @if(strlen($item->content) > 75)
                                    <td>{{ substr($item->content, 0, 75) }}...</td>
                                @else
                                    <td>{{ $item->content }}</td>
                                @endif
                                <td>{{ $item->score }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('getSurveyResultDetail', ['id' => $item->id, 'access' => 'survey_result_read']) }}" class="btnEdit">Detail</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Survey Name</th>
                                <th>Respondent Name</th>
                                <th>Content</th>
                                <th>Score</th>
                                <th>Created At</th>
                                <th>Action</th>
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
        </div>
    </div>
</body>

</html>

<!-- Include JS libraries for DataTable initialization -->
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
            lengthChange: false,
            // lengthMenu: [10, 25, 50, 100],
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

        let buttonContainer = $('<div>').addClass('buttons-container');
        table.buttons().container().appendTo(buttonContainer);
        buttonContainer.insertBefore('.tableSurvey Result_wrapper .dataTables_length');

        // $('.buttons-prev').on('click', function() {
        //     table.page('previous').draw('page');
        // });

        // $('.buttons-next').on('click', function() {
        //     table.page('next').draw('page');
        // });

        // Create container for buttons and pagination
        let buttonPaginationContainer = $('<div>').addClass('button-pagination-container');
        buttonPaginationContainer.css({
            display: 'block',
            flexDirection: 'row',
            justifyContent: 'flex-start',
            // marginTop: '10px'
        });

        // Insert the buttons into the new container
        table.buttons().container().appendTo(buttonPaginationContainer);

        // // Insert the show entries and info into the new container with custom classes
        // $('.dataTables_length').addClass('custom-length-container').appendTo(buttonPaginationContainer);
        // $('.dataTables_info').addClass('custom-info-text').appendTo(buttonPaginationContainer);
        // $('.dataTables_paginate').addClass('custom-pagination-container').appendTo(buttonPaginationContainer);

        // Insert the new container before the table
        buttonPaginationContainer.insertBefore('#table');

        // Add individual column search inputs and titles
        // $('#table thead th').each(function() {
        //     let title = $(this).text();
        //     $(this).html('<div class="text-center">' + title +
        //         '</div><div class="mt-2"><input class="form-control" type="text" placeholder="Search ' +
        //         title + '" /></div>');
        // });

        // Apply individual column search
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

        table.buttons().container().appendTo('.container .col-md-6:eq(0)');
    });
</script>
@endsection