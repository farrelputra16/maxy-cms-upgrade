@extends('layout.master')

@section('title', 'Certificate Templates')

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
@endpush

@section('content')
    <div class="px-3 pb-3">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <h2>Certificate Templates</h2>
        <hr>
        <div class="ui breadcrumb pt-2 pb-4">
            <a href="{{ route('getDashboard') }}" class="section">Dashboard</a>
            <i class="right angle icon divider"></i>
            <a href="{{ route('getCourseClass') }}" class="section">Course Class</a>
            <i class="right angle icon divider"></i>
            <div class="active section">Certificate Template</div>
        </div>

        <nav class="navbar bg-body-tertiary py-3">
            <div class="row">
                <div class="col">
                    <a class="btn btn-primary" href="{{ route('certificate-templates.create') }}">
                        Template Certificate +
                    </a>
                </div>
            </div>
        </nav>

        <table id="certifTemplateTable" class="table table-striped w-100">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Image</th>
                <th scope="col">Course Type - Batch</th>
                <th scope="col" style="width: 5%;">Marker State</th>
                <th scope="col" style="width: 10%;">Template Content</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($certificateTemplates as $certificateTemplate)
                <tr>
                    <td>{{ $certificateTemplate->id }}</td>
                    <td>
                        <img src="{{ asset('uploads/certificate/' . $certificateTemplate->type->id . '/' . $certificateTemplate->filename) }}"
                             alt="{{ $certificateTemplate->filename }}" width="256">
                    </td>
                    <td>{{ $certificateTemplate->type->name . " - " . "Batch $certificateTemplate->batch" ?? '-' }}</td>
                    <td class="text-wrap">{{ \Str::limit($certificateTemplate->marker_state) }}</td>
                    <td id="description" class="text-wrap">{!! !empty($certificateTemplate->template_content) ? \Str::limit($certificateTemplate->template_content) : '-' !!}</td>
                    <td>{{ $certificateTemplate->created_at }}</td>
                    <td>{{ $certificateTemplate->updated_at }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('certificate-templates.edit', $certificateTemplate->id) }}"
                               class="btn btn-success">Edit</a>
                            <form action="{{ route('certificate-templates.destroy', $certificateTemplate->id) }}"
                                  method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
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
        $(document).ready(function () {
            let table = $('#certifTemplateTable').DataTable({
                lengthChange: true,
                lengthMenu: [10, 25, 50, 100],
                buttons: ['copy', 'excel', 'pdf', 'colvis']
            });

            $("select[name='certifTemplateTable_length']").on('click', function () {
                $.ajax({
                    url: "",
                    type: 'GET',
                    data: {
                        per_page: $(this).val()
                    },
                    success: function (data) {
                        console.log(data);
                    }
                });
                console.log($(this).val());
            });

            table.buttons().container()
                .appendTo('#certifTemplateTable_wrapper .col-md-6:eq(0)');

            $(".btn.btn-danger").on("click", function (e) {
                e.preventDefault();
                let confirmDelete = confirm("Are you sure you want to delete this item?");
                if (confirmDelete) {
                    $(this).parent().submit();
                }
            });
        });
    </script>
@endsection
