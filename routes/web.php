<?php
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes for frontend
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
/*
Web Routes for Backend
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['prefix'=>'admin'], function () {
        Route::get('/dashboard','App\Http\Controllers\Backend\pagescontroller@dashboard')->middleware('auth','verified')->name('admin.dashboard');
        
    Route::group(['prefix'=>'/brand'], function () {
        Route::get('/manage','App\Http\Controllers\Backend\Brandcontroller@index')->middleware('auth')->name('brand.manage');
        Route::get('/create','App\Http\Controllers\Backend\Brandcontroller@create')->middleware('auth')->name('brand.create');
        Route::post('/store','App\Http\Controllers\Backend\Brandcontroller@store')->middleware('auth')->name('brand.store');
        Route::get('/edit/{id}','App\Http\Controllers\Backend\Brandcontroller@edit')->middleware('auth')->name('brand.edit');
        Route::post('/update/{id}','App\Http\Controllers\Backend\Brandcontroller@update')->middleware('auth')->name('brand.update');
        Route::post('/destroy/{id}','App\Http\Controllers\Backend\Brandcontroller@destroy')->middleware('auth')->name('brand.destroy');
    });
    
    Route::group(['prefix'=>'/category'], function () {
        Route::get('/manage','App\Http\Controllers\Backend\CategoryController@index')->middleware('auth')->name('category.manage');
        Route::get('/create','App\Http\Controllers\Backend\CategoryController@create')->middleware('auth')->name('category.create');
        Route::post('/store','App\Http\Controllers\Backend\CategoryController@store')->middleware('auth')->name('category.store');
        Route::get('/edit/{id}','App\Http\Controllers\Backend\CategoryController@edit')->middleware('auth')->name('category.edit');
        Route::post('/update/{id}','App\Http\Controllers\Backend\CategoryController@update')->middleware('auth')->name('category.update');
        Route::post('/destroy/{id}','App\Http\Controllers\Backend\CategoryController@destroy')->middleware('auth')->name('category.destroy');
    });
    Route::group(['prefix'=>'/products'], function () {
        Route::get('/manage','App\Http\Controllers\Backend\ProductsController@index')->middleware('auth')->name('products.manage');
        Route::get('/create','App\Http\Controllers\Backend\ProductsController@create')->middleware('auth')->name('products.create');
        Route::post('/store','App\Http\Controllers\Backend\ProductsController@store')->middleware('auth')->name('products.store');
        Route::get('/edit/{id}','App\Http\Controllers\Backend\ProductsController@edit')->middleware('auth')->name('products.edit');
        Route::post('/update/{id}','App\Http\Controllers\Backend\ProductsController@update')->middleware('auth')->name('products.update');
        Route::post('/destroy/{id}','App\Http\Controllers\Backend\ProductsController@destroy')->middleware('auth')->name('products.destroy');
        Route::post('/destroyimage/{id}','App\Http\Controllers\Backend\ProductsController@destroyimage')->middleware('auth')->name('products.destroyimage');
       
      
    });
});
 
