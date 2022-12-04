<?php

use Illuminate\Routing\RouteGroup;
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

// Kepala Biro SDM, Bagian Penghargaan, Disiplin, dan Tata Usaha,
// Subbagian Penghargaan, Disiplin, dan Pensiun
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
    });

    // Kepala Bagian Penghargaan, Disiplin, dan Tata Usaha
    Route::middleware(['human_resources.auth:2'])->group(function () {
        // Dashboard
        Route::GET('/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/dashboard', [\App\Http\Controllers\SDM\DashboardController::class,'dashboardKepalaBagianPenghargaanDisiplindanTataUsaha'])->name('getDashboard.KepalaBagianPenghargaanDisiplindanTataUsaha.SDM');
        // Profile
        Route::GET('/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/profile', [App\Http\Controllers\SDM\SDMController::class, 'getProfileKepalaBagianPenghargaanDisiplindanTataUsaha'])->name('getProfile.KepalaBagianPenghargaanDisiplindanTataUsaha.SDM');
        Route::POST('/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/profile/update', [App\Http\Controllers\SDM\SDMController::class, 'postProfileKepalaBagianPenghargaanDisiplindanTataUsaha'])->name('postProfile.Update.KepalaBagianPenghargaanDisiplindanTataUsaha.SDM');
        // Profile Image Upload & delete
        Route::POST('/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/image/upload', [App\Http\Controllers\SDM\SDMController::class, 'postImageUploadKepalaBagianPenghargaanDisiplindanTataUsaha'])->name('postProfile.postImageUpload.KepalaBagianPenghargaanDisiplindanTataUsaha.SDM');
        Route::POST('/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/image/delete', [App\Http\Controllers\SDM\SDMController::class, 'postImageDeleteKepalaBagianPenghargaanDisiplindanTataUsaha'])->name('postProfile.postImageDelete.KepalaBagianPenghargaanDisiplindanTataUsaha.SDM');
        // Profile Change Password
        Route::POST('/kepala-bagian-penghargaan-disiplin-dan-tata-usaha/profile/change-password', [App\Http\Controllers\SDM\SDMController::class, 'changePasswordUpdateKepalaBagianPenghargaanDisiplindanTataUsaha'])->name('postProfile.changePasswordUpdate.KepalaBagianPenghargaanDisiplindanTataUsaha.SDM');
    });


    // Kepala Subbagian Penghargaan, Disiplin, dan Pensiun
    Route::middleware(['human_resources.auth:3'])->group(function () {
        // Dashboard
        Route::GET('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/dashboard', [\App\Http\Controllers\SDM\DashboardController::class,'dashboardKepalaSubbagianPenghargaanDisiplindanPensiun'])->name('getDashboard.KepalaSubbagianPenghargaanDisiplindanPensiun.SDM');
        // Profile
        Route::GET('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/profile', [App\Http\Controllers\SDM\SDMController::class, 'getProfileKepalaSubbagianPenghargaanDisiplindanPensiun'])->name('getProfile.KepalaSubbagianPenghargaanDisiplindanPensiun.SDM');
        Route::POST('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/profile/update', [App\Http\Controllers\SDM\SDMController::class, 'postProfileKepalaSubbagianPenghargaanDisiplindanPensiun'])->name('postProfile.Update.KepalaSubbagianPenghargaanDisiplindanPensiun.SDM');
        // Profile Image Upload & delete
        Route::POST('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/image/upload', [App\Http\Controllers\SDM\SDMController::class, 'postImageUploadKepalaSubbagianPenghargaanDisiplindanPensiun'])->name('postProfile.postImageUpload.KepalaSubbagianPenghargaanDisiplindanPensiun.SDM');
        Route::POST('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/image/delete', [App\Http\Controllers\SDM\SDMController::class, 'postImageDeleteKepalaSubbagianPenghargaanDisiplindanPensiun'])->name('postProfile.postImageDelete.KepalaSubbagianPenghargaanDisiplindanPensiun.SDM');
        // Profile Change Password
        Route::POST('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/profile/change-password', [App\Http\Controllers\SDM\SDMController::class, 'changePasswordUpdateKepalaSubbagianPenghargaanDisiplindanPensiun'])->name('postProfile.changePasswordUpdate.KepalaSubbagianPenghargaanDisiplindanPensiun.SDM');


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
        Route::GET('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/team-assessment/edit/{id}', [App\Http\Controllers\SDM\Role3\TeamAssessment\ManageTeamAssessmentController::class], 'getTeamAssessmentIdUpdate')->name('getManageTeamAssessmentId.Update.SDM');
        Route::POST('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/team-assessment/edit/{id}/post', [App\Http\Controllers\SDM\Role3\TeamAssessment\ManageTeamAssessmentController::class, 'postTeamAssessmentIdUpdate'])->name('postManageTeamAssessmentId.Update.SDM');
        // Delete


        // Manage Time CountDown
        // Form Inovation
        Route::GET('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/timer-countdown/form-inovation', [App\Http\Controllers\SDM\Role3\TimerCountDown\ManageTimerCountDownController::class, 'getTimerCountDownFormInovation'])->name('getTimerCountDownFormInovation.Index.Create.SDM');
        Route::POST('/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/timer-countdown/form-inovation/post', [App\Http\Controllers\SDM\Role3\TimerCountDown\ManageTimerCountDownController::class, 'postTimerCountDownFormInovation'])->name('postTimerCountDownFormInovation.Index.Create.SDM');
    });

});


// Team Assesment
Route::group(['name' => 'tim-penilai', 'prefix' => 'penilai', 'as' => 'penilai.'], function () {
    // Login, Reset Password, dan Logout
    Route::GET('/', [App\Http\Controllers\TeamAssessment\Auth\LoginController::class, 'getLoginForm'])->name('getLogin.Penilai');
    Route::POST('/', [App\Http\Controllers\TeamAssessment\Auth\LoginController::class, 'postLoginForm'])->name('postLogin.Penilai');
    Route::GET('/logout', [App\Http\Controllers\TeamAssessment\Auth\LoginController::class, 'getLogout'])->name('getLogout.Penilai');

    Route::GET('/forgot-password', [App\Http\Controllers\TeamAsessment\Auth\ForgotPasswordController::class, 'getForgetPasswordForm'])->name('getForgetPassword.Penilai');

    Route::POST('/forgot-password', [App\Http\Controllers\TeamAsessment\Auth\ForgotPasswordController::class, 'postForgetPasswordForm'])->name('postForgetPassword.Penilai');

    Route::GET('/reset-password/{token}', [App\Http\Controllers\TeamAsessment\Auth\ForgotPasswordController::class, 'getResetPasswordForm'])->name('getResetPassword.Penilai');

    Route::POST('/reset-password', [App\Http\Controllers\TeamAsessment\Auth\ForgotPasswordController::class, 'postResetPasswordForm'])->name('postResetPassword.Penilai');

    // Dashboard
    // Penilaian Inovasi
    // Read
    Route::GET('/appraisment', [App\Http\Controllers\TeamAssessment\Penilaian\Inovasi\ManageAppraismentInovationController::class, 'get'])->name('getManageAppraisment.Read.Penilai');
    Route::GET('/appraisment/list')->name('getManageAppraisment.Read.Penilai');
    // Update
    Route::GET('/appraisment/update/{id}' , [App\Http\Controllers\TeamAssessment\Penilaian\Inovasi\ManageAppraismentInovationController::class, 'get'])->name('getManageAppraisment.Update.Penilai');
    Route::POST('/appraisment/update/{id}/post')->name('postManageAppraisment.Update.Penilai');

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
    Route::GET('form-inovation/create', [App\Http\Controllers\Pegawai\Inovation\InovationController::class, 'getInovationFormCreate'])->name('getInovationFormCreate.Create.Pegawai');
    Route::Post('form-inovation/create/post', [App\Http\Controllers\Pegawai\Inovation\InovationController::class, 'postInovationFormCreate'])->name('postInovationFormCreate.Create.Pegawai');
    // Read
    Route::GET('form-inovation/list', [App\Http\Controllers\Pegawai\Inovation\InovationController::class, 'getInovationFormList'])->name('getInovationFormList.Read.Pegawai');
    Route::GET('form-inovation/list/data', [App\Http\Controllers\Pegawai\Inovation\InovationController::class, 'getInovationFormData'])->name('getInovationFormData.Read.Pegawai');
    // Update
    Route::GET('form-inovation/update/{id}', [App\Http\Controllers\Pegawai\Inovation\InovationController::class, 'getInovationIdUpdate'])->name('getInovationIdUpdate.Update.Pegawai');
    Route::POST('form-inovation/update/{id}/post', [App\Http\Controllers\Pegawai\Inovation\InovationController::class, 'postInovationIdUpdate'])->name('postInovationIdUpdate.Update.Pegawai');
    // Delete
    Route::POST('form-inovation/delete/{id}', [App\Http\Controllers\Pegawai\Inovation\InovationController::class, 'postInovationIdDelete'])->name('postInovationIdDelete.Delete.Pegawai');














    // Route::GET('')
    // Delete

    // Upload File
    // Route::Get();

    // Route::POST();
    //
});

// Error
Route::GET('/error', function () {
    return view('errors.503');
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
