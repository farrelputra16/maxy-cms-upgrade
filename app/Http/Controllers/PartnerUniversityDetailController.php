<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\PartnerUniversityDetail;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PartnerUniversityDetailController extends Controller
{
    //
    function getPartnerUniversityDetail(){
        $partnerUnniversities = DB::table('partner_university_detail')
            ->join('m_partner', 'partner_university_detail.m_partner_id', '=', 'm_partner.id')
            ->select(
                DB::raw('
                    partner_university_detail.id AS pud_id,
                    partner_university_detail.name AS pud_name,
                    partner_university_detail.ref AS pud_ref,
                    partner_university_detail.type AS pud_type,
                    m_partner.name AS partner_name,
                    partner_university_detail.description AS pud_description,
                    partner_university_detail.status AS pud_status,
                    partner_university_detail.created_at AS pud_created_at,
                    partner_university_detail.updated_at AS pud_updated_at
                '))->get();

        return view('partner_university_detail.index', ['partnerUniversitiesDetail' => $partnerUnniversities]);
    }

    function getAddPartnerUniversityDetail(){
        $partners = Partner::all();
        return view('partner_university_detail.add', ['partners' => $partners]);
    }

    function postAddPartnerUniversityDetail(Request $request){
        $validate = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'partner_id' => 'required'
        ]);

        if ($validate){
            $create = PartnerUniversityDetail::create([
                'name' => $request->name,
                'type' => $request->type,
                'ref' => $request->ref,
                'm_partner_id' => $request->partner_id,
                'description' => $request->description,
                'status' => $request->status == 1 ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id
            ]);

            if ($create){
                return app(HelperController::class)->Positive('getPartnerUniversityDetail');
            } else {
                return app(HelperController::class)->Negative('getPartnerUniversityDetail');
            }
        }
    }

    function getEditPartnerUniversityDetail(Request $request){
        $currentData = DB::table('partner_university_detail')
            ->join('partner', 'partner_university_detail.m_partner_id', '=', 'm_partner.id')
            ->select(
                DB::raw('
                    partner_university_detail.id AS pud_id,
                    partner_university_detail.name AS pud_name,
                    partner_university_detail.ref AS pud_ref,
                    partner_university_detail.type AS pud_type,
                    m_partner.id AS partner_id,
                    m_partner.name AS partner_name,
                    partner_university_detail.description AS pud_description,
                    partner_university_detail.status AS pud_status,
                    partner_university_detail.created_at AS pud_created_at,
                    partner_university_detail.updated_at AS pud_updated_at
                '))
            ->where('partner_university_detail.id', '=', $request->id)
            ->first();
        
            // return dd($currentData);
            
        $allPartnerUniversitiesDetail = Partner::where('id', '!=', $request->id)->get();

        return view('partner_university_detail.edit', [
            'currentData' => $currentData,
            'allPartnerUniversitiesDetail' => $allPartnerUniversitiesDetail
        ]);
    }

    function postEditPartnerUniversityDetail(Request $request){
        $update = DB::table('partner_university_detail')->where('id', $request->id)
            ->update([
                'name' => $request->name,
                'type' => $request->type,
                'ref' => $request->ref,
                'm_partner_id' => $request->partner_id,
                'description' => $request->description,
                'status' => $request->status == 1 ? 1 : 0,
                'updated_id' => Auth::user()->id
            ]);
        
        if ($update){
            return app(HelperController::class)->Positive('getPartnerUniversityDetail');
        } else {
            return app(HelperController::class)->Warning('getPartnerUniversityDetail');
        }
    }
}

