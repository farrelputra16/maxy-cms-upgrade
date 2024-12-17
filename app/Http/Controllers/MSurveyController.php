<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MSurvey;
use App\Models\SurveyResult;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class MSurveyController extends Controller
{
    function getSurvey(){
        // $MSurvey = MSurvey::all();
        return view('m_survey.indexv3');
    }

    function getSurveyData(Request $request){
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
        
        // Gunakan mapping untuk menentukan kolom pengurutan
        $finalOrderColumn = $orderColumnMapping[$orderColumn] ?? $orderColumn;

        $mSurvey = MSurvey::select('id', 'name', 'expired_date', 'type', 'description', 'created_at', 'created_id', 'updated_at', 'updated_id', 'status')
            ->orderBy($finalOrderColumn, $orderDirection);

        // global search datatable
        // if (!empty($searchValue)) {
        //     $partners->where(function ($q) use ($searchValue, $columns) {
        //         foreach ($columns as $column) {
        //             $columnName = $column['data'];

        //             if (in_array($columnName, ['DT_RowIndex', 'action'])) {
        //                 continue;
        //             } else if ($columnName === 'm_partner_type') {
        //                 $q->orWhereHas('MPartnerType', function ($query) use ($searchValue) {
        //                     $query->where('name', 'like', "%{$searchValue}%");
        //                 });
        //             } else {
        //                 $q->orWhere($columnName, 'like', "%{$searchValue}%");
        //             }
        //         }
        //     });
        // }

        // Filter kolom
        foreach ($columns as $column) {
            $columnSearchValue = $column['search']['value'] ?? null;
            $columnName = $column['data'];
            if (empty($columnSearchValue) || in_array($columnName, ['DT_RowIndex', 'action', 'url'])) {
                continue;
            } else if ($columnName == 'status') {
                if (strpos(strtolower($columnSearchValue), 'non') !== false)
                    $mSurvey->where('status', '=', 0);
                else
                    $mSurvey->where('status', '=', 1);
            } else if ($columnName == 'type') {
                $tipe = 0;
                $lowerSearchValue = strtolower($columnSearchValue);
                if (strpos($lowerSearchValue, 'k') === 0){
                    $tipe = 1;
                }
                $mSurvey->where('type', '=', $tipe);
            } else {
                $mSurvey->where($columnName, 'like', "%{$columnSearchValue}%");
            }
        }

        return DataTables::of($mSurvey)
            ->addIndexColumn() // Adds DT_RowIndex for serial number
            ->addColumn('id', function ($row) {
                return $row->id;
            })
            ->addColumn('name', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' . e($row->name) . '">'
                    . \Str::limit(e($row->name), 30)
                    . '</span>';
            })
            ->addColumn('url', function ($row) {
                return config('app.frontend_app_url') . '/lms/survey/' . $row->id;
            })
            ->addColumn('expired_date', function ($row) {
                return $row->expired_date;
            })
            ->addColumn('type', function ($row) {
                if ($row->type == 0)
                    return '<span class="badge text-bg-warning" style="padding: 15%; font-size: smaller;">Evaluasi</span>';
                elseif ($row->type == 1)
                    return '<span class="badge text-bg-primary" style="padding: 15%; font-size: smaller;">Kuis</span>';
            })
            ->addColumn('description', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' 
                    . e(strip_tags($row->description)) . '">' 
                    . (!empty($row->description) ? \Str::limit(strip_tags($row->description), 30) : '-') 
                    . '</span>';
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
                    data-model="MSurvey">
                    ' . ($row->status == 1 ? 'Aktif' : 'Non aktif') . '
                </button>';
            })
            ->addColumn('action', function ($row) {
                return '<a href="' . route('getEditSurvey', ['id' => $row->id, 'access' => 'm_survey_update']) . '" 
                            class="btn btn-primary rounded">Ubah</a>' . " " .
                        '<a href="' . route('getSurveyResult', ['id' => $row->id, 'access' => 'survey_result_manage']) . '" 
                            class="btn btn-info rounded">Hasil</a>';
            })
            ->orderColumn('id', 'id $1')
            ->rawColumns(['name', 'type', 'description', 'status', 'action']) // Allow HTML rendering
            ->make(true);
    }

    function getAddSurvey(){
        return view('m_survey.addv3');
    }

    function postAddSurvey(Request $request){//dd($request->all());
        // dd($request->all());
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'expired_date' => 'required|date|after:now',
            'survey' => ['required',
            function($attribute, $value, $fail) {
                if ($value === '{}') {
                    $fail('The ' . $attribute . ' field cannot be empty');
                }
            }],
        ], [
            'expired_date.after' => 'Tanggal kadaluarsa harus berisi tanggal setelah sekarang',
        ]);

        if ($validate){
            $create = MSurvey::create([
                'survey' => $request->survey,
                'name' => $request->name,
                'expired_date' => date('Y-m-d H:i:s', strtotime($request->expired_date)),
                'type' => $request->type ? $request->type : 0,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id,
            ]);

            if ($create){
                return app(HelperController::class)->Positive('getSurvey');
            }
                return app(HelperController::class)->Negative('getSurvey');
        }
    }

    function getEditSurvey(Request $request){
        $currentData = MSurvey::find($request->id);//dd($currentData);
        return view('m_survey.editv3', ['currentData' => $currentData]);
    }

    function postEditSurvey(Request $request){//dd($request->all());
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'expired_date' => 'required|date',
            'survey' => ['required',
            function($attribute, $value, $fail) {
                if ($value === '{}') {
                    $fail('The ' . $attribute . ' field cannot be empty');
                }
            }],
        ]);

        if($validate){
            $update = MSurvey::find($request->id);
            $update->update([
                    'survey' => $request->survey ? $request->survey : $update->survey,
                    'name' => $request->name,
                    'expired_date' => date('Y-m-d H:i:s', strtotime($request->expired_date)),
                    'type' => $request->type ? $request->type : 0,
                    'description' => $request->description,
                    'status' => $request->status ? 1 : 0,
                    'updated_id' => Auth::user()->id,
                ]);

            if($update){
                return app(HelperController::class)->Positive('getSurvey');
            } else {
                return app(HelperController::class)->Warning('getSurvey');
            }
        }
    }

    function getSurveyResult(Request $request){
        // $SurveyResult = SurveyResult::with('MSurvey', 'User')
        //     ->where('survey_id', $request->id)
        //     ->get();
        $surveyId = $request->id;
        return view('m_survey.result.indexv3', compact('surveyId'));
    }

    function getSurveyResultData(Request $request)
    {
        $surveyId = $request->input('id');
        $searchValue = $request->input('search.value');
        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir', 'asc');
        $columns = $request->input('columns');

        // Default kolom pengurutan
        $orderColumn = 'id';
        if ($orderColumnIndex !== null && isset($columns[$orderColumnIndex])) {
            $orderColumn = $columns[$orderColumnIndex]['data'];
        }

        // Mapping kolom untuk sorting
        $orderColumnMapping = [
            'DT_RowIndex' => 'survey_result.id',
            'responden_name' => 'users.name',
        ];
        $finalOrderColumn = $orderColumnMapping[$orderColumn] ?? "survey_result.$orderColumn";

        // Query utama dengan leftJoin ke tabel User
        $mSurveyResult = SurveyResult::with('MSurvey', 'User')
            ->leftJoin('users', 'users.id', '=', 'survey_result.user_id') // Join tabel User
            ->where('survey_result.survey_id', $surveyId)
            ->select(
                'survey_result.id',
                'survey_result.survey_id',
                'survey_result.user_id',
                'survey_result.content',
                'survey_result.score',
                'survey_result.created_at',
                'survey_result.created_id',
                'survey_result.updated_at',
                'survey_result.updated_id',
                'users.name as responden_name' // Alias untuk kolom name di tabel User
            )
            ->orderBy($finalOrderColumn, $orderDirection);

        // Filter kolom pencarian
        foreach ($columns as $column) {
            $columnSearchValue = $column['search']['value'] ?? null;
            $columnName = $column['data'];

            if (empty($columnSearchValue) || in_array($columnName, ['DT_RowIndex', 'action'])) {
                continue;
            }

            // Filter untuk responden_name (kolom name di tabel users)
            if ($columnName == 'responden_name') {
                $mSurveyResult->where('users.name', 'like', "%{$columnSearchValue}%");
            } 
            // Filter untuk status
            else if ($columnName == 'status') {
                if (strpos(strtolower($columnSearchValue), 'non') !== false) {
                    $mSurveyResult->where('survey_result.status', '=', 0);
                } else {
                    $mSurveyResult->where('survey_result.status', '=', 1);
                }
            } 
            // Filter untuk kolom lain
            else {
                $mSurveyResult->where("survey_result.$columnName", 'like', "%{$columnSearchValue}%");
            }
        }

        // Global search untuk semua kolom
        // if (!empty($searchValue)) {
        //     $mSurveyResult->where(function ($query) use ($searchValue) {
        //         $query->orWhere('survey_result.content', 'like', "%{$searchValue}%")
        //             ->orWhere('survey_result.score', 'like', "%{$searchValue}%")
        //             ->orWhere('users.name', 'like', "%{$searchValue}%");
        //     });
        // }

        // Return DataTables response
        return DataTables::of($mSurveyResult)
            ->addIndexColumn() // Adds DT_RowIndex for serial number
            ->addColumn('id', fn($row) => $row->id)
            ->addColumn('name', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' . e($row->MSurvey->name) . '">'
                    . ($row->MSurvey->name ? \Str::limit(e($row->MSurvey->name), 30) : "-") . '</span>';
            })
            ->addColumn('responden_name', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' . e($row->responden_name) . '">'
                    . ($row->responden_name ? \Str::limit(e($row->responden_name), 30) : "-") . '</span>';
            })
            ->addColumn('content', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' . e(strip_tags($row->content)) . '">'
                    . ($row->content ? \Str::limit(e($row->content), 30) : "-") . '</span>';
            })
            ->addColumn('score', fn($row) => $row->score)
            ->addColumn('created_at', fn($row) => $row->created_at)
            ->addColumn('created_id', fn($row) => $row->created_id)
            ->addColumn('updated_at', fn($row) => $row->updated_at)
            ->addColumn('updated_id', fn($row) => $row->updated_id)
            ->addColumn('action', function ($row) {
                return '<a href="' . route('getSurveyResultDetail', ['id' => $row->id, 'access' => 'survey_result_read']) . '" 
                            class="btn btn-primary rounded">Detail</a>';
            })
            ->orderColumn('id', 'survey_result.id $1')
            ->rawColumns(['name', 'responden_name', 'content', 'action']) // Allow HTML rendering
            ->make(true);
    }

    function getSurveyResultDetail(Request $request){
        $SurveyResult = SurveyResult::with('MSurvey', 'User')
            ->where('id', $request->id)
            ->first();

        return view('m_survey.result.detailv3', ['currentData' => $SurveyResult]);
    }
}
