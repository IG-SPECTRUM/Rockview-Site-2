<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//======================= WEBSITE ROUTES ======================================
use App\Http\Controllers\website\WebsitePagesController;



//======================= AUTHENTICATED STAFF ROUTES =====================================
use App\Http\Controllers\authentication\StaffLoginController;
use App\Http\Controllers\authenticatedUsers\StaffDashboardController;

use App\Http\Controllers\authenticatedUsers\ManageAdminsController;
use App\Http\Controllers\authenticatedUsers\ManageSchoolController;
use App\Http\Controllers\authenticatedUsers\ProgramsController;
use App\Http\Controllers\authenticatedUsers\ManageProvinceController;
use App\Http\Controllers\authenticatedUsers\ApplicantMessageController;
use App\Http\Controllers\authenticatedUsers\ManageWebsiteMainPageCouses;
use App\Http\Controllers\authenticatedUsers\ManageWebsiteMainPageNews;
use App\Http\Controllers\authenticatedUsers\ManageWebsiteMainPageImageSlider;
use App\Http\Controllers\authenticatedUsers\UserAccessControlController;
use App\Http\Controllers\authenticatedUsers\ApplicantsController;
use App\Http\Controllers\authenticatedUsers\ChangePasswordController;



//===================== WEBSITE PAGES ================================================
Route::get('/',[WebsitePagesController::class,"home"])->name("website-home-page");
Route::get('application-form',[WebsitePagesController::class,"show_application_form"])->name("show-application-form");
Route::post('submit-application-form',[WebsitePagesController::class,"submit_application_form"])->name("submit-application-form");
Route::get('applicant-payment-method/{applicant_id}/{applicant_name}',[WebsitePagesController::class,"redirect_new_applicant_to_payment_page"])->name("applicant-payment-method");


Route::get('programs',[WebsitePagesController::class,"programs_index_page"])->name("view-programs");
Route::get('anti-scam',[WebsitePagesController::class,"anti_scam"])->name("anti-scam");
Route::get('our-bursaries',[WebsitePagesController::class,"bursary"])->name("our-bursaries");
Route::get('our-fees',[WebsitePagesController::class,"fees"])->name("our-fees");
Route::get('contact-us',[WebsitePagesController::class,"show_contact_page"])->name("contact-us");
Route::post('submit-contact-form',[WebsitePagesController::class,"submit_contact_form"])->name("submit-contact-form");


//======================== AUTHENTICATE ADMINS ==============================
Route::get("login",[StaffLoginController::class,"show_login_form"])->name("login");
Route::post("login-user",[StaffLoginController::class,"login_user"])->name("login-user");
Route::get("login-user-out",[StaffLoginController::class,"logout"])->name("logout");

//=============== ROUTES CAN ONLY BE ACCESSED BY AN AUTHENTICATED USER ==================
Route::middleware("auth")->group(function(){
    Route::get("dashboard",[StaffDashboardController::class,"dashboard"])->name("dashboard");
    Route::resource("change-password",ChangePasswordController::class);

    Route::resource("main-slider",ManageWebsiteMainPageImageSlider::class);

    Route::resource("website-main-page-couses",ManageWebsiteMainPageCouses::class);

    //================== APPLICANTS ==========================================
    Route::get("applicantions-progress",[ApplicantsController::class,"applications_in_progress"])->name("applicantions-progress");
    Route::resource("applicants",ApplicantsController::class);

    //================== ROUTES MANAGING ADMINS ==============================
    Route::post("block-admin-account/{id}",[ManageAdminsController::class,"block_admin"])->name("block-admin-account");
    Route::post("unblock-admin-account/{id}",[ManageAdminsController::class,"unblock_admin"])->name("unblock-admin-account");
    Route::resource("admins",ManageAdminsController::class);

    //=============== SCHOOLS ROUTES =====================================
    Route::post("add-program-to-school",[ManageSchoolController::class,"add_program_to_school"])->name("add-program-to-school");
    Route::get("delete-school-confirmation/{program_id}/{school_id}",[ManageSchoolController::class,"delete_program_confirmation"])->name("delete-school-confirmation");
    Route::resource("schools",ManageSchoolController::class);

    //==================== PROGRAMS ROUTES =====================================================
    Route::get("delete-program-confirmation/{id}",[ProgramsController::class,"delete_confirmation"])->name("delete-program-confirmation");
    Route::resource("manage-programs",ProgramsController::class);

    //================== MANAGE PROVINCES ==================================
    Route::get("edit-province-district/{id}",[ManageProvinceController::class,"edit_district_details_form"])->name("edit-province-district");
    Route::post("update-province-district/{id}",[ManageProvinceController::class,"update_district_details"])->name("update-province-district");
    Route::get("delete-province-district/{id}",[ManageProvinceController::class,"delete_district"])->name("delete-province-district");
    Route::post("add-province-location",[ManageProvinceController::class,"add_stations"])->name("add-province-location");
    Route::resource("provinces",ManageProvinceController::class);

    //=================== APPLICANTS MESSAGES ==================================
    Route::resource("applicants-message",ApplicantMessageController::class);

    //==================== MANGE NEWS ON THE MAIN PAGE =================================
    Route::resource("news",ManageWebsiteMainPageNews::class);


    //grant user acccess
    Route::get('grant-user-access/{id}',[UserAccessControlController::class,'selected_user'])->name('grant-user-access');
    Route::get('grant-access',[UserAccessControlController::class,'grant_access'])->name('grant-access');
    Route::get('deny-access',[UserAccessControlController::class,'deny_access'])->name('deny-access');
});




//============= FALLBACK ROUTE =================
Route::get("back-on-track",function(){
    if(auth()->user()){

    }else{
        return redirect()->route("website-home-page");
    }
})->name("error-handler-route");