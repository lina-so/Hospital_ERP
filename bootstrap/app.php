<?php

use Illuminate\Http\Request;
use App\Traits\APi\ResponseTrait;
use Illuminate\Foundation\Application;

use Illuminate\Database\QueryException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Validation\ValidationException;


use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (NotFoundHttpException $e, Request $request) {
            if ($request->is('api/*')) {
                $message = "Route/File Not Found";
                return response()->json([
                    'status_code' => 404,
                    'data' => [
                        'status' => 'failed',
                        'message' => $message,
                    ]
                ]);
            }
        });
        $exceptions->render(function (ModelNotFoundException $e, Request $request) {
            if ($request->is('api/*')) {
                $message = "the.substr($e->getModel(), 11). you have asked for is not found.";
                return response()->json([
                    'status_code' => 404,
                    'data' => [
                        'status' => 'failed',
                        'message' => $message,
                    ]
                ]);
            }
        });

        $exceptions->render(function (AuthorizationException $e, Request $request) {
            if ($request->is('api/*')) {
                $message = "This action is unauthorized";
                return response()->json([
                    'status_code' => 403,
                    'data' => [
                        'status' => 'failed',
                        'message' => $message,
                    ]
                ]);
            }
        });

        $exceptions->render(function (AuthenticationException $e, Request $request) {
            if ($request->is('api/*')) {
                $message = "Unauthenticated user";
                return response()->json([
                    'status_code' => 401,
                    'data' => [
                        'status' => 'failed',
                        'message' => $message,
                    ]
                ]);
            }
        });


        $exceptions->render(function (ThrottleRequestsException $e, Request $request) {
            if ($request->is('api/*')) {
                $message = "Too Many Attempts";
                return response()->json([
                    'status_code' => 429,
                    'data' => [
                        'status' => 'failed',
                        'message' => $message,
                    ]
                ]);
            }
        });

        $exceptions->render(function (ValidationException $e, Request $request) {
            if ($request->is('api/*')) {
                $message = "invalid request parameters values, Validation failed";
                $errors = Arr::flatten($e->errors());
                return response()->json([
                    'status_code' => 422,
                    'data' => [
                        'status' => 'failed',
                        'message' => $message,
                        'errors'=>$errors
                    ]
                ]);
            }
        });

        // $exceptions->render(function (QueryException $e, Request $request) {
        //     if ($request->is('api/*')) {
        //         $message = "Query failed ,Integrity constraint violation";
        //         return response()->json([
        //             'status_code' => 500,
        //             'data' => [
        //                 'status' => 'failed',
        //                 'message' => $message,
        //             ]
        //         ]);
        //     }
        // });


    })->create();
