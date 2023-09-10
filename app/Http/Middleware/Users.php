<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Users
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $access)
    {

        $broGotAccess = collect(DB::select('SELECT 
            access_master.name as access_master_name, 
            access_group.name, 
            access_group_detail.access_group_id, 
            access_group_detail.access_master_id
            FROM access_group_detail 
            INNER JOIN access_master ON access_group_detail.access_master_id = access_master.id 
            INNER JOIN access_group ON access_group_detail.access_group_id = access_group.id 
            WHERE access_group.id = ? AND access_master.name = ?;', [Auth::user()->access_group_id, $access]));

        // return dd(Auth::user()->access_group_id);

        if (Auth::check() && count($broGotAccess) == 1){
            return $next($request);
        }

        return redirect('/noauthority');
    }
}
