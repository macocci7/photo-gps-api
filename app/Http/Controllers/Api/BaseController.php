<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class BaseController extends Controller
{
    /**
     * success response method
     * 
     * @param   string                  $message
     * @param   array<string, mixed>|Collection    $data
     * @return  \Illuminate\Http\JsonResponse
     */
    public function sendResponse(string $message, array|Collection $data)
    {
        $response = $data;

        return response()->json($response, 200);
    }

    /**
     * return error response.
     * 
     * @param   string  $message
     * @param   MessageBag|array<int|string, mixed> $errorMessages = []
     * @param   int $code = 404
     * @return  \Illuminate\Http\JsonResponse
     */
    public function sendError(
        string $message,
        MessageBag|array $data = [],
        int $code = 404
    ) {
        $response = [
            'status' => $code,
            'message' => $message,
        ];

        if (!empty($data)) {
            $response['data'] = $data;
        }

        return response()->json($response);
    }
}
