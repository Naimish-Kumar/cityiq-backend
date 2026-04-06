<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\SavedAreaController;
use App\Http\Controllers\AiQueryController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ComparisonController;
use App\Http\Controllers\CostCalculatorController;
use App\Http\Controllers\CommuteSimulationController;
use App\Http\Controllers\AlertController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\TravelAiController;

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

// v2.0 Country Intelligence Routes
Route::prefix('v2')->group(function () {
    Route::get('/countries', [CountryController::class, 'index']);
    Route::get('/countries/{code}', [CountryController::class, 'show']);
    Route::get('/countries/{code}/visa/{passport}', [CountryController::class, 'visa']);
    Route::get('/countries/{code}/health', [CountryController::class, 'health']);
    Route::get('/countries/{code}/culture', [CountryController::class, 'culture']);
    Route::get('/countries/{code}/scams', [CountryController::class, 'scams']);
    Route::get('/countries/{code}/transport', [CountryController::class, 'transport']);
    Route::get('/countries/{code}/visit-timing', [CountryController::class, 'visitTiming']);

    // AI Tour Guide (Authenticated)
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/tour-guide/query', [TravelAiController::class, 'query']);
    });
});

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

    // Cost calculator + commute simulator
    Route::get('/cost-calculator/history', [CostCalculatorController::class, 'index']);
    Route::post('/cost-calculator', [CostCalculatorController::class, 'store']);
    Route::post('/cost-calculator/preview', [CostCalculatorController::class, 'preview']);
    Route::get('/commute/history', [CommuteSimulationController::class, 'index']);
    Route::post('/commute/simulate', [CommuteSimulationController::class, 'store']);

    // Alerts
    Route::get('/alerts', [AlertController::class, 'index']);
    Route::post('/alerts/{id}/read', [AlertController::class, 'markRead']);

    // Community Feed / Reviews (Module 4)
    Route::post('/reviews', [ReviewController::class, 'store']);
    Route::post('/reviews/{id}/vote', [ReviewController::class, 'vote']);
});

// Public Review Routes
Route::get('/feed', [ReviewController::class, 'feed']);
Route::get('/areas/{areaId}/reviews', [ReviewController::class, 'areaReviews']);

// Comparison (Module 5)
Route::post('/compare', [ComparisonController::class, 'compare']);

// Area Routes (Public facing typically, so anyone can search)
Route::get('/areas', [AreaController::class, 'index']);
Route::get('/areas/trending', [AreaController::class, 'trending']);
Route::get('/areas/{id}/score-history', [AreaController::class, 'scoreHistory']);
Route::get('/areas/{id}', [AreaController::class, 'show']);
