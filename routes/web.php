<?php

use Illuminate\Support\Facades\Route;
 
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;

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

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


  
Route::get('admin/home', [AdminController::class, 'index'])->name('user');
Route::get('admin/logout', [HomeController::class, 'logout'])->name('user.logout');

//User Management
Route::post('user/add', [AdminController::class, 'store'])->name('store.user');
Route::get('edit/userinformation/{id}', [AdminController::class, 'editUserInformation']);

Route::delete('admin/admin/delete/userinformation/{id}',[AdminController::class,'deleteUserInformation']);
Route::post('update/user/{id}',[AdminController::class,'updateUserInformation']);
//User Management End

//Search

Route::get('search',[SearchController::class,'search'])->name('search');
Route::post('search/result',[SearchController::class,'searchResult'])->name('search.result');
Route::get('search/admin/select/{id}',[SearchController::class,'selectUser']);
Route::post('selected/user',[SearchController::class,'selectedUser'])->name('store.userselect');


//Search End