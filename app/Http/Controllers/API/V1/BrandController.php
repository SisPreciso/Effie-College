<?php

namespace App\Http\Controllers\API\V1;

use App\Brand;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\Brand\SearchBrandRequest;
use App\Http\Requests\API\Brand\StoreBrandRequest;
use App\Http\Requests\API\Brand\UpdateBrandRequest;
use App\Http\Resources\V1\BrandResource;
use App\Traits\ImageTrait;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BrandController extends Controller
{
    use ResponseTrait, ImageTrait;

    const MODEL = 'Marca';
    const PATH = 'images';
    const IMAGE_NAME = 'image';

    /**
     * @param SearchBrandRequest $request
     * @return JsonResponse|AnonymousResourceCollection
     */
    public function index(SearchBrandRequest $request)
    {
        try {
            $brands = Brand::filter($request->validated())->latest('id')->paginate($this->perPage);

            return BrandResource::collection($brands)->additional($this->additionalResponse('Lista de marcas.'));
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage());
        }
    }

    /**
     * @param StoreBrandRequest $request
     * @return JsonResponse
     */
    public function store(StoreBrandRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();
            $data['image'] = $this->saveImage(self::PATH, self::IMAGE_NAME);

            Brand::create($data);

            return $this->successResponse($this->messageResponse(self::MODEL, 'creada'));
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage());
        }
    }

    /**
     * @param Brand $brand
     * @return BrandResource|JsonResponse
     */
    public function show(Brand $brand)
    {
        try {
            return BrandResource::make($brand)->additional($this->additionalResponse('Detalle de la marca.'));
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage());
        }
    }

    /**
     * @param UpdateBrandRequest $request
     * @param Brand $brand
     * @return JsonResponse
     */
    public function update(UpdateBrandRequest $request, Brand $brand): JsonResponse
    {
        try {
            $data = $request->validated();
            $data['image'] = $this->updateImage(self::PATH, self::IMAGE_NAME, $brand);

            $brand->update($data);

            return $this->successResponse($this->messageResponse(self::MODEL, 'actualizada'));
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage());
        }
    }

    /**
     * @param Brand $brand
     * @return JsonResponse
     */
    public function destroy(Brand $brand): JsonResponse
    {
        try {
            $brand->delete();

            return $this->successResponse($this->messageResponse(self::MODEL, 'eliminada'));
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage());
        }
    }

    /**
     * @param int $brandId
     * @return JsonResponse
     */
    public function restore(int $brandId): JsonResponse
    {
        try {
            $brand = Brand::onlyTrashed()->findOrFail($brandId);

            $brand->restore();

            return $this->successResponse($this->messageResponse(self::MODEL, 'restaurada'));
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage());
        }
    }
}
