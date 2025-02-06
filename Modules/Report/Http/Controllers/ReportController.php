<?php

namespace Modules\Report\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\DataTables\Facades\DataTables;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Barryvdh\DomPDF\Facade\Pdf;

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
        // Common query setup
        $searchValue = $request->input('search.value');
        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir', 'asc');
        $columns = $request->input('columns');//dd($orderDirection);

        $orderColumn = 'id';
        if ($orderColumnIndex !== null && isset($columns[$orderColumnIndex])) {
            $orderColumn = $columns[$orderColumnIndex]['data'];
        }

        $orderColumnMapping = [
            'DT_RowIndex' => 'id',
        ];

        // Use mapping to determine the sorting column
        $finalOrderColumn = $orderColumnMapping[$orderColumn] ?? $orderColumn;

        $user = User::select('users.*', 'access_group.name AS accessgroup')
            ->join('access_group', 'users.access_group_id', '=', 'access_group.id')
            ->orderBy($finalOrderColumn, $orderDirection);

        // Apply column filtering
        foreach ($columns as $column) {
            $columnSearchValue = $column['search']['value'] ?? null;
            $columnName = $column['data'];
            if (empty($columnSearchValue) || in_array($columnName, ['DT_RowIndex', 'action'])) {
                continue;
            } else if ($columnName == 'accessgroup') {
                $user->where('access_group.name', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'status') {
                if (strpos(strtolower($columnSearchValue), 'non') !== false)
                    $user->where('status', '=', 0);
                else
                    $user->where('user.status', '=', 1);
            } else if ($columnName == 'name') {
                $user->where('users.name', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'description') {
                $user->where('users.description', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'id') {
                $user->where('users.id', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'created_at') {
                $user->where('users.created_at', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'created_id') {
                $user->where('users.created_id', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'updated_at') {
                $user->where('users.updated_at', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'updated_id') {
                $user->where('users.updated_id', 'like', "%{$columnSearchValue}%");
            } else {
                $user->where($columnName, 'like', "%{$columnSearchValue}%");
            }
        }

        return DataTables::of($user)
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
                            class="btn btn-outline-primary rounded">Profil</a>'. " " .
                        '<a href="' . route('getCCMH', ['user_id' => $row->id]) . '"
                            class="btn btn-info rounded">Riwayat</a>';
            })
            ->orderColumn('id', 'id $1')
            ->rawColumns(['name', 'email', 'description', 'address','status', 'action']) // Allow HTML rendering
            ->make(true);
    }

    private function buildUserQuery(Request $request)
    {
        // Replicate the existing query building logic from getData()
        $searchValue = $request->input('search.value');
        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir', 'asc');
        $columns = $request->input('columns');

        $orderColumn = 'id';
        if ($orderColumnIndex !== null && isset($columns[$orderColumnIndex])) {
            $orderColumn = $columns[$orderColumnIndex]['data'];
        }

        $orderColumnMapping = ['DT_RowIndex' => 'id'];
        $finalOrderColumn = $orderColumnMapping[$orderColumn] ?? $orderColumn;

        $user = User::select('users.*', 'access_group.name AS accessgroup')
            ->join('access_group', 'users.access_group_id', '=', 'access_group.id')
            ->orderBy($finalOrderColumn, $orderDirection);

        // Apply global search
        if (!empty($searchValue)) {
            $user->where(function ($q) use ($searchValue, $columns) {
                foreach ($columns as $column) {
                    $columnName = $column['data'];
                    if (in_array($columnName, ['DT_RowIndex', 'action'])) continue;
                    if ($columnName === 'accessgroup') {
                        $q->orWhere('access_group.name', 'like', "%{$searchValue}%");
                    } else {
                        $q->orWhere("users.{$columnName}", 'like', "%{$searchValue}%");
                    }
                }
            });
        }

        // Apply column filters
        foreach ($columns as $column) {
            $columnSearchValue = $column['search']['value'] ?? null;
            $columnName = $column['data'];
            if (empty($columnSearchValue) || in_array($columnName, ['DT_RowIndex', 'action'])) continue;

            if ($columnName === 'accessgroup') {
                $user->where('access_group.name', 'like', "%{$columnSearchValue}%");
            } elseif ($columnName === 'status') {
                $status = stripos($columnSearchValue, 'non') !== false ? 0 : 1;
                $user->where('users.status', $status);
            } else {
                $user->where("users.{$columnName}", 'like', "%{$columnSearchValue}%");
            }
        }

        return $user;
    }

    public function postExportCsv(Request $request): StreamedResponse
    {
        $users = $this->buildUserQuery($request)->get();

        $filename = 'users_export_' . now()->format('Ymd_His') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename={$filename}",
        ];

        return new StreamedResponse(function () use ($users) {
            $handle = fopen('php://output', 'w');
            // CSV headers
            fputcsv($handle, [
                'ID',
                'Nama Pengguna',
                'Email',
                'Grup Akses',
                'Catatan Admin',
                'Tanggal Lahir',
                'Telepon',
                'Alamat',
                'Universitas',
                'Jurusan',
                'Semester',
                'Kota',
                'Negara',
                'Level',
                'Nama Pembimbing',
                'Email Pembimbing',
                'IPK',
                'Agama',
                'Hobi',
                'Status Kewarganegaraan',
                'Dibuat Pada',
                'Dibuat Oleh',
                'Diperbarui Pada',
                'Diperbarui Oleh',
                'Status'
            ]);

            foreach ($users as $user) {
                fputcsv($handle, [
                    $user->id,
                    $user->name,
                    $user->email,
                    $user->accessgroup,
                    $user->description,
                    $user->date_of_birth,
                    $user->phone,
                    $user->address,
                    $user->university,
                    $user->major,
                    $user->semester,
                    $user->city,
                    $user->country,
                    $user->level,
                    $user->supervisor_name,
                    $user->supervisor_email,
                    $user->ipk,
                    $user->religion,
                    $user->hobby,
                    $user->citizenship_status,
                    $user->created_at,
                    $user->created_id,
                    $user->updated_at,
                    $user->updated_id,
                    $user->status ? 'Aktif' : 'Non Aktif',
                ]);
            }

            fclose($handle);
        }, 200, $headers);
    }

    public function postExportPdf(Request $request)
    {
        $users = $this->buildUserQuery($request)->get();
        $html = '<style>
                    table {
                        width: 100%;
                        border-collapse: collapse;
                        table-layout: fixed;
                        font-size: 6px;
                    }
                    th, td {
                        border: 1px solid black;
                        word-wrap: break-word;
                        padding: 5px;
                    }
                </style>';
        $html .= '<h3> User Report ' . now()->format('Y-m-d H:i:s') . '</h3>';
        $html .= '<table border="1">';
        $html .= '<tr>';
        $html .= '<th>No</th>';
        $html .= '<th>ID</th>';
        $html .= '<th>Nama Pengguna</th>';
        $html .= '<th>Email</th>';
        $html .= '<th>Grup Akses</th>';
        $html .= '<th>Catatan Admin</th>';
        $html .= '<th>Tanggal Lahir</th>';
        $html .= '<th>Telepon</th>';
        $html .= '<th>Alamat</th>';
        $html .= '<th>Universitas</th>';
        $html .= '<th>Jurusan</th>';
        $html .= '<th>Semester</th>';
        $html .= '<th>Kota</th>';
        $html .= '<th>Negara</th>';
        $html .= '<th>Level</th>';
        $html .= '<th>Nama Pembimbing</th>';
        $html .= '<th>Email Pembimbing</th>';
        $html .= '<th>IPK</th>';
        $html .= '<th>Agama</th>';
        $html .= '<th>Hobi</th>';
        $html .= '<th>Status Kewarganegaraan</th>';
        $html .= '<th>Dibuat Pada</th>';
        $html .= '<th>Dibuat Oleh</th>';
        $html .= '<th>Diperbarui Pada</th>';
        $html .= '<th>Diperbarui Oleh</th>';
        $html .= '<th>Status</th>';
        $html .= '</tr>';

        foreach ($users as $key => $user) {
            $html .= '<tr>';
            $html .= '<td>' . ($key+1) . '</td>';
            $html .= '<td>' . $user->id . '</td>';
            $html .= '<td>' . $user->name . '</td>';
            $html .= '<td>' . $user->email . '</td>';
            $html .= '<td>' . $user->accessgroup . '</td>';
            $html .= '<td>' . $user->description . '</td>';
            $html .= '<td>' . $user->date_of_birth . '</td>';
            $html .= '<td>' . $user->phone . '</td>';
            $html .= '<td>' . $user->address . '</td>';
            $html .= '<td>' . $user->university . '</td>';
            $html .= '<td>' . $user->major . '</td>';
            $html .= '<td>' . $user->semester . '</td>';
            $html .= '<td>' . $user->city . '</td>';
            $html .= '<td>' . $user->country . '</td>';
            $html .= '<td>' . $user->level . '</td>';
            $html .= '<td>' . $user->supervisor_name . '</td>';
            $html .= '<td>' . $user->supervisor_email . '</td>';
            $html .= '<td>' . $user->ipk . '</td>';
            $html .= '<td>' . $user->religion . '</td>';
            $html .= '<td>' . $user->hobby . '</td>';
            $html .= '<td>' . $user->citizenship_status . '</td>';
            $html .= '<td>' . $user->created_at . '</td>';
            $html .= '<td>' . $user->created_id . '</td>';
            $html .= '<td>' . $user->updated_at . '</td>';
            $html .= '<td>' . $user->updated_id . '</td>';
            $html .= '<td>' . ($user->status ? 'Aktif' : 'Non Aktif') . '</td>';
            $html .= '</tr>';
        }

        $html .= '</table>';

        $pdf = Pdf::loadHTML($html)->setPaper('a4', 'landscape');
        return $pdf->download('users_export_' . now()->format('Ymd_His') . '.pdf');
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
