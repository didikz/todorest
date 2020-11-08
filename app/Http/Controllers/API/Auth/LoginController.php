<?php

namespace App\Http\Controllers\API\Auth;

use App\Actions\AuthAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\Auth\AuthRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * @param AuthRequest $request
     * @param AuthAction $authAction
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function attempt(AuthRequest $request, AuthAction $authAction)
    {
        $token = $authAction->handle($request->email, $request->password);

        return response()->json([
            'token' => $token
        ]);
    }
}
