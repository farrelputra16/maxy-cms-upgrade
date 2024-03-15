<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;
use illuminate\Support\Facades\Auth;

class RedeemCode extends Model
{
    use HasFactory;

    protected $table = 'redeem_code';

    

    protected $guarded = [];
    protected $with = ['userCreated', 'userUpdated'];

    public function userCreated()
    {
        return $this->belongsTo(User::class, 'created_id', 'id');
    }

    public function userUpdated()
    {
        return $this->belongsTo(User::class, 'updated_id', 'id');
    }

    public static function postEditRedeemCode($request){
        $idRedeemCode = $request->id;
    
        $Update = DB::table('redeem_code')->where('id', '=', $idRedeemCode)
            ->update([
                'name' => $request->name,
                'code' => $request->code,
                'quota' => $request->quota,
                'type' => $request->type,
                'expired_date' => $request->expired_date,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id
            ]);
        return $Update;
    }

    public static function RemoveUpdate($request)
    {
        $idRedeemCode = $request->id;

        $removeUpdate = DB::table('course_class_redeem_code')
            ->where('redeem_code_id', '=', $idRedeemCode)
            ->whereIn('course_class_id', $request->get('access_master_old'))
            ->delete();

        return $removeUpdate;
    }

    public static function InsertUpdate($request)
    {
        $inputData = $request->all();

    // Ambil nilai redeem_code_id
        $redeemCodeId = $inputData['id'];

        // Ambil nilai course_class_id dari 'access_master_available'
        $courseClassIds = $inputData['access_master_available'];

        // Buat array untuk setiap baris data yang akan dimasukkan
        $dataToInsert = [];
        foreach ($courseClassIds as $courseClassId) {
            $dataToInsert[] = [
                'redeem_code_id' => $redeemCodeId,
                'course_class_id' => $courseClassId,
            ];
        }

        // Lakukan multi-insert
        $insertedRows = DB::table('course_class_redeem_code')->insert($dataToInsert);

        return $insertedRows;

    }
}
