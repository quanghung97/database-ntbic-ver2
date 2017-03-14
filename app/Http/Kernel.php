<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
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
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,

        'admin' => \App\Http\Middleware\AdminAuthenticated::class,
        'moderator' => \App\Http\Middleware\ModeratorAuthenticated::class,
        
        'update_chuyen_gia' => \App\Http\Middleware\chuyen_gia\RedirectIfUpdateAuthenticated::class,
        'read_chuyen_gia' => \App\Http\Middleware\chuyen_gia\RedirectIfReadAuthenticated::class,
        'insert_chuyen_gia' => \App\Http\Middleware\chuyen_gia\RedirectIfInsertAuthenticated::class,
        'delete_chuyen_gia' => \App\Http\Middleware\chuyen_gia\RedirectIfDeleteAuthenticated::class,

        'delete_de_tai_du_an_cac_cap' => \App\Http\Middleware\de_tai_du_an_cac_cap\RedirectIfDeleteAuthenticated::class,
        'update_de_tai_du_an_cac_cap' => \App\Http\Middleware\de_tai_du_an_cac_cap\RedirectIfUpdateAuthenticated::class,
        'insert_de_tai_du_an_cac_cap' => \App\Http\Middleware\de_tai_du_an_cac_cap\RedirectIfInsertAuthenticated::class,
        'read_de_tai_du_an_cac_cap' => \App\Http\Middleware\de_tai_du_an_cac_cap\RedirectIfReadAuthenticated::class,

        'delete_phat_minh' => \App\Http\Middleware\phat_minh\RedirectIfDeleteAuthenticated::class,
        'update_phat_minh' => \App\Http\Middleware\phat_minh\RedirectIfUpdateAuthenticated::class,
        'insert_phat_minh' => \App\Http\Middleware\phat_minh\RedirectIfInsertAuthenticated::class,
        'read_phat_minh' => \App\Http\Middleware\phat_minh\RedirectIfReadAuthenticated::class,

        'delete_san_pham' => \App\Http\Middleware\san_pham\RedirectIfDeleteAuthenticated::class,
        'udpate_san_pham' => \App\Http\Middleware\san_pham\RedirectIfUpdateAuthenticated::class,
        'insert_san_pham' => \App\Http\Middleware\san_pham\RedirectIfInsertAuthenticated::class,
        'read_san_pham' => \App\Http\Middleware\san_pham\RedirectIfReadAuthenticated::class,

        'delete_doanh_nghiep' => \App\Http\Middleware\doanh_nghiep\RedirectIfDeleteAuthenticated::class,
        'update_doanh_nghiep' => \App\Http\Middleware\doanh_nghiep\RedirectIfUpdateAuthenticated::class,
        'insert_doanh_nghiep' => \App\Http\Middleware\doanh_nghiep\RedirectIfInsertAuthenticated::class,
        'read_doanh_nghiep' => \App\Http\Middleware\doanh_nghiep\RedirectIfReadAuthenticated::class,


    ];
}
