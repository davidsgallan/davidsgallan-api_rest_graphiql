<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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


Route::get('products/', [ProductController::class, 'getProducts'])->name('Products');
Route::get('product/{id}', [ProductController::class, 'getProduct'])->name('Product');

Route::post('product/', [ProductController::class, 'postProduct'])->name('Product new');
Route::put('product/{id}', [ProductController::class, 'putProduct'])->name('Product Update');
Route::delete('product/{id}', [ProductController::class, 'deleteProduct'])->name('Product Delete');