<?php

use Illuminate\Support\Facades\Route;
use App\Models\Company;

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


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('main',MainController::class)->middleware('auth');
Route::resource('emp',EmployeeController::class)->middleware('auth');





Route::get('/', function () {
    return view('auth/login');
});
Route::get('/company', function () {
    return view('dash');
});

Route::get('/addemployee', function () {
    $data= Company::all();
    return view('addemployee')->with('mains',$data);

});
