<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use App\Exceptions\InvalidOrderException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
// use InvalidOrderException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
        InvalidOrderException::class,
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        // 
        $this->reportable(function (InvalidOrderException $e) {
            //
        })->stop();

        $this->reportable(function (InvalidOrderException $e) {
            return false;
        });

        $this->renderable(function (NotFoundHttpException $e, $request) {
            return response()->view('errors.' . '500', [], 500);
        });

        // $this->renderable(function (Throwable $e) {
        //     return $this->render($request);
        // });
    }
}
