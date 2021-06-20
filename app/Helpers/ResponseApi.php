<?php

if (!function_exists('response_api')) {
    function response_api($code, $status, $message = null, $data = null)
    {
        $response_api = [
            'success' => $status,
            'message' => $message,
        ];

        if (!empty($data)) {
            $response_api['data'] = $data;
        }

        return response()->json(
            $response_api,
            $code,
            ['Content-type' => 'application/json; charset=utf-8'],
            JSON_UNESCAPED_UNICODE
        );
    }
}
