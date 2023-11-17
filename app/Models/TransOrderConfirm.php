<?php

namespace App\Models;
use DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransOrderConfirm extends Model
{
    use HasFactory;

    protected $table = 'trans_order_confirm';
}
