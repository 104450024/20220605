<?php
namespace App\Http\Controllers; // add namespace
use Illuminate\Support\Facades\Route;

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

Route::get('/employee',[EmployeeController::class,'index']);
Route::get('/search',[EmployeeController::class,'search']);
Route::put('/employee/{id}',[EmployeeController::class,'update']);