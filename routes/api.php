<?php

use App\Http\Controllers\IdolController;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

use App\Http\Controllers\IdolPostController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\UserController;    
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//fungsi data idol
Route::get('idol', [IdolController::class, 'index']);
Route::get('idol/{id}', [IdolController::class, 'show']);
Route::post('idol/store', [IdolController::class, 'store']);
Route::put('idol/{id}', [IdolController::class, 'update']);
Route::delete('idol/{id}', [IdolController::class, 'destroy']);

//login
Route::resource('users', UserController::class);
Route::post('login', [UserController::class, 'login']);
Route::middleware([EnsureFrontendRequestsAreStateful::class, 'auth:sanctum'])->group(function () {
});

Route::get('member', [MemberController::class, 'index']);
Route::post('member/store', [MemberController::class, 'store']);
Route::get('member/{id}', [MemberController::class, 'show']);
Route::post('member/update/{id}', [MemberController::class, 'update']);
Route::delete('member/{id}', [MemberController::class, 'destroy']);