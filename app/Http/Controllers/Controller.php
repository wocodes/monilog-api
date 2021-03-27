<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    const STATUS_CODES = [
      "OK" => 200,
      "Created" => 201,
      "Unauthorized" => 401,
      "Bad Request" => 400,
      "Forbidden" => 403,
      "Not Found" => 404,
      "Internal Server Error" => 500,
    ];

    public function successResponse($data, $message, $response = 200)
    {
        $data = [
            "success" => true,
            "message" => $message,
            "data" => $data
        ];

        return response()->json($data, self::STATUS_CODES[$response]);
    }


    public function errorResponse($data = null, $message = null, $response = 400)
    {
        $data = [
            "success" => false,
            "message" => $message,
            "data" => $data
        ];

        return response()->json($data, self::STATUS_CODES[$response]);
    }
}
