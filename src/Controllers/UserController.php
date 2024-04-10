<?php

namespace App\Http\Controllers\Teclib;

use Illuminate\Http\Request;
use App\Services\Teclib\Connection\TecbaseApi;


class UserController
{
    public function __construct(
        protected Request $request,
        protected TecbaseApi $tecbaseApi
    ) {}

    public function consulta()
    {
        try {
            $token = $this->tecbaseApi->get('/users');

            return response()->json($token);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'error_code' => $e->getCode()
            ]);
        }
    }
}
