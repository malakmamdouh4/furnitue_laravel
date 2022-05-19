<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/upload-images-slider', [AdminController::class,'uploadImagesSlider']);

Route::post('/register', [AdminController::class,'register']);

Route::post('/add-dept', [AdminController::class,'addDept']);

Route::post('/add-item', [AdminController::class,'addItem']);
