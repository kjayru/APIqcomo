<?php

namespace App\Exceptions;

use Exception;
use App\Traits\ApiResponser;
use Illuminate\Database\QueryException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;

use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException as ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;


class Handler extends ExceptionHandler
{
    use ApiResponser;
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        //dd($exception);

        if($exception instanceof ValidationException){
            return $this->convertValidationExceptionToResponse($exception,$request);
        }

        if($exception instanceof ModelNotFoundException){
            $modelo = $exception->getModel();
            return $this->errorResponse('No existen niguna instancia  con el id especificado',404);
        }

        if($exception instanceof NotFoundHttpException){
            //$modelo = $exception->getModel();
            return $this->errorResponse('No se encontro la url especifica',404);  
        }
        
        if(exception instanceof AuthenticationException){
            return $this->unauthenticate($request,$exception);
        }

        if(exception instanceof AuthorizationException){
            return $this->errorResponse('No tienes permiso para esta ejecución',403);
        }

        if(exception instanceof MethodNotAllowedHttpException){
            return $this->errorResponse('El motedo no especificado no es valido',405);
        }

        if(exception instanceof HttpException){
            return $this->errorResponse($exception->getMessage,$exception->getStatusCode());
        }

        if(exception instanceof QueryException){
            $codigo = $exception->errorInfo[1];
            if($codigo== 1451){
                return $this->errorResponse('No se puede eliminar el recurso relacionado',409);
            }
            
        }

        if(config('app.debug')){
            return parent::render($request,$exception);
        }

        //return parent::render($request, $exception);
        return $this->errorResponse('Falla inespereda. Intente luego',500);
        
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {  
            return $this->errorResponse('no autenticado', 401);  
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
        $errors = $e->validator->errors()->getMessages();
        return $this->errorResponse($errors,422);
    }
}
