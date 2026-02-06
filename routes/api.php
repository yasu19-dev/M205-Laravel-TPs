<?php

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

Route::middleware('auth:api')->post('/test-post', function (Request $request) {
    return response()->json([
        'status' => 'Succès',
        'message' => 'Ton API a bien reçu les données !',
        'user' => $request->user()->name,
        'data_received' => $request->all()
    ]);
});
