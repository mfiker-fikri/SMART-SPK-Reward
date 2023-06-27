<?php

use Illuminate\Routing\RouteGroup;
// use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
// use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
// use RealRashid\SweetAlert\Facades\Alert;
// use Illuminate\Http\Response;

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
    Route::GET('dashboard/statusOnlineOffline', [App\Http\Controllers\Admin\DashboardController::class, 'dashboardStatusOnlineOffline'])->name('getDashboard.StatusOnlineOffline.Admin');

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
    // Non Active / Active
    Route::POST('manage/admins/status_active/{id}', [App\Http\Controllers\Admin\Admin\ManageAdminController::class, 'postAdminsIdStatusActive'])->name('postManageAdminsId.StatusActive.Admin');
    // Delete
    Route::POST('manage/admins/delete/{id}', [App\Http\Controllers\Admin\Admin\ManageAdminController::class, 'postAdminsIdDelete'])->name('postManageAdminsId.Delete.Admin');


    // Manage SDM
    // Create
    Route::GET('manage/sdm/create', [App\Http\Controllers\Admin\SDM\ManageSDMController::class, 'getHumanResourcesCreate'])->name('getManageHumanResources.Create.Admin');
    Route::POST('manage/sdm/create/post', [App\Http\Controllers\Admin\SDM\ManageSDMController::class, 'postHumanResourcesCreate'])->name('postManageHumanResources.Create.Admin');
    // Read
    Route::GET('manage/sdm', [App\Http\Controllers\Admin\SDM\ManageSDMController::class, 'getHumanResources'])->name('getManageHumanResources.Read.Admin');
    Route::GET('manage/sdm/list', [App\Http\Controllers\Admin\SDM\ManageSDMController::class, 'getHumanResourcesList'])->name('getManageHumanResourcesList.Read.Admin');
    // View
    Route::GET('manage/sdm/view/{id}', [App\Http\Controllers\Admin\SDM\ManageSDMController::class, 'getHumanResourcesIdView'])->name('getManageHumanResourcesId.View.Admin');
    // Update
    Route::GET('manage/sdm/edit/{id}', [App\Http\Controllers\Admin\SDM\ManageSDMController::class, 'getHumanResourcesIdUpdate'])->name('getManageHumanResourcesId.Update.Admin');
    Route::POST('manage/sdm/edit/{id}/post', [App\Http\Controllers\Admin\SDM\ManageSDMController::class, 'postHumanResourcesIdUpdate'])->name('postManageHumanResourcesId.Update.Admin');
    Route::POST('manage/sdm/edit/{id}/post/change-password', [App\Http\Controllers\Admin\SDM\ManageSDMController::class, 'postHumanResourcesIdUpdateChangePassword'])->name('postManageHumanResourcesId.UpdateChangePassword.Admin');
    // Delete
    Route::POST('manage/sdm/delete/{id}', [App\Http\Controllers\Admin\SDM\ManageSDMController::class, 'postHumanResourcesIdDelete'])->name('postManageHumanResourcesId.Delete.Admin');

    // Manage Head Work Unit
    // Create
    Route::GET('manage/ksk/create', [App\Http\Controllers\Admin\HWU\ManageHWUController::class, 'getHWUCreate'])->name('getManageHWU.Create.Admin');
    Route::POST('manage/ksk/create/post', [App\Http\Controllers\Admin\HWU\ManageHWUController::class, 'postHWUCreate'])->name('postManageHWU.Create.Admin');
    // Read
    Route::GET('manage/ksk', [App\Http\Controllers\Admin\HWU\ManageHWUController::class, 'getHWU'])->name('getManageHWU.Read.Admin');
    Route::GET('manage/ksk/list', [App\Http\Controllers\Admin\HWU\ManageHWUController::class, 'getHWUList'])->name('getManageHWUList.Read.Admin');
    // View
    Route::GET('manage/ksk/view/{id}', [App\Http\Controllers\Admin\HWU\ManageHWUController::class, 'getHWUIdView'])->name('getManageHWUId.View.Admin');
    // Update
    Route::GET('manage/ksk/edit/{id}', [App\Http\Controllers\Admin\HWU\ManageHWUController::class, 'getHWUIdUpdate'])->name('getManageHWUId.Update.Admin');
    Route::POST('manage/ksk/edit/{id}/post', [App\Http\Controllers\Admin\HWU\ManageHWUController::class, 'postHWUIdUpdate'])->name('postManageHWUId.Update.Admin');
    Route::POST('manage/ksk/edit/{id}/post/change-password', [App\Http\Controllers\Admin\HWU\ManageHWUController::class, 'postHWUIdUpdateChangePassword'])->name('postManageHWUId.UpdateChangePassword.Admin');
    // Delete
    Route::POST('manage/ksk/delete/{id}', [App\Http\Controllers\Admin\HWU\ManageHWUController::class, 'postHWUIdDelete'])->name('postManageHWUId.Delete.Admin');

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

});

// Kepala Biro SDM,
// Kepala Bagian Penghargaan, Disiplin, dan Tata Usaha,
// Kepala Subbagian Penghargaan, Disiplin, dan Pensiun
Route::group(['name' => 'sdm', 'prefix' => 'sdm', 'as' => 'sdm.'], function () {
    // Login, Reset Password, dan Logout
    Route::GET('/', [App\Http\Controllers\SDM\Auth\LoginController::class, 'getLoginForm'])->name('getLogin.SDM');
    Route::POST('/', [App\Http\Controllers\SDM\Auth\LoginController::class, 'postLoginForm'])->name('postLogin.SDM');
    Route::GET('/logout', [App\Http\Controllers\SDM\Auth\LoginController::class, 'getLogout'])->name('getLogout.SDM');

    Route::GET('/forgot-password', [App\Http\Controllers\SDM\Auth\ForgotPasswordController::class, 'getForgetPasswordForm'])->name('getForgetPassword.SDM');

    Route::POST('/forgot-password', [App\Http\Controllers\SDM\Auth\ForgotPasswordController::class, 'postForgetPasswordForm'])->name('postForgetPassword.SDM');

    Route::GET('/reset-password/{token}', [App\Http\Controllers\SDM\Auth\ForgotPasswordController::class, 'getResetPasswordForm'])->name('getResetPassword.SDM');

    Route::POST('/reset-password', [App\Http\Controllers\SDM\Auth\ForgotPasswordController::class, 'postResetPasswordForm'])->name('postResetPassword.SDM');

    // Kepala Biro SDM
    Route::middleware(['human_resources.auth:1'])->group(function () {
        // Dashboard
        Route::GET('/kepala-biro-SDM/dashboard', [App\Http\Controllers\SDM\DashboardController::class,'dashboardKepalaBiroSDM'])->name('getDashboard.KepalaBiroSDM.SDM');
        // Profile
        Route::GET('/kepala-biro-SDM/profile', [App\Http\Controllers\SDM\SDMController::class, 'getProfileKepalaBiroSDM'])->name('getProfile.KepalaBiroSDM.SDM');
        Route::POST('/kepala-biro-SDM/profile/update', [App\Http\Controllers\SDM\SDMController::class, 'postProfileKepalaBiroSDM'])->name('postProfile.Update.KepalaBiroSDM.SDM');
        // Profile Image Upload & delete
        Route::POST('/kepala-biro-SDM/image/upload', [App\Http\Controllers\SDM\SDMController::class, 'postImageUploadKepalaBiroSDM'])->name('postProfile.postImageUpload.KepalaBiroSDM.SDM');
        Route::POST('/kepala-biro-SDM/image/delete', [App\Http\Controllers\SDM\SDMController::class, 'postImageDeleteKepalaBiroSDM'])->name('postProfile.postImageDelete.KepalaBiroSDM.SDM');
        // Profile Change Password
        Route::POST('/kepala-biro-SDM/profile/change-password', [App\Http\Controllers\SDM\SDMController::class, 'changePasswordUpdateKepalaBiroSDM'])->name('postProfile.changePasswordUpdate.KepalaBiroSDM.SDM');
        // Signature Upload
        // Upload
        Route::POST('/kepala-biro-SDM/signature/upload', [App\Http\Controllers\SDM\SDMController::class, 'postSignatureUploadKepalaBiroSDM'])->name('postProfile.postSignatureUpload.KepalaBiroSDM.SDM');
        // Delete
        Route::POST('/kepala-biro-SDM/signature/upload/delete', [App\Http\Controllers\SDM\SDMController::class, 'postSignatureUploadDeleteKepalaBiroSDM'])->name('postProfile.postSignatureUploadDelete.KepalaBiroSDM.SDM');

        // Signature Inovation
        // Read
        Route::GET('/kepala-biro-SDM/signature/innovation', [App\Http\Controllers\SDM\Role1\Signature\SignatureInovationController::class, 'getSignatureInovationKepalaBiroSDM'])->name('getSignatureInovation.KepalaBiroSDM.SDM');
        Route::GET('/kepala-biro-SDM/signature/innovation/list', [App\Http\Controllers\SDM\Role1\Signature\SignatureInovationController::class, 'getSignatureInovationListKepalaBiroSDM'])->name('getSignatureInovationList.KepalaBiroSDM.SDM');
        // Update
        Route::GET('/kepala-biro-SDM/signature/innovation/{id}', [App\Http\Controllers\SDM\Role1\Signature\SignatureInovationController::class, 'getSignatureInovationIdKepalaBiroSDM'])->name('getSignatureInovationId.KepalaBiroSDM.SDM');
        Route::POST('/kepala-biro-SDM/signature/innovation/{id}/post', [\App\Http\Controllers\SDM\Role1\Signature\SignatureInovationController::class, 'postSignatureInovationIdKepalaBiroSDM'])->name('postSignatureInovationId.KepalaBiroSDM.SDM');

        // Signature Teladan
        // Read
        Route::GET('/kepala-biro-SDM/signature/representative', [App\Http\Controllers\SDM\Role1\Signature\SignatureRepresentativeController::class, 'getSignatureRepresentativeKepalaBiroSDM'])->name('getSignatureRepresentative.KepalaBiroSDM.SDM');
        Route::GET('/kepala-biro-SDM/signature/representative/list', [App\Http\Controllers\SDM\Role1\Signature\SignatureRepresentativeController::class, 'getSignatureRepresentativeListKepalaBiroSDM'])->name('getSignatureRepresentativeList.KepalaBiroSDM.SDM');
        // Update
        Route::GET('/kepala-biro-SDM/signature/representative/{id}', [App\Http\Controllers\SDM\Role1\Signature\SignatureRepresentativeController::class, 'getSignatureRepresentativeIdKepalaBiroSDM'])->name('getSignatureRepresentativeId.KepalaBiroSDM.SDM');
        Route::POST('/kepala-biro-SDM/signature/representative/{id}/post', [\App\Http\Controllers\SDM\Role1\Signature\SignatureRepresentativeController::class, 'postSignatureRepresentativeIdKepalaBiroSDM'])->name('postSignatureRepresentativeId.KepalaBiroSDM.SDM');

        // Final Inovation Reward
        // Read
        Route::GET('/kepala-biro-SDM/reward/innovation', [App\Http\Controllers\SDM\Role1\Reward\RewardInovationController::class, 'getRewardInovationKepalaBiroSDM'])->name('getRewardInovation.KepalaBiroSDM.SDM');
        Route::GET('/kepala-biro-SDM/reward/innovation/list', [App\Http\Controllers\SDM\Role1\Reward\RewardInovationController::class, 'getRewardInovationListKepalaBiroSDM'])->name('getRewardInovationList.KepalaBiroSDM.SDM');

        // Final Teladan Reward
        // Read
        Route::GET('/kepala-biro-SDM/reward/representative', [App\Http\Controllers\SDM\Role1\Reward\RewardRepresentativeController::class, 'getRewardRepresentativeKepalaBiroSDM'])->name('getRewardRepresentative.KepalaBiroSDM.SDM');
        Route::GET('/kepala-biro-SDM/reward/representative/list', [App\Http\Controllers\SDM\Role1\Reward\RewardRepresentativeController::class, 'getRewardRepresentativeListKepalaBiroSDM'])->name('getRewardRepresentativeList.KepalaBiroSDM.SDM');
    });

    // Kepala Bagian Penghargaan, Disiplin, dan Tata Usaha
    Route::middleware(['human_resources.auth:2'])->group(function () {
        // Dashboard
        Route::GET('/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/dashboard', [App\Http\Controllers\SDM\DashboardController::class,'dashboardKepalaBagianPenghargaanDisiplindanTataUsaha'])->name('getDashboard.KepalaBagianPenghargaanDisiplindanTataUsaha.SDM');
        // Profile
        Route::GET('/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/profile', [App\Http\Controllers\SDM\SDMController::class, 'getProfileKepalaBagianPenghargaanDisiplindanTataUsaha'])->name('getProfile.KepalaBagianPenghargaanDisiplindanTataUsaha.SDM');
        Route::POST('/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/profile/update', [App\Http\Controllers\SDM\SDMController::class, 'postProfileKepalaBagianPenghargaanDisiplindanTataUsaha'])->name('postProfile.Update.KepalaBagianPenghargaanDisiplindanTataUsaha.SDM');
        // Profile Image Upload & delete
        Route::POST('/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/image/upload', [App\Http\Controllers\SDM\SDMController::class, 'postImageUploadKepalaBagianPenghargaanDisiplindanTataUsaha'])->name('postProfile.postImageUpload.KepalaBagianPenghargaanDisiplindanTataUsaha.SDM');
        Route::POST('/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/image/delete', [App\Http\Controllers\SDM\SDMController::class, 'postImageDeleteKepalaBagianPenghargaanDisiplindanTataUsaha'])->name('postProfile.postImageDelete.KepalaBagianPenghargaanDisiplindanTataUsaha.SDM');
        // Profile Change Password
        Route::POST('/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/profile/change-password', [App\Http\Controllers\SDM\SDMController::class, 'changePasswordUpdateKepalaBagianPenghargaanDisiplindanTataUsaha'])->name('postProfile.changePasswordUpdate.KepalaBagianPenghargaanDisiplindanTataUsaha.SDM');
        // Signature Upload
        // Upload
        Route::POST('/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/signature/upload', [App\Http\Controllers\SDM\SDMController::class, 'postSignatureUploadKepalaBagianPenghargaanDisiplindanTataUsaha'])->name('postProfile.postSignatureUpload.KepalaBagianPenghargaanDisiplindanTataUsaha.SDM');
        // Delete
        Route::POST('/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/signature/upload/delete', [App\Http\Controllers\SDM\SDMController::class, 'postSignatureUploadDeleteKepalaBagianPenghargaanDisiplindanTataUsaha'])->name('postProfile.postSignatureUploadDelete.KepalaBagianPenghargaanDisiplindanTataUsaha.SDM');

        // Signature Inovation
        // Read
        Route::GET('/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/signature/innovation', [App\Http\Controllers\SDM\Role2\Signature\SignatureInovationController::class, 'getSignatureInovationKepalaBagianPenghargaanDisiplindanTataUsaha'])->name('getSignatureInovation.KepalaBagianPenghargaanDisiplindanTataUsaha.SDM');
        Route::GET('/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/signature/innovation/list', [App\Http\Controllers\SDM\Role2\Signature\SignatureInovationController::class, 'getSignatureInovationListKepalaBagianPenghargaanDisiplindanTataUsaha'])->name('getSignatureInovationList.KepalaBagianPenghargaanDisiplindanTataUsaha.SDM');
        // Update
        Route::GET('/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/signature/innovation/{id}', [App\Http\Controllers\SDM\Role2\Signature\SignatureInovationController::class, 'getSignatureInovationIdKepalaBagianPenghargaanDisiplindanTataUsaha'])->name('getSignatureInovationId.KepalaBagianPenghargaanDisiplindanTataUsaha.SDM');
        Route::POST('/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/signature/innovation/{id}/post', [App\Http\Controllers\SDM\Role2\Signature\SignatureInovationController::class, 'postSignatureInovationIdKepalaBagianPenghargaanDisiplindanTataUsaha'])->name('postSignatureInovationId.KepalaBagianPenghargaanDisiplindanTataUsaha.SDM');

        // Signature Teladan
        // Read
        Route::GET('/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/signature/representative', [App\Http\Controllers\SDM\Role2\Signature\SignatureRepresentativeController::class, 'getSignatureRepresentativeKepalaBagianPenghargaanDisiplindanTataUsaha'])->name('getSignatureRepresentative.KepalaBagianPenghargaanDisiplindanTataUsaha.SDM');
        Route::GET('/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/signature/representative/list', [App\Http\Controllers\SDM\Role2\Signature\SignatureRepresentativeController::class, 'getSignatureRepresentativeListKepalaBagianPenghargaanDisiplindanTataUsaha'])->name('getSignatureRepresentativeList.KepalaBagianPenghargaanDisiplindanTataUsaha.SDM');
        // Update
        Route::GET('/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/signature/representative/{id}', [App\Http\Controllers\SDM\Role2\Signature\SignatureRepresentativeController::class, 'getSignatureRepresentativeIdKepalaBagianPenghargaanDisiplindanTataUsaha'])->name('getSignatureRepresentativeId.KepalaBagianPenghargaanDisiplindanTataUsaha.SDM');
        Route::POST('/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/signature/representative/{id}/post', [App\Http\Controllers\SDM\Role2\Signature\SignatureRepresentativeController::class, 'postSignatureRepresentativeIdKepalaBagianPenghargaanDisiplindanTataUsaha'])->name('postSignatureRepresentativeId.KepalaBagianPenghargaanDisiplindanTataUsaha.SDM');

        // Final Inovation Reward
        // Read
        Route::GET('/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/reward/innovation', [App\Http\Controllers\SDM\Role2\Reward\RewardInovationController::class, 'getRewardInovationKepalaBagianPenghargaanDisiplindanTataUsaha'])->name('getRewardInovation.KepalaBagianPenghargaanDisiplindanTataUsaha.SDM');
        Route::GET('/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/reward/innovation/list', [App\Http\Controllers\SDM\Role2\Reward\RewardInovationController::class, 'getRewardInovationListKepalaBagianPenghargaanDisiplindanTataUsaha'])->name('getRewardInovationList.KepalaBagianPenghargaanDisiplindanTataUsaha.SDM');

        // Final Teladan Reward
        // Read
        Route::GET('/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/reward/representative', [App\Http\Controllers\SDM\Role2\Reward\RewardRepresentativeController::class, 'getRewardRepresentativeKepalaBagianPenghargaanDisiplindanTataUsaha'])->name('getRewardRepresentative.KepalaBagianPenghargaanDisiplindanTataUsaha.SDM');
        Route::GET('/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/reward/representative/list', [App\Http\Controllers\SDM\Role2\Reward\RewardRepresentativeController::class, 'getRewardRepresentativeListKepalaBagianPenghargaanDisiplindanTataUsaha'])->name('getRewardRepresentativeList.KepalaBagianPenghargaanDisiplindanTataUsaha.SDM');
    });


    // Kepala Subbagian Penghargaan, Disiplin, dan Pensiun
    Route::middleware(['human_resources.auth:3'])->group(function () {
        // Dashboard
        Route::GET('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/dashboard', [\App\Http\Controllers\SDM\DashboardController::class,'dashboardKepalaSubbagianPenghargaanDisiplindanPensiun'])->name('getDashboard.KepalaSubbagianPenghargaanDisiplindanPensiun.SDM');
        Route::GET('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/dashboard/statusOnlineOfflineTA', [\App\Http\Controllers\SDM\DashboardController::class,'dashboardKepalaSubbagianPenghargaanDisiplindanPensiunStatusOnlineOfflineTA'])->name('getDashboard.KepalaSubbagianPenghargaanDisiplindanPensiun.StatusOnlineOfflineTA.SDM');

        // Profile
        Route::GET('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/profile', [App\Http\Controllers\SDM\SDMController::class, 'getProfileKepalaSubbagianPenghargaanDisiplindanPensiun'])->name('getProfile.KepalaSubbagianPenghargaanDisiplindanPensiun.SDM');
        Route::POST('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/profile/update', [App\Http\Controllers\SDM\SDMController::class, 'postProfileKepalaSubbagianPenghargaanDisiplindanPensiun'])->name('postProfile.Update.KepalaSubbagianPenghargaanDisiplindanPensiun.SDM');
        // Profile Image Upload & delete
        Route::POST('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/image/upload', [App\Http\Controllers\SDM\SDMController::class, 'postImageUploadKepalaSubbagianPenghargaanDisiplindanPensiun'])->name('postProfile.postImageUpload.KepalaSubbagianPenghargaanDisiplindanPensiun.SDM');
        Route::POST('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/image/delete', [App\Http\Controllers\SDM\SDMController::class, 'postImageDeleteKepalaSubbagianPenghargaanDisiplindanPensiun'])->name('postProfile.postImageDelete.KepalaSubbagianPenghargaanDisiplindanPensiun.SDM');
        // Profile Change Password
        Route::POST('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/profile/change-password', [App\Http\Controllers\SDM\SDMController::class, 'changePasswordUpdateKepalaSubbagianPenghargaanDisiplindanPensiun'])->name('postProfile.changePasswordUpdate.KepalaSubbagianPenghargaanDisiplindanPensiun.SDM');
        // Signature Upload
        // Upload
        Route::POST('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/signature/upload', [App\Http\Controllers\SDM\SDMController::class, 'postSignatureUploadKepalaSubbagianPenghargaanDisiplindanPensiun'])->name('postProfile.postSignatureUpload.KepalaSubbagianPenghargaanDisiplindanPensiun.SDM');
        // Delete
        Route::POST('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/signature/upload/delete', [App\Http\Controllers\SDM\SDMController::class, 'postSignatureUploadDeleteKepalaSubbagianPenghargaanDisiplindanPensiun'])->name('postProfile.postSignatureUploadDelete.KepalaSubbagianPenghargaanDisiplindanPensiun.SDM');



        // Manage Kategori
        // Create
        Route::GET('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/categories/create', [App\Http\Controllers\SDM\Role3\Kategori\KategoriController::class, 'getCategoriesCreate'])->name('getManageCategories.KepalaSubbagianPenghargaanDisiplindanPensiun.Create.SDM');
        Route::POST('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/categories/create/post', [App\Http\Controllers\SDM\Role3\Kategori\KategoriController::class, 'postCategoriesCreate'])->name('postManageCategories.KepalaSubbagianPenghargaanDisiplindanPensiun.Create.SDM');
        // Read
        Route::GET('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/categories', [App\Http\Controllers\SDM\Role3\Kategori\KategoriController::class, 'getCategories'])->name('getManageCategories.KepalaSubbagianPenghargaanDisiplindanPensiun.Read.SDM');
        Route::GET('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/categories/list', [App\Http\Controllers\SDM\Role3\Kategori\KategoriController::class, 'getCategoriesList'])->name('getManageCategoriesList.KepalaSubbagianPenghargaanDisiplindanPensiun.Read.SDM');
        // View
        Route::GET('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/categories/view/{id}', [App\Http\Controllers\SDM\Role3\Kategori\KategoriController::class, 'getCategoriesIdView'])->name('getManageCategoriesId.KepalaSubbagianPenghargaanDisiplindanPensiun.View.SDM');
        // Update
        Route::GET('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/categories/edit/{id}', [App\Http\Controllers\SDM\Role3\Kategori\KategoriController::class, 'getCategoriesIdUpdate'])->name('getManageCategoriesId.KepalaSubbagianPenghargaanDisiplindanPensiun.Update.SDM');
        Route::POST('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/categories/edit/{id}/post', [App\Http\Controllers\SDM\Role3\Kategori\KategoriController::class, 'postCategoriesIdUpdate'])->name('postManageCategoriesId.KepalaSubbagianPenghargaanDisiplindanPensiun.Update.SDM');
        // Delete
        Route::POST('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/categories/delete/{id}', [App\Http\Controllers\SDM\Role3\Kategori\KategoriController::class, 'postCategoriesIdDelete'])->name('postManageCategoriesId.KepalaSubbagianPenghargaanDisiplindanPensiun.Delete.SDM');


        // Manage Kriteria
        // Create
        Route::GET('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/criterias/create', [App\Http\Controllers\SDM\Role3\Kriteria\KriteriaController::class, 'getCriteriasCreate'])->name('getManageCriterias.KepalaSubbagianPenghargaanDisiplindanPensiun.Create.SDM');
        Route::POST('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/criterias/create/post', [App\Http\Controllers\SDM\Role3\Kriteria\KriteriaController::class, 'postCriteriasCreate'])->name('postManageCriterias.KepalaSubbagianPenghargaanDisiplindanPensiun.Create.SDM');
        // Read
        Route::GET('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/criterias', [App\Http\Controllers\SDM\Role3\Kriteria\KriteriaController::class, 'getCriterias'])->name('getManageCriterias.KepalaSubbagianPenghargaanDisiplindanPensiun.Read.SDM');
        Route::GET('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/criterias/list', [App\Http\Controllers\SDM\Role3\Kriteria\KriteriaController::class, 'getCriteriasList'])->name('getManageCriteriasList.KepalaSubbagianPenghargaanDisiplindanPensiun.Read.SDM');
        // View
        Route::GET('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/criterias/view/{id}', [App\Http\Controllers\SDM\Role3\Kriteria\KriteriaController::class, 'getCriteriasIdView'])->name('getManageCriteriasId.KepalaSubbagianPenghargaanDisiplindanPensiun.View.SDM');
        // Update
        Route::GET('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/criterias/edit/{id}', [App\Http\Controllers\SDM\Role3\Kriteria\KriteriaController::class, 'getCriteriasIdUpdate'])->name('getManageCriteriasId.KepalaSubbagianPenghargaanDisiplindanPensiun.Update.SDM');
        Route::POST('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/criterias/edit/{id}/post', [App\Http\Controllers\SDM\Role3\Kriteria\KriteriaController::class, 'postCriteriasIdUpdate'])->name('postManageCriteriasId.KepalaSubbagianPenghargaanDisiplindanPensiun.Update.SDM');
        // Delete


        // Manage Parameter
        // Select Categories
        Route::GET('select/categories/parameters', [App\Http\Controllers\SDM\Role3\Parameter\ParameterController::class, 'getSelectCategories'])->name('getSelectCategories.Parameters.SDM');
        // Select Criterias
        Route::GET('select/criterias/parameters', [App\Http\Controllers\SDM\Role3\Parameter\ParameterController::class, 'getSelectCriterias'])->name('getSelectCriterias.Parameters.SDM');
        // Select Value Quality
        Route::GET('select/value-quality/parameters', [App\Http\Controllers\SDM\Role3\Parameter\ParameterController::class, 'getInputValueQuality'])->name('getInputValueQuality.Parameters.SDM');
        // Create
        Route::GET('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/parameters/create', [App\Http\Controllers\SDM\Role3\Parameter\ParameterController::class, 'getParametersCreate'])->name('getManageParameters.Create.SDM');
        Route::POST('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/parameters/create/post', [App\Http\Controllers\SDM\Role3\Parameter\ParameterController::class, 'postParametersCreate'])->name('postManageParameters.Create.SDM');
        // Read
        Route::GET('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/parameters', [App\Http\Controllers\SDM\Role3\Parameter\ParameterController::class, 'getParameters'])->name('getManageParameters.Read.SDM');
        Route::GET('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/parameters/list', [App\Http\Controllers\SDM\Role3\Parameter\ParameterController::class, 'getParametersList'])->name('getManageParametersList.Read.SDM');
        // View
        Route::GET('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/parameters/view/{id}', [App\Http\Controllers\SDM\Role3\Parameter\ParameterController::class, 'getParametersIdView'])->name('getManageParametersId.View.SDM');
        // Update
        Route::GET('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/parameters/edit/{id}', [App\Http\Controllers\SDM\Role3\Parameter\ParameterController::class, 'getParametersIdUpdate'])->name('getManageParametersId.Update.SDM');
        Route::POST('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/parameters/edit/{id}/post', [App\Http\Controllers\SDM\Role3\Parameter\ParameterController::class, 'postParametersIdUpdate'])->name('postManageParametersId.Update.SDM');
        // Delete


        // Manage Team Assessment
        // Create
        Route::GET('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/team-assessment/create', [App\Http\Controllers\SDM\Role3\TeamAssessment\ManageTeamAssessmentController::class, 'getTeamAssessmentCreate'])->name('getManageTeamAssessment.Create.SDM');
        Route::POST('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/team-assessment/create/post', [App\Http\Controllers\SDM\Role3\TeamAssessment\ManageTeamAssessmentController::class,'postTeamAssessmentCreate'])->name('postManageTeamAssessment.Create.SDM');
        // Read
        Route::GET('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/team-assessment', [App\Http\Controllers\SDM\Role3\TeamAssessment\ManageTeamAssessmentController::class, 'getTeamAssessment'])->name('getManageTeamAssessment.Read.SDM');
        Route::GET('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/team-assessment/list', [App\Http\Controllers\SDM\Role3\TeamAssessment\ManageTeamAssessmentController::class, 'getTeamAssessmentList'])->name('getManageTeamAssessmentList.Read.SDM');
        // View
        Route::GET('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/team-assessment/view/{id}', [App\Http\Controllers\SDM\Role3\TeamAssessment\ManageTeamAssessmentController::class, 'getTeamAssessmentIdView'])->name('getManageTeamAssessmentId.View.SDM');
        // Update
        Route::GET('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/team-assessment/edit/{id}', [App\Http\Controllers\SDM\Role3\TeamAssessment\ManageTeamAssessmentController::class, 'getTeamAssessmentIdUpdate'])->name('getManageTeamAssessmentId.Update.SDM');
        Route::POST('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/team-assessment/edit/{id}/post', [App\Http\Controllers\SDM\Role3\TeamAssessment\ManageTeamAssessmentController::class, 'postTeamAssessmentIdUpdate'])->name('postManageTeamAssessmentId.Update.SDM');
        Route::POST('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/team-assessment/edit/{id}/post/change-password', [App\Http\Controllers\SDM\Role3\TeamAssessment\ManageTeamAssessmentController::class, 'postTeamAssessmentIdUpdateChangePassword'])->name('postManageTeamAssessmentId.UpdateChangePassword.SDM');
        // Non Active / Active
        Route::POST('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/team-assessment/status_active/{id}', [App\Http\Controllers\SDM\Role3\TeamAssessment\ManageTeamAssessmentController::class, 'postTeamAssessmentIdStatusActive'])->name('postManageTeamAssessmentId.StatusActive.SDM');
        // Delete
        Route::POST('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/team-assessment/delete/{id}', [App\Http\Controllers\SDM\Role3\TeamAssessment\ManageTeamAssessmentController::class, 'postTeamAssessmentIdDelete'])->name('postManageTeamAssessmentId.Delete.SDM');


        // Manage Time CountDown
        // Form Inovation
        // Create or Update
        Route::GET('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/timer-countdown/form-innovation', [App\Http\Controllers\SDM\Role3\TimerCountDown\ManageTimerCountDownController::class, 'getTimerCountDownFormInovation'])->name('getTimerCountDownFormInovation.Index.Create.SDM');
        Route::POST('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/timer-countdown/form-innovation/post', [App\Http\Controllers\SDM\Role3\TimerCountDown\ManageTimerCountDownController::class, 'postTimerCountDownFormInovation'])->name('postTimerCountDownFormInovation.Index.Create.SDM');
        // Delete
        Route::POST('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/timer-countdown/form-innovation/delete/{id}', [App\Http\Controllers\SDM\Role3\TimerCountDown\ManageTimerCountDownController::class, 'deleteTimerCountDownFormInovation'])->name('deleteTimerCountDownFormInovation.Index.Create.SDM');
        // Appraisment Inovation
        // Create or Update
        Route::GET('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/timer-countdown/appraisement', [App\Http\Controllers\SDM\Role3\TimerCountDown\ManageTimerCountDownController::class, 'getTimerCountDownAppraisment'])->name('getTimerCountDownAppraisment.Index.Create.SDM');
        Route::POST('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/timer-countdown/appraisement/post', [App\Http\Controllers\SDM\Role3\TimerCountDown\ManageTimerCountDownController::class, 'postTimerCountDownAppraisment'])->name('postTimerCountDownAppraisment.Index.Create.SDM');
        // Delete
        Route::POST('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/timer-countdown/appraisement/delete/{id}', [App\Http\Controllers\SDM\Role3\TimerCountDown\ManageTimerCountDownController::class, 'deleteTimerCountDownAppraisment'])->name('deleteTimerCountDownAppraisment.Index.Create.SDM');
        // Signature SDM
        // Create or Update
        Route::GET('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/timer-countdown/signature', [App\Http\Controllers\SDM\Role3\TimerCountDown\ManageTimerCountDownController::class, 'getTimerCountDownSignature'])->name('getTimerCountDownSignature.Index.Create.SDM');
        Route::POST('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/timer-countdown/signature/post', [App\Http\Controllers\SDM\Role3\TimerCountDown\ManageTimerCountDownController::class, 'postTimerCountDownSignature'])->name('postTimerCountDownSignature.Index.Create.SDM');
        // Delete
        Route::POST('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/timer-countdown/signature/delete/{id}', [App\Http\Controllers\SDM\Role3\TimerCountDown\ManageTimerCountDownController::class, 'deleteTimerCountDownSignature'])->name('deleteTimerCountDownSignature.Index.Create.SDM');

        // Appraisment Teladan
        // Create or Update
        Route::GET('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/timer-countdown/representative-appraisement', [App\Http\Controllers\SDM\Role3\TimerCountDown\ManageTimerCountDownController::class, 'getTimerCountDownFormTeladan'])->name('getTimerCountDownFormTeladan.Index.Create.SDM');
        Route::POST('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/timer-countdown/representative-appraisement/post', [App\Http\Controllers\SDM\Role3\TimerCountDown\ManageTimerCountDownController::class, 'postTimerCountDownFormTeladan'])->name('postTimerCountDownFormTeladan.Index.Create.SDM');
        // Delete
        Route::POST('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/timer-countdown/representative-appraisement/delete/{id}', [App\Http\Controllers\SDM\Role3\TimerCountDown\ManageTimerCountDownController::class, 'deleteTimerCountDownFormTeladan'])->name('deleteTimerCountDownFormTeladan.Index.Create.SDM');
        // Signature SDM
        // Create or Update
        Route::GET('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/timer-countdown/representative-signature', [App\Http\Controllers\SDM\Role3\TimerCountDown\ManageTimerCountDownController::class, 'getTimerCountDownSignatureTeladan'])->name('getTimerCountDownSignatureTeladan.Index.Create.SDM');
        Route::POST('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/timer-countdown/representative-signature/post', [App\Http\Controllers\SDM\Role3\TimerCountDown\ManageTimerCountDownController::class, 'postTimerCountDownSignatureTeladan'])->name('postTimerCountDownSignatureTeladan.Index.Create.SDM');
        // Delete
        Route::POST('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/timer-countdown/representative-signature/delete/{id}', [App\Http\Controllers\SDM\Role3\TimerCountDown\ManageTimerCountDownController::class, 'deleteTimerCountDownSignatureTeladan'])->name('deleteTimerCountDownSignatureTeladan.Index.Create.SDM');

        // Signature
        // Signature Inovation
        // Read
        Route::GET('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/signature/innovation', [App\Http\Controllers\SDM\Role3\Signature\SignatureInovationController::class, 'getSignatureInovationKepalaSubbagianPenghargaanDisiplindanPensiun'])->name('getSignatureInovation.KepalaSubbagianPenghargaanDisiplindanPensiun.SDM');
        Route::GET('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/signature/innovation/list', [App\Http\Controllers\SDM\Role3\Signature\SignatureInovationController::class, 'getSignatureInovationListKepalaSubbagianPenghargaanDisiplindanPensiun'])->name('getSignatureInovationList.KepalaSubbagianPenghargaanDisiplindanPensiun.SDM');
        // Update
        Route::GET('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/signature/innovation/{id}', [App\Http\Controllers\SDM\Role3\Signature\SignatureInovationController::class, 'getSignatureInovationIdKepalaSubbagianPenghargaanDisiplindanPensiun'])->name('getSignatureInovationId.KepalaSubbagianPenghargaanDisiplindanPensiun.SDM');
        Route::POST('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/signature/innovation/{id}/post', [App\Http\Controllers\SDM\Role3\Signature\SignatureInovationController::class, 'postSignatureInovationIdKepalaSubbagianPenghargaanDisiplindanPensiun'])->name('postSignatureInovationId.KepalaSubbagianPenghargaanDisiplindanPensiun.SDM');

        // Signature Teladan
        // Read
        Route::GET('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/signature/representative', [App\Http\Controllers\SDM\Role3\Signature\SignatureTeladanController::class, 'getSignatureRepresentativeKepalaSubbagianPenghargaanDisiplindanPensiun'])->name('getSignatureRepresentative.KepalaSubbagianPenghargaanDisiplindanPensiun.SDM');
        Route::GET('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/signature/representative/list', [App\Http\Controllers\SDM\Role3\Signature\SignatureTeladanController::class, 'getSignatureRepresentativeListKepalaSubbagianPenghargaanDisiplindanPensiun'])->name('getSignatureRepresentativeList.KepalaSubbagianPenghargaanDisiplindanPensiun.SDM');
        // Update
        Route::GET('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/signature/representative/{id}', [App\Http\Controllers\SDM\Role3\Signature\SignatureTeladanController::class, 'getSignatureRepresentativeIdKepalaSubbagianPenghargaanDisiplindanPensiun'])->name('getSignatureRepresentativeId.KepalaSubbagianPenghargaanDisiplindanPensiun.SDM');
        Route::POST('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/signature/representative/{id}/post', [App\Http\Controllers\SDM\Role3\Signature\SignatureTeladanController::class, 'postSignatureRepresentativeIdKepalaSubbagianPenghargaanDisiplindanPensiun'])->name('postSignatureRepresentativeId.KepalaSubbagianPenghargaanDisiplindanPensiun.SDM');


        // Final Inovation Reward
        // Read
        Route::GET('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/reward/innovation', [App\Http\Controllers\SDM\Role3\Reward\RewardInovationController::class, 'getRewardInovationKepalaSubbagianPenghargaanDisiplindanPensiun'])->name('getRewardInovation.KepalaSubbagianPenghargaanDisiplindanPensiun.SDM');
        Route::GET('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/reward/innovation/list', [App\Http\Controllers\SDM\Role3\Reward\RewardInovationController::class, 'getRewardInovationListKepalaSubbagianPenghargaanDisiplindanPensiun'])->name('getRewardInovationList.KepalaSubbagianPenghargaanDisiplindanPensiun.SDM');

        // Final Teladan Reward
        // Read
        Route::GET('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/reward/representative', [App\Http\Controllers\SDM\Role3\Reward\RewardRepresentativeController::class, 'getRewardRepresentativeKepalaSubbagianPenghargaanDisiplindanPensiun'])->name('getRewardRepresentative.KepalaSubbagianPenghargaanDisiplindanPensiun.SDM');
        Route::GET('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/reward/representative/list', [App\Http\Controllers\SDM\Role3\Reward\RewardRepresentativeController::class, 'getRewardRepresentativeListKepalaSubbagianPenghargaanDisiplindanPensiun'])->name('getRewardRepresentativeList.KepalaSubbagianPenghargaanDisiplindanPensiun.SDM');
    });

});


// Team Assesment
Route::group(['name' => 'penilai', 'prefix' => 'penilai', 'as' => 'penilai.'], function () {
    // Login, Reset Password, dan Logout
    Route::GET('/', [App\Http\Controllers\TeamAssessment\Auth\LoginController::class, 'getLoginForm'])->name('getLogin.Penilai');
    Route::POST('/', [App\Http\Controllers\TeamAssessment\Auth\LoginController::class, 'postLoginForm'])->name('postLogin.Penilai');
    Route::GET('/logout', [App\Http\Controllers\TeamAssessment\Auth\LoginController::class, 'getLogout'])->name('getLogout.Penilai');

    Route::GET('/forgot-password', [App\Http\Controllers\TeamAssessment\Auth\ForgotPasswordController::class, 'getForgetPasswordForm'])->name('getForgetPassword.Penilai');

    Route::POST('/forgot-password', [App\Http\Controllers\TeamAssessment\Auth\ForgotPasswordController::class, 'postForgetPasswordForm'])->name('postForgetPassword.Penilai');

    Route::GET('/reset-password/{token}', [App\Http\Controllers\TeamAssessment\Auth\ForgotPasswordController::class, 'getResetPasswordForm'])->name('getResetPassword.Penilai');

    Route::POST('/reset-password', [App\Http\Controllers\TeamAssessment\Auth\ForgotPasswordController::class, 'postResetPasswordForm'])->name('postResetPassword.Penilai');

    // Dashboard
    Route::GET('/dashboard', [\App\Http\Controllers\TeamAssessment\DashboardController::class, 'dashboard'])->name('getDashboard.Penilai');

    // Profile
    Route::GET('profile', [App\Http\Controllers\TeamAssessment\TAController::class, 'getProfile'])->name('getProfile.Penilai');
    Route::POST('profile/update', [App\Http\Controllers\TeamAssessment\TAController::class, 'postProfile'])->name('postProfile.Update.Penilai');
    // Profile Image Upload & delete
    Route::POST('/image/upload', [App\Http\Controllers\TeamAssessment\TAController::class, 'postImageUpload'])->name('postProfile.postImageUpload.Penilai');
    Route::POST('/image/delete', [App\Http\Controllers\TeamAssessment\TAController::class, 'postImageDelete'])->name('postProfile.postImageDelete.Penilai');
    // Profile Change Password
    Route::POST('/profile/change-password', [App\Http\Controllers\TeamAssessment\TAController::class, 'changePasswordUpdate'])->name('postProfile.changePasswordUpdate.Penilai');

    // SMART
    // Kategori
    Route::GET('/categories/list', [\App\Http\Controllers\TeamAssessment\SMART\SmartController::class, 'categoriesList'])->name('categoriesList.Penilai');
    Route::GET('/categories/list/data', [\App\Http\Controllers\TeamAssessment\SMART\SmartController::class, 'categoriesListData'])->name('categoriesListData.Penilai');
    // Kriteria
    Route::GET('/criterias/list', [\App\Http\Controllers\TeamAssessment\SMART\SmartController::class, 'criteriasList'])->name('criteriasList.Penilai');
    Route::GET('/criterias/list/data/inovasi', [\App\Http\Controllers\TeamAssessment\SMART\SmartController::class, 'criteriasListDataInovasi'])->name('criteriasListData.Inovasi.Penilai');
    Route::GET('/criterias/list/data/teladan', [\App\Http\Controllers\TeamAssessment\SMART\SmartController::class, 'criteriasListDataTeladan'])->name('criteriasListData.Teladan.Penilai');
    // Parameter
    Route::GET('/parameters/list', [\App\Http\Controllers\TeamAssessment\SMART\SmartController::class, 'parametersList'])->name('parametersList.Penilai');
    Route::GET('/parameters/list/data/inovasi', [\App\Http\Controllers\TeamAssessment\SMART\SmartController::class, 'parametersListDataInovasi'])->name('parametersListData.Inovasi.Penilai');
    Route::GET('/parameters/list/data/teladan', [\App\Http\Controllers\TeamAssessment\SMART\SmartController::class, 'parametersListDataTeladan'])->name('parametersListData.Teladan.Penilai');

    // Penilaian Inovasi
    // Read
    Route::GET('/appraisement/innovation', [App\Http\Controllers\TeamAssessment\Penilaian\Inovasi\ManageAppraismentInovationController::class, 'getAppraisment'])->name('getManageAppraisment.Read.Penilai');
    Route::GET('/appraisement/innovation/list', [\App\Http\Controllers\TeamAssessment\Penilaian\Inovasi\ManageAppraismentInovationController::class, 'getAppraismentList'])->name('getManageAppraismentList.Read.Penilai');
    Route::GET('/appraisement/innovation/list/DSS', [\App\Http\Controllers\TeamAssessment\Penilaian\Inovasi\ManageAppraismentInovationController::class, 'getAppraismentListDSS'])->name('getManageAppraismentListDSS.Read.Penilai');
    // Route::GET('/appraisement/innovation/list/DSS/result', [\App\Http\Controllers\TeamAssessment\Penilaian\Inovasi\ManageAppraismentInovationController::class, 'getAppraismentListDSSResult'])->name('getManageAppraismentListDSSResult.Read.Penilai');
    // Update
    Route::GET('/appraisement/innovation/valuation/{id}' , [App\Http\Controllers\TeamAssessment\Penilaian\Inovasi\ManageAppraismentInovationController::class, 'getAppraismentIdUpdate'])->name('getManageAppraismentId.Update.Penilai');
    Route::POST('/appraisement/innovation/valuation/{id}/post', [App\Http\Controllers\TeamAssessment\Penilaian\Inovasi\ManageAppraismentInovationController::class, 'postAppraismentIdUpdate'])->name('postManageAppraismentId.Update.Penilai');

    // Penilaian Teladan
    // Read
    Route::GET('/appraisement/representative', [App\Http\Controllers\TeamAssessment\Penilaian\Teladan\ManageAppraismentTeladanController::class, 'getAppraisment'])->name('getManageAppraisment.Representative.Read.Penilai');
    Route::GET('/appraisement/representative/list', [\App\Http\Controllers\TeamAssessment\Penilaian\Teladan\ManageAppraismentTeladanController::class, 'getAppraismentList'])->name('getManageAppraismentList.Representative.Read.Penilai');
    Route::GET('/appraisement/representative/list/DSS', [\App\Http\Controllers\TeamAssessment\Penilaian\Teladan\ManageAppraismentTeladanController::class, 'getAppraismentListDSS'])->name('getManageAppraismentListDSS.Representative.Read.Penilai');
    // Route::GET('/appraisement/representative/list/DSS/result', [\App\Http\Controllers\TeamAssessment\Penilaian\Teladan\ManageAppraismentTeladanController::class, 'getAppraismentListDSSResult'])->name('getManageAppraismentListDSSResult.Read.Penilai');
    // Update
    Route::GET('/appraisement/representative/valuation/{id}' , [App\Http\Controllers\TeamAssessment\Penilaian\Teladan\ManageAppraismentTeladanController::class, 'getAppraismentIdUpdate'])->name('getManageAppraismentId.Representative.Update.Penilai');
    Route::POST('/appraisement/representative/valuation/{id}/post', [App\Http\Controllers\TeamAssessment\Penilaian\Teladan\ManageAppraismentTeladanController::class, 'postAppraismentIdUpdate'])->name('postManageAppraismentId.Representative.Update.Penilai');

    // Hasil Penilaian Inovasi
    // Read
    Route::GET('/appraisement/result/innovation', [App\Http\Controllers\TeamAssessment\Penilaian\Inovasi\ManageAppraismentInovationController::class, 'getResultAppraisment'])->name('getManageAppraismentResult.Read.Penilai');
    Route::GET('/appraisement/result/innovation/list', [\App\Http\Controllers\TeamAssessment\Penilaian\Inovasi\ManageAppraismentInovationController::class, 'getResultAppraismentList'])->name('getManageAppraismentResultList.Read.Penilai');

    // Hasil Penilaian Teladan
    // Read
    Route::GET('/appraisement/result/representative', [App\Http\Controllers\TeamAssessment\Penilaian\Teladan\ManageAppraismentTeladanController::class, 'getResultAppraisment'])->name('getManageAppraismentResult.Representative.Read.Penilai');
    Route::GET('/appraisement/result/representative/list', [\App\Http\Controllers\TeamAssessment\Penilaian\Teladan\ManageAppraismentTeladanController::class, 'getResultAppraismentList'])->name('getManageAppraismentResultList.Representative.Read.Penilai');
});

// Kepala Satuan Kerja
Route::group(['name' => 'ksk', 'prefix' => 'ksk', 'as' => 'hwu.'], function () {
    // Login, Reset Password, dan Logout
    Route::GET('/', [App\Http\Controllers\HWU\Auth\LoginController::class, 'getLoginForm'])->name('getLogin.HWU');
    Route::POST('/', [App\Http\Controllers\HWU\Auth\LoginController::class, 'postLoginForm'])->name('postLogin.HWU');
    Route::GET('/logout', [App\Http\Controllers\HWU\Auth\LoginController::class, 'getLogout'])->name('getLogout.HWU');

    Route::GET('/forgot-password', [App\Http\Controllers\HWU\Auth\ForgotPasswordController::class, 'getForgetPasswordForm'])->name('getForgetPassword.HWU');

    Route::POST('/forgot-password', [App\Http\Controllers\HWU\Auth\ForgotPasswordController::class, 'postForgetPasswordForm'])->name('postForgetPassword.HWU');

    Route::GET('/reset-password/{token}', [App\Http\Controllers\HWU\Auth\ForgotPasswordController::class, 'getResetPasswordForm'])->name('getResetPassword.HWU');

    Route::POST('/reset-password', [App\Http\Controllers\HWU\Auth\ForgotPasswordController::class, 'postResetPasswordForm'])->name('postResetPassword.HWU');

    Route::group(['middleware' => 'hwu.auth'], function () {
        //
        // Dashboard
        Route::GET('/dashboard', [App\Http\Controllers\HWU\DashboardController::class, 'dashboard'])->name('getDashboard.HWU');
        Route::GET('/dashboard/form-innovation/list/data', [App\Http\Controllers\HWU\DashboardController::class, 'getInovationFormData'])->name('getDashboard.getInovationFormData.Read.HWU');
        Route::GET('/dashboard/form-representative/list/data', [App\Http\Controllers\HWU\DashboardController::class, 'getTeladanFormData'])->name('getDashboard.getTeladanFormData.Read.HWU');

        // Profile
        Route::GET('/profile', [App\Http\Controllers\HWU\HWUController::class, 'getProfile'])->name('getProfile.HWU');
        Route::POST('/profile/update', [App\Http\Controllers\HWU\HWUController::class, 'postProfile'])->name('postProfile.Update.HWU');
        // Profile Image Upload & delete
        Route::POST('/image/upload', [App\Http\Controllers\HWU\HWUController::class, 'postImageUpload'])->name('postProfile.postImageUpload.HWU');
        Route::POST('/image/delete', [App\Http\Controllers\HWU\HWUController::class, 'postImageDelete'])->name('postProfile.postImageDelete.HWU');
        // Profile Change Password
        Route::POST('/profile/change-password', [App\Http\Controllers\HWU\HWUController::class, 'changePasswordUpdate'])->name('postProfile.changePasswordUpdate.HWU');

        // Manage Inovation Employee
        // Read
        Route::GET('form-innovation/list', [App\Http\Controllers\HWU\Pegawai\InovationController::class, 'getInovationFormList'])->name('getInovationFormList.Read.HWU');
        // 2=menunggu
        Route::GET('form-innovation/list/data', [App\Http\Controllers\HWU\Pegawai\InovationController::class, 'getInovationFormData'])->name('getInovationFormData.Read.HWU');
        // Update
        Route::GET('form-innovation/list/update/{id}', [App\Http\Controllers\HWU\Pegawai\InovationController::class, 'getInovationIdUpdate'])->name('getInovationIdUpdate.Update.HWU');
        // 0=ditolak
        Route::POST('form-innovation/list/update/{id}/reject', [App\Http\Controllers\HWU\Pegawai\InovationController::class, 'postInovationFormDataReject'])->name('postInovationFormData.Read.Reject.HWU');
        // 1=dikembalikan
        Route::POST('form-innovation/list/update/{id}/back', [App\Http\Controllers\HWU\Pegawai\InovationController::class, 'postInovationFormDataBack'])->name('postInovationFormData.Read.Back.HWU');
        // 3=diproses
        Route::POST('form-innovation/list/update/{id}/process', [App\Http\Controllers\HWU\Pegawai\InovationController::class, 'postInovationFormDataProcess'])->name('postInovationFormData.Read.Process.HWU');
    });

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
    Route::GET('dashboard/form-innovation/list/data', [App\Http\Controllers\Pegawai\DashboardController::class, 'getInovationFormData'])->name('getDashboard.getInovationFormData.Read.Pegawai');
    Route::GET('dashboard/form-representative/list/data', [App\Http\Controllers\Pegawai\DashboardController::class, 'getTeladanFormData'])->name('getDashboard.getTeladanFormData.Read.Pegawai');

    Route::GET('dashboard/reward-innovation/list/data', [App\Http\Controllers\Pegawai\DashboardController::class, 'getDashboardRewardInovationData'])->name('getDashboard.getRewardInovationData.Read.Pegawai');
    Route::GET('dashboard/reward-representative/list/data', [App\Http\Controllers\Pegawai\DashboardController::class, 'getDashboardRewardRepresentativeData'])->name('getDashboard.getRewardRepresentativeData.Read.Pegawai');

    // Profile
    Route::GET('profile', [App\Http\Controllers\Pegawai\PegawaiController::class, 'getProfile'])->name('getProfile.Pegawai');
    Route::POST('profile/update', [App\Http\Controllers\Pegawai\PegawaiController::class, 'postProfile'])->name('postProfile.Update.Pegawai');
    // Profile Image Upload & delete
    Route::POST('/image/upload', [App\Http\Controllers\Pegawai\PegawaiController::class, 'postImageUpload'])->name('postProfile.postImageUpload.Pegawai');
    Route::POST('/image/delete', [App\Http\Controllers\Pegawai\PegawaiController::class, 'postImageDelete'])->name('postProfile.postImageDelete.Pegawai');
    // Profile Change Password
    Route::POST('profile/change-password', [App\Http\Controllers\Pegawai\PegawaiController::class, 'changePasswordUpdate'])->name('postProfile.changePasswordUpdate.Pegawai');

    // Manage Form Inovation and Teladan
    // Manage Inovation
    // Create
    Route::GET('form-innovation/create', [App\Http\Controllers\Pegawai\Inovation\InovationController::class, 'getInovationFormCreate'])->name('getInovationFormCreate.Create.Pegawai');
    Route::Post('form-innovation/create/post', [App\Http\Controllers\Pegawai\Inovation\InovationController::class, 'postInovationFormCreate'])->name('postInovationFormCreate.Create.Pegawai');
    // Read
    Route::GET('form-innovation/list', [App\Http\Controllers\Pegawai\Inovation\InovationController::class, 'getInovationFormList'])->name('getInovationFormList.Read.Pegawai');
    // 0=ditolak
    Route::GET('form-innovation/list/data/reject', [App\Http\Controllers\Pegawai\Inovation\InovationController::class, 'getInovationFormDataReject'])->name('getInovationFormData.Read.Reject.Pegawai');
    // 1=dikembalikan
    Route::GET('form-innovation/list/data/back', [App\Http\Controllers\Pegawai\Inovation\InovationController::class, 'getInovationFormDataBack'])->name('getInovationFormData.Read.Back.Pegawai');
    // 2=menunggu
    Route::GET('form-innovation/list/data', [App\Http\Controllers\Pegawai\Inovation\InovationController::class, 'getInovationFormData'])->name('getInovationFormData.Read.Pegawai');
    // 3=diproses
    Route::GET('form-innovation/list/data/process', [App\Http\Controllers\Pegawai\Inovation\InovationController::class, 'getInovationFormDataProcess'])->name('getInovationFormData.Read.Process.Pegawai');
    // Update
    Route::GET('form-innovation/update/{id}', [App\Http\Controllers\Pegawai\Inovation\InovationController::class, 'getInovationIdUpdate'])->name('getInovationIdUpdate.Update.Pegawai');
    Route::POST('form-innovation/update/{id}/post', [App\Http\Controllers\Pegawai\Inovation\InovationController::class, 'postInovationIdUpdate'])->name('postInovationIdUpdate.Update.Pegawai');
    // Delete
    Route::POST('form-innovation/delete/{id}', [App\Http\Controllers\Pegawai\Inovation\InovationController::class, 'postInovationIdDelete'])->name('postInovationIdDelete.Delete.Pegawai');

    // Manage Teladan
    // Create
    Route::GET('form-representative/create', [App\Http\Controllers\Pegawai\Teladan\TeladanController::class, 'getTeladanFormCreate'])->name('getTeladanFormCreate.Create.Pegawai');
    Route::Post('form-representative/create/post', [App\Http\Controllers\Pegawai\Teladan\TeladanController::class, 'postTeladanFormCreate'])->name('postTeladanFormCreate.Create.Pegawai');
    // Read
    Route::GET('form-representative/list', [App\Http\Controllers\Pegawai\Teladan\TeladanController::class, 'getTeladanFormList'])->name('getTeladanFormList.Read.Pegawai');
    // 0=ditolak
    Route::GET('form-representative/list/data/reject', [App\Http\Controllers\Pegawai\Teladan\TeladanController::class, 'getTeladanFormDataReject'])->name('getTeladanFormData.Read.Reject.Pegawai');
    // 1=dikembalikan
    Route::GET('form-representative/list/data/back', [App\Http\Controllers\Pegawai\Teladan\TeladanController::class, 'getTeladanFormDataBack'])->name('getTeladanFormData.Read.Back.Pegawai');
    // 2=menunggu
    Route::GET('form-representative/list/data', [App\Http\Controllers\Pegawai\Teladan\TeladanController::class, 'getTeladanFormData'])->name('getTeladanFormData.Read.Pegawai');
    // 3=diproses
    Route::GET('form-representative/list/data/process', [App\Http\Controllers\Pegawai\Teladan\TeladanController::class, 'getTeladanFormDataProcess'])->name('getTeladanFormData.Read.Process.Pegawai');
    // Update
    Route::GET('form-representative/update/{id}', [App\Http\Controllers\Pegawai\Teladan\TeladanController::class, 'getTeladanIdUpdate'])->name('getTeladanIdUpdate.Update.Pegawai');
    Route::POST('form-representative/update/{id}/post', [App\Http\Controllers\Pegawai\Teladan\TeladanController::class, 'postTeladanIdUpdate'])->name('postTeladanIdUpdate.Update.Pegawai');
    // Delete
    Route::POST('form-representative/delete/{id}', [App\Http\Controllers\Pegawai\Teladan\TeladanController::class, 'postTeladanIdDelete'])->name('postTeladanIdDelete.Delete.Pegawai');

    // Result Reward
    // Reward Inovation
    // Read
    Route::GET('result-reward-innovation', [App\Http\Controllers\Pegawai\ResultReward\RewardInovationController::class, 'getResultRewardInovationRead'])->name('getResultRewardInovation.Read.Pegawai');
    Route::GET('result-reward-innovation/data', [App\Http\Controllers\Pegawai\ResultReward\RewardInovationController::class, 'getResultRewardInovationReadData'])->name('getResultRewardInovationData.Read.Pegawai');
    // Print
    Route::GET('result-reward-innovation/data/print/{id}', [App\Http\Controllers\Pegawai\ResultReward\RewardInovationController::class, 'getResultRewardInovationPrintIdData'])->name('getResultRewardInovationData.PrintId.Pegawai');

    // Reward Teladan
    // Read
    Route::GET('result-reward-representative', [App\Http\Controllers\Pegawai\ResultReward\RewardTeladanController::class, 'getResultRewardRepresentativeRead'])->name('getResultRewardRepresentative.Read.Pegawai');
    Route::GET('result-reward-representative/data', [App\Http\Controllers\Pegawai\ResultReward\RewardTeladanController::class, 'getResultRewardRepresentativeReadData'])->name('getResultRewardRepresentativeData.Read.Pegawai');
    // Print
    Route::GET('result-reward-representative/data/print/{id}', [App\Http\Controllers\Pegawai\ResultReward\RewardTeladanController::class, 'getResultRewardRepresentativePrintIdData'])->name('getResultRewardRepresentativeData.PrintId.Pegawai');










    // Route::GET('')
    // Delete

    // Upload File
    // Route::Get();

    // Route::POST();
    //
});

Route::fallback(function () {
    // alert()->error('link tidak ditemukan')->autoclose(25000);
    // Alert::error('this is error alert');
    return view('errors.404');
});

// Route::GET('/debug', function() {
//     $debug = App::hasDebugModeEnabled();

//     return new Response($debug ? 'Enabled' : 'Disabled');
// });

// Error
Route::GET('/error', function () {
    return view('errors.401');
});


// Test
use App\Models\CountdownTimerFormInovation;

Route::GET('/countdown', function() {
    $timer = CountdownTimerFormInovation::first();
    return view('dropdown',compact('timer'));
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
