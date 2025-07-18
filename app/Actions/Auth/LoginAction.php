<?php

namespace App\Actions\Auth;

use App\Http\Resources\V1\UserResource;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class LoginAction
{
    use ResponseTrait;

    /**
     * @param array $data
     * @return UserResource|JsonResponse
     */
    public function execute(array $data)
    {
        if (!auth()->attempt($data)) {
            return $this->errorResponse('Correo electrónico o contraseña incorrectos.', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $user = auth()->user();

        return UserResource::make($user)->additional([
            'token' => $user->createToken('token')->plainTextToken,
        ]);
    }
}
