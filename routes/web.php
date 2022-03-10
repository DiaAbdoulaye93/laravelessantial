<?php

use App\Http\Controllers\classeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/ajouterEtudiant', function () {
    return view('etudiant/ajouterEtudiant');
});
Route::get('/ajouterClasse', function () {
    return view('classe/ajouterclasse');
});

//Routes pour les etudiants
Route::get('/etudiant', [StudentController::class,'index']);
Route::put('/update-etudiant', [StudentController::class,'update']);

//Routes pour les Classes
Route::get('/listClasses', [classeController::class,'getClasses']);


Route::resource('students', StudentController::class);
Route::resource('classes', classeController::class);

