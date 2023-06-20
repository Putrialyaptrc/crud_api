<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MakulController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    // Rute Mahasiswa, Dosen, dan Makul
});

// Rute login
Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        $token = $user->createToken('api_token')->plainTextToken;

        return response()->json(['token' => $token]);
    }

    return response()->json(['message' => 'Unauthorized'], 401);
});

// Mendapatkan token Sanctum
Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (auth()->attempt($credentials)) {
        $user = auth()->user();
        $token = $user->createToken('api_token')->plainTextToken;

        return response()->json(['token' => $token]);
    }

    return response()->json(['message' => 'Unauthorized'], 401);
});

// Rute-rute yang memerlukan otentikasi Sanctum
Route::middleware('auth:sanctum')->group(function () {
    // Rute Mahasiswa
    Route::apiResource('mahasiswa', MahasiswaController::class);

    // Rute Dosen
    Route::apiResource('dosen', DosenController::class);

    // Rute Makul
    Route::apiResource('makul', MakulController::class);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
