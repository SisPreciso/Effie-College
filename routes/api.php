<?php

use App\Http\Controllers\API\V1\GroupsByCaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    $pathVersion = 'API\V1';

    Route::post('login', "{$pathVersion}\LoginController@store");

    Route::get('groups/count', [GroupsByCaseController::class, 'maxCount']);

    Route::middleware('auth:sanctum')->group(function () use ($pathVersion) {
        Route::apiResource('editions', "{$pathVersion}\EditionController");
        Route::post('editions/{editionId}/restore', "{$pathVersion}\EditionController@restore");

        Route::apiResource('brands', "{$pathVersion}\BrandController");
        Route::post('brands/{brandId}/restore', "{$pathVersion}\BrandController@restore");

        Route::apiResource('careers', "{$pathVersion}\CareerController");
        Route::post('careers/{careerId}/restore', "{$pathVersion}\CareerController@restore");
    });
});
