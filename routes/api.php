<?php

use App\Http\Controllers\StudentController;
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
Route::post('/add-student', [StudentController::class,'create']);
Route::get('/list-student', [StudentController::class,'getstudent']);
Route::put('/detail-student/{id}', [StudentController::class,'getstudentdetails']);
Route::get('/edit-student/{id}', [StudentController::class,'getStudentById']);
Route::delete('/delete-student/{id}', [StudentController::class,'deletestudent']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
