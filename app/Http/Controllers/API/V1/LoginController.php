<?php

namespace App\Http\Controllers\API\V1;

use App\Actions\Auth\LoginAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\Login\StoreLoginRequest;
use App\Http\Resources\V1\UserResource;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    use ResponseTrait;

    /**
     * @var LoginAction
     */
    private $loginAction;

    /**
     * @param LoginAction $loginAction
     */
    public function __construct(LoginAction $loginAction)
    {
        $this->loginAction = $loginAction;
    }

    /**
     * @param StoreLoginRequest $request
     * @return UserResource|JsonResponse
     */
    public function store(StoreLoginRequest $request)
    {
        try {
            return $this->loginAction->execute($request->validated());
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage());
        }
    }
}
