<?php

namespace App\Http\Controllers;

use App\Jobs\GoKampusDataSyncJob;
use App\Models\AccessMaster;
use App\Models\CourseClass;
use App\Models\Partnership;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Auth\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function getDashboard()
    {
        $accessMaster = AccessMaster::count();
        $user = User::count();

        // ambil data active class
        // $active_class_list = [
        //     ['course_name' => 'Backend', 'batch' => 1, 'class_id' => 1],
        //     ['course_name' => 'Frontend', 'batch' => 1, 'class_id' => 2],
        //     ['course_name' => 'UI/UX', 'batch' => 1, 'class_id' => 3],
        //     ['course_name' => 'Digital Marketing', 'batch' => 1, 'class_id' => 4]
        // ];
        $active_class_list = CourseClass::getActiveClass();

        // $totalStu = DB::table('users')->get();
        $totalStu = User::where('access_group_id', 2)->count();
        $stuActive = User::where('access_group_id', 2)->where('status', 1)->count();

        $now = Carbon::now();
        $oneMonthFromNow = $now->copy()->addMonth();
        $partnerships = Partnership::with(['Partner', 'MPartnershipType'])
            ->where('date_end', '<', $oneMonthFromNow)
            ->where('date_end', '>', $now)
            ->get();

        return view('dashboard.index-v2', [
            'accessMaster' => $accessMaster,
            'user' => $user,
            'active_class_list' => $active_class_list,
            'totalStu' => $totalStu,
            'stuActive' => $stuActive,
            'partnerships' => $partnerships,
        ]);
    }
    public function getDashboard2()
    {
        return view('dashboard.index-v2');
    }

    // public function generateToken($email, $name)
    // {
    //     $secretKey = '4D6351655468576D5A7134743777217A25432A462D4A614E645267556A586E32';
    //     $token = sha1($email . '|' . $secretKey);

    //     $response = Http::post('https://athena.gokampus.com/auth/login-register', [
    //         'token' => $token,
    //         'email' => $email,
    //         'name' => $name,
    //         'referral' => 'maxy', // maxy-academy (dev), maxy (prod)
    //     ]);

    //     session()->put('token', $response->json()['token']);

    //     return $response;
    // }

    public function synchronizeData()
    {
        GoKampusDataSyncJob::dispatch(auth()->user());
    }
}
