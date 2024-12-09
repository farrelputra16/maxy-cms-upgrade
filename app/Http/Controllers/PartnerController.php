<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\MPartnerType;
use Auth;
use DB;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PartnerController extends Controller
{
    //
    function getPartner(){
        // $partners = Partner::with('MPartnerType')->get();
        // return view('partner.indexv3', ['partners' => $partners]);
        return view('partner.indexv3');
    }

    function getPartnerData(Request $request){
        $searchValue = $request->input('search.value');
        $orderColumnIndex = $request->input('order.1.column');
        $orderDirection = $request->input('order.1.dir', 'asc');
        $columns = $request->input('columns');//dd($orderDirection);

        $orderColumn = 'id';
        if ($orderColumnIndex !== null && isset($columns[$orderColumnIndex])) {
            $orderColumn = $columns[$orderColumnIndex]['data'];
        }

        $partners = Partner::with('MPartnerType')
            ->select('id', 'name', 'logo', 'm_partner_type_id', 'url', 'address', 'phone', 'email', 'contact_person', 'status_highlight', 'description', 'created_at', 'created_id', 'updated_at', 'updated_id', 'status')
            ->orderBy($orderColumn, $orderDirection);

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

        foreach ($columns as $column) {
            $columnSearchValue = $column['search']['value'] ?? null;
            $columnName = $column['data'];
            if (empty($columnSearchValue) || in_array($columnName, ['DT_RowIndex', 'action'])) {
                continue;
            } else if ($columnName == 'm_partner_type') {
                $partners->whereHas('MPartnerType', function ($query) use ($columnSearchValue) {
                    $query->where('name', 'like', "%{$columnSearchValue}%");
                });
            } else if ($columnName == 'status_highlight') {
                if (strpos(strtolower($columnSearchValue), 'non') !== false)
                    $partners->where('status_highlight', '=', 0);
                else
                    $partners->where('status_highlight', '=', 1);
            } else if ($columnName == 'status') {
                if (strpos(strtolower($columnSearchValue), 'non') !== false)
                    $partners->where('status', '=', 0);
                else
                    $partners->where('status', '=', 1);
            } else {
                $partners->where($columnName, 'like', "%{$columnSearchValue}%");
            }
        }

        return DataTables::of($partners)
            ->addIndexColumn() // Adds DT_RowIndex for serial number
            ->addColumn('id', function ($row) {
                return $row->id;
            })
            ->addColumn('name', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' . e($row->name) . '">'
                    . \Str::limit(e($row->name), 30)
                    . '</span>';
            })
            ->addColumn('logo', function ($row) {
                return '<img src="' . asset('uploads/partner/' . $row->logo) . '" style="max-width: 100px; height: auto;">';
            })
            ->addColumn('m_partner_type', function ($row) {
                return $row->MPartnerType->name ?? '-'; // Safely access the related model
            })
            ->addColumn('url', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' . e($row->url) . '">'
                    . \Str::limit(e($row->url), 30)
                    . '</span>';
            })
            ->addColumn('address', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' 
                    . e(strip_tags($row->address)) . '">' 
                    . (!empty($row->address) ? \Str::limit(strip_tags($row->address), 30) : '-') 
                    . '</span>';
            })
            ->addColumn('phone', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' 
                    . e(strip_tags($row->phone)) . '">' 
                    . (!empty($row->phone) ? \Str::limit(strip_tags($row->phone), 30) : '-') 
                    . '</span>';
            })
            ->addColumn('email', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' 
                    . e(strip_tags($row->email)) . '">' 
                    . (!empty($row->email) ? \Str::limit(strip_tags($row->email), 30) : '-') 
                    . '</span>';
            })
            ->addColumn('contact_person', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' 
                    . e(strip_tags($row->contact_person)) . '">' 
                    . (!empty($row->contact_person) ? \Str::limit(strip_tags($row->contact_person), 30) : '-') 
                    . '</span>';
            })
            ->addColumn('status_highlight', function ($row) {
                return $row->status_highlight == 1 
                    ? '<span class="badge bg-success">Aktif</span>' 
                    : '<span class="badge bg-danger">Non Aktif</span>';
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
                    data-model="Partner">
                    ' . ($row->status == 1 ? 'Aktif' : 'Non aktif') . '
                </button>';
            })
            ->addColumn('action', function ($row) {
                return '<a href="' . route('getEditPartner', ['id' => $row->id]) . '" 
                            class="btn btn-primary rounded">Ubah</a>';
            })
            ->orderColumn('id', 'id $1')
            ->rawColumns(['name', 'logo', 'url', 'address', 'phone', 'email', 'contact_person', 'status_highlight', 'description', 'status', 'action']) // Allow HTML rendering
            ->make(true);
    }

    function getAddPartner() {
        $partnerTypes = MPartnerType::where('status', 1)->get();
        return view('partner.addv3', ['partnerTypes' => $partnerTypes]);
    }

    function postAddPartner(Request $request){
        $fileName = null;
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('/uploads/partner'), $fileName);
        }

        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required',
            'url' => 'required|url|max:255',
            'address' => 'required|string|max:65355',
            'email' => 'required|email|max:255',
            'phone' => 'required|regex:/^\+?[0-9\s\-]+$/|min:10',
            'contact_person' => 'required',
        ]);

        if ($validate){
            $create = Partner::create([
                'name' => $request->name,
                'm_partner_type_id' => $request->type,
                'logo' => $fileName,
                'url' => $request->url,
                'address' => $request->address,
                'email' => $request->email,
                'phone' => $request->phone,
                'contact_person' => $request->contact_person,
                'status_highlight' => $request->status_highlight ? 1 : 0,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id
            ]);

            if ($create){
                return app(HelperController::class)->Positive('getPartner');
            } else {
                return app(HelperController::class)->Negative('getPartner');
            }
        }
    }

    function getEditPartner(Request $request){
        $partners = Partner::find($request->id);
        $partnerTypes = MPartnerType::where('status', 1)->get();
        return view('partner.editv3', ['partners' => $partners, 'partnerTypes' => $partnerTypes]);
    }

    function postEditPartner(Request $request){


        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('/uploads/partner'), $fileName);
        }
        else{
            $fileName = $request->img_keep;
        }

        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required',
            'url' => 'required|url|max:255',
            'address' => 'required|string|max:65355',
            'email' => 'required|email|max:255',
            'phone' => 'required|regex:/^\+?[0-9\s\-]+$/|min:10',
            'contact_person' => 'required',
        ]);

        if ($validate){
            $update = Partner::where('id', $request->id)
                ->update([
                    'name' => $request->name,
                    'm_partner_type_id' => $request->type,
                    'logo' => $fileName,
                    'url' => $request->url,
                    'address' => $request->address,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'contact_person' => $request->contact_person,
                    'status_highlight' => $request->status_highlight ? 1 : 0,
                    'description' => $request->description,
                    'status' => $request->status ? 1 : 0,
                    'updated_id' => auth()->user()->id
                ]);

            if ($update){
                return app(HelperController::class)->Positive('getPartner');
            } else {
                return app(HelperController::class)->Warning('getPartner');
            }
        }
    }
}
