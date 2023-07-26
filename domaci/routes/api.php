<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\LopteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserLopteController;
use App\Http\Controllers\TypeLopteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);



Route::get('/users/{id}/lopte', [UserLopteController::class, 'index'])->name('users.lopte.index');

Route::get('/types/{id}/lopte', [TypeLopteController::class, 'index'])->name('types.lopte.index');

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route:: group(['middleware'=>['auth:sanctum']],function(){
    Route::get('/profile', function(Request $request){
        return auth()->user();
    });

    Route::resource('lopte', LopteController::class)->only(['update','store', 'destroy']);

    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::resource('lopte', LopteController::class)->only(['index']);
