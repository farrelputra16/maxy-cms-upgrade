<?php

namespace App\Models;
use DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessMaster extends Model
{
    use HasFactory;

    protected $table = 'access_master';

    protected $fillable = [
        'name',
        'description',
        'status',
        'created_at',
        'created_id',
        'updated_at',
        'updated_id'
    ];

    public function AccessGroups()
    {
        return $this->belongsToMany(AccessGroup::class, 'access_group_detail')->withPivot('id_access_group');
    }
    
    public static function AllAccessMaster(){
        $allAccessMaster = DB::table('access_master')
        ->select('id','name')
        ->get();

        return $allAccessMaster;
    }

    public static function postEditAccessMaster($request){
        $idaccessmaster = $request->id;
        DB::table('access_master')
            ->where('id', '=', $idaccessmaster)
            ->update([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id
            ]);
    }
}
