<?php

namespace App\Exceptions;

use App\Traits\ApiResponser;
use Symfony\Component\HttpFoundation\Response;
use Throwable;
use Psr\Log\LogLevel;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class Handler extends ExceptionHandler
{
    use ApiResponser;
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        if (!env('APP_DEBUG')) {
            $this->renderable(function (MethodNotAllowedHttpException $e, Request $request) {
                if ($request->is('api/*')) {
                return $this->getErrorResponse(Response::HTTP_METHOD_NOT_ALLOWED, "Méthode non autorisée");
                }
            });

            $this->renderable(function (ModelNotFoundException $e, Request $request) {
                if ($request->is('api/*')) {
                    return $this->getErrorResponse(Response::HTTP_NOT_FOUND, "Aucun élément trouvé");
                }
            });

            $this->renderable(function (HttpException $e, Request $request) {
                if ($request->is('api/*')) {
                    return $this->getErrorResponse(Response::HTTP_INTERNAL_SERVER_ERROR, $e->getMessage());
                }
            });

            $this->renderable(function (Throwable $e, Request $request) {
                if ($request->is('api/*')) {
                    return $this->getErrorResponse(Response::HTTP_INTERNAL_SERVER_ERROR, $e->getMessage());
                }
            });
        }


    }
}
