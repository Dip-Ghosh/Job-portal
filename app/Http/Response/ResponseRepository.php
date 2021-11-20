<?php

namespace App\Http\Response;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ResponseRepository
{
    /**
     * @param $data
     * @param string $message
     * @param int $status_code
     * @return \Illuminate\Http\JsonResponse
     */
    public function ResponseSuccess($data, $message = "Successful", $statusCode = Response::HTTP_OK)
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data
        ],$statusCode);
    }

    /**
     * @param $errors
     * @param string $message
     * @param int $status_code
     * @return \Illuminate\Http\JsonResponse
     */
    public  function ResponseError( $message = 'Data is invalid', $statusCode = Response::HTTP_BAD_REQUEST)
    {
        return response()->json([
            'status' => false,
            'message' => $message
        ],$statusCode);
    }

}
