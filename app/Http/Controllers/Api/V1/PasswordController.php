<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewPasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class PasswordController extends Controller
{
    public function change(NewPasswordRequest $request)
    {
        $user = User::find(auth()->user()->id);
        $user->password = Hash::make($request->password);
        $user->save();

        return response_api(
            Response::HTTP_OK,
            true,
            __('auth.password_change')
        );
    }
}
