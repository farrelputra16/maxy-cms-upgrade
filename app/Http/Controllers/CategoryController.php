<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Auth;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    function getCategory(){
        // $Categorys = Category::all();

        return view('category.indexv3');

    }

    function getCategoryData(Request $request){
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

        $category = Category::select('id', 'name', 'description', 'created_at', 'created_id', 'updated_at', 'updated_id', 'status')
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
            if (empty($columnSearchValue) || in_array($columnName, ['DT_RowIndex', 'action'])) {
                continue;
            } else if ($columnName == 'status') {
                if ($columnSearchValue == 'active')
                    $category->where('status', '=', 1);
                else
                    $category->where('status', '=', 0);
            } else {
                $category->where($columnName, 'like', "%{$columnSearchValue}%");
            }
        }

        return DataTables::of($category)
            ->addIndexColumn() // Adds DT_RowIndex for serial number
            ->addColumn('id', function ($row) {
                return $row->id;
            })
            ->addColumn('name', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' . e($row->name) . '">'
                    . \Str::limit(e($row->name), 30)
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
                return '<a href="' . route('getEditCategory', ['id' => $row->id]) . '"
                            class="btn btn-primary rounded">Ubah</a>';
            })
            ->orderColumn('id', 'id $1')
            ->rawColumns(['name', 'slug', 'description', 'status', 'action']) // Allow HTML rendering
            ->make(true);
    }
    function getAddCategory(){

        return view('category.addv3');
    }

    function postAddCategory(Request $request){
        //return dd($request);
        $validated= $request->validate([
            'name' => 'required',
        ]);

        if ($validated){
            $image = '';
            $create = Category::create([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id,
            ]);
            if ($create)
                return app(HelperController::class)->Positive('getCategory');
            else
                return app(HelperController::class)->Negative('getCategory');
        }
    }

    function getEditCategory(Request $request){
        $idCategory = $request->id;
        $Category = Category::find($idCategory);

        return view('category.editv3',[
            'Category' => $Category,
        ]);
    }

    function postEditCategory(Request $request){

        $validated= $request->validate([
            'name' => 'required',
        ]);

        $idCategory = $request->id;

        $updateData = Category::where('id', $idCategory)
            ->update([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0
            ]);

        if ($updateData){
            return app(HelperController::class)->Positive('getCategory');
        } else{
            return app(HelperController::class)->Warning('getCategory');
        }
    }
}
