<?php

use Illuminate\Support\Facades\Route;
use Src\SpaceExploration\Planets\Infrastructure\Controllers\PlanetGetController;
use Src\SpaceExploration\Vehicles\Infrastructure\Controllers\VehicleLandingPutController;
use Src\SpaceExploration\Vehicles\Infrastructure\Controllers\VehicleMovePatchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('mission');
});

Route::prefix('api')->group(function(){
    Route::get('/planets/{name}', [PlanetGetController::class, '__invoke']);
    Route::put('/vehicle', [VehicleLandingPutController::class, '__invoke']);
    Route::patch('/vehicle', [VehicleMovePatchController::class, '__invoke']);
});
