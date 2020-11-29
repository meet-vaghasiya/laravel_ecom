<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Annotation\Route as AnnotationRoute;
use App\Models\User;
use Illuminate\Support\Facades\DB;


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
Route::get('/about', function () {
    return view('about');

})->name('hello');

Route::get('/contact', 'App\Http\Controllers\ContactController@index')->middleware('age');



 // -------------------------------- category router ----------------------------------------
Route::get('/category/all', 'App\Http\Controllers\CategoryController@AllCategory')->name('all.category');
Route::post('/category/add','App\Http\Controllers\CategoryController@AddCat')->name('store.category');
Route::get('/category/edit/{id}','App\Http\Controllers\CategoryController@edit');
Route::post('/category/update/{id}','App\Http\Controllers\CategoryController@update');
Route::get('softdelete/category/{id}','App\Http\Controllers\CategoryController@softDelete');

 // -------------------------------- Brand router ----------------------------------------

 Route::get('/brand/all', 'App\Http\Controllers\BrandController@AllBrand')->name('all.brand');
 Route::post('/brand/add','App\Http\Controllers\BrandController@storeBrand')->name('store.brand');
 Route::get('/brand/edit/{id}','App\Http\Controllers\BrandController@edit');
 Route::post('/brand/update/{id}','App\Http\Controllers\BrandController@update');
 Route::get('delete/brand/{id}','App\Http\Controllers\BrandController@Delete');

  // -------------------------------- multiple image ----------------------------------------
  Route::get('/multiple/image', 'App\Http\Controllers\BrandController@multiple')->name('mul.image');
  Route::post('/multiple/add', 'App\Http\Controllers\BrandController@multipleAdd')->name('store.image');





Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

// $users =User::all(); 

$users= DB::table('users')->get();

    return view('dashboard',compact('users'));
})->name('dashboard');
