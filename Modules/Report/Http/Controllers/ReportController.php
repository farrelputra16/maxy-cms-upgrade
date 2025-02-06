<?php

namespace Modules\Report\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\DataTables\Facades\DataTables;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $user = User::all();
        return view('report::user.index', compact('user'));
    }

    function getUserReportData(Request $request)
    {
        // Detect if this is an export request
        $isExport = $request->input('export') === 'true';

        // Common query setup
        $searchValue = $request->input('search.value');
        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir', 'asc');
        $columns = $request->input('columns');

        $orderColumn = 'id';
        if ($orderColumnIndex !== null && isset($columns[$orderColumnIndex])) {
            $orderColumn = $columns[$orderColumnIndex]['data'];
        }

        $orderColumnMapping = [
            'DT_RowIndex' => 'id',
        ];

        // Use mapping to determine the sorting column
        $finalOrderColumn = $orderColumnMapping[$orderColumn] ?? $orderColumn;

        $userQuery = User::select('users.*', 'access_group.name AS accessgroup')
            ->join('access_group', 'users.access_group_id', '=', 'access_group.id')
            ->orderBy($finalOrderColumn, $orderDirection);

        // Apply column filtering
        foreach ($columns as $column) {
            $columnSearchValue = $column['search']['value'] ?? null;
            $columnName = $column['data'];

            if (empty($columnSearchValue) || in_array($columnName, ['DT_RowIndex', 'action'])) {
                continue;
            } elseif ($columnName == 'accessgroup') {
                $userQuery->where('access_group.name', 'like', "%{$columnSearchValue}%");
            } elseif ($columnName == 'status') {
                if (strpos(strtolower($columnSearchValue), 'non') !== false) {
                    $userQuery->where('status', '=', 0);
                } else {
                    $userQuery->where('users.status', '=', 1);
                }
            } elseif ($columnName == 'name') {
                $userQuery->where('users.name', 'like', "%{$columnSearchValue}%");
            } elseif ($columnName == 'description') {
                $userQuery->where('users.description', 'like', "%{$columnSearchValue}%");
            } elseif ($columnName == 'id') {
                $userQuery->where('users.id', 'like', "%{$columnSearchValue}%");
            } elseif ($columnName == 'created_at') {
                $userQuery->where('users.created_at', 'like', "%{$columnSearchValue}%");
            } elseif ($columnName == 'created_id') {
                $userQuery->where('users.created_id', 'like', "%{$columnSearchValue}%");
            } elseif ($columnName == 'updated_at') {
                $userQuery->where('users.updated_at', 'like', "%{$columnSearchValue}%");
            } elseif ($columnName == 'updated_id') {
                $userQuery->where('users.updated_id', 'like', "%{$columnSearchValue}%");
            } else {
                $userQuery->where($columnName, 'like', "%{$columnSearchValue}%");
            }
        }

        // Handle export request
        if ($isExport) {
            // Get all filtered rows without pagination
            $users = $userQuery->get();

            // Format data for export
            $exportData = $users->map(function ($row, $index) {
                return [
                    'DT_RowIndex' => $index + 1, // Add row index
                    'id' => $row->id,
                    'name' => $row->name,
                    'email' => $row->email,
                    'accessgroup' => $row->accessgroup,
                    'description' => strip_tags($row->description),
                    'date_of_birth' => $row->date_of_birth,
                    'phone' => $row->phone,
                    'address' => strip_tags($row->address),
                    'university' => $row->university,
                    'major' => $row->major,
                    'semester' => $row->semester,
                    'city' => $row->city,
                    'country' => $row->country,
                    'level' => $row->level,
                    'supervisor_name' => $row->supervisor_name,
                    'supervisor_email' => $row->supervisor_email,
                    'ipk' => $row->ipk,
                    'religion' => $row->religion,
                    'hobby' => $row->hobby,
                    'citizenship_status' => $row->citizenship_status,
                    'created_at' => $row->created_at,
                    'created_id' => $row->created_id,
                    'updated_at' => $row->updated_at,
                    'updated_id' => $row->updated_id,
                    'status' => $row->status == 1 ? 'Aktif' : 'Non aktif',
                    'action' => '',
                ];
            });

            // Return JSON response for export
            return response()->json([
                'data' => $exportData,
                'recordsTotal' => $users->count(),
                'recordsFiltered' => $users->count(),
            ]);
        }

        // Regular DataTables response
        return DataTables::of($userQuery)
            ->addIndexColumn() // Adds DT_RowIndex for serial number
            ->addColumn('id', function ($row) {
                return $row->id;
            })
            ->addColumn('name', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' . e($row->name) . '">'
                    . \Str::limit(e($row->name), 30)
                    . '</span>';
            })
            ->addColumn('email', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' . e($row->name) . '">'
                    . \Str::limit(e($row->email), 30)
                    . '</span>';
            })
            ->addColumn('accessgroup', function ($row) {
                return $row->accessgroup;
            })
            ->addColumn('description', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="'
                    . e(strip_tags($row->description)) . '">'
                    . (!empty($row->description) ? \Str::limit(strip_tags($row->description), 30) : '-')
                    . '</span>';
            })
            ->addColumn('date_of_birth', function ($row) {
                return !empty($row->date_of_birth) ? \Str::limit($row->date_of_birth, 30) : '-';
            })
            ->addColumn('phone', function ($row) {
                return $row->phone;
            })
            ->addColumn('address', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="'
                    . e(strip_tags($row->address)) . '">'
                    . (!empty($row->address) ? \Str::limit(strip_tags($row->address), 30) : '-')
                    . '</span>';
            })
            ->addColumn('university', function ($row) {
                return !empty($row->university) ? \Str::limit($row->university, 30) : '-';
            })
            ->addColumn('major', function ($row) {
                return !empty($row->major) ? \Str::limit($row->major, 30) : '-';
            })
            ->addColumn('semester', function ($row) {
                return !empty($row->semester) ? \Str::limit($row->semester, 30) : '-';
            })
            ->addColumn('city', function ($row) {
                return !empty($row->city) ? \Str::limit($row->city, 30) : '-';
            })
            ->addColumn('country', function ($row) {
                return !empty($row->country) ? \Str::limit($row->country, 30) : '-';
            })
            ->addColumn('level', function ($row) {
                return $row->level;
            })
            ->addColumn('supervisor_name', function ($row) {
                return !empty($row->supervisor_name) ? \Str::limit($row->supervisor_name, 30) : '-';
            })
            ->addColumn('supervisor_email', function ($row) {
                return !empty($row->supervisor_email) ? \Str::limit($row->supervisor_email, 30) : '-';
            })
            ->addColumn('ipk', function ($row) {
                return !empty($row->ipk) ? \Str::limit($row->ipk, 30) : '-';
            })
            ->addColumn('religion', function ($row) {
                return !empty($row->religion) ? \Str::limit($row->religion, 30) : '-';
            })
            ->addColumn('hobby', function ($row) {
                return !empty($row->hobby) ? \Str::limit($row->hobby, 30) : '-';
            })
            ->addColumn('citizenship_status', function ($row) {
                return !empty($row->citizenship_status) ? \Str::limit($row->citizenship_status, 30) : '-';
            })
            ->addColumn('created_at', function ($row) {
                return $row->created_at;
            })
            ->addColumn('created_id', function ($row) {
                return $row->created_id;
            })
            ->addColumn('updated_at', function ($row) {
                return $row->updated_at;
            })
            ->addColumn('updated_id', function ($row) {
                return $row->updated_id;
            })
            ->addColumn('status', function ($row) {
                return '<button
            class="btn btn-status ' . ($row->status == 1 ? 'btn-success' : 'btn-danger') . '"
            data-id="' . $row->id . '"
            data-status="' . $row->status . '"
            data-model="User">
            ' . ($row->status == 1 ? 'Aktif' : 'Non aktif') . '
        </button>';
            })
            ->addColumn('action', function ($row) {
                return '<a href="' . route('getEditUser', ['id' => $row->id]) . '"
                    class="btn btn-primary rounded">Ubah</a>' . " " .
                    '<a href="' . route('getProfileUser', ['id' => $row->id]) . '"
                    class="btn btn-outline-primary rounded">Profil</a>' . " " .
                    '<a href="' . route('getCCMH', ['user_id' => $row->id]) . '"
                    class="btn btn-info rounded">Riwayat</a>';
            })
            ->orderColumn('id', 'id $1')
            ->rawColumns(['name', 'email', 'description', 'address', 'status', 'action']) // Allow HTML rendering
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('report::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('report::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('report::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
