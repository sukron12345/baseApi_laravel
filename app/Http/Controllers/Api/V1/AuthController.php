<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (!($token = auth()->attempt($credentials))) {
            return response_api(
                Response::HTTP_UNAUTHORIZED,
                false,
                __('auth.failed')
            );
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        $data = auth()->user();
        return response_api(Response::HTTP_OK, true, __('auth.profile'), $data);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response_api(Response::HTTP_OK, true, __('auth.logout'));
    }

    protected function respondWithToken($token)
    {
        $data = [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' =>
                auth()
                    ->factory()
                    ->getTTL() * 60,
        ];

        return response_api(Response::HTTP_OK, true, __('auth.login'), $data);
    }
}
