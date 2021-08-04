<?php

namespace App\Traits;

trait ApiResponser
{
    protected function successResponse(array $data = [] , $message = null, $code = 200)
    {
        $result = array_merge(
            [
                'success' => true,
                'message' => $message
            ], $data);

        return response()->json($result, $code);
    }

    protected function errorResponse($message = null, $code = null)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
        ], $code);
    }
}
