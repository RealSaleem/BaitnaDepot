<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiBaseController extends Controller
{
    /**
     * success response method.
     *
     * @param $result
     * @param $message
     *
     * @return JsonResponse
     */
    public function SuccessResponse($message, $result)
    {
        $response = [
            'success'   => true,
            'message'   => $message,
            'payload'   => $result
        ];

        return response()->json($response, 200);
    }

    /**
     * return error response.
     *
     * @param $error
     * @param  array  $errorResponseData
     * @param  int  $code
     *
     * @return JsonResponse
     */
    public function FailResponse($errorMessage, $errorData = [], $code = 500)
    {
        $response = [
            'success' => false,
            'message' => $errorMessage,
            'payload' => null  
        ];

        if (!empty($errorData)) {
            $response['payload'] = $errorData;
        }

        return response()->json($response, $code);
    }
}
