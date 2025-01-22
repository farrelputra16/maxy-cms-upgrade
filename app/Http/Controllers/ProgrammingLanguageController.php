<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\MProgrammingLanguage;

class ProgrammingLanguageController extends Controller
{
    function getProgrammingLanguage()
    {
        return view('m_programming_language.index');
    }

    function getProgrammingLanguageData(Request $request){
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

        $data = MProgrammingLanguage::select('id', 'name', 'slug', 'description', 'created_at', 'created_id', 'updated_at', 'updated_id', 'status')
            ->orderBy($finalOrderColumn, $orderDirection);

        // Filter kolom
        foreach ($columns as $column) {
            $columnSearchValue = $column['search']['value'] ?? null;
            $columnName = $column['data'];
            if (empty($columnSearchValue) || in_array($columnName, ['DT_RowIndex', 'action'])) {
                continue;
            } else if ($columnName == 'status') {
                if (strpos(strtolower($columnSearchValue), 'non') !== false)
                    $data->where('status', '=', 0);
                else
                    $data->where('status', '=', 1);
            } else {
                $data->where($columnName, 'like', "%{$columnSearchValue}%");
            }
        }

        return DataTables::of($data)
            ->addIndexColumn() // Adds DT_RowIndex for serial number
            ->addColumn('id', function ($row) {
                return $row->id;
            })
            ->addColumn('name', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' . e($row->name) . '">'
                    . \Str::limit(e($row->name), 30)
                    . '</span>';
            })
            ->addColumn('slug', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' . e($row->slug) . '">'
                    . \Str::limit(e($row->slug), 30)
                    . '</span>';
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
                    data-model="Category">
                    ' . ($row->status == 1 ? 'Aktif' : 'Non aktif') . '
                </button>';
            })
            ->addColumn('action', function ($row) {
                return '-';
            })
            ->orderColumn('id', 'id $1')
            ->rawColumns(['name', 'slug', 'description', 'status', 'action']) // Allow HTML rendering
            ->make(true);
    }
}
