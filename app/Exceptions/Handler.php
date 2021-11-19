<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Validation\UnauthorizedException;
use Illuminate\Validation\ValidationException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var string[]
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var string[]
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
    public function render($request, Throwable $e)
    {

//        if (\Request::wantsJson()) {
//            $apiException = (new ApiExceptionMapper($e))->getApiException();
//            return response()->json($apiException->getPayload(), $apiException->getStatusCode());
//        }
        if ($e instanceof ValidationException) {
            if ($request->ajax()) {
                return response()->json($e->validator->getMessageBag()->toArray());
            }
            return redirect()->back()->withErrors($e->validator->getMessageBag()->toArray())->withInput();
        }
        if ($e instanceof TokenMismatchException){
            return redirect("/")->withErrors('Security token wrong or expired.Please Login again.')->withInput();
        }
        if($e instanceof UnauthorizedException){
            return redirect()->back()->withErrors('You are not authorized to access this page.')->withInput();
        }

    }
}
