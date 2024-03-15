<?php

namespace App\Models;
use DB;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Modules\Enrollment\Entities\CourseClassMember;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'partner_id',
        'access_group_id',
        'status',
        'created_id',
        'updated_id',
        'nickname',
        'referal' ,
        'date_of_birth',
        'university',
        'major',
        'semester',
        'city',
        'country',
        'postal_code',
        'm_province_id',
        'linked_in',
        'request' ,
        'profile_picture' ,
        'm_partner_id' ,
        'phone',
        'address' ,
        'email_verified' ,
        'email_verified_at',
        'supervisor_name',
        'supervisor_email'
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function courseClassMembers(){
        return $this->hasMany(CourseClassMember::class, 'user_id');
    }

    public static function getAllUserWithAccessGroup(){
        $users = collect(DB::select('SELECT users.*,
            access_group.name AS accessgroup
            FROM users
            INNER JOIN access_group ON users.access_group_id = access_group.id'
        ));
        return $users;
    }
}
