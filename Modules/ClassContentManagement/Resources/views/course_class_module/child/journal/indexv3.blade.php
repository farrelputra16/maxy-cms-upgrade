@extends('layout.main-v3')

@section('title', 'Course Class Module Journal')

@section('content')
    <!-- Begin Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Overview</h4>

                <!-- Begin Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCourseClass') }}">Class</a></li>
                        <li class="breadcrumb-item"><a>Module List</a></li>
                        <li class="breadcrumb-item">Content: {{ $parent_module->detail->name }}</li>
                        <li class="breadcrumb-item active">Journal</li>
                    </ol>
                </div>
                <!-- End Breadcrumb -->
            </div>
        </div>
    </div>
    <!-- End Page Title -->

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

    <!-- Begin Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Child Modules: {{ $parent_module->detail->name }} Journal</h4>
                    <p class="card-title-desc">
                        This page presents a comprehensive overview of all available data, displayed in an interactive
                        and sortable DataTable format. Each row represents a unique data, providing key details such as
                        name, description, and status. Utilize the <b>column visibility, sorting, and column search bar</b>
                        features to
                        customize your view and quickly access the specific information you need.
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Name</th>
                                <th class="data-long">Notes</th>
                                <th>Created At</th>
                                <th>Created Id</th>
                                <th>Updated At</th>
                                <th>Updated Id</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td class="batch" scope="row">{{ $item->User->name }}</td>
                                    <td class="data-long" data-toggle="tooltip" data-placement="top"
                                        title="{!! strip_tags($item->description) !!}">
                                        {!! !empty($item->description) ? \Str::limit($item->description, 30) : '-' !!}
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->created_id }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>{{ $item->updated_id }}</td>
                                    <td value="{{ $item->status }}">
                                        @if ($item->status == 1)
                                            <a class="btn btn-success disabled">Aktif</a>
                                        @else
                                            <a class="btn btn-danger disabled">Non Aktif</a>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- <div class="btn-group"> --}}
                                        <a href="{{ route('getAddJournalCourseClassChildModule', ['id' => $item->id, 'user_id' => $item->User->id, 'course_class_module_id' => $parent_module->id]) }}"
                                            class="btn btn-primary rounded">Reply</a>
                                        @if ($item->status == 1)
                                            <button type="button" class="btn btn-danger delete-button"
                                                data-id="{{ $item->id }}"
                                                data-course_class_module_id="{{ $parent_module->id }}">
                                                Delete
                                            </button>
                                        @else
                                            <button type="button" class="btn btn-success delete-button"
                                                data-id="{{ $item->id }}"
                                                data-course_class_module_id="{{ $parent_module->id }}">
                                                Restore
                                            </button>
                                        @endif
                                        <form
                                            action="{{ route('postRejectJournalCourseClassChildModule', ['id' => $item->id, 'course_class_module_id' => $parent_module->id]) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @if ($item->status == 1)
                                                <button type="submit" class="btn btn-danger">Reject</button>
                                            @else
                                                <button type="submit" class="btn btn-success">Accept</button>
                                            @endif
                                        </form>
                                        {{-- </div> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Notes</th>
                                <th>Created At</th>
                                <th>Created Id</th>
                                <th>Updated At</th>
                                <th>Updated Id</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                    <!-- Modal -->
                    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmationModalLabel">Confirm Deletion</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this item?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                    <button type="button" class="btn btn-primary" id="confirm-delete">Yes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->
@endsection

@section('script')

    <script>
        // Listen for clicks on elements with the class 'delete-button'
        document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', function() {
                // Get the ID and course_class_module_id from the clicked button's data attributes
                let id = this.getAttribute('data-id');
                let course_class_module_id = this.getAttribute('data-course_class_module_id');

                // Show the confirmation modal (Bootstrap example)
                var confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'));
                confirmationModal.show();

                // Handle the confirm-delete button inside the modal
                document.getElementById('confirm-delete').addEventListener('click', function() {
                    // Send the request when the user confirms
                    fetch('/courseclassmodule/child/journal/delete', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': "{{ csrf_token() }}" // CSRF token from Blade
                            },
                            body: JSON.stringify({
                                id: id, // Pass the correct ID here
                                course_class_module_id: course_class_module_id // And the correct course_class_module_id
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                confirmationModal.hide();
                                Swal.fire({
                                    title: 'Deleted!',
                                    text: 'Journal entry deleted/restored successfully.',
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        // Refresh the page after the alert is closed
                                        location.reload();
                                    }
                                });
                            } else {
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Failed to delete the journal entry. Please try again.',
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                });
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            Swal.fire({
                                title: 'Error!',
                                text: 'An error occurred. Please try again.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        });
                });
            });
        });
    </script>

@endsection
