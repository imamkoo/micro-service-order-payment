<?php

use Illuminate\Support\Facades\Http;

function createPremiumAccess($data)
{
    $url = env('SERVICE_COURSE_URL') . 'api/my-courses/premium';
    try {
        $reponse = Http::post($url, $data);
        $data = response()->json();
        $data['http_code'] = $reponse->getStatusCode();
        return $data;
    } catch (\Throwable $th) {
        return [
            'status' => 'error',
            'http_code' => 500,
            'message' => 'Service Course Unavailable'
        ];
    }
}