<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\test;

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

// Route::get('/welcome', function () {
//     return view('welcome');
// })->name('welcome');

Route::get('test', [test::class, 'test']);

Route::view('/','login')->name('loginpage');

// Route::view('/rar','pages/office-head/dashboard')->name('loginpage');

Route::get('login', [LoginController::class, 'login'])->name('login');

Route::group(['middleware'=>'auth'],function(){
    
    Route::post('storeform',[FormController::class,'store'])->name('storeform.store');

    Route::group(['middleware'=>'role:admin'],function(){
        Route::resource('form',FormController::class);
        Route::resource('role',RoleController::class);
        Route::resource('departments',DepartmentController::class);
        Route::resource('users',UserController::class);
        Route::get('/userslist',[UserController::class,'getusers'])->name('users.getusers');
    });

    Route::group(['middleware'=>'role:office_head'],function(){
        Route::resource('form-head',FormController::class,['only' => ['index','store','update']]);
    });

    Route::group(['middleware'=>'role:client'],function(){
        Route::resource('form-office',FormController::class,['only' => ['index','store']]);
    });

    Route::get('logout', function () {
        Auth::logout();
        session()->invalidate();
        return redirect('/');
    })->name('logout');

});


