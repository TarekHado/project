<?php

namespace App\Exceptions;

use Exception;

use Illuminate\Support\Arr;

use Request;

use Illuminate\Auth\AuthenticationException;

use Response;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler

{



  private function apiResponse($status, $message, $data = null)
  {
      $response = [
          'status' => $status,
          'message' => $message,
          'status' => $data,
      ];

      return response()->json($response);
  }
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

'password',

'password_confirmation',

];

/**

* Report or log an exception.

*

* @param \Exception $exception

* @return void

* @throws Exception

*/

public function report(Exception $exception)

{

parent::report($exception);

}

/**

* Render an exception into an HTTP response.

*

* @param \Illuminate\Http\Request $request

* @param \Exception $exception

* @return \Illuminate\Http\Response

*/

public function render($request, Exception $exception)

{
    if ($exception instanceof \Spatie\Permission\Exceptions\UnauthorizedException) {
        return response()->json(['User have not permission for this page access.']);
    }

    return parent::render($request, $exception);


}

/**

* Convert an authentication exception into a response.

*

* @param \Illuminate\Http\Request $request

* @param \Illuminate\Auth\AuthenticationException $exception

* @return \Illuminate\Http\Response

*/

protected function unauthenticated($request, AuthenticationException $exception)

{

// api/v1/blood-types

return $request->is('api/*')

? $this->apiResponse(0,'Unauthenticated.')

: redirect()->guest($exception->redirectTo() ?? route('login'));

}

}
