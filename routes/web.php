<?php

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseClassMemberController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseClassController;
use App\Http\Controllers\CourseClassMemberHistoryController;
use App\Http\Controllers\CourseModuleController;
use App\Http\Controllers\CoursePackageBenefitController;
use App\Http\Controllers\CoursePackageController;
use App\Http\Controllers\CourseClassModuleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AccessGroupController;
use App\Http\Controllers\AccessMasterController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PartnerUniversityDetailController;
use App\Http\Controllers\TransOrderConfirmationController;
use App\Http\Controllers\TransOrderConfirmController;
use App\Http\Controllers\TransOrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MDifficultyTypeController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\MaxyTalkController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\RedeemCodeController;
use App\Http\Controllers\MCourseTypeController;
use App\Http\Controllers\MiscController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MProposalTypeController;
use App\Http\Controllers\MProposalStatusController;
use App\Http\Controllers\MEventTypeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\MPartnershipTypeController;
use App\Http\Controllers\MJobdescController;
use App\Http\Controllers\PartnershipController;
use App\Http\Controllers\MSurveyController;
use App\Http\Controllers\MAcademicPeriodController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\MScoreController;
use App\Http\Controllers\TranskripController;
use App\Http\Controllers\CourseAccredifyController;
use App\Http\Controllers\EmailTemplateAccredifyController;
use App\Http\Controllers\CreateEmailTemplateController;
use App\Http\Controllers\BadgesAccredifyController;
use App\Http\Controllers\CreateCoursesAccredifyController;
use App\Http\Controllers\CreateBadgesAccredifyController;
use App\Http\Controllers\CoursesAccredifyController;
use App\Http\Controllers\CoAccreController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\PageController;


// jago digital controller ###########################################################################################################
use App\Http\Controllers\AgentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CreateCoursesAccController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (Auth::user()) {
        return redirect()->route('getDashboard');
    } else {
        return redirect()->route('login');
    }
})->name('welcome');

// Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/login', [AuthController::class, 'getLogin'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('postLogin');
Route::post('/logout', [AuthController::class, 'postLogout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'getDashboard'])->name('getDashboard');
    Route::get('/dashboard2', [DashboardController::class, 'getDashboard2'])->name('getDashboard2');
    Route::get('/dashboard/synchronize', [DashboardController::class, 'synchronizeData'])->name('synchronizeData');
    // Route::get('/student-status-data', [DashboardController::class, 'getStudentStatusData']);

    Route::get('/profile', function () {
        return view('profile.indexv3');
    })->name('profile');

    // course route ###########################################################################################################
    Route::get('/course', [CourseController::class, 'getCourse'])->name('getCourse')->middleware('access:course_manage');

    Route::get('/course/add', [CourseController::class, 'getAddCourse'])->name('getAddCourse')->middleware('access:course_create');
    Route::post('/course/add', [CourseController::class, 'postAddCourse'])->name('postAddCourse')->middleware('access:course_create');

    Route::get('/course/edit', [CourseController::class, 'getEditCourse'])->name('getEditCourse')->middleware('access:course_update');
    Route::post('/course/edit', [CourseController::class, 'postEditCourse'])->name('postEditCourse')->middleware('access:course_update');

    Route::get('/course/MBKM', [CourseController::class, 'getCourseMBKM'])->name('getCourseMBKM')->middleware('access:course_manage');

    Route::get('/course/add/MBKM', [CourseController::class, 'getAddMBKM'])->name('getAddMBKM')->middleware('access:course_create');

    Route::get('/course/edit/MBKM', [CourseController::class, 'getEditMBKM'])->name('getEditMBKM')->middleware('access:course_update');

    // categori route ###########################################################################################################
    Route::get('/category', [CategoryController::class, 'getCategory'])->name('getCategory')->middleware('access:category_manage');

    Route::get('/category/add', [CategoryController::class, 'getAddCategory'])->name('getAddCategory')->middleware('access:category_create');
    Route::post('/category/add', [CategoryController::class, 'postAddCategory'])->name('postAddCategory')->middleware('access:category_create');

    Route::get('/category/edit', [CategoryController::class, 'getEditCategory'])->name('getEditCategory')->middleware('access:category_update');
    Route::post('/category/edit', [CategoryController::class, 'postEditCategory'])->name('postEditCategory')->middleware('access:category_update');

    // dummy attendance route ###########################################################################################################
    // Route::get('/attendance', [AttendanceController::class, 'getAttendance'])->name('getAttendance')->middleware('access:prodi_manage');

    //course package route ###################################################################################################
    Route::get('/course/package', [CoursePackageController::class, 'getCoursePackage'])->name('getCoursePackage')->middleware('access:course_package_manage');

    Route::get('/course/package/add', [CoursePackageController::class, 'getAddCoursePackage'])->name('getAddCoursePackage')->middleware('access:course_package_create');
    Route::post('/course/package/add', [CoursePackageController::class, 'postAddCoursePackage'])->name('postAddCoursePackage')->middleware('access:course_package_create');

    Route::get('/course/package/edit', [CoursePackageController::class, 'getEditCoursePackage'])->name('getEditCoursePackage')->middleware('access:course_package_update');
    Route::post('/course/package/edit', [CoursePackageController::class, 'postEditCoursePackage'])->name('postEditCoursePackage')->middleware('access:course_package_update');

    //course package benefit route
    Route::get('/course/package/benefit', [CoursePackageBenefitController::class, 'getCoursePackageBenefit'])->name('getCoursePackageBenefit')->middleware('access:course_package_benefit_manage');

    Route::get('/course/package/benefit/add', [CoursePackageBenefitController::class, 'getAddCoursePackageBenefit'])->name('getAddCoursePackageBenefit')->middleware('access:course_package_benefit_create');
    Route::post('/course/package/benefit/add', [CoursePackageBenefitController::class, 'postAddCoursePackageBenefit'])->name('postAddCoursePackageBenefit')->middleware('access:course_package_benefit_create');

    Route::get('/course/package/benefit/edit', [CoursePackageBenefitController::class, 'getEditCoursePackageBenefit'])->name('getEditCoursePackageBenefit')->middleware('access:course_package_benefit_update');
    Route::post('/course/package/benefit/edit', [CoursePackageBenefitController::class, 'postEditCoursePackageBenefit'])->name('postEditCoursePackageBenefit')->middleware('access:course_package_benefit_update');

    Route::delete('/course/package/benefit/delete/{id}', [CoursePackageBenefitController::class, 'deleteCoursePackageBenefit'])->name('deleteCoursePackageBenefit')->middleware('access:course_package_benefit_delete');

    // course module ##########################################################################################################
    Route::get('/course/module', [CourseModuleController::class, 'getCourseModule'])->name('getCourseModule')->middleware('access:course_module_manage');

    Route::get('/course/module/add', [CourseModuleController::class, 'getAddCourseModule'])->name('getAddCourseModule')->middleware('access:course_module_create');
    Route::post('/course/module/add', [CourseModuleController::class, 'postAddCourseModule'])->name('postAddCourseModule')->middleware('access:course_module_create');

    Route::get('/course/module/edit', [CourseModuleController::class, 'getEditCourseModule'])->name('getEditCourseModule')->middleware('access:course_module_update');
    Route::post('/course/module/edit', [CourseModuleController::class, 'postEditCourseModule'])->name('postEditCourseModule')->middleware('access:course_module_update');

    // Route::get('/course/module/child', [CourseModuleController::class, 'getCourseChildModule'])->name('getCourseChildModule')->middleware('access:course_module_manage');

    // Route::get('/course/module/child/add', [CourseModuleController::class, 'getAddChildModule'])->name('getAddChildModule')->middleware('access:course_module_create');
    // Route::post('/course/module/child/add', [CourseModuleController::class, 'postAddChildModule'])->name('postAddChildModule')->middleware('access:course_module_create');

    // Route::get('/course/module/child/edit', [CourseModuleController::class, 'getEditChildModule'])->name('getEditChildModule')->middleware('access:course_module_update');
    // Route::post('/course/module/child/edit', [CourseModuleController::class, 'postEditChildModule'])->name('postEditChildModule')->middleware('access:course_module_update');

    Route::get('/course/module/child', [CourseModuleController::class, 'getCourseSubModule'])->name('getCourseSubModule')->middleware('access:course_module_manage');
    Route::get('/course/module/child', [CourseModuleController::class, 'getCourseSubModule'])->name('getCourseSubModule')->middleware('access:course_module_manage');
    Route::get('/course/module/child/add', [CourseModuleController::class, 'getAddCourseChildModule'])->name('getAddCourseChildModule')->middleware('access:course_module_create');
    Route::post('/course/module/child/add', [CourseModuleController::class, 'postAddChildModule'])->name('postAddChildModule')->middleware('access:course_module_create');
    Route::get('/course/module/child/edit', [CourseModuleController::class, 'getEditChildModule'])->name('getEditChildModule')->middleware('access:course_module_update');
    Route::post('/course/module/child/edit', [CourseModuleController::class, 'postEditChildModule'])->name('postEditChildModule')->middleware('access:course_module_update');


    Route::get('/course/module/delete/{id}', [CourseModuleController::class, 'deleteCourseModule'])->name('deleteCourseModule')->middleware('access:course_module_delete');

    // difficulty course route
    Route::get('/course/difficulty', [MDifficultyTypeController::class, 'getDifficulty'])->name('getDifficulty')->middleware('access:m_difficulty_type_manage');

    Route::get('/course/difficulty/add', [MDifficultyTypeController::class, 'getAddDifficulty'])->name('getAddDifficultyType')->middleware('access:m_difficulty_type_create');
    Route::post('/course/difficulty/add', [MDifficultyTypeController::class, 'postAddDifficulty'])->name('postAddDifficultyType')->middleware('access:m_difficulty_type_create');

    Route::get('/course/difficulty/edit', [MDifficultyTypeController::class, 'getEditDifficulty'])->name('getEditDifficultyType')->middleware('access:m_difficulty_type_update');
    Route::post('/course/difficulty/edit', [MDifficultyTypeController::class, 'postEditDifficulty'])->name('postEditDifficultyType')->middleware('access:m_difficulty_type_update');

    // course type
    Route::get('/course/type', [MCourseTypeController::class, 'getCourseType'])->name('getCourseType')->middleware('access:m_Course_type_manage');

    Route::get('/course/type/add', [MCourseTypeController::class, 'getAddCourseType'])->name('getAddCourseType')->middleware('access:m_Course_type_create');
    Route::post('/course/type/add', [MCourseTypeController::class, 'postAddCourseType'])->name('postAddCourseType')->middleware('access:m_Course_type_create');

    Route::get('/course/type/edit', [MCourseTypeController::class, 'getEditCourseType'])->name('getEditCourseType')->middleware('access:m_Course_type_update');
    Route::post('/course/type/edit', [MCourseTypeController::class, 'postEditCourseType'])->name('postEditCourseType')->middleware('access:m_Course_type_update');

    // proposal type
    Route::get('/proposal/type', [MProposalTypeController::class, 'getProposalType'])->name('getProposalType')->middleware('access:m_proposal_type_manage');

    Route::get('/proposal/type/add', [MProposalTypeController::class, 'getAddProposalType'])->name('getAddProposalType')->middleware('access:m_proposal_type_create');
    Route::post('/proposal/type/add', [MProposalTypeController::class, 'postAddProposalType'])->name('postAddProposalType')->middleware('access:m_proposal_type_create');

    Route::get('/proposal/type/edit', [MProposalTypeController::class, 'getEditProposalType'])->name('getEditProposalType')->middleware('access:m_proposal_type_update');
    Route::post('/proposal/type/edit', [MProposalTypeController::class, 'postEditProposalType'])->name('postEditProposalType')->middleware('access:m_proposal_type_update');

    // proposal status
    Route::get('/proposal/status', [MProposalStatusController::class, 'getProposalStatus'])->name('getProposalStatus')->middleware('access:m_proposal_status_manage');

    Route::get('/proposal/status/add', [MProposalStatusController::class, 'getAddProposalStatus'])->name('getAddProposalStatus')->middleware('access:m_proposal_status_create');
    Route::post('/proposal/status/add', [MProposalStatusController::class, 'postAddProposalStatus'])->name('postAddProposalStatus')->middleware('access:m_proposal_status_create');

    Route::get('/proposal/status/edit', [MProposalStatusController::class, 'getEditProposalStatus'])->name('getEditProposalStatus')->middleware('access:m_proposal_status_update');
    Route::post('/proposal/status/edit', [MProposalStatusController::class, 'postEditProposalStatus'])->name('postEditProposalStatus')->middleware('access:m_proposal_status_update');

    // Event type
    Route::get('/event/type', [MEventTypeController::class, 'getEventType'])->name('getEventType')->middleware('access:m_event_type_manage');

    Route::get('/event/type/add', [MEventTypeController::class, 'getAddEventType'])->name('getAddEventType')->middleware('access:m_event_type_create');
    Route::post('/event/type/add', [MEventTypeController::class, 'postAddEventType'])->name('postAddEventType')->middleware('access:m_event_type_create');

    Route::get('/event/type/edit', [MEventTypeController::class, 'getEditEventType'])->name('getEditEventType')->middleware('access:m_event_type_update');
    Route::post('/event/type/edit', [MEventTypeController::class, 'postEditEventType'])->name('postEditEventType')->middleware('access:m_event_type_update');

    // Partnership type
    Route::get('/partnership/type', [MPartnershipTypeController::class, 'getPartnershipType'])->name('getPartnershipType')->middleware('access:m_partnership_type_manage');

    Route::get('/partnership/type/add', [MPartnershipTypeController::class, 'getAddPartnershipType'])->name('getAddPartnershipType')->middleware('access:m_partnership_type_create');
    Route::post('/partnership/type/add', [MPartnershipTypeController::class, 'postAddPartnershipType'])->name('postAddPartnershipType')->middleware('access:m_partnership_type_create');

    Route::get('/partnership/type/edit', [MPartnershipTypeController::class, 'getEditPartnershipType'])->name('getEditPartnershipType')->middleware('access:m_partnership_type_update');
    Route::post('/partnership/type/edit', [MPartnershipTypeController::class, 'postEditPartnershipType'])->name('postEditPartnershipType')->middleware('access:m_partnership_type_update');

    // Jobdesc
    Route::get('/jobdesc', [MJobdescController::class, 'getJobdesc'])->name('getJobdesc')->middleware('access:m_jobdesc_manage');

    Route::get('/jobdesc/add', [MJobdescController::class, 'getAddJobdesc'])->name('getAddJobdesc')->middleware('access:m_jobdesc_create');
    Route::post('/jobdesc/add', [MJobdescController::class, 'postAddJobdesc'])->name('postAddJobdesc')->middleware('access:m_jobdesc_create');

    Route::get('/jobdesc/edit', [MJobdescController::class, 'getEditJobdesc'])->name('getEditJobdesc')->middleware('access:m_jobdesc_update');
    Route::post('/jobdesc/edit', [MJobdescController::class, 'postEditJobdesc'])->name('postEditJobdesc')->middleware('access:m_jobdesc_update');

    // survey
    Route::get('/survey', [MSurveyController::class, 'getSurvey'])->name('getSurvey')->middleware('access:m_survey_manage');

    Route::get('/survey/add', [MSurveyController::class, 'getAddSurvey'])->name('getAddSurvey')->middleware('access:m_survey_create');
    Route::post('/survey/add', [MSurveyController::class, 'postAddSurvey'])->name('postAddSurvey')->middleware('access:m_survey_create');

    Route::get('/survey/edit', [MSurveyController::class, 'getEditSurvey'])->name('getEditSurvey')->middleware('access:m_survey_update');
    Route::post('/survey/edit', [MSurveyController::class, 'postEditSurvey'])->name('postEditSurvey')->middleware('access:m_survey_update');

    Route::get('/survey/result', [MSurveyController::class, 'getSurveyResult'])->name('getSurveyResult')->middleware('access:survey_result_manage');
    Route::get('/survey/result/detail', [MSurveyController::class, 'getSurveyResultDetail'])->name('getSurveyResultDetail')->middleware('access:survey_result_read');

    // academic period
    Route::get('/academic_period', [MAcademicPeriodController::class, 'getAcademicPeriod'])->name('getAcademicPeriod')->middleware('access:m_academic_period_manage');

    Route::get('/academic_period/add', [MAcademicPeriodController::class, 'getAddAcademicPeriod'])->name('getAddAcademicPeriod')->middleware('access:m_academic_period_create');
    Route::post('/academic_period/add', [MAcademicPeriodController::class, 'postAddAcademicPeriod'])->name('postAddAcademicPeriod')->middleware('access:m_academic_period_create');

    Route::get('/academic_period/edit', [MAcademicPeriodController::class, 'getEditAcademicPeriod'])->name('getEditAcademicPeriod')->middleware('access:m_academic_period_update');
    Route::post('/academic_period/edit', [MAcademicPeriodController::class, 'postEditAcademicPeriod'])->name('postEditAcademicPeriod')->middleware('access:m_academic_period_update');

    // score
    Route::get('/m_score', [MScoreController::class, 'getScore'])->name('getScore')->middleware('access:m_score_manage');

    Route::get('/m_score/add', [MScoreController::class, 'getAddScore'])->name('getAddScore')->middleware('access:m_score_create');
    Route::post('/m_score/add', [MScoreController::class, 'postAddScore'])->name('postAddScore')->middleware('access:m_score_create');

    Route::get('/m_score/edit', [MScoreController::class, 'getEditScore'])->name('getEditScore')->middleware('access:m_score_update');
    Route::post('/m_score/edit', [MScoreController::class, 'postEditScore'])->name('postEditScore')->middleware('access:m_score_update');

    // schedule
    Route::get('/schedule', [ScheduleController::class, 'getSchedule'])->name('getSchedule')->middleware('access:schedule_read');

    Route::get('/schedule/add', [ScheduleController::class, 'getAddSchedule'])->name('getAddSchedule')->middleware('access:schedule_read');
    Route::post('/schedule/add', [ScheduleController::class, 'postAddSchedule'])->name('postAddSchedule')->middleware('access:schedule_create');

    Route::post('/schedule/edit', [ScheduleController::class, 'postEditSchedule'])->name('postEditSchedule')->middleware('access:schedule_update');

    Route::post('/schedule/delete', [ScheduleController::class, 'postDeleteSchedule'])->name('postDeleteSchedule')->middleware('access:schedule_delete');

    Route::get('/schedule/general', [ScheduleController::class, 'getGeneralSchedule'])->name('getGeneralSchedule')->middleware('access:schedule_manage');

    Route::get('/schedule/general/add', [ScheduleController::class, 'getAddGeneralSchedule'])->name('getAddGeneralSchedule')->middleware('access:schedule_read');
    Route::post('/schedule/general/add', [ScheduleController::class, 'postAddGeneralSchedule'])->name('postAddGeneralSchedule')->middleware('access:schedule_create');

    Route::post('/schedule/general/edit', [ScheduleController::class, 'postEditGeneralSchedule'])->name('postEditGeneralSchedule')->middleware('access:schedule_update');

    Route::post('/schedule/general/delete', [ScheduleController::class, 'postDeleteGeneralSchedule'])->name('postDeleteGeneralSchedule')->middleware('access:schedule_delete');

    Route::get('/schedule/general/course/class', [ScheduleController::class, 'getOngoingCourseClassByCourseCategory'])->name('getOngoingCourseClassByCourseCategory')->middleware('access:schedule_manage');

    Route::post('/schedule/general/save', [ScheduleController::class, 'postSaveGeneralSchedule'])->name('postSaveGeneralSchedule')->middleware('access:schedule_create');
    //                                                      USER MANAGEMENT

    //AccessGroup Route #######################################################################################################
    Route::get('/accessgroup', [AccessGroupController::class, 'getAccessGroup'])->name('getAccessGroup')->middleware('access:access_group_manage');

    Route::get('/accessgroup/add', [AccessGroupController::class, 'getAddAccessGroup'])->name('getAddAccessGroup')->middleware('access:access_group_create');
    Route::post('/accessgroup/add', [AccessGroupController::class, 'postAddAccessGroup'])->name('postAddAccessGroup')->middleware('access:access_group_create');

    Route::get('/accessgroup/edit', [AccessGroupController::class, 'getEditAccessGroup'])->name('getEditAccessGroup')->middleware('access:access_group_update');
    Route::post('/accessgroup/edit', [AccessGroupController::class, 'postEditAccessGroup'])->name('postEditAccessGroup')->middleware('access:access_group_update');

    //AccessMaster Route ######################################################################################################

    Route::get('/accessmaster', [AccessMasterController::class, 'getAccessMaster'])->name('getAccessMaster')->middleware('access:access_master_manage');

    Route::get('/accessmaster/add', [AccessMasterController::class, 'getAddAccessMaster'])->name('getAddAccessMaster')->middleware('access:access_master_create');
    Route::post('/accessmaster/add', [AccessMasterController::class, 'postAddAccessMaster'])->name('postAddAccessMaster')->middleware('access:access_master_create');

    Route::get('/accessmaster/edit', [AccessMasterController::class, 'getEditAccessMaster'])->name('getEditAccessMaster')->middleware('access:access_master_update');
    Route::post('/accessmaster/edit', [AccessMasterController::class, 'postEditAccessMaster'])->name('postEditAccessMaster')->middleware('access:access_master_update');

    //User route #############################################################################################################

    Route::get('/user', [UserController::class, 'getUser'])->name('getUser')->middleware('access:users_manage');

    Route::get('/user/add', [UserController::class, 'getAddUser'])->name('getAddUser')->middleware('access:users_create');
    Route::post('/user/add', [UserController::class, 'postAddUser'])->name('postAddUser')->middleware('access:users_create');

    Route::get('/user/edit', [UserController::class, 'getEditUser'])->name('getEditUser')->middleware('access:users_update');
    Route::post('/user/edit', [UserController::class, 'postEditUser'])->name('postEditUser')->middleware('access:users_update');

    Route::get('/user/profile', [UserController::class, 'getProfileUser'])->name('getProfileUser')->middleware('access:users_read');
});

//                                      PARTNER
// partner routes
Route::get('/partner', [PartnerController::class, 'getPartner'])->name('getPartner')->middleware('access:m_partner_manage');

Route::get('/partner/add', [PartnerController::class, 'getAddPartner'])->name('getAddPartner')->middleware('access:m_partner_create');
Route::post('/partner/add', [PartnerController::class, 'postAddPartner'])->name('postAddPartner')->middleware('access:m_partner_create');

Route::get('/partner/edit', [PartnerController::class, 'getEditPartner'])->name('getEditPartner')->middleware('access:m_partner_update');
Route::post('/partner/edit', [PartnerController::class, 'postEditPartner'])->name('postEditPartner')->middleware('access:m_partner_update');

// partner university detail
Route::get('/parnter/university/detail', [PartnerUniversityDetailController::class, 'getPartnerUniversityDetail'])->name('getPartnerUniversityDetail')->middleware('access:partner_university_detail_manage');

Route::get('/partner/university/add', [PartnerUniversityDetailController::class, 'getAddPartnerUniversityDetail'])->name('getAddPartnerUniversityDetail')->middleware('access:partner_university_detail_create');
Route::post('/partner/university/add', [PartnerUniversityDetailController::class, 'postAddPartnerUniversityDetail'])->name('postAddPartnerUniversityDetail')->middleware('access:partner_university_detail_create');

Route::get('/partner/university/edit', [PartnerUniversityDetailController::class, 'getEditPartnerUniversityDetail'])->name('getEditPartnerUniversityDetail')->middleware('access:partner_university_detail_update');
Route::post('/partner/university/edit', [PartnerUniversityDetailController::class, 'postEditPartnerUniversityDetail'])->name('postEditPartnerUniversityDetail')->middleware('access:partner_university_detail_update');

//                                      ORDER
// order routes ##########################################################################################################
Route::get('/order', [TransOrderController::class, 'getTransOrder'])->name('getTransOrder')->middleware('access:trans_order_manage');

Route::get('/order/add', [TransOrderController::class, 'getAddTransOrder'])->name('getAddTransOrder')->middleware('access:trans_order_create');
Route::post('/order/add', [TransOrderController::class, 'postAddTransOrder'])->name('postAddTransOrder')->middleware('access:trans_order_create');

Route::get('/order/edit', [TransOrderController::class, 'getEditTransOrder'])->name('getEditTransOrder')->middleware('access:trans_order_update');
Route::post('/order/edit', [TransOrderController::class, 'postEditTransOrder'])->name('postEditTransOrder')->middleware('access:trans_order_update');

Route::get('/confirm/order', [TransOrderConfirmController::class, 'getTransOrderConfirm'])->name('getTransOrderConfirm')->middleware('access:trans_order_manage');

Route::get('/order/detail/{id}', [TransOrderController::class, 'showTransOrderDetail'])->name('showTransOrderDetail')->middleware('access:trans_order_manage');

Route::get('/confirm/order/add', [TransOrderConfirmController::class, 'getAddTransOrderConfirm'])->name('getAddTransOrderConfirm')->middleware('access:trans_order_create');
Route::post('/confirm/order/add', [TransOrderConfirmController::class, 'postAddTransOrderConfirm'])->name('postAddTransOrderConfirm')->middleware('access:trans_order_create');

Route::get('/confirm/order/edit', [TransOrderConfirmController::class, 'getEditTransOrderConfirm'])->name('getEditTransOrderConfirm')->middleware('access:trans_order_update');
Route::post('/confirm/order/edit', [TransOrderConfirmController::class, 'postEditTransOrderConfirm'])->name('postEditTransOrderConfirm')->middleware('access:trans_order_update');

// voucher routes ##########################################################################################################
Route::get('/voucher', [VoucherController::class, 'getVoucher'])->name('getVoucher')->middleware('access:trans_voucher_manage');

Route::get('/voucher/add', [VoucherController::class, 'getAddVoucher'])->name('getAddVoucher')->middleware('access:trans_voucher_create');
Route::post('/voucher/add', [VoucherController::class, 'postAddVoucher'])->name('postAddVoucher')->middleware('access:trans_voucher_create');

Route::get('/voucher/edit', [VoucherController::class, 'getEditVoucher'])->name('getEditVoucher')->middleware('access:trans_voucher_update');
Route::post('/voucher/edit', [VoucherController::class, 'postEditVoucher'])->name('postEditVoucher')->middleware('access:trans_voucher_update');

//                                     General
//General Routes #########################################################################################################
Route::get('/general', [GeneralController::class, 'getGeneral'])->name('getGeneral')->middleware('access:m_general_manage');

Route::get('/general/add', [GeneralController::class, 'getAddGeneral'])->name('getAddGeneral')->middleware('access:m_general_create');
Route::post('/general/add', [GeneralController::class, 'postAddGeneral'])->name('postAddGeneral')->middleware('access:m_general_create');

Route::get('/general/edit', [GeneralController::class, 'getEditGeneral'])->name('getEditGeneral')->middleware('access:m_general_update');
Route::post('/general/edit', [GeneralController::class, 'postEditGeneral'])->name('postEditGeneral')->middleware('access:m_general_update');

Route::post('general/deactivate/{id}', [GeneralController::class, 'deactivateGeneral'])->name('deactivateGeneral');

//
// Settings Pages
#########################################################################################################
Route::get('/pages', [PageController::class, 'getPages'])->name('getPages');

Route::get('/pages/edit', [PageController::class, 'getEditPage'])->name('getEditPage');

Route::get('/pages/show', [PageController::class, 'showPage'])->name('getShowPage');

Route::post('/save-page-content', [PageController::class, 'savePageContent'])->name('savePageContent');

Route::post('/update-blog-order', [PageController::class, 'updateBlogOrder'])->name('update.blog.order');



//                                     Testimonial
//Testimonial Routes #########################################################################################################
Route::get('/testimonial', [TestimonialController::class, 'getTestimonial'])->name('getTestimonial')->middleware('access:user_testimonial_manage');

Route::get('/testimonial/add', [TestimonialController::class, 'getAddTestimonial'])->name('getAddTestimonial')->middleware('access:user_testimonial_create');
Route::post('/testimonial/add', [TestimonialController::class, 'postAddTestimonial'])->name('postAddTestimonial')->middleware('access:user_testimonial_create');

Route::get('/testimonial/edit', [TestimonialController::class, 'getEditTestimonial'])->name('getEditTestimonial')->middleware('access:user_testimonial_update');
Route::post('/testimonial/edit', [TestimonialController::class, 'postEditTestimonial'])->name('postEditTestimonial')->middleware('access:user_testimonial_update');

//                                     Redeem Code
//Redeem Code Routes #########################################################################################################
Route::get('/redeemcode', [RedeemCodeController::class, 'getRedeemCode'])->name('getRedeemCode')->middleware('access:redeem_code_manage');

Route::get('/redeemcode/add', [RedeemCodeController::class, 'getAddRedeemCode'])->name('getAddRedeemCode')->middleware('access:redeem_code_create');
Route::post('/redeemcode/add', [RedeemCodeController::class, 'postAddRedeemCode'])->name('postAddRedeemCode')->middleware('access:redeem_code_create');

Route::get('/redeemcode/edit', [RedeemCodeController::class, 'getEditRedeemCode'])->name('getEditRedeemCode')->middleware('access:redeem_code_update');
Route::post('/redeemcode/edit', [RedeemCodeController::class, 'postEditRedeemCode'])->name('postEditRedeemCode')->middleware('access:redeem_code_update');

//                                     Proposal
//Proposal Routes #########################################################################################################
Route::get('/proposal', [ProposalController::class, 'getProposal'])->name('getProposal')->middleware('access:proposal_manage');

Route::get('/proposal/add', [ProposalController::class, 'getAddProposal'])->name('getAddProposal')->middleware('access:proposal_create');
Route::post('/proposal/add', [ProposalController::class, 'postAddProposal'])->name('postAddProposal')->middleware('access:proposal_create');

Route::get('/proposal/edit', [ProposalController::class, 'getEditProposal'])->name('getEditProposal')->middleware('access:proposal_update');
Route::post('/proposal/edit', [ProposalController::class, 'postEditProposal'])->name('postEditProposal')->middleware('access:proposal_update');

//                                     Transkrip
//Transkrip Routes #########################################################################################################
Route::get('/transkrip', [TranskripController::class, 'getTranskrip'])->name('getTranskrip')->middleware('access:transkrip_read');

//                                     Maxy Talks
//Testimonial Routes #########################################################################################################
Route::get('maxytalk', [MaxyTalkController::class, 'getMaxyTalk'])->name('getMaxyTalk')->middleware('access:maxy_talk_manage');

Route::get('maxytalk/add', [MaxyTalkController::class, 'getAddMaxyTalk'])->name('getAddMaxyTalk')->middleware('access:maxy_talk_create');
Route::post('maxytalk/add', [MaxyTalkController::class, 'postAddMaxyTalk'])->name('postAddMaxyTalk')->middleware('access:maxy_talk_create');

Route::get('maxytalk/edit', [MaxyTalkController::class, 'getEditMaxyTalk'])->name('getEditMaxyTalk')->middleware('access:maxy_talk_update');
Route::post('maxytalk/edit', [MaxyTalkController::class, 'postEditMaxyTalk'])->name('postEditMaxyTalk')->middleware('access:maxy_talk_update');

//                                     Carousel
//Carousel Routes #########################################################################################################
Route::get('/carousel', [CarouselController::class, 'getCarousel'])->name('getCarousel')->middleware('access:carousel_manage');

Route::get('/carousel/add', [CarouselController::class, 'getAddCarousel'])->name('getAddCarousel')->middleware('access:carousel_create');
Route::post('/carousel/add', [CarouselController::class, 'postAddCarousel'])->name('postAddCarousel')->middleware('access:carousel_create');

Route::get('/carousel/edit', [CarouselController::class, 'getEditCarousel'])->name('getEditCarousel')->middleware('access:carousel_update');
Route::post('/carousel/edit', [CarouselController::class, 'postEditCarousel'])->name('postEditCarousel')->middleware('access:carousel_update');

//                                     Event
//Event Routes #########################################################################################################
Route::get('/event', [EventController::class, 'getEvent'])->name('getEvent')->middleware('access:event_manage');

Route::get('/event/add', [EventController::class, 'getAddEvent'])->name('getAddEvent')->middleware('access:event_create');
Route::post('/event/add', [EventController::class, 'postAddEvent'])->name('postAddEvent')->middleware('access:event_create');

Route::get('/event/edit', [EventController::class, 'getEditEvent'])->name('getEditEvent')->middleware('access:event_update');
Route::post('/event/edit', [EventController::class, 'postEditEvent'])->name('postEditEvent')->middleware('access:event_update');

Route::get('/event/attendance', [EventController::class, 'getAttendanceEvent'])->name('getAttendanceEvent')->middleware('access:event_attendance_read');

// Event Requirement
Route::get('/event/requirement', [EventController::class, 'getEventRequirement'])->name('getEventRequirement');
Route::get('/event/requirement/add', [EventController::class, 'getAddEventRequirement'])->name('getAddEventRequirement');
Route::post('/event/requirement/add', [EventController::class, 'postAddEventRequirement'])->name('postAddEventRequirement');
Route::get('/event/requirement/edit', [EventController::class, 'getEditEventRequirement'])->name('getEditEventRequirement');
Route::post('/event/requirement/edit', [EventController::class, 'postEditEventRequirement'])->name('postEditEventRequirement');

Route::get('/event/verification', [EventController::class, 'getEventVerification'])->name('getEventVerification');



//                                     Partnership
//Partnership Routes #########################################################################################################
Route::get('/partnership', [PartnershipController::class, 'getPartnership'])->name('getPartnership')->middleware('access:partnership_manage');

Route::get('/partnership/add', [PartnershipController::class, 'getAddPartnership'])->name('getAddPartnership')->middleware('access:partnership_create');
Route::post('/partnership/add', [PartnershipController::class, 'postAddPartnership'])->name('postAddPartnership')->middleware('access:partnership_create');

Route::get('/partnership/edit', [PartnershipController::class, 'getEditPartnership'])->name('getEditPartnership')->middleware('access:partnership_update');
Route::post('/partnership/edit', [PartnershipController::class, 'postEditPartnership'])->name('postEditPartnership')->middleware('access:partnership_update');

//Blog Routes #########################################################################################################
Route::get('/blog', [BlogController::class, 'getBlog'])->name('getBlog');

Route::get('/blog/add', [BlogController::class, 'getAddBlog'])->name('getAddBlog');
Route::post('/blog/add', [BlogController::class, 'postAddBlog'])->name('postAddBlog');

Route::get('/blog/edit', [BlogController::class, 'getEditBlog'])->name('getEditBlog');
Route::post('/blog/edit', [BlogController::class, 'postEditBlog'])->name('postEditBlog');

// Blog Routes with Access Restriction (uncomment when blog development is finished) ##############################
// Route::get('/blog', [BlogController::class, 'getBlog'])->name('getBlog')->middleware('access:blog_manage');

// Route::get('/blog/add', [BlogController::class, 'getAddBlog'])->name('getAddBlog')->middleware('access:blog_create');
// Route::post('/blog/add', [BlogController::class, 'postAddBlog'])->name('postAddBlog')->middleware('access:blog_create');

// Route::get('/blog/edit', [BlogController::class, 'getEditBlog'])->name('getEditBlog')->middleware('access:blog_update');
// Route::post('/blog/edit', [BlogController::class, 'postEditBlog'])->name('postEditBlog')->middleware('access:blog_update');

Route::get('/blog-tag', [BlogController::class, 'getBlogTag'])->name('getBlogTag');

Route::get('/blog-tag/add', [BlogController::class, 'getAddBlogTag'])->name('getAddBlogTag');
Route::post('/blog-tag/add', [BlogController::class, 'postAddBlogTag'])->name('postAddBlogTag');

Route::get('/blog-tag/edit', [BlogController::class, 'getEditBlogTag'])->name('getEditBlogTag');
Route::post('/blog-tag/edit', [BlogController::class, 'postEditBlogTag'])->name('postEditBlogTag');


// bad access
Route::get('/noauthority', function () {
    return view('bad_access');
})->name('bad_access');

// // Import File .csv
// Route::post('/course-class-member/import-csv', [CourseClassMemberController::class, 'importCSV'])->name('course-class-member.import-csv');
Route::post('/user/import-csv', [UserController::class, 'importCSV'])->name('user.import-csv');

Route::get('/updateGKCourseImage', [MiscController::class, 'updateGKCourseImage'])->name('updateGKCourseImage');
Route::get('/reorderUpskillingPriority', [MiscController::class, 'reorderUpskillingPriority'])->name('reorderUpskillingPriority');
Route::get('/updateSlugCourseClass', [MiscController::class, 'updateSlugCourseClass'])->name('updateSlugCourseClass');

// jago digital route ###########################################################################################################
Route::prefix('agent')->name('agent.')->group(function () {
    Route::get('/', function () {
        if (!Auth::user())
            return redirect()->route('agent.login');
        return redirect()->route('agent.getDashboard');
    });
    Route::get('/login', [AgentController::class, 'getLogin'])->name('login');
    Route::post('/login', [AgentController::class, 'postLogin'])->name('postLogin');

    Route::get('/access-denied', function () {
        return view('pages.auth.access-denied');
    })->name('accessDenied');

    Route::group(['middleware' => 'agent.auth'], function () {
        Route::get('/dashboard', [AgentController::class, 'getDashboard'])->name('getDashboard');

        Route::get('/content', [AgentController::class, 'getContent'])->name('getContent');
        Route::post('/content', [AgentController::class, 'postContent'])->name('postContent');

        Route::get('/testimonial', [AgentController::class, 'getTestimonial'])->name('getTestimonial');
        Route::post('/testimonial', [AgentController::class, 'postTestimonial'])->name('postTestimonial');

        Route::get('/color', [AgentController::class, 'getColor'])->name('getColor');
        Route::post('/color', [AgentController::class, 'postColor'])->name('postColor');

        Route::get('/setting', [AgentController::class, 'getSetting'])->name('getSetting');
        Route::post('/setting', [AgentController::class, 'postSetting'])->name('postSetting');

        Route::get('/check-slug', [AgentController::class, 'checkSlug']);
    });

    Route::get('/logout', [AgentController::class, 'postLogout'])->name('logout');
});
