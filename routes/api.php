<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\SavedAreaController;
use App\Http\Controllers\AiQueryController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ComparisonController;

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

// Auth Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/login/google', [AuthController::class, 'googleLogin']);

// Protected Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::post('/profile/update', [AuthController::class, 'updateProfile']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // Saved Areas (Authenticated)
    Route::get('/saved-areas', [SavedAreaController::class, 'index']);
    Route::post('/saved-areas', [SavedAreaController::class, 'store']);
    Route::delete('/saved-areas/{areaId}', [SavedAreaController::class, 'destroy']);

    // AI Queries (Module 3)
    Route::get('/ai/history', [AiQueryController::class, 'index']);
    Route::post('/ai/query', [AiQueryController::class, 'store']);

    // Community Feed / Reviews (Module 4)
    Route::post('/reviews', [ReviewController::class, 'store']);
    Route::post('/reviews/{id}/like', [ReviewController::class, 'like']);
});

// Public Review Routes
Route::get('/feed', [ReviewController::class, 'feed']);
Route::get('/areas/{areaId}/reviews', [ReviewController::class, 'areaReviews']);

// Comparison (Module 5)
Route::post('/compare', [ComparisonController::class, 'compare']);

// Area Routes (Public facing typically, so anyone can search)
Route::get('/areas', [AreaController::class, 'index']);
Route::get('/areas/trending', [AreaController::class, 'trending']);
Route::get('/areas/{id}', [AreaController::class, 'show']);
