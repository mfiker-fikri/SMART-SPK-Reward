<?php

namespace App\Http;

use App\Http\Middleware\Pegawai\RedirectIfNotPegawai;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [
        // \App\Http\Middleware\TrustHosts::class,
        \App\Http\Middleware\TrustProxies::class,
        \Fruitcake\Cors\HandleCors::class,
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            //
            // Admins
            \App\Http\Middleware\Admin\LastAdminActivity::class,
            // Human Resources
            \App\Http\Middleware\HumanResources\LastHumanResourcesActivity::class,
            // Admin\LastHumanResourcesActivity::class,
            // Team Assessment
            \App\Http\Middleware\TeamAssessment\LastTeamAssessmentActivity::class,
            // HWU
            \App\Http\Middleware\HeadWorkUnit\LastHWUActivity::class,
            // Pegawais
            \App\Http\Middleware\Admin\LastPegawaiActivity::class,
        ],

        'api' => [
            // \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array<string, class-string|string>
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,

        // Admins
        'admin.auth' => \App\Http\Middleware\Admin\RedirectIfAdmin::class,
        'admin.guest' => \App\Http\Middleware\Admin\RedirectIfNotAdmin::class,

        // Human Resources
        'human_resources.auth' => \App\Http\Middleware\HumanResources\RedirectIfHumanResources::class,
        'human_resources.guest' => \App\Http\Middleware\HumanResources\RedirectIfNotHumanResources::class,

        // Team Assessments
        'team_assessment.auth'  =>  \App\Http\Middleware\TeamAssessment\RedirectIfTA::class,
        'team_assessment.guest' =>  \App\Http\Middleware\TeamAssessment\RedirectIfNotTA::class,

        // Head Work Unit
        'hwu.auth'  =>   \App\Http\Middleware\HeadWorkUnit\RedirectIfHeadWorkUnit::class,
        'hwu.guest' =>  \App\Http\Middleware\HeadWorkUnit\RedirectIfNotHeadWorkUnit::class,

        // Pegawais
        'pegawai.auth' => \App\Http\Middleware\Pegawai\RedirectIfPegawai::class,
        'pegawai.guest' => \App\Http\Middleware\Pegawai\RedirectIfNotPegawai::class,

    ];
}
