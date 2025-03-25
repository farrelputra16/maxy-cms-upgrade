<?php

namespace App\Http\Controllers;

use App\Jobs\GoKampusDataSyncJob;
use App\Models\AccessMaster;
use App\Models\CourseClass;
use App\Models\Event;
use App\Models\Partnership;
use App\Models\Partner;
use App\Models\User;
use App\Models\UserMentorship;
use Illuminate\Support\Facades\Http;
// use Illuminate\Foundation\Auth\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function getDashboard()
    {
        $accessMaster = AccessMaster::count();
        $user = User::count();
        $loggedInUserId = auth()->user()->id;
        $universityCount = Partner::where('m_partner_type_id', '2')->count(); //Menghitung jumlah University
        $companyCount = Partner::where('m_partner_type_id', '1')->count(); // Menghitung jumlah company
        $studentCount = User::where('type', 'member')->count(); // Menghitung jumlah student
        $activeStudentCount = User::where('type', 'member')->where('status', 1)->count(); // Menghitung jumlah student yang aktif
        $inactiveStudentCount = User::where('type', 'member')->where('status', 0)->count(); // Menghitung jumlah student yang tidak aktif
        $activeEvents = Event::where('status', 1)->get();
        $activePartnerships = Partnership::where('status', 1)->with('Partner', 'MPartnershipType')->get();

        $active_class_list = auth()->user()->access_group_id == 3 ? UserMentorship::getActiveClass($loggedInUserId) : CourseClass::getActiveClass();

        $now = Carbon::now();
        $oneMonthFromNow = $now->copy()->addMonth();
        $partnerships = Partnership::with(['Partner', 'MPartnershipType'])
            ->where('date_end', '<', $oneMonthFromNow)
            ->where('date_end', '>', $now)
            ->get();

            $admin = User::with('accessGroup')
            ->where('id', $loggedInUserId) // Filter berdasarkan user yang login
            ->first(); // Karena hanya satu user, gunakan first()
        // dd($admin);


        return view('dashboard.index-v2', [
            'accessMaster' => $accessMaster,
            'user' => $user,
            'active_class_list' => $active_class_list,
            'partnerships' => $partnerships,
            'admin' => $admin,
            'universityCount' => $universityCount,
            'companyCount' => $companyCount,
            'studentCount' => $studentCount,
            'activeStudentCount' => $activeStudentCount,
            'inactiveStudentCount' => $inactiveStudentCount,
            'activeEvents' => $activeEvents,
            'activePartnerships' => $activePartnerships
        ]);
    }
}
