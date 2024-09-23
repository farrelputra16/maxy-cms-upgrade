<?php

namespace App\Models;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
        return self::pluck("name", "id")->toArray();
    }

    public static function getUserAccessMaster(){

        $broGotAccessMaster = DB::table('access_group_detail')
            ->join('access_group', 'access_group_detail.access_group_id', '=', 'access_group.id')
            ->join('access_master', 'access_group_detail.access_master_id', '=', 'access_master.id')
            ->select('access_master.name')
            ->where('access_group.id', '=', Auth::user()->access_group_id)
            ->get();

        return $broGotAccessMaster;
    }

    public static function postEditAccessMaster($request){
        $idaccessmaster = $request->id;
        return (DB::table('access_master')
            ->where('id', '=', $idaccessmaster)
            ->update([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id
            ]));
    }
}
