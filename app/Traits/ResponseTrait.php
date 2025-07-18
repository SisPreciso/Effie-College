<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ResponseTrait
{
    /**
     * @var int
     */
    public $perPage = 10;

    /**
     * @var int
     */
    public $attempts = 5;

    /**
     * @var string
     */
    public $message = 'Model action exitosamente.';

    /**
     * @param mixed $message
     * @param int $code
     * @return JsonResponse
     */
    public function successResponse($message, int $code = 200): JsonResponse
    {
        return response()->json($this->additionalResponse($message, $code), $code);
    }

    /**
     * @param string|array $errors
     * @param int $code
     * @return JsonResponse
     */
    public function errorResponse($errors, int $code = 500): JsonResponse
    {
        return response()->json([
            'errors' => $errors,
            'code' => $code,
        ], $code);
    }

    /**
     * @param string $message
     * @param int $code
     * @return array
     */
    public function additionalResponse(string $message, int $code = 200): array
    {
        return [
            'message' => $message,
            'code' => $code,
        ];
    }

    /**
     * @param string $model
     * @param string $action
     * @return array|string|string[]
     */
    public function messageResponse(string $model, string $action)
    {
        return str_replace(['Model', 'action'], [$model, $action], $this->message);
    }
}
