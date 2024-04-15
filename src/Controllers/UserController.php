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

    public function index()
    {
        \Log::info("** TECLIB ** Consultando usuarios");
        try {
            $users = $this->tecbaseApi->get('/usuarios');

            return response()->json($users);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'error_code' => $e->getCode()
            ]);
        }
    }

    public function show($id)
    {
        try {
            $user = $this->tecbaseApi->get("/usuarios/$id");

            return response()->json($user);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'error_code' => $e->getCode()
            ]);
        }
    }

    public function store()
    {
        try {
            $user = $this->tecbaseApi->post("/usuarios");

            return response()->json($user);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'error_code' => $e->getCode()
            ]);
        }
    }

    public function update($id)
    {
        try {
            $user = $this->tecbaseApi->put("/usuarios/$id");

            return response()->json($user);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'error_code' => $e->getCode()
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $user = $this->tecbaseApi->delete("/usuarios/$id");

            return response()->json($user);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'error_code' => $e->getCode()
            ]);
        }
    }
}
