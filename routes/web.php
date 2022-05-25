<?php

use App\Http\Controllers\AuthController;
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
    return view('auth/login');
});
Route::get('/ajouterEtudiant', function () {
    return view('etudiant/ajouterEtudiant');
});
Route::get('/ajouterClasse', function () {
    return view('classe/ajouterclasse');
});

//Routes pour les etudiants
Route::get('/etudiant', [StudentController::class,'index']);
Route::get('students/list', [StudentController::class, 'getStudents']);
Route::put('/update-etudiant', [StudentController::class,'update']);
// Autre maniére de gerer les routes, mais dans ce cas on doit le prendre aussi en compte au niveau des vues
Route::post('/connection', [AuthController::class,'login'])->name('connection');
Route::get('/inscriptionForm', [AuthController::class,'inscriptionForm'])->name('inscriptionForm');
Route::post('/inscription', [AuthController::class,'inscription'])->name('inscription');
Route::get('/loggout', [AuthController::class,'loggout'])->name('loggout');

//Routes pour les Classes
Route::get('/listClasses', [classeController::class,'getClasses']);


// Route::resource('students', StudentController::class);
Route::resource('classes', classeController::class);

