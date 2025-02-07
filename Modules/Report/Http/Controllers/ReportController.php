<?php

namespace Modules\Report\Http\Controllers;

use App\Models\User;
use App\Models\AccessGroup;
use App\Models\MProvince;
use App\Models\Partner;
use App\Imports\UserImport;
use App\Models\CourseClass;
use App\Models\CourseClassMember;
use App\Models\MJobdesc;
use App\Models\Category;
use App\Models\Course;
use App\Models\CourseClassMemberLog;
use App\Models\CourseClassRedeemCode;
use App\Models\MLanguage;
use App\Models\MSkill;
use App\Models\RedeemCode;
use App\Models\UserParent;
use App\Models\UserRedeemCode;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\UpdateCVInfoRequest;
use App\Http\Requests\UpdateProfileRequest;

use Yajra\DataTables\Facades\DataTables;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use ZipArchive;
use File;

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

    public function saveReportFilterToSession(Request $request)
    {
        $filters = [
            'start_registered' => $request->input('start_registered'),
            'end_registered' => $request->input('end_registered'),
            'start_last_update' => $request->input('start_last_update'),
            'end_last_update' => $request->input('end_last_update'),
            'filter_name' => $request->input('filter_name'),
        ];

        session(['user_report_query' => $filters, 'filtered' => 1]);

        return redirect()->back();
    }



    public function getUserReportData(Request $request)
    {
        $filters = session('user_report_query', []);

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
            ->join('access_group', 'users.access_group_id', '=', 'access_group.id');

        if (!empty($filters['start_registered']) && !empty($filters['end_registered'])) {
            $user->whereBetween('users.created_at', [
                Carbon::createFromFormat('d M, Y', $filters['start_registered'])->startOfDay(),
                Carbon::createFromFormat('d M, Y', $filters['end_registered'])->endOfDay(),
            ]);
        }

        if (!empty($filters['start_last_update']) && !empty($filters['end_last_update'])) {
            $user->whereBetween('users.created_at', [
                Carbon::createFromFormat('d M, Y', $filters['start_last_update'])->startOfDay(),
                Carbon::createFromFormat('d M, Y', $filters['end_last_update'])->endOfDay(),
            ]);
        }

        if (!empty($filters['filter_name'])) {
            $user->where('users.name', 'LIKE', "%{$filters['filter_name']}%");
        }

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

        return DataTables::of($user)
            ->addIndexColumn()
            ->addColumn('status', function ($row) {
                return '<button class="btn btn-status ' . ($row->status == 1 ? 'btn-success' : 'btn-danger') . '"
                        data-id="' . $row->id . '" data-status="' . $row->status . '">
                        ' . ($row->status == 1 ? 'Aktif' : 'Non aktif') . '
                    </button>';
            })
            ->rawColumns(['status'])
            ->make(true);
    }

    private function buildUserQuery(Request $request)
    {
        $filters = session('user_report_query', []);

        // Replicate the existing query building logic from getData()
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

        if (!empty($filters['start_registered']) && !empty($filters['end_registered'])) {
            $user->whereBetween('users.created_at', [
                Carbon::createFromFormat('d M, Y', $filters['start_registered'])->startOfDay(),
                Carbon::createFromFormat('d M, Y', $filters['end_registered'])->endOfDay(),
            ]);
        }

        if (!empty($filters['start_last_update']) && !empty($filters['end_last_update'])) {
            $user->whereBetween('users.created_at', [
                Carbon::createFromFormat('d M, Y', $filters['start_last_update'])->startOfDay(),
                Carbon::createFromFormat('d M, Y', $filters['end_last_update'])->endOfDay(),
            ]);
        }

        if (!empty($filters['filter_name'])) {
            $user->where('users.name', 'LIKE', "%{$filters['filter_name']}%");
        }

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
            $html .= '<td>' . ($key + 1) . '</td>';
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

    # _______________________________________________________________________________________________________________________________________________________________
    private function anonymize($string)
    {
        return mb_substr($string, 0, 1) . str_repeat('#', max(0, mb_strlen($string) - 1));
    }


    public function postExportCVPdf(Request $request)
    {
        ini_set('max_execution_time', 30000);
        ini_set('memory_limit', '1G'); // Increase memory limit

        $users = $this->buildUserQuery($request)->get();

        // // Fetch filters
        // $startRegistered = $request->input('start_registered');
        // $endRegistered = $request->input('end_registered');
        // $startLastUpdate = $request->input('start_last_update');
        // $endLastUpdate = $request->input('end_last_update');
        // $filterName = $request->input('filter_name');
        $encryptResume = $request->input('encrypt_resume', "off");

        // // Build query
        // $query = User::query();
        // $query->where(function ($q) use ($startRegistered, $endRegistered, $startLastUpdate, $endLastUpdate, $filterName) {
        //     if ($startRegistered && $endRegistered) {
        //         $q->whereBetween('created_at', [
        //             Carbon::createFromFormat('d M, Y', $startRegistered)->startOfDay(),
        //             Carbon::createFromFormat('d M, Y', $endRegistered)->endOfDay(),
        //         ]);
        //     }
        //     if ($startLastUpdate && $endLastUpdate) {
        //         $q->whereBetween('updated_at', [
        //             Carbon::createFromFormat('d M, Y', $startLastUpdate)->startOfDay(),
        //             Carbon::createFromFormat('d M, Y', $endLastUpdate)->endOfDay(),
        //         ]);
        //     }
        //     if (!empty($filterName)) {
        //         $q->where('name', 'LIKE', "%{$filterName}%");
        //     }
        // });

        return $this->generateBulkCVInChunks($users, $encryptResume);
    }

    private function generateBulkCVInChunks($query, $encryptResume)
    {
        $batchSize = 500;
        $batchIndex = 1;
        $zipFiles = [];
        $zipsFolder = storage_path('app/public/zips/');

        // Ensure "zips" folder exists
        if (!File::exists($zipsFolder)) {
            File::makeDirectory($zipsFolder, 0755, true, true);
        }

        // Process in chunks
        $query->chunk($batchSize, function ($users) use (&$batchIndex, &$zipFiles, $encryptResume, $zipsFolder) {
            if ($encryptResume == "on") {
                foreach ($users as $user) {
                    $user->name = $this->anonymize($user->name);
                    $user->address = $this->anonymize($user->address);
                    $user->nickname = $this->anonymize($user->nickname);
                    $user->phone = $this->anonymize($user->phone);
                    if ($user->city != '') {
                        $user->city = $this->anonymize($user->city);
                    }
                    $user->linked_in = $this->anonymize($user->linked_in);
                    $user->email = $this->anonymize($user->email);
                    if ($user->MProvince) {
                        $user->MProvince->name = $this->anonymize($user->MProvince->name);
                    }
                }
            }

            // Generate ZIP for batch
            $zipFile = $this->generateZipForBatch($users, $batchIndex, $zipsFolder);
            $zipFiles[] = $zipFile;
            $batchIndex++;
        });

        // Create final ZIP containing all batch ZIPs
        $finalZip = $this->generateFinalZip($zipFiles, $zipsFolder);

        // Delete batch ZIPs after final ZIP is created
        foreach ($zipFiles as $file) {
            File::delete($file);
        }

        // Return final ZIP for download
        return response()->download($finalZip)->deleteFileAfterSend(true);
    }

    private function generateZipForBatch($users, $batchIndex, $zipsFolder)
    {
        $currentDate = now()->format('Ymd');
        $zipFileName = "CVs_{$currentDate}_Batch{$batchIndex}.zip";
        $zipFilePath = $zipsFolder . $zipFileName;

        $zip = new ZipArchive;
        if ($zip->open($zipFilePath, ZipArchive::CREATE) === TRUE) {
            $i = 1;
            foreach ($users as $user) {

                // Generate PDF
                $pdf = PDF::loadView('report::user.curriculum-vitae', compact('user'));

                $pdfFileName = "CV_{$currentDate}_Batch{$batchIndex}_{$i}.pdf";
                $i++;

                // Store PDF

                $pdfsFolder = storage_path('app/public/pdfs/');
                if (!File::exists($pdfsFolder)) {
                    File::makeDirectory($pdfsFolder, 0755, true, true);
                }

                // Store PDF
                Storage::disk('public')->put("pdfs/$pdfFileName", $pdf->output());
                $zip->addFile(storage_path("app/public/pdfs/$pdfFileName"), $pdfFileName);
            }
            $zip->close();
        }

        // Clean up PDFs
        $pdfFiles = Storage::files('public/pdfs');
        foreach ($pdfFiles as $file) {
            Storage::delete($file);
        }

        return $zipFilePath;
    }

    private function generateFinalZip($zipFiles, $zipsFolder)
    {
        $currentDate = now()->format('Ymd');
        $finalZipFileName = "All_CVs_{$currentDate}.zip";
        $finalZipFilePath = $zipsFolder . $finalZipFileName;

        $zip = new ZipArchive;
        if ($zip->open($finalZipFilePath, ZipArchive::CREATE) === TRUE) {
            foreach ($zipFiles as $batchZip) {
                $zip->addFile($batchZip, basename($batchZip));
            }
            $zip->close();
        }

        return $finalZipFilePath;
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
