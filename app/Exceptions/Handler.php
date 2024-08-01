<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\AuthenticationException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * RegisterRequest the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (NotFoundHttpException $e, $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'message' => 'API not found.'
                ], 404);
            }
        });
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof AuthenticationException) {
            if ($request->is('api/*')) {

                return response()->json([
                    'status' => -1,
                    'result' => new \stdClass(),
                    'message' => 'Unauthorized',
                ], 401);
            }
        }

        if ($exception instanceof \Illuminate\Http\Exceptions\PostTooLargeException) {
            return response()->json(['status' => 0, 'responseText' => 'file large size']);
        }

        return parent::render($request, $exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        $path = explode('/', $request->path());
        // dd($path[0]);
        if ($path[0] == 'api') {
            return  response()->json([
                'status' => -1,
                'result' => new \stdClass(),
                'message' => $exception->getMessage()
            ], 401);
        } else {
            if ('flashx-admin' == $path[0]) {
                return redirect()->guest(route('adminLogin'));
            }
            //  if ($request->is('admin') || $request->is('admin/*')) {
            //      return redirect()->guest(route('adminLogin'));
            //  }
            return redirect()->guest(route('postLogin'));
        }
    }

    /**
     * Convert a validation exception into a JSON response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Validation\ValidationException  $exception
     * @return \Illuminate\Http\JsonResponse
     */
    protected function invalidJson($request, ValidationException $exception)
    {
        $errors = collect($exception->errors())->first();

        $message = '';

        if (!empty($errors[0])) {
            $message = $errors[0];
        }
        return response()->json([
            'status' => 0,
            'result' => new \stdClass(),
            'message' => $message,
        ], 200);
    }

    /**
     * Create a response object from the given validation exception.
     *
     * @param  \Illuminate\Validation\ValidationException  $e
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function convertValidationExceptionToResponse(ValidationException $e, $request)
    {
        $path = explode('/', $request->path());
        $isAjax = !empty($path[0]) && $path[0] == 'api' ? true : false;

        if ($e->response) {
            return $e->response;
        }

        return ($request->expectsJson() || $isAjax)
            ? $this->invalidJson($request, $e)
            : $this->invalid($request, $e);
    }
}
