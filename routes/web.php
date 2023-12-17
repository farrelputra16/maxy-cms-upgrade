<?php

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
use App\Http\Controllers\TransOrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MDifficultyTypeController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\MaxyTalkController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\PrakerjaController;
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
    if(Auth::user()){
        return redirect()->route('getDashboard');
    } else {
        return redirect()->route('login');
    }
})->name('welcome');

Route::get('/login', [AuthController::class, 'getLogin'])->name('login');

Route::post('/login', [AuthController::class, 'postLogin'])->name('postLogin');

Route::post('/logout', [AuthController::class, 'postLogout'])->name('logout');

// dashboard route
Route::get('/dashboard', [DashboardController::class, 'getDashboard'])->name('getDashboard');

// course route ###########################################################################################################
Route::get('/course', [CourseController::class, 'getCourse'])->name('getCourse')->middleware('access:course_manage');

Route::get('/course/add', [CourseController::class, 'getAddCourse'])->name('getAddCourse')->middleware('access:course_create');
Route::post('/course/add', [CourseController::class, 'postAddCourse'])->name('postAddCourse')->middleware('access:course_create');

Route::get('/course/edit', [CourseController::class, 'getEditCourse'])->name('getEditCourse')->middleware('access:course_update');
Route::post('/course/edit', [CourseController::class, 'postEditCourse'])->name('postEditCourse')->middleware('access:course_update');


// course class route ####################################################################################################
// Route::get('/course/class', [CourseClassController::class, 'getCourseClass'])->name('getCourseClass')->middleware('access:course_class_manage');


// Route::get('/course/class/duplicate', [CourseClassController::class, 'getDuplicateCourseClass'])->name('getDuplicateCourseClass')->middleware('access:course_class_create');
// Route::post('/course/class/duplicate', [CourseClassController::class, 'postDuplicateCourseClass'])->name('postDuplicateCourseClass')->middleware('access:course_class_create');

// Route::get('/course/class/add', [CourseClassController::class, 'getAddCourseClass'])->name('getAddCourseClass')->middleware('access:course_class_create');
// Route::post('/course/class/add', [CourseClassController::class, 'postAddCourseClass'])->name('postAddCourseClass')->middleware('access:course_class_create');

// Route::get('/course/class/edit', [CourseClassController::class, 'getEditCourseClass'])->name('getEditCourseClass')->middleware('access:course_class_update');
// Route::post('/course/class/edit', [CourseClassController::class, 'postEditCourseClass'])->name('postEditCourseClass')->middleware('access:course_class_update');


// course class member history route ####################################################################################################
// Route::get('/course/class/member/history', [CourseClassMemberHistoryController::class, 'getCCMH'])->name('getCCMH')->middleware('access:course_class_member_log_read');
// Route::get('/course/class/member/history/course_name', [CourseClassMemberHistoryController::class, 'getnameCCMH'])->name('getnameCCMH')->middleware('access:course_class_member_log_read');

// Route::get('/course/class/member/historygrade', [CourseClassMemberHistoryController::class, 'getCCMHGrade'])->name('getCCMHGrade')->middleware('access:course_class_member_grading_manage');
// Route::get('/course/class/member/history/grade', [CourseClassMemberHistoryController::class, 'getGradeCCMH'])->name('getGradeCCMH')->middleware('access:course_class_member_grading_manage');

// Route::get('/course/class/member/history/edit', [CourseClassMemberHistoryController::class, 'getEditCCMH'])->name('getEditCCMH')->middleware('access:course_class_member_grading_update');
// Route::post('/course/class/member/history/edit', [CourseClassMemberHistoryController::class, 'postEditCCMH'])->name('postEditCCMH')->middleware('access:course_class_member_grading_update');

// course class member route ############################################################################################
// Route::get('/course/class/member', [CourseClassMemberController::class, 'getCourseClassMember'])->name('getCourseClassMember')->middleware('access:course_class_member_manage');

// Route::get('/course/class/member/add', [CourseClassMemberController::class, 'getAddCourseClassMember'])->name('getAddCourseClassMember')->middleware('access:course_class_member_create');
// Route::post('/course/class/member/add', [CourseClassMemberController::class, 'postAddCourseClassMember'])->name('postAddCourseClassMember')->middleware('access:course_class_member_create');

// Route::get('/course/class/member/edit', [CourseClassMemberController::class, 'getEditCourseClassMember'])->name('getEditCourseClassMember')->middleware('access:course_class_member_update');
// Route::post('/course/class/member/edit', [CourseClassMemberController::class, 'postEditCourseClassMember'])->name('postEditCourseClassMember')->middleware('access:course_class_member_update');

//Course Class Module route ###############################################################################################
// Route::get('/courseclassmodule', [CourseClassModuleController::class, 'getCourseClassModule'])->name('getCourseClassModule')->middleware('access:course_class_module_manage');

// Route::get('/courseclassmodule/add', [CourseClassModuleController::class, 'getAddCourseClassModule'])->name('getAddCourseClassModule')->middleware('access:course_class_module_create');
// Route::post('/courseclassmodule/add', [CourseClassModuleController::class, 'postAddCourseClassModule'])->name('postAddCourseClassModule')->middleware('access:course_class_module_create');

// Route::get('/courseclassmodule/edit', [CourseClassModuleController::class, 'getEditCourseClassModule'])->name('getEditCourseClassModule')->middleware('access:course_class_module_update');
// Route::post('/courseclassmodule/edit', [CourseClassModuleController::class, 'postEditCourseClassModule'])->name('postEditCourseClassModule')->middleware('access:course_class_module_update');

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

// course module ##########################################################################################################
Route::get('/course/module', [CourseModuleController::class, 'getCourseModule'])->name('getCourseModule')->middleware('access:course_module_manage');

Route::get('/course/module/add', [CourseModuleController::class, 'getAddCourseModule'])->name('getAddCourseModule')->middleware('access:course_module_create');
Route::post('/course/module/add', [CourseModuleController::class, 'postAddCourseModule'])->name('postAddCourseModule')->middleware('access:course_module_create');

Route::get('/course/module/edit', [CourseModuleController::class, 'getEditCourseModule'])->name('getEditCourseModule')->middleware('access:course_module_update');
Route::post('/course/module/edit', [CourseModuleController::class, 'postEditCourseModule'])->name('postEditCourseModule')->middleware('access:course_module_update');

Route::get('/course/module/child', [CourseModuleController::class, 'getCourseChildModule'])->name('getCourseChildModule')->middleware('access:course_module_manage');

Route::get('/course/module/child/add', [CourseModuleController::class, 'getAddChildModule'])->name('getAddChildModule')->middleware('access:course_module_create');
Route::post('/course/module/child/add', [CourseModuleController::class, 'postAddChildModule'])->name('postAddChildModule')->middleware('access:course_module_create');

Route::get('/course/module/child/edit', [CourseModuleController::class, 'getEditChildModule'])->name('getEditChildModule')->middleware('access:course_module_update');
Route::post('/course/module/child/edit', [CourseModuleController::class, 'postEditChildModule'])->name('postEditChildModule')->middleware('access:course_module_update');

// difficulty course route
Route::get('/course/difficulty', [MDifficultyTypeController::class, 'getDifficulty'])->name('getDifficulty')->middleware('access:m_difficulty_type_manage');

Route::get('/course/difficulty/add', [MDifficultyTypeController::class, 'getAddDifficulty'])->name('getAddDifficultyType')->middleware('access:m_difficulty_type_create');
Route::post('/course/difficulty/add', [MDifficultyTypeController::class, 'postAddDifficulty'])->name('postAddDifficultyType')->middleware('access:m_difficulty_type_create');

Route::get('/course/difficulty/edit', [MDifficultyTypeController::class, 'getEditDifficulty'])->name('getEditDifficultyType')->middleware('access:m_difficulty_type_update');
Route::post('/course/difficulty/edit', [MDifficultyTypeController::class, 'postEditDifficulty'])->name('postEditDifficultyType')->middleware('access:m_difficulty_type_update');

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



Route::get('/confirm/order', [TransOrderController::class, 'getTransOrderConfirm'])->name('getTransOrderConfirm')->middleware('access:trans_order_manage');

Route::get('/confirm/order/add', [TransOrderController::class, 'getAddTransOrderConfirm'])->name('getAddTransOrderConfirm')->middleware('access:trans_order_create');
Route::post('/confirm/order/add', [TransOrderController::class, 'postAddTransOrderConfirm'])->name('postAddTransOrderConfirm')->middleware('access:trans_order_create');

Route::get('/confirm/order/edit', [TransOrderController::class, 'getEditTransOrderConfirm'])->name('getEditTransOrderConfirm')->middleware('access:trans_order_update');
Route::post('/confirm/order/edit', [TransOrderController::class, 'postEditTransOrderConfirm'])->name('postEditTransOrderConfirm')->middleware('access:trans_order_update');



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

Route::post('general/deactivate/{id}',[GeneralController::class, 'deactivateGeneral'])->name('deactivateGeneral');

//                                     Testimonial
//Testimonial Routes #########################################################################################################
Route::get('/testimonial', [TestimonialController::class, 'getTestimonial'])->name('getTestimonial')->middleware('access:user_testimonial_manage');

Route::get('/testimonial/add', [TestimonialController::class, 'getAddTestimonial'])->name('getAddTestimonial')->middleware('access:user_testimonial_create');
Route::post('/testimonial/add', [TestimonialController::class, 'postAddTestimonial'])->name('postAddTestimonial')->middleware('access:user_testimonial_create');

Route::get('/testimonial/edit', [TestimonialController::class, 'getEditTestimonial'])->name('getEditTestimonial')->middleware('access:user_testimonial_update');
Route::post('/testimonial/edit', [TestimonialController::class, 'postEditTestimonial'])->name('postEditTestimonial')->middleware('access:user_testimonial_update');

//                                     Redeem Code
//Redeem Code Routes #########################################################################################################
Route::get('/redeemcode', [PrakerjaController::class, 'getRedeemCode'])->name('getRedeemCode');

//                                     Maxy Talks
//Testimonial Routes #########################################################################################################
Route::get('maxytalk', [MaxyTalkController::class, 'getMaxyTalk'])->name('getMaxyTalk')->middleware('access:maxy_talk_manage');

Route::get('maxytalk/add', [MaxyTalkController::class, 'getAddMaxyTalk'])->name('getAddMaxyTalk')->middleware('access:maxy_talk_create');
Route::post('maxytalk/add', [MaxyTalkController::class, 'postAddMaxyTalk'])->name('postAddMaxyTalk')->middleware('access:maxy_talk_create');

Route::get('maxytalk/edit', [MaxyTalkController::class, 'getEditMaxyTalk'])->name('getEditMaxyTalk')->middleware('access:maxy_talk_update');
Route::post('maxytalk/edit', [MaxyTalkController::class, 'postEditMaxyTalk'])->name('postEditMaxyTalk')->middleware('access:maxy_talk_update');

// bad access
Route::get('/noauthority', function () {
    return view('bad_access');
})->name('bad_access');

// // Import File .csv
// Route::post('/course-class-member/import-csv', [CourseClassMemberController::class, 'importCSV'])->name('course-class-member.import-csv');
// Route::post('/user/import-csv', [UserController::class, 'importCSV'])->name('user.import-csv');
