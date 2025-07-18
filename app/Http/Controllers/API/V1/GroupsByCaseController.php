<?php

namespace App\Http\Controllers\API\V1;

use App\GroupsByCase;
use App\Http\Controllers\Controller;
use App\Traits\ResponseTrait;
use Exception;
use Illuminate\Http\JsonResponse;

class GroupsByCaseController extends Controller
{
    use ResponseTrait;

    /**
     * @return JsonResponse
     */
    public function maxCount(): JsonResponse
    {
        try {
            return $this->successResponse(GroupsByCase::maxGroups());
        } catch (Exception $exception) {
            return $this->errorResponse($exception->getMessage(), $exception->getCode());
        }
    }
}
