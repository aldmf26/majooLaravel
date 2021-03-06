<?php

use App\Http\Controllers\API\ProdukController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('produk', [ProdukController::class, 'get']);
Route::get('produk/{id_lokasi}', [ProdukController::class, 'get']);

Route::get('komisi', [ProdukController::class, 'komisi']);
Route::get('komisi/{lokasi}/{tgl1}/{tgl2}', [ProdukController::class, 'komisi']);