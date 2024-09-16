<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Exception;
class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
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
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
         // Handle MethodNotAllowedHttpException
         if ($exception instanceof \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException) {
            return response()->json(['message' => 'Method not allowed. Please use the correct HTTP method.', 'code' => 405], 405);
        }
        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\HttpException) {
            $statusCode = $exception->getStatusCode();

            switch ($statusCode) {
                case 404:
                    return response()->json(['message' => 'Resource not found', 'code' => 404], 404);
                case 403:
                    return response()->json(['message' => 'Forbidden', 'code' => 403], 403);
                case 401:
                    return response()->json(['message' => 'Unauthorized', 'code' => 401], 401);
                case 500:
                default:
                    return response()->json(['message' => 'Server error', 'code' => 500], 500);
            }
        }

        // Default fallback to the parent render method
        return parent::render($request, $exception);
    }


}
