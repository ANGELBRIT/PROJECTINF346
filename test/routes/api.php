<?php

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



Route::put("/sendCv/{id}", [App\Http\Controllers\UserController::class, "uploadFichier"]);
Route::post("/newCour", [App\Http\Controllers\CoursController::class, "store"]);
Route::put("/changeStatus/{id}", [App\Http\Controllers\UserController::class, "changeStatus"]);
Route::get("/allCv", [App\Http\Controllers\UserController::class, "allCv"]);
Route::get("/allCours", [App\Http\Controllers\CoursController::class, "index"]);
Route::delete("/deleteCour/{id}", [App\Http\Controllers\CoursController::class, "delete"]);
Route::post("/ConnectUser",[App\Http\Controllers\UserController::class,"login"]);
Route::post("/logout", [App\Http\Controllers\UserController::class, "logout"]);
Route::put("/changeImages/{id}", [App\Http\Controllers\UserController::class, "changeImage"]);
Route::post("/newUser",[App\Http\Controllers\UserController::class,"store"]);
Route::post("/newCode",[App\Http\Controllers\CodeController::class,"store"]);
Route::post("/Code",[App\Http\Controllers\CodeController::class,"verified"]);
Route::post("/register",[App\Http\Controllers\Auth\ApiAuthController::class,"register"]);
Route::post("/enregistrement",[App\Http\Controllers\TexteController::class,"store"]);
Route::post("/newPerson",[App\Http\Controllers\PersonneController::class,"store"]);
Route::get("/allPerson",[App\Http\Controllers\PersonneController::class,"index"]);
Route::get("/allUser", [App\Http\Controllers\UserController::class, "index"]);
Route::delete("/deletePerson/{id}/",[App\Http\Controllers\PersonneController::class,"destroy"]);
Route::put("/updatePerson/{id}/",[App\Http\Controllers\PersonneController::class,"update"]);
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});