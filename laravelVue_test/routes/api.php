<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoardsController;
use App\Http\Controllers\UserController;

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
Route::prefix('boards')->group(function() {
    // Route::get('/', [BoardsController::class, 'index']);
    Route::get('/{board}', [BoardsController::class, 'show']);
});
Route::post('/login', [UserController::class, 'login']);
Route::post('/registe', [UserController::class, 'registe']);
// Route::get('/{board}', [BoardsController::class, 'show']);
