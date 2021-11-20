<?php
namespace App\Exceptions;

use Illuminate\Session\TokenMismatchException;
use Illuminate\Validation\UnauthorizedException;
use Illuminate\Validation\ValidationException;
trait ExceptionTrait
{
    public function getException($request,$e)
    {
        if ($e instanceof ValidationException) {
            return redirect()->back()->withErrors($e->validator->getMessageBag()->toArray())->withInput();
        }
        if ($e instanceof TokenMismatchException){
            return redirect("/")->withErrors('Security token wrong or expired.Please Login again.')->withInput();
        }
        if($e instanceof UnauthorizedException){
            return redirect()->back()->withErrors('You are not authorized to access this page.')->withInput();
        }

        return parent::render($request, $e);

    }


}
