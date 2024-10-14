<?php

namespace App\Traits\APi;

trait ResponseTrait
{
    public function apiSuccess($data = [], $message = 'Operation successful', $statusCode = 200)
    {
        return response()->json([
            'status_code' => $statusCode,
            'data' => [
                'status' => 'success',
                'message' => $message,
                'data' => $data
            ]
        ]);
    }

    public function apiError($message = 'Operation failed', $statusCode = 404, $data = [])
    {
        return response()->json([
            'status_code' => $statusCode,
            'data' => [
                'status' => 'failed',
                'message' => $message,
                'data' => $data
            ]
        ]);
    }

    public function loginSuccess($token, $user_name, $img = '', $message = 'login successful', $statusCode = 200)
    {
        return response()->json([
            'status_code' => $statusCode,
            'data' => [
                'status' => 'success',
                'message' => $message,
                'data' => [
                    'token' => $token,
                    'user_name' => $user_name,
                    'img' => $img
                ]
            ]
        ]);
    }
}
