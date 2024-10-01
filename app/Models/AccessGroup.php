<?php

namespace App\Models;
use DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessGroup extends Model
{
    use HasFactory;

    protected $table = 'access_group';
    protected $fillable = [
        'name',
        'description',
        'status',
        'created_at',
        'created_id',
        'updated_at',
        'updated_id'
    ];

    public function AccessMaster()
    {
        return $this->belongsToMany(AccessMaster::class, 'access_group_detail')->withPivot('access_master_id');
    }

        public function users()
        {
            return $this->hasMany(User::class, 'access_group_id');
        }

    public static function postEditAccessGroup($request){
        $idAccessGroup = $request->id;
        DB::table('access_group')->where('id', '=', $idAccessGroup)
                ->update([
                    'name' => $request->name,
                    'description' => $request->description,
                    'status' => $request->status ? 1 : 0,
                    'updated_id' => Auth::user()->id
                ]);
    }
}
