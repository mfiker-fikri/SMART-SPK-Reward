<?php

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

// Admin
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    // Login, Reset Password, dan Logout
    Route::GET('/', [App\Http\Controllers\Admin\Auth\LoginController::class, 'getLoginForm'])->name('getLogin.Admin');
    Route::POST('/', [App\Http\Controllers\Admin\Auth\LoginController::class, 'postLoginForm'])->middleware(['throttle:login'])->name('postLogin.Admin');
    Route::GET('/logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'getLogout'])->name('getLogout.Admin');

    Route::GET('/forgot-password', [App\Http\Controllers\Admin\Auth\ForgotPasswordController::class, 'getForgetPasswordForm'])->name('getForgetPassword.Admin');

    Route::POST('/forgot-password', [App\Http\Controllers\Admin\Auth\ForgotPasswordController::class, 'postForgetPasswordForm'])->name('postForgetPassword.Admin');

    Route::GET('/reset-password/{token}', [App\Http\Controllers\Admin\Auth\ForgotPasswordController::class, 'getResetPasswordForm'])->name('getResetPassword.Admin');

    Route::POST('/reset-password', [App\Http\Controllers\Admin\Auth\ForgotPasswordController::class, 'postResetPasswordForm'])->name('postResetPassword.Admin');
    //
    // Dashboard
    Route::GET('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('getDashboard.Admin');

    // Profile
    Route::GET('profile', [App\Http\Controllers\Admin\AdminController::class, 'getProfile'])->name('getProfile.Admin');
    Route::POST('profile/update', [App\Http\Controllers\Admin\AdminController::class, 'postProfile'])->name('postProfile.Update.Admin');
    // Profile Image Upload & delete
    Route::POST('/image/upload', [App\Http\Controllers\Admin\AdminController::class, 'postImageUpload'])->name('postProfile.postImageUpload.Admin');
    Route::POST('/image/delete', [App\Http\Controllers\Admin\AdminController::class, 'postImageDelete'])->name('postProfile.postImageDelete.Admin');
    // Profile Change Password
    Route::POST('/profile/change-password', [App\Http\Controllers\Admin\AdminController::class, 'changePasswordUpdate'])->name('postProfile.changePasswordUpdate.Admin');

    // Manage Admin
    // Create
    Route::GET('manage/admins/create', [App\Http\Controllers\Admin\Admin\ManageAdminController::class, 'getAdminsCreate'])->name('getManageAdmins.Create.Admin');
    Route::POST('manage/admins/create/post', [App\Http\Controllers\Admin\Admin\ManageAdminController::class, 'postAdminsCreate'])->name('postManageAdmins.Create.Admin');
    // Read
    Route::GET('manage/admins', [App\Http\Controllers\Admin\Admin\ManageAdminController::class, 'getAdmins'])->name('getManageAdmins.Read.Admin');
    Route::GET('manage/admins/list', [App\Http\Controllers\Admin\Admin\ManageAdminController::class, 'getAdminsList'])->name('getManageAdminsList.Read.Admin');
    // View
    Route::GET('manage/admins/view/{id}', [App\Http\Controllers\Admin\Admin\ManageAdminController::class, 'getAdminsIdView'])->name('getManageAdminsId.View.Admin');
    // Update
    Route::GET('manage/admins/edit/{id}', [App\Http\Controllers\Admin\Admin\ManageAdminController::class, 'getAdminsIdUpdate'])->name('getManageAdminsId.Update.Admin');
    Route::POST('manage/admins/edit/{id}/post', [App\Http\Controllers\Admin\Admin\ManageAdminController::class, 'postAdminsIdUpdate'])->name('postManageAdminsId.Update.Admin');
    Route::POST('manage/admins/edit/{id}/post/change-password', [App\Http\Controllers\Admin\Admin\ManageAdminController::class, 'postAdminsIdUpdateChangePassword'])->name('postManageAdminsId.UpdateChangePassword.Admin');
    // Non Active
    Route::POST('manage/admins/status_active/{id}', [App\Http\Controllers\Admin\Admin\ManageAdminController::class, 'postAdminsIdStatusActive'])->name('postManageAdminsId.StatusActive.Admin');
    // Delete
    Route::POST('manage/admins/delete/{id}', [App\Http\Controllers\Admin\Admin\ManageAdminController::class, 'postAdminsIdDelete'])->name('postManageAdminsId.Delete.Admin');


    // Manage Pegawai
    // Create
    Route::GET('manage/employees/create', [App\Http\Controllers\Admin\Pegawai\ManagePegawaiController::class, 'getEmployeesCreate'])->name('getManageEmployees.Create.Admin');
    Route::POST('manage/employees/create/post', [App\Http\Controllers\Admin\Pegawai\ManagePegawaiController::class, 'postEmployeesCreate'])->name('postManageEmployees.Create.Admin');
    // Read
    Route::GET('manage/employees', [App\Http\Controllers\Admin\Pegawai\ManagePegawaiController::class, 'getEmployees'])->name('getManageEmployees.Read.Admin');
    Route::GET('manage/employees/list', [App\Http\Controllers\Admin\Pegawai\ManagePegawaiController::class, 'getEmployeesList'])->name('getManageEmployeesList.Read.Admin');
    // View
    Route::GET('manage/employees/view/{id}', [App\Http\Controllers\Admin\Pegawai\ManagePegawaiController::class, 'getEmployeesIdView'])->name('getManageEmployeesId.View.Admin');
    // Update
    Route::GET('manage/employees/edit/{id}', [App\Http\Controllers\Admin\Pegawai\ManagePegawaiController::class, 'getEmployeesIdUpdate'])->name('getManageEmployeesId.Update.Admin');
    Route::POST('manage/employees/edit/{id}/post', [App\Http\Controllers\Admin\Pegawai\ManagePegawaiController::class, 'postEmployeesIdUpdate'])->name('postManageEmployeesId.Update.Admin');
    Route::POST('manage/employees/edit/{id}/post/change-password', [App\Http\Controllers\Admin\Pegawai\ManagePegawaiController::class, 'postEmployeesIdUpdateChangePassword'])->name('postManageEmployeesId.UpdateChangePassword.Admin');
    // Delete
    Route::POST('manage/employees/delete/{id}', [App\Http\Controllers\Admin\Pegawai\ManagePegawaiController::class, 'postEmployeesIdDelete'])->name('postManageEmployeesId.Delete.Admin');

    // Manage Profile
});



// HRD
Route::group(['prefix' => 'hrd', 'as' => 'hrd.'], function () {
    // Login, Reset Password, dan Logout
    Route::GET('/', [App\Http\Controllers\Hrd\Auth\LoginController::class, 'getLoginForm'])->name('getLogin.HRD');
    Route::POST('/', [App\Http\Controllers\Hrd\Auth\LoginController::class, 'postLoginForm'])->name('postLogin.HRD');
    Route::GET('/logout', [App\Http\Controllers\Hrd\Auth\LoginController::class, 'getLogout'])->name('getLogout.HRD');

    Route::GET('/forgot-password', [App\Http\Controllers\Hrd\Auth\ForgotPasswordController::class, 'getForgetPasswordForm'])->name('getForgetPassword.HRD');

    //
    // Dashboard
    Route::GET('dashboard', [App\Http\Controllers\Hrd\DashboardController::class, 'dashboard'])->name('getDashboard.HRD');

    // Manage Kategori
    // Create
    Route::GET('manage/categories/create', [App\Http\Controllers\Hrd\Kategori\KategoriController::class, 'getCategoriesCreate'])->name('getManageCategories.Create.HRD');
    Route::POST('manage/categories/create/post', [App\Http\Controllers\Hrd\Kategori\KategoriController::class, 'postCategoriesCreate'])->name('postManageCategories.Create.HRD');
    // Read
    Route::GET('manage/categories', [App\Http\Controllers\Hrd\Kategori\KategoriController::class, 'getCategories'])->name('getManageCategories.Read.HRD');
    Route::GET('manage/categories/list', [App\Http\Controllers\Hrd\Kategori\KategoriController::class, 'getCategoriesList'])->name('getManageCategoriesList.Read.HRD');
    // View
    Route::GET('manage/categories/view/{id}', [App\Http\Controllers\Hrd\Kategori\KategoriController::class, 'getCategoriesIdView'])->name('getManageCategoriesId.View.HRD');
    // Update
    Route::GET('manage/categories/edit/{id}', [App\Http\Controllers\Hrd\Kategori\KategoriController::class, 'getCategoriesIdUpdate'])->name('getManageCategoriesId.Update.HRD');
    Route::POST('manage/categories/edit/{id}/post', [App\Http\Controllers\Hrd\Kategori\KategoriController::class, 'postCategoriesIdUpdate'])->name('postManageCategoriesId.Update.HRD');
    // Delete


    // Manage Kriteria
    // Create
    Route::GET('manage/criterias/create', [App\Http\Controllers\Hrd\Kriteria\KriteriaController::class, 'getCriteriasCreate'])->name('getManageCriterias.Create.HRD');
    Route::POST('manage/criterias/create/post', [App\Http\Controllers\Hrd\Kriteria\KriteriaController::class, 'postCriteriasCreate'])->name('postManageCriterias.Create.HRD');
    // Read
    Route::GET('manage/criterias', [App\Http\Controllers\Hrd\Kriteria\KriteriaController::class, 'getCriterias'])->name('getManageCriterias.Read.HRD');
    Route::GET('manage/criterias/list', [App\Http\Controllers\Hrd\Kriteria\KriteriaController::class, 'getCriteriasList'])->name('getManageCriteriasList.Read.HRD');
    // View
    Route::GET('manage/criterias/view/{id}', [App\Http\Controllers\Hrd\Kriteria\KriteriaController::class, 'getCriteriasIdView'])->name('getManageCriteriasId.View.HRD');
    // Update
    Route::GET('manage/criterias/edit/{id}', [App\Http\Controllers\Hrd\Kriteria\KriteriaController::class, 'getCriteriasIdUpdate'])->name('getManageCriteriasId.Update.HRD');
    Route::POST('manage/criterias/edit/{id}/post', [App\Http\Controllers\Hrd\Kriteria\KriteriaController::class, 'postCriteriasIdUpdate'])->name('postManageCriteriasId.Update.HRD');
    // Delete


    // Manage Parameter
    // Select Categories
    Route::GET('select/categories/parameters', [App\Http\Controllers\Hrd\Parameter\ParameterController::class, 'getSelectCategories'])->name('getSelectCategories.Parameters.HRD');
    // Select Criterias
    Route::GET('select/criterias/parameters', [App\Http\Controllers\Hrd\Parameter\ParameterController::class, 'getSelectCriterias'])->name('getSelectCriterias.Parameters.HRD');
    // Select Value Quality
    Route::GET('select/value-quality/parameters', [App\Http\Controllers\Hrd\Parameter\ParameterController::class, 'getInputValueQuality'])->name('getInputValueQuality.Parameters.HRD');
    // Create
    Route::GET('manage/parameters/create', [App\Http\Controllers\Hrd\Parameter\ParameterController::class, 'getParametersCreate'])->name('getManageParameters.Create.HRD');
    Route::POST('manage/parameters/create/post', [App\Http\Controllers\Hrd\Parameter\ParameterController::class, 'postParametersCreate'])->name('postManageParameters.Create.HRD');
    // Read
    Route::GET('manage/parameters', [App\Http\Controllers\Hrd\Parameter\ParameterController::class, 'getParameters'])->name('getManageParameters.Read.HRD');
    Route::GET('manage/parameters/list', [App\Http\Controllers\Hrd\Parameter\ParameterController::class, 'getParametersList'])->name('getManageParametersList.Read.HRD');
    // View
    Route::GET('manage/parameters/view/{id}', [App\Http\Controllers\Hrd\Parameter\ParameterController::class, 'getParametersIdView'])->name('getManageParametersId.View.HRD');
    // Update
    Route::GET('manage/parameters/edit/{id}', [App\Http\Controllers\Hrd\Parameter\ParameterController::class, 'getParametersIdUpdate'])->name('getManageParametersId.Update.HRD');
    Route::POST('manage/parameters/edit/{id}/post', [App\Http\Controllers\Hrd\Parameter\ParameterController::class, 'postParametersIdUpdate'])->name('postManageParametersId.Update.HRD');
    // Delete


    // Manage Penghargaan
    // Read

    // View

    // Update
});



// User / Pegawai
Route::group(['name' => 'pegawai', 'as' => 'pegawai.'], function () {
    // Login, Reset Password, dan Logout
    Route::GET('/', [App\Http\Controllers\Pegawai\Auth\LoginController::class, 'getLoginForm'])->name('getLogin.Pegawai');
    Route::POST('/', [App\Http\Controllers\Pegawai\Auth\LoginController::class, 'postLoginForm'])->name('postLogin.Pegawai');
    Route::GET('/logout', [App\Http\Controllers\Pegawai\Auth\LoginController::class, 'getLogout'])->name('getLogout.Pegawai');

    Route::GET('/forgot-password', [App\Http\Controllers\Pegawai\Auth\ForgotPasswordController::class, 'getForgetPasswordForm'])->name('getForgetPassword.Pegawai');

    Route::POST('/forgot-password', [App\Http\Controllers\Pegawai\Auth\ForgotPasswordController::class, 'postForgetPasswordForm'])->name('postForgetPassword.Pegawai');

    Route::GET('/reset-password/{token}', [App\Http\Controllers\Pegawai\Auth\ForgotPasswordController::class, 'getResetPasswordForm'])->name('getResetPassword.Pegawai');

    Route::POST('/reset-password', [App\Http\Controllers\Pegawai\Auth\ForgotPasswordController::class, 'postResetPasswordForm'])->name('postResetPassword.Pegawai');

    // 
    // Dashboard
    Route::GET('dashboard', [App\Http\Controllers\Pegawai\DashboardController::class, 'dashboard'])->name('getDashboard.Pegawai');
    // Profile
    Route::GET('profile', [App\Http\Controllers\Pegawai\PegawaiController::class, 'getProfile'])->name('getProfile.Pegawai');
    Route::POST('profile/update', [App\Http\Controllers\Pegawai\PegawaiController::class, 'postProfile'])->name('postProfile.Update.Pegawai');
    // Profile Image Upload & delete
    Route::POST('/image/upload', [App\Http\Controllers\Pegawai\PegawaiController::class, 'postImageUpload'])->name('postProfile.postImageUpload.Pegawai');
    Route::POST('/image/delete', [App\Http\Controllers\Pegawai\PegawaiController::class, 'postImageDelete'])->name('postProfile.postImageDelete.Pegawai');
    // Profile Change Password
    Route::POST('profile/change-password', [App\Http\Controllers\Pegawai\PegawaiController::class, 'changePasswordUpdate'])->name('postProfile.changePasswordUpdate.Pegawai');

    // Manage Inovation
    // Create
    Route::Post('form-inovation/create/post', [App\Http\Controllers\Pegawai\Inovation\InovationController::class, 'postInovationFormCreate'])->name('postInovationFormCreate.Create.Pegawai');
    // Read
    Route::GET('form-inovation', [App\Http\Controllers\Pegawai\Inovation\InovationController::class, 'getInovationForm'])->name('getInovationForm.Read.Pegawai');
    // View
    // Route::GET('form-inovation/view/{id}', [App\Http\Controllers\Pegawai\Inovation\InovationController::class, 'getInovation']);
    // Update














    // Route::GET('')
    // Delete

    // Upload File
    // Route::Get();

    // Route::POST();
    // 
});

use App\Models\Admin;
use Illuminate\Support\Facades\DB;

Route::GET('/mail/{token}', function ($token) {
    $tokenAdmin     =   DB::table('admins_password_resets')->where(['token' => $token])->first();
    // dd($tokenAdmin);
    $nameAdmin      =   Admin::where(['email' =>  $tokenAdmin->email])->first();
    // dd($nameAdmin);
    $greetings   =   "";
    date_default_timezone_set('Asia/Jakarta');
    $time        =   date("H");
    if ($time >= "5" && $time < "11") {
        $greetings  =   "Good Morning";
    } elseif ($time >= "11" && $time < "18") {
        $greetings  =   "Good Afternoon";
    } elseif ($time >= "18" && $time < "23") {
        $greetings  =   "Good Evening";
    } else {
        $greetings  =   "Good Night";
    }
    return view('layouts.admin.content.email.forgotPassword')->with(['token' => $token, 'nameAdmin' => $nameAdmin, 'greetings' => $greetings]);
});
