<?php

namespace App\Http\Controllers\API\V1;

use App\Edition;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\Edition\SearchEditionRequest;
use App\Http\Requests\API\Edition\StoreEditionRequest;
use App\Http\Requests\API\Edition\UpdateEditionRequest;
use App\Http\Resources\V1\EditionResource;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class EditionController extends Controller
{
    use ResponseTrait;

    const MODEL = 'Edición';

    /**
     * @param SearchEditionRequest $request
     * @return JsonResponse|AnonymousResourceCollection
     */
    public function index(SearchEditionRequest $request)
    {
        try {
            $editions = Edition::filter($request->validated())->latest('id')->paginate($this->perPage);

            return EditionResource::collection($editions)->additional($this->additionalResponse('Lista de ediciones.'));
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage());
        }
    }

    /**
     * @param StoreEditionRequest $request
     * @return JsonResponse
     */
    public function store(StoreEditionRequest $request): JsonResponse
    {
        try {
            Edition::create($request->validated());

            return $this->successResponse($this->messageResponse(self::MODEL, 'creada'));
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage());
        }
    }

    /**
     * @param Edition $edition
     * @return EditionResource|JsonResponse
     */
    public function show(Edition $edition)
    {
        try {
            return EditionResource::make($edition)->additional($this->additionalResponse('Detalle de la edición.'));
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage());
        }
    }

    /**
     * @param UpdateEditionRequest $request
     * @param Edition $edition
     * @return JsonResponse
     */
    public function update(UpdateEditionRequest $request, Edition $edition): JsonResponse
    {
        try {
            $edition->update($request->validated());

            return $this->successResponse($this->messageResponse(self::MODEL, 'actualizada'));
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage());
        }
    }

    /**
     * @param Edition $edition
     * @return JsonResponse
     */
    public function destroy(Edition $edition): JsonResponse
    {
        try {
            $edition->delete();

            return $this->successResponse($this->messageResponse(self::MODEL, 'eliminada'));
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage());
        }
    }

    /**
     * @param int $editionId
     * @return JsonResponse
     */
    public function restore(int $editionId): JsonResponse
    {
        try {
            $edition = Edition::onlyTrashed()->findOrFail($editionId);

            $edition->restore();

            return $this->successResponse($this->messageResponse(self::MODEL, 'restaurada'));
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage());
        }
    }
}
