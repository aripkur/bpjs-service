<?php

namespace App\Exceptions;

use App\Traits\BpjsResponse;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    use BpjsResponse;

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
        $this->reportable(function (\Throwable $e) {
            //
        });
        $this->renderable(function (\Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e, $request) {
            if ($request->is('api/*')) {
                return $this->response([], ['message' => 'URI tidak tersedia', 'code' => 201]);
            }
        });
        $this->renderable(function (\Illuminate\Database\Eloquent\ModelNotFoundException $e, $request) {
            if ($request->is('api/*')) {
                return $this->response([], ['message' => 'Resource tidak tersedia', 'code' => 201]);
            }
        });
        $this->renderable(function (\Illuminate\Database\QueryException $e, $request) {
            if ($request->is('api/*')) {
                return $this->response([], ['message' => 'Error database code status ' . $e->getCode(), 'code' => 201]);
            }
        });
        $this->renderable(function (\BadMethodCallException $e, $request) {
            if ($request->is('api/*')) {
                return $this->response([], ['message' => 'Error ' . $e->getMessage(), 'code' => 201]);
            }
        });
    }
}
