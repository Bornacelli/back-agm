<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutomovilController;
use Illuminate\Support\Facades\Http;

Route::prefix('automoviles')->group(function () {
    Route::get('/', [AutomovilController::class, 'index']);
    Route::post('/', [AutomovilController::class, 'store']);
    Route::get('/{id}', [AutomovilController::class, 'show']);
    Route::put('/{id}', [AutomovilController::class, 'update']);
    Route::delete('/{id}', [AutomovilController::class, 'destroy']);
});


Route::get('/paises', function () {
    $response = Http::get('http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso/ListOfCountryNamesByCode/JSON/debug');
    return $response->json();
});