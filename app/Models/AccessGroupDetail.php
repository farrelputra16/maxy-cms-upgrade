<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessGroupDetail extends Model
{
    use HasFactory;

    protected $table = 'access_group_detail';

    protected $fillable = [
        'id_access_group',
        'id_access_master',
        'priority',
    ];

    
    public static function CurrentAccessGroupDetail($idaccessgroup){
        $currentaccessgroupdetail = DB::table('access_group_detail')
        ->join('access_master', 'access_group_detail.access_master_id', '=', 'access_master.id')
        ->select('access_master.id', 'access_master.name')
        ->where('access_group_detail.access_group_id', '=', $idaccessgroup)
        ->get();

        return $currentaccessgroupdetail;
    }
}
