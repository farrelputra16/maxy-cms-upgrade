@extends ('layout.master')

@section ('title', 'Voucher')
@section ('content')
    <div style="padding: 0px 12px 0px 12px;">
        <hr style = "margin-bottom: 0px;">
            
            <nav class="navbar bg-body-tertiary" style="padding: 12px 0px 12px 0px;">
                <form method="GET" action="{{ route('gettypeCCMH') }}">
                    <div class="navbar-nav">
                        <label for="">Course Type</label>
                        <!-- JIKA ADA VARIABEL COURSE_TYPE DI METHOD GET -->
                        @if(isset($_GET['course_type']))
                        <select class="ui dropdown" name="course_type">
                            <option value="all" {{ ($_GET['course_type'] == 'all') ? 'selected' : '' }}>all</option>
                            @foreach($course_type as $type)
                                <option value="{{ $type->type }}" {{ ($_GET['course_type'] == $type->type) ? 'selected' : '' }}>{{ $type->type }}</option>
                            @endforeach
                        </select>
                        @else
                        <select class="ui dropdown" name="course_type">
                            <option value="all" selected >all</option>
                            @foreach($course_type as $type)
                                <option value="{{ $type->type }}" >{{ $type->type }}</option>
                            @endforeach
                        </select>
                        @endif
                    </div>

                    <div class="navbar-nav">
                        <button type="submit" class="btn btn-primary">Generate</button>
                    </div>
                </form>

            </nav>
            
            <div id="table_content">
                <table class="ui tablet unstackable table">
                    <thead>
                        <tr>
                            <th>Course Module Name </th>
                            <th>User Name</th>
                            <th>submitted_file</th>
                            <th>comment</th>
                            <th>grade </th>
                            <th>graded_at </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ccmh as $item)
                        <tr>
                            <td>{{ $item->course_module_name }}</td>
                            <td>{{ $item->user_name }}</td>
                            <td>{{ $item->submitted_file }}</td>
                            <td>{{ $item->comment }}</td>
                            <td>{{ $item->grade }}</td>
                            <td>{{ $item->graded_at }}</td>
                            <td>
                                <a href ="{{ route('getEditCCMH', ['id' => $item->id])}}" style="text-decoration: none; color:blue;">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
</div>
@endsection